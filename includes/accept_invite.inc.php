<?php

require_once '../classes/connections.class.php';

$user_id = $_GET['user_id'];
$campaign_id = $_GET['campaign_id'];
Connections::insert_connection($user_id, $campaign_id);