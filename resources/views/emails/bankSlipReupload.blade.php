@component('mail::message')
	

<h3>Dear Admin,<h3>
    
<p>The {{ $data->name }} with Investment ID : {{ $data->investment_no }} has uploaded the bank in slip for their investment.</p>

<p>Kindly take note to check the bank in slip from the admin portal and monitor the payment to be transferred into the OAL bank account.</p>

{!! config('settings.mail_signature') !!}

@endcomponent