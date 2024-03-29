<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'project'; // Replace with your actual database name
    private $username = 'root'; // Default XAMPP username
    private $password = ''; // Default XAMPP password (empty)
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Database connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
