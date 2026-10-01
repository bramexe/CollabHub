<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Campaign</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page-frame">
        <form action="../includes/action.inc.php" class="form" method="post">
        <h2 class="page-title">Create Campaign</h2>
        <h3 class="form-label">Campaign Name & Budget</h3>
        <textarea name="name" class="form-name-text-area" required></textarea>
        <input class="form-budget-select" type="number" min="0" max="1000000" placeholder="min-budget"> <input class="form-budget-select" type="number" min="0" max="1000000" placeholder="max-budget">
        <h3 class="form-label">Description</h3>
        <textarea name="description" class="form-desc-text-area" required></textarea>
        <br><br>
        <button type="submit" name="create_campaign">Create</button>
        <p><a href="../pages/dashboard.php">Cancel</a></p>
    </form>
    </div>
</body>
</html>