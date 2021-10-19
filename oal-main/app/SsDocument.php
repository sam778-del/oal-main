<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class SsDocument extends Model
{

    protected $table = 'ss_documents';

    protected $fillable = [
        'subscription_id', 'main_type', 'sub_type', 'file', 'remarks', 'notification'
    ];
                 
 	 	 	 	 	
    public function SsDocumentAs(){

        return $this->belongsTo('App\Subscription', 'subscription_id');
    }
}