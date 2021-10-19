@extends('layouts.app')
@section('content')

<div class="main-container">
    <div class="container-fluid">
        
        @include("investor.elements.sidebar")

		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row mt-3">
					<div class="col-lg-3 col-md-4 mt-3">
						<div class="card card-margin">
							<div class="card-body">
								<div class="text-center">
									<img src="{{ asset('admin/images/avatars/user-9.jpg') }}" alt="profile pic" title="profile pic" class="rounded invest-profile">
								</div>
								<div>
									<div class="text-center">
										<div class="investors-name">{{ Auth::user()->name }}</div>
									</div>
								</div>
								<div>
									<div class="widget-detail-show">
										<span class="label-name">Mobile:</span>
										<span class="label-details">+{{$userData->mobile_prefix}} - {{$userData->mobile_no}}</span>
									</div>
									<div class="widget-detail-show">
										<span class="label-name">Email:</span>
										<span class="label-details">{{$userData->email}}</span>
									</div>
									<div class="widget-detail-show">
										<span class="label-name">Address:</span>
										<span class="label-details">{{$userData->address_line1}} {{$userData->address_line2}} {{$userData->city}} {{$userData['stateAs']['name'] }} {{$userData['countryAs']['name'] }} </span>
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
												<span class="label-details invest-label-details">{{$userData->salutation}} {{ Auth::user()->name }}</span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Email:</span>
												<span class="label-details invest-label-details">{{$userData->email}}</span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Address:</span>
												<span class="label-details invest-label-details"> {{$userData->address_line1}} {{$userData->address_line2}} {{$userData->city}} {{$userData['stateAs']['name'] }} {{$userData['countryAs']['name'] }} </span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Mobile </span>
												<span class="label-details invest-label-details">+{{$userData->mobile_prefix}} - {{$userData->mobile_no}}</span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">State</span>
												<span class="label-details invest-label-details">{{$userData['stateAs']['name'] }}</span>
											</div>
											<div class="widget-detail-show">
												<span class="label-name invest-label-name">Country:</span>
												<span class="label-details invest-label-details">{{$userData['countryAs']['name'] }}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
								
					</div>
				</div>
			</div>
			@include('investor.elements.footer')
		</div>
	</div>
</div>
@endsection
