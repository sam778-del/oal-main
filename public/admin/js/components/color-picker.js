(function($) {
    'use strict';
    $('#cp5a').colorpicker({
        format: 'hex'
    });
    $('#cp5b').colorpicker({
        format: 'rgba'
    });
    $('#cp3b').colorpicker({
        format: 'hsl'
    });
    $('#cp4b').colorpicker({
        color: "#16813D",
        format: 'hex'
    });
    $('#cp6a').colorpicker({
        format: 'auto'
    });
    $('#cp6b').colorpicker({
        format: null
    });
    $('#cp5d').colorpicker({
        inline: true
    });
    $('#cp5d_toggle').on('click', function () {
        var cp = $('#cp5d').colorpicker('colorpicker');
        if (cp.isEnabled()) {
            cp.disable();
        } else {
            cp.enable();
        }
    });
    $('#cp9').colorpicker({
        useAlpha: false
    });
    $('#cp12').colorpicker();
    $('#cp15').colorpicker();
})(jQuery);