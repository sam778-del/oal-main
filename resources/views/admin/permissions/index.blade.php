@extends('layouts.app')


@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                        <div class="page-header-main">
                            <div class="page-title">Permission</div>
                            <div class="header-breadcrumb">
                                <a href="#"><i data-feather="airplay"></i> Index</a>
                            </div>
                        </div>
                        <div class="page-header-action">
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create</a>
                        </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Permission Name</th>
                                                <th>Guard Name</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                            <tr>
                                                
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                                <td>{{ $permission->created_at }}</td>

                                                
                                                <td class="action">
                                                    <form class="formPermission" action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                                                        
                                                        @can('permission-edit')
                                                        <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                                        @endcan

                                                    
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('permission-delete')
                                                            <button type="button" class="btn btn-danger btn-sm delete-confirm">Delete</button>
                                                        @endcan
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {!! $permissions->links() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            var _this = this;
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    $(_this).closest("form").submit();
                }
            });
        });
    </script>
@endsection
