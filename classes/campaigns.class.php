<?php

include_once 'dbh.class.php';

class Campaigns extends Dbh {

    public static function get_campaign($id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaigns WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($existing_campaign = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $existing_campaign;
        }
    }

    
    public static function set_campaign_status($id, $status) {
        if (!self::get_campaign($id)) { header('location: ../pages/dashboard.php?error=campaign-not-found'); exit;}
        $conn = self::connect();
        $sql = 'UPDATE campaigns SET status = ? WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$status, $id]);
        header('location: ../pages/my_campaigns.php');
    }

    public static function set_campaign_dates($id, $start, $end) {
        if (!self::get_campaign($id)) { header('location: ../pages/dashboard.php?error=campaign-not-found'); exit;}
        $conn = self::connect();
        $sql = 'UPDATE campaigns SET start_date = ?, end_date = ? WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$start, $end, $id]);
        header('location: ../pages/my_campaigns.php');
    }

    public static function set_campaign_budgets($id, $min, $max) {
        if (!self::get_campaign($id)){ header('location: ../pages/dashboard.php?error=campaign-not-found'); exit;}
        $conn = self::connect();
        $sql = 'UPDATE campaigns SET budget_min = ?, budget_max = ? WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$min, $max, $id]);
        header('location: ../pages/my_campaigns.php');

    }


    public static function get_manager_campaigns($user_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaigns WHERE manager_id = ? ORDER BY name;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        if ($campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $campaigns;
        }
        return null;
    }

    public static function get_all_campaigns() {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaigns ORDER BY name;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        if ($campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $campaigns;
        }
    }

    public static function insert_campaign(
        $name,
        $desc,
        $manager_id,
        $budget_max = null,
        $budget_min = null,
        $start_date = null,
        $end_date = null
        ) {

        $conn = self::connect();
        $sql = 'INSERT INTO campaigns (name, description, budget_min, budget_max, start_date, end_date, manager_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $desc, $budget_min ?? 0, $budget_max ?? 0, $start_date ?? 'No startdate set yet.', $end_date?? 'No enddate set yet.', $manager_id, 'Created']);
        self::insert_notification($manager_id, 'You have successfully made a new campaign: ' . $name, 'New Campaign' );
        }

}