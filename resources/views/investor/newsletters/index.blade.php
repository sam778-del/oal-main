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
                        <div class="page-title">Newsletter</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
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
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $new)
                                            <tr>
                                                
                                                <td><img src="{{ asset('/project_img/newsletter/thumbnail/'.$new->image) }}" alt="image"></td>
                                                <td>{{ $new->title }}</td>
                                                <td>
                                                    <?php 
                                                        if($new->active == 1){
                                                            echo "Active";
                                                        }else{
                                                            echo "De-active";
                                                        }
                                                ?></td>
                                                <td>{{ $new->created_at }}</td>

                                                
                                                <td class="action">
                                                    <a class="btn btn-info btn-sm" href="{{ url('investor/newsletterShow/'.$new->id) }}">Show</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {!! $news->links() !!}
                                
                                @if($news->isEmpty())
                                    <p>Empty Newsletter </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection

