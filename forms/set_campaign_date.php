<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Date</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
    include_once '../elements/header.php';
    $campaign_data = Campaigns::get_campaign($_GET['id']);
    $start_date = preg_match('/^\d{4}-\d{2}-\d{2}$/', $campaign_data['start_date']) && $campaign_data['start_date'] !== '0000-00-00' ? $campaign_data['start_date'] : '';
    $end_date = preg_match('/^\d{4}-\d{2}-\d{2}$/', $campaign_data['end_date']) && $campaign_data['end_date'] !== '0000-00-00' ? $campaign_data['end_date'] : '';
    ?>
    <div class="page-frame">
        <form action="../includes/action.inc.php?id=<?= $_GET['id'] ?>" class="form" method="post">
        <h2 class="page-title">Campaign: <?= $campaign_data['name'] ?></h2>
        <h3 class="form-label">Set Campaign Start Date</h3>
        <input type="date" name="start_date" value="<?= $start_date ?>" required> 
        <h3 class="form-label">Set Campaign End Date</h3>
        <input type="date" name="end_date" value="<?= $end_date ?>" required> 
        <button type="submit" name="set_campaign_date">Set</button>
        <p><a href="../pages/my_campaigns.php">Cancel</a></p>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
