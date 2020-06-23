<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

?>

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

	</header><!-- .entry-header -->

	<?php
	// The text
	// ----------------------------------------------------------------------------
	?>

	<div class="single-post__body">

		<div class="single-post__random-header" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/single-random-header/<?php echo rand(1,14) ?>.jpg')"></div>

		<!-- <img class="single-post__random-header" src="<?php echo get_template_directory_uri(); ?>/img/single-random-header/<?php echo rand(1, 2) ?>.png" alt=""> -->

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
