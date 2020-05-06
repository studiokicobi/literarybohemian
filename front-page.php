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



			<section id="features-large" class="cards">
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
			</section><!-- #features-large -->


			<picture class="card__divider">
			  <!-- <source srcset="<?php //echo get_template_directory_uri(); ?>/img/plane2.webp" type="image/webp"> -->
			  <source srcset="<?php echo get_template_directory_uri(); ?>/img/plane2.svg" type="image/svg">
			  <img src="<?php echo get_template_directory_uri(); ?>/img/plane2.svg" alt="">
			</picture>


			<section id="features-small" class="cards">
				<ul>
					<?php
					// Journal feature
					get_template_part( 'template-parts/content', 'home-features-small' );
					?>
				</ul>
			</section><!-- #features-large -->


			<?php
			// Journal contents
			get_template_part( 'template-parts/content', 'journal-contents' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
