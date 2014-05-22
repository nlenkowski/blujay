<?php
/**
 * Enqueue styles and fonts
 *
 * @package bbln_bootstrap
 */

function load_styles() {

    // Load google web fonts
    $protocol = is_ssl() ? 'https' : 'http';
    $fonts = array(
        'family' => 'Open+Sans:400italic,700italic,400,700',
    );
    wp_enqueue_style( 'fonts', add_query_arg( $fonts, "$protocol://fonts.googleapis.com/css" ) );

    // Load styles
    wp_enqueue_style('main-styles', THEMEDIR . '/css/main.min.css');

}
add_action( 'wp_enqueue_scripts', 'load_styles' );
?>