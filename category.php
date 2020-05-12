<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

	<div id="primary" class="content-area archived-issue">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

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

			// Issue contents
			echo '<div class="archived-issue__issue-content highlight-box">';
			echo '<h2 class="archived-issue__issue-content--heading">Issue contents</h2>';
			echo '<ul class="archived-issue__issue-content--list">';

			rewind_posts(); // Rewind the loop and start over

			while ( have_posts() ) :
				the_post();

				// If not from the Logbook, the post is from the journal
				if ( get_post_type( get_the_ID() ) != 'logbook' ) {
					// Issue text title and link
					echo '<li class="archived-issue__issue-content--list-item"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				}

			endwhile; // End of the loop.

			echo '</ul>';
			echo '</div>';
			?>

				</div><!-- .entry-content -->
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
