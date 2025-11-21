<?php
/**
 * Tasks to run during uninstallation of this plugin.
 *
 * @package personio-integration-command
 */

// if uninstall.php is not called by WordPress, die.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// do nothing if the PHP version is not 8.1 or newer.
if ( PHP_VERSION_ID < 80100 ) { // @phpstan-ignore smaller.alwaysFalse
	return;
}

// nothing to do here.
