<?php
include "server/header.php";
$data_post = mysqli_query($koneksi,"SELECT * FROM post INNER JOIN user ON id_user = user.id");
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
<body id="body">
    <div class="sidebar">
        <img style="width: 10vw;" src="assets/img/logo-light.png" class="mb-2 mt-2 ml-3" alt="logo">
        <div class="ml-3 bg-white rounded card outline-blue flex align-items-center blue bold mb-2">
            <i class="ri-vip-crown-fill"></i>
            <p class="small-text">&emsp;Upgrade Premium</p>
        </div>
        <span class="bold ml-3">Account</span>
        <div class="ml-3-3 mt-2 mb-2" style="list-style:none;">
            <li class="bold mb-1 x1 flex align-items-center act-nav"><i class="ri-home-fill blue x2"></i>&ensp;Home</li>
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-user-4-fill blue x2"></i>&ensp;Friends</li>
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-chat-smile-2-fill blue x2"></i>&ensp;Messages</li>
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-calendar-check-fill blue x2"></i>&ensp;Events</li>
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-settings-2-fill blue x2"></i>&ensp;Settings</li>
        </div>
        <span class="bold ml-3 mb-2 x1 flex justify-content-between align-items-center">Top Event <i class="ri-arrow-down-s-line mr-3"></i></span>
        <div class="card bg-blue card-block">
            <div class="card-body ml-2 mb-1 mt-1">
                <div class="flex align-items-center">
                    <i class="ri-calendar-event-fill"></i>
                    <span style="font-size: 1vw;" class="text-muted">&emsp;27 November 2021</span>
                </div>
                <p style="font-size: 1.1vw;" class="bold">Entrepreneur Workshop 2021</p>
                <div class="flex">
                    <div class="btn">
                        <p style="font-size: 1vw;" class="flex align-items-center">Join&ensp;<i class="ri-arrow-right-s-line"></i></p>
                    </div>
                    <P style="font-size: 1vw;"  class="ml-1 text-muted">See More</P>
                </div>
            </div>
        </div>
        <div class="card bg-ligh-blue card-block">
            <div class="card-body ml-2 mb-1 mt-1">
                <div class="flex align-items-center">
                    <i class="ri-calendar-event-fill"></i>
                    <span style="font-size: 1vw;" class="text-muted">&emsp;27 November 2021</span>
                </div>
                <p style="font-size: 1.1vw;" class="bold">Entrepreneur Workshop 2021</p>
                <div class="flex">
                    <div class="btn">
                        <p style="font-size: 1vw;" class="flex align-items-center">Join&ensp;<i class="ri-arrow-right-s-line"></i></p>
                    </div>
                    <P style="font-size: 1vw;"  class="ml-1 text-muted">See More</P>
                </div>
            </div>
        </div>

    </div>
    <div class="konten" id="konten">
        <div class="top flex" id="nav">
            <div class="search flex bg-whites pr-1 outline-blue" style="border-radius: 20px; height: 2.8vw;">
                <i class="ri-search-line"></i>
                <input type="text">
            </div>
            <div class="btn bg-blue rounded bold flex align-items-center ml-1 small-text p1" style="height:2.5vw;">Add Post&ensp;<i class="ri-add-line"></i></div>
            <div class="flex align-items-center" style="margin-top: -1vw;">
                <img style="width: 2vw; height:2vw;" src="assets/img/user.png" alt="user" class="ml-3 circle">
                <p class=" ml-1" style="color: #fff;"><?= $_SESSION['nama'] ?></p>
                <a href="logout.php" style="text-decoration: none; color:#fff;">
                    <i style="color:#fff;" class="ri-arrow-down-s-line ml-1"></i>
                </a>
                <i class="ri-notification-3-line x2 bg-white p05 circle ml-1 outline-blue"></i>
            </div>    
        </div>
        <h3 style="color: #fff;">Feed For You</h3>
        <div class="flex">
        <div class="feed">
            <?php
            while($r = mysqli_fetch_array($data_post)){
            ?>
            <div class="card-post bg-whites rounded mb-1">
                <div class="user-post-wrap flex  align-items-center">
                    <img style="width: 2.5vw; height:2.5vw;" src="assets/img/user.png" alt="user">
                    <div class="iden ml-1">
                        <h5 style="margin:0;"><?= $r['nama'] ?></h5>
                        <span style="font-size: 0.7vw;"><?= $r['jabatan'] ?></span>
                    </div>
                </div>
                <p style="font-size: 1vw;"><?= $r['isi'] ?></p>
                <div class="flex mb-1">
                    <img src="assets/img/image 1.png" alt="img-1">
                    <img class="ml-1" src="assets/img/image 2.png" alt="img-2">
                </div>
                <div class="flex mb-1">
                    <div class="flex align-items-center red">
                    <i class="ri-heart-fill"></i>
                    <p class="small-text bold">&ensp;12 K</p>
                    </div>
                    <div class="flex align-items-center ml-1 blue">
                    <i class="ri-message-3-fill"></i>
                    <p class="small-text bold">&ensp;12 K</p>
                    </div>
                    <div class="flex align-items-center ml-1 light-blue">
                    <i class="ri-share-forward-fill"></i>
                    <p class="small-text bold">&ensp;12 K</p>
                    </div>
                </div>
                <div class="flex align-items-center">
                    <a href="chat.php?id=<?= $r['id_user'] ?>" style="text-decoration: none; color:#fff;">
                    <div style="width: 10vw; padding: 0.4vw 1.4vw" class="btn bg-blue rounded flex align-items-center small-text"><img src="assets/img/logo-sm.png" alt="logo-sm">&ensp;Get Connection</div>
                    </a>
                    <div class="com-sec ml-1 outline-blue rounded flex align-items-center">
                        <input type="text">
                        <i class="ri-user-smile-line blue"></i>
                    </div>
                    <i class="ri-heart-fill red ml-1"></i>
                    <i class="ri-share-forward-fill light-blue ml-1"></i>
                </div>
            </div>
            <?php
            }
            ?>
           
        </div>
        <div style="position: fixed; right:1vw;" class="side-feed ml-1 mr-2">
            <div style="width: 20vw; height:40vw; padding-top:2vw; padding-bottom:2vw; padding-left: 2vw" class="card bg-whites rounded">
                <span class="bold">Popular Business</span>
                <div style="overflow:auto; height:35vw;" class="trend-card">
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Health Care and Social Assistance</span>
                        <p class="small-text text-muted">12K In Connection</p>
                    </div>
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Accommodation and Food Services</span>
                        <p class="small-text text-muted">8K In Connection</p>
                    </div>
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Arts, Entertainment, and Recreation</span>
                        <p class="small-text text-muted">4K In Connection</p>
                    </div>
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Arts, Entertainment, and Recreation</span>
                        <p class="small-text text-muted">4K In Connection</p>
                    </div>
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Arts, Entertainment, and Recreation</span>
                        <p class="small-text text-muted">4K In Connection</p>
                    </div>
                    <div class="trend mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">Arts, Entertainment, and Recreation</span>
                        <p class="small-text text-muted">4K In Connection</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>
<script>
    window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;

  // 20 is an arbitrary number here, just to make you think if you need the prevScrollpos variable:
  if (currentScrollPos > 20) {
    // I am using 'display' instead of 'top':
    document.getElementById("nav").style = "display:flex; position:fixed; background-color:#1a162c; color:#fff; top:0; right:0; width:80%; padding-top:2vw; padding-bottom:1vw;";
  } else {
    document.getElementById("nav").style = "";
  }
}
</script>
</html>