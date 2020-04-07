<?php
/**
 * Template part for displaying the latest Logbook post
 * *
 * @package The_Literary_Bohemian
 */

 // Reset the query
 wp_reset_query();
 ?>

  <?php
  // The latest post from The Journal
      query_posts(array(
          'post_type' => array('logbook', 'book_reviews',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 1
      ) );
  ?>

  <?php while (have_posts()) : the_post();

  // Get the category (or categories: make this futureproof)
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

  // The category
  echo '<h4>' . $post_categories . '</h4>';


  // The title
  // ----------------------------------------------------------------------------
  the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );


  // The author's name
  echo '<h3>By ' . the_field('name') . '</h3>';


  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p>' . get_the_excerpt() . '</p>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>
