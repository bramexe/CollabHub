<?php
require_once 'dbh.class.php';
require_once 'specialties.class.php';

class Users extends Dbh {

    public static function signup_user($email, $full_name, $phone, $specialty_id, $role, $password, $password_confirm) {
        if (self::email_exists($email)) { header("location: ../forms/signup.php?error=email-already-registered"); exit; }
        if (self::phone_exists($phone)) { header("location: ../forms/signup.php?error=phone-already-registered"); exit; }
        if (!self::form_password_match($password, $password_confirm)) { header("location: ../forms/signup.php?error=password-doesnt-match"); exit; }
        $conn = self::connect();
        $sql = 'INSERT INTO users (email, phone, full_name, specialty_id, role, password) values (?, ?, ?, ?, ?, ?);';
        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$email, $phone, $full_name, $specialty_id, $role, $hashed_password]);
        header('location: ../index.php');
    }

    private static function form_password_match($password, $password_confirm) {
        if ($password == $password_confirm) {
            return true;
        }
        return false;
    }

    public static function login_user($email, $password) {
        if (!self::email_exists($email)) { header("location: ../forms/signup.php?error=email-not-found"); exit; }
        if (!self::password_match($email, $password)) { header("location: ../forms/signup.php?error=password-doesnt-match"); exit; }

        $existing_data = self::get_user_data_by_email($email);

        if ($existing_data['id']) {
            session_start();
            $_SESSION['id'] = $existing_data['id'];
            header('location: ../index.php');
            exit;
        }
        header('location: ../index.php?error=couldnt-login');
    }

    public static function password_match($email, $password) {
        if (!self::email_exists($email)) { return false; }
        $connection = self::connect();
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]);
        $existing_data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($hashed_password = $existing_data['password']) {
            if (password_verify($password, $hashed_password)) {
                return true;
            }
        }
        return false;
    }

    public static function get_user_data_by_email($email) {
        $connection = Dbh::connect();
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]);
        
        if ($existing_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $existing_data;
        }

        return null;
    }

    public static function get_user_data_by_id($id) {
        $connection = Dbh::connect();
        $sql = 'SELECT * FROM users WHERE id = ?;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id]);
        
        if ($existing_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $existing_data;
        }

        return null;
    }

    public static function update_user($id, $name, $email, $phone, $bio, $specialty) {
        if (!self::email_exists($email)) { header("location: ../pages/profile.php?error=email-not-found"); exit; }
        if (!self::phone_exists($phone)) { header("location: ../pages/profile.php?error=phone-not-found"); exit; }
        if (!self::get_user_data_by_id($id)) { header("location: ../pages/profile.php?data-not-found"); exit; }
        $conn = self::connect();
        $sql = 'UPDATE users SET full_name = ?, phone = ?, email = ?, bio = ?, specialty_id = ? WHERE id = ?;';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $phone, $email, $bio, $specialty, $id]);
        header("location: ../pages/profile.php");
    }

    public static function get_all_users() {
        $connection = self::connect();
        $sql = 'SELECT * FROM users;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([]);
        
        if ($all_users = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $all_users;
        }
    }

    private static function email_exists($email) {
        $connection = Dbh::connect();
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]);
        $existing_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_data) {
            return true;
        }

        return false;
    }

    private static function phone_exists($phone) {
        $connection = Dbh::connect();
        $sql = 'SELECT * FROM users WHERE phone = ?;';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$phone]);
        $existing_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_data) {
            return true;
        }

        return false;
    }
}