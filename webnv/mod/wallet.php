<div class="home_gt">
    <div class="main_wallet">
        <i class="fa-regular fa-credit-card"></i>
        <h3> Main:
            <?php echo number_format($countid['money'], 0, '', ','); ?> VND
        </h3>
        <h5> Pending:
            <?php echo number_format($countid['re_money'], 0, '', ','); ?> VND
        </h5>
    </div>
    <hr>
    <div class="main_wl2">
        <a id="nap" onclick="openForm3()"> Nạp <i class="fa-solid fa-arrow-right-to-bracket"></i> </a>
        <a id="rut" onclick="openForm4()"> Rút <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
    </div>
</div>

<div id="myForm2">
    <div class="in_form">
        <a onclick="closeForm3()" style="cursor: pointer; font-size: 24px; margin-left: 10px;"> x </a>
        <hr>
        <h3 style="text-align: center; margin-bottom: 0;"> Nạp Tiền </h3>
        <form class="form_nap" method="post" enctype="application/x-www-form-urlencoded">
            <div>
                <h4 style=" margin: -4px 5px 6px 5px ; display: flex; justify-content: flex-start ;"> Số tiền muốn nạp :
                </h4>
                <select name="so_tien" style="height: 28px; width: 100%;" required>
                    <option value="200000"> 200,000 VND </option>
                    <option value="500000"> 500,000 VND </option>
                    <option value="2000000"> 2,000,000 VND </option>
                </select>
            </div>
            <div>
                <h4 style=" margin: -4px 5px 6px 5px ; display: flex; justify-content: flex-start ;"> Chọn cổng nạp :
                </h4>
                <select name="bank" id="name" style="height: 28px; width: 100%; " required>
                    <option value="1"> MB Bank </option>
                    <option value="2"> Kucoin </option>
                </select>
            </div>

            <div id="1" class="data_nap">
                <div style="display: flex; justify-content: center;">
                    <img src="img/mb.png" width="70px" height="70px">
                </div>
                <ul class="tt_bank">
                    <h3 style="margin: 5px ;"> Thông tin chuyển khoản : </h3>
                    <li> Số tài khoản : 066666999969 </li>
                    <li> Người nhận : TRAN THE ANH </li>
                    <li> Ghi chú : User
                        <?php echo $tk2; ?>
                    </li>
                </ul>
            </div>

            <div id="2" class="data_nap">
                <div style="display: flex; justify-content: center;">
                    <img src="img/kucoin.png" width="70px" height="70px">
                </div>
                <ul class="tt_bank">
                    <h3 style="margin: 14px 0 5px 0 ;"> Thông tin chuyển khoản : </h3>
                    <li> UID : 174545031 </li>
                    <li> Ghi chú : User
                        <?php echo $tk2; ?>
                    </li>
                    <li> Hoặc = <a style="font-size: 12px;"> USDT(KCC): 0x725c8cc7afddeb55c6ced510416f080f1085a8b6 </a>
                    </li>
                </ul>
            </div>

            <h6 style="margin: 5px;"> *Chúng tôi sẽ sử lí yêu cầu trong vòng vài giờ. </h6>

            <input name="nap_tien"
                style="font-size: 16px; height: 32px; cursor: pointer; background-color:#04AA6D; color: white;"
                type="submit" value="Nạp tiền">
        </form>
        <br>
    </div>
</div>

<div id="myForm3">
    <div class="in_form">
        <a onclick="closeForm4()" style="cursor: pointer; font-size: 24px; margin-left: 10px;"> x </a>
        <hr>
        <h3 style="text-align: center; margin-bottom: 0;"> Rút Tiền </h3>

        <form class="form_nap" method="post" enctype="application/x-www-form-urlencoded">
            <div>
                <h4 style=" margin: 0px 5px 6px 5px ; display: flex; justify-content: flex-start ;"> Số tiền muốn rút :
                </h4>
                <select name="rut_bn" style="height: 28px; width: 100%;" required>
                    <option value="100000"> 100,000 VND </option>
                    <option value="200000"> 200,000 VND </option>
                    <option value="500000"> 500,000 VND </option>
                </select>
            </div>

            <div>
                <h4 style=" margin: -3px 5px 6px 5px ; display: flex; justify-content: flex-start ;"> Chọn cổng rút :
                </h4>
                <select name="rut_ve" style="height: 28px; width: 100%; " required>
                    <option value="3"> Internet Banking </option>
                    <option value="4"> USDT </option>
                </select>
            </div>

            <div>
                <h4 style=" margin: -3px 5px 6px 5px ; display: flex; justify-content: flex-start ;"> Thông tin thanh
                    toán : </h4>
                <textarea maxlength="250" name="tt_rut" style="width: 99%; color: green; font-size: 14px;height: 68px;"
                    placeholder="Thông tin ngân hàng hoặc địa chỉ ví USDT "></textarea>
            </div>

            <div style="width: 100%; margin-top: -8px;">
                <p style="display: flex; justify-content: flex-start ; font-size: 16px; margin: 5px ;"> Nhập mã gửi đến
                    email : </p>
                <div class="code_btn">
                    <input type="number" style="width: 76%; height: 28px;" placeholder="Code" name="c_code">
                    <input type="submit" name="code1" class="btn_log" style="width: 20%;height: 28px;" value="Gửi mã">
                </div>
            </div>


            <h6 style="margin: 5px;"> *Chúng tôi sẽ sử lí yêu cầu trong vòng vài ngày. </h6>

            <input name="rut_tien"
                style="font-size: 16px; height: 32px; cursor: pointer; background-color: red; color: white;"
                type="submit" value="Rút tiền">
        </form>
        <br>
    </div>

</div>

<?php

$ktra21 = mysqli_query($conn,"SELECT * FROM `rut_tien` WHERE of_us = '$tk2' AND t_gian = '$date10'  ");
$row_rut12 = mysqli_num_rows($ktra21);
 
  // check code us
    $countcd1 = mysqli_num_rows($rowid);
    $time_code = $countid['re_time'];
    $end_code = strtotime("$time_code");
    $time_con = $end_code - $now;

    if($countcd1 > 0){
    
        if( isset($_POST['code1']) ){
        
            if($time_con > 0 ){
                ?>
<script> alert("Code chưa hết hạn"); </script>
<?php
            } else {
                $code_ran =  rand(100000,999999);

                $time_recode = strtotime ( '+5 minute' , strtotime ( $date ) );
                $newdate3 = date ( 'Y-m-d H:i:s' , $time_recode );

                $sql11 = "UPDATE `user` SET code = '$code_ran' WHERE email = '$tk' ";
                $sql12 = "UPDATE `user` SET re_time = '$newdate3' WHERE email = '$tk'";

                if (($conn->query($sql11) === TRUE) and ($conn->query($sql12) === TRUE)) {

                    require("mail_php/src/PHPMailer.php");
                    require("mail_php/src/SMTP.php");
                    require("mail_php/src/Exception.php");
                
                      $mail = new PHPMailer\PHPMailer\PHPMailer();
                      $mail->IsSMTP(); // enable SMTP
                  
                      $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                      $mail->SMTPAuth = true; // authentication enabled
                      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                      $mail->Host = "smtp.gmail.com";   
                      $mail->Port = 465; //465
                      $mail->IsHTML(true);
                      $mail->Username = "a1training.edu@gmail.com";
                      $mail->Password = "vslbngxhwngolxdk";
                      $mail->SetFrom("a1training.edu@gmail.com");
                      $mail->Subject = "Diblock.net Verification";
                      $mail->Body = " <h3> Day la ma xac minh cua ban, ma co hieu luc trong vong 5 phut, vui long khong chia se cho bat cu ai. Chi duoc gui lai yeu cau khi ma nay het han:  </h3> <br> <h1> <strong>".$code_ran."</strong> </h1>";
                      $mail->AddAddress($tk);
                  
                       if(!$mail->Send()) {
                        ?>
<script> alert("Thất bại"); </script>
<?php
                       } else {
                        ?>
<script> alert("Code đã được gửi đến email <?php echo $tk; ?>"); </script>
<?php
                       }
                    } 
            }
        }


        if(isset($_POST['rut_tien'])){

            if(!empty($_POST['c_code'])){
                $code1 = htmlspecialchars($_POST['c_code']);
                $codedb = $countid['code'];
                if (!is_numeric($code1) and (strlen($code1) < 6) ) {
                    ?>
<script> alert("Sai code"); </script>
<?php
                } elseif($time_con < 0 ){
                    ?>
<script> alert("Code đã hết hạn"); </script>
<?php
                } elseif($codedb === $code1 ) {
                    $so_tien = $_POST['rut_bn'];
                    $tru_mv231 = $countid['money'] - $so_tien;
                    if($tru_mv231 > 0){

                        $sql12 = "UPDATE `user` SET code = 0 WHERE email = '$tk'";
                        if ($conn->query($sql12) === TRUE) {             
                           
                            $cong_nap = $_POST['rut_ve'];
                            $tt_tt_us12 = htmlspecialchars($_POST['tt_rut']); 

                            if($row_rut12 < 3){
                                
                                $sql_tru12 = "UPDATE `user` SET `money` = '$tru_mv231' WHERE `uid` = '$tk2' ";
                                if(mysqli_query($conn, $sql_tru12)) {
                                    $sql1 = "INSERT INTO `rut_tien` (`of_us` , `money` , `dia_chi` , `t_gian` , `loai`, `rut_nap` ) VALUES ('$tk2' , '$so_tien', '$tt_tt_us12' , '$date10' , '$cong_nap', 1) ";
                                    if(mysqli_query($conn, $sql1)) {
                                        ?>
<script> alert("Tạo lệnh thành công"); </script>
<?php
                                    } 
                                } 
                            } else {
                                ?>
<script> alert("Quá 3 lệnh giao dịch / ngày"); </script>
<?php
                            }
                        }    
                    }else {
                        ?>
<script> alert("Không đủ tiền"); </script>
<?php
                    }
                    
                } else {
                    ?>
<script> alert("Sai code"); </script>
<?php
                }

            } else {
                ?>
<script> alert("Bạn chưa nhập code"); </script>
<?php
            }
        }   


 if(isset($_POST['nap_tien'])){
            $so_tien = $_POST['so_tien'];
            $cong_nap = $_POST['bank'];
            if($row_rut12 < 3){
                $sql1 = "INSERT INTO `rut_tien` (`of_us` , `money` , `t_gian` , `loai`) VALUES ('$tk2' , '$so_tien' , '$date10' , '$cong_nap') ";
                if(mysqli_query($conn, $sql1)) {
                    ?>
<script> alert("Tạo lệnh thành công"); </script>
<?php
                } 
            } else {
                ?>
<script> alert("Quá 3 lệnh giao dịch / ngày"); </script>
<?php
            }
        }

}
?>


<br>
<div class="home_gt">
    <div id="show_lsu123">
        <?php 
        $lsu_rut = mysqli_query($conn,"SELECT * FROM `rut_tien` WHERE of_us = '$tk2' ORDER BY `rut_tien`.`id_tt` DESC LIMIT 5 ");
        $slrut1 = mysqli_num_rows($lsu_rut);

        if($slrut1 > 0 ) {
        while($lsu_rut2 = mysqli_fetch_array($lsu_rut)) {
    ?>
        <div class="ls_vitien">
            <?php
            if ($lsu_rut2['duyet'] == 1) {
                ?> <i class="fa-regular fa-circle-check"></i>
            <?php
            } elseif($lsu_rut2['duyet'] == 0) {
                ?> <i class="fa-solid fa-spinner"></i>
            <?php
            } else {
                ?> <i class="fa-regular fa-circle-xmark"></i>
            <?php
            }
        ?>
            <div class="nd_vitien"> <strong style="font-size: 16px; <?php
            if($lsu_rut2['rut_nap'] == 0){
                echo " color: green; " ;
             } else {
                echo " color: red; " ;
             }
        ?>">
                    <?php 
                 if($lsu_rut2['rut_nap'] == 0){
                    echo " Nạp " ;
                 } else {
                    echo " Rút " ;
                 }
            ?>
                    :
                    <?php echo $lsu_rut2['money'] ?>đ
                </strong> =
                <?php 
                if($lsu_rut2['loai'] == 1){
                    echo " MB BANK ";
                } elseif ($lsu_rut2['loai'] == 2) {
                    echo " KUCOIN ";
                } elseif ($lsu_rut2['loai'] == 3) {
                    echo " Internet Banking ";
                } elseif ($lsu_rut2['loai'] == 4) {
                    echo " USDT " ;
                }
            ?>
                <a class="a_time">
                    <?php echo $lsu_rut2['t_gian']; ?>
                </a>
            </div>
        </div>
        <br>
        <?php } ?>

    </div>
    <i id="xemthem_lsu" class="fa-solid fa-chevron-down"></i>
    <!-- ajax wallet phan trang -->
    <?php } else {
        ?>
    <h4 style="text-align: center; color: red;"> Lịch sử giao dịch trống ! </h4>
    <?php
    } ?>
</div>
<br>
