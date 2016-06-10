<?php
/**
 * Displays single post content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php get_template_part('partials/entry-meta'); ?>
        </div>

        <div class="entry-featured">
            <?php the_post_thumbnail( $post_id, 'large' ); ?>
        </div>

    </header><!-- /entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'blujay' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- /entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'blujay' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- /entry-footer -->

</article><!-- /post -->
