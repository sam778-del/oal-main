@component('mail::message')
	


<h3>Dear {{ $data->name }},<h3>
                                	
<p>Thank you for your application.</p>

<p>We’re currently in the process of reviewing your application, the review process may take up to 3 business days. Our personnel will be in contact with you once the application has been approved.</p>

<br>
<p>Please do not hesitate to contact us if you have any inquiries.</p>
<br>

{!! config('settings.mail_signature') !!}

@endcomponent