@extends('layouts.app')
@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container-fluid">
        @include("investor.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                
                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">All Sent Messages</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
                    </div>
                </div>

                <!-- design1 -->
                <div class="row">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row md-5">
                                @foreach ($messages as $msg)

                                <div class="col-lg-6 col-md-6">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-22">
                                                <div class="widget-22-body">
                                                    <div class="widget-22-post-container">
                                                        <a href="{{ url('investor/messagesShow/'. $msg->user_email_id)}}" class="title">{{ $msg['user_emailAs']['subject'] }}</a>
                                                        <div class="desc"> 
                                                            {!! strip_tags(substr($msg['user_emailAs']['message'],0, 150)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-22-footer">
                                                    <img src="{{ asset('/admin/images/avatars/user-9.jpg') }}" alt="Support User" title="Support User" />
                                                    <div class="widget-22-post-info">
                                                            <span class="author-name">Admin</span>
                                                            <span class="time"><?php echo $msg->created_at; ?></span>
                                                    </div>
                                                    <div class="dropdown widget-22-post-action">
                                                        <a href="{{ url('investor/messagesShow/'. $msg->user_email_id)}}" class="post-tag badge badge-pill badge-warning">View</a>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                            
                                {!! $messages->links() !!}
                                
                                
                            </div>
                            
                            @if($messages->isEmpty())
                                <p>Empty Messages </p>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
           
@endsection

