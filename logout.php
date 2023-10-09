<?php
session_start();

// Simpan URL halaman terakhir yang dikunjungi
if (isset($_SESSION['last_visited_page'])) {
    $last_visited_page = $_SESSION['last_visited_page'];
} else {
    $last_visited_page = 'index.php'; // Jika tidak ada data, arahkan ke halaman default
}

// Hancurkan sesi
session_destroy();

// Arahkan pengguna ke halaman terakhir yang dikunjungi
header('Location: ' . $last_visited_page);
exit;
?>
