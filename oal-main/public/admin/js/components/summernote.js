(function($) {
    'use strict';
    $(function () {
        $('#editor').summernote({
            airMode: true
        });
        $('#editor1, #editor2, #editor3').summernote();
    });
})(jQuery);