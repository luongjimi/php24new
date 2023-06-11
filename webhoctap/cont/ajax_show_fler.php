<?php
// hien thi nguoi dung dang follow user nay
    include "../db.php";

    if (isset($_GET['trang_fler']) and $_GET['trang_fler'] != "" ) {
        if (isset($_GET['id_us']) and $_GET['id_us'] != "") {
            $of_tk = $_GET['id_us'];
            $slbd = 10;
            $trang_fler = $_GET['trang_fler'];
            settype($trang_fler, "int");
            $offset = ($trang_fler - 1) * $slbd;
            $trvan01 = " SELECT * FROM `flw_us` WHERE fl_us = '$of_tk' ORDER BY `flw_us`.`id_fl` DESC LIMIT $slbd OFFSET $offset ";
            $get_us01 = mysqli_query($conn, $trvan01);
            
            while ($show_sl = mysqli_fetch_array($get_us01)) {
                $id_us02 = $show_sl['user'];
                $trvan03 = " SELECT * FROM `user` WHERE id_us = '$id_us02' ";
                $get_us02 = mysqli_query($conn, $trvan03);
                $show_02sl = mysqli_fetch_array($get_us02);
                ?> 
                <div class="cnt_img_fl">
                    <a href="index.php?act=user&id_us=<?php echo $show_02sl['id_us']; ?>"> <img src="../img/usimg/<?php echo $show_02sl['img']; ?>" width="50px" height="50px"> </a>
                    <a href="index.php?act=user&id_us=<?php echo $show_02sl['id_us']; ?>"> <?php echo $show_02sl['name']; ?> </a>
                </div>
                <?php
            }
        }
    }
    
?>