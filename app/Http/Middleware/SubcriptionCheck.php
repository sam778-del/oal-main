<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Log;
use Closure;
use App\User;
use App\Subscription;

class SubcriptionCheck extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */


    public function handle($request, Closure $next, $guard = null)
    {
         
        if (!Auth::user()) {
            return redirect('/login');
        }

        $user_id = Auth::user()->id;
        $role = auth::user()->role; 
        $user = User::findOrFail($user_id);

        if($user->hasRole('Invester')){
            
            if($user['email_verified'] == 0){
                return redirect('/verify');
            }

            $subscription = Subscription::where('user_id',$user_id)->orderBy('created_at', 'ASC')->first();
            if(!empty($subscription)){
                if($subscription['status'] == 0){

                    return redirect('/investor/subscriptionCreate');
                }else if(($subscription['status'] == 1) || ($subscription['status'] == 4) || ($subscription['status'] == 5)){

                    return redirect('/landing');
                }else{ 

                    return $next($request);
                }
            }else{
                return redirect('/investor/subscriptionCreate');
            }   
        }
        return redirect('/denied');
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
