<?php 
session_start();
include "koneksi.php";

if(isset($_SESSION['id'])){
    header("location:home.php");
}else{
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>InConnect | Get a Connection with us</title>
</head>
<body>
    <div class="flex">
        <div class="img-login">
            <img style="height:100vh;" src="assets/img/login-img.png" alt="login-img">
        </div>
        <div class="text-login" style="color: #fff; width:35vw; margin-left: 10vw; margin-top:10vw;">
            <h4 style="font-size: 1.2vw;">InConnect is a social media where entrepreneurs connect anywhere and anytime.</h4>
            <form action="server/login.php" method="post">
                <input type="email" name="email" placeholder="Username" require>
                <input type="password" name="pw" placeholder="Password" require>
                <p class="small-text mt-1">Welcome back to inConnect we miss you so much</p>
                <button style="width: 100%; height:3vw; border:none;" class="bg-blue mt-1" type="submit">L O G I N</button>
            </form>
        </div>
    </div>
</body>
</html>