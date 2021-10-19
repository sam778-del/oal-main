(function() {
    'use strict';
    // Chart Values
    var values = [
        [12, 9, 40, 25, 10, 55],
        [2, 1, 3.5, 7, 3, 9],
        [40, 30, 20, 10, 15, 50]
    ];

    // Initiate Chart 1
    Chartist.Line("#chart1", {
        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        series: values
    }, {
        fullWidth: true,
        chartPadding: {
            right: 40
        },
        axisY: {
            onlyInteger: true
        },
        height: '300px'
    }).on("draw", function(data) {
        if (data.type === "point") {
            var title = "";
            for (var i = 0; i < values.length; i++)
                if (i > 0) title += "<br>Line " + (i + 1) + ": " + values[i][data.index];
                else title += "Line " + (i + 1) + ": " + values[i][data.index];
            data.element._node.setAttribute("title", title);
            data.element._node.setAttribute("data-chart-tooltip", "chart1");

            // optional grid highlight
            var grid = document.querySelector("#chart1 .ct-horizontal:nth-child(" + (data.index + 1) + ")");
            data.element._node.addEventListener("mouseenter", function(event) {
                grid.style.stroke = "rgba(0,0,255,.6)";
            })
            data.element._node.addEventListener("mouseleave", function(event) {
                grid.style.stroke = "rgba(0,0,0,.2)";
            });
        }
    }).on("created", function() {
        // Initiate Tooltip
        $("#chart1").tooltip({
            selector: '[data-chart-tooltip="chart1"]',
            container: "body",
            html: true
        });
    });

    //Chart #2 - Holes in data
    var chart = new Chartist.Line('#chart2', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
        series: [
            [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9],
            [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null],
            [null, null, null, null, 3, 4, 1, 3, 4,  6,  7,  9, 5, null, null, null],
            [{x:3, y: 3},{x: 4, y: 3}, {x: 5, y: undefined}, {x: 6, y: 4}, {x: 7, y: null}, {x: 8, y: 4}, {x: 9, y: 4}]
        ]
    }, {
        fullWidth: true,
        height: '300px',
        chartPadding: {
            right: 10
        },
        low: 0
    });

    //Line Scattered Chart
    var times = function(n) {
        return Array.apply(null, new Array(n));
    };

    var data = times(52).map(Math.random).reduce(function(data, rnd, index) {
        data.labels.push(index + 1);
        data.series.forEach(function(series) {
            series.push(Math.random() * 100)
        });

        return data;
    }, {
        labels: [],
        series: times(4).map(function() { return new Array() })
    });

    var options = {
        showLine: false,
        axisX: {
            labelInterpolationFnc: function(value, index) {
                return index % 13 === 0 ? 'W' + value : null;
            }
        },
        height:"300px"
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            axisX: {
                labelInterpolationFnc: function(value, index) {
                    return index % 4 === 0 ? 'W' + value : null;
                }
            }
        }]
    ];

    new Chartist.Line('#chart3', data, options, responsiveOptions);

    //Bi-polar Chart
    new Chartist.Line('#chart4', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [1, 2, 3, 1, -2, 0, 1, 0],
            [-2, -1, -2, -1, -2.5, -1, -2, -1],
            [0, 0, 0, 1, 2, 2.5, 2, 1],
            [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
        ]
    }, {
        high: 3,
        low: -3,
        showArea: true,
        showLine: false,
        showPoint: false,
        fullWidth: true,
        axisX: {
            showLabel: false,
            showGrid: false
        },
        height:"300px"
    });

    // Create a simple bi-polar bar chart
    var chart = new Chartist.Bar('#chart5', {
        labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
        series: [
            [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
        ]
    }, {
        height: '300px',
        high: 10,
        low: -10,
        axisX: {
            labelInterpolationFnc: function(value, index) {
                return index % 2 === 0 ? value : null;
            }
        }
    });

    // Listen for draw events on the bar chart
    chart.on('draw', function(data) {
        // If this draw event is of type bar we can use the data to create additional content
        if(data.type === 'bar') {
            // We use the group element of the current series to append a simple circle with the bar peek coordinates and a circle radius that is depending on the value
            data.group.append(new Chartist.Svg('circle', {
                cx: data.x2,
                cy: data.y2,
                r: Math.abs(Chartist.getMultiValue(data.value)) * 2 + 5
            }, 'ct-slice-pie'));
        }
    });

    //Chart6 - Animation
    var chart = new Chartist.Line('#chart6', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        series: [
            [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
            [4,  5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
            [5,  3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
            [3,  4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
        ]
    }, {
        low: 0,
        height: "300px"
    });

// Let's put a sequence number aside so we can use it in the event callbacks
    var seq = 0,
        delays = 80,
        durations = 500;

// Once the chart is fully created we reset the sequence
    chart.on('created', function() {
        seq = 0;
    });

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
    chart.on('draw', function(data) {
        seq++;

        if(data.type === 'line') {
            // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
            data.element.animate({
                opacity: {
                    // The delay when we like to start the animation
                    begin: seq * delays + 1000,
                    // Duration of the animation
                    dur: durations,
                    // The value where the animation should start
                    from: 0,
                    // The value where it should end
                    to: 1
                }
            });
        } else if(data.type === 'label' && data.axis === 'x') {
            data.element.animate({
                y: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.y + 100,
                    to: data.y,
                    // We can specify an easing function from Chartist.Svg.Easing
                    easing: 'easeOutQuart'
                }
            });
        } else if(data.type === 'label' && data.axis === 'y') {
            data.element.animate({
                x: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 100,
                    to: data.x,
                    easing: 'easeOutQuart'
                }
            });
        } else if(data.type === 'point') {
            data.element.animate({
                x1: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                x2: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                opacity: {
                    begin: seq * delays,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                }
            });
        } else if(data.type === 'grid') {
            // Using data.axis we get x or y which we can use to construct our animation definition objects
            var pos1Animation = {
                begin: seq * delays,
                dur: durations,
                from: data[data.axis.units.pos + '1'] - 30,
                to: data[data.axis.units.pos + '1'],
                easing: 'easeOutQuart'
            };

            var pos2Animation = {
                begin: seq * delays,
                dur: durations,
                from: data[data.axis.units.pos + '2'] - 100,
                to: data[data.axis.units.pos + '2'],
                easing: 'easeOutQuart'
            };

            var animations = {};
            animations[data.axis.units.pos + '1'] = pos1Animation;
            animations[data.axis.units.pos + '2'] = pos2Animation;
            animations['opacity'] = {
                begin: seq * delays,
                dur: durations,
                from: 0,
                to: 1,
                easing: 'easeOutQuart'
            };

            data.element.animate(animations);
        }
    });

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
    chart.on('created', function() {
        if(window.__exampleAnimateTimeout) {
            clearTimeout(window.__exampleAnimateTimeout);
            window.__exampleAnimateTimeout = null;
        }
        window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
    });

    //Chart7 - Pie Chart
    var data = {
        series: [5, 3, 4]
    };

    var sum = function(a, b) { return a + b };

    new Chartist.Pie('#chart7', data, {
        height:"300px",
        labelInterpolationFnc: function(value) {
            return Math.round(value / data.series.reduce(sum) * 100) + '%';
        }
    });

    //Chart8 - Gauge Chart
    new Chartist.Pie('#chart8', {
        series: [20, 10, 30, 40]
    }, {
        donut: true,
        donutWidth: 60,
        startAngle: 270,
        total: 200,
        showLabel: false,
        height: "300px"
    });
})(jQuery);
