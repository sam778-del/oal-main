(function($) {
    'use strict';
    $(function () {
        var ctx = document.getElementById('revenue-graph-11').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#7a2d3b");
        gradientFill.addColorStop(0, "#7a2d3b1a");

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
                    lineTension: 0,
                    borderWidth: 1.3,
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
        gradientFill.addColorStop(1, "#0d1979");
        gradientFill.addColorStop(0, "#0d19791a");

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#172ae8',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    lineTension: 0,
                    borderWidth: 1.3,
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
        gradientFill.addColorStop(1, "#004b7a");
        gradientFill.addColorStop(0, "#004b7a1a");
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
                    lineTension: 0,
                    borderWidth: 1.3,
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

        var ctx = document.getElementById('revenue-graph-14').getContext("2d");

        var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
        gradientFill.addColorStop(1, "#127767");
        gradientFill.addColorStop(0, "#1277671a");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data",
                    borderColor: '#12a797',
                    pointBorderWidth: 0,
                    pointHoverRadius: 0,
                    pointHoverBorderWidth: 0,
                    pointRadius: 0,
                    fill: true,
                    backgroundColor: gradientFill,
                    lineTension: 0,
                    borderWidth: 1.3,
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
    });
})(jQuery);