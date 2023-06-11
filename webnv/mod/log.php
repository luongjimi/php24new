<div class="img_log">
   <img src="img/logo1.png" width="90px" height="auto" style="border-radius: 30%;"> 
</div>
<form class="form_log" method="post" enctype="application/x-www-form-urlencoded">
   <h3 style="margin-bottom: 0;"> Đăng Nhập </h3>
   <div style="width: 100%;">
      <p style="display: flex; justify-content: flex-start ; font-size: 14px;"> Tài khoản : </p>
      <input type="email" maxlength="50" placeholder="email" name="email" required>
   </div>
      
   <div style="width: 100%;">
      <p style="text-align: left; font-size: 14px;"> Mật khẩu : </p>
      <input type="password" maxlength="40" placeholder="********" name="pw" required>
   </div>
   
   <br>
   
   <input type="submit" name="login" class="btn_log" value="Xác nhận">
   
   <br>
   
   <a href="index.php?act=reg" style="text-align: left; font-size: 14px; " > Đăng kí </a>
   
</form>
   <br>
<?php 
if (isset($_POST['login'])) {
   $tk = htmlspecialchars($_POST['email']);
   $mk = md5($_POST["pw"]);
   $rows = mysqli_query($conn," SELECT * from user where email = '$tk' and pw = '$mk' ");
   $count = mysqli_num_rows($rows);

   if ($count == 1) {

       //nguoi dung bi baned cad = 2
       $row3 = mysqli_query($conn," SELECT * FROM user WHERE email = '$tk' and cad = 2 ");
       $banus = mysqli_num_rows($row3);

       if ($banus == 1) {
         ?> <script> alert("Tài khoản đã bị ban do vi phạm"); </script> <?php
       } else {
           $_SESSION['user'] = $tk;
           header ("Location: index.php?act=home");
       }
   } else {
      ?> <script> alert("Sai thông tin đăng nhập"); </script> <?php
   }
}

?>