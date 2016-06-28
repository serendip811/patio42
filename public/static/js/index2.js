(function ($) {
    var
    initialize = function () {
        // $('#StoreItems').isotope();
        // $('#NewsItems').isotope();

        // $('#StoreCategoriesMobile').bind('click', toggleStoreCategory);
        // $('#StoreCategories a').bind('click', storeSort);

        $('.main-image').simpleslider({
            controller: true,
            nextButton: $('a.button-press-next'),
            prevButton: $('a.button-press-prev')
        });
    }

    initialize();

})(jQuery);
