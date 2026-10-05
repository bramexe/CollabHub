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
        <h2 class="page-title">Availability</h2>
        <?php 
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach($days as $day) {
            echo '<h3 class="form-label">' . $day .' Availability</h3>';
            echo "<label for=start_time" . $day . ">From</label>";
            echo '<input type="time" name="start_time"' . $day . '>';
            echo"<label for=start_time" . $day . ">Until</label>";
            echo '<input type="time" name="end_time"' . $day . '>';
        }
        ?>
        <button type="submit" name="update_availibility">Save</button>
        <a href="../pages/profile.php">Cancel</a>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>