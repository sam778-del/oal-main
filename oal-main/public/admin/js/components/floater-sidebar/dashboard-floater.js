(function($) {
    'use strict';
    $(function () {

        // Regional Statistics //
        var lineCtx = document.getElementById('regional-stats').getContext("2d");
        var gradientFill = lineCtx.createLinearGradient(0, 0, 0, 200);
        gradientFill.addColorStop(0, "#96d7ff");
        gradientFill.addColorStop(1, "#96d7ff1a");
        var myChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                datasets: [{
                    label: "Present",
                    data: [20, 40, 30, 38, 29, 40, 18, 28, 20],
                    backgroundColor: gradientFill,
                    borderColor: '#22b9ff',
                    borderWidth: 2,
                    radius: 0,
                    pointStyle: 'line'
                }]
            },
            options: {
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false,
                            drawTicks: false
                        },ticks: {
                            display: false,
                            fontColor: '#afb2c5',
                            fontFamily: "'Poppins'",
                            fontStyle: '300',
                            fontSize: 13,
                            padding: 0
                        },
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: true,
                            color: '#ced1e7',
                            borderDash: [2, 5],
                            zeroLineWidth: 1,
                            zeroLineColor: '#ced1e7',
                            zeroLineBorderDash: [2, 2]
                        },
                        categoryPercentage: 0.2,
                        ticks: {
                            beginAtZero:true,
                            display: false,
                            stepSize: 10,
                            max: 42,
                        }
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                },
                tooltips: {
                    backgroundColor: '#22b9ff',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            },

            elements: {
                point: {
                    radius: 0
                }
            }
        });
        // Regional Statistics //

        // Demographics Male vs Female //
        var ctx = document.getElementById("demographics");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [40, 60],
                    backgroundColor: ['#22b9ff','#FFBB42'],
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutoutPercentage: 80,
                elements: {
                    center: {
                        text: '38%',
                        color: '#bae0ff',
                        fontStyle: 'Poppins',
                        fontSize: '20',
                        sidePadding: 20
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: '#22b9ff',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            }
        });
        // Demographics Male vs Female //

        // DateRange Picker Starts//
        var start = moment().subtract(29, 'days');
        var end = moment();
        function cb3(start, end) {
            $('#daterange-picker-1 span, #daterange-picker-2 span, #daterange-picker-3 span').html(start.format('D MMM') + ' - ' + end.format('D MMM'));
        }

        $('#daterange-picker-1, #daterange-picker-2, #daterange-picker-3').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb3);

        cb3(start, end);
        // DateRange Picker Ends//

        // Chart JS - Portal Highlights //
        var lineCtx = document.getElementById('portal-weekly-highlights').getContext("2d");
        var myChart = new Chart(lineCtx, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: "Amazon",
                    data: [25, 15, 20, 50, 25, 45, 40],
                    backgroundColor: '#22b9ff',
                    borderColor: '#22b9ff',
                    borderWidth: 3,
                    radius: 0,
                    pointStyle: 'line'
                },
                    {
                        label: "Wallmart",
                        data: [20, 10, 35, 55, 20, 65, 45],
                        backgroundColor: '#d9eeff',
                        borderColor: '#d9eeff',
                        borderWidth: 3,
                        radius: 0,
                        pointStyle: 'line'
                    }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: "top",
                    labels: {
                        usePointStyle: true,
                        fontSize: 13,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#585e7f',
                        fontStyle: '400',
                    },
                },

                scales: {

                    xAxes: [{
                        barPercentage: 1,
                        categoryPercentage: 1,
                        barThickness: 10,
                        maxBarThickness: 10,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            fontColor: '#afb2c5',
                            fontFamily: "'Poppins'",
                            fontStyle: '400',
                            fontSize: 13,
                            padding: 10
                        },
                        gridLines: false
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: true,
                            color: '#ced1e7',
                            borderDash: [2, 5],
                            zeroLineWidth: 1,
                            zeroLineColor: '#ced1e7',
                            zeroLineBorderDash: [2, 5]
                        },
                        categoryPercentage: 0.5,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            stepSize: 20,
                            max: 80,
                            fontColor: '#afb2c5',
                            fontFamily: "'Poppins'",
                            fontStyle: '400',
                            fontSize: 13,
                            padding: 10
                        }
                    }],
                },
                tooltips: {
                    backgroundColor: '#22b9ff',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        });
        // Chart JS - Portal Highlights //

        // Widget-9 - Project State //
        var data = [{
            datasets: [{
                data: [10, 30],
                hoverBorderColor: "#fff",
                backgroundColor: ['#4765ff', '#aca9bb']
            }],
        },{
            datasets: [{
                hoverBorderColor: "#fff",
                data: [60, 40],
                backgroundColor: ['#1ace1a', '#aca9bb']
            }]
        },{
            datasets: [{
                hoverBorderColor: "#fff",
                data: [40, 60],
                backgroundColor: ['#e0631a', '#aca9bb']
            }]
        }, {
            datasets: [{
                hoverBorderColor: "#fff",
                data: [30, 70],
                backgroundColor: ['#cd2145', '#aca9bb']
            }]
        },
            {
                datasets: [{
                    data: [50, 50],
                    hoverBorderColor: "#fff",
                    backgroundColor: ['#00aaff', '#aca9bb']
                }],
            },{
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [40, 60],
                    backgroundColor: ['#1ace1a', '#aca9bb']
                }]
            },{
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [60, 40],
                    backgroundColor: ['#e0631a', '#aca9bb']
                }]
            }, {
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [70, 30],
                    backgroundColor: ['#242a34', '#aca9bb']
                }]
            },
            {
                datasets: [{
                    data: [10, 90],
                    hoverBorderColor: "#fff",
                    backgroundColor: ['#4765ff', '#aca9bb']
                }],
            },{
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [35, 65],
                    backgroundColor: ['#242a34', '#aca9bb']
                }]
            },{
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [90, 10],
                    backgroundColor: ['#e0631a', '#aca9bb']
                }]
            }, {
                datasets: [{
                    hoverBorderColor: "#fff",
                    data: [100, 0],
                    backgroundColor: ['#00aaff', '#aca9bb']
                }]
            }];
        [0, 1, 2, 3].forEach(function(a) {
            var obj = document.getElementById("pro-stat-" + (a + 1));
            new Chart(obj, {
                type: "doughnut",
                data: data[a],
                options: {
                    legend: false,
                    responsive: false,
                    cutoutPercentage: 70,
                    animation: false,
                    tooltips: false,
                    elements: {
                        center: {
                            text: data[a].datasets[0].data[0]+'%',
                            color: '#585e7f',
                            fontStyle: 'Poppins',
                            fontSize: '20',
                            sidePadding: 20
                        }
                    },
                }
            });
        });
        var projectDesign = 1, projectApp = 1;
        $('#nav-project-tab').on('shown.bs.tab', function (e) {
            var target = $(e.target).index() + 1;
            if (target == 2 && projectDesign > 0) {
                [4,5,6,7].forEach(function(a) {
                    var obj = document.getElementById("pro-stat-" + (a + 1));
                    new Chart(obj, {
                        type: "doughnut",
                        data: data[a],
                        options: {
                            legend: false,
                            responsive: false,
                            cutoutPercentage: 70,
                            animation: false,
                            tooltips: false,
                            elements: {
                                center: {
                                    text: data[a].datasets[0].data[0]+'%',
                                    color: '#585e7f',
                                    fontStyle: 'Poppins',
                                    fontSize: '20',
                                    sidePadding: 20
                                }
                            },
                        }
                    });
                });
                projectDesign--;
            }
            if (target == 3 && projectApp > 0) {
                [8,9,10,11].forEach(function(a) {
                    var obj = document.getElementById("pro-stat-" + (a + 1));
                    new Chart(obj, {
                        type: "doughnut",
                        data: data[a],
                        options: {
                            legend: false,
                            responsive: false,
                            cutoutPercentage: 70,
                            animation: false,
                            tooltips: false,
                            elements: {
                                center: {
                                    text: data[a].datasets[0].data[0]+'%',
                                    color: '#585e7f',
                                    fontStyle: 'Poppins',
                                    fontSize: '20',
                                    sidePadding: 20
                                }
                            },
                        }
                    });
                });
                projectApp--;
            }
        });
        // Widget-9 - Project State //

        // My Team - Carousel Starts //
        var ps = new PerfectScrollbar('.widget-53');
        // My Team - Carousel Ends //

    });
})(jQuery);