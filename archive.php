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

		// Get the URL segments
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		// Set the custom post type according to the URL segment
		if ($uriSegments[1] == 'poetry') {
			$cpt = 'poetry';
			$heading = 'Poetry';
		} elseif ($uriSegments[1] == 'postcard-prose') {
			$cpt = 'postcard_prose';
			$heading = 'Postcard Prose';
		} elseif ($uriSegments[1] == 'travel-notes') {
			$cpt = 'travel_notes';
			$heading = 'Travel Notes';
		} elseif ($uriSegments[1] == 'book-reviews') {
			$cpt = 'book-reviews';
			$heading = 'Book Reviews';
		} elseif ($uriSegments[1] == 'interviews') {
			$cpt = 'interviews';
			$heading = 'Interviews';
		} else {
			// nada
		}

		//The heading
		echo '<h1>' . $heading . '</h1>';

		// Load the Ajax Load More shortcode
		echo do_shortcode('[ajax_load_more loading_style="infinite fading-circles" post_type="' . $cpt . '" scroll_distance="-200" progress_bar="true" progress_bar_color="cd2c00" button_label="More" no_results_text="&lt;p&gt;There’s no content to show at the moment.&lt;/p&gt;"]');

		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
