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
                                <div class="col-md-8">
                                    <h4 class="card_title">Investors Info</h4>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;"><i class="fa fa-angle-double-left"></i> Back</a>
                               
                                    <a class="btn btn-primary" href="<?php echo e(url('/subscriptionCreate/'.$user->id)); ?>" style="float: right"><i class="fa fa-plus"></i> Create Subscription</a>
                                </div>
                            </div>

                
                            <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="col-md-6">
                                        <div class="row col-md-12">
                                            <div class="col-md-3"> Name</div>
                                            <div class="col-md-9  text-muted"><?php echo e($user->salutation); ?> <?php echo e($user->name); ?></div>
                                        </div>
                                
                                    
                                        <div class="row col-md-12">
                                            <div class="col-md-3"> Email</div>
                                            <div class="col-md-9  text-muted"><?php echo e($user->email); ?></div>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row col-md-12">
                                            <div class="col-md-4"> Mobile No</div>
                                            <div class="col-md-8  text-muted">+<?php echo e($user->mobile_prefix); ?><?php echo e($user->mobile_no); ?></div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-4"> Country 
                                                </div>
                                            <div class="col-md-8  text-muted"><?php echo e($user['countryAs']['name']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <h5>Address</h5>
                            <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <?php echo e($user->address_line1); ?> <?php echo e($user->address_line2); ?> <?php echo e($user->city); ?> <?php echo e($user->post_code); ?> <?php echo e($user['stateAs']['name']); ?> <?php echo e($user['countryAs']['name']); ?>.
                                </div>
                            </div>
                            <!--  -->
                            <h5>Subscriptions</h5>
                            <!--  -->
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
                                                <td><?php echo e($subscription->created_at ? date('d-M-y', strtotime($subscription->created_at))  : ''); ?></td>
                                                <td>
                                                    <?php
                                                        if($subscription->status == 0){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Draft</span>';
                                                        }else if($subscription->status == 1){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Pending</span>';
                                                        }else if($subscription->status == 2){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Pending Funding</span>';
                                                        }else if($subscription->status == 3){
                                                            echo '<span class="badge badge-success mt-2 mr-2">Active</span>';
                                                        }else if($subscription->status == 4){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Deactive</span>';
                                                        }else if($subscription->status == 5){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Rejected</span>';
                                                        }else if($subscription->status == 6){
                                                            echo '<span class="badge badge-info mt-2 mr-2">Matured</span>';
                                                        }else if($subscription->status == 7){
                                                            echo '<span class="badge badge-info mt-2 mr-2">Reinvestment</span>';
                                                        }                                                        
                                                    ?>
                                                </td>
                                                <td>     
                                                    <button type="button" class="btn btn-success mt-1 mr-1 text-white" onclick="location.href = '<?php echo e(url('subscriptionView/'.$subscription->id)); ?>';">View</button>   

                                                    <button type="button" class="btn btn-warning mt-1 mr-1 text-white" onclick="location.href = '<?php echo e(url('subscriptionEdit/'.$subscription->id)); ?>';">Edit</button>  
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/users/show.blade.php ENDPATH**/ ?>