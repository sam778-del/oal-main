$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    keyboardNavigation : true ,
});

function loaddata2(data, formID){
 	$.each(data.data, function( key, val ) {
		var $el = $('form#'+formID+' [name="'+key+'"]'),
		type = $el.attr('type');

		switch(type){
			case 'checkbox':
				if(val == 1){
					$el.attr('checked', 'checked');
				}
				break;
			case 'radio':
				$el.filter('[value="'+val+'"]').attr('checked', 'checked');
				break;
			case 'select':
				$el.filter('[value="'+val+'"]').attr('selected', 'selected');
				break;
			default:
				$el.val(val);
		}
	});
}

function loaddata(data){
	$.each(data.data, function( key, val ) {
		var $el = $('form#form-edit-releaving [name="'+key+'"]'),
		type = $el.attr('type');

		console.log($el);

		switch(type){
			case 'checkbox':
				if(val == 1){
					$el.attr('checked', 'checked');
				}
				break;
			case 'radio':
				$el.filter('[value="'+val+'"]').attr('checked', 'checked');
				break;
			default:
				$el.val(val);
		}
	});
}

function preloader_init(){
    $('#overlay').fadeIn();
}
function preloader_off(){
    $('#overlay').fadeOut();
}

function sessionCheckingLogin(){
    var csrfToken = "{{ csrf_token() }}";
    axios.post(SITE_URL+'sessionCheckingLogin',{
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-Token': csrfToken}}
    ).then(function(response){
        if(response.data.data != "true"){   
            window.location.href = '/login';  
        }
    });
    
    
}
