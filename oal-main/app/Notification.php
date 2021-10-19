<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';

    protected $fillable = [
    	'sender_user_id', 'receiver_user_id', 'link', 'message', 'mark_as_seen'
    ];
                 
 	 	 	 	 	
    public function senderAs(){

        return $this->belongsTo('App\User', 'sender_user_id');
    }

    public function receiverAs(){

        return $this->belongsTo('App\User', 'receiver_user_id');
    }
}