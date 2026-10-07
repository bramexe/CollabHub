<?php
include_once 'dbh.class.php';
include_once 'users.class.php';
include_once 'campaigns.class.php';

class Notifications extends Dbh {

    public static function get_user_notifications($user_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM notifications WHERE user_id = ? ORDER BY creation_datetime;';
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
        if (!self::get_notification($id))  { header("location: ../pages/inbox.php?error=campaign-not-found"); exit; }
        $conn = self::connect();
        $sql = 'DELETE FROM notifications WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header("location: ../pages/inbox.php");
    }

    public static function read_notification($notif_id) {
        if(!self::get_notification($notif_id)) { exit; }
        $conn = self::connect();
        $sql = 'UPDATE notifications SET status = "Read" WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$notif_id]);
    }

    public static function send_campaign_invite($user_id, $campaign_id, $manager_id) {
        if ($receiver_data = Users::get_user_data_by_id($user_id)) {
            if ($campaign_data = Campaigns::get_campaign($campaign_id)) {
                if ($manager_data = Users::get_user_data_by_id($manager_id)) {
                    $notification_title = 'Campaign Invite: ' . $campaign_data['name'];
                    $notification_content = 'You have been invited by ' . $manager_data['full_name'] . ' to participate in their campaign: ' . $campaign_data['name'] . ' ' .'<a href=../includes/accept_invite.inc.php?manager_id=' . $manager_id . '&user_id=' . $user_id . '&campaign_id=' . $campaign_id . '>Accept?</a>';
                    self::insert_notification($user_id, $notification_content, $notification_title);
                } else {
                    exit;
                }
            } else {
                exit;
            }
            
        } else {
            exit;
        }

    }

}