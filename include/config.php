<?php
$host = "43.156.164.5";
$user = "u10_jL11hMydWS"; 
$pass = "vZ.+Z9aow9LK9M@+vagwF5Dg"; 
$db   = "s10_rapi";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
  
