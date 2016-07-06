<?php
/**
 * Displays post meta content
 */
?>

<section class="post-meta">

    <span class="post-date">
        <?php _e( 'Posted on ', 'blujay' ); the_date(); ?>
    </span>

    <span class="post-author">
        <?php _e( 'by ', 'blujay' ); ?>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn"><?php the_author(); ?></a>
    </span>

    <div class="post-postedin">
        <?php
        $categories_list = get_the_category_list( __( ', ', 'blujay' ) );
        $tags_list = get_the_tag_list( __( ', ', 'blujay' ) );

        if ( $categories_list || $tags_list ) :
            _e( 'in ', 'blujay' );
            if ( $categories_list ) : ?><span class="post-categories"><?php printf( __( '%1$s', 'blujay' ), $categories_list ); ?></span><?php endif; ?><?php if ( $tags_list) : ?><span class="post-tags"><?php printf( __( '%1$s', 'blujay' ), $tags_list ); ?></span><?php endif; ?>
        <?php endif; ?>
    </div>

</section>
