@extends('layouts.app')
@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fluid">
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <!-- design1 -->
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                <h4 class="card_title">Home - All Sent Messages</h4></div>
                                <div class="col-md-2">
                                    <button type="button" onclick="location.href = '{{ url('messages/create') }}';" class="btn btn-primary " style="float: right"><i class="fa fa-plus-circle"></i> Create</button>
                                </div>
                            </div>
                            <div class="row mt-5">
                                @foreach ($messages as $msg)

                                <div class="col-lg-6 col-md-6">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-22">
                                                <div class="widget-22-body bg-primary">
                                                    <div class="widget-22-post-container">
                                                        <a href="{{ url('messages/show/'. $msg->id)}}" class="title">{{ $msg->subject}}</a>
                                                        <div class="desc text-white"> 
                                                            {!! strip_tags(substr($msg->message,0, 150)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-22-footer">
                                                    <img src="{{ asset('/images/icons/icon-144x144.png') }}" alt="Support User" title="Support User" />
                                                    <div class="widget-22-post-info">
                                                            <span class="author-name">Admin</span>
                                                            <span class="time"><?php echo $msg->created_at; ?></span>
                                                    </div>
                                                    <div class="dropdown widget-22-post-action">
                                                        <a href="{{ url('messages/show/'. $msg->id)}}" class="post-tag badge badge-pill badge-warning">View</a>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                            
                                <div class="col-lg-12 col-md-12">{!! $messages->links() !!}</div>

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
