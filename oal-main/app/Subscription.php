<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	protected $table = 'subscriptions';

    protected $fillable = [
        'user_id','salutation', 'investment_name', 'investment_no', 'commencement_date', 'maturity_date', 'name', 'address_line1', 'address_line2', 'city', 'country', 'post_code', 'state', 'amount', 'cheque_no', 'remittance_bank', 'service_charge', 'bank_charge', 'bank_name', 'bank_address', 'account_name', 'account_number', 'swift_address', 'bank_inan', 'reference', 'is_joint_account', 'ja_name', 'ja_address_line1', 'ja_address_line2', 'ja_city', 'ja_country', 'ja_post_code', 'ja_state', 'lc_name', 'lc_email', 'lc_phone_prefix', 'lc_phone_number', 'lc_facsimile', 'legal_status', 'legal_status_other', 'jurisdiction_under', 'ownership_status', 'os_name', 'os_address_line1', 'os_address_line2', 'os_city', 'os_country', 'os_post_code', 'os_state', 'subscriber_type', 'signature1', 'signature2', 'is_first', 'status', 'draft_delete', 'reinvestment_request', 'reinvestment_status', 'reinvestment_parant_id', 'reinvestment_child_id', 'redemption_request', 'redemption_status', 'redemption_msg', 'redemption_file', 'manual_signed_doc_enable', 'manual_signed_doc', 'bank_doc_request', 'bank_doc_request_hidden', 'changebank_file', 'changebank_request', 'changebank_status', 'changebank_msg', 'actual_price','actual_no_of_share', 'latest_price', 'no_of_share', 'current_value'
    ];

    public function UserAs(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function SsDocumentAs(){
        return $this->hasMany('App\SsDocument', 'subscription_id');
    }

    public function PayoutAs(){
        return $this->hasMany('App\Payout', 'subscription_id');
    }

    public function SubscriptionCountryAs(){
        return $this->belongsTo('App\Country', 'country');
    }

    public function SubscriptionStateAs(){
        return $this->belongsTo('App\State', 'state');
    }

    public function SubscriptionJaCountryAs(){
        return $this->belongsTo('App\Country', 'ja_country');
    }

    public function SubscriptionJaStateAs(){
        return $this->belongsTo('App\State', 'ja_state');
    }

    public function SubscriptionLcPhonePrefixAs(){
        return $this->belongsTo('App\Country', 'lc_phone_prefix');
    }


    public function SubscriptionOsCountryAs(){
        return $this->belongsTo('App\Country', 'os_country');
    }

    public function SubscriptionOsStateAs(){
        return $this->belongsTo('App\State', 'os_state');
    }
}