<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Campaign</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; 
    $campaign = Campaigns::get_campaign($_GET['id']);
    ?>

    <div class="page-frame">
        <form action="../includes/action.inc.php?id=<?= $_GET['id'] ?>" class="form" method="post">
        <h2 class="page-title">Edit Campaign</h2>
        <h3 class="form-label">Campaign Name</h3>
        <input name="name" class="form-name-text-area" value="<?= $campaign['name'] ?>" required>
        <h3 class="form-label">Budget</h3>
        <input class="form-budget-select" type="number" value="<?= $campaign['budget_min'] ?>" name="min_budget" min="0" max="1000000"  placeholder="min-budget"> <input class="form-budget-select" value="<?= $campaign['budget_max'] ?>" name="max_budget" type="number" min="0" max="1000000" placeholder="max-budget">
        <h3 class="form-label">Description</h3>
        <textarea name="description" class="form-desc-text-area" required><?= htmlspecialchars($campaign['description']) ?></textarea>
        <button type="submit" name="edit_campaign">Update</button>
        <p><a href="../pages/my_campaigns.php">Cancel</a></p>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
