<div class="home_gt">
   <ul style="margin: 0; padding: 0;">
      <h3 style="margin: 0 0 26px 0; text-align: center;"> Tổng quan công việc <i style="font-size: 26px; margin-left: 8px;" class="fa-solid fa-caret-down"></i> </h3>
      <div class="grid_sp2"> 
         <?php 
            $all_nv0 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' ");
            $sl_nv0 = mysqli_num_rows($all_nv0);
            $all_nv1 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' AND trang_thai = 0 ");
            $sl_nv1 = mysqli_num_rows($all_nv1);
            $all_nv2 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' AND trang_thai = 1  ");
            $sl_nv2 = mysqli_num_rows($all_nv2);
            $all_nv3 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' AND trang_thai = 2  ");
            $sl_nv3 = mysqli_num_rows($all_nv3);
         ?>
      <li style="font-size: 16px;"> <i style="font-size: 24px; margin-right: 6px;" class="fa-solid fa-wave-square"></i> Tổng nhiệm vụ đã làm : <?php echo $sl_nv0; ?> </li>
      <li style="font-size: 16px;"> <i style="font-size: 26px; margin-right: 6px;" class="fa-regular fa-circle-check"></i> Hoàn thành  : <?php echo $sl_nv2; ?> </li>
      <li style="font-size: 16px;"> <i style="font-size: 26px; margin-right: 6px;" class="fa-regular fa-circle-xmark"></i>Thất Bại : <?php echo $sl_nv3; ?> </li>
      <li style="font-size: 16px;">  <i style="font-size: 26px; margin-right: 6px;" class="fa-solid fa-spinner"></i>  Nhiệm vụ chưa duyệt : <?php echo $sl_nv1; ?> </li>
      </div>
   </ul>
   <br>
</div>
<br>
<div class="home_gt">
   <h3 style="text-align: center; margin-top: 0;"> Nhiệm vụ chờ duyệt <i style=" margin-left: 8px;" class="fa-solid fa-ellipsis"></i> </h3>
   <?php if($sl_nv1 > 0) { 
      ?>
   <div style="overflow: scroll;" >
   
   <table id="customers">
      <tr>
        <th> Tên nhiệm vụ </th>
        <th> Hết hạn lúc </th>
        <th> Chờ nhận được </th>
      </tr> 
         <?php 
         // phan trang
         $slbd = 10; // so luong bai dang moi trang
         $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
         settype($page, "int");
         $offset = ($page - 1) * $slbd;
         $showgv1 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' AND trang_thai = 0 ");
         $tongsp = mysqli_num_rows($showgv1);
         $num_page = ceil($tongsp / $slbd);
         // end phan trang
         
         $all_nv0121 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_us = '$tk2' AND trang_thai = 0 ORDER BY `duyet_nv`.`loai` DESC  LIMIT $slbd OFFSET $offset ");

         while($show_nv12 = mysqli_fetch_array($all_nv0121)){
         $trang_thai = $show_nv12['trang_thai']; 
         $loainv1 = $show_nv12['loai'];
         ?> <tr>
         <td style="white-space: nowrap; height: 22px; text-align: center;" > <i class="fa-solid fa-fire" style="color: red;"></i> <a style="color: rgb(7, 61, 61); text-decoration: none;" href="index.php?act=view_job&idnv=<?php echo $show_nv12['of_job']; ?>"> <?php
            if($loainv1 == 1 ){
               echo " SEO [".$show_nv12['of_job']."] + Promote Content + InPage 3x + ADS 3x ";
            } elseif ($loainv1 == 2) {
               echo  " [".$show_nv12['of_job']."] BUFF thành viên nhóm Zalo ";
            } elseif ($loainv1 == 3) {
               echo  " SEO [".$show_nv12['of_job']."] + Pro Content + InPage 3x + ADS 3x (CODE) ";
            } elseif ($loainv1 == 4) {
               echo  " [".$show_nv12['of_job']."] BUFF APP Android/IOS + Đăng kí ";
            } elseif ($loainv1 == 5) {
               echo  " [".$show_nv12['of_job']."] BUFF đơn Shopee + Follow shop + Đánh giá 5* ";
            }
         ?> </a> </td>
         <td style="text-align: center; white-space: nowrap; color: rgba(0, 0, 0, 0.755);">
            <?php
               $end_timw12 = $show_nv12['het_han'] ;
               $new_time12 = date ( 'Y-m-d H:i:s' , $end_timw12 );
               echo $new_time12;
            ?>   
         </td>
         <td style="text-align: center ;white-space: nowrap; color:green;">
         <?php if( ($loainv1 == 1) or ($loainv1 == 2) ){
            echo " 450 VND ";
         } elseif ($loainv1 == 3) {
            echo " 650 VND ";
         } elseif ($loainv1 == 4) {
            echo " 1,500 VND ";
         } elseif ($loainv1 == 5) {
            echo " 13,000 VND ";
         } ?>
         </td>
      </tr>
      <?php } ?>
    </table>

   </div>
   <br>
   
   <div class="pt">
         <?php $ipg = 1;
            $ipg2 = $page + 1 ; 
            $ipg3 =  $page - 1 ;
         if ($num_page == 1) {
            // neu chi co 1 giao vien
            ?> <a href="#" > <i class="fa-solid fa-chevron-left"></i> </a> <?php
         } elseif ($ipg == $num_page ) {
            // nghia la dang o trang cuoi
            ?> <a href="index.php?act=tk&page=<?php echo $ipg3  ; ?>"> <i class="fa-solid fa-chevron-left"></i> </a> <?php 
         } elseif($ipg == $page){
            ?> <a href="#" > <i class="fa-solid fa-chevron-left"></i> </a> <?php
         } else { ?>
         <a href="index.php?act=tk&page=<?php echo $ipg3 ; ?>" > <i class="fa-solid fa-chevron-left"></i> </a>
            <?php } ?>

            <?php
         // ao vl :))
         if ($num_page == $page) {
            ?> <a href="#"> <i class="fa-solid fa-chevron-right"></i> </a> <?php
         } elseif ($ipg == $num_page ) {
            // nghia la dang o trang cuoi
            ?> <a href="#" > <i class="fa-solid fa-chevron-right"></i> </a> <?php 
         } elseif($ipg == $page){
            // nghia la dang o trang dau
            ?> <a href="index.php?act=tk&page=<?php echo $ipg2; ?>" > <i class="fa-solid fa-chevron-right"></i> </a> <?php
         } else { ?>
            <a href="index.php?act=tk&page=<?php echo $ipg2; ?>" > <i class="fa-solid fa-chevron-right"></i> </a>
            <?php } ?>

   </div>  

   <?php
   }  else {
         ?> <h4 style="color:red; text-align: center;"> Chưa có nhiệm vụ nào. </h4> <?php 
      } ?>

<hr>
<div class="home_gt" id="addttus1">
   <div class="a123us">
      <h3 style="text-align: center; margin-top: 0; white-space: nowrap;"> Thêm tài khoản  <i style=" margin-left: 8px;" class="fa-solid fa-circle-plus"></i> </h3>
      <form class="form_add_ttus"  method="post" enctype="application/x-www-form-urlencoded">
         <div>Loại: 
         <select name="loait_k" style="height: 26px; margin-left: 10px; padding-right: 4px;" required>
            <option value="1"> Zalo - SĐT </option>
            <option value="2"> Shopee - username </option>
      </select> </div>
         <input type="text" maxlength="32" placeholder=" Thông tin tài khoản " name="tt_tkus" required>
         <h6 style="margin: 0;"> * Tôi cam kết thông tin mình cung cấp có tồn tại và thuộc sở hữu của bản thân </h6>
         <button class="btn_log" style="font-size: 16px; padding: 5px;" type="submit" name="addtk" > Thêm </button>
      </form>
      <?php // them vao 3 acc zalo + 1 acc shopee 
         if(isset($_POST['addtk'])){
            $loaitk4 = $_POST['loait_k'];
            $ttus112 = htmlspecialchars($_POST['tt_tkus']);
            if($loaitk4 == 1){
               $regex_sdt = "/(0|[3|5|7|8|9])+([0-9]{8})\b/";
            } elseif ($loaitk4 == 2) {
               $regex_sdt ="/^[a-z0-9_-]{3,24}$/";
            }
            if (!preg_match($regex_sdt, $ttus112)) {
               ?> <script> alert("Sai định dạng username/phone"); </script> <?php
            } else {
                  $c_ugnt4 = "SELECT * FROM tai_khoan WHERE tt_tk = '$ttus112' ";// check xem tk nay ton tai hay chua
                  $run24 = mysqli_query($conn, $c_ugnt4); 
                  $rows_ug4 = mysqli_num_rows($run24);

               if($rows_ug4 == 0){
               
                  $c_ugnt = "SELECT * FROM tai_khoan WHERE loai = '$loaitk4' AND of_us = '$tk2' ";// CHECK SO LUONG TAI KHOAN
                  $run2 = mysqli_query($conn, $c_ugnt); 
                  $rows_ug = mysqli_num_rows($run2);

                  if( ( ($loaitk4 == 1) and ($rows_ug < 3) ) or (($loaitk4 == 2) and ($rows_ug == 0) ) ){
                     $sql1 = "INSERT INTO tai_khoan (loai, tt_tk, of_us) VALUES ('$loaitk4', '$ttus112', '$tk2') ";
                     $run4 = mysqli_query($conn, $sql1);
                     ?> <script> alert(" Thêm tài khoản thành công "); </script> <?php
                  } else {
                     ?> <script> alert(" Quá số lượng tài khoản "); </script> <?php
                  }

            } else {
               ?> <script> alert(" Tài khoản đã tồn tại "); </script> <?php
            }
               
            }
          
         }

      ?>
   </div>
   <div class="ttus123a">
      <h3  style="text-align: center; margin-top: 0;"> Quản lý tài khoản <i style=" margin-left: 8px;" class="fa-solid fa-user"></i> </h3>
      <?php $row_tk30 = mysqli_query($conn,"SELECT * FROM tai_khoan WHERE of_us = '$tk2' ORDER BY `tai_khoan`.`loai` ASC "); 
            $sltj04 = mysqli_num_rows($row_tk30);
            if($sltj04 > 0) { 
         ?>
      <div class="tble_tkus">
         <table id="customers">
            <tr>
               <th>Tài khoản</th>
               <th>Thông tin</th>
               <th>Trạng thái</th>
            </tr>
            <?php 
              
               while ($showtk_30 = mysqli_fetch_array($row_tk30)) {
                  $loas1w = $showtk_30['loai'];
            ?>
            <tr>
            <td  style=" text-align: center; height: 20px;"> <?php 
               if ($loas1w == 1) {
                  echo "Zalo";
               } elseif ($loas1w == 2) {
                  echo "Shopee";
               }
            ?> </td>
            <td  style="white-space: nowrap; text-align: center;"> <?php echo $showtk_30['tt_tk'] ?> </td>
            <?php if ($loas1w == 1) {
               if( isset($sdt1) and ($sdt1 == $showtk_30['id_tk']) ){
                  ?> <td  style="white-space: nowrap; text-align: center;"> <a href="index.php?act=tk&off=<?php echo $showtk_30['id_tk'] ?>" class="run_ttus"> ON </a> </td> <?php
               } else {
                  ?> <td  style="white-space: nowrap; text-align: center;"> <a href="index.php?act=tk&on=<?php echo $showtk_30['id_tk'] ?>" class="off_ttus"> OFF </a> </td> <?php
               }
               } elseif ($loas1w == 2) {
                  ?> <td  style="white-space: nowrap; text-align: center;"> <a style="background-color: rgb(180, 180, 180);" href="#" class="off_ttus"> NaN </a> </td>
               <?php } ?>
            </tr>
            <?php } ?>
         </table>
      </div> 
         <?php 
         }  else {  ?> <h4 style="color:red; text-align: center;"> Bạn chưa thêm tài khoản nào. </h4> <?php 
         } ?>
   </div>
</div>
</div>

<br>
<div class="home_gt3">
   <a href="index.php?act=re_pw" style="padding: 5px 20px; border-right: 1px solid black; color: green;">  Đổi mật khẩu<i style="margin-left: 8px;" class="fa-solid fa-key"></i> </a>
   <a href="index.php?act=out" style="color: red; "> Đăng xuất<i style="margin-left: 8px;" class="fa-solid fa-right-from-bracket"></i> </a>
</div>

<?php
   if(isset($_GET['on'])){
      // lamm sao de 1 tai khoan duoc chay
      $id_on = $_GET['on'];
      $_SESSION['acc_run'] = $id_on;
      header("location: index.php?act=tk");
   } elseif (isset($_GET['off'])) {
      unset($_SESSION['acc_run']);
      header("location: index.php?act=tk");
   }

?>