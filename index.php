<?php
/**
 * The main template file.
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                    get_template_part( 'templates/content', get_post_format() );
                ?>

            <?php endwhile; ?>

            <?php bbln_bootstrap_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>

    </div><!-- /content -->

<?php get_footer(); ?>
