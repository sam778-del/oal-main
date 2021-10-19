@extends('layouts.app')


@section('content')
    
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Messages Details</div>
                         <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Show</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                        <a href="{{ url('messages') }}" class="btn btn-secondary"> Back</a>
                    </div>
                </div>

               
                <div class="email-app card-margin">
                    <div class="email-desc-wrapper">
                        <div class="email-header">
                            <div class="email-subject">{{ $msg->subject}}</div>
                            <p class="recipient"><span>From:</span> {{ $msg->from_email}} - ({{ $msg->from_name}})</p>
                            <div class="email-date">{{ $msg->created_at }}</div>
                        </div>
                        <div class="email-body">
                            {!! $msg->message !!}
                        </div>
                        <div class="email-attachment">
                            <div class="file-info">
                                <a href="{{ asset('storage/'.$msg->attachment) }}" download title="Download"> <i data-feather="paperclip"></i> Download</a>
                            </div>
                        </div>
                    
                
                        <h4>Sent Recipoents</h4>
                        <div class="single-table">
                            <div class="table-responsive datatable-primary">
                                <table id="dataTable2" class="table table-hover progress-table ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($msg['recipientAs'] as $key => $recipient)
                                            <tr>
                                                <td>{{ $recipient->email_address }}</td>
                                                <td>Sent</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
