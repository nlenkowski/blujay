<?php

/**
 * Load Blujay code library
 * Add or remove files to the mapped array as needed
 */
array_map(function ($file) {
    $file = "lib/{$file}.php";
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'blujay'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}, ['helpers', 'setup', 'shortcodes']);
?>
