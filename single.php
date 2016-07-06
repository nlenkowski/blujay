<?php
/**
 * Displays single post entry
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/content', 'single' ); ?>

        <?php get_template_part( 'partials/pager' ); ?>

        <?php
        if ( comments_open() || '0' != get_comments_number() ) :
            comments_template( '/partials/comments.php' );
        endif;
        ?>

    <?php endwhile; ?>

</main>

<?php get_template_part( 'partials/sidebar' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
