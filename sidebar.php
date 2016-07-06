<?php
/**
 * Displays the primary sidebar
 */
?>

<?php
if ( !is_active_sidebar( 'primary-sidebar' ) ) {
    return;
}
?>

<aside class="sidebar primary-sidebar widget-area">
    <?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside>
