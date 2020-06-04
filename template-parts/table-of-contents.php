<?php
/**
 * Template part for displaying the table of contents for an issue
 *
 * @package The_Literary_Bohemian
 */


 if ($post_categories != "—") {
   echo '<div class="archived-issue__issue-content highlight-box">';
   echo '<h2 class="archived-issue__issue-content--heading">' . $post_categories . '</h2>';
   echo '<h3 class="archived-issue__issue-content--heading-2">Table of contents</h3>';
   echo '<ul class="archived-issue__issue-content--list">';

   // ------------------------------

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
     $post_categories = '—';
   }

   $category_id = get_cat_ID($post_categories);

   // Poetry
   $args_p = array('category' => $category_id, 'post_type' => 'poetry', 'numberposts' => '100',);
   $postslist_p = get_posts($args_p);
   // Postcard Prose
   $args_pp = array('category' => $category_id, 'post_type' => 'postcard_prose', 'numberposts' => '100',);
   $postslist_pp = get_posts($args_pp);
   // Travel Notes
   $args_t = array('category' => $category_id, 'post_type' => 'travel_notes', 'numberposts' => '100',);
   $postslist_t = get_posts($args_t);


   // Poetry section
   if ($postslist_p) {
     echo '<li class="archived-issue__issue-content--list-section-heading">Poetry';
     echo '<ul class="archived-issue__issue-content--list-section">';
     // Print the linked poetry titles
     foreach ($postslist_p as $post) :  setup_postdata($post);

       // Check for multiple poems
       if (get_field('multiple_poems') == 1) :
         // No name needed.
         echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
       else :
         $p_name = get_field('name');
         echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">By ' . $p_name . '</span></li>';
       endif;

     endforeach;
     echo '</ul>';
     echo '</li>';
   }

   // Postcard Prose
   if ($postslist_pp) {
     echo '<li class="archived-issue__issue-content--list-section-heading">Postcard Prose';
     echo '<ul class="archived-issue__issue-content--list-section">';
     // Print the linked Postcard Prose titles
     foreach ($postslist_pp as $post) :  setup_postdata($post);
       // Get the author name
       $pp_name = get_field('name');
       echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">By ' . $pp_name . '</span></li>';
     endforeach;
     echo '</ul>';
     echo '</li>';
   }

   // Travel Notes section
   if ($postslist_t) {
     echo '<li class="archived-issue__issue-content--list-section-heading">Travel Notes';
     echo '<ul class="archived-issue__issue-content--list-section">';
     // Print the linked Travel Notes titles
     foreach ($postslist_t as $post) :  setup_postdata($post);
       // Get the author name
       $t_name = get_field('name');
       echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">By ' . $t_name . '</span></li>';
     endforeach;
     echo '</ul>';
     echo '</li>';
   }

   echo '</ul>';
   echo '</div>';
 }
?>
