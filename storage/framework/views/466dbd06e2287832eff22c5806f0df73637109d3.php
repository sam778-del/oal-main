<?php $__env->startSection('content'); ?>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="main-panel">
			<div class="content-wrapper">
				<div class="page-header-container">
					<div class="page-header-main">
						<div class="page-title">Settings</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 ">
						<div class="card card-margin">
							<div class="card-header">
								<h5 class="card-title">Change Password</h5>
							</div>
							<div class="card-body">
								<div class="card-info">
									Set a unique password to protect your personal OAL account
								</div>
								<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#changepasswordDataButton" >Change Password</button>
									
							</div>
						</div>
						<div class="card card-margin">
							<div class="card-header">
								<h5 class="card-title">
										Two Step Verification</h5>
							</div>
							<?php if($fa_status){ ?>
								
								<div class="card-body">
									<div class="card-info">
										Required a security key or code in addition to your password
									</div>
									<button type="button" class="btn btn-sm btn-outline-primary" id="disable2FADataButton" >Disable</button>
								</div>
							<?php }else{ ?>

								<div class="card-body">
									<div class="card-info">
										Required a security key or code in addition to your password
									</div>
									<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#enable2FADataButton" >Enable</button>
								</div>


							<?php } ?>
						</div>

						<div class="card card-margin">
							<div class="card-header">
								<h5 class="card-title">Master Settings</h5>
							</div>
							<div class="card-body">
							 	<?php echo Form::model($settings, array('url' => ['master'], 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" )); ?>



							 		<div class="row col-md-12">
						 				
							 			<div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="date">Initial Investment Amount Limit</label>
			                                    <?php echo Form::text('initial_amount', null, ['class' => 'form-control', 'id' => 'initial_amount', 'required'=> 'required', 'data-parsley-type'=>"digits"]); ?>

		                                    </div>
		                                </div>

		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="date">Additional Investment Amount Limit</label>
			                                    <?php echo Form::text('additional_amount', null, ['class' => 'form-control', 'id' => 'additional_amount', 'required'=> 'required', 'data-parsley-type'=>"digits"]); ?>

		                                    </div>
		                                </div>
							 		</div>

							 		<div class="row col-md-12">

						 				<div class="col-md-4">
		                                    <div class="form-group">
		                                        <label for="date">Admin Fee (%)</label>
			                                    <?php echo Form::text('subcription_fee', null, ['class' =>'form-control', 'id'=>'subcription_fee', 'required'=>'required','data-parsley-type'=>"digits"]); ?>

	                                    	</div>
		                                </div>


		                            	
							 			<div class="col-md-4">
		                                    <div class="form-group">
		                                        <label for="date">Site Name</label>
			                                    <?php echo Form::text('site_name', null, ['class' => 'form-control', 'id' => 'site_name', 'required'=> 'required']); ?>

		                                    </div>
		                                </div>

		                                <div class="col-md-4">
		                                    <div class="form-group">
		                                        <label for="date">From Email</label>
			                                    <?php echo Form::text('from_email', null, ['class' => 'form-control', 'id' => 'from_email', 'required'=> 'required']); ?>

		                                    </div>
		                                </div>
							 		</div>

							 		<div class="row col-md-12">
						 				<div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="date">Mail Signature</label>
			                                    <?php echo Form::textarea('mail_signature', null, ['class' => 'form-control', 'id' => 'mail_signature', 'required'=> 'required']); ?>

		                                    </div>
		                                </div>

		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="date">Company Address</label>
			                                    <?php echo Form::textarea('company_address', null,['class' => 'form-control', 'id' => 'company_address', 'required'=> 'required']); ?>

		                                    </div>
		                                </div>
							 		</div>

							 		<div class="row col-md-12 mt-3">
	                                    <div class="col-md-12">
	                                        <div class="form-group float-sm-right">
	                                            <button type="submit" class="btn btn-primary">Submit</button>
	                                        </div>
	                                    </div>
	                                </div>

							 	<?php echo Form::close(); ?>


							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<!-- Modal Change password-->
		<div class="modal fade" id="changepasswordDataButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Change Passowrd</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo Form::open(['url' => '/changePassword', 'files' => true, 'id' => 'password-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]); ?>

                        <?php echo csrf_field(); ?>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="ip">Old Password</label>
										<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password" required>
									</div>

									<?php if($errors->has('current_password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('current_password')); ?></strong>
                                    </span>
                                <?php endif; ?>

								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="ip">New Password</label>
										<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required data-parsley-minlength="8" data-parsley-errors-container=".errorspannewpassinput" data-parsley-required-message="Please enter your new password." data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-required>
									</div>

									<span class="errorspannewpassinput"></span><br>

                                    <span class="invalid-feedback" role="alert">Must have at least 8 characters with at least one Capital letter at least one lower case letter and at least one number and at least one special character.</span>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="ip">Confirm Password</label>
										<input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="New Password" required data-parsley-equalto="#new_password" data-parsley-minlength="8" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-errors-container=".errorspanconfirmnewpassinput" data-parsley-required-message="Please re-enter your new password."  data-parsley-required>
									</div>
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Change</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal 2FA Auth Enable-->
		<div class="modal fade" id="enable2FADataButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Enable 2FA Step Verification</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php echo Form::open(['url' => '/investor/enable2Fa', 'files' => true, 'id' => 'enable2FADataForm', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]); ?>

                        <?php echo csrf_field(); ?>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12 mb-3">


									<div class="col-xl-12 col-lg-12">
										<div class="kt-portlet kt-portlet--height-fluid">
											<div class="kt-portlet__body">
												<div class="kt-widget kt-widget--general-1">
													<div class="kt-media kt-media--lg kt-media--circle">
														<img src="<?php echo e(asset('/admin/images/sample_image/googleauthenticator.jpg')); ?>" alt="image" style="max-width: 213px; height: 135px;">
													</div>

													<div class="kt-widget__wrapper">
														<div class="kt-widget__label">
															<a href="#" class="kt-widget__title">
																Get the App
															</a>
															<span class="kt-widget__desc">
																1. Download Google Authenticator in your mobile. It`s available for iPhone and Android
															</span>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>  

									<div class="col-xl-12 col-lg-12">
										<div class="kt-portlet kt-portlet--height-fluid">
											<div class="kt-portlet__body">
												<div class="kt-widget kt-widget--general-1">
													<div class="kt-media kt-media--lg">
														<img src="<?php echo e($qr_image); ?>" alt="image" style="max-width: 213px; height: 135px;">
													</div>

													<div class="kt-widget__wrapper">
														<div class="kt-widget__label">
															<a href="#" class="kt-widget__title">
																Scan this QR Code
															</a>
															<span class="kt-widget__desc">
																<p>To Generate the verification code, open Google authenticator</p>
																<p>Tap the "+" icon in the buttom-right of the app. Scan the image to the left, using your phone camera.</p>

																<p>If you can not scan the code, the following secret key in your app to generate varification code : <b><?php echo e($google2fa_secret); ?></b></p>
															</span>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-12 col-lg-12">
										<div class="kt-portlet kt-portlet--height-fluid">
											<div class="kt-portlet__body">
												<div class="kt-widget kt-widget--general-1">
													<div class="kt-media kt-media--lg kt-media--circle">
														<img src="<?php echo e(asset('/admin/images/sample_image/otp.png')); ?>" alt="image" style="max-width: 135px; height: 100px;">
													</div>

													<div class="kt-widget__wrapper">
														<div class="kt-widget__label">
															<a href="#" class="kt-widget__title">
																Enter Verification Code
															</a>
															<span class="kt-widget__desc">
																Enter the 6-digit verification code generated by the app.
															</span>
															<div class="col-lg-6">
																<div class="form-group">
																	<input type="hidden" name="secretcode" id="secretcode" value="<?php echo e($google2fa_secret); ?>">
																	<div class="input text required"><input type="text" name="code" class="form-control" required="required" data-parsley-type="digits" maxlength="6" pattern="\d{6}" id="code"></div>
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
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Verify Code</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php echo $__env->make('admin.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
		CKEDITOR.replace('mail_signature');
		CKEDITOR.replace('company_address');
		//has uppercase
        window.Parsley.addValidator('uppercase', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var uppercases = value.match(/[A-Z]/g) || [];
                return uppercases.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) uppercase letter.'
            }
        });

        //has lowercase
        window.Parsley.addValidator('lowercase', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var lowecases = value.match(/[a-z]/g) || [];
                return lowecases.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) lowercase letter.'
            }
        });

        //has number
        window.Parsley.addValidator('number', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var numbers = value.match(/[0-9]/g) || [];
                return numbers.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) number.'
            }
        });

        //has special char
        window.Parsley.addValidator('special', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var specials = value.match(/[^a-zA-Z0-9]/g) || [];
                return specials.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) special characters.'
            }
        });


        $('#enable2FADataForm').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                var csrfToken = "<?php echo e(csrf_token()); ?>";

                const form = document.getElementById('enable2FADataForm');
                let formData = new FormData(form);
                axios.post(SITE_URL+'invester/enable2Fa',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    var item =response.data;
                    if(item.data == "0"){
                        Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Enabled.','success');

                        $('#enable2FADataForm')[0].reset();
                        $('#enable2FADataModel').modal('hide');

                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                });
            }
        });

        $(document).on("click","#disable2FADataButton",function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm the disable Two Step Verification",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    var csrfToken = "<?php echo e(csrf_token()); ?>";
                    let formData = new FormData();
                    formData.set('disable', 'disable');
                    axios.post(SITE_URL+'invester/disable2Fa',formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-Token': csrfToken}}
                    ).then(function (response) {
                        Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Disbled.','success');
                        setTimeout(location.reload.bind(location), 1500);
                    });
                }
            });
        });
       
	
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/settings.blade.php ENDPATH**/ ?>