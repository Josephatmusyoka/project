<?php
// Start session
session_start();

// Define an empty error message variable
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        // Retrieve form data
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        // Include the Database class
        require_once("../../backend/config/database.php");

        // Create a new instance of the Database class
        $database = new Database();

        // Get the PDO connection object
        $pdo = $database->getConnection();

        // Prepare a SELECT statement
        $sql = "SELECT username, password FROM users WHERE username = :username";

        try {
            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();

            // Check if username exists
            if($stmt->rowCount() == 1){
                // Fetch row
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $username = $row["username"];
                $hashed_password = $row["password"];
                
                // Verify password
                if(password_verify($password, $hashed_password)){
                    // Password is correct, start a new session
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    
                    // Redirect user to dashboard page
                    header("location: dashboard.php");
                    exit();
                } else {
                    // Display an error message if password is incorrect
                    $error_message = "Invalid password.";
                }
            } else {
                // Display an error message if username doesn't exist
                $error_message = "User not found.";
            }
        } catch(PDOException $e) {
            // Display an error message if there's an exception
            $error_message = "Error: " . $e->getMessage();
        }
        
        // Close connection
        unset($pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

    <main>
        <!-- Error message -->
        <?php if(!empty($error_message)): ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- Login form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <!-- Login button -->
            <button type="submit">Login</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 My Web Application</p>
    </footer>
</body>
</html>
