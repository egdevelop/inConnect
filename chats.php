<?php
include "server/header.php";

$kode = $_GET['kode'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>SIMONEY || GET IN TOUCH WITH US</title>
</head>

<body>
    <div class="card-mobile mb-5">
        <div class="text-align-tengah mb-5 mt-5">
            <div class="flex mb-5">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div style="margin-right: 27vw; " class="badge-biru">
                        <i style="font-size: 5vw; font-weight:600;" class="ri-arrow-left-s-line"></i>
                    </div>
                </a>
                <span style="font-weight:700; font-size:5vw; color: rgba(0, 8, 48, 0.75);">SIMONEY</span>
            </div>
        </div>
        <br>
        <div class="text-align-tengah mb-5">
            <span style="font-weight:600;" class="sub-text">Room Chat</span>
        </div>
        
        <div class="chat-box bg-abu-muda">
        </div>

                <div id="bottom-arrow" onclick="scrollToBottom()" style="display:none; right:10vw; top:65vh; position:absolute; " class="badge-biru">
    <i style="font-size: 5vw; font-weight:600;" class="ri-arrow-down-s-line"></i>
        </div>

        <form action="#" class="typing-area">
            <input type="text" class="you_id" name="you_id" value="<?php echo $kode; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Ketikkan Pesan..." autocomplete="off">
            <button><img src="assets/img/telegram.png" alt=""></button>
        </form>
        <a style="text-decoration: none;" id="selesai">
            <div class="button-biru-2 btn-nebeng text-align-tengah mt-10 mb-20">
                Selesaikan Orderan
            </div>
        </a>
    </div>
    <div class="nav" id="nav">
        <a class="mr-10 abu-nav" href="dashboard.php">
            <i class="ri-dashboard-line"></i>
        </a>
        <a class="mr-10 abu-nav" href="nebeng.php">
            <i class="ri-route-line"></i>
        </a>
        <a class="mr-10 badge-gradien-biru-2" href="#">
            <i class="ri-qr-scan-line"></i>
        </a>
        <a class="mr-10 abu-nav" href="nitip.php">
            <i class="ri-open-arm-line"></i>
        </a>
        <a class="mr-10 abu-nav" href="profil.php">
            <i class="ri-user-line"></i>
        </a>
    </div>
    </div>
    <div class="notif bg-biru" id="notif">
        <p></p>
    </div>
</body>
<script>
        <?php
        if(isset($_GET['pesan'])){
    ?>
    document.getElementById("notif").innerHTML = '<i class="ri-notification-line"></i>&ensp;<?= $_GET['pesan'] ?>';
    document.getElementById("notif").classList.add("act-n");
    setTimeout(()=>{
        document.getElementById("notif").style = "animation-name: notif-a; animation-duration: 1s; transform: translateY(-20vw);"
    },1000);

    <?php
    }
    ?>
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
<script>
    var url_string = window.location.href;
    var url = new URL(url_string);
    var type = url.searchParams.get("type");

    if (type == 'sinebeng') {
        document.getElementById("selesai").href = "server/selesai-nebeng.php";
    }
    if (type == 'sinitip') {
        document.getElementById("selesai").href = "server/selesai-nitip.php";
    }
</script>

</html>