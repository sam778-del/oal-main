<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="card_title">Active Investment</h4>
                                </div>
                            </div>

                            <form method="get" class="needs-validation mt-3" action="<?php echo e(url("/active")); ?>">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <h6 class="panel-title text-semibold">Search By Investment No</h6>
                                        <input type="text" name="q" autocomplete="off" placeholder="Search ..." class="form-control" value="">
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <h6 class="panel-title text-semibold">&nbsp;</h6>
                                        <div class="submit">
                                            <input type="submit" id="searchSubmitId" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="single-table">
                                <div class="table-responsive datatable-primary">
                                    <table id="dataTable2" class="table table-hover progress-table ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>INVESTMENT ID</th>
                                                <th>AMOUNT</th>
                                                <th>COMMENCEMENT DATE</th>
                                                <th>SUBMISSION DATE</th>
                                                <th>STATUS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($subscription->investment_name); ?></td>
                                                <td><?php echo e($subscription->amount); ?></td>
                                                <td><?php echo e($subscription->commencement_date ? date('d-M-y', strtotime($subscription->commencement_date))  : ''); ?></td>
                                                <td><?php echo e($subscription->created_at ? $subscription->created_at->format('d-M-Y')  : ''); ?></td>
                                                <td> <span class="badge badge-success mt-2 mr-2">Active</span> </td>
                                                <td>     
                                                    <button type="button" class="btn btn-success mt-1 mr-1 text-white" onclick="location.href = '<?php echo e(url('subscriptionView/'.$subscription->id)); ?>';">View</button>   

                                                    <button type="button" class="btn btn-warning mt-1 mr-1 text-white" onclick="location.href = '<?php echo e(url('subscriptionEdit/'.$subscription->id)); ?>';">Edit</button>  
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php echo e($subscriptions->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('admin.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/active.blade.php ENDPATH**/ ?>