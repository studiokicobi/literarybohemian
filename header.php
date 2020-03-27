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

	<style>
	.bg {
		background-image: url('<?php echo get_template_directory_uri(); ?>/random-bg/<?php echo rand(1,100)?>.png');
	}
</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="logo-container">
				<!--
				The SVG logo
				 - title = invisible alternative text. Should this be "…home," "…logo," or something else?
				 - removed `<title id="tlb-title">The Literary Bohemian home</title>` because we're using screen reader text in a span below the image
				 - role="img" so that the SVG is not traversed by browsers that map the SVG to the group role
				 - Because this is a simple graphic we don't(?) need <desc>
				 - Check this H1 pattern
			  -->
					<!-- <h1 class="site-title"> -->
						<a href="/" rel="home">
							<svg class="logo" role="img" viewBox="0 0 150 125" preserveAspectRatio="xMinYMin meet" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path fill="none" d="M0 0h150v125H0z"/><clipPath id="a"><path d="M0 0h150v125H0z"/></clipPath><g clip-path="url(#a)"><path d="M140.307 55.265v52.538a3.125 3.125 0 01-3.125 3.125l-6.258 8.136a6.25 6.25 0 01-6.241 5.931H6.25A6.25 6.25 0 010 118.743V26.875c.001-.872.359-1.66.936-2.226l6.608-6.61a6.247 6.247 0 014.419-1.831h39.441V3.554c0-.949.77-1.719 1.719-1.719h1.149C59.009.659 64.315 0 69.917 0c5.601 0 10.907.659 15.644 1.835h1.936c.948 0 1.718.77 1.718 1.719v12.654h47.967l.001.006a3.125 3.125 0 013.124 3.125v21.695h8.278l.087.003c.678.063.737.233.928.433.511.537.562 1.357-.021 1.982l-4.663 4.698 4.663 4.697s.298.342.376.683a1.41 1.41 0 01-1.37 1.735h-8.278zM82.34 16.208V8.635c-3.875-.733-8.06-1.133-12.423-1.133-4.07 0-7.985.348-11.638.989v7.717H82.34z" fill="#fff"/><path d="M140.307 55.265v52.538a3.125 3.125 0 01-3.125 3.125l-6.258 8.136a6.25 6.25 0 01-6.241 5.931H6.25A6.25 6.25 0 010 118.743V26.875c.001-.872.359-1.66.936-2.226l6.608-6.61a6.247 6.247 0 014.419-1.831h39.441V3.554c0-.949.77-1.719 1.719-1.719h1.149C59.009.659 64.315 0 69.917 0c5.601 0 10.907.659 15.644 1.835h1.936c.948 0 1.718.77 1.718 1.719v12.654h47.967l4.687.006h-4.686a3.125 3.125 0 013.124 3.125v21.695h8.278l.087.003c.678.063.737.233.928.433.511.537.562 1.357-.021 1.982l-4.663 4.698 4.663 4.697s.298.342.376.683a1.41 1.41 0 01-1.37 1.735h-8.278zm-3.125-33.296l-6.25 8.862v81.973l6.25-7.815V55.265h-2.633c-.288-.009-.367-.039-.518-.099-.523-.209-.866-.612-.888-1.317V42.45c.009-.29.039-.369.099-.521.207-.528.607-.873 1.307-.895h2.633V21.969zm-9.375 7.808a.469.469 0 00-.468-.469H3.594a.469.469 0 00-.469.469v.937c0 .259.21.469.469.469h123.745c.258 0 .468-.21.468-.469v-.937zm3.126-4.188l.003-.004H3.125v.006h125.932l1.876-.002zM22.498 18.044c.302-.301.301-.546 0-.546h-1.094c-.302 0-.792.245-1.094.546l-5.756 5.759c-.302.302-.302.547 0 .547h1.094c.302 0 .792-.245 1.093-.547l5.757-5.759zm-3.75 0c.302-.301.302-.546 0-.546h-1.094c-.302 0-.792.245-1.093.546l-5.757 5.759c-.302.302-.302.547 0 .547h1.094c.302 0 .792-.245 1.094-.547l5.756-5.759zm112.496 0c.301-.301.301-.546-.001-.546h-1.093c-.302 0-.792.245-1.094.546l-5.756 5.759c-.302.302-.302.547 0 .547h1.094c.301 0 .791-.245 1.093-.547l5.757-5.759zm-3.75 0c.301-.301.301-.546 0-.546H126.4c-.302 0-.792.245-1.094.546l-5.756 5.759c-.302.302-.302.547 0 .547h1.094c.302 0 .792-.245 1.093-.547l5.757-5.759zm-76.523 4.555s2.83 1.294 4.195 1.294c1.371 0 4.023-1.299 4.023-1.299a.469.469 0 00-.417-.84s-2.373 1.202-3.606 1.202c-1.239 0-3.8-1.207-3.8-1.207a.47.47 0 00-.395.85zm30.624 0s2.83 1.294 4.195 1.294c1.371 0 4.023-1.299 4.023-1.299a.47.47 0 00-.417-.84s-2.373 1.202-3.606 1.202c-1.24 0-3.801-1.207-3.801-1.207a.468.468 0 10-.394.85zm.745-6.391V8.635c-3.875-.733-8.06-1.133-12.423-1.133-4.07 0-7.985.348-11.638.989v7.717H82.34z"/><g fill="#fff" fill-rule="nonzero"><path d="M114.495 91.026v5.696l.625 9.934h-.243l-.799-3.473-4.479-12.157h-3.646v20.84h3.299V106.1l-.591-9.864h.209l.833 3.473 4.445 12.157h3.645v-20.84h-3.298zM95.536 108.045h4.132l.556 3.821h3.611l-4.306-20.84H95.71l-4.306 20.84h3.611l.521-3.821zm3.681-3.126h-3.23l1.181-6.599.347-2.501h.209l.347 2.501 1.146 6.599zM85.848 91.026h3.472v20.841h-3.472zM73.175 110.095h2.847l2.639-10.42.694-3.404h.209l-.278 6.043v9.552h3.229v-20.84h-4.618l-2.292 8.996-.833 4.342h-.347l-.834-4.342-2.291-8.996h-4.619v20.84h3.23v-9.552l-.278-6.043h.208l.695 3.404 2.639 10.42zM55.188 91.026v20.84h8.681v-3.126H58.66v-6.078h4.237v-3.126H58.66v-5.384h5.209v-3.126h-8.681zM51.855 91.026h-3.472v8.51h-3.82v-8.51h-3.472v20.84h3.472v-9.204h3.82v9.204h3.472v-20.84zM37.792 94.499a3.483 3.483 0 00-3.472-3.473H30.5a3.483 3.483 0 00-3.472 3.473v13.894a3.483 3.483 0 003.472 3.473h3.82a3.483 3.483 0 003.472-3.473V94.499zm-3.472.521v12.852c0 .451-.417.868-.868.868h-2.084c-.451 0-.868-.417-.868-.868V95.02c0-.451.417-.868.868-.868h2.084c.451 0 .868.417.868.868zM20.952 99.154c1.493-.244 2.638-1.598 2.638-3.3v-4.828a3.483 3.483 0 00-3.472-3.474h-7.292v24.314h7.639a3.483 3.483 0 003.473-3.473v-5.662c0-1.91-1.493-3.3-2.986-3.404v-.173zm-1.702-1.355h-2.951v-7.121h2.951c.452 0 .868.417.868.869v5.384c0 .451-.416.868-.868.868zm-2.951 3.126h2.43c.903 0 1.736.834 1.736 1.737v5.21c0 .451-.416.868-.868.868h-3.298v-7.815z"/></g><g fill="#fff" fill-rule="nonzero"><path d="M103.279 82.342v-7.468l4.306-13.372h-3.403l-1.944 7.12-.591 2.223h-.208l-.625-2.223-1.91-7.12h-3.403l4.306 13.338v7.502h3.472zM88.244 74.006l2.882 8.336h3.646l-3.229-9.17c1.146-.347 2.257-1.493 2.257-3.195v-5.002a3.483 3.483 0 00-3.472-3.473h-7.292v20.84h3.472v-8.336h1.736zm1.216-3.126h-2.952v-6.252h2.952c.451 0 .868.416.868.868v4.515c0 .452-.417.869-.868.869zM72.654 78.521h4.132l.555 3.821h3.612l-4.306-20.84h-3.82l-4.305 20.84h3.611l.521-3.821zm3.68-3.126h-3.229l1.181-6.599.347-2.501h.208l.348 2.501 1.145 6.599zM60.049 74.006l2.882 8.336h3.646l-3.229-9.17c1.146-.347 2.257-1.493 2.257-3.195v-5.002a3.483 3.483 0 00-3.472-3.473h-7.292v20.84h3.472v-8.336h1.736zm1.216-3.126h-2.952v-6.252h2.952c.451 0 .868.416.868.868v4.515c0 .452-.417.869-.868.869zM43.348 61.502v20.84h8.68v-3.126H46.82v-6.078h4.236v-3.127H46.82v-5.383h5.208v-3.126h-8.68zM30.223 61.502v3.126h3.472v17.714h3.472V64.628h3.472v-3.126H30.223zM24.042 61.502h3.472v20.841h-3.472zM16.299 79.216V58.028h-3.473v24.314h8.681v-3.126h-5.208z"/></g><g fill-rule="nonzero"><path d="M28.754 47.199h2.019c0-.656.024-1.282-.009-1.904-.019-.38-.304-.555-.663-.505-.462.063-1.063-.279-1.332.413a.32.32 0 00-.015.116v1.88m4.025 1.678h-4.022c0 .693-.007 1.335.006 1.975.003.105.08.291.143.299.492.07.996.172 1.478.114.16-.02.275-.477.39-.744.043-.099.026-.225.04-.367h1.889c.483 1.745-.491 3.044-2.272 3.049-.551.001-1.103.012-1.653-.004-1.18-.033-2.061-.879-2.077-2.058a251.504 251.504 0 01-.001-6.142c.015-1.218.895-2.054 2.113-2.07.669-.01 1.338-.017 2.007.003.992.03 1.894.767 1.942 1.725.069 1.37.017 2.747.017 4.22M19.113 38.847H21.1v4.694c.652-.762 1.416-.635 2.147-.604.929.04 1.71.757 1.874 1.677.031.174.055.352.055.528.004 2.54.003 5.079.002 7.619-.001.116-.018.231-.031.394h-1.994c-.009-.2-.026-.409-.026-.618-.002-2.225-.001-4.45-.002-6.675 0-1.025-.058-1.083-1.06-1.081-.898.002-.965.074-.965 1.05v7.338h-1.987V38.847zM13.87 44.819l-1.044-.074v-1.786l1.038-.061v-1.973h2.063v1.972h1.572v1.869h-1.565v1.712c0 1.299-.002 2.598 0 3.897.001.872.087.958.933.964h.634v1.795c-.663 0-1.355.089-2.014-.021-.987-.165-1.607-1.014-1.613-2.042-.01-1.85-.003-3.7-.004-5.55v-.702z" fill="#fff"/><path d="M28.754 47.199v-1.88a.32.32 0 01.015-.116c.269-.692.87-.35 1.332-.413.359-.05.644.125.663.505.033.622.009 1.248.009 1.904h-2.019z"/></g></g></svg>

							<!-- screen reader text -->
							<span class="screen-reader-text">The Literary Bohemian</span>
						</a>
					<!-- </h1> -->
				</div><!-- .logo-container -->
			</div><!-- .site-branding -->

			<!-- Main navigation -->
			<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Menu</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->

		<?php
		get_search_form();
		?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
