// Newsletter form
// --------------------------------------------------------------
jQuery(document).ready(function( $ ) {

    /* Hide all fields */

 function hideAll() {
     $('fieldset').addClass('hidden');
    }

   /* Handle hiding all fields and showing the next field */

    function setStep(nextStepID) {
     if (validation == true) {
       hideAll();
       $('fieldset input').removeClass('error');
       $('fieldset#' + nextStepID).removeClass('hidden');
     }
    }

   /* Logic for the button including validation */

    $( "#next-button" ).click(function() {
        var currentStep = $("fieldset").not(".hidden").attr('id');
        var nextStep = $('#' + currentStep).next("fieldset").attr('id');
        validation = true;

        switch (currentStep) {

            case "step_1":
         $('fieldset#' + currentStep).find('input[type=email]').each(function(){

           var email = $(this).val();

           emailReg = /.{1,}@[^.]{1,}/;

           if(!emailReg.test(email) || email == '') {
             validation = false;
             $(this).addClass('error');
           }
         });
       break;

            case "step_2":

                $('fieldset#' + currentStep).find('input[type=text]').each(function(){

                 if ($(this).val() !== '') {
                   $(this).removeClass('error');
                   $('#next-button').addClass('hidden');
                 } else {
                   $(this).addClass('error');
                   validation = false;
                 }
                });

            break;

            case "step_3":

                if ($('fieldset#' + currentStep + ' input[type]').is(":checked")) {
                    $('.input-group').removeClass('error');
                 $('input[type=submit]').removeClass('hidden');
             } else {
               $('.input-group').addClass("error");
               validation = false;
             }

            break;
        }

        setStep(nextStep);

    });

   /* Submit button logic handler */

    $( "input[type=submit]" ).click(function(e) {

 var currentStep = $("fieldset").not(".hidden").attr('id');

      /* Stop the submit action */

      e.preventDefault();

      /* Validate checkboxes */

      $('fieldset#' + currentStep).find('input[type=checkbox]').each(function(){

       if ($(this).is(":checked")) {
           /* Submit the form */
           $('fieldset#' + currentStep).removeClass("error");
                $("#mc-embedded-subscribe-form").submit();
                return false; /* Stops looping through checkboxes */
       } else {
         $('fieldset#' + currentStep).addClass("error");
       }
     });

    });

});


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
