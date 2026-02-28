<?php
/**
 * Plugin Name: WP AI Client Core POC
 * Description: A proof of concept for the WordPress 7.0 WP AI Client core merge proposal.
 * Version: 0.1.0
 * Author: VictorStack AI
 *
 * License: GPL-2.0-or-later * @package WP_AI_Client_POC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_AI_Client_POC\WP_AI_Manager;
use WP_AI_Client_POC\Providers\Mock_Provider;

// Define plugin constants.
define( 'WP_AI_CLIENT_POC_VERSION', '0.1.0' );
define( 'WP_AI_CLIENT_POC_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Simple autoloader for the POC.
 */
spl_autoload_register(
	function ( $class_name ) {
		$prefix   = 'WP_AI_Client_POC\\';
		$base_dir = WP_AI_CLIENT_POC_PATH . 'src/';

		$len = strlen( $prefix );
		if ( 0 !== strncmp( $prefix, $class_name, $len ) ) {
			return;
		}

		$relative_class = substr( $class_name, $len );
		$parts          = explode( '\\', $relative_class );
		$class          = array_pop( $parts );
		$path           = str_replace( '_', '-', strtolower( $class ) );
		$sub_dir        = '';
		if ( ! empty( $parts ) ) {
			$sub_dir = str_replace( '\\', '/', implode( '/', $parts ) ) . '/';
		}

		$file = $base_dir . $sub_dir . 'class-' . $path . '.php';

		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

// Initialize the plugin.
add_action(
	'plugins_loaded',
	function () {
		// Register the mock provider.
		WP_AI_Manager::register_provider( new Mock_Provider() );
	}
);

// Register WP-CLI command.
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command(
		'ai chat',
		function ( $args, $assoc_args ) {
			$prompt      = isset( $args[0] ) ? $args[0] : 'Hello';
			$provider_id = isset( $assoc_args['provider'] ) ? $assoc_args['provider'] : 'mock';

			$provider = WP_AI_Manager::get_provider( $provider_id );
			if ( ! $provider ) {
				WP_CLI::error( "Provider '$provider_id' not found." );
			}

			$response = $provider->chat( array( 'prompt' => $prompt ) );
			if ( is_wp_error( $response ) ) {
				WP_CLI::error( $response->get_error_message() );
			}

			WP_CLI::log( 'Response from ' . $provider->get_name() . ':' );
			WP_CLI::success( $response['text'] );
		}
	);
}
