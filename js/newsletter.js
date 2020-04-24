// Function for the newsletter feature

$( function() {
  $( '.mc-field-group' ).hover(function() {
    $( '.newsletter' ).addClass( 'newsletter__focus' );
  },

  function() {
    // on mouseout, reset the background colour
    $('.newsletter').addClass('newsletter__blur');
  });
});


$( "p" ).focusin(function() {
  $( this ).find( "span" ).css( "display", "inline" ).fadeOut( 1000 );
});
