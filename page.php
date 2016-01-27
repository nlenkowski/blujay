<?php
/**
 * Page template
 */

get_header(); ?>

<div class="content">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'templates/content', 'page' ); ?>

    <?php endwhile; // end of the loop. ?>

</div><!-- /content -->

<?php get_footer(); ?>
