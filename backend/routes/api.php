<?php
// Include necessary files
require_once '../controllers/authController.php';
require_once '../controllers/productController.php';
require_once '../controllers/saleController.php';

// Initialize classes
$authController = new AuthController();
$productController = new ProductController();
$saleController = new SaleController();

// API endpoints
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Register a new user
    if ($_POST['action'] === 'register') {
        $result = $authController->register($_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['profile_picture'], $_POST['role']);
        echo json_encode($result);
    }
    // Login user
    elseif ($_POST['action'] === 'login') {
        $result = $authController->login($_POST['username'], $_POST['password']);
        echo json_encode($result);
    }
    // Reset user password
    elseif ($_POST['action'] === 'reset_password') {
        $result = $authController->resetPassword($_POST['username'], $_POST['new_password']);
        echo json_encode($result);
    }
    // Add a new product
    elseif ($_POST['action'] === 'add_product') {
        $result = $productController->addProduct($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['category']);
        echo json_encode($result);
    }
    // Record a new sale
    elseif ($_POST['action'] === 'record_sale') {
        $result = $saleController->recordSale($_POST['products_sold'], $_POST['quantity_sold'], $_POST['total_amount'], $_POST['vat'], $_POST['tax'], $_POST['profit'], $_POST['transaction_date'], $_POST['mode_of_payment']);
        echo json_encode($result);
    }
}

// Add more API endpoints as needed

