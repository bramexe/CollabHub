<?php

require_once '../classes/users.class.php';

if (isset($_POST['signup'])){
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $specialty = $_POST['specialty'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    Users::signup_user($email, $full_name, $phone, $specialty, $role, $password, $password_confirm);
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    Users::login_user($email, $password);
}