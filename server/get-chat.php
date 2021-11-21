<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "koneksi.php";
    $me_id = $_SESSION['id'];
    $you_id = mysqli_real_escape_string($koneksi, $_POST['you_id']);
    $output = "";
    $sql = "SELECT * FROM chat WHERE user1 = '$me_id' AND user2 = '$you_id' OR user2 = '$me_id' AND user1 = '$you_id'";
    $query = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['user1'] === $me_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['pesan'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="assets/img/user.png" alt="client">
                                <div class="details">
                                    <p>' . $row['pesan'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: login.php");
}
