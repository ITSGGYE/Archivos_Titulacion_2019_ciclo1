rCase (); return n || (i = gt [o], gt [o] = r, r = null! = a (e, t, n)? o: null, gt [o] = i), r }}); var vt = / ^ (?: input | select | textarea | button) $ / i, yt = / ^ (?: a | area) $ / i; function mt (e) {return (e.match (R) || []). Join ("")} function xt (e) {return e.getAttribute && e.getAttribute ("class") || ""} function bt (e) {return Array.isArray (e) ? e: "string" == typeof e && e.match (R) || []} k.fn.extend ({prop: function (e, t) {return _ (this, k.prop, e, t, 1 <argumentos.length)}, removeProp: function (e) {return this.each (function () {delete this [k.propFix [e] || e]})}}), k.extend ({prop: function (e, t, n) {var r, i, o = e.nodeType; if (3! == o && 8! == o && 2! == o) devuelve 1 === o && k.isXMLDoc (e) || (t = k.propFix [t] || t, i = k.propHooks [t]), nulo 0! == n? i && "set" en i && nulo 0! == (r = i.set (e, n, t ))? r: e [t] = n: i && "get" en i && null! == (r = i.get (e,t))? r: e [t]}, propHooks: {tabIndex: {get: function (e) {var t = k.find.attr (e, "tabindex"); devuelve t? parseInt (t, 10) : vt.test (e.nodeName) || yt.test (e.nodeName) && e.href? 0: -1}}}, propFix: {"for": "htmlFor", "class": "className"} }), y.optSelected || (k.propHooks.selected = {get: function (e) {var t = e.parentNode; return t && t.parentNode && t.parentNode.selectedIndex, null}, set: function (e) {var t = e.parentNode; t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)}}), k.each (["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", " rowSpan "," colSpan "," useMap "," frameBorder "," contentEditable "], function () {k.propFix [this.toLowerCase ()] = this}), k.fn.extend ({addClass: function ( t) {var e, n, r, i, o, a,s, u = 0; if (m (t)) devuelve this.each (function (e) {k (this) .addClass (t.call (this, e, xt (this)))}); if (( e = bt (t)). length) while (n = this [u ++]) if (i = xt (n), r = 1 === n.nodeType && "" + mt (i) + "") {a = 0; while (o = e [a ++]) r.indexOf ("" + o + "") <0 && (r + = o + ""); i! == (s = mt (r)) && n.setAttribute (" class ", s)} devuelve esto}, removeClass: function (t) {var e, n, r, i, o, a, s, u = 0; if (m (t)) devuelve this.each (function ( e) {k (this) .removeClass (t.call (this, e, xt (this)))}); if (! argumentos.length) devuelve this.attr ("class", ""); if (( e = bt (t)). length) while (n = this [u ++]) if (i = xt (n), r = 1 === n.nodeType && "" + mt (i) + "") {a = 0; while (o = e [a ++]) while (-1 <r.indexOf ("" + o + "")) r = r.replace ("" + o + "", ""); i! == (s = mt (r)) && n.setAttribute ("clase",s)} devolver esto}, toggleClass: function (i, t) {var o = typeof i, a = "string" === o || Array.isArray (i); return "boolean" == typeof t && a? t ? this.addClass (i): this.removeClass (i): m (i)? this.each (function (e) {k (this) .toggleClass (i.call (this, e, xt (this), t ), t)}): this.each (function () {var e, t, n, r; if (a) {t = 0, n = k (this), r = bt (i); while (e = r [t ++]) n.hasClass (e)? n.removeClass (e): n.addClass (e)} else void 0! == i && "boolean"! == o || ((e = xt (this )) && Q.set (this, "__ className __", e), this.setAttribute && this.setAttribute ("class", e ||! 1 === i? "": Q.get (this, "__ className __") || ""))})}, hasClass: function (e) {var t, n, r = 0; t = "" + e + ""; while (n = this [r ++]) if (1 === n. nodeType && - 1 <("" + mt (xt (n)) + "") .indexOf (t)) return! 0; return! 1}}); var wt = / \ r / g; k.fn.extend ({val:función (n) {var r, e, i, t = this [0]; devolver argumentos.length? (i = m (n), this.each (function (e) {var t; 1 === this. nodeType && (null == (t = i? n.call (this, e, k (this) .val ()): n)? t = "": "number" == typeof t? t + = "": Array .isArray (t) && (t = k.map (t, function (e) {return null == e? "": e + ""})), (r = k.valHooks [this.type] || k .valHooks [this.nodeName.toLowerCase ()]) && "set" en r && void 0! == r.set (this, t, "value") || (this.value = t))})): t? (r = k.valHooks [t.type] || k.valHooks [t.nodeName.toLowerCase ()]) && "get" en r && void 0! == (e = r.get (t, "value")) ? e: "string" == typeof (e = t.value)? e.replace (wt, ""): null == e? "": e: void 0}}), k.extend ({valHooks: {opción: {get: function (e) {var t = k.find.attr (e, "value"); return null! = t? t: mt (k.text (e))}}, seleccione: { obtener:función (e) {var t, n, r, i = e.options, o = e.selectedIndex, a = "select-one" === e.type, s = a? null: [], u = a ? o + 1: longitud i; for (r = o <0? u: a? o: 0; r <u; r ++) if (((n = i [r]). seleccionado || r === o) &&! n.disabled && (! n.parentNode.disabled ||! A (n.parentNode, "optgroup"))) {if (t = k (n) .val (), a) devuelve t; s. push (t)} return s}, set: function (e, t) {var n, r, i = e.options, o = k.makeArray (t), a = i.length; while (a--) ((r = i [a]). selected = -1 <k.inArray (k.valHooks.option.get (r), o)) && (n =! 0); return n || (e.selectedIndex = -1), o}}}}), k.each (["radio", "checkbox"], function () {k.valHooks [this] = {set: function (e, t) {if (Array. isArray (t)) return e.checked = -1 <k.inArray (k (e) .val (), t)}}, y.checkOn || (k.valHooks [this] .get = function (e) {return null === e.getAttribute ("value")? "on": e.value})}), y.focusin = "onfocusin" en C; var Tt = / ^ (?:focusinfocus | focusoutblur) $ /, Ct = function (e) {e.stopPropagation ()}; k.extend (k.event, {trigger: function (e, t, n, r) {var i, o, a, s, u, l, c, f, p = [n || E], d = v.call (e, "type")? e.type: e, h = v.call (e, "namespace") ? e.namespace.split ("."): []; if (o = f = a = n = n || E, 3! == n.nodeType && 8! == n.nodeType &&! Tt.test (d + k.event.triggered) && (- 1 <d.indexOf (".") && (d = (h = d.split (".")). shift (), h.sort ()), u = d .indexOf (":") <0 && "en" + d, (e = e [k.expando]? e: new k.Event (d, "object" == typeof e && e)). isTrigger = r? 2: 3, e.namespace = h.join ("."), E.rnamespace = e.namespace? New RegExp ("(^ | \\.)" + H.join ("\\. (?:. * \ \. |) ") +" (\\. | $) "): nulo, e.result = nulo 0, e.target || (e.target = n), t = null == t? [e] : k.makeArray (t, [e]), c = k.event.special [d] || {}, r ||! c.trigger ||! 1! == c.trigger.apply (n, t))) {if (! r &&! c.noBubble &&! x (n)) {for (s = c.delegateType || d, Tt.test (s + d) || (o = o.parentNode); o; o = o.parentNode) p.push (o), a = o; a === (n.ownerDocument || E) && p.push (a.defaultView || a.parentWindow || C)} i = 0; while ((o = p [i ++]) &&! E.isPropagationStopped ()) f = o, e.type = 1 <i? S: c.bindType || d, (l = ( Q.get (o, "events") || {}) [e.type] && Q.get (o, "handle")) && l.apply (o, t), (l = u && o [u]) && l. aplique && G (o) && (e.result = l.apply (o, t) ,! 1 === e.result && e.preventDefault ()); return e.type = d, r || e.isDefaultPrevented () || c._default &&! 1! == c._default.apply (p.pop (), t) ||! G (n) || u && m (n [d]) &&! x (n) && ((a = n [u]) && (n [u] = null), k.event.triggered = d, e.isPropagationStopped () && f.addEventListener (d, Ct), n [d] (), e.isPropagationStopped () && f.removeEventListener (d, Ct), k.event.triggered = void 0, a && (n [u] = a)), e.result}}, simula: función (e, t, n) {var r = k.extend (nuevo k.Event, n, {type: e, isSimulated:! 0}); k.event.trigger (r, null, t)}}), k.fn.extend ({trigger: function (e, t ) {return this.each (function () {k.event.trigger (e, t, this)})}, triggerHandler: function (e, t) {var n = this [0]; if (n) return k .event.trigger (e, t, n,! 0)}}), y.focusin || k.each ({focus: "focusin", blur: "focusout"}, function (n, r) {var i = función (e) {k.event.simulate (r, e.target, k.event.fix (e))}; k.event.special [r] = {setup: function () {var e = this. ownerDocument || this, t = Q.access (e, r); t || e.addEventListener (n, i,! 0), Q.access (e, r, (t || 0) +1)}, desmontaje: function () {var e = this.ownerDocument || this, t = Q.access (e, r) -1; t? Q.access (e, r, t) :( e.removeEventListener (n, i ,! 0), Q.remove (e, r))}}}); var Et = C.ubicación, kt = Date.now (), St = / \? /; K.parseXML = function (e) { var t;if (! e || "string"! = typeof e) return null; try {t = (new C.DOMParser) .parseFromString (e, "text / xml")} catch (e) {t = void 0} return t &&! t.getElementsByTagName ("parsererror"). length || k.error ("XML no válido:" + e), t}; var Nt = / \ [\] $ /, At = / \ r? \ n / g, Dt = / ^ (?: enviar | botón | imagen | restablecer | archivo) $ / i, jt = / ^ (?: entrada | seleccionar | área de texto | keygen) / i; función qt (n, e, r, i) {var t; if (Array.isArray (e)) k.each (e, function (e, t) {r || Nt.test (n)? i (n, t): qt (n + "[ "+ (" object "== typeof t && null! = t? e:" ") +"] ", t, r, i)}); si no (r ||" object "! == w (e)) i (n, e); más para (t en e) qt (n + "[" + t + "]", e [t], r, i)} k.param = función (e, t) {var n, r = [], i = función (e, t) {var n = m (t)? t (): t; r [r.length] = encodeURIComponent (e) + "=" + encodeURIComponent (null == n ? "": n)}; if (null == e) return ""; if (Array.isArray (e) || e.jquery &&! k.isPlainObject (e)) k.each (e, function () {i (this.name, this.value)}); else for (n in e) qt (n , e [n], t, i); return r.join ("&")}, k.fn.extend ({serialize: function () {return k.param (this.serializeArray ())}, serializeArray: function () {return this.map (function () {var e = k.prop (this, "elements"); return e? k.makeArray (e): this}). filter (function () {var e = this.type; devuelve this.name &&! k (this) .is (": disabled") && jt.test (this.nodeName) &&! Dt.test (e) && (this.checked ||! pe.test (e ))}). map (function (e, t) {var n = k (this) .val (); return null == n? null: Array.isArray (n)? k.map (n, function (e ) {return {name: t.name, value: e.replace (At, "\ r \ n")}}): {name: t.name, value: n.replace (At, "\ r \ n" )}}). get ()}}); var Lt = /% 20 / g, Ht = / #. * $ /, Ot = / ([? &]) _ = [^ &] * /, Pt = / ^ (. *?): [\ t] * ([^ \ r \ n] *) $ / gm, Rt = / ^ (?:GET | HEAD) $ /, Mt = / ^ \ / \ //, It = {}, Wt = {}, $ t = "* /". Concat ("*"), Ft = E.createElement ("a "); función Bt (o) {función de retorno (e, t) {" string "! = typeof e && (t = e, e =" * "); var n, r = 0, i = e.toLowerCase () .match (R) || []; if (m (t)) while (n = i [r ++]) "+" === n [0]? (n = n.slice (1) || "* ", (o [n] = o [n] || []). unshift (t)) :( o [n] = o [n] || []). push (t)}} function _t (t , i, o, a) {var s = {}, u = t === Wt; función l (e) {var r; return s [e] =! 0, k.each (t [e] || [], función (e, t) {var n = t (i, o, a); return "string"! = typeof n || u || s [n]? u?! (r = n): void 0: (i.dataTypes.unshift (n), l (n) ,! 1)}), r} return l (i.dataTypes [0]) ||! S ["*"] && l ("*") } función zt (e, t) {var n, r, i = k.ajaxSettings.flatOptions || {}; for (n in t) void 0! == t [n] && ((i [n]? e : r || (r = {})) [n] = t [n]); devuelve r && k.extend (! 0, e, r), e} Ft.href = Et.href, k.extend ({active : 0,lastModified: {}, etag: {}, ajaxSettings: {url: Et.href, escriba: "GET", isLocal: / ^ (?: about | app | app-storage |. + - extension | file | res | widget ): $ /. test (Et.protocol), global:! 0, processData:! 0, async:! 0, contentType: "application / x-www-form-urlencoded; charset = UTF-8", acepta: { "*": $ t, text: "text / plain", html: "text / html", xml: "application / xml, text / xml", json: "application / json, text / javascript"}, contenido: {xml: / \ bxml \ b /, html: / \ bhtml /, json: / \ bjson \ b /}, responseFields: {xml: "responseXML", texto: "responseText", json: "responseJSON"}, convertidores : {"* text": String, "text html":! 0, "text json": JSON.parse, "text xml": k.parseXML}, flatOptions: {url:! 0, context:! 0}} , ajaxSetup: function (e, t) {return t? zt (zt (e, k.ajaxSettings), t): zt (k.ajaxSettings, e)}, ajaxPrefilter:Bt (It), ajaxTransport: Bt (Wt), ajax: function (e, t) {"object" == typeof e && (t = e, e = void 0), t = t || {}; var c, f, p, n, d, r, h, g, i, o, v = k.ajaxSetup ({}, t), y = v.context || v, m = v.context && (y.nodeType || y.jquery)? k (y): k.event, x = k.Deferred (), b = k.Callbacks ("once memory"), w = v.statusCode || {}, a = {}, s = {}, u = "cancelado", T = {readyState: 0, getResponseHeader: function (e) {var t; if (h) {if (! n) {n = {}; while (t = Pt.exec (p)) n [t [1] .toLowerCase () + ""] = (n [t [1] .toLowerCase () + ""] || []). concat (t [2])} t = n [e.toLowerCase () + ""]} return null == t? null: t.join (",")}, getAllResponseHeaders: function () {return h? p: null}, setRequestHeader: function (e, t) {return null == h && (e = s [e.toLowerCase ()] = s [e.toLowerCase ()] || e, a [e] = t), this}, overrideMimeType: function (e) { return null == h && (v.mimeType = e), this}, statusCode: function (e) {var t;if (e) if (h) T. siempre (e [T.status]); de lo contrario para (t en e) w [t] = [w [t], e [t]]; devuelve esto}, aborta: función (e) {var t = e || u; return c && c.abort (t), l (0, t), this}}; if (x.promise (T), v.url = ((e || v.url || Et.href) + ""). replace (Mt, Et.protocol + "//"), v.type = t.method || t.type || v.method || v.type, v.dataTypes = (v.dataType || "*"). toLowerCase (). match (R) || [""], null == v.crossDomain) {r = E.createElement ("a"); intente {r.href = v.url, r.href = r.href, v.crossDomain = Ft.protocol + "//" + Ft.host! = r.protocol + "//" + r.host} catch (e) {v.crossDomain =! 0}} if (v.data && v.processData && "string"! = typeof v.data && (v.data = k.param (v.data, v.traditional)), _ t (It, v, t, T), h) devuelve T; para (i en (g = k.event && v.global) && 0 == k.active ++ && k.event.trigger ("ajaxStart"), v.type = v.type. toUpperCase (), v.hasContent =! Rt.test (v.type), f = v.url.replace (Ht, ""), v.hasContent? v.data && v.processData && 0 === (v.contentType || ""). indexOf ( "application / x-www-form-urlencoded") && (v.data = v.data.replace (Lt, "+")) :( o = v.url.slice (f.length), v.data && ( v.processData || "string" == typeof v.data) && (f + = (St.test (f)? "&": "?") + v.data, delete v.data) ,! 1 == = v.cache && (f = f.replace (Ot, "$ 1"), o = (St.test (f)? "&": "?") + "_ =" + kt +++ o), v .url = f + o), v.ifModified && (k.lastModified [f] && T.setRequestHeader ("If-Modified-Since", k.lastModified [f]), k.etag [f] && T.setRequestHeader ("If -None-Match ", k.etag [f])), (v.data && v.hasContent &&! 1! == v.contentType || t.contentType) && T.setRequestHeader ("Content-Type", v.contentType), T.setRequestHeader ("Aceptar", v.dataTypes [0] && v.accepts [v.dataTypes [0]]? v.accepts [v.dataTypes [0]] + ("*"! == v.dataTypes [0]? "," + $ t + "; q = 0.01": ""): v.accepts ["*"]), v.headers) T.setRequestHeader ( i, v.headers [i]); if (v.beforeSend && (! 1 === v.beforeSend.call (y, T, v) || h)) return T.abort (); if (u = " abortar ", b.add (v.complete), T.done (v.success), T.fail (v.error), c = _t (Wt, v, t, T)) {if (T.readyState = 1, g && m.trigger ("ajaxSend", [T, v]), h) devuelve T; v.async && 0 <v.timeout && (d = C.setTimeout (function () {T.abort ("timeout")}, v.timeout)); intente {h =! 1, c.send (a, l)} catch (e) {if (h) throw e; l (-1, e)}} else l (-1, " Sin transporte "); función l (e, t, n, r) {var i, o, a, s, u, l = t; h || (h =! 0, d && C.clearTimeout (d), c = nulo 0,p = r || "", T.readyState = 0 <e? 4: 0, i = 200 <= e && e <300 || 304 === e, n && (s = función (e, t, n) {var r, i, o, a, s = e.contenido, u = e.dataTypes; while ("*" === u [0]) u.shift (), nulo 0 === r && (r = e. mimeType || t.getResponseHeader ("Content-Type")); if (r) para (i in s) if (s [i] && s [i] .test (r)) {u.unshift (i); break } if (u [0] en n) o = u [0]; sino {para (i en n) {if (! u [0] || e.converters [i + "" + u [0]]) { o = i; break} a || (a = i)} o = o || a} if (o) return o! == u [0] && u.unshift (o), n [o]} (v, T, n)), s = función (e, t, n, r) {var i, o, a, s, u, l = {}, c = e.dataTypes.slice (); if (c [1 ]) para (a en e.converters) l [a.toLowerCase ()] = e.converters [a]; o = c.shift (); while (o) if (e.responseFields [o] && (n [ e.responseFields [o]] = t) ,! u && r && e.dataFilter && (t = e.dataFilter (t, e.dataType)), u = o, o = c.shift ()) if ("*" === o) o = u; si no ("*"! == u && u!== o) {if (! (a = l [u + "" + o] || l ["*" + o])) para (i en l) if ((s = i.split ("")) [1] === o && (a = l [u + "" + s [0]] || l ["*" + s [0]])) {! 0 === a? A = l [i] :! 0! == l [i] && (o = s [0], c.unshift (s [1])); break} if (! 0! == a) if (a && e ["throws"]) t = a (t); de lo contrario, intente {t = a (t)} catch (e) {return {state: "parsererror", error: a? ​​e: "No hay conversión de" + u + "a" + o}} } return {state: "success", data: t}} (v, s, T, i), i? (v.ifModified && ((u = T.getResponseHeader ("Last-Modified")) && (k.lastModified [f] = u), (u = T.getResponseHeader ("etag")) && (k.etag [f] = u)), 204 === e || "HEAD" === v.type? l = "no contenido": 304 === e? l = "notificado" :( l = s.state, o = s.data, i =! (a = s.error))) :( a = l,! e && l || (l = "error", e <0 && (e = 0))), T.status = e, T.statusText = (t || l) + "", i? x.resolveWith (y, [o, l, T]): x.rejectWith (y, [T, l, a]), T.statusCode (w) , w = void 0, g && m.trigger (i? "ajaxSuccess": "ajaxError", [T, v, i? o: a]), b.fireWith (y, [T, l]), g && (m. trigger ("ajaxComplete", [T, v]), - k.active || k.event.trigger ("ajaxStop")))} return T}, getJSON: function (e, t, n) {return k .get (e, t, n, "json")}, getScript: función (e, t) {return k.get (e, void 0, t, "script")}}), k.each ([" get "," post "], function (e, i) {k [i] = function (e, t, n, r) {return m (t) && (r = r || n, n = t, t = nulo 0), k.ajax (k.extend ({url: e, tipo: i, dataType: r, data: t, success: n}, k.isPlainObject (e) && e))}}), k. _evalUrl = function (e, t) {return k.ajax ({url: e, type: "GET", dataType: "script", cache:! 0, async:! 1, global:! 1, converters: {" script de texto ": function () {}}, dataFilter:function (e) {k.globalEval (e, t)}})}, k.fn.extend ({wrapAll: function (e) {var t; devuelve esto [0] && (m (e) && (e = e.call (this [0])), t = k (e, this [0] .ownerDocument) .eq (0) .clone (! 0), this [0] .parentNode && t.insertBefore (this [0]) , t.map (function () {var e = this; while (e.firstElementChild) e = e.firstElementChild; return e}). append (this)), this}, wrapInner: function (n) {return m ( n)? this.each (function (e) {k (this) .wrapInner (n.call (this, e))}): this.each (function () {var e = k (this), t = e .contents (); t.length? t.wrapAll (n): e.append (n)})}, wrap: function (t) {var n = m (t); devuelve this.each (function (e) {k (this) .wrapAll (n? t.call (this, e): t)})}, wrapper: function (e) {return this.parent (e) .not ("body"). each (function () {k (this) .replaceWith (this.childNodes)}), this}}), k.expr.pseudos.hidden = function (e) {return! k.expr.pseudos.visible (e)}, k .expr.pseudos.visible = function (e) {return !! (e.offsetWidth || e.offsetHeight || e.getClientRects (). length)}, k.ajaxSettings.xhr = function () {try {return new C.XMLHttpRequest} catch (e) {}}; var Ut = {0: 200,1223: 204}, Xt = k.ajaxSettings.xhr (); y.cors = !! Xt && "withCredentials" en Xt, y.ajax = Xt = !! Xt, k.ajaxTransport (función (i) {var o, a; if (y.cors || Xt &&! i.crossDomain) return {send: function (e, t) {var n, r = i.xhr (); if (r.open (i.type, i .url, i.async, i.username, i.password), i.xhrFields) para (n en i.xhrFields) r [n] = i.xhrFields [n]; for (n en i.mimeType && r.overrideMimeType && r. overrideMimeType (i.mimeType), i.crossDomain || e ["X-Requested-With"] || (e ["X-Requested-With"] = "XMLHttpRequest"), e) r.setRequestHeader (n, e [n]); o = function (e) {return function () {o && (o = a = r.onload = r.onerror = r.onabort = r.ontimeout = r.onreadystatechange = null, "abort" == = e? r.abort (): "error "=== e?" number "! = typeof r.status? t (0," error "): t (r.status, r.statusText): t (Ut [r.status] || r.status , r.statusText, "text"! == (r.responseType || "text") || "string"! = typeof r.responseText? {binario: r.response}: {text: r.responseText}, r .getAllResponseHeaders ())}}, r.onload = o (), a = r.onerror = r.ontimeout = o ("error"), void 0! == r.onabort? r.onabort = a: r .onreadystatechange = function () {4 === r.readyState && C.setTimeout (function () {o && a ()})}, o = o ("abort"); try {r.send (i.hasContent && i.data || null)} catch (e) {if (o) throw e}}, abort: function () {o && o ()}}}), k.ajaxPrefilter (function (e) {e.crossDomain && (e.contents.script = ! 1)}), k.ajaxSetup ({acepta: {script: "text / javascript, application / javascript, application / ecmascript, application / x-ecmascript"}, contenido: {script: / \ b (?:java | ecma) script \ b /}, convertidores: {"script de texto": función (e) {return k.globalEval (e), e}}}), k.ajaxPrefilter ("script", función (e) { nulo 0 === e.cache && (e.cache =! 1), e.crossDomain && (e.type = "GET")}), k.ajaxTransport ("script", función (n) {var r, i; if (n.crossDomain || n.scriptAttrs) return {send: function (e, t) {r = k ("<script>") .attr (n.scriptAttrs || {}). prop ({charset: n .scriptCharset, src: n.url}). on ("error de carga", i = function (e) {r.remove (), i = null, e && t ("error" === e.type? 404: 200 , e.type)}), E.head.appendChild (r [0])}, abortar: function () {i && i ()}}}); var Vt, Gt = [], Yt = / (=) \ ? (? = & | $) | \? \? /; k.ajaxSetup ({jsonp: "callback", jsonpCallback: function () {var e = Gt.pop () || k.expando + "_" + kt ++ ; devuelva esto [e] =! 0, e}}), k.ajaxPrefilter ("json jsonp", function (e, t, n) {var r, i,o, a =! 1! == e.jsonp && (Yt.test (e.url)? "url": "string" == typeof e.data && 0 === (e.contentType || ""). indexOf ( "application / x-www-form-urlencoded") && Yt.test (e.data) && "data"); if (a || "jsonp" === e.dataTypes [0]) return r = e.jsonpCallback = m (e.jsonpCallback)? e.jsonpCallback (): e.jsonpCallback, a? e [a] = e [a] .replace (Yt, "$ 1" + r) :! 1! == e.jsonp && ( e.url + = (St.test (e.url)? "&": "?") + e.jsonp + "=" + r), e.converters ["script json"] = function () {return o | | k.error (r + "no se llamó"), o [0]}, e.dataTypes [0] = "json", i = C [r], C [r] = función () {o = argumentos} , n.always (function () {void 0 === i? k (C) .removeProp (r): C [r] = i, e [r] && (e.jsonpCallback = t.jsonpCallback, Gt.push (r)), o && m (i) && i (o [0]), o = i = void 0}), "script"}), y.createHTMLDocument = ((Vt = E.implementation.createHTMLDocument (""). body) .innerHTML = "<form> </form> <form> </form>", 2 === Vt.childNodes .length), k.parseHTML = function (e, t, n) {return "string"! = typeof e? [] :( "boolean" == typeof t && (n = t, t =! 1), t | | (y.createHTMLDocument? ((r = (t = E.implementation.createHTMLDocument ("")). createElement ("base")). href = E.location.href, t.head.appendChild (r)): t = E), o =! n && [], (i = D.exec (e))? [t.createElement (i [1])] :( i = we ([e], t, o), o && o .length && k (o) .remove (), k.merge ([], i.childNodes))); var r, i, o}, k.fn.load = function (e, t, n) {var r, i, o, a = this, s = e.indexOf (""); return-1 <s && (r = mt (e.slice (s)), e = e.slice (0, s)), m ( t)? (n = t, t = nulo 0): t && "objeto" == tipo de t && (i = "POST"), 0 <a.length && k.ajax ({url: e, tipo: i || "GET", tipo de datos: "html", datos: t}). done (función (e) {o = argumentos, a.html (r? k ("<div > "). append (k.parseHTML (e)). find (r): e)}). always (n && function (e, t) {a.each (function () {n.apply (this, o || [e.responseText, t, e])})}), this}, k.each (["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function ( e, t) {k.fn [t] = función (e) {return this.on (t, e)}}), k.expr.pseudos.animated = function (t) {return k.grep (k. temporizadores, función (e) {return t === e.elem}). length}, k.offset = {setOffset: function (e, t, n) {var r, i, o, a, s, u, l = k.css (e, "posición"), c = k (e), f = {}; "estático" === l && (e.style.position = "relative"), s = c.offset ( ), o = k.css (e, "arriba"), u = k.css (e, "izquierda"), ("absoluto" === l || "fijo" === l) && -1 <(o + u) .indexOf ("auto")? (A = (r = c.position ()). Top, i = r.left) :( a = parseFloat (o) || 0, i = parseFloat (u) || 0), m (t) && (t = t.call (e, n, k.extend ({}, s))), null! = t.top && (f.top = t.top-s.top + a), null! = t.left && (f.left = t.left-s.left + i), "using" en t? t.using.call (e, f): c.css (f)}}, k.fn.extend ({offset: function (t) {if (argumentos.length) return void 0 === t? this: this.each (function (e) {k. offset.setOffset (this, t, e)}); var e, n, r = this [0]; return r? r.getClientRects (). length? (e = r.getBoundingClientRect (), n = r.ownerDocument .defaultView, {top: e.top + n.pageYOffset, izquierda: e.left + n.pageXOffset}): {top: 0, left: 0}: void 0}, position: function () {if (this [ 0]) {var e, t, n, r = this [0], i = {top: 0, left: 0}; if ("fixed" === k.css (r, "position")) t = r.getBoundingClientRect (); else {t = this.offset (), n = r.ownerDocument, e = r.offsetParent || n.documentElement; while (e && (e === n.body || e === n.documentElement) && "static" === k.css (e, "position")) e = e.parentNode; e && e! == r && 1 == = e.nodeType && ((i = k (e) .offset ()). top + = k.css (e, "borderTopWidth",! 0), i.left + = k.css (e, "borderLeftWidth",! 0 ))} return {top: t.top-i.top-k.css (r, "marginTop",! 0), left: t.left-i.left-k.css (r, "marginLeft" ,! 0)}}}, offsetParent: function () {return this.map (function () {var e = this.offsetParent; while (e && "static" === k.css (e, "position")) e = e.offsetParent; return e || ie})}}), k.each ({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (t, i) {var o = "pageYOffset" === i ; k.fn [t] = function (e) {return _ (this, function (e, t, n) {var r; if (x (e)? r = e: 9 === e.nodeType && (r = e.defaultView), nulo 0 === n) return r? r [i]: e [t]; r? r.scrollTo (o? r.pageXOffset: n, o? n: r.pageYOffset): e [t] = n}, t, e, argumentos.length)}}), k.each (["top", "left"], function (e , n) {k.cssHooks [n] = ze (y.pixelPosition, function (e, t) {if (t) return t = _e (e, n), $ e.test (t)? k (e) .position () [n] + "px": t})}), k.each ({Altura: "altura", Ancho: "ancho"}, función (a, s) {k.each ({relleno: "interno" + a, contenido: s, "": "externo" + a}, función (r, o) {k.fn [o] = función (e, t) {var n = argumentos.length && (r | | "boolean"! = typeof e), i = r || (! 0 === e ||! 0 === t? "margin": "border"); return _ (this, function (e, t , n) {var r; return x (e)? 0 === o.indexOf ("external")? e ["inner" + a]: e.document.documentElement ["client" + a]: 9 = == e.nodeType? (r = e.documentElement, Math.max (e.body ["scroll" + a], r ["scroll" + a], e.body ["offset" + a], r [ "compensar"+ a], r ["cliente" + a])): nulo 0 === n? k.css (e, t, i): k.style (e, t, n, i)}, s, n ? e: nulo 0, n)}})}), k.each ("blur focus focusin focusout redize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu" .split (""), function (e, n) {k.fn [n] = función (e, t) {return 0 <argumentos.length? this.on (n, null, e, t): this.trigger (n)}}), k.fn.extend ({hover: function (e, t) {return this.mouseenter (e) .mouseleave (t || e)}}), k.fn.extend ({bind: function (e, t, n) {return this.on (e, null, t, n)}, unbind: function (e, t) {return this.off (e, null, t)}, delegate: function (e, t, n, r) {return this.on (t, e, n, r)}, undelegate: function (e, t, n) {return 1 === argumentos.length? this.off (e, "**"): this.off (t, e || "**", n)}}), k.proxy = function (e, t) {var n, r, i; if ("string" == typeof t && (n = e [t],t = e, e = n), m (e)) return r = s.call (argumentos, 2), (i = function () {return e.apply (t || this, r.concat (s.call (argumentos)))}). guid = e.guid = e.guid || k.guid ++, i}, k.holdReady = function (e) {e? k.readyWait ++: k.ready (! 0)}, k.isArray = Array.isArray, k.parseJSON = JSON.parse, k.nodeName = A, k.isFunction = m, k.isWindow = x, k.camelCase = V, k.type = w, k.now = Date.now, k.isNumeric = function (e) {var t = k.type (e); return ("number" === t || "string" === t) &&! IsNaN (e-parseFloat ( e))}, "function" == typeof define && define.amd && define ("jquery", [], function () {return k}); var Qt = C.jQuery, Jt = C. $; return k.noConflict = function (e) {return C. $ === k && (C. $ = Jt), e && C.jQuery === k && (C.jQuery = Qt), k}, e || (C.jQuery = C. $ = k), k});guid || k.guid ++, i}, k.holdReady = function (e) {e? k.readyWait ++: k.ready (! 0)}, k.isArray = Array.isArray, k.parseJSON = JSON.parse, k.nodeName = A, k.isFunction = m, k.isWindow = x, k.camelCase = V, k.type = w, k.now = Date.now, k.isNumeric = function (e) {var t = k.type (e); return ("number" === t || "string" === t) &&! isNaN (e-parseFloat (e))}, "function" == typeof define && define.amd && define (" jquery ", [], function () {return k}); var Qt = C.jQuery, Jt = C. $; return k.noConflict = function (e) {return C. $ === k && (C. $ = Jt), e && C.jQuery === k && (C.jQuery = Qt), k}, e || (C.jQuery = C. $ = K), k});guid || k.guid ++, i}, k.holdReady = function (e) {e? k.readyWait ++: k.ready (! 0)}, k.isArray = Array.isArray, k.parseJSON = JSON.parse, k.nodeName = A, k.isFunction = m, k.isWindow = x, k.camelCase = V, k.type = w, k.now = Date.now, k.isNumeric = function (e) {var t = k.type (e); return ("number" === t || "string" === t) &&! isNaN (e-parseFloat (e))}, "function" == typeof define && define.amd && define (" jquery ", [], function () {return k}); var Qt = C.jQuery, Jt = C. $; return k.noConflict = function (e) {return C. $ === k && (C. $ = Jt), e && C.jQuery === k && (C.jQuery = Qt), k}, e || (C.jQuery = C. $ = K), k});=== t || "string" === t) &&! isNaN (e-parseFloat (e))}, "function" == typeof define && define.amd && define ("jquery", [], function () {return k }); var Qt = C.jQuery, Jt = C. $; return k.noConflict = function (e) {return C. $ === k && (C. $ = Jt), e && C.jQuery === k && ( C.jQuery = Qt), k}, e || (C.jQuery = C. $ = K), k});=== t || "string" === t) &&! isNaN (e-parseFloat (e))}, "function" == typeof define && define.amd && define ("jquery", [], function () {return k }); var Qt = C.jQuery, Jt = C. $; return k.noConflict = function (e) {return C. $ === k && (C. $ = Jt), e && C.jQuery === k && ( C.jQuery = Qt), k}, e || (C.jQuery = C. $ = K), k});