<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <div class="dashboard-frame">
        <?php
        if ($notif_id = $_GET['id']) {
            if ($notif = Notifications::get_notification($notif_id)) {
                Notifications::read_notification($notif_id);
                echo '<h2 class=page-title>' . $notif['title'] . '</h2>';
                echo '<p> Message: ' . $notif['content'] . '</p>';
            }
        } else {

        }
        ?>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>