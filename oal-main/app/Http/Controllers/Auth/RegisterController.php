<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Country;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function showRegistrationForm()
    {
       
        $countries = Country::orderBy('name','asc')->pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        $google2fa = app('pragmarx.google2fa');
        $google2fa_secret = $google2fa->generateSecretKey();

        $qr_image = $google2fa->getQRCodeInline(
            config('app.name'),
            rand(),
            $google2fa_secret
        );

        return view('auth.register', [
                'countries' => $countries,
                'phone_prefix' => $phone_prefix,
                'google2fa_secret' => $google2fa_secret,
                'qr_image' => $qr_image,
            ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        /*$requestData = $request->all();
        $requestData['role_id'] = 1;
        $requestData['model_type'] = "App\User";*/

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        
        return $this->registered($request, $user)
            ?: redirect('/verify');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 3,
            'model_type' => "App\User",
            'salutation' => $data['salutation'],   
            'address_line1' => $data['address_line1'],
            'address_line2' => $data['address_line2'],
            'city' => $data['city'],
            'country' => $data['country'],
            'post_code' => $data['post_code'],
            'state' => $data['state'],
            'status' => 0, 
            'mobile_prefix' => $data['mobile_prefix'],
            'mobile_no' => $data['mobile_no'],
            //'last_login' => "",
            //'ip_address' => "", 
            '2fa_status' => 1, 
            '2fa_key' => $data['secretcode'],
        ]);
        $user->sendEmailVerificationNotification();

        return $user;
    }


    protected function registered(Request $request, $user)
    {
        //
    }

}
