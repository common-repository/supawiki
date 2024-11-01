<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Supawiki
 * @author    Supawiki
 * @license   GPL-2.0+
 * @link      https://www.supawiki.com
 * @copyright 2024 Supawiki
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="wrap" id="supawiki">
	<div id="icon-supawiki"></div>
	
	<h2 class="title"><?php echo esc_html( get_admin_page_title() ); ?></h2>
	
  <p>This plugin exports your Wordpress content into a set of files that can be downloaded to your machine, and then imported into your account at <a href="https://www.supawiki.com" target="_blank">Supawiki</a>.</p>
	
	<h3>Things to keep in mind</h3>
	
	<ol>
		<li>Tags will be migrated, but not categories. If needed, you can <a href="https://wordpress.org/plugins/wpcat2tag-importer/" target="_blank">convert your categories to tags</a> before exporting.</li>
		<li>Supawiki does not have built-in comments.</li>
		<li>No custom fields, meta, shortcodes, post types, taxonomies or binary files will be migrated. Just regular <strong>posts</strong>, <strong>pages</strong>, <strong>tags</strong> and <strong>images</strong>.</li>
	</ol>
	
	<h3>Steps to follow</h3>
	
	<ol>
		<li>Click the "Download Supawiki file" button. You will receive an import file for Supawiki.</li>
		<li>Log into your Supawiki site, and head to the “Settings” section in your dashboard and import the file.</li>
		<li>Verify that everything is working as expected, and make any manual adjustments.</li>
	</ol>

	<hr>

	<p>Download JSON and Images as a zip file</p>

	<form id="wp-2-supawiki" method="get">
		<input type="hidden" name="supawikiexport" value="true">
		<?php submit_button( __( 'Download Supawiki file', 'supawiki' ) ); ?>
	</form>

	<p>Struggling with the zip file? Download the <code>.json</code> instead.<br>Find out how to move your images in the <a href="https://supawiki.com/wiki/documentation/wordpress-import-guide?id=acc51925-6e0e-452d-ad72-f9345b572ce1&page=22#manually-import-images" target="_blank">WordPress migration guide</a>.</p>

	<form id="wp-2-supawiki-json" method="get">
		<input type="hidden" name="supawikijsonexport" value="true">
		<?php submit_button( __( 'Download JSON', 'supawiki' ), 'secondary' ); ?>
	</form>

	<hr/>

	<div id="supawiki-diagnostics">
		<?php
			// Set diagnostic variables
			$gMaxExecutionTime = ini_get('max_execution_time');
			$gMemoryLimit = ini_get('memory_limit');
			$supawikiMigrator = new supawiki();
			$zipArchiveInstalled = (class_exists('ZipArchive')) ? 'Yes' : 'No';
			$wp_upload_dir = wp_upload_dir();
			$wp_upload_basedir = $wp_upload_dir['basedir'];
		?>

		<h4>Supawiki Migrator <?php echo esc_html( $supawikiMigrator->getsupawikimigratorversion() ); ?> - Diagnostics</h4>
		<p>PHP version: <?php echo esc_html( phpversion() ); ?></p>
		<p>PHP ZipArchive Installed: <?php echo esc_html( $zipArchiveInstalled ); ?></p>
		<p>Memory Limit: <?php echo esc_html( $gMemoryLimit ); ?></p>
		<p>Max Execution Time: <?php echo esc_html( $gMaxExecutionTime ); ?></p>
		<p>Media file size: <?php echo esc_html( size_format(recurse_dirsize($wp_upload_basedir)) ); ?></p>
	</div>
</div>
