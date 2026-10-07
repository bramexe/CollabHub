<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <div class="dashboard-frame">
        <a href="dashboard.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <h2 class="page-title">My Inbox</h2>
        <table>
            <tr>
                <th>Notifications</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
                if ($notifications = Notifications::get_user_notifications($id)) {
                    foreach($notifications as $notif) {
                        echo "<tr>";
                        echo "<td><a href=open_notification.php?id=" . $notif['id'] . ">" . $notif['title'] . "</a></td>";
                        echo "<td>" . $notif['status'] . "</td>";
                        echo "<td><a href=../includes/delete_notification.inc.php?notif_id=" . $notif['id'] . ">Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td><p>No notifications found.</p></td></tr>';
                }
            ?>
        </table>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>