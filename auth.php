<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user_id'])) {
    // Jika sudah login, tampilkan username
    $username = $_SESSION['username'];
    $userId = $_SESSION['user_id'];
} else {
    // Jika belum login, biarkan $username kosong
    $username = '';
    $userId = '';
}

?>
