<div class="img_log">
   <img src="img/logo1.png" width="90px" height="auto" style="border-radius: 30%;"> 
</div>
<form class="form_log" method="post" enctype="application/x-www-form-urlencoded">
   <h3 style="margin-bottom: 0;"> Đăng Kí </h3>
   <div style="width: 100%;">
      <p style="display: flex; justify-content: flex-start ; font-size: 14px;"> Tài khoản : </p>
      <input type="email" maxlength="50" placeholder="email" name="email" required>
   </div> 
      
   <div style="width: 100%;">
      <p style="text-align: left; font-size: 14px;"> Mật khẩu : </p>
      <input type="password" maxlength="40" placeholder="********" name="pw1" required >
   </div>

   <div style="width: 100%;">
      <p style="text-align: left; font-size: 14px;"> Nhập lại mật khẩu : </p>
      <input type="password" maxlength="40" placeholder="********" name="pw2" required>
   </div>

   <br>
   
   <input type="submit" name="reg" class="btn_log" value="Xác nhận">
   
   <br>
   
   <a href="index.php?act=log" style="text-align: left; font-size: 14px; " > Đăng nhập </a>
   
</form>
<br>
<?php 
   $ptemail = "/^[a-z][a-z0-9_\.]{3,32}@[a-z0-9]{2,8}(\.[a-z0-9]{2,4}){1,2}$/";
   $ptmk = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
   if(isset($_POST['reg'])){

       $email = $_POST['email'];
       $pw1 = $_POST['pw1'];
       $pw2 = $_POST['pw2'];
       
       if($pw1 != $pw2){
            ?> <script> alert("Mật khẩu không giống nhau"); </script> <?php
       } elseif (!preg_match($ptemail, $email)) {
            ?> <script> alert("Sai định dạng email"); </script> <?php
       } elseif (!preg_match($ptmk, $pw1)) {
            ?> <script> alert("Mật khẩu quá yếu"); </script> <?php       
      }else{
            // check ught
               $check_ug = $_SERVER ['HTTP_USER_AGENT'];
            // check ip
               $ip = $_SERVER['REMOTE_ADDR'];

            $c_email = "SELECT * FROM user WHERE email = '$email' ";
            $run1 = mysqli_query($conn, $c_email);
            $count5 = mysqli_num_rows($run1);
         
            $ugnt = bin2hex($check_ug);
            $ip2 = bin2hex($ip);

            $c_ugnt = "SELECT * FROM user WHERE ugnt = '$ugnt' OR ip = '$ip2' ";
            $run2 = mysqli_query($conn, $c_ugnt); 
            $rows_ug = mysqli_num_rows($run2);

            if ($rows_ug > 0) {
                  ?> <script> alert("Bạn không được đăng kí"); </script> <?php
            }
            elseif($count5 > 0){
                  ?> <script> alert("Email đã được sử dụng"); </script> <?php
            } else {
                        $sql1 = "INSERT INTO user (email, pw, ugnt, ip) VALUES ('$email', md5('$pw1'), '$ugnt', '$ip2') ";
                        $run4 = mysqli_query($conn, $sql1);
                        ?> <script> alert("Đăng kí thành công"); </script> <?php
            }
         }
   }
?>


