<?php

namespace Blujay\Setup;

/**
 * Register some useful constants
 */
define('THEMEDIR', get_template_directory_uri());
define('ASSETDIR', THEMEDIR . '/assets');
define('DISTDIR', THEMEDIR . '/dist');

/**
 * Theme setup
 */
function theme_setup()
{
    // Make theme available for translation
    load_theme_textdomain('blujay', get_template_directory() . '/lang');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Enable plugins to manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Formats
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));

    // Enable support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\theme_setup');

/**
 * Enable and/or disable theme helpers
 */
function enable_theme_helpers()
{
    // Cleanup header
    add_action('init', '\Blujay\Helpers\cleanup_header');
    add_action('init', '\Blujay\Helpers\disable_rest_and_oembed');
    add_action('init', '\Blujay\Helpers\disable_emoji');

    // Move scripts to footer
    add_action('wp_enqueue_scripts', '\Blujay\Helpers\move_js_to_footer');

    // Add page and post slugs to body class
    add_filter('body_class', '\Blujay\Helpers\add_classes_to_body');

    // Add custom image sizes to media library
    add_filter('image_size_names_choose', '\Blujay\Helpers\add_custom_image_sizes_to_media_library');

    // Enable execution of shortcodes in widgets
    add_action('init', '\Blujay\Helpers\enable_shortcodes_in_html_widget');
}
add_action('after_setup_theme', __NAMESPACE__ . '\\enable_theme_helpers');

/**
 * Register assets
 */
function register_assets()
{
    // Scripts
    wp_enqueue_script(
        'main-scripts',
        get_template_directory_uri() . '/dist/scripts/main.js',
        array('jquery'),
        filemtime(get_template_directory() . '/dist/scripts/main.js'),
        true
    );

    // Styles
    wp_enqueue_style(
        'main-styles',
        get_template_directory_uri() . '/dist/styles/main.css',
        array(),
        filemtime(get_template_directory() . '/dist/styles/main.css')
    );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_assets');

/**
 * Register menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu', 'blujay'),
));

/**
 * Register custom image sizes
 */
function add_image_sizes()
{
    // Example custom image size
    // add_image_size('featured', '350', '200', true);
}
add_action('init', __NAMESPACE__ . '\\add_image_sizes');

/**
 * Register sidebar and widget areas
 */
function widgets_init()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'blujay'),
        'id' => 'primary-sidebar',
        'description' => 'Widgets displayed in the blog sidebar.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widgets', 'blujay'),
        'id' => 'footer-widgets',
        'description' => 'Select up to three widgets for display in the footer.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');
?>
