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
                                <div class="col-md-10">
                                    <h4 class="card_title">Investors Create</h4>
                                </div>
                                <div class="col-md-2">
                                   <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;" style="float: right"><i class="fa fa-angle-double-left"></i> Back</a>
                                </div>
                            </div>
                        </div>


                        {!! Form::open(array('route' => 'users.store', 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off" )) !!}
                            <div class="card-body">

                                <div class="row col-md-12">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Salutation</label>
                                            <?php 
                                                $salutationOption = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato',"Dato Sri."=>"Dato Sri","Datin."=>"Datin","Datuk."=>"Datuk", "Datuk Sri."=>"Datuk Sri","Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku']; ?>
                                                            
                                                {!! Form::select('salutation', $salutationOption, old('salutation') ? old('salutation') : "", ['class' => 'form-control', 'id' => 'salutation']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="date">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-parsley-minlength="8" data-parsley-errors-container=".errorspannewpassinput" data-parsley-required-message="Please enter your new password." data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <span class="errorspannewpassinput"></span>

                                            <span class="invalid-feedback" role="alert">Must have at least 8 characters with at least one Capital letter at least one lower case letter and at least one number and at least one special character.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="date"> Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-parsley-equalto="#password" data-parsley-minlength="8" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" data-parsley-special="1" data-parsley-errors-container=".errorspanconfirmnewpassinput"  
                                                data-parsley-required-message="Please re-enter your new password."  data-parsley-required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="ip">Country Code</label>
                                            {!! Form::select('mobile_prefix', $phone_prefix, old('mobile_prefix'), ['class' => 'form-control', 'id'=>'mobile_prefix', "data-parsley-type"=>"digits", 'required' =>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="ip">Phone Number</label>
                                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Phome Number" data-parsley-type="digits" value="{{ old('mobile_no') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="time">Address Line 1</label>
                                            <input type="text" class="form-control" id="address_line1" name="address_line1"  placeholder="Address  Line1" value="{{ old('address_line1') }}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="time">Address Line 2</label>
                                            <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Address  Line2" value="{{ old('address_line2') }}" >
                                        </div>
                                    </div>

                                    

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="datetime">City</label>
                                            <input type="text" class="form-control" id="city" name="city"  placeholder="City" value="{{ old('city') }}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Country</label>
                                            {!! Form::select('country', $countries, null, ['class' => 'form-control', 'id'=>'country_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="credit-card">Post Code</label>
                                            <input type="text" class="form-control" id="postcode" name="post_code" placeholder="Post Code" value="{{ old('post_code') }}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" name="state" id="state_id">
                                                <option value="">--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}

                                <div class="row col-md-12 mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group float-sm-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>                    
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                @include('admin.elements.footer')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
     {!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#user-form') !!}

     <script type="text/javascript">

        //has uppercase
        window.Parsley.addValidator('uppercase', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var uppercases = value.match(/[A-Z]/g) || [];
                return uppercases.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) uppercase letter.'
            }
        });

        //has lowercase
        window.Parsley.addValidator('lowercase', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var lowecases = value.match(/[a-z]/g) || [];
                return lowecases.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) lowercase letter.'
            }
        });

        //has number
        window.Parsley.addValidator('number', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var numbers = value.match(/[0-9]/g) || [];
                return numbers.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) number.'
            }
        });

        //has special char
        window.Parsley.addValidator('special', {
            requirementType: 'number',
            validateString: function(value, requirement) {
                var specials = value.match(/[^a-zA-Z0-9]/g) || [];
                return specials.length >= requirement;
            },
            messages: {
                en: 'Your password must contain at least (%s) special characters.'
            }
        });

        $('#country_id').change(function(){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    var state = data.data;
                    $('#state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }
                }
            });
        });

        var country_id = $('#country_id').val();
        if(country_id){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+country_id,
                type:"GET",
                success: function(data) {
                    var default_state = "{{ old('state') }}";

                    var state = data.data;
                    $('#state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }

                    $('#state_id').val(default_state);
                }
            });
        }
     </script>
@stop