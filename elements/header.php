<?php
session_start();
if (!isset($_SESSION['id'])){
    header('location: ../forms/login.php');
    exit;
}
$id = $_SESSION['id'];
require_once '../classes/users.class.php';
require_once '../classes/specialties.class.php';
require_once '../classes/campaigns.class.php';
require_once '../classes/notifications.class.php';
require_once '../classes/connections.class.php';
require_once '../classes/availability.class.php';
require_once '../includes/messages.inc.php';
$user_data = Users::get_user_data_by_id($_SESSION['id']);

$role = Users::get_user_data_by_id($_SESSION['id'])['role'];

$error = $_GET['error'] ?? '';

if (isset($messages[$error])) {
    echo '<div class="form-error" role="alert">'
        . $messages[$error]
        . '</div>';
}

?>

<header class="site-header">
    <a class="header-logo" href="../index.php">CollabHub</a>
    <nav class="site-nav" aria-label="Main navigation">
        <ul>
            <li><a class="nav-link" href="../pages/dashboard.php"><img class="nav-bar-image" src="../uploads/img/dashboard.png"></a></li>
            <?php if ($role == 'admin'){echo '<li><a class="nav-link" href="../pages/users_crud.php"><img class="nav-bar-image" src="../uploads/img/manage_users.png"></a></li>';} ?>
            <?php if ($role == 'manager'){echo '<li><a class="nav-link" href="../forms/create_campaign.php"><img class="nav-bar-image" src="../uploads/img/plus.png"></a></li>';} ?>
            <li><a class="nav-link" href="../pages/my_campaigns.php"><img class="nav-bar-image" src="../uploads/img/campaign.png"></a></li>
            <li><a class="nav-link" href="../pages/profile.php?backpage=dashboard"><img class="nav-bar-image" src="../uploads/img/profile.png"></a></li>
            <li><a class="nav-link" href="../forms/availibility.php"><img class="nav-bar-image" src="../uploads/img/clock.png"></a></li>
            <li><a class="nav-link" href="../forms/user_search.php"><img class="nav-bar-image" src="../uploads/img/find_people.png"></a></li>
            <li><a class="nav-link" href="../pages/inbox.php"><img class="nav-bar-image" src="../uploads/img/mailbox.png"></a></li>
                 
        </ul>
    </nav>
</header>