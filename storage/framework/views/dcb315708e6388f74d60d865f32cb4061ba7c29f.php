<?php $__env->startSection('content'); ?>

<div class="main-container">
    <div class="container-fluid">
        
        <?php echo $__env->make("investor.elements.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;" ><i class="fa fa-angle-double-left"></i> Back</a>
					</div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row pd-3 ml-3 mt-3">
                                <?php if($subscription->manual_signed_doc_enable == 1){ ?>
                                    <a href="<?php echo e(asset('storage/'.$subscription->manual_signed_doc )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Signed Application</a>
                                <?php }else{ ?>
                                    <a href="<?php echo e(url('/investor/signedPdf/'.$subscription->id )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Signed Application</a>
                                <?php } ?>

                                <a href="<?php echo e(url('investor/bankPdf/'.$subscription->id )); ?>" class="btn btn-base btn-rounded btn-fw mt-1 mr-1" target="_blank">Download Bank Instructions</a>

                                <?php
                                if($subscription->status == 3){ 
                                    if($subscription->redemption_request == 1){ 
                                        if($subscription->redemption_status == 0){
                                            echo '<button class="btn btn-info btn-rounded btn-fw mt-1 mr-1"> Redemption Request Sent</button>';
                                        }else if($subscription->redemption_status == 1){
                                            echo '<button class="btn btn-info btn-rounded btn-fw mt-1 mr-1"> Redemption Request Approved</button>';

                                            echo '<button class="btn btn-info btn-rounded btn-fw mt-1 mr-1" id="redemptionButton"> Redemption Request Form</button>';

                                        }else if($subscription->redemption_status == 2){
                                            echo '<button class="btn btn-info btn-rounded btn-fw mt-1 mr-1"> Redemption Request Reject</button>';

                                            echo '<button class="btn btn-info btn-rounded btn-fw mt-1 mr-1" id="redemptionButton"> Redemption Request Form</button>';
                                        }
                                    }else{ ?>
                                        <button type="button" class="btn btn-warning mt-1 mr-1" id="redemptionButton">Redemption Request Form</button>

                                <?php }} ?>
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
                                    <h4 class="card_title">Payout</h4>
                                </div>
                            </div>
                            
                            <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="col-lg-12 col-md-12">
								        <div class="table-responsive table-space-sm">
        									<table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">PAYOUT DATE</th>
                                                        <th scope="col">AMOUNT(USD)</th>
                                                        <th scope="col">REFERENCE</th>
                                                        <th scope="col">FILE</th>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card_title">Address</h4>
                                </div>
                            </div>
                            
                            <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    <div class="table-responsive table-space-sm">
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
                                    <h4 class="card_title">Bank Details</h4>
                                </div>
                                
                                <?php if($subscription->changebank_request == 1){ ?>
                                    <div class="col-md-4">
                                        <a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm" style="float: right"> Change Bank Request Sent</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a type="button" href="<?php echo e(asset('storage/'.$subscription->changebank_file)); ?>" class="btn btn-primary btn-sm" download style="float: right"> Download</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                <?php }else{ ?>
                                    <div class="col-md-6">
                                        <a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm" id="changeBankButton" style="float: right"> Change Bank Details</a>
                                    </div>
                                <?php } ?> 
                            </div>

                            <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
    							        <table class="table table-borderless">
    									    <tbody>
    									        <tr>
    									            <th width="112px">Bank Name</th>
    									            <td><?php echo e($subscription->bank_name); ?> </td>
    									            <th width="145px">Account Address</th>
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
                                    <h4 class="card_title">Joint Account Details</h4>
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
                                    <h4 class="card_title">Lead Contact Details</h4>
                                </div>
                            </div>
                            
                            <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <th width="77px">Name</th>
                                    	            <td><?php echo e($subscription->lc_name); ?></td>
                                    	            <th width="85px">Email</th>
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
                                    <h4 class="card_title">Subscriber Details</h4>
                                </div>
                            </div>
                            
                            <div class="row mb-2 ml-2 show-border">
                                <div class="row col-md-12 show-first-sec">
                                    
                                    <div class="table-responsive table-space-sm">
                                        <table class="table table-borderless">
                                    	    <tbody>
                                    	        <tr>
                                    	            <th width="182px">Legal Status Of  Subsciber</th>
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
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4 class="card_title">Documents & Signature</h4>
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
            <?php echo $__env->make('investor.elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

            <?php echo Form::open(['url' => '/investor/redemptionUpload', 'files' => true, 'id' => 'formRedemption', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" ]); ?>


            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <a href="<?php echo e(asset('project_img/Redemption-form-Class-A-Participating-Shares.docx')); ?>" download> Download redemption form</a>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <span class="text-danger">Please fill and upload redemption form for processing </span>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Document</label> 
                                <input type="file" class="updateSignDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg docx" data-show-remove="false" required/>
                            </div>
                        </div>
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


<div class="modal fade" id="changeBankModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
            <div class="modal-header">
                <h5 class="modal-title">Change Bank Details Form</h5>
            </div>

            <?php echo Form::open(['url' => '/investor/changeBankDetailsUpload', 'files' => true, 'id' => 'formchangeBank', 'data-parsley-validate' => 'data-parsley-validate', 'autocomlete'=>"off" ]); ?>


            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <a href="<?php echo e(asset('project_img/Banking-Details.pdf')); ?>" target="_blank" > Download Bank Details Change Form</a>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <span class="text-danger">Please fill and upload bank details form for processing </span>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Document</label> 
                                <input type="file" class="updateSignBankDocument" attr-sub_type="11" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg" data-show-remove="false" required/>
                            </div>
                        </div>
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


<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>
    <script> 

        $('#redemptionButton').click(function(e){
            $('#formRedemption')[0].reset();
            $('#redemptionModal').modal('show');        
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
                fd.append('sub_att_id', <?php echo e($subscription->id); ?>);
    
                axios.post(SITE_URL+'investor/redemptionUpload',fd,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    Swal.fire('Great Job !','You have uploaded redemption form successfully, OAL team will verify the Redemption Form!','success');
    
                    $('#redemptionModal').modal('hide');
                    setTimeout(location.reload.bind(location), 1500);  
    
                })
                .catch(function(){
                    $('#redemptionModal').modal('hide');
                    Swal.fire('Sorry !','Redemption Form upload faild!','error');
                });
            }
        });
        /***********************/

        $('#changeBankButton').click(function(e){
            $('#formchangeBank')[0].reset();
            $('#changeBankModal').modal('show');        
        });

        var drEvent = $('.updateSignBankDocument').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            console.log(element);
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            
            alert('File deleted');
        });

        $('.updateSignBankDocument').change(function() {
            
            if ($(this).get(0).files.length) {
                var csrfToken = "<?php echo e(csrf_token()); ?>";
                var fd = new FormData();
                var file = $(this)[0].files[0];
    
                fd.append('file', file);
                fd.append('sub_att_id', <?php echo e($subscription->id); ?>);
    
                axios.post(SITE_URL+'investor/changeBankDetailsUpload',fd,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    Swal.fire('Great Job !','You have uploaded bank details form successfully, OAL team will verify the bank details form!','success');
    
                    $('#changeBankModal').modal('hide');
                    setTimeout(location.reload.bind(location), 1500);  
    
                })
                .catch(function(){
                    $('#changeBankModal').modal('hide');
                    Swal.fire('Sorry !','Bank details form upload faild!','error');
                });
            }
        });
        /***********************/
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/investor/subscriptionView.blade.php ENDPATH**/ ?>