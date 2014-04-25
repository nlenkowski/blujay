<?php
/**
 * The sidebar used in the footer
 *
 * @package bbln_bootstrap
 */

if ( ! is_active_sidebar( 'footer-widgets' ) ) {
	return;
}
?>
<div id="footer-widgets" class="footer-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'footer-widgets' ); ?>
</div><!-- #footer-widgets -->
