<?php
    
    $check_ug = $_SERVER ['HTTP_USER_AGENT'];
    $check2 = md5($check_ug);

    // lam lai phan nay
    if (isset($_SESSION['user_check']) and $_SESSION['user_check'] != "" ) {
        $user_mail = $_SESSION['user_check'];
        $rows_ug = mysqli_query($conn," SELECT * from user where email = '$user_mail' ");
        $count_ug2 = mysqli_fetch_array($rows_ug);
        $ugnt_us = $count_ug2['ugnt'];
        $time_log = $count_ug2['time_log'];
        $date = date('Y-m-d H:i:s');
        $now = strtotime($date);
        $d = strtotime("$time_log");
        $time_con2 = $now - $d;
        $newdate = strtotime ( '+12 hour' , strtotime ( $date ) );
        $newdate2 = date ( 'Y-m-d H:i:s' , $newdate );

        // neu dung la ugnt -> dang nhap / 0 dung thi check time, time <0 thi ko cho login >0 cho login moi
        if($check2 == $ugnt_us ){
            // +1day vao thoi gian luc login, them tg moi vao db
            $sql012 = "UPDATE `user` SET time_log = '$newdate2' WHERE email = '$user_mail' ";
            if ($conn->query($sql012) === TRUE) {
                $_SESSION['user'] = $user_mail;
            }
        } elseif( $time_con2 > 0) {
           $sq12l = "UPDATE `user` SET ugnt = '$check2' WHERE email = '$user_mail' ";
           $sql0212 = "UPDATE `user` SET time_log = '$newdate2' WHERE email = '$user_mail' ";
           // +1 day va them ugnt moi + time moi
           if ( (($conn->query($sq12l)) and ($conn->query($sql0212))) === TRUE) {
                header ("Location: index.php?act=out");
           }
        } else {
            header ("Location: index.php?act=out");
        }
            // lam lai phan dang xuat -> khi dang xuat ra thi se them $time dang xuat hien tai vao db
    }
?>
