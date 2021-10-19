<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::where('id',1)->first();

        config()->set('settings.initial_amount', $setting['initial_amount']);
        config()->set('settings.additional_amount', $setting['additional_amount']);
        config()->set('settings.maturity_duration', $setting['maturity_duration']);
        config()->set('settings.maturity_period', $setting['maturity_period']);
        config()->set('settings.investment_no', $setting['investment_no']);
        config()->set('settings.investment_draft_no', $setting['investment_draft_no']);
        config()->set('settings.sms_sent', $setting['sms_sent']);
        config()->set('settings.email_sent', $setting['email_sent']);
        config()->set('settings.site_maintance', $setting['site_maintance']);
        config()->set('settings.mail_signature', $setting['mail_signature']);
        config()->set('settings.site_name', $setting['site_name']);
        config()->set('settings.company_address', $setting['company_address']);
        config()->set('settings.from_email', $setting['from_email']);
        config()->set('settings.from_name', "Olympus Asset Limited");
        config()->set('settings.subcription_fee', $setting['subcription_fee']);

        //config('settings.from_email')
    }
}
