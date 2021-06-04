<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Literary_Bohemian
 */

?>

</div><!-- #content -->

<?php
// Newsletter feature
get_template_part('template-parts/content', 'newsletter');
?>

<footer id="colophon" class="site-footer">
	<div class="site-info">

		<!-- Footer navigation & copyright -->
		<?php wp_nav_menu(array('theme_location' => 'menu-0', 'menu_class'      => 'footer-menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_class'      => 'footer-menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'menu-3', 'menu_class'      => 'footer-menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'menu-4', 'menu_class'      => 'footer-menu')); ?>

		<div class="copyright">
			<img class="member-branding" src="<?php echo get_template_directory_uri(); ?>/img/clmp.png" alt="CLMP">
			&copy; 2008–<?php echo date("Y"); ?> The&nbsp;Literary&nbsp;Bohemian<br />
			ISSN 2000–1460
		</div>

	</div><!-- .site-info -->


</footer><!-- #colophon -->
</div><!-- #page -->

<picture>
	<source srcset="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-640.jpg" media="(max-width: 640px)">
	<source srcset="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-1920.jpg">
	<img class="footer-bg" src="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-1920.jpg" alt="">
</picture>

<?php wp_footer(); ?>

</body>

</html>