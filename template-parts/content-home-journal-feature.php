<?php
/**
 * Template part for displaying the latest Journal post
 * *
 * @package The_Literary_Bohemian
 */

// Reset the query
wp_reset_query();
?>

  <?php
  // The latest post from The Journal
      query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 1
      ) );
  ?>

  <?php while (have_posts()) : the_post();

  // Get the category (or categories: this is futureproof)
  // ----------------------------------------------------------------------------
  $cats = array();
  foreach (get_the_category($post_id) as $c) {
    $cat = get_category($c);
    array_push($cats, $cat->name);
  }

  if (sizeOf($cats) > 0) {
    $post_categories = implode(', ', $cats);
  } else {
    $post_categories = 'Not Assigned';
  }

  // Get the custom post type
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {
    $journal_cpt = 'Poetry';
  } else {
    $journal_cpt = 'Postcard Prose';
  }

  // Print the custom post type and category
  // echo '<h4 class="card__category">' . $post_categories . '</h4>';
  echo '<h3 class="card__cpt">' . $journal_cpt . '</h3>';

  // Card body wrapper
  echo '<div class="card__body">';

  // The title
  // ----------------------------------------------------------------------------
  the_title( sprintf( '<h2 class="card__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );

  // If this is a Poetry post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {

    // Check if we have multiple poems
    // If false, print the author name

    $rows = get_field('poems' ); // get all the rows
    $second_row = $rows[1]; // get the second row
    $second_row_poem = $second_row['poem' ]; // check for content

    if ($second_row_poem == '') {
      echo '<h3 class="card__author">' . get_field('name') . '</h3>';
    }
  }

  // If this is a Postcard Prose post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {

    // The author's name
    echo '<h3 class="card__author">' . get_field('name') . '</h3>';

  }

  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p class="card__excerpt">' . get_the_excerpt() . '</p>';

  // Card body wrapper
  echo '</div>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>
