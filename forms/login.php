<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabHub Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page-frame">
        <form action="../includes/action.inc.php" class="form" method="post">
        <h2 class="page-title">Login</h2>
        <h3 class="form-label">Email</h3>
        <input type="email" name="email" placeholder="Email" required>
        <h3 class="form-label">Password</h3>
        <input type="password" name="password" placeholder="Password" required>
        <br><br>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
    </div>
    
</body>
</html>