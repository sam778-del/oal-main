<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Country;
use App\State;
use App\SsDocument;
use App\Subscription;
use App\User;
use Otp;

class CommonsController extends Controller
{

    public function verify(Request $request){
        
        $email_verified = Auth::user()->email_verified;
        if($email_verified == 1){
            return redirect('/investor/dashboard');
        }else{
            return view("auth.verify");
        }
    }

    public function denied(Request $request){
     
        return view("auth.denied");
    }

    public function landing(Request $request){
        
        $user_id = Auth::user()->id;
        $subscription = Subscription::where('user_id',$user_id)->orderBy('created_at', 'ASC')->first();
        if(!empty($subscription)){
            if($subscription['status'] == 0){

                return redirect('/investor/subscriptionCreate');
            }else if( ($subscription['status'] == 2) || ($subscription['status'] == 3) || ($subscription['status'] == 6) || ($subscription['status'] == 7)){

                return redirect('/investor/dashboard');
            }
        }

        return view("auth.landing");
    }
    
    public function checkEmailExist(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(empty($user)){
            
            return response()->json(['valid' => true], 201);
        }else{
            return response()->json(['valid' => false], 201);
        }
    }

    public function checkLoginCredentials(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){
            if (!(Hash::check($request->get('password'), $user->password))) {
                $gauth = false;
                return response()->json(['data' => "Wrong Credentials", "error" => 1, "gauth" => $gauth], 201);
            }else{
                if($user["2fa_status"] == 1){
                    $gauth = true;
                }else{
                    
                    $otp = new Otp();
                    $otp = $otp->generate($user->email, 6, 15);
    
                    $to = $user['mobile_prefix'].$user['mobile_no'];
                    $msg = __('oal.sms_msg', ['otp' => $otp->token]);
                    $userModel = new User();
                    $userModel->sendOtp($to, $msg);
                    
                    $gauth = false;
                }
                return response()->json(['data' => "success", "error" => 0, "gauth" => $gauth], 201);
            }    
        }else{
            $gauth = false;
            return response()->json(['data' => "Wrong Credentials", "error" => 1, "gauth" => $gauth], 201);
        }
    }

    public function resendOtp(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){
            if (!(Hash::check($request->get('password'), $user->password))) {
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }else{

                $otp = new Otp();
                $otp = $otp->generate($user->email, 6, 15);

                $to = $user['mobile_prefix'].$user['mobile_no'];
                $msg = __('oal.sms_msg', ['otp' => $otp->token]);
                $userModel = new User();
                $userModel->sendOtp($to, $msg);

                return response()->json(['data' => "success", "error" => 0], 201);
            }    
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }


    public function otpCheck(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){

            $otp = new Otp();
            $otp = $otp->validate($user->email, $request->get('otp'));

            if($otp->status){
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function gaotpCheck(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){
            $google2fa = app('pragmarx.google2fa');
            $valid = $google2fa->verifyKey($user['2fa_key'], $request->get('otp'), 2);
            if ($valid) {
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function registerOtpCheck(Request $request){
        
        $google2fa_secret = $request->get('secretcode');
        $google2fa_otp = $request->get('code');

        if(!empty($google2fa_otp)){
            $google2fa = app('pragmarx.google2fa');
            $valid = $google2fa->verifyKey($google2fa_secret, $google2fa_otp, 2);
            if ($valid) {
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

	public function state(Request $request){
		$country_id =$request->input('country_id');
        $states = State::where('country_id',$country_id)->pluck('name', 'id')->toArray();

        return response()->json([
			    'data' => $states
			], 201);        
    }


    public function ssdocumentUpload(Request $request){

    	$subscription_id = $request->session()->get('subscription_id');
    	$main_type = $request->input('main_type');
    	$sub_type = $request->input('sub_type');

    	$originalImage= $request->file('file');
        if(!empty($originalImage)){
			
			$fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('ssattachment', $fileName, 'public');

 			$image_name = $filePath;
        }else{
            $image_name = "";
        }

        if(!empty($subscription_id)){

        	$requestData = $request->all();
	        $requestData['subscription_id'] = $subscription_id;
	        $requestData['main_type'] = $main_type;
	        $requestData['sub_type'] = $sub_type;
	        $requestData['file'] = $image_name;
	        $requestData['remarks'] = $request->input('remarks');

        	$ssDocumentData = SsDocument::where(['subscription_id' => $subscription_id, 'main_type' => $main_type, 'sub_type' => $sub_type])->first();

        	if(!empty($ssDocumentData)){

	            $ssDocument = SsDocument::find($ssDocumentData->id);
	            $ssDocument->update($requestData);
	        }else{

	            $ssDocument = SsDocument::create($requestData);
	        }	
	    }

        return response()->json(['data' => "success"], 201);        
    }

    public function ssdocumentRemove(Request $request){

    	$subscription_id = $request->session()->get('subscription_id');
    	$main_type = $request->input('main_type');
    	$sub_type = $request->input('sub_type');

    	$ssDocumentData = SsDocument::where(['subscription_id' => $subscription_id, 'main_type' => $main_type, 'sub_type' => $sub_type])->first();

		if(!empty($ssDocumentData)){
			$id = $ssDocumentData->id;
			SsDocument::find($id)->delete();

			return response()->json(['data' => "success".$subscription_id], 201);     
		}else{

			return response()->json(['data' => "error".$ssDocumentData."---".$subscription_id."--".$main_type."--".$sub_type], 201);     
		}      
    }
    
    
    public function sessionCheckingLogin(Request $request) {
        if (auth()->user()){
            return response()->json(['data' => "true"], 201);  
        }else{
            return response()->json(['data' => "false"], 201);  
        }
    }
        
}
