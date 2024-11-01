<?php
/**
 * WordPress to Supawiki exporter
 *
 * @package   Supawiki
 * @author    Supawiki,rodrigoplp
 * @license   GPL-2.0+
 * @link      https://www.supawiki.com
 * @copyright 2024 Supawiki
 *
 * @supawiki
 * Plugin Name: Supawiki
 * Plugin URI:  https://www.supawiki.com
 * Description: Plugin to export your WordPress blog so you can import it into your Supawiki account
 * Version:     1.0.1
 * Text Domain: supawiki
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plug the `wp_get_current_user` function, which isn't normally available in plugins
if ( !function_exists( 'wp_get_current_user' ) ) { include(ABSPATH . 'wp-includes/pluggable.php'); }

// If the user is an `administrator`, init the plugin
if ( current_user_can( 'administrator' ) ) {
    require_once( plugin_dir_path( __FILE__ ) . 'class-supawiki.php' );

	// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
	register_activation_hook( __FILE__, array( 'Supawiki', 'activate' ) );
	register_deactivation_hook( __FILE__, array( 'Supawiki', 'deactivate' ) );

	Supawiki::get_instance();
}
