/*************************
jquery.Timeline
*************************/

jQuery(document).ready(function(e) {
    var t = e(".cd-horizontal-timeline"),
        n = 75;

    function r(e, t, i) {
        var r = d(e.eventsWrapper),
            a = Number(e.timelineWrapper.css("width").replace("px", ""));
        "next" == i ? s(e, r - a + n, a - t) : s(e, r + a - n)
    }

    function a(e, t, n) {
        var i = e.eventsContent.find(".selected");
        if (("next" == n ? i.next() : i.prev()).length > 0) {
            var r = e.eventsWrapper.find(".selected"),
                a = "next" == n ? r.parent("li").next("li").children("a") : r.parent("li").prev("li").children("a");
            o(a, e.fillingLine, t), p(a, e.eventsContent), a.addClass("selected"), r.removeClass("selected"), f(a), l(n, a, e)
        }
    }

    function l(e, t, n) {
        var i = window.getComputedStyle(t.get(0), null),
            r = Number(i.getPropertyValue("left").replace("px", "")),
            a = Number(n.timelineWrapper.css("width").replace("px", "")),
            l = Number(n.eventsWrapper.css("width").replace("px", "")),
            o = d(n.eventsWrapper);
        ("next" == e && r > a - o || "prev" == e && r < -o) && s(n, a / 2 - r, a - l)
    }

    function s(e, t, n) {
        t = t > 0 ? 0 : t, v(e.eventsWrapper.get(0), "translateX", (t = void 0 !== n && t < n ? n : t) + "px"), 0 == t ? e.timelineNavigation.find(".prev").addClass("inactive") : e.timelineNavigation.find(".prev").removeClass("inactive"), t == n ? e.timelineNavigation.find(".next").addClass("inactive") : e.timelineNavigation.find(".next").removeClass("inactive")
    }

    function o(e, t, n) {
        var i = window.getComputedStyle(e.get(0), null),
            r = i.getPropertyValue("left"),
            a = i.getPropertyValue("width"),
            l = (r = Number(r.replace("px", "")) + Number(a.replace("px", "")) / 2) / n;
        v(t.get(0), "scaleX", l)
    }

    function p(e, t) {
        var n = e.data("date"),
            i = t.find(".selected"),
            r = t.find('[data-date="' + n + '"]'),
            a = r.height();
        if (r.index() > i.index()) var l = "selected enter-right",
            s = "leave-left";
        else l = "selected enter-left", s = "leave-right";
        r.attr("class", l), i.attr("class", s).one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
            i.removeClass("leave-right leave-left"), r.removeClass("enter-left enter-right")
        }), t.css("height", a + "px")
    }

    function f(e) {
        e.parent("li").prevAll("li").children("a").addClass("older-event").end().end().nextAll("li").children("a").removeClass("older-event")
    }

    function d(e) {
        var t = window.getComputedStyle(e.get(0), null);
        if ((n = t.getPropertyValue("-webkit-transform") || t.getPropertyValue("-moz-transform") || t.getPropertyValue("-ms-transform") || t.getPropertyValue("-o-transform") || t.getPropertyValue("transform")).indexOf("(") >= 0) var n, i = (n = (n = (n = n.split("(")[1]).split(")")[0]).split(","))[4];
        else i = 0;
        return Number(i)
    }

    function v(e, t, n) {
        e.style["-webkit-transform"] = t + "(" + n + ")", e.style["-moz-transform"] = t + "(" + n + ")", e.style["-ms-transform"] = t + "(" + n + ")", e.style["-o-transform"] = t + "(" + n + ")", e.style.transform = t + "(" + n + ")"
    }

    function c(e, t) {
        return Math.round(t - e)
    }

    function u(e) {
        for (var t = e.offsetTop, n = e.offsetLeft, i = e.offsetWidth, r = e.offsetHeight; e.offsetParent;) t += (e = e.offsetParent).offsetTop, n += e.offsetLeft;
        return t < window.pageYOffset + window.innerHeight && n < window.pageXOffset + window.innerWidth && t + r > window.pageYOffset && n + i > window.pageXOffset
    }

    function m() {
        return window.getComputedStyle(document.querySelector(".cd-horizontal-timeline"), "::before").getPropertyValue("content").replace(/'/g, "").replace(/"/g, "")
    }
    t.length > 0 && function(t) {
        t.each(function() {
            var t, s, d = e(this),
                v = {};
            v.timelineWrapper = d.find(".events-wrapper"), v.eventsWrapper = v.timelineWrapper.children(".events"), v.fillingLine = v.eventsWrapper.children(".filling-line"), v.timelineEvents = v.eventsWrapper.find("a"), v.timelineDates = (t = v.timelineEvents, s = [], t.each(function() {
                    var t = e(this).data("date").split("T");
                    if (t.length > 1) var n = t[0].split("/"),
                        i = t[1].split(":");
                    else t[0].indexOf(":") >= 0 ? (n = ["2000", "0", "0"], i = t[0].split(":")) : (n = t[0].split("/"), i = ["0", "0"]);
                    var r = new Date(n[2], n[1] - 1, n[0], i[0], i[1]);
                    s.push(r)
                }), s), v.eventsMinLapse = function(e) {
                    var t = [];
                    for (i = 1; i < e.length; i++) {
                        var n = c(e[i - 1], e[i]);
                        t.push(n)
                    }
                    return Math.min.apply(null, t)
                }(v.timelineDates), v.timelineNavigation = d.find(".cd-timeline-navigation"), v.eventsContent = d.children(".events-content"),
                function(e, t) {
                    for (i = 0; i < e.timelineDates.length; i++) {
                        var n = c(e.timelineDates[0], e.timelineDates[i]),
                            r = Math.round(n / e.eventsMinLapse) + 2;
                        e.timelineEvents.eq(i).css("left", r * t + "px")
                    }
                }(v, n);
            var g = function(e, t) {
                var n = c(e.timelineDates[0], e.timelineDates[e.timelineDates.length - 1]) / e.eventsMinLapse,
                    i = (n = Math.round(n) + 4) * t;
                return e.eventsWrapper.css("width", i + "px"), o(e.eventsWrapper.find("a.selected"), e.fillingLine, i), l("next", e.eventsWrapper.find("a.selected"), e), i
            }(v, n);
            d.addClass("loaded"), v.timelineNavigation.on("click", ".next", function(e) {
                e.preventDefault(), r(v, g, "next")
            }), v.timelineNavigation.on("click", ".prev", function(e) {
                e.preventDefault(), r(v, g, "prev")
            }), v.eventsWrapper.on("click", "a", function(t) {
                t.preventDefault(), v.timelineEvents.removeClass("selected"), e(this).addClass("selected"), f(e(this)), o(e(this), v.fillingLine, g), p(e(this), v.eventsContent)
            }), v.eventsContent.on("swipeleft", function() {
                var e = m();
                "mobile" == e && a(v, g, "next")
            }), v.eventsContent.on("swiperight", function() {
                var e = m();
                "mobile" == e && a(v, g, "prev")
            }), e(document).keyup(function(e) {
                "37" == e.which && u(d.get(0)) ? a(v, g, "prev") : "39" == e.which && u(d.get(0)) && a(v, g, "next")
            })
        })
    }(t)
});