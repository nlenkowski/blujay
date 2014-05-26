<?php
/**
 * Register constants, menus, sidebars/widget areas, etc
 *
 * @package bbln_bootstrap
 */

if ( ! function_exists( 'bbln_bootstrap_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features
     */
    function bbln_bootstrap_setup() {

        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support( 'post-thumbnails' );

        // Enable support for Post Formats
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

        // Enable support for HTML5 markup
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
        ) );

    }
endif;
add_action( 'after_setup_theme', 'bbln_bootstrap_setup' );

/**
 * Register constants
 */
define("THEMEDIR", get_template_directory_uri());
define("IMAGEDIR", THEMEDIR . '/img/');
$uploads = wp_upload_dir();
define("UPLOADSDIR", $uploads['baseurl']);

/**
 * Register menus
 */
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bbln_bootstrap' ),
) );

/**
 * Register custom image sizes
 */
//add_image_size( 'featured', '350', '200', true );

/**
 * Register sidebar and widget areas
 */
function bbln_bootstrap_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'bbln_bootstrap' ),
        'id'            => 'primary-sidebar',
        'description'   => 'Widgets displayed in the blog sidebar.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widgets', 'bbln_bootstrap' ),
        'id'            => 'footer-widgets',
        'description'   => 'Select up to three widgets for display in the footer.',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'bbln_bootstrap_widgets_init' );

?>