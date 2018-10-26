<?php

namespace Blujay\Shortcodes;

// Columns
function columns($atts, $content = null)
{
    return '<div class="columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', __NAMESPACE__ . '\\columns');

// 1/2 Columns
function column_one_half($atts, $content = null)
{
    return '<div class="column one-half"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('column_one_half', __NAMESPACE__ . '\\column_one_half');

// 1/4 Columns
function column_one_fourth($atts, $content = null)
{
    return '<div class="column one-fourth"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('column_one_fourth', __NAMESPACE__ . '\\column_one_fourth');

// 1/3 Columns
function column_one_third($atts, $content = null)
{
    return '<div class="column one-third"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('column_one_third', __NAMESPACE__ . '\\column_one_third');

// 2/3 Columns
function column_two_thirds($atts, $content = null)
{
    return '<div class="column two-thirds"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('column_two_thirds', __NAMESPACE__ . '\\column_two_thirds');
?>
