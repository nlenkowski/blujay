<?php
/**
 * The template used for displaying entries on the blog and search results pages
 */
?>

<article id="post-<?php the_ID(); ?>" class="post">

    <div class="entry-image">
        <?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); ?>
    </div>

    <div class="entry-container">

        <header class="entry-header">

            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

            <div class="entry-meta">
                <?php get_template_part('templates/entry-meta'); ?>

                <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

                    <div class="entry-postedin">

                        <?php
                        $categories_list = get_the_category_list( __( ', ', 'blujay' ) );
                        if ( $categories_list && blujay_has_categories() ) : ?>
                            <span class="entry-cats">
                                <?php printf( __( 'In %1$s', 'blujay' ), $categories_list ); ?>
                            </span>
                        <?php endif; ?>

                        <?php
                        $tags_list = get_the_tag_list( '', __( ', ', 'blujay' ) );
                        if ( $tags_list ) : ?>
                            <span class="entry-tags">
                                <?php printf( __( '| Tagged %1$s', 'blujay' ), $tags_list ); ?>
                            </span>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>
            </div><!-- /entry-meta -->

        </header><!-- /entry-header -->

        <?php if ( is_search() ) : ?>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- /entry-summary -->

        <?php else : ?>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- /entry-summary -->

        <?php endif; ?>

        <footer class="entry-footer">

            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'blujay' ), __( '1 Comment', 'blujay' ), __( '% Comments', 'blujay' ) ); ?></span>
            <?php endif; ?>

            <?php edit_post_link( __( 'Edit', 'blujay' ), '<span class="edit-link">', '</span>' ); ?>

        </footer><!-- /entry-footer -->

    </div><!-- /entry-container -->
</article><!-- /post -->
