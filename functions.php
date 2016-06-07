<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Here's what's happening with these hooks:
 * 1. WordPress detects theme in themes/blujay
 * 2. When we activate, we tell WordPress that the theme is actually in themes/blujay/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/blujay
 *
 * We do this so that the Template Hierarchy will look in themes/blujay/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/blujay
 *
 * themes/blujay/index.php also contains some self-correcting code, just in case the template option gets reset
 */
add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});
add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    basename($stylesheet) == 'templates' || update_option('stylesheet', $stylesheet . '/templates');
});

$blujay_includes = array(
    '/lib/setup.php',       // Registers constants, menus, sidebars, widget areas, etc
    '/lib/assets.php',      // Loads scripts, styles and fonts
    '/lib/shortcodes.php',  // Registers shortcodes
    '/lib/utilities.php',   // Enables utility functions
    '/lib/custom.php'       // Your custom theme functions go here
);

foreach ($blujay_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'blujay'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
?>
