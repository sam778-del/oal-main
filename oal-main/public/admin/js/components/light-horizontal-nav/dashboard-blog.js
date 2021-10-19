(function($) {
    'use strict';
    $(function () {
        // Demographics Male vs Female //
        var ctx = document.getElementById("demographics");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [40, 60],
                    backgroundColor: ['#6724D4','#FFBB42'],
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutoutPercentage: 80,
                legend: {
                    display: false
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
        // Demographics Male vs Female //

        // Statistics - Like Comment Share //
        var ctx = document.getElementById('stat-weekly').getContext('2d');
        var gradientFill = ctx.createLinearGradient(0, 0, 0, 200);
        gradientFill.addColorStop(0, "#6724D4");
        gradientFill.addColorStop(1, "#6724D401");

        var gradientFill1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientFill1.addColorStop(0, "#fd2986");
        gradientFill1.addColorStop(1, "#fd298601");

        var gradientFill2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientFill2.addColorStop(0, "#FFBB42");
        gradientFill2.addColorStop(1, "#FFBB4201");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'],
                datasets: [
                    {
                        label: "Share",
                        data: [10, 20, 7, 32, 8, 45, 16, 32, 10, 23],
                        backgroundColor: gradientFill2,
                        borderColor: '#FFBB42',
                        borderWidth: 1,
                        radius: 0,
                        pointStyle: 'line'
                    },
                    {
                        label: "Comment",
                        data: [20, 40, 15, 40, 20, 52, 26, 46, 20, 38],
                        backgroundColor: gradientFill,
                        borderColor: '##6724D4',
                        borderWidth: 1,
                        radius: 0,
                        pointStyle: 'line'
                    },
                    {
                        label: "Like",
                        data: [40, 60, 28, 55, 32, 65, 32, 62, 32, 58],
                        backgroundColor: gradientFill1,
                        borderColor: '#fd2986',
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
                            max: 68,
                        }
                    }]
                },
                layout: {
                    padding: {
                        bottom: 0
                    }
                },
                tooltips: {
                    backgroundColor: '##6724D4',
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
        // Statistics - Like Comment Share //

        //Perfect Scroll - Top Articles Starts//
        $(".widget-37-items").css({"overflow":"hidden","max-height": "343px", "position": "relative"});
        var ps = new PerfectScrollbar('.widget-37-items',{
            wheelPropagation: false,
        });
        //Perfect Scroll - Top Articles Ends//
        //Perfect Scroll - Drafts Starts//
        $(".widget-39-items").css({"overflow":"hidden","max-height": "160px", "position": "relative"});
        var ps = new PerfectScrollbar('.widget-39-items',{
            wheelPropagation: false,
        });
        //Perfect Scroll - Drafts Ends//

        //Forth Row//
        $(".quick-post, .queries, .demographics").css({"min-height":"530px"});
        //Forth Row//
    });
})(jQuery);