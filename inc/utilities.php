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
 * Determine if viewing a blog page and add body class
 */
function is_blog() {
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_search()) || (is_tag())) ) ? true : false ;
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