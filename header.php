<?php
/**
 * The template for displaying the header
 *
 * @package bbln_bootstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo THEMEDIR ?>/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo THEMEDIR ?>/favicon-152.png">
    <meta name="msapplication-TileImage" content="<?php echo THEMEDIR ?>/favicon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">

            <h1 class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="subtitle"><?php bloginfo( 'description' ); ?></h2>

            <nav class="primary-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>

        </div><!-- /container -->
    </header><!-- /site-header -->

    <section class="site-content">
        <div class="container">
