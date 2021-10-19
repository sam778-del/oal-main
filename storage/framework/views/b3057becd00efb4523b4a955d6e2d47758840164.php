<?php $__env->startComponent('mail::message'); ?>
    

<h3>Dear <?php echo e($data->name); ?>,<h3>
                                
<p>Thank you for your application.</p>

<p>We are pleased to inform you that your application for the OAL preference share is approved. You can now make a deposit to activate your investment.</p>

<p>Kindly log in to the investment portal at <a href="<?php echo e(URL::to('/login')); ?>" target="_blank"><?php echo e(URL::to('/login')); ?></a>. The banking instruction details is available for download on My Investment Details page. Once you have transferred your funds from your bank, please upload the wire transfer slip/details as proof of funding in the portal.</p>

<p>Kindly take note that bank wire deposits may take approximately three to five business days, often less, to arrive and process into our bank account.</p>

<p>Please do not hesitate to contact us if you have any inquiries.</p>

<?php echo config('settings.mail_signature'); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/emails/pendingFundingMail.blade.php ENDPATH**/ ?>