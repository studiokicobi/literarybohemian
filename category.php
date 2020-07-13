<?php

/**
 * The category template
 *
 * @package The_Literary_Bohemian
 */

get_header();

// Get the category title
$post_id = $post->ID;

// get the category
$cats = array();
foreach (get_the_category($post_id) as $c) {
	$cat = get_category($c);
	array_push($cats, $cat->name);
}

if (sizeOf($cats) > 0) {
	$post_categories = implode(', ', $cats);
} else {
	$post_categories = '—'; // If we ever see this, we know there's no assigned category
}

// Get category slug
$cat_slug = $cat->slug;
?>

<div id="primary" class="content-area archived-issue">
	<main id="main" class="site-main">

		<?php
		if (have_posts()) : while (have_posts()) : the_post();

				if (get_post_type(get_the_ID()) == 'logbook') {
		?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('archived-issue__intro'); ?>>
						<header class="entry-header archived-issue__intro--header">
							<?php
							// Because cpt = logbook, this is the issue intro. No permalink.
							the_title('<h1 class="single-post__heading">', '</h1>');
							// The metadata section
							// --------------------
							echo '<ul class="meta">';
							echo '<li class="meta__item meta__item--border">From the editors</li>';
							echo '<li class="meta__item">' . get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) . '</li>';
							echo '</ul>'; // close meta

							?>

							<div class="single-post__random-body-isolated-illos" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/single-random-body-isolated-illos/<?php echo rand(1, 33) ?>.jpg')"></div>

							<div class="single-post__random-body-photos" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/single-random-body-photos/<?php echo rand(1, 19) ?>.jpg')"></div>

						</header><!-- .entry-header -->

						<div class="entry-content archived-issue__intro--content" id="dropcap-wrapper">
							<?php // This is the Logbook post content, i.e. issue introduction.
							the_content();
							?>

				<?php
				} // end of the Logbook post/issue intro

			endwhile; // End of the loop.
		endif;


		// Issue contents
		echo '<div class="latest-list-illustration">
			<svg class="toc-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 807 70.37">
				<switch>
					<g>
						<path class="toc-graphic" d="M0 70.37c2-14 11-12 16-16 2.97-2.38 47-13 78.5-40.07 7.02-6.03 16.52-4.94 24.68-7.58 2.91-.94 5.64-2.47 7.87-4.57 3.27-3.07 6.81-2.21 10.05-1.32 4.91 1.35 9.67 3.33 14.34 5.38 3.5 1.53 6.33 1.75 10.05-.12 1.85-.93 5.48 1.34 8.18 2.45 1.52.63 2.77 2.63 4.17 2.66 5.73.12 11.18 1.72 17.29.5 5.53-1.1 12.15-1.35 17.68 3.36 6.15 5.24 12.96 9.87 20.01 13.83 3.17 1.78 7.64 1.74 11.51 1.71 7.2-.06 14.77.92 20.78-4.67.4-.37 1.21-.66 1.7-.52 6.86 1.91 12.55-2.22 18.78-3.28 5.74-.97 8.94-4.42 12.99-7.49 4.73-3.59 10.73-4.97 16.33-3.47 5.74 1.53 11.02-.41 16.47-.13 5.01.25 9.18-2.3 13.83-2.89 1.95-.25 4.17 1.71 6.16 1.52 3.48-.33 6.9-1.5 10.31-2.4 1.21-.32 2.31-1.17 3.52-1.3 5.4-.57 10.81-.99 16.23-1.39 1.01-.07 2.25-.1 3.05.39 7.09 4.32 14.08 8.8 21.18 13.1.74.45 2.28.48 2.96 0 10.49-7.36 8.99-7.14 19.01-1.07 6.39 3.87 11.55 4.45 18.47 2.78 6.96-1.67 14.28-1.8 21.48.87 4.75 1.77 10.39 1.3 14.99 3.3 7.97 3.47 14.78 1.34 22.15-1.6 3.56-1.42 8.08-.25 12.06-.9 7.09-1.17 12.52 2.47 18.57 4.96 3.13 1.29 7.39-.14 11.14-.28 1.25-.05 2.84-.39 3.72.21 3.73 2.57 7.08 1.56 10.53-.45 5.01-2.93 10.29-3.97 16.02-2.35.82.23 1.86-.31 2.8-.46 1.57-.25 3.78-1.26 4.6-.59 4.53 3.68 8.45.67 12.67-.4 1.51-.38 4.07-.06 4.9.96 2.27 2.8 4.1 2.29 7.09 1.1 2.92-1.16 6.65-.18 9.68-1.17 8.46-2.79 17.11-5.42 25.01-9.42 8.29-4.2 16.18-4.23 24.5-1.26 3.03 1.09 5.92 2.58 8.93 3.75 1.17.45 2.95 1.16 3.68.65 5.12-3.52 9.48-.03 14.25.84 3.95.72 8.19-.1 12.29-.28.64-.03 1.31-.5 1.89-.39 8.21 1.56 14.98-2.17 22.1-5.3 2.63-1.16 6.47-.57 9.57.32 6.11 1.74 8.83 5.15 14.28 12.49.2.27 9.7 9.17 12 13 2.6 4.33 33 23 42 29 1.49.99 2 2 2 4H0z" />
					</g>
				</switch>
			</svg>
		</div>';
		echo '<div class="archived-issue__issue-content highlight-box">';
		echo '<h2 class="archived-issue__issue-content--heading">' . $post_categories . '</h2>';
		echo '<h3 class="archived-issue__issue-content--heading-2">Table of contents</h3>';
		echo '<ul class="archived-issue__issue-content--list">';

		// Poetry section
		// ------------------------------
		rewind_posts(); // Rewind the loop and start over

		while (have_posts()) : the_post();

			// Check for CPT
			// if ( get_post_type( get_the_ID() ) == 'poetry' ) {

			// Loop once, then break
			static $count_p = 0;
			if ($count_p == "1") {
				break;
			} else {
				// CPT heading
				echo '<li class="archived-issue__issue-content--list-section-heading">Poetry';
				echo '<ul class="archived-issue__issue-content--list-section">';
				$count_p++;
			}
		// }
		endwhile;

		// Get the post links for the section
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();

			// Check for CPT
			if (get_post_type(get_the_ID()) == 'poetry') {
				echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}

		endwhile; // End of the loop.

		// Close the tags
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();
			if (get_post_type(get_the_ID()) == 'poetry') {
				// Loop once, then break
				static $count_p1 = 0;
				if ($count_p1 == "1") {
					break;
				} else {
					// CPT heading
					echo '</ul>';
					echo '</li>';
					$count_p1++;
				}
			}
		endwhile;


		// Postcard Prose section
		// ------------------------------
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();

			// Check for CPT
			if (get_post_type(get_the_ID()) == 'postcard_prose') {

				// Loop once, then break
				static $count_pp = 0;
				if ($count_pp == "1") {
					break;
				} else {
					// CPT heading
					echo '<li class="archived-issue__issue-content--list-section-heading">Postcard Prose';
					echo '<ul class="archived-issue__issue-content--list-section">';
					$count_pp++;
				}
			}
		endwhile;

		// Get the post links for the section
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();

			// Check for CPT
			if (get_post_type(get_the_ID()) == 'postcard_prose') {
				echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}

		endwhile; // End of the loop.

		// Close the tags
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();
			if (get_post_type(get_the_ID()) == 'postcard_prose') {
				// Loop once, then break
				static $count_pp2 = 0;
				if ($count_pp2 == "1") {
					break;
				} else {
					// CPT heading
					echo '</ul>';
					echo '</li>';
					$count_pp2++;
				}
			}
		endwhile;


		// Travel Notes section
		// ------------------------------
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();

			// Check for CPT
			if (get_post_type(get_the_ID()) == 'travel_notes') {

				// Loop once, then break
				static $count_tn = 0;
				if ($count_tn == "1") {
					break;
				} else {
					// CPT heading
					echo '<li class="archived-issue__issue-content--list-section-heading">Travel Notes';
					echo '<ul class="archived-issue__issue-content--list-section">';
					$count_tn++;
				}
			}
		endwhile;

		// Get the post links for the section
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();

			// Check for CPT
			if (get_post_type(get_the_ID()) == 'travel_notes') {
				echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			}

		endwhile; // End of the loop.

		// Close the tags
		rewind_posts(); // Rewind the loop and start over
		while (have_posts()) : the_post();
			if (get_post_type(get_the_ID()) == 'travel_notes') {
				// Loop once, then break
				static $count_tn2 = 0;
				if ($count_tn2 == "1") {
					break;
				} else {
					// CPT heading
					echo '</ul>';
					echo '</li>';
					$count_tn2++;
				}
			}
		endwhile;


		echo '</ul>';
		echo '</div>';
				?>

						</div><!-- .entry-content -->
					</article>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
