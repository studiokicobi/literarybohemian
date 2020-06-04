<?php
/**
 * Template part for displaying the list of latest posts
 *
 * @package The_Literary_Bohemian
 */
 ?>

  <?php
  // The latest post from The Journal
      query_posts(array(
          'post_type' => array('poetry', 'postcard_prose', 'travel_notes', 'logbook', 'book_reviews'),
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 5,
          'offset' => 1
      ) );

      while (have_posts()) : the_post();

      echo '<ul class="latest-list">';

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
        $latest_cpt = 'Poetry';
        $cpt_class = 'latest-list__cat--poetry';
      } elseif ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
        $latest_cpt = 'Postcard Prose';
        $cpt_class = 'latest-list__cat--postcard';
      } elseif ( get_post_type( get_the_ID() ) == 'travel_notes' ) {
        $latest_cpt = 'Travel Notes';
        $cpt_class = 'latest-list__cat--travel';
      } elseif ( get_post_type( get_the_ID() ) == 'book_reviews' ) {
        $latest_cpt = 'Book review';
        $cpt_class = 'latest-list__cat--review';
      } else {
        $latest_cpt = 'Logbook';
        $cpt_class = 'latest-list__cat--logbook';
      }

      // Get the author name
      $name = get_field('name');

      // if ( have_rows( 'index_name' ) ) :
      //   while ( have_rows( 'index_name' ) ) : the_row();
      //   if(get_sub_field('last_name')) {
      //     $name = get_sub_field( 'first_names' ) . ' ';
      //     $name .= get_sub_field( 'last_name' );
      //   }
      //   endwhile;
      // endif;

      // Print the custom post type and icon class
      echo '<li class="latest-list__item">';
      echo '<strong class="latest-list__cat ' . $cpt_class . '">' . $latest_cpt . '</strong><br />';

      // The title
      // ----------------------------------------------------------------------------
      the_title( sprintf( '<a href="%s" class="latest-list__link">', esc_url( get_permalink() ) ), '</a> <span class="latest-list__author">' );

      // By the author
      // ----------------------------------------------------------------------------

      // If this is a Poetry post type
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
              echo 'By ' . $name;
            endif;
          endwhile;
        endif;
      } // end get poetry post type

      // Postcard Prose
      elseif ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
        echo 'By ' . $name;

      // Travel Notes
      } elseif ( get_post_type( get_the_ID() ) == 'travel_notes' ) {
        echo 'By ' . $name;

      // Book Review
      } elseif ( get_post_type( get_the_ID() ) == 'book_reviews' ) {
        if ( get_field( 'author_of_the_book_review' )) {
          echo 'By ' . get_field( 'author_of_the_book_review' );
        }

      // Logbook
      } else {
          echo 'By ' . get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' );
      }

      echo '</span></li>';

      endwhile;

      echo '</ul>';

      // Reset the query
      wp_reset_query();

      ?>
