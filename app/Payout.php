<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{

    protected $table = 'payouts';

    protected $fillable = [
        'subscription_id', 'current_amount', 'redemption_amount', 'redemption_status', 'redemption_msg', 'redemption_file',  'latest_price', 'no_of_share'
    ];
                 
 	 	 	 	 	
    public function SubscriptionAs(){

        return $this->belongsTo('App\Subscription', 'subscription_id');
    }
}

