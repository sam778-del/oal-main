@component('mail::message')
	
<h3>Dear {{ $data->name }},<h3>
    
<p>We are pleased to inform you that your wire transfer slip or bank in slip has been received. </p>

<p>Kindly take note that bank wire deposits may take approximately three to five business days, often less, to arrive and process into our bank account.</p>

<p>Please do not hesitate to contact us if you have any inquiries.</p>


{!! config('settings.mail_signature') !!}

@endcomponent