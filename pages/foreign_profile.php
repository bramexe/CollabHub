<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php';
    $id = $_GET['foreign_id'];
    $user_data = Users::get_user_data_by_id($id);
    ?>
    <main class="page-frame profile-frame">
        <a href="<?= $_GET['backpage'] ?>.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <section class="profile-overview">
            <div class="profile-picture-frame">
                <img src="../uploads/profile-pictures/placeholder.png" alt="Profile picture">
            </div>
            <div>
                <h1 class="profile-title">Profile</h1>
                <p class="profile-email"><?= $user_data['full_name'] ?></p> <p><?= $user_data['bio'] ?></p>
            </div>
        </section>

        <section class="profile-details">
            <div class="profile-detail">
                <span class="profile-detail-label">Specialty</span>
                <span><?= Specialties::get_specialty($user_data['specialty_id']) ?></span>
            </div>
            <div class="profile-detail">
                <span class="profile-detail-label">Role</span>
                <span><?= $user_data['role'] ?></span>
            </div>
            <div class="profile-detail">
                <span class="profile-detail-label">Email</span>
                <span><?= $user_data['email'] ?></span>
            </div>
            <div class="profile-detail">
                <span class="profile-detail-label">Phone</span>
                <span><?= $user_data['phone'] ?></span>
            </div>
            <div class="profile-detail">
                <span class="profile-detail-label">Member since</span>
                <span><?= $user_data['creation_datetime'] ?></span>
            </div>
        </section>
    </main>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>