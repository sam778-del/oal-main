(function($) {
    'use strict';

    $(function() {
        if (typeof $.fn.tooltip.Constructor === 'undefined') {
                throw new Error('BS4 Tooltip must be included first!');
        }

        var Tooltip = $.fn.tooltip.Constructor;

        $.extend(Tooltip.Default, {
            skinClass: ''
        });

        var _show = Tooltip.prototype.show;

        Tooltip.prototype.show = function() {

            _show.apply(this, Array.prototype.slice.apply(arguments));

            if (this.config.skinClass) {
                var tip = this.getTipElement();
                $(tip).addClass(this.config.skinClass);
            }

        };
        $('[data-toggle="tooltip"]').tooltip();

    });
})(jQuery);