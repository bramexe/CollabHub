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
    <form action="../includes/action.inc.php?id=<?= $user_data['id'] ?>" method="post">
        <main class="page-frame profile-frame">
        <section class="profile-overview">
            <div class="profile-picture-frame">
                <img src="../uploads/profile-pictures/placeholder.png" alt="Profile picture" id="profile-picture">
            </div>
            <div>
                <h1 class="profile-title">Edit Profile</h1>
            </div>
        </section>

        <section class="profile-details">
            <div class="profile-detail">
            <p>Name</p>
            <input class="profile-detail-label" name="name" value="<?= $user_data['full_name'] ?>">
            </div>
            <div class="profile-detail">
            <p>Description</p>
            <input class="profile-detail-label" name="desc" value="<?= $user_data['bio'] ?>">
            </div>
            <div class="profile-detail">
            <p>Email</p>
            <input class="profile-detail-label" name="email" value="<?= $user_data['email'] ?>">
            </div>
            <div class="profile-detail">
            <p>Phone</p>
            <input class="profile-detail-label" name="phone" value="<?= $user_data['phone'] ?>">
            </div>
            <div class="profile-detail">
            <p>Specialty</p>
            <select class="profile-detail-label" name="specialty" >
            <?php
            foreach (Specialties::get_all_specialties() as $specialty) {
                echo "<option value=$specialty[id] > $specialty[name] </option>";
            }
            ?>
            </select>
            </div>
            </section>

        <div class="profile-actions">
            <a href="../pages/profile.php">Cancel</a>
            <button type="submit" name="update_user">Update</button>
        </div>
    </main>
    </form>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>