@component('mail::message')
	
<h3>Dear {{ $data->name }},<h3>

<p>The following investment {{ $data->investment_no }} has applied to change their bank account details.</p>

{!! config('settings.mail_signature') !!}

@endcomponent