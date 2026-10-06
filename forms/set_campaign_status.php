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
        <h3 class="form-label">Set Campaign Status</h3>
        <select name="status" value="<?= $campaign_data['status'] ?>" required> 
            <option value="<?= strtolower($campaign_data['status']) ?>"><?= $campaign_data['status'] ?></option>
            <?php if ($campaign_data['status'] != 'Created') {
                echo '<option value="Created">Created</option>';
            }?>
            <?php if ($campaign_data['status'] != 'Active') {
                echo '<option value="Active">Active</option>';
            }?>
            <?php if ($campaign_data['status'] != 'Completed') {
                echo '<option value="Completed">Completed</option>';
            }?>
        </select>
        <button type="submit" name="set_campaign_status">Set</button>
        <p><a href="../pages/my_campaigns.php">Cancel</a></p>
    </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>
