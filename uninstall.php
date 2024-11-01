<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Supawiki
 * @author    Supawiki
 * @license   GPL-2.0+
 * @link      https://www.supawiki.com
 * @copyright 2024 Supawiki
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
