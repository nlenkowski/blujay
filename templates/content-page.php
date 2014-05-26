<?php
/**
 * The template used for displaying page content
 *
 * @package bbln_bootstrap
 */
?>

<article <?php post_class(); ?>>

    <header class="entry-header">
        <h1><?php the_title(); ?></h1>
    </header><!-- /entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- /entry-content -->

</article><!-- /post -->
