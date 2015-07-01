jQuery.fn.rotate = function(degrees) {
    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
        '-moz-transform' : 'rotate('+ degrees +'deg)',
        '-ms-transform' : 'rotate('+ degrees +'deg)',
        'transform' : 'rotate('+ degrees +'deg)'});
};

var TeaGuys = {
    body: $("body.our-tea-guys"),
    albums: $("body.our-tea-guys").find('.photos'),
    posts: $("body.our-tea-guys").find('.posts_ajax'),
    randomPositions: function() {
        $("#main .travel-log .book .photos .row-fluid > div", TeaGuys.body).each(function() {
            var min = -5;
            var max = 5;

            var top = Math.floor(Math.random() * (max - min + 1)) + min;
            var left = Math.floor(Math.random() * (max - min + 1)) + min;
            var rotate = Math.floor(Math.random() * (2 - (-2) + 1)) + (-2);

            $(this).css({
                top: top,
                left: left
            }).rotate(rotate);

        });
    },
    loadAlbums: function() {

        $(".ajax", TeaGuys.body).removeClass('loading');
        TeaGuys.randomPositions();
        $(".ajax", TeaGuys.body).find('.span3').hide().each(function(i) {
            var _this = $(this);
            setTimeout(function() {
                _this.fadeIn();
            }, 120*i);
        });
        $(".ajax", TeaGuys.body).find('.span3 a').click(function(e) {
            e.preventDefault();
            var $container = $(this).parent('.span3');
            $("#fancybox-preloader").load('/media-tags/tea-guys/', { date: $container.data('date'), location: $container.data('location'), photos: 1 }, function() {
                $("#fancybox-preloader").find('a').fancybox({
                    minWidth: 848,
                    maxWidth: 848,
                    minHeight: 714,
                    maxHeight: 714,
                    width: 848,
                    height: 714,
                    autoScale : false,
                    fitToView : false,
                    type: 'ajax',
                    padding: 0,
                    margin: 0,
                    nextEffect: 'none',
                    prevEffect: 'none',
                    afterShow: function() {
                        $('.fancybox-inner .attachment img').one('load', function() {
                            $(this).width($(this).width());
                        }).each(function() {
                            if(this.complete) $(this).load();
                        });
                        $(".fancybox-nav").click(function() {
                            $('.fancybox-inner .attachment img').css("opacity", 0.5);
                        });
                        $(".fancybox-inner .pager").text(this.index+1 + ' of ' + this.group.length);
                    },
                    helpers : {
                        title : null
                    }
                });
                $("#fancybox-preloader").find('a').eq(0).trigger("click");
            });
        });

    },
    loadPosts: function() {

        $(".posts h3", TeaGuys.body).dotdotdot();
        $(".posts .post-content", TeaGuys.body).dotdotdot();

    }
};
jQuery(document).ready(function($) {

    $(".posts h3", TeaGuys.body).dotdotdot();

    //DO POSTS
    TeaGuys.posts.load('/category/our-tea-guys-journal/', TeaGuys.loadPosts).on('click', '.arrow', function(e) {
        e.preventDefault();
        TeaGuys.posts.addClass('loading').load($(this).attr('href'), TeaGuys.loadPosts);
    });

    //DO ALBUMS
    $(".ajax", TeaGuys.albums).load('/media-tags/tea-guys/', TeaGuys.loadAlbums).on('click', '.navigation a', function(e) {
        e.preventDefault();
        $(".ajax", TeaGuys.albums).addClass('loading').load($(this).attr('href'), TeaGuys.loadAlbums);
    });

    $.get(wp_data.ajax_url, { action: 'tea_guys_location' }, function(data) {
        $("select#location", TeaGuys.albums).append(data).selectric();
    });

    $.get(wp_data.ajax_url, { action: 'tea_guys_date' }, function(data) {
        $("select#date", TeaGuys.albums).append(data).selectric();
    });

    $("select.custom", TeaGuys.albums).change(function() {

        $(".ajax", TeaGuys.albums).load('/media-tags/tea-guys/', { date: $("#date").val(), location: $("#location").val() }, TeaGuys.loadAlbums).on('click', '.navigation a', function(e) {
            e.preventDefault();
            $(".ajax", TeaGuys.albums).addClass('loading').load($(this).attr('href'), TeaGuys.loadAlbums);
        });

    });

});