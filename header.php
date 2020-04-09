<?php
/**
 * The header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Literary_Bohemian
 */

?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	// Random numbers for the disc positions on the header arrow
	$d_1a = (rand(30,87));
	$d_1b = (rand(30,87));
	$d_2a = (rand(30,87));
	$d_2b = (rand(30,87));
	$d_3a = (rand(30,87));
	$d_3b = (rand(30,87));

	// Random numbers for the disc slide times
	$fade_1 = (rand(1,4));
	$fade_2 = (rand(1,4));
	$fade_3 = (rand(1,4));

	// Fade time for the discs
	$fade_time = "0.4s";
	?>

	<style>
	<?php // Keyframes for the sliding discs ?>
	@keyframes slide-1 { 0% { left: <?php echo $d_1a . "%"; ?>; } 100% { left: <?php echo $d_1b . "%"; ?>; } }
	@keyframes slide-2 { 0% { left: <?php echo $d_2a . "%"; ?>; } 100% { left: <?php echo $d_2b . "%"; ?>; } }
	@keyframes slide-3 { 0% { left: <?php echo $d_3a . "%"; ?>; } 100% { left: <?php echo $d_3b . "%"; ?>; } }

	<?php // Fade and slide animations for the discs (and the random links) ?>
	.disc-1, #random-content-1 { left: <?php echo $d_1b . "%"; ?>; animation: slide-1 <?php echo $fade_1 . "s"; ?> ease-out 1, fade <?php echo $fade_time; ?> linear 1; }
	.disc-2, #random-content-2 { left: <?php echo $d_2b . "%"; ?>; animation: slide-2 <?php echo $fade_2 . "s"; ?> ease-out 1, fade <?php echo $fade_time; ?> linear 1; }
	.disc-3, #random-content-3 { left: <?php echo $d_3b . "%"; ?>; animation: slide-3 <?php echo $fade_3 . "s"; ?> ease-out 1, fade <?php echo $fade_time; ?> linear 1; }

	.bg { background-image: url('<?php echo get_template_directory_uri(); ?>/random-bg/<?php echo rand(1,100)?>.png'); }
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="logo-container">
						<a href="/" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/img/the-literary-bohemian-logo.svg" alt="">
							<!-- screen reader text -->
							<span class="screen-reader-text">The Literary Bohemian</span>
						</a>
				</div><!-- .logo-container -->
			</div><!-- .site-branding -->

			<div class="arrow-wrapper">
				<div class="arrow"></div>

				<a href="/destination-unknown" class="disc disc-1 tooltip">
					<span class="tooltiptext">Somewhere</span>
				</a>

				<a href="/destination-unknown" class="disc disc-2 tooltip">
					<span class="tooltiptext">Indeterminate</span>
				</a>

				<a href="/destination-unknown" class="disc disc-3 tooltip">
					<span class="tooltiptext">Undecided</span>
				</a>
			</div>


			<!-- Main navigation -->
			<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'header-menu',
			) );
			?>
		</nav><!-- #site-navigation -->

		<div class="search-wrapper">
			<?php
			get_search_form();
			?>
		</div>

	</header><!-- #masthead -->


	<div id="content" class="site-content">
