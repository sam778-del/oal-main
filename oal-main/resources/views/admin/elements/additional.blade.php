<div class="row mt-4">
	<div class="col-lg-12 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="date">Name</label>
			<input type="text" class="form-control" id="lc_name" name="lc_name" placeholder="Name" data-parsley-group="block2" value="{{$edit ? $subscription->lc_name : old('lc_name') }}"  required>
		</div>
	</div>
	<div class="col-lg-12 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="ip">Email</label>
			<input type="email" class="form-control" id="lc_email" name="lc_email" placeholder="Email" data-parsley-group="block2" value="{{$edit ? $subscription->lc_email : old('lc_email') }}" required>
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-12">
		<div class="form-group">
			<label for="ip">Country Code</label>
			{!! Form::select('lc_phone_prefix', $phone_prefix, $edit ? $subscription->lc_phone_prefix : old('lc_phone_prefix'), ['class' => 'form-control', 'id'=>'lc_phone_prefix', 'data-parsley-group'=>"block2"]) !!}
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-12">
		<div class="form-group">
			<label for="ip">Phone Number</label>
			<input type="text" class="form-control" id="lc_phone_number" name="lc_phone_number" placeholder="Phome Number" data-parsley-group="block2" data-parsley-type="digits" value="{{$edit ? $subscription->lc_phone_number : old('lc_phone_number') }}" required>
		</div>
	</div>
	
	<div class="col-lg-5 col-md-5 col-sm-12">
		<div class="form-group">
			<label for="ip">Facsimile</label>
			<input type="text" class="form-control" id="lc_facsimile" name="lc_facsimile" placeholder="Facsimile" data-parsley-group="block2" value="{{$edit ? $subscription->lc_facsimile : old('lc_facsimile') }}">
		</div>
	</div>
	<div style="height: 1px ;border: 0.2px dashed #d9d9d9;width: 100%;margin: 15px auto;"></div>
	<h4 class="pl-2 pt-2">SUBSCRIBER DETAILS</h4>
	<div class="row sec2-form mt-3">
		<div class="col-lg-12 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="exampleFormControlSelect1">Legal Status Of  Subsciber</label>
				<?php 
				    $legal_statusOption = ['1'=> 'Individual','2'=> 'Company','3'=> 'General partnership','4'=> 'Limited partnership','5'=> 'Trust','6'=> 'Other']; 
				    if($edit){
				        if($subscription->legal_status == 1){
				            $legal_status_value = "Individual";
				        }else if($subscription->legal_status == 2){
				            $legal_status_value = "Company";
				        }else if($subscription->legal_status == 3){
				            $legal_status_value = "General partnership";
				        }else if($subscription->legal_status == 4){
				            $legal_status_value = "Limited partnership";
				        }else if($subscription->legal_status == 5){
				            $legal_status_value = "Trust";
				        }else{
				            $legal_status_value = "Other";
				        }
				    }else{
				        $legal_status_value = "";
				    }
				?>
				
				<?php if($additional){ ?>
				    <input type="hidden" id="legal_status" name="legal_status" data-parsley-group="block2" value="{{$edit ? $subscription->legal_status : old('legal_status') }}">
			        <input type="text" readonly class="form-control" id="legal_status2" name="legal_status2" data-parsley-group="block2" value="{{ $legal_status_value }}">
			    <?php }else{ ?>
			        {!! Form::select('legal_status', $legal_statusOption, $edit ? $subscription->legal_status : old('legal_status'), ['class' => 'form-control', 'id' => 'legal_status', 'data-parsley-group'=>"block2", 'required', 'onchange'=>"changeLegal_status()"]) !!}
			    <?php } ?>
			</div>
		</div>
		<div class="col-lg-12 col-md-6 col-sm-12 legal_status_other_div">
			<div class="form-group">
				<label for="ip">If Other Please Specify</label>
				<input type="text" class="form-control" id="legal_status_other" name="legal_status_other" placeholder="Please Specify" data-parsley-group="block2" value="{{$edit ? $subscription->legal_status_other : old('legal_status_other') }}">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="form-group">
				<label for="ip">If the Subscriber is not an individual, please specify the jurisdiction under whose laws
				it is incorporated, established, formed or organised</label>
				<input type="text" class="form-control" id="jurisdiction_under" name="jurisdiction_under" placeholder="Please Specify" data-parsley-group="block2" value="{{$edit ? $subscription->jurisdiction_under : old('jurisdiction_under') }}">
			</div>
		</div>
		<div class="col-lg-12">
            <?php 
                if(!empty($subscription->ownership_status)){
                    $edit_ownership_status = $subscription->ownership_status;
                }else{
                    $edit_ownership_status = 0;
                }
            ?>
			<div class="form-group">
				<label>Ownership Status </label>
				<div class=" mt-2 string-check string-check-bordered-base mb-2">
					<input type="radio"  name="ownership_status" id="ownership_status1" value="1" {{ $edit_ownership_status == '1' ? 'checked' : '' }} data-parsley-group="block2"  required>
					<label class="string-check-label" for="formRadioInput021">
						<span class="ml-2">The Subscriber represents and warrants that it will hold any interest in the Fund to which it may become entitled for itself beneficially and not as nominee, agent or trustee for
						another.</span>
					</label>
				</div>
				<div class="string-check string-check-bordered-base mb-2">

					<input type="radio"  name="ownership_status" id="ownership_status2" value="2" {{ $edit_ownership_status == '2' ? 'checked' : '' }} data-parsley-group="block2" required>
					<label class="string-check-label" for="formRadioInput022">
						<span class="ml-2">The Subscriber represents and warrants that it will hold any interest in the Fund to which it may become entitled as nominee or trustee for the following other person(s) or
							entity(ies), in which case: (i) the Subscriber is duly authorised to give the representations,
							warranties, acknowledgements and confirmations in this Subscription Agreement on behalf
							of each of the beneficiaries, and (ii) the Subscriber acknowledges and accepts that it (and
							not the beneficial owner(s)) will be treated as the holder of any interest(s) granted in
							respect of this Subscription Agreement and will be the Subscriber for all purposes under
							this Subscription Agreement and will be registered as a limited partner in the Fund under
							the Law. The Subscriber acknowledges and accepts, however, that it may still be required
							to provide the Fund with certain information in respect of the beneficial owner(s) in order
						that the Fund can satisfy any applicable anti-money laundering laws and regulations</span>
					</label>
				</div>
				<div class="string-check string-check-bordered-base mb-2">
					<input type="radio"   name="ownership_status" id="ownership_status3" value="3" {{ $edit_ownership_status == '3' ? 'checked' : '' }} data-parsley-group="block2" required>
					<label class="string-check-label" for="formRadioInput023">
						<span class="ml-2">The Subscriber represents and warrants that it is applying for an interest in the Fund as
							agent for the following other person(s) or entity(ies), in which case: (i) it is duly authorised
							to give the representations, warranties, acknowledgements and confirmations in this
							Subscription Agreement on behalf of each such person(s) or entity(ies), and (ii) it
							acknowledges and accepts that such person(s) or entity(ies) will be treated as the holder
							of any interest(s) granted in respect of this Subscription Agreement and will be the 
							13
							Subscriber for all purposes under this Subscription Agreement and will be registered as a
						limited partner in the Fund under the Law</span>
					</label>
				</div>
			</div>
		</div>
		<!--  -->
		<!-- radioValue1 -->
		<div class="row mt-4 sec2-form" id="ownership_status_details">
			<div class="row col-md-12">	
				<div class="col-lg-12 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="date">Name</label>
						<input type="text" class="form-control" id="os_name" name="os_name" placeholder="Name" data-parsley-group="block2" value="{{$edit ? $subscription->os_name : old('os_name') }}">
					</div>
				</div>
				<div class="col-lg-12 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="time">Address Line 1</label>
						<input type="text" class="form-control" id="os_address_line1" name="os_address_line1"  placeholder="Address Line1" data-parsley-group="block2" value="{{$edit ? $subscription->os_address_line1 : old('os_address_line1') }}">
					</div>
				</div>
				<div class="col-lg-12 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="time">Address Line 2</label>
						<input type="text" class="form-control" id="os_address_line2" name="os_address_line2" placeholder="Address Line2" data-parsley-group="block2" value="{{$edit ? $subscription->os_address_line2 : old('os_address_line2') }}">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="datetime">City</label>
						<input type="text" class="form-control" id="os_city" name="os_city"  placeholder="City" data-parsley-group="block2" value="{{$edit ? $subscription->os_city : old('os_city') }}">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Country</label>
						{!! Form::select('os_country', $countries, $edit ? $subscription->os_country : old('os_country'), ['class' => 'form-control', 'id'=>'os_country_id', 'required', 'data-parsley-group'=>"block2"]) !!}
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="credit-card">Post Code</label>
						<input type="text" class="form-control" id="os_post_code" name="os_post_code" placeholder="Post Code" data-parsley-group="block2" data-parsley-type="digits" value="{{$edit ? $subscription->os_post_code : old('os_post_code') }}">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group">
						<label for="exampleFormControlSelect1">State</label>
						<select class="form-control" name="os_state" id="os_state_id" data-parsley-group="block2">
			                <option value="">--</option>
			            </select>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>