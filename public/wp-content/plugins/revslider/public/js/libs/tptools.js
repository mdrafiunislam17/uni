! function() {
    "use strict";
    if (window._tpt ? ? = {}, _tpt.loadingScripts ? ? = {}, void 0 !== _tpt.checkResources) return;

    function t(t, e) {
        if (0 === t.length) return 0;
        const r = t[t.length - 1] - e;
        return t.length / (r / 1e3)
    }
    var e, r, n;
    _tpt.dpr = Math.max(1, Math.min(2, window.devicePixelRatio || 1)), _tpt.hop = (t, e) => Object.prototype.hasOwnProperty.call(t, e), void 0 !== window.RVS && void 0 !== window.tpGS && (_tpt.gsap = window.tpGS.gsap), _tpt.regResource = function(t) {
        _tpt.R[t.id] ? ? = {}, _tpt.R[t.id].status ? ? = 0, void 0 !== t.url && (_tpt.R[t.id].url = t.url), void 0 !== t.fonts && (_tpt.R[t.id].fonts = t.fonts), void 0 !== t.css && (_tpt.R[t.id].css = t.css), void 0 !== t.fontfamily && (_tpt.R[t.id].fontfamily = t.fontfamily), void 0 !== t.fonticon && (_tpt.R[t.id].fonticon = t.fonticon)
    }, _tpt.checkResources = async function(t, e) {
        const r = [];
        return t.forEach((t => {
            const e = _tpt.R[t];
            void 0 !== e && 2 !== e.status && ("DOM" === t ? (_tpt.R[t].status = 1, r.push(_tpt.waitForDOM(t))) : void 0 !== e.fonticon ? (r.push(_tpt.loadCSS(e.url, t)), e.woff2 && r.push(_tpt.loadWoff2(e.woff2, t))) : void 0 !== e.url ? r.push(_tpt.loadScript(e.url, t, e.test, e.listen)) : e.fonts || e.css && r.push(_tpt.loadCSS(e.css, t)))
        })), e ? await Promise.allSettled(r) : await Promise.all(r)
    }, _tpt.waitForDOM = async function() {
        return new Promise((t => {
            "interactive" === document.readyState || "complete" === document.readyState ? (_tpt.R.DOM.status = 2, t()) : document.addEventListener("DOMContentLoaded", (() => {
                _tpt.R.DOM.status = 2, t()
            }))
        }))
    }, _tpt.loadScript = function(t, e) {
        return new Promise((async (r, n) => {
            _tpt.R[e].status = 1, "string" == typeof t && (t = [t]);
            for (const i of t)
                if (_tpt.loadingScripts[i]) try {
                    if (await _tpt.loadingScripts[i], 2 === _tpt.R[e].status) return void r()
                } catch (t) {
                    console.error(t)
                } else {
                    _tpt.loadingScripts[i] = new Promise(((t, r) => {
                        const n = document.createElement("script");
                        n.src = i, n.onload = () => {
                            _tpt.R[e].status = 2, t()
                        }, n.onerror = () => {
                            _tpt.R[e].status = 3;
                            const t = new Error(`Failed to load script: ${i}`);
                            r(t)
                        }, document.head.appendChild(n)
                    }));
                    try {
                        if (await _tpt.loadingScripts[i], 2 === _tpt.R[e].status) return void r()
                    } catch (t) {
                        return console.error(t), void n(t)
                    }
                }
            n(new Error("Unable to load scripts."))
        }))
    }, _tpt.loadWoff2 = async function(t, e) {
        return _tpt.R[e].status = 1, new Promise(((r, n) => {
            const i = document.createElement("style");
            i.type = "text/css", i.classList.add("sr7-inline-css"), i.textContent = `\n\t\t\t\t@font-face {\n\t\t\t\t\tfont-family: ${_tpt.R[e].fontfamily};\n\t\t\t\t\tsrc: url("${t}") format("woff2");\n\t\t\t\t}\n\t\t\t`, i.onload = () => {
                _tpt.R[e].status = 2, r()
            }, i.onerror = () => {
                _tpt.R[e].status = 3, n(new Error(`Failed to load font: ${t}`))
            }, document.head.appendChild(i)
        }))
    }, _tpt.restAPI = async function(t, e) {
        _tpt.restAPILoad(t).then((e => {
            "function" == typeof t.callBack && t.callBack(e)
        })).catch((r => {
            if (!e) throw r;
            console.log(r), "function" == typeof t.callBack && t.callBack(r)
        }))
    }, _tpt.restApiIdCut = function(t) {
        if (null == t) return;
        const e = (t = t.replace("SR7_", "")).lastIndexOf("_");
        if (-1 === e) return t;
        const r = t.substring(e + 1);
        return Number.isFinite(parseInt(r)) ? t.substring(0, e) : t
    }, _tpt.urlProtocol = function(t, e) {
        return "/" == ("" + t)[0] && "/" == ("" + t)[1] ? (e ? "https:" : window.location.protocol) + t : ("" + t).includes("://") ? (e || t.includes("https") ? "https:" : window.location.protocol) + "//" + t.split("://")[1] : t
    }, _tpt.restAPILoad = async function(t) {
        var e = _tpt.urlProtocol(t.url || window.SR7.E.resturl),
            r = t.method || "GET";
        return e += "get_full_slider_object" == t.action ? "sliderrevolution/sliders/" : "get_stream_data" == t.action ? "sliderrevolution/sliders/stream/" : "get_modal_settings" == t.action ? "sliderrevolution/sliders/modal/" : "", e += (null == t.id ? t.alias ? ? "" : _tpt.restApiIdCut(t.id)) + (e.includes("?") ? "&srengine=" + (6 == t.version ? 6 : 7) : "?srengine=" + (6 == t.version ? 6 : 7)), "get_stream_data" == t.action && SR7.E ? .wpml ? .lang && (e += (e.includes("?") ? "&srlang=" : "?srlang=") + SR7.E.wpml.lang), "get_full_slider_object" == t.action && void 0 !== t.slideid && (e += (e.includes("?") ? "&slideid" : "?slideid") + "=" + t.slideid), t.raw && (e += (e.includes("?") ? "&raw" : "?raw") + "=true"), new Promise(((t, n) => {
            const i = new XMLHttpRequest;
            i.open(r, e, !0), i.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8"), i.setRequestHeader("X-Requested-With", "XMLHttpRequest"), i.onload = () => {
                200 === i.status ? t(i.response) : n(i.statusText)
            }, i.onerror = () => n(i.statusText), i.send()
        }))
    }, _tpt.measureAverageFrameRate = (e, r, n = 30) => new Promise((i => {
        let s = [],
            o = [],
            a = 0;
        const u = performance.now(),
            l = () => {
                if (SR7 ? .M[r] ? .states ? .inViewPort) {
                    if (s.push(performance.now()), s.length % 45 == 0) {
                        let e = t(s.slice(-45), s[s.length - 45]);
                        o.push(e), o.length > 3 && o.shift(), e < n && a++
                    }
                    performance.now() - u < e ? requestAnimationFrame(l) : i({
                        averageFPS: t(s, u),
                        lowFrameRateCount: a
                    })
                } else i({
                    averageFPS: t(s, u),
                    lowFrameRateCount: a
                })
            };
        requestAnimationFrame(l)
    })), _tpt.ajax = async function(t) {
        _tpt.ajaxLoad(t).then((e => {
            "function" == typeof t.callBack && t.callBack(e)
        })).catch((t => {
            throw t
        }))
    }, _tpt.ajaxLoad = async function(t, e = 5) {
        var r = t.url || window.SR7.E.ajaxurl,
            n = t.method || "POST",
            i = {
                action: "get_full_slider_object" == t.action && !0 !== t.backend || "get_stream_data" == t.action || "get_modal_data" == t.action ? "revslider_ajax_call_front" : "rs_ajax_action",
                client_action: t.action,
                data: t.data,
                version: 7,
                nonce: window.SR7.E.backend ? window.SR7.E.nonce : void 0
            };
        return "get_full_slider_object_v7" == t.action && (r += r.includes("?") ? "&srengine=6" : "?srengine=6"), new Promise(((s, o) => {
            const a = new XMLHttpRequest;
            a.open(n, r, !0), a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8"), a.setRequestHeader("X-Requested-With", "XMLHttpRequest"), a.onload = () => {
                200 === a.status ? s(a.response) : o(a.statusText)
            }, a.onerror = () => {
                e > 0 && 0 == a.status ? setTimeout((() => {
                    _tpt.ajaxLoad(t, e - 1).then(s).catch(o)
                }), 750) : o(a.statusText)
            };
            const u = _tpt.objectToParams(i);
            a.send(u)
        }))
    }, _tpt.getSVG = async function(t, e, r) {
        t = (t = (t = _tpt.urlProtocol(t)).replace("/public/assets/assets/svg/", "/public/assets/svg/")).replace("/public/assets/assets/sources/", "/public/assets/sources/"), _tpt.loadSVG(t).then((t => {
            "function" == typeof e && e(t, r)
        })).catch((t => {
            throw t
        }))
    }, _tpt.loadSVG = async function(t) {
        return t = (t = (t = _tpt.urlProtocol(t)).replace("/public/assets/assets/svg/", "/public/assets/svg/")).replace("/public/assets/assets/sources/", "/public/assets/sources/"), new Promise(((e, r) => {
            var n = new XMLHttpRequest;
            n.overrideMimeType("image/svg+xml"), n.open("GET", t, !0), n.onload = () => {
                if (4 == n.readyState && "200" == n.status) {
                    var t = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    t.innerHTML = n.responseText, e(t)
                } else r(n.statusText)
            }, n.send(null)
        }))
    }, _tpt.createNS = t => {
        var e;
        for (e in t.n = document.createElementNS("http://www.w3.org/2000/svg", t.n), t.v) t.n.setAttributeNS(null, e.replace(/[A-Z]/g, (function(t, e, r, n) {
            return "-" + t.toLowerCase()
        })), t.v[e]);
        for (e in void 0 !== t.c && t.n.setAttribute("class", t.c), void 0 !== t.id && (t.n.id = t.id), void 0 !== t.t && (t.n.textContent = t.t), t.s) t.s.hasOwnProperty(e) && (t.n.style[e] = t.s[e]);
        return t.n
    }, _tpt.getJSON = async function(t) {
        _tpt.loadJSON(t).then((e => {
            "function" == typeof t.callBack && t.callBack(e)
        })).catch((t => {
            throw t
        }))
    }, _tpt.loadJSON = async function(t) {
        return new Promise(((e, r) => {
            var n = new XMLHttpRequest;
            n.overrideMimeType("application/json"), n.open("GET", t.url, !0), n.onload = () => {
                4 == n.readyState && "200" == n.status ? e(n.responseText) : r(n.statusText)
            }, n.send(null)
        }))
    }, _tpt.objectToParams = function(t, e = new URLSearchParams, r = "") {
        for (const n in t)
            if (_tpt.hop(t, n)) {
                const i = t[n],
                    s = r ? `${r}[${n}]` : n;
                "object" == typeof i ? _tpt.objectToParams(i, e, s) : e.append(s, i)
            }
        return e.toString()
    }, _tpt.sortPoints = function(t, e) {
        return _tpt.hop(t, "x") ? t.x < e.x ? -1 : t.x > e.x ? 1 : 0 : t.p < e.p ? -1 : t.p > e.p ? 1 : 0
    }, _tpt.isSet = t => "inherit" !== t && null != t, _tpt.lineBreaks = (t, e) => "#srfshcd#" == t.slice(0, 9) ? t.replace("#srfshcd#", "") : "full" == e || "content" == e ? t.split("\n").join("<br>").replace(/\n/g, "<br/>") : t.replace("\n", ""), _tpt.trim = t => null != t && "string" == typeof t ? t.trim() : t, _tpt.iOSVersion = !!(navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i)) && navigator.userAgent.match(/OS 4_\d like Mac OS X/i), _tpt.isiPhone = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream, _tpt.isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && void 0 !== navigator.standalone, _tpt.setIsChrome8889 = navigator.userAgent.indexOf("Chrome/88") >= 0 || navigator.userAgent.indexOf("Chrome/89") >= 0, _tpt.is_mobile = function() {
        var t = ["android", "webos", "iphone", "ipad", "blackberry", "Android", "webos", "iPod", "iPhone", "iPad", "Blackberry", "BlackBerry"],
            e = !1;
        if (void 0 !== window.orientation) e = !0;
        else
            for (var r in t) _tpt.hop(t, r) && (e = !!(e || navigator.userAgent.split(t[r]).length > 1) || e);
        return e && document.body && -1 === document.body.className.indexOf("rs-ISM") && (document.body.className += " rs-ISM"), e
    }(), _tpt.browser = (r = navigator.userAgent, n = r.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [], /trident/i.test(n[1]) ? (e = /\brv[ :]+(\d+)/g.exec(r) || [], "IE") : "Chrome" === n[1] && null != (e = r.match(/\b(OPR|Edge)\/(\d+)/)) ? e[1].replace("OPR", "Opera") : (n = n[2] ? [n[1], n[2]] : [navigator.appName, navigator.appVersion, "-?"], null != (e = r.match(/version\/(\d+)/i)) && n.splice(1, 1, e[1]), n[0])), _tpt.isWebkit = function() {
        const t = /(webkit)[ \/]([\w.]+)/.exec(navigator.userAgent.toLowerCase());
        return t && t[1] && "webkit" === t[1]
    }(), _tpt.browserVersion = function() {
        var t, e = navigator.appName,
            r = navigator.userAgent,
            n = r.match(/(edge|opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        return n && null != (t = r.match(/version\/([\.\d]+)/i)) && (n[2] = t[1]), (n = n ? [n[1], n[2]] : [e, navigator.appVersion, "-?"])[1]
    }(), _tpt.isSafari11 = "safari" === _tpt.trim(_tpt.browser.toLowerCase()) && parseFloat(_tpt.browserVersion) >= 11, _tpt.is_android = function() {
        var t = ["android", "Android"],
            e = !1;
        for (var r in t) _tpt.hop(t, r) && (e = !!(e || navigator.userAgent.split(t[r]).length > 1) || e);
        return e
    }(), _tpt.is_mozilla = navigator.userAgent.includes("Firefox"), _tpt.normalizeWheel = t => {
        let e = 0;
        return "deltaY" in t || "deltaX" in t ? e = 0 != t.deltaY && -0 != t.deltaY || !(t.deltaX < 0 || t.deltaX > 0) ? t.deltaY : t.deltaX : ("detail" in t && (e = t.detail), "wheelDelta" in t && (e = -t.wheelDelta / 120), "wheelDeltaY" in t && (e = -t.wheelDeltaY / 120)), e = _tpt.is_mozilla ? 10 * e : e, (e > 300 || e < -300) && (e /= 10), e
    }, _tpt.extend = function(t, e) {
        for (var r in void 0 === t && (t = {}), e) _tpt.hop(e, r) && ("object" == typeof e[r] && null !== e[r] ? Array.isArray(e[r]) ? t[r] = e[r].slice() : t[r] = _tpt.extend(t[r], e[r]) : t[r] = e[r]);
        return t
    }, _tpt.removeEmptyTags = t => {
        t.forEach((t => {
            "" !== t.innerHTML.trim() && ("" !== t.textContent || 0 != t.children ? .length) || ("" + t.className).includes("sr") || ("" + t.className).includes("rev") || t.remove()
        }))
    }, _tpt.gA = function(t, e, r) {
        return void 0 === t ? void 0 : t.hasAttribute && t.hasAttribute("data-" + e) && void 0 !== t.getAttribute("data-" + e) && null !== t.getAttribute("data-" + e) ? t.getAttribute("data-" + e) : void 0 !== r ? r : void 0
    }, _tpt.sA = function(t, e, r) {
        t && t.setAttribute && t.setAttribute("data-" + e, r)
    }, _tpt.rA = function(t, e) {
        t && t.removeAttribute && t.removeAttribute("data-" + e)
    }, _tpt.posToNum = function(t, e) {
        return ("" + t).includes("%") ? e * parseFloat(t) / 100 : ("" + t).includes("px") ? parseInt(t) : ("" + t).includes("auto") ? 0 : t
    }, _tpt.DNTMtoArr = function(t, e = "auto", r, n) {
        return r ? ? = e, [1 == n ? r : "object" == typeof t ? "object" == typeof t.d ? t.d.v ? ? r : t.d ? ? r : t ? ? r, "object" == typeof t ? "object" == typeof t.d ? t.d.v ? ? e : t.d ? ? e : t ? ? e, "object" == typeof t ? "object" == typeof t.n ? t.n.v ? ? e : t.n ? ? e : t ? ? e, "object" == typeof t ? "object" == typeof t.t ? t.t.v ? ? e : t.t ? ? e : t ? ? e, "object" == typeof t ? "object" == typeof t.m ? t.m.v ? ? e : t.m ? ? e : t ? ? e]
    };
    class i extends Event {
        constructor(t, e) {
            super(t), Object.assign(this, e)
        }
    }

    function s(t, e, r) {
        var n = document.createElement("canvas"),
            i = n.getContext("2d");
        if (n.width = 100, n.height = 200, 0 === t.length) i.fillStyle = r;
        else {
            for (var s = i.createLinearGradient(0, 0, 100, 0), o = 0; o < t.length; o++) s.addColorStop(t[o].stop / 100, t[o].color);
            i.fillStyle = s
        }
        i.fillRect(0, 0, 100, 200);
        var a = i.getImageData(0, 0, 100, 2).data,
            u = "";
        for (o = 0; o < e.length; o++) {
            var l = Math.ceil(e[o]),
                p = 4 * (0 !== l ? l - 1 : l);
            u += "rgba(" + a[p] + "," + a[p + 1] + "," + a[p + 2] + "," + a[p + 3] / 255 + ")", u += " " + l + (e.length - 1 === o ? "%" : "%,")
        }
        return n.remove(), u
    }

    function o(t, e, r, n) {
        for (var i = "", s = _tpt.gsap.utils.mapRange(0, n.length - 1, 0, t.length - 1), o = 0; o < n.length; o++) {
            var a = Math.round(s(o));
            i += t[a].color, i += " " + t[a].stop + (n.length - 1 === o ? "%" : "%,")
        }
        return i
    }

    function a(t) {
        var e = /rgb([\s\S]*?)%/g,
            r = [],
            n = [],
            i = [];
        do {
            (o = e.exec(t)) && r.push(o[0])
        } while (o);
        for (var s = 0; s < r.length; s++) {
            var o = r[s],
                a = (t = /rgb([\s\S]*?)\)/.exec(o), /\)([\s\S]*?)%/.exec(o));
            t[0] && (t = t[0]), a[1] && (a = a[1]), i.push(parseFloat(a)), n.push({
                color: t,
                stop: parseFloat(a)
            })
        }
        return 0 === n.length && (n.push({
            color: t,
            stop: 0
        }), i.push(0), n.push({
            color: t,
            stop: 100
        }), i.push(100)), {
            points: n,
            stops: i
        }
    }
    _tpt.tEvtSimple = t => _tpt.is_mobile ? "mouseenter" == t ? "touchstart" : "mouseleave" == t ? "mouseleave" : "mousemove" == t ? "touchmove" : t : t, _tpt.tEvt = t => Array.isArray(t) ? t.map((t => _tpt.tEvtSimple(t))) : _tpt.tEvtSimple(t), _tpt.event = {
        listeners: {},
        timestamps: {},
        getId: () => Math.random().toString(36).substr(2, 10),
        trigger: (t, e, r = {}) => {
            if ("dom" == t) document.dispatchEvent(new i(e, r));
            else {
                const n = new CustomEvent(e, {
                    detail: r
                });
                t.dispatchEvent(n)
            }
        },
        listen: (t, e, r, n, i) => {
            const s = e.split(" "),
                o = [];
            return s.forEach((e => {
                const s = _tpt.event.getId(),
                    a = t => {
                        void 0 !== _tpt.event.timestamps[t.target.id] && _tpt.event.timestamps[t.target.id] > t.timeStamp || (_tpt.event.timestamps[t.target.id] = t.timeStamp, r(t, n))
                    };
                _tpt.event.listeners[t.id] || (_tpt.event.listeners[t.id] = []), _tpt.event.listeners[t.id].push({
                    id: s,
                    eventType: e,
                    eventListener: a
                }), t.addEventListener(e, a, i ? {
                    passive: !1
                } : {
                    passive: !0
                }), o.push(s)
            })), o
        },
        hasListener: t => void 0 !== _tpt.event.listeners[t.id] && _tpt.event.listeners[t.id].length > 0,
        rm: (t, e) => {
            if (!_tpt.event.listeners[t.id]) return;
            const r = _tpt.event.listeners[t.id].findIndex((t => t.id == e));
            if (-1 === r) return;
            const {
                eventType: n,
                eventListener: i
            } = _tpt.event.listeners[t.id][r];
            return t.removeEventListener(n, i), _tpt.event.listeners[t.id].splice(r, 1), "removed"
        },
        rmAll: t => {
            _tpt.event.listeners[t.id] && (_tpt.event.listeners[t.id].forEach((e => {
                t.removeEventListener(e.eventType, e.eventListener)
            })), delete _tpt.event.listeners[t.id])
        }
    }, _tpt.keyBoard = {
        reg: (t, e, r, n) => {
            _tpt.event.keyboardTargets ? ? = {}, _tpt.event.keyboardTargets[e] || (_tpt.event.keyboardTargets[e] = {
                id: t,
                callback: r,
                keys: n
            }, _tpt.keyBoard.isListening || (_tpt.keyBoard.isListening = !0, _tpt.event.listen(document, "keydown", (function(t, e) {
                if ("INPUT" === document.activeElement.tagName) t.preventDefault();
                else
                    for (let r in _tpt.event.keyboardTargets) _tpt.hop(_tpt.event.keyboardTargets, r) && _tpt.event.keyboardTargets[r].keys.includes(t.key) && _tpt.event.keyboardTargets[r].callback(t, e)
            }), {
                id: t,
                cid: e,
                keys: n
            })))
        },
        rm: t => {
            delete _tpt.event.keyboardTargets[t]
        },
        rmAll: () => {
            _tpt.event.listen.rm(document, "keydown"), delete _tpt.event.keyboardTargets
        }
    }, _tpt.strSetToObj = function(t) {
        if (null == t) return {};
        var e = {};
        return t.split(";").forEach((t => {
            var r = t.split(":");
            void 0 !== r[0] && "" !== r[0] && (e[r[0]] = r[1])
        })), e
    }, _tpt.padMarArr = function(t) {
        let e;
        t = Array.isArray(t) ? t : [t];
        var r = !1;
        for (e = 0; e < t.length; e++) Array.isArray(t[e]) && (r = !0);
        for (r || (t = [t]), t.length < 5 && t.unshift(["auto", "auto", "auto", "auto"]), e = 0; e < 5; e++) t[e] = void 0 === t[e] ? ["auto", "auto", "auto", "auto"] : Array.isArray(t[e]) ? t[e] : [t[e]], 2 == t[e].length ? t[e] = [t[e][0], t[e][1], t[e][0], t[e][1]] : 3 == t[e].length ? t[e] = [t[e][0], t[e][1], t[e][2], t[e][1]] : t[e].length < 4 && (t[e] = _tpt.fillArray(t[e], 4));
        return [...t]
    }, _tpt.explodeData = function(t) {
        t = t.split(";");
        var e, r, n = {};
        for (r in t) void 0 !== (e = t[r].split(":"))[0] && "" !== e[0] && (n[e[0]] = e[1]);
        return n
    }, _tpt.isNumeric = t => !isNaN(parseFloat(t)) && isFinite(t), _tpt.getHighestAttribute = function(t, e, r = 0) {
        if (null == t || null == e) return r;
        for (var n in t) _tpt.hop(t, n) && void 0 !== t[n] && void 0 !== t[n][e] && t[n][e] > r && (r = t[n][e]++);
        return r
    }, _tpt.findIndex = function(t, e, r) {
        if (void 0 !== r) return t.findIndex((t => void 0 !== t && t[e] === r));
        for (let r = 0; r < t.length; r++)
            if ("" + t[r] == "" + e) return r;
        return -1
    }, _tpt.unitize = (t, e = "px") => parseFloat(t) == t ? -1 == e ? t : t + e : -1 == e ? parseInt(t) : t, _tpt.divSize = t => {
        if ("#" == ("" + t)[0]) {
            let e = t.split("#")[1].split("/");
            return 100 / parseInt(e[1]) * e[0] + "%"
        }
        return t
    }, _tpt.mText = (t = "", e = "") => t.trim() + ("" !== t && "" !== e ? " " : "") + e.trim(), _tpt.defNum = (t, e) => null == t || isNaN(parseFloat(t)) ? e : parseFloat(t), _tpt.gradient = {
        SSGCache: [],
        getSSGColors: (t, e, r) => {
            if (r = void 0 === r ? "fading" : r, -1 === t.indexOf("gradient") && -1 === e.indexOf("gradient")) return {
                from: t,
                to: e
            };
            for (var n = {
                    from: t,
                    to: e
                }, i = 0; i < _tpt.gradient.SSGCache.length; i++) {
                if (_tpt.gradient.SSGCache[i].from === t && _tpt.gradient.SSGCache[i].to === e && _tpt.gradient.SSGCache[i].type === r) return {
                    from: _tpt.gradient.SSGCache[i].rFrom,
                    to: _tpt.gradient.SSGCache[i].rTo
                };
                if (_tpt.gradient.SSGCache[i].from === e && _tpt.gradient.SSGCache[i].to === t && _tpt.gradient.SSGCache[i].type === r) return {
                    from: _tpt.gradient.SSGCache[i].rTo,
                    to: _tpt.gradient.SSGCache[i].rFrom
                }
            }
            var u = a(t),
                l = a(e);
            if (u.stops.length === l.stops.length && -1 !== t.indexOf("gradient") && -1 !== e.indexOf("gradient")) return {
                from: t,
                to: e
            };
            var p, c, h = u.stops;
            for (i = 0; i < l.stops.length; i++) - 1 === h.indexOf(l.stops[i]) && h.push(l.stops[i]);
            if (h.sort((function(t, e) {
                    return t - e
                })), -1 !== t.indexOf("gradient(")) {
                var f = -1 !== t.indexOf("deg,") ? t.indexOf("deg,") + 4 : -1 !== t.indexOf("at center,") ? t.indexOf("at center,") + 10 : t.indexOf("gradient(") + 9;
                p = t.substring(0, f), -1 === e.indexOf("gradient(") && (c = t.substring(0, f))
            }
            if (-1 !== e.indexOf("gradient(")) {
                f = -1 !== e.indexOf("deg,") ? e.indexOf("deg,") + 4 : -1 !== e.indexOf("at center,") ? e.indexOf("at center,") + 10 : e.indexOf("gradient(") + 9;
                c = e.substring(0, f), -1 === t.indexOf("gradient(") && (p = e.substring(0, f))
            }
            return "fading" === r ? (u.stops.length, l.stops.length, p += s(u.points, h, t), c += s(l.points, h, e)) : "sliding" === r && (u.stops.length > l.stops.length ? c += o(l.points, 0, 0, u.points) : p += o(u.points, 0, 0, l.points)), p += ")", c += ")", "sliding" === r && (u.stops.length > l.stops.length ? p = t : c = e), n.rFrom = p, n.rTo = c, n.tyep = r, _tpt.gradient.SSGCache.push(n), {
                from: p,
                to: c
            }
        },
        getSVGReference: t => {
            if (void 0 === t) return t;
            let e = _tpt.gradient.process(_tpt.gradient.convert(t));
            if ("solid" == e.type) return e.string;
            if (void 0 === _tpt.gradient.SVG) _tpt.gradient.SVG = _tpt.createNS({
                n: "svg",
                id: "tp_svg_gradients",
                s: {
                    width: "100%",
                    height: "100%",
                    opacity: 0,
                    pointerEvents: "none"
                }
            }), _tpt.gradient.SVG.style.visibility = "hidden", _tpt.gradient.SVG.style.position = "absolute", _tpt.gradient.SVG.style.top = "0px", _tpt.gradient.SVG.style.left = "0px", _tpt.gradient.SVG.style.width = "0px", _tpt.gradient.SVG.style.height = "0px", _tpt.gradient.SVG.style.pointerEvents = "none", _tpt.gradient.SVG.setAttribute("viewBox", "0 0 1 1"), _tpt.gradient.SVG.setAttribute("preserveAspectRatio", "none"), document.body.appendChild(_tpt.gradient.SVG), _tpt.gradient.svgReferences = {}, _tpt.gradient.svgNode = {}, _tpt.gradient.svgRefIndex = 0;
            else if (_tpt.gradient.svgReferences[e.string]) return _tpt.gradient.svgReferences[e.string];
            let r = "radial" === e.type ? 0 : e.angle * _tpt.DEG2RAD,
                n = _tpt.createNS({
                    id: `tp_svg_gradient_${_tpt.gradient.svgRefIndex}`,
                    n: `${e.type}Gradient`,
                    v: "radial" === e.type ? void 0 : {
                        gradientUnits: "userSpaceOnUse",
                        x1: `${Math.round(50+50*Math.sin(r))}%`,
                        y1: `${Math.round(50+50*Math.cos(r))}%`,
                        x2: `${Math.round(50+50*Math.sin(r+Math.PI))}%`,
                        y2: `${Math.round(50+50*Math.cos(r+Math.PI))}%`
                    }
                });
            for (const t of e.colors) {
                const [e, r, i, s] = _tpt.gsap.utils.splitColor(t.rgba);
                n.appendChild(_tpt.createNS({
                    n: "stop",
                    v: {
                        offset: `${t.p}%`,
                        stopColor: _tpt.getHexColor([e, r, i]),
                        stopOpacity: s ? ? 1
                    }
                }))
            }
            return _tpt.gradient.SVG.appendChild(n), _tpt.gradient.svgReferences[e.string] = "url(#tp_svg_gradient_" + _tpt.gradient.svgRefIndex + ")", _tpt.gradient.svgNode[_tpt.gradient.svgRefIndex] = n, _tpt.gradient.svgRefIndex++, _tpt.gradient.svgReferences[e.string]
        },
        getSVGDef: (t = "") => {
            let e = t.replace("url(#tp_svg_gradient_", "").replace(")", "");
            return _tpt.gradient.svgNode[e] ? ? ""
        },
        getColorStops: (t, e) => {
            if (!t.includes("gradient")) return e ? [] : t;
            const r = /(rgba?\((\d+),\s*(\d+),\s*(\d+)(,\s*([\d.]+))?\)|#[0-9a-fA-F]{6})(\s*(\d+%)|)/gi,
                n = t.match(/(linear|radial)-gradient\(([^,]+),/),
                i = n && n[1] ? `${n[1]}` : null;
            let s = null;
            if ("linear" === i) {
                const t = n[2].trim();
                switch (t) {
                    case "right":
                        s = 270;
                        break;
                    case "left":
                        s = 90;
                        break;
                    case "top":
                        s = 0;
                        break;
                    case "bottom":
                        s = 180;
                        break;
                    default:
                        s = parseInt(t) || 180
                }
            }
            let o, a, u = [],
                l = null;
            for (; null !== (a = r.exec(t));) {
                const t = a[1].startsWith("#") ? a[1] : null;
                let e = a[7] ? parseInt(a[7]) : null;
                const r = t ? _tpt.gradient.hexToRgba(t) : `rgba(${a[2]},${a[3]},${a[4]},${a[6]||"1"})`;
                r === l && e === o || (u.push({
                    rgba: r,
                    p: e
                }), o = e, l = r), u.some((t => null === t.p)) && u.forEach(((t, e) => {
                    null === t.p && (t.p = 100 / (u.length - 1) * e || 0)
                }))
            }
            return {
                colors: u,
                type: i,
                angle: s
            }
        },
        hexToRgba: t => `rgba(${parseInt(t.substring(1,3),16)},${parseInt(t.substring(3,5),16)},${parseInt(t.substring(5,7),16)},1)`,
        convert: t => {
            let e = {};
            if (null == t) return t;
            if ("string" == typeof t) {
                if ("transparent" == t) return {
                    orig: "transparent",
                    type: "solid",
                    string: "transparent"
                };
                if (t.includes("&") || t.includes("{") && t.includes('"'))
                    if (e = JSON.parse(t.replaceAll("&", '"')), e.orig ? ? = { ...e.colors
                        }, delete e.colors, "string" == typeof e.orig) {
                        if (e.orig.includes("grad")) {
                            let {
                                angle: t,
                                colors: r,
                                type: n
                            } = _tpt.gradient.getColorStops(e.orig, !0);
                            e.orig = r, e.angle = t, e.type = n
                        }
                    } else {
                        Array.isArray(e.orig) || "object" != typeof e.orig || (e.orig = Object.values(e.orig));
                        for (let t in e.orig) e.orig[t] = {
                            rgba: e.orig[t] ? .rgba ? ? e.orig[t] ? .rgbaColor ? ? `rgba(${e.orig[t]?.r??0}, ${e.orig[t]?.g??0}, ${e.orig[t]?.b??0}, ${e.orig[t]?.a??0})`,
                            p: e.orig[t] ? .p ? ? e.orig[t] ? .position ? ? 0,
                            align: e.orig[t] ? .align ? ? void 0
                        }
                    }
                else {
                    if (!t.includes("gradient")) return t.includes("{") && t.includes('"') && t.includes("orig") && (t = JSON.parse(t).orig), {
                        type: "solid",
                        orig: t,
                        string: _tpt.gradient.getString({
                            type: "solid",
                            orig: t
                        })
                    }; {
                        let {
                            angle: r,
                            colors: n,
                            type: i
                        } = _tpt.gradient.getColorStops(t, !0);
                        e = {
                            orig: n,
                            type: i,
                            angle: r,
                            strength: 100,
                            easing: "none"
                        }
                    }
                }
            } else "object" == typeof t && (e = { ...t
            }, e.orig ? ? = { ...e.colors
            }, delete e.colors);
            return e.angle = 180 === e.angle || void 0 === e.angle ? 180.1 : e.angle, e.strength = e.strength || 100, e.easing = e.easing || "none", e.string = _tpt.gradient.getString(e), Array.isArray(e.orig) || "object" != typeof e.orig || (e.orig = Object.values(e.orig), e.orig = u(e.orig)), e
        },
        getString: (t, e = !1) => {
            if ("string" == typeof t.orig) {
                if ("transparent" == t.orig) return "transparent";
                const e = window[null == window._tpt ? .gsap ? "tpGS" : "_tpt"].gsap.utils.splitColor(t.orig) || [0, 0, 0, 1];
                return `rgba(${e[0]}, ${e[1]}, ${e[2]}, ${e[3]??1})`
            }
            let r = t.colors || t.orig;
            const n = e && (180 == t.angle || 180.1 == t.angle);
            let i, s, o, a = "";
            return "linear" === t.type ? a += "linear-gradient(" + (n ? "" : t.angle + "deg") : "radial" === t.type && (a += "radial-gradient(circle"), a += r.map(((t, r) => (t.rgba = _tpt.gradient.toRGBA(t.rgba), e && void 0 !== o && t.rgba == o.rgba && o.p == t.p ? "" : (o = {
                p: t.p,
                rgba: t.rgba
            }, s = `${0===r&&n?"":","}${t.rgba} ${t.p}%`, s !== i ? i = s : s = "", s)))).join(""), a += ")", a
        },
        process: (t, e) => ("object" != typeof t || (void 0 !== t.easing && "none" !== t.easing && (t.colors = _tpt.gradient.ease(t), t.string = _tpt.gradient.getString(t), e = !1), t.colors ? ? = t.orig, Array.isArray(t.colors) || "object" != typeof t.colors || (t.colors = Object.values(t.colors)), t.string = e || null == t.string ? _tpt.gradient.getString(t) : t.string), t),
        ease: t => {
            let {
                strength: e,
                orig: r,
                easing: n
            } = t;
            if (e = .01 * parseInt(e, 10) * 15, n = t.easing.split("."), n.length < 2) return { ...t.orig
            };
            if (r.sort(_tpt.sortPoints), n = _tpt.gradient.easing[n[0]][n[1]], null == n) return { ...t.orig
            };
            let i = r.length - 1,
                s = [];
            for (let t = 0; t < i; t++) s[s.length] = r[t], _tpt.gradient.insertPoints(r[t], r[t + 1], s, n, e);
            return s[s.length] = r[i], s
        },
        calcPoints: (t, e, r) => {
            const n = r * Math.PI / 180 * -1,
                i = e / 2,
                s = t / 2,
                o = {
                    k: {
                        x: s - Math.tan(n) * i,
                        y: 0
                    },
                    j: {
                        x: s + Math.tan(n) * (e - i),
                        y: e
                    },
                    ky: {
                        x: t,
                        y: i + (t - s) / Math.tan(n)
                    },
                    jy: {
                        x: 0,
                        y: i - s / Math.tan(n)
                    }
                };
            let a = {},
                u = {};
            return [
                [o.k.x, o.j.x, o.k, o.j],
                [o.ky.y, o.jy.y, o.ky, o.jy],
                [o.k.x, o.ky.y, o.k, o.ky],
                [o.ky.y, o.j.x, o.ky, o.j],
                [o.j.x, o.jy.y, o.j, o.jy],
                [o.k.x, o.jy.y, o.k, o.jy]
            ].forEach((([r, n, i, s]) => {
                _tpt.inBounds(r, 0, t) && _tpt.inBounds(n, 0, e) && (a = i, u = s)
            })), r > 90 && r < 315 ? {
                tx: a.x,
                ty: a.y,
                bx: u.x,
                by: u.y
            } : {
                tx: u.x,
                ty: u.y,
                bx: a.x,
                by: a.y
            }
        },
        getLinear: (t, e, r, n) => {
            n = n * _tpt.DEG2RAD + Math.PI / 2;
            for (var i, s, o, a, u = e / 2, p = r / 2, h = Math.sqrt(u * u + p * p), f = {
                    x1: Math.cos(n) * h + u,
                    y1: Math.sin(n) * h + p,
                    x2: u,
                    y2: p
                }, d = [l({
                    x: 0,
                    y: 0
                }, n), l({
                    x: e,
                    y: 0
                }, n), l({
                    x: e,
                    y: r
                }, n), l({
                    x: 0,
                    y: r
                }, n)], g = [], _ = 0; _ < d.length; _++) g.push(c(d[_], f));
            if (SR7.F.dist(u, p, g[0].x, g[0].y) > SR7.F.dist(u, p, g[1].x, g[1].y) ? (i = g[0].x, s = g[0].y) : (i = g[1].x, s = g[1].y), SR7.F.dist(u, p, g[2].x, g[2].y) > SR7.F.dist(u, p, g[3].x, g[3].y) ? (o = g[2].x, a = g[2].y) : (o = g[3].x, a = g[3].y), Math.round(100 * Math.atan2(p - s, u - i)) / 100 === Math.round(n % (2 * Math.PI) * 100) / 100) {
                var m = i,
                    D = s;
                i = o, s = a, o = m, a = D
            }
            return t.createLinearGradient(Math.round(i), Math.round(s), Math.round(o), Math.round(a))
        },
        insertPoints: (t, e, r, n, i) => {
            let s = _tpt.gradient.RGBAToObj(t),
                o = _tpt.gradient.RGBAToObj(e);
            var a = t.p,
                u = e.p;
            if (!(a > u)) {
                for (var l, p, c, h = [], f = 0; f < i; f++)(p = parseFloat(n(f, 0, 1, i).toFixed(2)) * (u - a) + a) > a && p < u && (h[h.length] = p);
                var d, g, _ = h.length,
                    m = parseFloat(((u - a) / (_ + 1)).toFixed(2)),
                    D = parseFloat(m + a);
                for (f = 0; f < _; f++)(c = h[f]) !== t.p && (d = _tpt.sanitizeAlpha(s.a), g = _tpt.sanitizeAlpha(o.a), l = {
                    p: D,
                    rgba: _tpt.gradient.toRGBA({
                        r: s.r !== o.r ? Math.round(_tpt.distColor(c, a, u, s.r, o.r)) : s.r,
                        g: s.g !== o.g ? Math.round(_tpt.distColor(c, a, u, s.g, o.g)) : s.g,
                        b: s.b !== o.b ? Math.round(_tpt.distColor(c, a, u, s.b, o.b)) : s.b,
                        a: d !== g ? _tpt.sanitizeAlpha(_tpt.distAlpha(c, a, u, s.a, o.a)) : d
                    })
                }, D += m, D = parseFloat(D.toFixed(2)), r[r.length] = l)
            }
        },
        transToColor: t => {
            if (null == t) return;
            if (String(t).indexOf("gradient") >= 0) return t;
            let e = _tpt.gradient.toRGBA(t).replace("rgb(", "rgba(").split(",");
            return e[0] + "," + e[1] + "," + e[2].replace(")", "") + ",0)"
        },
        RGBAToObj: t => {
            if ("object" == typeof t) {
                if (void 0 !== t.r) return { ...t
                };
                if (void 0 !== t.rgba) return p(t.rgba)
            } else if ("string" == typeof t) return p(t)
        },
        toRGBA: t => {
            if ("object" == typeof t) return void 0 !== t.rgba && "string" == typeof t.rgba ? t.rgba : "rgba(" + t.r + "," + t.g + "," + t.b + "," + (t.a ? ? 1) + ")";
            var e = window[null == _tpt.gsap ? "tpGS" : "_tpt"].gsap.utils.splitColor(t);
            return "rgba(" + e[0] + "," + e[1] + "," + e[2] + "," + (e[3] ? ? 1) + ")"
        },
        easing: {
            quint: {
                easeout: function(t, e, r, n) {
                    return r * ((t = t / n - 1) * t * t * t * t + 1) + e
                },
                easein: function(t, e, r, n) {
                    return r * (t /= n) * t * t * t * t + e
                },
                easeinout: function(t, e, r, n) {
                    return (t /= n / 2) < 1 ? r / 2 * t * t * t * t * t + e : r / 2 * ((t -= 2) * t * t * t * t + 2) + e
                }
            },
            quad: {
                easein: function(t, e, r, n) {
                    return r * (t /= n) * t + e
                },
                easeout: function(t, e, r, n) {
                    return -r * (t /= n) * (t - 2) + e
                },
                easeinout: function(t, e, r, n) {
                    return (t /= n / 2) < 1 ? r / 2 * t * t + e : -r / 2 * (--t * (t - 2) - 1) + e
                }
            },
            quart: {
                easein: function(t, e, r, n) {
                    return r * (t /= n) * t * t * t + e
                },
                easeout: function(t, e, r, n) {
                    return -r * ((t = t / n - 1) * t * t * t - 1) + e
                },
                easeinout: function(t, e, r, n) {
                    return (t /= n / 2) < 1 ? r / 2 * t * t * t * t + e : -r / 2 * ((t -= 2) * t * t * t - 2) + e
                }
            },
            cubic: {
                easein: function(t, e, r, n) {
                    return r * (t /= n) * t * t + e
                },
                easeout: function(t, e, r, n) {
                    return r * ((t = t / n - 1) * t * t + 1) + e
                },
                easeinout: function(t, e, r, n) {
                    return (t /= n / 2) < 1 ? r / 2 * t * t * t + e : r / 2 * ((t -= 2) * t * t + 2) + e
                }
            },
            circ: {
                easein: function(t, e, r, n) {
                    return -r * (Math.sqrt(1 - (t /= n) * t) - 1) + e
                },
                easeout: function(t, e, r, n) {
                    return r * Math.sqrt(1 - (t = t / n - 1) * t) + e
                },
                easeinout: function(t, e, r, n) {
                    return (t /= n / 2) < 1 ? -r / 2 * (Math.sqrt(1 - t * t) - 1) + e : r / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + e
                }
            },
            sine: {
                easein: function(t, e, r, n) {
                    return -r * Math.cos(t / n * (Math.PI / 2)) + r + e
                },
                easeout: function(t, e, r, n) {
                    return r * Math.sin(t / n * (Math.PI / 2)) + e
                },
                easeinout: function(t, e, r, n) {
                    return -r / 2 * (Math.cos(Math.PI * t / n) - 1) + e
                }
            },
            expo: {
                easein: function(t, e, r, n) {
                    return 0 === t ? e : r * Math.pow(2, 10 * (t / n - 1)) + e
                },
                easeout: function(t, e, r, n) {
                    return t === n ? e + r : r * (1 - Math.pow(2, -10 * t / n)) + e
                },
                easeinout: function(t, e, r, n) {
                    return 0 === t ? e : t === n ? e + r : (t /= n / 2) < 1 ? r / 2 * Math.pow(2, 10 * (t - 1)) + e : r / 2 * (2 - Math.pow(2, -10 * --t)) + e
                }
            },
            bounce: {
                easeout: function(t, e, r, n) {
                    return (t /= n) < 1 / 2.75 ? r * (7.5625 * t * t) + e : t < 2 / 2.75 ? r * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + e : t < 2.5 / 2.75 ? r * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + e : r * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + e
                },
                easein: function(t, e, r, n) {
                    return r - RSColor.easing.bounce.easeout(n - t, 0, r, n) + e
                },
                easeinout: function(t, e, r, n) {
                    return t < n / 2 ? .5 * RSColor.easing.bounce.easein(2 * t, 0, r, n) + e : .5 * RSColor.easing.bounce.easeout(2 * t - n, 0, r, n) + .5 * r + e
                }
            }
        }
    }, window.tpGS && null == window.tpGS ? .getSSGColors && (window.tpGS.getSSGColors = _tpt.gradient.getSSGColors);
    const u = t => t.filter(((e, r) => r === t.length - 1 || (e.rgba !== t[r + 1].rgba || e.p !== t[r + 1].p))),
        l = (t, e) => {
            var r = e + Math.PI / 2;
            return {
                x1: t.x,
                y1: t.y,
                x2: t.x + 100 * Math.cos(r),
                y2: t.y + 100 * Math.sin(r)
            }
        },
        p = t => {
            let e = _tpt.gsap.utils.splitColor(t);
            return {
                r: e[0],
                g: e[1],
                b: e[2],
                a: e[3] ? ? 1
            }
        };

    function c(t, e) {
        var r = t.y2 - t.y1,
            n = t.x1 - t.x2,
            i = r * t.x1 + n * t.y1,
            s = e.y2 - e.y1,
            o = e.x1 - e.x2,
            a = s * e.x1 + o * e.y1,
            u = r * o - s * n;
        return 0 !== u && {
            x: Math.round((o * i - n * a) / u * 100) / 100,
            y: Math.round((r * a - s * i) / u * 100) / 100
        }
    }
    _tpt.distAlpha = (t, e, r, n, i) => Math.max(Math.min(Math.abs(parseFloat(((t - e) / (r - e) * (i - n)).toFixed(2)) + parseFloat(n)), 1), 0), _tpt.distColor = (t, e, r, n, i) => Math.max(Math.min(Math.round(Math.abs((t - e) / (r - e) * (i - n) + n)), 255), 0), _tpt.sanitizeAlpha = t => parseFloat(Math.max(Math.min(parseFloat(t), 1), 0).toFixed(2).replace(/\.?0*$/, "")), _tpt.inBounds = (t, e, r) => t >= e && t <= r, _tpt.parseColor = (t, e) => ((t = _tpt.gsap.utils.splitColor(t)).length <= 3 && (t[3] = 1), e ? t : t.map(((t, e) => e < 3 ? t / 255 : t))), _tpt.getHexColor = t => `#${t.slice(0,3).map((t=>`00${t.toString(16)}`.slice(-2))).join("")}`, _tpt.checkFontLoaded = function(t, e = "normal", r = "normal", n) {
        return new Promise(((i, s) => {
            _tpt.ongoingTests ? ? = {};
            let o = `${t}-${e}-${r}`;
            _tpt.ongoingTests[o] || (_tpt.ongoingTests[o] = new Promise(((i, s) => {
                if (1 == (_tpt.R ? .fonts ? .[t] ? ? 0)) return void i();
                let o, a = t.includes("Material Icons") || t.includes("FontAwesome"),
                    u = "Material Icons" == t ? "wb_incandescent" : "FontAwesome" == t || "Pe-icon-7-stroke" == t ? "" : "BESbswy",
                    l = document.createElement(a ? "i" : "span"),
                    p = !1,
                    c = () => {
                        p || (clearInterval(o), p = !0)
                    };
                l.style.fontFamily = "sans-serif", l.style.fontWeight = e, l.style.fontStyle = r, l.textContent = u, _tpt.fontTester || (_tpt.fontTester = document.createElement("sr7-fonttest-wrap"), document.body.appendChild(_tpt.fontTester)), _tpt.fontTester.appendChild(l);
                let h = l.offsetWidth,
                    f = l.offsetHeight;
                if (l.style.fontFamily = `'${t}', sans-serif`, "FontAwesome" == t ? l.classList.add("fa-power-off") : "Pe-icon-7-stroke" == t && l.classList.add("pe-7s-album"), h !== l.offsetWidth || f !== l.offsetHeight) return _tpt.R.fonts ? ? = {}, _tpt.R.fonts[t] = 1, c(), void i();
                o = setInterval((() => {
                    l.offsetWidth === h && l.offsetHeight === f || (_tpt.R.fonts ? ? = {}, _tpt.R.fonts[t] = 1, c(), i())
                }), 19), setTimeout((() => {
                    c(), i()
                }), n)
            }))), _tpt.ongoingTests[o].then(i, s)
        }))
    }, _tpt.fontFamily = function(t, e) {
        return null == t ? "none" : e ? t.split(",")[0].replaceAll("+", "-") : t.split(",")[0].replaceAll(" ", "+")
    }, _tpt.registerFont = function(t = {}) {
        _tpt.R.fonts ? ? = {}, _tpt.R.fonts.required ? ? = {};
        var e = _tpt.fontFamily(t.family);
        if (_tpt.R.fonts.required[e] ? ? = {
                name: e,
                orig: t.family,
                italic: {},
                normal: {}
            }, t.link && (_tpt.R.fonts.required[e].link = t.link), t.url && (_tpt.R.fonts.required[e].url ? ? = {
                url: t.url
            }) && (_tpt.R.fonts.required[e].url.state ? ? = 0), void 0 !== t.weight) {
            t.weight = Array.isArray(t.weight) ? t.weight : [t.weight];
            for (var r = 0; r < t.weight.length; r++) "auto" !== t.weight[r] && (_tpt.R.fonts.required[e][t.italic ? "italic" : "normal"][t.weight[r]] ? ? = 0)
        }
    }, _tpt.waitFonts = async function(t, e, r) {
        try {
            let r = [];
            for (let e in t) t.hasOwnProperty(e) && r.push(_tpt.loadFonts(e));
            await Promise.all(r), await new Promise((t => t())), document.body.offsetHeight, "function" == typeof e && e()
        } catch (t) {
            console.log(`Error while waiting for fonts to load: ${t}`)
        }
    }, _tpt.fixGoogleFontNames = function(t) {
        return (t = t.replaceAll("'", "")).split("+").map((function(t) {
            return t.charAt(0).toUpperCase() + t.slice(1)
        })).join("+")
    }, _tpt.capitalize = t => t.charAt(0).toUpperCase() + t.slice(1).toLowerCase(), _tpt.updateFontStatus = function(t) {
        for (let e in _tpt.R.fonts.required)
            if (_tpt.hop(_tpt.R.fonts.required, e))
                for (let r of ["normal", "italic"])
                    for (let n in _tpt.R.fonts.required[e][r]) _tpt.hop(_tpt.R.fonts.required[e][r], n) && _tpt.R.fonts.required[e][r][n] === t && (_tpt.R.fonts.required[e][r][n] = 2)
    }, _tpt.getLoadedFontFaces = function() {
        var t = {};
        for (let e of document.fonts) {
            let r = e.family.replace(/['"]+/g, "");
            t[r] = t[r] || {
                italic: [],
                normal: []
            };
            let n = e.weight,
                i = "italic" === e.style ? "italic" : "normal";
            t[r][i].includes(n) || t[r][i].push(n)
        }
        return t
    }, _tpt.getExistingGoogleFonts = function() {
        for (var t = {}, e = document.getElementsByTagName("link"), r = 0; r < e.length; r++) {
            let n = e[r].href.split("?");
            if (n[0] == (SR7.E.fontBaseUrl ? ? "https://fonts.googleapis.com/css2").replace("?family=", "")) {
                let e = n[1].split("&");
                for (let r in e) {
                    let n = e[r].split("family=");
                    if (null == e[r] || null == e[r] || null == n[1] || null == n[1]) continue;
                    let i = n[1].split(":"),
                        s = n[1].split("@");
                    if (null == i || null == i || null == i[0] || null == i[0]) continue;
                    if (null == s || null == s || null == s[1] || null == s[1]) continue;
                    i = i[0], t[i] ? ? = {
                        italic: [],
                        normal: []
                    };
                    let o = s[1].split(";");
                    for (let e = 0; e < o.length; e++) {
                        let r = o[e].split(","),
                            n = 1 == r[0] || "1" == r[0] || 1 == r[1] || "1" == r[1];
                        for (let e = 0; e < r.length; e++) r[e] > 1 && t[i][n ? "italic" : "normal"].push(parseInt(r[e]))
                    }
                }
            }
        }
        return t = _tpt.extend(t, _tpt.getLoadedFontFaces())
    }, _tpt.isWeightInRange = (t, e) => (t = parseInt(t), e.some((e => {
        if ("string" == typeof e && e.includes(" ")) {
            let [r, n] = e.split(" ").map(Number);
            return t >= r && t <= n
        }
        return t == parseInt(e)
    }))), _tpt.loadFonts = async function(t) {
        if (!window.SR7 ? .E ? .ignoreGoogleFont && null != _tpt.R.fonts) {
            var e, r, n, i, s, o = "",
                a = Math.round(1e3 * Math.random() + 500),
                u = [];
            for (i in _tpt.R.fonts ? ? = {}, _tpt.R.fonts.domFonts ? ? = _tpt.getExistingGoogleFonts(), _tpt.R.fonts.required) {
                if (!_tpt.hop(_tpt.R.fonts.required, i)) continue;
                let t = (e = _tpt.R.fonts.required[i]).name.toLowerCase();
                if (t.includes("arial") || t.includes("palatino+linotype") || t.includes("times+new+roman") || t.includes("georgia") || t.includes("tahoma")) continue;
                let l = i.replaceAll("'", ""),
                    p = _tpt.R ? .fonts ? .customFonts ? .[i] ? ? _tpt.R ? .fonts ? .customFonts ? .[l] ? ? !1;
                if (void 0 !== e.url || p) e.url ? ? = {}, 0 == e.url.state && (p && ("string" == typeof p ? e.url.url = p : e.url = p), u.push({
                    font: i,
                    url: e.url
                })), e.url.state = 1;
                else {
                    for (s of (r = "", ["normal", "italic"]))
                        for (n in e[s])
                            if (_tpt.hop(e[s], n) && 0 == e[s][n]) {
                                e[s][n] = a, n = parseInt(n), e.name = _tpt.fixGoogleFontNames(e.name);
                                let t = e.name.toLowerCase();
                                if (t.includes("arial") || t.includes("palatino+linotype") || t.includes("times+new+roman") || t.includes("georgia") || t.includes("tahoma")) continue;
                                if ("" == e.name) continue;
                                if (_tpt.isWeightInRange(n, _tpt.R ? .fonts ? .domFonts ? .[e.orig] ? .[s] ? ? [])) continue;
                                if (_tpt.isWeightInRange(n, _tpt.R ? .fonts ? .domFonts ? .[e.name] ? .[s] ? ? [])) continue;
                                "" !== r ? r += ";" : r = ("" !== o ? "&" : "") + "family=" + e.name + ":ital,wght@", r += ("normal" == s ? 0 : 1) + "," + n
                            }
                    "" !== r && " " !== r && "&family=:ital,wght@0,400" !== r && (o += r)
                }
            }
            if ("" !== o && " " !== o) {
                o = (o = (SR7.E.fontBaseUrl ? ? "https://fonts.googleapis.com/css2") + "?" + o + "&display=swap").replace("?family=?family=", "?family=");
                var l = document.createElement("link");
                l.rel = "stylesheet", l.href = o, l.onload = function(t, e) {
                    for (i in _tpt.R.fonts.required)
                        if (_tpt.hop(_tpt.R.fonts.required, i))
                            for (s of ["normal", "italic"])
                                for (n in _tpt.R.fonts.required[i][s]) _tpt.hop(_tpt.R.fonts.required[i][s], n) && _tpt.R.fonts.required[i][s][n] === t && (_tpt.R.fonts.required[i][s][n] = 2);
                    "function" == typeof e && e()
                }(a, t), l.onerror = function() {
                    _tpt.skipFontTrys = !0
                }, document.getElementsByTagName("head")[0].appendChild(l)
            } else 0 === u.length && "function" == typeof t && t();
            if (u.length > 0)
                for (let t in u)(u[t].url ? .url ? ? "").endsWith(".css") ? _tpt.loadCSS(u[t].url.url, u[t].font, !0) : (_tpt.R[u[t].font] ? ? = {}, _tpt.loadFontFace(u[t].url.url, u[t].font))
        }
    }, _tpt.compareURL = function(t, e) {
        return !(!t || !e) && (t == e || (t = _tpt.urlProtocol(t), e = _tpt.urlProtocol(e), (t = _tpt.normalizeUrl(t)) == (e = _tpt.normalizeUrl(e))))
    }, _tpt.registerImage = function(t, e = 0, r, n, i, s = !0) {
        t = _tpt.urlProtocol(t), null == _tpt.R.images && (_tpt.R.images ? ? = {}, _tpt.R.images.queue ? ? = {}, _tpt.R.images.all ? ? = Array(5e3), _tpt.R.images.alllen ? ? = 0);
        var o = _tpt.normalizeNURL(_tpt.normalizeUrl(t)),
            a = _tpt.findIndex(_tpt.R.images.all, "nurl", o);
        a = -1 == a ? _tpt.R.images.alllen++ : a, _tpt.R.images.all[a] ? ? = {
            url: t,
            nurl: o,
            nurlshort: o.split("?")[0],
            crossOrigin: s,
            callBacks: {},
            state: "pending",
            params: i
        }, "loaded" == _tpt.R.images.all[a].state || "cached" == _tpt.R.images.all[a].state ? "function" == typeof r && r(_tpt.R.images.all[a]) : (_tpt.R.images.all[a].prio = e, _tpt.R.images.all[a].callBacks[n] = r), clearTimeout(_tpt.R.images.uiqTimer), _tpt.R.images.uiqTimer = setTimeout(_tpt.updateImageQueue, 50)
    }, _tpt.updateImageQueue = function() {
        _tpt.R.images.all.sort(((t, e) => t.prio - e.prio));
        for (var t, e = 0, r = 0; r < 5; r++)
            if (null == _tpt.R.images.queue[r])
                for (t = e; t < _tpt.R.images.alllen; t++)
                    if ("pending" == _tpt.R.images.all[t].state) {
                        _tpt.R.images.queue[r] = t, _tpt.R.images.all[t].state = "inqueue", e = t;
                        break
                    }
        _tpt.processImageQueue()
    }, _tpt.processImageCallbacks = function(t, e) {
        for (var r in _tpt.R.images.all[t].callBacks) _tpt.hop(_tpt.R.images.all[t].callBacks, r) && "function" == typeof _tpt.R.images.all[t].callBacks[r] && _tpt.R.images.all[t].callBacks[r](_tpt.R.images.all[t]);
        _tpt.R.images.queue[e] = void 0, _tpt.updateImageQueue()
    }, _tpt.processImageQueue = function() {
        for (var t = 0; t < 5; t++) void 0 !== _tpt.R.images.queue[t] && "inqueue" == _tpt.R.images.all[_tpt.R.images.queue[t]].state && (_tpt.R.images.all[_tpt.R.images.queue[t]].state = "loading", this.tryLoadImage(_tpt.R.images.queue[t], t))
    }, _tpt.normalizeUrl = function(t) {
        return "/" == (t = t.toLowerCase())[t.length - 1] && (t = t.slice(0, -1)), "http://" == t.slice(0, 7) ? t = t.slice(7) : "https://" == t.slice(0, 8) && (t = t.slice(8)), t
    }, _tpt.normalizeNURL = t => _tpt.normalizeUrl(t).replaceAll("%20", " ").replaceAll("%E2%80%AF", " ").replaceAll("%e2%80%af", " ").replaceAll(" ", "%20").replaceAll(/\s/g, "%20"), _tpt.findRequestedImage = function(t) {
        let e = _tpt.normalizeNURL(_tpt.normalizeUrl(t)),
            r = _tpt.findIndex(_tpt.R.images.all, "nurl", e);
        if (-1 !== r) return r;
        if (r = _tpt.findIndex(_tpt.R.images.all, "nurlshort", e.split("?")[0]), -1 !== r) return r;
        let n = _tpt.normalizeUrl(function() {
            let t = window.location.href;
            return t.substring(0, t.lastIndexOf("/")) + "/"
        }()) + "/";
        if (e = e.replace(n, ""), r = _tpt.findIndex(_tpt.R.images.all, "nurl", e), -1 !== r) return r;
        let i = decodeURIComponent(e);
        return r = _tpt.findIndex(_tpt.R.images.all, "nurl", i), -1 !== r ? r : (e = "./" + e, _tpt.findIndex(_tpt.R.images.all, "nurl", e))
    }, _tpt.tryLoadImage = function(t, e, r = !1) {
        let n = _tpt.R.images.all[t],
            i = r ? !n.crossOrigin : n.crossOrigin;
        _tpt.loadSingleImage(n.url, e, i).then((t => {
            let e = _tpt.findRequestedImage(t.image.src);
            _tpt.R.images.all[e].state = t.status, _tpt.R.images.all[e].image = t.image, _tpt.R.images.all[e].index = e, _tpt.R.images.all[e].width = t.image.width, _tpt.R.images.all[e].height = t.image.height, _tpt.processImageCallbacks(e, t.queueIndex)
        })).catch((n => {
            if (r) {
                var i = _tpt.R.images.queue[e];
                _tpt.R.images.all[i].state = n.status, _tpt.R.images.all[i].index = i, _tpt.processImageCallbacks(i, e), console.log("Image Error: " + _tpt.R.images.all[i].url + " could not be loaded")
            } else this.tryLoadImage(t, e, !0)
        }))
    }, _tpt.allM = function() {
        var t = "";
        for (var e in window.SR7.M) _tpt.hop(window.SR7.M, e) && (t += e + ",");
        return t.slice(0, -1)
    }, _tpt.getMSize = function(t) {
        return delete window.SR7.M[t].c, console.log("Reference C has been deleted for Messuring. Reload Page after !!"), _tpt.getObjectSize(window.SR7.M[t]) + "kb"
    }, _tpt.getObjectSize = function(t) {
        return (new TextEncoder).encode("string" == typeof t ? t : JSON.stringify(t)).length / 1024
    }, _tpt.loadSingleImage = async function(t, e, r = !0) {
        let n = e;
        return new Promise(((e, i) => {
            let s = new Image;
            r && (s.crossOrigin = "anonymous"), s.src = t, s.onload = () => {
                e({
                    image: s,
                    queueIndex: n,
                    status: "loaded"
                })
            }, s.onerror = () => {
                i({
                    url: t,
                    queueIndex: n,
                    status: "error"
                })
            }, s.complete && e({
                image: s,
                queueIndex: n,
                status: "cached"
            })
        }))
    }, _tpt.isImageURL = t => {
        if ("string" != typeof t) return !1;
        const e = t.split(".").pop().toLowerCase();
        return ["jpg", "jpeg", "png", "gif", "bmp", "svg", "webp"].includes(e)
    }, _tpt.getShader = function(t, e, r) {
        return new Promise((async (n, i) => {
            if (_tpt.R.shaders ? ? = {}, _tpt.R.shaders[t] ? ? = {}, _tpt.R.shaders[t][e]) n(_tpt.R.shaders[t][e]);
            else try {
                let s = await fetch(r);
                if (!s.ok) return void i(`HTTP error! Status: ${s.status}`);
                let o = await s.text();
                _tpt.R.shaders[t][e] = o, n(o)
            } catch (t) {
                i(t)
            }
        }))
    }, _tpt.injectCssJs = (t = "", e = "", r, n) => {
        if ("" !== t) {
            let e, r = !1;
            void 0 !== n && (e = document.getElementById(n), r = null != e), r || (e = document.createElement("style"), e.classList.add("sr7-inline-css"), void 0 !== n && (e.id = n)), e.innerHTML = (e.innerHTML ? ? "") + t, r || document.getElementsByTagName("head")[0].appendChild(e)
        }
        if ("" !== e) {
            const t = document.createElement("script");
            t.innerHTML = e, r.appendChild(t)
        }
    }, _tpt.extndArray = (t, e) => (t || (t = []), e || (e = []), Array.isArray(t) || (t = [t]), Array.isArray(e) || (e = [e]), Array.from(new Set(t.concat(e)))), _tpt.extndArrWithObj = (t = [], e = {}, r = "src", n = "") => {
        let i;
        return t.forEach((t => {
            let s = Object.keys(t).filter((t => t !== r && t !== n)),
                o = Object.keys(e).filter((t => t !== r && t !== n));
            if (s.length === o.length) {
                if (s.every((r => t[r] === e[r]))) {
                    let s = _tpt.compareParameters(t[r], e[r]),
                        o = "" == n || _tpt.compareParameters(t[n], e[n]);
                    !s && o ? (t[r] = _tpt.extndArray(e[r], t[r]), i = !0) : "" !== n && s && (t[n] = _tpt.extndArray(e[n], t[n]), i = !0)
                }
            }
        })), i || t.push(e), t
    }, _tpt.tf = t => "false" != t && 0 != t && ("true" == t || 1 == t || t), _tpt.findNested = (t, e, r) => {
        if (null == t) return null;
        if (e in t && (!r || r in t[e])) return t[e];
        for (let n in t)
            if (_tpt.hop(t, n) && "object" == typeof t[n]) {
                let i = _tpt.findNested(t[n], e, r);
                if (i) return i
            }
        return null
    }, _tpt.closest = function(t, e) {
        return t && (e(t) ? t : _tpt.closest(t.parentNode, e))
    }, _tpt.closestNode = function(t, e) {
        return _tpt.closest(t, (function(t) {
            return t.nodeName === e
        }))
    }, _tpt.closestClass = function(t, e) {
        return _tpt.closest(t, (function(t) {
            return (" " + t.className + " ").indexOf(" " + e + " ") >= 0
        }))
    }, _tpt.compareParameters = (t, e) => {
        if (t === e) return !0;
        if (Array.isArray(t) || (t = [t]), Array.isArray(e) || (e = [e]), t.length !== e.length) return !1;
        t.sort(), e.sort();
        for (let r = 0; r < t.length; r++)
            if (t[r] !== e[r]) return !1;
        return !0
    }, _tpt.countSubStr = (t = "", e = "", r = !1) => {
        if (0 === e.length) return t.length + 1;
        let n = 0,
            i = 0;
        const s = r ? 1 : e.length;
        for (; i = t.indexOf(e, i), i >= 0;) n++, i += s;
        return n
    }, _tpt.getRatio = t => {
        if (void 0 === t || 1 === t || "number" == typeof t) return t;
        if ("string" == typeof t && t.includes(":")) {
            const [e, r] = t.split(":");
            return parseFloat(e) / parseFloat(r)
        }
        return 1
    }, _tpt.compareComputedStyles = t => {
        var e = t[0];
        for (var r in e)
            if (e.hasOwnProperty(r)) {
                var n = e[r];
                t.every((function(t) {
                    return t[r] === n
                })) || (console.log("Mismatch property:", r), t.forEach((function(t, e) {
                    console.log("Element", e, "value:", t[r])
                })))
            }
    }, _tpt.cookie = {
        set: (t, e, r) => {
            const n = new Date;
            n.setTime(n.getTime() + 60 * r * 60 * 1e3);
            const i = `expires=${n.toUTCString()}`;
            document.cookie = `${t}=${e};${i};path=/`
        },
        get: t => {
            const e = `${t}=`,
                r = document.cookie.split(";").find((t => t.trim().startsWith(e))),
                n = r ? decodeURIComponent(r.substring(e.length + 1)) : "";
            return "true" === n || "false" !== n && n
        }
    }, _tpt.displayDeprecationWarnings = t => {
        if (t && t.warnings) {
            console.group("Deprecation Alert: Functions listed below are deprecated and will be removed in Version 7.0.0. Please update accordingly.");
            for (const [e, r] of Object.entries(t.warnings)) r ? console.info(`"${e}" is deprecated. Use "${r}" instead.`) : console.info(`"${e}" is deprecated.`);
            console.groupEnd()
        }
    }, _tpt.viewPortObserverManager = {
        observers: {},
        inViewPortObserver: new IntersectionObserver((function(t) {
            t.forEach((t => {
                t.target.observParams && t.target.observParams.obj && (t.target.observParams.obj.states = t.target.observParams.obj.states || {}, t.target.observParams.obj.states.inViewPort = t.isIntersecting)
            }))
        }), {
            rootMargin: "0px"
        }),
        getObserver: function(t = "-100px") {
            if (t = "" == t ? "-100px" : t, t = -1 * parseInt(t) + "px", this.observers[t]) return this.observers[t];
            var e = new IntersectionObserver((function(t) {
                for (var e = 0; e < t.length; e++) {
                    var r = t[e];
                    r.isIntersecting ? (r.target.observParams.obj && (r.target.observParams.obj.states ? ? = {}, r.target.observParams.obj.states.boundingClientRect = r.boundingClientRect, r.target.observParams.obj.states.inViewPort = r.isIntersecting, _tpt.scrollObserver.run(r.target)), void 0 !== r.target.observParams && (void 0 !== r.target.observParams.callBack && r.target.observParams.callBack(r.target, r.intersectionRatio), void 0 !== r.target.observParams.toggleCall && r.target.observParams.toggleCall(r.target.id, r.intersectionRatio), r.target.observParams.runonce && delete r.target.observParams.callBack)) : r.target.observParams && (r.target.observParams.obj.states ? ? = {}, r.target.observParams.obj.states.inViewPort = !!r.target.observParams ? .obj ? .settings ? .fixed || r.isIntersecting, r.target.observParams ? .toggleCall ? .(r.target.id, r.intersectionRatio))
                }
            }), {
                rootMargin: t + " 0px " + t + " 0px"
            });
            return this.observers[t] = e, e
        }
    }, _tpt.observeModule = function(t, e = "-100px") {
        _tpt.viewPortObserverManager.getObserver(e).observe(t)
    }, _tpt.scrollObserver = {
        observe: t => {
            _tpt.scrollObserver.entries || (_tpt.scrollObserver.entries = [], _tpt.is_mobile ? (_tpt.gsap.ticker.fps(150), _tpt.gsap.ticker.add((() => {
                _tpt.scrollObserver.run()
            }))) : document.addEventListener("scroll", (function(t) {
                void 0 === _tpt.scrollObserver.RaF && (_tpt.scrollObserver.RaF = requestAnimationFrame((function() {
                    _tpt.scrollObserver.run()
                })))
            }), {
                passive: !0
            })), -1 == _tpt.scrollObserver.entries.indexOf(t) && _tpt.scrollObserver.entries.push(t), _tpt.scrollObserver.run(t)
        },
        kill: t => {
            _tpt.scrollObserver.entries = _tpt.scrollObserver.entries.filter((e => e !== t))
        },
        run: (t, e) => {
            if (_tpt.scrollObserver.RaF && (_tpt.scrollObserver.RaF = cancelAnimationFrame(_tpt.scrollObserver.RaF)), window.scrollY != _tpt.scrollObserver.y || e)
                if (_tpt.scrollObserver.y = window.scrollY, null == t) {
                    for (let t in _tpt.scrollObserver.entries)
                        if (_tpt.hop(_tpt.scrollObserver.entries, t)) {
                            if (!1 !== (_tpt.scrollObserver ? .entries ? .[t] ? .observSR7Globals ? ? !1))
                                for (let e in _tpt.scrollObserver.entries[t].observSR7Globals) _tpt.hop(_tpt.scrollObserver.entries[t].observSR7Globals, e) && _tpt.scrollObserver.entries[t].observSR7Globals[e].callback(_tpt.scrollObserver.entries[t].observSR7Globals[e].params);
                            0 != (_tpt.scrollObserver ? .entries ? .[t] ? .observParams ? .obj ? .states ? .inViewPort ? ? !1) && _tpt.scrollObserver.process(_tpt.scrollObserver.entries[t])
                        }
                } else if (!1 !== (t ? .observParams ? .obj ? .states ? .inViewPort ? ? !1) && _tpt.scrollObserver.process(t), t.observSR7Globals)
                for (let e in t.observSR7Globals) _tpt.hop(t.observSR7Globals, e) && t.observSR7Globals[e].callback(t.observSR7Globals[e].params)
        },
        process: t => {
            const e = t.observParams.obj;
            let r = "false" !== ("" + e.settings ? .mod ? .use ? ? !1) || "false" !== ("" + e.settings ? .sbt ? .use ? ? !1);
            if (null != e.dims.module && (e.c.moduleListeners ? .scroll || r) && (e.dims.moduleRect = t.getBoundingClientRect(), e.settings)) {
                if (r) {
                    if (delete e.scrollProcSA, e.settings.fixed) e.scrollProc = 1 - Math.min(1, Math.max(0, window.scrollY / _tpt.winH));
                    else {
                        let t = e.dims.moduleRect.height >= _tpt.winH || e.c.module.offsetTop > e.dims.moduleRect.height / 2;
                        e.scrollProcSA = t ? Math.max(-1, Math.min(1, 1 - (e.dims.moduleRect.top - _tpt.winH) / (_tpt.winH + e.dims.moduleRect.height) * -2)) : Math.max(-1, Math.min(1, e.dims.moduleRect.top / (e.dims.moduleRect.height || e.dims.module.h))), (e.settings ? .rOFV ? ? 1) && e.dims.moduleRect.height < _tpt.winH ? e.scrollProc = e.dims.moduleRect.top >= 0 && e.dims.moduleRect.bottom <= _tpt.winH ? 0 : e.dims.moduleRect.top < 0 ? e.dims.moduleRect.top / e.dims.moduleRect.height : (e.dims.moduleRect.bottom - _tpt.winH) / e.dims.moduleRect.height : (t = !1, e.scrollProc = t ? Math.max(-1, Math.min(1, 1 - (e.dims.moduleRect.top - _tpt.winH) / (_tpt.winH + e.dims.moduleRect.height) * -2)) : Math.max(-1, Math.min(1, e.dims.moduleRect.top / (e.dims.moduleRect.height || e.dims.module.h))))
                    }
                    e.scrollProc = e.scrollProc || 0, e.scrollProcSA ? ? = e.scrollProc
                }
                void 0 !== t.observParams.scrollCallback && t.observParams.scrollCallback(t.id)
            }
        }
    }, _tpt.resizeObserver = {
        id: 0,
        targets: {},
        timer: 1e3,
        inited: !1,
        observe: function(t, e, r) {
            return "function" == typeof t && (e ? ? = 100, _tpt.resizeObserver.targets[_tpt.resizeObserver.id++] = {
                callBack: t,
                delay: e,
                id: r
            }, _tpt.resizeObserver.process(), _tpt.resizeObserver.id)
        },
        remove: function(t) {
            delete _tpt.targets[t]
        },
        process: function() {
            1 != _tpt.resizeObserver.observed && (_tpt.resizeObserver.observed = !0, window.addEventListener("resize", (function() {
                _tpt.resizeObserver.execute()
            })))
        },
        execute: function() {
            _tpt.getWinDim(!0);
            var t = new Date;
            for (var e in t - _tpt.resizeObserver.timer >= 1e3 && (_tpt.resizeObserver.timer = t), _tpt.resizeObserver.targets) _tpt.hop(_tpt.resizeObserver.targets, e) && (clearTimeout(_tpt.resizeObserver.targets[e].timer), t - _tpt.resizeObserver.timer >= _tpt.resizeObserver.targets[e].delay ? _tpt.resizeObserver.targets[e].callBack(_tpt.resizeObserver.targets[e].id) : function(t) {
                _tpt.resizeObserver.targets[t].timer = setTimeout((() => {
                    _tpt.resizeObserver.targets[t].callBack(_tpt.resizeObserver.targets[t].id)
                }), _tpt.resizeObserver.targets[t].delay)
            }(e))
        }
    }, _tpt.orientationObserver = {
        id: 0,
        targets: {},
        inited: !1,
        lastZoomLevel: 1,
        checkZoomLevel: () => {
            if ("visualViewport" in window) {
                return window.visualViewport.scale
            }
            return 1
        },
        observe: function(t, e, r) {
            return !(!_tpt.is_mobile || "function" != typeof t) && (_tpt.orientationObserver.targets[_tpt.orientationObserver.id++] = {
                callBack: t,
                delay: e,
                id: r
            }, _tpt.orientationObserver.process(), _tpt.orientationObserver.id)
        },
        remove: function(t) {
            delete _tpt.orientationObserver.targets[t]
        },
        process: function() {
            _tpt.orientationObserver.inited || (_tpt.orientationObserver.inited = !0, window.addEventListener("orientationchange", (function() {
                _tpt.orientationObserver.event = "orientation", _tpt.orientationObserver.execute()
            })))
        },
        execute: function() {
            var t = new Date;
            for (var e in t - _tpt.resizeObserver.timer >= 1e3 && (_tpt.resizeObserver.timer = t), _tpt.orientationObserver.targets) _tpt.hop(_tpt.orientationObserver.targets, e) && (clearTimeout(_tpt.orientationObserver.targets[e].timer), t - _tpt.orientationObserver.timer >= _tpt.orientationObserver.targets[e].delay ? _tpt.orientationObserver.targets[e].callBack(_tpt.orientationObserver.targets[e].id) : function(t) {
                _tpt.orientationObserver.targets[t].timer = setTimeout((() => {
                    _tpt.orientationObserver.targets[t].callBack(_tpt.orientationObserver.targets[t].id)
                }), _tpt.orientationObserver.targets[t].delay)
            }(e))
        }
    }, _tpt.focusObserver = {
        id: 0,
        targets: {},
        timer: 1e3,
        inited: !1,
        observe: function(t, e, r) {
            return "function" == typeof t && (e ? ? = 100, _tpt.focusObserver.targets[_tpt.focusObserver.id++] = {
                callBack: t,
                delay: e,
                id: r
            }, _tpt.focusObserver.process(), _tpt.focusObserver.id)
        },
        remove: function(t) {
            delete _tpt.targets[t]
        },
        process: function() {
            1 != _tpt.focusObserver.observed && (_tpt.focusObserver.observed = !0, window.addEventListener("blur", (function() {
                _tpt.focusObserver.execute("blur")
            })), window.addEventListener("focus", (function() {
                _tpt.focusObserver.execute("focus")
            })))
        },
        execute: function(t) {
            var e = new Date;
            for (var r in e - _tpt.focusObserver.timer >= 1e3 && (_tpt.focusObserver.timer = e), _tpt.focusObserver.targets) _tpt.hop(_tpt.focusObserver.targets, r) && (clearTimeout(_tpt.focusObserver.targets[r].timer), e - _tpt.focusObserver.timer >= _tpt.focusObserver.targets[r].delay ? _tpt.focusObserver.targets[r].callBack(t, _tpt.focusObserver.targets[r].id) : function(e) {
                _tpt.focusObserver.targets[e].timer = setTimeout((() => {
                    _tpt.focusObserver.targets[e].callBack(t, _tpt.focusObserver.targets[e].id)
                }), _tpt.focusObserver.targets[e].delay)
            }(r))
        }
    }, _tpt.wrapObserver = {
        targets: [],
        init: function(t) {
            var e = 0,
                r = 0,
                n = i.bind(_tpt.wrapObserver);

            function i() {
                if (r++, requestAnimationFrame(n), !(r - e < 30)) {
                    e = r;
                    for (var i = 0; i < _tpt.wrapObserver.targets.length; i++)
                        if (_tpt.hop(_tpt.wrapObserver.targets, i)) {
                            var s = _tpt.wrapObserver.targets[i],
                                o = s.elem.getBoundingClientRect();
                            s.lw === o.width && s.lh === o.height || 0 === o.width || (s.callback && (s.callback.pause(), s.callback.kill(), s.callback = null), s.callback = _tpt.gsap.to({}, {
                                duration: .2,
                                onComplete: t.bind(window, s.elem, s.id)
                            })), s.lw = o.width, s.lh = o.height
                        }
                }
            }
            i()
        },
        observe: function(t, e) {
            if ("" !== (t = t.getBoundingClientRect ? t : t[0].getBoundingClientRect ? t[0] : "")) {
                var r = t.getBoundingClientRect();
                _tpt.wrapObserver.targets.push({
                    elem: t,
                    id: e,
                    lw: r.width,
                    lh: r.height
                })
            }
        }
    }, _tpt.userInteracted = !1, _tpt.setUserInteractionFlag = () => {
        _tpt.userInteracted = !0, document.removeEventListener("click", _tpt.setUserInteractionFlag), document.removeEventListener("keydown", _tpt.setUserInteractionFlag), document.removeEventListener("touchstart", _tpt.setUserInteractionFlag)
    }, document.addEventListener("click", _tpt.setUserInteractionFlag), document.addEventListener("keydown", _tpt.setUserInteractionFlag), document.addEventListener("touchstart", _tpt.setUserInteractionFlag), _tpt.R ? ? = {}, _tpt.R.tptools = _tpt.extend ? _tpt.extend(_tpt.R.tptools, {
        status: 2,
        version: "6.7.15"
    }) : {
        status: 2,
        version: "6.7.15"
    }
}(), (() => {
    "use strict";

    function t(t) {
        if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return t
    }

    function e(t, e) {
        t.prototype = Object.create(e.prototype), t.prototype.constructor = t, t.__proto__ = e
    }
    /*!
     * GSAP 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var r, n, i, s, o, a, u, l, p, c, h, f, d, g, _, m = {
            autoSleep: 120,
            force3D: "auto",
            nullTargetWarn: 1,
            units: {
                lineHeight: ""
            }
        },
        D = {
            duration: .5,
            overwrite: !1,
            delay: 0
        },
        v = 1e8,
        y = 1e-8,
        x = 2 * Math.PI,
        b = x / 4,
        w = 0,
        C = Math.sqrt,
        F = Math.cos,
        E = Math.sin,
        T = function(t) {
            return "string" == typeof t
        },
        S = function(t) {
            return "function" == typeof t
        },
        M = function(t) {
            return "number" == typeof t
        },
        A = function(t) {
            return void 0 === t
        },
        O = function(t) {
            return "object" == typeof t
        },
        R = function(t) {
            return !1 !== t
        },
        P = function() {
            return "undefined" != typeof window
        },
        k = function(t) {
            return S(t) || T(t)
        },
        B = "function" == typeof ArrayBuffer && ArrayBuffer.isView || function() {},
        L = Array.isArray,
        N = /(?:-?\.?\d|\.)+/gi,
        I = /[-+=.]*\d+[.e\-+]*\d*[e\-+]*\d*/g,
        z = /[-+=.]*\d+[.e-]*\d*[a-z%]*/g,
        X = /[-+=.]*\d+\.?\d*(?:e-|e\+)?\d*/gi,
        j = /[+-]=-?[.\d]+/,
        Y = /[^,'"\[\]\s]+/gi,
        q = /^[+\-=e\s\d]*\d+[.\d]*([a-z]*|%)\s*$/i,
        G = {},
        V = {},
        H = function(t) {
            return (V = xt(t, G)) && xr
        },
        W = function(t, e) {
            return console.warn("Invalid property", t, "set to", e, "Missing plugin? gsap.registerPlugin()")
        },
        U = function(t, e) {
            return !e && console.warn(t)
        },
        $ = function(t, e) {
            return t && (G[t] = e) && V && (V[t] = e) || G
        },
        Q = function() {
            return 0
        },
        Z = {
            suppressEvents: !0,
            isStart: !0,
            kill: !1
        },
        J = {
            suppressEvents: !0,
            kill: !1
        },
        K = {
            suppressEvents: !0
        },
        tt = {},
        et = [],
        rt = {},
        nt = {},
        it = {},
        st = 30,
        ot = [],
        at = "",
        ut = function(t) {
            var e, r, n = t[0];
            if (O(n) || S(n) || (t = [t]), !(e = (n._gsap || {}).harness)) {
                for (r = ot.length; r-- && !ot[r].targetTest(n););
                e = ot[r]
            }
            for (r = t.length; r--;) t[r] && (t[r]._gsap || (t[r]._gsap = new Be(t[r], e))) || t.splice(r, 1);
            return t
        },
        lt = function(t) {
            return t._gsap || ut(Jt(t))[0]._gsap
        },
        pt = function(t, e, r) {
            return (r = t[e]) && S(r) ? t[e]() : A(r) && t.getAttribute && t.getAttribute(e) || r
        },
        ct = function(t, e) {
            return (t = t.split(",")).forEach(e) || t
        },
        ht = function(t) {
            return Math.round(1e5 * t) / 1e5 || 0
        },
        ft = function(t) {
            return Math.round(1e7 * t) / 1e7 || 0
        },
        dt = function(t, e) {
            var r = e.charAt(0),
                n = parseFloat(e.substr(2));
            return t = parseFloat(t), "+" === r ? t + n : "-" === r ? t - n : "*" === r ? t * n : t / n
        },
        gt = function(t, e) {
            for (var r = e.length, n = 0; t.indexOf(e[n]) < 0 && ++n < r;);
            return n < r
        },
        _t = function() {
            var t, e, r = et.length,
                n = et.slice(0);
            for (rt = {}, et.length = 0, t = 0; t < r; t++)(e = n[t]) && e._lazy && (e.render(e._lazy[0], e._lazy[1], !0)._lazy = 0)
        },
        mt = function(t, e, r, i) {
            et.length && !n && _t(), t.render(e, r, i || n && e < 0 && (t._initted || t._startAt)), et.length && !n && _t()
        },
        Dt = function(t) {
            var e = parseFloat(t);
            return (e || 0 === e) && (t + "").match(Y).length < 2 ? e : T(t) ? t.trim() : t
        },
        vt = function(t) {
            return t
        },
        yt = function(t, e) {
            for (var r in e) r in t || (t[r] = e[r]);
            return t
        },
        xt = function(t, e) {
            for (var r in e) t[r] = e[r];
            return t
        },
        bt = function t(e, r) {
            for (var n in r) "__proto__" !== n && "constructor" !== n && "prototype" !== n && (e[n] = O(r[n]) ? t(e[n] || (e[n] = {}), r[n]) : r[n]);
            return e
        },
        wt = function(t, e) {
            var r, n = {};
            for (r in t) r in e || (n[r] = t[r]);
            return n
        },
        Ct = function(t) {
            var e, r = t.parent || s,
                n = t.keyframes ? (e = L(t.keyframes), function(t, r) {
                    for (var n in r) n in t || "duration" === n && e || "ease" === n || (t[n] = r[n])
                }) : yt;
            if (R(t.inherit))
                for (; r;) n(t, r.vars.defaults), r = r.parent || r._dp;
            return t
        },
        Ft = function(t, e, r, n, i) {
            void 0 === r && (r = "_first"), void 0 === n && (n = "_last");
            var s, o = t[n];
            if (i)
                for (s = e[i]; o && o[i] > s;) o = o._prev;
            return o ? (e._next = o._next, o._next = e) : (e._next = t[r], t[r] = e), e._next ? e._next._prev = e : t[n] = e, e._prev = o, e.parent = e._dp = t, e
        },
        Et = function(t, e, r, n) {
            void 0 === r && (r = "_first"), void 0 === n && (n = "_last");
            var i = e._prev,
                s = e._next;
            i ? i._next = s : t[r] === e && (t[r] = s), s ? s._prev = i : t[n] === e && (t[n] = i), e._next = e._prev = e.parent = null
        },
        Tt = function(t, e) {
            t.parent && (!e || t.parent.autoRemoveChildren) && t.parent.remove && t.parent.remove(t), t._act = 0
        },
        St = function(t, e) {
            if (t && (!e || e._end > t._dur || e._start < 0))
                for (var r = t; r;) r._dirty = 1, r = r.parent;
            return t
        },
        Mt = function(t, e, r, i) {
            return t._startAt && (n ? t._startAt.revert(J) : t.vars.immediateRender && !t.vars.autoRevert || t._startAt.render(e, !0, i))
        },
        At = function t(e) {
            return !e || e._ts && t(e.parent)
        },
        Ot = function(t) {
            return t._repeat ? Rt(t._tTime, t = t.duration() + t._rDelay) * t : 0
        },
        Rt = function(t, e) {
            var r = Math.floor(t /= e);
            return t && r === t ? r - 1 : r
        },
        Pt = function(t, e) {
            return (t - e._start) * e._ts + (e._ts >= 0 ? 0 : e._dirty ? e.totalDuration() : e._tDur)
        },
        kt = function(t) {
            return t._end = ft(t._start + (t._tDur / Math.abs(t._ts || t._rts || y) || 0))
        },
        Bt = function(t, e) {
            var r = t._dp;
            return r && r.smoothChildTiming && t._ts && (t._start = ft(r._time - (t._ts > 0 ? e / t._ts : ((t._dirty ? t.totalDuration() : t._tDur) - e) / -t._ts)), kt(t), r._dirty || St(r, t)), t
        },
        Lt = function(t, e) {
            var r;
            if ((e._time || !e._dur && e._initted || e._start < t._time && (e._dur || !e.add)) && (r = Pt(t.rawTime(), e), (!e._dur || Ut(0, e.totalDuration(), r) - e._tTime > y) && e.render(r, !0)), St(t, e)._dp && t._initted && t._time >= t._dur && t._ts) {
                if (t._dur < t.duration())
                    for (r = t; r._dp;) r.rawTime() >= 0 && r.totalTime(r._tTime), r = r._dp;
                t._zTime = -1e-8
            }
        },
        Nt = function(t, e, r, n) {
            return e.parent && Tt(e), e._start = ft((M(r) ? r : r || t !== s ? Vt(t, r, e) : t._time) + e._delay), e._end = ft(e._start + (e.totalDuration() / Math.abs(e.timeScale()) || 0)), Ft(t, e, "_first", "_last", t._sort ? "_start" : 0), jt(e) || (t._recent = e), n || Lt(t, e), t._ts < 0 && Bt(t, t._tTime), t
        },
        It = function(t, e) {
            return (G.ScrollTrigger || W("scrollTrigger", e)) && G.ScrollTrigger.create(e, t)
        },
        zt = function(t, e, r, i, s) {
            return qe(t, e, s), t._initted ? !r && t._pt && !n && (t._dur && !1 !== t.vars.lazy || !t._dur && t.vars.lazy) && p !== be.frame ? (et.push(t), t._lazy = [s, i], 1) : void 0 : 1
        },
        Xt = function t(e) {
            var r = e.parent;
            return r && r._ts && r._initted && !r._lock && (r.rawTime() < 0 || t(r))
        },
        jt = function(t) {
            var e = t.data;
            return "isFromStart" === e || "isStart" === e
        },
        Yt = function(t, e, r, n) {
            var i = t._repeat,
                s = ft(e) || 0,
                o = t._tTime / t._tDur;
            return o && !n && (t._time *= s / t._dur), t._dur = s, t._tDur = i ? i < 0 ? 1e10 : ft(s * (i + 1) + t._rDelay * i) : s, o > 0 && !n && Bt(t, t._tTime = t._tDur * o), t.parent && kt(t), r || St(t.parent, t), t
        },
        qt = function(t) {
            return t instanceof Ne ? St(t) : Yt(t, t._dur)
        },
        Gt = {
            _start: 0,
            endTime: Q,
            totalDuration: Q
        },
        Vt = function t(e, r, n) {
            var i, s, o, a = e.labels,
                u = e._recent || Gt,
                l = e.duration() >= v ? u.endTime(!1) : e._dur;
            return T(r) && (isNaN(r) || r in a) ? (s = r.charAt(0), o = "%" === r.substr(-1), i = r.indexOf("="), "<" === s || ">" === s ? (i >= 0 && (r = r.replace(/=/, "")), ("<" === s ? u._start : u.endTime(u._repeat >= 0)) + (parseFloat(r.substr(1)) || 0) * (o ? (i < 0 ? u : n).totalDuration() / 100 : 1)) : i < 0 ? (r in a || (a[r] = l), a[r]) : (s = parseFloat(r.charAt(i - 1) + r.substr(i + 1)), o && n && (s = s / 100 * (L(n) ? n[0] : n).totalDuration()), i > 1 ? t(e, r.substr(0, i - 1), n) + s : l + s)) : null == r ? l : +r
        },
        Ht = function(t, e, r) {
            var n, i, s = M(e[1]),
                o = (s ? 2 : 1) + (t < 2 ? 0 : 1),
                a = e[o];
            if (s && (a.duration = e[1]), a.parent = r, t) {
                for (n = a, i = r; i && !("immediateRender" in n);) n = i.vars.defaults || {}, i = R(i.vars.inherit) && i.parent;
                a.immediateRender = R(n.immediateRender), t < 2 ? a.runBackwards = 1 : a.startAt = e[o - 1]
            }
            return new Ue(e[0], a, e[o + 1])
        },
        Wt = function(t, e) {
            return t || 0 === t ? e(t) : e
        },
        Ut = function(t, e, r) {
            return r < t ? t : r > e ? e : r
        },
        $t = function(t, e) {
            return T(t) && (e = q.exec(t)) ? e[1] : ""
        },
        Qt = [].slice,
        Zt = function(t, e) {
            return t && O(t) && "length" in t && (!e && !t.length || t.length - 1 in t && O(t[0])) && !t.nodeType && t !== o
        },
        Jt = function(t, e, r) {
            return i && !e && i.selector ? i.selector(t) : !T(t) || r || !a && we() ? L(t) ? function(t, e, r) {
                return void 0 === r && (r = []), t.forEach((function(t) {
                    var n;
                    return T(t) && !e || Zt(t, 1) ? (n = r).push.apply(n, Jt(t)) : r.push(t)
                })) || r
            }(t, r) : Zt(t) ? Qt.call(t, 0) : t ? [t] : [] : Qt.call((e || u).querySelectorAll(t), 0)
        },
        Kt = function(t) {
            return t = Jt(t)[0] || U("Invalid scope") || {},
                function(e) {
                    var r = t.current || t.nativeElement || t;
                    return Jt(e, r.querySelectorAll ? r : r === t ? U("Invalid scope") || u.createElement("div") : t)
                }
        },
        te = function(t) {
            return t.sort((function() {
                return .5 - Math.random()
            }))
        },
        ee = function(t) {
            if (S(t)) return t;
            var e = O(t) ? t : {
                    each: t
                },
                r = Ae(e.ease),
                n = e.from || 0,
                i = parseFloat(e.base) || 0,
                s = {},
                o = n > 0 && n < 1,
                a = isNaN(n) || o,
                u = e.axis,
                l = n,
                p = n;
            return T(n) ? l = p = {
                    center: .5,
                    edges: .5,
                    end: 1
                }[n] || 0 : !o && a && (l = n[0], p = n[1]),
                function(t, o, c) {
                    var h, f, d, g, _, m, D, y, x, b = (c || e).length,
                        w = s[b];
                    if (!w) {
                        if (!(x = "auto" === e.grid ? 0 : (e.grid || [1, v])[1])) {
                            for (D = -v; D < (D = c[x++].getBoundingClientRect().left) && x < b;);
                            x < b && x--
                        }
                        for (w = s[b] = [], h = a ? Math.min(x, b) * l - .5 : n % x, f = x === v ? 0 : a ? b * p / x - .5 : n / x | 0, D = 0, y = v, m = 0; m < b; m++) d = m % x - h, g = f - (m / x | 0), w[m] = _ = u ? Math.abs("y" === u ? g : d) : C(d * d + g * g), _ > D && (D = _), _ < y && (y = _);
                        "random" === n && te(w), w.max = D - y, w.min = y, w.v = b = (parseFloat(e.amount) || parseFloat(e.each) * (x > b ? b - 1 : u ? "y" === u ? b / x : x : Math.max(x, b / x)) || 0) * ("edges" === n ? -1 : 1), w.b = b < 0 ? i - b : i, w.u = $t(e.amount || e.each) || 0, r = r && b < 0 ? Se(r) : r
                    }
                    return b = (w[t] - w.min) / w.max || 0, ft(w.b + (r ? r(b) : b) * w.v) + w.u
                }
        },
        re = function(t) {
            var e = Math.pow(10, ((t + "").split(".")[1] || "").length);
            return function(r) {
                var n = ft(Math.round(parseFloat(r) / t) * t * e);
                return (n - n % 1) / e + (M(r) ? 0 : $t(r))
            }
        },
        ne = function(t, e) {
            var r, n, i = L(t);
            return !i && O(t) && (r = i = t.radius || v, t.values ? (t = Jt(t.values), (n = !M(t[0])) && (r *= r)) : t = re(t.increment)), Wt(e, i ? S(t) ? function(e) {
                return n = t(e), Math.abs(n - e) <= r ? n : e
            } : function(e) {
                for (var i, s, o = parseFloat(n ? e.x : e), a = parseFloat(n ? e.y : 0), u = v, l = 0, p = t.length; p--;)(i = n ? (i = t[p].x - o) * i + (s = t[p].y - a) * s : Math.abs(t[p] - o)) < u && (u = i, l = p);
                return l = !r || u <= r ? t[l] : e, n || l === e || M(e) ? l : l + $t(e)
            } : re(t))
        },
        ie = function(t, e, r, n) {
            return Wt(L(t) ? !e : !0 === r ? !!(r = 0) : !n, (function() {
                return L(t) ? t[~~(Math.random() * t.length)] : (r = r || 1e-5) && (n = r < 1 ? Math.pow(10, (r + "").length - 2) : 1) && Math.floor(Math.round((t - r / 2 + Math.random() * (e - t + .99 * r)) / r) * r * n) / n
            }))
        },
        se = function(t, e, r) {
            return Wt(r, (function(r) {
                return t[~~e(r)]
            }))
        },
        oe = function(t) {
            for (var e, r, n, i, s = 0, o = ""; ~(e = t.indexOf("random(", s));) n = t.indexOf(")", e), i = "[" === t.charAt(e + 7), r = t.substr(e + 7, n - e - 7).match(i ? Y : N), o += t.substr(s, e - s) + ie(i ? r : +r[0], i ? 0 : +r[1], +r[2] || 1e-5), s = n + 1;
            return o + t.substr(s, t.length - s)
        },
        ae = function(t, e, r, n, i) {
            var s = e - t,
                o = n - r;
            return Wt(i, (function(e) {
                return r + ((e - t) / s * o || 0)
            }))
        },
        ue = function(t, e, r) {
            var n, i, s, o = t.labels,
                a = v;
            for (n in o)(i = o[n] - e) < 0 == !!r && i && a > (i = Math.abs(i)) && (s = n, a = i);
            return s
        },
        le = function(t, e, r) {
            var n, s, o, a = t.vars,
                u = a[e],
                l = i,
                p = t._ctx;
            if (u) return n = a[e + "Params"], s = a.callbackScope || t, r && et.length && _t(), p && (i = p), o = n ? u.apply(s, n) : u.call(s), i = l, o
        },
        pe = function(t) {
            return Tt(t), t.scrollTrigger && t.scrollTrigger.kill(!!n), t.progress() < 1 && le(t, "onInterrupt"), t
        },
        ce = [],
        he = function(t) {
            if (t)
                if (t = !t.name && t.default || t, P() || t.headless) {
                    var e = t.name,
                        r = S(t),
                        n = e && !r && t.init ? function() {
                            this._props = []
                        } : t,
                        i = {
                            init: Q,
                            render: nr,
                            add: je,
                            kill: sr,
                            modifier: ir,
                            rawVars: 0
                        },
                        s = {
                            targetTest: 0,
                            get: 0,
                            getSetter: Ke,
                            aliases: {},
                            register: 0
                        };
                    if (we(), t !== n) {
                        if (nt[e]) return;
                        yt(n, yt(wt(t, i), s)), xt(n.prototype, xt(i, wt(t, s))), nt[n.prop = e] = n, t.targetTest && (ot.push(n), tt[e] = 1), e = ("css" === e ? "CSS" : e.charAt(0).toUpperCase() + e.substr(1)) + "Plugin"
                    }
                    $(e, n), t.register && t.register(xr, n, ur)
                } else ce.push(t)
        },
        fe = 255,
        de = {
            aqua: [0, fe, fe],
            lime: [0, fe, 0],
            silver: [192, 192, 192],
            black: [0, 0, 0],
            maroon: [128, 0, 0],
            teal: [0, 128, 128],
            blue: [0, 0, fe],
            navy: [0, 0, 128],
            white: [fe, fe, fe],
            olive: [128, 128, 0],
            yellow: [fe, fe, 0],
            orange: [fe, 165, 0],
            gray: [128, 128, 128],
            purple: [128, 0, 128],
            green: [0, 128, 0],
            red: [fe, 0, 0],
            pink: [fe, 192, 203],
            cyan: [0, fe, fe],
            transparent: [fe, fe, fe, 0]
        },
        ge = function(t, e, r) {
            return (6 * (t += t < 0 ? 1 : t > 1 ? -1 : 0) < 1 ? e + (r - e) * t * 6 : t < .5 ? r : 3 * t < 2 ? e + (r - e) * (2 / 3 - t) * 6 : e) * fe + .5 | 0
        },
        _e = function(t, e, r) {
            var n, i, s, o, a, u, l, p, c, h, f = t ? M(t) ? [t >> 16, t >> 8 & fe, t & fe] : 0 : de.black;
            if (!f) {
                if ("," === t.substr(-1) && (t = t.substr(0, t.length - 1)), de[t]) f = de[t];
                else if ("#" === t.charAt(0)) {
                    if (t.length < 6 && (n = t.charAt(1), i = t.charAt(2), s = t.charAt(3), t = "#" + n + n + i + i + s + s + (5 === t.length ? t.charAt(4) + t.charAt(4) : "")), 9 === t.length) return [(f = parseInt(t.substr(1, 6), 16)) >> 16, f >> 8 & fe, f & fe, parseInt(t.substr(7), 16) / 255];
                    f = [(t = parseInt(t.substr(1), 16)) >> 16, t >> 8 & fe, t & fe]
                } else if ("hsl" === t.substr(0, 3))
                    if (f = h = t.match(N), e) {
                        if (~t.indexOf("=")) return f = t.match(I), r && f.length < 4 && (f[3] = 1), f
                    } else o = +f[0] % 360 / 360, a = +f[1] / 100, n = 2 * (u = +f[2] / 100) - (i = u <= .5 ? u * (a + 1) : u + a - u * a), f.length > 3 && (f[3] *= 1), f[0] = ge(o + 1 / 3, n, i), f[1] = ge(o, n, i), f[2] = ge(o - 1 / 3, n, i);
                else f = t.match(N) || de.transparent;
                f = f.map(Number)
            }
            return e && !h && (n = f[0] / fe, i = f[1] / fe, s = f[2] / fe, u = ((l = Math.max(n, i, s)) + (p = Math.min(n, i, s))) / 2, l === p ? o = a = 0 : (c = l - p, a = u > .5 ? c / (2 - l - p) : c / (l + p), o = l === n ? (i - s) / c + (i < s ? 6 : 0) : l === i ? (s - n) / c + 2 : (n - i) / c + 4, o *= 60), f[0] = ~~(o + .5), f[1] = ~~(100 * a + .5), f[2] = ~~(100 * u + .5)), r && f.length < 4 && (f[3] = 1), f
        },
        me = function(t) {
            var e = [],
                r = [],
                n = -1;
            return t.split(ve).forEach((function(t) {
                var i = t.match(z) || [];
                e.push.apply(e, i), r.push(n += i.length + 1)
            })), e.c = r, e
        },
        De = function(t, e, r) {
            var n, i, s, o, a = "",
                u = (t + a).match(ve),
                l = e ? "hsla(" : "rgba(",
                p = 0;
            if (!u) return t;
            if (u = u.map((function(t) {
                    return (t = _e(t, e, 1)) && l + (e ? t[0] + "," + t[1] + "%," + t[2] + "%," + t[3] : t.join(",")) + ")"
                })), r && (s = me(t), (n = r.c).join(a) !== s.c.join(a)))
                for (o = (i = t.replace(ve, "1").split(z)).length - 1; p < o; p++) a += i[p] + (~n.indexOf(p) ? u.shift() || l + "0,0,0,0)" : (s.length ? s : u.length ? u : r).shift());
            if (!i)
                for (o = (i = t.split(ve)).length - 1; p < o; p++) a += i[p] + u[p];
            return a + i[o]
        },
        ve = function() {
            var t, e = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3,4}){1,2}\\b";
            for (t in de) e += "|" + t + "\\b";
            return new RegExp(e + ")", "gi")
        }(),
        ye = /hsl[a]?\(/,
        xe = function(t) {
            var e, r = t.join(" ");
            if (ve.lastIndex = 0, ve.test(r)) return e = ye.test(r), t[1] = De(t[1], e), t[0] = De(t[0], e, me(t[1])), !0
        },
        be = function() {
            var t, e, r, n, i, s, p = Date.now,
                c = 500,
                f = 33,
                d = p(),
                g = d,
                _ = 1e3 / 240,
                m = _,
                D = [],
                v = function r(o) {
                    var a, u, l, h, v = p() - g,
                        y = !0 === o;
                    if ((v > c || v < 0) && (d += v - f), ((a = (l = (g += v) - d) - m) > 0 || y) && (h = ++n.frame, i = l - 1e3 * n.time, n.time = l /= 1e3, m += a + (a >= _ ? 4 : _ - a), u = 1), y || (t = e(r)), u)
                        for (s = 0; s < D.length; s++) D[s](l, i, h, o)
                };
            return n = {
                time: 0,
                frame: 0,
                tick: function() {
                    v(!0)
                },
                deltaRatio: function(t) {
                    return i / (1e3 / (t || 60))
                },
                wake: function() {
                    l && (!a && P() && (o = a = window, u = o.document || {}, G.gsap = xr, (o.gsapVersions || (o.gsapVersions = [])).push(xr.version), H(V || o.GreenSockGlobals || !o.gsap && o || {}), ce.forEach(he)), r = "undefined" != typeof requestAnimationFrame && requestAnimationFrame, t && n.sleep(), e = r || function(t) {
                        return setTimeout(t, m - 1e3 * n.time + 1 | 0)
                    }, h = 1, v(2))
                },
                sleep: function() {
                    (r ? cancelAnimationFrame : clearTimeout)(t), h = 0, e = Q
                },
                lagSmoothing: function(t, e) {
                    c = t || 1 / 0, f = Math.min(e || 33, c)
                },
                fps: function(t) {
                    _ = 1e3 / (t || 240), m = 1e3 * n.time + _
                },
                add: function(t, e, r) {
                    var i = e ? function(e, r, s, o) {
                        t(e, r, s, o), n.remove(i)
                    } : t;
                    return n.remove(t), D[r ? "unshift" : "push"](i), we(), i
                },
                remove: function(t, e) {
                    ~(e = D.indexOf(t)) && D.splice(e, 1) && s >= e && s--
                },
                _listeners: D
            }
        }(),
        we = function() {
            return !h && be.wake()
        },
        Ce = {},
        Fe = /^[\d.\-M][\d.\-,\s]/,
        Ee = /["']/g,
        Te = function(t) {
            for (var e, r, n, i = {}, s = t.substr(1, t.length - 3).split(":"), o = s[0], a = 1, u = s.length; a < u; a++) r = s[a], e = a !== u - 1 ? r.lastIndexOf(",") : r.length, n = r.substr(0, e), i[o] = isNaN(n) ? n.replace(Ee, "").trim() : +n, o = r.substr(e + 1).trim();
            return i
        },
        Se = function(t) {
            return function(e) {
                return 1 - t(1 - e)
            }
        },
        Me = function t(e, r) {
            for (var n, i = e._first; i;) i instanceof Ne ? t(i, r) : !i.vars.yoyoEase || i._yoyo && i._repeat || i._yoyo === r || (i.timeline ? t(i.timeline, r) : (n = i._ease, i._ease = i._yEase, i._yEase = n, i._yoyo = r)), i = i._next
        },
        Ae = function(t, e) {
            return t && (S(t) ? t : Ce[t] || function(t) {
                var e, r, n, i, s = (t + "").split("("),
                    o = Ce[s[0]];
                return o && s.length > 1 && o.config ? o.config.apply(null, ~t.indexOf("{") ? [Te(s[1])] : (e = t, r = e.indexOf("(") + 1, n = e.indexOf(")"), i = e.indexOf("(", r), e.substring(r, ~i && i < n ? e.indexOf(")", n + 1) : n)).split(",").map(Dt)) : Ce._CE && Fe.test(t) ? Ce._CE("", t) : o
            }(t)) || e
        },
        Oe = function(t, e, r, n) {
            void 0 === r && (r = function(t) {
                return 1 - e(1 - t)
            }), void 0 === n && (n = function(t) {
                return t < .5 ? e(2 * t) / 2 : 1 - e(2 * (1 - t)) / 2
            });
            var i, s = {
                easeIn: e,
                easeOut: r,
                easeInOut: n
            };
            return ct(t, (function(t) {
                for (var e in Ce[t] = G[t] = s, Ce[i = t.toLowerCase()] = r, s) Ce[i + ("easeIn" === e ? ".in" : "easeOut" === e ? ".out" : ".inOut")] = Ce[t + "." + e] = s[e]
            })), s
        },
        Re = function(t) {
            return function(e) {
                return e < .5 ? (1 - t(1 - 2 * e)) / 2 : .5 + t(2 * (e - .5)) / 2
            }
        },
        Pe = function t(e, r, n) {
            var i = r >= 1 ? r : 1,
                s = (n || (e ? .3 : .45)) / (r < 1 ? r : 1),
                o = s / x * (Math.asin(1 / i) || 0),
                a = function(t) {
                    return 1 === t ? 1 : i * Math.pow(2, -10 * t) * E((t - o) * s) + 1
                },
                u = "out" === e ? a : "in" === e ? function(t) {
                    return 1 - a(1 - t)
                } : Re(a);
            return s = x / s, u.config = function(r, n) {
                return t(e, r, n)
            }, u
        },
        ke = function t(e, r) {
            void 0 === r && (r = 1.70158);
            var n = function(t) {
                    return t ? --t * t * ((r + 1) * t + r) + 1 : 0
                },
                i = "out" === e ? n : "in" === e ? function(t) {
                    return 1 - n(1 - t)
                } : Re(n);
            return i.config = function(r) {
                return t(e, r)
            }, i
        };
    ct("Linear,Quad,Cubic,Quart,Quint,Strong", (function(t, e) {
        var r = e < 5 ? e + 1 : e;
        Oe(t + ",Power" + (r - 1), e ? function(t) {
            return Math.pow(t, r)
        } : function(t) {
            return t
        }, (function(t) {
            return 1 - Math.pow(1 - t, r)
        }), (function(t) {
            return t < .5 ? Math.pow(2 * t, r) / 2 : 1 - Math.pow(2 * (1 - t), r) / 2
        }))
    })), Ce.Linear.easeNone = Ce.none = Ce.Linear.easeIn, Oe("Elastic", Pe("in"), Pe("out"), Pe()), f = 7.5625, g = 1 / (d = 2.75), Oe("Bounce", (function(t) {
        return 1 - _(1 - t)
    }), _ = function(t) {
        return t < g ? f * t * t : t < .7272727272727273 ? f * Math.pow(t - 1.5 / d, 2) + .75 : t < .9090909090909092 ? f * (t -= 2.25 / d) * t + .9375 : f * Math.pow(t - 2.625 / d, 2) + .984375
    }), Oe("Expo", (function(t) {
        return t ? Math.pow(2, 10 * (t - 1)) : 0
    })), Oe("Circ", (function(t) {
        return -(C(1 - t * t) - 1)
    })), Oe("Sine", (function(t) {
        return 1 === t ? 1 : 1 - F(t * b)
    })), Oe("Back", ke("in"), ke("out"), ke()), Ce.SteppedEase = Ce.steps = G.SteppedEase = {
        config: function(t, e) {
            void 0 === t && (t = 1);
            var r = 1 / t,
                n = t + (e ? 0 : 1),
                i = e ? 1 : 0;
            return function(t) {
                return ((n * Ut(0, .99999999, t) | 0) + i) * r
            }
        }
    }, D.ease = Ce["quad.out"], ct("onComplete,onUpdate,onStart,onRepeat,onReverseComplete,onInterrupt", (function(t) {
        return at += t + "," + t + "Params,"
    }));
    var Be = function(t, e) {
            this.id = w++, t._gsap = this, this.target = t, this.harness = e, this.get = e ? e.get : pt, this.set = e ? e.getSetter : Ke
        },
        Le = function() {
            function t(t) {
                this.vars = t, this._delay = +t.delay || 0, (this._repeat = t.repeat === 1 / 0 ? -2 : t.repeat || 0) && (this._rDelay = t.repeatDelay || 0, this._yoyo = !!t.yoyo || !!t.yoyoEase), this._ts = 1, Yt(this, +t.duration, 1, 1), this.data = t.data, i && (this._ctx = i, i.data.push(this)), h || be.wake()
            }
            var e = t.prototype;
            return e.delay = function(t) {
                return t || 0 === t ? (this.parent && this.parent.smoothChildTiming && this.startTime(this._start + t - this._delay), this._delay = t, this) : this._delay
            }, e.duration = function(t) {
                return arguments.length ? this.totalDuration(this._repeat > 0 ? t + (t + this._rDelay) * this._repeat : t) : this.totalDuration() && this._dur
            }, e.totalDuration = function(t) {
                return arguments.length ? (this._dirty = 0, Yt(this, this._repeat < 0 ? t : (t - this._repeat * this._rDelay) / (this._repeat + 1))) : this._tDur
            }, e.totalTime = function(t, e) {
                if (we(), !arguments.length) return this._tTime;
                var r = this._dp;
                if (r && r.smoothChildTiming && this._ts) {
                    for (Bt(this, t), !r._dp || r.parent || Lt(r, this); r && r.parent;) r.parent._time !== r._start + (r._ts >= 0 ? r._tTime / r._ts : (r.totalDuration() - r._tTime) / -r._ts) && r.totalTime(r._tTime, !0), r = r.parent;
                    !this.parent && this._dp.autoRemoveChildren && (this._ts > 0 && t < this._tDur || this._ts < 0 && t > 0 || !this._tDur && !t) && Nt(this._dp, this, this._start - this._delay)
                }
                return (this._tTime !== t || !this._dur && !e || this._initted && Math.abs(this._zTime) === y || !t && !this._initted && (this.add || this._ptLookup)) && (this._ts || (this._pTime = t), mt(this, t, e)), this
            }, e.time = function(t, e) {
                return arguments.length ? this.totalTime(Math.min(this.totalDuration(), t + Ot(this)) % (this._dur + this._rDelay) || (t ? this._dur : 0), e) : this._time
            }, e.totalProgress = function(t, e) {
                return arguments.length ? this.totalTime(this.totalDuration() * t, e) : this.totalDuration() ? Math.min(1, this._tTime / this._tDur) : this.rawTime() > 0 ? 1 : 0
            }, e.progress = function(t, e) {
                return arguments.length ? this.totalTime(this.duration() * (!this._yoyo || 1 & this.iteration() ? t : 1 - t) + Ot(this), e) : this.duration() ? Math.min(1, this._time / this._dur) : this.rawTime() > 0 ? 1 : 0
            }, e.iteration = function(t, e) {
                var r = this.duration() + this._rDelay;
                return arguments.length ? this.totalTime(this._time + (t - 1) * r, e) : this._repeat ? Rt(this._tTime, r) + 1 : 1
            }, e.timeScale = function(t, e) {
                if (!arguments.length) return -1e-8 === this._rts ? 0 : this._rts;
                if (this._rts === t) return this;
                var r = this.parent && this._ts ? Pt(this.parent._time, this) : this._tTime;
                return this._rts = +t || 0, this._ts = this._ps || -1e-8 === t ? 0 : this._rts, this.totalTime(Ut(-Math.abs(this._delay), this._tDur, r), !1 !== e), kt(this),
                    function(t) {
                        for (var e = t.parent; e && e.parent;) e._dirty = 1, e.totalDuration(), e = e.parent;
                        return t
                    }(this)
            }, e.paused = function(t) {
                return arguments.length ? (this._ps !== t && (this._ps = t, t ? (this._pTime = this._tTime || Math.max(-this._delay, this.rawTime()), this._ts = this._act = 0) : (we(), this._ts = this._rts, this.totalTime(this.parent && !this.parent.smoothChildTiming ? this.rawTime() : this._tTime || this._pTime, 1 === this.progress() && Math.abs(this._zTime) !== y && (this._tTime -= y)))), this) : this._ps
            }, e.startTime = function(t) {
                if (arguments.length) {
                    this._start = t;
                    var e = this.parent || this._dp;
                    return e && (e._sort || !this.parent) && Nt(e, this, t - this._delay), this
                }
                return this._start
            }, e.endTime = function(t) {
                return this._start + (R(t) ? this.totalDuration() : this.duration()) / Math.abs(this._ts || 1)
            }, e.rawTime = function(t) {
                var e = this.parent || this._dp;
                return e ? t && (!this._ts || this._repeat && this._time && this.totalProgress() < 1) ? this._tTime % (this._dur + this._rDelay) : this._ts ? Pt(e.rawTime(t), this) : this._tTime : this._tTime
            }, e.revert = function(t) {
                void 0 === t && (t = K);
                var e = n;
                return n = t, (this._initted || this._startAt) && (this.timeline && this.timeline.revert(t), this.totalTime(-.01, t.suppressEvents)), "nested" !== this.data && !1 !== t.kill && this.kill(), n = e, this
            }, e.globalTime = function(t) {
                for (var e = this, r = arguments.length ? t : e.rawTime(); e;) r = e._start + r / (Math.abs(e._ts) || 1), e = e._dp;
                return !this.parent && this._sat ? this._sat.globalTime(t) : r
            }, e.repeat = function(t) {
                return arguments.length ? (this._repeat = t === 1 / 0 ? -2 : t, qt(this)) : -2 === this._repeat ? 1 / 0 : this._repeat
            }, e.repeatDelay = function(t) {
                if (arguments.length) {
                    var e = this._time;
                    return this._rDelay = t, qt(this), e ? this.time(e) : this
                }
                return this._rDelay
            }, e.yoyo = function(t) {
                return arguments.length ? (this._yoyo = t, this) : this._yoyo
            }, e.seek = function(t, e) {
                return this.totalTime(Vt(this, t), R(e))
            }, e.restart = function(t, e) {
                return this.play().totalTime(t ? -this._delay : 0, R(e))
            }, e.play = function(t, e) {
                return null != t && this.seek(t, e), this.reversed(!1).paused(!1)
            }, e.reverse = function(t, e) {
                return null != t && this.seek(t || this.totalDuration(), e), this.reversed(!0).paused(!1)
            }, e.pause = function(t, e) {
                return null != t && this.seek(t, e), this.paused(!0)
            }, e.resume = function() {
                return this.paused(!1)
            }, e.reversed = function(t) {
                return arguments.length ? (!!t !== this.reversed() && this.timeScale(-this._rts || (t ? -1e-8 : 0)), this) : this._rts < 0
            }, e.invalidate = function() {
                return this._initted = this._act = 0, this._zTime = -1e-8, this
            }, e.isActive = function() {
                var t, e = this.parent || this._dp,
                    r = this._start;
                return !(e && !(this._ts && this._initted && e.isActive() && (t = e.rawTime(!0)) >= r && t < this.endTime(!0) - y))
            }, e.eventCallback = function(t, e, r) {
                var n = this.vars;
                return arguments.length > 1 ? (e ? (n[t] = e, r && (n[t + "Params"] = r), "onUpdate" === t && (this._onUpdate = e)) : delete n[t], this) : n[t]
            }, e.then = function(t) {
                var e = this;
                return new Promise((function(r) {
                    var n = S(t) ? t : vt,
                        i = function() {
                            var t = e.then;
                            e.then = null, S(n) && (n = n(e)) && (n.then || n === e) && (e.then = t), r(n), e.then = t
                        };
                    e._initted && 1 === e.totalProgress() && e._ts >= 0 || !e._tTime && e._ts < 0 ? i() : e._prom = i
                }))
            }, e.kill = function() {
                pe(this)
            }, t
        }();
    yt(Le.prototype, {
        _time: 0,
        _start: 0,
        _end: 0,
        _tTime: 0,
        _tDur: 0,
        _dirty: 0,
        _repeat: 0,
        _yoyo: !1,
        parent: null,
        _initted: !1,
        _rDelay: 0,
        _ts: 1,
        _dp: 0,
        ratio: 0,
        _zTime: -1e-8,
        _prom: 0,
        _ps: !1,
        _rts: 1
    });
    var Ne = function(r) {
        function i(e, n) {
            var i;
            return void 0 === e && (e = {}), (i = r.call(this, e) || this).labels = {}, i.smoothChildTiming = !!e.smoothChildTiming, i.autoRemoveChildren = !!e.autoRemoveChildren, i._sort = R(e.sortChildren), s && Nt(e.parent || s, t(i), n), e.reversed && i.reverse(), e.paused && i.paused(!0), e.scrollTrigger && It(t(i), e.scrollTrigger), i
        }
        e(i, r);
        var o = i.prototype;
        return o.to = function(t, e, r) {
            return Ht(0, arguments, this), this
        }, o.from = function(t, e, r) {
            return Ht(1, arguments, this), this
        }, o.fromTo = function(t, e, r, n) {
            return Ht(2, arguments, this), this
        }, o.set = function(t, e, r) {
            return e.duration = 0, e.parent = this, Ct(e).repeatDelay || (e.repeat = 0), e.immediateRender = !!e.immediateRender, new Ue(t, e, Vt(this, r), 1), this
        }, o.call = function(t, e, r) {
            return Nt(this, Ue.delayedCall(0, t, e), r)
        }, o.staggerTo = function(t, e, r, n, i, s, o) {
            return r.duration = e, r.stagger = r.stagger || n, r.onComplete = s, r.onCompleteParams = o, r.parent = this, new Ue(t, r, Vt(this, i)), this
        }, o.staggerFrom = function(t, e, r, n, i, s, o) {
            return r.runBackwards = 1, Ct(r).immediateRender = R(r.immediateRender), this.staggerTo(t, e, r, n, i, s, o)
        }, o.staggerFromTo = function(t, e, r, n, i, s, o, a) {
            return n.startAt = r, Ct(n).immediateRender = R(n.immediateRender), this.staggerTo(t, e, n, i, s, o, a)
        }, o.render = function(t, e, r) {
            var i, o, a, u, l, p, c, h, f, d, g, _, m = this._time,
                D = this._dirty ? this.totalDuration() : this._tDur,
                v = this._dur,
                x = t <= 0 ? 0 : ft(t),
                b = this._zTime < 0 != t < 0 && (this._initted || !v);
            if (this !== s && x > D && t >= 0 && (x = D), x !== this._tTime || r || b) {
                if (m !== this._time && v && (x += this._time - m, t += this._time - m), i = x, f = this._start, p = !(h = this._ts), b && (v || (m = this._zTime), (t || !e) && (this._zTime = t)), this._repeat) {
                    if (g = this._yoyo, l = v + this._rDelay, this._repeat < -1 && t < 0) return this.totalTime(100 * l + t, e, r);
                    if (i = ft(x % l), x === D ? (u = this._repeat, i = v) : ((u = ~~(x / l)) && u === x / l && (i = v, u--), i > v && (i = v)), d = Rt(this._tTime, l), !m && this._tTime && d !== u && this._tTime - d * l - this._dur <= 0 && (d = u), g && 1 & u && (i = v - i, _ = 1), u !== d && !this._lock) {
                        var w = g && 1 & d,
                            C = w === (g && 1 & u);
                        if (u < d && (w = !w), m = w ? 0 : x % v ? v : x, this._lock = 1, this.render(m || (_ ? 0 : ft(u * l)), e, !v)._lock = 0, this._tTime = x, !e && this.parent && le(this, "onRepeat"), this.vars.repeatRefresh && !_ && (this.invalidate()._lock = 1), m && m !== this._time || p !== !this._ts || this.vars.onRepeat && !this.parent && !this._act) return this;
                        if (v = this._dur, D = this._tDur, C && (this._lock = 2, m = w ? v : -1e-4, this.render(m, !0), this.vars.repeatRefresh && !_ && this.invalidate()), this._lock = 0, !this._ts && !p) return this;
                        Me(this, _)
                    }
                }
                if (this._hasPause && !this._forcing && this._lock < 2 && (c = function(t, e, r) {
                        var n;
                        if (r > e)
                            for (n = t._first; n && n._start <= r;) {
                                if ("isPause" === n.data && n._start > e) return n;
                                n = n._next
                            } else
                                for (n = t._last; n && n._start >= r;) {
                                    if ("isPause" === n.data && n._start < e) return n;
                                    n = n._prev
                                }
                    }(this, ft(m), ft(i)), c && (x -= i - (i = c._start))), this._tTime = x, this._time = i, this._act = !h, this._initted || (this._onUpdate = this.vars.onUpdate, this._initted = 1, this._zTime = t, m = 0), !m && i && !e && !u && (le(this, "onStart"), this._tTime !== x)) return this;
                if (i >= m && t >= 0)
                    for (o = this._first; o;) {
                        if (a = o._next, (o._act || i >= o._start) && o._ts && c !== o) {
                            if (o.parent !== this) return this.render(t, e, r);
                            if (o.render(o._ts > 0 ? (i - o._start) * o._ts : (o._dirty ? o.totalDuration() : o._tDur) + (i - o._start) * o._ts, e, r), i !== this._time || !this._ts && !p) {
                                c = 0, a && (x += this._zTime = -1e-8);
                                break
                            }
                        }
                        o = a
                    } else {
                        o = this._last;
                        for (var F = t < 0 ? t : i; o;) {
                            if (a = o._prev, (o._act || F <= o._end) && o._ts && c !== o) {
                                if (o.parent !== this) return this.render(t, e, r);
                                if (o.render(o._ts > 0 ? (F - o._start) * o._ts : (o._dirty ? o.totalDuration() : o._tDur) + (F - o._start) * o._ts, e, r || n && (o._initted || o._startAt)), i !== this._time || !this._ts && !p) {
                                    c = 0, a && (x += this._zTime = F ? -1e-8 : y);
                                    break
                                }
                            }
                            o = a
                        }
                    }
                if (c && !e && (this.pause(), c.render(i >= m ? 0 : -1e-8)._zTime = i >= m ? 1 : -1, this._ts)) return this._start = f, kt(this), this.render(t, e, r);
                this._onUpdate && !e && le(this, "onUpdate", !0), (x === D && this._tTime >= this.totalDuration() || !x && m) && (f !== this._start && Math.abs(h) === Math.abs(this._ts) || this._lock || ((t || !v) && (x === D && this._ts > 0 || !x && this._ts < 0) && Tt(this, 1), e || t < 0 && !m || !x && !m && D || (le(this, x === D && t >= 0 ? "onComplete" : "onReverseComplete", !0), this._prom && !(x < D && this.timeScale() > 0) && this._prom())))
            }
            return this
        }, o.add = function(t, e) {
            var r = this;
            if (M(e) || (e = Vt(this, e, t)), !(t instanceof Le)) {
                if (L(t)) return t.forEach((function(t) {
                    return r.add(t, e)
                })), this;
                if (T(t)) return this.addLabel(t, e);
                if (!S(t)) return this;
                t = Ue.delayedCall(0, t)
            }
            return this !== t ? Nt(this, t, e) : this
        }, o.getChildren = function(t, e, r, n) {
            void 0 === t && (t = !0), void 0 === e && (e = !0), void 0 === r && (r = !0), void 0 === n && (n = -v);
            for (var i = [], s = this._first; s;) s._start >= n && (s instanceof Ue ? e && i.push(s) : (r && i.push(s), t && i.push.apply(i, s.getChildren(!0, e, r)))), s = s._next;
            return i
        }, o.getById = function(t) {
            for (var e = this.getChildren(1, 1, 1), r = e.length; r--;)
                if (e[r].vars.id === t) return e[r]
        }, o.remove = function(t) {
            return T(t) ? this.removeLabel(t) : S(t) ? this.killTweensOf(t) : (Et(this, t), t === this._recent && (this._recent = this._last), St(this))
        }, o.totalTime = function(t, e) {
            return arguments.length ? (this._forcing = 1, !this._dp && this._ts && (this._start = ft(be.time - (this._ts > 0 ? t / this._ts : (this.totalDuration() - t) / -this._ts))), r.prototype.totalTime.call(this, t, e), this._forcing = 0, this) : this._tTime
        }, o.addLabel = function(t, e) {
            return this.labels[t] = Vt(this, e), this
        }, o.removeLabel = function(t) {
            return delete this.labels[t], this
        }, o.addPause = function(t, e, r) {
            var n = Ue.delayedCall(0, e || Q, r);
            return n.data = "isPause", this._hasPause = 1, Nt(this, n, Vt(this, t))
        }, o.removePause = function(t) {
            var e = this._first;
            for (t = Vt(this, t); e;) e._start === t && "isPause" === e.data && Tt(e), e = e._next
        }, o.killTweensOf = function(t, e, r) {
            for (var n = this.getTweensOf(t, r), i = n.length; i--;) Ie !== n[i] && n[i].kill(t, e);
            return this
        }, o.getTweensOf = function(t, e) {
            for (var r, n = [], i = Jt(t), s = this._first, o = M(e); s;) s instanceof Ue ? gt(s._targets, i) && (o ? (!Ie || s._initted && s._ts) && s.globalTime(0) <= e && s.globalTime(s.totalDuration()) > e : !e || s.isActive()) && n.push(s) : (r = s.getTweensOf(i, e)).length && n.push.apply(n, r), s = s._next;
            return n
        }, o.tweenTo = function(t, e) {
            e = e || {};
            var r, n = this,
                i = Vt(n, t),
                s = e,
                o = s.startAt,
                a = s.onStart,
                u = s.onStartParams,
                l = s.immediateRender,
                p = Ue.to(n, yt({
                    ease: e.ease || "none",
                    lazy: !1,
                    immediateRender: !1,
                    time: i,
                    overwrite: "auto",
                    duration: e.duration || Math.abs((i - (o && "time" in o ? o.time : n._time)) / n.timeScale()) || y,
                    onStart: function() {
                        if (n.pause(), !r) {
                            var t = e.duration || Math.abs((i - (o && "time" in o ? o.time : n._time)) / n.timeScale());
                            p._dur !== t && Yt(p, t, 0, 1).render(p._time, !0, !0), r = 1
                        }
                        a && a.apply(p, u || [])
                    }
                }, e));
            return l ? p.render(0) : p
        }, o.tweenFromTo = function(t, e, r) {
            return this.tweenTo(e, yt({
                startAt: {
                    time: Vt(this, t)
                }
            }, r))
        }, o.recent = function() {
            return this._recent
        }, o.nextLabel = function(t) {
            return void 0 === t && (t = this._time), ue(this, Vt(this, t))
        }, o.previousLabel = function(t) {
            return void 0 === t && (t = this._time), ue(this, Vt(this, t), 1)
        }, o.currentLabel = function(t) {
            return arguments.length ? this.seek(t, !0) : this.previousLabel(this._time + y)
        }, o.shiftChildren = function(t, e, r) {
            void 0 === r && (r = 0);
            for (var n, i = this._first, s = this.labels; i;) i._start >= r && (i._start += t, i._end += t), i = i._next;
            if (e)
                for (n in s) s[n] >= r && (s[n] += t);
            return St(this)
        }, o.invalidate = function(t) {
            var e = this._first;
            for (this._lock = 0; e;) e.invalidate(t), e = e._next;
            return r.prototype.invalidate.call(this, t)
        }, o.clear = function(t) {
            void 0 === t && (t = !0);
            for (var e, r = this._first; r;) e = r._next, this.remove(r), r = e;
            return this._dp && (this._time = this._tTime = this._pTime = 0), t && (this.labels = {}), St(this)
        }, o.totalDuration = function(t) {
            var e, r, n, i = 0,
                o = this,
                a = o._last,
                u = v;
            if (arguments.length) return o.timeScale((o._repeat < 0 ? o.duration() : o.totalDuration()) / (o.reversed() ? -t : t));
            if (o._dirty) {
                for (n = o.parent; a;) e = a._prev, a._dirty && a.totalDuration(), (r = a._start) > u && o._sort && a._ts && !o._lock ? (o._lock = 1, Nt(o, a, r - a._delay, 1)._lock = 0) : u = r, r < 0 && a._ts && (i -= r, (!n && !o._dp || n && n.smoothChildTiming) && (o._start += r / o._ts, o._time -= r, o._tTime -= r), o.shiftChildren(-r, !1, -1 / 0), u = 0), a._end > i && a._ts && (i = a._end), a = e;
                Yt(o, o === s && o._time > i ? o._time : i, 1, 1), o._dirty = 0
            }
            return o._tDur
        }, i.updateRoot = function(t) {
            if (s._ts && (mt(s, Pt(t, s)), p = be.frame), be.frame >= st) {
                st += m.autoSleep || 120;
                var e = s._first;
                if ((!e || !e._ts) && m.autoSleep && be._listeners.length < 2) {
                    for (; e && !e._ts;) e = e._next;
                    e || be.sleep()
                }
            }
        }, i
    }(Le);
    yt(Ne.prototype, {
        _lock: 0,
        _hasPause: 0,
        _forcing: 0
    });
    var Ie, ze, Xe = function(t, e, r, n, i, s, o) {
            var a, u, l, p, c, h, f, d, g = new ur(this._pt, t, e, 0, 1, rr, null, i),
                _ = 0,
                m = 0;
            for (g.b = r, g.e = n, r += "", (f = ~(n += "").indexOf("random(")) && (n = oe(n)), s && (s(d = [r, n], t, e), r = d[0], n = d[1]), u = r.match(X) || []; a = X.exec(n);) p = a[0], c = n.substring(_, a.index), l ? l = (l + 1) % 5 : "rgba(" === c.substr(-5) && (l = 1), p !== u[m++] && (h = parseFloat(u[m - 1]) || 0, g._pt = {
                _next: g._pt,
                p: c || 1 === m ? c : ",",
                s: h,
                c: "=" === p.charAt(1) ? dt(h, p) - h : parseFloat(p) - h,
                m: l && l < 4 ? Math.round : 0
            }, _ = X.lastIndex);
            return g.c = _ < n.length ? n.substring(_, n.length) : "", g.fp = o, (j.test(n) || f) && (g.e = 0), this._pt = g, g
        },
        je = function(t, e, r, n, i, s, o, a, u, l) {
            S(n) && (n = n(i || 0, t, s));
            var p, c = t[e],
                h = "get" !== r ? r : S(c) ? u ? t[e.indexOf("set") || !S(t["get" + e.substr(3)]) ? e : "get" + e.substr(3)](u) : t[e]() : c,
                f = S(c) ? u ? Ze : Qe : $e;
            if (T(n) && (~n.indexOf("random(") && (n = oe(n)), "=" === n.charAt(1) && ((p = dt(h, n) + ($t(h) || 0)) || 0 === p) && (n = p)), !l || h !== n || ze) return isNaN(h * n) || "" === n ? (!c && !(e in t) && W(e, n), Xe.call(this, t, e, h, n, f, a || m.stringFilter, u)) : (p = new ur(this._pt, t, e, +h || 0, n - (h || 0), "boolean" == typeof c ? er : tr, 0, f), u && (p.fp = u), o && p.modifier(o, this, t), this._pt = p)
        },
        Ye = function(t, e, r, n, i, s) {
            var o, a, u, l;
            if (nt[t] && !1 !== (o = new nt[t]).init(i, o.rawVars ? e[t] : function(t, e, r, n, i) {
                    if (S(t) && (t = Ve(t, i, e, r, n)), !O(t) || t.style && t.nodeType || L(t) || B(t)) return T(t) ? Ve(t, i, e, r, n) : t;
                    var s, o = {};
                    for (s in t) o[s] = Ve(t[s], i, e, r, n);
                    return o
                }(e[t], n, i, s, r), r, n, s) && (r._pt = a = new ur(r._pt, i, t, 0, 1, o.render, o, 0, o.priority), r !== c))
                for (u = r._ptLookup[r._targets.indexOf(i)], l = o._props.length; l--;) u[o._props[l]] = a;
            return o
        },
        qe = function t(e, i, o) {
            var a, u, l, p, c, h, f, d, g, _, m, x, b, w = e.vars,
                C = w.ease,
                F = w.startAt,
                E = w.immediateRender,
                T = w.lazy,
                S = w.onUpdate,
                M = w.runBackwards,
                A = w.yoyoEase,
                O = w.keyframes,
                P = w.autoRevert,
                k = e._dur,
                B = e._startAt,
                L = e._targets,
                N = e.parent,
                I = N && "nested" === N.data ? N.vars.targets : L,
                z = "auto" === e._overwrite && !r,
                X = e.timeline;
            if (X && (!O || !C) && (C = "none"), e._ease = Ae(C, D.ease), e._yEase = A ? Se(Ae(!0 === A ? C : A, D.ease)) : 0, A && e._yoyo && !e._repeat && (A = e._yEase, e._yEase = e._ease, e._ease = A), e._from = !X && !!w.runBackwards, !X || O && !w.stagger) {
                if (x = (d = L[0] ? lt(L[0]).harness : 0) && w[d.prop], a = wt(w, tt), B && (B._zTime < 0 && B.progress(1), i < 0 && M && E && !P ? B.render(-1, !0) : B.revert(M && k ? J : Z), B._lazy = 0), F) {
                    if (Tt(e._startAt = Ue.set(L, yt({
                            data: "isStart",
                            overwrite: !1,
                            parent: N,
                            immediateRender: !0,
                            lazy: !B && R(T),
                            startAt: null,
                            delay: 0,
                            onUpdate: S && function() {
                                return le(e, "onUpdate")
                            },
                            stagger: 0
                        }, F))), e._startAt._dp = 0, e._startAt._sat = e, i < 0 && (n || !E && !P) && e._startAt.revert(J), E && k && i <= 0 && o <= 0) return void(i && (e._zTime = i))
                } else if (M && k && !B)
                    if (i && (E = !1), l = yt({
                            overwrite: !1,
                            data: "isFromStart",
                            lazy: E && !B && R(T),
                            immediateRender: E,
                            stagger: 0,
                            parent: N
                        }, a), x && (l[d.prop] = x), Tt(e._startAt = Ue.set(L, l)), e._startAt._dp = 0, e._startAt._sat = e, i < 0 && (n ? e._startAt.revert(J) : e._startAt.render(-1, !0)), e._zTime = i, E) {
                        if (!i) return
                    } else t(e._startAt, y, y);
                for (e._pt = e._ptCache = 0, T = k && R(T) || T && !k, u = 0; u < L.length; u++) {
                    if (f = (c = L[u])._gsap || ut(L)[u]._gsap, e._ptLookup[u] = _ = {}, rt[f.id] && et.length && _t(), m = I === L ? u : I.indexOf(c), d && !1 !== (g = new d).init(c, x || a, e, m, I) && (e._pt = p = new ur(e._pt, c, g.name, 0, 1, g.render, g, 0, g.priority), g._props.forEach((function(t) {
                            _[t] = p
                        })), g.priority && (h = 1)), !d || x)
                        for (l in a) nt[l] && (g = Ye(l, a, e, m, c, I)) ? g.priority && (h = 1) : _[l] = p = je.call(e, c, l, "get", a[l], m, I, 0, w.stringFilter);
                    e._op && e._op[u] && e.kill(c, e._op[u]), z && e._pt && (Ie = e, s.killTweensOf(c, _, e.globalTime(i)), b = !e.parent, Ie = 0), e._pt && T && (rt[f.id] = 1)
                }
                h && ar(e), e._onInit && e._onInit(e)
            }
            e._onUpdate = S, e._initted = (!e._op || e._pt) && !b, O && i <= 0 && X.render(v, !0, !0)
        },
        Ge = function(t, e, r, n) {
            var i, s, o = e.ease || n || "power1.inOut";
            if (L(e)) s = r[t] || (r[t] = []), e.forEach((function(t, r) {
                return s.push({
                    t: r / (e.length - 1) * 100,
                    v: t,
                    e: o
                })
            }));
            else
                for (i in e) s = r[i] || (r[i] = []), "ease" === i || s.push({
                    t: parseFloat(t),
                    v: e[i],
                    e: o
                })
        },
        Ve = function(t, e, r, n, i) {
            return S(t) ? t.call(e, r, n, i) : T(t) && ~t.indexOf("random(") ? oe(t) : t
        },
        He = at + "repeat,repeatDelay,yoyo,repeatRefresh,yoyoEase,autoRevert",
        We = {};
    ct(He + ",id,stagger,delay,duration,paused,scrollTrigger", (function(t) {
        return We[t] = 1
    }));
    var Ue = function(i) {
        function o(e, n, o, a) {
            var u;
            "number" == typeof n && (o.duration = n, n = o, o = null);
            var l, p, c, h, f, d, g, _, D = (u = i.call(this, a ? n : Ct(n)) || this).vars,
                v = D.duration,
                y = D.delay,
                x = D.immediateRender,
                b = D.stagger,
                w = D.overwrite,
                C = D.keyframes,
                F = D.defaults,
                E = D.scrollTrigger,
                T = D.yoyoEase,
                S = n.parent || s,
                A = (L(e) || B(e) ? M(e[0]) : "length" in n) ? [e] : Jt(e);
            if (u._targets = A.length ? ut(A) : U("GSAP target " + e + " not found. https://gsap.com", !m.nullTargetWarn) || [], u._ptLookup = [], u._overwrite = w, C || b || k(v) || k(y)) {
                if (n = u.vars, (l = u.timeline = new Ne({
                        data: "nested",
                        defaults: F || {},
                        targets: S && "nested" === S.data ? S.vars.targets : A
                    })).kill(), l.parent = l._dp = t(u), l._start = 0, b || k(v) || k(y)) {
                    if (h = A.length, g = b && ee(b), O(b))
                        for (f in b) ~He.indexOf(f) && (_ || (_ = {}), _[f] = b[f]);
                    for (p = 0; p < h; p++)(c = wt(n, We)).stagger = 0, T && (c.yoyoEase = T), _ && xt(c, _), d = A[p], c.duration = +Ve(v, t(u), p, d, A), c.delay = (+Ve(y, t(u), p, d, A) || 0) - u._delay, !b && 1 === h && c.delay && (u._delay = y = c.delay, u._start += y, c.delay = 0), l.to(d, c, g ? g(p, d, A) : 0), l._ease = Ce.none;
                    l.duration() ? v = y = 0 : u.timeline = 0
                } else if (C) {
                    Ct(yt(l.vars.defaults, {
                        ease: "none"
                    })), l._ease = Ae(C.ease || n.ease || "none");
                    var P, N, I, z = 0;
                    if (L(C)) C.forEach((function(t) {
                        return l.to(A, t, ">")
                    })), l.duration();
                    else {
                        for (f in c = {}, C) "ease" === f || "easeEach" === f || Ge(f, C[f], c, C.easeEach);
                        for (f in c)
                            for (P = c[f].sort((function(t, e) {
                                    return t.t - e.t
                                })), z = 0, p = 0; p < P.length; p++)(I = {
                                ease: (N = P[p]).e,
                                duration: (N.t - (p ? P[p - 1].t : 0)) / 100 * v
                            })[f] = N.v, l.to(A, I, z), z += I.duration;
                        l.duration() < v && l.to({}, {
                            duration: v - l.duration()
                        })
                    }
                }
                v || u.duration(v = l.duration())
            } else u.timeline = 0;
            return !0 !== w || r || (Ie = t(u), s.killTweensOf(A), Ie = 0), Nt(S, t(u), o), n.reversed && u.reverse(), n.paused && u.paused(!0), (x || !v && !C && u._start === ft(S._time) && R(x) && At(t(u)) && "nested" !== S.data) && (u._tTime = -1e-8, u.render(Math.max(0, -y) || 0)), E && It(t(u), E), u
        }
        e(o, i);
        var a = o.prototype;
        return a.render = function(t, e, r) {
            var i, s, o, a, u, l, p, c, h, f = this._time,
                d = this._tDur,
                g = this._dur,
                _ = t < 0,
                m = t > d - y && !_ ? d : t < y ? 0 : t;
            if (g) {
                if (m !== this._tTime || !t || r || !this._initted && this._tTime || this._startAt && this._zTime < 0 !== _) {
                    if (i = m, c = this.timeline, this._repeat) {
                        if (a = g + this._rDelay, this._repeat < -1 && _) return this.totalTime(100 * a + t, e, r);
                        if (i = ft(m % a), m === d ? (o = this._repeat, i = g) : ((o = ~~(m / a)) && o === ft(m / a) && (i = g, o--), i > g && (i = g)), (l = this._yoyo && 1 & o) && (h = this._yEase, i = g - i), u = Rt(this._tTime, a), i === f && !r && this._initted && o === u) return this._tTime = m, this;
                        o !== u && (c && this._yEase && Me(c, l), this.vars.repeatRefresh && !l && !this._lock && this._time !== a && this._initted && (this._lock = r = 1, this.render(ft(a * o), !0).invalidate()._lock = 0))
                    }
                    if (!this._initted) {
                        if (zt(this, _ ? t : i, r, e, m)) return this._tTime = 0, this;
                        if (!(f === this._time || r && this.vars.repeatRefresh && o !== u)) return this;
                        if (g !== this._dur) return this.render(t, e, r)
                    }
                    if (this._tTime = m, this._time = i, !this._act && this._ts && (this._act = 1, this._lazy = 0), this.ratio = p = (h || this._ease)(i / g), this._from && (this.ratio = p = 1 - p), i && !f && !e && !o && (le(this, "onStart"), this._tTime !== m)) return this;
                    for (s = this._pt; s;) s.r(p, s.d), s = s._next;
                    c && c.render(t < 0 ? t : c._dur * c._ease(i / this._dur), e, r) || this._startAt && (this._zTime = t), this._onUpdate && !e && (_ && Mt(this, t, 0, r), le(this, "onUpdate")), this._repeat && o !== u && this.vars.onRepeat && !e && this.parent && le(this, "onRepeat"), m !== this._tDur && m || this._tTime !== m || (_ && !this._onUpdate && Mt(this, t, 0, !0), (t || !g) && (m === this._tDur && this._ts > 0 || !m && this._ts < 0) && Tt(this, 1), e || _ && !f || !(m || f || l) || (le(this, m === d ? "onComplete" : "onReverseComplete", !0), this._prom && !(m < d && this.timeScale() > 0) && this._prom()))
                }
            } else ! function(t, e, r, i) {
                var s, o, a, u = t.ratio,
                    l = e < 0 || !e && (!t._start && Xt(t) && (t._initted || !jt(t)) || (t._ts < 0 || t._dp._ts < 0) && !jt(t)) ? 0 : 1,
                    p = t._rDelay,
                    c = 0;
                if (p && t._repeat && (c = Ut(0, t._tDur, e), o = Rt(c, p), t._yoyo && 1 & o && (l = 1 - l), o !== Rt(t._tTime, p) && (u = 1 - l, t.vars.repeatRefresh && t._initted && t.invalidate())), l !== u || n || i || t._zTime === y || !e && t._zTime) {
                    if (!t._initted && zt(t, e, i, r, c)) return;
                    for (a = t._zTime, t._zTime = e || (r ? y : 0), r || (r = e && !a), t.ratio = l, t._from && (l = 1 - l), t._time = 0, t._tTime = c, s = t._pt; s;) s.r(l, s.d), s = s._next;
                    e < 0 && Mt(t, e, 0, !0), t._onUpdate && !r && le(t, "onUpdate"), c && t._repeat && !r && t.parent && le(t, "onRepeat"), (e >= t._tDur || e < 0) && t.ratio === l && (l && Tt(t, 1), r || n || (le(t, l ? "onComplete" : "onReverseComplete", !0), t._prom && t._prom()))
                } else t._zTime || (t._zTime = e)
            }(this, t, e, r);
            return this
        }, a.targets = function() {
            return this._targets
        }, a.invalidate = function(t) {
            return (!t || !this.vars.runBackwards) && (this._startAt = 0), this._pt = this._op = this._onUpdate = this._lazy = this.ratio = 0, this._ptLookup = [], this.timeline && this.timeline.invalidate(t), i.prototype.invalidate.call(this, t)
        }, a.resetTo = function(t, e, r, n, i) {
            h || be.wake(), this._ts || this.play();
            var s = Math.min(this._dur, (this._dp._time - this._start) * this._ts);
            return this._initted || qe(this, s),
                function(t, e, r, n, i, s, o, a) {
                    var u, l, p, c, h = (t._pt && t._ptCache || (t._ptCache = {}))[e];
                    if (!h)
                        for (h = t._ptCache[e] = [], p = t._ptLookup, c = t._targets.length; c--;) {
                            if ((u = p[c][e]) && u.d && u.d._pt)
                                for (u = u.d._pt; u && u.p !== e && u.fp !== e;) u = u._next;
                            if (!u) return ze = 1, t.vars[e] = "+=0", qe(t, o), ze = 0, a ? U(e + " not eligible for reset") : 1;
                            h.push(u)
                        }
                    for (c = h.length; c--;)(u = (l = h[c])._pt || l).s = !n && 0 !== n || i ? u.s + (n || 0) + s * u.c : n, u.c = r - u.s, l.e && (l.e = ht(r) + $t(l.e)), l.b && (l.b = u.s + $t(l.b))
                }(this, t, e, r, n, this._ease(s / this._dur), s, i) ? this.resetTo(t, e, r, n, 1) : (Bt(this, 0), this.parent || Ft(this._dp, this, "_first", "_last", this._dp._sort ? "_start" : 0), this.render(0))
        }, a.kill = function(t, e) {
            if (void 0 === e && (e = "all"), !(t || e && "all" !== e)) return this._lazy = this._pt = 0, this.parent ? pe(this) : this;
            if (this.timeline) {
                var r = this.timeline.totalDuration();
                return this.timeline.killTweensOf(t, e, Ie && !0 !== Ie.vars.overwrite)._first || pe(this), this.parent && r !== this.timeline.totalDuration() && Yt(this, this._dur * this.timeline._tDur / r, 0, 1), this
            }
            var n, i, s, o, a, u, l, p = this._targets,
                c = t ? Jt(t) : p,
                h = this._ptLookup,
                f = this._pt;
            if ((!e || "all" === e) && function(t, e) {
                    for (var r = t.length, n = r === e.length; n && r-- && t[r] === e[r];);
                    return r < 0
                }(p, c)) return "all" === e && (this._pt = 0), pe(this);
            for (n = this._op = this._op || [], "all" !== e && (T(e) && (a = {}, ct(e, (function(t) {
                    return a[t] = 1
                })), e = a), e = function(t, e) {
                    var r, n, i, s, o = t[0] ? lt(t[0]).harness : 0,
                        a = o && o.aliases;
                    if (!a) return e;
                    for (n in r = xt({}, e), a)
                        if (n in r)
                            for (i = (s = a[n].split(",")).length; i--;) r[s[i]] = r[n];
                    return r
                }(p, e)), l = p.length; l--;)
                if (~c.indexOf(p[l]))
                    for (a in i = h[l], "all" === e ? (n[l] = e, o = i, s = {}) : (s = n[l] = n[l] || {}, o = e), o)(u = i && i[a]) && ("kill" in u.d && !0 !== u.d.kill(a) || Et(this, u, "_pt"), delete i[a]), "all" !== s && (s[a] = 1);
            return this._initted && !this._pt && f && pe(this), this
        }, o.to = function(t, e) {
            return new o(t, e, arguments[2])
        }, o.from = function(t, e) {
            return Ht(1, arguments)
        }, o.delayedCall = function(t, e, r, n) {
            return new o(e, 0, {
                immediateRender: !1,
                lazy: !1,
                overwrite: !1,
                delay: t,
                onComplete: e,
                onReverseComplete: e,
                onCompleteParams: r,
                onReverseCompleteParams: r,
                callbackScope: n
            })
        }, o.fromTo = function(t, e, r) {
            return Ht(2, arguments)
        }, o.set = function(t, e) {
            return e.duration = 0, e.repeatDelay || (e.repeat = 0), new o(t, e)
        }, o.killTweensOf = function(t, e, r) {
            return s.killTweensOf(t, e, r)
        }, o
    }(Le);
    yt(Ue.prototype, {
        _targets: [],
        _lazy: 0,
        _startAt: 0,
        _op: 0,
        _onInit: 0
    }), ct("staggerTo,staggerFrom,staggerFromTo", (function(t) {
        Ue[t] = function() {
            var e = new Ne,
                r = Qt.call(arguments, 0);
            return r.splice("staggerFromTo" === t ? 5 : 4, 0, 0), e[t].apply(e, r)
        }
    }));
    var $e = function(t, e, r) {
            return t[e] = r
        },
        Qe = function(t, e, r) {
            return t[e](r)
        },
        Ze = function(t, e, r, n) {
            return t[e](n.fp, r)
        },
        Je = function(t, e, r) {
            return t.setAttribute(e, r)
        },
        Ke = function(t, e) {
            return S(t[e]) ? Qe : A(t[e]) && t.setAttribute ? Je : $e
        },
        tr = function(t, e) {
            return e.set(e.t, e.p, Math.round(1e6 * (e.s + e.c * t)) / 1e6, e)
        },
        er = function(t, e) {
            return e.set(e.t, e.p, !!(e.s + e.c * t), e)
        },
        rr = function(t, e) {
            var r = e._pt,
                n = "";
            if (!t && e.b) n = e.b;
            else if (1 === t && e.e) n = e.e;
            else {
                for (; r;) n = r.p + (r.m ? r.m(r.s + r.c * t) : Math.round(1e4 * (r.s + r.c * t)) / 1e4) + n, r = r._next;
                n += e.c
            }
            e.set(e.t, e.p, n, e)
        },
        nr = function(t, e) {
            for (var r = e._pt; r;) r.r(t, r.d), r = r._next
        },
        ir = function(t, e, r, n) {
            for (var i, s = this._pt; s;) i = s._next, s.p === n && s.modifier(t, e, r), s = i
        },
        sr = function(t) {
            for (var e, r, n = this._pt; n;) r = n._next, n.p === t && !n.op || n.op === t ? Et(this, n, "_pt") : n.dep || (e = 1), n = r;
            return !e
        },
        or = function(t, e, r, n) {
            n.mSet(t, e, n.m.call(n.tween, r, n.mt), n)
        },
        ar = function(t) {
            for (var e, r, n, i, s = t._pt; s;) {
                for (e = s._next, r = n; r && r.pr > s.pr;) r = r._next;
                (s._prev = r ? r._prev : i) ? s._prev._next = s: n = s, (s._next = r) ? r._prev = s : i = s, s = e
            }
            t._pt = n
        },
        ur = function() {
            function t(t, e, r, n, i, s, o, a, u) {
                this.t = e, this.s = n, this.c = i, this.p = r, this.r = s || tr, this.d = o || this, this.set = a || $e, this.pr = u || 0, this._next = t, t && (t._prev = this)
            }
            return t.prototype.modifier = function(t, e, r) {
                this.mSet = this.mSet || this.set, this.set = or, this.m = t, this.mt = r, this.tween = e
            }, t
        }();
    ct(at + "parent,duration,ease,delay,overwrite,runBackwards,startAt,yoyo,immediateRender,repeat,repeatDelay,data,paused,reversed,lazy,callbackScope,stringFilter,id,yoyoEase,stagger,inherit,repeatRefresh,keyframes,autoRevert,scrollTrigger", (function(t) {
        return tt[t] = 1
    })), G.TweenMax = G.TweenLite = Ue, G.TimelineLite = G.TimelineMax = Ne, s = new Ne({
        sortChildren: !1,
        defaults: D,
        autoRemoveChildren: !0,
        id: "root",
        smoothChildTiming: !0
    }), m.stringFilter = xe;
    var lr = [],
        pr = {},
        cr = [],
        hr = 0,
        fr = 0,
        dr = function(t) {
            return (pr[t] || cr).map((function(t) {
                return t()
            }))
        },
        gr = function() {
            var t = Date.now(),
                e = [];
            t - hr > 2 && (dr("matchMediaInit"), lr.forEach((function(t) {
                var r, n, i, s, a = t.queries,
                    u = t.conditions;
                for (n in a)(r = o.matchMedia(a[n]).matches) && (i = 1), r !== u[n] && (u[n] = r, s = 1);
                s && (t.revert(), i && e.push(t))
            })), dr("matchMediaRevert"), e.forEach((function(t) {
                return t.onMatch(t, (function(e) {
                    return t.add(null, e)
                }))
            })), hr = t, dr("matchMedia"))
        },
        _r = function() {
            function t(t, e) {
                this.selector = e && Kt(e), this.data = [], this._r = [], this.isReverted = !1, this.id = fr++, t && this.add(t)
            }
            var e = t.prototype;
            return e.add = function(t, e, r) {
                S(t) && (r = e, e = t, t = S);
                var n = this,
                    s = function() {
                        var t, s = i,
                            o = n.selector;
                        return s && s !== n && s.data.push(n), r && (n.selector = Kt(r)), i = n, t = e.apply(n, arguments), S(t) && n._r.push(t), i = s, n.selector = o, n.isReverted = !1, t
                    };
                return n.last = s, t === S ? s(n, (function(t) {
                    return n.add(null, t)
                })) : t ? n[t] = s : s
            }, e.ignore = function(t) {
                var e = i;
                i = null, t(this), i = e
            }, e.getTweens = function() {
                var e = [];
                return this.data.forEach((function(r) {
                    return r instanceof t ? e.push.apply(e, r.getTweens()) : r instanceof Ue && !(r.parent && "nested" === r.parent.data) && e.push(r)
                })), e
            }, e.clear = function() {
                this._r.length = this.data.length = 0
            }, e.kill = function(t, e) {
                var r = this;
                if (t ? function() {
                        for (var e, n = r.getTweens(), i = r.data.length; i--;) "isFlip" === (e = r.data[i]).data && (e.revert(), e.getChildren(!0, !0, !1).forEach((function(t) {
                            return n.splice(n.indexOf(t), 1)
                        })));
                        for (n.map((function(t) {
                                return {
                                    g: t._dur || t._delay || t._sat && !t._sat.vars.immediateRender ? t.globalTime(0) : -1 / 0,
                                    t: t
                                }
                            })).sort((function(t, e) {
                                return e.g - t.g || -1 / 0
                            })).forEach((function(e) {
                                return e.t.revert(t)
                            })), i = r.data.length; i--;)(e = r.data[i]) instanceof Ne ? "nested" !== e.data && (e.scrollTrigger && e.scrollTrigger.revert(), e.kill()) : !(e instanceof Ue) && e.revert && e.revert(t);
                        r._r.forEach((function(e) {
                            return e(t, r)
                        })), r.isReverted = !0
                    }() : this.data.forEach((function(t) {
                        return t.kill && t.kill()
                    })), this.clear(), e)
                    for (var n = lr.length; n--;) lr[n].id === this.id && lr.splice(n, 1)
            }, e.revert = function(t) {
                this.kill(t || {})
            }, t
        }(),
        mr = function() {
            function t(t) {
                this.contexts = [], this.scope = t, i && i.data.push(this)
            }
            var e = t.prototype;
            return e.add = function(t, e, r) {
                O(t) || (t = {
                    matches: t
                });
                var n, s, a, u = new _r(0, r || this.scope),
                    l = u.conditions = {};
                for (s in i && !u.selector && (u.selector = i.selector), this.contexts.push(u), e = u.add("onMatch", e), u.queries = t, t) "all" === s ? a = 1 : (n = o.matchMedia(t[s])) && (lr.indexOf(u) < 0 && lr.push(u), (l[s] = n.matches) && (a = 1), n.addListener ? n.addListener(gr) : n.addEventListener("change", gr));
                return a && e(u, (function(t) {
                    return u.add(null, t)
                })), this
            }, e.revert = function(t) {
                this.kill(t || {})
            }, e.kill = function(t) {
                this.contexts.forEach((function(e) {
                    return e.kill(t, !0)
                }))
            }, t
        }(),
        Dr = {
            registerPlugin: function() {
                for (var t = arguments.length, e = new Array(t), r = 0; r < t; r++) e[r] = arguments[r];
                e.forEach((function(t) {
                    return he(t)
                }))
            },
            timeline: function(t) {
                return new Ne(t)
            },
            getTweensOf: function(t, e) {
                return s.getTweensOf(t, e)
            },
            getProperty: function(t, e, r, n) {
                T(t) && (t = Jt(t)[0]);
                var i = lt(t || {}).get,
                    s = r ? vt : Dt;
                return "native" === r && (r = ""), t ? e ? s((nt[e] && nt[e].get || i)(t, e, r, n)) : function(e, r, n) {
                    return s((nt[e] && nt[e].get || i)(t, e, r, n))
                } : t
            },
            quickSetter: function(t, e, r) {
                if ((t = Jt(t)).length > 1) {
                    var n = t.map((function(t) {
                            return xr.quickSetter(t, e, r)
                        })),
                        i = n.length;
                    return function(t) {
                        for (var e = i; e--;) n[e](t)
                    }
                }
                t = t[0] || {};
                var s = nt[e],
                    o = lt(t),
                    a = o.harness && (o.harness.aliases || {})[e] || e,
                    u = s ? function(e) {
                        var n = new s;
                        c._pt = 0, n.init(t, r ? e + r : e, c, 0, [t]), n.render(1, n), c._pt && nr(1, c)
                    } : o.set(t, a);
                return s ? u : function(e) {
                    return u(t, a, r ? e + r : e, o, 1)
                }
            },
            quickTo: function(t, e, r) {
                var n, i = xr.to(t, xt(((n = {})[e] = "+=0.1", n.paused = !0, n), r || {})),
                    s = function(t, r, n) {
                        return i.resetTo(e, t, r, n)
                    };
                return s.tween = i, s
            },
            isTweening: function(t) {
                return s.getTweensOf(t, !0).length > 0
            },
            defaults: function(t) {
                return t && t.ease && (t.ease = Ae(t.ease, D.ease)), bt(D, t || {})
            },
            config: function(t) {
                return bt(m, t || {})
            },
            registerEffect: function(t) {
                var e = t.name,
                    r = t.effect,
                    n = t.plugins,
                    i = t.defaults,
                    s = t.extendTimeline;
                (n || "").split(",").forEach((function(t) {
                    return t && !nt[t] && !G[t] && U(e + " effect requires " + t + " plugin.")
                })), it[e] = function(t, e, n) {
                    return r(Jt(t), yt(e || {}, i), n)
                }, s && (Ne.prototype[e] = function(t, r, n) {
                    return this.add(it[e](t, O(r) ? r : (n = r) && {}, this), n)
                })
            },
            registerEase: function(t, e) {
                Ce[t] = Ae(e)
            },
            parseEase: function(t, e) {
                return arguments.length ? Ae(t, e) : Ce
            },
            getById: function(t) {
                return s.getById(t)
            },
            exportRoot: function(t, e) {
                void 0 === t && (t = {});
                var r, n, i = new Ne(t);
                for (i.smoothChildTiming = R(t.smoothChildTiming), s.remove(i), i._dp = 0, i._time = i._tTime = s._time, r = s._first; r;) n = r._next, !e && !r._dur && r instanceof Ue && r.vars.onComplete === r._targets[0] || Nt(i, r, r._start - r._delay), r = n;
                return Nt(s, i, 0), i
            },
            context: function(t, e) {
                return t ? new _r(t, e) : i
            },
            matchMedia: function(t) {
                return new mr(t)
            },
            matchMediaRefresh: function() {
                return lr.forEach((function(t) {
                    var e, r, n = t.conditions;
                    for (r in n) n[r] && (n[r] = !1, e = 1);
                    e && t.revert()
                })) || gr()
            },
            addEventListener: function(t, e) {
                var r = pr[t] || (pr[t] = []);
                ~r.indexOf(e) || r.push(e)
            },
            removeEventListener: function(t, e) {
                var r = pr[t],
                    n = r && r.indexOf(e);
                n >= 0 && r.splice(n, 1)
            },
            utils: {
                wrap: function t(e, r, n) {
                    var i = r - e;
                    return L(e) ? se(e, t(0, e.length), r) : Wt(n, (function(t) {
                        return (i + (t - e) % i) % i + e
                    }))
                },
                wrapYoyo: function t(e, r, n) {
                    var i = r - e,
                        s = 2 * i;
                    return L(e) ? se(e, t(0, e.length - 1), r) : Wt(n, (function(t) {
                        return e + ((t = (s + (t - e) % s) % s || 0) > i ? s - t : t)
                    }))
                },
                distribute: ee,
                random: ie,
                snap: ne,
                normalize: function(t, e, r) {
                    return ae(t, e, 0, 1, r)
                },
                getUnit: $t,
                clamp: function(t, e, r) {
                    return Wt(r, (function(r) {
                        return Ut(t, e, r)
                    }))
                },
                splitColor: _e,
                toArray: Jt,
                selector: Kt,
                mapRange: ae,
                pipe: function() {
                    for (var t = arguments.length, e = new Array(t), r = 0; r < t; r++) e[r] = arguments[r];
                    return function(t) {
                        return e.reduce((function(t, e) {
                            return e(t)
                        }), t)
                    }
                },
                unitize: function(t, e) {
                    return function(r) {
                        return t(parseFloat(r)) + (e || $t(r))
                    }
                },
                interpolate: function t(e, r, n, i) {
                    var s = isNaN(e + r) ? 0 : function(t) {
                        return (1 - t) * e + t * r
                    };
                    if (!s) {
                        var o, a, u, l, p, c = T(e),
                            h = {};
                        if (!0 === n && (i = 1) && (n = null), c) e = {
                            p: e
                        }, r = {
                            p: r
                        };
                        else if (L(e) && !L(r)) {
                            for (u = [], l = e.length, p = l - 2, a = 1; a < l; a++) u.push(t(e[a - 1], e[a]));
                            l--, s = function(t) {
                                t *= l;
                                var e = Math.min(p, ~~t);
                                return u[e](t - e)
                            }, n = r
                        } else i || (e = xt(L(e) ? [] : {}, e));
                        if (!u) {
                            for (o in r) je.call(h, e, o, "get", r[o]);
                            s = function(t) {
                                return nr(t, h) || (c ? e.p : e)
                            }
                        }
                    }
                    return Wt(n, s)
                },
                shuffle: te
            },
            install: H,
            effects: it,
            ticker: be,
            updateRoot: Ne.updateRoot,
            plugins: nt,
            globalTimeline: s,
            core: {
                PropTween: ur,
                globals: $,
                Tween: Ue,
                Timeline: Ne,
                Animation: Le,
                getCache: lt,
                _removeLinkedListItem: Et,
                reverting: function() {
                    return n
                },
                context: function(t) {
                    return t && i && (i.data.push(t), t._ctx = i), i
                },
                suppressOverwrites: function(t) {
                    return r = t
                }
            }
        };
    ct("to,from,fromTo,delayedCall,set,killTweensOf", (function(t) {
        return Dr[t] = Ue[t]
    })), be.add(Ne.updateRoot), c = Dr.to({}, {
        duration: 0
    });
    var vr = function(t, e) {
            for (var r = t._pt; r && r.p !== e && r.op !== e && r.fp !== e;) r = r._next;
            return r
        },
        yr = function(t, e) {
            return {
                name: t,
                rawVars: 1,
                init: function(t, r, n) {
                    n._onInit = function(t) {
                        var n, i;
                        if (T(r) && (n = {}, ct(r, (function(t) {
                                return n[t] = 1
                            })), r = n), e) {
                            for (i in n = {}, r) n[i] = e(r[i]);
                            r = n
                        }! function(t, e) {
                            var r, n, i, s = t._targets;
                            for (r in e)
                                for (n = s.length; n--;)(i = t._ptLookup[n][r]) && (i = i.d) && (i._pt && (i = vr(i, r)), i && i.modifier && i.modifier(e[r], t, s[n], r))
                        }(t, r)
                    }
                }
            }
        },
        xr = Dr.registerPlugin({
            name: "attr",
            init: function(t, e, r, n, i) {
                var s, o, a;
                for (s in this.tween = r, e) a = t.getAttribute(s) || "", (o = this.add(t, "setAttribute", (a || 0) + "", e[s], n, i, 0, 0, s)).op = s, o.b = a, this._props.push(s)
            },
            render: function(t, e) {
                for (var r = e._pt; r;) n ? r.set(r.t, r.p, r.b, r) : r.r(t, r.d), r = r._next
            }
        }, {
            name: "endArray",
            init: function(t, e) {
                for (var r = e.length; r--;) this.add(t, r, t[r] || 0, e[r], 0, 0, 0, 0, 0, 1)
            }
        }, yr("roundProps", re), yr("modifiers"), yr("snap", ne)) || Dr;
    Ue.version = Ne.version = xr.version = "3.12.5", l = 1, P() && we(), Ce.Power0, Ce.Power1, Ce.Power2, Ce.Power3, Ce.Power4, Ce.Linear, Ce.Quad, Ce.Cubic, Ce.Quart, Ce.Quint, Ce.Strong, Ce.Elastic, Ce.Back, Ce.SteppedEase, Ce.Bounce, Ce.Sine, Ce.Expo, Ce.Circ;
    var br, wr, Cr, Fr, Er, Tr, Sr, Mr, Ar = {},
        Or = 180 / Math.PI,
        Rr = Math.PI / 180,
        Pr = Math.atan2,
        kr = /([A-Z])/g,
        Br = /(left|right|width|margin|padding|x)/i,
        Lr = /[\s,\(]\S/,
        Nr = {
            autoAlpha: "opacity,visibility",
            scale: "scaleX,scaleY",
            alpha: "opacity"
        },
        Ir = function(t, e) {
            return e.set(e.t, e.p, Math.round(1e4 * (e.s + e.c * t)) / 1e4 + e.u, e)
        },
        zr = function(t, e) {
            return e.set(e.t, e.p, 1 === t ? e.e : Math.round(1e4 * (e.s + e.c * t)) / 1e4 + e.u, e)
        },
        Xr = function(t, e) {
            return e.set(e.t, e.p, t ? Math.round(1e4 * (e.s + e.c * t)) / 1e4 + e.u : e.b, e)
        },
        jr = function(t, e) {
            var r = e.s + e.c * t;
            e.set(e.t, e.p, ~~(r + (r < 0 ? -.5 : .5)) + e.u, e)
        },
        Yr = function(t, e) {
            return e.set(e.t, e.p, t ? e.e : e.b, e)
        },
        qr = function(t, e) {
            return e.set(e.t, e.p, 1 !== t ? e.b : e.e, e)
        },
        Gr = function(t, e, r) {
            return t.style[e] = r
        },
        Vr = function(t, e, r) {
            return t.style.setProperty(e, r)
        },
        Hr = function(t, e, r) {
            return t._gsap[e] = r
        },
        Wr = function(t, e, r) {
            return t._gsap.scaleX = t._gsap.scaleY = r
        },
        Ur = function(t, e, r, n, i) {
            var s = t._gsap;
            s.scaleX = s.scaleY = r, s.renderTransform(i, s)
        },
        $r = function(t, e, r, n, i) {
            var s = t._gsap;
            s[e] = r, s.renderTransform(i, s)
        },
        Qr = "transform",
        Zr = Qr + "Origin",
        Jr = function t(e, r) {
            var n = this,
                i = this.target,
                s = i.style,
                o = i._gsap;
            if (e in Ar && s) {
                if (this.tfm = this.tfm || {}, "transform" === e) return Nr.transform.split(",").forEach((function(e) {
                    return t.call(n, e, r)
                }));
                if (~(e = Nr[e] || e).indexOf(",") ? e.split(",").forEach((function(t) {
                        return n.tfm[t] = mn(i, t)
                    })) : this.tfm[e] = o.x ? o[e] : mn(i, e), e === Zr && (this.tfm.zOrigin = o.zOrigin), this.props.indexOf(Qr) >= 0) return;
                o.svg && (this.svgo = i.getAttribute("data-svg-origin"), this.props.push(Zr, r, "")), e = Qr
            }(s || r) && this.props.push(e, r, s[e])
        },
        Kr = function(t) {
            t.translate && (t.removeProperty("translate"), t.removeProperty("scale"), t.removeProperty("rotate"))
        },
        tn = function() {
            var t, e, r = this.props,
                n = this.target,
                i = n.style,
                s = n._gsap;
            for (t = 0; t < r.length; t += 3) r[t + 1] ? n[r[t]] = r[t + 2] : r[t + 2] ? i[r[t]] = r[t + 2] : i.removeProperty("--" === r[t].substr(0, 2) ? r[t] : r[t].replace(kr, "-$1").toLowerCase());
            if (this.tfm) {
                for (e in this.tfm) s[e] = this.tfm[e];
                s.svg && (s.renderTransform(), n.setAttribute("data-svg-origin", this.svgo || "")), (t = Sr()) && t.isStart || i[Qr] || (Kr(i), s.zOrigin && i[Zr] && (i[Zr] += " " + s.zOrigin + "px", s.zOrigin = 0, s.renderTransform()), s.uncache = 1)
            }
        },
        en = function(t, e) {
            var r = {
                target: t,
                props: [],
                revert: tn,
                save: Jr
            };
            return t._gsap || xr.core.getCache(t), e && e.split(",").forEach((function(t) {
                return r.save(t)
            })), r
        },
        rn = function(t, e) {
            var r = wr.createElementNS ? wr.createElementNS((e || "http://www.w3.org/1999/xhtml").replace(/^https/, "http"), t) : wr.createElement(t);
            return r && r.style ? r : wr.createElement(t)
        },
        nn = function t(e, r, n) {
            var i = getComputedStyle(e);
            return i[r] || i.getPropertyValue(r.replace(kr, "-$1").toLowerCase()) || i.getPropertyValue(r) || !n && t(e, on(r) || r, 1) || ""
        },
        sn = "O,Moz,ms,Ms,Webkit".split(","),
        on = function(t, e, r) {
            var n = (e || Er).style,
                i = 5;
            if (t in n && !r) return t;
            for (t = t.charAt(0).toUpperCase() + t.substr(1); i-- && !(sn[i] + t in n););
            return i < 0 ? null : (3 === i ? "ms" : i >= 0 ? sn[i] : "") + t
        },
        an = function() {
            "undefined" != typeof window && window.document && (br = window, wr = br.document, Cr = wr.documentElement, Er = rn("div") || {
                style: {}
            }, rn("div"), Qr = on(Qr), Zr = Qr + "Origin", Er.style.cssText = "border-width:0;line-height:0;position:absolute;padding:0", Mr = !!on("perspective"), Sr = xr.core.reverting, Fr = 1)
        },
        un = function t(e) {
            var r, n = rn("svg", this.ownerSVGElement && this.ownerSVGElement.getAttribute("xmlns") || "http://www.w3.org/2000/svg"),
                i = this.parentNode,
                s = this.nextSibling,
                o = this.style.cssText;
            if (Cr.appendChild(n), n.appendChild(this), this.style.display = "block", e) try {
                r = this.getBBox(), this._gsapBBox = this.getBBox, this.getBBox = t
            } catch (t) {} else this._gsapBBox && (r = this._gsapBBox());
            return i && (s ? i.insertBefore(this, s) : i.appendChild(this)), Cr.removeChild(n), this.style.cssText = o, r
        },
        ln = function(t, e) {
            for (var r = e.length; r--;)
                if (t.hasAttribute(e[r])) return t.getAttribute(e[r])
        },
        pn = function(t) {
            var e;
            try {
                e = t.getBBox()
            } catch (r) {
                e = un.call(t, !0)
            }
            return e && (e.width || e.height) || t.getBBox === un || (e = un.call(t, !0)), !e || e.width || e.x || e.y ? e : {
                x: +ln(t, ["x", "cx", "x1"]) || 0,
                y: +ln(t, ["y", "cy", "y1"]) || 0,
                width: 0,
                height: 0
            }
        },
        cn = function(t) {
            return !(!t.getCTM || t.parentNode && !t.ownerSVGElement || !pn(t))
        },
        hn = function(t, e) {
            if (e) {
                var r, n = t.style;
                e in Ar && e !== Zr && (e = Qr), n.removeProperty ? ("ms" !== (r = e.substr(0, 2)) && "webkit" !== e.substr(0, 6) || (e = "-" + e), n.removeProperty("--" === r ? e : e.replace(kr, "-$1").toLowerCase())) : n.removeAttribute(e)
            }
        },
        fn = function(t, e, r, n, i, s) {
            var o = new ur(t._pt, e, r, 0, 1, s ? qr : Yr);
            return t._pt = o, o.b = n, o.e = i, t._props.push(r), o
        },
        dn = {
            deg: 1,
            rad: 1,
            turn: 1
        },
        gn = {
            grid: 1,
            flex: 1
        },
        _n = function t(e, r, n, i) {
            var s, o, a, u, l = parseFloat(n) || 0,
                p = (n + "").trim().substr((l + "").length) || "px",
                c = Er.style,
                h = Br.test(r),
                f = "svg" === e.tagName.toLowerCase(),
                d = (f ? "client" : "offset") + (h ? "Width" : "Height"),
                g = 100,
                _ = "px" === i,
                m = "%" === i;
            if (i === p || !l || dn[i] || dn[p]) return l;
            if ("px" !== p && !_ && (l = t(e, r, n, "px")), u = e.getCTM && cn(e), (m || "%" === p) && (Ar[r] || ~r.indexOf("adius"))) return s = u ? e.getBBox()[h ? "width" : "height"] : e[d], ht(m ? l / s * g : l / 100 * s);
            if (c[h ? "width" : "height"] = g + (_ ? p : i), o = ~r.indexOf("adius") || "em" === i && e.appendChild && !f ? e : e.parentNode, u && (o = (e.ownerSVGElement || {}).parentNode), o && o !== wr && o.appendChild || (o = wr.body), (a = o._gsap) && m && a.width && h && a.time === be.time && !a.uncache) return ht(l / a.width * g);
            if (!m || "height" !== r && "width" !== r)(m || "%" === p) && !gn[nn(o, "display")] && (c.position = nn(e, "position")), o === e && (c.position = "static"), o.appendChild(Er), s = Er[d], o.removeChild(Er), c.position = "absolute";
            else {
                var D = e.style[r];
                e.style[r] = g + i, s = e[d], D ? e.style[r] = D : hn(e, r)
            }
            return h && m && ((a = lt(o)).time = be.time, a.width = o[d]), ht(_ ? s * l / g : s && l ? g / s * l : 0)
        },
        mn = function(t, e, r, n) {
            var i;
            return Fr || an(), e in Nr && "transform" !== e && ~(e = Nr[e]).indexOf(",") && (e = e.split(",")[0]), Ar[e] && "transform" !== e ? (i = Sn(t, n), i = "transformOrigin" !== e ? i[e] : i.svg ? i.origin : Mn(nn(t, Zr)) + " " + i.zOrigin + "px") : (!(i = t.style[e]) || "auto" === i || n || ~(i + "").indexOf("calc(")) && (i = xn[e] && xn[e](t, e, r) || nn(t, e) || pt(t, e) || ("opacity" === e ? 1 : 0)), r && !~(i + "").trim().indexOf(" ") ? _n(t, e, i, r) + r : i
        },
        Dn = function(t, e, r, n) {
            if (!r || "none" === r) {
                var i = on(e, t, 1),
                    s = i && nn(t, i, 1);
                s && s !== r ? (e = i, r = s) : "borderColor" === e && (r = nn(t, "borderTopColor"))
            }
            var o, a, u, l, p, c, h, f, d, g, _, D = new ur(this._pt, t.style, e, 0, 1, rr),
                v = 0,
                y = 0;
            if (D.b = r, D.e = n, r += "", "auto" == (n += "") && (c = t.style[e], t.style[e] = n, n = nn(t, e) || n, c ? t.style[e] = c : hn(t, e)), xe(o = [r, n]), n = o[1], u = (r = o[0]).match(z) || [], (n.match(z) || []).length) {
                for (; a = z.exec(n);) h = a[0], d = n.substring(v, a.index), p ? p = (p + 1) % 5 : "rgba(" !== d.substr(-5) && "hsla(" !== d.substr(-5) || (p = 1), h !== (c = u[y++] || "") && (l = parseFloat(c) || 0, _ = c.substr((l + "").length), "=" === h.charAt(1) && (h = dt(l, h) + _), f = parseFloat(h), g = h.substr((f + "").length), v = z.lastIndex - g.length, g || (g = g || m.units[e] || _, v === n.length && (n += g, D.e += g)), _ !== g && (l = _n(t, e, c, g) || 0), D._pt = {
                    _next: D._pt,
                    p: d || 1 === y ? d : ",",
                    s: l,
                    c: f - l,
                    m: p && p < 4 || "zIndex" === e ? Math.round : 0
                });
                D.c = v < n.length ? n.substring(v, n.length) : ""
            } else D.r = "display" === e && "none" === n ? qr : Yr;
            return j.test(n) && (D.e = 0), this._pt = D, D
        },
        vn = {
            top: "0%",
            bottom: "100%",
            left: "0%",
            right: "100%",
            center: "50%"
        },
        yn = function(t, e) {
            if (e.tween && e.tween._time === e.tween._dur) {
                var r, n, i, s = e.t,
                    o = s.style,
                    a = e.u,
                    u = s._gsap;
                if ("all" === a || !0 === a) o.cssText = "", n = 1;
                else
                    for (i = (a = a.split(",")).length; --i > -1;) r = a[i], Ar[r] && (n = 1, r = "transformOrigin" === r ? Zr : Qr), hn(s, r);
                n && (hn(s, Qr), u && (u.svg && s.removeAttribute("transform"), Sn(s, 1), u.uncache = 1, Kr(o)))
            }
        },
        xn = {
            clearProps: function(t, e, r, n, i) {
                if ("isFromStart" !== i.data) {
                    var s = t._pt = new ur(t._pt, e, r, 0, 0, yn);
                    return s.u = n, s.pr = -10, s.tween = i, t._props.push(r), 1
                }
            }
        },
        bn = [1, 0, 0, 1, 0, 0],
        wn = {},
        Cn = function(t) {
            return "matrix(1, 0, 0, 1, 0, 0)" === t || "none" === t || !t
        },
        Fn = function(t) {
            var e = nn(t, Qr);
            return Cn(e) ? bn : e.substr(7).match(I).map(ht)
        },
        En = function(t, e) {
            var r, n, i, s, o = t._gsap || lt(t),
                a = t.style,
                u = Fn(t);
            return o.svg && t.getAttribute("transform") ? "1,0,0,1,0,0" === (u = [(i = t.transform.baseVal.consolidate().matrix).a, i.b, i.c, i.d, i.e, i.f]).join(",") ? bn : u : (u !== bn || t.offsetParent || t === Cr || o.svg || (i = a.display, a.display = "block", (r = t.parentNode) && t.offsetParent || (s = 1, n = t.nextElementSibling, Cr.appendChild(t)), u = Fn(t), i ? a.display = i : hn(t, "display"), s && (n ? r.insertBefore(t, n) : r ? r.appendChild(t) : Cr.removeChild(t))), e && u.length > 6 ? [u[0], u[1], u[4], u[5], u[12], u[13]] : u)
        },
        Tn = function(t, e, r, n, i, s) {
            var o, a, u, l = t._gsap,
                p = i || En(t, !0),
                c = l.xOrigin || 0,
                h = l.yOrigin || 0,
                f = l.xOffset || 0,
                d = l.yOffset || 0,
                g = p[0],
                _ = p[1],
                m = p[2],
                D = p[3],
                v = p[4],
                y = p[5],
                x = e.split(" "),
                b = parseFloat(x[0]) || 0,
                w = parseFloat(x[1]) || 0;
            r ? p !== bn && (a = g * D - _ * m) && (u = b * (-_ / a) + w * (g / a) - (g * y - _ * v) / a, b = b * (D / a) + w * (-m / a) + (m * y - D * v) / a, w = u) : (b = (o = pn(t)).x + (~x[0].indexOf("%") ? b / 100 * o.width : b), w = o.y + (~(x[1] || x[0]).indexOf("%") ? w / 100 * o.height : w)), n || !1 !== n && l.smooth ? (v = b - c, y = w - h, l.xOffset = f + (v * g + y * m) - v, l.yOffset = d + (v * _ + y * D) - y) : l.xOffset = l.yOffset = 0, l.xOrigin = b, l.yOrigin = w, l.smooth = !!n, l.origin = e, l.originIsAbsolute = !!r, t.style[Zr] = "0px 0px", s && (fn(s, l, "xOrigin", c, b), fn(s, l, "yOrigin", h, w), fn(s, l, "xOffset", f, l.xOffset), fn(s, l, "yOffset", d, l.yOffset)), t.setAttribute("data-svg-origin", b + " " + w)
        },
        Sn = function(t, e) {
            var r = t._gsap || new Be(t);
            if ("x" in r && !e && !r.uncache) return r;
            var n, i, s, o, a, u, l, p, c, h, f, d, g, _, D, v, y, x, b, w, C, F, E, T, S, M, A, O, R, P, k, B, L = t.style,
                N = r.scaleX < 0,
                I = "px",
                z = "deg",
                X = getComputedStyle(t),
                j = nn(t, Zr) || "0";
            return n = i = s = u = l = p = c = h = f = 0, o = a = 1, r.svg = !(!t.getCTM || !cn(t)), X.translate && ("none" === X.translate && "none" === X.scale && "none" === X.rotate || (L[Qr] = ("none" !== X.translate ? "translate3d(" + (X.translate + " 0 0").split(" ").slice(0, 3).join(", ") + ") " : "") + ("none" !== X.rotate ? "rotate(" + X.rotate + ") " : "") + ("none" !== X.scale ? "scale(" + X.scale.split(" ").join(",") + ") " : "") + ("none" !== X[Qr] ? X[Qr] : "")), L.scale = L.rotate = L.translate = "none"), _ = En(t, r.svg), r.svg && (r.uncache ? (S = t.getBBox(), j = r.xOrigin - S.x + "px " + (r.yOrigin - S.y) + "px", T = "") : T = !e && t.getAttribute("data-svg-origin"), Tn(t, T || j, !!T || r.originIsAbsolute, !1 !== r.smooth, _)), d = r.xOrigin || 0, g = r.yOrigin || 0, _ !== bn && (x = _[0], b = _[1], w = _[2], C = _[3], n = F = _[4], i = E = _[5], 6 === _.length ? (o = Math.sqrt(x * x + b * b), a = Math.sqrt(C * C + w * w), u = x || b ? Pr(b, x) * Or : 0, (c = w || C ? Pr(w, C) * Or + u : 0) && (a *= Math.abs(Math.cos(c * Rr))), r.svg && (n -= d - (d * x + g * w), i -= g - (d * b + g * C))) : (B = _[6], P = _[7], A = _[8], O = _[9], R = _[10], k = _[11], n = _[12], i = _[13], s = _[14], l = (D = Pr(B, R)) * Or, D && (T = F * (v = Math.cos(-D)) + A * (y = Math.sin(-D)), S = E * v + O * y, M = B * v + R * y, A = F * -y + A * v, O = E * -y + O * v, R = B * -y + R * v, k = P * -y + k * v, F = T, E = S, B = M), p = (D = Pr(-w, R)) * Or, D && (v = Math.cos(-D), k = C * (y = Math.sin(-D)) + k * v, x = T = x * v - A * y, b = S = b * v - O * y, w = M = w * v - R * y), u = (D = Pr(b, x)) * Or, D && (T = x * (v = Math.cos(D)) + b * (y = Math.sin(D)), S = F * v + E * y, b = b * v - x * y, E = E * v - F * y, x = T, F = S), l && Math.abs(l) + Math.abs(u) > 359.9 && (l = u = 0, p = 180 - p), o = ht(Math.sqrt(x * x + b * b + w * w)), a = ht(Math.sqrt(E * E + B * B)), D = Pr(F, E), c = Math.abs(D) > 2e-4 ? D * Or : 0, f = k ? 1 / (k < 0 ? -k : k) : 0), r.svg && (T = t.getAttribute("transform"), r.forceCSS = t.setAttribute("transform", "") || !Cn(nn(t, Qr)), T && t.setAttribute("transform", T))), Math.abs(c) > 90 && Math.abs(c) < 270 && (N ? (o *= -1, c += u <= 0 ? 180 : -180, u += u <= 0 ? 180 : -180) : (a *= -1, c += c <= 0 ? 180 : -180)), e = e || r.uncache, r.x = n - ((r.xPercent = n && (!e && r.xPercent || (Math.round(t.offsetWidth / 2) === Math.round(-n) ? -50 : 0))) ? t.offsetWidth * r.xPercent / 100 : 0) + I, r.y = i - ((r.yPercent = i && (!e && r.yPercent || (Math.round(t.offsetHeight / 2) === Math.round(-i) ? -50 : 0))) ? t.offsetHeight * r.yPercent / 100 : 0) + I, r.z = s + I, r.scaleX = ht(o), r.scaleY = ht(a), r.rotation = ht(u) + z, r.rotationX = ht(l) + z, r.rotationY = ht(p) + z, r.skewX = c + z, r.skewY = h + z, r.transformPerspective = f + I, (r.zOrigin = parseFloat(j.split(" ")[2]) || !e && r.zOrigin || 0) && (L[Zr] = Mn(j)), r.xOffset = r.yOffset = 0, r.force3D = m.force3D, r.renderTransform = r.svg ? Ln : Mr ? Bn : On, r.uncache = 0, r
        },
        Mn = function(t) {
            return (t = t.split(" "))[0] + " " + t[1]
        },
        An = function(t, e, r) {
            var n = $t(e);
            return ht(parseFloat(e) + parseFloat(_n(t, "x", r + "px", n))) + n
        },
        On = function(t, e) {
            e.z = "0px", e.rotationY = e.rotationX = "0deg", e.force3D = 0, Bn(t, e)
        },
        Rn = "0deg",
        Pn = "0px",
        kn = ") ",
        Bn = function(t, e) {
            var r = e || this,
                n = r.xPercent,
                i = r.yPercent,
                s = r.x,
                o = r.y,
                a = r.z,
                u = r.rotation,
                l = r.rotationY,
                p = r.rotationX,
                c = r.skewX,
                h = r.skewY,
                f = r.scaleX,
                d = r.scaleY,
                g = r.transformPerspective,
                _ = r.force3D,
                m = r.target,
                D = r.zOrigin,
                v = "",
                y = "auto" === _ && t && 1 !== t || !0 === _;
            if (D && (p !== Rn || l !== Rn)) {
                var x, b = parseFloat(l) * Rr,
                    w = Math.sin(b),
                    C = Math.cos(b);
                b = parseFloat(p) * Rr, x = Math.cos(b), s = An(m, s, w * x * -D), o = An(m, o, -Math.sin(b) * -D), a = An(m, a, C * x * -D + D)
            }
            g !== Pn && (v += "perspective(" + g + kn), (n || i) && (v += "translate(" + n + "%, " + i + "%) "), (y || s !== Pn || o !== Pn || a !== Pn) && (v += a !== Pn || y ? "translate3d(" + s + ", " + o + ", " + a + ") " : "translate(" + s + ", " + o + kn), u !== Rn && (v += "rotate(" + u + kn), l !== Rn && (v += "rotateY(" + l + kn), p !== Rn && (v += "rotateX(" + p + kn), c === Rn && h === Rn || (v += "skew(" + c + ", " + h + kn), 1 === f && 1 === d || (v += "scale(" + f + ", " + d + kn), m.style[Qr] = v || "translate(0, 0)"
        },
        Ln = function(t, e) {
            var r, n, i, s, o, a = e || this,
                u = a.xPercent,
                l = a.yPercent,
                p = a.x,
                c = a.y,
                h = a.rotation,
                f = a.skewX,
                d = a.skewY,
                g = a.scaleX,
                _ = a.scaleY,
                m = a.target,
                D = a.xOrigin,
                v = a.yOrigin,
                y = a.xOffset,
                x = a.yOffset,
                b = a.forceCSS,
                w = parseFloat(p),
                C = parseFloat(c);
            h = parseFloat(h), f = parseFloat(f), (d = parseFloat(d)) && (f += d = parseFloat(d), h += d), h || f ? (h *= Rr, f *= Rr, r = Math.cos(h) * g, n = Math.sin(h) * g, i = Math.sin(h - f) * -_, s = Math.cos(h - f) * _, f && (d *= Rr, o = Math.tan(f - d), i *= o = Math.sqrt(1 + o * o), s *= o, d && (o = Math.tan(d), r *= o = Math.sqrt(1 + o * o), n *= o)), r = ht(r), n = ht(n), i = ht(i), s = ht(s)) : (r = g, s = _, n = i = 0), (w && !~(p + "").indexOf("px") || C && !~(c + "").indexOf("px")) && (w = _n(m, "x", p, "px"), C = _n(m, "y", c, "px")), (D || v || y || x) && (w = ht(w + D - (D * r + v * i) + y), C = ht(C + v - (D * n + v * s) + x)), (u || l) && (o = m.getBBox(), w = ht(w + u / 100 * o.width), C = ht(C + l / 100 * o.height)), o = "matrix(" + r + "," + n + "," + i + "," + s + "," + w + "," + C + ")", m.setAttribute("transform", o), b && (m.style[Qr] = o)
        },
        Nn = function(t, e, r, n, i) {
            var s, o, a = 360,
                u = T(i),
                l = parseFloat(i) * (u && ~i.indexOf("rad") ? Or : 1) - n,
                p = n + l + "deg";
            return u && ("short" === (s = i.split("_")[1]) && (l %= a) != l % 180 && (l += l < 0 ? a : -360), "cw" === s && l < 0 ? l = (l + 36e9) % a - ~~(l / a) * a : "ccw" === s && l > 0 && (l = (l - 36e9) % a - ~~(l / a) * a)), t._pt = o = new ur(t._pt, e, r, n, l, zr), o.e = p, o.u = "deg", t._props.push(r), o
        },
        In = function(t, e) {
            for (var r in e) t[r] = e[r];
            return t
        },
        zn = function(t, e, r) {
            var n, i, s, o, a, u, l, p = In({}, r._gsap),
                c = r.style;
            for (i in p.svg ? (s = r.getAttribute("transform"), r.setAttribute("transform", ""), c[Qr] = e, n = Sn(r, 1), hn(r, Qr), r.setAttribute("transform", s)) : (s = getComputedStyle(r)[Qr], c[Qr] = e, n = Sn(r, 1), c[Qr] = s), Ar)(s = p[i]) !== (o = n[i]) && "perspective,force3D,transformOrigin,svgOrigin".indexOf(i) < 0 && (a = $t(s) !== (l = $t(o)) ? _n(r, i, s, l) : parseFloat(s), u = parseFloat(o), t._pt = new ur(t._pt, n, i, a, u - a, Ir), t._pt.u = l || 0, t._props.push(i));
            In(n, p)
        };
    ct("padding,margin,Width,Radius", (function(t, e) {
        var r = "Top",
            n = "Right",
            i = "Bottom",
            s = "Left",
            o = (e < 3 ? [r, n, i, s] : [r + s, r + n, i + n, i + s]).map((function(r) {
                return e < 2 ? t + r : "border" + r + t
            }));
        xn[e > 1 ? "border" + t : t] = function(t, e, r, n, i) {
            var s, a;
            if (arguments.length < 4) return s = o.map((function(e) {
                return mn(t, e, r)
            })), 5 === (a = s.join(" ")).split(s[0]).length ? s[0] : a;
            s = (n + "").split(" "), a = {}, o.forEach((function(t, e) {
                return a[t] = s[e] = s[e] || s[(e - 1) / 2 | 0]
            })), t.init(e, a, i)
        }
    }));
    var Xn, jn, Yn = {
        name: "css",
        register: an,
        targetTest: function(t) {
            return t.style && t.nodeType
        },
        init: function(t, e, r, n, i) {
            var s, o, a, u, l, p, c, h, f, d, g, _, D, v, y, x, b, w, C, F, E = this._props,
                S = t.style,
                M = r.vars.startAt;
            for (c in Fr || an(), this.styles = this.styles || en(t), x = this.styles.props, this.tween = r, e)
                if ("autoRound" !== c && (o = e[c], !nt[c] || !Ye(c, e, r, n, t, i)))
                    if (l = typeof o, p = xn[c], "function" === l && (l = typeof(o = o.call(r, n, t, i))), "string" === l && ~o.indexOf("random(") && (o = oe(o)), p) p(this, t, c, o, r) && (y = 1);
                    else if ("--" === c.substr(0, 2)) s = (getComputedStyle(t).getPropertyValue(c) + "").trim(), o += "", ve.lastIndex = 0, ve.test(s) || (h = $t(s), f = $t(o)), f ? h !== f && (s = _n(t, c, s, f) + f) : h && (o += h), this.add(S, "setProperty", s, o, n, i, 0, 0, c), E.push(c), x.push(c, 0, S[c]);
            else if ("undefined" !== l) {
                if (M && c in M ? (s = "function" == typeof M[c] ? M[c].call(r, n, t, i) : M[c], T(s) && ~s.indexOf("random(") && (s = oe(s)), $t(s + "") || "auto" === s || (s += m.units[c] || $t(mn(t, c)) || ""), "=" === (s + "").charAt(1) && (s = mn(t, c))) : s = mn(t, c), u = parseFloat(s), (d = "string" === l && "=" === o.charAt(1) && o.substr(0, 2)) && (o = o.substr(2)), a = parseFloat(o), c in Nr && ("autoAlpha" === c && (1 === u && "hidden" === mn(t, "visibility") && a && (u = 0), x.push("visibility", 0, S.visibility), fn(this, S, "visibility", u ? "inherit" : "hidden", a ? "inherit" : "hidden", !a)), "scale" !== c && "transform" !== c && ~(c = Nr[c]).indexOf(",") && (c = c.split(",")[0])), g = c in Ar)
                    if (this.styles.save(c), _ || ((D = t._gsap).renderTransform && !e.parseTransform || Sn(t, e.parseTransform), v = !1 !== e.smoothOrigin && D.smooth, (_ = this._pt = new ur(this._pt, S, Qr, 0, 1, D.renderTransform, D, 0, -1)).dep = 1), "scale" === c) this._pt = new ur(this._pt, D, "scaleY", D.scaleY, (d ? dt(D.scaleY, d + a) : a) - D.scaleY || 0, Ir), this._pt.u = 0, E.push("scaleY", c), c += "X";
                    else {
                        if ("transformOrigin" === c) {
                            x.push(Zr, 0, S[Zr]), w = void 0, C = void 0, F = void 0, C = (w = (b = o).split(" "))[0], F = w[1] || "50%", "top" !== C && "bottom" !== C && "left" !== F && "right" !== F || (b = C, C = F, F = b), w[0] = vn[C] || C, w[1] = vn[F] || F, o = w.join(" "), D.svg ? Tn(t, o, 0, v, 0, this) : ((f = parseFloat(o.split(" ")[2]) || 0) !== D.zOrigin && fn(this, D, "zOrigin", D.zOrigin, f), fn(this, S, c, Mn(s), Mn(o)));
                            continue
                        }
                        if ("svgOrigin" === c) {
                            Tn(t, o, 1, v, 0, this);
                            continue
                        }
                        if (c in wn) {
                            Nn(this, D, c, u, d ? dt(u, d + o) : o);
                            continue
                        }
                        if ("smoothOrigin" === c) {
                            fn(this, D, "smooth", D.smooth, o);
                            continue
                        }
                        if ("force3D" === c) {
                            D[c] = o;
                            continue
                        }
                        if ("transform" === c) {
                            zn(this, o, t);
                            continue
                        }
                    }
                else c in S || (c = on(c) || c);
                if (g || (a || 0 === a) && (u || 0 === u) && !Lr.test(o) && c in S) a || (a = 0), (h = (s + "").substr((u + "").length)) !== (f = $t(o) || (c in m.units ? m.units[c] : h)) && (u = _n(t, c, s, f)), this._pt = new ur(this._pt, g ? D : S, c, u, (d ? dt(u, d + a) : a) - u, g || "px" !== f && "zIndex" !== c || !1 === e.autoRound ? Ir : jr), this._pt.u = f || 0, h !== f && "%" !== f && (this._pt.b = s, this._pt.r = Xr);
                else if (c in S) Dn.call(this, t, c, s, d ? d + o : o);
                else if (c in t) this.add(t, c, s || t[c], d ? d + o : o, n, i);
                else if ("parseTransform" !== c) {
                    W(c, o);
                    continue
                }
                g || (c in S ? x.push(c, 0, S[c]) : x.push(c, 1, s || t[c])), E.push(c)
            }
            y && ar(this)
        },
        render: function(t, e) {
            if (e.tween._time || !Sr())
                for (var r = e._pt; r;) r.r(t, r.d), r = r._next;
            else e.styles.revert()
        },
        get: mn,
        aliases: Nr,
        getSetter: function(t, e, r) {
            var n = Nr[e];
            return n && n.indexOf(",") < 0 && (e = n), e in Ar && e !== Zr && (t._gsap.x || mn(t, "x")) ? r && Tr === r ? "scale" === e ? Wr : Hr : (Tr = r || {}) && ("scale" === e ? Ur : $r) : t.style && !A(t.style[e]) ? Gr : ~e.indexOf("-") ? Vr : Ke(t, e)
        },
        core: {
            _removeProperty: hn,
            _getMatrix: En
        }
    };
    xr.utils.checkPrefix = on, xr.core.getStyleSaver = en, jn = ct("x,y,z,scale,scaleX,scaleY,xPercent,yPercent" + "," + (Xn = "rotation,rotationX,rotationY,skewX,skewY") + ",transform,transformOrigin,svgOrigin,force3D,smoothOrigin,transformPerspective", (function(t) {
        Ar[t] = 1
    })), ct(Xn, (function(t) {
        m.units[t] = "deg", wn[t] = 1
    })), Nr[jn[13]] = "x,y,z,scale,scaleX,scaleY,xPercent,yPercent," + Xn, ct("0:translateX,1:translateY,2:translateZ,8:rotate,8:rotationZ,8:rotateZ,9:rotateX,10:rotateY", (function(t) {
        var e = t.split(":");
        Nr[e[1]] = jn[e[0]]
    })), ct("x,y,z,top,right,bottom,left,width,height,fontSize,padding,margin,perspective", (function(t) {
        m.units[t] = "px"
    })), xr.registerPlugin(Yn);
    var qn = xr.registerPlugin(Yn) || xr,
        Gn = qn.core.Tween,
        Vn = /([\uD800-\uDBFF][\uDC00-\uDFFF](?:[\u200D\uFE0F][\uD800-\uDBFF][\uDC00-\uDFFF]){2,}|\uD83D\uDC69(?:\u200D(?:(?:\uD83D\uDC69\u200D)?\uD83D\uDC67|(?:\uD83D\uDC69\u200D)?\uD83D\uDC66)|\uD83C[\uDFFB-\uDFFF])|\uD83D\uDC69\u200D(?:\uD83D\uDC69\u200D)?\uD83D\uDC66\u200D\uD83D\uDC66|\uD83D\uDC69\u200D(?:\uD83D\uDC69\u200D)?\uD83D\uDC67\u200D(?:\uD83D[\uDC66\uDC67])|\uD83C\uDFF3\uFE0F\u200D\uD83C\uDF08|(?:\uD83C[\uDFC3\uDFC4\uDFCA]|\uD83D[\uDC6E\uDC71\uDC73\uDC77\uDC81\uDC82\uDC86\uDC87\uDE45-\uDE47\uDE4B\uDE4D\uDE4E\uDEA3\uDEB4-\uDEB6]|\uD83E[\uDD26\uDD37-\uDD39\uDD3D\uDD3E\uDDD6-\uDDDD])(?:\uD83C[\uDFFB-\uDFFF])\u200D[\u2640\u2642]\uFE0F|\uD83D\uDC69(?:\uD83C[\uDFFB-\uDFFF])\u200D(?:\uD83C[\uDF3E\uDF73\uDF93\uDFA4\uDFA8\uDFEB\uDFED]|\uD83D[\uDCBB\uDCBC\uDD27\uDD2C\uDE80\uDE92])|(?:\uD83C[\uDFC3\uDFC4\uDFCA]|\uD83D[\uDC6E\uDC6F\uDC71\uDC73\uDC77\uDC81\uDC82\uDC86\uDC87\uDE45-\uDE47\uDE4B\uDE4D\uDE4E\uDEA3\uDEB4-\uDEB6]|\uD83E[\uDD26\uDD37-\uDD39\uDD3C-\uDD3E\uDDD6-\uDDDF])\u200D[\u2640\u2642]\uFE0F|\uD83C\uDDFD\uD83C\uDDF0|\uD83C\uDDF6\uD83C\uDDE6|\uD83C\uDDF4\uD83C\uDDF2|\uD83C\uDDE9(?:\uD83C[\uDDEA\uDDEC\uDDEF\uDDF0\uDDF2\uDDF4\uDDFF])|\uD83C\uDDF7(?:\uD83C[\uDDEA\uDDF4\uDDF8\uDDFA\uDDFC])|\uD83C\uDDE8(?:\uD83C[\uDDE6\uDDE8\uDDE9\uDDEB-\uDDEE\uDDF0-\uDDF5\uDDF7\uDDFA-\uDDFF])|(?:\u26F9|\uD83C[\uDFCB\uDFCC]|\uD83D\uDD75)(?:\uFE0F\u200D[\u2640\u2642]|(?:\uD83C[\uDFFB-\uDFFF])\u200D[\u2640\u2642])\uFE0F|(?:\uD83D\uDC41\uFE0F\u200D\uD83D\uDDE8|\uD83D\uDC69(?:\uD83C[\uDFFB-\uDFFF])\u200D[\u2695\u2696\u2708]|\uD83D\uDC69\u200D[\u2695\u2696\u2708]|\uD83D\uDC68(?:(?:\uD83C[\uDFFB-\uDFFF])\u200D[\u2695\u2696\u2708]|\u200D[\u2695\u2696\u2708]))\uFE0F|\uD83C\uDDF2(?:\uD83C[\uDDE6\uDDE8-\uDDED\uDDF0-\uDDFF])|\uD83D\uDC69\u200D(?:\uD83C[\uDF3E\uDF73\uDF93\uDFA4\uDFA8\uDFEB\uDFED]|\uD83D[\uDCBB\uDCBC\uDD27\uDD2C\uDE80\uDE92]|\u2764\uFE0F\u200D(?:\uD83D\uDC8B\u200D(?:\uD83D[\uDC68\uDC69])|\uD83D[\uDC68\uDC69]))|\uD83C\uDDF1(?:\uD83C[\uDDE6-\uDDE8\uDDEE\uDDF0\uDDF7-\uDDFB\uDDFE])|\uD83C\uDDEF(?:\uD83C[\uDDEA\uDDF2\uDDF4\uDDF5])|\uD83C\uDDED(?:\uD83C[\uDDF0\uDDF2\uDDF3\uDDF7\uDDF9\uDDFA])|\uD83C\uDDEB(?:\uD83C[\uDDEE-\uDDF0\uDDF2\uDDF4\uDDF7])|[#\*0-9]\uFE0F\u20E3|\uD83C\uDDE7(?:\uD83C[\uDDE6\uDDE7\uDDE9-\uDDEF\uDDF1-\uDDF4\uDDF6-\uDDF9\uDDFB\uDDFC\uDDFE\uDDFF])|\uD83C\uDDE6(?:\uD83C[\uDDE8-\uDDEC\uDDEE\uDDF1\uDDF2\uDDF4\uDDF6-\uDDFA\uDDFC\uDDFD\uDDFF])|\uD83C\uDDFF(?:\uD83C[\uDDE6\uDDF2\uDDFC])|\uD83C\uDDF5(?:\uD83C[\uDDE6\uDDEA-\uDDED\uDDF0-\uDDF3\uDDF7-\uDDF9\uDDFC\uDDFE])|\uD83C\uDDFB(?:\uD83C[\uDDE6\uDDE8\uDDEA\uDDEC\uDDEE\uDDF3\uDDFA])|\uD83C\uDDF3(?:\uD83C[\uDDE6\uDDE8\uDDEA-\uDDEC\uDDEE\uDDF1\uDDF4\uDDF5\uDDF7\uDDFA\uDDFF])|\uD83C\uDFF4\uDB40\uDC67\uDB40\uDC62(?:\uDB40\uDC77\uDB40\uDC6C\uDB40\uDC73|\uDB40\uDC73\uDB40\uDC63\uDB40\uDC74|\uDB40\uDC65\uDB40\uDC6E\uDB40\uDC67)\uDB40\uDC7F|\uD83D\uDC68(?:\u200D(?:\u2764\uFE0F\u200D(?:\uD83D\uDC8B\u200D)?\uD83D\uDC68|(?:(?:\uD83D[\uDC68\uDC69])\u200D)?\uD83D\uDC66\u200D\uD83D\uDC66|(?:(?:\uD83D[\uDC68\uDC69])\u200D)?\uD83D\uDC67\u200D(?:\uD83D[\uDC66\uDC67])|\uD83C[\uDF3E\uDF73\uDF93\uDFA4\uDFA8\uDFEB\uDFED]|\uD83D[\uDCBB\uDCBC\uDD27\uDD2C\uDE80\uDE92])|(?:\uD83C[\uDFFB-\uDFFF])\u200D(?:\uD83C[\uDF3E\uDF73\uDF93\uDFA4\uDFA8\uDFEB\uDFED]|\uD83D[\uDCBB\uDCBC\uDD27\uDD2C\uDE80\uDE92]))|\uD83C\uDDF8(?:\uD83C[\uDDE6-\uDDEA\uDDEC-\uDDF4\uDDF7-\uDDF9\uDDFB\uDDFD-\uDDFF])|\uD83C\uDDF0(?:\uD83C[\uDDEA\uDDEC-\uDDEE\uDDF2\uDDF3\uDDF5\uDDF7\uDDFC\uDDFE\uDDFF])|\uD83C\uDDFE(?:\uD83C[\uDDEA\uDDF9])|\uD83C\uDDEE(?:\uD83C[\uDDE8-\uDDEA\uDDF1-\uDDF4\uDDF6-\uDDF9])|\uD83C\uDDF9(?:\uD83C[\uDDE6\uDDE8\uDDE9\uDDEB-\uDDED\uDDEF-\uDDF4\uDDF7\uDDF9\uDDFB\uDDFC\uDDFF])|\uD83C\uDDEC(?:\uD83C[\uDDE6\uDDE7\uDDE9-\uDDEE\uDDF1-\uDDF3\uDDF5-\uDDFA\uDDFC\uDDFE])|\uD83C\uDDFA(?:\uD83C[\uDDE6\uDDEC\uDDF2\uDDF3\uDDF8\uDDFE\uDDFF])|\uD83C\uDDEA(?:\uD83C[\uDDE6\uDDE8\uDDEA\uDDEC\uDDED\uDDF7-\uDDFA])|\uD83C\uDDFC(?:\uD83C[\uDDEB\uDDF8])|(?:\u26F9|\uD83C[\uDFCB\uDFCC]|\uD83D\uDD75)(?:\uD83C[\uDFFB-\uDFFF])|(?:\uD83C[\uDFC3\uDFC4\uDFCA]|\uD83D[\uDC6E\uDC71\uDC73\uDC77\uDC81\uDC82\uDC86\uDC87\uDE45-\uDE47\uDE4B\uDE4D\uDE4E\uDEA3\uDEB4-\uDEB6]|\uD83E[\uDD26\uDD37-\uDD39\uDD3D\uDD3E\uDDD6-\uDDDD])(?:\uD83C[\uDFFB-\uDFFF])|(?:[\u261D\u270A-\u270D]|\uD83C[\uDF85\uDFC2\uDFC7]|\uD83D[\uDC42\uDC43\uDC46-\uDC50\uDC66\uDC67\uDC70\uDC72\uDC74-\uDC76\uDC78\uDC7C\uDC83\uDC85\uDCAA\uDD74\uDD7A\uDD90\uDD95\uDD96\uDE4C\uDE4F\uDEC0\uDECC]|\uD83E[\uDD18-\uDD1C\uDD1E\uDD1F\uDD30-\uDD36\uDDD1-\uDDD5])(?:\uD83C[\uDFFB-\uDFFF])|\uD83D\uDC68(?:\u200D(?:(?:(?:\uD83D[\uDC68\uDC69])\u200D)?\uD83D\uDC67|(?:(?:\uD83D[\uDC68\uDC69])\u200D)?\uD83D\uDC66)|\uD83C[\uDFFB-\uDFFF])|(?:[\u261D\u26F9\u270A-\u270D]|\uD83C[\uDF85\uDFC2-\uDFC4\uDFC7\uDFCA-\uDFCC]|\uD83D[\uDC42\uDC43\uDC46-\uDC50\uDC66-\uDC69\uDC6E\uDC70-\uDC78\uDC7C\uDC81-\uDC83\uDC85-\uDC87\uDCAA\uDD74\uDD75\uDD7A\uDD90\uDD95\uDD96\uDE45-\uDE47\uDE4B-\uDE4F\uDEA3\uDEB4-\uDEB6\uDEC0\uDECC]|\uD83E[\uDD18-\uDD1C\uDD1E\uDD1F\uDD26\uDD30-\uDD39\uDD3D\uDD3E\uDDD1-\uDDDD])(?:\uD83C[\uDFFB-\uDFFF])?|(?:[\u231A\u231B\u23E9-\u23EC\u23F0\u23F3\u25FD\u25FE\u2614\u2615\u2648-\u2653\u267F\u2693\u26A1\u26AA\u26AB\u26BD\u26BE\u26C4\u26C5\u26CE\u26D4\u26EA\u26F2\u26F3\u26F5\u26FA\u26FD\u2705\u270A\u270B\u2728\u274C\u274E\u2753-\u2755\u2757\u2795-\u2797\u27B0\u27BF\u2B1B\u2B1C\u2B50\u2B55]|\uD83C[\uDC04\uDCCF\uDD8E\uDD91-\uDD9A\uDDE6-\uDDFF\uDE01\uDE1A\uDE2F\uDE32-\uDE36\uDE38-\uDE3A\uDE50\uDE51\uDF00-\uDF20\uDF2D-\uDF35\uDF37-\uDF7C\uDF7E-\uDF93\uDFA0-\uDFCA\uDFCF-\uDFD3\uDFE0-\uDFF0\uDFF4\uDFF8-\uDFFF]|\uD83D[\uDC00-\uDC3E\uDC40\uDC42-\uDCFC\uDCFF-\uDD3D\uDD4B-\uDD4E\uDD50-\uDD67\uDD7A\uDD95\uDD96\uDDA4\uDDFB-\uDE4F\uDE80-\uDEC5\uDECC\uDED0-\uDED2\uDEEB\uDEEC\uDEF4-\uDEF8]|\uD83E[\uDD10-\uDD3A\uDD3C-\uDD3E\uDD40-\uDD45\uDD47-\uDD4C\uDD50-\uDD6B\uDD80-\uDD97\uDDC0\uDDD0-\uDDE6])|(?:[#\*0-9\xA9\xAE\u203C\u2049\u2122\u2139\u2194-\u2199\u21A9\u21AA\u231A\u231B\u2328\u23CF\u23E9-\u23F3\u23F8-\u23FA\u24C2\u25AA\u25AB\u25B6\u25C0\u25FB-\u25FE\u2600-\u2604\u260E\u2611\u2614\u2615\u2618\u261D\u2620\u2622\u2623\u2626\u262A\u262E\u262F\u2638-\u263A\u2640\u2642\u2648-\u2653\u2660\u2663\u2665\u2666\u2668\u267B\u267F\u2692-\u2697\u2699\u269B\u269C\u26A0\u26A1\u26AA\u26AB\u26B0\u26B1\u26BD\u26BE\u26C4\u26C5\u26C8\u26CE\u26CF\u26D1\u26D3\u26D4\u26E9\u26EA\u26F0-\u26F5\u26F7-\u26FA\u26FD\u2702\u2705\u2708-\u270D\u270F\u2712\u2714\u2716\u271D\u2721\u2728\u2733\u2734\u2744\u2747\u274C\u274E\u2753-\u2755\u2757\u2763\u2764\u2795-\u2797\u27A1\u27B0\u27BF\u2934\u2935\u2B05-\u2B07\u2B1B\u2B1C\u2B50\u2B55\u3030\u303D\u3297\u3299]|\uD83C[\uDC04\uDCCF\uDD70\uDD71\uDD7E\uDD7F\uDD8E\uDD91-\uDD9A\uDDE6-\uDDFF\uDE01\uDE02\uDE1A\uDE2F\uDE32-\uDE3A\uDE50\uDE51\uDF00-\uDF21\uDF24-\uDF93\uDF96\uDF97\uDF99-\uDF9B\uDF9E-\uDFF0\uDFF3-\uDFF5\uDFF7-\uDFFF]|\uD83D[\uDC00-\uDCFD\uDCFF-\uDD3D\uDD49-\uDD4E\uDD50-\uDD67\uDD6F\uDD70\uDD73-\uDD7A\uDD87\uDD8A-\uDD8D\uDD90\uDD95\uDD96\uDDA4\uDDA5\uDDA8\uDDB1\uDDB2\uDDBC\uDDC2-\uDDC4\uDDD1-\uDDD3\uDDDC-\uDDDE\uDDE1\uDDE3\uDDE8\uDDEF\uDDF3\uDDFA-\uDE4F\uDE80-\uDEC5\uDECB-\uDED2\uDEE0-\uDEE5\uDEE9\uDEEB\uDEEC\uDEF0\uDEF3-\uDEF8]|\uD83E[\uDD10-\uDD3A\uDD3C-\uDD3E\uDD40-\uDD45\uDD47-\uDD4C\uDD50-\uDD6B\uDD80-\uDD97\uDDC0\uDDD0-\uDDE6])\uFE0F)/;

    function Hn(t) {
        var e = t.nodeType,
            r = "";
        if (1 === e || 9 === e || 11 === e) {
            if ("string" == typeof t.textContent) return t.textContent;
            for (t = t.firstChild; t; t = t.nextSibling) r += Hn(t)
        } else if (3 === e || 4 === e) return t.nodeValue;
        return r
    }
    /*!
     * SplitText: 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var Wn, Un, $n, Qn, Zn, Jn, Kn = /(?:\r|\n|\t\t)/g,
        ti = /(?:\s\s+)/g,
        ei = String.fromCharCode(160),
        ri = function(t) {
            Wn = document, Un = window, (Qn = Qn || t || Un.gsap || console.warn("Please gsap.registerPlugin(SplitText)")) && (Jn = Qn.utils.toArray, Zn = Qn.core.context || function() {}, $n = 1)
        },
        ni = function(t) {
            return Un.getComputedStyle(t)
        },
        ii = function(t) {
            return "absolute" === t.position || !0 === t.absolute
        },
        si = function(t, e) {
            for (var r, n = e.length; --n > -1;)
                if (r = e[n], t.substr(0, r.length) === r) return r.length
        },
        oi = function(t, e) {
            void 0 === t && (t = "");
            var r = ~t.indexOf("++"),
                n = 1;
            return r && (t = t.split("++").join("")),
                function() {
                    return "<" + e + " style='position:relative;display:inline-block;'" + (t ? " class='" + t + (r ? n++ : "") + "'>" : ">")
                }
        },
        ai = function t(e, r, n) {
            var i = e.nodeType;
            if (1 === i || 9 === i || 11 === i)
                for (e = e.firstChild; e; e = e.nextSibling) t(e, r, n);
            else 3 !== i && 4 !== i || (e.nodeValue = e.nodeValue.split(r).join(n))
        },
        ui = function(t, e) {
            for (var r = e.length; --r > -1;) t.push(e[r])
        },
        li = function(t, e, r) {
            for (var n; t && t !== e;) {
                if (n = t._next || t.nextSibling) return n.textContent.charAt(0) === r;
                t = t.parentNode || t._parent
            }
        },
        pi = function t(e) {
            var r, n, i = Jn(e.childNodes),
                s = i.length;
            for (r = 0; r < s; r++)(n = i[r])._isSplit ? t(n) : r && n.previousSibling && 3 === n.previousSibling.nodeType ? (n.previousSibling.nodeValue += 3 === n.nodeType ? n.nodeValue : n.firstChild.nodeValue, e.removeChild(n)) : 3 !== n.nodeType && (e.insertBefore(n.firstChild, n), e.removeChild(n))
        },
        ci = function(t, e) {
            return parseFloat(e[t]) || 0
        },
        hi = function(t, e, r, n, i, s, o) {
            var a, u, l, p, c, h, f, d, g, _, m, D, v = ni(t),
                y = ci("paddingLeft", v),
                x = -999,
                b = ci("borderBottomWidth", v) + ci("borderTopWidth", v),
                w = ci("borderLeftWidth", v) + ci("borderRightWidth", v),
                C = ci("paddingTop", v) + ci("paddingBottom", v),
                F = ci("paddingLeft", v) + ci("paddingRight", v),
                E = ci("fontSize", v) * (e.lineThreshold || .2),
                T = v.textAlign,
                S = [],
                M = [],
                A = [],
                O = e.wordDelimiter || " ",
                R = e.tag ? e.tag : e.span ? "span" : "div",
                P = e.type || e.split || "chars,words,lines",
                k = i && ~P.indexOf("lines") ? [] : null,
                B = ~P.indexOf("words"),
                L = ~P.indexOf("chars"),
                N = ii(e),
                I = e.linesClass,
                z = ~(I || "").indexOf("++"),
                X = [],
                j = "flex" === v.display,
                Y = t.style.display;
            for (z && (I = I.split("++").join("")), j && (t.style.display = "block"), l = (u = t.getElementsByTagName("*")).length, c = [], a = 0; a < l; a++) c[a] = u[a];
            if (k || N)
                for (a = 0; a < l; a++)((h = (p = c[a]).parentNode === t) || N || L && !B) && (D = p.offsetTop, k && h && Math.abs(D - x) > E && ("BR" !== p.nodeName || 0 === a) && (f = [], k.push(f), x = D), N && (p._x = p.offsetLeft, p._y = D, p._w = p.offsetWidth, p._h = p.offsetHeight), k && ((p._isSplit && h || !L && h || B && h || !B && p.parentNode.parentNode === t && !p.parentNode._isSplit) && (f.push(p), p._x -= y, li(p, t, O) && (p._wordEnd = !0)), "BR" === p.nodeName && (p.nextSibling && "BR" === p.nextSibling.nodeName || 0 === a) && k.push([])));
            for (a = 0; a < l; a++)
                if (h = (p = c[a]).parentNode === t, "BR" !== p.nodeName)
                    if (N && (g = p.style, B || h || (p._x += p.parentNode._x, p._y += p.parentNode._y), g.left = p._x + "px", g.top = p._y + "px", g.position = "absolute", g.display = "block", g.width = p._w + 1 + "px", g.height = p._h + "px"), !B && L)
                        if (p._isSplit)
                            for (p._next = u = p.nextSibling, p.parentNode.appendChild(p); u && 3 === u.nodeType && " " === u.textContent;) p._next = u.nextSibling, p.parentNode.appendChild(u), u = u.nextSibling;
                        else p.parentNode._isSplit ? (p._parent = p.parentNode, !p.previousSibling && p.firstChild && (p.firstChild._isFirst = !0), p.nextSibling && " " === p.nextSibling.textContent && !p.nextSibling.nextSibling && X.push(p.nextSibling), p._next = p.nextSibling && p.nextSibling._isFirst ? null : p.nextSibling, p.parentNode.removeChild(p), c.splice(a--, 1), l--) : h || (D = !p.nextSibling && li(p.parentNode, t, O), p.parentNode._parent && p.parentNode._parent.appendChild(p), D && p.parentNode.appendChild(Wn.createTextNode(" ")), "span" === R && (p.style.display = "inline"), S.push(p));
            else p.parentNode._isSplit && !p._isSplit && "" !== p.innerHTML ? M.push(p) : L && !p._isSplit && ("span" === R && (p.style.display = "inline"), S.push(p));
            else k || N ? (p.parentNode && p.parentNode.removeChild(p), c.splice(a--, 1), l--) : B || t.appendChild(p);
            for (a = X.length; --a > -1;) X[a].parentNode.removeChild(X[a]);
            if (k) {
                for (N && (_ = Wn.createElement(R), t.appendChild(_), m = _.offsetWidth + "px", D = _.offsetParent === t ? 0 : t.offsetLeft, t.removeChild(_)), g = t.style.cssText, t.style.cssText = "display:none;"; t.firstChild;) t.removeChild(t.firstChild);
                for (d = " " === O && (!N || !B && !L), a = 0; a < k.length; a++) {
                    for (f = k[a], (_ = Wn.createElement(R)).style.cssText = "display:block;text-align:" + T + ";position:" + (N ? "absolute;" : "relative;"), I && (_.className = I + (z ? a + 1 : "")), A.push(_), l = f.length, u = 0; u < l; u++) "BR" !== f[u].nodeName && (p = f[u], _.appendChild(p), d && p._wordEnd && _.appendChild(Wn.createTextNode(" ")), N && (0 === u && (_.style.top = p._y + "px", _.style.left = y + D + "px"), p.style.top = "0px", D && (p.style.left = p._x - D + "px")));
                    0 === l ? _.innerHTML = "&nbsp;" : B || L || (pi(_), ai(_, String.fromCharCode(160), " ")), N && (_.style.width = m, _.style.height = p._h + "px"), t.appendChild(_)
                }
                t.style.cssText = g
            }
            N && (o > t.clientHeight && (t.style.height = o - C + "px", t.clientHeight < o && (t.style.height = o + b + "px")), s > t.clientWidth && (t.style.width = s - F + "px", t.clientWidth < s && (t.style.width = s + w + "px"))), j && (Y ? t.style.display = Y : t.style.removeProperty("display")), ui(r, S), B && ui(n, M), ui(i, A)
        },
        fi = function(t, e, r, n) {
            var i, s, o, a, u, l, p, c, h = e.tag ? e.tag : e.span ? "span" : "div",
                f = ~(e.type || e.split || "chars,words,lines").indexOf("chars"),
                d = ii(e),
                g = e.wordDelimiter || " ",
                _ = function(t) {
                    return t === g || t === ei && " " === g
                },
                m = " " !== g ? "" : d ? "&#173; " : " ",
                D = "</" + h + ">",
                v = 1,
                y = e.specialChars ? "function" == typeof e.specialChars ? e.specialChars : si : null,
                x = Wn.createElement("div"),
                b = t.parentNode;
            for (b.insertBefore(x, t), x.textContent = t.nodeValue, b.removeChild(t), p = -1 !== (i = Hn(t = x)).indexOf("<"), !1 !== e.reduceWhiteSpace && (i = i.replace(ti, " ").replace(Kn, "")), p && (i = i.split("<").join("{{LT}}")), u = i.length, s = (" " === i.charAt(0) ? m : "") + r(), o = 0; o < u; o++)
                if (l = i.charAt(o), y && (c = y(i.substr(o), e.specialChars))) l = i.substr(o, c || 1), s += f && " " !== l ? n() + l + "</" + h + ">" : l, o += c - 1;
                else if (_(l) && !_(i.charAt(o - 1)) && o) {
                for (s += v ? D : "", v = 0; _(i.charAt(o + 1));) s += m, o++;
                o === u - 1 ? s += m : ")" !== i.charAt(o + 1) && (s += m + r(), v = 1)
            } else "{" === l && "{{LT}}" === i.substr(o, 6) ? (s += f ? n() + "{{LT}}</" + h + ">" : "{{LT}}", o += 5) : l.charCodeAt(0) >= 55296 && l.charCodeAt(0) <= 56319 || i.charCodeAt(o + 1) >= 65024 && i.charCodeAt(o + 1) <= 65039 ? (a = ((i.substr(o, 12).split(Vn) || [])[1] || "").length || 2, s += f && " " !== l ? n() + i.substr(o, a) + "</" + h + ">" : i.substr(o, a), o += a - 1) : s += f && " " !== l ? n() + l + "</" + h + ">" : l;
            t.outerHTML = s + (v ? D : ""), p && ai(b, "{{LT}}", "<")
        },
        di = function t(e, r, n, i) {
            var s, o, a = Jn(e.childNodes),
                u = a.length,
                l = ii(r);
            if (3 !== e.nodeType || u > 1) {
                for (r.absolute = !1, s = 0; s < u; s++)(o = a[s])._next = o._isFirst = o._parent = o._wordEnd = null, (3 !== o.nodeType || /\S+/.test(o.nodeValue)) && (l && 3 !== o.nodeType && "inline" === ni(o).display && (o.style.display = "inline-block", o.style.position = "relative"), o._isSplit = !0, t(o, r, n, i));
                return r.absolute = l, void(e._isSplit = !0)
            }
            fi(e, r, n, i)
        },
        gi = function() {
            function t(t, e) {
                $n || ri(), this.elements = Jn(t), this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = e || {}, Zn(this), this.split(e)
            }
            var e = t.prototype;
            return e.split = function(t) {
                this.isSplit && this.revert(), this.vars = t = t || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;
                for (var e, r, n, i = this.elements.length, s = t.tag ? t.tag : t.span ? "span" : "div", o = oi(t.wordsClass, s), a = oi(t.charsClass, s); --i > -1;) n = this.elements[i], this._originals[i] = {
                    html: n.innerHTML,
                    style: n.getAttribute("style")
                }, e = n.clientHeight, r = n.clientWidth, di(n, t, o, a), hi(n, t, this.chars, this.words, this.lines, r, e);
                return this.chars.reverse(), this.words.reverse(), this.lines.reverse(), this.isSplit = !0, this
            }, e.revert = function() {
                var t = this._originals;
                if (!t) throw "revert() call wasn't scoped properly.";
                return this.elements.forEach((function(e, r) {
                    e.innerHTML = t[r].html, e.setAttribute("style", t[r].style)
                })), this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this
            }, t.create = function(e, r) {
                return new t(e, r)
            }, t
        }();
    gi.version = "3.12.5", gi.register = ri;
    /*!
     * paths 3.12.5
     * https://gsap.com
     *
     * Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var _i = /[achlmqstvz]|(-?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,
        mi = /(?:(-)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,
        Di = /[\+\-]?\d*\.?\d+e[\+\-]?\d+/gi,
        vi = /(^[#\.][a-z]|[a-y][a-z])/i,
        yi = Math.PI / 180,
        xi = 180 / Math.PI,
        bi = Math.sin,
        wi = Math.cos,
        Ci = Math.abs,
        Fi = Math.sqrt,
        Ei = Math.atan2,
        Ti = 1e8,
        Si = function(t) {
            return "string" == typeof t
        },
        Mi = function(t) {
            return "number" == typeof t
        },
        Ai = {},
        Oi = {},
        Ri = 1e5,
        Pi = function(t) {
            return Math.round((t + Ti) % 1 * Ri) / Ri || (t < 0 ? 0 : 1)
        },
        ki = function(t) {
            return Math.round(t * Ri) / Ri || 0
        },
        Bi = function(t) {
            return Math.round(1e10 * t) / 1e10 || 0
        },
        Li = function(t, e, r, n) {
            var i = t[e],
                s = 1 === n ? 6 : Wi(i, r, n);
            if ((s || !n) && s + r + 2 < i.length) return t.splice(e, 0, i.slice(0, r + s + 2)), i.splice(0, r + s), 1
        },
        Ni = function(t, e, r) {
            var n = t.length,
                i = ~~(r * n);
            if (t[i] > e) {
                for (; --i && t[i] > e;);
                i < 0 && (i = 0)
            } else
                for (; t[++i] < e && i < n;);
            return i < n ? i : n - 1
        },
        Ii = function(t, e) {
            return e.totalLength = t.totalLength, t.samples ? (e.samples = t.samples.slice(0), e.lookup = t.lookup.slice(0), e.minLength = t.minLength, e.resolution = t.resolution) : t.totalPoints && (e.totalPoints = t.totalPoints), e
        },
        zi = function(t, e) {
            var r = t.length,
                n = t[r - 1] || [],
                i = n.length;
            r && e[0] === n[i - 2] && e[1] === n[i - 1] && (e = n.concat(e.slice(2)), r--), t[r] = e
        };

    function Xi(t) {
        var e, r = (t = Si(t) && vi.test(t) && document.querySelector(t) || t).getAttribute ? t : 0;
        return r && (t = t.getAttribute("d")) ? (r._gsPath || (r._gsPath = {}), (e = r._gsPath[t]) && !e._dirty ? e : r._gsPath[t] = Ji(t)) : t ? Si(t) ? Ji(t) : Mi(t[0]) ? [t] : t : console.warn("Expecting a <path> element or an SVG path data string")
    }

    function ji(t) {
        var e, r = 0;
        for (t.reverse(); r < t.length; r += 2) e = t[r], t[r] = t[r + 1], t[r + 1] = e;
        t.reversed = !t.reversed
    }
    var Yi = {
        rect: "rx,ry,x,y,width,height",
        circle: "r,cx,cy",
        ellipse: "rx,ry,cx,cy",
        line: "x1,x2,y1,y2"
    };

    function qi(t, e, r) {
        var n, i = t[e],
            s = t[e + 2],
            o = t[e + 4];
        return i += (s - i) * r, i += ((s += (o - s) * r) - i) * r, n = s + (o + (t[e + 6] - o) * r - s) * r - i, i = t[e + 1], i += ((s = t[e + 3]) - i) * r, i += ((s += ((o = t[e + 5]) - s) * r) - i) * r, ki(Ei(s + (o + (t[e + 7] - o) * r - s) * r - i, n) * xi)
    }

    function Gi(t, e, r) {
        r = void 0 === r ? 1 : Bi(r) || 0, e = Bi(e) || 0;
        var n = Math.max(0, ~~(Ci(r - e) - 1e-8)),
            i = function(t) {
                for (var e = [], r = 0; r < t.length; r++) e[r] = Ii(t[r], t[r].slice(0));
                return Ii(t, e)
            }(t);
        if (e > r && (e = 1 - e, r = 1 - r, function(t, e) {
                var r = t.length;
                for (t.reverse(); r--;) t[r].reversed || ji(t[r])
            }(i), i.totalLength = 0), e < 0 || r < 0) {
            var s = Math.abs(~~Math.min(e, r)) + 1;
            e += s, r += s
        }
        i.totalLength || Hi(i);
        var o, a, u, l, p, c, h, f, d = r > 1,
            g = Ui(i, e, Ai, !0),
            _ = Ui(i, r, Oi),
            m = _.segment,
            D = g.segment,
            v = _.segIndex,
            y = g.segIndex,
            x = _.i,
            b = g.i,
            w = y === v,
            C = x === b && w;
        if (d || n) {
            for (o = v < y || w && x < b || C && _.t < g.t, Li(i, y, b, g.t) && (y++, o || (v++, C ? (_.t = (_.t - g.t) / (1 - g.t), x = 0) : w && (x -= b))), Math.abs(1 - (r - e)) < 1e-5 ? v = y - 1 : !_.t && v ? v-- : Li(i, v, x, _.t) && o && y++, 1 === g.t && (y = (y + 1) % i.length), p = [], h = 1 + (c = i.length) * n, f = y, h += (c - y + v) % c, l = 0; l < h; l++) zi(p, i[f++ % c]);
            i = p
        } else if (u = 1 === _.t ? 6 : Wi(m, x, _.t), e !== r)
            for (a = Wi(D, b, C ? g.t / _.t : g.t), w && (u += a), m.splice(x + u + 2), (a || b) && D.splice(0, b + a), l = i.length; l--;)(l < y || l > v) && i.splice(l, 1);
        else m.angle = qi(m, x + u, 0), g = m[x += u], _ = m[x + 1], m.length = m.totalLength = 0, m.totalPoints = i.totalPoints = 8, m.push(g, _, g, _, g, _, g, _);
        return i.totalLength = 0, i
    }

    function Vi(t, e, r) {
        e = e || 0, t.samples || (t.samples = [], t.lookup = []);
        var n, i, s, o, a, u, l, p, c, h, f, d, g, _, m, D, v, y = ~~t.resolution || 12,
            x = 1 / y,
            b = r ? e + 6 * r + 1 : t.length,
            w = t[e],
            C = t[e + 1],
            F = e ? e / 6 * y : 0,
            E = t.samples,
            T = t.lookup,
            S = (e ? t.minLength : Ti) || Ti,
            M = E[F + r * y - 1],
            A = e ? E[F - 1] : 0;
        for (E.length = T.length = 0, i = e + 2; i < b; i += 6) {
            if (s = t[i + 4] - w, o = t[i + 2] - w, a = t[i] - w, p = t[i + 5] - C, c = t[i + 3] - C, h = t[i + 1] - C, u = l = f = d = 0, Ci(s) < .01 && Ci(p) < .01 && Ci(a) + Ci(h) < .01) t.length > 8 && (t.splice(i, 6), i -= 6, b -= 6);
            else
                for (n = 1; n <= y; n++) u = l - (l = ((_ = x * n) * _ * s + 3 * (g = 1 - _) * (_ * o + g * a)) * _), f = d - (d = (_ * _ * p + 3 * g * (_ * c + g * h)) * _), (D = Fi(f * f + u * u)) < S && (S = D), A += D, E[F++] = A;
            w += s, C += p
        }
        if (M)
            for (M -= A; F < E.length; F++) E[F] += M;
        if (E.length && S) {
            if (t.totalLength = v = E[E.length - 1] || 0, t.minLength = S, v / S < 9999)
                for (D = m = 0, n = 0; n < v; n += S) T[D++] = E[m] < n ? ++m : m
        } else t.totalLength = E[0] = 0;
        return e ? A - E[e / 2 - 1] : A
    }

    function Hi(t, e) {
        var r, n, i;
        for (i = r = n = 0; i < t.length; i++) t[i].resolution = ~~e || 12, n += t[i].length, r += Vi(t[i]);
        return t.totalPoints = n, t.totalLength = r, t
    }

    function Wi(t, e, r) {
        if (r <= 0 || r >= 1) return 0;
        var n = t[e],
            i = t[e + 1],
            s = t[e + 2],
            o = t[e + 3],
            a = t[e + 4],
            u = t[e + 5],
            l = n + (s - n) * r,
            p = s + (a - s) * r,
            c = i + (o - i) * r,
            h = o + (u - o) * r,
            f = l + (p - l) * r,
            d = c + (h - c) * r,
            g = a + (t[e + 6] - a) * r,
            _ = u + (t[e + 7] - u) * r;
        return p += (g - p) * r, h += (_ - h) * r, t.splice(e + 2, 4, ki(l), ki(c), ki(f), ki(d), ki(f + (p - f) * r), ki(d + (h - d) * r), ki(p), ki(h), ki(g), ki(_)), t.samples && t.samples.splice(e / 6 * t.resolution | 0, 0, 0, 0, 0, 0, 0, 0), 6
    }

    function Ui(t, e, r, n) {
        r = r || {}, t.totalLength || Hi(t), (e < 0 || e > 1) && (e = Pi(e));
        var i, s, o, a, u, l, p, c = 0,
            h = t[0];
        if (e)
            if (1 === e) p = 1, l = (h = t[c = t.length - 1]).length - 8;
            else {
                if (t.length > 1) {
                    for (o = t.totalLength * e, u = l = 0;
                        (u += t[l++].totalLength) < o;) c = l;
                    e = (o - (a = u - (h = t[c]).totalLength)) / (u - a) || 0
                }
                i = h.samples, s = h.resolution, o = h.totalLength * e, a = (l = h.lookup.length ? h.lookup[~~(o / h.minLength)] || 0 : Ni(i, o, e)) ? i[l - 1] : 0, (u = i[l]) < o && (a = u, u = i[++l]), p = 1 / s * ((o - a) / (u - a) + l % s), l = 6 * ~~(l / s), n && 1 === p && (l + 6 < h.length ? (l += 6, p = 0) : c + 1 < t.length && (l = p = 0, h = t[++c]))
            }
        else p = l = c = 0, h = t[0];
        return r.t = p, r.i = l, r.path = t, r.segment = h, r.segIndex = c, r
    }

    function $i(t, e, r, n) {
        var i, s, o, a, u, l, p, c, h, f = t[0],
            d = n || {};
        if ((e < 0 || e > 1) && (e = Pi(e)), f.lookup || Hi(t), t.length > 1) {
            for (o = t.totalLength * e, u = l = 0;
                (u += t[l++].totalLength) < o;) f = t[l];
            e = (o - (a = u - f.totalLength)) / (u - a) || 0
        }
        return i = f.samples, s = f.resolution, o = f.totalLength * e, a = (l = f.lookup.length ? f.lookup[e < 1 ? ~~(o / f.minLength) : f.lookup.length - 1] || 0 : Ni(i, o, e)) ? i[l - 1] : 0, (u = i[l]) < o && (a = u, u = i[++l]), h = 1 - (p = 1 / s * ((o - a) / (u - a) + l % s) || 0), c = f[l = 6 * ~~(l / s)], d.x = ki((p * p * (f[l + 6] - c) + 3 * h * (p * (f[l + 4] - c) + h * (f[l + 2] - c))) * p + c), d.y = ki((p * p * (f[l + 7] - (c = f[l + 1])) + 3 * h * (p * (f[l + 5] - c) + h * (f[l + 3] - c))) * p + c), r && (d.angle = f.totalLength ? qi(f, l, p >= 1 ? 1 - 1e-9 : p || 1e-9) : f.angle || 0), d
    }

    function Qi(t, e, r, n, i, s, o) {
        for (var a, u, l, p, c, h = t.length; --h > -1;)
            for (u = (a = t[h]).length, l = 0; l < u; l += 2) p = a[l], c = a[l + 1], a[l] = p * e + c * n + s, a[l + 1] = p * r + c * i + o;
        return t._dirty = 1, t
    }

    function Zi(t, e, r, n, i, s, o, a, u) {
        if (t !== a || e !== u) {
            r = Ci(r), n = Ci(n);
            var l = i % 360 * yi,
                p = wi(l),
                c = bi(l),
                h = Math.PI,
                f = 2 * h,
                d = (t - a) / 2,
                g = (e - u) / 2,
                _ = p * d + c * g,
                m = -c * d + p * g,
                D = _ * _,
                v = m * m,
                y = D / (r * r) + v / (n * n);
            y > 1 && (r = Fi(y) * r, n = Fi(y) * n);
            var x = r * r,
                b = n * n,
                w = (x * b - x * v - b * D) / (x * v + b * D);
            w < 0 && (w = 0);
            var C = (s === o ? -1 : 1) * Fi(w),
                F = C * (r * m / n),
                E = C * (-n * _ / r),
                T = (t + a) / 2 + (p * F - c * E),
                S = (e + u) / 2 + (c * F + p * E),
                M = (_ - F) / r,
                A = (m - E) / n,
                O = (-_ - F) / r,
                R = (-m - E) / n,
                P = M * M + A * A,
                k = (A < 0 ? -1 : 1) * Math.acos(M / Fi(P)),
                B = (M * R - A * O < 0 ? -1 : 1) * Math.acos((M * O + A * R) / Fi(P * (O * O + R * R)));
            isNaN(B) && (B = h), !o && B > 0 ? B -= f : o && B < 0 && (B += f), k %= f, B %= f;
            var L, N = Math.ceil(Ci(B) / (f / 4)),
                I = [],
                z = B / N,
                X = 4 / 3 * bi(z / 2) / (1 + wi(z / 2)),
                j = p * r,
                Y = c * r,
                q = c * -n,
                G = p * n;
            for (L = 0; L < N; L++) _ = wi(i = k + L * z), m = bi(i), M = wi(i += z), A = bi(i), I.push(_ - X * m, m + X * _, M + X * A, A - X * M, M, A);
            for (L = 0; L < I.length; L += 2) _ = I[L], m = I[L + 1], I[L] = _ * j + m * q + T, I[L + 1] = _ * Y + m * G + S;
            return I[L - 2] = a, I[L - 1] = u, I
        }
    }

    function Ji(t) {
        var e, r, n, i, s, o, a, u, l, p, c, h, f, d, g, _ = (t + "").replace(Di, (function(t) {
                var e = +t;
                return e < 1e-4 && e > -1e-4 ? 0 : e
            })).match(_i) || [],
            m = [],
            D = 0,
            v = 0,
            y = 2 / 3,
            x = _.length,
            b = 0,
            w = "ERROR: malformed path: " + t,
            C = function(t, e, r, n) {
                p = (r - t) / 3, c = (n - e) / 3, a.push(t + p, e + c, r - p, n - c, r, n)
            };
        if (!t || !isNaN(_[0]) || isNaN(_[1])) return console.log(w), m;
        for (e = 0; e < x; e++)
            if (f = s, isNaN(_[e]) ? o = (s = _[e].toUpperCase()) !== _[e] : e--, n = +_[e + 1], i = +_[e + 2], o && (n += D, i += v), e || (u = n, l = i), "M" === s) a && (a.length < 8 ? m.length -= 1 : b += a.length), D = u = n, v = l = i, a = [n, i], m.push(a), e += 2, s = "L";
            else if ("C" === s) a || (a = [0, 0]), o || (D = v = 0), a.push(n, i, D + 1 * _[e + 3], v + 1 * _[e + 4], D += 1 * _[e + 5], v += 1 * _[e + 6]), e += 6;
        else if ("S" === s) p = D, c = v, "C" !== f && "S" !== f || (p += D - a[a.length - 4], c += v - a[a.length - 3]), o || (D = v = 0), a.push(p, c, n, i, D += 1 * _[e + 3], v += 1 * _[e + 4]), e += 4;
        else if ("Q" === s) p = D + (n - D) * y, c = v + (i - v) * y, o || (D = v = 0), D += 1 * _[e + 3], v += 1 * _[e + 4], a.push(p, c, D + (n - D) * y, v + (i - v) * y, D, v), e += 4;
        else if ("T" === s) p = D - a[a.length - 4], c = v - a[a.length - 3], a.push(D + p, v + c, n + (D + 1.5 * p - n) * y, i + (v + 1.5 * c - i) * y, D = n, v = i), e += 2;
        else if ("H" === s) C(D, v, D = n, v), e += 1;
        else if ("V" === s) C(D, v, D, v = n + (o ? v - D : 0)), e += 1;
        else if ("L" === s || "Z" === s) "Z" === s && (n = u, i = l, a.closed = !0), ("L" === s || Ci(D - n) > .5 || Ci(v - i) > .5) && (C(D, v, n, i), "L" === s && (e += 2)), D = n, v = i;
        else if ("A" === s) {
            if (d = _[e + 4], g = _[e + 5], p = _[e + 6], c = _[e + 7], r = 7, d.length > 1 && (d.length < 3 ? (c = p, p = g, r--) : (c = g, p = d.substr(2), r -= 2), g = d.charAt(1), d = d.charAt(0)), h = Zi(D, v, +_[e + 1], +_[e + 2], +_[e + 3], +d, +g, (o ? D : 0) + 1 * p, (o ? v : 0) + 1 * c), e += r, h)
                for (r = 0; r < h.length; r++) a.push(h[r]);
            D = a[a.length - 2], v = a[a.length - 1]
        } else console.log(w);
        return (e = a.length) < 6 ? (m.pop(), e = 0) : a[0] === a[e - 2] && a[1] === a[e - 1] && (a.closed = !0), m.totalPoints = b + e, m
    }

    function Ki(t, e) {
        void 0 === e && (e = 1);
        for (var r = t[0], n = 0, i = [r, n], s = 2; s < t.length; s += 2) i.push(r, n, t[s], n = (t[s] - r) * e / 2, r = t[s], -n);
        return i
    }

    function ts(t, e) {
        Ci(t[0] - t[2]) < 1e-4 && Ci(t[1] - t[3]) < 1e-4 && (t = t.slice(2));
        var r, n, i, s, o, a, u, l, p, c, h, f, d, g, _ = t.length - 2,
            m = +t[0],
            D = +t[1],
            v = +t[2],
            y = +t[3],
            x = [m, D, m, D],
            b = v - m,
            w = y - D,
            C = Math.abs(t[_] - m) < .001 && Math.abs(t[_ + 1] - D) < .001;
        for (C && (t.push(v, y), v = m, y = D, m = t[_ - 2], D = t[_ - 1], t.unshift(m, D), _ += 4), e = e || 0 === e ? +e : 1, i = 2; i < _; i += 2) r = m, n = D, m = v, D = y, v = +t[i + 2], y = +t[i + 3], m === v && D === y || (s = b, o = w, b = v - m, w = y - D, l = ((a = Fi(s * s + o * o)) + (u = Fi(b * b + w * w))) * e * .25 / Fi(Math.pow(b / u + s / a, 2) + Math.pow(w / u + o / a, 2)), h = m - ((p = m - (m - r) * (a ? l / a : 0)) + (((c = m + (v - m) * (u ? l / u : 0)) - p) * (3 * a / (a + u) + .5) / 4 || 0)), g = D - ((f = D - (D - n) * (a ? l / a : 0)) + (((d = D + (y - D) * (u ? l / u : 0)) - f) * (3 * a / (a + u) + .5) / 4 || 0)), m === r && D === n || x.push(ki(p + h), ki(f + g), ki(m), ki(D), ki(c + h), ki(d + g)));
        return m !== v || D !== y || x.length < 4 ? x.push(ki(v), ki(y), ki(v), ki(y)) : x.length -= 2, 2 === x.length ? x.push(m, D, m, D, m, D) : C && (x.splice(0, 6), x.length = x.length - 6), x
    }

    function es(t) {
        Mi(t[0]) && (t = [t]);
        var e, r, n, i, s = "",
            o = t.length;
        for (r = 0; r < o; r++) {
            for (i = t[r], s += "M" + ki(i[0]) + "," + ki(i[1]) + " C", e = i.length, n = 2; n < e; n++) s += ki(i[n++]) + "," + ki(i[n++]) + " " + ki(i[n++]) + "," + ki(i[n++]) + " " + ki(i[n++]) + "," + ki(i[n]) + " ";
            i.closed && (s += "z")
        }
        return s
    }
    /*!
     * CustomEase 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var rs, ns, is = function() {
            return rs || "undefined" != typeof window && (rs = window.gsap) && rs.registerPlugin && rs
        },
        ss = function() {
            (rs = is()) ? (rs.registerEase("_CE", ps.create), ns = 1) : console.warn("Please gsap.registerPlugin(CustomEase)")
        },
        os = function(t) {
            return ~~(1e3 * t + (t < 0 ? -.5 : .5)) / 1e3
        },
        as = /[-+=.]*\d+[.e\-+]*\d*[e\-+]*\d*/gi,
        us = /[cLlsSaAhHvVtTqQ]/g,
        ls = function t(e, r, n, i, s, o, a, u, l, p, c) {
            var h, f = (e + n) / 2,
                d = (r + i) / 2,
                g = (n + s) / 2,
                _ = (i + o) / 2,
                m = (s + a) / 2,
                D = (o + u) / 2,
                v = (f + g) / 2,
                y = (d + _) / 2,
                x = (g + m) / 2,
                b = (_ + D) / 2,
                w = (v + x) / 2,
                C = (y + b) / 2,
                F = a - e,
                E = u - r,
                T = Math.abs((n - a) * E - (i - u) * F),
                S = Math.abs((s - a) * E - (o - u) * F);
            return p || (p = [{
                x: e,
                y: r
            }, {
                x: a,
                y: u
            }], c = 1), p.splice(c || p.length - 1, 0, {
                x: w,
                y: C
            }), (T + S) * (T + S) > l * (F * F + E * E) && (h = p.length, t(e, r, f, d, v, y, w, C, l, p, c), t(w, C, x, b, m, D, a, u, l, p, c + 1 + (p.length - h))), p
        },
        ps = function() {
            function t(t, e, r) {
                ns || ss(), this.id = t, this.setData(e, r)
            }
            var e = t.prototype;
            return e.setData = function(t, e) {
                e = e || {};
                var r, n, i, s, o, a, u, l, p, c = (t = t || "0,0,1,1").match(as),
                    h = 1,
                    f = [],
                    d = [],
                    g = e.precision || 1,
                    _ = g <= 1;
                if (this.data = t, (us.test(t) || ~t.indexOf("M") && t.indexOf("C") < 0) && (c = Ji(t)[0]), 4 === (r = c.length)) c.unshift(0, 0), c.push(1, 1), r = 8;
                else if ((r - 2) % 6) throw "Invalid CustomEase";
                for (0 == +c[0] && 1 == +c[r - 2] || function(t, e, r) {
                        r || 0 === r || (r = Math.max(+t[t.length - 1], +t[1]));
                        var n, i = -1 * +t[0],
                            s = -r,
                            o = t.length,
                            a = 1 / (+t[o - 2] + i),
                            u = -e || (Math.abs(+t[o - 1] - +t[1]) < .01 * (+t[o - 2] - +t[0]) ? function(t) {
                                var e, r = t.length,
                                    n = 1e20;
                                for (e = 1; e < r; e += 6) + t[e] < n && (n = +t[e]);
                                return n
                            }(t) + s : +t[o - 1] + s);
                        for (u = u ? 1 / u : -a, n = 0; n < o; n += 2) t[n] = (+t[n] + i) * a, t[n + 1] = (+t[n + 1] + s) * u
                    }(c, e.height, e.originY), this.segment = c, s = 2; s < r; s += 6) n = {
                    x: +c[s - 2],
                    y: +c[s - 1]
                }, i = {
                    x: +c[s + 4],
                    y: +c[s + 5]
                }, f.push(n, i), ls(n.x, n.y, +c[s], +c[s + 1], +c[s + 2], +c[s + 3], i.x, i.y, 1 / (2e5 * g), f, f.length - 1);
                for (r = f.length, s = 0; s < r; s++) u = f[s], l = f[s - 1] || u, (u.x > l.x || l.y !== u.y && l.x === u.x || u === l) && u.x <= 1 ? (l.cx = u.x - l.x, l.cy = u.y - l.y, l.n = u, l.nx = u.x, _ && s > 1 && Math.abs(l.cy / l.cx - f[s - 2].cy / f[s - 2].cx) > 2 && (_ = 0), l.cx < h && (l.cx ? h = l.cx : (l.cx = .001, s === r - 1 && (l.x -= .001, h = Math.min(h, .001), _ = 0)))) : (f.splice(s--, 1), r--);
                if (o = 1 / (r = 1 / h + 1 | 0), a = 0, u = f[0], _) {
                    for (s = 0; s < r; s++) p = s * o, u.nx < p && (u = f[++a]), n = u.y + (p - u.x) / u.cx * u.cy, d[s] = {
                        x: p,
                        cx: o,
                        y: n,
                        cy: 0,
                        nx: 9
                    }, s && (d[s - 1].cy = n - d[s - 1].y);
                    d[r - 1].cy = f[f.length - 1].y - n
                } else {
                    for (s = 0; s < r; s++) u.nx < s * o && (u = f[++a]), d[s] = u;
                    a < f.length - 1 && (d[s - 1] = f[f.length - 2])
                }
                return this.ease = function(t) {
                    var e = d[t * r | 0] || d[r - 1];
                    return e.nx < t && (e = e.n), e.y + (t - e.x) / e.cx * e.cy
                }, this.ease.custom = this, this.id && rs && rs.registerEase(this.id, this.ease), this
            }, e.getSVGData = function(e) {
                return t.getSVGData(this, e)
            }, t.create = function(e, r, n) {
                return new t(e, r, n).ease
            }, t.register = function(t) {
                rs = t, ss()
            }, t.get = function(t) {
                return rs.parseEase(t)
            }, t.getSVGData = function(e, r) {
                var n, i, s, o, a, u, l, p, c, h, f = (r = r || {}).width || 100,
                    d = r.height || 100,
                    g = r.x || 0,
                    _ = (r.y || 0) + d,
                    m = rs.utils.toArray(r.path)[0];
                if (r.invert && (d = -d, _ = 0), "string" == typeof e && (e = rs.parseEase(e)), e.custom && (e = e.custom), e instanceof t) n = es(Qi([e.segment], f, 0, 0, -d, g, _));
                else {
                    for (n = [g, _], o = 1 / (l = Math.max(5, 200 * (r.precision || 1))), p = 5 / (l += 2), c = os(g + o * f), i = ((h = os(_ + e(o) * -d)) - _) / (c - g), s = 2; s < l; s++) a = os(g + s * o * f), u = os(_ + e(s * o) * -d), (Math.abs((u - h) / (a - c) - i) > p || s === l - 1) && (n.push(c, h), i = (u - h) / (a - c)), c = a, h = u;
                    n = "M" + n.join(",")
                }
                return m && m.setAttribute("d", n), n
            }, t
        }();
    is() && rs.registerPlugin(ps), ps.version = "3.12.5";
    /*!
     * DrawSVGPlugin 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var cs, hs, fs, ds, gs, _s, ms, Ds, vs = function() {
            return "undefined" != typeof window
        },
        ys = function() {
            return cs || vs() && (cs = window.gsap) && cs.registerPlugin && cs
        },
        xs = /[-+=\.]*\d+[\.e\-\+]*\d*[e\-\+]*\d*/gi,
        bs = {
            rect: ["width", "height"],
            circle: ["r", "r"],
            ellipse: ["rx", "ry"],
            line: ["x2", "y2"]
        },
        ws = function(t) {
            return Math.round(1e4 * t) / 1e4
        },
        Cs = function(t) {
            return parseFloat(t) || 0
        },
        Fs = function(t, e) {
            var r = Cs(t);
            return ~t.indexOf("%") ? r / 100 * e : r
        },
        Es = function(t, e) {
            return Cs(t.getAttribute(e))
        },
        Ts = Math.sqrt,
        Ss = function(t, e, r, n, i, s) {
            return Ts(Math.pow((Cs(r) - Cs(t)) * i, 2) + Math.pow((Cs(n) - Cs(e)) * s, 2))
        },
        Ms = function(t) {
            return console.warn(t)
        },
        As = function(t) {
            return "non-scaling-stroke" === t.getAttribute("vector-effect")
        },
        Os = function(t) {
            if (!(t = hs(t)[0])) return 0;
            var e, r, n, i, s, o, a, u = t.tagName.toLowerCase(),
                l = t.style,
                p = 1,
                c = 1;
            As(t) && (c = t.getScreenCTM(), p = Ts(c.a * c.a + c.b * c.b), c = Ts(c.d * c.d + c.c * c.c));
            try {
                r = t.getBBox()
            } catch (t) {
                Ms("Some browsers won't measure invisible elements (like display:none or masks inside defs).")
            }
            var h = r || {
                    x: 0,
                    y: 0,
                    width: 0,
                    height: 0
                },
                f = h.x,
                d = h.y,
                g = h.width,
                _ = h.height;
            if (r && (g || _) || !bs[u] || (g = Es(t, bs[u][0]), _ = Es(t, bs[u][1]), "rect" !== u && "line" !== u && (g *= 2, _ *= 2), "line" === u && (f = Es(t, "x1"), d = Es(t, "y1"), g = Math.abs(g - f), _ = Math.abs(_ - d))), "path" === u) i = l.strokeDasharray, l.strokeDasharray = "none", e = t.getTotalLength() || 0, ws(p) !== ws(c) && !_s && (_s = 1) && Ms("Warning: <path> length cannot be measured when vector-effect is non-scaling-stroke and the element isn't proportionally scaled."), e *= (p + c) / 2, l.strokeDasharray = i;
            else if ("rect" === u) e = 2 * g * p + 2 * _ * c;
            else if ("line" === u) e = Ss(f, d, f + g, d + _, p, c);
            else if ("polyline" === u || "polygon" === u)
                for (n = t.getAttribute("points").match(xs) || [], "polygon" === u && n.push(n[0], n[1]), e = 0, s = 2; s < n.length; s += 2) e += Ss(n[s - 2], n[s - 1], n[s], n[s + 1], p, c) || 0;
            else "circle" !== u && "ellipse" !== u || (o = g / 2 * p, a = _ / 2 * c, e = Math.PI * (3 * (o + a) - Ts((3 * o + a) * (o + 3 * a))));
            return e || 0
        },
        Rs = function(t, e) {
            if (!(t = hs(t)[0])) return [0, 0];
            e || (e = Os(t) + 1);
            var r = fs.getComputedStyle(t),
                n = r.strokeDasharray || "",
                i = Cs(r.strokeDashoffset),
                s = n.indexOf(",");
            return s < 0 && (s = n.indexOf(" ")), (n = s < 0 ? e : Cs(n.substr(0, s))) > e && (n = e), [-i || 0, n - i || 0]
        },
        Ps = function() {
            vs() && (document, fs = window, gs = cs = ys(), hs = cs.utils.toArray, ms = cs.core.getStyleSaver, Ds = cs.core.reverting || function() {}, ds = -1 !== ((fs.navigator || {}).userAgent || "").indexOf("Edge"))
        },
        ks = {
            version: "3.12.5",
            name: "drawSVG",
            register: function(t) {
                cs = t, Ps()
            },
            init: function(t, e, r, n, i) {
                if (!t.getBBox) return !1;
                gs || Ps();
                var s, o, a, u = Os(t);
                return this.styles = ms && ms(t, "strokeDashoffset,strokeDasharray,strokeMiterlimit"), this.tween = r, this._style = t.style, this._target = t, e + "" == "true" ? e = "0 100%" : e ? -1 === (e + "").indexOf(" ") && (e = "0 " + e) : e = "0 0", o = function(t, e, r) {
                    var n, i, s = t.indexOf(" ");
                    return s < 0 ? (n = void 0 !== r ? r + "" : t, i = t) : (n = t.substr(0, s), i = t.substr(s + 1)), (n = Fs(n, e)) > (i = Fs(i, e)) ? [i, n] : [n, i]
                }(e, u, (s = Rs(t, u))[0]), this._length = ws(u), this._dash = ws(s[1] - s[0]), this._offset = ws(-s[0]), this._dashPT = this.add(this, "_dash", this._dash, ws(o[1] - o[0]), 0, 0, 0, 0, 0, 1), this._offsetPT = this.add(this, "_offset", this._offset, ws(-o[0]), 0, 0, 0, 0, 0, 1), ds && (a = fs.getComputedStyle(t)).strokeLinecap !== a.strokeLinejoin && (o = Cs(a.strokeMiterlimit), this.add(t.style, "strokeMiterlimit", o, o + .01)), this._live = As(t) || ~(e + "").indexOf("live"), this._nowrap = ~(e + "").indexOf("nowrap"), this._props.push("drawSVG"), 1
            },
            render: function(t, e) {
                if (e.tween._time || !Ds()) {
                    var r, n, i, s, o = e._pt,
                        a = e._style;
                    if (o) {
                        for (e._live && (r = Os(e._target)) !== e._length && (n = r / e._length, e._length = r, e._offsetPT && (e._offsetPT.s *= n, e._offsetPT.c *= n), e._dashPT ? (e._dashPT.s *= n, e._dashPT.c *= n) : e._dash *= n); o;) o.r(t, o.d), o = o._next;
                        i = e._dash || t && 1 !== t && 1e-4 || 0, r = e._length - i + .1, s = e._offset, i && s && i + Math.abs(s % e._length) > e._length - .2 && (s += s < 0 ? .1 : -.1) && (r += .1), a.strokeDashoffset = i ? s : s + .001, a.strokeDasharray = r < .2 ? "none" : i ? i + "px," + (e._nowrap ? 999999 : r) + "px" : "0px, 999999px"
                    }
                } else e.styles.revert()
            },
            getLength: Os,
            getPosition: Rs
        };
    ys() && cs.registerPlugin(ks);
    /*!
     * CustomBounce 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var Bs, Ls, Ns, Is = function() {
            return Bs || "undefined" != typeof window && (Bs = window.gsap) && Bs.registerPlugin && Bs
        },
        zs = function(t) {
            Bs = Is(), (Ns = Bs && Bs.parseEase("_CE")) ? (Ls = 1, Bs.parseEase("bounce").config = function(t) {
                return "object" == typeof t ? js("", t) : js("bounce(" + t + ")", {
                    strength: +t
                })
            }) : t && console.warn("Please gsap.registerPlugin(CustomEase, CustomBounce)")
        },
        Xs = function(t) {
            var e, r = t.length,
                n = 1 / t[r - 2];
            for (e = 2; e < r; e += 2) t[e] = ~~(t[e] * n * 1e3) / 1e3;
            t[r - 2] = 1
        },
        js = function(t, e) {
            Ls || zs(1), e = e || {};
            var r, n, i, s, o, a, u, l = Math.min(.999, e.strength || .7),
                p = l,
                c = (e.squash || 0) / 100,
                h = c,
                f = 1 / .03,
                d = .2,
                g = 1,
                _ = .1,
                m = [0, 0, .07, 0, .1, 1, .1, 1],
                D = [0, 0, 0, 0, .1, 0, .1, 0];
            for (o = 0; o < 200 && (a = _ + (d *= p * ((p + 1) / 2)), s = 1 - (g *= l * l), n = (i = _ + .49 * d) + .8 * (i - (r = _ + g / f)), c && (_ += c, r += c, i += c, n += c, a += c, u = c / h, D.push(_ - c, 0, _ - c, u, _ - c / 2, u, _, u, _, 0, _, 0, _, -.6 * u, _ + (a - _) / 6, 0, a, 0), m.push(_ - c, 1, _, 1, _, 1), c *= l * l), m.push(_, 1, r, s, i, s, n, s, a, 1, a, 1), l *= .95, f = g / (a - n), _ = a, !(s > .999)); o++);
            if (e.endAtStart && "false" !== e.endAtStart) {
                if (i = -.1, m.unshift(i, 1, i, 1, -.07, 0), h)
                    for (i -= c = 2.5 * h, m.unshift(i, 1, i, 1, i, 1), D.splice(0, 6), D.unshift(i, 0, i, 0, i, 1, i + c / 2, 1, i + c, 1, i + c, 0, i + c, 0, i + c, -.6, i + c + .033, 0), o = 0; o < D.length; o += 2) D[o] -= i;
                for (o = 0; o < m.length; o += 2) m[o] -= i, m[o + 1] = 1 - m[o + 1]
            }
            return c && (Xs(D), D[2] = "C" + D[2], Ns(e.squashID || t + "-squash", "M" + D.join(","))), Xs(m), m[2] = "C" + m[2], Ns(t, "M" + m.join(","))
        },
        Ys = function() {
            function t(t, e) {
                this.ease = js(t, e)
            }
            return t.create = function(t, e) {
                return js(t, e)
            }, t.register = function(t) {
                Bs = t, zs()
            }, t
        }();
    Is() && Bs.registerPlugin(Ys), Ys.version = "3.12.5";
    /*!
     * CustomWiggle 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var qs, Gs, Vs, Hs = function() {
            return qs || "undefined" != typeof window && (qs = window.gsap) && qs.registerPlugin && qs
        },
        Ws = {
            easeOut: "M0,1,C0.7,1,0.6,0,1,0",
            easeInOut: "M0,0,C0.1,0,0.24,1,0.444,1,0.644,1,0.6,0,1,0",
            anticipate: "M0,0,C0,0.222,0.024,0.386,0,0.4,0.18,0.455,0.65,0.646,0.7,0.67,0.9,0.76,1,0.846,1,1",
            uniform: "M0,0,C0,0.95,0,1,0,1,0,1,1,1,1,1,1,1,1,0,1,0"
        },
        Us = function(t) {
            return t
        },
        $s = function(t) {
            if (!Gs)
                if (qs = Hs(), Vs = qs && qs.parseEase("_CE")) {
                    for (var e in Ws) Ws[e] = Vs("", Ws[e]);
                    Gs = 1, Zs("wiggle").config = function(t) {
                        return "object" == typeof t ? Zs("", t) : Zs("wiggle(" + t + ")", {
                            wiggles: +t
                        })
                    }
                } else t && console.warn("Please gsap.registerPlugin(CustomEase, CustomWiggle)")
        },
        Qs = function(t, e) {
            return "function" != typeof t && (t = qs.parseEase(t) || Vs("", t)), t.custom || !e ? t : function(e) {
                return 1 - t(e)
            }
        },
        Zs = function(t, e) {
            Gs || $s(1);
            var r, n, i, s, o, a, u, l, p, c = 0 | ((e = e || {}).wiggles || 10),
                h = 1 / c,
                f = h / 2,
                d = "anticipate" === e.type,
                g = Ws[e.type] || Ws.easeOut,
                _ = Us;
            if (d && (_ = g, g = Ws.easeOut), e.timingEase && (_ = Qs(e.timingEase)), e.amplitudeEase && (g = Qs(e.amplitudeEase, !0)), l = [0, 0, (a = _(f)) / 4, 0, a / 2, u = d ? -g(f) : g(f), a, u], "random" === e.type) {
                for (l.length = 4, r = _(h), n = 2 * Math.random() - 1, p = 2; p < c; p++) f = r, u = n, r = _(h * p), n = 2 * Math.random() - 1, i = Math.atan2(n - l[l.length - 3], r - l[l.length - 4]), s = Math.cos(i) * h, o = Math.sin(i) * h, l.push(f - s, u - o, f, u, f + s, u + o);
                l.push(r, 0, 1, 0)
            } else {
                for (p = 1; p < c; p++) l.push(_(f + h / 2), u), f += h, u = (u > 0 ? -1 : 1) * g(p * h), a = _(f), l.push(_(f - h / 2), u, a, u);
                l.push(_(f + h / 4), u, _(f + h / 4), 0, 1, 0)
            }
            for (p = l.length; --p > -1;) l[p] = ~~(1e3 * l[p]) / 1e3;
            return l[2] = "C" + l[2], Vs(t, "M" + l.join(","))
        },
        Js = function() {
            function t(t, e) {
                this.ease = Zs(t, e)
            }
            return t.create = function(t, e) {
                return Zs(t, e)
            }, t.register = function(t) {
                qs = t, $s()
            }, t
        }();
    Hs() && qs.registerPlugin(Js), Js.version = "3.12.5";
    /*!
     * matrix 3.12.5
     * https://gsap.com
     *
     * Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var Ks, to, eo, ro, no, io, so, oo, ao, uo = "transform",
        lo = uo + "Origin",
        po = function(t) {
            var e = t.ownerDocument || t;
            !(uo in t.style) && "msTransform" in t.style && (lo = (uo = "msTransform") + "Origin");
            for (; e.parentNode && (e = e.parentNode););
            if (to = window, so = new Do, e) {
                Ks = e, eo = e.documentElement, ro = e.body, (oo = Ks.createElementNS("http://www.w3.org/2000/svg", "g")).style.transform = "none";
                var r = e.createElement("div"),
                    n = e.createElement("div"),
                    i = e && (e.body || e.firstElementChild);
                i && i.appendChild && (i.appendChild(r), r.appendChild(n), r.setAttribute("style", "position:static;transform:translate3d(0,0,1px)"), ao = n.offsetParent !== r, i.removeChild(r))
            }
            return e
        },
        co = [],
        ho = [],
        fo = function(t) {
            return t.ownerSVGElement || ("svg" === (t.tagName + "").toLowerCase() ? t : null)
        },
        go = function t(e) {
            return "fixed" === to.getComputedStyle(e).position || ((e = e.parentNode) && 1 === e.nodeType ? t(e) : void 0)
        },
        _o = function t(e, r) {
            if (e.parentNode && (Ks || po(e))) {
                var n = fo(e),
                    i = n ? n.getAttribute("xmlns") || "http://www.w3.org/2000/svg" : "http://www.w3.org/1999/xhtml",
                    s = n ? r ? "rect" : "g" : "div",
                    o = 2 !== r ? 0 : 100,
                    a = 3 === r ? 100 : 0,
                    u = "position:absolute;display:block;pointer-events:none;margin:0;padding:0;",
                    l = Ks.createElementNS ? Ks.createElementNS(i.replace(/^https/, "http"), s) : Ks.createElement(s);
                return r && (n ? (io || (io = t(e)), l.setAttribute("width", .01), l.setAttribute("height", .01), l.setAttribute("transform", "translate(" + o + "," + a + ")"), io.appendChild(l)) : (no || ((no = t(e)).style.cssText = u), l.style.cssText = u + "width:0.1px;height:0.1px;top:" + a + "px;left:" + o + "px", no.appendChild(l))), l
            }
            throw "Need document and parent."
        },
        mo = function(t, e, r, n, i, s, o) {
            return t.a = e, t.b = r, t.c = n, t.d = i, t.e = s, t.f = o, t
        },
        Do = function() {
            function t(t, e, r, n, i, s) {
                void 0 === t && (t = 1), void 0 === e && (e = 0), void 0 === r && (r = 0), void 0 === n && (n = 1), void 0 === i && (i = 0), void 0 === s && (s = 0), mo(this, t, e, r, n, i, s)
            }
            var e = t.prototype;
            return e.inverse = function() {
                var t = this.a,
                    e = this.b,
                    r = this.c,
                    n = this.d,
                    i = this.e,
                    s = this.f,
                    o = t * n - e * r || 1e-10;
                return mo(this, n / o, -e / o, -r / o, t / o, (r * s - n * i) / o, -(t * s - e * i) / o)
            }, e.multiply = function(t) {
                var e = this.a,
                    r = this.b,
                    n = this.c,
                    i = this.d,
                    s = this.e,
                    o = this.f,
                    a = t.a,
                    u = t.c,
                    l = t.b,
                    p = t.d,
                    c = t.e,
                    h = t.f;
                return mo(this, a * e + l * n, a * r + l * i, u * e + p * n, u * r + p * i, s + c * e + h * n, o + c * r + h * i)
            }, e.clone = function() {
                return new t(this.a, this.b, this.c, this.d, this.e, this.f)
            }, e.equals = function(t) {
                var e = this.a,
                    r = this.b,
                    n = this.c,
                    i = this.d,
                    s = this.e,
                    o = this.f;
                return e === t.a && r === t.b && n === t.c && i === t.d && s === t.e && o === t.f
            }, e.apply = function(t, e) {
                void 0 === e && (e = {});
                var r = t.x,
                    n = t.y,
                    i = this.a,
                    s = this.b,
                    o = this.c,
                    a = this.d,
                    u = this.e,
                    l = this.f;
                return e.x = r * i + n * o + u || 0, e.y = r * s + n * a + l || 0, e
            }, t
        }();

    function vo(t, e, r, n) {
        if (!t || !t.parentNode || (Ks || po(t)).documentElement === t) return new Do;
        var i = function(t) {
                for (var e, r; t && t !== ro;)(r = t._gsap) && r.uncache && r.get(t, "x"), r && !r.scaleX && !r.scaleY && r.renderTransform && (r.scaleX = r.scaleY = 1e-4, r.renderTransform(1, r), e ? e.push(r) : e = [r]), t = t.parentNode;
                return e
            }(t),
            s = fo(t) ? co : ho,
            o = function(t, e) {
                var r, n, i, s, o, a, u = fo(t),
                    l = t === u,
                    p = u ? co : ho,
                    c = t.parentNode;
                if (t === to) return t;
                if (p.length || p.push(_o(t, 1), _o(t, 2), _o(t, 3)), r = u ? io : no, u) l ? (i = function(t) {
                    var e, r = t.getCTM();
                    return r || (e = t.style[uo], t.style[uo] = "none", t.appendChild(oo), r = oo.getCTM(), t.removeChild(oo), e ? t.style[uo] = e : t.style.removeProperty(uo.replace(/([A-Z])/g, "-$1").toLowerCase())), r || so.clone()
                }(t), s = -i.e / i.a, o = -i.f / i.d, n = so) : t.getBBox ? (i = t.getBBox(), n = (n = t.transform ? t.transform.baseVal : {}).numberOfItems ? n.numberOfItems > 1 ? function(t) {
                    for (var e = new Do, r = 0; r < t.numberOfItems; r++) e.multiply(t.getItem(r).matrix);
                    return e
                }(n) : n.getItem(0).matrix : so, s = n.a * i.x + n.c * i.y, o = n.b * i.x + n.d * i.y) : (n = new Do, s = o = 0), e && "g" === t.tagName.toLowerCase() && (s = o = 0), (l ? u : c).appendChild(r), r.setAttribute("transform", "matrix(" + n.a + "," + n.b + "," + n.c + "," + n.d + "," + (n.e + s) + "," + (n.f + o) + ")");
                else {
                    if (s = o = 0, ao)
                        for (n = t.offsetParent, i = t; i && (i = i.parentNode) && i !== n && i.parentNode;)(to.getComputedStyle(i)[uo] + "").length > 4 && (s = i.offsetLeft, o = i.offsetTop, i = 0);
                    if ("absolute" !== (a = to.getComputedStyle(t)).position && "fixed" !== a.position)
                        for (n = t.offsetParent; c && c !== n;) s += c.scrollLeft || 0, o += c.scrollTop || 0, c = c.parentNode;
                    (i = r.style).top = t.offsetTop - o + "px", i.left = t.offsetLeft - s + "px", i[uo] = a[uo], i[lo] = a[lo], i.position = "fixed" === a.position ? "fixed" : "absolute", t.parentNode.appendChild(r)
                }
                return r
            }(t, r),
            a = s[0].getBoundingClientRect(),
            u = s[1].getBoundingClientRect(),
            l = s[2].getBoundingClientRect(),
            p = o.parentNode,
            c = !n && go(t),
            h = new Do((u.left - a.left) / 100, (u.top - a.top) / 100, (l.left - a.left) / 100, (l.top - a.top) / 100, a.left + (c ? 0 : to.pageXOffset || Ks.scrollLeft || eo.scrollLeft || ro.scrollLeft || 0), a.top + (c ? 0 : to.pageYOffset || Ks.scrollTop || eo.scrollTop || ro.scrollTop || 0));
        if (p.removeChild(o), i)
            for (a = i.length; a--;)(u = i[a]).scaleX = u.scaleY = 0, u.renderTransform(1, u);
        return e ? h.inverse() : h
    }
    /*!
     * MotionPathPlugin 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var yo, xo, bo, wo, Co, Fo, Eo = "x,translateX,left,marginLeft,xPercent".split(","),
        To = "y,translateY,top,marginTop,yPercent".split(","),
        So = Math.PI / 180,
        Mo = function(t, e, r, n) {
            for (var i = e.length, s = 2 === n ? 0 : n, o = 0; o < i; o++) t[s] = parseFloat(e[o][r]), 2 === n && (t[s + 1] = 0), s += 2;
            return t
        },
        Ao = function(t, e, r) {
            return parseFloat(t._gsap.get(t, e, r || "px")) || 0
        },
        Oo = function(t) {
            var e, r = t[0],
                n = t[1];
            for (e = 2; e < t.length; e += 2) r = t[e] += r, n = t[e + 1] += n
        },
        Ro = function(t, e, r, n, i, s, o, a, u) {
            return "cubic" === o.type ? e = [e] : (!1 !== o.fromCurrent && e.unshift(Ao(r, n, a), i ? Ao(r, i, u) : 0), o.relative && Oo(e), e = [(i ? ts : Ki)(e, o.curviness)]), e = s(No(e, r, o)), Io(t, r, n, e, "x", a), i && Io(t, r, i, e, "y", u), Hi(e, o.resolution || (0 === o.curviness ? 20 : 12))
        },
        Po = function(t) {
            return t
        },
        ko = /[-+\.]*\d+\.?(?:e-|e\+)?\d*/g,
        Bo = function(t, e, r) {
            var n, i = vo(t),
                s = 0,
                o = 0;
            return "svg" === (t.tagName + "").toLowerCase() ? (n = t.viewBox.baseVal).width || (n = {
                width: +t.getAttribute("width"),
                height: +t.getAttribute("height")
            }) : n = e && t.getBBox && t.getBBox(), e && "auto" !== e && (s = e.push ? e[0] * (n ? n.width : t.offsetWidth || 0) : e.x, o = e.push ? e[1] * (n ? n.height : t.offsetHeight || 0) : e.y), r.apply(s || o ? i.apply({
                x: s,
                y: o
            }) : {
                x: i.e,
                y: i.f
            })
        },
        Lo = function(t, e, r, n) {
            var i, s = vo(t.parentNode, !0, !0),
                o = s.clone().multiply(vo(e)),
                a = Bo(t, r, s),
                u = Bo(e, n, s),
                l = u.x,
                p = u.y;
            return o.e = o.f = 0, "auto" === n && e.getTotalLength && "path" === e.tagName.toLowerCase() && (i = e.getAttribute("d").match(ko) || [], l += (i = o.apply({
                x: +i[0],
                y: +i[1]
            })).x, p += i.y), i && (l -= (i = o.apply(e.getBBox())).x, p -= i.y), o.e = l - a.x, o.f = p - a.y, o
        },
        No = function(t, e, r) {
            var n, i, s, o = r.align,
                a = r.matrix,
                u = r.offsetX,
                l = r.offsetY,
                p = r.alignOrigin,
                c = t[0][0],
                h = t[0][1],
                f = Ao(e, "x"),
                d = Ao(e, "y");
            return t && t.length ? (o && ("self" === o || (n = wo(o)[0] || e) === e ? Qi(t, 1, 0, 0, 1, f - c, d - h) : (p && !1 !== p[2] ? yo.set(e, {
                transformOrigin: 100 * p[0] + "% " + 100 * p[1] + "%"
            }) : p = [Ao(e, "xPercent") / -100, Ao(e, "yPercent") / -100], s = (i = Lo(e, n, p, "auto")).apply({
                x: c,
                y: h
            }), Qi(t, i.a, i.b, i.c, i.d, f + i.e - (s.x - i.e), d + i.f - (s.y - i.f)))), a ? Qi(t, a.a, a.b, a.c, a.d, a.e, a.f) : (u || l) && Qi(t, 1, 0, 0, 1, u || 0, l || 0), t) : Xi("M0,0L0,0")
        },
        Io = function(t, e, r, n, i, s) {
            var o = e._gsap,
                a = o.harness,
                u = a && a.aliases && a.aliases[r],
                l = u && u.indexOf(",") < 0 ? u : r,
                p = t._pt = new xo(t._pt, e, l, 0, 0, Po, 0, o.set(e, l, t));
            p.u = bo(o.get(e, l, s)) || 0, p.path = n, p.pp = i, t._props.push(l)
        },
        zo = {
            version: "3.12.5",
            name: "motionPath",
            register: function(t, e, r) {
                bo = (yo = t).utils.getUnit, wo = yo.utils.toArray, Co = yo.core.getStyleSaver, Fo = yo.core.reverting || function() {}, xo = r
            },
            init: function(t, e, r) {
                if (!yo) return console.warn("Please gsap.registerPlugin(MotionPathPlugin)"), !1;
                "object" == typeof e && !e.style && e.path || (e = {
                    path: e
                });
                var n, i, s, o, a = [],
                    u = e,
                    l = u.path,
                    p = u.autoRotate,
                    c = u.unitX,
                    h = u.unitY,
                    f = u.x,
                    d = u.y,
                    g = l[0],
                    _ = (s = e.start, o = "end" in e ? e.end : 1, function(t) {
                        return s || 1 !== o ? Gi(t, s, o) : t
                    });
                if (this.rawPaths = a, this.target = t, this.tween = r, this.styles = Co && Co(t, "transform"), (this.rotate = p || 0 === p) && (this.rOffset = parseFloat(p) || 0, this.radians = !!e.useRadians, this.rProp = e.rotation || "rotation", this.rSet = t._gsap.set(t, this.rProp, this), this.ru = bo(t._gsap.get(t, this.rProp)) || 0), Array.isArray(l) && !("closed" in l) && "number" != typeof g) {
                    for (i in g) !f && ~Eo.indexOf(i) ? f = i : !d && ~To.indexOf(i) && (d = i);
                    for (i in f && d ? a.push(Ro(this, Mo(Mo([], l, f, 0), l, d, 1), t, f, d, _, e, c || bo(l[0][f]), h || bo(l[0][d]))) : f = d = 0, g) i !== f && i !== d && a.push(Ro(this, Mo([], l, i, 2), t, i, 0, _, e, bo(l[0][i])))
                } else Hi(n = _(No(Xi(e.path), t, e)), e.resolution), a.push(n), Io(this, t, e.x || "x", n, "x", e.unitX || "px"), Io(this, t, e.y || "y", n, "y", e.unitY || "px")
            },
            render: function(t, e) {
                var r = e.rawPaths,
                    n = r.length,
                    i = e._pt;
                if (e.tween._time || !Fo()) {
                    for (t > 1 ? t = 1 : t < 0 && (t = 0); n--;) $i(r[n], t, !n && e.rotate, r[n]);
                    for (; i;) i.set(i.t, i.p, i.path[i.pp] + i.u, i.d, t), i = i._next;
                    e.rotate && e.rSet(e.target, e.rProp, r[0].angle * (e.radians ? So : 1) + e.rOffset + e.ru, e, t)
                } else e.styles.revert()
            },
            getLength: function(t) {
                return Hi(Xi(t)).totalLength
            },
            sliceRawPath: Gi,
            getRawPath: Xi,
            pointsToSegment: ts,
            stringToRawPath: Ji,
            rawPathToString: es,
            transformRawPath: Qi,
            getGlobalMatrix: vo,
            getPositionOnPath: $i,
            cacheRawPathMeasurements: Hi,
            convertToPath: function(t, e) {
                return wo(t).map((function(t) {
                    return function(t, e) {
                        var r, n, i, s, o, a, u, l, p, c, h, f, d, g, _, m, D, v, y, x, b, w, C = t.tagName.toLowerCase(),
                            F = .552284749831;
                        return "path" !== C && t.getBBox ? (a = function(t, e) {
                            var r, n = document.createElementNS("http://www.w3.org/2000/svg", "path"),
                                i = [].slice.call(t.attributes),
                                s = i.length;
                            for (e = "," + e + ","; --s > -1;) r = i[s].nodeName.toLowerCase(), e.indexOf("," + r + ",") < 0 && n.setAttributeNS(null, r, i[s].nodeValue);
                            return n
                        }(t, "x,y,width,height,cx,cy,rx,ry,r,x1,x2,y1,y2,points"), w = function(t, e) {
                            for (var r = e ? e.split(",") : [], n = {}, i = r.length; --i > -1;) n[r[i]] = +t.getAttribute(r[i]) || 0;
                            return n
                        }(t, Yi[C]), "rect" === C ? (s = w.rx, o = w.ry || s, n = w.x, i = w.y, c = w.width - 2 * s, h = w.height - 2 * o, r = s || o ? "M" + (m = (g = (d = n + s) + c) + s) + "," + (v = i + o) + " V" + (y = v + h) + " C" + [m, x = y + o * F, _ = g + s * F, b = y + o, g, b, g - (g - d) / 3, b, d + (g - d) / 3, b, d, b, f = n + s * (1 - F), b, n, x, n, y, n, y - (y - v) / 3, n, v + (y - v) / 3, n, v, n, D = i + o * (1 - F), f, i, d, i, d + (g - d) / 3, i, g - (g - d) / 3, i, g, i, _, i, m, D, m, v].join(",") + "z" : "M" + (n + c) + "," + i + " v" + h + " h" + -c + " v" + -h + " h" + c + "z") : "circle" === C || "ellipse" === C ? ("circle" === C ? l = (s = o = w.r) * F : (s = w.rx, l = (o = w.ry) * F), r = "M" + ((n = w.cx) + s) + "," + (i = w.cy) + " C" + [n + s, i + l, n + (u = s * F), i + o, n, i + o, n - u, i + o, n - s, i + l, n - s, i, n - s, i - l, n - u, i - o, n, i - o, n + u, i - o, n + s, i - l, n + s, i].join(",") + "z") : "line" === C ? r = "M" + w.x1 + "," + w.y1 + " L" + w.x2 + "," + w.y2 : "polyline" !== C && "polygon" !== C || (r = "M" + (n = (p = (t.getAttribute("points") + "").match(mi) || []).shift()) + "," + (i = p.shift()) + " L" + p.join(","), "polygon" === C && (r += "," + n + "," + i + "z")), a.setAttribute("d", es(a._gsRawPath = Ji(r))), e && t.parentNode && (t.parentNode.insertBefore(a, t), t.parentNode.removeChild(t)), a) : t
                    }(t, !1 !== e)
                }))
            },
            convertCoordinates: function(t, e, r) {
                var n = vo(e, !0, !0).multiply(vo(t));
                return r ? n.apply(r) : n
            },
            getAlignMatrix: Lo,
            getRelativePosition: function(t, e, r, n) {
                var i = Lo(t, e, r, n);
                return {
                    x: i.e,
                    y: i.f
                }
            },
            arrayToRawPath: function(t, e) {
                var r = Mo(Mo([], t, (e = e || {}).x || "x", 0), t, e.y || "y", 1);
                return e.relative && Oo(r), ["cubic" === e.type ? r : ts(r, e.curviness)]
            }
        };

    function Xo(t) {
        if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return t
    }(yo || "undefined" != typeof window && (yo = window.gsap) && yo.registerPlugin && yo) && yo.registerPlugin(zo);
    /*!
     * Draggable 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var jo, Yo, qo, Go, Vo, Ho, Wo, Uo, $o, Qo, Zo, Jo, Ko, ta, ea, ra, na, ia, sa, oa, aa, ua, la = 0,
        pa = function() {
            return "undefined" != typeof window
        },
        ca = function() {
            return jo || pa() && (jo = window.gsap) && jo.registerPlugin && jo
        },
        ha = function(t) {
            return "function" == typeof t
        },
        fa = function(t) {
            return "object" == typeof t
        },
        da = function(t) {
            return void 0 === t
        },
        ga = function() {
            return !1
        },
        _a = "transform",
        ma = "transformOrigin",
        Da = function(t) {
            return Math.round(1e4 * t) / 1e4
        },
        va = Array.isArray,
        ya = function(t, e) {
            var r = qo.createElementNS ? qo.createElementNS((e || "http://www.w3.org/1999/xhtml").replace(/^https/, "http"), t) : qo.createElement(t);
            return r.style ? r : qo.createElement(t)
        },
        xa = 180 / Math.PI,
        ba = 1e20,
        wa = new Do,
        Ca = Date.now || function() {
            return (new Date).getTime()
        },
        Fa = [],
        Ea = {},
        Ta = 0,
        Sa = /^(?:a|input|textarea|button|select)$/i,
        Ma = 0,
        Aa = {},
        Oa = {},
        Ra = function(t, e) {
            var r, n = {};
            for (r in t) n[r] = e ? t[r] * e : t[r];
            return n
        },
        Pa = function t(e, r) {
            for (var n, i = e.length; i--;) r ? e[i].style.touchAction = r : e[i].style.removeProperty("touch-action"), (n = e[i].children) && n.length && t(n, r)
        },
        ka = function() {
            return Fa.forEach((function(t) {
                return t()
            }))
        },
        Ba = function() {
            return !Fa.length && jo.ticker.remove(ka)
        },
        La = function(t) {
            for (var e = Fa.length; e--;) Fa[e] === t && Fa.splice(e, 1);
            jo.to(Ba, {
                overwrite: !0,
                delay: 15,
                duration: 0,
                onComplete: Ba,
                data: "_draggable"
            })
        },
        Na = function(t, e, r, n) {
            if (t.addEventListener) {
                var i = Ko[e];
                n = n || (Zo ? {
                    passive: !1
                } : null), t.addEventListener(i || e, r, n), i && e !== i && t.addEventListener(e, r, n)
            }
        },
        Ia = function(t, e, r, n) {
            if (t.removeEventListener) {
                var i = Ko[e];
                t.removeEventListener(i || e, r, n), i && e !== i && t.removeEventListener(e, r, n)
            }
        },
        za = function(t) {
            t.preventDefault && t.preventDefault(), t.preventManipulation && t.preventManipulation()
        },
        Xa = function t(e) {
            ta = e.touches && la < e.touches.length, Ia(e.target, "touchend", t)
        },
        ja = function(t) {
            ta = t.touches && la < t.touches.length, Na(t.target, "touchend", Xa)
        },
        Ya = function(t) {
            return Yo.pageYOffset || t.scrollTop || t.documentElement.scrollTop || t.body.scrollTop || 0
        },
        qa = function(t) {
            return Yo.pageXOffset || t.scrollLeft || t.documentElement.scrollLeft || t.body.scrollLeft || 0
        },
        Ga = function t(e, r) {
            Na(e, "scroll", r), Ha(e.parentNode) || t(e.parentNode, r)
        },
        Va = function t(e, r) {
            Ia(e, "scroll", r), Ha(e.parentNode) || t(e.parentNode, r)
        },
        Ha = function(t) {
            return !(t && t !== Go && 9 !== t.nodeType && t !== qo.body && t !== Yo && t.nodeType && t.parentNode)
        },
        Wa = function(t, e) {
            var r = "x" === e ? "Width" : "Height",
                n = "scroll" + r,
                i = "client" + r;
            return Math.max(0, Ha(t) ? Math.max(Go[n], Vo[n]) - (Yo["inner" + r] || Go[i] || Vo[i]) : t[n] - t[i])
        },
        Ua = function t(e, r) {
            var n = Wa(e, "x"),
                i = Wa(e, "y");
            Ha(e) ? e = Oa : t(e.parentNode, r), e._gsMaxScrollX = n, e._gsMaxScrollY = i, r || (e._gsScrollX = e.scrollLeft || 0, e._gsScrollY = e.scrollTop || 0)
        },
        $a = function(t, e, r) {
            var n = t.style;
            n && (da(n[e]) && (e = $o(e, t) || e), null == r ? n.removeProperty && n.removeProperty(e.replace(/([A-Z])/g, "-$1").toLowerCase()) : n[e] = r)
        },
        Qa = function(t) {
            return Yo.getComputedStyle(t instanceof Element ? t : t.host || (t.parentNode || {}).host || t)
        },
        Za = {},
        Ja = function(t) {
            if (t === Yo) return Za.left = Za.top = 0, Za.width = Za.right = Go.clientWidth || t.innerWidth || Vo.clientWidth || 0, Za.height = Za.bottom = (t.innerHeight || 0) - 20 < Go.clientHeight ? Go.clientHeight : t.innerHeight || Vo.clientHeight || 0, Za;
            var e = t.ownerDocument || qo,
                r = da(t.pageX) ? t.nodeType || da(t.left) || da(t.top) ? Qo(t)[0].getBoundingClientRect() : t : {
                    left: t.pageX - qa(e),
                    top: t.pageY - Ya(e),
                    right: t.pageX - qa(e) + 1,
                    bottom: t.pageY - Ya(e) + 1
                };
            return da(r.right) && !da(r.width) ? (r.right = r.left + r.width, r.bottom = r.top + r.height) : da(r.width) && (r = {
                width: r.right - r.left,
                height: r.bottom - r.top,
                right: r.right,
                left: r.left,
                bottom: r.bottom,
                top: r.top
            }), r
        },
        Ka = function(t, e, r) {
            var n, i = t.vars,
                s = i[r],
                o = t._listeners[e];
            return ha(s) && (n = s.apply(i.callbackScope || t, i[r + "Params"] || [t.pointerEvent])), o && !1 === t.dispatchEvent(e) && (n = !1), n
        },
        tu = function(t, e) {
            var r, n, i, s = Qo(t)[0];
            return s.nodeType || s === Yo ? ru(s, e) : da(t.left) ? {
                left: n = t.min || t.minX || t.minRotation || 0,
                top: r = t.min || t.minY || 0,
                width: (t.max || t.maxX || t.maxRotation || 0) - n,
                height: (t.max || t.maxY || 0) - r
            } : (i = {
                x: 0,
                y: 0
            }, {
                left: t.left - i.x,
                top: t.top - i.y,
                width: t.width,
                height: t.height
            })
        },
        eu = {},
        ru = function(t, e) {
            e = Qo(e)[0];
            var r, n, i, s, o, a, u, l, p, c, h, f, d, g = t.getBBox && t.ownerSVGElement,
                _ = t.ownerDocument || qo;
            if (t === Yo) i = Ya(_), n = (r = qa(_)) + (_.documentElement.clientWidth || t.innerWidth || _.body.clientWidth || 0), s = i + ((t.innerHeight || 0) - 20 < _.documentElement.clientHeight ? _.documentElement.clientHeight : t.innerHeight || _.body.clientHeight || 0);
            else {
                if (e === Yo || da(e)) return t.getBoundingClientRect();
                r = i = 0, g ? (h = (c = t.getBBox()).width, f = c.height) : (t.viewBox && (c = t.viewBox.baseVal) && (r = c.x || 0, i = c.y || 0, h = c.width, f = c.height), h || (c = "border-box" === (d = Qa(t)).boxSizing, h = (parseFloat(d.width) || t.clientWidth || 0) + (c ? 0 : parseFloat(d.borderLeftWidth) + parseFloat(d.borderRightWidth)), f = (parseFloat(d.height) || t.clientHeight || 0) + (c ? 0 : parseFloat(d.borderTopWidth) + parseFloat(d.borderBottomWidth)))), n = h, s = f
            }
            return t === e ? {
                left: r,
                top: i,
                width: n - r,
                height: s - i
            } : (a = (o = vo(e, !0).multiply(vo(t))).apply({
                x: r,
                y: i
            }), u = o.apply({
                x: n,
                y: i
            }), l = o.apply({
                x: n,
                y: s
            }), p = o.apply({
                x: r,
                y: s
            }), {
                left: r = Math.min(a.x, u.x, l.x, p.x),
                top: i = Math.min(a.y, u.y, l.y, p.y),
                width: Math.max(a.x, u.x, l.x, p.x) - r,
                height: Math.max(a.y, u.y, l.y, p.y) - i
            })
        },
        nu = function(t, e, r, n, i, s) {
            var o, a, u, l = {};
            if (e)
                if (1 !== i && e instanceof Array) {
                    if (l.end = o = [], u = e.length, fa(e[0]))
                        for (a = 0; a < u; a++) o[a] = Ra(e[a], i);
                    else
                        for (a = 0; a < u; a++) o[a] = e[a] * i;
                    r += 1.1, n -= 1.1
                } else ha(e) ? l.end = function(r) {
                    var n, s, o = e.call(t, r);
                    if (1 !== i)
                        if (fa(o)) {
                            for (s in n = {}, o) n[s] = o[s] * i;
                            o = n
                        } else o *= i;
                    return o
                } : l.end = e;
            return (r || 0 === r) && (l.max = r), (n || 0 === n) && (l.min = n), s && (l.velocity = 0), l
        },
        iu = function t(e) {
            var r;
            return !(!e || !e.getAttribute || e === Vo) && (!("true" !== (r = e.getAttribute("data-clickable")) && ("false" === r || !Sa.test(e.nodeName + "") && "true" !== e.getAttribute("contentEditable"))) || t(e.parentNode))
        },
        su = function(t, e) {
            for (var r, n = t.length; n--;)(r = t[n]).ondragstart = r.onselectstart = e ? null : ga, jo.set(r, {
                lazy: !0,
                userSelect: e ? "text" : "none"
            })
        },
        ou = function t(e) {
            return "fixed" === Qa(e).position || ((e = e.parentNode) && 1 === e.nodeType ? t(e) : void 0)
        },
        au = function(t, e) {
            t = jo.utils.toArray(t)[0], e = e || {};
            var r, n, i, s, o, a, u = document.createElement("div"),
                l = u.style,
                p = t.firstChild,
                c = 0,
                h = 0,
                f = t.scrollTop,
                d = t.scrollLeft,
                g = t.scrollWidth,
                _ = t.scrollHeight,
                m = 0,
                D = 0,
                v = 0;
            aa && !1 !== e.force3D ? (o = "translate3d(", a = "px,0px)") : _a && (o = "translate(", a = "px)"), this.scrollTop = function(t, e) {
                if (!arguments.length) return -this.top();
                this.top(-t, e)
            }, this.scrollLeft = function(t, e) {
                if (!arguments.length) return -this.left();
                this.left(-t, e)
            }, this.left = function(r, n) {
                if (!arguments.length) return -(t.scrollLeft + h);
                var i = t.scrollLeft - d,
                    s = h;
                if ((i > 2 || i < -2) && !n) return d = t.scrollLeft, jo.killTweensOf(this, {
                    left: 1,
                    scrollLeft: 1
                }), this.left(-d), void(e.onKill && e.onKill());
                (r = -r) < 0 ? (h = r - .5 | 0, r = 0) : r > D ? (h = r - D | 0, r = D) : h = 0, (h || s) && (this._skip || (l[_a] = o + -h + "px," + -c + a), h + m >= 0 && (l.paddingRight = h + m + "px")), t.scrollLeft = 0 | r, d = t.scrollLeft
            }, this.top = function(r, n) {
                if (!arguments.length) return -(t.scrollTop + c);
                var i = t.scrollTop - f,
                    s = c;
                if ((i > 2 || i < -2) && !n) return f = t.scrollTop, jo.killTweensOf(this, {
                    top: 1,
                    scrollTop: 1
                }), this.top(-f), void(e.onKill && e.onKill());
                (r = -r) < 0 ? (c = r - .5 | 0, r = 0) : r > v ? (c = r - v | 0, r = v) : c = 0, (c || s) && (this._skip || (l[_a] = o + -h + "px," + -c + a)), t.scrollTop = 0 | r, f = t.scrollTop
            }, this.maxScrollTop = function() {
                return v
            }, this.maxScrollLeft = function() {
                return D
            }, this.disable = function() {
                for (p = u.firstChild; p;) s = p.nextSibling, t.appendChild(p), p = s;
                t === u.parentNode && t.removeChild(u)
            }, this.enable = function() {
                if ((p = t.firstChild) !== u) {
                    for (; p;) s = p.nextSibling, u.appendChild(p), p = s;
                    t.appendChild(u), this.calibrate()
                }
            }, this.calibrate = function(e) {
                var s, o, a, p = t.clientWidth === r;
                f = t.scrollTop, d = t.scrollLeft, p && t.clientHeight === n && u.offsetHeight === i && g === t.scrollWidth && _ === t.scrollHeight && !e || ((c || h) && (o = this.left(), a = this.top(), this.left(-t.scrollLeft), this.top(-t.scrollTop)), s = Qa(t), p && !e || (l.display = "block", l.width = "auto", l.paddingRight = "0px", (m = Math.max(0, t.scrollWidth - t.clientWidth)) && (m += parseFloat(s.paddingLeft) + (ua ? parseFloat(s.paddingRight) : 0))), l.display = "inline-block", l.position = "relative", l.overflow = "visible", l.verticalAlign = "top", l.boxSizing = "content-box", l.width = "100%", l.paddingRight = m + "px", ua && (l.paddingBottom = s.paddingBottom), r = t.clientWidth, n = t.clientHeight, g = t.scrollWidth, _ = t.scrollHeight, D = t.scrollWidth - r, v = t.scrollHeight - n, i = u.offsetHeight, l.display = "block", (o || a) && (this.left(o), this.top(a)))
            }, this.content = u, this.element = t, this._skip = !1, this.enable()
        },
        uu = function(t) {
            if (pa() && document.body) {
                var e = window && window.navigator;
                Yo = window, qo = document, Go = qo.documentElement, Vo = qo.body, Ho = ya("div"), ia = !!window.PointerEvent, (Wo = ya("div")).style.cssText = "visibility:hidden;height:1px;top:-1px;pointer-events:none;position:relative;clear:both;cursor:grab", na = "grab" === Wo.style.cursor ? "grab" : "move", ea = e && -1 !== e.userAgent.toLowerCase().indexOf("android"), Jo = "ontouchstart" in Go && "orientation" in Yo || e && (e.MaxTouchPoints > 0 || e.msMaxTouchPoints > 0), n = ya("div"), s = (i = ya("div")).style, o = Vo, s.display = "inline-block", s.position = "relative", n.style.cssText = "width:90px;height:40px;padding:10px;overflow:auto;visibility:hidden", n.appendChild(i), o.appendChild(n), r = i.offsetHeight + 18 > n.scrollHeight, o.removeChild(n), ua = r, Ko = function(t) {
                    for (var e = t.split(","), r = (("onpointerdown" in Ho ? "pointerdown,pointermove,pointerup,pointercancel" : "onmspointerdown" in Ho ? "MSPointerDown,MSPointerMove,MSPointerUp,MSPointerCancel" : t).split(",")), n = {}, i = 4; --i > -1;) n[e[i]] = r[i], n[r[i]] = e[i];
                    try {
                        Go.addEventListener("test", null, Object.defineProperty({}, "passive", {
                            get: function() {
                                Zo = 1
                            }
                        }))
                    } catch (t) {}
                    return n
                }("touchstart,touchmove,touchend,touchcancel"), Na(qo, "touchcancel", ga), Na(Yo, "touchmove", ga), Vo && Vo.addEventListener("touchstart", ga), Na(qo, "contextmenu", (function() {
                    for (var t in Ea) Ea[t].isPressed && Ea[t].endDrag()
                })), jo = Uo = ca()
            }
            var r, n, i, s, o;
            jo ? (ra = jo.plugins.inertia, sa = jo.core.context || function() {}, $o = jo.utils.checkPrefix, _a = $o(_a), ma = $o(ma), Qo = jo.utils.toArray, oa = jo.core.getStyleSaver, aa = !!$o("perspective")) : t && console.warn("Please gsap.registerPlugin(Draggable)")
        },
        lu = function(t) {
            var e, r;

            function n(e, r) {
                var i;
                i = t.call(this) || this, Uo || uu(1), e = Qo(e)[0], i.styles = oa && oa(e, "transform,left,top"), ra || (ra = jo.plugins.inertia), i.vars = r = Ra(r || {}), i.target = e, i.x = i.y = i.rotation = 0, i.dragResistance = parseFloat(r.dragResistance) || 0, i.edgeResistance = isNaN(r.edgeResistance) ? 1 : parseFloat(r.edgeResistance) || 0, i.lockAxis = r.lockAxis, i.autoScroll = r.autoScroll || 0, i.lockedAxis = null, i.allowEventDefault = !!r.allowEventDefault, jo.getProperty(e, "x");
                var s, o, a, u, l, p, c, h, f, d, g, _, m, D, v, y, x, b, w, C, F, E, T, S, M, A, O, R, P, k, B, L, N, I = (r.type || "x,y").toLowerCase(),
                    z = ~I.indexOf("x") || ~I.indexOf("y"),
                    X = -1 !== I.indexOf("rotation"),
                    j = X ? "rotation" : z ? "x" : "left",
                    Y = z ? "y" : "top",
                    q = !(!~I.indexOf("x") && !~I.indexOf("left") && "scroll" !== I),
                    G = !(!~I.indexOf("y") && !~I.indexOf("top") && "scroll" !== I),
                    V = r.minimumMovement || 2,
                    H = Xo(i),
                    W = Qo(r.trigger || r.handle || e),
                    U = {},
                    $ = 0,
                    Q = !1,
                    Z = r.autoScrollMarginTop || 40,
                    J = r.autoScrollMarginRight || 40,
                    K = r.autoScrollMarginBottom || 40,
                    tt = r.autoScrollMarginLeft || 40,
                    et = r.clickableTest || iu,
                    rt = 0,
                    nt = e._gsap || jo.core.getCache(e),
                    it = ou(e),
                    st = function(t, r) {
                        return parseFloat(nt.get(e, t, r))
                    },
                    ot = e.ownerDocument || qo,
                    at = function(t) {
                        return za(t), t.stopImmediatePropagation && t.stopImmediatePropagation(), !1
                    },
                    ut = function t(r) {
                        if (H.autoScroll && H.isDragging && (Q || x)) {
                            var n, i, s, a, u, l, p, c, f = e,
                                d = 15 * H.autoScroll;
                            for (Q = !1, Oa.scrollTop = null != Yo.pageYOffset ? Yo.pageYOffset : null != ot.documentElement.scrollTop ? ot.documentElement.scrollTop : ot.body.scrollTop, Oa.scrollLeft = null != Yo.pageXOffset ? Yo.pageXOffset : null != ot.documentElement.scrollLeft ? ot.documentElement.scrollLeft : ot.body.scrollLeft, a = H.pointerX - Oa.scrollLeft, u = H.pointerY - Oa.scrollTop; f && !i;) n = (i = Ha(f.parentNode)) ? Oa : f.parentNode, s = i ? {
                                bottom: Math.max(Go.clientHeight, Yo.innerHeight || 0),
                                right: Math.max(Go.clientWidth, Yo.innerWidth || 0),
                                left: 0,
                                top: 0
                            } : n.getBoundingClientRect(), l = p = 0, G && ((c = n._gsMaxScrollY - n.scrollTop) < 0 ? p = c : u > s.bottom - K && c ? (Q = !0, p = Math.min(c, d * (1 - Math.max(0, s.bottom - u) / K) | 0)) : u < s.top + Z && n.scrollTop && (Q = !0, p = -Math.min(n.scrollTop, d * (1 - Math.max(0, u - s.top) / Z) | 0)), p && (n.scrollTop += p)), q && ((c = n._gsMaxScrollX - n.scrollLeft) < 0 ? l = c : a > s.right - J && c ? (Q = !0, l = Math.min(c, d * (1 - Math.max(0, s.right - a) / J) | 0)) : a < s.left + tt && n.scrollLeft && (Q = !0, l = -Math.min(n.scrollLeft, d * (1 - Math.max(0, a - s.left) / tt) | 0)), l && (n.scrollLeft += l)), i && (l || p) && (Yo.scrollTo(n.scrollLeft, n.scrollTop), xt(H.pointerX + l, H.pointerY + p)), f = n
                        }
                        if (x) {
                            var g = H.x,
                                _ = H.y;
                            X ? (H.deltaX = g - parseFloat(nt.rotation), H.rotation = g, nt.rotation = g + "deg", nt.renderTransform(1, nt)) : o ? (G && (H.deltaY = _ - o.top(), o.top(_)), q && (H.deltaX = g - o.left(), o.left(g))) : z ? (G && (H.deltaY = _ - parseFloat(nt.y), nt.y = _ + "px"), q && (H.deltaX = g - parseFloat(nt.x), nt.x = g + "px"), nt.renderTransform(1, nt)) : (G && (H.deltaY = _ - parseFloat(e.style.top || 0), e.style.top = _ + "px"), q && (H.deltaX = g - parseFloat(e.style.left || 0), e.style.left = g + "px")), !h || r || R || (R = !0, !1 === Ka(H, "drag", "onDrag") && (q && (H.x -= H.deltaX), G && (H.y -= H.deltaY), t(!0)), R = !1)
                        }
                        x = !1
                    },
                    lt = function(t, r) {
                        var n, i, s = H.x,
                            a = H.y;
                        e._gsap || (nt = jo.core.getCache(e)), nt.uncache && jo.getProperty(e, "x"), z ? (H.x = parseFloat(nt.x), H.y = parseFloat(nt.y)) : X ? H.x = H.rotation = parseFloat(nt.rotation) : o ? (H.y = o.top(), H.x = o.left()) : (H.y = parseFloat(e.style.top || (i = Qa(e)) && i.top) || 0, H.x = parseFloat(e.style.left || (i || {}).left) || 0), (w || C || F) && !r && (H.isDragging || H.isThrowing) && (F && (Aa.x = H.x, Aa.y = H.y, (n = F(Aa)).x !== H.x && (H.x = n.x, x = !0), n.y !== H.y && (H.y = n.y, x = !0)), w && (n = w(H.x)) !== H.x && (H.x = n, X && (H.rotation = n), x = !0), C && ((n = C(H.y)) !== H.y && (H.y = n), x = !0)), x && ut(!0), t || (H.deltaX = H.x - s, H.deltaY = H.y - a, Ka(H, "throwupdate", "onThrowUpdate"))
                    },
                    pt = function(t, e, r, n) {
                        return null == e && (e = -ba), null == r && (r = ba), ha(t) ? function(i) {
                            var s = H.isPressed ? 1 - H.edgeResistance : 1;
                            return t.call(H, (i > r ? r + (i - r) * s : i < e ? e + (i - e) * s : i) * n) * n
                        } : va(t) ? function(n) {
                            for (var i, s, o = t.length, a = 0, u = ba; --o > -1;)(s = (i = t[o]) - n) < 0 && (s = -s), s < u && i >= e && i <= r && (a = o, u = s);
                            return t[a]
                        } : isNaN(t) ? function(t) {
                            return t
                        } : function() {
                            return t * n
                        }
                    },
                    ct = function() {
                        var t, n, i, s;
                        c = !1, o ? (o.calibrate(), H.minX = g = -o.maxScrollLeft(), H.minY = m = -o.maxScrollTop(), H.maxX = d = H.maxY = _ = 0, c = !0) : r.bounds && (t = tu(r.bounds, e.parentNode), X ? (H.minX = g = t.left, H.maxX = d = t.left + t.width, H.minY = m = H.maxY = _ = 0) : da(r.bounds.maxX) && da(r.bounds.maxY) ? (n = tu(e, e.parentNode), H.minX = g = Math.round(st(j, "px") + t.left - n.left), H.minY = m = Math.round(st(Y, "px") + t.top - n.top), H.maxX = d = Math.round(g + (t.width - n.width)), H.maxY = _ = Math.round(m + (t.height - n.height))) : (t = r.bounds, H.minX = g = t.minX, H.minY = m = t.minY, H.maxX = d = t.maxX, H.maxY = _ = t.maxY), g > d && (H.minX = d, H.maxX = d = g, g = H.minX), m > _ && (H.minY = _, H.maxY = _ = m, m = H.minY), X && (H.minRotation = g, H.maxRotation = d), c = !0), r.liveSnap && (i = !0 === r.liveSnap ? r.snap || {} : r.liveSnap, s = va(i) || ha(i), X ? (w = pt(s ? i : i.rotation, g, d, 1), C = null) : i.points ? F = function(t, e, r, n, i, s, o) {
                            return s = s && s < ba ? s * s : ba, ha(t) ? function(a) {
                                var u, l, p, c = H.isPressed ? 1 - H.edgeResistance : 1,
                                    h = a.x,
                                    f = a.y;
                                return a.x = h = h > r ? r + (h - r) * c : h < e ? e + (h - e) * c : h, a.y = f = f > i ? i + (f - i) * c : f < n ? n + (f - n) * c : f, (u = t.call(H, a)) !== a && (a.x = u.x, a.y = u.y), 1 !== o && (a.x *= o, a.y *= o), s < ba && (l = a.x - h) * l + (p = a.y - f) * p > s && (a.x = h, a.y = f), a
                            } : va(t) ? function(e) {
                                for (var r, n, i, o, a = t.length, u = 0, l = ba; --a > -1;)(o = (r = (i = t[a]).x - e.x) * r + (n = i.y - e.y) * n) < l && (u = a, l = o);
                                return l <= s ? t[u] : e
                            } : function(t) {
                                return t
                            }
                        }(s ? i : i.points, g, d, m, _, i.radius, o ? -1 : 1) : (q && (w = pt(s ? i : i.x || i.left || i.scrollLeft, g, d, o ? -1 : 1)), G && (C = pt(s ? i : i.y || i.top || i.scrollTop, m, _, o ? -1 : 1))))
                    },
                    ht = function() {
                        H.isThrowing = !1, Ka(H, "throwcomplete", "onThrowComplete")
                    },
                    ft = function() {
                        H.isThrowing = !1
                    },
                    dt = function(t, n) {
                        var i, s, a, u;
                        t && ra ? (!0 === t && (i = r.snap || r.liveSnap || {}, s = va(i) || ha(i), t = {
                            resistance: (r.throwResistance || r.resistance || 1e3) / (X ? 10 : 1)
                        }, X ? t.rotation = nu(H, s ? i : i.rotation, d, g, 1, n) : (q && (t[j] = nu(H, s ? i : i.points || i.x || i.left, d, g, o ? -1 : 1, n || "x" === H.lockedAxis)), G && (t[Y] = nu(H, s ? i : i.points || i.y || i.top, _, m, o ? -1 : 1, n || "y" === H.lockedAxis)), (i.points || va(i) && fa(i[0])) && (t.linkedProps = j + "," + Y, t.radius = i.radius))), H.isThrowing = !0, u = isNaN(r.overshootTolerance) ? 1 === r.edgeResistance ? 0 : 1 - H.edgeResistance + .2 : r.overshootTolerance, t.duration || (t.duration = {
                            max: Math.max(r.minDuration || 0, "maxDuration" in r ? r.maxDuration : 2),
                            min: isNaN(r.minDuration) ? 0 === u || fa(t) && t.resistance > 1e3 ? 0 : .5 : r.minDuration,
                            overshoot: u
                        }), H.tween = a = jo.to(o || e, {
                            inertia: t,
                            data: "_draggable",
                            inherit: !1,
                            onComplete: ht,
                            onInterrupt: ft,
                            onUpdate: r.fastMode ? Ka : lt,
                            onUpdateParams: r.fastMode ? [H, "onthrowupdate", "onThrowUpdate"] : i && i.radius ? [!1, !0] : []
                        }), r.fastMode || (o && (o._skip = !0), a.render(1e9, !0, !0), lt(!0, !0), H.endX = H.x, H.endY = H.y, X && (H.endRotation = H.x), a.play(0), lt(!0, !0), o && (o._skip = !1))) : c && H.applyBounds()
                    },
                    gt = function(t) {
                        var r, n = S;
                        S = vo(e.parentNode, !0), t && H.isPressed && !S.equals(n || new Do) && (r = n.inverse().apply({
                            x: a,
                            y: u
                        }), S.apply(r, r), a = r.x, u = r.y), S.equals(wa) && (S = null)
                    },
                    _t = function() {
                        var t, r, n, i = 1 - H.edgeResistance,
                            s = it ? qa(ot) : 0,
                            h = it ? Ya(ot) : 0;
                        z && (nt.x = st(j, "px") + "px", nt.y = st(Y, "px") + "px", nt.renderTransform()), gt(!1), eu.x = H.pointerX - s, eu.y = H.pointerY - h, S && S.apply(eu, eu), a = eu.x, u = eu.y, x && (xt(H.pointerX, H.pointerY), ut(!0)), L = vo(e), o ? (ct(), p = o.top(), l = o.left()) : (mt() ? (lt(!0, !0), ct()) : H.applyBounds(), X ? (t = e.ownerSVGElement ? [nt.xOrigin - e.getBBox().x, nt.yOrigin - e.getBBox().y] : (Qa(e)[ma] || "0 0").split(" "), y = H.rotationOrigin = vo(e).apply({
                            x: parseFloat(t[0]) || 0,
                            y: parseFloat(t[1]) || 0
                        }), lt(!0, !0), r = H.pointerX - y.x - s, n = y.y - H.pointerY + h, l = H.x, p = H.y = Math.atan2(n, r) * xa) : (p = st(Y, "px"), l = st(j, "px"))), c && i && (l > d ? l = d + (l - d) / i : l < g && (l = g - (g - l) / i), X || (p > _ ? p = _ + (p - _) / i : p < m && (p = m - (m - p) / i))), H.startX = l = Da(l), H.startY = p = Da(p)
                    },
                    mt = function() {
                        return H.tween && H.tween.isActive()
                    },
                    Dt = function() {
                        !Wo.parentNode || mt() || H.isDragging || Wo.parentNode.removeChild(Wo)
                    },
                    vt = function(t, i) {
                        var l;
                        if (!s || H.isPressed || !t || !("mousedown" !== t.type && "pointerdown" !== t.type || i) && Ca() - rt < 30 && Ko[H.pointerEvent.type]) B && t && s && za(t);
                        else {
                            if (M = mt(), N = !1, H.pointerEvent = t, Ko[t.type] ? (T = ~t.type.indexOf("touch") ? t.currentTarget || t.target : ot, Na(T, "touchend", bt), Na(T, "touchmove", yt), Na(T, "touchcancel", bt), Na(ot, "touchstart", ja)) : (T = null, Na(ot, "mousemove", yt)), O = null, ia && T || (Na(ot, "mouseup", bt), t && t.target && Na(t.target, "mouseup", bt)), E = et.call(H, t.target) && !1 === r.dragClickables && !i) return Na(t.target, "change", bt), Ka(H, "pressInit", "onPressInit"), Ka(H, "press", "onPress"), su(W, !0), void(B = !1);
                            var p;
                            if (A = !(!T || q === G || !1 === H.vars.allowNativeTouchScrolling || H.vars.allowContextMenu && t && (t.ctrlKey || t.which > 2)) && (q ? "y" : "x"), (B = !A && !H.allowEventDefault) && (za(t), Na(Yo, "touchforcechange", za)), t.changedTouches ? (t = D = t.changedTouches[0], v = t.identifier) : t.pointerId ? v = t.pointerId : D = v = null, la++, p = ut, Fa.push(p), 1 === Fa.length && jo.ticker.add(ka), u = H.pointerY = t.pageY, a = H.pointerX = t.pageX, Ka(H, "pressInit", "onPressInit"), (A || H.autoScroll) && Ua(e.parentNode), !e.parentNode || !H.autoScroll || o || X || !e.parentNode._gsMaxScrollX || Wo.parentNode || e.getBBox || (Wo.style.width = e.parentNode.scrollWidth + "px", e.parentNode.appendChild(Wo)), _t(), H.tween && H.tween.kill(), H.isThrowing = !1, jo.killTweensOf(o || e, U, !0), o && jo.killTweensOf(e, {
                                    scrollTo: 1
                                }, !0), H.tween = H.lockedAxis = null, (r.zIndexBoost || !X && !o && !1 !== r.zIndexBoost) && (e.style.zIndex = n.zIndex++), H.isPressed = !0, h = !(!r.onDrag && !H._listeners.drag), f = !(!r.onMove && !H._listeners.move), !1 !== r.cursor || r.activeCursor)
                                for (l = W.length; --l > -1;) jo.set(W[l], {
                                    cursor: r.activeCursor || r.cursor || ("grab" === na ? "grabbing" : na)
                                });
                            Ka(H, "press", "onPress")
                        }
                    },
                    yt = function(t) {
                        var r, n, i, o, l, p, c = t;
                        if (s && !ta && H.isPressed && t) {
                            if (H.pointerEvent = t, r = t.changedTouches) {
                                if ((t = r[0]) !== D && t.identifier !== v) {
                                    for (o = r.length; --o > -1 && (t = r[o]).identifier !== v && t.target !== e;);
                                    if (o < 0) return
                                }
                            } else if (t.pointerId && v && t.pointerId !== v) return;
                            T && A && !O && (eu.x = t.pageX - (it ? qa(ot) : 0), eu.y = t.pageY - (it ? Ya(ot) : 0), S && S.apply(eu, eu), n = eu.x, i = eu.y, ((l = Math.abs(n - a)) !== (p = Math.abs(i - u)) && (l > V || p > V) || ea && A === O) && (O = l > p && q ? "x" : "y", A && O !== A && Na(Yo, "touchforcechange", za), !1 !== H.vars.lockAxisOnTouchScroll && q && G && (H.lockedAxis = "x" === O ? "y" : "x", ha(H.vars.onLockAxis) && H.vars.onLockAxis.call(H, c)), ea && A === O)) ? bt(c) : (H.allowEventDefault || A && (!O || A === O) || !1 === c.cancelable ? B && (B = !1) : (za(c), B = !0), H.autoScroll && (Q = !0), xt(t.pageX, t.pageY, f))
                        } else B && t && s && za(t)
                    },
                    xt = function(t, e, r) {
                        var n, i, s, o, h, f, D = 1 - H.dragResistance,
                            v = 1 - H.edgeResistance,
                            b = H.pointerX,
                            E = H.pointerY,
                            T = p,
                            M = H.x,
                            A = H.y,
                            O = H.endX,
                            R = H.endY,
                            P = H.endRotation,
                            k = x;
                        H.pointerX = t, H.pointerY = e, it && (t -= qa(ot), e -= Ya(ot)), X ? (o = Math.atan2(y.y - e, t - y.x) * xa, (h = H.y - o) > 180 ? (p -= 360, H.y = o) : h < -180 && (p += 360, H.y = o), H.x !== l || Math.abs(p - o) > V ? (H.y = o, s = l + (p - o) * D) : s = l) : (S && (f = t * S.a + e * S.c + S.e, e = t * S.b + e * S.d + S.f, t = f), (i = e - u) < V && i > -V && (i = 0), (n = t - a) < V && n > -V && (n = 0), (H.lockAxis || H.lockedAxis) && (n || i) && ((f = H.lockedAxis) || (H.lockedAxis = f = q && Math.abs(n) > Math.abs(i) ? "y" : G ? "x" : null, f && ha(H.vars.onLockAxis) && H.vars.onLockAxis.call(H, H.pointerEvent)), "y" === f ? i = 0 : "x" === f && (n = 0)), s = Da(l + n * D), o = Da(p + i * D)), (w || C || F) && (H.x !== s || H.y !== o && !X) && (F && (Aa.x = s, Aa.y = o, f = F(Aa), s = Da(f.x), o = Da(f.y)), w && (s = Da(w(s))), C && (o = Da(C(o)))), c && (s > d ? s = d + Math.round((s - d) * v) : s < g && (s = g + Math.round((s - g) * v)), X || (o > _ ? o = Math.round(_ + (o - _) * v) : o < m && (o = Math.round(m + (o - m) * v)))), (H.x !== s || H.y !== o && !X) && (X ? (H.endRotation = H.x = H.endX = s, x = !0) : (G && (H.y = H.endY = o, x = !0), q && (H.x = H.endX = s, x = !0)), r && !1 === Ka(H, "move", "onMove") ? (H.pointerX = b, H.pointerY = E, p = T, H.x = M, H.y = A, H.endX = O, H.endY = R, H.endRotation = P, x = k) : !H.isDragging && H.isPressed && (H.isDragging = N = !0, Ka(H, "dragstart", "onDragStart")))
                    },
                    bt = function t(n, i) {
                        if (s && H.isPressed && (!n || null == v || i || !(n.pointerId && n.pointerId !== v && n.target !== e || n.changedTouches && ! function(t, e) {
                                for (var r = t.length; r--;)
                                    if (t[r].identifier === e) return !0
                            }(n.changedTouches, v)))) {
                            H.isPressed = !1;
                            var o, a, u, l, p, c = n,
                                h = H.isDragging,
                                f = H.vars.allowContextMenu && n && (n.ctrlKey || n.which > 2),
                                d = jo.delayedCall(.001, Dt);
                            if (T ? (Ia(T, "touchend", t), Ia(T, "touchmove", yt), Ia(T, "touchcancel", t), Ia(ot, "touchstart", ja)) : Ia(ot, "mousemove", yt), Ia(Yo, "touchforcechange", za), ia && T || (Ia(ot, "mouseup", t), n && n.target && Ia(n.target, "mouseup", t)), x = !1, h && ($ = Ma = Ca(), H.isDragging = !1), La(ut), E && !f) return n && (Ia(n.target, "change", t), H.pointerEvent = c), su(W, !1), Ka(H, "release", "onRelease"), Ka(H, "click", "onClick"), void(E = !1);
                            for (a = W.length; --a > -1;) $a(W[a], "cursor", r.cursor || (!1 !== r.cursor ? na : null));
                            if (la--, n) {
                                if ((o = n.changedTouches) && (n = o[0]) !== D && n.identifier !== v) {
                                    for (a = o.length; --a > -1 && (n = o[a]).identifier !== v && n.target !== e;);
                                    if (a < 0 && !i) return
                                }
                                H.pointerEvent = c, H.pointerX = n.pageX, H.pointerY = n.pageY
                            }
                            return f && c ? (za(c), B = !0, Ka(H, "release", "onRelease")) : c && !h ? (B = !1, M && (r.snap || r.bounds) && dt(r.inertia || r.throwProps), Ka(H, "release", "onRelease"), ea && "touchmove" === c.type || -1 !== c.type.indexOf("cancel") || (Ka(H, "click", "onClick"), Ca() - rt < 300 && Ka(H, "doubleclick", "onDoubleClick"), l = c.target || e, rt = Ca(), p = function() {
                                rt === P || !H.enabled() || H.isPressed || c.defaultPrevented || (l.click ? l.click() : ot.createEvent && ((u = ot.createEvent("MouseEvents")).initMouseEvent("click", !0, !0, Yo, 1, H.pointerEvent.screenX, H.pointerEvent.screenY, H.pointerX, H.pointerY, !1, !1, !1, !1, 0, null), l.dispatchEvent(u)))
                            }, ea || c.defaultPrevented || jo.delayedCall(.05, p))) : (dt(r.inertia || r.throwProps), H.allowEventDefault || !c || !1 === r.dragClickables && et.call(H, c.target) || !h || A && (!O || A !== O) || !1 === c.cancelable ? B = !1 : (B = !0, za(c)), Ka(H, "release", "onRelease")), mt() && d.duration(H.tween.duration()), h && Ka(H, "dragend", "onDragEnd"), !0
                        }
                        B && n && s && za(n)
                    },
                    wt = function(t) {
                        if (t && H.isDragging && !o) {
                            var r = t.target || e.parentNode,
                                n = r.scrollLeft - r._gsScrollX,
                                i = r.scrollTop - r._gsScrollY;
                            (n || i) && (S ? (a -= n * S.a + i * S.c, u -= i * S.d + n * S.b) : (a -= n, u -= i), r._gsScrollX += n, r._gsScrollY += i, xt(H.pointerX, H.pointerY))
                        }
                    },
                    Ct = function(t) {
                        var e = Ca(),
                            r = e - rt < 100,
                            n = e - $ < 50,
                            i = r && P === rt,
                            s = H.pointerEvent && H.pointerEvent.defaultPrevented,
                            o = r && k === rt,
                            a = t.isTrusted || null == t.isTrusted && r && i;
                        if ((i || n && !1 !== H.vars.suppressClickOnDrag) && t.stopImmediatePropagation && t.stopImmediatePropagation(), r && (!H.pointerEvent || !H.pointerEvent.defaultPrevented) && (!i || a && !o)) return a && i && (k = rt), void(P = rt);
                        (H.isPressed || n || r) && (a && t.detail && r && !s || za(t)), r || n || N || (t && t.target && (H.pointerEvent = t), Ka(H, "click", "onClick"))
                    },
                    Ft = function(t) {
                        return S ? {
                            x: t.x * S.a + t.y * S.c + S.e,
                            y: t.x * S.b + t.y * S.d + S.f
                        } : {
                            x: t.x,
                            y: t.y
                        }
                    };
                return (b = n.get(e)) && b.kill(), i.startDrag = function(t, r) {
                    var n, i, s, o;
                    vt(t || H.pointerEvent, !0), r && !H.hitTest(t || H.pointerEvent) && (n = Ja(t || H.pointerEvent), i = Ja(e), s = Ft({
                        x: n.left + n.width / 2,
                        y: n.top + n.height / 2
                    }), o = Ft({
                        x: i.left + i.width / 2,
                        y: i.top + i.height / 2
                    }), a -= s.x - o.x, u -= s.y - o.y), H.isDragging || (H.isDragging = N = !0, Ka(H, "dragstart", "onDragStart"))
                }, i.drag = yt, i.endDrag = function(t) {
                    return bt(t || H.pointerEvent, !0)
                }, i.timeSinceDrag = function() {
                    return H.isDragging ? 0 : (Ca() - $) / 1e3
                }, i.timeSinceClick = function() {
                    return (Ca() - rt) / 1e3
                }, i.hitTest = function(t, e) {
                    return n.hitTest(H.target, t, e)
                }, i.getDirection = function(t, r) {
                    var n, i, s, o, a, u, c = "velocity" === t && ra ? t : fa(t) && !X ? "element" : "start";
                    return "element" === c && (a = Ja(H.target), u = Ja(t)), n = "start" === c ? H.x - l : "velocity" === c ? ra.getVelocity(e, j) : a.left + a.width / 2 - (u.left + u.width / 2), X ? n < 0 ? "counter-clockwise" : "clockwise" : (r = r || 2, i = "start" === c ? H.y - p : "velocity" === c ? ra.getVelocity(e, Y) : a.top + a.height / 2 - (u.top + u.height / 2), o = (s = Math.abs(n / i)) < 1 / r ? "" : n < 0 ? "left" : "right", s < r && ("" !== o && (o += "-"), o += i < 0 ? "up" : "down"), o)
                }, i.applyBounds = function(t, n) {
                    var i, s, o, a, u, l;
                    if (t && r.bounds !== t) return r.bounds = t, H.update(!0, n);
                    if (lt(!0), ct(), c && !mt()) {
                        if (i = H.x, s = H.y, i > d ? i = d : i < g && (i = g), s > _ ? s = _ : s < m && (s = m), (H.x !== i || H.y !== s) && (o = !0, H.x = H.endX = i, X ? H.endRotation = i : H.y = H.endY = s, x = !0, ut(!0), H.autoScroll && !H.isDragging))
                            for (Ua(e.parentNode), a = e, Oa.scrollTop = null != Yo.pageYOffset ? Yo.pageYOffset : null != ot.documentElement.scrollTop ? ot.documentElement.scrollTop : ot.body.scrollTop, Oa.scrollLeft = null != Yo.pageXOffset ? Yo.pageXOffset : null != ot.documentElement.scrollLeft ? ot.documentElement.scrollLeft : ot.body.scrollLeft; a && !l;) u = (l = Ha(a.parentNode)) ? Oa : a.parentNode, G && u.scrollTop > u._gsMaxScrollY && (u.scrollTop = u._gsMaxScrollY), q && u.scrollLeft > u._gsMaxScrollX && (u.scrollLeft = u._gsMaxScrollX), a = u;
                        H.isThrowing && (o || H.endX > d || H.endX < g || H.endY > _ || H.endY < m) && dt(r.inertia || r.throwProps, o)
                    }
                    return H
                }, i.update = function(t, r, n) {
                    if (r && H.isPressed) {
                        var i = vo(e),
                            s = L.apply({
                                x: H.x - l,
                                y: H.y - p
                            }),
                            o = vo(e.parentNode, !0);
                        o.apply({
                            x: i.e - s.x,
                            y: i.f - s.y
                        }, s), H.x -= s.x - o.e, H.y -= s.y - o.f, ut(!0), _t()
                    }
                    var a = H.x,
                        u = H.y;
                    return gt(!r), t ? H.applyBounds() : (x && n && ut(!0), lt(!0)), r && (xt(H.pointerX, H.pointerY), x && ut(!0)), H.isPressed && !r && (q && Math.abs(a - H.x) > .01 || G && Math.abs(u - H.y) > .01 && !X) && _t(), H.autoScroll && (Ua(e.parentNode, H.isDragging), Q = H.isDragging, ut(!0), Va(e, wt), Ga(e, wt)), H
                }, i.enable = function(t) {
                    var n, i, a, u = {
                        lazy: !0
                    };
                    if (!1 !== r.cursor && (u.cursor = r.cursor || na), jo.utils.checkPrefix("touchCallout") && (u.touchCallout = "none"), "soft" !== t) {
                        for (Pa(W, q === G ? "none" : r.allowNativeTouchScrolling && e.scrollHeight === e.clientHeight == (e.scrollWidth === e.clientHeight) || r.allowEventDefault ? "manipulation" : q ? "pan-y" : "pan-x"), i = W.length; --i > -1;) a = W[i], ia || Na(a, "mousedown", vt), Na(a, "touchstart", vt), Na(a, "click", Ct, !0), jo.set(a, u), a.getBBox && a.ownerSVGElement && q !== G && jo.set(a.ownerSVGElement, {
                            touchAction: r.allowNativeTouchScrolling || r.allowEventDefault ? "manipulation" : q ? "pan-y" : "pan-x"
                        }), r.allowContextMenu || Na(a, "contextmenu", at);
                        su(W, !1)
                    }
                    return Ga(e, wt), s = !0, ra && "soft" !== t && ra.track(o || e, z ? "x,y" : X ? "rotation" : "top,left"), e._gsDragID = n = "d" + Ta++, Ea[n] = H, o && (o.enable(), o.element._gsDragID = n), (r.bounds || X) && _t(), r.bounds && H.applyBounds(), H
                }, i.disable = function(t) {
                    for (var r, n = H.isDragging, i = W.length; --i > -1;) $a(W[i], "cursor", null);
                    if ("soft" !== t) {
                        for (Pa(W, null), i = W.length; --i > -1;) r = W[i], $a(r, "touchCallout", null), Ia(r, "mousedown", vt), Ia(r, "touchstart", vt), Ia(r, "click", Ct, !0), Ia(r, "contextmenu", at);
                        su(W, !0), T && (Ia(T, "touchcancel", bt), Ia(T, "touchend", bt), Ia(T, "touchmove", yt)), Ia(ot, "mouseup", bt), Ia(ot, "mousemove", yt)
                    }
                    return Va(e, wt), s = !1, ra && "soft" !== t && (ra.untrack(o || e, z ? "x,y" : X ? "rotation" : "top,left"), H.tween && H.tween.kill()), o && o.disable(), La(ut), H.isDragging = H.isPressed = E = !1, n && Ka(H, "dragend", "onDragEnd"), H
                }, i.enabled = function(t, e) {
                    return arguments.length ? t ? H.enable(e) : H.disable(e) : s
                }, i.kill = function() {
                    return H.isThrowing = !1, H.tween && H.tween.kill(), H.disable(), jo.set(W, {
                        clearProps: "userSelect"
                    }), delete Ea[e._gsDragID], H
                }, i.revert = function() {
                    this.kill(), this.styles && this.styles.revert()
                }, ~I.indexOf("scroll") && (o = i.scrollProxy = new au(e, function(t, e) {
                    for (var r in e) r in t || (t[r] = e[r]);
                    return t
                }({
                    onKill: function() {
                        H.isPressed && bt(null)
                    }
                }, r)), e.style.overflowY = G && !Jo ? "auto" : "hidden", e.style.overflowX = q && !Jo ? "auto" : "hidden", e = o.content), X ? U.rotation = 1 : (q && (U[j] = 1), G && (U[Y] = 1)), nt.force3D = !("force3D" in r) || r.force3D, sa(Xo(i)), i.enable(), i
            }
            return r = t, (e = n).prototype = Object.create(r.prototype), e.prototype.constructor = e, e.__proto__ = r, n.register = function(t) {
                jo = t, uu()
            }, n.create = function(t, e) {
                return Uo || uu(!0), Qo(t).map((function(t) {
                    return new n(t, e)
                }))
            }, n.get = function(t) {
                return Ea[(Qo(t)[0] || {})._gsDragID]
            }, n.timeSinceDrag = function() {
                return (Ca() - Ma) / 1e3
            }, n.hitTest = function(t, e, r) {
                if (t === e) return !1;
                var n, i, s, o = Ja(t),
                    a = Ja(e),
                    u = o.top,
                    l = o.left,
                    p = o.right,
                    c = o.bottom,
                    h = o.width,
                    f = o.height,
                    d = a.left > p || a.right < l || a.top > c || a.bottom < u;
                return d || !r ? !d : (s = -1 !== (r + "").indexOf("%"), r = parseFloat(r) || 0, (n = {
                    left: Math.max(l, a.left),
                    top: Math.max(u, a.top)
                }).width = Math.min(p, a.right) - n.left, n.height = Math.min(c, a.bottom) - n.top, !(n.width < 0 || n.height < 0) && (s ? (r *= .01, (i = n.width * n.height) >= h * f * r || i >= a.width * a.height * r) : n.width > r && n.height > r))
            }, n
        }(function() {
            function t(t) {
                this._listeners = {}, this.target = t || this
            }
            var e = t.prototype;
            return e.addEventListener = function(t, e) {
                var r = this._listeners[t] || (this._listeners[t] = []);
                ~r.indexOf(e) || r.push(e)
            }, e.removeEventListener = function(t, e) {
                var r = this._listeners[t],
                    n = r && r.indexOf(e);
                n >= 0 && r.splice(n, 1)
            }, e.dispatchEvent = function(t) {
                var e, r = this;
                return (this._listeners[t] || []).forEach((function(n) {
                    return !1 === n.call(r, {
                        type: t,
                        target: r.target
                    }) && (e = !1)
                })), e
            }, t
        }());
    ! function(t, e) {
        for (var r in e) r in t || (t[r] = e[r])
    }(lu.prototype, {
        pointerX: 0,
        pointerY: 0,
        startX: 0,
        startY: 0,
        deltaX: 0,
        deltaY: 0,
        isDragging: !1,
        isPressed: !1
    }), lu.zIndex = 1e3, lu.version = "3.12.5", ca() && jo.registerPlugin(lu);
    /*!
     * VelocityTracker: 3.12.5
     * https://gsap.com
     *
     * Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var pu, cu, hu, fu, du, gu, _u, mu, Du = function() {
            return pu || "undefined" != typeof window && (pu = window.gsap)
        },
        vu = {},
        yu = function(t) {
            return mu(t).id
        },
        xu = function(t) {
            return vu[yu("string" == typeof t ? hu(t)[0] : t)]
        },
        bu = function(t) {
            var e, r = du;
            if (t - _u >= .05)
                for (_u = t; r;)((e = r.g(r.t, r.p)) !== r.v1 || t - r.t1 > .2) && (r.v2 = r.v1, r.v1 = e, r.t2 = r.t1, r.t1 = t), r = r._next
        },
        wu = {
            deg: 360,
            rad: 2 * Math.PI
        },
        Cu = function() {
            (pu = Du()) && (hu = pu.utils.toArray, fu = pu.utils.getUnit, mu = pu.core.getCache, gu = pu.ticker, cu = 1)
        },
        Fu = function(t, e, r, n) {
            this.t = t, this.p = e, this.g = t._gsap.get, this.rCap = wu[r || fu(this.g(t, e))], this.v1 = this.v2 = 0, this.t1 = this.t2 = gu.time, n && (this._next = n, n._prev = this)
        },
        Eu = function() {
            function t(t, e) {
                cu || Cu(), this.target = hu(t)[0], vu[yu(this.target)] = this, this._props = {}, e && this.add(e)
            }
            t.register = function(t) {
                pu = t, Cu()
            };
            var e = t.prototype;
            return e.get = function(t, e) {
                var r, n, i, s = this._props[t] || console.warn("Not tracking " + t + " velocity.");
                return r = parseFloat(e ? s.v1 : s.g(s.t, s.p)) - parseFloat(s.v2), (n = s.rCap) && (r %= n) != r % (n / 2) && (r = r < 0 ? r + n : r - n), i = r / ((e ? s.t1 : gu.time) - s.t2), Math.round(1e4 * i) / 1e4
            }, e.getAll = function() {
                var t, e = {},
                    r = this._props;
                for (t in r) e[t] = this.get(t);
                return e
            }, e.isTracking = function(t) {
                return t in this._props
            }, e.add = function(t, e) {
                t in this._props || (du || (gu.add(bu), _u = gu.time), du = this._props[t] = new Fu(this.target, t, e, du))
            }, e.remove = function(t) {
                var e, r, n = this._props[t];
                n && (e = n._prev, r = n._next, e && (e._next = r), r ? r._prev = e : du === n && (gu.remove(bu), du = 0), delete this._props[t])
            }, e.kill = function(t) {
                for (var e in this._props) this.remove(e);
                t || delete vu[yu(this.target)]
            }, t.track = function(e, r, n) {
                cu || Cu();
                for (var i, s, o = [], a = hu(e), u = r.split(","), l = (n || "").split(","), p = a.length; p--;) {
                    for (i = xu(a[p]) || new t(a[p]), s = u.length; s--;) i.add(u[s], l[s] || l[0]);
                    o.push(i)
                }
                return o
            }, t.untrack = function(t, e) {
                var r = (e || "").split(",");
                hu(t).forEach((function(t) {
                    var e = xu(t);
                    e && (r.length ? r.forEach((function(t) {
                        return e.remove(t)
                    })) : e.kill(1))
                }))
            }, t.isTracking = function(t, e) {
                var r = xu(t);
                return r && r.isTracking(e)
            }, t.getVelocity = function(t, e) {
                var r = xu(t);
                return r && r.isTracking(e) ? r.get(e) : console.warn("Not tracking velocity of " + e)
            }, t
        }();
    Eu.getByTarget = xu, Du() && pu.registerPlugin(Eu);
    /*!
     * InertiaPlugin 3.12.5
     * https://gsap.com
     *
     * @license Copyright 2008-2024, GreenSock. All rights reserved.
     * Subject to the terms at https://gsap.com/standard-license or for
     * Club GSAP members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var Tu, Su, Mu, Au, Ou, Ru, Pu, ku, Bu, Lu, Nu, Iu, zu, Xu, ju, Yu = Eu.getByTarget,
        qu = function() {
            return Tu || "undefined" != typeof window && (Tu = window.gsap) && Tu.registerPlugin && Tu
        },
        Gu = function(t) {
            return "number" == typeof t
        },
        Vu = function(t) {
            return "object" == typeof t
        },
        Hu = function(t) {
            return "function" == typeof t
        },
        Wu = Array.isArray,
        Uu = function(t) {
            return t
        },
        $u = 1e10,
        Qu = function(t, e, r) {
            for (var n in e) n in t || n === r || (t[n] = e[n]);
            return t
        },
        Zu = function t(e) {
            var r, n, i = {};
            for (r in e) i[r] = Vu(n = e[r]) && !Wu(n) ? t(n) : n;
            return i
        },
        Ju = function(t, e, r, n, i) {
            var s, o, a, u, l = e.length,
                p = 0,
                c = $u;
            if (Vu(t)) {
                for (; l--;) {
                    for (a in s = e[l], o = 0, t) o += (u = s[a] - t[a]) * u;
                    o < c && (p = l, c = o)
                }
                if ((i || $u) < $u && i < Math.sqrt(c)) return t
            } else
                for (; l--;)(o = (s = e[l]) - t) < 0 && (o = -o), o < c && s >= n && s <= r && (p = l, c = o);
            return e[p]
        },
        Ku = function(t, e, r, n, i, s, o) {
            if ("auto" === t.end) return t;
            var a, u, l = t.end;
            if (r = isNaN(r) ? $u : r, n = isNaN(n) ? -1e10 : n, Vu(e)) {
                if (a = e.calculated ? e : (Hu(l) ? l(e, o) : Ju(e, l, r, n, s)) || e, !e.calculated) {
                    for (u in a) e[u] = a[u];
                    e.calculated = !0
                }
                a = a[i]
            } else a = Hu(l) ? l(e, o) : Wu(l) ? Ju(e, l, r, n, s) : parseFloat(l);
            return a > r ? a = r : a < n && (a = n), {
                max: a,
                min: a,
                unitFactor: t.unitFactor
            }
        },
        tl = function(t, e, r) {
            return isNaN(t[e]) ? r : +t[e]
        },
        el = function(t, e) {
            return .05 * e * t / Lu
        },
        rl = function(t, e, r) {
            return Math.abs((e - t) * Lu / r / .05)
        },
        nl = {
            resistance: 1,
            checkpoint: 1,
            preventOvershoot: 1,
            linkedProps: 1,
            radius: 1,
            duration: 1
        },
        il = function(t, e, r, n) {
            if (e.linkedProps) {
                var i, s, o, a, u, l, p = e.linkedProps.split(","),
                    c = {};
                for (i = 0; i < p.length; i++)(o = e[s = p[i]]) && (a = Gu(o.velocity) ? o.velocity : (u = u || Yu(t)) && u.isTracking(s) ? u.get(s) : 0, l = Math.abs(a / tl(o, "resistance", n)), c[s] = parseFloat(r(t, s)) + el(a, l));
                return c
            }
        },
        sl = function() {
            (Tu = qu()) && (Mu = Tu.parseEase, Au = Tu.utils.toArray, Pu = Tu.utils.getUnit, Bu = Tu.core.getCache, Nu = Tu.utils.clamp, zu = Tu.core.getStyleSaver, Xu = Tu.core.reverting || function() {}, Ou = Mu("power3"), Lu = Ou(.05), ku = Tu.core.PropTween, Tu.config({
                resistance: 100,
                unitFactors: {
                    time: 1e3,
                    totalTime: 1e3,
                    progress: 1e3,
                    totalProgress: 1e3
                }
            }), Ru = Tu.config(), Tu.registerPlugin(Eu), Su = 1)
        },
        ol = {
            version: "3.12.5",
            name: "inertia",
            register: function(t) {
                Tu = t, sl()
            },
            init: function(t, e, r, n, i) {
                Su || sl();
                var s = Yu(t);
                if ("auto" === e) {
                    if (!s) return void console.warn("No inertia tracking on " + t + ". InertiaPlugin.track(target) first.");
                    e = s.getAll()
                }
                this.styles = zu && "object" == typeof t.style && zu(t), this.target = t, this.tween = r, Iu = e;
                var o, a, u, l, p, c, h, f, d, g = t._gsap,
                    _ = g.get,
                    m = e.duration,
                    D = Vu(m),
                    v = e.preventOvershoot || D && 0 === m.overshoot,
                    y = tl(e, "resistance", Ru.resistance),
                    x = Gu(m) ? m : function(t, e, r, n, i, s) {
                        if (void 0 === r && (r = 10), void 0 === n && (n = .2), void 0 === i && (i = 1), void 0 === s && (s = 0), "string" == typeof t && (t = Au(t)[0]), !t) return 0;
                        var o, a, u, l, p, c, h, f, d, g, _ = 0,
                            m = $u,
                            D = e.inertia || e,
                            v = Bu(t).get,
                            y = tl(D, "resistance", Ru.resistance);
                        for (o in g = il(t, D, v, y), D) nl[o] || (a = D[o], Vu(a) || ((f = f || Yu(t)) && f.isTracking(o) ? a = Gu(a) ? {
                            velocity: a
                        } : {
                            velocity: f.get(o)
                        } : (l = +a || 0, u = Math.abs(l / y))), Vu(a) && (l = Gu(a.velocity) ? a.velocity : (f = f || Yu(t)) && f.isTracking(o) ? f.get(o) : 0, u = Nu(n, r, Math.abs(l / tl(a, "resistance", y))), c = (p = parseFloat(v(t, o)) || 0) + el(l, u), "end" in a && (a = Ku(a, g && o in g ? g : c, a.max, a.min, o, D.radius, l), s && (Iu === e && (Iu = D = Zu(e)), D[o] = Qu(a, D[o], "end"))), "max" in a && c > +a.max + 1e-10 ? (d = a.unitFactor || Ru.unitFactors[o] || 1, (h = p > a.max && a.min !== a.max || l * d > -15 && l * d < 45 ? n + .1 * (r - n) : rl(p, a.max, l)) + i < m && (m = h + i)) : "min" in a && c < +a.min - 1e-10 && (d = a.unitFactor || Ru.unitFactors[o] || 1, (h = p < a.min && a.min !== a.max || l * d > -45 && l * d < 15 ? n + .1 * (r - n) : rl(p, a.min, l)) + i < m && (m = h + i)), h > _ && (_ = h)), u > _ && (_ = u));
                        return _ > m && (_ = m), _ > r ? r : _ < n ? n : _
                    }(t, e, D && m.max || 10, D && m.min || .2, D && "overshoot" in m ? +m.overshoot : v ? 0 : 1, !0);
                for (o in e = Iu, Iu = 0, d = il(t, e, _, y), e) nl[o] || (a = e[o], Hu(a) && (a = a(n, t, i)), Gu(a) ? p = a : Vu(a) && !isNaN(a.velocity) ? p = +a.velocity : s && s.isTracking(o) ? p = s.get(o) : console.warn("ERROR: No velocity was defined for " + t + " property: " + o), c = el(p, x), f = 0, u = _(t, o), l = Pu(u), u = parseFloat(u), Vu(a) && (h = u + c, "end" in a && (a = Ku(a, d && o in d ? d : h, a.max, a.min, o, e.radius, p)), "max" in a && +a.max < h ? v || a.preventOvershoot ? c = a.max - u : f = a.max - u - c : "min" in a && +a.min > h && (v || a.preventOvershoot ? c = a.min - u : f = a.min - u - c)), this._props.push(o), this.styles && this.styles.save(o), this._pt = new ku(this._pt, t, o, u, 0, Uu, 0, g.set(t, o, this)), this._pt.u = l || 0, this._pt.c1 = c, this._pt.c2 = f);
                return r.duration(x), 1
            },
            render: function(t, e) {
                var r, n = e._pt;
                if ((t = Ou(e.tween._time / e.tween._dur)) || !Xu())
                    for (; n;) n.set(n.t, n.p, (r = n.s + n.c1 * t + n.c2 * t * t, Math.round(1e4 * r) / 1e4 + n.u), n.d, t), n = n._next;
                else e.styles.revert()
            }
        };
    "track,untrack,isTracking,getVelocity,getByTarget".split(",").forEach((function(t) {
        return ol[t] = Eu[t]
    })), qu() && Tu.registerPlugin(ol), qn.registerPlugin(Ue, Gn, Ne, Ne, Yn, gi, ks, ps, Ys, Js, zo, lu, ol), window._tpt ? ? = {};
    var al = ju = window.punchgs = window.tpGS = _tpt;
    for (var ul in _tpt.gsap = qn, _tpt.TweenLite = Ue, _tpt.TweenMax = Gn, _tpt.TimelineLite = Ne, _tpt.TimelineMax = Ne, _tpt.CSSPlugin = Yn, _tpt.SplitText = gi, _tpt.motionPath = zo, _tpt.CustomEase = ps, _tpt.CustomBounce = Ys, _tpt.CustomWiggle = Js, _tpt.DrawSVGPlugin = ks, _tpt.draggable = lu, _tpt.Inertia = ol, _tpt.RAD2DEG = 180 / Math.PI, _tpt.DEG2RAD = Math.PI / 180, _tpt.gsap.config({
                nullTargetWarn: !1
            }),
            /*!FallBack for old and new Eases*/
            _tpt.eases = _tpt.gsap.parseEase(), _tpt.eases) _tpt.eases.hasOwnProperty(ul) && void 0 === al[ul] && (al[ul] = _tpt.eases[ul]
        /*! FallBack for Essential Grid */
    );
    void 0 !== ju && void 0 !== ju.TweenLite && void 0 === ju.TweenLite.lagSmoothing && (ju.TweenLite.lagSmoothing = function() {}), _tpt.CustomEase.create("late", "M0,0,C0,0,0.474,0.078,0.724,0.26,0.969,0.438,1,1,1,1"), _tpt.CustomEase.create("late2", "M0,0 C0,0 0.738,-0.06 0.868,0.22 1,0.506 1,1 1,1 "), _tpt.CustomEase.create("late3", "M0,0,C0,0,0.682,0.157,0.812,0.438,0.944,0.724,1,1,1,1"), _tpt.SFXBounceLite = _tpt.CustomBounce.create("SFXBounceLite", {
        strength: .3,
        squash: 1,
        squashID: "SFXBounceLite-squash"
    }), _tpt.SFXBounceSolid = _tpt.CustomBounce.create("SFXBounceSolid", {
        strength: .5,
        squash: 2,
        squashID: "SFXBounceSolid-squash"
    }), _tpt.SFXBounceStrong = _tpt.CustomBounce.create("SFXBounceStrong", {
        strength: .7,
        squash: 3,
        squashID: "SFXBounceStrong-squash"
    }), _tpt.SFXBounceExtrem = _tpt.CustomBounce.create("SFXBounceExtrem", {
        strength: .9,
        squash: 4,
        squashID: "SFXBounceExtrem-squash"
    }), _tpt.BounceLite = _tpt.CustomBounce.create("BounceLite", {
        strength: .3
    }), _tpt.BounceSolid = _tpt.CustomBounce.create("BounceSolid", {
        strength: .5
    }), _tpt.BounceStrong = _tpt.CustomBounce.create("BounceStrong", {
        strength: .7
    }), _tpt.BounceExtrem = _tpt.CustomBounce.create("BounceExtrem", {
        strength: .9
    }), _tpt.R = _tpt.R || {}, _tpt.R.tpgsap = _tpt.extend ? _tpt.extend(_tpt.R.tpgsap, {
        status: 2,
        version: "1.0"
    }) : {
        status: 2,
        version: "1.0"
    }, window.dispatchEvent(new CustomEvent("tpGSAPReady"))
})();