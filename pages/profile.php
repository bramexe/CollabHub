<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <main class="page-frame profile-frame">
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
        </section>

        <div class="profile-actions">
            <a href="../forms/edit_profile.php">Edit Profile</a>
            <a href="../includes/logout.inc.php">Log out</a>
        </div>
    </main>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>