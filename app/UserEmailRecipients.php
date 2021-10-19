<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UserEmailRecipients extends Model
{

    protected $table = 'user_email_recipients';

    protected $fillable = [
    	'user_email_id', 'user_id', 'email_address', 'is_email_sent'
    ];
                 
 	 	 	 	 	
    public function user_emailAs(){

        return $this->belongsTo('App\UserEmails', 'user_email_id');
    }

    public function userAs(){

        return $this->belongsTo('App\User', 'user_id');
    }
}