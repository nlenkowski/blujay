<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Load Blujay code library
 * Add or remove files to the array as needed
 */
$blujay_libs = array(
    '/lib/helpers.php', // Theme options and helpers
    '/lib/setup.php', // Configure theme and register assets, menus, sidebars, etc
    '/lib/shortcodes.php', // Register shortcodes
);

foreach ($blujay_libs as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);
?>
