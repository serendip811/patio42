(function ($) {
    var
        initialize = function () {
            $('#Popup a.close').bind('click', popupController);

            var cookieData = document.cookie;
            if (cookieData.indexOf("patioPopup=done") >= 0){
                $('#Popup').removeClass('active');
            }
        },
        popupController = function () {
            setCookie("patioPopup", "done", 6);
            $('#Popup').removeClass('active');
        },
        setCookie = function (name, value, expirehours) {
            var todayDate = new Date();
            todayDate.setHours(todayDate.getHours() + expirehours);
            document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";";
        };

    initialize();

})(jQuery);
