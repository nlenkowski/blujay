<?php
/**
 * The template for displaying all pages
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'templates/content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- /content -->

<?php get_footer(); ?>
