<?php

/**
 * Template part for displaying the feature, i.e. the latest Journal post
 *
 * @package The_Literary_Bohemian
 */
?>

<?php
// The latest post from The Journal
query_posts(array(
  'post_type' => array('poetry', 'postcard_prose', 'travel_notes'),
  'post_status' => 'publish',
  'orderby' => 'publish_date',
  'order' => 'DESC',
  'showposts' => 1
));
?>

<?php while (have_posts()) : the_post();

  // Get the category
  // ----------------------------------------------------------------------------

  // Get the post ID
  $post_id = $post->ID;

  $cats = array();
  foreach (get_the_category($post_id) as $c) {
    $cat = get_category($c);
    array_push($cats, $cat->name);
  }

  if (sizeof($cats) > 0) {
    $post_categories = implode(', ', $cats);
  } else {
    $post_categories = '—'; // If we ever see this, we know there's no assigned category
  }

  // Get the custom post type
  if (get_post_type(get_the_ID()) == 'poetry') {
    $journal_cpt = 'Poetry';
    $cpt_class = 'icon-poetry-home';
  } elseif (get_post_type(get_the_ID()) == 'postcard_prose') {
    $journal_cpt = 'Postcard Prose';
    $cpt_class = 'icon-postcard-home';
  } else {
    $journal_cpt = 'Travel Notes';
    $cpt_class = 'icon-travel-home';
  }

  // Get the author name
  $name = get_field('name');

  echo '<div class="home-feature">';

  // The title
  // --------------------
  the_title('<h2 class="home-feature__title">', '</h2>');

  // Byline
  // --------------------

  // If this is a Poetry post type
  if (get_post_type(get_the_ID()) == 'poetry') {

    // Check if we have multiple poems

    // Get the ACF rows
    if (have_rows('poems')) :
      while (have_rows('poems')) : the_row();

        if (get_field('multiple_poems') == 1) :
        // do nothing
        else :
          // echo the author name
          echo '<p class="home-feature__byline">By ' . $name . '</p>';
        endif;
      endwhile;
    endif;
  } else {
    // end get poetry post type
    echo '<p class="home-feature__byline">By ' . $name . '</p>';
  }

  // The metadata section
  // --------------------
  echo '<ul class="meta home-feature__meta">';
  echo '<li class="meta__item meta__item--border icon icon-broadcast-home">' . get_the_date() . '</li>';
  echo '<li class="meta__item ' . $cpt_class . '">' . $journal_cpt . '</li>';
  echo '</ul>';

  // The excerpt
  // --------------------
  echo '<div class="home-feature__excerpt truncate">';

  if (get_post_type(get_the_ID()) == 'poetry') {

    // Drill down through the ACF repeaters and get the first poem content
    $rows = get_field('poems');
    $first_row = $rows[0];
    $first_row_poem = $first_row['poem'];
    $first_row_poem_content = $first_row_poem['poem_content'];

    // Print the content of the first poem
    echo $first_row_poem_content;
  } else {
    echo get_field('text');
  }

  echo '</div>';

  // Read more
  echo '<a href="' . get_the_permalink() . '" class="home-feature__more button" title="Continue reading">Read more</a>';

  // Close feature
  echo '</div>';

endwhile;

// Reset the query
wp_reset_query();

?>
