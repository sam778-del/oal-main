<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Log;
use Closure;
use Illuminate\Http\Request;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */


    public function handle($request, Closure $next, $guard = null)
    {
         
         /*if (Auth::user()) {
            Log::info("1111111");

            $allowUrl = $this->allowUrl();

            $currentAction = \Route::currentRouteAction();
            list($controller, $method) = explode('@', $currentAction);
            $controller = preg_replace('/.*\\\/', '', $controller);

            $role = auth::user()->role; 

            if(in_array($controller, $allowUrl)){ 
                return $next($request);

            }else(Auth::user()->email_verified == 0){

                return redirect('/verify');
            }
        }else{
            return redirect('/login');
        }*/

        return $next($request);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }


    protected function allowUrl(){

        $allowUrl = ["EmailVerificationController"];
        return $allowUrl;

    }

}
