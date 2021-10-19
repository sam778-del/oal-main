@section('scripts')
	<script>
		$(document).ready(function() {

			var form = $("#subscriptionform");
	        form.children("div").steps({
	            headerTag: "h3",
	            bodyTag: "section",
	            transitionEffect: "slideLeft",
	            onStepChanging: function (event, currentIndex, newIndex){
	            	
	                console.log("Changed"+currentIndex+"--"+newIndex);
	                if (newIndex > currentIndex){
	                	var currentBlock = currentIndex+1;
	                	if (false === $('#subscriptionform').parsley().validate('block' + currentBlock)){
		                    return false;
		                }
		            }else{
		            	return true;
		            }

		            saveScubscriptionDraft();
		            return true;
	            },
	            onFinishing: function (event, currentIndex, newIndex){
	                
	                saveScubscription();
	                console.log("Submitted");
	            },
	            onFinished: function (event, currentIndex){
	                saveScubscription();
	                console.log("Submitted From");
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
	                    var default_state = "{{ old('state') ? old('state') : $userData->state }}";

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

			$('#ja_country_id').change(function(){
	            $.ajax({
	                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
	                type:"GET",
	                success: function(data) {
	                    var state = data.data;
	                    $('#ja_state_id').empty();
	                    for (var key in state) {
	                        if (state.hasOwnProperty(key)) {
	                            $('#ja_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
	                        }
	                    }
	                }
	            });
	        });

	        var ja_country_id = $('#ja_country_id').val();
	        if(ja_country_id){
	            $.ajax({
	                url: SITE_URL+'selectBoxStateList?country_id='+ja_country_id,
	                type:"GET",
	                success: function(data) {
	                    var default_state = "{{ $edit ?  $subscription->ja_state : old('ja_state') }}";

	                    var state = data.data;
	                    $('#ja_state_id').empty();
	                    for (var key in state) {
	                        if (state.hasOwnProperty(key)) {
	                            $('#ja_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
	                        }
	                    }

	                    $('#ja_state_id').val(default_state);
	                }
	            });
	        }

	        if($("#is_joint_account").val() == "2"){
	        	jointApplicant();
	        }else{
	        	jointApplicant();
	        }
	        
	        
	        $('#os_country_id').change(function(){
	            $.ajax({
	                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
	                type:"GET",
	                success: function(data) {
	                    var state = data.data;
	                    $('#os_state_id').empty();
	                    for (var key in state) {
	                        if (state.hasOwnProperty(key)) {
	                            $('#os_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
	                        }
	                    }
	                }
	            });
	        });

	        var os_country_id = $('#os_country_id').val();
	        if(os_country_id){
	            $.ajax({
	                url: SITE_URL+'selectBoxStateList?country_id='+os_country_id,
	                type:"GET",
	                success: function(data) {
	                    var default_state = "{{ $edit ?  $subscription->os_state : old('os_state') }}";

	                    var state = data.data;
	                    $('#os_state_id').empty();
	                    for (var key in state) {
	                        if (state.hasOwnProperty(key)) {
	                            $('#os_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
	                        }
	                    }
	                    $('#os_state_id').val(default_state);
	                }
	            });
	        }
	        
	        /////////////////////
	        if($("#legal_status").val() == "6"){
            	changeLegal_status();
            }else{
            	changeLegal_status();
            }
            
            /////////////////////
            var ownership_status_value = $('input:radio[name=ownership_status]').val();
    	    if (ownership_status_value == '1') { 
    			$("#ownership_status_details").hide();
    
    			$("#os_name").removeAttr("required");
                $("#os_address_line1").removeAttr("required");
                $("#os_address_line2").removeAttr("required");
                $("#os_city").removeAttr("required");
                $("#os_country_id").removeAttr("required");
                $("#os_post_code").removeAttr("required");
                $("#os_state_id").removeAttr("required");
            }
            if (ownership_status_value == '2') {
    			$("#ownership_status_details").show();
    
    			$("#os_name").attr("required", "required");
                $("#os_address_line1").attr("required", "required");
                $("#os_address_line2").attr("required", "required");
                $("#os_city").attr("required", "required");
                $("#os_country_id").attr("required", "required");
                $("#os_post_code").attr("required", "required");
                $("#os_state_id").attr("required", "required");
    
            }
    		if (ownership_status_value == '3') {
    			$("#ownership_status_details").show();
    
    			$("#os_name").attr("required", "required");
                $("#os_address_line1").attr("required", "required");
                $("#os_address_line2").attr("required", "required");
                $("#os_city").attr("required", "required");
                $("#os_country_id").attr("required", "required");
                $("#os_post_code").attr("required", "required");
                $("#os_state_id").attr("required", "required");
            }
            /////////////////////
            
            
            var subscriber_type = $('#subscriber_type').val();
	        if(subscriber_type){
	        	changeSubscriberType();
	        }

			$('input:radio[name=ownership_status]').change(function() {
		        if (this.value == '1') { 
					$("#ownership_status_details").hide();

					$("#os_name").removeAttr("required");
	                $("#os_address_line1").removeAttr("required");
	                $("#os_address_line2").removeAttr("required");
	                $("#os_city").removeAttr("required");
	                $("#os_country_id").removeAttr("required");
	                $("#os_post_code").removeAttr("required");
	                $("#os_state_id").removeAttr("required");
		        }
		        if (this.value == '2') {
					$("#ownership_status_details").show();

					$("#os_name").attr("required", "required");
	                $("#os_address_line1").attr("required", "required");
	                $("#os_address_line2").attr("required", "required");
	                $("#os_city").attr("required", "required");
	                $("#os_country_id").attr("required", "required");
	                $("#os_post_code").attr("required", "required");
	                $("#os_state_id").attr("required", "required");

		        }
				if (this.value == '3') {
					$("#ownership_status_details").show();

					$("#os_name").attr("required", "required");
	                $("#os_address_line1").attr("required", "required");
	                $("#os_address_line2").attr("required", "required");
	                $("#os_city").attr("required", "required");
	                $("#os_country_id").attr("required", "required");
	                $("#os_post_code").attr("required", "required");
	                $("#os_state_id").attr("required", "required");
		        }
		    });
            /////////////////////
            
            var drEvent = $('.dropify').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
            	console.log(element);
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                
                var main_type = $("#subscriber_type").val();
                var sub_type = $(this).attr('attr-sub-type')
                
                var csrfToken = "{{ csrf_token() }}";
				var fd = new FormData();
				var file = $(this)[0].files[0];
				fd.append('main_type', main_type);
				fd.append('sub_type', sub_type);  

				axios.post(SITE_URL+'ssdocumentRemove',fd,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
	            ).then(function(response){
	                alert('File deleted');	               
	            })
	            .catch(function(){
	                alert('Faild File deleted');
	            });
                
                
            });
            /////////////////////
		    $('.dropify').change(function() {
                
                if ($(this).get(0).files.length) {
                	var csrfToken = "{{ csrf_token() }}";
    				var fd = new FormData();
    				var file = $(this)[0].files[0];
    				fd.append('file', file);
    				fd.append('sub_type', $(this).attr('attr-sub-type'));
    				fd.append('main_type', $("#subscriber_type").val());
    				fd.append('remarks', $(this).attr('attr-remarks'));  
    
    				axios.post(SITE_URL+'ssdocumentUpload',fd,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
    	            ).then(function(response){
    	                //Swal.fire('Great Job !','Contract Information create successfully!','success');	               
    	            })
    	            .catch(function(){
    	                //Swal.fire('Sorry !','Contract Information edit faild!','error');
    	            });
                }else{
                    $(this).attr("required", "required");
                }
            });
            //////////////////////
            
            
		});
        
        

            <?php
            	if($edit):
            		if(!empty($subscription['SsDocumentAs'])):
                       	$documents = getDocument($subscription['SsDocumentAs']);
                       	foreach ($documents as $document):
                       		$subtype = $document['sub_type'];
        		?>
        				var subtype = "{{ $subtype }}";
        				var imagenUrl = "{{ asset('storage/'.$document['file']) }}";
    		            $("#subtype"+subtype).attr("data-default-file", imagenUrl);
    		            $("#subtype"+subtype).removeAttr("required");
    		            $("#subtype"+subtype).attr("data-remove-required", 1);
    
            <?php 
                		endforeach;
            		endif; 
        		endif; 
        	?>

        var csrfToken = "{{ csrf_token() }}";
        
		function jointApplicant() {
		  	var x = document.getElementById("is_joint_account").value;
			if(x == 2){
				$(".joint-applicant-blocks").show();	
				//$(".status-sign").show();	

				$("#ja_name").attr("required", "required");
                $("#ja_address_line1").attr("required", "required");
                $("#ja_address_line2").attr("required", "required");
                $("#ja_city").attr("required", "required");
                $("#ja_country_id").attr("required", "required");
                $("#ja_post_code").attr("required", "required");
                $("#ja_state_id").attr("required", "required");

			}else if(x == 1){
				$(".joint-applicant-blocks").hide();	
				//$(".status-sign").hide();

				$("#ja_name").removeAttr("required");
                $("#ja_address_line1").removeAttr("required");
                $("#ja_address_line2").removeAttr("required");
                $("#ja_city").removeAttr("required");
                $("#ja_country_id").removeAttr("required");
                $("#ja_post_code").removeAttr("required");
                $("#ja_state_id").removeAttr("required");
				
			}
		}
		
		function changeLegal_status() {
		  	var x = document.getElementById("legal_status").value;
		  	if(x == 6){
		  		$(".legal_status_other_div").show();
		  		$("#legal_status_other").attr("required", "required");
		  	    
		  	}else{
		  		$(".legal_status_other_div").hide();
		  		$("#legal_status_other").removeAttr("required");
		  	}
		}

		function changeSubscriberType() {
		  	var x = document.getElementById("subscriber_type").value;
		  
		  	if(x == 1){
		  		$(".status-individual").show();
		  		$(".status-private").hide();
		  		$(".status-trust").hide();
		  		$(".status-fund").hide();
		  		$(".status-regular").hide();
		  		$(".status-investment").hide();
		  		
				var remove_required11 = $("#subtype11").attr("data-remove-required");
				var remove_required12 = $("#subtype12").attr("data-remove-required");
				var remove_required13 = $("#subtype13").attr("data-remove-required");
				var remove_required14 = $("#subtype14").attr("data-remove-required");
				var remove_required15 = $("#subtype15").attr("data-remove-required");
				
				if(remove_required11 == 1){
				    $("#subtype11").removeAttr("required");
				}else{
				    $("#subtype11").attr("required", "required");
				}
				
				if(remove_required12 == 1){
				    $("#subtype12").removeAttr("required");
				}else{
				    $("#subtype12").attr("required", "required");
				}
				
				if(remove_required13 == 1){
				    $("#subtype13").removeAttr("required");
				}else{
				    $("#subtype13").attr("required", "required");
				}
				
				if(remove_required14 == 1){
				    $("#subtype14").removeAttr("required");
				}else{
				    $("#subtype14").attr("required", "required");
				}
				
				if(remove_required15 == 1){
				    $("#subtype15").removeAttr("required");
				}else{
				    $("#subtype15").attr("required", "required");
				}
				
				$("#subtype21").removeAttr("required");
				$("#subtype22").removeAttr("required");
				$("#subtype23").removeAttr("required");
				$("#subtype24").removeAttr("required");
				$("#subtype25").removeAttr("required");
				$("#subtype26").removeAttr("required");
				
				$("#subtype31").removeAttr("required");
				$("#subtype32").removeAttr("required");
				$("#subtype33").removeAttr("required");
				$("#subtype34").removeAttr("required");
				$("#subtype35").removeAttr("required");
				
				$("#subtype41").removeAttr("required");
				$("#subtype42").removeAttr("required");
				$("#subtype43").removeAttr("required");
				$("#subtype44").removeAttr("required");
				$("#subtype45").removeAttr("required");
				
				$("#subtype51").removeAttr("required");
				$("#subtype52").removeAttr("required");
				$("#subtype53").removeAttr("required");
				$("#subtype54").removeAttr("required");
				$("#subtype55").removeAttr("required");
				
				$("#subtype61").removeAttr("required");
			    $("#subtype62").removeAttr("required");
				$("#subtype63").removeAttr("required");
				
		  	}else if(x == 2){
		  		$(".status-private").show();
		  		$(".status-individual").hide();	
		  		$(".status-trust").hide();
		  		$(".status-fund").hide();
		  		$(".status-regular").hide();
		  		$(".status-investment").hide();
		  		
		  		var remove_required21 = $("#subtype21").attr("data-remove-required");
				var remove_required22 = $("#subtype22").attr("data-remove-required");
				var remove_required23 = $("#subtype23").attr("data-remove-required");
				var remove_required24 = $("#subtype24").attr("data-remove-required");
				var remove_required25 = $("#subtype25").attr("data-remove-required");
				var remove_required26 = $("#subtype26").attr("data-remove-required");
				
				if(remove_required21 == 1){
				    $("#subtype21").removeAttr("required");
				}else{
				    $("#subtype21").attr("required", "required");
				}
				
				if(remove_required22 == 1){
				    $("#subtype22").removeAttr("required");
				}else{
				    $("#subtype22").attr("required", "required");
				}
				
				if(remove_required23 == 1){
				    $("#subtype23").removeAttr("required");
				}else{
				    $("#subtype23").attr("required", "required");
				}
				
				if(remove_required24 == 1){
				    $("#subtype24").removeAttr("required");
				}else{
				    $("#subtype24").attr("required", "required");
				}
				
				if(remove_required25 == 1){
				    $("#subtype25").removeAttr("required");
				}else{
				    $("#subtype25").attr("required", "required");
				}
				
				if(remove_required26 == 1){
				    $("#subtype26").removeAttr("required");
				}else{
				    $("#subtype26").attr("required", "required");
				}
				
				$("#subtype11").removeAttr("required");
				$("#subtype12").removeAttr("required");
				$("#subtype13").removeAttr("required");
				$("#subtype14").removeAttr("required");
				$("#subtype15").removeAttr("required");

				$("#subtype31").removeAttr("required");
				$("#subtype32").removeAttr("required");
				$("#subtype33").removeAttr("required");
				$("#subtype34").removeAttr("required");
				$("#subtype35").removeAttr("required");
				
				$("#subtype41").removeAttr("required");
				$("#subtype42").removeAttr("required");
				$("#subtype43").removeAttr("required");
				$("#subtype44").removeAttr("required");
				$("#subtype45").removeAttr("required");
				
				$("#subtype51").removeAttr("required");
				$("#subtype52").removeAttr("required");
				$("#subtype53").removeAttr("required");
				$("#subtype54").removeAttr("required");
				$("#subtype55").removeAttr("required");
				
				$("#subtype61").removeAttr("required");
			    $("#subtype62").removeAttr("required");
				$("#subtype63").removeAttr("required");
				
		  	}else if(x == 3){
		  		$(".status-trust").show();
		  		$(".status-individual").hide();
		  		$(".status-private").hide();
		  		$(".status-fund").hide();
		  		$(".status-regular").hide();
		  		$(".status-investment").hide();	
		  		
		  		var remove_required31 = $("#subtype31").attr("data-remove-required");
				var remove_required32 = $("#subtype32").attr("data-remove-required");
				var remove_required33 = $("#subtype33").attr("data-remove-required");
				var remove_required34 = $("#subtype34").attr("data-remove-required");
				var remove_required35 = $("#subtype35").attr("data-remove-required");

				if(remove_required31 == 1){
				    $("#subtype31").removeAttr("required");
				}else{
				    $("#subtype31").attr("required", "required");
				}
				
				if(remove_required32 == 1){
				    $("#subtype32").removeAttr("required");
				}else{
				    $("#subtype32").attr("required", "required");
				}
				
				if(remove_required33 == 1){
				    $("#subtype33").removeAttr("required");
				}else{
				    $("#subtype33").attr("required", "required");
				}
				
				if(remove_required34 == 1){
				    $("#subtype34").removeAttr("required");
				}else{
				    $("#subtype34").attr("required", "required");
				}
				
				if(remove_required35 == 1){
				    $("#subtype35").removeAttr("required");
				}else{
				    $("#subtype35").attr("required", "required");
				}
				
				$("#subtype11").removeAttr("required");
				$("#subtype12").removeAttr("required");
				$("#subtype13").removeAttr("required");
				$("#subtype14").removeAttr("required");
				$("#subtype15").removeAttr("required");
				
				$("#subtype21").removeAttr("required");
				$("#subtype22").removeAttr("required");
				$("#subtype23").removeAttr("required");
				$("#subtype24").removeAttr("required");
				$("#subtype25").removeAttr("required");
				$("#subtype26").removeAttr("required");
				
				$("#subtype41").removeAttr("required");
				$("#subtype42").removeAttr("required");
				$("#subtype43").removeAttr("required");
				$("#subtype44").removeAttr("required");
				$("#subtype45").removeAttr("required");
				
				$("#subtype51").removeAttr("required");
				$("#subtype52").removeAttr("required");
				$("#subtype53").removeAttr("required");
				$("#subtype54").removeAttr("required");
				$("#subtype55").removeAttr("required");
				
				$("#subtype61").removeAttr("required");
			    $("#subtype62").removeAttr("required");
				$("#subtype63").removeAttr("required");
				
		  	}else if(x == 4){
		  		$(".status-fund").show();
		  		$(".status-individual").hide();
		  		$(".status-private").hide();
		  		$(".status-trust").hide();
		  		$(".status-regular").hide();
		  		$(".status-investment").hide();	
		  		
		  		var remove_required41 = $("#subtype41").attr("data-remove-required");
				var remove_required42 = $("#subtype42").attr("data-remove-required");
				var remove_required43 = $("#subtype43").attr("data-remove-required");
				var remove_required44 = $("#subtype44").attr("data-remove-required");
				var remove_required45 = $("#subtype45").attr("data-remove-required");

				if(remove_required41 == 1){
				    $("#subtype41").removeAttr("required");
				}else{
				    $("#subtype41").attr("required", "required");
				}
				
				if(remove_required42 == 1){
				    $("#subtype42").removeAttr("required");
				}else{
				    $("#subtype42").attr("required", "required");
				}
				
				if(remove_required43 == 1){
				    $("#subtype43").removeAttr("required");
				}else{
				    $("#subtype43").attr("required", "required");
				}
				
				if(remove_required44 == 1){
				    $("#subtype44").removeAttr("required");
				}else{
				    $("#subtype44").attr("required", "required");
				}
				
				if(remove_required45 == 1){
				    $("#subtype45").removeAttr("required");
				}else{
				    $("#subtype45").attr("required", "required");
				}
				
				$("#subtype11").removeAttr("required");
				$("#subtype12").removeAttr("required");
				$("#subtype13").removeAttr("required");
				$("#subtype14").removeAttr("required");
				$("#subtype15").removeAttr("required");
				
				$("#subtype21").removeAttr("required");
				$("#subtype22").removeAttr("required");
				$("#subtype23").removeAttr("required");
				$("#subtype24").removeAttr("required");
				$("#subtype25").removeAttr("required");
				$("#subtype26").removeAttr("required");
				
				$("#subtype31").removeAttr("required");
				$("#subtype32").removeAttr("required");
				$("#subtype33").removeAttr("required");
				$("#subtype34").removeAttr("required");
				$("#subtype35").removeAttr("required");
				
				$("#subtype51").removeAttr("required");
				$("#subtype52").removeAttr("required");
				$("#subtype53").removeAttr("required");
				$("#subtype54").removeAttr("required");
				$("#subtype55").removeAttr("required");
				
				$("#subtype61").removeAttr("required");
			    $("#subtype62").removeAttr("required");
				$("#subtype63").removeAttr("required");
				
		  	}else if(x == 5){
		  		$(".status-regular").show();
		  		$(".status-individual").hide();
		  		$(".status-private").hide();
		  		$(".status-trust").hide();	
		  		$(".status-fund").hide();
		  		$(".status-investment").hide();
		  		
		  		var remove_required51 = $("#subtype51").attr("data-remove-required");
				var remove_required52 = $("#subtype52").attr("data-remove-required");
				var remove_required53 = $("#subtype53").attr("data-remove-required");
				var remove_required54 = $("#subtype54").attr("data-remove-required");
				var remove_required55 = $("#subtype55").attr("data-remove-required");

				if(remove_required51 == 1){
				    $("#subtype51").removeAttr("required");
				}else{
				    $("#subtype51").attr("required", "required");
				}
				
				if(remove_required52 == 1){
				    $("#subtype52").removeAttr("required");
				}else{
				    $("#subtype52").attr("required", "required");
				}
				
				if(remove_required53 == 1){
				    $("#subtype53").removeAttr("required");
				}else{
				    $("#subtype53").attr("required", "required");
				}
				
				if(remove_required54 == 1){
				    $("#subtype54").removeAttr("required");
				}else{
				    $("#subtype54").attr("required", "required");
				}
				
				if(remove_required55 == 1){
				    $("#subtype55").removeAttr("required");
				}else{
				    $("#subtype55").attr("required", "required");
				}
				
				$("#subtype11").removeAttr("required");
				$("#subtype12").removeAttr("required");
				$("#subtype13").removeAttr("required");
				$("#subtype14").removeAttr("required");
				$("#subtype15").removeAttr("required");
				
				$("#subtype21").removeAttr("required");
				$("#subtype22").removeAttr("required");
				$("#subtype23").removeAttr("required");
				$("#subtype24").removeAttr("required");
				$("#subtype25").removeAttr("required");
				$("#subtype26").removeAttr("required");
				
				$("#subtype31").removeAttr("required");
				$("#subtype32").removeAttr("required");
				$("#subtype33").removeAttr("required");
				$("#subtype34").removeAttr("required");
				$("#subtype35").removeAttr("required");
				
				$("#subtype41").removeAttr("required");
				$("#subtype42").removeAttr("required");
				$("#subtype43").removeAttr("required");
				$("#subtype44").removeAttr("required");
				$("#subtype45").removeAttr("required");
				
				$("#subtype61").removeAttr("required");
			    $("#subtype62").removeAttr("required");
				$("#subtype63").removeAttr("required");
		  		
		  	}else if(x == 6){
		  		$(".status-investment").show();
		  		$(".status-individual").hide();
		  		$(".status-private").hide();
		  		$(".status-trust").hide();	
		  		$(".status-fund").hide();
		  		$(".status-regular").hide();
		  		
		  		var remove_required61 = $("#subtype61").attr("data-remove-required");
				var remove_required62 = $("#subtype62").attr("data-remove-required");
				var remove_required63 = $("#subtype63").attr("data-remove-required");

				if(remove_required61 == 1){
				    $("#subtype61").removeAttr("required");
				}else{
				    $("#subtype61").attr("required", "required");
				}
				
				if(remove_required62 == 1){
				    $("#subtype62").removeAttr("required");
				}else{
				    $("#subtype62").attr("required", "required");
				}
				
				if(remove_required63 == 1){
				    $("#subtype63").removeAttr("required");
				}else{
				    $("#subtype63").attr("required", "required");
				}
				
				$("#subtype11").removeAttr("required");
				$("#subtype12").removeAttr("required");
				$("#subtype13").removeAttr("required");
				$("#subtype14").removeAttr("required");
				$("#subtype15").removeAttr("required");
				
				$("#subtype21").removeAttr("required");
				$("#subtype22").removeAttr("required");
				$("#subtype23").removeAttr("required");
				$("#subtype24").removeAttr("required");
				$("#subtype25").removeAttr("required");
				$("#subtype26").removeAttr("required");
				
				$("#subtype31").removeAttr("required");
				$("#subtype32").removeAttr("required");
				$("#subtype33").removeAttr("required");
				$("#subtype34").removeAttr("required");
				$("#subtype35").removeAttr("required");
				
				$("#subtype41").removeAttr("required");
				$("#subtype42").removeAttr("required");
				$("#subtype43").removeAttr("required");
				$("#subtype44").removeAttr("required");
				$("#subtype45").removeAttr("required");
				
				$("#subtype51").removeAttr("required");
				$("#subtype52").removeAttr("required");
				$("#subtype53").removeAttr("required");
				$("#subtype54").removeAttr("required");
				$("#subtype55").removeAttr("required");
				

		  	}else if(x == 0){
		  		$(".status-investment").hide();
		  		$(".status-individual").hide();
		  		$(".status-private").hide();
		  		$(".status-trust").hide();	
		  		$(".status-fund").hide();
		  		$(".status-regular").hide();
		  	}
		}
		
        function saveScubscriptionDraft(){
            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);

            axios.post(SITE_URL+'subscriptionSaveDraft',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                
            });
        }

        function saveScubscription(){
        	if ($('#subscriptionform').parsley().validate()) {

        		preloader_init();
        		$('#subscriptionform').submit();

	            /*const form = document.getElementById('subscriptionform');
	            let formData = new FormData(form);

	            axios.post(SITE_URL+'subscriptionSave',formData,{
	                    headers: {
	                        'Content-Type': 'multipart/form-data',
	                        'X-CSRF-Token': csrfToken}}
	            ).then(function(response){
	                var item =response.data.data;
                    if(item === "success"){
                        window.location = SITE_URL+"landing";
                    }else{
                        Swal.fire('Sorry!',"Please try again.",'error');
                    }
	            });*/
	        }
        }
        
        
        <?php	

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
		            }
		        }// For Loop
		        return $output;
		    }//End Function
        ?>


	</script>
@endsection