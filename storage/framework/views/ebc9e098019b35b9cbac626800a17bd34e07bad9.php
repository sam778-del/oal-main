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
                                <h6 class="card-title m-0">Price Table</h6>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Last Dealing Date</th>
                                                <th>Cumulative Return (USD)</th>
                                                <th>Latest YTD Return (%)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-0"><i class="fa fa-calendar-alt"></i> <?php echo e($price->dealing_date); ?> </td>
                                                <td class="border-0"><i class="fa fa-dollar-sign"></i> <?php echo e($price->latest_price); ?></td>
                                                
                                                <td class="border-0"> <?php echo e($price->ytd_return); ?> <i class="fa fa-percentage"></i></td>
                                                
                                                <td class="border-0">
                                                    <form action="<?php echo e(route('prices.destroy',$price->id)); ?>" method="POST">
                                                        <a class="btn btn-primary mt-1 mr-1" href="<?php echo e(route('prices.edit',$price->id)); ?>">Edit</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="card-header">
                                <h6 class="card-title m-0">Price History Table</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Last Dealing Date</th>
                                                <th>Cumulative Return (USD)</th>
                                                <th>Latest YTD Return (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $priceHistorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="border-0"><i class="fa fa-calendar-alt"></i> <?php echo e($price->dealing_date); ?> </td>
                                                <td class="border-0"><i class="fa fa-dollar-sign"></i> <?php echo e($price->latest_price); ?></td>
                                                
                                                <td class="border-0"> <?php echo e($price->ytd_return); ?> <i class="fa fa-percentage"></i></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo $priceHistorys->links(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/prices/index.blade.php ENDPATH**/ ?>