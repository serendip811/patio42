(function ($) {
    var
        initialize = function () {
            $('.Popup a.close').bind('click', popupController);
            
            $('.Popup').each(function(){
                var name = $(this).attr('name');
                var cookieData = document.cookie;
                if(cookieData.indexOf("patioPopup_"+name+"=done") >= 0){
                    $(this).removeClass('active');
                }
            });
        },
        popupController = function () {
            var popup = $(this).closest('section');
            var name = popup.attr('name');
            setCookie("patioPopup_"+name, 'done', 6);
            popup.removeClass('active');
        },
        setCookie = function (name, value, expirehours) {
            var todayDate = new Date();
            todayDate.setHours(todayDate.getHours() + expirehours);
            document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";";
        };

    initialize();

})(jQuery);
