<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Flash Messages</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Show</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="<?php echo e(route('flashmsgs.index')); ?>" class="btn btn-secondary"> Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="card card-margin">
                                            <div class="card-body p-0">
                                                <div class="widget-22">
                                                    <div class="widget-22-header flashmsg-show">
                                                        <img src="<?php echo e(asset('/project_img/flashmsgs/images/'.$flashmsg->file)); ?>" alt="<?php echo e($flashmsg->title); ?>" title="<?php echo e($flashmsg->title); ?>"  />
                                                    </div>
                                                    <div class="widget-22-body">
                                                        <div class="widget-22-post-container">
                                                            <h2><?php echo e($flashmsg->title); ?></h2>
                                                            <span>Start - <?php echo e(date('d-M-y', strtotime($flashmsg->start_date))); ?> - to - <?php echo e(date('d-M-y', strtotime($flashmsg->end_date))); ?></span>
                                                            <span>
                                                                <?php 
                                                                    if($flashmsg->active == 1){
                                                                        echo "Active";
                                                                    }else{
                                                                        echo "De-active";
                                                                    }
                                                                ?>
                                                            </span>

                                                            <div class="desc"> <?php echo $flashmsg->description; ?> </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-22-footer">
                                                        <img src="<?php echo e(asset('admin/images/avatars/user-9.jpg')); ?>" alt="Support User" title="Support User" />
                                                        <div class="widget-22-post-info">
                                                            <span class="author-name">Admin</span>
                                                            <span class="time"><?php echo e(date('d-M-y', strtotime($flashmsg->created_at))); ?></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                   


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/flashmsgs/show.blade.php ENDPATH**/ ?>