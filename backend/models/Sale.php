<?php
class Sale {
    private $conn;
    private $table_name = "sales";

    // Sale properties
    public $sale_id;
    public $products_sold;
    public $quantity_sold;
    public $price_per_product;
    public $total_amount;
    public $vat;
    public $tax;
    public $profit;
    public $transaction_date;
    public $mode_of_payment;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Record a new sale
    public function recordSale($products_sold, $quantity_sold, $total_amount, $vat, $tax, $profit, $transaction_date, $mode_of_payment) {
        // Query to insert new sale
        $query = "INSERT INTO " . $this->table_name . " 
                  SET products_sold = :products_sold, quantity_sold = :quantity_sold, 
                      total_amount = :total_amount, vat = :vat, tax = :tax, profit = :profit, 
                      transaction_date = :transaction_date, mode_of_payment = :mode_of_payment";

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(':products_sold', $products_sold);
        $stmt->bindParam(':quantity_sold', $quantity_sold);
        $stmt->bindParam(':total_amount', $total_amount);
        $stmt->bindParam(':vat', $vat);
        $stmt->bindParam(':tax', $tax);
        $stmt->bindParam(':profit', $profit);
        $stmt->bindParam(':transaction_date', $transaction_date);
        $stmt->bindParam(':mode_of_payment', $mode_of_payment);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Get sales report
    public function getSalesReport() {
        // Query to retrieve sales report
        $query = "SELECT * FROM " . $this->table_name;

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Other methods for sales analysis reports, VAT and tax analysis, etc. can be added here
}
