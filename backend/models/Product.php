<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Product {
    private $conn;
    private $table_name = "products";

    // Product properties
    public $productID;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Add a new product
    public function addProduct($name, $description, $price, $quantity, $category) {
        // Query to insert new product
        $query = "INSERT INTO " . $this->table_name . " 
                  SET name = :name, description = :description, price = :price, 
                      quantity = :quantity, category = :category";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':category', $category);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Get all products
    public function getAllProducts() {
        // Query to retrieve all products
        $query = "SELECT * FROM " . $this->table_name;

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get a product by ID
    public function getProductById($productId) {
        // Query to retrieve product by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE productID = ?";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind productID parameter
        $stmt->bindParam(1, $productId);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Update a product
    public function updateProduct($productId, $name, $description, $price, $quantity, $category) {
        // Query to update product
        $query = "UPDATE " . $this->table_name . "
                  SET name = :name, description = :description, price = :price, 
                      quantity = :quantity, category = :category
                  WHERE productID = :productID";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(':productID', $productId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':category', $category);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete a product
    public function deleteProduct($productId) {
        // Query to delete product
        $query = "DELETE FROM " . $this->table_name . " WHERE productID = ?";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind productID parameter
        $stmt->bindParam(1, $productId);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
