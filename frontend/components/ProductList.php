<?php
// Include necessary files or make sure the data is available
// For example, if you're retrieving product data from the backend API, you might need to include a script that fetches the data

// Dummy data for demonstration
$products = [
    ["id" => 1, "name" => "Product 1", "price" => 10.99],
    ["id" => 2, "name" => "Product 2", "price" => 19.99],
    ["id" => 3, "name" => "Product 3", "price" => 14.99],
    // Add more products as needed
];
?>

<div class="product-list">
    <h2>Product List</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <span><?php echo $product['name']; ?></span>
                <span><?php echo '$' . $product['price']; ?></span>
                <!-- Add more product details if needed -->
            </li>
        <?php endforeach; ?>
    </ul>
</div>
