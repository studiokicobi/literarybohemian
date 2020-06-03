<?php
/**
 * The template for displaying archive pages
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
			// get the URL segments
			$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

			// Check the first URL segment and load the Ajax Load More shortcode

			if ( $uriSegments[1] == 'poetry' ) {

				// echo do_shortcode('[ajax_load_more id="4985713627" loading_style="infinite fading-circles" container_type="ul" post_type="poetry" posts_per_page="6" button_label="More"]');

			} elseif ( $uriSegments[1] == 'postcard-prose' ) {

			} elseif ( $uriSegments[1] == 'travel-notes' ) {

			} else ( $uriSegments[1] == 'book-reviews' ) {

			}
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
