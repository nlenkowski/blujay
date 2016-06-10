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
 * Returns true if a blog has more than one category
 */
function blujay_has_categories() {

        $all_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            'number'     => 2,
        ) );

        $all_cats = count( $all_cats );

    $has_cats = ($all_cats > 1 ? true : false);
    return $has_cats;
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

/**
 * Do not automatically add <p> and <br> tags to shortcodes
 */
function blujay_reformat($content) {
    $new_content = '';

    /* Matches the contents and the open and closing tags */
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';

    /* Matches just the contents */
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

    /* Divide content into pieces */
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    /* Loop over pieces */
    foreach ($pieces as $piece) {
        /* Look for presence of the shortcode */
        if (preg_match($pattern_contents, $piece, $matches)) {

            /* Append to content (no formatting) */
            $new_content .= $matches[1];
        } else {

            /* Format and append to content */
            $new_content .= wptexturize(wpautop($piece));
        }
    }

    return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'blujay_reformat', 99);
add_filter('widget_text', 'blujay_reformat', 99);

/**
 * Sanatize upload filenames
 */
function sanitize_filename_on_upload($filename) {
    $ext = end(explode('.',$filename));

    // Replace all non alpha-numeric characters
    $sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));

    // Replace dots inside filename
    $sanitized = str_replace('.','-', $sanitized);
    return strtolower($sanitized.'.'.$ext);
}
add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);
