(function($) {
    'use strict';
    $(function () {
        $("#example-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true
        });

        var form = $("#example-form");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                console.log("Changed");
                return true;
            },
            onFinishing: function (event, currentIndex)
            {
                console.log("Changed");
            },
            onFinished: function (event, currentIndex)
            {
                alert("Submitted!");
            }
        });
        $("#example-vertical").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });
})(jQuery);