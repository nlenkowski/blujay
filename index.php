<?php
/**
 * Relocate main template directory
 */

if (defined('ABSPATH')) {
    update_option('template', get_option('template') . '/templates');
}
die("Kind Regards,\nBlujay");
?>
