<?php
/**
 * The template for displaying single posts
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'templates/content', 'single' ); ?>

            <?php bbln_bootstrap_post_nav(); ?>

            <?php
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- /content -->

<?php get_template_part( 'sidebar' ); ?>

<?php get_footer(); ?>