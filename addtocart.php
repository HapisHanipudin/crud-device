<?php 

include 'auth.php';
if (!isset($_SESSION["username"])) {
    header('location: login/');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}
include 'config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan penambahan data ke tabel cart berdasarkan ID
    $sql = "INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES ('$id', '{$_SESSION["user_id"]}', 1)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect kembali ke halaman sebelumnya (misalnya, halaman produk) setelah menambahkan produk
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: {$_SERVER['HTTP_REFERER']}#$id");
            exit;
        }
    } else {
        echo "Terjadi kesalahan saat menambah ke keranjang data.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>

?>