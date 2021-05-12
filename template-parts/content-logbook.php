<?php

/**
 * Template part for displaying logbook entry content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Literary_Bohemian
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <?php literarybohemian_post_thumbnail(); ?>

    <div class="entry-content">

        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

    <?php

    ?>

</article><!-- #post-<?php the_ID(); ?> -->