@extends('layouts.app')


@section('content')
    
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Track records</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Index</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="{{ route('trackrecords.create') }}" class="btn btn-primary">Create</a>
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
                                                <th>Period</th>
                                                <th>Quarterly Returns(%)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($records as $record)
                                            <tr>
                                                <td class="border-1">{{ $record->period }} </td>
                                                <td class="border-1">{{ $record->returns }}</td>
                                                
                                                
                                                <td class="action">
                                                                                                            
                                                    <a class="btn btn-primary btn-sm" href="{{ route('trackrecords.edit',$record->id) }}">Edit</a>
                                                    
                                                    &nbsp;&nbsp;

                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['trackrecords.destroy', $record->id],
                                                        'style' => 'display: inline'
                                                    ]) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!}  


                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {!! $records->links() !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection