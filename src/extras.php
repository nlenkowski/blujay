<?php
/**
 * Utility and helper functions
 */

/**
 * Cleanup header
 * Based on http://wpengineer.com/1438/wordpress-header and https://github.com/roots/soil
 */
function blujay_head_cleanup() {

    // General cleanup (Recommended)
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    // Remove the WordPress version from RSS feeds (Recommended)
    add_filter('the_generator', '__return_false');

    // Disable REST API and oEmbed discovery links (Optional)
    remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Disable emoji inline styles and scripts (Optional)
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'blujay_head_cleanup');

/**
 * Moves all scripts to footer
 */
function blujay_js_to_footer() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'blujay_js_to_footer');

/**
 * Add page slug to body class
 */
function add_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    if (is_blog() == true) {
        $classes[] = "is-blog";
    }

    return $classes;
}
add_filter('body_class', 'add_body_class');

/**
 * Returns true if viewing a blog page
 */
function is_blog() {
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_search()) || (is_tag())) ) ? true : false ;
}

/**
 * Add custom image sizes to media library
 */
function blujay_custom_image_sizes( $image_sizes ) {

    // Get the custom image sizes
    global $_wp_additional_image_sizes;

    // If there are none, just return the built-in sizes
    if ( empty( $_wp_additional_image_sizes ) ) {
        return $image_sizes;
    }

    // Add all the custom sizes to the built-in sizes
    foreach ( $_wp_additional_image_sizes as $id => $data ) {
        if ( !isset($image_sizes[$id]) ) {
            $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
        }
    }

    return $image_sizes;
}
add_filter('image_size_names_choose', 'blujay_custom_image_sizes');

/**
 * Enable execution of shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');
