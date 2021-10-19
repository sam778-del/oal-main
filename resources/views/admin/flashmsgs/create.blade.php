@extends('layouts.app')


@section('content')
    
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Flash Messages</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Create</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="{{ route('flashmsgs.index') }}" class="btn btn-secondary"> Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card ">
                            
                            <div class="card-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                {!! Form::open(array('route' => 'flashmsgs.store', 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" )) !!}

                                	@csrf
                                     <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group admin-flashmsg">
                                                <label>Subject</label>
                                                {!! Form::text('title', null,['class'=>'form-control ', 'required'=> 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Messages</label>
                                                {!! Form::textarea('description', null, ['class'=>'form-control','id'=>"editor1" ]) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Flash Image</label>
                                                {!! Form::file('file', null, ['class'=>'form-control', 'id' =>'file-3']) !!}
                                            </div>
                                        </div>

                                        
                                        {!! Form::hidden('start_date', null,['class'=>'form-control datepicker', 'id'=> 'start-date', 'required'=> 'required']) !!}

                                        {!! Form::hidden('end_date', null, ['class'=>'form-control datepicker', 'id'=>'end-date', 'required'=> 'required']) !!}
                            
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label>Date Duration</label>
                                                {!! Form::text('daterange', null, ['class'=>'form-control', 'required'=> 'required']) !!}
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group-">
                                                <label class="kt-checkbox-">Active *
                                                <input type="checkbox" name="active" id="adopted" value="1" {{  old('active' == 1 ? ' checked' : '') }} >
                                            </label>
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
        CKEDITOR.replace('editor1');
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            }).datepicker("setDate", new Date());
            
        
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                $("#start-date").val(start.format('YYYY-MM-DD'));
                $("#end-date").val(end.format('YYYY-MM-DD'));
            });
        });
    </script>  
@endsection