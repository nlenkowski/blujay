<?php
/**
 * Useful utility scripts and nicities
 *
 * @package bbln_bootstrap
 */

/**
 * Add page slug classes to body class
 */
function add_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
      $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_body_class' );


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
 * Enable execution of shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');


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


/**
 * Remove unwanted plugins
 */
function adios_dolly() {
    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('hello.php'));
    }
}
add_action ( 'admin_init' , 'adios_dolly' ) ;