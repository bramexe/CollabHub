<?php

class Dbh {
    private static $connection;

    public static function connect(){
        self::$connection = null;
        self::$connection = new PDO('mysql:host=localhost;dbname=collabhub', 'root', '');
        return self::$connection;
    }

    public static function insert_notification($user_id, $content, $title) {
        $conn = self::connect();
        $sql = 'INSERT INTO notifications (user_id, content, title, status) VALUES (?,?,?,?);';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $content, $title, 'unread']);
    }

}