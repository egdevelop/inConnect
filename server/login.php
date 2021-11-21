<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$pw = $_POST['pw'];

$data = mysqli_query($koneksi,"SELECT * FROM user WHERE email = '$email' AND pw = '$pw'");
$cek = mysqli_num_rows($data);
$r = mysqli_fetch_array($data);

if($cek == 1){
    $_SESSION['nama'] = $r['nama'];
    $_SESSION['id'] = $r['id'];
    header("location:../home.php");
}else{
    header("location:../login.php");
}
?>