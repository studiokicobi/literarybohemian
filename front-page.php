<?php
/**
 * The custom Home template that displays The Literary Bohemian home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<?php // Journal feature
				get_template_part( 'template-parts/content', 'home-journal-feature' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
