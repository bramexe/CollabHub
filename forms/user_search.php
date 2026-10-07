<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Creators</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; 
    ?>
    <div class="dashboard-frame">
        <form class="form" action="../pages/users.php" method="post">
            <a href="../pages/dashboard.php"><img class="back-image" src="../uploads/img/back.png"></a>
            <h2 class="page-title">Find People</h2>
        <input name="input" type="text" placeholder="Search by name or specialty...">
        <select  name="role">
            <option value="creator">Creators</option>
            <option value="manager">Campaign Managers</option>
        </select>
        <button type="submit">Search</button>
        <p><a href="../pages/dashboard.php">Cancel</a></p>
        </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>