<?php
/**
 * Enqueue javascripts
 *
 * @package bbln_bootstrap
 */

/**
 * Load jQuery from cdn
 */
function load_cdn_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), null, false);
    add_filter('script_loader_src', 'bbln_bootstrap_jquery_local_fallback', 10, 2);
}
add_action('wp_enqueue_scripts', 'load_cdn_jquery');

/**
 * Local jQuery fallback
 */
function bbln_bootstrap_jquery_local_fallback($src, $handle = null) {
    static $add_jquery_fallback = false;

    if ($add_jquery_fallback) {
        echo '<script>window.jQuery || document.write(\'<script src="' . SCRIPTDIR . '/lib/jquery-1.11.2.min.js"><\/script>\')</script>' . "\n";
        $add_jquery_fallback = false;
    }

    if ($handle === 'jquery') {
        $add_jquery_fallback = true;
    }

    return $src;
}
add_action('wp_head', 'bbln_bootstrap_jquery_local_fallback');

/**
 * Load other scripts
 */
function load_scripts() {

    // Load scripts
    wp_enqueue_script('app', SCRIPTDIR . '/app.min.js', array('jquery'), '1.0', true);

    // Load IE8 support scripts
    if ( preg_match('/(?i)msie [8]/',$_SERVER['HTTP_USER_AGENT']) ) {
        wp_enqueue_script('html5shiv', SCRIPTDIR . '/lib/html5shiv.min.js', '3.7.2', false);
        wp_enqueue_script('selectivizr', SCRIPTDIR . '/lib/selectivizr.min.js', '1.0.2', false);
        wp_enqueue_script('respond', SCRIPTDIR . '/lib/respond.min.js', '1.4.2', false);
    }

}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

?>