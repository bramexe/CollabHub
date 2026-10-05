<?php
include_once 'dbh.class.php';

class Availability extends Dbh {
    public static function update_availability($user_id, $mon, $tue, $wed, $thu, $fri) {
        $conn = self::connect();
        if (self::get_availability($user_id)) { 
            $sql = 'UPDATE availability SET monday_availability = ?, tuesday_availability = ?, wednesday_availability = ?, thursday_availability = ?, friday_availability = ? WHERE user_id = ?;';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$mon, $tue, $wed, $thu, $fri, $user_id]);
         } else {
            $sql = 'INSERT INTO availability (user_id, monday_availability, tuesday_availability, wednesday_availability, thursday_availability, friday_availability) VALUES (?, ?, ?, ?, ?, ?);';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$user_id, $mon, $tue, $wed, $thu, $fri]);
         }
        
        
        header('location: ../index.php');
    }

    public static function get_availability($user_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM availability WHERE user_id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        
        if($results = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $results;
        }
        return false;
    }
}