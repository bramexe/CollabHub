<?php

include_once '../classes/campaigns.class.php';
include_once '../classes/connections.class.php';

Campaigns::delete_campaign($_GET['id']);
foreach (Connections::get_campaign_connections($_GET['id']) as $conn) {
    Connections::delete_connection_by_campaign_id($conn['campaign_id']);
}
header('location: ../pages/my_campaigns.php');
?>