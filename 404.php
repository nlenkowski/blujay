<?php
/**
 * The template for displaying 404 pages
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <header class="page-header">
            <h1 class="page-title"><?php _e( 'Sorry, but the page you were trying to view does not exist.', 'bbln_bootstrap' ); ?></h1>
        </header><!-- /page-header -->

        <div class="page-content">
            <p><?php _e( 'Maybe try one of the links below?', 'bbln_bootstrap' ); ?></p>
            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
            <?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" ); ?>
        </div><!-- /page-content -->

    </div><!-- /content -->

<?php get_footer(); ?>