<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("investor.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row mt-3">
					<div class="col-lg-3 col-md-4 mt-3">
						<div class="card card-margin">
							<div class="card-body">
								<div class="text-center">
									<img src="<?php echo e(asset('admin/images/avatars/user-9.jpg')); ?>" alt="profile pic" title="profile pic" class="rounded invest-profile">
								</div>
								<div>
									<div class="text-center">
										<div class="investors-name"><?php echo e(Auth::user()->name); ?></div>
									</div>
								</div>
								<div>
									<div class="widget-detail-show">
										<span class="label-name">Mobile:</span>
										<span class="label-details">+<?php echo e($userData->mobile_prefix); ?> - <?php echo e($userData->mobile_no); ?></span>
									</div>
									<div class="widget-detail-show">
										<span class="label-name">Email:</span>
										<span class="label-details"><?php echo e($userData->email); ?></span>
									</div>
									<div class="widget-detail-show">
										<span class="label-name">Address:</span>
										<span class="label-details"><?php echo e($userData->address_line1); ?> <?php echo e($userData->address_line2); ?> <?php echo e($userData->city); ?> <?php echo e($userData['stateAs']['name']); ?> <?php echo e($userData['countryAs']['name']); ?> </span>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-9 col-md-8 mt-3">
							
						<div class="card card-margin">
							<div class="card-body">

								<div class="row mb-2 ml-2 ">
									<div class="row col-md-12 ">
										<div class="col-md-6">
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Name</span>
												<span class="label-details invest-label-details"><?php echo e($userData->salutation); ?> <?php echo e(Auth::user()->name); ?></span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Email:</span>
												<span class="label-details invest-label-details"><?php echo e($userData->email); ?></span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Address:</span>
												<span class="label-details invest-label-details"> <?php echo e($userData->address_line1); ?> <?php echo e($userData->address_line2); ?> <?php echo e($userData->city); ?> <?php echo e($userData['stateAs']['name']); ?> <?php echo e($userData['countryAs']['name']); ?> </span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Mobile </span>
												<span class="label-details invest-label-details">+<?php echo e($userData->mobile_prefix); ?> - <?php echo e($userData->mobile_no); ?></span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">State</span>
												<span class="label-details invest-label-details"><?php echo e($userData['stateAs']['name']); ?></span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Country:</span>
												<span class="label-details invest-label-details"><?php echo e($userData['countryAs']['name']); ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
								
					</div>
				</div>
			</div>
			<?php echo $__env->make('investor.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/profile.blade.php ENDPATH**/ ?>