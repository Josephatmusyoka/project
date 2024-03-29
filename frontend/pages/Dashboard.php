<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styling as needed */
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dashboard</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadHome()">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadProducts()">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadSales()">Sales</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Placeholder for dynamically loaded content -->
        <div id="mainContent"></div>
    </div>

    <!-- Modals for Add/Edit Product will go here -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="dashboard.js"></script> <!-- Your custom JS file -->
</body>
</html>
