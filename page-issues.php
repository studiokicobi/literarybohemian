<?php
/**
 * The template for displaying the Issues page
 *
 * @package The_Literary_Bohemian
 */

get_header();
?>

<?php
  // List the issues
?>

<style media="screen">
  .issues-list {
    column-count: 3;
    column-gap: 2rem;
    margin-bottom: 10rem;
  }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <h1 class="issue-list__heading"><?php the_title(); ?></h1>

      <ul class="issues-list">
          <?php wp_list_categories( array(
              'orderby'    => 'name',
              'exclude'    => array( 1 ),
      				'title_li' => ''
          ) ); ?>
      </ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
