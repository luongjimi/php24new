<?php
session_start();
ob_start();
include "../db.php";

    if( (isset($_GET['trang_cmt']) and $_GET['trang_cmt'] != "" )and (isset($_GET['id_bv']) and $_GET['id_bv'] != "" )){
        $of_ps1 = $_GET['id_bv'];
        $offset5 = $_GET['trang_cmt'];
        $offset9 = ($offset5 - 1) * 5;

        $row_cmt012 =  mysqli_query($conn, " SELECT * FROM `cmt_post` WHERE `of_ps` = '$of_ps1' ORDER BY `cmt_post`.`id_cmt` DESC LIMIT 5 OFFSET $offset9 " );
        while ($show_cmt04 = mysqli_fetch_array($row_cmt012)) {
            $us_bl10 = $show_cmt04['of_us'];
            $row_us100 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_bl10' ");  
            $show_us100 = mysqli_fetch_array($row_us100);
            ?>
                <div class="bl_ps05">
                    <img src="img/usimg/<?php echo $show_us100['img']; ?>" width="50px" height="50px" style="border: 1px solid white; border-radius: 150px; background-color:white;" >
                        <div class="bls03">
                            <span> 
                              <a href="index.php?act=user&id_us=<?php echo $show_cmt04['of_us']; ?>"  style="font-size: 16px; color: black;"> <em> <?php echo $show_us100['name']; ?></em></a> <a style="margin-left: 4px; font-size: 12px;"> <?php echo $show_cmt04['time_cmt']; ?> </a> 
                              <?php if(isset($_SESSION['user']) and $_SESSION['user'] != "") {
                                include "lay_id_us.php";
                                if ($tk02 == $show_cmt04['of_us']) {
                                ?>  <a href="index.php?act=view_post&id_post=<?php echo $of_ps1; ?>&add=soa_cmt&id_cmt=<?php echo $show_cmt04['id_cmt']; ?>" style="font-size: 12px; margin-left: 10px; color: red;"> Xóa </a> <?php
                                // su li nut soa bai viet  trong day  
                              } 
                            } ?>
                            </span>
                            
                            <div style="font-size: 14px; margin-top: 5px;">
                              <?php echo $show_cmt04['nd_cmt']; ?>  
                            </div>

                        </div>
                </div>
            <?php
        }
    }
?>
