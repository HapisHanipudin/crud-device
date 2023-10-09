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