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

    <?php

    // The latest post from The Journal

    if (is_home()) {
      query_posts(array(
        'post_type' => array('poetry', 'postcard_prose', 'travel_notes', 'visual_poetry'),
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
        'showposts' => 6,
        'offset' => 7
      ));
    } else {
      query_posts(array(
        'post_type' => array('poetry', 'postcard_prose', 'travel_notes', 'visual_poetry'),
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
        'showposts' => 6,
        'offset' => 0
      ));
    }

    while (have_posts()) : the_post();

      echo '<li class="card">';

      // Get the category (or categories: this is futureproof)
      // ----------------------------------------------------------------------------
      $post_id = $post->ID;

      $cats = array();
      foreach (get_the_category($post_id) as $c) {
