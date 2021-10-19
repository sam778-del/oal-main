<?php $__env->startSection('content'); ?>

<script src="<?php echo e(asset('common/js/jSignature.min.js')); ?>"></script>
<style>
	#radioValue1{
		display: none;
	}
	#radioValue2{
		display: none;
	}
	#joint-applicants{
		display: none;
	}
	#individual{
		display: none;
	}
	#fund{
		display: none;
	}
	#trust{
		display: none;
	}
	#private-fund{
		display: none;
	}
	#regular-finance{
		display: none;
	}
	#investment-finance{
		display: none;
	}
	#e-sign{
		display: none;
	}
	.wizard > .content {
        padding: 14px;
    }
    .sec2-form {
        width: 107%;
    }
    .main-panel.panel-defalt {
        position: inherit;
    }
</style>
	


	<div class="main-container">
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel signup-main-panel panel-defalt">
				<div class="content-wrapper signup-content-wrapper">
				    
					<div class="row justify-content-center pd-2 mb-4">
						<div class="d-flex justify-content-center">
							<div class="d-flex justify-content-center">
								<div  class="d-flex justify-content-center ">
									<a class="brand-logo1" href="<?php echo e(url('/investor/dashboard')); ?>">
										<img src="<?php echo e(asset('logo.png')); ?>" alt="OAL Dashboard" title="OAL Dashboard"/>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 ">
							<div class="card card-margin">
								<div class="card-header signup-card-header">
									<h5 class="card-title"> SUBSCRIPTION FORM </h5>									
								</div>
								<div class="card-body">
									 <?php echo Form::open(['url' => '/investor/subscriptionSave', 'files' => true, 'id' => 'subscriptionform', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]); ?>


										<div>
											<h3>SUBSCRIBER DETAILS</h3>
											<section>
												<h4>SUBSCRIBER DETAILS</h4>
												
												<?php echo $__env->make("investor.elements.subscription", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
												
											</section>

											<h3>ADDITIONAL DETAILS</h3>
											<section>
												<h4>LEAD CONTACT DETAILS</h4>

												<?php echo $__env->make("investor.elements.additional", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											</section>

											<h3>DOCUMENTS</h3>
											<section>
												<h4>CHECKLIST FOR SUBSCRIBERS</h4>
												<?php echo $__env->make("investor.elements.document", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											</section>

										</div>
									<?php echo e(Form::close()); ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('investor.elements.subscriptionScript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/subscriptionCreate.blade.php ENDPATH**/ ?>