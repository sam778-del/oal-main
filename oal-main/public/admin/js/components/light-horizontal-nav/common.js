(function($) {
    'use strict';
    $(function () {
        Popper.Defaults.modifiers.computeStyle.gpuAcceleration = false;
        feather.replace();
        var secondarySidebar = $(".secondary");

        //Sidebar Active Class & Toggle
        function addActiveClass(element) {
            if (current === "") {
                //for root url
                if (element.attr('href').indexOf("index.html") !== -1) {
                    //element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                }
            } else {
                //for other url

            }
        }

        var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.nav li', secondarySidebar).each(function() {
            var $this = $(this);
            if ($this.find('a').length) {
                $($this.find('a')).each(function(index, element){
                    if ($(this).attr("href").indexOf(current) !== -1) {
                        $(this).parents('.collapse').addClass('show');
                        $(this).closest('li').addClass('active');
                    }
                });
            }
        });
        var flag = 0;
        secondarySidebar.on('show.bs.collapse', '.collapse', function() {
            var parentIndex ='';
            if($(this).parents('div.collapse').length){
                flag = 1;
                parentIndex = $(this).parents('div.collapse').parent().index();
                secondarySidebar.find('.collapse.show').each(function(){
                    if(parentIndex != $(this).parent().index()){
                        $(this).collapse('hide');
                    }
                });
            }else {
                if (flag == 0) {
                    secondarySidebar.find('.collapse.show').each(function () {
                        $(this).collapse('hide');
                    });
                }
                flag = 0;
            }
        });

        //Sidebar Toggle
        $('[data-toggle="mb-sidebar"]').on("click", function() {
            $('#mobile-navbar').toggleClass('active');
            if($('.sidebar-overlay').hasClass("active")){
                $('.sidebar-overlay').removeClass('active');
            }else{
                $('.sidebar-overlay').addClass('active');
            }
        });
        $('[data-toggle="mb-more-nav"]').on("click", function() {
            if($('.navbar-mb-more').hasClass("show")){
                $('.navbar-mb-more').removeClass('show');
            }else{
                $('.navbar-mb-more').addClass('show');
            }
        });

        //Secondary Sidebar Scroll
        if($('.nav-wrapper').length) {
            var ps = new PerfectScrollbar('.nav-wrapper', {
                wheelPropagation: false,
                wheelSpeed: 0.5,
                swipeEasing: true,
                minScrollbarLength: 50,
                maxScrollbarLength: 250,
            });
        }

        //Scrollbar for Overlay Profile Toolbar
        var ps = new PerfectScrollbar('.profile-body', {
            wheelPropagation: false,
            wheelSpeed: 0.5,
            swipeEasing: true,
            minScrollbarLength: 50,
            maxScrollbarLength: 250,
        });

        //Scrollbar for Overlay Notification List
        var ps = new PerfectScrollbar('.notify-body',{
            wheelPropagation: false,
        });

        //Scrollbar for Overlay Email List
        var ps = new PerfectScrollbar('.email-list-scroll-container',{
            wheelPropagation: false,
        });

        //Open sidebar overlay
        $('#notificationToolbar').on('click', function () {
            $('.notification-overlay').addClass('active');
            $('.sidebar-overlay').addClass('active');
        });
        $('#emailToolbar').on('click', function () {
            $('.email-overlay').addClass('active');
            $('.sidebar-overlay').addClass('active');
        });
        $('#profileToolbar, #profileToolbarSub').on('click', function () {
            $('.profile-overlay').addClass('active');
            $('.sidebar-overlay').addClass('active');
        });

        $('#settingsConf, #settingsConfSub').on('click', function () {
            $('.settings-overlay').addClass('active');
            $('.sidebar-overlay').addClass('active');
        });

        $('.setting-close, .overlay-close, .sidebar-overlay, .profile-close').on('click', function () {
            $('.notification-overlay').removeClass('active');
            $('.email-overlay').removeClass('active');
            $('.profile-overlay').removeClass('active');
            $('.settings-overlay').removeClass('active');
            if(!$('#mobile-navbar').hasClass('active')){
                $('.sidebar-overlay').removeClass('active');
            }
        });
        $('.sidebar-overlay').on('click', function () {
            $('.sidebar-overlay').removeClass('active');
            $('#mobile-navbar').removeClass('active');
        });

        //Enable or Disabled configurations on setting panel
        $('.config-icon').on('click', function(){
            if($(this).parent().hasClass("enable")){
                $(this).parent().removeClass("enable");
                $(this).parent().addClass("disable");
            }else{
                $(this).parent().removeClass("disable");
                $(this).parent().addClass("enable");
            }
        });

        //Enable all popovers
        $('[data-toggle="popover"]').popover();
        $('.popover-dismiss').popover({
            trigger: 'focus'
        });

        // Sidebar - Hide Secondary Sidebar Starts//
        $('.secondary-nav-close').on('click', function(){
          if($("body").hasClass("primary-only")) {
              $("body").removeClass("primary-only");
          }else{
              $("body").addClass("primary-only");
          }
        });
        // Sidebar - Hide Secondary Sidebar Ends//
    });
})(jQuery);