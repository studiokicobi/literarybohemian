<?php
/**
 * Template part for displaying bios
 *
 * @package The_Literary_Bohemian
 */

?>



<article class="single-post__article bio">


	<?php
	// Build the header
	// ----------------------------------------------------------------------------
	?>
	<header class="single-post__header">

		<?php
		// The title
		// --------------------
		the_title( '<h1 class="single-post__heading">', '</h1>' );

		// The metadata section
		// --------------------
		echo '<ul class="single-post__meta">';

		// Meta: Custom Post Type title
		// --------------------
		echo '<li class="single-post__meta--post-type">Biography</li>';

		echo '</ul>'; // close single-post__meta

		?>

	</header><!-- .entry-header -->

	<?php
	// The text
	// ----------------------------------------------------------------------------
	?>

	<div class="single-post__body">

		<div class="drop-cap">
    <?php the_content(); ?>
    </div>

    <?php
    // Get related posts: everything the author has published on TLB
    // --------------------

    /*
    *  Query posts for a relationship value: get the posts where the field author_bio matches this post.
    *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
    */

    $author_texts = get_posts(array(
      'post_type' => array('postcard_prose', 'poetry', 'travel_notes', 'book_reviews', 'logbook'),
      'meta_query' => array(
        array(
          'key' => 'author_bio', // name of custom field
          'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
          'compare' => 'LIKE'
        )
      )
    ));

    if( $author_texts ):
    ?>

    <h1 class="bio__related-texts-heading">All work</h1>

      <ul class="bio__related-texts">
      <?php foreach( $author_texts as $author_text ): ?>
        <li class="bio__related-text-item highlight-box">

        <?php
        // Get the custom post type for Journal posts
        $cpt = get_post_type_object(get_post_type( $author_text->ID ));

        echo '<strong class="bio__related-text-item--cpt">' . esc_html($cpt->labels->singular_name) . '</strong>';
        echo '<h2 class="bio__related-text-item--heading"><a class="bio__related-text-item--link" href="' . get_permalink( $author_text->ID ). '">' . get_the_title( $author_text->ID ) . '</a></h2>';
        echo '<p class="bio__related-text-item--excerpt">' . get_the_excerpt( $author_text->ID ) . '</p>';
        // Maybe include the dates later, but the dates need to be checked and edited as necessary
        // echo '<p class="">' . get_the_date( 'F j, Y', $author_text->ID ) . '</p>';
        // echo '<a class="button" href="' . get_permalink( $author_text->ID ). '">Read</a>';
        ?>

        </li>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    </div>
  </article>

  <?php //endwhile; // end of the loop. ?>