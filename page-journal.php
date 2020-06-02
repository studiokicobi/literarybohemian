<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

<?php
  // List the issues
?>

<!-- <ul>
    <?php //wp_list_categories( array(
    //     'orderby'    => 'name',
    //     'exclude'    => array( 1 ),
		// 		'title_li' => '<h2>' . __( 'Issues', 'textdomain' ) . '</h2>'
    // ) ); ?>
</ul> -->






<?php



// The latest post from The Journal
$authors_query = new WP_Query(array(
        'post_type' => 'bio',
        'post_status' => 'publish',
        'meta_key'			=> 'last_name',
      	'orderby'			=> 'meta_value',
      	'order'				=> 'ASC',
        'showposts' => 5
    ) );


    //Get the first character.
    // $firstCharacter = $string[0];
    //
    // //Get the first character using substr.
    // $firstCharacter = substr($string, 0, 1);
    $author = get_field('last_name');
    echo $author;
?>

<?php while (have_posts()) : the_post();

the_a_z_listing( $authors_query );

// echo do_shortcode("[a-z-listing display='posts' post-type='bio' meta-key='last_name']");

echo '<hr />';

the_title( '<h6>', '</h6>' );

?>

<?
endwhile;

// Reset the query
wp_reset_query();

?>







<hr>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
