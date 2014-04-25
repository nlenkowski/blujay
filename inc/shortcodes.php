<?php
/**
 * Custom shortcodes
 *
 * @package bbln_bootstrap
 */

// Row
function bbln_bootstrap_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'bbln_bootstrap_row');

// Column
function bbln_bootstrap_column( $atts, $content = null ) {
   return '<div class="column">' . do_shortcode($content) . '</div>';
}
add_shortcode('column', 'bbln_bootstrap_column');

// Vimeo embed
add_shortcode('vimeo', 'bbln_bootstrap_vimeo_shortcode');
function bbln_bootstrap_vimeo_shortcode($atts) {
    extract(shortcode_atts(array( 'id' => '','width' => '','height' => ''), $atts));
    if (!$width) $width = '640';
    if (!$height) $height = '360';
    $width_src = 'width="'.$width.'"';
    $height_src = 'height="'.$height.'"';
    return '<iframe src="http://player.vimeo.com/video/'.$id.'" '.$width_src .' '. $height_src.' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
 }

// Youtube embed
add_shortcode('youtube', 'bbln_bootstrap_youtube_shortcode');
function bbln_bootstrap_youtube_shortcode($atts) {
    extract(shortcode_atts(array( 'id' => '','width' => '','height' => ''), $atts));
    if (!$width) $width = '640';
    if (!$height) $height = '360';
    $width_src = 'width="'.$width.'"';
    $height_src = 'height="'.$height.'"';
    return '<iframe src="http://www.youtube.com/embed/'.$id.'" '.$width_src .' '. $height_src.' frameborder="0" allowfullscreen></iframe>';
}

?>