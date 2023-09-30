<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('location: login.php');
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="crud.css" />
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
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Device ID</th>
      <th scope="col">Owner</th>
      <th scope="col">Loker</th>
      <th scope="col">Category</th>
      <th scope="col">Keeper</th>
      <th scope="col">Status</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
            // Ambil data dari tabel crud_device
            $sql = "SELECT crud_device.id, crud_device.owner, crud_device.category, crud_device.loker, user.username, crud_device.status, crud_device.created_at, crud_device.updated_at FROM crud_device
                    INNER JOIN user ON crud_device.keeper_id = user.user_id";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row['id'] . "</th>";
                    echo "<td>" . $row['owner'] . "</td>";
                    echo "<td>" . $row['loker'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    // Anda perlu menambahkan keeper dan status ke sini
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "<td>" . $row['updated_at'] . "</td>";
                    echo '<td>
                          <a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary"> Edit </a>
                          <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger"> Delete </a>
                    ';
                    if ($row['status'] == 'Dipinjam') {
                      echo '<a href="balikan.php?id=' . $row['id'] . '" class="btn btn-success">Kembalikan</a>';
                    } else {
                      echo '<a href="pinjam.php?id=' . $row['id'] . '" class="btn btn-warning">Pinjam</a>';
                    }
                    echo "</td> </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data.</td></tr>";
            }
            ?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>  
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>
