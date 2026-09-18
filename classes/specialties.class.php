<?php

include_once 'dbh.class.php';

class Specialties extends Dbh {

    public static function get_specialty($specialty_id) {
        $conn = self::connect();
        $sql = 'SELECT * FROM specialties WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$specialty_id]);
        if ($existing_name = $stmt->fetch(PDO::FETCH_ASSOC)['name']) {
            return $existing_name;
        }
    }

    public static function get_all_specialties() {
        $conn = self::connect();
        $sql = 'SELECT * FROM specialties ORDER BY name ;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        if ($specialties = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $specialties;
        }
    }
    
}