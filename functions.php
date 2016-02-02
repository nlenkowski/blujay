<?php
/**
 * Blujay includes
 */

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
