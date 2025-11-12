<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
session_start(); 

include 'koneksi.php';

$db = new database();

$action = $_GET['action'];

if ($action == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->login_user($username, $password);

    if ($user) {
        $_SESSION['login'] = TRUE;
        $_SESSION['username'] = $user['username'];
        $_SESSION['tipe_user'] = $user['tipe_user'];
        
        header("location:index.php"); 
    } else {
        header("location:login.php?error=gagal");
    }

} else if ($action == "register") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipe_user = 'Petugas'; 

    $success = $db->register_user($username, $password, $tipe_user);

    if ($success) {
        header("location:login.php?register=success");
    } else {
        header("location:register.php?error=exists");
    }

} else if ($action == "logout") {
    session_destroy(); 
    header("location:login.php");
}
?>