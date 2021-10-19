(function($) {
    'use strict';
    $(function () {
        // Energy Consumption Graph //
        var lineCtx = document.getElementById('iot-energy-consumption').getContext("2d");
        var gradientFill = lineCtx.createLinearGradient(0, 0, 0, 200);
        gradientFill.addColorStop(0, "#3ddf81");
        gradientFill.addColorStop(1, "#3ddf811a");
        var myChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                datasets: [{
                    label: "Present",
                    data: [20, 40, 30, 38, 29, 40, 18, 28, 20],
                    backgroundColor: gradientFill,
                    borderColor: '#35C371',
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
        // Energy Consumption Graph //

        // 2nd Highlighted Card  //
        var options = {
            chart: {
                height: 170,
                type: 'radialBar',
                offsetX: -15
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '90%',
                        background: 'transparent',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 10,
                        position: 'front',
                    },
                    track: {
                        background: 'rgba(255,255,255,.2)',
                        strokeWidth: '90%',
                        margin: 0,
                    },

                    dataLabels: {
                        showOn: 'always',
                        name: {
                            show: false,
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            fontFamily: 'Poppins',
                            color: '#FFF',
                            fontSize: '20px',
                            show: true,
                        },
                        style: {
                            colors: ['#FFF']
                        }
                    }
                }
            },
            fill: {
                colors: ['#FFF']
            },
            series: [75],
            stroke: {
                lineCap: 'round'
            },
            labels: ['Percent']

        }

        var chart = new ApexCharts(
            document.querySelector("#network-graph"),
            options
        );
        chart.render();

        $('.spark-bar').sparkline('html', {type: 'bar', barColor: '#ffffff',height: '40',barWidth: 3,barSpacing: 3,});
        $('.spark-bar-1').sparkline('html', {type: 'bar', barColor: '#35C371',height: '40',barWidth: 3,barSpacing: 3,});
        $('.spark-bar-2').sparkline('html', {type: 'bar', barColor: '#35C371',height: '40',barWidth: 3,barSpacing: 3,});
        // 2nd Highlighted Card  //
    });
})(jQuery);