<?php
/**
 * The category template
 *
 * @package The_Literary_Bohemian
 */

get_header();

// Get the category title
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
?>

	<div id="primary" class="content-area archived-issue">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				if ( get_post_type( get_the_ID() ) == 'logbook' ) {
					?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('archived-issue__intro'); ?>>
				<header class="entry-header archived-issue__intro--header">
					<?php
					// Because cpt = logbook, this is the issue intro. No permalink.
						the_title( '<h1 class="entry-title archived-issue__intro--heading">', '</h1>' );
					?>
				</header><!-- .entry-header -->

				<div class="entry-content archived-issue__intro--content drop-cap">
					<?php // This is the Logbook post content, i.e. issue introduction.
					the_content();
					?>

				<?php
				} // end of the Logbook post/issue intro

			endwhile; // End of the loop.
			endif;


			// Issue contents
				get_template_part( 'template-parts/table-of-contents' );
			?>

				</div><!-- .entry-content -->
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
