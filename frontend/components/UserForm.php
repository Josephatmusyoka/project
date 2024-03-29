<div class="user-form">
    <h2>User Registration</h2>
    <form action="submit_user.php" method="post" enctype="multipart/form-data">
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
</div>
