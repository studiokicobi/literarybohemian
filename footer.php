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

	<footer id="colophon" class="site-footer">
		<div class="site-info">

				<!-- Footer navigation & copyright -->
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class'      => 'footer-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_class'      => 'footer-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_class'      => 'footer-menu' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-4', 'menu_class'      => 'footer-menu' ) ); ?>

				<div class="copyright">
					&copy; 2008–<?php echo date("Y"); ?> The&nbsp;Literary&nbsp;Bohemian<br />
					ISSN 2000–1460
				</div>

		</div><!-- .site-info -->

		<picture>
		  <source srcset="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-640.jpg" media="(max-width: 640px)">
		  <source srcset="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-1920.jpg">
		  <img src="<?php echo get_template_directory_uri(); ?>/img/footer-landscape-1920.jpg" alt="">
		</picture>

	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="footer-bg"></div>

<?php wp_footer(); ?>

</body>
</html>
