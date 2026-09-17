<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabHub Sign Up</title>
</head>
<body>
    <form action="includes/action.inc.php" method="post">
        <h2>Sign Up</h2>
        <h3>Full Name</h3>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <h3>Email</h3>
        <input type="email" name="email" placeholder="Email" required>
        <h3>Phone</h3>
        <input type="tel" name="phone" placeholder="Phone" required>
        <h3>Specialty</h3>
        <input type="text" name="specialty" placeholder="Specialty" required>
        <h3>Select Role</h3>
        <select name="role">
            <option value="creator">Creator</option>
            <option value="manager">Campaign Manager</option>
        </select>

        <h3>Password</h3>
        <input type="password" name="password" placeholder="Password" required>
        <br><br>
        <input type="password" name="password_confirm" placeholder="Confirm Password" required>
        <br><br>
        <button type="submit" name="signup">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</body>
</html>