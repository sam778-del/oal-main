@component('mail::message')
	

<h3>Dear {{ $data->name }},<h3>
    
<p>Your bank details change request has been approved & updated. Your investment ID is {{ $data->investment_no }}.

{!! config('settings.mail_signature') !!}

@endcomponent