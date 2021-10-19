<?php $__env->startSection('content'); ?>
<style type="text/css">
    .hidden{
        display: none;
    }
</style>
<div class="login-container login-img" style="background-size: 100% 100%;">
		<div class="login-box animated fadeInDown">
			<div class="">
    			<a class="brand-logo" href="<?php echo e(url('/index.html')); ?>">
                    <img src="<?php echo e(asset('logo.png')); ?>" alt="OAL Dashboard" title="OAL Dashboard" class='login-log' />
                </a>
			</div>
			<div class="login-body" style="background-color: #FFF;">
				<div class="login-title"><strong>OLYMPUS ASSET LIMITED</strong> </div>
				<div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="user-auth-content login">
                        <!--<h3 class="auth-title">OLYMPUS ASSET LIMITED</h3>-->
                        <div class="row no-gutters">
                            <div class="col-sm-12 col-lg-12">
                                <form action="<?php echo e(route('login')); ?>" id=
                                "loginForm" method="POST" data-parsley-validate='data-parsley-validate' autocomlete="off">
                                    <?php echo csrf_field(); ?>


                                    <div class="tab-content" id="nav-tabContent11">
                                        <div class="tab-pane fade show active" id="loginTab" role="tabpanel" aria-labelledby="nav-task-tab1">
                                            <div class="form-group inner-addon">
                                                <label class="mb-2" for="exampleInputEmail1">Email</label>

                                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Your email@domain.com" data-parsley-group="group-1">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div class="form-group inner-addon mt-3 mb-5">
                                                <label class="mb-2" for="exampleInputPassword1">Password</label>
                                                <div class="input-group mb-3">
                                                    
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="* * * * * * * *" data-parsley-group="group-1" data-parsley-errors-container="#passwordErrorDiv" >

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text show-password" onclick="showhide();"> <i class="fa fa-eye-slash"></i></span>
                                                    </div>
                                                </div>
                                                <div id="passwordErrorDiv"></div>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                           <div class="mb-4">
                                                <button type="button" id="loginOTPButton" class="btn btn-lg btn-base btn-rounded">Login</button>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="gauthTab" role="tabpanel" aria-labelledby="nav-demo-tab1">
                                            <div class="form-group inner-addon">
                                                <label class="mb-2" for="exampleInputPassword1">Verify 2FA OTP</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['gotp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gotp" value="<?php echo e(old('gotp')); ?>" placeholder='2FA Authenticator OTP' id='users-gotp' required="required" data-parsley-type="digits" data-parsley-minlength="6" data-parsley-maxlength="6" data-parsley-group="group-3">
                                            </div>

                                            <div class="mb-4">
                                                <button type="button" id="gverifyOTP" class="btn btn-lg btn-base btn-rounded">Verify</button>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="smsTab" role="tabpanel" aria-labelledby="nav-demo-tab1">
                                            <div class="form-group inner-addon">
                                                <label class="mb-2" for="exampleInputPassword1">Verify OTP</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="otp" value="<?php echo e(old('otp')); ?>" placeholder='OTP' id='users-otp' required="required" data-parsley-type="digits" data-parsley-minlength="6" data-parsley-maxlength="6" data-parsley-group="group-2">
                                            </div>

                                            <div class="pass login">
                                                <a href="javascript:void(0);" class="" id="loginOTPLink"> REQUEST OTP</a>
                                            </div>

                                            <div class="mt-5 mb-4">
                                                <button type="button" id="verifyOTP" class="btn btn-lg btn-base btn-rounded">Verify</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="d-block forgot-btn text-center">
                                        <a href="<?php echo e(route('password.request')); ?>" class="text-dark text-capitalize">Forgot Password?</a> ||  <a href="<?php echo e(route('register')); ?>" class="text-dark text-capitalize"> Signup</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 d-none d-md-block">
                    <div class="auth-right-section login"></div>
                </div>

               

            </div>
			</div>
		</div>
	<div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

         function showhide() {
            var type = document.getElementById("password").getAttribute("type");
            if (type == "password"){
                document.getElementById("password").setAttribute("type", "text");
                $(".show-password").html('<i class="fa fa-eye"></i>');
            } else{
                document.getElementById("password").setAttribute("type", "password");
                $(".show-password").html('<i class="fa fa-eye-slash"></i>');

            }
        }

        $("#loginOTPButton").on('click', function(e) {
            if ($('#loginForm').parsley().validate({group: 'group-1'})) {

                var csrfToken = "<?php echo e(csrf_token()); ?>";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var password = $("#password").val();
                
                formData.set('email', email);
                formData.set('password', password);

                axios.post(SITE_URL+'checkLoginCredentials',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){

                        if(item.gauth){
                            $('#loginTab').removeClass('show active');
                            $('#gauthTab').addClass('show active');

                        }else{
                            $('#loginTab').removeClass('show active');
                            $('#smsTab').addClass('show active');

                            Swal.fire('Dear User','OTP has been sent to your mobile number, please verify!','success');
                        }
                    }else{
                        Swal.fire('Sorry!',"Incorrect Username/Password...",'error');
                    } 
                })
                .catch(function(e){
                    Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
                });
            }
        });

        $('#loginOTPLink').on('click', function () {

            var csrfToken = "<?php echo e(csrf_token()); ?>";

            const form = document.getElementById('loginForm');
            let formData = new FormData(form);

            var email = $("#email").val();
            var password = $("#password").val();
            formData.set('email', email);
            formData.set('password', password);

            axios.post(SITE_URL+'resendOtp',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item = response.data;
                if(item.error === 0){

                   $("#users-otp").val("");
                   Swal.fire('Dear User','OTP has been sent to your mobile number, please verify!','success');
                }else{
                    Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
                } 
            })
            .catch(function(e){
                Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
            });
            
        });


        $('#verifyOTP').on('click', function () {
           if ($('#loginForm').parsley().validate({group: 'group-2'})) {
                
                $("#users-gotp").removeAttr("required");
                var csrfToken = "<?php echo e(csrf_token()); ?>";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-otp").val();

                formData.set('email', email);
                formData.set('otp', otp);
                
                axios.post(SITE_URL+'otpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){
                        
                        $('#loginForm').submit();

                    }else{
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    }
                })
                .catch(function(){
                    Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                });
            }
        });

        $('#gverifyOTP').on('click', function () {
           if ($('#loginForm').parsley().validate({group: 'group-3'})) {
                
                $("#users-otp").removeAttr("required");
                var csrfToken = "<?php echo e(csrf_token()); ?>";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-gotp").val();

                formData.set('email', email);
                formData.set('otp', otp);
                
                axios.post(SITE_URL+'gaotpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){
                        $('#loginForm').submit();
                    }else{
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    }
                })
                .catch(function(){
                    Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>