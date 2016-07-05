<?php
/**
 * Displays posts and search results content
 */
?>

<article id="post-<?php the_ID(); ?>" class="post">

    <div class="entry-container">

        <header class="entry-header">

            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>

            <div class="entry-meta">
                <?php get_template_part( 'templates/partials/entry-meta' ); ?>
            </div>

            <?php if ( !is_search() ) : // Hide featured image in search results ?>
                <div class="entry-featured">
                    <?php the_post_thumbnail( $post_id, 'large' ); ?>
                </div>
            <?php endif; ?>

        </header><!-- /entry-header -->

        <?php if ( is_search() ) : ?>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>

        <?php else : ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        <?php endif; ?>

        <footer class="entry-footer">

            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'blujay' ), __( '1 Comment', 'blujay' ), __( '% Comments', 'blujay' ) ); ?></span>
            <?php endif; ?>

            <?php edit_post_link( __( 'Edit', 'blujay' ), '<span class="edit-link">', '</span>' ); ?>

        </footer><!-- /entry-footer -->

    </div><!-- /entry-container -->
</article><!-- /post -->
