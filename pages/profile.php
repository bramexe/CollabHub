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
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page-frame">
        <h2 class="page-title">Profile</h2>
        <p>Logged in as <?= $user_data['email'] . ' ' ?><a href="../includes/logout.inc.php">Logout</a></p>
        <p>Your specialty is <?= Specialties::get_specialty($user_data['specialty_id']) ?></p>
        <p>Your role is <?= $user_data['role'] ?></p>  
        <p><a href="dashboard.php">Return to dashboard</a></p>
    </div>
</body>
</html>