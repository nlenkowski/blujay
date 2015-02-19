<?php
/**
 * The template for displaying the main blog page
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_archive() ) : ?>
                <header class="page-header">
                    <h1 class="archive-title"><?php the_archive_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php if ( is_search() ) : ?>
                <header class="page-header">
                    <h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'bbln_bootstrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>
            <?php endif; ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php  get_template_part( 'templates/content', get_post_format() ); ?>

            <?php endwhile; // end of the loop ?>

            <?php if ($wp_query->max_num_pages > 1) : ?>
              <nav class="post-nav">
                  <span class="previous"><?php next_posts_link(__('&larr; Older posts', 'bbln_bootstrap')); ?></li>
                  <span class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'bbln_bootstrap')); ?></li>
              </nav>
            <?php endif; ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>

    </div><!-- /content -->

    <?php get_template_part( 'sidebar' ); ?>

<?php get_footer(); ?>
