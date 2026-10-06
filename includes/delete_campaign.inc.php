<?php

include_once '../classes/campaigns.class.php';

Campaigns::delete_campaign($_GET['id']);

?>