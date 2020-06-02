<?php
/**
 * The template for displaying the Postcard Prose page
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>




<?php

  // The Postcard Prose posts

	query_posts(array(
          'post_type' => 'postcard_prose',
          'post_status' => 'publish',
          'orderby' => 'publish_date',
          'order' => 'DESC',
          'showposts' => 5,
      ) );

			?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main">


				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						the_title();
						echo '<br />';

					endwhile;

					the_posts_navigation();

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->


<?php
get_footer();
