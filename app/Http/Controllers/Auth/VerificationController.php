<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Subscription;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request){

        if (auth()->user()){
            return $request->user()->hasVerifiedEmail()
                ? redirect($this->redirectPath())
                : view('auth.verify');
        }else{
            return $request->user()
                ? redirect($this->redirectPath())
                : redirect('/login');
        }

    }

    public function verify(Request $request){

        $user = User::findOrFail($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        
        return redirect($this->redirectPath())->with('verified', true);
    }


    public function resend(Request $request)
    {
        if (auth()->user()){
            if ($request->user()->hasVerifiedEmail()) {
                return $request->wantsJson()
                            ? new Response('', 204)
                            : redirect($this->redirectPath());
            }
    
            $request->user()->sendEmailVerificationNotification();
    
            $request->session()->flash('success', 'User was successful added!');
    
            return $request->wantsJson()
                        ? new Response('', 202)
                        : back()->with('resent', true)->with('success','Email sent, please check your inbox');
        }else{
            return $request->user()
                ? redirect($this->redirectPath())
                : redirect('/login');
        }
    }
}
