<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Reset Password</h1>
    </header>

    <main>
        <form action="resetpassword_process.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            
            <button type="submit">Reset Password</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 My Web Application</p>
    </footer>
</body>
</html>
