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

			<div class="latest">
				<section class="latest__1">
					<?php // Journal feature
						get_template_part( 'template-parts/content', 'home-feature' );
					?>
				</section>

				<section class="latest__2">
					<?php // Logbook feature
						get_template_part( 'template-parts/content', 'home-latest-list' );
					?>
				</section>
			</div>

			<?php // Cards feature
				get_template_part( 'template-parts/content', 'cards' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
