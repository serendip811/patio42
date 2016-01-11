;(function($) {

    var selectAjax = function ($target) {
        var dataAjax = $target.data('ajax') || false;
        if (dataAjax) {
            var ajax = $.ajax({
                url: dataAjax,
                dataType: 'json',
                method: 'GET'
            });
            ajax.done(function(data) {
                for (var i = 0; i < data.length; i++) {
                    $target.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                }
            }).always(function () {
                selectValue($target);
            });
        } else {
            selectValue($target);
        }
    };
    var selectValue = function ($target) {
        var dataValue = $target.data('value');
        if (typeof dataValue !== 'undefined') {
            $target.val(dataValue);
            $target.trigger('change');
        }
    };
    var selectToggleGroup = function () {
        var category = $(this).val();
        $('div.pure-control-group-choice').each(function() {
            if ($(this).data('category').indexOf(+category) !== -1) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
    };


    $('body').on('click', 'div.linkable', function () {
        if ($(this).data('href')) {
            location.href = $(this).data('href');
        }
    });

    $('select').each(function () {
        selectAjax($(this));
    });
    $('select').bind('change', selectToggleGroup);

    var jqAjax = $.ajax({
        url: '/admin/ajax/categories',
        dataType: 'json',
        method: 'GET',
    });
    jqAjax.done(function (items) {
        var current = location.href.indexOf('category=');
        if (current !== -1) {
            current = location.href.substr(current + 9);
        }
        for (var i = 0; i < items.length; i++) {
            if (current == items[i].id) {
                $('#Categories').append('<li class="pure-menu-item active">' +
                '<a href="/admin/posts?category=' + items[i].id + '" class="pure-menu-link">' + items[i].name + '</a>' +
                '</li>');
            } else {
                $('#Categories').append('<li class="pure-menu-item">' +
                '<a href="/admin/posts?category=' + items[i].id + '" class="pure-menu-link">' + items[i].name + '</a>' +
                '</li>');
            }
        }
    });
})(jQuery);