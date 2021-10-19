(function($) {
    'use strict';
    $(function () {
        // Statistics Canvas Graph Code Start //
        var canvas = document.getElementById("canvas-stats");

        var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
        gradientBlue.addColorStop(0, '#4765FF');
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
                    backgroundColor: '#4765FF',
                    bodyFontFamily: 'Poppins',
                    bodyFontColor: '#FFF',
                    bodyFontSize: 12,
                    displayColors: false
                },
            },
        };
        window.chart = new Chart(canvas, config);
        // Statistics Canvas Graph Code End //

        // Revenue Line Chart Starts//
        var lineCtx = document.getElementById('revenue-weekly').getContext("2d");
        var myChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: "Revenue ($)",
                    data: [300, 900, 600, 1200, 900, 1500, 1200],
                    backgroundColor: "transparent",
                    borderColor: '#36afff',
                    borderWidth: 2,
                    radius: 0,
                    pointStyle: 'line'
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
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
                            fontStyle: '300',
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
                            stepSize: 300,
                            max: 1500,
                            fontColor: '#afb2c5',
                            fontFamily: "'Poppins'",
                            fontStyle: '300',
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
        $('#nav-tab1').on('shown.bs.tab', function (e) {
            var target = $(e.target).index() + 1;
            if(target == 2 && portalChartFlag1 > 0){
                var lineCtx = document.getElementById('revenue-monthly').getContext("2d");
                var myChart = new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: "Revenue ($)",
                            data: [300, 900, 600, 1200, 900, 1500, 1200],
                            backgroundColor: "transparent",
                            borderColor: '#FFC868',
                            borderWidth: 2,
                            radius: 0,
                            pointStyle: 'line'
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
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
                                    fontStyle: '300',
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
                                    stepSize: 300,
                                    max: 1500,
                                    fontColor: '#afb2c5',
                                    fontFamily: "'Poppins'",
                                    fontStyle: '300',
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
                var lineCtx = document.getElementById('revenue-yearly').getContext("2d");
                var myChart = new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        datasets: [{
                            label: "Revenue ($)",
                            data: [300, 900, 600, 1200, 900, 1500, 1200],
                            backgroundColor: "transparent",
                            borderColor: '#4765FF',
                            borderWidth: 2,
                            radius: 0,
                            pointStyle: 'line'
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
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
                                    fontStyle: '300',
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
                                    stepSize: 300,
                                    max: 1500,
                                    fontColor: '#afb2c5',
                                    fontFamily: "'Poppins'",
                                    fontStyle: '300',
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
        })
        // Portal Line Chart Ends//

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

        // WorldMap Starts //
        $('#map-world').css({"height": "390px"});
        $('#map-world').vectorMap({ map: 'world_en',
            backgroundColor: '#1B2944',
            borderColor: '#444655',
            borderOpacity: 0.25,
            borderWidth: 1,
            color: '#F4F7FD',
            enableZoom: true,
            hoverOpacity: .7,
            normalizeFunction: 'linear',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#4765FF',
            selectedRegions: null,
            showTooltip: true,
            onRegionClick: function(element, code, region)
            {
                var message = 'You clicked "'
                    + region
                    + '" which has the code: '
                    + code.toUpperCase();
            } });
        $('#map-world').vectorMap('set', 'colors', { au: '#abadb1', us: '#abadb1', in: '#4765FF', cn:"#dcdee4", ca: '#dcdee4', gb:"#dcdee4"});
        // WorldMap Ends //

        // Event - Carousel Starts //
        //Event carousel
        $("#events").owlCarousel({
            loop:true,
            margin:0,
            autoPlay: 3000,
            responsive:{
                0:{
                    items:1
                },
                480: {
                    items:2
                },
                768:{
                    items:2
                },
                979:{
                    items:3
                },
                1199:{
                    items:4
                }
            },
            singleItem : false,
            dots: false,
            nav: true,
            navText : ["<div class='owl-nav-wrapper bg-soft-primary'><i data-feather='chevron-left' class='text-primary'></i></div>","<div class='owl-nav-wrapper bg-soft-primary'><i data-feather='chevron-right' class='text-primary'></i></div>"]
        });

        $(".btn-event-show").collapse();

        //Events: Tooltip
        $('.event-user').tooltip({ boundary: 'window' });
        // Event - Carousel Ends //

    });
})(jQuery);