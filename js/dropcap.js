// Automatically wrap the first letter of designated paragraphs with a span

  $('#dropcap-wrapper p:first-of-type').html(function (i, html)
  {
    return html.replace(/^[^a-zA-Z]*([a-zA-Z])/g, '<span id="dropcap">$1</span>');
  });

/*
Copyright 2014 Adobe Systems Incorporated. Licensed under the Apache 2.0 License.
http://www.apache.org/licenses/LICENSE-2.0.html
*/

// responsive
// !function(){"use strict";function a(a){var b=parseFloat(a.fontSize),c="normal"===a.lineHeight?r*b:parseFloat(a.lineHeight);return{leading:c-b,lineHeight:c,fontSize:b}}function b(a){var b=a.createElement("div");return b.style.position="fixed",b.style.padding=q,b.style.opacity="0",b.style.fontSize=p,b.style.lineHeight="1",a.body.appendChild(b),b}function c(a){var b=a.ownerDocument.createElement("span");return b.textContent=n,a&&a.appendChild(b),b}function d(a){a.ownerDocument.body.removeChild(a)}function e(a,b,c,d){function e(a,b){var c=4*b,d=a.data[c],e=a.data[c+1],f=a.data[c+2];return 0===d||0===e||0===f}var f=-1,g=document.createElement("canvas");g.width=c,g.height=d,a.appendChild(g);var h=g.getContext("2d");h.font=p+" "+b,h.fillStyle="#ffffff",h.fillRect(0,0,h.canvas.width,h.canvas.height),h.fillStyle="#000000",h.textBaseline="top",h.fillText("E",0,0);for(var i=h.getImageData(Math.ceil(g.width/2),0,1,g.height),j=null,k=g.height-1;k>=0;k--)if(e(i,k)){j=k;break}for(var k=0;k<g.height;k++)if(e(i,k)){f=(j+1-k)/d;break}return f}function f(a,f){var g=s[f];if(g)return g;g={baselineRatio:void 0,capHeightRatio:void 0};var h=b(a);h.style.fontFamily=f;var i=c(h);i.style.fontSize=q;var j=c(h);g.baselineRatio=i.offsetTop/o;try{g.capHeightRatio=e(h,f,j.offsetWidth,o)}catch(a){throw new Error("[dropcap.js] Error computing font metrics: "+a.message)}finally{d(h)}return s[f]=g,g}function g(a){return a+"px"}function h(a){if(a.classList.contains(t))return!0}function i(a){var b="gjpqQ";return b.indexOf(a.textContent)!==-1}function j(a){a.dcapjs&&(a.style.cssFloat="",a.style.padding="",a.style.fontSize="",a.style.lineHeight="",a.style.marginTop="")}function k(b,c,d){if(d||(d=c),1==d&&1==c)return void j(b);var e=b.ownerDocument,k=b,l=k.parentNode,m=window.getComputedStyle(k),n=window.getComputedStyle(l),o=f(e,m.fontFamily),p=f(e,n.fontFamily),r=o.capHeightRatio,s=a(n),t=(p.baselineRatio-p.capHeightRatio)*s.fontSize,u=c*s.lineHeight-s.leading-t-(1-p.baselineRatio)*s.fontSize,v=u/r;k.dcapjs=!0,"rtl"==m.direction?k.style.cssFloat="right":k.style.cssFloat="left",k.style.padding=q,k.style.fontSize=g(v),k.style.lineHeight=q;var w=s.leading/2+t;if(w-=(c-d)*s.lineHeight,k.style.marginTop=g(w),c>d){var x=parseFloat(n.marginTop);l.style.marginTop=g(x+-1*w)}var y=0;i(k)?y=v*(1-o.baselineRatio):h(k)&&(y=v-u),k.style.height=g(u+y);var z=k.dcapjsStrut;z||(z=e.createElement("span"),z.style.display="inline-block",k.appendChild(z),k.dcapjsStrut=z),z.style.height=g(u)}function l(a){function b(a){return a in c.style}var c=window.document.body?window.document.body:document.createElement("div");if(b(a))return a;for(var d=["-webkit-","-moz-","-ms-","-o"],e=0;e<d.length;e++){var f=d[e]+a;if(b(f))return f}return null}var m,n="X",o=100,p=o+"px",q="0px",r=1.15,s={},t="dcjs-descender";m="undefined"!=typeof window?window:"undefined"!=typeof exports?exports:this,m.Dropcap={options:{runEvenIfInitialLetterExists:!0},layout:function(a,b,c){if(0==this.options.runEvenIfInitialLetterExists){var d=l("initial-letter");if(d)return}if(b<1||c&&c<1)throw new RangeError("Dropcap.layout expects the baseline position and height to be 1 or above");if(a instanceof HTMLElement)k(a,b,c);else{if(!(a instanceof NodeList))throw new TypeError("Dropcap.layout expects a single HTMLElement or a NodeList");var e=Array.prototype.forEach;e.call(a,function(a){k(a,b,c)})}}}}();

//original
!function(){"use strict";function a(a){var b=parseFloat(a.fontSize),c="normal"===a.lineHeight?r*b:parseFloat(a.lineHeight);return{leading:c-b,lineHeight:c,fontSize:b}}function b(a){var b=a.createElement("div");return b.style.position="fixed",b.style.padding=q,b.style.opacity="0",b.style.fontSize=p,b.style.lineHeight="1",a.body.appendChild(b),b}function c(a){var b=a.ownerDocument.createElement("span");return b.textContent=n,a&&a.appendChild(b),b}function d(a){a.ownerDocument.body.removeChild(a)}function e(a,b,c,d){function e(a,b){var c=4*b,d=a.data[c],e=a.data[c+1],f=a.data[c+2];return 0===d||0===e||0===f}var f=-1,g=document.createElement("canvas");g.width=c,g.height=d,a.appendChild(g);var h=g.getContext("2d");h.font=p+" "+b,h.fillStyle="#ffffff",h.fillRect(0,0,h.canvas.width,h.canvas.height),h.fillStyle="#000000",h.textBaseline="top",h.fillText("E",0,0);for(var i=h.getImageData(Math.ceil(g.width/2),0,1,g.height),j=null,k=g.height-1;k>=0;k--)if(e(i,k)){j=k;break}for(var k=0;k<g.height;k++)if(e(i,k)){f=(j+1-k)/d;break}return f}function f(a,f){var g=s[f];if(g)return g;g={baselineRatio:void 0,capHeightRatio:void 0};var h=b(a);h.style.fontFamily=f;var i=c(h);i.style.fontSize=q;var j=c(h);g.baselineRatio=i.offsetTop/o;try{g.capHeightRatio=e(h,f,j.offsetWidth,o)}catch(a){throw new Error("[dropcap.js] Error computing font metrics: "+a.message)}finally{d(h)}return s[f]=g,g}function g(a){return a+"px"}function h(a){if(a.classList.contains(t))return!0}function i(a){var b="gjpqQ";return b.indexOf(a.textContent)!==-1}function j(a){a.dcapjs&&(a.style.cssFloat="",a.style.padding="",a.style.fontSize="",a.style.lineHeight="",a.style.marginTop="")}function k(b,c,d){if(d||(d=c),1==d&&1==c)return void j(b);var e=b.ownerDocument,k=b,l=k.parentNode,m=window.getComputedStyle(k),n=window.getComputedStyle(l),o=f(e,m.fontFamily),p=f(e,n.fontFamily),r=o.capHeightRatio,s=a(n),t=(p.baselineRatio-p.capHeightRatio)*s.fontSize,u=c*s.lineHeight-s.leading-t-(1-p.baselineRatio)*s.fontSize,v=u/r;k.dcapjs=!0,"rtl"==m.direction?k.style.cssFloat="right":k.style.cssFloat="left",k.style.padding=q,k.style.fontSize=g(v),k.style.lineHeight=q;var w=s.leading/2+t;if(w-=(c-d)*s.lineHeight,k.style.marginTop=g(w),c>d){var x=parseFloat(n.marginTop);l.style.marginTop=g(x+-1*w)}var y=0;i(k)?y=v*(1-o.baselineRatio):h(k)&&(y=v-u),k.style.height=g(u+y);var z=k.dcapjsStrut;z||(z=e.createElement("span"),z.style.display="inline-block",k.appendChild(z),k.dcapjsStrut=z),z.style.height=g(u)}function l(a){function b(a){return a in c.style}var c=window.document.body?window.document.body:document.createElement("div");if(b(a))return a;for(var d=["-webkit-","-moz-","-ms-","-o"],e=0;e<d.length;e++){var f=d[e]+a;if(b(f))return f}return null}var m,n="X",o=100,p=o+"px",q="0px",r=1.15,s={},t="dcjs-descender";m="undefined"!=typeof window?window:"undefined"!=typeof exports?exports:this,m.Dropcap={options:{runEvenIfInitialLetterExists:!0},layout:function(a,b,c){if(0==this.options.runEvenIfInitialLetterExists){var d=l("initial-letter");if(d)return}if(b<1||c&&c<1)throw new RangeError("Dropcap.layout expects the baseline position and height to be 1 or above");if(a instanceof HTMLElement)k(a,b,c);else{if(!(a instanceof NodeList))throw new TypeError("Dropcap.layout expects a single HTMLElement or a NodeList");var e=Array.prototype.forEach;e.call(a,function(a){k(a,b,c)})}}}}();


// uses dropcap as a polyfill:
// https://github.com/adobe-webplatform/dropcap.js
function switchsize(state) {
if (state.matches) {
window.Dropcap.layout(dropcap, 2);
} else {
window.Dropcap.layout(dropcap, 3); }
}

var dropcap = document.getElementById("dropcap");
window.Dropcap.layout(dropcap, 3);

var narrow = window.matchMedia("screen and (max-width: 600px)");
narrow.addListener(switchsize);
switchsize(narrow);

// Reload window on resize

// jQuery(function($){
//   var windowWidth = $(window).width();
//   var windowHeight = $(window).height();
//
//   $(window).resize(function() {
//     if(windowWidth != $(window).width() || windowHeight != $(window).height()) {
//       location.reload(true);
//       return;
//     }
//   });
// });
