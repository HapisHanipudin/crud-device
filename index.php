<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header('location: login.php');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
} else {
    header('location: home.php');
    exit;
}

?>