<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

?>
<article class="single-post__article">


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

		// Meta: author name
		// --------------------

		// Get the author name
	  // Use $name below to print the author's name.
	  if ( have_rows( 'index_name' ) ) :
	  	while ( have_rows( 'index_name' ) ) : the_row();
	    if(get_sub_field('last_name')) {
	      $name = get_sub_field( 'first_names' ) . ' ';
	      $name .= get_sub_field( 'last_name' );
	    }
	    endwhile;
	  endif;

		// If this is a Journal post:
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--name">' . $name . '</li>';
		}

		// If this is a Book Review:
		if ( is_singular( 'book_reviews' ) ) {
			echo '<li class="single-post__meta--name">' . get_field('author_of_the_book_review') . '</li>';
		}

		// Meta: Custom Post Type title
		// --------------------

		// Get the custom post type for Journal posts
		if ( is_singular( 'poetry' ) ) {
			$cpt = 'Poetry';
		} elseif ( is_singular( 'postcard_prose' ) ) {
			$cpt = 'Postcard Prose';
		} elseif ( is_singular( 'travel_notes' ) ) {
			$cpt = 'Travelogue';
		}

		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--post-type">' . $cpt . '</li>';
		}

		// Meta: Category & tags
		// --------------------

	  $post_id = $post->ID;

		// get the category
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

		// Get the category ID
    $category_id = get_cat_ID( $post_categories );

    // Get the cat URL
    $category_link = get_category_link( $category_id );

		// If this is the Journal: print category and tags
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--taxonomy-wrapper">';
				echo '<ul class="single-post__meta--taxonomy">';
					echo '<li class="single-post__meta--taxonomy-cat"><a href="' . $category_link . '">' . $post_categories . '</a></li>';
				the_tags( '<li class="single_post__meta--taxonomy-tag">', '</li><li class="single_post__meta--taxonomy-tag">', '</li>' );
				echo '</ul>';
			echo '</li>';
		}

		// If this is a Book Review: print section name and book info
		if ( is_singular( 'book_reviews' ) ) {
			echo '<li class="single-post__meta--taxonomy-wrapper">';
				echo '<ul class="single-post__meta--taxonomy">';

					echo '<li class="single-post__meta--taxonomy-cat">Book Reviews</li>';
					echo '<li class="single_post__meta--taxonomy-tag"><span>' . get_field( 'author' ) . '</span></li>';
					echo '<li class="single_post__meta--taxonomy-tag"><span>' . get_field( 'publisher_publication_year' ) . '</span></li>';
					echo '<li class="single_post__meta--taxonomy-tag"><span>ISBN ' . get_field( 'isbn' ) . '</span></li>';

				echo '</ul>';
			echo '</li>';
		}

		echo '</ul>'; // close single-post__meta

		?>

	</header><!-- .entry-header -->

	<?php
	// The text
	// ----------------------------------------------------------------------------
	?>

	<div class="single-post__body">

		<?php
		// Check if this is a Poetry post type

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
	        echo '<h2 class="issue-index__link--title"><span class="issue-index__link--span">' . get_the_title() . '</span></h2>';
	        else :
	          // There's no second poem and we need to include the author name
	          echo '<h2 class="issue-index__link--title"><span class="issue-index__link--span">' . get_the_title() . ' by ' . $name . '</span></h2>';
	        endif;
	      endwhile;
	    endif;
	  } // end get poetry post type



		if ( is_singular( 'poetry' ) ) {

			if ( have_rows( 'poems' ) ) :
				while ( have_rows( 'poems' ) ) : the_row();

				if ( have_rows( 'poem' ) ) :
					while ( have_rows( 'poem' ) ) : the_row();

					echo '<div class="poem">';

					// Confirm multiple poems by checking if content exists on these rows:
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

					if ($poem_2 || $poem_3 || $poem_4 || $poem_5 || $poem_6 || $poem_7 || $poem_8 || $poem_9 || $poem_10 || $poem_11 || $poem_12 != '') {
		        // There are multiple poems – we need titles above each poem
						echo '<h2 class="poem__title">' . get_sub_field( 'poem_title' ) . '</h2>';
					}

						echo get_sub_field( 'poem_content' );

						if ( get_sub_field( 'poem_details' ) ) {
							echo '<div class="poem__poem-details">' . get_sub_field('poem_details') . '</div>';
						}
					echo '</div>';
					endwhile;
				endif;
				endwhile;
			endif;

		} elseif ( is_singular( array( 'postcard_prose', 'travel_notes', 'logbook' ) ) ) {
			echo '<div class="drop-cap">';
				the_field( 'text' );
			echo '</div>';
		} else {
			the_content();
		}




		// Get the author bio for Journal posts
		// ----------------------------------------------------------------------------
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {

		$posts = get_field('author_bio');

			// get the post using ACF relationship field
			if( $posts ): ?>
			  <div class="bio-excerpt">
					<h3 class="bio-excerpt__heading">About the author</h3>
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			    <?php setup_postdata($post); ?>
			    <p class="bio-excerpt__content">
					<?php
					// Custom excerpt length WordPress using wp_trim_excerpt()
					$content = get_the_content();
					echo wp_trim_words( $content , '24' );
					?>
					</p>

					<?php
					// The link to the bio page
					?>
					<a href="<?php the_permalink(); ?>" class="bio-excerpt__link button no-underline">Read the full bio</a>

			    <?php endforeach; ?>
				</div>

			  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif;
		}

		// previous_post_link('&laquo; %link', '%title', true);
		// next_post_link('%link &raquo;', '%title', true);
		// get_template_part( 'template-parts/table-of-contents' );

		// Get the category title
	  $post_id_0 = $post->ID;

	  // get the category
	  $cats = array();
	  foreach (get_the_category($post_id_0) as $c) {
	  	$cat = get_category($c);
	  	array_push($cats, $cat->name);
	  }

	  if (sizeOf($cats) > 0) {
	  	$post_categories = implode(', ', $cats);
	  } else {
	  	$post_categories = '—'; // If we ever see this, we know there's no assigned category
	  }

$category_id = get_cat_ID($post_categories);

 $args = array(
	 			'category' => $category_id,
				// 'post_type' => array('postcard_prose', 'poetry', 'travel_notes')
				'post_type' => array('poetry')
			 );
 $postslist = get_posts( $args );
 foreach ($postslist as $post) :  setup_postdata($post);

 echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a><br />';
  endforeach;

	 // // Issue contents
	 // echo '<div class="archived-issue__issue-content highlight-box">';
	 // echo '<h2 class="archived-issue__issue-content--heading">' . $post_categories . '</h2>';
	 // echo '<h3 class="archived-issue__issue-content--heading-2">Table of contents</h3>';
	 // echo '<ul class="archived-issue__issue-content--list">';
	 //
	 //
	 // // Poetry section
	 // // ------------------------------
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 // // Check for CPT
	 // if ( get_post_type( get_the_ID() ) == 'poetry' ) {
	 //
	 //   // Loop once, then break
	 //   static $count_p = 0;
	 //   if ($count_p == "1") { break; }
	 //   else {
	 //     // CPT heading
	 //     echo '<li class="archived-issue__issue-content--list-section-heading"><h4>Poetry</h4></li>';
	 //     $count_p++; }
	 //   }
	 // endwhile;
	 //
	 // // Get the post links for the section
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 //   // Check for CPT
	 //   if ( get_post_type( get_the_ID() ) == 'poetry' ) {
	 //     echo '<li class="archived-issue__issue-content--list-item"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
	 //   }
	 //
	 // endwhile; // End of the loop.
	 //
	 //
	 // // Postcard Prose section
	 // // ------------------------------
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 // // Check for CPT
	 // if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
	 //
	 //   // Loop once, then break
	 //   static $count_pp = 0;
	 //   if ($count_pp == "1") { break; }
	 //   else {
	 //     // CPT heading
	 //     echo '<li class="archived-issue__issue-content--list-section-heading"><h4>Postcard Prose</h4></li>';
	 //     $count_pp++; }
	 //   }
	 // endwhile;
	 //
	 // // Get the post links for the section
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 //   // Check for CPT
	 //   if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
	 //     echo '<li class="archived-issue__issue-content--list-item"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
	 //   }
	 //
	 // endwhile; // End of the loop.
	 //
	 //
	 // // Travel Notes section
	 // // ------------------------------
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 // // Check for CPT
	 // if ( get_post_type( get_the_ID() ) == 'travel_notes' ) {
	 //
	 //   // Loop once, then break
	 //   static $count_tn = 0;
	 //   if ($count_tn == "1") { break; }
	 //   else {
	 //     // CPT heading
	 //     echo '<li class="archived-issue__issue-content--list-section-heading"><h4>Travel Notes</h4></li>';
	 //     $count_tn++; }
	 //   }
	 // endwhile;
	 //
	 // // Get the post links for the section
	 // rewind_posts(); // Rewind the loop and start over
	 // while ( have_posts() ) : the_post();
	 //
	 //   // Check for CPT
	 //   if ( get_post_type( get_the_ID() ) == 'travel_notes' ) {
	 //     echo '<li class="archived-issue__issue-content--list-item"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
	 //   }
	 //
	 // endwhile; // End of the loop.
	 //
	 //
	 // echo '</ul>';
	 // echo '</div>';
	 // ?>








	</div><!-- .single-post__content -->

</article>
