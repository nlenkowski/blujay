<?php
/**
 * Blujay includes
 */

// Theme functions
$blujay_includes = array(
    '/lib/setup.php',       // Register constants, menus, sidebars, widget areas, etc
    '/lib/assets.php',      // Load scripts and styles
    '/lib/shortcodes.php',  // Theme shortcodes
    '/lib/utilities.php',   // Various utility and helper functions
    '/lib/custom.php'       // Your custom theme functions
);

foreach ($blujay_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'blujay'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
?>
