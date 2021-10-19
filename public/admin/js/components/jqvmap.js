(function($) {
    'use strict';
    $(function () {
        $('#vmap').vectorMap({ map: 'world_en',
            backgroundColor: '#969dc9',
            borderColor: '#818181',
            borderOpacity: 0.25,
            borderWidth: 1,
            color: '#444655',
            enableZoom: true,
            hoverColor: '#6efacc',
            hoverOpacity: null,
            normalizeFunction: 'linear',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#6efacc',
            selectedRegions: null,
            showTooltip: true,
            onRegionClick: function(element, code, region)
            {
                var message = 'You clicked "'
                    + region
                    + '" which has the code: '
                    + code.toUpperCase();

                alert(message);
            } });
        $('#vmap').vectorMap('set', 'colors', { au: '#efdd32', us: '#ef9562', in: '#A8EB12', ru:"#00ffff"});

        $('#vmap1').vectorMap({ map: 'usa_en', pins: { "pk" : "pin_for_pk"},pinMode: 'id'});
        $('#vmap2').vectorMap({ map: 'europe_en'});
        $('#vmap3').vectorMap({ map: 'asia_en'});
        $('#vmap4').vectorMap({ map: 'australia_en'});
    });
})(jQuery);