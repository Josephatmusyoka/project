<?php
// Include necessary files
require_once '../config/database.php';
require_once '../models/Sale.php';

class SaleController {
    private $db;
    private $saleModel;

    public function __construct() {
        // Instantiate database connection
        $database = new Database();
        $this->db = $database->getConnection();

        // Instantiate Sale model
        $this->saleModel = new Sale($this->db);
    }

    // Record a new sale
    public function recordSale($products_sold, $quantity_sold, $total_amount, $vat, $tax, $profit, $transaction_date, $mode_of_payment) {
        // Perform validation if needed

        // Call the SaleModel to record the sale
        return $this->saleModel->recordSale($products_sold, $quantity_sold, $total_amount, $vat, $tax, $profit, $transaction_date, $mode_of_payment);
    }

    // Get sales report
    public function getSalesReport() {
        // Call the SaleModel to get sales report
        return $this->saleModel->getSalesReport();
    }

    // Other methods for sales analysis reports, VAT and tax analysis, etc. can be added here
}

// Usage example:
// $saleController = new SaleController();
// $saleController->recordSale($products_sold, $quantity_sold, $total_amount, $vat, $tax, $profit, $transaction_date, $mode_of_payment);
// $saleController->getSalesReport();
// Other methods can be called similarly
