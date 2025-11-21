<?php
/**
 * Plugin Name:       Personio Integration Light Command Palette
 * Description:       Provides command palette for Personio Integration Light.
 * Requires at least: 6.9
 * Requires PHP:      8.1
 * Version:           1.0.0
 * Author:            Thomas Zwirner
 * Author URI:        https://www.thomaszwirner.de
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       personio-integration-command
 *
 * @package personio-integration-command
 */

// prevent direct access.
defined( 'ABSPATH' ) || exit;

// do nothing if the PHP version is not 8.1 or newer.
if ( PHP_VERSION_ID < 80100 ) { // @phpstan-ignore smaller.alwaysFalse
	return;
}

/**
 * Add scripts to the admin area.
 *
 * @return void
 */
function personio_integration_command_enqueue_scripts(): void {
	// get path for the asset script.
	$script_asset_path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'dist/commands.asset.php';

	// bail if the asset script does not exist.
	if ( ! file_exists( $script_asset_path ) ) {
		return;
	}

	// embed script.
	$script_asset = require $script_asset_path;

	wp_enqueue_script(
		'personio-integration-command',
		trailingslashit( plugin_dir_url( __FILE__ ) ) . 'dist/commands.js',
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);
}
add_action( 'admin_enqueue_scripts', 'personio_integration_command_enqueue_scripts' );
