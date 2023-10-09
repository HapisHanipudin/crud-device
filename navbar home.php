    <nav class="navigation nav-scrolled">
      <header>
        <div class="btn-link" data-link="">
          <h1 class="logo">Izalin</h1>
        </div>

        <div class="menu">
<span class="btn-link" data-link="blog/">Blog</span>
<span class="btn-link" data-link="contact/">Contact</span>
        </div>

        <div class="button">
          <?php if (!empty($username)) { ?>
          <!-- Tampilkan username jika sudah login -->
          <span><?php echo $username ?></span>
          <button class="cart-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></button>
          <button class="dropdown">
            <span>Account</span>
            <div class="dropdown-menu">
              <a href="accsetting/?id=<?php echo $userId ?>">Account Setting</a>
              <a class="red" href="logout.php">Logout</a>
            </div>
          </button>
          <?php } else { ?>
          <!-- Tampilkan tombol login/sign up jika belum login -->
          <button class="dropdown">
            <span>Get Started</span>
            <div class="dropdown-menu">
              <a href="login/">Log In</a>
              <a class="" href="register/">Sign Up</a>
            </div>
          </button>
          <?php } ?>
        </div>
      </header>
    </nav>

                  <div class="cart">
  <div class="close"><svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="#ffffff" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></div>

<?php 
$cartsql = "SELECT p.*, c.*
            FROM `product` AS p
            INNER JOIN `cart` AS c ON c.product_id = p.product_id
            WHERE c.`user_id` = '$userId'";
    $cartresult = mysqli_query($conn, $cartsql);

if (mysqli_num_rows($cartresult) > 0) { while ($cartrow = mysqli_fetch_assoc($cartresult)) { 
          echo '
  <div class="mycart">
    <div class="cart-img">
      <img src="uploads/'. $cartrow['product_image'] .'" alt="">
    </div>
    <div class="cartxt">
      <h3>'. $cartrow['product_name1'] . $cartrow['product_name2'].'</h3>
      <p>'. $cartrow['product_desc'] .'.</p>
      <p>Harga : '. $cartrow['product_price'] .'</p>
      <p>Jumlah : '. $cartrow['quantity'] .'</p>
    </div>
  </div>

        '; } } else { echo '
          <h2 style="opacity: 70%">Belum Ada Barang untuk ditampilkan</h2>
          '; }

?>

</div>    
