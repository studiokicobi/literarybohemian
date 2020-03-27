<?php
/**
 * The custom Home template
 *
 * This is the template that displays all The Literary Bohemian home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<!-- temp while building footer -->
<br><br><br><br><br><br><br><br><br><br><br>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
