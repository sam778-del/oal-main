<?php $__env->startSection('content'); ?>
    
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Flash Messages</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Create</a>
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

                                <?php if($message = Session::get('success')): ?>
                                    <div class="alert alert-success">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php echo Form::open(array('route' => 'flashmsgs.store', 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" )); ?>


                                	<?php echo csrf_field(); ?>
                                     <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group admin-flashmsg">
                                                <label>Subject</label>
                                                <?php echo Form::text('title', null,['class'=>'form-control ', 'required'=> 'required']); ?>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Messages</label>
                                                <?php echo Form::textarea('description', null, ['class'=>'form-control','id'=>"editor1" ]); ?>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Flash Image</label>
                                                <?php echo Form::file('file', null, ['class'=>'form-control', 'id' =>'file-3']); ?>

                                            </div>
                                        </div>

                                        
                                        <?php echo Form::hidden('start_date', null,['class'=>'form-control datepicker', 'id'=> 'start-date', 'required'=> 'required']); ?>


                                        <?php echo Form::hidden('end_date', null, ['class'=>'form-control datepicker', 'id'=>'end-date', 'required'=> 'required']); ?>

                            
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label>Date Duration</label>
                                                <?php echo Form::text('daterange', null, ['class'=>'form-control', 'required'=> 'required']); ?>

                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-">
                                                <label class="kt-checkbox-">Active *
                                                <input type="checkbox" name="active" id="adopted" value="1" <?php echo e(old('active' == 1 ? ' checked' : '')); ?> >
                                            </label>
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
        CKEDITOR.replace('editor1');
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            }).datepicker("setDate", new Date());
            
        
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                $("#start-date").val(start.format('YYYY-MM-DD'));
                $("#end-date").val(end.format('YYYY-MM-DD'));
            });
        });
    </script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/flashmsgs/create.blade.php ENDPATH**/ ?>