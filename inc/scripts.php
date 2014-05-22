<?php
/**
 * Enqueue javascripts
 *
 * @package bbln_bootstrap
 */

/*
 * Load jQuery from google cdn
 */

function load_cdn_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_cdn_jquery');

/*
 * Load other scripts
 */

function load_scripts() {

    // Load scripts
    wp_enqueue_script('app', THEMEDIR . '/js/app.min.js', array('jquery'), '1.0', true);

    // Load dev tools
    wp_enqueue_script('lbldevtools', 'https://raw.githubusercontent.com/nlenkowski/lbl-devtools/master/devtools.js', array('jquery'), '1.0', true);

    // Load IE8 support scripts
    if ( preg_match('/(?i)msie [8]/',$_SERVER['HTTP_USER_AGENT']) ) {
        wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', false);
        wp_enqueue_script('respondjs', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', false);
    }

}
add_action( 'wp_enqueue_scripts', 'load_scripts' );
?>