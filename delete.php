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
    
    // Lakukan penghapusan data berdasarkan ID
    $sql = "DELETE FROM crud_device WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman home.php
        header('location: home.php');
        exit;
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>
