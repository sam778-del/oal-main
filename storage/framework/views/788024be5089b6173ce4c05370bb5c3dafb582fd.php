<?php $__env->startComponent('mail::message'); ?>
	

<h3>Dear Admin,<h3>
    
<p>The <?php echo e($data->name); ?> with Investment ID : <?php echo e($data->investment_no); ?> has uploaded the bank in slip for their investment.</p>

<p>Kindly take note to check the bank in slip from the admin portal and monitor the payment to be transferred into the OAL bank account.</p>

<?php echo config('settings.mail_signature'); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/bankSlipReupload.blade.php ENDPATH**/ ?>