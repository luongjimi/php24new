<?php 
  if (isset($_GET['id_post'])) {
    $idsa = $_GET['id_post'];
      $row_post10 = mysqli_query($conn,"SELECT * FROM `post_us` WHERE id_post = '$idsa' ");
      $showpost_z = mysqli_fetch_array($row_post10) ;

      $id_of_us39 = $showpost_z['of_us'];
      $row_us10 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$id_of_us39' ");
      $showus_z = mysqli_fetch_array($row_us10) ;
      $us_post12 = $showus_z['name'] ;

      ?>
      <div style="background: linear-gradient(90deg, #1F2042, rgba(0, 70, 60, 0.842));"> 
        <div class="v_post03" >

          <div class="top_post02" >

            <div class="top_back">
              <?php 
                if(isset($_GET['back']) and $_GET['back'] != ""){
                  $back03 = $_GET['back'];
                  // dich ma de lay suorse
                  $url2 =  hex2bin($back03);
                  ?> <a href="<?php echo $url2; ?>"> <i style="font-size: 32px;" class="fa-solid fa-circle-xmark"></i> </a> <?php
                } else {
                  ?> <a href="index.php?act=post"> <i style="font-size: 32px;" class="fa-solid fa-circle-xmark"></i> </a> <?php
                }
              ?>
              
              <p style="margin: 0 0 0 -8px ; overflow: hidden; text-overflow: ellipsis; color: rgb(0, 0, 0); font-size: 16px; " > <em> <?php echo $us_post12; ?> </em> </p> <a class="top_back2" style="font-size: 12px; margin-left: -10px;"> <?php echo $showpost_z['time_post']; ?> </a>
            </div> 
            <div class="nd_ps01">
              
              <h3 style="margin: 0px 5px 5px 5px ;"> <?php echo $showpost_z['tieu_de'] ?> </h3> 
              <div style="border: 1px solid #e9e9e9; margin: 0 60px 0 60px ;"></div>
                <div>
                   <?php print_r($showpost_z['noi_dung']) ?> 
                </div>
            
            <div style="background-color: #f3f3f3; margin: 0 6px 0 6px; " class="bottom_post_us30" > <?php
            // phan like, share, sl cmt , soa
              if (isset($_SESSION['user']) and $_SESSION['user'] != "") {  
                  include "cont/lay_id_us.php";
                ?>                          
              <iframe class="like_if" src="cont/like_post.php?id_post=<?php echo $idsa; ?>&us_like=<?php echo $tk02; ?>" frameborder="0"></iframe>
              <?php } else {
                ?> <a href="index.php?act=log" style="text-decoration: none; color: black; margin-right: 12px;" > <i class="fa-regular fa-heart"></i> </a> <?php 
              } ?>
              <a style="margin-left: -20px; font-size: 16px;"><?php echo $showpost_z['vote']; ?></a>
              |
              <a href="#cmt" style="color: black; text-decoration: none; font-size: 15px;"> <i class="fa-regular fa-comment"></i> <?php echo $showpost_z['sl_cmt']; ?> Comments </a>
              |  
              <button onclick="myFunction193()" style="cursor: pointer; font-size: 16px; margin-top: 5px;"> <i  class="fa-solid fa-share-from-square" ></i> </button>
              <input type="text" style="display: none;" id="copy213" value="<?php include "cont/go_back.php"; echo $url3 ; ?> ">

              <?php if(isset($_SESSION['user']) and ($tk02 == $showpost_z['of_us']) ){
               ?> | <a href="index.php?act=view_post&id_post=<?php echo $idsa; ?>&add=soa<?php 
               if(isset($_GET['back']) and $_GET['back'] != "") { echo "&back=$back03"; } ?>" style="color: rgb(255, 0, 0); font-size: 14px;"> Xóa </a> <?php
              } ?> 

            </div> 

            </div>

          </div>

          <div class="nd_ps01" id="cmt" style="padding: 0;">
            <form method="post" style="border-bottom: 1px solid black;" > 
            <textarea class="editor" data-editor="ClassicEditor" placeholder="Nội dung bình luận <5 - 2000>" name="nd_bl_post"> </textarea>
            <input class="btn_add_bv" type="submit" name="them_bls" style="font-size: 16px;" value="Gửi">  
            </form>

            <script>
              function myFunction193() {
              var copyText = document.getElementById("copy213");
              copyText.select();
              copyText.setSelectionRange(0, 99999); 
              navigator.clipboard.writeText(copyText.value);
              alert(" Đã copy vào thanh nhớ tạm ! ");
            };
            </script>

            <!-- hien thi bl = iframe + ajax hoac moi ajax thoi cx dc  -->

            <?php
              // su li binh luan 
              $date_now = date("Y-m-d");
                if(isset($_POST['them_bls'])){
                  if(isset($_SESSION['user']) and $_SESSION['user'] != ""){
                    // su li binh luan
                    // $tk02 (user binh luan) 
                    $nd_bl = $_POST['nd_bl_post'];
                    $length_nd = strlen($nd_bl);

                      if ($length_nd >5 and $length_nd <2200 )  {  
                       
                        $row_post1 = mysqli_query($conn,"SELECT * FROM `cmt_post` WHERE of_us = '$tk02'AND of_ps = '$idsa'  AND time_cmt = '$date_now' ");
                        $sl12ux = mysqli_num_rows($row_post1);
                        if($sl12ux < 5){
                          // them noi dung bl
                        $sqlus11 = "INSERT INTO `cmt_post` (`of_us`, `of_ps`, `nd_cmt`, `time_cmt` ) VALUES ( '$tk02', '$idsa', '$nd_bl', '$date_now' ) ";
                        
                        if($conn->query($sqlus11)===true){ 
                          $rows220 = mysqli_query($conn," SELECT * FROM cmt_post WHERE of_ps = '$idsa' ");
                          $sl12 = mysqli_num_rows($rows220);
                          $themfl2 = " UPDATE post_us SET sl_cmt = '$sl12' WHERE id_post = '$idsa' ";
                          if($conn->query($themfl2)===true){
                            header("Location: index.php?act=view_post&id_post=$idsa");
                          }
                        }
                        
                        } else {
                        ?>
                          <script>
                            alert("Bạn đang spam quá nhiều binh luận !");
                          </script>
                        <?php
                        }
                      } else {
                        ?>
                            <script>
                                alert("Nội dung bình luận không đủ kí tự.");
                            </script>
                        <?php
                    }
                  }
                   else {
                    ?> <script> alert("Vui lòng đăng nhập để bình luận ! "); </script> <?php
                  }
                }
              // end su li binh luan
            ?>

              <div class="bl_ps03">
                <a style="padding: 8px; font-size: 18px; color: black;"> Bình luận : </a>
                <?php 
                  if($showpost_z['sl_cmt'] == 0){
                    ?> <p style="text-align: center;"> Chưa có bình luận nào ! </p> <?php
                  } else {
                    ?> <div id="xem_them_bl3" >  <?php
                    $row_us_top_30 = mysqli_query($conn,"SELECT * FROM `cmt_post` WHERE of_ps = '$idsa' ORDER BY `cmt_post`.`id_cmt` DESC LIMIT 5 ");
                    while($show_us_top30 = mysqli_fetch_array($row_us_top_30)){
                      $us_bl92 = $show_us_top30['of_us'];
                      $row_us92 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_bl92' ");  
                      $show_us92 = mysqli_fetch_array($row_us92);
                      // hien thi binh luan user theo ajax
                    ?>
                      <div class="bl_ps05">
                          <img src="img/usimg/<?php echo $show_us92['img']; ?>" width="50px" height="50px" style="border: 1px solid white; border-radius: 150px; background-color:white;" >
                          <div class="bls03">
                            <span> 
                              <a href="index.php?act=user&id_us=<?php echo $show_us_top30['of_us']; ?>"  style="font-size: 16px; color: black;"> <em> <?php echo $show_us92['name']; ?></em></a> <a style="margin-left: 4px; font-size: 12px;"> <?php echo $show_us_top30['time_cmt']; ?> </a> 
                              <?php if(isset($_SESSION['user']) and ($tk02 == $show_us_top30['of_us']) ){
                               ?>  <a href="index.php?act=view_post&id_post=<?php echo $idsa; ?>&add=soa_cmt&id_cmt=<?php echo $show_us_top30['id_cmt']; ?>" style="font-size: 12px; margin-left: 10px; color: red;"> Xóa </a> <?php
                              } 
                              ?>
                            </span>
                            <div style="font-size: 14px; margin-top: 5px;">
                              <?php echo $show_us_top30['nd_cmt']; ?>  
                            </div>
                          </div>
                      </div>
                    <?php
                    }
                    ?>
                    </div>
                     <a href="javascript:void(0)" id="xemthem_bl1" style="display: flex; justify-content: center; font-size: 15px; color: black; margin-top: 8px; text-decoration :none;"> <i class="fa-solid fa-angle-down"></i> </a>
                    <?php
                  } // end hien thi binh luan user
                ?>
              
            </div>

            <script>
          
            $(document).ready(function(){
              var trang02 = 1;
              $("#xemthem_bl1").click(function() {
                    trang02 = trang02 + 1;
                    $.get("cont/ajax_blbv.php", {trang_cmt : trang02 , id_bv:<?php echo $_GET['id_post']; ?> }, function(data){
                    $("#xem_them_bl3").append(data);
                    });
              });
            });

          </script>
          </div>

        </div>
      </div>
     
      <?php

        // soa bai viet
      if(isset($_GET['add']) and $_GET['add'] == "soa" ){
        if(isset($_SESSION['user']) and $_SESSION['user'] != "" ){
          if($tk02 == $showpost_z['of_us']){
            // soa cmt of bv -> soa tym of bv -> soa bv
            // kiem tra xem no co phai nguoi dang bai khong 
            $soa_tym1 = "DELETE FROM tym_post WHERE of_post='$idsa' ";
            if($conn->query($soa_tym1)===true){
              $soa_cmt1 = " DELETE FROM cmt_post WHERE of_ps = '$idsa' ";
              if($conn->query($soa_cmt1)===true){
                $soa_post1 = " DELETE FROM post_us WHERE id_post = '$idsa' ";
                if($conn->query($soa_post1)===true){
                  if(isset($_GET['back']) and $_GET['back'] != "" ){
                    header("Location: $url2");
                  } else{
                    header("Location: index.php?act=post");
                  }
                }
              }
            }
          }
        }
      }

      if( (isset($_GET['add']) and $_GET['add'] == "soa_cmt" ) and (isset($_GET['id_cmt']) and $_GET['id_cmt'] != "" ) ){
        $soacmt1 = $_GET['id_cmt'];
        $row_cmt_soa1 = mysqli_query($conn,"SELECT * FROM `cmt_post` WHERE id_cmt = '$soacmt1' AND of_ps = '$idsa' ");  
        $show_cmt_soa1 = mysqli_fetch_array($row_cmt_soa1);
        if(isset($_SESSION['user']) and $_SESSION['user'] != "" ){
          if($tk02 == $show_cmt_soa1['of_us']){
            $soa_cmt3 = "DELETE FROM cmt_post WHERE id_cmt = '$soacmt1' ";
            if($conn->query($soa_cmt3)===true){
              $row_cmt_soa1 = mysqli_query($conn,"SELECT * FROM `cmt_post` WHERE of_ps = '$idsa' "); 
              $dem_slcmt = mysqli_num_rows($row_cmt_soa1);
              $sua_cmt1 = " UPDATE post_us SET sl_cmt = '$dem_slcmt' WHERE id_post = '$idsa' ";
              if($conn->query($sua_cmt1)===true){
                header("Location: index.php?act=view_post&id_post=$idsa");
              }
            }
          }
      }
    }

  }
?>
