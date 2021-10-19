@component('mail::message')
	

<h3>Dear Admin,<h3>
   
<p>The {{ $data->name }} with Investment ID : {{ $data->investment_no }} placed a new investment.</p>
<p>Kindly take note to check.</p>

{!! config('settings.mail_signature') !!}

@endcomponent