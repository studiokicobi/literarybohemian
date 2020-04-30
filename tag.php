<?php
/**
 * The template for displaying all tag archive pages
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>


	<div id="primary" class="content-area">
		<main id="main" class="tag-archive">

			<h1 class="page-title">
				<?php
				printf( __( 'Tag archive: %s', 'shape' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?>
			</h1>

			<ul class="plain-list tag-archive__list">
				<?php
				while ( have_posts() ) : the_post();

				// If this is a Poetry post type
			  // ----------------------------------------------------------------------------
			  if ( get_post_type( get_the_ID() ) == 'poetry' ) {

			    // Check if we have multiple poems

			    // Get the ACF rows
			    if ( have_rows( 'poems' ) ) :
			      while ( have_rows( 'poems' ) ) : the_row();
			      // check if content exists on these rows
			      $poem_2 = the_row(1);
			      $poem_3 = the_row(2);
			      $poem_4 = the_row(3);
			      $poem_5 = the_row(4);
			      $poem_6 = the_row(5);
			      $poem_7 = the_row(6);
			      $poem_8 = the_row(7);
			      $poem_9 = the_row(8);
			      $poem_10 = the_row(9);
			      $poem_11 = the_row(10);
			      $poem_12 = the_row(11);

				      if ($poem_2 || $poem_3 || $poem_4 || $poem_5 || $poem_6 || $poem_7 || $poem_8 || $poem_9 || $poem_10 || $poem_11 || $poem_12 != '') :
				        // There are multiple poems – no name needed.
								the_title( sprintf( '<li class="tag-archive__item"><a href="%s">', esc_url( get_permalink() ) ), ' by ' . get_field('name') . '</a></li>' );
				        else :
				          // There's no second poem and we need to include the author name
									the_title( sprintf( '<li class="tag-archive__item"><a href="%s">', esc_url( get_permalink() ) ), '</a></li>' );
				       endif;
			      	endwhile;
			    	endif;
				  	} // end get poetry post type


						// If this is a Poetry post type
					  // ----------------------------------------------------------------------------
					  if ( get_post_type( get_the_ID() ) == 'postcard_prose' ) {
							the_title( sprintf( '<li class="tag-archive__item"><a href="%s">', esc_url( get_permalink() ) ), ' by ' . get_field('name') . '</a></li>' );
						} // end get poetry post type


						// If this is a Travel Notes post type
						// ----------------------------------------------------------------------------
						if ( get_post_type( get_the_ID() ) == 'travel_' ) {
							the_title( sprintf( '<li class="tag-archive__item"><a href="%s">', esc_url( get_permalink() ) ), ' by ' . get_field('name') . '</a></li>' );
						} // end get poetry post type

				endwhile; // End of the loop.
				?>
			</ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
