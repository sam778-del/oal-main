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

        // Statistics Canvas Graph Code Start //
        var canvas = document.getElementById("canvas-stats");

        var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientBlue.addColorStop(0, '#6724D4');
        gradientBlue.addColorStop(1, '#5C68E1');

        var gradientRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientRed.addColorStop(0, '#F95062');
        gradientRed.addColorStop(1, '#f300ff');

        var gradientGreen = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientGreen.addColorStop(0, '#17d1bd');
        gradientGreen.addColorStop(1, '#12f1bf');

        var gradientWarn = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientWarn.addColorStop(0, '#FFC868');
        gradientWarn.addColorStop(1, '#DDED3D');

        var gradientInfo = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientInfo.addColorStop(0, '#36afff');
        gradientInfo.addColorStop(1, '#8ED5FF');

        var gradientDark = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientDark.addColorStop(0, '#4E73E5');
        gradientDark.addColorStop(1, '#95abef');

        window.arcSpacing = 0.15;
        window.segmentHovered = false;

        Chart.elements.Arc.prototype.draw = function() {
            var ctx = this._chart.ctx;
            var vm = this._view;
            var sA = vm.startAngle;
            var eA = vm.endAngle;
            var chartArea = this._chart.chartArea;

            ctx.beginPath();
            ctx.arc(vm.x, vm.y, vm.outerRadius, sA + window.arcSpacing, eA - window.arcSpacing);
            ctx.strokeStyle = vm.backgroundColor;
            ctx.lineWidth = vm.borderWidth;
            ctx.lineCap = 'round';

            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            var centerX = ((chartArea.left + chartArea.right) / 2);
            var centerY = ((chartArea.top + chartArea.bottom) / 2);
            ctx.font = "40px Poppins Light";
            ctx.fillStyle = "#717789";
            var txt = "$400K";
            //Draw text in center
            ctx.fillText(txt, centerX, centerY);

            ctx.stroke();
            ctx.closePath();
        };

        var config = {
            type: 'doughnut',
            data: {
                labels: [
                    "India",
                    "China",
                    "US",
                    "UK",
                    "Australia",
                    "Canada"
                ],
                datasets: [
                    {
                        data: [400, 350, 290, 210, 320, 300],
                        backgroundColor: [
                            gradientRed,
                            gradientBlue,
                            gradientGreen,
                            gradientInfo,
                            gradientWarn,
                            gradientDark
                        ],
                    }
                ]
            },
            options: {
                responsive: false,
                cutoutPercentage: 80,
                elements: {
                    arc: {
                        borderWidth: 5,
                    },
                    elements: {
                        center: {
                            text: '33%',
                            color: '#ced1e7',
                            fontStyle: 'Poppins',
                            fontSize: '20',
                            sidePadding: 20
                        }
                    },
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: '#6724D4',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false
                },
            },
        };
        window.chart = new Chart(canvas, config);
        // Statistics Canvas Graph Code End //

        // My Team - Carousel Starts //
        var ps = new PerfectScrollbar('.widget-53');
        // My Team - Carousel Ends //

        //Align Objects//
        $( window ).resize(function() {
            $(".widget-37")
        });
        //Align Objects//

    });
})(jQuery);