(function($) {
    'use strict';
    $(function () {
        $('#owl-carousel-1').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            },
            dots: false,
            navText : ["<div class='owl-nav-wrapper bg-soft-base'><i data-feather='chevron-left' class='text-base'></i></div>","<div class='owl-nav-wrapper bg-soft-base'><i data-feather='chevron-right' class='text-base'></i></div>"]
        });
        $('#owl-carousel-2').owlCarousel({
            loop: true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            },
            dots: true,
            center: true,
            navText : ["<div class='owl-nav-wrapper bg-soft-base'><i data-feather='chevron-left' class='text-base'></i></div>","<div class='owl-nav-wrapper bg-soft-base'><i data-feather='chevron-right' class='text-base'></i></div>"]
        });
        $('#owl-carousel-3').owlCarousel({
            loop: true,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            },
            dots: true,
            center: true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
        });
        $('#owl-carousel-4').owlCarousel({
            loop: false,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            },
            dots: true,
            center: true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true
        });
        $('#owl-carousel-5').owlCarousel({
            loop: false,
            margin: 10,
            video: true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 7000,
            responsive: {
                480: {
                    items: 4
                },
                600: {
                    items: 4
                }
            }
        });
        feather.replace();
    });
})(jQuery);