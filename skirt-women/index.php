<?php 
include '../auth.php';
include '../config.php';

            // Ambil data dari tabel crud_device
            $sql = "SELECT `product_id`, `product_name1`, `product_name2`, `product_image`, `product_category`, `product_desc`, `product_price`
                    FROM `product`
                    WHERE `product_category` = 'shirts-women'";
            $result = mysqli_query($conn, $sql);

// Hitung jumlah baris yang ditemukan
$numRows = mysqli_num_rows($result);

// Lebar wrapper = (jumlah baris + 1) * 100%
$wrapperWidth = ($numRows + 1) * 100;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../navfooter.css">
    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="stylesheet" href="https://codepen.io/GreenSock/pen/7ba936b34824fefdccfe2c6d9f0b740b.css" /> -->
  </head>
  <body>
<?php require "../navbar.php" ?>
    <section class="hero">
      <div class="title">
        <h1>Buat dirimu lebih</h1>
        <div class="anim-text">
          <span>Bergaya</span>
          <span>Stylish</span>
          <span>Keren</span>
          <span>Fresh</span>
        </div>
      </div>
    </section>
    <section id="under-hero">
      <div class="hero-bottom">
        <h1 class="toRight">Ingin Tampil <span>Menarik?</span></h1>
      </div>
    </section>
    

    <!-- <section id="panels">
      <div id="panels-container" style="width: 400%">
        <article id="panel-1" class="panel full-screen">
          <div class="container">
            <div class="left">
              <h2>Insecure dengan penampilanmu?</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, corporis ab maiores quas perspiciatis nulla velit ut voluptatibus id optio, blanditiis facere, eius adipisci voluptatem?</p>
            </div>
            <div class="right">
              <img src="../img/maaan.jpeg" alt="" />
            </div>
          </div>
          <div class="panels-navigation">
            <div class="nav-panel" data-sign="plus"><a href="#panel-2" class="anchor">Next</a></div>
          </div>
        </article>
        <article id="panel-2" class="panel full-screen">
          <div class="container">
            <div class="left">
              <h2>Koleksi dengan warna yang cocok</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, corporis ab maiores quas perspiciatis nulla velit ut voluptatibus id optio, blanditiis facere, eius adipisci voluptatem?</p>
            </div>
            <div class="right">
              <img src="../img/maaan.jpeg" alt="" />
            </div>
          </div>
          <div class="panels-navigation">
            <div class="nav-panel" data-sign="minus"><a href="#panel-1" class="anchor">Prev</a></div>
            <div class="nav-panel" data-sign="plus"><a href="#panel-3" class="anchor">Next</a></div>
          </div>
        </article>
        <article id="panel-3" class="panel full-screen">
          <div class="container">
            <div class="left">
              <h2>Kualitas Terbaik Dunia dan Akhirat</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, corporis ab maiores quas perspiciatis nulla velit ut voluptatibus id optio, blanditiis facere, eius adipisci voluptatem?</p>
            </div>
            <div class="right">
              <img src="../img/maaan.jpeg" alt="" />
            </div>
          </div>
          <div class="panels-navigation">
            <div class="nav-panel" data-sign="minus"><a href="#panel-2" class="anchor">Prev</a></div>
            <div class="nav-panel" data-sign="plus"><a href="#panel-4" class="anchor">Next</a></div>
          </div>
        </article>
        <article id="panel-4" class="panel full-screen">
          <div class="container">
            <div class="left">
              <h2>Sudah Dipercaya Miliaran Orang</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, corporis ab maiores quas perspiciatis nulla velit ut voluptatibus id optio, blanditiis facere, eius adipisci voluptatem?</p>
            </div>
            <div class="right">
              <img src="../img/maaan.jpeg" alt="" />
            </div>
          </div>
          <div class="panels-navigation">
            <div class="nav-panel" data-sign="minus"><a href="#panel-3" class="anchor">Prev</a></div>
          </div>
        </article>
      </div>
    </section> -->

    <div class="container-slider">
      <div class="wrapper" style="width: <?php echo $wrapperWidth; ?>%;">
        <section class="section intro">
          <div class="line"></div>
        </section>

        <?php

            if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { 
          echo '
        <section class="section shirt character" id="'. $row['product_id'] .'">
          <div class="block"></div>
          <img src="../uploads/'. $row['product_image'] . '" alt="" /><span class="huge-text">'. $row['product_name1'] . $row['product_name2'] . '</span>

          <div class="nickname"><span>'. $row['product_name1'] . '</span>'. $row['product_name2'] . '</div>
          <div class="price">
            <h3 class="h3">Rp' . $row['product_price'] . '</h3>
            <a class="tocart" href="../addtocart.php?id='.$row['product_id'].'">Add To Cart</a>
          </div>
          <div class="quote">'. $row['product_desc'] . '</div>
        </section>
          '; } } else { echo '
          <h2 style="opacity: 70%">Belum Ada Kontent untuk ditampilkan</h2>
          '; } ?>

        <!-- <section class="section shirt character">
          <div class="block"></div>
          <img src="img/white_shirt-removebg-preview.png" alt="" /><span class="huge-text">White shirt</span>

          <div class="nickname"><span>White</span>Shirt</div>
          <div class="quote">The white shirt symbolizes elegance in simplicity.</div>
        </section>

        <section class="section royal character">
          <div class="block"></div>
          <img src="img/royal_silk_stripe-removebg-preview.png" alt="" /><span class="huge-text">Royal silk</span>

          <div class="nickname"><span>Royal</span>stripe</div>
          <div class="quote">Our Royal Stripe Shirt epitomizes sophistication</div>
        </section> -->
      </div>
    </div>

    <section id="testi">
      <div class="testi">
        <div class="testeks">
          <h1>Lihat Apa Kata mereka</h1>
          <div class="anim">
            <h2>Fulan gatau siapa</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quod blanditiis, unde necessitatibus accusamus placeat voluptatibus similique odit dolorum molestiae laborum ipsam harum, suscipit enim.</p>
          </div>
        </div>
        <div class="testimg">
          <img src="../img/male/shoes.jpg" alt="" />s
        </div>
      </div>
    </section>
<?php require '../footer.php' ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="../gsap.js"></script>
    <script src="../script.js"></script>
  </body>
</html>
