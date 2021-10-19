<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Log;
use Closure;
use App\User;
use App\Subscription;

class AdminCheck extends Middleware
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
        
        if($user->hasRole('Admin')){

            return $next($request);
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
