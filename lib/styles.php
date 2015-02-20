<?php
/**
 * Enqueue styles and fonts
 *
 * @package bbln_bootstrap
 */

function load_styles() {

    // Load Google web fonts
    $protocol = is_ssl() ? 'https' : 'http';
    $fonts = array(
        'family' => 'Open+Sans:400italic,700italic,400,700',
    );
    //wp_enqueue_style( 'fonts', add_query_arg( $fonts, "$protocol://fonts.googleapis.com/css" ) );

    // Load main styles
    wp_enqueue_style('main-styles', STYLEDIR . '/main.min.css');

    // Load legacy styles
    if ( preg_match('/(?i)msie [8]/',$_SERVER['HTTP_USER_AGENT']) ) {
        wp_enqueue_style('legacy-styles', STYLEDIR . '/legacy.min.css');
    }

}
add_action( 'wp_enqueue_scripts', 'load_styles' );
?>