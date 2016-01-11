;(function($) {
    var query = '';
    var isQuery = location.href.indexOf('?');
    if (isQuery > 1) {
        query = '?' + location.href.substr(isQuery + 1);
    }
    $('button.button-more').bind('click', function () {
        var $this = $(this);
        var last = $this.data('last');
        var ajax = $this.data('ajax');
        var jqAjax = $.ajax({
            url: ajax+query,
            dataType: 'json',
            method: 'GET',
            data: {
                last: last,
                limit: 11
            }
        });
        jqAjax.done(function (items) {
            if (items.length < 11) {
                $this.hide();
            }
            for (var i = 0; i < items.length; i++) {
                $this.parent().before('<div class="item linkable" data-href="/admin/posts/'+items[i].id+query+'">' +
                    '<div class="title">'+items[i].title+'</div>' +
                        '<div class="buttons">' +
                        '<form action="/admin/posts/'+items[i].id+'" method="POST">' +
                            '<input type="hidden" name="_method" value="delete" />' +
                            '<button type="submit" class="pure-button pure-button-alert">Delete</button>' +
                        '</form>' +
                     '</div>' +
                '</div>');
                if (i >= 9) {
                    $this.data('last', items[i].id);
                    break;
                }
            }
        });
    });

})(jQuery);