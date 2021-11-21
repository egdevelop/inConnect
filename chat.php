<?php
include "server/header.php";
$data = mysqli_query($koneksi,"SELECT nama,jabatan FROM user WHERE id = '$_GET[id]'");
$r = mysqli_fetch_array($data);
$data_pesan = mysqli_query($koneksi,"SELECT * FROM chat WHERE user1='$_SESSION[id]'");
$data_pesan2 = mysqli_query($koneksi,"SELECT * FROM chat WHERE user2='$_SESSION[id]'");
$d = mysqli_fetch_array($data_pesan);
$d2 = mysqli_fetch_array($data_pesan2);
$connect = mysqli_query($koneksi,"SELECT nama,jabatan FROM user WHERE id = '$d[user2]'");
$connect2 = mysqli_query($koneksi,"SELECT nama,jabatan FROM user WHERE id = '$d[user1]'");
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
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-home-fill blue x2"></i>&ensp;Home</li>
            <li class="bold mb-1 x1 flex align-items-center text-muted"><i class="ri-user-4-fill blue x2"></i>&ensp;Friends</li>
            <li class="bold mb-1 x1 flex align-items-center act-nav"><i class="ri-chat-smile-2-fill blue x2"></i>&ensp;Messages</li>
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
                <p class=" ml-1" style="color: #fff;"><?= $_SESSION['nama']?></p>
                <i style="color:#fff;" class="ri-arrow-down-s-line ml-1"></i>
                <i class="ri-notification-3-line x2 bg-white p05 circle ml-1 outline-blue"></i>
            </div>    
        </div>
        <h3 style="color: #fff;">Messages</h3>
        <div class="flex">
        <div class="feed">
            <div style="width: 40vw;" class="card bg-whites rounded mb-1">
                <div class="user-post-wrap flex  align-items-center">
                    <img style="width: 2.5vw; height:2.5vw;" src="assets/img/user.png" alt="user">
                    <div class="iden ml-1">
                        <h5 style="margin:0;"><?= $r['nama'] ?></h5>
                        <span style="font-size: 0.7vw;"><?= $r['jabatan'] ?></span>
                    </div>
                </div>
                <div class="chat-box">
                    
                </div>
                <div id="bottom-arrow" onclick="scrollToBottom()" style="display:none; right:10vw; top:65vh; position:absolute; " class="badge-biru">
    <i style="font-size: 5vw; font-weight:600;" class="ri-arrow-down-s-line"></i>
        </div>
            <form action="#" class="typing-area">
            <input type="text" class="you_id" name="you_id" value="<?php echo $_GET['id']; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Ketikkan Pesan..." autocomplete="off">
            <button><i class="ri-send-plane-fill"></i></button>
            </form>
            </div>
        </div>
        <div style="position: fixed; right:1vw;" class="side-feed ml-1 mr-2">
            <div style="width: 35vw; height:40vw; padding-top:2vw; padding-bottom:2vw; padding-left: 2vw" class="card bg-whites rounded">
                <span class="bold">Connection</span>
                <div style="overflow:auto; height:35vw;" class="trend-card">
                <?php
                while($c2 = mysqli_fetch_array($connect2)){
                ?>
                <div class="flex align-items-center">
                    <img src="assets/img/user.png" alt="user" style="width: 3vw; height:3vw; margin-top:1.2vw;">
                    <div class="connect-user mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">&ensp;<?= $c2['nama'] ?></span>
                        <p class="small-text text-muted" style="padding-top: 0;"> &emsp;<?= $c2['jabatan'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
                <?php
                while($c = mysqli_fetch_array($connect)){
                ?>
                <div class="flex align-items-center">
                    <img src="assets/img/user.png" alt="user" style="width: 3vw; height:3vw; margin-top:1.2vw;">
                    <div class="connect-user mt-2">
                        <span style="font-size: 1.1vw; font-weight:700;">&ensp;<?= $c['nama'] ?></span>
                        <p class="small-text text-muted" style="padding-top: 0;"> &emsp;<?= $c['jabatan'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>

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
const form = document.querySelector(".typing-area"),
        you_id = form.querySelector(".you_id").value,
        inputField = form.querySelector(".input-field"),
        sendBtn = form.querySelector("button"),
        chatBox = document.querySelector(".chat-box");

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    inputField.focus();
    inputField.onkeyup = () => {
        if (inputField.value != "") {
            sendBtn.classList.add("active");
        } else {
            sendBtn.classList.remove("active");
        }
    }

    sendBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "server/insert-chat.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToBottom();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
    chatBox.onmouseenter = () => {
        chatBox.classList.add("active");
    }

    chatBox.onmouseleave = () => {
        chatBox.classList.remove("active");
    }


    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "server/get-chat.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    var a = chatBox.scrollTop;
                        var b = chatBox.scrollHeight - chatBox.clientHeight;
                        var c = a / b;
                        if(a === b){
                            chatBox.innerHTML = data;
                            if (!chatBox.classList.contains("active")) {
                                scrollToBottom();
                                document.getElementById("bottom-arrow").style.display ="none";
                            }
                        }else{
                            chatBox.innerHTML = data;
                            document.getElementById("bottom-arrow").style.display ="block";
                        }
                   
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("you_id=" + you_id);
    }, 500);

    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>
</html>