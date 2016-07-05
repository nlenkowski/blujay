<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Relocate core template directory to themes/blujay/templates
 *
 * The Template Hierarchy will look in themes/blujay/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/blujay
 */
add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});
add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    basename($stylesheet) == 'templates' || update_option('stylesheet', $stylesheet . '/templates');
});

/**
 * Blujay includes
 *
 * The $blujay_includes array determines the code library to be loaded.
 * Add or remove files as needed.
 */
$blujay_includes = array(
    '/src/setup.php',      // Configure theme and register assets, menus, sidebars, etc
    '/src/extras.php',  // Additional theme options and utilities
    '/src/shortcodes.php', // Register shortcodes
);

// Load library
foreach ($blujay_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);
?>
