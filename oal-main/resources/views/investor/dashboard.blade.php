@extends('layouts.app')
@section('content')

    <div class="main-container">
        <div class="container-fluid">
            
            @include("investor.elements.sidebar")
            <div class="main-panel">
            	<!-- content-wrapper Starts -->
            	<div class="content-wrapper">
            		<div class="row card-margin">
            			<div class="col-lg-12">
            				<div class="widget-3">
            					<div class="widget-3-user">
            						<div class="widget-3-user-pic">
            							<img src="{{ asset('admin/images/avatars/user-9.jpg') }}" alt="Profile Picture" />
            						</div>
            						<div class="widget-3-user-info">
            							<div class="widget-3-user-name">Greetings, {{ Auth::user()->name }}! </div>
    
            						</div>
            					</div>
    
            				</div>
            			</div>
            		</div>
    
            		<?php if(!empty($subscriptionGobal)): ?>
                        <?php if($subscriptionGobal->bank_doc_request == 1): ?>
                            <?php if($subscriptionGobal->bank_doc_request_hidden == 0): ?>
                            <div class="col-lg-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
        							<i data-feather="alert-octagon" class="alert-icon"></i>
        							<span class="alert-text">Your Investment status is PENDING FUNDING, Please upload the Bank Slip to confirm the investment !</span>
        							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        								<i data-feather="x" class="alert-close"></i>
        							</button>
        						</div>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
    						<!--  -->
    				<div class="row">
    					<div class="col-lg-4">
    						<div class="card card-margin card-rounded">
    							<div class="card-body">
    								<div class="widget-4">
    									<div class="widget-4-title">
    										Total Active Investment Count 
    									</div>
    									<div class="widget-4-body">
    										<div class="widget-4-stat">
    											<div class="widget-4-figure"><i class="text-success" data-feather="trending-up"></i> {{ number_format($total_active_investment,2) }}</div>
    											<!-- <small>55% higher</small> -->
    										</div>
    										<div class="widget-4-redirect">
    											<button class="btn btn-rounded btn-widget-4-view" onclick="location.href = '{{ url("/investor/subscriptions") }}'; "> View <i data-feather="arrow-right"></i></button>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-4">
    						<div class="card card-margin card-rounded">
    							<div class="card-body">
    								<div class="widget-4">
    									<div class="widget-4-title">
    										Total Active Investment Amount
    										
    									</div>
    									<div class="widget-4-body">
    										<div class="widget-4-stat">
    											<div class="widget-4-figure"><i class="text-success" data-feather="trending-up"></i> {{ number_format($active_investment_sum,2) }}</div>
    											<!-- <small>35% higher</small> -->
    										</div>
    										<div class="widget-4-redirect">
    											<button class="btn btn-rounded btn-widget-4-view" onclick="location.href = {{ url("/investor/subscriptions") }}';"> View <i data-feather="arrow-right"></i></button>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-4">
    						<div class="card card-margin card-rounded">
    							<div class="card-body">
    								<div class="widget-4">
    
    									<div class="widget-4-title">
    										Total Dividend Amount 
    									</div>
    									<div class="widget-4-body">
    										<div class="widget-4-stat">
    											<div class="widget-4-figure"><i data-feather="trending-up"></i>
    											<?php 
    												$total_payout = 0;
                                                	foreach ($payouts as $payout){
                                                		if(!empty($payout['PayoutAs'])){
                                                    		foreach ($payout['PayoutAs'] as $payoutData){
                                                    			$total_payout += $payoutData->redemption_amount;
                                                    		
                                                    		}
                                                    	}
                                                    }
    
                                                    echo number_format($total_payout, 2);
                                                ?>
    											</div>
    										</div>
    										<div class="widget-4-redirect">
    											<button class="btn btn-rounded btn-widget-4-view" onclick="location.href = '{{ url("/investor/subscriptions") }}';"> View <i data-feather="arrow-right"></i></button>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!--  -->
    
    			
    				<div class="row">
    					<div class="col-lg-4 col-md-4 card-margin">
    						<div class="card ">
    							<div class="card-header">
    								<h6 class="card-title m-0">Initial Investment Vs Additional Investment
    								</h6>
    							</div>
    							<div class="card-body">
    								<div id="donut-chart"></div>
    							</div>
    						</div>
    					</div>
    					<div class="col-lg-8 card-margin">
    						<div class="card ">
    							<div class="card-header">
    								<h6 class="card-title m-0">Dividend payout details</h6>
    							</div>
    							<div class="card-body">
    								<div class="table-responsive">
    									<table id="dataTable2" class="table table-hover progress-table ">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>PAYOUT DATE</th>
                                                    <th>AMOUNT(USD)</th>
                                                    <th>REFERENCE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach ($payouts as $payout):
                                                	if(!empty($payout['PayoutAs'])):
                                                    foreach ($payout['PayoutAs'] as $payoutData):
                                                    ?>
                                                        <tr>
                                                            <td>{{ date('d-M-y', strtotime($payoutData->created_at)) }}</td>
                                                            <td>$ {{ $payoutData->redemption_amount }}</td>
                                                            <td>{{ $payoutData->redemption_msg}}</td> 
                                                        </tr>
                                                <?php 
                                                    endforeach;
                                                	endif;
                                                	endforeach; ?>   
                                                
                                            </tbody>
                                        </table>
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


    <?php  if(!empty($flash_msg)){ ?>                    
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header1">
                        <button type="button" class="close first-close-res first-close" data-dismiss="modal" aria-hidden="true" style="font-size: 2.5rem; color: white;position: absolute; background: #FB0000;padding: 0px 9px; border-radius: 88%;cursor: pointer;">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:1px 1px 1px 1px;">
                        <div class="row p-2">
                            <div class="col-lg-12">
                                <a href="{{ url('investor/flashmsgView/'.$flash_msg->id) }}"><img src="{{ asset('/project_img/flashmsgs/images/'.$flash_msg->file) }}" alt="Message" class="responsive" width="700" height="500"/>
                            </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="modal fade" id="redemptionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Redemption form</h5>
            </div>

            {!! Form::open(['url' => '/investor/redemptionUpload', 'files' => true, 'id' => 'formRedemption', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" ]) !!}

            <div class="modal-body">
                
                <div class="row">
                    
                    <input type="hidden" name="sub_att_id" id="sub_att_id">
                    
                    <div class="col-md-12 mb-3">
                        <a href="#" download> Download redemption form</a>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <span class="text-danger">Please fill and upload redemption form for processing </span>
                    </div>
                   	
                    <div class="modal-body">
		                <div class="row">
		                    <div class="col-md-12 mb-3">
		                        <label>Document</label> 
		                        <input type="file" class="updateSignDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg" data-show-remove="false" required/>
		                    </div>
		                </div>
		            </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="actions">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">
    
    	$(document).ready(function(){
            $("#myModal").modal('show');
        });
    	(function() {
    	    'use strict';
    	  
    	    //admin pie chart
    	    Morris.Donut({
    	        element: 'donut-chart',
    	        data: <?php echo json_encode($initial_obj); ?>,
    	        labelColor: '#637CF9',
    	        colors: [
    	            '#ff6666',
    	            'Orange',
    	           
    	        ],
    	        resize:true,
    	        formatter: function (x) { return x + "%"}
    	    });
    	     
    	})(jQuery);
    
    	$('.redemptionButton').click(function(e){
            $('#formRedemption')[0].reset();
            $('#redemptionModal').modal('show');
            
            var source_id = $(this).attr("attr-sub_id");
            $("#sub_att_id").val(source_id);
        });
    
        var drEvent = $('.updateSignDocument').dropify();
    
        drEvent.on('dropify.beforeClear', function(event, element){
            console.log(element);
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
    
        drEvent.on('dropify.afterClear', function(event, element){
            
            alert('File deleted');
        });
    
        $('.updateSignDocument').change(function() {
                
            if ($(this).get(0).files.length) {
                var csrfToken = "{{ csrf_token() }}";
                var fd = new FormData();
                var file = $(this)[0].files[0];
        
                fd.append('file', file);
                fd.append('sub_att_id', $("#sub_att_id").val());
        
                axios.post(SITE_URL+'investor/redemptionUpload',fd,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    Swal.fire('Great Job !','You have uploaded redemption form successfully, OAL team will verify the Redemption Form!','success');
        
                    $('#updateSignDocumentModel').modal('hide');
                    setTimeout(location.reload.bind(location), 1500);  
        
                })
                .catch(function(){
                    $('#redemptionModal').modal('hide');
                    Swal.fire('Sorry !','Redemption Form upload faild!','error');
                });
            }
        });
        /***********************/
    </script>
@endsection

