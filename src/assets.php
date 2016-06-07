<?php
/**
 * Load scripts and styles
 */

// Load scripts
function load_scripts() {

    wp_enqueue_script( 'main-scripts', DISTDIR . '/scripts/main.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Load styles
function load_styles() {

    wp_enqueue_style( 'main-styles', DISTDIR . '/styles/main.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

// Load web fonts
function load_google_fonts() {

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700', false );
}
add_action( 'wp_enqueue_scripts', 'load_google_fonts' );
