<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
	
	protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = ['initial_amount', 'additional_amount', 'maturity_duration', 'maturity_period', 'investment_no', 'investment_draft_no', 'sms_sent', 'email_sent', 'site_maintance', 'mail_signature', 'from_email', 'site_name', 'company_address', 'subcription_fee'
    ];
}