(function($) {
    'use strict';
    $(function () {
        $(".card-info").css({"height":"300px", "position":"relative", "overflow": "hidden"});
        $(".card-horizontal").css({"width":"1200px"});
        const ps = new PerfectScrollbar('.card-scroll-1', {
            wheelSpeed: 2,
            wheelPropagation: false,
            minScrollbarLength: 20
        });
        const psa = new PerfectScrollbar('.card-scroll-2', {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20,
        });
    });
})(jQuery);