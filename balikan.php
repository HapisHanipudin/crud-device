<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('location: login.php');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}
include 'config.php';

// Periksa apakah parameter "id" telah diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan pembaruan status perangkat menjadi "Dipinjam" berdasarkan ID
    $sql = "UPDATE crud_device SET status = 'Ada' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika peminjaman berhasil, arahkan kembali ke halaman home.php
        header('location: home.php');
        exit;
    } else {
        echo "Terjadi kesalahan saat mengembalikan perangkat.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>
