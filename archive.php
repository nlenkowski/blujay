<?php
/**
 * Displays archive posts
 */
?>

<?php get_header(); ?>

<main class="main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
        </header>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'partials/content', 'excerpt' ); ?>
        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <?php get_template_part( 'partials/pager' ); ?>
        <?php endif; ?>

    <?php else : ?>

        <?php get_template_part( 'partials/content', 'none' ); ?>

    <?php endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
