<?php 

session_start();

require_once 'classes/users.class.php';

if (!isset($_SESSION['id'])){
    header('location: index.php');
    exit;
}

$user_data = Users::get_user_data_by_id($_SESSION['id']);

if (!$user_data['role'] == 'admin') {
    header('location: index.php');
    exit;
}

$all_users = Users::get_all_users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Crud</title>
</head>
<body>
    <h2>Users Crud</h2>
    <p><a href="dashboard.php">Return to dashboard</a></p>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Specialty</th>
            <th>Bio</th>
            <th>Actions</th>
        </tr>
        <?php

        foreach($all_users as $user) {
            echo "<tr>";
            echo "<td>" . $user['full_name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['phone'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo "<td>" . $user['specialty'] . "</td>";
            echo "<td>" . $user['bio'] . "</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>