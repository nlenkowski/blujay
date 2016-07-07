<?php
/**
 * Displays comments link
 */
?>

<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="comments-link">
        <?php comments_popup_link( __( 'Leave a comment', 'blujay' ), __( '1 Comment', 'blujay' ), __( '% Comments', 'blujay' ) ); ?>
    </span>
<?php endif; ?>
