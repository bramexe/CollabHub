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
        <h2 class="page-title">Creators</h2>
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
                    if($found_users = Users::get_users_by_input($input)) {
                        foreach($found_users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['full_name'] . "</td>";
                            echo "<td>" . Specialties::get_specialty($user['specialty_id']) . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['phone'] . "</td>";
                            echo "<td><a href=../includes/invite_user.inc.php?user_id=" . $user['id'] . "&manager_id=" . $id . '&campaign_id=' . $_GET['campaign_id'] . ">Send Invite</a></td>";
                            echo "</tr>";
                        }   
                    }
                } else {
                    if($users = Users::get_users_by_role('creator')) {
                        foreach($users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['full_name'] . "</td>";
                            echo "<td>" . Specialties::get_specialty($user['specialty_id']) . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['phone'] . "</td>";
                            echo "</tr>";
                        }   
                    }
                }


            ?>
        </table>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>