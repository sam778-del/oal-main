(function($) {
    'use strict';
    $(function () {

        ///First Row JS///
        //Chart JS - Portal Highlights
        var lineCtx = document.getElementById('portal-monthly-highlights').getContext("2d");
        var myChart = new Chart(lineCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: "Amazon",
                    data: [20, 35, 25, 45, 30, 55, 55],
                    backgroundColor: '#E55537',
                    borderColor: '#E55537',
                    borderWidth: 3,
                    radius: 0,
                    pointStyle: 'line'
                },
                    {
                        label: "Wallmart",
                        data: [15, 30, 35, 55, 20, 65, 45],
                        backgroundColor: '#faddd7',
                        borderColor: '#faddd7',
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

        var portalChartFlag1 = 2, portalChartFlag2 = 1;
        $('#nav-port-tab').on('shown.bs.tab', function (e) {
            var target = $(e.target).index() + 1;
            if(target == 1 && portalChartFlag1 > 0){
                var lineCtx = document.getElementById('portal-weekly-highlights').getContext("2d");
                var myChart = new Chart(lineCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        datasets: [{
                            label: "Amazon",
                            data: [25, 15, 20, 50, 25, 45, 40],
                            backgroundColor: '#50adbe',
                            borderColor: '#50adbe',
                            borderWidth: 3,
                            radius: 0,
                            pointStyle: 'line'
                        },
                            {
                                label: "Wallmart",
                                data: [20, 10, 35, 55, 20, 65, 45],
                                backgroundColor: '#d3eaef',
                                borderColor: '#d3eaef',
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
                            backgroundColor: '#abbbf3',
                            borderColor: '#abbbf3',
                            borderWidth: 3,
                            radius: 0,
                            pointStyle: 'line'
                        },
                            {
                                label: "Wallmart",
                                data: [20, 10, 35, 55, 20, 65, 45],
                                backgroundColor: '#e6ebfb',
                                borderColor: '#e6ebfb',
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
        ///First Row JS///

        // WorldMap Starts //
        $('#map-world').css({"height": "390px"});
        $('#map-world').vectorMap({ map: 'world_en',
            backgroundColor: '#FFF',
            borderColor: '#444655',
            borderOpacity: 0.25,
            borderWidth: 1,
            color: '#F4F7FD',
            enableZoom: true,
            hoverOpacity: .7,
            normalizeFunction: 'linear',
            scaleColors: ['#acfdff', '#68CBD7'],
            selectedColor: '#68CBD7',
            selectedRegions: null,
            showTooltip: true,
            onRegionClick: function(element, code, region)
            {
                var message = 'You clicked "'
                    + region
                    + '" which has the code: '
                    + code.toUpperCase();
            } });
        $('#map-world').vectorMap('set', 'colors', { au: '#abadb1', us: '#abadb1', in: '#68CBD7', cn:"#dcdee4", ca: '#dcdee4', gb:"#dcdee4"});
        // WorldMap Ends //

        // Carousel Starts //
        // Project Update - Scrollbar for User Listing //
        var ps = new PerfectScrollbar('.widget-8');
        // Carousel Ends //

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