<?php 
include 'auth.php'; 
include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navfooter.css">
  </head>
  <body>
<?php require 'navbar home.php' ?>
    <section id="hero">
      <div class="hero-side male">
        <div class="blur"></div>
        <div class="inner-hero">
          <div class="link">
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/male/shirt.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="shirts-men">Shirts</button>
            </div>
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/male/pants.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="pants-men">Pants</button>
            </div>
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/male/shoes.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="shoes-men">Shoes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-side female">
        <div class="blur"></div>
        <div class="inner-hero">
          <div class="link">
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/female/hijab.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="hijab-women">Hijab</button>
            </div>
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/female/pants.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="shirts-women">Shirts</button>
            </div>
            <div class="hero-link">
              <div class="hero-img">
                <img class="" src="img/female/shoes.jpg" alt="" />
              </div>
              <button class="btn-link" data-link="skirt-women">Skirts</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="script.js"></script>
  </body>
</html>
