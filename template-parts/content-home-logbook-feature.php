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
  echo '<strong class="card__meta">' . $post_categories . '</strong>';

  // Card body wrapper
  echo '<div class="card__body">';

  // The title
  // ----------------------------------------------------------------------------
  the_title( sprintf( '<h2 class="card__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );

  // If this is a Book Review post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'book_reviews' ) {
    // The author's name
    echo '<h3 class="card__author">By ' . get_field('author_of_the_book_review') . '</h3>';
  }

  if ( get_post_type( get_the_ID() ) == 'logbook' ) {
    // The author's name
    echo '<h3 class="card__author">By ' . get_author() . '</h3>';
  }



  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p>' . get_the_excerpt() . '</p>';

  // Card body bg and wrapper
  echo '</div>';
  ?>

  <div class="card__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/random/<?php echo rand(1,9)?>.jpg');"></div>

  <?

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>
