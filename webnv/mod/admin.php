
<div class="home_gt" >
    <h3 style="margin: 0; text-align: center;"> Duyệt Thanh Toán <i class="fa-solid fa-caret-down"></i> </h3>
    <br>
    <div class="tble_tkus" style="padding: 0px;">
        <table id="customers" style="white-space: nowrap;">
           <tr>
              <th>Người Tạo</th>
              <th>Loại</th>
              <th>Số Tiền</th>
              <th>Phương Thức</th>
              <th>Thông Tin Thanh Toán</th>
              <th>Thời Gian</th>
              <th>Hành Động</th>
           </tr>
           <?php 
                // phan trang
                $slbd = 10; // so luong bai dang moi trang
                $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                $offset = ($page - 1) * $slbd;
                $sp_030 = mysqli_query($conn,"SELECT * FROM `rut_tien`  ");
                $tongsp = mysqli_num_rows($sp_030);
                $num_page = ceil($tongsp / $slbd);
                // end phan trang
                
                $row_nap_rut0 = mysqli_query($conn,"SELECT * FROM rut_tien  ORDER BY `rut_tien`.`duyet` ASC LIMIT $slbd OFFSET $offset"); 
                while ($show_nrut12 = mysqli_fetch_array($row_nap_rut0)) {
                    ?>
                    <tr style=" text-align: center; ">
                        <td> <?php echo "User".$show_nrut12['of_us']; ?> </td>
                        <td> <?php 
                            if($show_nrut12['rut_nap'] == 0){
                                echo "Nạp";
                            } else {
                                echo "Rút";
                            }
                            ?> </td>
                        <td> <?php echo $show_nrut12['money'] ?> </td>
                        <td> 
                            <?php 
                                if($show_nrut12['loai'] == 1){
                                    echo " MB BANK ";
                                } elseif ($show_nrut12['loai'] == 2) {
                                    echo " KUCOIN ";
                                } elseif ($show_nrut12['loai'] == 3) {
                                    echo " Internet Banking ";
                                } elseif ($show_nrut12['loai'] == 4) {
                                    echo " USDT " ;
                                }
                            ?>    
                        </td>
                        <td> <?php 
                            if($show_nrut12['dia_chi'] == NULL){
                                echo "0";
                            } else {
                                echo $show_nrut12['dia_chi'];
                            }
                        ?> </td>
                        <td> <?php echo $show_nrut12['t_gian'] ?> </td>
                        <td> 
                        <div class="btn_tbs12" style="padding: 5px 8px 5px 8px;">
                        <?php if($show_nrut12['duyet'] == 0){
                            
                                if($show_nrut12['rut_nap'] == 0){
                                    ?> <a class="run_ttus" href="index.php?act=admin&suli=1&sotien=<?php echo $show_nrut12['money']; ?>&idus=<?php echo $show_nrut12['of_us']; ?>&idlenh=<?php echo $show_nrut12['id_tt']; ?>">DUYỆT</a> <?php
                                } else {
                                    ?>  <a class="run_ttus" href="index.php?act=admin&suli=2&idlenh=<?php echo $show_nrut12['id_tt']; ?>">DUYỆT</a> <?php
                                ?> <?php } ?>
                                <a class="off_ttus" href="index.php?act=admin&suli=0&idlenh=<?php echo $show_nrut12['id_tt']; ?>">HỦY</a> 
                            <?php
                        } elseif($show_nrut12['duyet'] == 1) {
                            ?>  <a class="run_ttus"> ĐÃ DUYỆT </a> <?php
                        } else {
                            ?>  <a class="off_ttus"> ĐÃ HỦY </a> <?php
                        } ?> </div> </td>
                    </tr>
                    <?php 
                }
           ?>

        </table>
    </div>  
    <br>
    <div class="pt">
                        <?php
                            if($page > 3){
                                ?>
                                    <a href="?act=admin&page=1">First</a>
                                <?php
                            }
                            for ($i=1; $i <= $num_page ; $i++) {
                                if ($i != $page) {
                                    if($i > $page - 3 && $i < $page + 3){
                                        ?> <a href="?act=admin&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                    }
                                } else {
                                    ?> <a class="visited_pt"> <?php echo $i; ?></a> <?php
                                }
                            }
                            if($page < $num_page - 3){
                                $end = $num_page;
                                ?>
                                    <a href="?act=admin&page=<?php echo $end; ?>">Last</a>
                                <?php
                            }
                        ?>
                    </div>
</div>


<?php
    // su li nap rut
    if( (isset($_GET['suli']) and is_numeric($_GET['suli']) and $_GET['suli'] != "" ) and (isset($_GET['idlenh']) and is_numeric($_GET['idlenh']) and $_GET['idlenh'] != "" )){
        $suli21 = $_GET['suli'];
        $idlenh1 = $_GET['idlenh'];
        if($suli21 == 0){
            // huy lenh rut / nap -> set duyet = 2
            $sq2l1 = "UPDATE `rut_tien` SET `duyet` = 2 WHERE `id_tt` = '$idlenh1' ";
                if (mysqli_query($conn, $sq2l1)) { 
                    // quay ve nv cu
                    header("location: index.php?act=admin");
                } 
        } elseif ($suli21 == 1) {
            if( (isset($_GET['sotien']) and is_numeric($_GET['sotien']) and $_GET['sotien'] != "") and  (isset($_GET['idus']) and is_numeric($_GET['idus']) and $_GET['idus'] != "") ){
                $sotien1 = $_GET['sotien'];
                $idus53 = $_GET['idus'];
                // su li lenh nap, cong tien vao tk -> duyet = 1, + so tien vao tk
                $lay_tinn1 = mysqli_query($conn, "SELECT * FROM `user` WHERE `uid` = '$idus53' ");
                $show_tus1 = mysqli_fetch_array($lay_tinn1);
                $tien_bg1 = $show_tus1['money'];

                $tien_cong3 = $tien_bg1 + $sotien1;
                // sua lai trang thai
                $sq3l1 = "UPDATE `rut_tien` SET `duyet` = 1 WHERE `id_tt` = '$idlenh1' ";
                if (mysqli_query($conn, $sq3l1)) { 
                    // quay ve nv cu
                    $sq2l1 = "UPDATE `user` SET `money` = '$tien_cong3' WHERE `uid` = '$idus53' ";
                        if (mysqli_query($conn, $sq2l1)) { 
                            // quay ve nv cu
                            header("location: index.php?act=admin");
                        } 
                } 
                

            }
        } elseif ($suli21 == 2) {
            // suli lenh rut -> duyet = 1
            $sq2l1 = "UPDATE `rut_tien` SET `duyet` = 1 WHERE `id_tt` = '$idlenh1' ";
                if (mysqli_query($conn, $sq2l1)) { 
                    // quay ve nv cu
                    header("location: index.php?act=admin");
                } 
        }
    }
?>