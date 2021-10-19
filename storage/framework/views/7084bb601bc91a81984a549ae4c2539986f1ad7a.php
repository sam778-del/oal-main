<?php $__env->startComponent('mail::message'); ?>
	

<h3>Dear <?php echo e($data->name); ?>,<h3>
    
<p>We are pleased to inform you that your wire transfer or bank in fund has been received. </p>

<p>Kindly be informed that your investment shall commence on the 1st day of next month and shall continue in effect for a period of two years from the date of commencement.</p>
    
<p>Please do not hesitate to contact us if you have any inquiries.</p>


<?php echo config('settings.mail_signature'); ?>



<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/activeInvestmentMail.blade.php ENDPATH**/ ?>