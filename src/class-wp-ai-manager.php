<?php
/**
 * WP AI Manager class.
 *
 * @package WP_AI_Client_POC
 */

namespace WP_AI_Client_POC;

/**
 * Class WP_AI_Manager
 */
class WP_AI_Manager {
	/**
	 * Registered providers.
	 *
	 * @var AI_Provider[]
	 */
	private static $providers = array();

	/**
	 * Register a provider.
	 *
	 * @param AI_Provider $provider The provider instance.
	 */
	public static function register_provider( AI_Provider $provider ) {
		self::$providers[ $provider->get_id() ] = $provider;
	}

	/**
	 * Get a provider by ID.
	 *
	 * @param string $id The provider ID.
	 * @return AI_Provider|null
	 */
	public static function get_provider( string $id ) {
		return isset( self::$providers[ $id ] ) ? self::$providers[ $id ] : null;
	}

	/**
	 * Get all registered providers.
	 *
	 * @return AI_Provider[]
	 */
	public static function get_providers(): array {
		return self::$providers;
	}
}
