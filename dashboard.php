<?php 
session_start();
require_once 'classes/users.class.php';
$user_data = Users::get_user_data_by_id($_SESSION['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Logged in as <?= $user_data['email'] ?> <a href="includes/logout.inc.php">Logout</a></p>
    <p>Your role is <?= $user_data['role'] ?></p>

    <?php
        if ($user_data['role'] == "admin") {
            echo "<p><a href=users_crud.php>Edit Users</a></p>";
        }
    ?>
</body>
</html>