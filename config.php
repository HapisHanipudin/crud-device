<?php 
$server = "localhost";
$user = "root";
$password = "";
$database = "loginregister";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("
    <script>alert('Connection Failed')</script>
    ");
}


?>
