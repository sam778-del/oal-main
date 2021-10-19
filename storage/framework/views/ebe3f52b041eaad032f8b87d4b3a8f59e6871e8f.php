<?php $__env->startComponent('mail::message'); ?>
	

<h3>Dear admin,<h3>

<p>The following investor <?php echo e($data->name); ?> , <?php echo e($data->investment_no); ?> has applied to change their bank account details.</p>



<?php echo config('settings.mail_signature'); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/changeBankDetailsRequestForAdmin.blade.php ENDPATH**/ ?>