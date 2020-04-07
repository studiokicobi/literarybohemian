<?php
/**
 * Template part for displaying the Journal contents
 * *
 * @package The_Literary_Bohemian
 */
// Reset the query
wp_reset_query();
?>

<ol>

  <?php
  // The latest post from The Journal
      query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'offset'=> 1,
          'showposts' => 10
      ) );

  while (have_posts()) : the_post();

  // Get the post type
  $the_posttype = get_post_type_object(get_post_type($post));
  $posttype_name = esc_html($the_posttype->labels->singular_name);

  // Get the author name
  $author_name = get_field('name');

  // Check if this is a Poetry post type
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {

    // Check if we have multiple poems
    // If false, print the author name

    $rows = get_field('poems' ); // get all the rows
    $second_row = $rows[1]; // get the second row
    $second_row_poem = $second_row['poem' ]; // check for content

    if ($second_row_poem == '') {
      // There's no second poem and we need to include the author name
      the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),  ' by ' . $author_name . '</a>' . $posttype_name . '</li>' );
    } else {
      // There are multiple poems – no name needed.
      // the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' );
      the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' . $posttype_name . '</li>' );
    }
  } else {
    // This is a Postcard Prose text
    // the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),  ' by ' . $author_name . '</a></li>' );
    the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),  ' by ' . $author_name . '</a>' . $posttype_name . '</li>' );
  }

  // Print the excerpt
  // echo '<p>' . get_the_excerpt() . '</p>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>

</ol>
