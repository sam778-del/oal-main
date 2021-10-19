<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use App\Subscription;
use App\Notification;

class SetViewVariables
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        
        if (Auth::user()) {

            $user_id = Auth::user()->id;
            
            $current_link = '/'.request()->path();
            $notificationGobal2 = Notification::where(['receiver_user_id' => $user_id, 'link' => $current_link, 'mark_as_seen' => 0])
                                    ->orderBy('id','DESC')
                                    ->first();
            
            if(!empty($notificationGobal2)){
                $notificationGobal22 = Notification::find($notificationGobal2->id);
                $requestData = $request->all();
                $requestData['mark_as_seen'] = 1;
                $notificationGobal22->update($requestData);
            }
            
            $notificationGobal = Notification::where(['receiver_user_id' => $user_id, 'mark_as_seen' => 0])
                                    ->orderBy('id','DESC')
                                    ->get();


            $subscriptionGobal = Subscription::with('UserAs')
                            ->where(['user_id' => $user_id, 'bank_doc_request' => 1 ])
                            ->first();
            
            
        }else{
            config()->set('notificationGobal', []);
            config()->set('subscriptionGobal', []);
        }

        view()->share(['notificationGobal'=> $notificationGobal, 'subscriptionGobal'=> $subscriptionGobal]);

        return $next($request);
    }

}
