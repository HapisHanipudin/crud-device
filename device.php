<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    // Jika user_id tidak ada dalam sesi, mungkin pengguna belum login
    echo "Pengguna belum login.";
    header('location: login.php');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}
include 'config.php';
$error = "";
$success = "";

if(isset($_POST['submit'])){
    $owner = $_POST['owner'];
    $category = $_POST['category'];
    $loker = $_POST['loker'];
    $keeper = $_POST['keeper_id'];

    // Fungsi untuk menghasilkan ID dengan prefiks berdasarkan kategori
    function generatePrefixedID($category) {
        if ($category == 'Laptop') {
            return 'LP' . uniqid();
        } elseif ($category == 'Handphone') {
            return 'HP' . uniqid();
        } else {
            return 'ID' . uniqid(); // Atur prefiks sesuai dengan kebutuhan Anda
        }
    }

    // Menghasilkan ID dengan prefiks berdasarkan kategori
    $id = generatePrefixedID($category);

    // Memasukkan data ke dalam tabel
    $sql = "INSERT INTO crud_device (id, keeper_id, owner, loker, category, status) VALUES ('$id', '$keeper', '$owner', '$loker', '$category', 'Ada')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Data berhasil dimasukkan, tampilkan pesan sukses
        $success = "Data berhasil ditambahkan.";
    } else {
        $error = "Terjadi kesalahan saat menyimpan data.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Device</title>
    <link rel="stylesheet" href="crud.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
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
        <form method="POST">
          <div class="mb-3">
            <label for="DeviceOwner" class="form-label">Device Owner</label>
            <input name="owner" type="text" class="form-control" id="DeviceOwner" placeholder="Device Owner" />
          </div>
          <div class="mb-3">
            <label for="DeviceLoker" class="form-label">Device Loker</label>
            <input name="loker" type="text" class="form-control" id="DeviceLoker" placeholder="Device Loker" />
          </div>
          <div class="mb-3">
            <label for="DeviceCategory" class="form-label">Device Category</label>
            <select name="category" class="form-select" aria-label="DeviceCategory" id="DeviceCategory">
              <option selected>Pilih Kategori</option>
              <option value="Handphone">Handphone</option>
              <option value="Laptop">Laptop</option>
            </select>
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
                                $selected = ($userRow['user_id'] == $_SESSION["user_id"]) ? 'selected' : '';
                                echo '<option value="' . $userRow['user_id'] . '" ' . $selected . '>' . $userRow['username'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="checkbox1" required />
            <label class="form-check-label" for="checkbox1">Konfirmasi</label>
          </div>
          <button type="submit" name="submit" class="mb-3 btn btn-primary">Submit</button>
          <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                if (!empty($success)) {
                    echo "<div class='alert alert-success'>$success</div>";
                }
                ?>
        </form>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
