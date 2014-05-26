<?php
/**
 * Theme functions loader
 *
 * @package bbln_bootstrap
 */

// Theme functions
require_once locate_template('/inc/init.php');              /* Register constants, menus, sidebars/widget areas, etc */
require_once locate_template('/inc/activation.php');        /* Initial theme activation scripts */
require_once locate_template('/inc/template-tags.php');     /* Custom template tags */
require_once locate_template('/inc/shortcodes.php');        /* Custom shortcodes */
require_once locate_template('/inc/utilities.php');         /* Utility scripts */
require_once locate_template('/inc/scripts.php');           /* Enqueue javascripts */
require_once locate_template('/inc/styles.php');            /* Enqueue styles and fonts */
require_once locate_template('/inc/custom.php');            /* Your custom functions go here */

// Plugin functions
require_once locate_template('/inc/lib/plugin-activation.php');     /* Plugin activation class */
require_once locate_template('/inc/plugins.php');                   /* Plugins to install */
?>