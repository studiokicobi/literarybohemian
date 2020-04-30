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

	<header class="single-post__header">

		<?php
		// The title
		// ----------------------------------------------------------------------------
		the_title( '<h1 class="single-post__heading">', '</h1>' );

		// Meta
		// ----------------------------------------------------------------------------
		echo '<ul class="single-post__meta">';

		// Journal posts: the author
		// if ( get_post_type( get_the_ID() ) == 'poetry' || 'postcard_prose' || 'travelogue') ) {
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {




		echo '<li class="single-post__meta--name">' . get_field('name') . '</li>';
		}

		// Book reviews: the author
		if ( get_post_type( get_the_ID() ) == 'book_reviews' ) {
			// get the author of the book review
			echo '<li class="single-post__meta--name">' . get_field('author_of_the_book_review') . '</li>';
		}

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


		// The category & tags
		// ----------------------------------------------------------------------------
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

		// The journal: print category and tags
		if ( is_singular( array( 'poetry', 'postcard_prose', 'travel_notes' ) ) ) {
			echo '<li class="single-post__meta--taxonomy-wrapper">';
				echo '<ul class="single-post__meta--taxonomy">';
					echo '<li class="single-post__meta--taxonomy-cat">' . $post_categories . '</li>';
				the_tags( '<li class="single_post__meta--taxonomy-tag">', '</li><li class="single_post__meta--taxonomy-tag">', '</li>' );
				echo '</ul>';
			echo '</li>';
		}

		// Book review category
		if ( is_singular( 'book_reviews' ) ) {
			echo '<li class="single-post__meta--taxonomy-cat">Book Reviews</li>';
		}

		echo '</ul>'; // close single-post__meta

		// Book review meta
		if ( is_singular( 'book_reviews' ) ) {
			echo '<ul class="single-post__book-review-meta">';
				echo '<li class="single-post__book-review-meta--title">' . get_field( 'author' ) . '</li>';
				echo '<li class="single-post__book-review-meta--title">' . get_field( 'publisher_publication_year' ) . '</li>';
				echo '<li class="single-post__book-review-meta--title">ISBN ' . get_field( 'isbn' ) . '</li>';
			echo '</ul>';
		}

		?>

	</header><!-- .entry-header -->

	<div class="single-post__body">

		<?php the_content(); ?>
		<?php the_field( 'text' ); ?>

	</div><!-- .single-post__content -->

	<!-- <footer class="entry-footer"> -->
		<?php // literarybohemian_entry_footer(); ?>
	<!-- </footer><!-- .entry-footer -->
</article><!-- #post-<?php //the_ID(); ?> -->
