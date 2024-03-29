<?php
// Include the Database class
require_once("../../backend/config/database.php");

// Create a new instance of the Database class
$database = new Database();

// Get the PDO connection object
$pdo = $database->getConnection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $username = $fullname = $email = $password = $role = "";
    
    // Process form data when form is submitted
    if(isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["role"])) {
        // Validate input
        $username = trim($_POST["username"]);
        $fullname = trim($_POST["fullname"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $role = $_POST["role"];
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, fullname, email, password, role) VALUES (:username, :fullname, :email, :password, :role)";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":fullname", $param_fullname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":role", $param_role, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_fullname = $fullname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
            $param_role = $role;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
