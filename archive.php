<?php
/**
 * The template for displaying Archive pages
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- /page-header -->

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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
