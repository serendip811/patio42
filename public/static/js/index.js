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

        $('#StoreItems a.detail').bind('click', function() {
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
