<?php
/**
 * Custom shortcodes
 *
 * @package bbln_bootstrap
 */

// Row
function bbln_bootstrap_columns( $atts, $content = null ) {
    return '<div class="columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'bbln_bootstrap_columns');

// 1/2 Columns
function bbln_bootstrap_column_one_half( $atts, $content = null ) {
    return '<div class="column one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('column_one_half', 'bbln_bootstrap_column_one_half');

// 1/3 Columns
function bbln_bootstrap_column_one_third( $atts, $content = null ) {
    return '<div class="column one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('column_one_third', 'bbln_bootstrap_column_one_third');

// 2/3 Columns
function bbln_bootstrap_column_two_third( $atts, $content = null ) {
    return '<div class="column two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('column_two_third', 'bbln_bootstrap_column_two_third');

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