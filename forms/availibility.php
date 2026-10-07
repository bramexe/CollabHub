<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availibity</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <div class="page-frame">
        <form action="../includes/action.inc.php" class="form" method="post">
        <a href="../pages/dashboard.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <h2 class="page-title">Availability</h2>
        <?php 
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach($days as $day) {
            echo '<h3 class="form-label">' . $day .' Availability</h3>';
            echo '<div class=availability-items>';
            echo '<input class=availability-input type=time name=start_time_' . strtolower($day) . ' value=09:00 >';
            echo '<input class=availability-input type=time name=end_time_' . strtolower($day) . ' value=17:00>';
            echo '</div>';
        }
        ?>
        

        
        <button type="submit" name="update_availability">Save</button>
        <a href="../pages/profile.php">Cancel</a>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>