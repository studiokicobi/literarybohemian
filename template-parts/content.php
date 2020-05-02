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

		// If this is a Journal post:
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--name">' . get_field('name') . '</li>';
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

		// If this is the Journal: print category and tags
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--taxonomy-wrapper">';
				echo '<ul class="single-post__meta--taxonomy">';
					echo '<li class="single-post__meta--taxonomy-cat">' . $post_categories . '</li>';
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
		if ( is_singular( 'poetry' ) ) {

			if ( have_rows( 'poems' ) ) :
				while ( have_rows( 'poems' ) ) : the_row();
				if ( have_rows( 'poem' ) ) :
					while ( have_rows( 'poem' ) ) : the_row();
					echo '<div class="poem">';
						echo '<h2>' . get_sub_field( 'poem_title' ) . '</h2>';
						echo get_sub_field( 'poem_content' );
						if ( get_sub_field( 'poem_details' ) ) {
							echo '<div class="poem__poem-details">' . get_sub_field('poem_details') . '</div>';
						}
					echo '</div>';
					endwhile;
				endif;
				endwhile;
			endif;

		} elseif ( is_singular( array( 'book_reviews', 'postcard_prose', 'travel_notes' ) ) ) {
			the_field( 'text' );
		} else {
			the_content();
		}
		?>

	</div><!-- .single-post__content -->

</article>
