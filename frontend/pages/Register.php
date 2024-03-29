<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>

    <main>
        <form action="register_process.php" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <!-- Add more roles as necessary -->
            </select>
            <br>
            
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture">
            <br>
            
            <button type="submit">Register</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 My Web Application</p>
    </footer>
</body>
</html>
