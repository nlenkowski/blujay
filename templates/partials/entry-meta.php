<?php
/**
 * Displays entry meta content
 */
?>

<span class="entry-date">
    <?php _e( 'Posted on ', 'blujay' ); echo get_the_date(); ?>
</span>

<span class="entry-author">
    <?php _e( 'by ', 'blujay' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a>
</span>
