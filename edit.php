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

    // Periksa apakah data perangkat dengan ID tersebut ada di database
    $sql = "SELECT * FROM crud_device WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Proses pembaruan data perangkat
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $keeper_id = $_POST['keeper_id'];
            $owner = $_POST['owner'];
            $loker = $_POST['loker'];
            $category = $_POST['category'];
            $status = $_POST['status'];

            // Lakukan pembaruan data perangkat di database
            $updateSql = "UPDATE crud_device SET id = '$id', keeper_id = '$keeper_id', owner = '$owner', loker = '$loker', category = '$category', status = '$status' WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                // Jika pembaruan berhasil, arahkan kembali ke halaman home.php
                header('location: home.php');
                exit;
            } else {
                echo "Terjadi kesalahan saat menyimpan perubahan.";
            }
        }
    } else {
        echo "Data perangkat tidak ditemukan.";
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
    <title>Edit Device</title>
    <link rel="stylesheet" href="crud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="header">
      <div class="menu">
        <a class="buton" href="home.php">Home</a>
        <a class="buton" href="device.php">Add Device</a>
        <span>
          Device Keeper: <strong><?php echo $_SESSION['username'] ?></strong>
          User ID: <?php echo $_SESSION['user_id'] ?>
        </span>
      </div>
      <!-- Example single danger button -->
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Account
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
          <li><a class="dropdown-item text-danger" href="delacc.php?id=<?php echo $_SESSION['user_id'] ?>">Delete Account</a></li>
        </ul>
      </div>
    </div>
    <section class="section">
        <div class="container">
            <h2>Edit Device</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="DeviceId" class="form-label">Device Id</label>
                    <input name="id" type="text" class="form-control" id="DeviceId" placeholder="Device Id" value="<?php echo $row['id']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="DeviceOwner" class="form-label">Device Owner</label>
                    <input name="owner" type="text" class="form-control" id="DeviceOwner" placeholder="Device Owner" value="<?php echo $row['owner']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="DeviceLoker" class="form-label">Device Loker</label>
                    <input name="loker" type="text" class="form-control" id="DeviceLoker" placeholder="Device Loker" value="<?php echo $row['loker']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="DeviceKeeper" class="form-label">Device Keeper</label>
                    <select name="keeper_id" class="form-select" aria-label="DeviceKeeper" id="DeviceKeeper" required>
                        <?php
                        // Query untuk mendapatkan semua nama pengguna (username)
                        $userQuery = "SELECT user_id, username FROM user";
                        $userResult = mysqli_query($conn, $userQuery);

                        if (mysqli_num_rows($userResult) > 0) {
                            while ($userRow = mysqli_fetch_assoc($userResult)) {
                                // Tentukan opsi yang dipilih berdasarkan keeper_id yang ada di database perangkat
                                $selected = ($userRow['user_id'] == $row['keeper_id']) ? 'selected' : '';
                                echo '<option value="' . $userRow['user_id'] . '" ' . $selected . '>' . $userRow['username'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="DeviceCategory" class="form-label">Device Category</label>
                    <select name="category" class="form-select" aria-label="DeviceCategory" id="DeviceCategory" required>
                        <option value="Handphone" <?php if ($row['category'] == 'Handphone') echo 'selected'; ?>>Handphone</option>
                        <option value="Laptop" <?php if ($row['category'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="DeviceStatus" class="form-label">Device Status</label>
                    <select name="status" class="form-select" aria-label="DeviceStatus" id="DeviceStatus" required>
                        <option value="Ada" <?php if ($row['status'] == 'Ada') echo 'selected'; ?>>Ada</option>
                        <option value="Dipinjam" <?php if ($row['status'] == 'Dipinjam') echo 'selected'; ?>>Dipinjam</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
