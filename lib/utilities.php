<?php
/**
 * Utility scripts
 *
 * @package bbln_bootstrap
 */

/**
 * Remove unnessesary links from header
 * http://wpengineer.com/1438/wordpress-header/
 */
function bbln_bootstrap_head_cleanup() {
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
}
add_action('init', 'bbln_bootstrap_head_cleanup');

/**
 * Remove the WordPress version from RSS feeds
 */
add_filter('the_generator', '__return_false');

/**
 * Add custom image sizes to media library
 */
function bbln_bootstrap_add_custom_image_sizes( $image_sizes ) {

    // Get the custom image sizes
    global $_wp_additional_image_sizes;

    // If there are none, just return the built-in sizes
    if ( empty( $_wp_additional_image_sizes ) )
        return $image_sizes;

    // Add all the custom sizes to the built-in sizes
    foreach ( $_wp_additional_image_sizes as $id => $data ) {
        if ( !isset($image_sizes[$id]) )
            $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
        }

    return $image_sizes;
}
add_filter('image_size_names_choose', 'bbln_bootstrap_add_custom_image_sizes');

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
add_filter( 'body_class', 'add_body_class' );

/**
 * Returns true if viewing a blog page
 *
 * @return bool
 */
function is_blog() {
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_search()) || (is_tag())) ) ? true : false ;
}

/**
 * Returns true if a blog has more than one category
 *
 * @return bool
 */
function bbln_bootstrap_has_categories() {

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
 * Do not automatically add <p> and <br> tags to shortcodes
 */
function bbln_bootstrap_reformat($content) {
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
add_filter('the_content', 'bbln_bootstrap_reformat', 99);
add_filter('widget_text', 'bbln_bootstrap_reformat', 99);

/**
 * Enable execution of shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');

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

/**
 * Generic function to trim text and add padding
 */
function trim_text($string, $limit, $break=" ", $pad="...") {
    if (strlen($string) <= $limit) return $string;
    $string = substr($string, 0, $limit);
    if (false !== ($breakpoint = strrpos($string, $break))) {
        $string = substr($string, 0, $breakpoint);
    }
    return $string . $pad;
}