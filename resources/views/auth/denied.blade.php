@extends('layouts.app')

@section('content')


	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="errors error-v2 bg-white">
			<div class="row no-gutters">
				<div class="col-lg-6 col-md-6 error-left">
					<div class="text-center mt-xl-2 mt-2">
							<h1 class="error-title">403 Error</h1>
							<p class="error-description m-0">User have not permission for this page access.</p>
							<p class="error-description mb-3">Looks like the page you are trying to access doesn't exist or moved.</p>

							@if(Auth::user()->role_id == 2)
								<a class="btn btn-base" href="{{ url('/dashboard') }}">Back to home</a>
							@else
								<a class="btn btn-base" href="{{ url('/investor/dashboard') }}">Back to home</a>
							@endif
					</div>
				</div>
				<div class="col-lg-6 col-md-6 error-right mt-2 d-none d-md-block">
					<img class="error-image" src="{{ asset('admin/images/500.png') }}" title="Error Occurred"/>
				</div>
			</div>
		</div>
	</div>
	<!-- End main-container -->
@endsection