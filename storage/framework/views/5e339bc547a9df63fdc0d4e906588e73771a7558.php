<?php $__env->startSection('content'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fluid">
        <?php echo $__env->make("investor.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                
                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">All Sent Messages</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
                    </div>
                </div>

                <!-- design1 -->
                <div class="row">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row md-5">
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-lg-6 col-md-6">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-22">
                                                <div class="widget-22-body">
                                                    <div class="widget-22-post-container">
                                                        <a href="<?php echo e(url('investor/messagesShow/'. $msg->user_email_id)); ?>" class="title"><?php echo e($msg['user_emailAs']['subject']); ?></a>
                                                        <div class="desc"> 
                                                            <?php echo strip_tags(substr($msg['user_emailAs']['message'],0, 150)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-22-footer">
                                                    <img src="<?php echo e(asset('/admin/images/avatars/user-9.jpg')); ?>" alt="Support User" title="Support User" />
                                                    <div class="widget-22-post-info">
                                                            <span class="author-name">Admin</span>
                                                            <span class="time"><?php echo $msg->created_at; ?></span>
                                                    </div>
                                                    <div class="dropdown widget-22-post-action">
                                                        <a href="<?php echo e(url('investor/messagesShow/'. $msg->user_email_id)); ?>" class="post-tag badge badge-pill badge-warning">View</a>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                <?php echo $messages->links(); ?>

                                
                                
                            </div>
                            
                            <?php if($messages->isEmpty()): ?>
                                <p>Empty Messages </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
           
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/messages/index.blade.php ENDPATH**/ ?>