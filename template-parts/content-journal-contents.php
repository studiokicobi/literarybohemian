<?php
/**
 * Template part for displaying the Journal contents
 * *
 * @package The_Literary_Bohemian
 */
// Reset the query
wp_reset_query();
?>


<section class="journal-contents">
  <h1 class="journal-contents__heading">The Journal</h1>
  <ul class="issue-index">


  <?php

if (is_home()) {
  $offset = 7;
} else {
  $offset = 0;
}

  // The latest post from The Journal
      query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'offset'=> $offset,
          'showposts' => 10
      ) );

  while (have_posts()) : the_post();

  $post_id = $post->ID;

  echo '<li class="issue-index__item-wrapper">';
  echo '<a class="issue-index__link no-underline" href="' . get_permalink() . '" rel="bookmark">';

  // Get the post type
  $the_posttype = get_post_type_object(get_post_type($post));
  $posttype_name = esc_html($the_posttype->labels->singular_name);

  // Get the author name
  $name = get_field('name');

  // Check if this is a Poetry post type

  if ( get_post_type( get_the_ID() ) == 'poetry' ) {

    // Check if we have multiple poems

    // Get the ACF rows
    if ( have_rows( 'poems' ) ) :
      while ( have_rows( 'poems' ) ) : the_row();
      // check if content exists on these rows
      $poem_2 = the_row(1);
      $poem_3 = the_row(2);
      $poem_4 = the_row(3);
      $poem_5 = the_row(4);
      $poem_6 = the_row(5);
      $poem_7 = the_row(6);
      $poem_8 = the_row(7);
      $poem_9 = the_row(8);
      $poem_10 = the_row(9);
      $poem_11 = the_row(10);
      $poem_12 = the_row(11);

      if ($poem_2 || $poem_3 || $poem_4 || $poem_5 || $poem_6 || $poem_7 || $poem_8 || $poem_9 || $poem_10 || $poem_11 || $poem_12 != '') :
        // There are multiple poems – no name needed.
        echo '<h2 class="issue-index__link--title"><span class="issue-index__link--span">' . get_the_title() . '</span></h2>';
        else :
          // There's no second poem and we need to include the author name
          echo '<h2 class="issue-index__link--title"><span class="issue-index__link--span">' . get_the_title() . ' by ' . $name . '</span></h2>';
        endif;
      endwhile;
    endif;
  } // end get poetry post type

  else {
    // This is a Postcard Prose text
    echo '<h2 class="issue-index__link--title"><span class="issue-index__link--span">' . get_the_title() . ' by ' . $name . '</span></h2>';
  }

  // Print the excerpt
  echo '<p class="issue-index__link--excerpt"><span class="issue-index__link--span">' . get_the_excerpt() . '</span></p>';

  echo '</a>';
  echo '</li>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>

  </ul>
</section>

<div class="journal-more">
  <a href="/journal" class="button button-reverse">More from The Journal</a>
</div>
