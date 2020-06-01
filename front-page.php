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

			<section id="features-small" class="cards">
				<ul>
					<?php // Cards feature
						get_template_part( 'template-parts/content', 'cards' );
					?>
				</ul>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->



	<?php // Journal contents
		// get_template_part( 'template-parts/content', 'journal-contents' );
	?>

	<!-- <picture class=""> -->
		<!-- <source srcset="<?php //echo get_template_directory_uri(); ?>/img/plane2.webp" type="image/webp"> -->
		<!-- <source srcset="<?php //echo get_template_directory_uri(); ?>/img/plane2.svg" type="image/svg"> -->
		<!-- <img src="<?php //echo get_template_directory_uri(); ?>/img/plane2.svg" alt=""> -->
	<!-- </picture> -->


<?php
get_footer();
