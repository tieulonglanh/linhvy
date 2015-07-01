Application.retailer = function (e) {
    "use strict";
    var t;
    var n = function (n) {
        t = e(n);
        t.on("submit", function (n) {
            n.preventDefault();
            e("#loading-div").show();
            e.getJSON(t.attr("action"), t.serialize()).done(function (t) {
                e("#loading-div").hide();
                if (t.status == "error") {
                    e("#result").addClass("error").html(t.message);
                    e("html, body").animate({
                        scrollTop: e("#result").offset().top
                    }, 1e3)
                } else if (t.status != "error") {
                    e("#result").removeClass("error").html("Thank you for your submission, we will be in touch shortly.");
                    e("#retailer-club-form")[0].reset();
                    e("html, body").animate({
                        scrollTop: e("#result").offset().top
                    }, 1e3)
                } else {
                    e("#result").addClass("error").html("Error occured, please try again later.")
                }
            })
        })
    };
    return {
        initialise: function () {
            n("#retailer-club-form")
        }
    }
}(jQuery);

var H5F = H5F || {};
(function (e) {
    var t = e.createElement("input"),
        n = /^[a-zA-Z0-9.!#$%&'*+-\/=?\^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
        r = /[a-z][\-\.+a-z]*:\/\//i,
        i = /^(input|select|textarea)$/i,
        s, o, u, a, f, l, c, h, p, d, v, m, g, y, b, w, E, S, x, T, N, C, k, L, A, O;
    l = function (e, t) {
        var n = !e.nodeType || false;
        var r = {
            validClass: "valid",
            invalidClass: "error",
            requiredClass: "required",
            placeholderClass: "placeholder"
        };
        if (typeof t === "object") {
            for (var i in r) {
                if (typeof t[i] === "undefined") {
                    t[i] = r[i]
                }
            }
        }
        f = t || r;
        if (n) {
            for (var s = 0, o = e.length; s < o; s++) {
                c(e[s])
            }
        } else {
            c(e)
        }
    };
    c = function (e) {
        var t = e.elements,
            n = t.length,
            r, i = !! e.attributes["novalidate"];
        x(e, "invalid", p, true);
        x(e, "blur", p, true);
        x(e, "input", p, true);
        x(e, "keyup", p, true);
        x(e, "focus", p, true);
        x(e, "change", p, true);
        x(e, "click", d, true);
        x(e, "submit", function (t) {
            s = true;
            if (!o) {
                if (!i && !e.checkValidity()) {
                    N(t)
                }
            }
        }, false);
        if (!g()) {
            e.checkValidity = function () {
                return v(e)
            };
            while (n--) {
                r = !! t[n].attributes["required"];
                if (t[n].nodeName.toLowerCase() !== "fieldset") {
                    h(t[n])
                }
            }
        }
    };
    h = function (e) {
        var t = e,
            n = S(t),
            r = {
                type: t.getAttribute("type"),
                pattern: t.getAttribute("pattern"),
                placeholder: t.getAttribute("placeholder")
            }, i = /^(email|url)$/i,
            s = /^(input|keyup)$/i,
            o = i.test(r.type) ? r.type : r.pattern ? r.pattern : false,
            u = y(t, o),
            f = w(t, "step"),
            l = w(t, "min"),
            c = w(t, "max"),
            h = !(t.validationMessage === "" || t.validationMessage === undefined);
        t.checkValidity = function () {
            return v.call(this, t)
        };
        t.setCustomValidity = function (e) {
            m.call(t, e)
        };
        t.validity = {
            valueMissing: n,
            patternMismatch: u,
            rangeUnderflow: l,
            rangeOverflow: c,
            stepMismatch: f,
            customError: h,
            valid: !n && !u && !f && !l && !c && !h
        };
        if (r.placeholder && !s.test(a)) {
            b(t)
        }
    };
    p = function (e) {
        var t = C(e) || e,
            n = /^(input|keyup|focusin|focus|change)$/i,
            r = /^(submit|image|button|reset)$/i,
            s = /^(checkbox|radio)$/i,
            o = true;
        if (i.test(t.nodeName) && !(r.test(t.type) || r.test(t.nodeName))) {
            a = e.type;
            if (!g()) {
                h(t)
            }
            if (t.validity.valid && (t.value !== "" || s.test(t.type)) || t.value !== t.getAttribute("placeholder") && t.validity.valid) {
                L(t, [f.invalidClass, f.requiredClass]);
                k(t, f.validClass)
            } else if (!n.test(a)) {
                if (t.validity.valueMissing) {
                    L(t, [f.invalidClass, f.validClass]);
                    k(t, f.requiredClass)
                } else if (!t.validity.valid) {
                    L(t, [f.validClass, f.requiredClass]);
                    k(t, f.invalidClass)
                }
            } else if (t.validity.valueMissing) {
                L(t, [f.requiredClass, f.invalidClass, f.validClass])
            }
            if (a === "input" && o) {
                T(t.form, "keyup", p, true);
                o = false
            }
        }
    };
    v = function (e) {
        var t, n, r, i, o = false;
        if (e.nodeName.toLowerCase() === "form") {
            t = e.elements;
            for (var u = 0, a = t.length; u < a; u++) {
                n = t[u];
                r = !! n.attributes["required"];
                i = !! n.attributes["pattern"];
                if (n.nodeName.toLowerCase() !== "fieldset" && (r || i && r)) {
                    p(n);
                    if (!n.validity.valid && !o) {
                        if (s) {
                            n.focus()
                        }
                        o = true
                    }
                }
            }
            return !o
        } else {
            p(e);
            return e.validity.valid
        }
    };
    m = function (e) {
        var t = this;
        t.validationMessage = e
    };
    d = function (e) {
        var t = C(e);
        if (t.attributes["formnovalidate"] && t.type === "submit") {
            o = true
        }
    };
    g = function () {
        return A(t, "validity") && A(t, "checkValidity")
    };
    y = function (e, t) {
        if (t === "email") {
            return !n.test(e.value)
        } else if (t === "url") {
            return !r.test(e.value)
        } else if (!t) {
            return false
        } else {
            var i = e.getAttribute("placeholder"),
                s = e.value;
            u = new RegExp("^(?:" + t + ")$");
            if (s === i) {
                return false
            } else if (s === "") {
                return false
            } else {
                return !u.test(e.value)
            }
        }
    };
    b = function (e) {
        var n = {
            placeholder: e.getAttribute("placeholder")
        }, r = /^(focus|focusin|submit)$/i,
            i = /^(input|textarea)$/i,
            s = /^password$/i,
            o = !! ("placeholder" in t);
        if (!o && i.test(e.nodeName) && !s.test(e.type)) {
            if (e.value === "" && !r.test(a)) {
                e.value = n.placeholder;
                x(e.form, "submit", function () {
                    a = "submit";
                    b(e)
                }, true);
                k(e, f.placeholderClass)
            } else if (e.value === n.placeholder && r.test(a)) {
                e.value = "";
                L(e, f.placeholderClass)
            }
        }
    };
    w = function (e, t) {
        var n = parseInt(e.getAttribute("min"), 10) || 0,
            r = parseInt(e.getAttribute("max"), 10) || false,
            i = parseInt(e.getAttribute("step"), 10) || 1,
            s = parseInt(e.value, 10),
            o = (s - n) % i;
        if (!S(e) && !isNaN(s)) {
            if (t === "step") {
                return e.getAttribute("step") ? o !== 0 : false
            } else if (t === "min") {
                return e.getAttribute("min") ? s < n : false
            } else if (t === "max") {
                return e.getAttribute("max") ? s > r : false
            }
        } else if (e.getAttribute("type") === "number") {
            return true
        } else {
            return false
        }
    };
    E = function (e) {
        var t = !! e.attributes["required"];
        return t ? S(e) : false
    };
    S = function (e) {
        var t = e.getAttribute("placeholder"),
            n = /^(checkbox|radio)$/i,
            r = !! e.attributes["required"];
        return !!(r && (e.value === "" || e.value === t || n.test(e.type) && !O(e)))
    };
    x = function (e, t, n, r) {
        if (A(window, "addEventListener")) {
            e.addEventListener(t, n, r)
        } else if (A(window, "attachEvent") && typeof window.event !== "undefined") {
            if (t === "blur") {
                t = "focusout"
            } else if (t === "focus") {
                t = "focusin"
            }
            e.attachEvent("on" + t, n)
        }
    };
    T = function (e, t, n, r) {
        if (A(window, "removeEventListener")) {
            e.removeEventListener(t, n, r)
        } else if (A(window, "detachEvent") && typeof window.event !== "undefined") {
            e.detachEvent("on" + t, n)
        }
    };
    N = function (e) {
        e = e || window.event;
        if (e.stopPropagation && e.preventDefault) {
            e.stopPropagation();
            e.preventDefault()
        } else {
            e.cancelBubble = true;
            e.returnValue = false
        }
    };
    C = function (e) {
        e = e || window.event;
        return e.target || e.srcElement
    };
    k = function (e, t) {
        var n;
        if (!e.className) {
            e.className = t
        } else {
            n = new RegExp("(^|\\s)" + t + "(\\s|$)");
            if (!n.test(e.className)) {
                e.className += " " + t
            }
        }
    };
    L = function (e, t) {
        var n, r, i = typeof t === "object" ? t.length : 1,
            s = i;
        if (e.className) {
            if (e.className === t) {
                e.className = ""
            } else {
                while (i--) {
                    n = new RegExp("(^|\\s)" + (s > 1 ? t[i] : t) + "(\\s|$)");
                    r = e.className.match(n);
                    if (r && r.length === 3) {
                        e.className = e.className.replace(n, r[1] && r[2] ? " " : "")
                    }
                }
            }
        }
    };
    A = function (e, t) {
        var n = typeof e[t],
            r = new RegExp("^function|object$", "i");
        return !!(r.test(n) && e[t] || n === "unknown")
    };
    O = function (e) {
        var t = document.getElementsByName(e.name);
        for (var n = 0; n < t.length; n++) {
            if (t[n].checked) {
                return true
            }
        }
        return false
    };
    window["H5F"] = {
        setup: l
    }
})(document);
var Application = window.Application || {};
Application.banner = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i;
    var s;
    var o;
    var u;
    var a;
    var f = function (e) {
        if (e === true || typeof e === "undefined") {
            s = s.next();
            if (s.length === 0) {
                s = r.first()
            }
        } else {
            s = s.prev();
            if (s.length === 0) {
                s = r.last()
            }
        }
        h()
    };
    var l = function () {
        n = i.find(".controls");
        n.on("click", "a", c)
    };
    var c = function (t) {
        t.preventDefault();
        clearInterval(a);
        f(e(this).hasClass("next"))
    };
    var h = function () {
        r.fadeOut(u);
        s.fadeIn(u);
        v(s.index())
    };
    var p = function () {
        o = e(".progress", i);
        o.on("click", "a", d)
    };
    var d = function (n) {
        n.preventDefault();
        clearInterval(a);
        var r = e(this).parent().index() + 1;
        s = t.children(":nth-child(" + r + ")");
        h()
    };
    var v = function (e) {
        o.children(":visible").removeClass("active");
        o.children(":nth-child(" + (e + 1) + ")").addClass("active")
    };
    return {
        initialise: function (n) {
            i = e(n);
            t = e(".carousel", i);
            r = e("li", t);
            s = r.first();
            l();
            p();
            u = 750;
            a = setInterval(f, 8e3)
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.carousel = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i;
    var s;
    var o;
    var u = false;
    var a = function (e) {
        u = true;
        e = typeof e !== "undefined" ? e : -o * 2;
        if (typeof Modernizr !== "undefined" && Modernizr.csstransitions) {
            h(i / 1e3);
            t.css("margin-left", e);
            setTimeout(l, i)
        } else {
            t.animate({
                "margin-left": e
            }, i, l)
        }
    };
    var f = function () {
        n = r.children(".controls");
        n.on("click", c)
    };
    var l = function () {
        if (parseInt(t.css("margin-left"), 10) < 0) {
            t.children("li:last").after(t.children("li:first"))
        } else {
            t.children("li:first").before(t.children("li:last"))
        }
        h(0);
        t.css({
            "margin-left": -o
        });
        u = false
    };
    var c = function (n) {
        n.preventDefault();
        clearInterval(s);
        if (parseInt(t.css("margin-left"), 10) % o === 0) {
            var r = e(this).hasClass("left") ? 0 : -o * 2;
            a(r)
        }
    };
    var h = function (n) {
        var r = ["transition", "-webkit-transition", "-moz-transition", "-o-transition"];
        e(r).each(function (e, r) {
            t.css(r, "margin-left " + n + "s ease-in-out")
        })
    };
    return {
        initialise: function (n) {
            r = e(n);
            t = e("ul", r);
            f();
            i = 750;
            o = 240;
            s = setInterval(a, 5e3)
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.timeline = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i;
    var s;
    var o = 0;
    var u = function (e) {
        e = typeof e !== "undefined" ? e : -s;
        if (typeof Modernizr !== "undefined" && Modernizr.csstransitions) {
            l(i / 1e3);
            t.css("margin-left", e)
        } else {
            t.animate({
                "margin-left": e
            }, i)
        }
    };
    var a = function () {
        n = r.children(".controls");
        n.on("click", "a", f)
    };
    var f = function (n) {
        n.preventDefault();
        if (parseInt(t.css("margin-left"), 10) % s === 0) {
            o += e(this).hasClass("left") ? s : -s;
            c();
            u(o)
        }
    };
    var l = function (n) {
        var r = ["transition", "-webkit-transition", "-moz-transition", "-o-transition"];
        e(r).each(function (e, r) {
            t.css(r, "margin-left " + n + "s ease-in-out")
        })
    };
    var c = function () {
        if (o === 0) {
            e(".left", n).hide()
        } else if (o === -(s * 3)) {
            e(".right", n).hide()
        } else {
            e("a", n).show()
        }
    };
    return {
        initialise: function (n) {
            r = e(n);
            t = e("ul", r);
            a();
            i = 750;
            s = 923
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.links = function (e) {
    "use strict";
    var t = function (t) {
        e(t).attr("target", "_blank")
    };
    var n = function () {
        e(".share .facebook").on("click", r)
    };
    var r = function (t) {
        t.preventDefault();
        FB.ui({
            method: "feed",
            name: document.title,
            link: e(this).attr("href")
        })
    };
    return {
        initialise: function () {
            t(".external");
            n()
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.forms = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i;
    var nti;
    var s;
    var o;
    var u = function (t) {
        if (t) {
            e(".modal-wrapper").css({
                top: e(window).scrollTop() + 30 + "px"
            });
            e(".modal").show()
        } else {
            e(".modal").hide()
        }
    };
    var a = function (n) {
        t = e(n);
        e("a.newsletter-sign-up").on("click", {
            el: t
        }, h);
        t.find("form").on("submit", p)
    };
    var f = function (t) {
        n = e(t);
        e("a.newsletter-unsubscribe").on("click", {
            el: n
        }, h);
        n.find("form").on("submit", p)
    };
    var l = function (t) {
        r = e(t);
        r.on("submit", p);
        r.on("click", "a", function (e) {
            e.preventDefault();
            r.find('input[type="submit"]').click()
        })
    };
    var c = function (t) {
        s = e(t);
        e("a.tell-a-friend").on("click", {
            el: s
        }, h);
        s.find("form").on("submit", p);
        s.find("form").on("click", ".add-remove a", T)
    };
    var h = function (t) {
        t.preventDefault();
        t.data.el.show();
        e(".modal-close").on("click", y);
        u(true)
    };
    var p = function (t) {
        t.preventDefault();
        o = e(this);
        if (o[0].checkValidity()) {
            w();
            d()
        }
    };
    var d = function () {
        e.post(o.attr("action"), o.serialize(), v)
    };
    var v = function (e) {
        w();
        o.find('input:not([type="hidden"])').each(S);
        if (o.hasClass("short-sign-up")) {
            o.siblings(".sign-up-feedback").toggleClass("visuallyhidden")
        } else {
            g()
        }
    };
    var m = function (t) {
        H5F.setup(e(t))
    };
    var g = function () {
        b();
        //o.parents(".modal-box")[0].scrollIntoView()
    };
    var y = function (t) {
        t.preventDefault();
        u(false);
        e(this).parent(".modal-box").hide();
        if (typeof o !== "undefined") {
            b()
        }
    };
    var b = function () {
        o.parent(".inner").toggleClass("visuallyhidden").siblings(".inner").toggleClass("visuallyhidden")
    };
    var w = function () {
        E();
        o.find('input[type="image"]').each(function (t, n) {
            e(this).toggleClass("disabled");
            e(this).prop("disabled", e(this).hasClass("disabled"))
        })
    };
    var E = function () {
        o.find("a.submit").each(function (t, n) {
            e(this).toggleClass("disabled")
        })
    };
    var S = function () {
        e(this).val("")
    };
    $('#nikki-tibbles-enter').submit(function( event ) {
    	return false;
    });
    var nte = function (t) {
        nti = e(t);
        nti.on("click", ".submit-btn", function (e) {
        	e.preventDefault();
            nti.find('input[type="submit"]').click();
            if($('#nikki-tibbles-enter #form-terms').prop('checked')){
            	$.ajax({
                    'url': '?type=ajax',
                    'type': 'POST',
                    'data': $('#nikki-tibbles-enter').serialize(),
                    'success': function(result){
                         //process here
                		if(result == 'success'){
                			//show popup
                			$('body').prepend('<div id="nikki-popup-bg"></div>');
                			$('#nikki-popup-bg').prepend('<div id="nikki-popup"><div class="close-btn"></div><h1>Thanks for your details</h1><p>Fingers crossed - you might be the lucky winner to join Nikki Tibbles at her afternoon tea party! We\'ll be in touch soon.</p><a class="browse-on" href="#">Browse On</a></div>');
                			$('#nikki-popup-bg').show();
                			$('#nikki-popup .close-btn, #nikki-popup .browse-on').click(function(){
                				window.location.replace("/win-things/game-competition/");
                				return false;
                		    });
                		}
                    }
                });
            }
        });
        return false;
    };
    var x = function (t) {
        i = e(t);
        i.on("click", ".submit-btn", function (e) {
            e.preventDefault();
            i.find('input[type="submit"]').click()
        })
    };
    var T = function (t) {
        t.preventDefault();
        if (e(this).hasClass("minus")) {
            C()
        } else {
            N()
        }
    };
    var N = function () {
        var t = e(".friend-input");
        var n = L(t);
        t.last().append(k(n + 1))
    };
    var C = function () {
        var t = e(".friend-input");
        if (t.length > 1) {
            t.last().remove()
        }
    };
    var k = function (t) {
        return e(['<div class="friend-input">', '<label for="form-friend-email-' + t + "\">Friend's Email:</label>", '<input type="email" name="friend-email-' + t + '" id="form-friend-email-' + t + '" required> *', "</div>"].join("\n"))
    };
    var L = function (e) {
        return parseInt(e.last().children("input").attr("id").slice(-1), 10)
    };
    return {
        initialise: function () {
            a("#newsletter-signup");
            l("#short-sign-up");
            nte("#nikki-tibbles-enter");
            x("#cup-collector-enter");
            c("#tell-a-friend");
            f("#newsletter-unsubscribe");
            m("form.validate")
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.tabs = function (e) {
    "use strict";
    var t;
    var n;
    var r = function () {
        e("a", t).on("click", i)
    };
    var i = function (t) {
        t.preventDefault();
        var n = e(this);
        s(n.attr("href"));
        o(n.data("class"))
    };
    var s = function (e) {
        n.load(e + " .trade-bd >")
    };
    var o = function (t) {
        var n = e("body");
        var r = n.attr("class");
        r = r.replace(/page-template-templates\w+-php/gi, t);
        n.attr("class", r)
    };
    return {
        initialise: function () {
            t = e(".trade-tabs");
            n = e(".trade-bd");
            r()
        }
    }
}(jQuery);
var Application = window.Application || {};
Application.game = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i = function () {
        swfobject.embedSWF(Application.stylesheetDir + "/javascripts/game/game.swf", "find-the-teapot-flash", "466", "555", "9.0.0", Application.stylesheetDir + "/javascripts/game/expressInstall.swf", {}, {
            wmode: "transparent"
        })
    };
    var s = function (t) {
        if (t) {
            e(".modal-wrapper").css({
                top: e(window).scrollTop() + 30 + "px"
            });
            e(".modal").show()
        } else {
            e(".modal").hide()
        }
    };
    var o = function (t) {
        t.preventDefault();
        s(false);
        e(this).parent(".modal-box").hide()
    };
    var u = function (r) {
        t = e(r);
        n = t.find("form");
        e(document).on("showRegistrationForm", a);
        n.on("submit", f)
    };
    var a = function () {
        t.show();
        e(".modal-close").on("click", o);
        s(true)
    };
    var f = function (t) {
        t.preventDefault();
        r = e(this);
        v();
        l()
    };
    var l = function () {
        e.post(r.attr("action"), r.serialize(), c)
    };
    var c = function (e) {
        v();
        var t = r.hasClass("sign-in") ? "loginProcessed" : "registrationProcessed";
        _gaq.push(['_trackEvent', 'Teacup Carousel Game', 'Login', e.guid ? 'success' : 'fail']);
        return e.guid ? h(t, e.guid) : p(e.message)
    };
    var h = function (t, n) {
        e(document).trigger(t, n);
        r.parents(".modal-box").hide();
        s(false);
        //e("#find-the-teapot-flash")[0].scrollIntoView();
        r.find('input:not([type="hidden"])').each(d)
    };
    var p = function (e) {
        alert(e)
    };
    var d = function () {
        e(this).val("")
    };
    var v = function () {
        r.find('input[type="image"]').each(function (t, n) {
            e(this).toggleClass("disabled");
            e(this).prop("disabled", e(this).hasClass("disabled"))
        })
    };
    return {
        initialise: function () {
            i();
            u("#game-registration")
        }
    }
}(jQuery);

var enter_code_form = '';

var Application = window.Application || {};
Application.onpack = function (e) {
    "use strict";
    var t;
    var n;
    var r;
    var i;
    var s;
    var o = function () {
        e("a.prizepopup").on("click", a)
    };
    var u = function (t) {
        n = e(t);
        e("#enter-lucky-code").on("click", {
            ele: n
        }, f);
        i = n.find("form");
        i.on("submit", p);
        e("input[name*=code]").on("keyup", h)
    };
    var a = function (n) {
        n.preventDefault();
        t = e(this);
        c()
    };
    var f = function (t) {
        if(enter_code_form == ''){
        	enter_code_form = t.data.ele.html();
        }else{
        	t.data.ele.html(enter_code_form);
            e("input[name*=code]").on("keyup", h)
            e("#onpack-promotion-enter").on("submit", p);
        }
        t.preventDefault();
        t.data.ele.show();
        e(".modal-close").on("click", b);
        y(true);
    };
    var l = function (t) {
        t.preventDefault();
        console.log(e(this).parent(".modal-box"));
        e(this).parents(".modal-box").hide();
        e("#enter-lucky-code").trigger("click")
    };
    var c = function () {
        e("#prize-info").remove();
        y(true);
        e.ajax({
            url: t.attr("href")
        }).done(g)
    };
    var h = function (t) {
        var n = new Array(20, 9, 16, 8, 46);
        var r = jQuery.inArray(t.which, n);
        if (r == -1) {
            if (e(this).next("input[name*=code]").length) {
                e(this).next().focus().select()
            }
        }
    };
    var p = function (t) {
        t.preventDefault();
        if (!e("#onpack-promotion input#form-terms").is(":checked")) {
            e("#lucky-code-error").html("Please accept the Terms and Conditions");
            $("#redeem-loading-div").hide();
            $("#redeem-submit").show();
            return false
        }
        e("#lucky-code-error").html("");
        $("#redeem-submit").hide();
        $("#redeem-loading-div").show();
        
        e.getJSON($('#onpack-promotion-enter').attr("action"), $('#onpack-promotion-enter').serialize()).done(function (t) {
            e("#loading-div").hide();
            if (t.status == "error") {
                e("#lucky-code-error").html(t.message);
                $("#redeem-loading-div").hide();
                $("#redeem-submit").show();
                
            } else if (t.status == "success") {
                /*if (!window.location.origin) window.location.origin = window.location.protocol + "//" + window.location.host;
                window.location = window.location.origin + t.redirect*/
                codeResult(t.redirect);
            } else {
                e("#lucky-code-error").html("Error occured, please try again later.");
                $("#redeem-loading-div").hide();
                $("#redeem-submit").show();
            }
        })
    };
    var d = function (t) {
        r = e(t);
        r.on("submit", v)
    };
    var v = function (t) {
        t.preventDefault();
        e("#redeem-error").html("");
        e("#loading-div").show();
        e.getJSON(r.attr("action"), r.serialize()).done(function (t) {
            e("#loading-div").hide();
            if (t.status == "error") {
                e("#redeem-error").html(t.message)
            } else if (t.status == "success") {
                window.location = window.location.origin + t.redirect
            } else {
                e("#redeem-error").html("Error occured, please try again later.")
            }
        })
    };
    var m = function (t) {
        H5F.setup(e(t))
    };
    var g = function (t) {
        e(".modal-wrapper").append(t);
        e(".modal-close").on("click", b);
        e("#prize-info").show();
        e("a.check-lucky-code").on("click", l)
    };
    var y = function (t) {
        if (t) {
            e(".modal-wrapper").css({
                top: e(window).scrollTop() + 30 + "px"
            });
            e(".modal").show()
        } else {
            e(".modal").hide()
        }
    };
    var b = function (t) {
        t.preventDefault();
        y(false);
        e(this).parent(".modal-box").hide()
    };
    return {
        initialise: function () {
            o();
            u("#onpack-promotion");
            m("#onpack-promotion-enter");
            d("#onpack-customer-details-submission")
        }
    }
}(jQuery);
var Application = window.Application || {};
window.fbAsyncInit = function () {
    FB.init({
        appId: "405317822898820",
        channelUrl: Application.channelUrl,
        status: false,
        xfbml: false
    })
};
jQuery(document).ready(function (e) {
    if (e("body").hasClass("page-template-templatessocial_hub-php")) {
        setTimeout(function () {
            Application.banner.initialise(".page-template-templatessocial_hub-php .banner")
        }, 2e3)
    } else {
        setTimeout(function () {
            Application.banner.initialise(".page-template-templateshome-php .banner")
        }, 2e3)
    }
    Application.carousel.initialise(".home-news-carousel");
    Application.timeline.initialise(".timeline");
    Application.links.initialise();
    Application.forms.initialise();
    Application.tabs.initialise();
    Application.game.initialise();
    Application.onpack.initialise();
    Application.retailer.initialise()
});
$(function () {
    var e = {
        header: "ui-icon-circle-arrow-e",
        activeHeader: "ui-icon-circle-arrow-s"
    };
    $("#acc-container").accordion({
        heightStyle: "content",
        icons: e
    })
})

function codeResult(url){
	
	$("#onpack-promotion").load(url + ' .prize-redeem', function() {
		
        $("#redeem-error").html("");
        $("#redeem-loading-div").hide();
        
        addCloseJS();
        
        $('#onpack-customer-details-submission').submit(function(){
        	
	        $("#redeem-submit").hide();
        	$("#onpack-loading-div").show();
        	$.getJSON($('#onpack-customer-details-submission').attr("action"), $('#onpack-customer-details-submission').serialize()).done(function (data) {
	            if (data.status == "error") {
	                $("#redeem-error").html(data.message);
	            } else if (data.status == "success") {
	            	$("#onpack-promotion").load(data.redirect + ' .final-message', function() {
	            		addCloseJS();
	            	})
	            } else {
	                $("#redeem-error").html("Error occured, please try again later.")
	            }
	        })
	        return false;
        });
        
	});
	return false;
}

function addCloseJS(){
    $(".modal-close").click(function(){
        $(".modal").hide();
    });
}