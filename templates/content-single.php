<?php
/**
 * The template used for displaying single blog posts
 *
 * @package bbln_bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php get_template_part('templates/entry-meta'); ?>
        </div>

    </header><!-- /entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'bbln_bootstrap' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- /entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'bbln_bootstrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- /entry-footer -->

</article><!-- /post -->
