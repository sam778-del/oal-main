<?php $__env->startComponent('mail::message'); ?>
	


<h3>Dear <?php echo e($data->name); ?>,<h3>
                                	
<p>Thank you for your application.</p>

<p>We’re currently in the process of reviewing your application, the review process may take up to 3 business days. Our personnel will be in contact with you once the application has been approved.</p>

<br>
<p>Please do not hesitate to contact us if you have any inquiries.</p>
<br>

<?php echo config('settings.mail_signature'); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/newInvestmentEmailForInvester.blade.php ENDPATH**/ ?>