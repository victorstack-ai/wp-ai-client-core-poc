<?php
/**
 * Test AI Manager.
 *
 * @package WP_AI_Client_POC
 */

use PHPUnit\Framework\TestCase;
use WP_AI_Client_POC\WP_AI_Manager;
use WP_AI_Client_POC\Providers\Mock_Provider;

require_once __DIR__ . '/class-wp-error.php';

/**
 * Class Test_AI_Manager
 */
class AI_Manager_Test extends TestCase {
	/**
	 * Test provider registration.
	 */
	public function test_provider_registration() {
		$provider = new Mock_Provider();
		WP_AI_Manager::register_provider( $provider );

		$this->assertSame( $provider, WP_AI_Manager::get_provider( 'mock' ) );
	}

	/**
	 * Test mock provider chat.
	 */
	public function test_mock_provider_chat() {
		$provider = new Mock_Provider();
		$response = $provider->chat( array( 'prompt' => 'Test' ) );

		$this->assertArrayHasKey( 'text', $response );
		$this->assertStringContainsString( 'Test', $response['text'] );
	}
}
