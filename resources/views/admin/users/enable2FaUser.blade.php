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
									
									
								    {!! Form::open(['url' => '/enable2FaUserSave/'.$user->id, 'files' => true, 'id' => 'password-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" ]) !!}
                                    @csrf
                                    
                                    <div class="row">
        								<div class="col-md-12 mb-3">
        
        
        									<div class="col-xl-12 col-lg-12">
        										<div class="kt-portlet kt-portlet--height-fluid">
        											<div class="kt-portlet__body">
        												<div class="kt-widget kt-widget--general-1">
        													<div class="kt-media kt-media--lg kt-media--circle">
        														<img src="{{asset('/admin/images/sample_image/googleauthenticator.jpg') }}" alt="image" style="max-width: 213px; height: 135px;">
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
        														<img src="{{ $qr_image }}" alt="image" style="max-width: 213px; height: 135px;">
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
        														<img src="{{ asset('/admin/images/sample_image/otp.png') }}" alt="image" style="max-width: 135px; height: 100px;">
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
        																	<input type="hidden" name="secretcode" id="secretcode" value="{{ $google2fa_secret }}">
        																	<div class="input text required"><input type="text" name="code" class="form-control" required="required" data-parsley-type="digits" maxlength="6" pattern="\d{6}" id="code"></div>
        																</div>
        															</div>
        														</div>
        
        													</div>
        												</div>
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

