<?php
class User {
    private $conn;
    private $table_name = "users";

    // User properties
    public $user_id;
    public $username;
    public $fullname;
    public $role;
    public $profile_picture;
    private $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register a new user
    public function register($username, $fullname, $hashed_password, $profile_picture, $role) {
        // Query to insert new user
        $query = "INSERT INTO " . $this->table_name . " 
                  SET username = :username, fullname = :fullname, password = :password, 
                      profile_picture = :profile_picture, role = :role";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':profile_picture', $profile_picture);
        $stmt->bindParam(':role', $role);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Verify user login
    public function login($username, $password) {
        // Query to verify login
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind username parameter
        $stmt->bindParam(':username', $username);

        // Execute query
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->user_id = $row['user_id'];
            $this->username = $row['username'];
            $this->password = $row['password'];

            // Verify password
            if (password_verify($password, $this->password)) {
                return true;
            }
        }

        return false;
    }

    // Reset user password
    public function resetPassword($username, $hashed_password) {
        // Query to update user password
        $query = "UPDATE " . $this->table_name . "
                  SET password = :password
                  WHERE username = :username";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
