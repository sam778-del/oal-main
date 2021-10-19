@component('mail::message')
	

<h3>Dear {{ $data->name }},<h3>

<p>The following Investment  {{ $data->investment_no }} has applied for redemption.</p>


{!! config('settings.mail_signature') !!}

@endcomponent