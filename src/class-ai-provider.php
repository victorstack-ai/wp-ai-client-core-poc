<?php
/**
 * AI Provider interface.
 *
 * @package WP_AI_Client_POC
 */

namespace WP_AI_Client_POC;

/**
 * Interface AI_Provider
 */
interface AI_Provider {
	/**
	 * Get the provider unique ID.
	 *
	 * @return string
	 */
	public function get_id(): string;

	/**
	 * Get the provider display name.
	 *
	 * @return string
	 */
	public function get_name(): string;

	/**
	 * Perform a completion request.
	 *
	 * @param array $args Arguments for the completion.
	 * @return array|\WP_Error
	 */
	public function chat( array $args );
}
