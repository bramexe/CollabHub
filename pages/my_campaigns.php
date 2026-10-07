<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once '../elements/header.php'; ?>
    <main class="dashboard-frame">
        <a href="dashboard.php"><img class="back-image" src="../uploads/img/back.png"></a>
        <h1 class="page-title">My Campaigns</h1>
        <table>
            <tr>
                <th>Campaign</th>
                <th>Manager</th>
                <th>Budget Range</th>
                <th>Date</th>
                <th>Status</th>
                <th>Creators</th>
                <th>Actions</th>
            </tr>
        <?php

            # load manager campaigns
            if ($user_data['role'] == 'manager') {
                if ($campaigns = Campaigns::get_manager_campaigns($id)) {
                    foreach($campaigns as $campaign) {
                        echo "<tr>";
                        echo "<td>" . $campaign['name'] . "</td>";
                        echo "<td>" . Users::get_user_data_by_id($campaign['manager_id'])['full_name'] . "</td>";
                        # load budget
                        if ($campaign['budget_min'] != 0 && $campaign['budget_max'] != 0 ) {
                            echo "<td><a href=../forms/set_campaign_budget.php?id=" . $campaign['id'] . ">€" . $campaign['budget_min'] . " - €" . $campaign['budget_max'] . "</a></td>";
                        } else {
                            echo "<td><a href=../forms/set_campaign_budget.php?id=" . $campaign['id'] . ">Not set </a></td>";
                        }
                        # load date
                        if ($campaign['start_date'] != '0000-00-00' && $campaign['end_date'] != '0000-00-00') {
                            echo "<td><a href=../forms/set_campaign_date.php?id=". $campaign['id'] .">" . $campaign['start_date'] . " - " . $campaign['end_date'] . "</a></td>";
                        } else {
                            echo "<td><a href=../forms/set_campaign_date.php?id=". $campaign['id'] .">Not set</a></td>";
                        }
                        echo "<td><a href=../forms/set_campaign_status.php?id=" . $campaign['id'] . ">" . $campaign['status'] . "</a></td>";

                        echo "<td>";
                        if ($connections = Connections::get_campaign_connections($campaign['id'])) {
                            foreach($connections as $connection) {
                                $connection_user = Users::get_user_data_by_id($connection['user_id']);
                                echo "<a href=foreign_profile.php?foreign_id=" . $connection['user_id'] . "&backpage=my_campaigns>" . $connection_user['full_name'] . " </a>";
                            }
                        } else {
                            echo '<p>No connections</p>';
                        }
                        echo "</td>";

                        echo "<td><a href=../forms/edit_campaign.php?id=" . $campaign['id'] . ">Edit</a> <a class=\"delete-campaign\" href=../includes/delete_campaign.inc.php?id=" . $campaign['id'] . " onclick=\"return confirm('Are you sure you want to delete this campaign?');\">Delete</a> <a href=../forms/creators_search.php?campaign_id=" . $campaign['id'] . ">Invite</a>";
                        echo "</tr>";
                    }
                } else {
                  echo '<tr><td>No campaigns found</td></tr>';  
                }

            }

            
            # load creator campaigns
            if ($user_data['role'] == 'creator') {
                if ($campaigns = Connections::get_user_connections($_SESSION['id'])) {
                    foreach($campaigns as $campaign_conn) {
                        $campaign = Campaigns::get_campaign($campaign_conn['campaign_id']);
                        echo '<tr>';
                        echo "<td>" . $campaign['name'] . "</td>"; 
                        echo "<td><a href=foreign_profile.php?foreign_id=" . Users::get_user_data_by_id($campaign['manager_id'])['id'] . "&backpage=my_campaigns>" . Users::get_user_data_by_id($campaign['manager_id'])['full_name'] . "</a></td>";
                        # load budget
                        if ($campaign['budget_min'] != 0 && $campaign['budget_max'] != 0 ) {
                            echo "<td>€" . $campaign['budget_min'] . " - €" . $campaign['budget_max'] . "</td>";
                        } else {
                            echo "<td>Not set</td>";
                        }
                        # load date
                        if ($campaign['start_date'] != '0000-00-00' && $campaign['end_date'] != '0000-00-00') {
                            echo "<td>" . $campaign['start_date'] . " - " . $campaign['end_date'] . "</td>";
                        } else {
                            echo "<td>Not set</td>";
                        }
                        echo "<td>" . $campaign['status'] . "</td>";

                        echo "<td>";
                        if ($connections = Connections::get_campaign_connections($campaign['id'])) {
                            foreach($connections as $connection) {
                                $connection_user = Users::get_user_data_by_id($connection['user_id']);
                                echo "<a href=foreign_profile.php?foreign_id=" . $connection['user_id'] . "&backpage=my_campaigns>" . $connection_user['full_name'] . " </a>";
                            }
                        } else {
                            echo '<p>No connections</p>';
                        }
                        echo "</td>";

                        echo '</tr>';
                    }
                } else {
                    echo '<tr><p>No campaigns found</p></tr>';
                }
            }

        ?>
        </table>
        <a href="dashboard.php">Return to dashboard</a>
    </main>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>