(function($) {
    'use strict';
    $(function () {
        $('#date').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
        $('#date1').datepicker({
            format: 'mm/dd/yyyy',
            todayHighlight: true
        });
        $('#date2').datepicker({
            startView: 1,
            todayHighlight: true
        });
        $('#date3').datepicker({
            todayBtn: "linked",
            clearBtn: true
        });
        $('#date4').datepicker({
            autoclose: true
        });
        $('#date5').datepicker({
            orientation: "top left",
        });
        $('#date6').datepicker({
            orientation: "bottom left",
        });
        $('#date7').datepicker({
            orientation: "top right",
        });
        $('#date8').datepicker({
            orientation: "bottom right",
        });
        $('#date9').datepicker({
            daysOfWeekDisabled: "1"
        });
        $('#date10').datepicker({
            daysOfWeekHighlighted: "0"
        });
        $('#date11').datepicker({
            multidate: true,
            multidateSeparator: " : "
        });
        $('#date14').datepicker();
        $('.input-daterange').datepicker();
    });
})(jQuery);