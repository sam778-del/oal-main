(function($) {
    'use strict';
    $('#cp5a').colorpicker({
        format: 'hex'
    });
    $('#cp5b').colorpicker({
        format: 'rgba'
    });

    //Inputmask
    $(":input").inputmask();

    /*//File Dropzone
    $('.dropify').dropify();

    //Datepicker
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
    $('.datepicker1').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-3d'
    });

    //Datepicker Range
    $('.input-daterange').datepicker();

    //Inline Datepicker
    $('#inline-datepicker').datepicker();
    $('#inline-datepicker').datepicker();
    $('#inline-datepicker').on('changeDate', function() {
        $('#my_hidden_input').val(
            $('#inline-datepicker').datepicker('getFormattedDate')
        );
        alert("Value is set in hidden fields!");
    })*/
})(jQuery);