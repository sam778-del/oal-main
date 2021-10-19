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
                                <h6 class="card-title m-0">Price table update</h6>
                            </div>
                            <div class="card-body">

                                <form action="<?php echo e(route('prices.update',$price->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Dealing Date :</strong>
                                                <input type="text" name="dealing_date" value="<?php echo e($price->dealing_date); ?>" class="form-control datepicker" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Latest Price :</strong>
                                                <input type="text" name="latest_price" value="<?php echo e($price->latest_price); ?>" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>YTD Return :</strong>
                                                <input type="text" name="ytd_return" value="<?php echo e($price->ytd_return); ?>" class="form-control" placeholder="Name">
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


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', //2020-02-04
            todayHighlight: true
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/prices/edit.blade.php ENDPATH**/ ?>