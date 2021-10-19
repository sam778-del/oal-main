<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Messages Details</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Show</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="<?php echo e(url('messages')); ?>" class="btn btn-secondary"> Back</a>
                    </div>
                </div>

               
                <div class="email-app card-margin">
                    <div class="email-desc-wrapper">
                        <div class="email-header">
                            <div class="email-subject"><?php echo e($msg->subject); ?></div>
                            <p class="recipient"><span>From:</span> <?php echo e($msg->from_email); ?> - (<?php echo e($msg->from_name); ?>)</p>
                            <div class="email-date"><?php echo e($msg->created_at); ?></div>
                        </div>
                        <div class="email-body">
                            <?php echo $msg->message; ?>

                        </div>
                        <div class="email-attachment">
                            <div class="file-info">
                                <a href="<?php echo e(asset('storage/'.$msg->attachment)); ?>" download title="Download"> <i data-feather="paperclip"></i> Download</a>
                            </div>
                        </div>
                    
                
                        <h4>Sent Recipoents</h4>
                        <div class="single-table">
                            <div class="table-responsive datatable-primary">
                                <table id="dataTable2" class="table table-hover progress-table ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $msg['recipientAs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recipient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($recipient->email_address); ?></td>
                                                <td>Sent</td>
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
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/messages/show.blade.php ENDPATH**/ ?>