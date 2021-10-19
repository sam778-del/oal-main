(function() {
    'use strict';
    //Bar chart
    Morris.Bar({
        element: 'bar-chart',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        lineColors: ['#637CF9','#B5C1FC'],
        barColors: ['#637CF9','#B5C1FC'],
        lineWidth: '3px',
        resize: true,
        redraw: true
    });

    //Default Area Chart
    Morris.Area({
        element: 'default-area-chart',
        data: [
            {x: '2010 Q4', y: 3, z: 7},
            {x: '2011 Q1', y: 3, z: 4},
            {x: '2011 Q2', y: null, z: 1},
            {x: '2011 Q3', y: 2, z: 5},
            {x: '2011 Q4', y: 8, z: 2},
            {x: '2012 Q1', y: 4, z: 4}
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z'],
        lineColors: ['#637CF9','#B5C1FC']
    }).on('click', function(i, row){
        console.log(i, row);
    });

    // Area Chart
    Morris.Area({
        element: 'area-chart',
        behaveLikeLine: true,
        data: [
            {x: '2011 Q1', y: 3, z: 3},
            {x: '2011 Q2', y: 2, z: 1},
            {x: '2011 Q3', y: 2, z: 4},
            {x: '2011 Q4', y: 3, z: 3}
        ],
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['Y', 'Z'],
        lineColors: ['#B5C1FC','#637CF9'],
        resize: true
    });

    //Line Chart
    var day_data = [
        {"elapsed": "I", "value": 34},
        {"elapsed": "II", "value": 24},
        {"elapsed": "III", "value": 3},
        {"elapsed": "IV", "value": 12},
        {"elapsed": "V", "value": 13},
        {"elapsed": "VI", "value": 22},
        {"elapsed": "VII", "value": 5},
        {"elapsed": "VIII", "value": 26},
        {"elapsed": "IX", "value": 12},
        {"elapsed": "X", "value": 19}
    ];
    Morris.Line({
        element: 'line-chart',
        data: day_data,
        xkey: 'elapsed',
        ykeys: ['value'],
        labels: ['value'],
        parseTime: false,
        lineColors: ['#637CF9'],
        resize: true
    });

    //Updating Line chart data
    var nReloads = 0;
    function data(offset) {
        var ret = [];
        for (var x = 0; x <= 360; x += 10) {
            var v = (offset + x) % 360;
            ret.push({
                x: x,
                y: Math.sin(Math.PI * v / 180).toFixed(4),
                z: Math.cos(Math.PI * v / 180).toFixed(4)
            });
        }
        return ret;
    }
    var graph = Morris.Line({
        element: 'line-chart-updating',
        data: data(0),
        xkey: 'x',
        ykeys: ['y', 'z'],
        labels: ['sin()', 'cos()'],
        parseTime: false,
        ymin: -1.0,
        ymax: 1.0,
        hideHover: true,
        lineColors: ['#B5C1FC','#637CF9'],
        resize: true
    });
    function update() {
        nReloads++;
        graph.setData(data(5 * nReloads));
        $('#reloadStatus').text(nReloads + ' reloads');
    }
    setInterval(update, 100);

    //Donut
    Morris.Donut({
        element: 'donut-chart',
        data: [
            {value: 70, label: 'foo'},
            {value: 15, label: 'bar'},
            {value: 10, label: 'baz'},
            {value: 5, label: 'A really really long label'}
        ],
        labelColor: '#637CF9',
        colors: [
            '#637CF9',
            '#8498FA',
            '#B5C1FC',
            '#E6EAFE'
        ],
        resize:true,
        formatter: function (x) { return x + "%"}
    });
})(jQuery);
