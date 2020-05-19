// var dropcap = document.getElementById("dropcap");
// window.Dropcap.layout(dropcap, 3, 2);
//

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
