<?php
/**
 * The sidebar used on pages
 *
 * @package bbln_bootstrap
 */

if ( ! is_active_sidebar( 'pages-sidebar' ) ) {
	return;
}
?>
<div id="pages-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'pages-sidebar' ); ?>
</div><!-- #pages-sidebar -->
