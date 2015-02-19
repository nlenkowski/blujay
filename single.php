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

              <nav class="post-nav">
                  <span class="previous"><?php previous_post_link('%link', __('&larr; Previous', 'bbln_bootstrap')); ?></span>
                  <span class="next"><?php next_post_link('%link', __('Next &rarr;', 'bbln_bootstrap')); ?></span>
              </nav>

            <?php
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- /content -->

<?php get_template_part( 'sidebar' ); ?>

<?php get_footer(); ?>