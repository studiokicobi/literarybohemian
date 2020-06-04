<?php
/**
 * Template part for displaying the latest Journal posts (small cards)
 * *
 * @package The_Literary_Bohemian
 */

// Reset the query
wp_reset_query();
?>

<div class="map-border full-bleed">
  <h1 class="map-border__heading">More from The Journal</h1>
</div>

<section id="features-small" class="cards">
  <ul>

<?

  // The latest post from The Journal

    if (is_home()) {
        query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 6,
          'offset' => 1
      ) );

    } else {
        query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes',),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 6,
          'offset' => 0
      ) );
    }


  while (have_posts()) : the_post();

  echo '<li class="card">';

  // Get the category (or categories: this is futureproof)
  // ----------------------------------------------------------------------------
  $post_id = $post->ID;

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
    $cpt_class = 'card__meta-icon card__meta-icon--poetry';
  } elseif ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
    $journal_cpt = 'Postcard Prose';
    $cpt_class = 'card__meta-icon card__meta-icon--postcard';
  } elseif ( get_post_type( get_the_ID() ) == 'travel_notes' ) {
    $journal_cpt = 'Travel Notes';
    $cpt_class = 'card__meta-icon card__meta-icon--travel';
  }

  // Get the author name
  $name = get_field('name');

  // Print the custom post type and category
  echo '<strong class="card__meta ' . $cpt_class . '">' . $journal_cpt . '</strong>';

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

    // Get the ACF rows
    if ( have_rows( 'poems' ) ) :
      while ( have_rows( 'poems' ) ) : the_row();
      if ( get_field( 'multiple_poems' ) == 1 ) :
        // We have multiple poems; do nothing.
        else :
          // This is a single poem; get the author name.
          echo '<h3 class="card__author">By ' . get_field( 'name' ) . '</h3>';
        endif;
      endwhile;
    endif;
  } // end get poetry post type

  else {
    // This is a Postcard Prose text
    echo '<h3 class="card__author">By ' . $name . '</h3>';
  }

  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p class="card__excerpt">' . get_the_excerpt() . '</p>';

  // Card body bg and wrapper
  echo '</div>';
  ?>

  <div class="card__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/random/<?php echo rand(1,9)?>.jpg');"></div>

  <?

  echo '</li>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>

  </ul>

  <p class="read-more"><em>Read more</em> <a href="<?php echo site_url( '/poetry/', 'https' ); ?>" class="">Poetry</a> <em>or</em> <a href="<?php echo site_url( '/postcard-prose/', 'https' ); ?>" class="">Postcard Prose</a></p>

</section>
