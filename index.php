<?php
/**
 * Displays default entries
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php  get_template_part( 'partials/content'); ?>
        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <?php get_template_part( 'partials/pager' ); ?>
        <?php endif; ?>

    <?php else : ?>
        <?php get_template_part( 'partials/content', 'none' ); ?>
    <?php endif; ?>

</main>

<?php get_template_part( 'partials/sidebar' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
