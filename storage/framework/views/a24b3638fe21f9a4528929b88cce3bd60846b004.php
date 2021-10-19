<?php $__env->startComponent('mail::message'); ?>
	

<h3>Dear Admin,<h3>
   
<p>The <?php echo e($data->name); ?> with Investment ID : <?php echo e($data->investment_no); ?> placed a new investment.</p>
<p>Kindly take note to check.</p>

<?php echo config('settings.mail_signature'); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/newInvestmentEmail.blade.php ENDPATH**/ ?>