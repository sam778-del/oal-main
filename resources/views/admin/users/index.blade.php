@extends('layouts.app')
@section('content')

<div class="main-container">
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="card_title">{{ $title }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                                </div>
                            </div>

                            <form method="get" class="needs-validation mt-3" action="{{ route('users.index') }}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <h6 class="panel-title text-semibold">Search By Name, Email, Mobile No</h6>
                                        <input type="text" name="q" autocomplete="off" placeholder="Search ..." class="form-control" value="">
                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <h6 class="panel-title text-semibold">&nbsp;</h6>
                                        <div class="submit">
                                            <input type="submit" id="searchSubmitId" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>2FA Status</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>+{{ $user->mobile_prefix }}{{ $user->mobile_no }}</td>
                                                <td>
                                                    @if($user["2fa_status"] == 1)
                                                        <label class="badge badge-success">Enable</label>
                                                    @else
                                                        <label class="badge badge-danger">Disable</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user["active"] == 1)
                                                        <label class="badge badge-success">Active</label>
                                                    @else
                                                        <label class="badge badge-danger">De-active</label>
                                                    @endif
                                                </td>
                                                <td>
                                                  <div class="dropdown m-2">
                                                    	<button class="btn btn-sm btn-primary shadow-none dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    		Action
                                                    	</button>
                                                    	<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    		<li class="dropdown-item"><a class="" href="{{ route('users.show',$user->id) }}">Show</a></li>
                                                    		<li class="dropdown-item"> <a class="" href="{{ route('users.edit',$user->id) }}">Edit</a></li>
                                                    		<li class="dropdown-item"><a class="" href="{{ url('/userChangePassword',$user->id) }}">Change Password</a></li>
                                                             @if($user["2fa_status"] == 1)
                                                            <li class="dropdown-item"> <a class=" disable2FADataButton" href="#" attr-userID="{{ $user->id }}">Disable 2FA</a></li>
                                                            @else
                                                            <li class="dropdown-item"><a class="" href="{{ url('/enable2FaUser',$user->id) }}">Enable 2FA</a></li>
                                                            @endif
                                                            
                                                            @if($user["active"] == 1)
                                                            <li class="dropdown-item"> <a class="deactiveUserButton" href="#" attr-userID="{{ $user->id }}">De-active User</a></li>
                                                            @else
                                                            <li class="dropdown-item"> <a class="activeUserButton" href="#" attr-userID="{{ $user->id }}">Active User</a></li>
                                                            @endif
                                                    	</ul>
                                                    </div>
                                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!} --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $users->links() }}
                            
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.elements.footer')
        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script>
        $(document).on("click",".disable2FADataButton",function() {
            
            const user_id = $(this).attr('attr-userID');
            
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
                    
                    var csrfToken = "{{ csrf_token() }}";
                    let formData = new FormData();
                    formData.set('disable', 'disable');
                    formData.set('id', user_id);
                    axios.post(SITE_URL+'disable2FaUser',formData,{
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
        
        $(document).on("click",".deactiveUserButton",function() {
            
            const user_id = $(this).attr('attr-userID');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm this user is de-active",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    var csrfToken = "{{ csrf_token() }}";
                    let formData = new FormData();
                    formData.set('deactive', 'deactive');
                    formData.set('id', user_id);
                    axios.post(SITE_URL+'deactiveuser',formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-Token': csrfToken}}
                    ).then(function (response) {
                        Swal.fire('Great Job !','This user is de-active.','success');
                        setTimeout(location.reload.bind(location), 1500);
                    });
                }
            });
        });
        
        $(document).on("click",".activeUserButton",function() {
            
            const user_id = $(this).attr('attr-userID');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm the this user is active",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    var csrfToken = "{{ csrf_token() }}";
                    let formData = new FormData();
                    formData.set('active', 'active');
                    formData.set('id', user_id);
                    axios.post(SITE_URL+'activeuser',formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-Token': csrfToken}}
                    ).then(function (response) {
                        Swal.fire('Great Job !','This user is active.','success');
                        setTimeout(location.reload.bind(location), 1500);
                    });
                }
            });
        });
	</script>
@endsection