<?php
// Include necessary files
require_once '../config/database.php';
require_once '../models/Product.php';

class ProductController {
    private $db;
    private $productModel;

    public function __construct() {
        // Instantiate database connection
        $database = new Database();
        $this->db = $database->getConnection();

        // Instantiate Product model
        $this->productModel = new Product($this->db);
    }

    // Add a new product
    public function addProduct($name, $description, $price, $quantity, $category) {
        // Perform validation if needed

        // Call the ProductModel to add the product
        return $this->productModel->addProduct($name, $description, $price, $quantity, $category);
    }

    // Get all products
    public function getAllProducts() {
        // Call the ProductModel to get all products
        return $this->productModel->getAllProducts();
    }

    // Get a product by ID
    public function getProductById($productId) {
        // Call the ProductModel to get product by ID
        return $this->productModel->getProductById($productId);
    }

    // Update a product
    public function updateProduct($productId, $name, $description, $price, $quantity, $category) {
        // Perform validation if needed

        // Call the ProductModel to update the product
        return $this->productModel->updateProduct($productId, $name, $description, $price, $quantity, $category);
    }

    // Delete a product
    public function deleteProduct($productId) {
        // Call the ProductModel to delete the product
        return $this->productModel->deleteProduct($productId);
    }
}

// Usage example:
// $productController = new ProductController();
// $productController->addProduct($name, $description, $price, $quantity, $category);
// $productController->getAllProducts();
// $productController->getProductById($productId);
// $productController->updateProduct($productId, $name, $description, $price, $quantity, $category);
// $productController->deleteProduct($productId);
