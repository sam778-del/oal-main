<?php $__env->startSection('content'); ?>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Messages</div>
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

                                <?php echo Form::open(array('url' => '/messages/setpTwo', 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" )); ?>


                                	<?php echo csrf_field(); ?>
                                    <div class="col-md-12">
    								
    
    									<div class="form-group">
    										<label class="col-lg-3 control-label required">Type</label>
    										<div class="col-lg-9">
    										    <input type="radio" name="type" value="GROUPS" id="useremails-type-groups" checked="checked" autocomplete="off" required="required">
    											<label  for="useremails-type-groups" class="string-check-label"><span class="ml-2">User Group </label> 
    											<input type="radio" name="type" value="COUNTRY" id="useremails-country-users" autocomplete="off" required="required"> 
    											<label  for="useremails-country-users" class="string-check-label"><span class="ml-2">Country </label> 
    											<input type="radio" name="type" value="MANUAL" id="useremails-type-manual" autocomplete="off" required="required"> 
    											<label  for="useremails-type-manual" class="string-check-label"><span class="ml-2">Emails</label>
    										</div>
    									</div>
    
    									
    
    									<div class="form-group" id='groupSearch' style="display:">
    										<label class="col-lg-3 control-label required">Select Groups(s)</label>
    										<div class="col-lg-9">
    										    <?php $subscriber_typeOption = ['0' => 'Draft', '1' =>'Pending', '2' => 'Pending Funding', 
    										                    '3' => 'Active', '4' =>'Deactive' , '5' =>'Rejected' , '6' =>'Matured', '7' => 'Reinvestment' ]; ?>
    										                            
				                                <?php echo Form::select('subscriber_type', $subscriber_typeOption, old('subscriber_type'), ['autocomplete'=>"off", 'multiple'=>"multiple", 'class' => 'form-control', 'id' => 'subscriber_type', 'required'=>"required" ]); ?>

				
    										</div>
    								    </div>

                                        <div class="form-group" id='userCountry' style="display:none">
                                            <label class="col-lg-3 control-label required">Select Country</label>
                                            <div class="col-lg-9">
                                                
                                                <?php echo Form::select('user_country', $userCountrys, old('user_country'), ['autocomplete'=>"off", 'multiple'=>"multiple", 'class' => 'form-control', 'id' => 'user_country' ]); ?>

                                                                                        
                                            </div>
                                        </div>

    									<div class="form-group" id='manualEmail' style="display:none">
    										<label class="col-lg-3 control-label required">To Email(s)</label>
    										<div class="col-lg-9">
    										    
    										    <?php echo Form::textarea('to_email', null, array('id'=>"to_email", 'rows'=>"5" ,'class' => 'form-control')); ?>

    										</div>
    									</div>
    
    									<div class="form-group">
    										<label class="col-lg-3 control-label required">From Name</label>
    										<div class="col-lg-9">
    										    
    										    <?php echo Form::text('from_name', config('settings.site_name'), array('id'=>"name", 'class' => 'form-control', 'required'=>"required")); ?>

    										</div>
    									</div>
    
    									<div class="form-group">
    										<label class="col-lg-3 control-label required">From Email</label>
    										<div class="col-lg-9">
    										    <?php echo Form::email('from_email', config('settings.from_email'), array('id'=>"from_email", 'maxlength'=>"200" ,'class' => 'form-control', 'required'=>"required")); ?>

    										</div>
    									</div>
    
    									<div class="form-group">
    										<label class="col-lg-3 control-label required">Subject</label>
    										<div class="col-lg-9">
    										    <?php echo Form::text('subject', null, array('id'=>"subject", 'maxlength'=>"500" ,'class' => 'form-control', 'required'=>"required")); ?>

    										</div>
    									</div>
    									

    									<div class="form-group">
    										<label class="col-lg-3 control-label required"><?php echo __('Message'); ?></label>
    										<div class="col-lg-9">
    											<?php echo Form::textarea('message', config('settings.mail_signature'), ['class'=>'form-control','id'=>"editor1", 'required'=>"required", 'data-parsley-mintextsize'=>"10",  'parsley-trigger'=> "keyup" , 'data-parsley-errors-container'=>"#message-errors"]); ?>

    										</div>
                                            <span id="message-errors"></span>
    									</div>
    
    									<div class="form-group">
    										<label class="col-lg-3 control-label required">Attachment</label>
    										<div class="col-lg-9">
    											<input type="file" name="attachment" class="fileImage" autocomplete="off" id="useremails-attachment">
    										</div>
    									</div>



                            		    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            		          <button type="submit" class="btn btn-primary">Next</button>
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
        
    subscriber_type
    user_country
    to_email

		$(document).ready(function(e) {
			$('#useremails-country-users').click(function() {
				$("#groupSearch").hide();
				$("#manualEmail").hide();
				$("#userCountry").show();

                $("#user_country").attr("required", "required");
                $("#subscriber_type").removeAttr("required");
                $("#to_email").removeAttr("required");
			});
			$('#useremails-type-groups').click(function() {
				$("#userCountry").hide();
				$("#manualEmail").hide();
				$("#groupSearch").show();

                $("#subscriber_type").attr("required", "required");
                $("#user_country").removeAttr("required");
                $("#to_email").removeAttr("required");
			});
			$('#useremails-type-manual').click(function() {
				$("#userCountry").hide();
				$("#groupSearch").hide();
				$("#manualEmail").show();

                $("#to_email").attr("required", "required");
                $("#user_country").removeAttr("required");
                $("#subscriber_type").removeAttr("required");
			});
		});

        CKEDITOR.replace('editor1');

        CKEDITOR.on('instanceReady', function () {
            $('#editor1').attr('required', '');
            $.each(CKEDITOR.instances, function (instance) {
                CKEDITOR.instances[instance].on("change", function (e) {
                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                        $('#user-form').parsley().validate();
                    }
                });
            });
        });



        window.Parsley.addValidator('mintextsize', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var txt = $(value).text().trim();
                 return txt.length > requirement;
            },
            messages: {
                en: 'Please enter 10 characters'
            }
        });

       

    </script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/messages/create.blade.php ENDPATH**/ ?>