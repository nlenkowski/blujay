<?php
/**
 * The template for displaying the main blog page
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php  get_template_part( 'templates/content', get_post_format() ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php bbln_bootstrap_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>

    </div><!-- /content -->

    <?php get_template_part( 'sidebar' ); ?>

<?php get_footer(); ?>
