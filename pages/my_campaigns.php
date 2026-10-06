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
    <main class="page-frame">
        <h1 class="page-title">My Campaigns</h1>
        <table>
            <tr>
                <th>Campaign</th>
                <th>Budget Range</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        <?php

            # load manager campaigns
            if ($user_data['role'] == 'manager') {
                if ($campaigns = Campaigns::get_manager_campaigns($id)) {
                    foreach($campaigns as $campaign) {
                        echo "<tr>";
                        echo "<td>" . $campaign['name'] . "</td>";

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
                        echo "<td><a href=../forms/edit_campaign.php?id=" . $campaign['id'] . ">Edit</a> <a href=../includes/delete_campaign.inc.php?id=" . $campaign['id'] . ">Delete</a> <a href=../forms/creators_search.php?campaign_id=" . $campaign['id'] . ">Invite</a>";
                        echo "</tr>";
                    }
                }

            }

            
            # load creator campaigns
            if ($user_data['role'] == 'creator') {
            
            }

        ?>
        </table>
        <a href="dashboard.php">Return to dashboard</a>
    </main>
    <?php include_once '../elements/footer.php'; ?>
</body>
</html>