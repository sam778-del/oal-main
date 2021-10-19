(function($) {
    'use strict';
    $(function () {
        ///First Row JS///
        $("#sales-performance").css({'height': '90px'});
        var ctx = document.getElementById('sales-performance').getContext("2d");
        var gradientFill = ctx.createLinearGradient(0, 0, 0, 90);
        gradientFill.addColorStop(1, "#FFF");
        gradientFill.addColorStop(0, "#e6fff1");

        $("#revenue").css({'height': '90px'});
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Data",
                    borderColor: '#17d1bd',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 1,
                    data: [120, 90, 150, 110, 150, 130, 160, 150, 130, 160, 90, 150]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                spanGaps: false,
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
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
                    backgroundColor: '#6724D4',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            }
        });
        var ctx = document.getElementById('revenue').getContext("2d");

        var gradientFill = ctx.createLinearGradient(0, 0, 0, 90);
        gradientFill.addColorStop(0, "#f9d3d8");
        gradientFill.addColorStop(1, "#FFF");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Data",
                    borderColor: '#F95062',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 1,
                    data: [150, 120, 150, 110, 150, 130, 160,  150, 110, 150, 130, 120]
                }]
            },
            options: {
                scaleStartValue: 100,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
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
                    backgroundColor: '#6724D4',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            }
        });


        $("#refund").css({'height': '90px'});
        var ctx = document.getElementById('refund').getContext("2d");

        var gradientFill = ctx.createLinearGradient(0, 0, 0, 90);
        gradientFill.addColorStop(0, "#fff8ed");
        gradientFill.addColorStop(1, "#fff");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                datasets: [{
                    label: "Data",
                    borderColor: '#FFC868',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 1,
                    data: [150, 120, 150, 110, 150, 130, 160, 150, 110, 150, 130, 160]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
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
                    backgroundColor: '#6724D4',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            }
        });
        ///First Row JS///

        var ctx = document.getElementById('revenue-graph-1').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#CFCFFF");
        gradientFill.addColorStop(0, "#FFF");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#4765FF',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [100, 120, 150, 170, 160, 170, 160]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });

        var ctx = document.getElementById('revenue-graph-2').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#FFEDCB");
        gradientFill.addColorStop(0, "#FFF");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#FFC555',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [150, 140, 145, 150, 160, 170, 160]
                }]
            },
            options: {
                scaleStartValue: 100,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });


        var ctx = document.getElementById('revenue-graph-3').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#EAFEF3");
        gradientFill.addColorStop(0, "#fff");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#00CB8E',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [160, 120, 150, 170, 160, 170, 160]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });

        ///Second Row JS///
        // ChartJS - Weekly Device Access Analytics
        var config = {
            type: 'doughnut',
            data: {
                labels: [
                    "Android",
                    "Ios",
                    "Window"
                ],
                datasets: [{
                    data: [35, 30, 35],
                    backgroundColor: [
                        "#ACA9BB",
                        "#474554",
                        "#4765FF"
                    ],
                    hoverBackgroundColor: [
                        "#ACA9BB",
                        "#474554",
                        "#4765FF"
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 75,
                elements: {
                    center: {
                        text: '33%',
                        color: '#ced1e7',
                        fontStyle: 'Poppins',
                        fontSize: '20',
                        sidePadding: 20
                    }
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false
                }
            }
        };
        var ctx = document.getElementById("device-weekly").getContext("2d");
        var myChart = new Chart(ctx, config);

        // ChartJS - Monthly Device Access Analytics
        var monthlyConfig = {
            type: 'doughnut',
            data: {
                labels: [
                    "Android",
                    "Ios",
                    "Window"
                ],
                datasets: [{
                    data: [35, 30, 35],
                    backgroundColor: [
                        "#00CB8E",
                        "#4765FF",
                        "#FFC555"
                    ],
                    hoverBackgroundColor: [
                        "#00CB8E",
                        "#4765FF",
                        "#FFC555"
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 75,
                elements: {
                    center: {
                        text: '33%',
                        color: '#ced1e7',
                        fontStyle: 'Poppins',
                        fontSize: '20',
                        sidePadding: 20
                    }
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false
                }
            }
        };

        // ChartJS - Yearly Device Access Analytics
        var yearlyConfig = {
            type: 'doughnut',
            data: {
                labels: [
                    "Android",
                    "Ios",
                    "Window"
                ],
                datasets: [{
                    data: [35, 30, 35],
                    backgroundColor: [
                        "#FF5666",
                        "#4765FF",
                        "#FFC555"
                    ],
                    hoverBackgroundColor: [
                        "#FF5666",
                        "#4765FF",
                        "#FFC555"
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 75,
                elements: {
                    center: {
                        text: '33%',
                        color: '#ced1e7',
                        fontStyle: 'Poppins',
                        fontSize: '20',
                        sidePadding: 20
                    }
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false
                }
            }
        };

        $('#device-overview, #sales-overview, #session-overview').carousel({
            interval: false,
            pause: true
        });

        var flag = 2;
        $('#device-overview').on('slid.bs.carousel', function () {
            var currentIndex = $("#device-overview").find("div.active").index() + 1;
            //var currentIndex = $('#device-overview .item').index(currentItem) + 1
            if (currentIndex == 2 && flag > 0) {
                var ctx = document.getElementById("device-monthly").getContext("2d");
                var myChart = new Chart(ctx, monthlyConfig);
                flag--;

            }
            if (currentIndex == 3 && flag > 0) {
                var ctx = document.getElementById("device-yearly").getContext("2d");
                var myChart = new Chart(ctx, yearlyConfig);
                flag--;
            }

        });

        // Chartjs - Weekly Sales Graph
        $(".widget-2-statistics-graph").css({height: '108px'});
        var ctx = document.getElementById('sales-weekly').getContext("2d");

        var gradientFill = ctx.createLinearGradient(0, 0, 0, 200);
        gradientFill.addColorStop(0, "#f2ecff");
        gradientFill.addColorStop(1, "#ffffff");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
                datasets: [{
                    label: "Data",
                    borderColor: '#637CF9',
                    pointBorderWidth: 1,
                    pointHoverRadius: 1,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    pointBackgroundColor: '#637CF9',
                    data: [35, 45, 39, 48, 45, 65, 35]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: !1,
                    text: "Stacked Area"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            max: 70,
                            display: false,
                            beginAtZero: true
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false,
                            suggestedMin: 20,
                            suggestedMax: 50
                        },
                    }]
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
                hover: {
                    mode: "index"
                },

            }
        });

        var salesFlag = 2;
        $('#sales-overview').on('slid.bs.carousel', function () {
            var currentIndex = $("#sales-overview").find("div.active").index() + 1;
            //var currentIndex = $('#device-overview .item').index(currentItem) + 1
            if (currentIndex == 2 && salesFlag > 0) {
                var ctx = document.getElementById('sales-monthly').getContext("2d");
                var gradientFill = ctx.createLinearGradient(0, 0, 0, 200);
                gradientFill.addColorStop(0, "#cdfbe4");
                gradientFill.addColorStop(1, "#ffffff");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                        datasets: [{
                            label: "Data",
                            borderColor: '#00CB8E',
                            pointBorderWidth: 1,
                            pointHoverRadius: 1,
                            pointHoverBorderWidth: 1,
                            pointRadius: 1,
                            backgroundColor: gradientFill,
                            borderWidth: 3,
                            pointBackgroundColor: '#00CB8E',
                            data: [35, 45, 39, 48, 45, 65, 35, 45, 39, 48, 45, 65]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        title: {
                            display: !1,
                            text: "Stacked Area"
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                display: false,
                                gridLines: {
                                    color: "#eef2f9",
                                    drawBorder: false,
                                    offsetGridLines: true,
                                    drawTicks: false
                                },
                                ticks: {
                                    max: 70,
                                    display: false,
                                    beginAtZero: true
                                },
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }, ticks: {
                                    display: false,
                                    suggestedMin: 20,
                                    suggestedMax: 50
                                },
                            }]
                        },
                        tooltips: {
                            backgroundColor: '#4765FF',
                            bodyFontFamily: 'Poppins',
                            bodyFontColor: '#FFF',
                            bodyFontSize: 12,
                            displayColors: false,
                            intersect: false,
                        },
                        hover: {
                            mode: "index"
                        },

                    }
                });
                salesFlag--;

            }
            if (currentIndex == 3 && salesFlag > 0) {
                var ctx = document.getElementById('sales-yearly').getContext("2d");
                var gradientFill = ctx.createLinearGradient(0, 0, 0, 200);
                gradientFill.addColorStop(0, "#ffedcb");
                gradientFill.addColorStop(1, "#ffffff");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["2013", "2014", "2015", "2016", "2017", "2018", "2019"],
                        datasets: [{
                            label: "Data",
                            borderColor: '#FFC555',
                            pointBorderWidth: 1,
                            pointHoverRadius: 1,
                            pointHoverBorderWidth: 1,
                            pointRadius: 1,
                            backgroundColor: gradientFill,
                            borderWidth: 3,
                            pointBackgroundColor: '#FFC555',
                            data: [35, 45, 39, 65, 42, 48, 45]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        title: {
                            display: false,
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                display: false,
                                gridLines: {
                                    color: "#eef2f9",
                                    drawBorder: false,
                                    offsetGridLines: true,
                                    drawTicks: false,
                                },
                                ticks: {
                                    max: 70,
                                    display: false,
                                    beginAtZero: true
                                },
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                    color: '#fff'
                                }, ticks: {
                                    display: false,
                                    suggestedMin: 20,
                                    suggestedMax: 50
                                },
                            }]
                        },
                        tooltips: {
                            backgroundColor: '#4765FF',
                            bodyFontFamily: 'Poppins',
                            bodyFontColor: '#FFF',
                            bodyFontSize: 12,
                            displayColors: false,
                            intersect: false,
                        },
                        hover: {
                            mode: "index"
                        },

                    }
                });
                salesFlag--;
            }

        });

        //Chart JS - Session Bar Charts
        $(".widget-3-statistics-graph").css({height: '108px'});
        var ctx = document.getElementById("session-weekly").getContext("2d");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
                datasets: [
                    {
                        label: "Session",
                        backgroundColor: "#637CF9",
                        data: [248, 343, 532, 345, 483, 376, 310]

                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {display: false},
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                        },
                    }],
                    xAxes: [{
                        barPercentage: 1,
                        categoryPercentage: 1,
                        barThickness: 10,
                        maxBarThickness: 10,
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        }, ticks: {
                            display: false
                        },

                    }]
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                }
            }
        });

        var sessionFlag = 2;
        $('#session-overview').on('slid.bs.carousel', function () {
            var currentIndex = $("#session-overview").find("div.active").index() + 1;
            //var currentIndex = $('#device-overview .item').index(currentItem) + 1
            if (currentIndex == 2 && sessionFlag > 0) {
                //Chart JS - Monthly Session Bar Charts
                var ctx1 = document.getElementById("session-monthly").getContext("2d");
                var myBarChart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                        datasets: [
                            {
                                label: "Session",
                                backgroundColor: "#00CB8E",
                                data: [248, 343, 532, 345, 483, 376, 310]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {display: false},
                        scales: {
                            yAxes: [{
                                display: false,
                                gridLines: {
                                    color: "#eef2f9",
                                    drawBorder: false,
                                    offsetGridLines: true,
                                    drawTicks: false
                                },
                                ticks: {
                                    display: false,
                                },
                            }],
                            xAxes: [{
                                barPercentage: 1,
                                categoryPercentage: 1,
                                barThickness: 10,
                                maxBarThickness: 10,
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                }, ticks: {
                                    display: false
                                },

                            }]
                        },
                        tooltips: {
                            backgroundColor: '#4765FF',
                            bodyFontFamily: 'Poppins',
                            bodyFontColor: '#FFF',
                            bodyFontSize: 12,
                            displayColors: false,
                        }
                    }
                });
                sessionFlag = sessionFlag - 1;

            }
            if (currentIndex == 3 && sessionFlag > 0) {
                //Chart JS - Yearly Session Bar Charts
                var ctx = document.getElementById("session-yearly").getContext("2d");
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["2013", "2014", "2015", "2016", "2017", "2018", "2019"],
                        datasets: [
                            {
                                label: "Session",
                                backgroundColor: "#FFC555",
                                data: [39, 40, 42, 48, 45, 41, 45]

                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {display: false},
                        scales: {
                            yAxes: [{
                                display: false,
                                gridLines: {
                                    color: "#eef2f9",
                                    drawBorder: false,
                                    offsetGridLines: true,
                                    drawTicks: false
                                },
                                ticks: {
                                    display: false,
                                },
                            }],
                            xAxes: [{
                                barPercentage: 1,
                                categoryPercentage: 1,
                                barThickness: 10,
                                maxBarThickness: 10,
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                }, ticks: {
                                    display: false
                                },

                            }]
                        },
                        tooltips: {
                            backgroundColor: '#4765FF',
                            bodyFontFamily: 'Poppins',
                            bodyFontColor: '#FFF',
                            bodyFontSize: 12,
                            displayColors: false,
                            intersect: false,
                        }
                    }
                });
                sessionFlag = sessionFlag - 1;
            }

        });
        ///Second Row JS///

        ///Third Row JS///
        var ctx = document.getElementById('revenue-graph-11').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#FFE4E2");
        gradientFill.addColorStop(0, "#FFF");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#FF5666',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [120, 90, 150, 110, 150, 130, 160]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });
        var ctx = document.getElementById('revenue-graph-12').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#C9D0DD");
        gradientFill.addColorStop(0, "#FFF");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#242a34',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [150, 120, 150, 110, 150, 130, 160]
                }]
            },
            options: {
                scaleStartValue: 100,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });


        var ctx = document.getElementById('revenue-graph-13').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#D6F4FF");
        gradientFill.addColorStop(0, "#fff");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#00aaff',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 3,
                    data: [150, 120, 150, 110, 150, 130, 160]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            suggestedMin: 100
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }, ticks: {
                            display: false
                        },
                    }]
                },
                layout: {
                    padding: {
                        left: -20,
                        right: 0,
                        top: 0,
                        bottom: -20
                    }
                }
            }
        });
        ///Third Row JS///

        ///Fourth Row JS///
        //Chart JS - Portal Highlights
        var lineCtx = document.getElementById('portal-weekly-highlights').getContext("2d");
        var myChart = new Chart(lineCtx, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: "Amazon",
                    data: [25, 15, 20, 50, 25, 45, 40],
                    backgroundColor: '#4765FF',
                    borderColor: '#4765FF',
                    borderWidth: 3,
                    radius: 0,
                    pointStyle: 'line'
                },
                    {
                        label: "Wallmart",
                        data: [20, 10, 35, 55, 20, 65, 45],
                        backgroundColor: '#dae0ff',
                        borderColor: '#dae0ff',
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
                    backgroundColor: '#4765FF',
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

        var portalChartFlag1 = 1, portalChartFlag2 = 1;
        $('#nav-time-tab').on('shown.bs.tab', function (e) {
            var target = $(e.target).index() + 1;
            if(target == 2 && portalChartFlag1 > 0){
                var lineCtx = document.getElementById('portal-monthly-highlights').getContext("2d");
                var myChart = new Chart(lineCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: "Amazon",
                            data: [20, 35, 25, 45, 30, 55, 55],
                            backgroundColor: '#4765FF',
                            borderColor: '#4765FF',
                            borderWidth: 3,
                            radius: 0,
                            pointStyle: 'line'
                        },
                            {
                                label: "Wallmart",
                                data: [15, 30, 35, 55, 20, 65, 45],
                                backgroundColor: '#dae0ff',
                                borderColor: '#dae0ff',
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
                            backgroundColor: '#4765FF',
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
                portalChartFlag1--;
            }
            if(target == 3 && portalChartFlag2 > 0){
                var lineCtx = document.getElementById('portal-yearly-highlights').getContext("2d");
                var myChart = new Chart(lineCtx, {
                    type: 'bar',
                    data: {
                        labels: ['2014', '2015', '2016', '2017', '2018', '2019', '2020'],
                        datasets: [{
                            label: "Amazon",
                            data: [22, 40, 30, 55, 34, 40, 20],
                            backgroundColor: '#4765FF',
                            borderColor: '#4765FF',
                            borderWidth: 3,
                            radius: 0,
                            pointStyle: 'line'
                        },
                            {
                                label: "Wallmart",
                                data: [20, 10, 35, 55, 20, 65, 45],
                                backgroundColor: '#dae0ff',
                                borderColor: '#dae0ff',
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
                            backgroundColor: '#4765FF',
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
                portalChartFlag2--;
            }
        });

        //Widget-9 - Project State
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
        ///Fourth Row JS///

        ///Fifth Row JS///
        //Product Sales Tracker
        var ctx = document.getElementById("pro-sale-tracker");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: 'Item 1 Sales',
                    data: [110, 150, 140, 180, 120, 100, 130, 180, 170, 160, 130, 140],
                    backgroundColor: '#637CF9',
                    borderColor: '#637CF9',
                    borderWidth: 3,
                    radius: 0,
                    pointStyle: 'line'
                },
                    {
                        label: 'Item 2 Sales',
                        data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                        backgroundColor: '#8498FA',
                        borderColor: '#8498FA',
                        borderWidth: 3,
                        radius: 0,
                        pointStyle: 'line'
                    },
                    {
                        label: 'Item 3 Sales',
                        data: [ 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20],
                        backgroundColor: '#B5C1FC',
                        borderColor: '#B5C1FC',
                        borderWidth: 3,
                        radius: 0,
                        pointStyle: 'line'
                    },
                    {
                        label: 'Item 3 Sales',
                        data: [ 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
                        backgroundColor: '#E6EAFE',
                        borderColor: '#E6EAFE',
                        borderWidth: 3,
                        radius: 0,
                        pointStyle: 'line'
                    }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    align:'start',
                    labels: {
                        usePointStyle: true,
                        fontSize: 12,
                        fontFamily: "'Poppins', sans-serif",
                        fontColor: '#585E7F',
                        fontStyle: '400',

                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                            color: '#ced1e7',
                            borderDash: [2, 5],
                            zeroLineWidth: 1,
                            zeroLineColor: '#ced1e7',
                            zeroLineBorderDash: [2, 5],
                        },
                        stacked: true,
                        categoryPercentage: 0.5,
                        ticks:{
                            fontSize: 13,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#C3C5D4',
                            fontStyle: '400',
                            stepSize: 20,
                            padding: 10
                        }

                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 40,
                            suggestedMax: 100,
                            fontSize: 12,
                            fontFamily: "'Poppins', sans-serif",
                            fontColor: '#C3C5D4',
                            fontStyle: '400'
                        },
                        stacked: true,
                        gridLines: {
                            drawBorder: false,
                            display: true,
                            color: '#ced1e7',
                            borderDash: [2, 5],
                            zeroLineWidth: 1,
                            zeroLineColor: '#ced1e7',
                            zeroLineBorderDash: [2, 5]
                        },
                    }]
                },
                tooltips: {
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false,
                    intersect: false,
                },
            }
        });

        var lineCtx = document.getElementById('social-fb-chart').getContext("2d");
        var gradientFill = lineCtx.createLinearGradient(0, 0, 0, 200);
        gradientFill.addColorStop(0, "#89BEFA");
        gradientFill.addColorStop(1, "#4765ff1a");

        var gradientFill1 = lineCtx.createLinearGradient(0, 0, 0, 300);
        gradientFill1.addColorStop(0, "#fd85b9");
        gradientFill1.addColorStop(1, "#fd85b900");

        var myChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                //labels: ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th', '14th', '15th', '16th', '17th', '18th', '19th'],
                labels: ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'],
                datasets: [{
                    label: "Present",
                    data: [0, 40, 30, 10, 20, 15, 0, 15, 20, 0, 45],
                    //data: [0, 40, 0, 10, 0, 20, 0, 40, 0, 10, 0, 20, 0, 40, 0, 10, 0, 20, 0, 30],
                    backgroundColor: gradientFill,
                    borderColor: '#4765FF',
                    borderWidth: 1,
                    radius: 0,
                    pointStyle: 'line'
                },{
                    label: "Past",
                    //data: [20, 0, 40, 0, 10, 0, 20, 0, 40, 0, 10, 0, 20, 0, 30, 0, 40, 0, 10, 0],
                    data: [10, 20, 35, 20, 55, 20, 15, 40, 35, 45],
                    //backgroundColor: '#dae0ff',
                    backgroundColor: gradientFill1,
                    borderColor: '#fd197d',
                    borderWidth: 1,
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
                            display:false
                        },
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: true,
                            color: '#afb2c5',
                            borderDash: [2, 5],
                            drawTicks: false
                        },
                        categoryPercentage: 0.5,
                        ticks: {
                            display: false,
                            beginAtZero: true,
                            stepSize: 12,
                            max: 60,
                        }
                    }]
                },
                layout: {
                    padding: {
                        bottom: 0
                    }
                },
                tooltips: {
                    backgroundColor: '#4765FF',
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

        //Chart JS - Widget Like
        var ctx = document.getElementById('social-fb-like-sparkline').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN"],
                datasets: [{
                    borderColor: '#00CB8E',
                    pointBorderWidth: 1,
                    pointHoverRadius: 1,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    pointBackgroundColor: '#00CB8E',
                    fill: false,
                    data: [25, 20, 27, 15, 30, 20]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: "Stacked Area"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: false,
                            max: 32,
                            min: 15
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false,
                        },ticks: {
                            display:false,
                            beginAtZero:true
                        },
                    }]
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });

        //Chart JS - Widget Users
        var ctx = document.getElementById('social-fb-user-sparkline').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN"],
                datasets: [{
                    borderColor: '#4765FF',
                    pointBorderWidth: 1,
                    pointHoverRadius: 1,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    pointBackgroundColor: '#4765FF',
                    fill: false,
                    data: [20, 30, 15, 27, 20, 25]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: "Stacked Area"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: false,
                            max: 32,
                            min: 15
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false,
                        },ticks: {
                            display:false,
                            beginAtZero:true
                        },
                    }]
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });

        //Chart JS - Widget Comments
        var ctx = document.getElementById('social-fb-comment-sparkline').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN"],
                datasets: [{
                    borderColor: '#FFC555',
                    pointBorderWidth: 1,
                    pointHoverRadius: 1,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    pointBackgroundColor: '#FFC555',
                    fill: false,
                    data: [20, 28, 31, 17, 22, 25]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: "Stacked Area"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: false,
                            max: 32,
                            min: 15
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false,
                        },ticks: {
                            display:false,
                            beginAtZero:true
                        },
                    }]
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });

        //Chart JS - Widget Shares
        var ctx = document.getElementById('social-fb-share-sparkline').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN"],
                datasets: [{
                    borderColor: '#FF5666',
                    pointBorderWidth: 1,
                    pointHoverRadius: 1,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    pointBackgroundColor: '#FF5666',
                    fill: false,
                    data: [20, 16, 25, 30, 19, 15]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: "Stacked Area"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: "#eef2f9",
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: false,
                            max: 32,
                            min: 15
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false,
                        },ticks: {
                            display:false,
                            beginAtZero:true
                        },
                    }]
                },
                tooltips: {
                    enabled: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });

        //ApexChart - Product Radial Chart
        var options = {
            chart: {
                height: 315,
                type: 'radialBar',
            },
            fill: {
                colors:['#FF5666', '#FFC555', '#00CB8E', '#4765FF']
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontFamily: 'Poppins',
                            fontSize: '22px',
                            color: '#585e7f'
                        },
                        value: {
                            fontFamily: 'Poppins',
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Sold Item',
                            formatter: function (w) {
                                return 17282;
                            }
                        },
                        style: {
                            colors: ['#FF5666', '#FFC555', '#00CB8E', '#4765FF']
                        }
                    }
                }
            },
            stroke: {
                lineCap: 'round'
            },
            series: [44, 55, 67, 83],
            labels: ['Iphone 6s', 'Moto Razr', 'Oneplus 6T', 'S10+'],

        }

        var chart = new ApexCharts(
            document.querySelector("#product-highlights"),
            options
        );

        chart.render();
        ///Fifth Row JS///
    });
})(jQuery);