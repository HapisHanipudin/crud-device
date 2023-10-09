<?php
include "../config.php"; // Sertakan file konfigurasi database

session_start();
if (!isset($_SESSION["username"])) {}
    else {
    header('location: ../');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Periksa apakah kata sandi yang dimasukkan cocok dengan hash yang disimpan
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["user_id"];

            // Redirect ke halaman yang sesuai setelah login berhasil
            header("location: ../");
            exit();
        } else {
            $error = "Email atau kata sandi salah.";
        }
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
    <link rel="stylesheet" href="../logregister.css">
</head>
<body>
<div class="form-section back">
  <a href="../">Back To Home</a>
</div>
    <section class="section">
        <div class="form-box">
            <form class="form" action="" method="POST">
                <span class="title">Log In</span>
                <span class="subtitle">Log In with your own account.</span>
                <div class="form-container">
                    <input required type="email" name="email" class="input" placeholder="Email">
                    <input required type="password" name="password" class="input" placeholder="Password">
                </div>
                <button type="submit" name="submit">Log in</button>
                <?php
                if (isset($error)) {
                    echo "<div class='error'>$error</div>";
                }
                ?>
            </form>
            <div class="form-section">
                <p>Belum Punya Akun? <a href="../register/">Sign Up</a> </p>
            </div>
        </div>
    </section>
</body>
</html>
