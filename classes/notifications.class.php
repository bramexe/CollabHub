<?php
include_once 'dbh.class.php';

class Notifications extends Dbh {

    public static function get_user_notifications($user_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM notifications WHERE user_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        if ($notifications = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $notifications;
        }
        return null;
    }

    public static function get_notification($notif_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM notifications WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$notif_id]);
        if ($notification = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $notification;
        }
        return null;
    }

    public static function delete_notification($id) {

    }

    public static function read_notification($notif_id) {
        if(!self::get_notification($notif_id)) { exit; }
        $conn = self::connect();
        $sql = 'UPDATE notifications SET status = "Read" WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$notif_id]);
    }
}