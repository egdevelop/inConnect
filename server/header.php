<?php 
session_start();
include "koneksi.php";

if(isset($_SESSION['id'])){
    
}else{
    header("location:index.php");
}

?>