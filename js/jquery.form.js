(function(e){"use strict";function t(t){var n=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(n))}function n(t){var n=t.target,r=e(n);if(!r.is("[type=submit],[type=image]")){var i=r.closest("[type=submit]");if(0===i.length)return;n=i[0]}var s=this;if(s.clk=n,"image"==n.type)if(void 0!==t.offsetX)s.clk_x=t.offsetX,s.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=r.offset();s.clk_x=t.pageX-o.left,s.clk_y=t.pageY-o.top}else s.clk_x=t.pageX-n.offsetLeft,s.clk_y=t.pageY-n.offsetTop;setTimeout(function(){s.clk=s.clk_x=s.clk_y=null},100)}function r(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var i={};i.fileapi=void 0!==e("<input type='file'/>").get(0).files,i.formdata=void 0!==window.FormData;var s=!!e.fn.prop;e.fn.attr2=function(){if(!s)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function n(n){var r,i,s=e.param(n,t.traditional).split("&"),o=s.length,u=[];for(r=0;o>r;r++)s[r]=s[r].replace(/\+/g," "),i=s[r].split("="),u.push([decodeURIComponent(i[0]),decodeURIComponent(i[1])]);return u}function o(r){for(var i=new FormData,s=0;r.length>s;s++)i.append(r[s].name,r[s].value);if(t.extraData){var o=n(t.extraData);for(s=0;o.length>s;s++)o[s]&&i.append(o[s][0],o[s][1])}t.data=null;var u=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:f||"POST"});t.uploadProgress&&(u.xhr=function(){var n=e.ajaxSettings.xhr();return n.upload&&n.upload.addEventListener("progress",function(e){var n=0,r=e.loaded||e.position,i=e.total;e.lengthComputable&&(n=Math.ceil(100*(r/i))),t.uploadProgress(e,r,i,n)},!1),n}),u.data=null;var a=u.beforeSend;return u.beforeSend=function(e,n){n.data=t.formData?t.formData:i,a&&a.call(this,e,n)},e.ajax(u)}function u(n){function i(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(n){r("cannot get iframe.contentWindow document: "+n)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(n){r("cannot get iframe.contentDocument: "+n),t=e.document}return t}function o(){function t(){try{var e=i(y).readyState;r("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(n){r("Server abort: ",n," (",n.name,")"),u(k),x&&clearTimeout(x),x=void 0}}var n=h.attr2("target"),s=h.attr2("action");T.setAttribute("target",v),(!f||/post/i.test(f))&&T.setAttribute("method","POST"),s!=p.url&&T.setAttribute("action",p.url),p.skipEncodingOverride||f&&!/post/i.test(f)||h.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),p.timeout&&(x=setTimeout(function(){S=!0,u(C)},p.timeout));var o=[];try{if(p.extraData)for(var l in p.extraData)p.extraData.hasOwnProperty(l)&&(e.isPlainObject(p.extraData[l])&&p.extraData[l].hasOwnProperty("name")&&p.extraData[l].hasOwnProperty("value")?o.push(e('<input type="hidden" name="'+p.extraData[l].name+'">').val(p.extraData[l].value).appendTo(T)[0]):o.push(e('<input type="hidden" name="'+l+'">').val(p.extraData[l]).appendTo(T)[0]));p.iframeTarget||g.appendTo("body"),y.attachEvent?y.attachEvent("onload",u):y.addEventListener("load",u,!1),setTimeout(t,15);try{T.submit()}catch(c){var d=document.createElement("form").submit;d.apply(T)}}finally{T.setAttribute("action",s),n?T.setAttribute("target",n):h.removeAttr("target"),e(o).remove()}}function u(t){if(!b.aborted&&!_){if(M=i(y),M||(r("cannot access response document"),t=k),t===C&&b)return b.abort("timeout"),N.reject(b,"timeout"),void 0;if(t==k&&b)return b.abort("server abort"),N.reject(b,"error","server abort"),void 0;if(M&&M.location.href!=p.iframeSrc||S){y.detachEvent?y.detachEvent("onload",u):y.removeEventListener("load",u,!1);var n,s="success";try{if(S)throw"timeout";var o="xml"==p.dataType||M.XMLDocument||e.isXMLDoc(M);if(r("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--D)return r("requeing onLoad callback, DOM not available"),setTimeout(u,250),void 0;var f=M.body?M.body:M.documentElement;b.responseText=f?f.innerHTML:null,b.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(p.dataType="xml"),b.getResponseHeader=function(e){var t={"content-type":p.dataType};return t[e.toLowerCase()]},f&&(b.status=Number(f.getAttribute("status"))||b.status,b.statusText=f.getAttribute("statusText")||b.statusText);var l=(p.dataType||"").toLowerCase(),c=/(json|script|text)/.test(l);if(c||p.textarea){var h=M.getElementsByTagName("textarea")[0];if(h)b.responseText=h.value,b.status=Number(h.getAttribute("status"))||b.status,b.statusText=h.getAttribute("statusText")||b.statusText;else if(c){var v=M.getElementsByTagName("pre")[0],m=M.getElementsByTagName("body")[0];v?b.responseText=v.textContent?v.textContent:v.innerText:m&&(b.responseText=m.textContent?m.textContent:m.innerText)}}else"xml"==l&&!b.responseXML&&b.responseText&&(b.responseXML=P(b.responseText));try{O=B(b,l,p)}catch(w){s="parsererror",b.error=n=w||s}}catch(w){r("error caught: ",w),s="error",b.error=n=w||s}b.aborted&&(r("upload aborted"),s=null),b.status&&(s=b.status>=200&&300>b.status||304===b.status?"success":"error"),"success"===s?(p.success&&p.success.call(p.context,O,"success",b),N.resolve(b.responseText,"success",b),d&&e.event.trigger("ajaxSuccess",[b,p])):s&&(void 0===n&&(n=b.statusText),p.error&&p.error.call(p.context,b,s,n),N.reject(b,"error",n),d&&e.event.trigger("ajaxError",[b,p,n])),d&&e.event.trigger("ajaxComplete",[b,p]),d&&!--e.active&&e.event.trigger("ajaxStop"),p.complete&&p.complete.call(p.context,b,s),_=!0,p.timeout&&clearTimeout(x),setTimeout(function(){p.iframeTarget?g.attr("src",p.iframeSrc):g.remove(),b.responseXML=null},100)}}}var l,c,p,d,v,g,y,b,w,E,S,x,T=h[0],N=e.Deferred();if(N.abort=function(e){b.abort(e)},n)for(c=0;m.length>c;c++)l=e(m[c]),s?l.prop("disabled",!1):l.removeAttr("disabled");if(p=e.extend(!0,{},e.ajaxSettings,t),p.context=p.context||p,v="jqFormIO"+(new Date).getTime(),p.iframeTarget?(g=e(p.iframeTarget),E=g.attr2("name"),E?v=E:g.attr2("name",v)):(g=e('<iframe name="'+v+'" src="'+p.iframeSrc+'" />'),g.css({position:"absolute",top:"-1000px",left:"-1000px"})),y=g[0],b={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var n="timeout"===t?"timeout":"aborted";r("aborting upload... "+n),this.aborted=1;try{y.contentWindow.document.execCommand&&y.contentWindow.document.execCommand("Stop")}catch(i){}g.attr("src",p.iframeSrc),b.error=n,p.error&&p.error.call(p.context,b,n,t),d&&e.event.trigger("ajaxError",[b,p,n]),p.complete&&p.complete.call(p.context,b,n)}},d=p.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[b,p]),p.beforeSend&&p.beforeSend.call(p.context,b,p)===!1)return p.global&&e.active--,N.reject(),N;if(b.aborted)return N.reject(),N;w=T.clk,w&&(E=w.name,E&&!w.disabled&&(p.extraData=p.extraData||{},p.extraData[E]=w.value,"image"==w.type&&(p.extraData[E+".x"]=T.clk_x,p.extraData[E+".y"]=T.clk_y)));var C=1,k=2,L=e("meta[name=csrf-token]").attr("content"),A=e("meta[name=csrf-param]").attr("content");A&&L&&(p.extraData=p.extraData||{},p.extraData[A]=L),p.forceSync?o():setTimeout(o,10);var O,M,_,D=50,P=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},H=e.parseJSON||function(e){return window.eval("("+e+")")},B=function(t,n,r){var i=t.getResponseHeader("content-type")||"",s="xml"===n||!n&&i.indexOf("xml")>=0,o=s?t.responseXML:t.responseText;return s&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),r&&r.dataFilter&&(o=r.dataFilter(o,n)),"string"==typeof o&&("json"===n||!n&&i.indexOf("json")>=0?o=H(o):("script"===n||!n&&i.indexOf("javascript")>=0)&&e.globalEval(o)),o};return N}if(!this.length)return r("ajaxSubmit: skipping submit process - no element selected"),this;var f,l,c,h=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),f=t.type||this.attr2("method"),l=t.url||this.attr2("action"),c="string"==typeof l?e.trim(l):"",c=c||window.location.href||"",c&&(c=(c.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:c,success:e.ajaxSettings.success,type:f||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var p={};if(this.trigger("form-pre-serialize",[this,t,p]),p.veto)return r("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return r("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var v,m=[],g=this.formToArray(t.semantic,m);if(t.data&&(t.extraData=t.data,v=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(g,this,t)===!1)return r("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[g,this,t,p]),p.veto)return r("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var y=e.param(g,d);v&&(y=y?y+"&"+v:v),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+y,t.data=null):t.data=y;var b=[];if(t.resetForm&&b.push(function(){h.resetForm()}),t.clearForm&&b.push(function(){h.clearForm(t.includeHidden)}),!t.dataType&&t.target){var w=t.success||function(){};b.push(function(n){var r=t.replaceTarget?"replaceWith":"html";e(t.target)[r](n).each(w,arguments)})}else t.success&&b.push(t.success);if(t.success=function(e,n,r){for(var i=t.context||this,s=0,o=b.length;o>s;s++)b[s].apply(i,[e,n,r||h,h])},t.error){var E=t.error;t.error=function(e,n,r){var i=t.context||this;E.apply(i,[e,n,r,h])}}if(t.complete){var S=t.complete;t.complete=function(e,n){var r=t.context||this;S.apply(r,[e,n,h])}}var x=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),T=x.length>0,N="multipart/form-data",C=h.attr("enctype")==N||h.attr("encoding")==N,k=i.fileapi&&i.formdata;r("fileAPI :"+k);var L,A=(T||C)&&!k;t.iframe!==!1&&(t.iframe||A)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){L=u(g)}):L=u(g):L=(T||C)&&k?o(g):e.ajax(t),h.removeData("jqxhr").data("jqxhr",L);for(var O=0;m.length>O;O++)m[O]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(i){if(i=i||{},i.delegation=i.delegation&&e.isFunction(e.fn.on),!i.delegation&&0===this.length){var s={s:this.selector,c:this.context};return!e.isReady&&s.s?(r("DOM not ready, queuing ajaxForm"),e(function(){e(s.s,s.c).ajaxForm(i)}),this):(r("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return i.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,n).on("submit.form-plugin",this.selector,i,t).on("click.form-plugin",this.selector,i,n),this):this.ajaxFormUnbind().bind("submit.form-plugin",i,t).bind("click.form-plugin",i,n)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,n){var r=[];if(0===this.length)return r;var s=this[0],o=t?s.getElementsByTagName("*"):s.elements;if(!o)return r;var u,a,f,l,c,h,p;for(u=0,h=o.length;h>u;u++)if(c=o[u],f=c.name,f&&!c.disabled)if(t&&s.clk&&"image"==c.type)s.clk==c&&(r.push({name:f,value:e(c).val(),type:c.type}),r.push({name:f+".x",value:s.clk_x},{name:f+".y",value:s.clk_y}));else if(l=e.fieldValue(c,!0),l&&l.constructor==Array)for(n&&n.push(c),a=0,p=l.length;p>a;a++)r.push({name:f,value:l[a]});else if(i.fileapi&&"file"==c.type){n&&n.push(c);var d=c.files;if(d.length)for(a=0;d.length>a;a++)r.push({name:f,value:d[a],type:c.type});else r.push({name:f,value:"",type:c.type})}else null!==l&&l!==void 0&&(n&&n.push(c),r.push({name:f,value:l,type:c.type,required:c.required}));if(!t&&s.clk){var v=e(s.clk),m=v[0];f=m.name,f&&!m.disabled&&"image"==m.type&&(r.push({name:f,value:v.val()}),r.push({name:f+".x",value:s.clk_x},{name:f+".y",value:s.clk_y}))}return r},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var n=[];return this.each(function(){var r=this.name;if(r){var i=e.fieldValue(this,t);if(i&&i.constructor==Array)for(var s=0,o=i.length;o>s;s++)n.push({name:r,value:i[s]});else null!==i&&i!==void 0&&n.push({name:this.name,value:i})}}),e.param(n)},e.fn.fieldValue=function(t){for(var n=[],r=0,i=this.length;i>r;r++){var s=this[r],o=e.fieldValue(s,t);null===o||void 0===o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(n,o):n.push(o))}return n},e.fieldValue=function(t,n){var r=t.name,i=t.type,s=t.tagName.toLowerCase();if(void 0===n&&(n=!0),n&&(!r||t.disabled||"reset"==i||"button"==i||("checkbox"==i||"radio"==i)&&!t.checked||("submit"==i||"image"==i)&&t.form&&t.form.clk!=t||"select"==s&&-1==t.selectedIndex))return null;if("select"==s){var o=t.selectedIndex;if(0>o)return null;for(var u=[],a=t.options,f="select-one"==i,l=f?o+1:a.length,c=f?o:0;l>c;c++){var h=a[c];if(h.selected){var p=h.value;if(p||(p=h.attributes&&h.attributes.value&&!h.attributes.value.specified?h.text:h.value),f)return p;u.push(p)}}return u}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var n=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var r=this.type,i=this.tagName.toLowerCase();n.test(r)||"textarea"==i?this.value="":"checkbox"==r||"radio"==r?this.checked=!1:"select"==i?this.selectedIndex=-1:"file"==r?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(r)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var n=this.type;if("checkbox"==n||"radio"==n)this.checked=t;else if("option"==this.tagName.toLowerCase()){var r=e(this).parent("select");t&&r[0]&&"select-one"==r[0].type&&r.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1})("undefined"!=typeof jQuery?jQuery:window.Zepto)