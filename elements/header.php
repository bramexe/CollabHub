<?php
session_start();
if (!isset($_SESSION['id'])){
    header('location: ../forms/login.php');
    exit;
}
$id = $_SESSION['id'];
require_once '../classes/users.class.php';
require_once '../classes/specialties.class.php';

$user_data = Users::get_user_data_by_id($_SESSION['id']);

$role = Users::get_user_data_by_id($_SESSION['id'])['role'];

?>

<header class="site-header">
    <script src="../js/script.js"></script>
    <a class="header-logo" href="../index.php">CollabHub</a>
    <nav class="site-nav" aria-label="Main navigation">
        <ul>
            <li><a class="nav-link" href="../pages/dashboard.php">Dashboard</a></li>
            <li><a class="nav-link" href="../pages/profile.php">Profile</a></li>
            <li><a class="nav-link" href="../forms/availibility.php">Availibility</a></li>
            <?php if ($role == 'admin'){echo '<li><a class="nav-link" href="../pages/users_crud.php">Manage Users</a></li>';} ?>
            <?php if ($role == 'manager'){echo '<li><a class="nav-link" href="../forms/create_campaign.php">New Campaign</a></li>';} ?>
        </ul>
    </nav>
</header>