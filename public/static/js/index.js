(function ($) {
    var
    initialize = function () {
        $('#StoreItems').isotope();
        $('#NewsItems').isotope();

        $('#StoreCategoriesMobile').bind('click', toggleStoreCategory);
        $('#StoreCategories a').bind('click', storeSort);

        $('#Press div.press').simpleslider({
            controller: true,
            nextButton: $('a.button-press-next'),
            prevButton: $('a.button-press-prev')
        });
        $('#Header div.header').simpleslider({
            controller: true,
            nextButton: $('a.button-header-next'),
            prevButton: $('a.button-header-prev')
        });
        $('#Banner div.Event div.slide').simpleslider({
            controller: true
        });

        $('#Banner div.Menu div.slide').simpleslider({
            controller: true,
            nextButton: $('a.button-menu-next'),
            prevButton: $('a.button-menu-prev')
        });

        $('#Banner div.Store div.slide').simpleslider({
            controller: true,
            nextButton: $('a.button-store-next'),
            prevButton: $('a.button-store-prev')
        });

        $('#StoreItems a.detail,#StoreItems2 a.detail').bind('click', function() {
            var id = $(this).data('store-id');
            $.get( '/store_popup/'+id, function( data ) {
                $("div.popups").html(data);
                var $target = $(".popup-"+id);

                $target.find("div.slides").simpleslider({
                    controller: true
                });

                $target.addClass('active').siblings().removeClass('active');
                if ($target.length) {
                    $('body').addClass('disabled');
                }

                var currentMap = "map-"+id;
                if ($('#'+currentMap).children('div.nmap').length < 1) {
                    map ($, currentMap, $('#'+currentMap).data('lat'), $('#'+currentMap).data('lng'));
                }

                setTimeout(function () {
                    $(window).trigger('resize');
                }, 100);
            });
        });

        $('div.popups').on('click', 'a.close', function () {
            $('div.popup').removeClass('active');
            $('body').removeClass('disabled');
        });

        $('#btn_submit').on('click', function(e) {
            e.preventDefault();
            var name = $("#consulting_form [name=name]").val();
            var tel1 = $("#consulting_form [name=tel1]").val();
            var tel2 = $("#consulting_form [name=tel2]").val();
            var tel3 = $("#consulting_form [name=tel3]").val();
            var contents = $("#consulting_form [name=contents]").val();
            if(!name){
                alert("이름을 입력해주세요.");
                return ;
            }
            if(!tel1 || !tel2 || !tel3){
                alert("전화번호를 입력해주세요.");
                return ;
            }
            if(!contents){
                alert("내용을 입력해주세요.");
                return ;
            }
            if(!contents.trim()){
                alert("내용을 입력해주세요.");
                return ;
            }

            $('#consulting_form').submit();
        });
    },
    toggleStoreCategory = function () {
        $('#StoreCategories').toggleClass('active');
    },
    storeSort = function () {
        var filter = $(this).attr('data-filter');
        $(this).parent().addClass('active').siblings().removeClass('active');
        $('#StoreItems').isotope({filter: filter});
        $('#StoreCategoriesMobile').text($(this).text());
        $('#StoreCategories').removeClass('active');

    };

    initialize();

})(jQuery);
