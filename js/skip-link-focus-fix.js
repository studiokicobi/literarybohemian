
// Inclusive Cards, see SCSS file for details
// --------------------------------------------------------------
const cards = document.querySelectorAll('.card');
Array.prototype.forEach.call(cards, card => {
   let down, up, link = card.querySelector('h2 a');
   card.style.cursor = 'pointer';
   card.onmousedown = () => down = +new Date();
   card.onmouseup = () => {
       up = +new Date();
       if ((up - down) < 200) {
           link.click();
       }
   }
});




/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();
