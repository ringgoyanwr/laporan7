<?php
include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($query);
$row = $query->fetch_assoc();
$username = $row['username'];

if ($cek > 0) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header("location:main.php");
} else {
    header("location:index.php");
}
