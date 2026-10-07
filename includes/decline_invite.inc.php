<?php
require_once '../classes/campaigns.class.php';
require_once '../classes/notifications.class.php';
require_once '../classes/users.class.php';
$manager_id = $_GET['manager_id'];
$campaign_id = $_GET['campaign_id'];
$user_id = $_GET['user_id'];
$user_data = Users::get_user_data_by_id($user_id);
$campaign_data = Campaigns::get_campaign($campaign_id);

$content = 'Your invite for campaign: ' . $campaign_data['name'] . ' has been declined by ' . $user_data['full_name'] . '.';
Notifications::insert_notification($manager_id, $content, 'Invite Declined');
header('location: ../pages/inbox.php');