<?php
// Include necessary files
require_once '../config/database.php';
require_once '../models/User.php';

class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        // Instantiate database connection
        $database = new Database();
        $this->db = $database->getConnection();

        // Instantiate User model
        $this->userModel = new User($this->db);
    }

    // Register a new user
    public function register($username, $fullname, $password, $profile_picture, $role) {
        // Perform validation if needed

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Call the UserModel to register the user
        return $this->userModel->register($username, $fullname, $hashed_password, $profile_picture, $role);
    }

    // Login user
    public function login($username, $password) {
        // Perform validation if needed

        // Call the UserModel to verify login
        return $this->userModel->login($username, $password);
    }

    // Reset user password
    public function resetPassword($username, $new_password) {
        // Perform validation if needed

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Call the UserModel to reset password
        return $this->userModel->resetPassword($username, $hashed_password);
    }
}

// Usage example:
// $authController = new AuthController();
// $authController->register($username, $fullname, $password, $profile_picture, $role);
// $authController->login($username, $password);
// $authController->resetPassword($username, $new_password);
