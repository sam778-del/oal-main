(function($) {
    'use strict';
    document.addEventListener("DOMContentLoaded", function(event) {

        var g1, g2, g3, g4, g5, g6;

        var g1 = new JustGage({
            id: "g1",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Custom Width",
            label: "",
            gaugeWidthScale: 0.2
        });

        var g2 = new JustGage({
            id: "g2",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Custom Shadow",
            label: "",
            showInnerShadow: true,
            shadowOpacity: 1,
            shadowSize: 5,
            shadowVerticalOffset: 10
        });

        var g3 = new JustGage({
            id: "g3",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Custom Colors",
            label: "",
            levelColors: [
                "#00fff6",
                "#ff00fc",
                "#1200ff"
            ]
        });

        var g4 = new JustGage({
            id: "g4",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Hide Labels",
            hideMinMax: true
        });

        setInterval(function() {
            g1.refresh(getRandomInt(0, 100));
            g2.refresh(getRandomInt(0, 100));
            g3.refresh(getRandomInt(0, 100));
            g4.refresh(getRandomInt(0, 100));
        }, 2500);

        //Gauge #5
        var g5 = new JustGage({
            id: 'g5',
            value: 45,
            min: 0,
            max: 100,
            symbol: '%',
            pointer: true,
            pointerOptions: {
                toplength: -15,
                bottomlength: 10,
                bottomwidth: 12,
                color: '#8e8e93',
                stroke: '#ffffff',
                stroke_width: 3,
                stroke_linecap: 'round'
            },
            gaugeWidthScale: 0.6,
            counter: true,
            onAnimationEnd: function() {
                console.log('animation ended');
                var log = document.getElementById('log');
                log.innerHTML = log.innerHTML + 'Animation just ended.<br/>';
            }
        });

        document.getElementById('gauge_refresh').addEventListener('click', function() {
            g5.refresh(getRandomInt(0, 100));
        });

        //Gauge #6
        g6 = new JustGage({
            id: "g6",
            value: 72,
            min: 0,
            max: 100,
            donut: true,
            gaugeWidthScale: 0.6,
            counter: true,
            hideInnerShadow: true
        });

        document.getElementById('g6_refresh').addEventListener('click', function() {
            g6.refresh(getRandomInt(0, 100));
        });

        //Gauge 7
        var g7 = new JustGage({
            id: "g7",
            value: 40960,
            min: 1024,
            max: 1000000,
            gaugeWidthScale: 0.1,
            counter: true,
            formatNumber: true
        });

        document.getElementById('g7_refresh').addEventListener('click', function() {
            g7.refresh(getRandomInt(1024, 1000000));
        });

        //Gauge #8
        var defs1 = {
            label: "label",
            value: 65,
            min: 0,
            max: 100,
            decimals: 0,
            gaugeWidthScale: 0.6,
            pointer: true,
            pointerOptions: {
                toplength: 10,
                bottomlength: 10,
                bottomwidth: 2
            },
            counter: true
        }

        var defs2 = {
            label: "label",
            value: 35,
            min: 0,
            max: 100,
            decimals: 0,
            gaugeWidthScale: 0.6,
            pointer: true,
            pointerOptions: {
                toplength: 5,
                bottomlength: 15,
                bottomwidth: 2
            },
            counter: true,
            donut: true
        }

        var g8 = new JustGage({
            id: "g8",
            defaults: defs1
        });

        var g9 = new JustGage({
            id: "g9",
            defaults: defs1
        });

        var g10 = new JustGage({
            id: "g10",
            defaults: defs1
        });

        var g11 = new JustGage({
            id: "g11",
            defaults: defs2
        });

        var g12 = new JustGage({
            id: "g12",
            defaults: defs2
        });

        var g13 = new JustGage({
            id: "g13",
            defaults: defs2
        });

    });
})(jQuery);