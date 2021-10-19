@component('mail::message')
	

<h3>Dear admin,<h3>
 
<p>The following investor {{ $data->name }} , {{ $data->investment_no }} has applied for redemption.</p>

{!! config('settings.mail_signature') !!}

@endcomponent