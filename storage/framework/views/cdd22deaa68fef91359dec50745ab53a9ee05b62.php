<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("admin.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-panel">
            <!-- content-wrapper Starts -->
            <div class="content-wrapper">
                <!-- design1 -->
                
                <div class="page-header-container">
                    <div class="page-header-main">
                        <div class="page-title">Investment Details</div>
                        <div class="header-breadcrumb">
                            <a href="#"><i data-feather="airplay"></i> Show</a>
                        </div>
                    </div>
                    <div class="page-header-action">
                         <?php if($edit): ?>
                        <button type="button" class="btn btn-primary btn-sm" id="contractButton">Contract Edit</button>
                        <button type="button" class="btn btn-primary btn-sm" id="investmentDetailsButton">Investment Details Edit</button>
                        <?php endif; ?>
                        
                        <a class="btn btn-secondary btn-sm" href="#" onclick="location.href = document.referrer; return false;" ><i class="fa fa-angle-double-left"></i> Back</a>
					</div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 card-margin">
                        <div class="card">
                            <div class="card-body">
                                
                                <?php if($edit): ?>
                                
                                <?php echo Form::open(['url' => 'changeStatus', 'files' => true, 'id' => 'changeStatusForm', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" ]); ?>

                                <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-4 ml-3 mt-4">
                                            <div class="form-group">
                                                <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
                                                <input type="hidden" name="send_mail" value="no" id="send_mail">
                                        
                                                <label for="exampleFormControlSelect1">Change Status*</label>
                                                <?php 
                                                    $statusOption = ['1'=> 'Pending','2'=> 'Pending Funding','3'=> 'Active','4'=> 'Deactive','5'=> 'Rejected','6'=> 'Matured','8' => 'Payment Received']; ?>
    
                                                    <?php echo Form::select('status', $statusOption, $subscription->status, ['class' => 'form-control', 'id' => 'change_status', 'required']); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-1 mb-3 mt-3 pt-2">
                                            <h6 class="panel-title text-semibold">&nbsp;</h6>
                                            <a href="javascript:void();" id="changeStatusButton" class="btn btn-primary">Change</a>
                                        </div>
    
                                    </div>
                                </form>
                                <?php endif; ?>

                                <div class="row pd-3 ml-3">
                                <?php if($subscription->manual_signed_doc_enable == 1){ ?>
                                    <a href="<?php echo e(asset('storage/'.$subscription->manual_signed_doc )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Signed Application</a>
                                <?php }else{ ?>
                                    <a href="<?php echo e(url('signedPdf/'.$subscription->id )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Signed Application</a>
                                <?php } ?>

                                <a href="<?php echo e(url('bankPdf/'.$subscription->id )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Bank Instructions</a>


                                <?php if($subscription->redemption_request ==1){ ?>
                                    <?php if($subscription->redemption_status ==0){ ?>
                                        <button type="button" class="btn btn-info btn-rounded btn-fw mt-1 mr-1" id="redemptionButton" >Redemption Form Requested</button> 
                                    <?php }else if($subscription->redemption_status ==1){ ?>
                                        <button type="button" class="btn btn-success btn-rounded btn-fw mt-1 mr-1">Redemption Form Approved</button> 
                                    <?php }else if($subscription->redemption_status ==2){ ?>
                                        <button type="button" class="btn btn-danger btn-rounded btn-fw mt-1 mr-1">Redemption Form Rejected</button> 
                                    <?php } ?>   
                                <?php } ?>
                            </div>

                                <!--  -->                           
                                <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <th>Investment ID :</th>
                                    	            <td><?php echo e($subscription->investment_name); ?></td>
                                    	            <th>Investment Amount (USD) </th>
                                    	            <td><strong> <?php echo e($subscription->amount); ?></strong></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Name</th>
                                    	            <td><?php echo e($subscription->name); ?></td>
                                    	            <th>No of Shares</th>
        	                                        <td><strong> 
                                                        <?php 
                                                            $latest_price = $price->latest_price;
                                                            $current_value = $subscription->no_of_share * $latest_price;

                                                            if($subscription->no_of_share){
                                                                $round_current_value = number_format($subscription->no_of_share * $latest_price, 2);
                                                            }else{
                                                                $round_current_value = 0;
                                                            }

                                                            
                                                        ?>
                                                        <?php
                                                            if($subscription->no_of_share){
                                                                $no_of_share = floatvalue($subscription->no_of_share);
                                                                echo  number_format($no_of_share, 4);
                                                            }else{
                                                                echo "0.00";
                                                            }
                                                        ?>
                                                      </strong></td>
                                    	        </tr>
                                                <tr>
                                                    <th></th>
                                                    <td></td>
                                                    <th>Current Share Value</th>
                                                    <td><strong>
                                                        <?php
                                                            if($latest_price){
                                                                echo  number_format($latest_price, 4);
                                                            }else{
                                                                echo "0.00";
                                                            }
                                                        ?></strong></td>
                                                </tr>
                                    	        <tr>
                                    	            <th>Email</th>
                                    	            <td><?php echo e($subscription['UserAs']['email']); ?></td>
                                    	            <th>Current Investment Amount Value</th>
                                    	            <td><strong>
                                                        <?php
                                                            if($subscription->current_value){
                                                                $current_value = floatvalue($subscription->current_value);
                                                                echo  number_format($current_value, 2);
                                                            }else{
                                                                echo "0.00";
                                                            }
                                                        ?></strong></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Mobile No</th>
                                    	            <td>+<?php echo e($subscription['UserAs']['mobile_prefix']); ?> - <?php echo e($subscription['UserAs']['mobile_no']); ?></td>
                                    	            <th>Commencement Date:</th>
                                                    <td><?php echo e($subscription->commencement_date ? date('d-M-y', strtotime($subscription->commencement_date))  : ''); ?></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Subscriber Type</th>
                                    	            <td><?php
                                                            if($subscription->subscriber_type == 1){
                                                                echo "Individual";
                                                            }else if($subscription->subscriber_type == 2){
                                                                echo "Private Fund";
                                                            }else if($subscription->subscriber_type == 3){
                                                                echo "Trust";
                                                            }else if($subscription->subscriber_type == 4){
                                                                echo "Fund";
                                                            }else if($subscription->subscriber_type == 5){
                                                                echo "Regulated financial services business or public listed company";
                                                            }else if($subscription->subscriber_type == 6){
                                                                echo "Financial services institution or bank investing pooled funds i.e. CIS / Pension Funds";
                                                            }else{
                                                                echo "-";
                                                            }
                                                        ?></td>
                                                    
                                    	            <th>Status</th>
                                    	            <td>
                                    	                <?php
                                                            if($subscription->status == 1){
                                                                echo '<div class="kt-profile__main-info text-danger"> Pending</div>';
                                                            }else if($subscription->status == 2){
                                                                echo '<div class="kt-profile__main-info text-danger"> Pending Funding</div>';
                                                            }else if($subscription->status == 3){
                                                                echo '<div class="kt-profile__main-info text-success"> Active</div>';
                                                            }else if($subscription->status == 4){
                                                                echo '<div class="kt-profile__main-info text-danger"> Deactive</div>';
                                                            }else if($subscription->status == 5){
                                                                echo '<div class="kt-profile__main-info text-danger"> Rejected</div>';
                                                            }else if($subscription->status == 6){
                                                                echo '<div class="kt-profile__main-info text-danger"> Matured</div>';
                                                            }else if($subscription->status == 7){
                                                                echo '<div class="kt-profile__main-info text-danger"> Re-Investmented</div>';
                                                            }else if($subscription->status == 8){
                                                                echo '<div class="kt-profile__main-info text-danger"> Payment Received</div>';
                                                            }else{
                                                                echo '<div class="kt-profile__main-info text-danger"> Draft</div>';
                                                            }
                                                        ?>
                                    	            </td>
                                    	        </tr>
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>
                            
                                <!--  -->
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Payout</h4>
                                </div>
                            </div>
                            
                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="col-lg-12 col-md-12">
								        <div class="table-responsive">
        									<table class="table">
        									    <thead>
                                                    <tr>
                                                        <th>PAYOUT DATE</th>
                                                        <th>AMOUNT(USD)</th>
                                                        <th>REFERENCE</th>
                                                        <th>FILE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php 
                                                if(!empty($subscription['PayoutAs'])):
                                                    foreach ($subscription['PayoutAs'] as $payout):
                                                    ?>
                                                        <tr>
                                                            <td><?php echo e(date('d-M-y', strtotime($payout->created_at))); ?></td>
                                                            <td>$ <?php echo e($payout->redemption_amount); ?></td>
                                                            <td><?php echo e($payout->redemption_msg); ?></td> 
                                                            <td>
                                                                <a href="<?php echo e(asset('storage/'.$payout->redemption_file)); ?>"  download class="btn btn-base btn-rounded btn-fw mt-1 mr-1"> Download </a>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        endforeach;
                                                    endif; ?>   
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!--  -->
                             
                                <!--  -->
                                <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Address</h4>
                                </div>
                            </div>
                            
                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <td><?php echo e($subscription->address_line1); ?> <?php echo e($subscription->address_line2); ?> <?php echo e($subscription->city); ?> <?php echo e($subscription->post_code); ?> <?php echo e($subscription['SubscriptionStateAs']['name']); ?> <?php echo e($subscription['SubscriptionCountryAs']['name']); ?></td>
                                    	        </tr>
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>
                                <!--  -->

                                <!--  -->
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Bank Details</h4>
                                </div>
                                
                                <?php if($subscription->changebank_request == 1){ ?>
                                    <div class="col-md-4">
                                        <a type="button" href="javascript:void(0);" id="changeBankButton" class="btn btn-primary btn-sm" style="float: right"> Change Bank Details Requested</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a type="button" href="<?php echo e(asset('storage/'.$subscription->changebank_file)); ?>" class="btn btn-primary btn-sm" download style="float: right"> Download</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                <?php } ?> 
                            </div>

                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
    							        <table class="table table-borderless">
    									    <tbody>
    									        <tr>
    									            <th width="115px">Bank Name</th>
    									            <td><?php echo e($subscription->bank_name); ?> </td>
    									            <th width="135px">Account Address</th>
    									            <td><?php echo e($subscription->bank_address); ?></td>
    									        </tr>
    									        <tr>
    									            <th>Account Name</th>
    									            <td><?php echo e($subscription->account_name); ?></td>
    									            <th>Account Number</th>
    									            <td><?php echo e($subscription->account_number); ?></td>
    									        </tr>
    									        <tr>
                                    	            <th>Swift Address</th>
                                    	            <td><?php echo e($subscription->swift_address); ?></td>
                                    	            <th>Bank IBAN#</th>
                                    	            <td><?php echo e($subscription->bank_inan); ?></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Reference</th>
                                    	            <td><?php echo e($subscription->reference); ?></td>
                                    	            <th></th>
                                    	            <td></td>
                                    	        </tr>
    									    </tbody>
    									 </table>
        							</div>
                                </div>
                            </div>

                                <!--  -->
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Joint Account Details</h4>
                                </div>
                            </div>
                            
                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <td>
                                    	                <?php if($subscription->is_joint_account == 2): ?>
                                                        <?php echo e($subscription->ja_name); ?> <?php echo e($subscription->ja_address_line1); ?> <?php echo e($subscription->ja_address_line2); ?> <?php echo e($subscription->ja_city); ?> <?php echo e($subscription->ja_post_code); ?> <?php echo e($subscription['SubscriptionJaStateAs']['name']); ?> <?php echo e($subscription['SubscriptionJaCountryAs']['name']); ?>

                                                        <?php else: ?>
                                                            No
                                                        <?php endif; ?>
                                                    </td>
                                    	        </tr>
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>
                                
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Lead Contact Details</h4>
                                </div>
                            </div>
                            
                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <th width="90px">Name</th>
                                    	            <td><?php echo e($subscription->lc_name); ?></td>
                                    	            <th width="95px">Email</th>
                                    	            <td><?php echo e($subscription->lc_email); ?></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Mobile No</th>
                                    	            <td>+<?php echo e($subscription->lc_phone_prefix); ?><?php echo e($subscription->lc_phone_number); ?></td>
                                    	            <th>Facsimile</th>
                                    	            <td><?php echo e($subscription->lc_facsimile); ?></td>
                                    	        </tr>
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Subscriber Details</h4>
                                </div>
                            </div>
                            
                                <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <th width="180px">Legal Status Of  Subsciber</th>
                                    	            <td>
                                    	                <?php
                                                            if($subscription->legal_status == 1){
            
                                                                echo "Individual";
                                                            }else if($subscription->legal_status == 2){
            
                                                                echo "Company";
                                                            }else if($subscription->legal_status == 3){
            
                                                                echo "General partnership";
                                                            }else if($subscription->legal_status == 4){
            
                                                                echo "Limited partnership";
            
                                                            }else if($subscription->legal_status == 5){
            
                                                                echo "Trust";
                                                            }else if($subscription->legal_status == 6){
                                                                echo "Other";
                                                            }
                                                        ?>
                                    	            </td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Other</th>
                                    	            <td><?php echo e($subscription->legal_status_other); ?></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>If the Subscriber is not an individual</th>
                                    	            <td><?php echo e($subscription->jurisdiction_under); ?></td>
                                    	        </tr>
                                    	        <tr>
                                    	            <th>Ownership Status</th>
                                    	            <td>
                                    	            <?php
                                                        if($subscription->ownership_status == 1){
                                                            echo "<p>The Subscriber represents and warrants that it will hold any interest in the Fund to which it may become entitled for itself beneficially and not as nominee, agent or trustee for another.</p>";
                                                        }else if($subscription->ownership_status == 2){
                                                            echo "<p>The Subscriber represents and warrants that it will hold any interest in the Fund to which it may become entitled as nominee or trustee for the following other person(s) or entity(ies), in which case: (i) the Subscriber is duly authorised to give the representations, warranties, acknowledgements and confirmations in this Subscription Agreement on behalf of each of the beneficiaries, and (ii) the Subscriber acknowledges and accepts that it (and not the beneficial owner(s)) will be treated as the holder of any interest(s) granted in respect of this Subscription Agreement and will be the Subscriber for all purposes under this Subscription Agreement and will be registered as a limited partner in the Fund under the Law. The Subscriber acknowledges and accepts, however, that it may still be required to provide the Fund with certain information in respect of the beneficial owner(s) in order that the Fund can satisfy any applicable anti-money laundering laws and regulations</p>";
                                                        }else if($subscription->ownership_status == 3){
                                                            echo "<p>The Subscriber represents and warrants that it is applying for an interest in the Fund as agent for the following other person(s) or entity(ies), in which case: (i) it is duly authorised to give the representations, warranties, acknowledgements and confirmations in this Subscription Agreement on behalf of each such person(s) or entity(ies), and (ii) it acknowledges and accepts that such person(s) or entity(ies) will be treated as the holder of any interest(s) granted in respect of this Subscription Agreement and will be the 13 Subscriber for all purposes under this Subscription Agreement and will be registered as a limited partner in the Fund under the Law</p>";
                                                        }else{
                                                            echo "-";
                                                        }
                                                    ?></td>
                                    	        </tr>
                                    	        <?php if($subscription->ownership_status != 1){ ?>
                                        	        <tr>
                                        	            <th>Name</th>
                                        	            <td><?php echo e($subscription->os_name); ?></td>
                                        	        </tr>
                                        	        <tr>
                                        	            <th>Address</th>
                                        	            <td><?php echo e($subscription->os_address_line1); ?> <?php echo e($subscription->os_address_line2); ?> <?php echo e($subscription->os_city); ?> <?php echo e($subscription->os_post_code); ?> <?php echo e($subscription['SubscriptionOsStateAs']['name']); ?> <?php echo e($subscription['SubscriptionOsCountryAs']['name']); ?></td>
                                        	        </tr>
                                    	        <?php } ?>
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>

                                <!-- manual end -->
                                <div class="row col-md-12 m-0 p-0">
                                <div class="col-md-4 p-0">
                                    <h4 class="card_title title_bNone">Manual Signed Application</h4>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-sm btn-primary" id="updateSignDocumentButton">
                                        Upload
                                    </button>
                                </div>
                            </div>
                            
                        
                                <!-- manual end -->
                                <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title title_bNone">Documents & Signature</h4>
                                </div>
                            </div>
                            
                                <div class="row mt-3 mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        
                                    	        <?php 
                                                    if(!empty($subscription['SsDocumentAs'])):
                                                        $documents = getDocument($subscription['SsDocumentAs']);
                                                        foreach ($documents as $document):
                                                ?>
                                                            <tr>
                                                	            <th><?php echo e($document['name']); ?></th>
                                                	            <td><a href="<?php echo e(asset('storage/'.$document['file'])); ?>" download="">Download</a></td>
                                                	            <td><a href="<?php echo e(asset('storage/'.$document['file'])); ?>" target="_blank" >Open</a></td>
                                                	            <td>
                                                	                <?php if($document['sub_type'] == 71){ ?>
                                                                    <?php if($subscription['bank_doc_request'] == 1){ ?>
            
                                                                        <button type="button" class="btn btn-primary btn-sm" id="confirmBankSlip" style="cursor:pointer;" get-ss-id="<?php echo e($document['id']); ?>">Confirm Bank Slip</button>
                
                                                                    <?php }else{ ?>
                                                                        <button type="button" class="btn btn-primary btn-sm updateDocumentButton" style="cursor:pointer;" get-ss-id="<?php echo e($document['id']); ?>">Re-upload</button>
                
                                                                    <?php } ?>
                
                                                                    <?php }else{ ?>
                                                                        <button type="button" class="btn btn-primary btn-sm updateDocumentButton" style="cursor:pointer;" get-ss-id="<?php echo e($document['id']); ?>">Re-upload</button>
                
                                                                    <?php } ?>
                                                	            </td>
                                                	        </tr>
                                                <?php 
                                                    endforeach;
                                                endif; ?>   
                                    
                                    	        
                                    	    </tbody>
                                    	 </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('admin.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>


<div class="modal fade" id="editCIModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contract Information</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form action="#" id="form-editCI" data-parsley-validate method="post" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Investment ID</label>
                                <div class="col-7 contract-info-invest">
                                    <input type="text" class="form-control" id="investment_name" name="investment_name" placeholder="Ex:JIKISD2012" value="<?php echo e($subscription->investment_name); ?>" required>
                                </div>
                        
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Commencement Date * </label>
                                <div class="col-9 contract-select">
                                    <input type="text" class="form-control datepicker" id="commencement_date" name="commencement_date" value="<?php echo e($subscription->commencement_date); ?>" required>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button value="save" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Contract Information Add Model-->


<div class="modal fade" id="investmentDetailsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Update Investment Details</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form action="#" id="investmentDetailsForm" data-parsley-validate method="post" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="row col-md-12">
                            <div class="form-group  col-md-12">
                                <label for="ip">Amount (USD).</label>
                                <input type="text" name="amount" class="form-control" required="required" id="initial-investment" value="<?php echo e($subscription->amount); ?>"/>
                            </div>
                        </div>

                       
                        <div class="row col-md-12">
                            <div class="form-group  col-md-12">
                                <label for="ip">Subscription Fees(%)</label>
                                <input type="text" name="service_charge" class="form-control" required="required" id="service-charge" value="<?php echo e($subscription->service_charge ? $subscription->service_charge : config('settings.subcription_fee')); ?>"/>
                            </div> 
                        </div>
                        
                        <div class="row col-md-12">
                            <div class="form-group  col-md-12">
                                <label for="ip">Bank Charge</label>
                                <input type="text" name="bank_charge" class="form-control" id="bank-charge" value="<?php echo e($subscription->bank_charge); ?>"/>
                            </div>     
                        </div>

                        <div class="row col-md-12">
                            <div class="form-group  col-md-12">
                                <label for="ip">No of Shares</label>
                                <input type="text" name="no_of_share" class="form-control" id="no_of_share" value="<?php echo e($subscription->no_of_share); ?>"/>
                            </div>     
                        </div>

                        <div class="row col-md-12">
                            <div class="form-group  col-md-12">
                                <label for="ip">Current Value</label>
                                <input type="text" name="current_value" class="form-control" id="current_value" value="<?php echo e($subscription->current_value); ?>"/>
                            </div>     
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button value="save" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Investment Details Edit Model-->


<div class="modal fade" id="updateSignDocumentModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Upload Signed Application</h5>
            </div>

            <form action="#"id='updateSignDocumentForm' class='form-horizontal' type='file' data-parsley-validate>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" id="<?php echo e($subscription->id); ?>">

                    <div class="col-md-12 mb-3">
                        <label>Document</label> 
                        <input type="file" class="updateSignDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg" data-show-remove="false" required/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="actions">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>
            </div>
            </form>
            
        </div>
    </div>
</div>


<div class="modal fade" id="updateDocumentModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Upload Document</h5>
            </div>

            <form action="#"id='updateDocumentForm' class='form-horizontal' type='file' data-parsley-validate>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" id="ss_upload_document_id">

                    <div class="col-md-12 mb-3">
                        <label>Document</label> 
                        <input type="file" class="updateDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg" data-show-remove="false" required/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="actions">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>
            </div>
            </form>
            
        </div>
    </div>
</div>

<div class="modal fade" id="redemptionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Redemption form</h5>
            </div>

            <?php echo Form::model($subscription, array('route' => 'flashmsgs.store', 'method'=>'POST', 'files' => true, 'id' => 'formRedemption', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" )); ?>


                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="sub_id" value="<?php echo e($subscription->id); ?>">
                        <div class="col-md-12 mb-3">
                            
                            <a href="<?php echo e(asset('storage/'.$subscription->redemption_file)); ?>"  download class="btn btn-base btn-rounded btn-fw mt-1 mr-1">Invester Redemption Form Download </a>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label>Select Status</label>
                            <?php $redumption_option = [1=> 'Approved', 2=> 'Reject']; ?>
                            <?php echo Form::select('redemption_status', $redumption_option, $subscription->redemption_status, ['class' => 'form-control', 'id' => 'redemption-status', 'required']); ?>

                        </div>

                        <div class="col-md-12 mb-3" id="reasons_div">
                            <label>Enter Remption Amount</label>
                            <?php echo Form::text('redemption_amount', $round_current_value, ['class' => 'form-control', 'id' => 'redemption_amount', 'required', 'data-parsley-type'=>"digits", "data-parsley-max"=> $current_value]); ?>

                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Enter reasons</label>
                            <?php echo Form::textarea('redemption_msg', $subscription->redemption_msg, ['class' => 'form-control', 'id' => 'redemption_msg', 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="actions">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="bankDetailsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Update Bank Details</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form action="#" id="bankDetailsForm" data-parsley-validate method="post" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" data-parsley-group="block1" value="<?php echo e($subscription->bank_name); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="ip">Bank Address</label>
                                <input type="text" class="form-control" id="bank_address" name="bank_address" placeholder="Bank Address" data-parsley-group="block1" value="<?php echo e($subscription->bank_address); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Account Name</label>
                                <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" data-parsley-group="block1" value="<?php echo e($subscription->account_name); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="ip">Account Number</label>
                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" data-parsley-group="block1" data-parsley-type="digits" value="<?php echo e($subscription->account_number); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Swift Address</label>
                                <input type="text" class="form-control" id="swift_address" name="swift_address" placeholder="Swift Address" data-parsley-group="block1" value="<?php echo e($subscription->swift_address); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="ip">Bank IBAN#</label>
                                <input type="text" class="form-control" id="bank_inan" name="bank_inan" placeholder="Bank IBAN" data-parsley-group="block1" value="<?php echo e($subscription->bank_inan); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="ip">Reference</label>
                                <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference" data-parsley-group="block1" value="<?php echo e($subscription->reference); ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button value="save" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Change Bank Details Edit Model-->

<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on("click","#confirmBankSlip",function() {
    
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Confirm bank slip!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        
                        axios.post(SITE_URL+'bankSlipConfirmEmail', {
                            id: "<?php echo e($subscription->id); ?>",
                        }).then(function (response) {
                            setTimeout(location.reload.bind(location), 1500);
                        });
                    }
                });
                   
            
        });   

        $(document).on("click","#changeStatusButton",function() {
    
            if ( $(this).parsley().isValid() ) {
                    
                if($("#change_status").val() == 2){
    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Please confirm the change of status!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.value) {
                            
                            $('#send_mail').val("send");
                            $('#changeStatusForm').submit();
                        }
                    });
                   
                }else{
                   
                   $('#send_mail').val("no");
                   $('#changeStatusForm').submit();
                }
                    
            }
        });   

        $(document).on("click","#contractButton",function() {
            $('#editCIModel').modal('show');
        });
    
        $('#form-editCI').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                var csrfToken = "<?php echo e(csrf_token()); ?>";
                
                const form = document.getElementById('form-editCI');
                let formData = new FormData(form);
    
                formData.set('id', "<?php echo e($subscription->id); ?>");
    
                axios.post(SITE_URL+'contractUpdate',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
    
                    var item =response.data.data;
    
                    if(item != "null"){
                        
                        Swal.fire('Great Job !','Contract Information create successfully!','success');
    
                        $('#editCIModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Contract Information edit faild!','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Contract Information edit faild!','error');
                });
            }
        });


        $(document).on("click","#investmentDetailsButton",function() {
            $('#investmentDetailsModel').modal('show');
        });
    
        $('#investmentDetailsForm').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                var csrfToken = "<?php echo e(csrf_token()); ?>";
                
                const form = document.getElementById('investmentDetailsForm');
                let formData = new FormData(form);
    
                formData.set('id', "<?php echo e($subscription->id); ?>");
    
                axios.post(SITE_URL+'investmentDetailsUpdate',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
    
                    var item =response.data.data;
    
                    if(item != "null"){
                        
                        Swal.fire('Great Job !','Investment Details update successfully!','success');
    
                        $('#investmentDetailsModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Investment Details update faild!','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Investment Details update faild!','error');
                });
            }
        });

        $(document).on("click","#changeBankButton",function() {

            $('#bankDetailsModel').modal('show');
        });

        $('#bankDetailsForm').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                var csrfToken = "<?php echo e(csrf_token()); ?>";
                
                const form = document.getElementById('bankDetailsForm');
                let formData = new FormData(form);
    
                formData.set('id', "<?php echo e($subscription->id); ?>");
    
                axios.post(SITE_URL+'bankDetailsUpdate',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
    
                    var item =response.data.data;
    
                    if(item != "null"){
                        
                        Swal.fire('Great Job !','Change Bank Details update successfully!','success');
    
                        $('#bankDetailsModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Change Bank Details update faild!','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Change Bank Details update faild!','error');
                });
            }
        });


        $(document).ready(function(){

            $('#updateSignDocumentButton').click(function(e){
                $('#updateSignDocumentForm')[0].reset();
                $('#updateSignDocumentModel').modal('show');
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
                    var csrfToken = "<?php echo e(csrf_token()); ?>";
                    var fd = new FormData();
                    var file = $(this)[0].files[0];
    
                    fd.append('file', file);
                    fd.append('id', "<?php echo e($subscription->id); ?>");
    
                    axios.post(SITE_URL+'manualSignedDocumentUpload',fd,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                    ).then(function(response){
                        Swal.fire('Great Job !','Manual Signed Application uploaded successfully!','success'); 
    
                        $('#updateSignDocumentModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);  
    
                    })
                    .catch(function(){
                        //Swal.fire('Sorry !','Contract Information edit faild!','error');
                    });
                }
            });
            /***********************/

            $('.updateDocumentButton').click(function(e){
                $('#updateDocumentForm')[0].reset();
                $('#updateDocumentModel').modal('show');

                var source_id = $(this).attr("get-ss-id");
                $("#ss_upload_document_id").val(source_id);
            });

            var drEvent = $('.updateDocument').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                console.log(element);
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                
                alert('File deleted');
            });

            $('.updateDocument').change(function() {
                
                if ($(this).get(0).files.length) {
                    var csrfToken = "<?php echo e(csrf_token()); ?>";
                    var fd = new FormData();
                    var file = $(this)[0].files[0];
                    fd.append('file', file);
                    fd.append('id', $("#ss_upload_document_id").val());
                    
                    axios.post(SITE_URL+'documentUpload',fd,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                    ).then(function(response){
                        Swal.fire('Great Job !','Document uploaded successfully!','success');   
    
                        $('#updateDocumentModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);               
                    })
                    .catch(function(){
                        //Swal.fire('Sorry !','Contract Information edit faild!','error');
                    });
                }
            });
        });

        $(document).on("click","#reinvestmentGenerate",function() {
            
            var sub_id = "<?php echo e($subscription->id); ?>";
            
            Swal.fire({
                title: "Are you sure?",
                text: "Please Enter Investment ID:",
                input: 'text',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter investment ID ex:OALIOC'
                    }
                }
            }).then((result) => {
                if (result.value) {
                    
                    preloader_init();
                    
                    var invest_id = result.value;
                    var invest_no = invest_id.toUpperCase(); 
                    axios.get(SITE_URL+'autoGenerateInvestment?sub_id='+sub_id+"&investment_id="+invest_no).then(function (response) {
                        
                        preloader_off();
                        Swal.fire('Great Job !','The investment cloned successfully!','success');
                        setTimeout(location.reload.bind(location), 3500);
                    })
                    .catch(function (error) {
                        preloader_off();
                        
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    }); 
                }
            });
        });  

        $('#redemptionButton').click(function(e){
            $('#formRedemption')[0].reset();
            $('#redemptionModal').modal('show');
            
        });
        
        $('#redemption-status').change(function(){
            if($(this).val() == 1){
                $('#reasons_div').show();
                $("#redemption_amount").attr("required", "required");
            }else{
                $('#reasons_div').hide();
                $("#redemption_amount").removeAttr("required");
                
            }
        });
        
       
        
        $('#formRedemption').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                var csrfToken = "<?php echo e(csrf_token()); ?>";

                const form = document.getElementById('formRedemption');
                let formData = new FormData(form);

                $('#redemptionModal').modal('hide');
                
                axios.post(SITE_URL+'redemptionUpdate',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item =response.data;

                    if(item.error){

                        Swal.fire('Great Job !','Redemption form status change successfully, and email sent!','success');

                        $('#formRedemption')[0].reset();
                        $('#redemptionModal').modal('hide');

                        setTimeout(location.reload.bind(location), 3500);
                    }else{

                        $('#redemptionModal').modal('hide');
                        Swal.fire('Sorry !','Redemption Form status change faild!','error');
                    } 
                })
                .catch(function(){

                    $('#redemptionModal').modal('hide');
                    Swal.fire('Sorry !','Redemption Form status change faild!','error');
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php 
    
    function floatvalue($val){
            $val = str_replace(",",".",$val);
            $val = preg_replace('/\.(?=.*\.)/', '', $val);
            return floatval($val);
    }

    function getDocument($ssDocumentAs){

        $output = [];
        foreach ($ssDocumentAs as $document) {
                                            
            $id = $document['id'];
            $main_type = $document['main_type'];
            $sub_type = $document['sub_type'];
            $file = $document['file'];
            $name = $document['remarks'];

            
            if($main_type == 1){
                ///********5*******///
                if($sub_type == 11){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file"=> $file, "name"=> $name];
                }else if($sub_type == 12){
                    
                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file"=> $file, "name" => $name];
                }else if($sub_type == 13){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file"=> $file, "name" => $name];
                }else if($sub_type == 14){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 15){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
                
            }else if($main_type == 2){
                ///*******6********///
                if($sub_type == 21){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 22){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 23){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 24){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 25){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 26){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
                
            }else if($main_type == 3){
                ///*******5********///
                if($sub_type == 31){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 32){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 33){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 34){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 35){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
               
            }else if($main_type == 4){
                ///*******5********///
                if($sub_type == 41){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 42){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 43){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 44){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 45){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
            }else if($main_type == 5){
                ///*******5********///
                if($sub_type == 51){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 52){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 53){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 54){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 55){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
            }else if($main_type == 6){
                //*******3********///
                if($sub_type == 61){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 62){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }else if($sub_type == 63){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
            }else if($main_type == 7){
                //*******3********///
                if($sub_type == 71){

                    $output[] = ["id"=> $id, "main_type"=> $main_type,"sub_type"=> $sub_type, "file" => $file, "name" => $name];
                }
            }
        }// For Loop
        return $output;
    }//End Function
?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/admin/subscriptionView.blade.php ENDPATH**/ ?>