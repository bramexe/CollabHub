<?php

include_once '../classes/notifications.class.php';

$notif_id = $_GET['notif_id'];

Notifications::delete_notification($notif_id);
header('location: ../pages/inbox.php');


?>