function onYouTubePlayerAPIReady() {
    DTOB.video.APIReady();
}
function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
var modal = function(show) {
    if (show) {
        $('.modal-wrapper').css({ top : $(window).scrollTop() + 30 + 'px' });
        $('.modal').show();
    } else {
        $('.modal').hide();

        if(Roots.international.reload_page)
            window.location.reload();

    }
};
//Close modal window
var closeModal = function(e) {
    e.preventDefault();
    modal(false);
    $(this).parent('.modal-box').hide();

    if (typeof $form !== 'undefined') {
        toggleForm();
    }

    if(Roots.international.reload_page)
        window.location.reload();
};

var toggleForm = function() {
    $form.parent('.inner')
        .toggleClass('visuallyhidden')
        .siblings('.inner').toggleClass('visuallyhidden');
};
var Carousel = {
    init: function() {


        /*	CarouFredSel: a circular, responsive jQuery carousel.
         Configuration created by the "Configuration Robot"
         at caroufredsel.dev7studios.com
         */
        $(".header ul.carousel").carouFredSel({
            width: "100%",
            height: 570,
            items: {
                width: "100%",
                height: 570,
                minimum: 3
            },
            scroll: {
                fx: "fade",
                duration: 500
            },
            auto: {
                timeoutDuration: 7000
            },
            prev: {
                button: ".header .controls .prev",
                key: "left"
            },
            next: {
                button: ".header .controls .next",
                key: "right"
            },
            pagination: {
                container: ".header .banner .wrapper .progress",
                keys: true,
                anchorBuilder: function( nr ) {
                    return '<li><a href="#'+nr+'" class="ir">'+nr+'</a></li>';
                }
            }
        }).css('left', -$(window).width()*3);

    }
};
var Popup = {
    instance: $("#popup"),
    init: function() {

        Popup.instance.on('click', 'a.close', Popup.hide);
        Popup.instance.on('click', Popup.hide);
        Popup.instance.on('click', '.wrapper', function( event ) {
            event.stopPropagation();
        });
        $("a[data-popup]").click(function(e) {
            e.preventDefault();
            var $trigger = $(this);

            _gaq.push(['_trackEvent', 'Popup', 'Open', $trigger.data('popup-class')+' popup']);

            Popup.instance.content.load($trigger.attr('href'), function(data) {
                Popup.instance.content.html(data);
                Popup.show();
                Popup.instance.attr('class', $trigger.data('popup-class'));
                eval($trigger.data('callback') + '()');
            });
        });
    },
    center: function() {
        Popup.instance.wrapper.css("left", Math.max(0, (($(window).width() - Popup.instance.wrapper.outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    },
    show: function() {
        Popup.instance.show();
        //Popup.center();
        //Popup.instance.css({ top : $(window).scrollTop() + 25 + 'px' }).show();
    },
    hide: function(e) {
        e.preventDefault();

        _gaq.push(['_trackEvent', 'Popup', 'Close', Popup.instance.attr('class')+' popup']);

        Popup.instance.hide();
        Popup.instance.attr('class', '');
    },
    create: function() {

        var $popup = $("<div id='popup' />");
        $popup.html('<div class="wrapper"><a href="#" class="close">Close</a><div class="top"></div><div class="content"><div class="inner"></div></div><div class="bottom"></div></div>');
        $popup.appendTo("body");
        Popup.instance = $popup;
        Popup.instance.wrapper = $popup.find('.wrapper');
        Popup.instance.content = Popup.instance.wrapper.find('.inner');

    }
};

var oldTotal;
var DTOB = {
    _page: 1,
    $element: $('.content #main-hub'),
    masonry_instance: false,
    url_base: '/content/themes/clipper_teas/includes/ditch-the-old-bag/data.php?',
    url: '/content/themes/clipper_teas/includes/ditch-the-old-bag/data.php?',
    loadItems: function(e) {

        if(typeof e !== "undefined"){
            e.preventDefault();
            $(this).css('opacity', '0.6');
        }

        $.get(DTOB.url + 'page=' + DTOB._page, DTOB.layout);

    },
    layout: function(original_data, textStatus, request) {


        if(request.getResponseHeader('X-End-Of-Content') == '1')
            $("#load-more").hide();
        else
            $('#load-more').css('opacity', '1');


        var data = $(original_data);
        DTOB._page++;

        $("#tmp_loader").html(data);

        imagesLoaded( "#tmp_loader", function() {
            if(DTOB._page == 2) {
                DTOB.$element.html( data );
                setTimeout(function() {
                    /*DTOB.$element.isotope({
                        filter: '*',
                        layoutMode : 'masonry',
                        masonry: {
                            columnWidth: 232
                        }
                    });*/
                    DTOB.masonry_instance = new Masonry(DTOB.$element.get(0), {columnWidth: 4 });

                }, 500);
            } else {
                _gaq.push(['_trackEvent', 'DTOB Hub', 'Load More', 'Page ' + DTOB._page]);
                //DTOB.$element.append( data ).isotope( 'appended', $($(data).toArray()) );
                $("#tmp_loader").children().each(function() {
                    DTOB.$element.append( $(this) );
                    DTOB.masonry_instance.appended($(this));
                });
            }
        });

    },
    video: {

        init: function() {
            // Inject YouTube API script
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        },

        APIReady: function() {
            // create the global player from the specific iframe (#video)
            player = new YT.Player('player', {
                events: {
                    // call this function when player is ready to use
                    'onReady': DTOB.video.playerReady,
                    'onStateChange' : DTOB.video.stateChange
                }
            });

        },

        playerReady: function(event) {

            $("#video").find('.overlay').click(function(e) {
                e.preventDefault();
                player.playVideo();
                $("#video").find('.overlay').hide();

                _gaq.push(['_trackEvent', 'Video', 'Status', 'Play']);
            });

        },

        stateChange: function(event) {
            var _status = event.data;
            if(_status == 0) {
                $("#video").find('.overlay').show();
                _gaq.push(['_trackEvent', 'Video', 'Status', 'Finished']);
            }
        }

    },

    filterType: function() {
        $("#media-type").change(function() {

            var _type = $(this).val();
            if(_type == 'all')
                DTOB.url = DTOB.url_base;
            else
                DTOB.url = DTOB.url_base + 'type=' + _type + '&';
            DTOB._page = 1;
            DTOB.$element.isotope('destroy').html('');
            $("#load-more").show();
            DTOB.loadItems();

        });
    },
    popup: {
        current_element: null,
        reasons: function() {

            /*	CarouFredSel: a circular, responsive jQuery carousel.
             Configuration created by the "Configuration Robot"
             at caroufredsel.dev7studios.com
             */
            $("ul.carousel", Popup.instance.content).carouFredSel({
                circular: false,
                infinite: false,
                width: 567,
                height: 527,
                items: {
                    visible: 1,
                    width: 527
                },
                auto: false,
                next: {
                    button: $(".arrow.next", Popup.instance.content),
                    key: "right"
                },
                prev: {
                    button: $(".arrow.previous", Popup.instance.content),
                    key: "left"
                },
                pagination: {
                    container: $(".pager", Popup.instance.content),
                    keys: true
                }
            });

        },
        director: function() {
            $('.scroll-pane', Popup.instance.content).jScrollPane({
                verticalDragMinHeight: 60,
                verticalDragMaxHeight: 60,
                showArrows: true,
                horizontalGutter: 60,
                verticalGutter: 60
            });
        },
        loadPost: function() {

            var $current_post_element = DTOB.popup.current_element;
            var _social_urls = {
                facebook: 'http://www.facebook.com/pages/Clipper-Tea-Revival-Time/172392210758',
                twitter: 'http://twitter.com/clipperteas',
                pintrest: 'https://pinterest.com/clipperteas/',
                youtube: 'http://www.youtube.com/clipperteas',
                instagram: 'http://instagram.com/clipperteas'
            };

            var _data = {
                source: $current_post_element.data('source'),
                tag: '#DitchTheOldBag',
                date: $current_post_element.data('date'),
                rawdate: $current_post_element.find('time').attr('datetime'),
                text: $current_post_element.find('article p').html(),
                html: $current_post_element.find('article').html(),
                image: $current_post_element.find('article img').attr('src'),
                type: $current_post_element.find('article').attr('class')
            };

            var _html = '' +
                '<a href="#" class="arrow left previous post-navigator">Previous</a>' +
                '<div class="post">' +
                '<div class="head">' +
                '<span class="source ' + _data.source + '"></span>' +
                '<span class="tag">' + _data.tag + '</span>' +
                '<time datetime="' + _data.rawdate + '">' + _data.date + '</time>' +
                '</div>' +
                '<div class="divider"></div>' +
                '<article class="' + _data.type + '">' +
                _data.html +
                '</article>' +
                '<div class="divider"></div>';

            if(_data.source == 'blog') {
                _html += '<a href="' + $current_post_element.find('article').data('external-link') + '" class="join-in">Read more...</a>';
            } else {
                _html += '<a href="' + eval('_social_urls.' + _data.source) + '" class="join-in">Join in on ' + ucfirst(_data.source) + ' &gt;</a>';
            }

                _html += '<div class="share">' +
                '<a class="ir pin-it" href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark">Pin It</a>' +
                '<a class="ir facebook" href="' + window.location.pathname + '">Facebook</a>' +
                '<a class="ir twitter" href="https://twitter.com/intent/tweet?url=' + window.location.pathname + '">Twitter</a>' +
                '<a class="ir mail tell-a-friend" href="mailto:?subject=Clipper%20Teas&amp;body=' + window.location.pathname + '">Mail</a>' +
                '</div>' + '<div class="clearfix"></div>' +
                '</div>' +
                '<a href="#" class="arrow right next post-navigator">Next</a>';

            Popup.instance.content.html(_html);
            Popup.show();
            Popup.instance.attr('class', 'post');
            DTOB.popup.post();

        },
        post: function() {
            if(DTOB.popup.current_element.next().length == 0) {
                Popup.instance.find('.post-navigator.next').hide();
            }
            if(DTOB.popup.current_element.prev().length == 0) {
                Popup.instance.find('.post-navigator.previous').hide();
            }
        }
    },

    pinIt: function() {
        var e = document.createElement('script');
        e.setAttribute('type','text/javascript');
        e.setAttribute('charset','UTF-8');
        e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);
        document.body.appendChild(e);
    }
};
var currentBanner = 0;
var bannerTimer;

function startBanner(){
    clearInterval(bannerTimer);
    bannerTimer = setInterval(function() {
        nextBanner();
    }, 7000);
}

function nextBanner(){
    if(currentBanner == 0){
        currentBanner = 1;
        $('.banner .slide').fadeOut(500);
        $('.banner .slide-2').fadeIn(500);
    }else{
        currentBanner = 0;
        $('.banner .slide').fadeIn(500);
        $('.banner .slide-2').fadeOut(500);
    }
    startBanner();
}
var Roots = {

    common: {
        init: function() {
            jQuery(window).load(function(){jQuery('body').width(jQuery('body').width()+1).width('auto')});
        }
    },
    // All pages
    page_template_templateseveryday_tea_php: {
        init: function() {

            $("main .shelf.small .pack").hover(function() {
                var $popup = $(".detail", this);
                var _position_offset = 25;
                var _bottom_position = 110;

                $popup.css('bottom', _bottom_position - _position_offset);
                $popup.css('display', 'block').animate({ opacity: 0 }, 0);

                $popup.stop().animate({
                    opacity: 1,
                    bottom: _bottom_position
                });
            }, function() {
                var $popup = $(".detail", this);
                var _position_offset = 25;
                var _bottom_position = 110;

                $popup.stop().animate({
                    opacity: 0,
                    bottom: _bottom_position - _position_offset
                }, 100, function() {
                    $popup.hide();
                });
            });

        }
    },
    ditchtheoldbag: {
        init: function() {

            Carousel.init();

            Popup.create();
            Popup.init();

            DTOB.video.init();
            DTOB.loadItems();
            DTOB.filterType();
            $('#load-more').click(DTOB.loadItems);

            DTOB.$element.on('error', '.user-meta img', function (e) {
                $(this).attr('src', '/content/themes/clipper_teas/images/ditch-the-old-bag/avatar.jpg');
            });


            Popup.instance.on('click', '.post-navigator',function(e) {

                e.preventDefault();

                if($(this).hasClass('next'))
                    DTOB.popup.current_element = DTOB.popup.current_element.next();
                else
                    DTOB.popup.current_element = DTOB.popup.current_element.prev();

                DTOB.popup.loadPost();

            });

            DTOB.$element.on('click', '.item',function(e) {
                if(!$(e.target).hasClass('action'))
                    e.preventDefault();

                DTOB.popup.current_element = $(this);

                DTOB.popup.loadPost();

            });

        }
    },
    page_template_templateshome_dtob_php: {
        init: function() {
            DTOB.video.init();

            Carousel.init();

            $('.banner .slide').css('cursor', 'pointer').click(function(e) {
                window.location = "http://www.clipper-teas.com/our-drinks/everyday-tea/";
            });
            $('.banner .slide-2').css('cursor', 'pointer').click(function(e) {
                window.location = "http://www.clipper-teas.com/our-story/our-fairtrade-story/";
            });

            $('.controls .prev, .controls .next').click(function(){
                nextBanner();
            });

            /*	CarouFredSel: a circular, responsive jQuery carousel.
             Configuration created by the "Configuration Robot"
             at caroufredsel.dev7studios.com
             */
            $(".campaign-container .carousel ul").carouFredSel({
                width: 903,
                height: 377,
                items: {
                    visible: 3,
                    width: 299,
                    height: 377
                },
                scroll: {
                    items: 1,
                    pauseOnHover: true
                },
                next: {
                    button: ".campaign-container .carousel .arrow.next",
                    key: "right"
                },
                prev: {
                    button: ".campaign-container .carousel .arrow.previous",
                    key: "left"
                }
            });
        }
    },
    review_tea: {
        init: function() {

            $( "div.slider" ).slider({
                value: 1,
                min: 1,
                max: 10,
                step: 1,
                slide: function( event, ui ) {
                    var _field_id = $(this).data('field');
                    $("#" + _field_id).val(ui.value);
                }
            });

            $("form [data-show-on]").each(function() {

                var _value = $(this).data('show-on');
                var _element = $(this);

                _element.hide();
                $(this).parents('li').find('input, textarea, select').not('.extra *').change(function() {
                    if($(this).val() == _value) {
                        _element.slideDown();
                        _element.find('input, textarea').eq(0).focus();
                    } else if(_element.is(":visible")) {
                        _element.slideUp();
                    }
                });

            });

        }
    },
    international: {

        reload_page: false,

        init: function() {

            $('.dropdown select').selectric().change(function() {
                var _val = $(this).val();
                $('.box [data-field="name"] span').text(country_data[_val].country);
                $("#form-enquiry-to").val(country_data[_val].email);
                $('.box a.btn').show();
                $('.box .popup-launch-divider').show();


                var _country_dd_option = $("#trade-email #form-country option[title='"+country_data[_val].country+"']");
                _country_dd_option.prop('selected', true);
                $("#form-country").val(_country_dd_option.attr('value'));

            });

            $('.box .popup-launch-divider').hide();
            $('.box a.btn').hide().on('click', function(e) {
                e.preventDefault();
                $("#trade-email").show();
                $('.modal-close').on('click', closeModal);
                modal(true);
/*
                $.get("http://api.hostip.info/country.php", function(data) {
                    $("#form-country").val(data);
                    $("#form-country option[value="+data+"]").prop('selected', true);
                });*/
            });

            $("#trade-email form").submit(function(e) {
                e.preventDefault();

                var $form = $(this);
                if ($form[0].checkValidity()) {

                    $form.find('input[type="image"]').each(function(i, e) {
                        $(this).toggleClass('disabled');
                        $(this).prop('disabled', true);
                    });

                    $.post($form.attr('action'), $form.serialize(), function(data) {
                        $("#trade-email .inner").html("<h1>Email Us</h1><div class=\"divider\">&nbsp;</div><p>Thank you for your enquiry. Your email has been sent.</p><div class=\"divider\">&nbsp;</div>");
                        Roots.international.reload_page = true;
                    });
                }
            });

            $("#trade-email #form-country").change(function() {
                var _val = $(this).val();

                $(".dropdown select").val(_val);
                $(".dropdown select").selectric('refresh');
                $("#form-enquiry-to").val(country_data[_val].email);
            });

        }

    },
    // All pages
    windowLoad: {
        page_template_templateseveryday_tea_php: function() {

            /*	CarouFredSel: a circular, responsive jQuery carousel.
             Configuration created by the "Configuration Robot"
             at caroufredsel.dev7studios.com
             */
            $(".our-drinks-illustration .carousel").carouFredSel({
                items: {
                    visible: 1,
                    start: "random",
                    width: 274,
                    height: 178
                },
                scroll: 1,
                auto: 10000,
                prev: ".our-drinks-illustration .btn.previous",
                next: ".our-drinks-illustration .btn.next",
                swipe: true
            });

            /*	CarouFredSel: a circular, responsive jQuery carousel.
             Configuration created by the "Configuration Robot"
             at caroufredsel.dev7studios.com
             */
            $("main .carousel-container .carousel").carouFredSel({
                items: 3,
                height: 377,
                scroll: {
                    pauseOnHover: true
                },
                prev: {
                    button: "main .carousel-container .arrow.previous",
                    key: "left"
                },
                next: {
                    button: "main .carousel-container .arrow.next",
                    key: "right"
                }
            });

        }
    },
    // Home page
    home: {
        init: function() {
            // JavaScript to be fired on the home page
        }
    },
    // About page
    about: {
        init: function() {
            // JavaScript to be fired on the about page
        }
    }
};

var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = Roots;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire('common');

        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
            UTIL.fire(classnm);
            $(window).load(function(){
                UTIL.fire('windowLoad', classnm);
            });
        });
    }
};

$(document).ready(UTIL.loadEvents);