<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Include the JWT library
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Jwt_class {

	private $CI;
	private $jwt_key;

	public function __construct() {
		$this->CI = &get_instance();
		$this->jwt_key = '5b967e12a9d4cf551cd9548d9024400410908dc033ed0da849138c08e90ccc51';
	}

	public function generate_jwt($user) {
		$issuedAt = time();
		$expirationTime = $issuedAt + 3600;

		$payload = array(
			'iat' => $issuedAt,
			'exp' => $expirationTime,
			'data' => array(
				'user_id' => $user['id'],
				'email' => $user['email'],
			)
		);
		return JWT::encode($payload, $this->jwt_key, 'HS256');
	}

	public function validate_jwt($token) {
		try {
			$decoded = JWT::decode($token, new Key($this->jwt_key, 'HS256'));
			return (array) $decoded->data;
		} catch (Exception $e) {
			return false;
		}
	}
}
