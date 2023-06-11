<?php
// hien thi nguoi ma id_us dang follow
    include "../db.php";

    if (isset($_GET['trang_fler']) and $_GET['trang_fler'] != "" ) {
        if (isset($_GET['id_us']) and $_GET['id_us'] != "") {
            $of_tk = $_GET['id_us'];
            $slbd = 10;
            $trang_fler = $_GET['trang_fler'];
            settype($trang_fler, "int");
            $offset = ($trang_fler - 1) * $slbd;
            $trvan02 = " SELECT * FROM `flw_us` WHERE user = '$of_tk' ORDER BY `flw_us`.`id_fl` DESC LIMIT $slbd OFFSET $offset ";
            $get_us02 = mysqli_query($conn, $trvan02);
            while ($show_sl2 = mysqli_fetch_array($get_us02)) {
                $idus02 = $show_sl2['fl_us'];
                $trv04 = " SELECT * FROM `user` WHERE id_us = '$idus02' ";
                $getus06 = mysqli_query($conn, $trv04);
                $showsl_02 = mysqli_fetch_array($getus06);
                ?> 
                <div class="cnt_img_fl">
                    <a href="index.php?act=user&id_us=<?php echo $showsl_02['id_us']; ?>"> <img src="../img/usimg/<?php echo $showsl_02['img']; ?>" width="50px" height="50px"> </a>
                    <a href="index.php?act=user&id_us=<?php echo $showsl_02['id_us']; ?>"> <?php echo $showsl_02['name']; ?> </a>
                </div>
                <?php
            }
        }
    }
    
?>