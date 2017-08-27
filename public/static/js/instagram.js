(function ($) {
    var
    initialize = function () {
        $("#instagram-contents .row div").mouseover(function(that){
            // $that
        });
        $("#instagram-contents").on('mouseleave', '.instashow-gallery-media-cover', function(){
            $(this).fadeTo( "fast" , 0, function() {
            });
        }).on('mouseenter', '.instashow-gallery-media-cover', function(){
            $(this).fadeTo( "fast" , 0.9, function() {
            });
        });


        // $('div.nav-toggle, nav a').bind('click', addMenuExpand);
        // $(window).bind('scroll', addMenuTop);
        // $("nav .tab").width("70px");
        // $("nav .tab").mouseover(function(that){
        //     var kor = $(this).data("kor");
        //     $(this).find("a").text(kor);
        // });
        // $("nav .tab").mouseout(function(that){
        //     var eng = $(this).data("eng");
        //     $(this).find("a").text(eng);
        // });
    },
    get_feeds = function(last){
        var url = "/batch_instagram_ajax";
        if(last)
            url = url + "?last=" + last;

        $.get( url, function( data ) {
            var row;
            for (feed_idx in data){
                var feed = data[feed_idx];
                if(feed_idx%4 == 0)
                    row = $("#instagram-contents").append('<div class="row"></div>');                   
                $("#instagram-contents .row:last").append('<div class="col-3"><a target="_blank" href="https://www.instagram.com/p/'+feed.extra.code+'"><span class="instashow-gallery-media-cover"><div><span class="info"><span class="description">'+decodeURIComponent(feed.contents).replace(/\+/g, " ")+'</span></span></div></span><img src="'+feed.extra.thumbnail_src+'"/></a></div>');
            }
        });
    };

    initialize();
    get_feeds();

})(jQuery);