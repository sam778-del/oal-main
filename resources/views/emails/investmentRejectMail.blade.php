@component('mail::message')
	

<h3>Dear {{$data->name }},<h3>
    
    
<p>With regards to your recent preference share investment application,  we regret to inform that your application is not approved at this time.

<p>On behalf of OAL, I thank you for your interest in the application and hope to serve you again in the future.</p>

<p>Please do not hesitate to contact us if you have any inquiries.</p>

{!! config('settings.mail_signature') !!}

@endcomponent