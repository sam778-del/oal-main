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
                                    <h4 class="card_title">Confirm Send Mail</h4>
                                </div>
                                <div class="col-md-2">
                                   <a class="btn btn-secondary" href="#" onclick="location.href = document.referrer; return false;" style="float: right"><i class="fa fa-angle-double-left"></i> Back</a>
                                </div>
                            </div>
                        </div>


                        {!! Form::open(array('url' => '/messages/confirm', 'method'=>'POST', 'files' => true, 'id' => 'user-form', 'onSubmit'=>'return validateForm()', 'autocomlete'=>"off" )) !!}
                            <div class="card-body">

                                <div class="row col-md-12">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
										<tbody>
											<tr>
												<th>Email Type</th>
												<td>{{ $sendDatas['type'] }}
												</td>
											</tr>
											<tr>
												<th>From Name</th>
												<td><?php echo $sendDatas['from_name']; ?></td>
											</tr>
											<tr>
												<th>From Email</th>
												<td><?php echo $sendDatas['from_email']; ?></td>
											</tr>
											<tr>
												<th>Email Subject</th>
												<td><?php echo $sendDatas['subject']; ?></td>
											</tr>
											
											<tr>
												<th>Email Message</th>
												<td>{!! $sendDatas['message'] !!}</td>
											</tr>
										</tbody>
									</table>

									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<tr>
												<th><?php echo __('#'); ?></th>
												<th style="vertical-align: top">
												    <input type="checkbox" value="1" name="UserEmails.sel_all" checked=true class="emailcheckall"  style="margin-left:0px;"></th>
												<th>Name</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											<?php	
												if(!empty($sendDatas['users'])) {
												$i = 1;
												foreach($sendDatas['users'] as $row) {
													$trclass = '';
													$checked = true;
													$cls = 'emailcheck';
													if(empty($row['email'])) {
														$trclass = 'error';
														$checked = false;
														$cls = '';
													}
													echo "<tr class='".$trclass."'>";
														echo "<td>".$i."</td>";
														echo "<td>";
														    
														    echo '<input type="checkbox" value="1" name="emailcheck[]" checked="'.$checked.'" class="'.$cls.'"> ';
                                                            echo '<input type="hidden" name="uid[]" value="'.$row['id'].'">';
                                                            echo '<input type="hidden" name="email[]" value="'.$row['email'].'">';

														echo "</td>";
														echo "<td>".$row['name']."</td>";
														echo "<td>".$row['email']."</td>";
													echo "</tr>";
													$i++;
												}
											} else {
												echo "<tr><td colspan=7><br/><br/>".__('No Users')."</td></tr>";
											} ?>
										</tbody>
									</table>

									
                                </div>
                                <div class="row col-md-12 mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group float-sm-right">
                                            <button type="submit" class="btn btn-primary">Confirm & Send</button>                    
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
     <script type="text/javascript">

       	$(function(){
			$('.emailcheckall').change(function() {
				if($(this).is(':checked')) {
					$(".emailcheck").prop("checked", true);
				} else {
					$(".emailcheck").prop("checked", false);
				}
			});
		});
		function validateForm() {
			if(!$(".emailcheck").is(':checked')) {
				alert("<?php echo __('Please select atleast one user to send email');?>");
				return false;
			} else {
				if(<?php echo (empty($userEmailEntity['schedule_date'])) ? 1 : 0; ?>) {
					if(!confirm("<?php echo __('Are you sure, you want to continue sending emails?');?>")) {
						return false;
					}
				}
			}
			return true;
		}
     </script>
@stop