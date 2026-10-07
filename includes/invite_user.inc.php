<?php

include_once '../classes/notifications.class.php';

$campaign_id = $_GET['campaign_id'];
$manager_id = $_GET['manager_id'];
$user_id = $_GET['user_id'];
Notifications::send_campaign_invite($user_id, $campaign_id, $manager_id);
header('location: ../pages/my_campaigns.php');
