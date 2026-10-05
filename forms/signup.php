<?php
 require_once '../classes/specialties.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabHub Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="page-frame">
    <form action="../includes/action.inc.php" class="form" method="post">
        <h2 class="page-title">Sign Up</h2>
        <h3 class="form-label">Full Name</h3>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <h3 class="form-label">Email</h3>
        <input type="email" name="email" placeholder="Email" required>
        <h3 class="form-label">Phone</h3>
        <input type="tel" name="phone" placeholder="Phone" required>

        <h3 class="form-label">Specialty</h3>
        <select name="specialty">
            <?php
            foreach (Specialties::get_all_specialties() as $specialty) {
                echo "<option value=$specialty[id] > $specialty[name] </option>";
            }
            ?>
        </select>

        <h3 class="form-label">Select Role</h3>
        <select name="role">
            <option value="creator">Creator</option>
            <option value="manager">Campaign Manager</option>
        </select>

        <h3 class="form-label">Password</h3>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirm" placeholder="Confirm Password" required>
        <button type="submit" name="signup">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</body>
</html>