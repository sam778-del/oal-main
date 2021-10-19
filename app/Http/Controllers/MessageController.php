<?php

namespace App\Http\Controllers;
use App\Message;
use App\User;
use App\Subscription;
use App\UserEmails;
use App\UserEmailRecipients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use Session;
use Mail;
use App\Mail\Messagetemplates;

class MessageController extends Controller
{

    /*function __construct()
    {
        $this->middleware('permission:flashmsg-list', ['only' => ['index']]);
        $this->middleware('permission:flashmsg-create', ['only' => ['create','store']]);
        $this->middleware('permission:flashmsg-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:flashmsg-delete', ['only' => ['destroy']]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = UserEmails::latest()->paginate(10);
        return view('admin.messages.index',compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $edit = false;
        $country_result = User::where('status', '=', 1)
				        ->where('role_id', '!=', 2)
				        ->with('countryAs')->get();

		$userCountrys = [];
		
		foreach($country_result as $row) {
			$userCountrys[$row['country']] = $row['countryAs']['name'];			
		}
		$userCountrys = array_unique($userCountrys);
        
        return view('admin.messages.create',compact('userCountrys', 'edit'));
    }
    
    public function setpTwo(Request $request){
        
        $request->session()->forget('sendDatas');

        $requestData = $request->all();
        $type = $requestData['type'];
        $to_email = $requestData['to_email'];
        $sendDatas = [];
        $sendUserDatas =[];
        $sendDatas['type'] = $requestData['type'];
        $sendDatas['from_name'] = $requestData['from_name'];
        $sendDatas['from_email'] = $requestData['from_email'];
        $sendDatas['subject'] = $requestData['subject'];
        $sendDatas['message'] = $requestData['message'];
        

        $originalImage= $request->file('attachment');
        if(!empty($originalImage)){
            

            $fileName = time().'_'.$originalImage->getClientOriginalName();
            $filePath = $originalImage->storeAs('mailattach', $fileName, 'public');
            
            $attach = asset('storage/'.$filePath);

            $sendDatas['attach_name'] = $filePath;
        }else{
            $sendDatas['attach_name'] = "";
        }
        
        $userEmailEntity = [];
		
		if($type == "GROUPS"){
		    
		    $subscriber_type = $requestData['subscriber_type'];
		    $userEmailEntity['group_list'] = explode(',', $subscriber_type);
		    
		    $typeArray = [];
		    foreach($userEmailEntity['group_list'] as $groupId) {
    			$typeArray[] = $groupId;
		    }
		    
		    $subscription = Subscription::whereIn('status', $typeArray)->get();
            $userTypes = [];
		    
		    $i = 0;
    		foreach($subscription as $row) {
    			$userTypes[$i] = $row['user_id'];	
    			$i++;
    		}
    		$userTypes = array_unique($userTypes);
		    
		    $usersData = User::where('status', '=', 1)
				        ->where('role_id', '!=', 2)
				        ->whereIn('id', $userTypes)->get();
				        

		    $i = 0;
			foreach($usersData as $user) {
				$sendUserDatas[$i]['email'] = $user['email'];
				$sendUserDatas[$i]['id'] = $user['id'];
				$sendUserDatas[$i]['name'] = $user['name'];
				$i++;
			}
			
		}else if($type == "COUNTRY"){
		    
		    $user_country = $requestData['user_country'];
		    $userEmailEntity['group_list'] = explode(',', $user_country);
		    $typeArray = [];
		    foreach($userEmailEntity['group_list'] as $groupId) {
    			$typeArray[] = $groupId;
		    }
		    
		    $usersData = User::where('status', '=', 1)
				        ->where('role_id', '!=', 2)
				        ->whereIn('country', [$typeArray])->get();
			$i = 0;	        
			foreach($usersData as $user) {
				$sendUserDatas[$i]['email'] = $user['email'];
				$sendUserDatas[$i]['id'] = $user['id'];
				$sendUserDatas[$i]['name'] = $user['name'];
				$i++;
			}	        
				        
		}else if($type == "MANUAL"){
		    $emails = array_filter(array_map('trim', explode(',', strtolower($to_email))));
			
			$i = 0;
			foreach($emails as $email) {
				$sendUserDatas[$i]['email'] = $email;
				$sendUserDatas[$i]['id'] = null;
				$sendUserDatas[$i]['name'] = null;
				$i++;
			}
		}else{
		    
		    return redirect()->back()->with("error","Please select type.");
		}
		
		$sendDatas['users'] = $sendUserDatas;

        if(empty($sendDatas['users'])){
            return redirect()->back()->with("error","This groups or country not found any users !!!");   
        }

        $request->session()->put('sendDatas', $sendDatas);
		return view('admin.messages.confirm',compact('sendDatas', 'edit'));
    }
    
    public function confirm(Request $request){
        
        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 5200);

        $emailcheck = $request->get('emailcheck');
        $email = $request->get('email');
        $uid = $request->get('uid');

        $users = [];
        $i =0;
        foreach($emailcheck as $key => $value) {
            if(isset($value) && $email[$key] && !empty($email[$key])) {
                $users[$i]['id'] = $uid[$key];
                $users[$i]['email'] = $email[$key];
                $i++;
            }
        }

		$sendDatas = $request->session()->get('sendDatas');

        if(!empty($users)){

        	$requestData = [];
            $requestData['type'] = $sendDatas['type'];
            $requestData['from_name'] = $sendDatas['from_name'];
            $requestData['from_email'] = $sendDatas['from_email'];
            $requestData['subject'] = $sendDatas['subject'];
            $requestData['message'] = $sendDatas['message'];
            $requestData['attachment'] = $sendDatas['attach_name'];

            $userEmails = UserEmails::create($requestData);
		  
            foreach ($users as $data) {
                
                $objDemo = new \stdClass();
                $objDemo->email = "";

                if(!empty($sendDatas['attach_name'])){
                    $attach = asset('storage/'.$sendDatas['attach_name']);
                    //$attach = asset('storage/icons/icon-144x144.png');
                    
                }else{
                    $attach = "";
                }

                Mail::to($data['email'])
                        ->send(new Messagetemplates($objDemo, $sendDatas['from_name'], $sendDatas['from_email'], $sendDatas['subject'], $sendDatas['message'], $attach));

                $requestData2 = [];
                $requestData2['user_email_id'] = $userEmails->id;
                $requestData2['user_id'] = $data['id'];
                $requestData2['email_address'] = $data['email'];
                $requestData2['is_email_sent'] = 1;

                $UserEmailRecipients = UserEmailRecipients::create($requestData2);

            }

        }
		return redirect('/messages')->with('success', 'Messages sent succesfully');
    }
     
  
    public function show($id)
    {
        $msg = UserEmails::with('recipientAs')->where('id',$id)->first();
        if(!$msg){
           return redirect('/messages')->with('error', 'requested page not found');
        }

        return view('admin.messages.show',compact('msg'));
    }

    public function destroy($id)
    {
        UserEmails::find($id)->delete();
        return redirect()->route('messages.index')
                        ->with('success','Messages deleted successfully');
    }
}
