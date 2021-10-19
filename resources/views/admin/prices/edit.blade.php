@extends('layouts.app')


@section('content')
    
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            <div class="card-header">
                                <h6 class="card-title m-0">Price table update</h6>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('prices.update',$price->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Dealing Date :</strong>
                                                <input type="text" name="dealing_date" value="{{ $price->dealing_date }}" class="form-control datepicker" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>Cumulative Return :</strong>
                                                <input type="text" name="latest_price" value="{{ $price->latest_price }}" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <strong>YTD Return :</strong>
                                                <input type="text" name="ytd_return" value="{{ $price->ytd_return }}" class="form-control" placeholder="Name">
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


@section('scripts')
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', //2020-02-04
            todayHighlight: true
        });
    </script>

@endsection