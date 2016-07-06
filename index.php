<?php
/**
 * Displays default entries
 */
?>

<?php get_header(); ?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php  get_template_part( 'parts/content'); ?>
        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <?php get_template_part( 'parts/pager' ); ?>
        <?php endif; ?>

    <?php else : ?>

        <?php get_template_part( 'parts/content', 'none' ); ?>

    <?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
