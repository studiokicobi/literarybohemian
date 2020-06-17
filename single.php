<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>


	<div id="primary" class="content-area">
		<main id="main" class="single-post">

		<?php
		while ( have_posts() ) :
			the_post();

				get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php // Cards feature
		get_template_part( 'template-parts/content', 'cards' );
	?>

	<?php
get_footer();
