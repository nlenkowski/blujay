<?php
/**
 * Load scripts and styles
 */

// Load scripts
function load_scripts() {
    
    wp_enqueue_script('main-scripts', DISTDIR . '/main.min.js', array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Load styles
function load_styles() {
    
    wp_enqueue_style('main-styles', DISTDIR . '/main.min.css');
}
add_action( 'wp_enqueue_scripts', 'load_styles' );
