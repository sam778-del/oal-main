@extends('layouts.app')
@section('content')

<div class="main-container">
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

		<div class="main-panel">
			<div class="content-wrapper">
			    
			    <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Change Password </div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i>  {{ $user->name}} -  {{ $user->email}}</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;" style="float: right"><i class="fa fa-angle-double-left"></i> Back</a>
                    </div>
                </div>
                
				<div class="row">
					<div class="col-lg-12 col-md-12 ">
						<div class="card card-margin">
							<div class="card-header">
								<h5 class="card-title"></h5>
							</div>
							<div class="card-body">
								<div class="card-info">
									
									
								    {!! Form::open(['url' => '/userChangePasswordSave/'.$user->id, 'files' => true, 'id' => 'password-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]) !!}
                                    @csrf
                                    
                                    <div class="row">
        								<div class="col-lg-12">
        									<div class="form-group">
        										<label for="ip">Old Password</label>
        										<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Old Password" required>
        									</div>
        
        									@if ($errors->has('current_password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current_password') }}</strong>
                                            </span>
                                        @endif
        
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
        								
        								<div class="row col-md-12 mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group float-sm-right">
                                                    <button type="submit" class="btn btn-primary">Submit</button>                    
                                                </div>
                                            </div>
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

		@include('admin.elements.footer')
	</div>
</div>
@endsection

@section('scripts')
	<script>

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
	</script>
@endsection
