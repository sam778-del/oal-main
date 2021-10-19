@component('mail::message')
	

<h3>Dear admin,<h3>

<p>The following investor {{ $data->name }} , {{ $data->investment_no }} has applied to change their bank account details.</p>



{!! config('settings.mail_signature') !!}

@endcomponent