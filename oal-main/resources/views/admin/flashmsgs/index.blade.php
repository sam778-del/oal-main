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
                            <div class="page-title">Flash Messages</div>
                            <div class="header-breadcrumb">
                                <a href="#"><i data-feather="airplay"></i> Index</a>
                            </div>
                        </div>
                        <div class="page-header-action">
                            <a href="{{ route('flashmsgs.create') }}" class="btn btn-primary">Create</a>
                        </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body row">

                                @foreach ($flashmsgs as $fmsg)


                                <div class="col-lg-4 col-md-4">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-20 admin-flashmsg-widget-20">
                                                <div class="widget-20-header ">
                                                    <img src="{{ asset('/admin/images/avatars/user-9.jpg') }}" alt="Support User" title="Support User" />
                                                    <div class="widget-20-post-info">
                                                        <span class="author-name">Admin</span>
                                                        <span class="time"><?php echo $fmsg->created_at; ?></span>
                                                    </div>
                                                    <div class="dropdown widget-20-post-action">
                                                        <button class="btn btn-sm btn-flash-primary" type="button" id="ticket-action-panel-4"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i data-feather="more-vertical" class="toolbar-icon"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" >
                                                            <li class="dropdown-item"><span class="dropdown-title">Action </span></li>
                                                            <li class="dropdown-item">
                                                                 <a class="dropdown-link" href="{{ route('flashmsgs.show',$fmsg->id) }}">Show</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                @can('flashmsg-edit')
                                                                    <a class="dropdown-link" href="{{ route('flashmsgs.edit',$fmsg->id) }}">Edit</a>
                                                                @endcan
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <form class="formNewsletter" action="{{ route('flashmsgs.destroy',$fmsg->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    @can('flashmsg-delete')
                                                                        <a href="#" class="delete-confirm dropdown-link">Delete</a>
                                                                    @endcan
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="widget-20-body admin-flashmsg">
                                                    <img src="{{ asset('/project_img/flashmsgs/thumbnail/'.$fmsg->file) }}" alt="blog image"/>
                                                    <div class="widget-20-post-container">

                                                        <a class="title" href="{{ route('flashmsgs.show',$fmsg->id) }}">{{$fmsg->title}}</a>

                                                        <div class="desc"> 
                                                            {!! strip_tags(substr($fmsg->description,0, 150)) !!} 
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                            
                                {!! $flashmsgs->links() !!}

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
