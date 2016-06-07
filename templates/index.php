<?php
/**
 * Displays archives, search and post entries
 */
?>

<?php get_template_part('partials/header'); ?>

<div class="content">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_archive() ) : ?>
            <header class="page-header">
                <h1 class="archive-title"><?php the_archive_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php if ( is_search() ) : ?>
            <header class="page-header">
                <h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'blujay' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header>
        <?php endif; ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php  get_template_part( 'partials/content', get_post_format() ); ?>

        <?php endwhile; // end of the loop ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <nav class="post-nav">
              <span class="previous"><?php next_posts_link(__('&larr; Older posts', 'blujay')); ?></span>
              <span class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'blujay')); ?></span>
          </nav>
        <?php endif; ?>

    <?php else : ?>

        <?php get_template_part( 'partials/content', 'none' ); ?>

    <?php endif; ?>

</div><!-- /content -->

<?php get_template_part('partials/sidebar'); ?>

<?php get_template_part('partials/footer'); ?>
