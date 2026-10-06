<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Budget</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    include_once '../elements/header.php';
    $campaign_data = Campaigns::get_campaign($_GET['id']); ?>
    <div class="page-frame">
        <form action="../includes/action.inc.php?id=<?= $_GET['id'] ?>" class="form" method="post">
        <h2 class="page-title">Campaign: <?= $campaign_data['name'] ?></h2>
        <h3 class="form-label">Set Campaign Min Budget</h3>
        <input type="number" name="min_budget" min="0" value="<?= $campaign_data['budget_min'] ?>" required> 
        <h3 class="form-label">Set Campaign Max Budget</h3>
        <input type="number" name="max_budget" min="0" value="<?= $campaign_data['budget_max'] ?>" required> 
        <button type="submit" name="set_campaign_budget">Set</button>
        <p><a href="../pages/my_campaigns.php">Cancel</a></p>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
