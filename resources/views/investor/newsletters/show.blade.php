@extends('layouts.app')
@section('content')
    
    
    <div class="main-container">
        <div class="container-fluid">
        
            @include("investor.elements.sidebar")
    
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
    
                    <div class="page-header-container">
                        <div class="page-header-main">
                            <div class="page-title">Newsletter</div>
                             <div class="header-breadcrumb">
                                <a href="#"><i data-feather="airplay"></i> Show</a>
                            </div>
                        </div>
                        <div class="page-header-action">
                            <a href="{{ url('/investor/newsletters') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12 card-margin">
                            <div class="card ">
                                
                                <div class="card-body">
    
    
                                    <div class="row">
    
    
    
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card card-margin">
                                                <div class="card-body p-0">
                                                    <div class="widget-22">
                                                        <div class="widget-22-header flashmsg-show">
                                                            <img src="{{ asset('/project_img/newsletter/images/'.$news->image) }}" alt="{{ $news->title }}" title="{{ $news->title }}" style="height: 500px;" />
                                                        </div>
                                                        <div class="widget-22-body">
                                                            <div class="widget-22-post-container">
                                                                <h2>{{ $news->title }}</h2>
                                                                <div class="desc"> {!! $news->detail !!} </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-22-footer">
                                                            <img src="{{ asset('admin/images/avatars/user-9.jpg') }}" alt="Support User" title="Support User" />
                                                            <div class="widget-22-post-info">
                                                                <span class="author-name">Admin</span>
                                                                <span class="time">{{ date('d-M-y', strtotime($news->created_at)) }}</span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
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
