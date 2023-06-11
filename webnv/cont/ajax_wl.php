<?php 
include "../db.php";

    if (isset($_GET['id_us']) and isset($_GET['trang_bn'])  ) {
    
            $of_tk = $_GET['id_us'];
            $slbd = 5;
            $trang_fler = $_GET['trang_bn'];
            settype($trang_fler, "int");
            $offset = ($trang_fler - 1) * $slbd;

            $lsu_rut3 = mysqli_query($conn,"SELECT * FROM `rut_tien` WHERE of_us = '$of_tk' ORDER BY `rut_tien`.`id_tt` DESC  LIMIT $slbd OFFSET $offset ");
            
            while ($show_sl2 = mysqli_fetch_array($lsu_rut3)) {
                ?> 
                <div class="ls_vitien">
                    <?php
                        if ($show_sl2['duyet'] == 1) {
                            ?> <i class="fa-regular fa-circle-check"></i> <?php
                        } elseif($show_sl2['duyet'] == 0) {
                            ?>  <i class="fa-solid fa-spinner"></i>  <?php
                        } else {
                            ?> <i class="fa-regular fa-circle-xmark"></i> <?php
                        }
                    ?>
                    <div class="nd_vitien"> <strong style="font-size: 16px; <?php
                        if($show_sl2['rut_nap'] == 0){
                            echo " color: green; " ;
                        } else {
                            echo " color: red; " ;
                        }
                    ?>">
                        <?php 
                            if($show_sl2['rut_nap'] == 0){
                                echo " Nạp " ;
                            } else {
                                echo " Rút " ;
                            }
                        ?>
                    : <?php echo $show_sl2['money'] ?>đ </strong> = 
                        <?php 
                            if($show_sl2['loai'] == 1){
                                echo " MB BANK ";
                            } elseif ($show_sl2['loai'] == 2) {
                                echo " KUCOIN ";
                            } elseif ($show_sl2['loai'] == 3) {
                                echo " Internet Banking ";
                            } elseif ($show_sl2['loai'] == 4) {
                                echo " USDT " ;
                            }
                        ?>
                    <a class="a_time"> <?php echo $show_sl2['t_gian']; ?> </a> </div>
                </div>
                <br>
                <?php
            }
            
        }
    
?>

