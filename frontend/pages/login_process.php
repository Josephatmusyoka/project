<?php
// Start session
session_start();

// Include your database connection file
require_once("../../backend/config/database.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connection to the database
    $conn = // Your database connection logic here

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Check if the user exists
        $user = $result->fetch_assoc();
        
        // Verify password (assuming you are using password hashing)
        if (password_verify($password, $user['password'])) {
            // Password is correct, so start a new session
            session_regenerate_id();
            
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id']; // Or whatever user identifier you have
            $_SESSION['username'] = $username;
            
            // Redirect user to dashboard page
            header("Location: dashboard.php");
            exit;
        } else {
            // If password is not valid, show an error
            $error = "Invalid username or password.";
        }
    } else {
        // If username does not exist
        $error = "Invalid username or password.";
    }
    
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
