<?php
/**
 * Mock AI Provider class.
 *
 * @package WP_AI_Client_POC
 */

namespace WP_AI_Client_POC\Providers;

use WP_AI_Client_POC\AI_Provider;

/**
 * Class Mock_Provider
 */
class Mock_Provider implements AI_Provider {
	/**
	 * Get the provider unique ID.
	 *
	 * @return string
	 */
	public function get_id(): string {
		return 'mock';
	}

	/**
	 * Get the provider display name.
	 *
	 * @return string
	 */
	public function get_name(): string {
		return 'Mock AI Provider';
	}

	/**
	 * Perform a completion request.
	 *
	 * @param array $args Arguments for the completion.
	 * @return array|\WP_Error
	 */
	public function chat( array $args ) {
		$prompt = isset( $args['prompt'] ) ? $args['prompt'] : '';
		return array(
			'text'  => 'This is a mock response to: ' . $prompt,
			'usage' => array(
				'prompt_tokens'     => 10,
				'completion_tokens' => 20,
			),
		);
	}
}
