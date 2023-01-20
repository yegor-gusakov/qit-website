<?php

/*
  Plugin Name: Newsletter - Import
  Plugin URI: https://www.thenewsletterplugin.com/documentation/addons/extended-features/advanced-import/
  Description: Advanced import from CSV with field mapping (please read the documentation)
  Version: 1.3.3
  Requires at least: 4.6
  Requires PHP: 5.6
  Author: The Newsletter Team
  Author URI: https://www.thenewsletterplugin.com
  Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
 */

add_action('newsletter_loaded', function ($version) {
    if ($version < '7.4.0') {
        add_action('admin_notices', function () {
            echo '<div class="notice notice-error"><p>Newsletter plugin upgrade required for Adavanced Import addon.</p></div>';
        });
    } elseif (!function_exists('mb_check_encoding')) {
        add_action('admin_notices', function () {
            echo '<div class="notice notice-error"><p>Newsletter Advanced Import requires the PHP mbstring extension: check with your provider.</p></div>';
        });
    } else {
        include_once __DIR__ . '/plugin.php';
        new NewsletterImport('1.3.3');
    }
});
