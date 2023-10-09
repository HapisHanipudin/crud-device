<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('location: login.php');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}
include '../config.php';

// Periksa apakah parameter "id" telah diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Periksa apakah data pengguna dengan ID tersebut ada di database
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Proses pembaruan data pengguna
        if (isset($_POST['submit'])) {
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            // Jika password tidak berubah, gunakan password yang ada di database
            if ($_POST['password'] !== "") {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $password = $row['password'];
            }

            // Lakukan pembaruan data pengguna di database
            $updateSql = "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE user_id = '$user_id'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                // Jika pembaruan berhasil, arahkan kembali ke halaman home.php
                header('location: home.php');
                exit;
            } else {
                echo "Terjadi kesalahan saat menyimpan perubahan.";
            }
        }
    } else {
        echo "Data pengguna tidak ditemukan atau ada lebih dari satu pengguna dengan ID tersebut.";
    }
} else {
    echo "Parameter ID tidak diberikan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../navfooter.css">
    <link rel="stylesheet" href="crud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<?php require '../navbar.php' ?>
    <section class="section" style="height: 100vh; align-items: center; justify-content: center; display: flex;">
        <div class="container">
            <h2>Edit User</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="UserId" class="form-label">User ID</label>
                    <input name="user_id" type="text" class="form-control" id="UserId" placeholder="User ID" value="<?php echo $row['user_id']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="Username" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                        <input name="password" type="password" class="form-control" id="Password" placeholder="Password">
                    </div>
                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>
</html>
