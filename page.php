<?php
/**
 * Displays pages
 */
?>

<?php get_header(); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'partials/content', 'page' ); ?>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
