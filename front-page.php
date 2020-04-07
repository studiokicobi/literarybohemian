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

			<div class="switcher">
				<div class="switcher-wrapper">

					<div class="feature card">
						<?php
						// Journal feature
						get_template_part( 'template-parts/content', 'home-journal-feature' );
						?>
					</div>

					<div class="feature card">
						<?php
						// Logbook feature
						get_template_part( 'template-parts/content', 'home-logbook-feature' );
						?>
					</div>

				</div><!-- .switcher-wrapper -->
			</div><!-- .switcher -->

			<div class="journal-contents">
				<?php
				// Journal contents
				get_template_part( 'template-parts/content', 'journal-contents' );
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
