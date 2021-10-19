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
                                <h6 class="card-title m-0">Price Table</h6>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Last Dealing Date</th>
                                                <th>Cumulative Return (USD)</th>
                                                <th>Latest YTD Return (%)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-0"><i class="fa fa-calendar-alt"></i> {{ $price->dealing_date }} </td>
                                                <td class="border-0"><i class="fa fa-dollar-sign"></i> {{ $price->latest_price }}</td>
                                                
                                                <td class="border-0"> {{ $price->ytd_return }} <i class="fa fa-percentage"></i></td>
                                                
                                                <td class="border-0">
                                                    <form action="{{ route('prices.destroy',$price->id) }}" method="POST">
                                                        <a class="btn btn-primary mt-1 mr-1" href="{{ route('prices.edit',$price->id) }}">Edit</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="card-header">
                                <h6 class="card-title m-0">Price History Table</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table center-aligned-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Last Dealing Date</th>
                                                <th>Cumulative Return (USD)</th>
                                                <th>Latest YTD Return (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceHistorys as $price)
                                            <tr>
                                                <td class="border-0"><i class="fa fa-calendar-alt"></i> {{ $price->dealing_date }} </td>
                                                <td class="border-0"><i class="fa fa-dollar-sign"></i> {{ $price->latest_price }}</td>
                                                
                                                <td class="border-0"> {{ $price->ytd_return }} <i class="fa fa-percentage"></i></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {!! $priceHistorys->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection