<?php

class Dbh {
    private static $connection;

    public static function connect(){
        self::$connection = null;
        self::$connection = new PDO('mysql:host=localhost;dbname=collabhub', 'root', '');
        return self::$connection;
    }

}