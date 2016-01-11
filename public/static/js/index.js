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

        for (var i = 0; i < 7; i++) {
            $('.popup-' + i + ' div.slides').simpleslider({
                controller: true
            });
        }

        $('#StoreItems a.detail').bind('click', function() {
            var $target = $($(this).data('target'));
            $target.addClass('active').siblings().removeClass('active');
            if ($target.length) {
                $('body').addClass('disabled');
            }

            var currentMap = $(this).data('map');
            if ($('#'+currentMap).children('div.nmap').length < 1) {
                map ($, currentMap, $('#'+currentMap).data('lat'), $('#'+currentMap).data('lng'));
            }

            setTimeout(function () {
                $(window).trigger('resize');
            }, 100);
        });

        $('div.popups a.close').bind('click', function () {
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
