<div class="sale-form">
    <h2>Record a New Sale</h2>
    <form action="submit_sale.php" method="post">
        <label for="products_sold">Products Sold:</label>
        <input type="text" id="products_sold" name="products_sold" required>
        <br>
        
        <label for="quantity_sold">Quantity Sold:</label>
        <input type="number" id="quantity_sold" name="quantity_sold" required>
        <br>
        
        <label for="total_amount">Total Amount:</label>
        <input type="number" id="total_amount" name="total_amount" required>
        <br>
        
        <label for="vat">VAT:</label>
        <input type="number" id="vat" name="vat" required>
        <br>
        
        <label for="tax">Tax:</label>
        <input type="number" id="tax" name="tax" required>
        <br>
        
        <label for="profit">Profit:</label>
        <input type="number" id="profit" name="profit" required>
        <br>
        
        <label for="transaction_date">Transaction Date:</label>
        <input type="date" id="transaction_date" name="transaction_date" required>
        <br>
        
        <label for="mode_of_payment">Mode of Payment:</label>
        <select id="mode_of_payment" name="mode_of_payment" required>
            <option value="cash">Cash</option>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
            <!-- Add more payment options if needed -->
        </select>
        <br>
        
        <button type="submit">Submit Sale</button>
    </form>
</div>
