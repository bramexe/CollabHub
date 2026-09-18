<?php 
session_start();
 if (isset($_SESSION['id'])){
        header('location: pages/dashboard.php');
        exit;
    }
    header('location: forms/login.php');
?>

