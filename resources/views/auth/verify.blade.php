@extends('layouts.app')

@section('content')


	<div class="main-container">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="user-auth-v3 h-100">
				<div class="row no-gutters">
					<div class="col-lg-12 auth-header">
						<div class="logo-container thanks-logo d-flex justify-content-center">
							<a class="brand-logo" href="#">
								<img src="{{ asset('logo.png') }}" alt="OAL Dashboard" title="OAL Dashboard"/>
							</a>
						</div>
					</div>
				</div>
				<div class="row no-gutters pl-5">
					<div class="col-lg-6">
						<div class="user-auth-content login thanks-padding">
							<h3 class="auth-title thank-auth-title">Thank you for signing up</h3>
							<label class="mb-2" >Please verify your Email</label>
							<label class="mb-2" >Before proceeding, please check your email for a verification link.</label>
		                    <label class="mb-2" >If you did not receive the email</label>
		                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
		                        @csrf
		                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
		                    </form>

							<div class="mt-3 mb-4 d-flex justify-content-center thanks-logout">
								<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();">
				                    <button type="submit" class="btn btn-lg btn-base btn-rounded">Logout</button>
				                </a>

				                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                    @csrf
				                </form>
			                </div>

						</div>
					</div>
					<div class="col-lg-6 d-none d-md-block">
							<div class="auth-right-section login"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End main-container -->
@endsection