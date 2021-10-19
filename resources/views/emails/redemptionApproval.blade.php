@component('mail::message')
	

<h3>Dear {{ $data->name }},<h3>
    
<p>The following investor {{ $data->name }} , {{ $data->investment_no }} has been approval for redemption.</p>

<p>{{ $data->msg }}</p>

{!! config('settings.mail_signature') !!}

@endcomponent