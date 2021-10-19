@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<style>
    .dropdown-menu.show {
    /* background: red; */
    /* margin: 73px; */
    left: 0 !important;
    width: auto !important;
    min-width: 0px !important;
    padding: 10px;
}
.bootstrap-select .bs-searchbox, .bootstrap-select .bs-actionsbox, .bootstrap-select .bs-donebutton {
    padding: 10px 12px;
    width: 275px !important;
}

</style>
<div class="main-container">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel signup-main-panel register">
            <div class="content-wrapper signup-content-wrapper">
                <div class="row justify-content-center mt-3 pd-2 mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <div  class="d-flex justify-content-center ">
                                <a class="brand-logo1" href="#">
                                <img src="{{ asset('logo.png') }}" alt="OAL Signup" title="OAL Signup"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row register">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="card card-margin">
                            <div class="card-header signup-card-header">
                                <h5 class="card-title"> SIGN UP </h5>                                 
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'register', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]) !!}
                                    @csrf
                                    
                                    <div class='register'>
                                        <h3 class="nav-item nav-link">INVESTOR DETAILS</h3>
                                        <section>
                                            <div class="row-">
                                                <div class="row mt-4">
                                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Salutation</label>
                                                            <?php 
                                                            
                                                            $salutationOption = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato',"Dato Sri."=>"Dato Sri","Datin."=>"Datin","Datuk."=>"Datuk", "Datuk Sri."=>"Datuk Sri","Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku']; ?>
                                                            {!! Form::select('salutation', $salutationOption, old('salutation') ? old('salutation') : "", ['class' => 'form-control', 'id' => 'salutation', 'data-parsley-group'=>"block1"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10 col-md-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="date">Name</label>
                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus data-parsley-group="block1" oninput="this.value = this.value.toUpperCase()">

                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="date">Email</label>
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required data-parsley-group="block1" data-parsley-checkemail data-parsley-checkemail-message="Email Address already Exists" data-parsley-trigger="focusout">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="date">Password</label>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-parsley-minlength="8" data-parsley-errors-container=".errorspannewpassinput" data-parsley-required-message="Please enter your new password." data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-required data-parsley-group="block1">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                            <span class="errorspannewpassinput"></span><br>

                                                            <span class="invalid-feedback" role="alert">Must have at least 8 characters with at least one Capital letter at least one lower case letter and at least one number and at least one special character.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="date"> Confirm Password</label>
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-parsley-equalto="#password" data-parsley-minlength="8" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-errors-container=".errorspanconfirmnewpassinput"  
                                                                data-parsley-required-message="Please re-enter your new password."  data-parsley-required data-parsley-group="block1">
                                                        </div>
                                                    </div>
                                        
                                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="time">Address Line 1</label>
                                                            <input type="text" class="form-control" id="address_line1" name="address_line1"  placeholder="Address  Line1" required value="{{ old('address_line1') }}" data-parsley-group="block1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="time">Address Line 2</label>
                                                            <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Address  Line2" value="{{ old('address_line2') }}" data-parsley-group="block1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Country</label>
                                                            {!! Form::select('country', $countries, null, ['class' => 'form-control', 'id'=>'country_id', "data-parsley-group"=>"block1", 'required']) !!}
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">State</label>
                                                            <select class="form-control" name="state" id="state_id" data-parsley-group="block1" required>
                                                                <option value="">--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="datetime">City</label>
                                                            <input type="text" class="form-control" id="city" name="city"  placeholder="City" value="{{ old('city') }}" required data-parsley-group="block1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="credit-card">Post Code</label>
                                                            <input type="text" class="form-control" id="postcode" name="post_code" placeholder="Post Code" value="{{ old('post_code') }}" required data-parsley-group="block1">
                                                        </div>
                                                    </div> 
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="ip">Country Code</label>
                                                            {!! Form::select('mobile_prefix', $phone_prefix, old('mobile_prefix'), ['class' => 'form-control', 'id'=>'mobile_prefix', "data-parsley-type"=>"digits", 'required' =>'required', 'data-parsley-group'=>"block1",'data-live-search'=>"false"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="ip">Phone Number</label>
                                                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Phone Number" data-parsley-type="digits" value="{{ old('mobile_no') }}" required data-parsley-group="block1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                       
                                        <h3 class="nav-item nav-link">GOOGLE VERFICATION</h3>
                                        <section>
                                            <div class="row">
                                                
                                             <div class="col-xl-12 col-lg-12">
                                                    <div class="kt-portlet kt-portlet--height-fluid">
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-widget kt-widget--general-1">
                                                                <div class="kt-media kt-media--lg">
                                                                    <img src="{{asset('/admin/images/sample_image/googleauthenticator.jpg') }}" alt="image" style="max-width: 213px; height: 117px;">
                                                                </div>

                                                                <div class="kt-widget__wrapper">
                                                                    <div class="kt-widget__label">
                                                                        <a href="#" class="kt-widget__title">
                                                                            Get the App
                                                                        </a>
                                                                        <span class="kt-widget__desc">
                                                                            <p>1. Download Google Authenticator in your mobile. It`s available for iPhone and Android</p>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                    
                                                </div>
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                    <h4></h4>
                                                    <span>
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                 
                                                    <div class="col-xl-12 col-lg-12">
                                                        <div class="kt-portlet kt-portlet--height-fluid">
                                                            <div class="kt-portlet__body">
                                                                <div class="kt-widget kt-widget--general-1">
                                                                    <div class="kt-media kt-media--lg">
                                                                        <img src="{{ $qr_image }}" alt="image" style="max-width: 213px; height: 118px;">
                                                                    </div>

                                                                    <div class="kt-widget__wrapper">
                                                                        <div class="kt-widget__label">
                                                                            <a href="#" class="kt-widget__title">
                                                                                Scan this QR Code
                                                                            </a>
                                                                            <span class="kt-widget__desc">
                                                                                <p>To Generate the verification code, open Google authenticator</p>
                                                                                <p>Tap the "+" icon in the buttom-right of the app. Scan the image to the left, using your phone camera.</p>

                                                                                <p>If you can not scan the code, the following secret key in your app to generate varification code : <b>{{ $google2fa_secret }}</b></p>
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
                                                                        <img src="{{ asset('/admin/images/sample_image/otp.png') }}" alt="image" style="max-width: 135px; height: 79px;">
                                                                    </div>

                                                                    <div class="kt-widget__wrapper">
                                                                        <div class="kt-widget__label">
                                                                            <a href="#" class="kt-widget__title">
                                                                                Enter Verification Code
                                                                            </a>
                                                                            <span class="kt-widget__desc">
                                                                                Enter the 6-digit verification code generated by the app.
                                                                            </span>
                                                                            <div class="col-lg-6 p-0">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="secretcode" id="secretcode" value="{{ $google2fa_secret }}">
                                                                                    <input type="text" name="code" class="form-control" required="required" data-parsley-type="digits" maxlength="6" pattern="\d{6}" id="code" data-parsley-group="block2">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>               

                                                <!--</div>-->
                                            </div>
                                        </section>
                                    </div>
                                       
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- partial -->
</div>


@endsection


@section('scripts')
     <!--{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#user-form') !!}-->

     <script type="text/javascript">


        var form = $("#user-form");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex){
                
                console.log("Changed"+currentIndex+"--"+newIndex);
                if (newIndex > currentIndex){
                    var currentBlock = currentIndex+1;
                    if (false === $('#user-form').parsley().validate('block' + currentBlock)){
                        return false;
                    }
                }else{
                    return true;
                }
                return true;
            },
            onFinishing: function (event, currentIndex, newIndex){
                
                registerOtpCheck();
                console.log("Submitted");
            },
            onFinished: function (event, currentIndex){
                console.log("Submitted From");
            }
        });
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
        
        window.Parsley.addValidator('checkemail', (value, requirement) => {
			const def = new $.Deferred();

			$.ajax({
				url: SITE_URL+'checkEmailExist',
				dataType: 'json',
				type: 'get',
				data: {email: value},
				async: false,
				success: (response) => {
					if (response.valid) {
						def.resolve();
					} else {
						def.reject(response.error);
					}
				},
				error: () => {def.reject();	},
			});
			return def.promise();
		});

        $('#country_id').change(function(){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    var state = data.data;
                    $('#state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }
                }
            });
        });

        var country_id = $('#country_id').val();
        if(country_id){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+country_id,
                type:"GET",
                success: function(data) {
                    var default_state = "{{ old('state') }}";

                    var state = data.data;
                    $('#state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }

                    $('#state_id').val(default_state);
                }
            });
        }

        function saveRegisterForm(){
            if ($('#user-form').parsley().validate()) {

                preloader_init();
                $('#user-form').submit();
            }
        }

        function registerOtpCheck(){
            if ($('#user-form').parsley().validate()) {
                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('user-form');
                let formData = new FormData(form);
                axios.post(SITE_URL+'registerOtpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    var item =response.data;
                    if(item.error == "0"){

                        saveRegisterForm();
                    }else{
                        Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                });
            }
        }
     </script>
@stop

