<?php
/**
 * Template part for displaying the table of contents for an issue
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */


 // Get the category title
 $post_id_0 = $post->ID;

 // get the category
 $cats = array();
 foreach (get_the_category($post_id_0) as $c) {
 	$cat = get_category($c);
 	array_push($cats, $cat->name);
 }

 if (sizeOf($cats) > 0) {
 	$post_categories = implode(', ', $cats);
 } else {
 	$post_categories = '—'; // If we ever see this, we know there's no assigned category
 }


// Issue contents
echo '<div class="archived-issue__issue-content highlight-box">';
echo '<h2 class="archived-issue__issue-content--heading">' . $post_categories . '</h2>';
echo '<h3 class="archived-issue__issue-content--heading-2">Table of contents</h3>';
echo '<ul class="archived-issue__issue-content--list">';


// Poetry section
// ------------------------------
rewind_posts(); // Rewind the loop and start over
while ( have_posts() ) : the_post();

// Check for CPT
if ( get_post_type( get_the_ID() ) == 'poetry' ) {

  // Loop once, then break
  static $count_p = 0;
  if ($count_p == "1") { break; }
  else {
    // CPT heading
    echo '<li class="archived-issue__issue-content--list-section-heading"><h4>Poetry</h4></li>';
    $count_p++; }
  }
endwhile;


echo '</ul>';
echo '</div>';
?>
