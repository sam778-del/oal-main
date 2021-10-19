<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Track records</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="<?php echo e(route('trackrecords.create')); ?>" class="btn btn-primary">Create</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Period</th>
                                                <th>Quarterly Returns(%)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="border-1"><?php echo e($record->period); ?> </td>
                                                <td class="border-1"><?php echo e($record->returns); ?></td>
                                                
                                                
                                                <td class="action">
                                                                                                            
                                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('trackrecords.edit',$record->id)); ?>">Edit</a>
                                                    
                                                    &nbsp;&nbsp;

                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['trackrecords.destroy', $record->id],
                                                        'style' => 'display: inline'
                                                    ]); ?>


                                                        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']); ?>

                                                    <?php echo Form::close(); ?>  


                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php echo $records->links(); ?>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/trackrecords/index.blade.php ENDPATH**/ ?>