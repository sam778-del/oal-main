<?php $__env->startSection('content'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fluid">
        <?php echo $__env->make("investor.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Flash Messages</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body row">

                                <?php $__currentLoopData = $flashmsgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fmsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <div class="col-lg-4 col-md-4">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-20">
                                                <div class="widget-20-header">
                                                    <img src="<?php echo e(asset('/admin/images/avatars/user-9.jpg')); ?>" alt="Support User" title="Support User" />
                                                    <div class="widget-20-post-info">
                                                        <span class="author-name">Admin</span>
                                                        <span class="time"><?php echo $fmsg->created_at; ?></span>
                                                    </div>
                                                    <div class="dropdown widget-20-post-action">
                                                        <button class="btn btn-sm btn-flash-primary" type="button" id="ticket-action-panel-4"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i data-feather="more-vertical" class="toolbar-icon"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" >
                                                            <li class="dropdown-item"><span class="dropdown-title">Action </span></li>
                                                            <li class="dropdown-item">
                                                                 <a class="dropdown-link" href="<?php echo e(url('/investor/flashmsgView',$fmsg->id)); ?>">Show</a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="widget-20-body admin-flashmsg-widget-20">
                                                    <img src="<?php echo e(asset('/project_img/flashmsgs/thumbnail/'.$fmsg->file)); ?>" alt="blog image"/>
                                                    <div class="widget-20-post-container">

                                                        <a class="title" href="<?php echo e(url('/investor/flashmsgView',$fmsg->id)); ?>"><?php echo e($fmsg->title); ?></a>

                                                        <div class="desc"> 
                                                            <?php echo strip_tags(substr($fmsg->description,0, 150)); ?> 
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                <?php echo $flashmsgs->links(); ?>


                            </div>
                            
                            <?php if($flashmsgs->isEmpty()): ?>
                                <p>Empty Flash Messages </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            var _this = this;
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    $(_this).closest("form").submit();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/flashmsgs/index.blade.php ENDPATH**/ ?>