<?php
$host = "127.0.0.1";
$username = "root";
$password = "#####";
$db = "####";
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i:s");
$koneksi = mysqli_connect($host, $username, $password, $db);
