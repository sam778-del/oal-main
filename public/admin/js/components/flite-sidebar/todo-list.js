(function($) {
    'use strict';
    $(function () {
        $(document).on("click", ".string-check-label", function(){
           if($(this).prev().prop('checked') == true){
               $(this).parents(':eq(1)').removeClass("completed text-base");
           }else{
               $(this).parents(':eq(1)').addClass("completed text-base");
           }
        });

        $(document).on("click", ".remove", function(){
            $(this).parent().fadeOut(300, function() { $(this).remove(); });
        });

        $(".add-new-todo").click(function(){
            var title = $(this).prev().val();
            if(title != ""){
                var id = Math.random();
                $(".todo-list").append('<li><div class="string-check string-check-bordered-base"><input type="checkbox" class="form-check-input" id="formCheckInput'+id+'"><label class="string-check-label" for="formCheckInput'+id+'"><span class="ml-2">'+title+'</span></label></div><a href="#" class="remove"><i data-feather="x-circle"></i></a></li>').children(':last').hide().fadeIn(2000);
                feather.replace();
            }
        });
    });
})(jQuery);