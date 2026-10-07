<?php

include_once 'dbh.class.php';

class Connections extends Dbh {

    public static function insert_connection($user_id, $campaign_id) {
        if (self::connection_exists($user_id, $campaign_id)) { header('location: ../pages/dashboard.php?error=connecton-already-exists'); exit; }
        $conn = self::connect();
        $sql = 'INSERT INTO campaign_connections (user_id, campaign_id) VALUES (?, ?);';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $campaign_id]);
    }

    public static function connection_exists($user_id, $campaign_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaign_connections WHERE user_id = ? AND campaign_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $campaign_id]);
        if ($stmt->fetch(PDO::FETCH_ASSOC) || $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return true;
        }
        return false;
    }

    public static function delete_connection_by_campaign_id($campaign_id) {
        $conn = self::connect();
        $sql = 'DELETE FROM campaign_connections WHERE campaign_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$campaign_id]);
    }

    public static function get_user_connections($id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaign_connections WHERE user_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($results = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $results;
        }
        return null;
    }

     public static function get_campaign_connections($id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM campaign_connections WHERE campaign_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($results = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $results;
        }
        return null;
    }

}