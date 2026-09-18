<?php 
session_start();
 if (isset($_SESSION['id'])){
        header('location: dashboard.php');
        exit;
    }
    header('location: forms/login.php');
?>

