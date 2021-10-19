<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Subscription;
use App\Country;
use App\User;
use App\Setting;
use App\SsDocument;
use App\Payout;
use App\Price;
use Image;
use Auth;
use Session;
use PDF;
use Mail;

use App\Mail\ActiveInvestmentMail;
use App\Mail\ChangeBankDetailsUpdateEmail;
use App\Mail\BankSlipConfirmEmail;
use App\Mail\RedemptionApproval;
use App\Mail\RedemptionReject;
use App\Mail\InvestmentRejectMail;
use App\Mail\PendingFundingMail;

class AdminController extends Controller{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {


        //////////////////
        $draft_investment = Subscription::where('status', '=',0)
                                ->get();
        $total_draft = $draft_investment->count();
        //////////////////
        $pending_investment = Subscription::where('status', '=',1)
                                ->get();
        $total_pending = $pending_investment->count();
        //////////////////
        $pending_funding_investment = Subscription::where('status', '=',2)
                                ->get();
        $total_pending_funding = $pending_funding_investment->count();
        //////////////////
        $active_investment = Subscription::where('status', '=',3)
                                ->get();
        $total_active = $active_investment->count();
        //////////////////+
        $rejected_investment = Subscription::where('status', '=',5)
                                ->get();
        $total_rejected = $rejected_investment->count();
        //////////////////


        return view('admin.dashboard',compact('total_draft', 'total_pending', 'total_pending_funding', 'total_active', 'total_rejected'));
    }

    public function draft(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 0)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 0])->latest()->paginate(10);
        }

        return view('admin.draft')->with('subscriptions',$subscriptions);
    }

    public function pending(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 1)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 1])->latest()->paginate(10);
        }

        return view('admin.pending')->with('subscriptions',$subscriptions);
    }

    public function pendingFunding(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 2)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 2])->latest()->paginate(10);
        }

        return view('admin.pendingFunding')->with('subscriptions',$subscriptions);
    }

    public function active(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 3)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 3])->latest()->paginate(10);
        }

        return view('admin.active')->with('subscriptions',$subscriptions);
    }

    public function deactive(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 4)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 4])->latest()->paginate(10);
        }

        return view('admin.deactive')->with('subscriptions',$subscriptions);
    }

    public function rejected(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 5)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 5])->latest()->paginate(10);
        }

        return view('admin.rejected')->with('subscriptions',$subscriptions);
    }

    public function matured(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 6)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(2);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 6])->latest()->paginate(2);
        }

        return view('admin.matured')->with('subscriptions',$subscriptions);
    }

    public function maturedRequest(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 3)
                    ->where('redemption_request', '=', 1)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(2);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 3, 'redemption_request' => 1])->latest()->paginate(2);
        }

        return view('admin.matured_request')->with('subscriptions',$subscriptions);
    }

    public function reinvestment(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 7)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(2);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 7])->latest()->paginate(2);
        }

        return view('admin.reinvestment')->with('subscriptions',$subscriptions);
    }

    public function reinvestmentRequest(Request $request){

        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('status', '=', 3)
                    ->where('reinvestment_request', '=', 1)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(2);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['status' => 3, 'reinvestment_request' => 1])->latest()->paginate(2);
        }

        return view('admin.reinvestment_request')->with('subscriptions',$subscriptions);
    }

    public function subscriptionView($id){ 
        
        $subscription = Subscription::with(['SsDocumentAs', 'PayoutAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('id',$id)->first();
        if(!$subscription){
           return redirect()->back()->with('error', 'requested page not found');
        }
        
        $price = Price::where('id',1)->where('active',1)->first();
        
        $edit = true;
        if($subscription->status == 0){
            $edit = false;
        }
        return view('admin.subscriptionView',['subscription'=> $subscription, 'price' => $price, 'edit' => $edit]);
    }

    public function subscriptionCreate(Request $request, $id){ 
        
        $request->session()->forget('subscription_id');
        $subscription = "";
        $edit = false;
        $additional = false;
        $amount = config('settings.initial_amount');
        
        $userData = User::findOrFail($id);
        $countries = Country::pluck('name', 'id');

        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);
        
        $user_id = $userData['id'];
        $subscription = Subscription::with(['SsDocumentAs'])->where('user_id',$user_id)->where('is_first',1)->first();
        
        if(!empty($subscription)){
            $edit = true;
        }
        
        $check_additional = $this->checkAdditionalInvestment($userData['id']);
        if($check_additional == 0){
            $amount = config('settings.additional_amount');
            $additional = true;
        }
        
        return view('admin.subscriptionCreate', ['edit' => $edit, 'countries'=> $countries, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'amount' => $amount, 'additional' => $additional]);

    }

    public function subscriptionEdit(Request $request, $id){ 
        
        $request->session()->put('subscription_id', $id);
        $additional = false;
        $amount = config('settings.initial_amount');
        
        $subscription = Subscription::with(['SsDocumentAs'])->where('id',$id)->first();
        if(!$subscription){
           return redirect('/active')->with('error', 'requested page not found');
        }

        $edit = true;
        $userData = User::findOrFail($subscription->user_id);
        $countries = Country::pluck('name', 'id');
        
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);
        
        $check_additional = $this->checkAdditionalInvestment($userData['id']);
        if($check_additional == 0){
            $amount = config('settings.additional_amount');
            $additional = true;
        }

        return view('admin.subscriptionEdit', ['edit' => $edit, 'countries'=> $countries, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'amount' => $amount, 'additional' => $additional]);

    }

    public function subscriptionSave(Request $request){
        
        $subscription_id = $request->session()->get('subscription_id');
        $requestData = $request->all();
        $requestData['investment_no'] = config('settings.investment_no');
        
        $requestData['status'] = 1;    
        
        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $requestData['is_first'] = $this->checkAdditionalInvestment($subscription->user_id);
            $subscription->update($requestData);
        }else{
            $subscription = Subscription::create($requestData);
            
        }
        
        $increntNo = new User();
        $increntNo->updateInvestmentNo();
            
        $request->session()->forget('subscription_id');
        if($subscription){

            $user_id = $subscription->user_id;
            return redirect('users/'.$user_id)->with("success","Your subcription was saved successfully !!!");
        }else{
            return redirect('users/'.$user_id)->with("error","Your subcription was not saved !!!");
        }
          
    }


    public function subscriptionSaveDraft(Request $request){
        
        $subscription_id = $request->session()->get('subscription_id');
        $requestData = $request->all();

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $subscription->update($requestData);
        }else{

            $requestData['status'] = 0;
            $requestData['investment_no'] = config('settings.investment_draft_no');
            
            $is_first_subscription_id = $request->input('old_subscription_id');
            $is_first_subscriber_type = $request->input('old_subscriber_type');
            
            $subscription = Subscription::create($requestData);
            $this->copyDocument($subscription->id, $is_first_subscription_id, $is_first_subscriber_type);
            $increntDroftNo = new User();
            $increntDroftNo->updateInvestmentNoDraft();
        }
        if($subscription->id){

            $request->session()->put('subscription_id', $subscription->id);
            return response()->json(['data' => "success"], 201); 
        }else{

            return response()->json(['data' => "error"], 201); 
        }
    }
    
    
    public function subscriptionEditSave(Request $request){
        
        $requestData = $request->all();
        $subscription_id = $request->input('id');
        $subscription = Subscription::find($subscription_id);
        
        if($subscription->status == 0){
            $requestData['status'] = 1;    
        }
        $subscription->update($requestData);
        
        if($subscription){
            $user_id = $subscription->user_id;
            return redirect('users/'.$user_id)->with("success","Your subcription was updated successfully !!!");
        }else{
            return redirect('users/'.$user_id)->with("error","Your subcription was not updated !!!");
        }
          
    }


    public function subscriptionEditSaveDraft(Request $request){
        
        $requestData = $request->all();
        $subscription_id = $request->input('id');
        
        $subscription = Subscription::find($subscription_id);
        $subscription->update($requestData);
        
        return response()->json(['data' => "success"], 201); 
       
    }
    
    
    private function copyDocument($new_id, $ols_id, $main_type){
        
        $ssDocumentData = SsDocument::where(['subscription_id' => $ols_id, 'main_type' => $main_type])->get();
        
        foreach($ssDocumentData as $ssDocument){
            $requestData = new SsDocument;
	        $requestData['subscription_id'] = $new_id;
	        $requestData['main_type'] = $ssDocument['main_type'];
	        $requestData['sub_type'] =  $ssDocument['sub_type'];
	        $requestData['file'] =  $ssDocument['file'];
	        $requestData['remarks'] =  $ssDocument['remarks'];
	        $requestData['notification'] =  $ssDocument['notification'];
	        
	        $requestData->save();
                 
        }
        
        
    } 
   

    public function changeStatus(Request $request){ 

        $id = $request->get('subscription_id');

        $subscription = Subscription::where('id',$id)->first();
        $price = Price::where('id',1)->first();
        $payout = Payout::where('subscription_id',$subscription->id)->first();

        $user_id = $subscription->user_id;
        $userEntity = User::where('id',$user_id)->first();
         
        if(empty($payout)){       
            //Pending Funding
            if($request->input('status') == 2){
                if($request->get('send_mail') == "send"){
                    $subscription->bank_doc_request = 1;
    
                    //Notification Save
                    $noti_sender_user_id = 1;
                    $noti_receiver_user_id = $subscription->user_id;
                    $noti_link = "/investor/uploadBankslip";
                    $investment_no = $subscription->investment_name;
                    $noti_message = $investment_no." - Please upload the Bank Slip to confirm the investment";
    
                    $notification = new User;
                    $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                    //Notification End
    
    
                    //Email Save
                    $objData = new \stdClass();
                    $objData->email = $userEntity->email;
                    $objData->name = $userEntity->name;
                    $objData->investment_no = $investment_no;
                    $objData->msg = "";
                    $objData->link = "";
                    $to_email = $userEntity->email;
    
                    Mail::to($to_email)->send(new PendingFundingMail($objData));
                    //Email Save
                }
            }
    
            if($request->input('status') == 5){
                //Email Save
                $objData = new \stdClass();
                $objData->email = $userEntity->email;
                $objData->name = $userEntity->name;
                $objData->investment_no = $subscription->investment_name;
                $objData->msg = "";
                $objData->link = "";
                $to_email = $userEntity->email;
    
                Mail::to($to_email)->send(new InvestmentRejectMail($objData));
                //Email Save
            }
                
            if($request->input('status') == 3){
    
                if(!empty($subscription->commencement_date)){
                    
                    $latest_price = $price->latest_price;
                    $no_of_share = $subscription->amount/$latest_price;
                    $current_value = $no_of_share * $latest_price;
                    
                    $subscription->bank_doc_request = 0;
                    $subscription->actual_price = $latest_price;
                    $subscription->actual_no_of_share = $no_of_share;
                    $subscription->latest_price = $latest_price;
                    $subscription->no_of_share = $no_of_share;
                    $subscription->current_value = $current_value;
                    $subscription->status = $request->input('status');
                    $subscription->save();
    
                    //Notification Save
                    $noti_sender_user_id = 1;
                    $noti_receiver_user_id = $subscription->user_id;
                    $noti_link = "/investor/subscriptionView/".$subscription->id;
                    $investment_no = $subscription->investment_name;
                    $noti_message = $investment_no." - Your Investment Activated Successfully";
    
                    $notification = new User;
                    $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                    //Notification End
    
    
                    //Email Save
                    $objData = new \stdClass();
                    $objData->email = $userEntity->email;
                    $objData->name = $userEntity->name;
                    $objData->investment_no = $investment_no;
                    $objData->msg = "";
                    $objData->link = "";
                    $to_email = $userEntity->email;
    
                    Mail::to($to_email)->send(new ActiveInvestmentMail($objData));
                    //Email Save
    
                    return redirect()->back()->with("success","Successfully Changed status and sent mail.");
                }else{
    
                    return redirect()->back()->with("error","The commencement date not set. Please set first.");
                }
    
            }else{
                $subscription->status = $request->input('status');
                $subscription->save();
                return redirect()->back()->with("success","Successfully Changed status and sent mail.");
            }
        }else{
            return redirect()->back()->with("error","Already this investemt payout.");
        }
    }

    public function contractUpdate(Request $request){ 

        $id = $request->input('id');
        if(!empty($id)){
            $commence_date = $request->input('commencement_date');
            $commence_date = strtotime($commence_date);

            $requestData = $request->all();
            $subscriptionData = Subscription::where(['id' => $id])->first();

            if(!empty($subscriptionData)){

                $subscriptionData->update($requestData);
            }
        }
        return response()->json(['data' => "success"], 201);  
    }

    public function investmentDetailsUpdate(Request $request){ 

        $id = $request->input('id');
        if(!empty($id)){
            
            $requestData = $request->all();
            $subscriptionData = Subscription::where(['id' => $id])->first();

            if(!empty($subscriptionData)){

                $subscriptionData->update($requestData);
            }
        }
        return response()->json(['data' => "success"], 201);  
    }

    public function bankDetailsUpdate(Request $request){ 

        $id = $request->input('id');
        if(!empty($id)){
            
            $requestData = $request->all();
            $requestData['changebank_request'] = 0;
            $requestData['changebank_status'] = 1;
            $subscriptionData = Subscription::where(['id' => $id])->first();

            if(!empty($subscriptionData)){

                $subscriptionData->update($requestData);

                $user_id = $subscriptionData->user_id;
                $userEntity = User::where('id',$user_id)->first();

                //Notification Save
                $noti_sender_user_id = 1;
                $noti_receiver_user_id = $user_id;
                $noti_link = "/investor/subscriptionView/".$subscriptionData->id;
                $investment_no = $subscriptionData->investment_name;
                $noti_message = $investment_no." - Your bank details change request has been approved & updated";
                    
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                //Notification End


                //Email Save
                $objData = new \stdClass();
                $objData->email = $userEntity->email;
                $objData->name = $userEntity->name;
                $objData->investment_no = $investment_no;
                $objData->msg = "";
                $objData->link = "";
                $to_email = $userEntity->email;
                Mail::to($to_email)->send(new BankSlipConfirmEmail($objData));
                 
                //Email Save
            }
        }
        return response()->json(['data' => "success"], 201);  
    }

    public function manualSignedDocumentUpload(Request $request){ 

        $id = $request->input('id');
        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('manualSignedDoc', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }

        if(!empty($id)){

            $requestData = $request->all();
            $requestData['manual_signed_doc'] = $image_name;
            $requestData['manual_signed_doc_enable'] = 1;
            $subscriptionData = Subscription::where(['id' => $id])->first();

            if(!empty($subscriptionData)){
                $subscriptionData->update($requestData);
            }
        }
        return response()->json(['data' => "success"], 201);  
    }

    public function documentUpload(Request $request){ 

        $ss_id = $request->input('id');
        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('ssattachment', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }

        if(!empty($ss_id)){

            $requestData = $request->all();
            $requestData['file'] = $image_name;
            $ssDocumentData = SsDocument::where(['id' => $ss_id])->first();

            if(!empty($ssDocumentData)){
                $ssDocument = SsDocument::find($ssDocumentData->id);

                $ssDocument->update($requestData);
            }
        }
        return response()->json(['data' => "success"], 201);  
    }


    public function bankSlipConfirmEmail(Request $request){

        $id = $request->get('id');
        $subscription = Subscription::where('id',$id)->first();
        
        $subscription->bank_doc_request = 0;
        $subscription->bank_doc_request_hidden = 0;
        $subscription->save();

        $user_id = $subscription->user_id;
        $userEntity = User::where('id',$user_id)->first();


        //Notification Save
        $noti_sender_user_id = 1;
        $noti_receiver_user_id = $user_id;
        $noti_link = "/investor/subscriptionView/".$subscription->id;
        $investment_no = $subscription->investment_name;
        $noti_message = $investment_no." - Bank in slip accepted";
            
        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification End


        //Email Save
        $objData = new \stdClass();
        $objData->email = $userEntity->email;
        $objData->name = $userEntity->name;
        $objData->investment_no = $investment_no;
        $objData->msg = $subscription->redemption_msg;
        $objData->link = "";
        $to_email = $userEntity->email;
        Mail::to($to_email)->send(new BankSlipConfirmEmail($objData));
         
        //Email Save

        return response()->json(['data' => "success", 'error'=> true], 201);   
    }


    public function settings(){

        $user = Auth::user();
        $settings = Setting::where('id',1)->first();

        if($user["2fa_status"] == 1){
            $google2fa_secret = "";
            $qr_image = "";
            $fa_status = true;

        }else{
            $google2fa = app('pragmarx.google2fa');
            $google2fa_secret = $google2fa->generateSecretKey();

            $qr_image = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $google2fa_secret
            );
            $fa_status = false;
        }

        return view('admin.settings', ['google2fa_secret' => $google2fa_secret, 'qr_image' => $qr_image, 'fa_status' => $fa_status, 'settings' => $settings]);
    }


    public function changePassword(Request $request){
        
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
    
    public function enable2Fa(Request $request){
        
        $user = Auth::user();
        $userstatus =  $user['2fa_status'];
        $userkey =  $user['2fa_key'];

        if($userstatus==1 && $userkey!="") {

            return response()->json(['data' => "2"], 201); 
        }else{

            $secret = $request->input('secretcode');
            $oneCode = $request->input('code');

            $google2fa = app('pragmarx.google2fa');
            $valid = $google2fa->verifyKey($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
            if ($valid) {
                $user['2fa_key'] =  $secret;
                $user['2fa_status'] = 1;
                $user->save();

                return response()->json(['data' => "0"], 201);
            }else {
                //$this->Flash->error(__('Wrong code entered.Please try again.'));
                return response()->json(['data' => "1"], 201);
            }

            return response()->json(['data' => "51"], 201);
        }
    }

    public function disable2Fa(Request $request){

        if($request->input('disable') == "disable"){
            $user = Auth::user();
            $user['2fa_key'] =  "";
            $user['2fa_status'] = 0;   
            $user->save();
            return response()->json(['data' => "success"], 201);
        }     
        return response()->json(['data' => "error"], 201);     
    }

    public function masterSettings(Request $request){

        $setting = Setting::where('id',1)->first();
        $requestData = $request->all();
        $setting->update($requestData);

        return redirect()->back()->with("success","Master settings update successfully.");
    }
    

    public function redemptionUpdate(Request $request){

        $id = $request->get('sub_id');
        $subscription = Subscription::where('id',$id)->first();
        
        $redemption_status = $request->get('redemption_status');
        $redemption_msg = $request->get('redemption_msg');
        $redemption_amount = $request->get('redemption_amount');

        $subscription->redemption_status = $redemption_status;
        $subscription->redemption_msg = $redemption_msg;
        $subscription->save();

        $user_id = $subscription->user_id;
        $userEntity = User::where('id',$user_id)->first();


        if($redemption_status == 1){
            $price = Price::where('id',1)->first();
            $latest_price = $price->latest_price;
            
            $current_share = $subscription->no_of_share;
            $current_amount = $current_share*$latest_price;
            $update_amount = $current_amount - $redemption_amount;
            $redemption_no_of_share = $redemption_amount/$latest_price;
            
            $update_current_share = $subscription->no_of_share - $redemption_no_of_share;
            
            $requestData = $request->all();
            $requestData['subscription_id'] = $subscription->id;
            $requestData['current_amount'] = $update_amount;
            $requestData['redemption_amount'] = $redemption_amount;
            $requestData['latest_price'] = $latest_price;
            $requestData['no_of_share'] = $redemption_no_of_share;
            $requestData['current_value'] = $current_amount;
            $requestData['redemption_status'] = $redemption_status;
            $requestData['redemption_msg'] = $redemption_msg;
            $requestData['redemption_file'] = $subscription->redemption_file;
            $payout = Payout::create($requestData);

            Subscription::where('id',$id)->update(['latest_price'=>$latest_price, 'no_of_share'=> $update_current_share]);
        }

        //Notification Save
        $noti_sender_user_id = 1;
        $noti_receiver_user_id = $user_id;
        $noti_link = "/investor/subscriptionView/".$subscription->id;
        $investment_no = $subscription->investment_name;
        
        if($redemption_status == 1){
            $noti_message = $investment_no." - Your Redemption Request Accept";
        }else if($redemption_status == 2){
            $noti_message = $investment_no." - Your Redemption Request Reject";
        }

        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification End


        //Email Save
        $objData = new \stdClass();
        $objData->email = $userEntity->email;
        $objData->name = $userEntity->name;
        $objData->investment_no = $investment_no;
        $objData->msg = $subscription->redemption_msg;
        $objData->link = "";
        $to_email = $userEntity->email;

        if($redemption_status == 1){
            Mail::to($to_email)->send(new RedemptionApproval($objData));
        }else if($redemption_status == 2){
            Mail::to($to_email)->send(new RedemptionReject($objData));
        }    
        //Email Save

        return response()->json(['data' => "success", 'error'=> true], 201);   
    }

    public function signedPdf(Request $request, $id){

        $subscription = Subscription::with(['SsDocumentAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('id',$id)->first();

        if(empty($subscription)){
            return redirect()->back()->with("success","Your requested data not found");
        }

        $currency_word = $this->convert_number_to_words($subscription->amount);

        $pdf = PDF::loadView('pdf.singedPdf', compact('subscription', 'currency_word'));
        //return $pdf->download('userlist.pdf');
        return $pdf->inline();
    }


    public function bankPdf(Request $request, $id){

        $subscription = Subscription::with(['SsDocumentAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('id',$id)->first();

        if(empty($subscription)){
            return redirect()->back()->with("success","Your requested data not found");
        }

        $currency_word = $this->convert_number_to_words($subscription->amount);

        $pdf = PDF::loadView('pdf.bankPdf', compact('subscription', 'currency_word'));
        //return $pdf->download('userlist.pdf');
        return $pdf->inline();
    }


    private function checkAdditionalInvestment($user_id) {
        
        $subscriptionData = Subscription::where('user_id',$user_id)
                                ->where('is_first', '=', 1)
                                ->whereIn('status', [1, 2, 3, 6, 7])
                                ->first();

        if(empty($subscriptionData)){
            return 1;
        }else{
            return 0;
        }
    }

    private function convert_number_to_words($num) {

        $num = str_replace(array(',', ' '), '' , trim($num));
        if(! $num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');

        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion','sexdecillion','septendecillion','octodecillion','novemdecillion', 'vigintillion');
        
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
    }
    
}
