<?php
include "config.php"; // Sertakan file konfigurasi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Disarankan menggunakan metode pengenkripsian yang lebih aman seperti bcrypt
    // $username = $_POST['username'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        // Login berhasil
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_id"] = $row["user_id"];
        // Simpan informasi login ke sesi

        header("location: home.php"); // Ganti ini dengan halaman yang sesuai setelah login berhasil
        exit();
    } else {
        $error = "Email atau kata sandi salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css"></head>
<body>
    <section class="section">
        <div class="form-box">
            <form class="form" action="" method="POST">
          <span class="title">Log In</span>
          <span class="subtitle">Log In with your own account.</span>                <div class="form-container">
                    <input required
                    type="email" name="email" class="input" placeholder="Email">
                    <input required
                    type="password" name="password" class="input" placeholder="Password">
                </div>
                <button type="submit" name="submit">Log in</button>
                <?php
                if (isset($error)) {
                    echo "<div class='error'>$error</div>";
                }
                ?>
            </form>
            <div class="form-section">
                <p>Belum Punya Akun? <a href="register.php">Sign Up</a> </p>
            </div>
        </div>
    </section>
</body>
</html>
