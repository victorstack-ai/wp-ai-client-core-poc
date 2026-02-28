<?php
/**
 * PHPUnit Bootstrap.
 *
 * @package WP_AI_Client_POC
 */

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

if ( ! function_exists( 'plugin_dir_path' ) ) {
	/**
	 * Stub for plugin_dir_path.
	 *
	 * @param string $file File path.
	 * @return string
	 */
	function plugin_dir_path( $file ) {
		return dirname( $file ) . '/';
	}
}

if ( ! function_exists( 'add_action' ) ) {
	/**
	 * Stub for add_action.
	 */
	function add_action() {}
}

require_once dirname( __DIR__ ) . '/vendor/autoload.php';
require_once dirname( __DIR__ ) . '/ai-client-core.php';
