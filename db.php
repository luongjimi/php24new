<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // connect database
    $conn = mysqli_connect("localhost","root","","demonv");
    mysqli_set_charset($conn, 'UTF8');
    // end connect database
    $time = date('d-m-Y H:i:s');
    $now = strtotime($time);
    $day = date('d-m-Y');
?>