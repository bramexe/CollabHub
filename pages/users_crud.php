<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Crud</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <div class="page-frame">
    <h2 class="page-title">Users Crud</h2>
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

        foreach(Users::get_all_users() as $user) {
            echo "<tr>";
            echo "<td>" . $user['full_name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['phone'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo "<td>" . Specialties::get_specialty($user['specialty_id']) . "</td>";
            echo "<td>" . $user['bio'] . "</td>";
            echo "</tr>";
        }

        ?>
    </table>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>