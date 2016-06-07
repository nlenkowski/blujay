<?php
/**
 * Displays the primary sidebar
 */
?>

<?php
if ( !is_active_sidebar('primary-sidebar') ) {
    return;
}
?>

<aside class="primary-sidebar sidebar widget-area">
    <?php dynamic_sidebar('primary-sidebar'); ?>
</aside>
