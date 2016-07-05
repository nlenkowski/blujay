<?php
/**
 * Displays pages
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/content', 'page' ); ?>

    <?php endwhile; // end of the loop. ?>

</main><!-- /main -->

<?php get_template_part( 'partials/footer' ); ?>
