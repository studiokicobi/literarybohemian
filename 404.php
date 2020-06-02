<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Uh-oh. I can’t find that page anywhere.', 'literarybohemian' ); ?></h1>
				</header><!-- .page-header -->

					<p class="content-404">Nothing was found at this location…but fear not! All is not lost. <br>The search function above can help you find your way.</p>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
