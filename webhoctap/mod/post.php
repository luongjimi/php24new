<div class="post10">

  <div class="post20">

    <div class="left_post">

    <?php if(isset($_SESSION['user']) and $_SESSION['user'] != ""){
      include "cont/lay_id_us.php";
     ?>
    <div class="group_new01">
          
      <div class="new-003">
      <a style="font-size: 24px;"> <i class="fa-solid fa-wand-magic-sparkles"></i> </a> <a style="text-decoration: none; color: rgb(255, 244, 85); margin-left: 8px;" href="index.php?act=user" > Tạo Bài Viết. </a> 
      </div>
      <?php
        if(isset($_GET['class']) and $_GET['class'] == "liked"){
          ?> 
            <div class="new-003">
              <a style="font-size: 24px;"> <i class="fa-solid fa-rotate-left"></i> </a> <a style="text-decoration: none; color: rgb(255, 243, 70); margin-left: 8px;" href="index.php?act=post" > Xem Tất Cả Bài Viết </a> 
            </div>
          <?php
        } else { ?>
          <div class="new-003">
          <a style="font-size: 24px;"> 🤍 </a> <a style="text-decoration: none; color: rgb(255, 243, 70); margin-left: 8px;" href="index.php?act=post&class=liked" > Xem Bài Viết Bạn Đã Thích </a> 
          </div>
        <?php } ?>

        </div>

      <?php } else { ?>
      <div class="new-003">
        <div style="white-space: nowrap; overflow: scroll; height: 35px; display: flex ;align-items: center; gap:8px ;font-size: 18px;">
          <i class="fa-solid fa-right-to-bracket"></i> <a style="text-decoration: none; color: yellow; margin-left: 5px;" href="index.php?act=log"><em> Đăng Nhập </em></a> để tạo nội dung bổ ích, cùng chia sẻ thắc mắc, critical thinking ... Và nhiều hơn thế nữa !
        </div>
      </div>
        <?php }
        include "cont/go_back.php";
        
        if(isset($_GET['class']) and $_GET['class'] == "liked"){
         // hien thi bai viet da thich 
          
          ?> <h4 style="margin: 0 0 8px 0; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.705); padding-top: 8px;"> Bài Viết Bạn Đã Like <i style="margin-left: 8px;" class="fa-solid fa-chevron-down"></i> </h4>   <?php
          // phan trang
          $slbd = 5; // so luong bai dang moi trang
          $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
          $offset = ($page - 1) * $slbd;
          $sp_030 = mysqli_query($conn,"SELECT * FROM `tym_post` WHERE us_tym = '$tk02'");
          $tongsp = mysqli_num_rows($sp_030);
          $num_page = ceil($tongsp / $slbd);
          // end phan trang
         
          $row_like30 = mysqli_query($conn,"SELECT * FROM `tym_post` WHERE us_tym = '$tk02' ORDER BY `tym_post`.`id` DESC LIMIT $slbd OFFSET $offset ");
          while ($showlike_30 = mysqli_fetch_array($row_like30)) { 
            $id_post04 = $showlike_30['of_post'] ;   
            $row_post30 = mysqli_query($conn,"SELECT * FROM `post_us` WHERE id_post = '$id_post04'  ORDER BY `post_us`.`id_post` DESC ");
            $showpost_30 = mysqli_fetch_array($row_post30);
            $us_of_like02 = $showpost_30['of_us'];
            $row_us30 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_of_like02' ");
            $showus_30 = mysqli_fetch_array($row_us30);

          ?>
        <div class="post_us30">

          <a href="index.php?act=user&id_us=<?php echo $us_of_like02 ; ?>"> <img src="img/usimg/<?php echo $showus_30['img']; ?>" width="52px" height="52px" style="border: 1px solid white;" > </a>

          <div class="nd_post_us30">

            <a href="index.php?act=user&id_us=<?php echo $us_of_like02; ?>" style="color: black; font-size: 16px;"><em><?php echo $showus_30['name']; ?></em><a style="font-size: 12px; text-decoration: none; color: rgba(0, 0, 0, 0.559);"> <?php echo $showpost_30['time_post'] ?>  </a> </a>

            <div class="top_post_us30"> 
              <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="text-decoration: none; color: rgb(6, 7, 51);"> <h4 style="margin: 0;"> <?php echo $showpost_30['tieu_de']; ?> </h4> </a>
            </div>

            <div class="bottom_post_us30"> <?php
              if (isset($_SESSION['user']) and $_SESSION['user'] != "") {  ?>                          
              <iframe class="like_if" src="cont/like_post.php?id_post=<?php echo $showpost_30['id_post']; ?>&us_like=<?php echo $tk02; ?>" frameborder="0"></iframe>
              <?php } else {
                ?> <a href="index.php?act=log" style="text-decoration: none; color: black; margin-right: 12px;" > <i class="fa-regular fa-heart"></i> </a> <?php 
              } ?>
              <a style="margin-left: -20px; font-size: 16px;"><?php echo $showpost_30['vote']; ?></a>
              |
              <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="color: black; text-decoration: none; font-size: 15px;"> <i class="fa-regular fa-comment"></i> <?php echo $showpost_30['sl_cmt']; ?> Comments </a>
              <?php if(isset($_SESSION['user']) and $tk02 == $us_of_like02){
                ?> <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&add=soa&back=<?php echo $url; ?>" style="color: rgb(255, 0, 0); font-size: 14px;"> Xóa </a> <?php
              } ?>

            </div> 

        </div>

      </div>
      <?php } 

          ?> 
          <div class="pt">
            <?php
                if($page > 3){
                    ?>
                        <a class = "pt_a" href="?act=post&class=liked&page=1">First</a>
                    <?php
                }
                for ($i=1; $i <= $num_page ; $i++) {
                    if ($i != $page) {
                        if($i > $page - 3 && $i < $page + 3){
                            ?> <a class = "pt_a" href="?act=post&class=liked&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                        }
                    } else {
                        ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                    }
                }
                if($page < $num_page - 3){
                    $end = $num_page;
                    ?>
                        <a class = "pt_a" href="?act=post&class=liked&page=<?php echo $end; ?>">Last</a>
                    <?php
                }
            ?>
        </div>
          
          <?php

    } else{ ?>    
      <h4 style="margin: 0 0 8px 0; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.705); padding-top: 8px;"> Bài viết mới nhất <i style="margin-left: 8px;" class="fa-solid fa-chevron-down"></i> </h4>
    <?php
    // phan trang
    $slbd = 5; // so luong bai dang moi trang
    $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
    $offset = ($page - 1) * $slbd;
    $sp2 = mysqli_query($conn,"SELECT * FROM `post_us` ");
    $tongsp = mysqli_num_rows($sp2);
    $num_page = ceil($tongsp / $slbd);
    // end phan trang
    $row_post30 = mysqli_query($conn,"SELECT * FROM `post_us` ORDER BY `post_us`.`id_post` DESC LIMIT $slbd OFFSET $offset ");

    while ($showpost_30 = mysqli_fetch_array($row_post30)) { 
        $us_id_ps30 = $showpost_30['of_us'];
        $row_us30 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_id_ps30' ");
        $showus_30 = mysqli_fetch_array($row_us30);
      ?>
      <!-- beg -->
      <div class="post_us30">

        <a href="index.php?act=user&id_us=<?php echo $us_id_ps30; ?>"> <img src="img/usimg/<?php echo $showus_30['img']; ?>" width="52px" height="52px" style="border: 1px solid white;" > </a>

        <div class="nd_post_us30">

          <a href="index.php?act=user&id_us=<?php echo $us_id_ps30; ?>" style="color: black; font-size: 16px;"><em><?php echo $showus_30['name']; ?></em><a style="font-size: 12px; text-decoration: none; color: rgba(0, 0, 0, 0.559);"> <?php echo $showpost_30['time_post'] ?>  </a> </a>

          <div class="top_post_us30"> 
            <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="text-decoration: none; color: rgb(6, 7, 51);"> <h4 style="margin: 0;"> <?php echo $showpost_30['tieu_de']; ?> </h4> </a>
          </div>

          <div class="bottom_post_us30"> <?php
          if (isset($_SESSION['user']) and $_SESSION['user'] != "") {  ?>                          
            <iframe class="like_if" src="cont/like_post.php?id_post=<?php echo $showpost_30['id_post']; ?>&us_like=<?php echo $tk02; ?>" frameborder="0"></iframe>
            <?php } else {
              ?> <a href="index.php?act=log" style="text-decoration: none; color: black; margin-right: 12px;" > <i class="fa-regular fa-heart"></i> </a> <?php 
            } ?>
            <a style="margin-left: -20px; font-size: 16px;"><?php echo $showpost_30['vote']; ?></a>
            |
            <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="color: black; text-decoration: none; font-size: 15px;"> <i class="fa-regular fa-comment"></i> <?php echo $showpost_30['sl_cmt']; ?> Comments </a>
            <?php if(isset($_SESSION['user']) and $tk02 == $us_id_ps30){
              ?> <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&add=soa&back=<?php echo $url; ?>" style="color: rgb(255, 0, 0); font-size: 14px;"> Xóa </a> <?php
            } ?>

        </div> 

        </div>

      </div>
      <!-- end -->
    <?php } ?>

      <!-- phan trang -->
      <div class="pt">
            <?php
                if($page > 3){
                    ?>
                        <a class = "pt_a" href="?act=post&page=1">First</a>
                    <?php
                }
                for ($i=1; $i <= $num_page ; $i++) {
                    if ($i != $page) {
                        if($i > $page - 3 && $i < $page + 3){
                            ?> <a class = "pt_a" href="?act=post&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                        }
                    } else {
                        ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                    }
                }
                if($page < $num_page - 3){
                    $end = $num_page;
                    ?>
                        <a class = "pt_a" href="?act=post&page=<?php echo $end; ?>">Last</a>
                    <?php
                }
            ?>
        </div>
        <?php } ?>
    </div>

    <div class="right_post"> 
      <h4 class="top002" style="margin: 0 0 8px 0; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.705); padding-top: 8px;"> </h4>
      <?php if(isset($_SESSION['user']) and $_SESSION['user'] != ""){ ?>

        <div class="new-001">
        <a style="font-size: 24px;"> <i class="fa-solid fa-wand-magic-sparkles"></i> </a> <a style="text-decoration: none; color: rgb(255, 244, 85); margin-left: 8px;" href="index.php?act=user" > Tạo Bài Viết. </a> 
        </div>
        <?php
        if(isset($_GET['class']) and $_GET['class'] == "liked"){
          ?> 
            <div class="new-001">
              <a style="font-size: 24px;"> <i class="fa-solid fa-rotate-left"></i> </a> <a style="text-decoration: none; color: rgb(255, 243, 70); margin-left: 8px;" href="index.php?act=post" > Xem Tất Cả Bài Viết </a> 
            </div>
          <?php
        } else { ?>
          <div class="new-001">
          <a style="font-size: 24px;"> 🤍 </a> <a style="text-decoration: none; color: rgb(255, 243, 70); margin-left: 8px;" href="index.php?act=post&class=liked" > Xem Bài Viết Bạn Đã Thích </a> 
          </div>
        <?php } ?>

      <?php } else { ?>
      <div class="new-001">
        <div>
          <i class="fa-solid fa-right-to-bracket"></i> <a style="text-decoration: none; color: yellow; margin-left: 5px;" href="index.php?act=log"><em> Đăng Nhập </em></a> để tạo nội dung bổ ích, cùng chia sẻ thắc mắc, critical thinking ... Và nhiều hơn thế nữa !
        </div>
      </div>
      <?php } ?>
      <h4 style="margin: 0 0 8px 0; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.705); padding-top: 8px;"> Top tương tác tuần <i style="margin-left: 8px;" class="fa-solid fa-chevron-down"></i> </h4>
      
      <div class="top_post_us05">
        <?php 
        $date = date('Y-m-d');
        $row_top30 = mysqli_query($conn,"SELECT * FROM post_us WHERE vote > 0 AND WEEK(time_post) = WEEK(CURDATE()) ORDER BY `post_us`.`vote` DESC LIMIT 3");
        // hien thi bai viet nhieu like nhat theo tuan hien tai
        while ($show_top_30 = mysqli_fetch_array($row_top30)) {
          $us_top_ps30 = $show_top_30['of_us'];
          $row_us_top_30 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_top_ps30' ");
          $show_us_top30 = mysqli_fetch_array($row_us_top_30);
          ?>
        <div class="post_us_40">
          <a style="color: rgb(201, 201, 201); text-decoration: none; font-size: 14px;" href="index.php?act=user&id_us=<?php echo $us_top_ps30; ?>"> <em> <?php echo $show_us_top30['name']; ?> </em> </a>
          <a class="top_post_us30" id="psus40top" href="index.php?act=view_post&id_post=<?php echo $show_top_30['id_post']; ?>&back=<?php echo $url; ?>"> <?php echo $show_top_30['tieu_de']; ?> </a>
          <a style="color: rgb(255, 252, 86); font-size: 14px; white-space: nowrap;"> ❤️ React: <?php echo $show_top_30['vote']; ?>  |  <i class="fa-regular fa-comment"></i> Comments: <?php echo $show_top_30['sl_cmt']; ?> </a> 
        </div>
        <?php } ?>  
      </div>

    </div>

  </div>

</div>