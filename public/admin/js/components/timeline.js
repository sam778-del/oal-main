    (function($) {
        'use strict';
        $(function () {
            $(".timeline-container").css({ position: "relative", height: "400px"});
            var ps = new PerfectScrollbar('.timeline-container', {
                wheelPropagation: false,
                wheelSpeed: 0.5,
                swipeEasing: true,
                minScrollbarLength: 50,
                maxScrollbarLength: 250,
            });
    });
})(jQuery);