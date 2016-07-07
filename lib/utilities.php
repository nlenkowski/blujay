<?php
/**
 * Utilities
 */

/**
 * Cleanup header
 * Based on http://wpengineer.com/1438/wordpress-header and https://github.com/roots/soil
 */
function blujay_head_cleanup() {

    // General cleanup
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

    // Remove the WordPress version from RSS feeds
    add_filter( 'the_generator', '__return_false' );
}

// Disable REST API and oEmbed discovery links
function blujay_disable_rest_and_oembed() {
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}

// Disable emoji inline styles and scripts
function blujay_disable_emoji_styles_scripts() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

/**
 * Moves scripts to footer
 */
function blujay_js_to_footer() {
    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
}

/**
 * Adds some useful classes to the body
 */
function blujay_add_page_slug( $classes ) {
    global $post;

    // Adds page and post slugs
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    // Add is-blog class if blog related page
    if ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_search()) || (is_tag()) ) == true) {
        $classes[] = "is-blog";
    }

    return $classes;
}

/**
 * Adds custom image sizes to media library
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
            $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id )  );
        }
    }

    return $image_sizes;
}
?>
