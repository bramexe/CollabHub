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
    $campaign_id = $_GET['campaign_id'];
    ?>
    <div class="dashboard-frame">
        <form action="../pages/creators.php?campaign_id=<?= $campaign_id ?>" method="post">
            <h2 class="page-title">Find Creators</h2>
        <input name="input" type="text" placeholder="Search by name or specialty..." value=" ">
        </form>
    </div>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>