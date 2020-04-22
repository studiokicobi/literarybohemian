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

  // Get the post ID
  $post_id = $post->ID;

  $cats = array();
  foreach (get_the_category($post_id) as $c) {
    $cat = get_category($c);
    array_push($cats, $cat->name);
  }

  if (sizeOf($cats) > 0) {
    $post_categories = implode(', ', $cats);
  } else {
    $post_categories = '—'; // If we ever see this, we know there's no assigned category
  }

  // Get the custom post type
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {
    $journal_cpt = 'Poetry';
  } else {
    $journal_cpt = 'Postcard Prose';
  }

  // Print the custom post type and category
  // echo '<strong class="card__meta">' . $post_categories . ' · ' . $journal_cpt . '</strong>';
  echo '<strong class="card__meta">' . $journal_cpt . '</strong>';

  // Card body wrapper
  echo '<div class="card__body">';

  // The title
  // ----------------------------------------------------------------------------
  the_title( sprintf( '<h2 class="card__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );

  // If this is a Poetry post type
  // ----------------------------------------------------------------------------
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
        else :
          // There's no second poem and we need to include the author name
          echo '<h3 class="card__author">' . get_field('name') . '</h3>';
        endif;
      endwhile;
    endif;
  } // end get poetry post type

  // If this is a Postcard Prose post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {

  // The author's name
  echo '<h3 class="card__author">By ' . get_field('name') . '</h3>';

  }

  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p class="card__excerpt">' . get_the_excerpt() . '</p>';

  // Card body bg and wrapper
  echo '</div>';
  ?>

  <div class="card__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/random/<?php echo rand(1,9)?>.jpg');"></div>

  <?
  endwhile;

  // Reset the query
  wp_reset_query();

  ?>
