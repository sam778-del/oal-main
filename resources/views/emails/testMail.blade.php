@component('mail::message')
	

<h3>Dear srini,<h3>
    
<p>Thank you for your application.</p>

<p>We are pleased to inform that your application for the OAL preference share has been approved. You can now make a deposit to activate your investment.</p>

<p>Kindly log in to the investment portal at The banking instruction details are available for download on the My Investment Details page. Once you have transferred your funds from your bank, please upload the wire transfer slip/details as proof of funding in the portal.</p>

<p>Kindly take note that bank wire deposits may take approximately three to five business days, often less, to arrive and process into our bank account.</p>

<p>Please do not hesitate to contact us if you have any inquiries.</p>

{!! config('settings.mail_signature') !!}

@endcomponent