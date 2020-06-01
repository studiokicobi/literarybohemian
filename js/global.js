// @codekit-prepend quiet "inclusive-cards-min.js";
// @codekit-append quiet "skip-link-focus-fix-min.js";
// @codekit-append quiet "dropcap-span.js";
// @codekit-append quiet "jQuery.succinct-min.js";

// Call jQuery.succinct.js
$(function(){
    $('.truncate').succinct({
        size: 700
    });
});
