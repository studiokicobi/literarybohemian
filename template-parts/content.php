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

		// The author
		echo '<li class="single-post__meta--name">' . get_field('name') . '</li>';

		// Get the custom post type for Journal posts
		if ( get_post_type( get_the_ID() ) == 'poetry' ) {
			$cpt = 'Poetry';
		} elseif ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
			$cpt = 'Postcard Prose';
		} elseif ( get_post_type( get_the_ID() ) == 'travelogue' ){
			$cpt = 'Travelogue';
		}

		// The Journal section
		if ( get_post_type( get_the_ID() ) == 'poetry' or 'postcard_prose' or 'travelogue' ) {
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

		// Print category and tags
		echo '<li class="single-post__meta--taxonomy-wrapper">';

		echo '<ul class="single-post__meta--taxonomy">';
		echo '<li class="single-post__meta--taxonomy-cat">' . $post_categories . '</li>';
		the_tags( '<li class="single_post__meta--taxonomy-tag">', '</li><li class="single_post__meta--taxonomy-tag">', '</li>' );
		echo '</ul>';

		echo '</li>';
		echo '</ul>'; // close single-post__meta

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
