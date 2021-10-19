@extends('layouts.app')


@section('content')
    

    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Permission</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Create</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                <form action="{{ route('permissions.store') }}" method="POST" enctype='multipart/form-data' data-parsley-validate="">

                                	@csrf
                                     <div class="row">
                            		    <div class="col-xs-12 col-sm-12 col-md-6">
                            		        <div class="form-group">
                            		            <strong>Permission Name:</strong>
                            		            <input type="text" name="name" class="form-control" placeholder="Permission Name" required="required" value="{{ old('name') }}">
                            		        </div>
                            		    </div>
                            		    
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <strong>Guard Name:</strong>
                                                <select name="guard_name" class="selectpicker">
                                                    <option value="web">Website</option>
                                                    <option value="api">API</option>
                                                </select>

                                                @if ($errors->has('guard_name'))
                                                    <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                       
                            		    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            		            <button type="submit" class="btn btn-primary">Submit</button>
                            		    </div>
                            		</div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
