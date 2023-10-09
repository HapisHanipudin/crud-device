<?php

include '../auth.php';
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan penambahan data ke tabel cart berdasarkan ID
    $sql = "SELECT b.*, u.username
            FROM `blog` AS b
            INNER JOIN `user` AS u ON b.owner_id = u.user_id
            WHERE b.`post_id` = '$id'";
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="../navfooter.css">
    <title>Document</title>
</head>
<body>
    <?php require '../navbar.php' ?>
    <section>
        <div class="gambar">
            <a href=""><h1>Izalin.</h1></a>
            <h1 class="judul"><?php echo $row['post_title'] ?></h1>
            <p class="tgl"><?php echo $row['date'] ?></p>
            
            <img src="../uploads/<?php echo $row['post_img'] ?>" alt="">
        </div>
        
        <div class="desc">
            <p><?php echo $row['username'] ?></p>
            <!-- <a href="">
                <p class="jlkn">professional design of syar'i Muslim clothing</p>
            </a> -->
            
            <p class="kata">
                "<?php echo $row['post_txt'] ?>"
            </p>
        </div>
    </section>
    <?php require '../footer.php' ?>
    <script src="../script.js"></script>
</body>
</html>