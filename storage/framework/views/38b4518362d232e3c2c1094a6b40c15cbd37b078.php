<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('settings.site_name')); ?></title>
    
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('admin/css/vendor.styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/demo/legacy-template.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>">

    <!-- inject:js -->
    <script src="<?php echo e(asset('admin/js/vendor.base.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/vendor.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('common/js/axios.js')); ?>"></script>
    <script src="<?php echo e(asset('common/js/toastr.min.js')); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('common/css/toastr.css')); ?>">


    <script src="<?php echo e(asset('common/js/parsley.min.js')); ?>" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('common/css/parsley.css')); ?>">

    

    <script type="text/javascript">
        var SITE_URL = "<?php echo e(url('/')); ?>/";
    </script>
</head>
<body>
    
    

        <?php echo $__env->yieldContent('content'); ?>



        <script src="<?php echo e(asset('admin/js/vendor-override/chartjs-doughnut.js')); ?>"></script>
        <script src="<?php echo e(asset('admin/js/vendor-override/tooltip.js')); ?>"></script>
        <script src="<?php echo e(asset('admin/js/components/legacy-sidebar/common.js')); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('common/css/general.css')); ?>">
        <?php echo $__env->yieldContent('scripts'); ?>
        
        
        <script>
            <?php if($message = Session::get('success')): ?>
                toastr.success("<?php echo e($message); ?>");
            <?php endif; ?>

            <?php if($message = Session::get('error')): ?>
                 toastr.error("<?php echo e($message); ?>");
            <?php endif; ?>

            <?php if($message = Session::get('warning')): ?>
                 toastr.warning("<?php echo e($message); ?>");
            <?php endif; ?>

            <?php if($message = Session::get('info')): ?>
                 toastr.info("<?php echo e($message); ?>");
            <?php endif; ?>
        </script>
</body>
</html>
<?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/layouts/chat.blade.php ENDPATH**/ ?>