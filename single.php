<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'templates/content', 'single' ); ?>

            <?php bbln_bootstrap_post_nav(); ?>

            <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- /content -->

<?php get_template_part( 'sidebar' ); ?>

<?php get_footer(); ?>