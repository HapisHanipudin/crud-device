<?php
include '../auth.php';
include '../config.php';

$error = "";
$success = "";

if (isset($_POST['submit'])) {
    $title = $_POST['judul'];
    $text = $_POST['isi'];
    $owner = $_SESSION['user_id'];
    $id = uniqid();
    $uploadDirectory = '../uploads/';

    // Check if a file was uploaded
    if (!empty($_FILES['foto']['name'])) {
        $fileName = $_FILES['foto']['name'];
        $fileTmpName = $_FILES['foto']['tmp_name'];
        $fileSize = $_FILES['foto']['size'];
        $fileError = $_FILES['foto']['error'];

        // Check if there was no upload error
        if ($fileError === 0) {
            // Generate a unique filename to avoid overwriting
            $uniqueFileName = uniqid('', true) . '_' . $fileName;
            $fileDestination = $uploadDirectory . $uniqueFileName;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $success = "File berhasil diunggah: $uniqueFileName";

                $sql = "INSERT INTO blog (post_id, owner_id, post_img, post_title, post_txt) VALUES ('$id', '$owner', '$fileDestination', '$title', '$text')";

                if (mysqli_query($conn, $sql)) {
                    $success = "Data berhasil ditambahkan ke database.";
                } else {
                    $error = "Gagal menambahkan data ke database: " . mysqli_error($conn);
                }

                // You can now store $uniqueFileName in your database along with other data
            } else {
                $error = "Gagal mengunggah file.";
            }
        } else {
            $error = "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        $error = "Pilih file untuk diunggah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add Blog</title>
    <link rel="stylesheet" href="../navfooter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous"/>
</head>
<body>
<?php require '../navbar.php' ?>
<section style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <form method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype untuk mengizinkan upload file -->
            <div class="mb-3">
                <label for="JudulBlog" class="form-label">Judul</label>
                <input name="judul" type="text" class="form-control" id="JudulBlog" placeholder="Judul Blog"/>
            </div>
            <div class="mb-3">
                <label for="IsiBlog" class="form-label">Isi</label>
                <textarea class="form-control" name="isi" id="IsiBlog" rows="3" placeholder="isi Blog"></textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="foto" id="gambar">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkbox1" required/>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="../script.js"></script>

</body>
</html>
