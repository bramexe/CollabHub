<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Campaign</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    include_once '../elements/header.php'; 
    ?>
    <div class="page-frame">
        <form action="../includes/action.inc.php?id=<?= $id ?>" class="form" method="post">
        <a href="../pages/dashboard.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <h2 class="page-title">Create Campaign</h2>
        <h3 class="form-label">Campaign Name</h3>
        <input name="name" class="form-name-text-area"  required>
        <h3 class="form-label">Budget</h3>
        <input class="form-budget-select" type="number" name="min_budget" min="0" max="1000000" placeholder="min-budget"> <input class="form-budget-select" name="max_budget" type="number" min="0" max="1000000" placeholder="max-budget">
        <h3 class="form-label">Description</h3>
        <textarea name="description" class="form-desc-text-area" required></textarea>
        <button type="submit" name="create_campaign">Create</button>
        <p><a href="../pages/dashboard.php">Cancel</a></p>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
