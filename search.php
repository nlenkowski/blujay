<?php
/**
 * The template for displaying search results pages
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'bbln_bootstrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header><!-- /page-header -->

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'templates/content', 'search' ); ?>

            <?php endwhile; ?>

            <?php bbln_bootstrap_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>

    </div><!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
