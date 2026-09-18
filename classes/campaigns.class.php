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

    public static function get_all_campaigns() {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaigns ORDER BY name;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        if ($campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $campaigns;
        }
    }

    public static function get_manager_campaigns($manager_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaigns WHERE manager_id = ? ORDER BY start_date;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $campaigns;
        }
    }

    public static function insert_campaign(
        $name,
        $desc,
        $budget_max = null,
        $budget_min = null,
        $start_date = null,
        $end_date = null,
        $manager_id
        ) {

        $conn = self::connect();
        $sql = 'INSERT INTO campaigns (name, description, budget_min, budget_max, start_date, end_date, manager_id) VALUES (?, ?, ?, ?, ?, ?, ?);';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $desc, $budget_min, $budget_max, $start_date, $end_date, $manager_id]);
        }

}