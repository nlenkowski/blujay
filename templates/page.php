<?php
/**
 * Displays pages
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<div class="content">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/content', 'page' ); ?>

    <?php endwhile; // end of the loop. ?>

</div><!-- /content -->

<?php get_template_part( 'partials/footer' ); ?>
