<div class="journal-latest">
  <?php
  // The latest post from The Journal
      query_posts(array(
          'post_type' => 'poetry', 'postcard_prose',
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


  // The category
  echo '<h4>' . $post_categories . '</h4>';
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {
    echo '<h4>Poetry</h4>';
  } else {
    echo '<h4>Postcard Prose</h4>';
  }


  // The title
  // ----------------------------------------------------------------------------
  the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );


  // If this is a Poetry post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'poetry' ) {

    // Check if we have multiple poems
    // If false, print the author name

    $rows = get_field('poems' ); // get all the rows
    $second_row = $rows[1]; // get the second row
    $second_row_poem = $second_row['poem' ]; // check for content

    if ($second_row_poem == '') {
      echo '<h3>' . the_field('name') . '</h3>';
    }
  }


  // If this is a Postcard Prose post type
  // ----------------------------------------------------------------------------
  if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {

    // The author's name
    echo '<h3>' . the_field('name') . '</h3>';

  }
  // ----------------------------------------------------------------------------

  // The excerpt
  // ----------------------------------------------------------------------------
  echo '<p>' . get_the_excerpt() . '</p>';

  endwhile;

  // Reset the query
  wp_reset_query();

  ?>

</div><!-- .journal-latest -->
