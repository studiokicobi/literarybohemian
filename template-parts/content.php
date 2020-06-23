<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

?>

<div class="single-post__random-header" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/single-random-header/<?php echo rand(1,14) ?>.jpg')"></div>

<article class="single-post__article">

	<?php
	// Build the header
	// ----------------------------------------------------------------------------
	?>
	<header class="single-post__header">

		<?php
		// The title
		// --------------------
		the_title('<h1 class="single-post__heading">', '</h1>');

		// The metadata section
		// --------------------
		echo '<ul class="meta">';

		// Meta: author name
		// --------------------

		// Get the author name
		$name = get_field('name');

		// If this is a Journal post:
		if (is_singular(array('poetry', 'postcard_prose', 'travel_notes'))) {

			$posts = get_field('author_bio');
			// get the post if it exists using ACF relationship field
			if ($posts) : foreach ($posts as $post) : // variable must be called $post
					setup_postdata($post);
					$bio_link = get_the_permalink();
				endforeach;

				wp_reset_postdata();

				// If the bio is linked, echo the link
				echo '<li class="meta__item meta__item--border"><a href="' . $bio_link . '">' . $name . '</a></li>';

			else :
				// No bio link exists
				echo '<li class="meta__item meta__item--border">' . $name . '</li>';
			endif;
		}

		// If this is a Book Review:
		if (is_singular('book_reviews')) {
			if (get_field('author_of_the_book_review')) {
				echo '<li class="meta__item meta__item--border">' . get_field('author_of_the_book_review') . '</li>';
			}
		}

		// Meta: Custom Post Type title
		// --------------------

		// Get the custom post type for Journal posts
		if (is_singular('poetry')) {
			$cpt = 'Poetry';
			$cpt_class = 'icon-poetry-home';
			$link = '<a href="' . get_site_url() . '/poetry">' . $cpt . '</a>';
		} elseif (is_singular('postcard_prose')) {
			$cpt = 'Postcard Prose';
			$cpt_class = 'icon-postcard-home';
			$link = '<a href="' . get_site_url() . '/postcard-prose">' . $cpt . '</a>';
		} elseif (is_singular('travel_notes')) {
			$cpt = 'Travel Notes';
			$cpt_class = 'icon-travel-home';
			$link = $cpt;
		}

		if (is_singular(array('poetry', 'postcard_prose', 'travel_notes'))) {
			echo '<li class="meta__item meta__item--border ' . $cpt_class . '">' . $link . '</li>';
		}

		// Meta: Category & tags
		// --------------------

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

		// Get the category ID
		$category_id = get_cat_ID($post_categories);

		// Get the cat URL
		$category_link = get_category_link($category_id);

		// If this is the Journal: print category and tags
		if (is_singular(array('poetry', 'postcard_prose', 'travel_notes'))) {
			echo '<li class="meta__taxonomy-wrapper">';
			echo '<ul class="meta__taxonomy">';
			echo '<li class="meta__taxonomy-cat"><a href="' . $category_link . '">' . $post_categories . '</a></li>';
			the_tags('<li class="meta__taxonomy-tag">', '</li><li class="meta__taxonomy-tag">', '</li>');
			echo '</ul>';
			echo '</li>';
		}

		// If this is a Book Review: print section name and book info
		if (is_singular('book_reviews')) {
			echo '<li class="meta__taxonomy-wrapper">';
			echo '<ul class="meta__taxonomy">';

			echo '<li class="meta__taxonomy-cat">Book Reviews</li>';
			if (get_field('author')) {
				echo '<li class="meta__taxonomy-tag"><span>' . get_field('author') . '</span></li>';
			}
			if (get_field('translator')) {
				echo '<li class="meta__taxonomy-tag"><span>Translated by ' . get_field('translator') . '</span></li>';
			}
			if (get_field('publisher_publication_year')) {
				echo '<li class="meta__taxonomy-tag"><span>' . get_field('publisher_publication_year') . '</span></li>';
			}
			if (get_field('isbn')) {
				echo '<li class="meta__taxonomy-tag"><span>ISBN ' . get_field('isbn') . '</span></li>';
			}
			if (get_field('more_information')) {
				echo '<li class="meta__taxonomy-tag"><span><a href="' . get_field('more_information') . '">More information</a></span></li>';
			}
			echo '</ul>';
			echo '</li>';
		}

		echo '</ul>'; // close meta

		?>

		<div class="single-post__random-body" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/single-random-body/<?php echo rand(1,13) ?>.jpg')"></div>

	</header><!-- .entry-header -->

	<?php
	// The text
	// ----------------------------------------------------------------------------
	?>

	<div class="single-post__body">

		<?php
		if (is_singular('poetry')) {

			if (have_rows('poems')) :
				while (have_rows('poems')) : the_row();
					if (have_rows('poem')) :
						while (have_rows('poem')) : the_row();
							echo '<div class="poem single-post__lead">';

							// Check for multiple poems
							if (get_field('multiple_poems') == 1) :
								echo '<h2 class="poem__title">' . get_sub_field('poem_title') . '</h2>';
							else :
							// No title needed.
							endif;

							echo get_sub_field('poem_content');
							if (get_sub_field('poem_details')) {
								echo '<div class="poem__poem-details">' . get_sub_field('poem_details') . '</div>';
							}
							echo '</div>';
						endwhile;
					endif;
				endwhile;
			endif;
		} elseif (is_singular(array('postcard_prose', 'travel_notes', 'logbook'))) {
			echo '<div id="dropcap-wrapper" class="single-post__lead">';
			the_field('text');
			echo '</div>';
		} else {
			the_content();
		}

		// Get the author bio for Journal posts
		// ----------------------------------------------------------------------------
		if (is_singular(array('poetry', 'postcard_prose', 'travel_notes'))) {

			$posts = get_field('author_bio');

			// get the post using ACF relationship field
			if ($posts) : ?>
				<div class="bio-excerpt">
					<h3 class="bio-excerpt__heading">About the author</h3>
					<?php foreach ($posts as $post) : // variable must be called $post (IMPORTANT)
					?>
						<?php setup_postdata($post); ?>
						<p class="bio-excerpt__content">
							<?php
							// Custom excerpt length WordPress using wp_trim_excerpt()
							$content = get_the_content();
							echo wp_trim_words($content, '24');
							?>
						</p>

						<?php
						// The link to the bio page
						?>
						<a href="<?php the_permalink(); ?>" class="bio-excerpt__link button no-underline">Read the full bio</a>

					<?php endforeach; ?>
				</div>

				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
				?>
		<?php endif;
		}

		// Issue contents
		if (is_singular(array('poetry', 'postcard_prose', 'travel_notes'))) {


			if ($post_categories != "—") {

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

				// Issue Introduction
				echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . $category_link . '"><em>From the editors</em></a></li>';

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
							echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">by ' . $p_name . '</span></li>';
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
						echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">by ' . $pp_name . '</span></li>';
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
						echo '<li class="archived-issue__issue-content--list-section-item"><a class="archived-issue__issue-content--list-section-item-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a> <span class="inline-byline">by ' . $t_name . '</span></li>';
					endforeach;
					echo '</ul>';
					echo '</li>';
				}

				echo '</ul>';
				echo '</div>';
			}
		}
		?>

	</div><!-- .single-post__content -->

</article>
