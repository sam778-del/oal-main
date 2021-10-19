(function($) {
    'use strict';
    $(function () {
        $.fn.timepicker.defaults = $.extend(true, {}, $.fn.timepicker.defaults, {
            icons: {
                up: 'menu-up',
                down: 'menu-down'
            }
        });
        $('#time, #time1, #modal-time').timepicker();
        $('#time2').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            defaultTime: false
        });
        $('#time3').timepicker({
            template: false,
            minuteStep: 5,
            showInputs: false,
            disableFocus: true
        });
    });
})(jQuery);