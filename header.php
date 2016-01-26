<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo('name'); ?></title>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo THEMEDIR ?>/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo THEMEDIR ?>/apple-touch-icon.png">
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
