@extends('layouts.app')
@section('content')

<div class="main-container">
    <div class="container-fluid">
        
        @include("admin.elements.sidebar")

        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card_title">Investors Info</h4>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;"><i class="fa fa-angle-double-left"></i> Back</a>
                               
                                    <a class="btn btn-primary" href="{{ url('/subscriptionCreate/'.$user->id) }}" style="float: right"><i class="fa fa-plus"></i> Create Subscription</a>
                                </div>
                            </div>

                
                            <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="col-md-6">
                                        <div class="row col-md-12">
                                            <div class="col-md-3"> Name</div>
                                            <div class="col-md-9  text-muted">{{ $user->salutation }} {{ $user->name }}</div>
                                        </div>
                                
                                    
                                        <div class="row col-md-12">
                                            <div class="col-md-3"> Email</div>
                                            <div class="col-md-9  text-muted">{{ $user->email }}</div>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row col-md-12">
                                            <div class="col-md-4"> Mobile No</div>
                                            <div class="col-md-8  text-muted">+{{ $user->mobile_prefix }}{{ $user->mobile_no }}</div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-4"> Country 
                                                </div>
                                            <div class="col-md-8  text-muted">{{ $user['countryAs']['name'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <h5>Address</h5>
                            <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    {{ $user->address_line1 }} {{ $user->address_line2 }} {{ $user->city }} {{ $user->post_code }} {{ $user['stateAs']['name'] }} {{ $user['countryAs']['name'] }}.
                                </div>
                            </div>
                            <!--  -->
                            <h5>Subscriptions</h5>
                            <!--  -->
                            <div class="single-table">
                                <div class="table-responsive datatable-primary">
                                    <table id="dataTable2" class="table table-hover progress-table ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>INVESTMENT ID</th>
                                                <th>AMOUNT</th>
                                                <th>COMMENCEMENT DATE</th>
                                                <th>SUBMISSION DATE</th>
                                                <th>STATUS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subscriptions as $subscription)
                                            <tr>
                                                <td>{{$subscription->investment_name}}</td>
                                                <td>{{$subscription->amount}}</td>
                                                <td>{{ $subscription->commencement_date ? date('d-M-y', strtotime($subscription->commencement_date))  : '' }}</td>
                                                <td>{{ $subscription->created_at ? date('d-M-y', strtotime($subscription->created_at))  : '' }}</td>
                                                <td>
                                                    <?php
                                                        if($subscription->status == 0){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Draft</span>';
                                                        }else if($subscription->status == 1){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Pending</span>';
                                                        }else if($subscription->status == 2){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Pending Funding</span>';
                                                        }else if($subscription->status == 3){
                                                            echo '<span class="badge badge-success mt-2 mr-2">Active</span>';
                                                        }else if($subscription->status == 4){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Deactive</span>';
                                                        }else if($subscription->status == 5){
                                                            echo '<span class="badge badge-danger mt-2 mr-2">Rejected</span>';
                                                        }else if($subscription->status == 6){
                                                            echo '<span class="badge badge-info mt-2 mr-2">Matured</span>';
                                                        }else if($subscription->status == 7){
                                                            echo '<span class="badge badge-info mt-2 mr-2">Reinvestment</span>';
                                                        }                                                        
                                                    ?>
                                                </td>
                                                <td>     
                                                    <button type="button" class="btn btn-success mt-1 mr-1 text-white" onclick="location.href = '{{ url('subscriptionView/'.$subscription->id) }}';">View</button>   

                                                    <button type="button" class="btn btn-warning mt-1 mr-1 text-white" onclick="location.href = '{{ url('subscriptionEdit/'.$subscription->id) }}';">Edit</button>  
                                                </td>
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
            @include('admin.elements.footer')
        </div>
    </div>
</div>
@endsection

{{-- @if(!empty($user->getRoleNames()))
    @foreach($user->getRoleNames() as $v)
        <label class="badge badge-success">{{ $v }}</label>
    @endforeach
@endif --}}
