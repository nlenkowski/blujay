<?php
/**
 * Functions loader
 *
 * @package bbln_bootstrap
 */

// Theme functions
$bbln_boostrap_includes = array(
    '/lib/init.php',        // Register constants, menus, sidebars/widget areas, etc
    '/lib/activation.php',  // Theme activation scripts
    '/lib/shortcodes.php',  // Shortcodes
    '/lib/utilities.php',   // PHP and WP Utilities
    '/lib/scripts.php',     // Enqueue javascripts
    '/lib/styles.php',      // Enqueue styles and fonts
    '/lib/custom.php',      // Custom theme functions
    '/lib/tgmpa.php',       // Plugin activation class
    '/lib/plugins.php'      // Plugins to automatically install
);

foreach ($bbln_boostrap_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'bbln_boostrap'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
?>