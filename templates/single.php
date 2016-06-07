<?php
/**
 * Displays single posts
 */
?>

<?php get_template_part('partials/header'); ?>

<div class="content">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'partials/content', 'single' ); ?>

          <nav class="post-nav">
              <span class="previous"><?php previous_post_link('%link', __('&larr; Previous', 'blujay')); ?></span>
              <span class="next"><?php next_post_link('%link', __('Next &rarr;', 'blujay')); ?></span>
          </nav>

        <?php
            if ( comments_open() || '0' != get_comments_number() ) :
                comments_template('/templates/partials/comments.php');
            endif;
        ?>

    <?php endwhile; // end of the loop. ?>

</div><!-- /content -->

<?php get_template_part('partials/sidebar'); ?>

<?php get_template_part('partials/footer'); ?>
