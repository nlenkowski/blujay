<?php
/**
 * The sidebar used on posts
 *
 * @package bbln_bootstrap
 */

if ( ! is_active_sidebar( 'posts-sidebar' ) ) {
	return;
}
?>
<div id="posts-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'posts-sidebar' ); ?>
</div><!-- #posts-sidebar -->
