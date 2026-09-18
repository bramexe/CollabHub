<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabHub Login</title>
</head>
<body>
    <form action="../includes/action.inc.php" method="post">
        <h2>Login</h2>
        <h3>Email</h3>
        <input type="email" name="email" placeholder="Email" required>
        <h3>Password</h3>
        <input type="password" name="password" placeholder="Password" required>
        <br><br>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</body>
</html>