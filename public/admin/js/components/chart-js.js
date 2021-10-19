(function() {
    'use strict';

    //Chart #1 - Horizontal Bar Chart
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;
    var horizontalBarChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Dataset 1',
            backgroundColor: '#637CF9',
            borderColor: '#637CF9',
            borderWidth: 1,
            data: [20,40,60,15,50,80,70,90]
        }, {
            label: 'Dataset 2',
            backgroundColor: '#B5C1FC',
            borderColor: '#B5C1FC',
            data: [15,30,50,20,40,70,60,80]
        }]

    };

    window.onload = function() {
        var ctx = document.getElementById('line-horizontal').getContext('2d');
        window.myHorizontalBar = new Chart(ctx, {
            type: 'horizontalBar',
            data: horizontalBarChartData,
            options: {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    rectangle: {
                        borderWidth: 1,
                    }
                },
                responsive: true,
                legend: {
                    position:'top',
                    labels: {
                        usePointStyle: true,
                        fontSize: 12,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500',

                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false
                        },
                        ticks:{
                            fontSize: 12,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#000',
                            fontStyle: '500'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 40,
                            suggestedMax: 100,
                            fontSize: 12,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#000',
                            fontStyle: '500'
                        }
                    }]
                }
            }
        });
    };

    //Chart #2 - Stepped Line Chart
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    function createConfig(details, data) {
        return {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6'],
                datasets: [{
                    label: 'steppedLine: ' + ((typeof(details.steppedLine) === 'boolean') ? details.steppedLine : `'${details.steppedLine}'`),
                    steppedLine: details.steppedLine,
                    data: data,
                    borderColor: details.color,
                    fill: false,
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: details.label,
                },
                legend: {
                    position:'top',
                    labels: {
                        usePointStyle: true,
                        fontSize: 12,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500',

                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false
                        },
                        ticks:{
                            fontSize: 12,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#000',
                            fontStyle: '500'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 40,
                            suggestedMax: 100,
                            fontSize: 12,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#000',
                            fontStyle: '500'
                        }
                    }]
                }
            }
        };
    }

    var container = document.querySelector('.stepped-chart');
    var data = [20,40,60,15,50,80,70,90];
    var steppedLineSettings = [{
        steppedLine: true,
        label: 'No Step Interpolation',
        color: '#F9442C'
    }];
    steppedLineSettings.forEach(function(details) {
        var div = document.createElement('div');
        div.classList.add('chart-container');
        var canvas = document.createElement('canvas');
        div.appendChild(canvas);
        container.appendChild(div);
        var ctx = canvas.getContext('2d');
        var config = createConfig(details, data);
        new Chart(ctx, config);
    });

    //Chart #3 - Boundary Line Chart
    var canvas = document.getElementById("boundary-line-chart");
    var ctx = canvas.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Stock A",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "#ffda9b",
            borderColor: "#FFA749",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "white",
            pointBackgroundColor: "black",
            pointBorderWidth: 1,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: "brown",
            pointHoverBorderColor: "yellow",
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 10,
            // notice the gap in the data and the spanGaps: false
            data: [10, 20, 60, 95, 64, 78, 90,,70,40,70,89],
            spanGaps: false,
        }

        ]
    };

    // Notice the scaleLabel at the same level as Ticks
    var options = {
        legend: {
            position:'top',
            labels: {
                usePointStyle: true,
                fontSize: 12,
                fontFamily: "'Poppins', sans-serif",
                fontColor: '#000',
                fontStyle: '500',

            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display:false
                },
                ticks:{
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500'
                }
            }],
            yAxes: [{
                ticks: {
                    stepSize: 40,
                    suggestedMax: 100,
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500'
                }
            }]
        }
    };

    // Chart declaration:
    var myBarChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

    //Chart #4 - Radar Chart
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: [['Eating', 'Dinner'], ['Drinking', 'Water'], 'Sleeping', ['Designing', 'Graphics'], 'Coding', 'Cycling', 'Running'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                borderWidth: 1,
                data: [70,80,60,50,80,70,90]
            }, {
                label: 'My Second dataset',
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                borderWidth: 1,
                data: [40,40,50,30,60,50,70]
            }]
        },
        options: {
            legend: {
                display: false
            },
            scale: {
                ticks: {
                    fontFamily: "'Poppins', sans-serif",
                    beginAtZero: true
                },
                pointLabels: {
                    fontFamily: "'Poppins', sans-serif",
                },
            }
        }
    };
    window.myRadar = new Chart(document.getElementById('radar-chart'), config);

    //Chart #5 - Scattered Chart
    var color = Chart.helpers.color;

    var scatterChartData = {
        datasets: [{
            label: 'My First dataset',
            borderColor: window.chartColors.red,
            backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
            data: [{
                x: 20,
                y: 30
            }, {
                x: 40,
                y: 50
            },
                {
                    x: 60,
                    y: 70
                },
                {
                    x: 80,
                    y: 90
                },
                {
                    x: 20,
                    y: 50
                },
                {
                    x: 40,
                    y: 10
                },
                {
                    x: 70,
                    y: 40
                },
                {
                    x: 20,
                    y: 80

                }]
        }, {
            label: 'My Second dataset',
            borderColor: window.chartColors.blue,
            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
            data: [{
                x: 50,
                y: 40
            }, {
                x: 60,
                y: 10
            },
                {
                    x: 20,
                    y: 80
                },
                {
                    x: 30,
                    y: 70
                },
                {
                    x: 50,
                    y: 60
                },
                {
                    x: 70,
                    y: 10
                },
                {
                    x: 60,
                    y: 27
                },
                {
                    x: 14,
                    y: 70

                }]
        }]
    };

    var ctx = document.getElementById('scattered-chart').getContext('2d');
    window.myScatter = Chart.Scatter(ctx, {
        data: scatterChartData,
        options: {
            responsive: true,
            legend: {
                position:'top',
                labels: {
                    usePointStyle: true,
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks:{
                        fontSize: 12,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500'
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 40,
                        suggestedMax: 100,
                        fontSize: 12,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500'
                    }
                }]
            }
        }
    });

    //Chart #6 - Doughnut Chart
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [20,40,60,15,50],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            },
            legend: {
                position:'top',
                labels: {
                    usePointStyle: true,
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                }
            },
        }
    };

    var ctx = document.getElementById('doughnut-chart').getContext('2d');
    window.myDoughnut = new Chart(ctx, config);

    //Chart #7 - Pie Chart
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [20,40,60,15,50],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            legend: {
                position:'top',
                labels: {
                    usePointStyle: true,
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                }
            },
        }
    };

    var ctx = document.getElementById('pie-chart').getContext('2d');
    window.myPie = new Chart(ctx, config);

    //Chart #8 - Polar Area Chart
    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var config = {
        data: {
            datasets: [{
                data: [92,90,25,69,40],
                backgroundColor: [
                    color(chartColors.red).alpha(0.5).rgbString(),
                    color(chartColors.orange).alpha(0.5).rgbString(),
                    color(chartColors.yellow).alpha(0.5).rgbString(),
                    color(chartColors.green).alpha(0.5).rgbString(),
                    color(chartColors.blue).alpha(0.5).rgbString(),
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                position:'top',
                labels: {
                    usePointStyle: true,
                    fontSize: 12,
                    fontFamily: "'Poppins', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                }
            },
            scale: {
                ticks: {
                    beginAtZero: true,
                    stepSize: 20
                },
                reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

    var ctx = document.getElementById('polar-area-chart');
    window.myPolarArea = Chart.PolarArea(ctx, config);

})(jQuery);
