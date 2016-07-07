<?php
/**
 * Displays single posts
 */
?>

<?php get_header(); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/content', 'single' ); ?>

        <?php get_template_part( 'partials/pager' ); ?>

        <?php
        if ( comments_open() || '0' != get_comments_number() ) :
            comments_template( '/comments.php' );
        endif;
        ?>

    <?php endwhile; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
