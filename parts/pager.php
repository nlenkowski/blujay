<?php
/**
 * Displays pager
 */
?>

<nav class="pager">
    <?php if ( is_single() ) : ?>
        <span class="previous"><?php previous_post_link( '%link', __( '&larr; Previous', 'blujay' ) ); ?></span>
        <span class="next"><?php next_post_link( '%link', __( 'Next &rarr;', 'blujay' ) ); ?></span>
    <?php else : ?>
        <span class="previous"><?php next_posts_link( __( '&larr; Older posts', 'blujay' ) ); ?></span>
        <span class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'blujay' ) ); ?></span>
    <?php endif; ?>
</nav>
