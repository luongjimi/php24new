<?php if (isset($_SESSION['user']) and $_SESSION['user'] != "") { 
    if( !isset($_GET['check']) ) {
      $_GET['check'] = 0 ;
    }
    $user1 = $_SESSION['user'];
    $id = $conn->real_escape_string($_GET['check']);
    $slbd = 5; // so luong bai dang moi trang
    $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
    settype($page, "int");
    settype($id, "int");
    $offset = ($page - 1) * $slbd;
    $sp2 = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE email = '$user1' AND duyet = '$id' ");
    $sp3 = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE email = '$user1' ");
    $tongsp1 = mysqli_num_rows($sp3);
    $tongsp = mysqli_num_rows($sp2);
    $num_page = ceil($tongsp / $slbd);
    
    ?>
<div class="main2">
    <div style="max-width: 820px; margin: 8px auto 0px auto ;  ">
      <div style="background: linear-gradient(45deg, rgb(206, 206, 206), rgb(231, 251, 255) ) ; border-radius: 5px; margin: 20px 10px 0 10px;">
        <div class="top_caret123">
            <h2 style="margin: 0; color: rgb(54, 51, 12);" > <i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng <a style="font-size: 16px;">(tổng: <?php echo $tongsp1; ?>)</a> </h2>
        </div>
        <div class="tt_us3" style="border-radius: 6px;">
            <?php  
              if (isset($_GET['check']) and $_GET['check'] == 0 ) {
                $row_sp = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE email = '$user1' AND duyet = 0  ORDER BY `mua_sp`.`id_mua` DESC LIMIT $slbd OFFSET $offset ");
                ?> <a href="#" style=" font-size: 16px; background-color: whitesmoke; border-top: 1px solid rgb(25, 25, 25) ; border-right: 1px solid rgb(25, 25, 25); color: rgb(0, 0, 0); " > <em> Khóa học chờ thanh toán </em> </a> <?php
              } else {
                ?> <a href="index.php?act=cart&check=0" style=" font-size: 16px; border-top: 1px solid rgb(25, 25, 25) ; border-right: 1px solid rgb(25, 25, 25); color: rgb(0, 0, 0); " > <em> Khóa học chờ thanh toán </em> </a>  <?php
              }
              if (isset($_GET['check']) and $_GET['check'] == 1 ){
                $row_sp = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE email = '$user1' AND duyet = 1 ORDER BY `mua_sp`.`id_mua` DESC LIMIT $slbd OFFSET $offset ");
                ?>  <a href="#" style= "font-size: 16px; background-color: whitesmoke; border-top: 1px solid rgb(25, 25, 25) ; border-right: 1px solid rgb(25, 25, 25); color: rgb(0, 0, 0); border-top-right-radius: 10px; "><em> Khóa học đã mua </em></a>  <?php
              } else {
                ?>  <a href="index.php?act=cart&check=1" style= "font-size: 16px;  border-top: 1px solid rgb(25, 25, 25) ; border-right: 1px solid rgb(25, 25, 25); color: rgb(0, 0, 0); border-top-right-radius: 10px; "><em> Khóa học đã mua </em> </a>   <?php
              }
            ?> 
            </div>

    </div>
       <div class="pding1">
        <?php
        if (isset($row_sp) and $row_sp != "" ) {
          if ( $tongsp == 0 ) {
            ?> <h5 style="text-align: center; color: black;"> Giỏ hàng trống ! </h5> <?php
          } else {
        while ($row_sp2 = mysqli_fetch_array($row_sp)) { 
            $id_sp1 = $row_sp2['of_sp'];
            $row_skh = mysqli_query($conn,"SELECT * FROM `sp` WHERE id_sp = '$id_sp1' ");
            $row_kh2 = mysqli_fetch_array($row_skh);
          ?>
            <div class="sp_pding1">

                <img src="img/stimg/<?php echo $row_kh2['img']; ?>">

                <div class="main_sp_pding">
                     <a class="sp_tde1"  style="text-decoration: none; color: black;" href="index.php?act=view_vid&id_vid=<?php echo $id_sp1; ?>"> <?php echo $row_kh2['name']; ?>  </a>
                    <div class="btn_adsp" >
                      <?php if($id == 1){
                        ?> <a href="index.php?act=view_vid&id_vid=<?php echo $id_sp1; ?>" style="padding: 0px 10px; border: 1px solid rgba(0, 0, 0, 0.623);"> <i class="fa-solid fa-play"></i> Vào xem video  </a> <?php
                      } else { ?>
                        <h6 class="price_sp1" style="margin: 0; text-decoration: underline">  Giá: <em> <?php echo $row_kh2['gia']; ?>đ </em> </h6>
                        <a href="index.php?act=api&idmua=<?php echo $row_sp2['id_mua']; ?>"> Mua <i class="fa-solid fa-basket-shopping"></i> </a>
                        <a href="index.php?act=cart&check=<?php echo $id; ?>&add=soa&idsp=<?php echo $row_sp2['id_mua']; ?>"> Xóa <i class="fa-solid fa-trash"></i> </a>
                        <?php }
                        // muon soa dc thi check xem user do la nguoi mua kh do, -> cho soa 
                        ?>
                    </div>
                </div>

            </div>
        <?php } ?>
        <div class="pt" style="margin-top: 22px;">
            <?php
                if($page > 3){
                    ?>
                        <a class = "pt_a" href="?act=cart&check=<?php echo $id;?>&page=1">First</a>
                    <?php
                }
                for ($i=1; $i <= $num_page ; $i++) {
                    if ($i != $page) {
                        if($i > $page - 3 && $i < $page + 3){
                            ?> <a class = "pt_a" href="?act=cart&check=<?php echo $id;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                        }
                    } else {
                        ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                    }
                }
                if($page < $num_page - 3){
                    $end = $num_page;
                    ?>
                        <a class = "pt_a" href="?act=cart&check=<?php echo $id;?>&page=<?php echo $end; ?>">Last</a>
                    <?php
                }
        }  
      }
            ?>
        </div>
     </div>
       <br>

    </div>
</div>

<?php
  if((isset($_GET['add']) and $_GET['add'] === "soa" ) and (isset($_GET['idsp']) and $_GET['idsp'] != "" ) ){
    $idsp6 = $_GET['idsp'];
    settype($idsp6, "int");
    $dltsp = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE email = '$user1' AND id_mua = '$idsp6' ");
    $soasp01 = mysqli_num_rows($dltsp);
    if($soasp01 > 0 ){
      $soasp12 = mysqli_query($conn, " DELETE FROM mua_sp  WHERE email = '$user1' AND id_mua = '$idsp6'   ");
      header("Location: index.php?act=cart&check=$id");
    }
  }

} ?>
