<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../classes/users.class.php';
require_once '../classes/availability.class.php';
require_once '../classes/campaigns.class.php';
require_once '../classes/connections.class.php';

if (isset($_POST['signup'])){
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $specialty = $_POST['specialty'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    Users::signup_user($email, $full_name, $phone, $specialty, $role, $password, $password_confirm);
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    Users::login_user($email, $password);
}

if (isset($_POST['create_campaign'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $min_budget = $_POST['min_budget'];
    $max_budget = $_POST['max_budget'];
    $desc = $_POST['description'];
    Campaigns::insert_campaign($name, $desc, $id, $max_budget, $min_budget);
    header('location: ../pages/my_campaigns.php?campaign=created');
    exit;
}
if(isset($_POST['edit_campaign'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $min_budget = $_POST['min_budget'];
    $max_budget = $_POST['max_budget'];
    $desc = $_POST['description'];
    Campaigns::update_campaign($id, $min_budget, $max_budget, $name, $desc);
    Connections::insert_notification(Campaigns::get_campaign($id)['manager_id'], 'You successfully updated campaign: ' . Campaigns::get_campaign($id)['name'] . '.', 'Updated Campaign');
    foreach(Connections::get_campaign_connections($id) as $connection) {
        Connections::insert_notification($connection['user_id'], 'The campaign:  ' . Campaigns::get_campaign($id)['name'] . ' was updated.', 'Updated Campaign');
    }
    header('location: ../pages/my_campaigns.php?campaign=created');
    exit;
}

if (isset($_POST['set_campaign_status'])) {
    if ($id = $_GET['id']) {
        $status = $_POST['status'];
        Campaigns::set_campaign_status($id, $status);
    }
}

if (isset($_POST['set_campaign_date'])) {
    $id = $_GET['id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    Campaigns::set_campaign_dates($id, $start_date, $end_date);
}

if (isset($_POST['set_campaign_budget'])) {
    $id = $_GET['id'];
    $min = $_POST['min_budget'];
    $max = $_POST['max_budget'];
    Campaigns::set_campaign_budgets($id, $min, $max);
}

if (isset($_POST['update_user'])) {
    if (!isset($_SESSION['id'])) {
        header('location: ../forms/login.php');
        exit;
    }

    $user_id = $_SESSION['id'];
    if ($user_id) {
        $name = $_POST['name'];
        $bio = $_POST['desc'];

        Users::update_user($user_id, $name, $bio);
    } else {
        header('location: ../pages/profile.php?error=unknown-error-occured');
    }
}

if (isset($_POST['update_availability'])) {
    if (!isset($_SESSION['id'])) {
        header('location: ../forms/login.php');
        exit;
    }

    $user_id = $_SESSION['id'];
    $monday_availability = ($_POST['start_time_monday'] ?? "00:00") . " - " . ($_POST['end_time_monday'] ?? "23:59");
    $tuesday_availability = ($_POST['start_time_tuesday'] ?? "00:00") . " - " . ($_POST['end_time_tuesday'] ?? "23:59");
    $wednesday_availability = ($_POST['start_time_wednesday'] ?? "00:00") . " - " . ($_POST['end_time_wednesday'] ?? "23:59");
    $thursday_availability = ($_POST['start_time_thursday'] ?? "00:00") . " - " . ($_POST['end_time_thursday'] ?? "23:59");
    $friday_availability = ($_POST['start_time_friday'] ?? "00:00") . " - " . ($_POST['end_time_friday'] ?? "23:59");
    Availability::update_availability($user_id, $monday_availability, $tuesday_availability, $wednesday_availability, $thursday_availability, $friday_availability);
}
