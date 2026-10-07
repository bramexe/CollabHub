<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creators</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <div class="dashboard-frame">
        <h2 class="page-title"><?php if($role = $_POST['role'] == "creator"){echo 'Creators';} else { echo 'Campaign Managers';} ?></h2>
        <a href="../forms/user_search.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <table>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
                if ($input = $_POST['input']){
                    if ($role = $_POST['role']) {
                        if($found_users = Users::get_users_by_input($input)) {
                            if (empty($input)) {
                                foreach($found_users as $user) {
                                if($user['role'] == $role){ 
                                    echo "<tr>";
                                    echo "<td>" . $user['full_name'] . "</td>";
                                    echo "<td>" . Specialties::get_specialty($user['specialty_id']) . "</td>";
                                    echo "<td>" . $user['email'] . "</td>";
                                    echo "<td>" . $user['phone'] . "</td>";
                                    echo "<td><a href=../pages/foreign_profile.php?foreign_id=" . $user['id'] .  "&backpage=../forms/user_search>View Profile</a></td>";
                                    echo "</tr>";
                                } 
                            } 
                            } else {
                                foreach($found_users as $user) {
                                if($user['role'] == $role){ 
                                    echo "<tr>";
                                    echo "<td>" . $user['full_name'] . "</td>";
                                    echo "<td>" . Specialties::get_specialty($user['specialty_id']) . "</td>";
                                    echo "<td>" . $user['email'] . "</td>";
                                    echo "<td>" . $user['phone'] . "</td>";
                                    echo "<td><a href=../pages/foreign_profile.php?foreign_id=" . $user['id'] .  "&backpage=../forms/user_search>View Profile</a></td>";
                                    echo "</tr>";
                                } 
                            } 
                            }
                        } else {
                            echo '<tr>';
                            echo '<p>No users found.</p>';
                            echo '</tr>';
                        }  
                    }
                    
                } else {
                    
                }
            ?>
        </table>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
