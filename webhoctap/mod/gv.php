<div class="main2">
   <div class="wrslide01">
      <div class="mon21">
         <a href="index.php?act=gv&col=1"> <i class="fa-solid fa-calculator"></i> Toán </a>
         <a href="index.php?act=gv&col=2"><i class="fa-solid fa-atom"></i> Lý </a>
         <a href="index.php?act=gv&col=4"> <i class="fa-solid fa-flask-vial"></i> Hóa </a>
         <a href="index.php?act=gv&col=3"> <i class="fa-solid fa-font"></i> Anh </a>
      </div>

      <?php if(isset($_GET['col']) and $_GET['col'] != "" ){
         $mon1 = $_GET['col'];
         // phan trang
         $slbd = 1; // so luong bai dang moi trang
         $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
         settype($page, "int");
         $offset = ($page - 1) * $slbd;
         $showgv1 = mysqli_query($conn,"SELECT * FROM `mt_gv` WHERE of_mon = '$mon1' ");
         $tongsp = mysqli_num_rows($showgv1);
         $num_page = ceil($tongsp / $slbd);
         // end phan trang
         $row_gv1 = mysqli_query($conn,"SELECT * FROM `mt_gv` WHERE of_mon = '$mon1'  ORDER BY `mt_gv`.`uid` DESC LIMIT $slbd OFFSET $offset ");
            if(mysqli_num_rows($row_gv1) > 0){
               $shogv2 = mysqli_fetch_array($row_gv1);
               $uidgv = $shogv2['of_gv'];
               $sho2v5 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$uidgv' ");
               $shogv5 = mysqli_fetch_array($sho2v5);
            
      ?>

      <div class="inslide01">
         <?php $ipg = 1;
            $ipg2 = $page + 1 ; 
            $ipg3 =  $page - 1 ;
         if ($num_page == 1) {
            // neu chi co 1 giao vien
            ?> <a href="#" class="control31"> <i class="fa-solid fa-circle-chevron-left"></i> </a> <?php
         } elseif ($ipg == $num_page ) {
            // nghia la dang o trang cuoi
            ?> <a href="index.php?act=gv&col=<?php echo $mon1 ;?>&page=<?php echo $ipg3  ; ?>" class="control31"> <i class="fa-solid fa-circle-chevron-left"></i> </a> <?php 
         } elseif($ipg == $page){
            ?> <a href="#" class="control31"> <i class="fa-solid fa-circle-chevron-left"></i> </a> <?php
         } else { ?>
         <a href="index.php?act=gv&col=<?php echo $mon1 ;?>&page=<?php echo $ipg3 ; ?>" class="control31"> <i class="fa-solid fa-circle-chevron-left"></i> </a>
            <?php } ?>

         <div class="nd_flsgv2">
            <img src="img/usimg/<?php echo $shogv5['img']; ?>" style="border-radius: 15%; background-color: whitesmoke; box-shadow: 0px 0px 20px 0 rgba(172, 255, 251, 0.336); " height="auto" width="240px">
            <div class="ndmtgv013">

               <h3 style="margin: 0 0 10px 0;  white-space: nowrap;"> Giáo viên: <a href="index.php?act=user&id_us=<?php echo $uidgv; ?>" style="color: white; margin-left: 12px;">  <?php echo $shogv5['name']; ?>  </a></h3>
   
               <div class="social12"> 
                  <a href="<?php echo $shogv2['fb']; ?>"> <i class="fa-brands fa-square-facebook"></i> </a>
                  <a href="<?php echo $shogv2['yt']; ?>"> <i class="fa-brands fa-youtube"></i> </a>
                  <a href="<?php echo $shogv2['tik']; ?>"> <i class="fa-brands fa-tiktok"></i> </a>
               </div>


               <ul class="dasdq21">
                  <h4 style="margin: 0 0 8px 0;"> <em> Kinh nghiệm chuyên môn:  </em></h4>
                  <?php echo $shogv2['mota']; ?>
               </ul>
         
            </div>

         </div>
         
         <?php
         // ao vl :))
         if ($num_page == $page) {
            ?> <a href="#" class="control31"> <i class="fa-solid fa-circle-chevron-right"></i> </a> <?php
         } elseif ($ipg == $num_page ) {
            // nghia la dang o trang cuoi
            ?> <a href="#" class="control31"> <i class="fa-solid fa-circle-chevron-right"></i> </a> <?php 
         } elseif($ipg == $page){
            // nghia la dang o trang dau
            ?> <a href="index.php?act=gv&col=<?php echo $mon1 ;?>&page=<?php echo $ipg2; ?>" class="control31"> <i class="fa-solid fa-circle-chevron-right"></i> </a> <?php
         } else { ?>
            <a href="index.php?act=gv&col=<?php echo $mon1 ;?>&page=<?php echo $ipg2; ?>" class="control31"> <i class="fa-solid fa-circle-chevron-right"></i> </a>
            <?php } ?>
      </div>

      <br>
      <hr>

      <div class="mt_and_kh">
         <ul class="dasdq21" id="adaw123">
            <h3 style="margin: 6px 6px 15px 6px; text-align: center;"> Khóa học của thầy/cô : </h3>
            <?php 
               $row_sub1 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_gv = '$uidgv'  ORDER BY `sp`.`id_sp` DESC  LIMIT $slbd OFFSET $offset ");
               if(mysqli_num_rows($row_sub1) > 0){
                  while ( $shosub2 = mysqli_fetch_array($row_sub1)) {
                  ?>
                     <li> <a href="index.php?act=view_vid&id_vid=<?php echo $shosub2['id_sp']; ?>" style="font-size: 18px;"> <?php echo $shosub2['name']; ?> </a> </li> 
                  <?php }
                  } else {
                     ?>  <li> <a href="#" style="font-size: 18px;"> Empty </a> </li>  <?php
                  } ?>
         </ul>
      </div>

      <?php 
         } 
      }  ?>

   </div>
   <br>
</div>