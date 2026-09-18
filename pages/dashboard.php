<?php 
session_start();

if (!isset($_SESSION['id'])){
    header('location: ../forms/login.php');
    exit;
}

require_once '../classes/users.class.php';
require_once '../classes/specialties.class.php';

$user_data = Users::get_user_data_by_id($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="dashboard-frame">
        <h2 class="page-title">Dashboard</h2>
        <p>Logged in as <?= $user_data['email'] ?><a href="profile.php">View Profile</a></p>
        <?php if ($user_data['role'] == "admin") { echo "<p>Since you're an admin, you can edit users here: <a href=users_crud.php>Manage Users</a></p>"; } ?>
    </div>
</body>
</html>