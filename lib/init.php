<?php
/**
 * Initial theme setup, register constants, menus, custom image sizes, sidebars/widget areas, etc
 *
 * @package bbln_bootstrap
 */

function bbln_bootstrap_setup() {

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Enable plugins to manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Formats
    //add_theme_support('post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ));

    // Enable support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
}
add_action( 'after_setup_theme', 'bbln_bootstrap_setup' );

/**
 * Register constants
 */
define("THEMEDIR", get_template_directory_uri());
define("TEMPLATEDIR", THEMEDIR . '/templates');
define("ASSETDIR", THEMEDIR . '/assets');
define("IMAGEDIR", ASSETDIR . '/img');
define("STYLEDIR", ASSETDIR . '/css');
define("SCRIPTDIR", ASSETDIR . '/js');

/**
 * Register menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'bbln_bootstrap'),
));

/**
 * Add and remove custom image sizes
 */
function remove_then_add_image_sizes() {
    add_image_size( 'featured', '350', '200', true );
    remove_image_size('cptm_icon');
}
add_action('init', 'remove_then_add_image_sizes');

/**
 * Register sidebar and widget areas
 */
function bbln_bootstrap_widgets_init() {

    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'bbln_bootstrap'),
        'id'            => 'primary-sidebar',
        'description'   => 'Widgets displayed in the blog sidebar.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __('Footer Widgets', 'bbln_bootstrap'),
        'id'            => 'footer-widgets',
        'description'   => 'Select up to three widgets for display in the footer.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bbln_bootstrap_widgets_init');

?>