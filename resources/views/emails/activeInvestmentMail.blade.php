@component('mail::message')
	

<h3>Dear {{$data->name }},<h3>
    
<p>We are pleased to inform you that your wire transfer or bank in fund has been received. </p>

<p>Kindly be informed that your investment shall commence on the 1st day of next month and shall continue in effect for a period of two years from the date of commencement.</p>
    
<p>Please do not hesitate to contact us if you have any inquiries.</p>


{!! config('settings.mail_signature') !!}


@endcomponent