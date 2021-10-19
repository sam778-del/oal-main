<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Subscription;
use App\Country;
use App\User;
use App\SsDocument;
use App\Flashmsg;
use App\Newsletter;
use App\UserEmails;
use App\UserEmailRecipients;
use App\Price;
use Image;
use Auth;
use Session;
use PDF;
use Mail;
use App\Mail\RedemptionMailForAdmin;
use App\Mail\RedemptionRequestForUser;
use App\Mail\ChangeBankDetailsRequestForUser;
use App\Mail\ChangeBankDetailsRequestForAdmin;
use App\Mail\NewInvestmentEmail;
use App\Mail\NewInvestmentEmailForInvester;
use App\Mail\BankSlipReupload;

class InvestorController extends Controller{
    
    /*function __construct()
    {
        $this->middleware('permission:investor-landing', ['only' => ['index']]);
        $this->middleware('permission:investor-dashboard', ['only' => ['create','store']]);
        $this->middleware('permission:investor-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:investor-delete', ['only' => ['destroy']]);
    }*/

    public function dashboard(){

        $user_id = \Auth::user()->id;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+2 months'));
        
        $flash_msg = Flashmsg::where('active', '=',1)
                                ->whereDate('start_date','<=', $start_date)
                                ->whereDate('end_date','>=', $start_date)
                                ->first();

        ////////////////////

        $ini_investment = Subscription::where('status', '=',3)
                                ->where('is_first','=', 1)
                                ->where('user_id','=', $user_id)
                                ->get();
        $ini_investment_count = $ini_investment->count();

        $add_investment = Subscription::where('status', '=',3)
                                ->where('is_first','=', 0)
                                ->where('user_id','=', $user_id)
                                ->get();
        $add_investment_count = $add_investment->count();


        $total_investment_count = $ini_investment_count + $add_investment_count;
        
        if($ini_investment_count != 0){
            $initial_avg = $ini_investment_count * 100 / $total_investment_count;
        }else{
            $initial_avg = 0;
        }
        
        if($add_investment_count != 0){
            $addinitial_avg = $add_investment_count * 100 / $total_investment_count;
        }else{
            $addinitial_avg = 0;
        }
        
        $initial_obj=[];
        $initial_obj[] = array(
                    'value' => number_format($initial_avg, 2),
                    'label' => "Initial Investment"
                );
        $initial_obj[] = array(
                    'value' => number_format($addinitial_avg, 2),
                    'label' => "Additional Investment"
                );

        //////////////////
        $active_investment = Subscription::where('status', '=',3)
                                ->where('user_id','=', $user_id)
                                ->get();
        $total_active_investment = $active_investment->count();
        //////////////////
        $active_investment_sum = Subscription::where('status', '=',3)
                                ->where('user_id','=', $user_id)
                                ->sum('amount');
        //////////////////
        $payouts = Subscription::with(['PayoutAs'])
                                ->where('status', '=',3)
                                ->where('user_id',$user_id)
                                ->get();                       
        //////////////////

       

        return view('investor.dashboard', compact('flash_msg', 'initial_obj', 'total_active_investment', 'active_investment_sum', 'payouts'));
    }

    public function profile(){
        $user_id = \Auth::user()->id;
        $userData = User::with(['countryAs', 'stateAs'])->findOrFail($user_id);

        return view('investor.profile', ['userData' => $userData]);
    }

    //Subscription Details
    public function subscriptions(Request $request){
        
        $user_id = \Auth::user()->id;
        $search =  $request->input('q');
        if($search!=""){
            $subscriptions = Subscription::where(function ($query) use ($search){
                $query->where('user_id', '=', $user_id)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('investment_name', 'like', '%'.$search.'%')
                    ->orWhere('investment_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $subscriptions->appends(['q' => $search]);
        }
        else{
            $subscriptions = Subscription::where(['user_id' => $user_id])->latest()->paginate(10);
        }

        $check_investment = $this->checkAdditionalInvestment();

        return view('investor.subscriptions', ['subscriptions' => $subscriptions, 'check_investment' => $check_investment]);
    }

    public function subscriptionView($id){ 
        
        $user_id = \Auth::user()->id;
        $subscription = Subscription::with(['SsDocumentAs', 'PayoutAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])
                ->where('id',$id)
                ->where('user_id',$user_id)
                ->first();
        
        $price = Price::where('id',1)->where('active',1)->first();
        
        if(!$subscription){
           return redirect('/investor/subscriptions')->with('error', 'requested page not found');
        }
        return view('investor.subscriptionView',['subscription'=> $subscription, 'price' => $price]);
    }


    public function subscriptionInitialCreate(Request $request){
        
        $user_id = \Auth::user()->id;
        $userData = User::findOrFail($user_id);
        $request->session()->forget('subscription_id');
        $additional = false;
        
        $subscriptionData = Subscription::with('SsDocumentAs')->where('user_id',$user_id)->first();
        if(!empty($subscriptionData)){

            $request->session()->put('subscription_id', $subscriptionData->id);
            $subscription = $subscriptionData;
            $edit = true;
        }else{
            $edit = false;
            $subscription = "";
        }

        $countries = Country::pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        return view('investor.subscriptionCreate', ['edit' => $edit, 'countries'=> $countries, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'additional' => $additional]);
    }

    public function subscriptionAdditionCreate(Request $request){
        
        $user_id = \Auth::user()->id;
        $userData = User::findOrFail($user_id);
        $request->session()->forget('subscription_id');
        $additional = false;
        $edit = false;
        
        $subscriptionData = Subscription::with('SsDocumentAs')->where('user_id',$user_id)->where('is_first',1)->first();
        if(!empty($subscriptionData)){

            $subscription = $subscriptionData;
            $edit = true;
        }else{
            $subscription = "";
        }

        $countries = Country::pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);
        
        $check_additional = $this->checkAdditionalInvestment();
        if($check_additional == 0){
            $amount = config('settings.additional_amount');
            $additional = true;
        }

        return view('investor.subscriptionAdditionCreate', ['edit' => $edit, 'countries'=> $countries, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'additional' => $additional]);
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
        $user_id = \Auth::user()->id;
        $userData = User::findOrFail($user_id);
        $countries = Country::pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);
        
        $check_additional = $this->checkAdditionalInvestment();
        if($check_additional == 0){
            $amount = config('settings.additional_amount');
            $additional = true;
        }

        return view('investor.subscriptionEdit', ['edit' => $edit, 'countries'=> $countries, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'additional' => $additional]);
    }

    public function subscriptionSave(Request $request){
        
        $subscription_id = $request->session()->get('subscription_id');

        $requestData = $request->all();
        $requestData['user_id'] = Auth::user()->id;
        $requestData['is_first'] = $this->checkAdditionalInvestment();
        $requestData['status'] = 1;
        $requestData['investment_no'] = config('settings.investment_no');

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);

            $originalImage= $request->file('file');
            if(!empty($originalImage)){
                
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $originalImage->storeAs('manualSignedDoc', $fileName, 'public');
    
                $image_name = $filePath;
            }else{
                $image_name = "";
            }
            
            $requestData['manual_signed_doc'] = $image_name;
            $requestData['manual_signed_doc_enable'] = 1;

            $subscription->update($requestData);
        }else{
            $requestData = $request->all();
            $subscription = Subscription::create($requestData);
        }
        
        $increntNo = new User();
        $increntNo->updateInvestmentNo();

        $request->session()->forget('subscription_id');
        if($subscription){

            //Notification Save
            $noti_sender_user_id = Auth::user()->id;
            $noti_receiver_user_id = 1;
            $noti_link = "/subscriptionView/".$subscription->id;
            $investment_no = $subscription->investment_name;
            $noti_message = $investment_no." New Investment Email";
            
            $notification = new User;
            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            //Notification END

            //Email For admin
            $objData = new \stdClass();
            $objData->email = Auth::user()->email;
            $objData->name = Auth::user()->name;
            $objData->investment_no = $investment_no;
            $objData->msg = "";
            $objData->link = "";
            $to_email = config('settings.from_email');

            Mail::to($to_email)->send(new NewInvestmentEmail($objData));
            //Email admin


            //Email For Investor
            $objData = new \stdClass();
            $objData->email = Auth::user()->email;
            $objData->name = Auth::user()->name;
            $objData->investment_no = $investment_no;
            $objData->msg = "";
            $objData->link = "";
            $to_email = Auth::user()->email;

            Mail::to($to_email)->send(new NewInvestmentEmailForInvester($objData));
            //Email Investor

            $request->session()->put('subscription_id', $subscription->id);
            return response()->json(['data' => "success"], 201); 
        }else{

            return response()->json(['data' => "error"], 201); 
        }
    }


    public function subscriptionSaveDraft(Request $request){
        
        $subscription_id = $request->session()->get('subscription_id');
        $requestData = $request->all();
        $requestData['user_id'] = Auth::user()->id;
        $requestData['status'] = 0;
        $requestData['investment_no'] = config('settings.investment_draft_no');

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $subscription->update($requestData);
            
        }else{

            $subscription = Subscription::create($requestData);
            $increntDroftNo = new User();
            $increntDroftNo->updateInvestmentNoDraft();
            
            $this->copyDocument($subscription->id);
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

        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('manualSignedDoc', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }
        
        $requestData['manual_signed_doc'] = $image_name;
        $requestData['manual_signed_doc_enable'] = 1;
        
        $subscription->update($requestData);
        
        if($subscription){
            //Notification Save
            $noti_sender_user_id = Auth::user()->id;
            $noti_receiver_user_id = 1;
            $noti_link = "/subscriptionView/".$subscription->id;
            $investment_no = $subscription->investment_name;
            $noti_message = $investment_no." New Investment Email";
            
            $notification = new User;
            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            //Notification END

            //Email For admin
            $objData = new \stdClass();
            $objData->email = Auth::user()->email;
            $objData->name = Auth::user()->name;
            $objData->investment_no = $investment_no;
            $objData->msg = "";
            $objData->link = "";
            $to_email = config('settings.from_email');

            Mail::to($to_email)->send(new NewInvestmentEmail($objData));
            //Email admin


            //Email For Investor
            $objData = new \stdClass();
            $objData->email = Auth::user()->email;
            $objData->name = Auth::user()->name;
            $objData->investment_no = $investment_no;
            $objData->msg = "";
            $objData->link = "";
            $to_email = Auth::user()->email;

            Mail::to($to_email)->send(new NewInvestmentEmailForInvester($objData));
            //Email Investor

            $request->session()->put('subscription_id', $subscription->id);
            return response()->json(['data' => "success"], 201); 
        }else{

            return response()->json(['data' => "error"], 201); 
        }
          
    }


    public function subscriptionEditSaveDraft(Request $request){
        
        $requestData = $request->all();
        $subscription_id = $request->input('id');
        
        $subscription = Subscription::find($subscription_id);
        $subscription->update($requestData);
        
        return response()->json(['data' => "success"], 201); 
       
    }
    //Investment Details End


    //Newslatter Details
    public function newsletters(){
        
        $news = Newsletter::where('active', '=',1)->latest()->paginate(10);
        return view('investor.newsletters.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function newsletterShow($id){

        $news = Newsletter::where('active', '=',1)->where('id',$id)->first();
        if(!$news){
           return redirect('/investor/newsletters')->with('error', 'requested page not found');
        }

        return view('investor.newsletters.show',compact('news'));
    }
    //Newslatter Details End


    public function messages(){

        $user_id = Auth::user()->id;
        $messages = UserEmailRecipients::with('user_emailAs')->where('user_id', $user_id)->latest()->paginate(10);

        return view('investor.messages.index',compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function messagesShow($id){

        $user_id = Auth::user()->id;
        $msg = UserEmails::with('recipientAs')->where('id',$id)->first();
        if(!$msg){
           return redirect('/investor/messages')->with('error', 'requested page not found');
        }

        return view('investor.messages.show',compact('msg'));
    }

    //Flash Messages Details
    public function flashmsgs(Request $request){
        
        $flashmsgs = Flashmsg::where('active', '=',1)->latest()->paginate(10);
            return view('investor.flashmsgs.index',compact('flashmsgs'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function flashmsgView(Request $request, $id){
        
        $flashmsg = Flashmsg::where('active',1)->where('id',$id)->first();
        if(!$flashmsg){
           return redirect('/flashmsgs')->with('error', 'requested page not found');
        }

        return view('investor.flashmsgs.show',compact('flashmsg'));
    }
    //Flash Messages Details End

    public function settings(){
        
        $user = Auth::user();

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

        return view('investor.settings', ['google2fa_secret' => $google2fa_secret, 'qr_image' => $qr_image, 'fa_status' => $fa_status]);
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

    public function signedPdf(Request $request, $id){

        $user_id = Auth::user()->id;
        $subscription = Subscription::with(['SsDocumentAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('user_id', $user_id)->where('id',$id)->first();

        if(empty($subscription)){
            return redirect()->back()->with("success","Your requested data not found");
        }

        $currency_word = $this->convert_number_to_words($subscription->amount);

        $pdf = PDF::loadView('pdf.singedPdf', compact('subscription', 'currency_word'));
        //return $pdf->download('userlist.pdf');
        return $pdf->inline();
    }

    public function signedPdfDownload(Request $request){

        $subscription_id = $request->session()->get('subscription_id');
        if(!empty($subscription_id)){
            $user_id = Auth::user()->id;
            $subscription = Subscription::with(['SsDocumentAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('user_id', $user_id)->where('id',$subscription_id)->first();
    
            if(empty($subscription)){
                return "";
            }
    
            $currency_word = $this->convert_number_to_words($subscription->amount);
    
            $pdf = PDF::loadView('pdf.singedPdf', compact('subscription', 'currency_word'));
            return $pdf->download('signed-application.pdf');
        }else{
            return "";
        }
    }


    public function bankPdf(Request $request, $id){

        $user_id = Auth::user()->id;
        $subscription = Subscription::with(['SsDocumentAs', 'UserAs', 'SubscriptionCountryAs', 'SubscriptionStateAs', 'SubscriptionJaCountryAs', 'SubscriptionJaStateAs', 'SubscriptionOsCountryAs', 'SubscriptionOsStateAs'])->where('user_id', $user_id)->where('id',$id)->first();

        if(empty($subscription)){
            return redirect()->back()->with("success","Your requested data not found");
        }

        $currency_word = $this->convert_number_to_words($subscription->amount);

        $pdf = PDF::loadView('pdf.bankPdf', compact('subscription', 'currency_word'));
        //return $pdf->download('userlist.pdf');
        return $pdf->inline();
    }

    public function uploadBankslip(){

        $user_id = Auth::user()->id;
        $subscriptions = Subscription::with(['SsDocumentAs'])->where(['user_id' => $user_id, 'bank_doc_request' => 1])->get();

        return view('investor.bankslip')->with('subscriptions',$subscriptions);
    }
    
    public function uploadBankslipSave(Request $request){

        $user_id = Auth::user()->id;
        $subscription_id = $request->get('sub_att_id');

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
            $requestData['main_type'] = 7;
            $requestData['sub_type'] = 71;
            $requestData['file'] = $image_name;
            $requestData['remarks'] = "Bank Slip";

            $ssDocumentData = SsDocument::where(['subscription_id' => $subscription_id, 'main_type' => 7, 'sub_type' => 71])->first();

            if(!empty($ssDocumentData)){

                $ssDocument = SsDocument::find($ssDocumentData->id);
                $ssDocument->update($requestData);
            }else{

                $ssDocument = SsDocument::create($requestData);
            }   

            //Notification Save
            $subscription = Subscription::find($subscription_id);
            $noti_sender_user_id = $user_id;
            $noti_receiver_user_id = 1;
            $noti_link = "/subscriptionView/".$subscription->id;
            $investment_no = $subscription->investment_name;
            $noti_message = $investment_no." The Bank Slip";
            
            $notification = new User;
            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            //Notification END

            $requestData = $request->all();
            $requestData['bank_doc_request_hidden'] = 1;
            $subscription->update($requestData);


            //Email Save
            $objData = new \stdClass();
            $objData->email = Auth::user()->email;
            $objData->name = Auth::user()->name;
            $objData->investment_no = $investment_no;
            $objData->msg = "";
            $objData->link = "";
            $to_email = config('settings.from_email');

            Mail::to($to_email)->send(new BankSlipReupload($objData));
            //Email Save

            return response()->json(['data' => "success"], 201);   
        }
    }

    public function changeBankDetailsUpload(Request $request){

        $user_id = Auth::user()->id;
        $id = $request->get('sub_att_id');

        $subscription = Subscription::where('user_id', $user_id)->where('id',$id)->first();
                        
        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('bank_details', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }
         
        $subscription->changebank_file = $image_name;
        $subscription->changebank_request = 1;
        $subscription->changebank_status = 0;
        $subscription->changebank_msg = "";
        $subscription->save();

        //Notification Save
        $noti_sender_user_id = $user_id;
        $noti_receiver_user_id = 1;
        $noti_link = "/subscriptionView/".$subscription->id;
        $investment_no = $subscription->investment_name;
        $noti_message = $investment_no." The Bank Details Change Request";
        
        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification END


        //Email Save
        $objData = new \stdClass();
        $objData->email = Auth::user()->email;
        $objData->name = Auth::user()->name;
        $objData->investment_no = $investment_no;
        $objData->msg = "";
        $objData->link = "";
        $to_email = config('settings.from_email');

        Mail::to(Auth::user()->email)->send(new ChangeBankDetailsRequestForUser($objData));
        Mail::to($to_email)->send(new ChangeBankDetailsRequestForAdmin($objData));
        //Email Save

        return response()->json(['data' => "success"], 201);   
    }


    public function redemptionUpload(Request $request){

        $user_id = Auth::user()->id;
        $id = $request->get('sub_att_id');

        $subscription = Subscription::where('user_id', $user_id)->where('id',$id)->first();
                        
        $originalImage= $request->file('file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $originalImage->storeAs('redemption', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }
         
        $subscription->redemption_file = $image_name;
        $subscription->redemption_request = 1;
        $subscription->redemption_status = 0;
        $subscription->redemption_msg = "";
        $subscription->save();

        //Notification Save
        $noti_sender_user_id = $user_id;
        $noti_receiver_user_id = 1;
        $noti_link = "/subscriptionView/".$subscription->id;
        $investment_no = $subscription->investment_name;
        $noti_message = $investment_no." The Redemption Request";
        
        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification END


        //Email Save
        $objData = new \stdClass();
        $objData->email = Auth::user()->email;
        $objData->name = Auth::user()->name;
        $objData->investment_no = $investment_no;
        $objData->msg = "";
        $objData->link = "";
        $to_email = config('settings.from_email');

        Mail::to(Auth::user()->email)->send(new RedemptionRequestForUser($objData));
        Mail::to($to_email)->send(new RedemptionMailForAdmin($objData));
        //Email Save

        return response()->json(['data' => "success"], 201);   
    }


    public function reinvestRequest(Request $request, $id){

        $user_id = Auth::user()->id;
        $subscription = Subscription::where('user_id', $user_id)->where('id',$id)->first();

        $subscription->reinvestment_request = 1;
        $subscription->save();

        //Notification Save
        $noti_sender_user_id = $user_id;
        $noti_receiver_user_id = 1;
        $noti_link = "/subscriptionView/".$subscription->id;
        $investment_no = $subscription->investment_name;
        $noti_message = $investment_no." The Re-Investment Request";
        
        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification END

        return response()->json(['data' => "success"], 201);   

    }

    
    private function copyDocument($subscription_id) {
        
        $user_id = \Auth::user()->id;
        $subscriptionData = Subscription::with('SsDocumentAs')->where('user_id',$user_id)->where('is_first',1)->first();
    
        if(!empty($subscriptionData['SsDocumentAs'])){
            $ssDocumentAs = $subscriptionData['SsDocumentAs'];
            foreach ($ssDocumentAs as $document) {
                      
                $id = $document['id'];
                $main_type = $document['main_type'];
                $sub_type = $document['sub_type'];
                $file = $document['file'];
                $name = $document['remarks'];
                
                $requestData = new SsDocument;
                $requestData->subscription_id = $subscription_id;
                $requestData->main_type = $main_type;
                $requestData->sub_type = $sub_type;
                $requestData->file = $file;
                $requestData->remarks = $name;
                $requestData->save();
            }
        }
    }
    
    private function checkAdditionalInvestment() {
        
        $user_id = Auth::user()->id;
        $subscriptionData = Subscription::where('user_id',$user_id)
                                ->where('is_first', '=', 1)
                                ->whereIn('status', [1, 2, 3, 6, 7])
                                ->first();

        if(empty($subscriptionData)){
            return 1;//initi
        }else{
            return 0;//additinal
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
