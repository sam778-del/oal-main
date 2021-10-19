<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Subscription;
use App\Country;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {

        $user = \Auth::user();
        print_r($user);

        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/

    public function index(Request $request){

        $request->session()->put('back', "index");

        $search =  $request->input('q');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('active', '=', 1)
                    ->where('email_verified', '=', 1)
                    ->where('role_id', '!=', 2)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('mobile_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $users->appends(['q' => $search]);
        }
        else{
            $users = User::where(['active' => 1, 'email_verified'=>1])->where('role_id', '!=', 2)->latest()->paginate(10);
        }

        return view('admin.users.index')->with(['users' =>$users, 'title'=> "Active Investors"]);
    }

    public function investerDeactive(Request $request){

        $request->session()->put('back', "investerDeactive");

        $search =  $request->input('q');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
               $query->where('status', '=', 0)
                    ->where('role_id', '!=', 2)
                    ->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('mobile_no', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $users->appends(['q' => $search]);
        }
        else{
            $users = User::where(['status' => 0])->where('role_id', '!=', 2)->latest()->paginate(10);
        }
        return view('admin.users.index')->with(['users' =>$users, 'title'=> "Deactive Investors"]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $roles = Role::pluck('name','name')->all();
        $phone_prefixData = Country::orderBy('id','ASC')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            $phone_prefix[$value->calling_code] = "+(".$value->calling_code.")-".$value->name;
        }

        return view('admin.users.create',compact('roles', 'countries', 'phone_prefix'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = 3;
        $input['email_verified_at'] = $this->freshTimestamp();
        $input['email_verified'] = 1;
        $input['model_type'] = "App\User";
        $input['status'] = 0;


        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $back = $request->session()->get('back');

        if(!empty($back)){
            if($back == "index"){
                return redirect()->route('users.index')
                        ->with('success','User created successfully');
            }else{
                return redirect('/deactive-invester')
                        ->with('success','User created successfully');
            }
        }

        return redirect('/')->route('users.index')
                        ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['countryAs', 'stateAs'])->find($id);
        $subscriptions = Subscription::where(['user_id' => $user->id])->get();

        return view('admin.users.show',compact('user', 'subscriptions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $countries = Country::pluck('name', 'id');
        $phone_prefixData = Country::orderBy('id','ASC')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            $phone_prefix[$value->calling_code] = "+(".$value->calling_code.")-".$value->name;
        }

        return view('admin.users.edit',compact('user','roles','userRole', 'countries', 'phone_prefix'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();       
        $user = User::find($id);
        $user->update($input);

        //DB::table('model_has_roles')->where('model_id',$id)->delete();
        //$user->assignRole($request->input('roles'));

        $back = $request->session()->get('back');
        if(!empty($back)){
            if($back == "index"){
                return redirect()->route('users.index')
                        ->with('success','User created successfully');
            }else{
                return redirect('/deactive-invester')
                        ->with('success','User created successfully');
            }
        }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    public function userChangePassword(Request $request, $id){
        
        $userData = User::find($id);
        if (empty($userData)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }
        return view('admin.users.userChangePassword', ['user' => $userData]);
    }
    
    public function userChangePasswordSave(Request $request, $id){
        
        $userData = User::find($id);
        
        if (empty($userData)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }
        
        if (!(Hash::check($request->get('current_password'), $userData->password))) {
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
        $userData->password = Hash::make($request->get('new_password'));
        $userData->save();
    
        $back = $request->session()->get('back');

        if(!empty($back)){
            if($back == "index"){
                return redirect()->route('users.index')
                        ->with('success','Password changed successfully');
            }else{
                return redirect('/deactive-invester')
                        ->with('success','Password changed successfully');
            }
        }
        
        return redirect()->back()->with("success","Password changed successfully !");
    }
    
     public function enable2FaUser(Request $request, $id){
         
        $userData = User::find($id);
        $google2fa = app('pragmarx.google2fa');
        $google2fa_secret = $google2fa->generateSecretKey();

        $qr_image = $google2fa->getQRCodeInline(
            config('app.name'),
            $userData->email,
            $google2fa_secret
        );

        return view('admin.users.enable2FaUser', ['google2fa_secret' => $google2fa_secret, 'qr_image' => $qr_image, 'user' =>$userData]);
     }
     
     
    public function enable2FaUserSave(Request $request, $id){
        
        $userData = User::find($id);
        
        $secret = $request->input('secretcode');
        $oneCode = $request->input('code');

        $google2fa = app('pragmarx.google2fa');
        $valid = $google2fa->verifyKey($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
        if ($valid) {
            $userData['2fa_key'] =  $secret;
            $userData['2fa_status'] = 1;
            $userData->save();

            //return response()->json(['data' => "0"], 201);
        }
        
        $back = $request->session()->get('back');

        if(!empty($back)){
            if($back == "index"){
                return redirect()->route('users.index')
                        ->with('success','Password changed successfully');
            }else{
                return redirect('/deactive-invester')
                        ->with('success','Password changed successfully');
            }
        }
        
        return redirect()->back()->with("success","Password changed successfully !");
    }
    
    public function disable2FaUser(Request $request){
        
        $id = $request->input('id');
        $userData = User::find($id);
        if (empty($userData)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }
        
        if($request->input('disable') == "disable"){
            $userData['2fa_key'] =  "";
            $userData['2fa_status'] = 0;   
            $userData->save();
            return response()->json(['data' => "success"], 201);
        }     
        return response()->json(['data' => "error"], 201);     
    }
    
    public function activeUser(Request $request){
        
        $id = $request->input('id');
        $userData = User::find($id);
        if (empty($userData)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }
        
        if($request->input('active') == "active"){
            $userData['active'] = 1;   
            $userData->save();
            return response()->json(['data' => "success"], 201);
        }     
        return response()->json(['data' => "error"], 201);     
    }
    
    public function deactiveUser(Request $request){
        
        $id = $request->input('id');
        $userData = User::find($id);
        if (empty($userData)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }
        
        if($request->input('deactive') == "deactive"){
            $userData['active'] = 0;   
            $userData->save();
            return response()->json(['data' => "success"], 201);
        }     
        return response()->json(['data' => "error"], 201);     
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        $back = $request->session()->get('back');
        if(!empty($back)){
            if($back == "index"){
                return redirect()->route('users.index')
                        ->with('success','User created successfully');
            }else{
                return redirect('/deactive-invester')
                        ->with('success','User created successfully');
            }
        }
        
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}