<?php
require_once locate_template('/inc/init.php');                        /* Register constants, menus, sidebars/widget areas, etc */
require_once locate_template('/inc/activation.php');                /* Initial theme activation scripts */
require_once locate_template('/inc/template-tags.php');                /* Custom template tags */
require_once locate_template('/inc/shortcodes.php');                /* Custom shortcodes */
require_once locate_template('/inc/utilities.php');                    /* Utility scripts and other useful nicities */
require_once locate_template('/inc/scripts.php');                    /* Enqueue theme javascript */
require_once locate_template('/inc/styles.php');                    /* Enqueue theme styles and custom fonts */
require_once locate_template('/inc/lib/plugin-activation.php');        /* Load plugin activation class */
require_once locate_template('/inc/plugins.php');                    /* Plugins to be installed */
?>