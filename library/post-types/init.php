<?php // The clock is ticking.
/**
 * File name: init.php
 * Description: Custom post type loader
 * Author: Nordanne Isahac <den.isahac@gmail.com>
 * Author URI: https://github.com/denisahac
 *
 */

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'kalabera_flush_rewrite_rules' );

// Flush your rewrite rules
function kalabera_flush_rewrite_rules() {
  flush_rewrite_rules();
}

require_once('custom-post-type.php');
