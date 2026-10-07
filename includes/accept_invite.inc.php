<?php

require_once '../classes/connections.class.php';
require_once '../classes/campaigns.class.php';
$user_id = $_GET['user_id'];
$campaign_id = $_GET['campaign_id'];
Connections::insert_connection($user_id, $campaign_id);
$name = Campaigns::get_campaign($$_GET["campaign_id"] );
header('location: ../pages/invite_accepted.php' );