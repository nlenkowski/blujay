<?php
/**
 * Initial theme setup
 * Register constants, menus, custom image sizes, sidebars, widget areas, etc
 */

/**
 * General setup
 */
function blujay_setup() {

    // Make theme available for translation
    load_theme_textdomain( 'blujay', get_template_directory() . '/lang' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Enable plugins to manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Formats
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );

    // Enable support for HTML5 markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action('after_setup_theme', 'blujay_setup');

/**
 * Register constants
 */
define("THEMEDIR", get_template_directory_uri());
define("ASSETDIR", THEMEDIR . '/assets');
define("DISTDIR", THEMEDIR . '/dist');

/**
 * Register menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'blujay'),
));

/**
 * Register custom image sizes
 */
function blujay_add_image_sizes() {
    add_image_size( 'featured', '350', '200', true );
}
add_action('init', 'blujay_add_image_sizes');

/**
 * Register sidebar and widget areas
 */
function blujay_widgets_init() {

    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'blujay'),
        'id'            => 'primary-sidebar',
        'description'   => 'Widgets displayed in the blog sidebar.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __('Footer Widgets', 'blujay'),
        'id'            => 'footer-widgets',
        'description'   => 'Select up to three widgets for display in the footer.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'blujay_widgets_init');

?>