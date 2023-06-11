
<?php if(isset($_SESSION['user']) and $_SESSION['user'] != "" ){ 
    
    $countcd1 = mysqli_num_rows($rowid);
    $time_code = $countid['re_time'];
    $end_code = strtotime("$time_code");
    $time_con = $end_code - $now;

    if($countcd1 > 0){
    
        if(isset($_POST['code'])){
        
            if($time_con > 0 ){
                ?> <script> alert("Code chưa hết hạn"); </script> <?php
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
                        ?> <script> alert("Thất bại"); </script> <?php
                       } else {
                        ?> <script> alert("Code đã được gửi đến email <?php echo $tk; ?>"); </script> <?php
                       }
                    } 
            }
    
        }

        if(isset($_POST['re_pw'])){
            if(!empty($_POST['c_code']) and !empty($_POST['npw'])){
                $code1 = htmlspecialchars($_POST['c_code']);
                $new_mk = htmlspecialchars($_POST['npw']);
                $ptmk = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                $codedb = $countid['code'];
                if (!is_numeric($code1) and (strlen($code1) < 6) ) {
                    ?> <script> alert("Sai code"); </script> <?php
                } elseif (!preg_match($ptmk, $new_mk)) {
                    ?> <script> alert("Sai định dạng mật khẩu"); </script> <?php
                } elseif($time_con < 0 ){
                    ?> <script> alert("Code đã hết hạn"); </script> <?php
                } elseif($codedb === $code1 ) {
                    $sql11 = "UPDATE `user` SET pw = md5('$new_mk') WHERE email = '$tk' ";
                    $sql12 = "UPDATE `user` SET code = 0 WHERE email = '$tk'";
                        if (($conn->query($sql11) === TRUE) and ($conn->query($sql12) === TRUE)) {
                            ?> <script> alert("Đổi mật khẩu thành công"); </script> <?php
                        }    
                } else {
                    ?> <script> alert("Sai code"); </script> <?php
                }

            }
        }

    }   
        
?>

<div class="img_log">
   <img src="img/logo1.png" width="90px" height="auto" style="border-radius: 30%;"> 
</div>
<form class="form_log" method="post" enctype="application/x-www-form-urlencoded">
    <h3 style="margin-bottom: 0;"> Đổi Mật Khẩu </h3>

    <div style="width: 100%;">
        <p style="display: flex; justify-content: flex-start ; font-size: 14px;"> Nhập mã gửi đến email : </p>
        <div class="code_btn">
            <input type="number" maxlength="6" style="width: 80%;" placeholder="Code" name="c_code" >
            <input type="submit" name="code" class="btn_log" style="width: 20%;" value="Gửi mã">
        </div>
    </div>
    
    <div style="width: 100%;">
        <p style="text-align: left; font-size: 14px;"> Mật khẩu mới : </p>
        <input type="password" maxlength="40" placeholder="********" name="npw">
    </div>

    <br>
 
    <input type="submit" name="re_pw" class="btn_log" value="Xác nhận">

</form>

<?php 

} else {
    header("location: index.php");
} ?>