<?php
/**
 * Custom shortcodes
 *
 * @package bbln_bootstrap
 */

// Buttons
function bbln_bootstrap_button($atts) {
    $a = shortcode_atts(array(
        'size' => '',
        'icon' => '',
        'text' => 'Button Text',
        'link' => 'http://www.meetalex.com',
    ), $atts);

    if ($a["icon"]) {
        $button_icon = '<i class="fa '.$a["icon"].' "></i>';
    }

    return '<a href="'.esc_attr($a["link"]).'" class="button '.esc_attr($a["size"]).'">'.esc_attr($a["text"]).' '.$button_icon.'</a>';
}
add_shortcode( 'button', 'bbln_bootstrap_button' );

// Vimeo embed
add_shortcode('vimeo', 'bbln_bootstrap_vimeo_shortcode');
function bbln_bootstrap_vimeo_shortcode($atts) {
    extract(shortcode_atts(array( 'id' => '','width' => '','height' => ''), $atts));
    if (!$width) $width = '640';
    if (!$height) $height = '360';
    $width_src = 'width="'.$width.'"';
    $height_src = 'height="'.$height.'"';
    return '<iframe class="video" src="http://player.vimeo.com/video/'.$id.'" '.$width_src .' '. $height_src.' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
 }

// Youtube embed
add_shortcode('youtube', 'bbln_bootstrap_youtube_shortcode');
function bbln_bootstrap_youtube_shortcode($atts) {
    extract(shortcode_atts(array( 'id' => '','width' => '','height' => ''), $atts));
    if (!$width) $width = '640';
    if (!$height) $height = '360';
    $width_src = 'width="'.$width.'"';
    $height_src = 'height="'.$height.'"';
    return '<iframe class="video" src="http://www.youtube.com/embed/'.$id.'" '.$width_src .' '. $height_src.' frameborder="0" allowfullscreen></iframe>';
}

// Columns
function bbln_bootstrap_columns( $atts, $content = null ) {
    return '<div class="columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'bbln_bootstrap_columns');

// 1/2 Columns
function bbln_bootstrap_column_one_half( $atts, $content = null ) {
    return '<div class="column one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('column_one_half', 'bbln_bootstrap_column_one_half');

// 1/4 Columns
function bbln_bootstrap_column_one_fourth( $atts, $content = null ) {
    return '<div class="column one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('column_one_fourth', 'bbln_bootstrap_column_one_fourth');

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

?>