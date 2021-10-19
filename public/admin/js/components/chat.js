(function($) {
    'use strict';
    $(function () {
        var headerHeight = $('.widget-18-header').height();
        var widgetHeight = $('.widget-18').height();
        $(".widget-18-body").height(widgetHeight - headerHeight - 50);

        var ps = new PerfectScrollbar('.widget-18-body');

        //Chat Body
        var msgheaderHeight = $('.widget-19-header').height();
        var msgfooterHeight = $('.widget-19-footer').height();
        var msgHeight = $('.widget-19').height();
        $('.widget-19-body').height(msgHeight - msgheaderHeight - msgfooterHeight);
        var ps = new PerfectScrollbar('.widget-19-body');

    });
})(jQuery);