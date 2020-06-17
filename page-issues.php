<?php
/**
 * The template for displaying the Issues page
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

<?php
  // List the issues (categories)
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main issues-list-wrapper">

      <h1 class="issue-list__heading"><?php the_title(); ?></h1>

      <ul class="issues-list">
          <?php
							wp_list_categories( array(
              'orderby'    => 'name',
              'exclude'    => array( 1 ),
							'use_desc_for_title' => 1,
      				'title_li' => ''
          		) );
					?>


<?php
			// $categories = get_categories( array(
			//     'orderby' => 'name',
			// 		'exclude'    => array( 1 ),
			// 		'title_li' => ''
			// ) );
			//
			// foreach( $categories as $category ) {
			//     $category_link = sprintf(
			//         '<li><a href="%1$s" alt="%2$s">%3$s</a></li>',
			//         esc_url( get_category_link( $category->term_id ) ),
			//         esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
			//         esc_html( $category->name )
			//     );

			    // echo '<p>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</p> ';
			    // echo '<p>' . sprintf( esc_html__( 'Description: %s', 'textdomain' ), $category->description ) . '</p>';
			    // echo '<p>' . sprintf( esc_html__( 'Post Count: %s', 'textdomain' ), $category->count ) . '</p>';
			// }
?>

</ul>







		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
