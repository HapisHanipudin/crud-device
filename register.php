<?php
include "config.php";
error_reporting(0);
session_start();

if (isset($_SESSION["username"])) {
    header("location: login.php");
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $conpassword = md5($_POST['conpassword']);
    $user_id = uniqid(); // Menghasilkan user_id unik


    if ($password == $conpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO user (user_id, username, email, password) VALUES ('$user_id', '$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("location: home.php"); // Redirect to a success page
                exit;
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
        } else {
            echo "<script>alert('Email Already Used');</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="section">
      <div class="form-box">
        <form class="form" action="" method="POST">
          <span class="title">Sign up</span>
          <span class="subtitle">Create a free account with your email.</span>
          <div class="form-container">
            <input 
            value="<?php echo $username; ?>"
            type="text" name="username" class="input" placeholder="Username" />
            <input 
            value="<?php echo $email;  ?>"
            type="email" name="email" class="input" placeholder="Email" />
            <input 
            value="<?php echo $_POST['password'];  ?>"
            type="password" name="password" class="input" placeholder="Password" required/>
            <input 
            value="<?php echo $_POST['conpassword'];  ?>"
            type="password" name="conpassword" class="input" placeholder="Confirm Password" />
          </div>
          <button name="submit">Sign up</button>
        </form>
        <div class="form-section">
          <p>Sudah Punya Akun? <a href="login.php">Log in</a></p>
        </div>
      </div>
    </section>
  </body>
</html>
