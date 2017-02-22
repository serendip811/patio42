(function ($) {
    var
    initialize = function () {
        $('div.nav-toggle, nav a').bind('click', addMenuExpand);
        $(window).bind('scroll', addMenuTop);
        $("nav .tab").width("70px");
        $("nav .tab").mouseover(function(that){
            var kor = $(this).data("kor");
            $(this).find("a").text(kor);
        });
        $("nav .tab").mouseout(function(that){
            var eng = $(this).data("eng");
            $(this).find("a").text(eng);
        });
    },

    // 메뉴 토글버튼으로 navigation 끄고 켜기. (mobile)
    addMenuExpand = function () {
        toggle = $('div.nav-toggle');
        target = $('nav');

        if ($(window).width() >= 768) {
            if (target.hasClass('active')) {
                toggle.removeClass('close');
                target.removeClass('active');
            }
        } else {
            if (target.hasClass('active')) {
                toggle.removeClass('close');
                target.removeClass('active');
            } else {
                toggle.addClass('close');
                target.addClass('active');
            }
        }
    },

    // 메뉴가 일정 높이 넘으면 제일 위에 스르륵 띄워주기. (pc)
    addMenuTop = (function () {
        var
        i = 0,
        target = $('nav');
        return function () {
            if (i == 0) {
                if (this.pageYOffset >= 600) {
                    target.addClass('over-height');
                    i = 1;
                }
                if (this.pageYOffset > 650 && this.pageYOffset < 850) {
                    target.addClass('down-invisible');
                } else {
                    target.removeClass('down-invisible');
                }
            } else {
                if (this.pageYOffset <= 570) {
                    target.removeClass('over-height');
                    i = 0;
                }
                if (this.pageYOffset > 650 && this.pageYOffset < 850) {
                    target.addClass('up-invisible');
                } else {
                    target.removeClass('up-invisible');
                }
            }
        }
    })();

    initialize();

})(jQuery);