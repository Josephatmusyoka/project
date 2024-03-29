<?php
require_once '../vendor/autoload.php'; // Include Composer's autoloader for JWT

use \Firebase\JWT\JWT;

class AuthUtils {
    // JWT secret key (change this to a secure random value)
    private static $secret_key = "your_secret_key";

    // Generate JWT token for user authentication
    public static function generateJWT($user_id, $username, $fullname, $role) {
        $issued_at = time();
        $expiration_time = $issued_at + (60 * 60); // Token expires in 1 hour

        $payload = array(
            "user_id" => $user_id,
            "username" => $username,
            "fullname" => $fullname,
            "role" => $role,
            "iat" => $issued_at,
            "exp" => $expiration_time
        );

        return JWT::encode($payload, self::$secret_key);
    }

    // Verify and decode JWT token
    public static function decodeJWT($token) {
        try {
            $decoded = JWT::decode($token, self::$secret_key, array('HS256'));
            return $decoded;
        } catch (Exception $e) {
            return null; // Token is invalid
        }
    }
}
