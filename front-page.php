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



			<div id="features-large" class="cards">
				<ul>
					<li class="card">
						<?php
						// Journal feature
						get_template_part( 'template-parts/content', 'home-journal-feature' );
						?>
					</li>

					<li class="card">
						<?php // Logbook feature
						get_template_part( 'template-parts/content', 'home-logbook-feature' );
						?>
					</li>
				</ul>
			</div><!-- #features-large -->


			<picture class="card__divider">
			  <source srcset="<?php echo get_template_directory_uri(); ?>/img/plane.webp" type="image/webp">
			  <source srcset="<?php echo get_template_directory_uri(); ?>/img/plane.jpg" type="image/jpeg">
			  <img src="<?php echo get_template_directory_uri(); ?>/img/plane.jpg" alt="">
			</picture>


			<div id="features-small" class="cards">
				<ul>
					<?php
					// Journal feature
					get_template_part( 'template-parts/content', 'home-features-small' );
					?>
				</ul>
			</div><!-- #features-large -->


			<div class="journal-contents">
				<ul>
					<?php
					// Journal contents
					get_template_part( 'template-parts/content', 'journal-contents' );
					?>
				</ul>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
