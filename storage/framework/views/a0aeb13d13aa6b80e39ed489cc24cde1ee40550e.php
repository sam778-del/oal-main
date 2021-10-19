<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            <div class="card-header">
                                <h6 class="card-title m-0">Track records update :</h6>
                            </div>
                            <div class="card-body">

                                <form action="<?php echo e(route('trackrecords.update',$record->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Period :</strong>
                                                <input type="text" name="period" value="<?php echo e($record->period); ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Quarterly Returns (%) :</strong>
                                                <input type="text" name="returns" value="<?php echo e($record->returns); ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/trackrecords/edit.blade.php ENDPATH**/ ?>