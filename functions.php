<?php

/**
 * Load the Blujay code library:
 * - /lib/helpers.php
 * - /lib/setup.php
 * - /lib/shortcodes.php
 */
array_map(function ($file) {
    $file = "lib/{$file}.php";
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}, ['helpers', 'setup', 'shortcodes']);
?>
