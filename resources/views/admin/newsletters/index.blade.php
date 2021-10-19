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
                            <div class="page-title">Newsletter</div>
                            <div class="header-breadcrumb">
                                <a href="#"><i data-feather="airplay"></i> Index</a>
                            </div>
                        </div>
                        <div class="page-header-action">
                            <a href="{{ route('newsletters.create') }}" class="btn btn-primary">Create</a>
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
                                                
                                                <td>
                                                    <?php if(!empty($new->image)){ ?>
                                                        <img src="{{ asset('/project_img/newsletter/thumbnail/'.$new->image) }}" alt="image">
                                                    <?php }else{ ?>
                                                        <img src="{{ asset('/project_img/newsletter/newsletter-icon.jpg') }}" alt="image">
                                                    <?php } ?>
                                                </td>
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

                                                
                                                <td class="row action">
                                                    <form class="formNewsletter" action="{{ route('newsletters.destroy',$new->id) }}" method="POST">
                                                    
                                                        <a class="btn btn-info btn-sm" href="{{ route('newsletters.show',$new->id) }}">Show</a>
                                                        
                                                        @can('newsletter-edit')
                                                        <a class="btn btn-primary btn-sm" href="{{ route('newsletters.edit',$new->id) }}">Edit</a>
                                                        @endcan

                                                    
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('newsletter-delete')
                                                            <button type="button" class="btn btn-danger btn-sm delete-confirm">Delete</button>
                                                        @endcan
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {!! $news->links() !!}

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
