<div class="row mt-4">
	<div class="col-lg-4 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="exampleFormControlSelect1">Salutation</label>
			<?php 

				$salutationOption = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato',"Dato'."=> "Dato","Dato Sri."=>"Dato Sri","Dato' Sri."=>"Dato' Sri","Datin."=>"Datin","Datuk."=>"Datuk","Datuk Seri."=>"Datuk Seri","Datuk Sri."=>"Datuk Sri","Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku']; ?>
			{!! Form::select('salutation', $salutationOption, $subscription->salutation,
                ['class' => 'form-control', 'id' => 'salutation', 'data-parsley-group'=>"block1", 'required']) !!}
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-12">
		<div class="form-group">
			<label for="date">Name</label>
			<input type="text" class="form-control" id="name" name="name"   placeholder="Name" value="{{ $subscription->name }}" data-parsley-group="block1" required>
		</div>
	</div>
	
	<div class="col-lg-12 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="time">Address Line 1</label>
			<input type="text" class="form-control" id="address_line1" name="address_line1"  placeholder="Address Line1" value="{{ $subscription->address_line1}}" data-parsley-group="block1" required>
		</div>
	</div>
	<div class="col-lg-12 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="time">Address Line 2</label>
			<input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Address Line2" value="{{ $subscription->address_line2 }}" data-parsley-group="block1">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="datetime">City</label>
			<input type="text" class="form-control" id="city" name="city"  placeholder="City" value="{{ $subscription->city }}" data-parsley-group="block1" required>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="exampleFormControlSelect1">Country</label>
			{!! Form::select('country', $countries, $subscription->country, ['class' => 'form-control', 'id'=>'country_id', 'required', 'data-parsley-group'=>"block1"]) !!}
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="credit-card">Post Code</label>
			<input type="text" class="form-control" id="post_code" name="post_code" data-parsley-group="block1" placeholder="Post Code" value="{{ $subscription->post_code }}" required>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label for="exampleFormControlSelect1">State</label>
			<select class="form-control" name="state" id="state_id" data-parsley-group="block1" required>
                <option value="">--</option>
            </select>
		</div>
	</div>
	<div style="height: 1px ;border: 0.2px dashed #d9d9d9;width: 100%;margin: 15px auto;"></div>
	<div class="row col-md-12 sec2-form mt-3">
		<div class="col-lg-12 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="license-plate">Subscription Amount </label>
				<input type="text" class="form-control" id="amount" name="amount" placeholder="Subscription Amount" data-parsley-group="block1" data-parsley-type="digits" value="{{ $subscription->amount }}" required , data-parsley-min="{{ $amount }}" data-parsley-error-message="Minimum additional investment amount is {{ $amount }}" data-parsley-errors-container="#initial_investment_error">
				
				<div id="initial_investment_error"></div>
			</div>
		</div>
	</div>
	<div style="height: 1px ;border: 0.2px dashed #d9d9d9;width: 100%;margin: 15px auto;"></div>
	<h4 class="pl-2 pt-2">BANK DETAILS</h4>
	<div class="row sec2-form mt-3">
		<div class="col-lg-12 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="phone">Bank Name</label>
				<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" data-parsley-group="block1" value="{{ $subscription->bank_name }}" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="ip">Bank Address</label>
				<input type="text" class="form-control" id="bank_address" name="bank_address" placeholder="Bank Address" data-parsley-group="block1" value="{{ $subscription->bank_address }}" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="phone">Account Name</label>
				<input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" data-parsley-group="block1" value="{{ $subscription->account_name }}" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="ip">Account Number</label>
				<input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" data-parsley-group="block1" data-parsley-type="digits" value="{{ $subscription->account_number }}" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="phone">Swift Address</label>
				<input type="text" class="form-control" id="swift_address" name="swift_address" placeholder="Swift Address" data-parsley-group="block1" value="{{ $subscription->swift_address }}" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="ip">Bank IBAN#</label>
				<input type="text" class="form-control" id="bank_inan" name="bank_inan" placeholder="Bank IBAN" data-parsley-group="block1" value="{{ $subscription->bank_inan }}">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="ip">Reference</label>
				<input type="text" class="form-control" id="reference" name="reference" placeholder="Reference" data-parsley-group="block1" value="{{ $subscription->reference }}">
			</div>
		</div>
		
		<div class="col-lg-12 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="exampleFormControlSelect1">Joint Account</label>

				<?php $jointOption = ['1'=> 'No','2'=> 'Yes']; ?>
				{!! Form::select('is_joint_account', $jointOption, $subscription->is_joint_account, ['class' => 'form-control', 'id' => 'is_joint_account', 'data-parsley-group'=>"block1", 'required', 'onchange'=>"jointApplicant()", 'data-parsley-group'=>"block1", 'required'=>"required"]) !!}
			</div>
		</div>
	</div>
	<div class="row mt-2 pl-3 joint-applicant-blocks" id="joint-applicants">
		<div class="row col-md-12">
			<div class="col-lg-12 col-md-8 col-sm-12">
				<div class="form-group">
					<label for="date">Joint Applicant Name </label>
					<input type="text" class="form-control" id="ja_name" name="ja_name" placeholder="Name" data-parsley-group="block1" value="{{ $subscription->ja_name }}">
				</div>
			</div>
			<div class="col-lg-12 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="time">Address Line 1</label>
					<input type="text" class="form-control" id="ja_address_line1" name="ja_address_line1" placeholder="Address Line1" data-parsley-group="block1" value="{{ $subscription->ja_address_line1 }}">
				</div>
			</div>
			<div class="col-lg-12 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="time">Address Line 2</label>
					<input type="text" class="form-control" id="ja_address_line2" name="ja_address_line2" placeholder="Address Line2" data-parsley-group="block1" value="{{ $subscription->ja_address_line2 }}">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="datetime">City</label>
					<input type="text" class="form-control" id="ja_city" name="ja_city"  placeholder="City" data-parsley-group="block1" value="{{ $subscription->ja_city }}">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Country</label>
					{!! Form::select('ja_country', $countries,  $subscription->ja_country, ['class' => 'form-control', 'id'=>'ja_country_id', 'data-parsley-group'=>"block1"]) !!}
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="credit-card">Post Code</label>
					<input type="text" class="form-control" id="ja_post_code" name="ja_post_code" placeholder="Post Code" data-parsley-group="block1" data-parsley-type="digits" value="{{ $subscription->ja_post_code }}">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="form-group">
					<label for="exampleFormControlSelect1">State</label>
					<select class="form-control" name="ja_state" id="ja_state_id" data-parsley-group="block1">
		                <option value="">--</option>
		            </select>
				</div>
			</div>


		</div>
	</div>
</div>