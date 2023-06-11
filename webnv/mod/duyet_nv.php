<?php 
    if(isset($_GET['idnv']) and is_numeric($_GET['idnv']) ){
        $idnv1 = $_GET['idnv']; 
        $nd_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE `id` = '$idnv1' AND `of_us` = '$tk2' ");
        if(mysqli_num_rows($nd_030) > 0){

        $shw_nvv1 = mysqli_fetch_array($nd_030);
        $loai_ndd1 = $shw_nvv1['loai'] ;
        $trang_thd13 = $shw_nvv1['trang_thai'];
?>

<div class="home_gt">
<a href="index.php?act=add_job&ch=2"><i style="font-size: 26px; margin-left: 8px; color: black;" class="fa-solid fa-arrow-left-long"></i> </a>
    <hr>
    <p style="margin: 5px 5px 14px 5px; font-size: 21px;"> <i class="fa-solid fa-fire" style="color: red; margin: 0 6px;"></i> <em> 
        <?php
            if($loai_ndd1 == 1){
                echo " SEO [".$shw_nvv1['id']."] + Promote Content + InPage 3x + ADS 3x ";
            } elseif ($loai_ndd1 == 2) {
                echo  " [".$shw_nvv1['id']."] BUFF thành viên nhóm Zalo ";
            } elseif ($loai_ndd1 == 3) {
                echo  " SEO [".$shw_nvv1['id']."] + Pro Content + InPage 3x + ADS 3x (CODE) ";
            } elseif ($loai_ndd1 == 4) {
                echo  " [".$shw_nvv1['id']."] BUFF APP Android/IOS + Đăng kí ";
            } elseif ($loai_ndd1 == 5) {
                echo  " [".$shw_nvv1['id']."] BUFF đơn Shopee + Follow shop + Đánh giá 5* ";
            }
        ?>
    </em> </p>

        <ul>
        <li style="font-size: 16px;">  Link : <a style="color: red;" href="<?php echo $shw_nvv1['link']; ?>"> <?php echo $shw_nvv1['link']; ?></a>  </li>
            <li style="font-size: 16px;"> <h4 style="margin: 10px 0 10px 0 ;"> Số lượng : 
            <?php 
            $row_doone30 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$idnv1' AND ( `trang_thai` = 1 OR `trang_thai` = 0 ) "); 
            $num_nvdone = mysqli_num_rows($row_doone30);
            echo $num_nvdone; 
            ?>/<?php echo $shw_nvv1['sl']; 
            if( ($num_nvdone <= $shw_nvv1['sl']) and $trang_thd13 == 1 ){
                // set trang thai = 0
                $sq2l31 = mysqli_query($conn,"UPDATE job SET trang_thai = 0 WHERE `id` = '$idnv1' ") ;
            } 
            ?> </h4> </li>
            
            <div style="margin-left: -25px;">
                <hr>
            <h5 style="margin: 10px 0 10px 0  ; "> * Vui lòng xem kĩ trước khi bấm "Duyệt" hoặc "Hủy" vì sẽ không thể thay đổi. </h5>
            <h5 style="margin: 0;"> * Khi bấm vào "Dừng vĩnh viễn" sẽ không được hoàn tiền, hãy cân nhắc. </h5>
            <h5 style="margin: 10px 0;"> * Nếu bạn không duyệt nhiệm vụ, hệ thống sẽ tự duyệt khi đến hạn, mọi thiệt hại do bạn chịu trách nhiệm. </h5>
            </div>
        </ul>
        <div class="duyet_btn12">
            <?php if($shw_nvv1['trang_thai'] == 0){
                ?> <a href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&auto=1" style="background-color: green;"> <i class="fa-solid fa-check"></i> Duyệt tất cả </a> 
                <a href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&auto=0" style="background-color: red;" > <i class="fa-regular fa-circle-xmark"></i> Dừng vĩnh viễn </a>
             <?php
            } else {
               ?>  <a style="background-color: red;" > <i class="fa-regular fa-circle-xmark"></i> Chiến dịch đã hoàn thành </a> <?php
            } ?>
            </div>
            
        
     </ul>
</div>
<br>
<div class="home_gt">
    <h3 style="text-align: center; margin-top: 0;"> Duyệt Nhiệm Vụ <i style=" margin-left: 8px;" class="fa-solid fa-caret-down"></i> </h3>
    <div>
        <?php 
        // phan trang
        $slbd = 12; // so luong bai dang moi trang
        $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
        $offset = ($page - 1) * $slbd;
        $sp_030 = mysqli_query($conn," SELECT * FROM `duyet_nv` WHERE `of_job` = '$idnv1' AND `loai` = '$loai_ndd1' ");
        $tongsp = mysqli_num_rows($sp_030);
        $num_page = ceil($tongsp / $slbd);
        // end phan trang
        $nd_310 =   mysqli_query($conn," SELECT * FROM `duyet_nv` WHERE `of_job` = '$idnv1' AND `loai` = '$loai_ndd1' ORDER BY `duyet_nv`.`trang_thai` ASC LIMIT $slbd OFFSET $offset ");
        if( $tongsp > 0) {

            if($loai_ndd1 == 2){
                ?> <div class="tble_tkus" style="padding-right: 0px;">
                    <table id="customers">
                        <tr>
                            <th>Tài khoản</th>
                            <th>Tự duyệt</th>
                            <th>Hành động</th>
                        <tr> 
                            <?php while ($shw_n312 = mysqli_fetch_array($nd_310)) { 
                                $id_nv_duyet121 = $shw_n312['id_nv'];
                                $sdt_us31 = $shw_n312['of_tk'];
                                $trang_thai231 = $shw_n312['trang_thai'];
                                ?>
                        <tr style="white-space: nowrap;">
                            <td style="text-align: center; padding: 0 8px;"><?php
                                $nd_340 = mysqli_query($conn,"SELECT * FROM `tai_khoan` WHERE `id_tk` = '$sdt_us31' ");
                                $shox_sdt12 = mysqli_fetch_array($nd_340);
                                echo $shox_sdt12['tt_tk'];
                            ?></td>
                            <td style="text-align: center; padding: 0 8px; font-size: 14px; color: rgba(0, 0, 0, 0.651)"> <?php  
                                $end_timw12 = $shw_n312['het_han'] ;
                                $new_time12 = date ( 'Y-m-d H:i:s' , $end_timw12 );
                                echo $new_time12;  
                            ?> </td>
                            <td>
                                <div class="btn_tbs12" style="padding: 5px 8px 5px 8px;">
                                    <?php if( $trang_thai231 == 0 ){ ?>
                                        <a class="run_ttus" href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $page; ?>&id_duyet=<?php echo $id_nv_duyet121; ?>&duyet=1">DUYỆT</a>
                                        <a class="off_ttus" href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $page; ?>&id_duyet=<?php echo $id_nv_duyet121; ?>&duyet=2">HỦY</a>
                                    <?php } elseif ($trang_thai231 == 1) {
                                        ?> <a class="run_ttus" >ĐÃ DUYỆT</a> <?php
                                    } elseif ($trang_thai231 == 2) {
                                        ?> <a class="off_ttus" >ĐÃ HỦY</a> <?php
                                    } ?>
                                </div> 
                            </td>
                        </tr>
                            <?php } ?>
                    </table>
                    </div>
                <?php
            } else { 

                ?>
                <div class="grid_nv2">
                    <?php 
                        while ($shw_n312 = mysqli_fetch_array($nd_310)) { 
                        $sdt_us31 = $shw_n312['of_tk'];
                        $idnv21 = $shw_n312['of_nv'];
                        $idnv51 = $shw_n312['of_tk'];
                        $id_nv_duyet121 = $shw_n312['id_nv'];
                        $trang_thai231 = $shw_n312['trang_thai'];
                        // lay het du lieu ra theo $loainv
                            if( $loai_ndd1 == 1 or $loai_ndd1 == 3 ){
                                $nd_315 = mysqli_query($conn,"SELECT * FROM `seo` WHERE `id_nv` = '$idnv21' ");
                                $shw_n512 = mysqli_fetch_array($nd_315);
                            } elseif( $loai_ndd1 == 4 ) {
                                $nd_315 = mysqli_query($conn,"SELECT * FROM `app` WHERE `id_nv` = '$idnv21' ");
                                $shw_n512 = mysqli_fetch_array($nd_315);
                            } elseif ( $loai_ndd1 == 5 ) {
                                $nd_315 = mysqli_query($conn,"SELECT * FROM `shop` WHERE `id_nv` = '$idnv21' ");
                                $shw_n512 = mysqli_fetch_array($nd_315);
                            }
                        ?>
                            <div class="gd_col211"> 
                                <ul class="gd_col311">
                                    <em style="color:red; text-decoration: underline;"> <i style="font-size: 20px;" class="fa-regular fa-circle-user"></i> 
                                    <?php
                                    if($loai_ndd1 == 5){
                                        $nd_340 = mysqli_query($conn,"SELECT * FROM `tai_khoan` WHERE `id_tk` = '$idnv51' ");
                                        $shox_sdt12 = mysqli_fetch_array($nd_340);
                                        echo $shox_sdt12['tt_tk'];
                                    } else {
                                        echo "User".$tk2; } 
                                    ?> </em> 
                                    <hr>
                                     <?php if($loai_ndd1 == 4){ ?>
                                    <li> <em style="color:red;"> Tài khoản / Mật khẩu : </em> 
                                        <h4> <?php 
                                            echo $shw_n512['us_name']; 
                                        ?> </h4>
                                    </li>
                                        <?php } ?>

                                        <?php if($loai_ndd1 == 5){ ?>
                                    <li> <em style="color:red;"> Mã Đơn Hàng : </em> 
                                        <a> <?php  echo $shw_n512['ma_don_hang'];  ?> </a>
                                    </li>
                                    <br>
                                    <li> <em style="color:red;"> Mã Vận Đơn : </em> 
                                        <a> <?php  echo $shw_n512['ma_van_don'];  ?> </a>
                                    </li>
                                        <?php } ?>
                                    <?php if($loai_ndd1 == 1 or $loai_ndd1 == 3){ ?>
                                    <li> 
                                        <em style="color:red;">Link 1 + Link 7 : </em>
                                        <h4> <?php echo $shw_n512['link1']; ?> </h4>
                                    </li>
                                    <li>
                                        <em style="color:red;">Link 10 + Last 10 : </em>
                                        <h4> <?php echo $shw_n512['last10']; ?> </h4>
                                    </li>
                                    <li> 
                                        <em style="color:red;"> Link ADS (3) : </em>
                                        <h4> <?php echo $shw_n512['ads1']; ?> </h4>    
                                    </li>   
                                    <?php } ?>
                                    <?php if($loai_ndd1 == 4 or $loai_ndd1 == 5) { ?>
                                        <li>
                                            <h4> <em style="color:red; margin-bottom: 10px;"> Ảnh Nhiệm Vụ : </em></h4>
                                            <img style="margin-bottom: 10px;" src="img/nv_img/<?php echo $shw_n512['anh1']; ?>" width="100%" height="auto">
                                        </li>
                                    <?php } ?>

                                        <?php if($loai_ndd1 == 3){ ?>
                                    <li> <em style="color:red;"> CODE : </em> 
                                        <a> <?php echo $shw_n512['code']; ?> </a>
                                    </li>
                                        <?php } ?>

                                </ul>
                                <hr> 
                                    <div class="btn_tbs12" style="padding: 0 8px 6px 8px;">
                                    <?php if( $trang_thai231 == 0 ){ ?>
                                    
                                        <a class="run_ttus" href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $page; ?>&id_duyet=<?php echo $id_nv_duyet121; ?>&duyet=1">DUYỆT</a>
                                        <a class="off_ttus" href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $page; ?>&id_duyet=<?php echo $id_nv_duyet121; ?>&duyet=2">HỦY</a>
                                   
                                    <?php } elseif ($trang_thai231 == 1) {
                                        ?> <a class="run_ttus" >ĐÃ DUYỆT</a> <?php
                                    } elseif ($trang_thai231 == 2) {
                                        ?> <a class="off_ttus" >ĐÃ HỦY</a> <?php
                                    } ?>
                                     </div> 
                            </div>
                        <?php
                        } 
                    ?>
                </div>
            <?php }
        ?>
        <br>
                    <div class="pt">
                        <?php
                            if($page > 3){
                                ?>
                                    <a href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>">First</a>
                                <?php
                            }
                            for ($i=1; $i <= $num_page ; $i++) {
                                if ($i != $page) {
                                    if($i > $page - 3 && $i < $page + 3){
                                        ?> <a href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                    }
                                } else {
                                    ?> <a class="visited_pt"> <?php echo $i; ?></a> <?php
                                }
                            }
                            if($page < $num_page - 3){
                                $end = $num_page;
                                ?>
                                    <a href="index.php?act=duyet_job&idnv=<?php echo $idnv1; ?>&page=<?php echo $end; ?>">Last</a>
                                <?php
                            }
                        ?>
                    </div>
        <div>
        <?php 
            // duyet nv o day
            if($loai_ndd1 == 1 or $loai_ndd1 == 2){
                $cong_bn3  = 450;
            } elseif($loai_ndd1 == 3){
                $cong_bn3 = 650;
            } elseif ($loai_ndd1 == 4) {
                $cong_bn3 == 1600;
            } elseif ($loai_ndd1 == 5) {
                $cong_bn3 == 12000 ;
            }

            if( ( isset($_GET['duyet']) and $_GET['duyet'] != " " and is_numeric($_GET['duyet']) ) and (isset($_GET['id_duyet']) and $_GET['id_duyet'] != " " and is_numeric($_GET['id_duyet'])) ) {
                $nv_duyet12 = $_GET['duyet'];
                $id_duyet = $_GET['id_duyet'];
                $pafe_sda = $_GET['page'];
                
                $nd_440 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE `id_nv` = '$id_duyet' ");
                $c_ttk21 = mysqli_fetch_array($nd_440);
                //check trang thai
                $of_us_duyet12 = $c_ttk21['of_us'];
                $duyet1_440 = mysqli_query($conn,"SELECT * FROM `user` WHERE `uid` = '$of_us_duyet12' ");
                $c_us_2341 = mysqli_fetch_array($duyet1_440);
                // check tien cua id_us
                $tien_cho_duyet12 =  $c_us_2341['re_money'];
                $tienda_duyet21 = $c_us_2341['money'];
                $tru6 = $tien_cho_duyet12 - $cong_bn3 ;
                $cong6 = $tienda_duyet21 + $cong_bn3 ;
                
               if ($c_ttk21['trang_thai'] == 0){
                if($nv_duyet12  == 1){
                        $sq2l1 = "UPDATE `duyet_nv` SET `trang_thai` = 1 WHERE `id_nv` = '$id_duyet' ";
                        if (mysqli_query($conn, $sq2l1)) { 
                            
                            $sql_cong_tien1 =  "UPDATE `user` SET `re_money` = '$tru6' WHERE `uid` = '$of_us_duyet12' ";
                            $sql_cong_tien2 =  "UPDATE `user` SET `money` = '$cong6' WHERE `uid` = '$of_us_duyet12' ";
                            if (mysqli_query($conn, $sql_cong_tien1) and mysqli_query($conn, $sql_cong_tien2)) { 
                                header("location: index.php?act=duyet_job&idnv=$idnv1&page=$pafe_sda ");
                            }
                        } 
                    } elseif($nv_duyet12  == 2) {
                        
                        $sq2l1 = "UPDATE `duyet_nv` SET `trang_thai` = 2 WHERE `id_nv` = '$id_duyet' ";
                        if (mysqli_query($conn, $sq2l1)) { 
                            $sql_cong_tien1 =  "UPDATE `user` SET `re_money` = '$tru6' WHERE `uid` = '$of_us_duyet12' ";
                            if (mysqli_query($conn, $sql_cong_tien1)) { 
                                header("location: index.php?act=duyet_job&idnv=$idnv1&page=$pafe_sda ");
                            }
                        } 

                    }

                } else {
                    ?> <script> alert("Bạn không thể thay đổi quyết định !") </script> <?php
                }
            }

            if ( isset($_GET['auto']) and $_GET['auto'] != " " and is_numeric($_GET['auto'])  ){
                $chuyen_trang_thai21 = $_GET['auto'];
                
                if( $shw_nvv1['trang_thai'] == 0){
                    if($chuyen_trang_thai21 == 0){
                        // huy nhiem vu
                        $sq2l1 = "UPDATE `job` SET `trang_thai` = 1 WHERE `id` = '$idnv1' ";
                            if (mysqli_query($conn, $sq2l1)) { 
                                // quay ve nv cu
                                header("location: index.php?act=duyet_job&idnv=$idnv1 ");
                            } 
                    } elseif ($chuyen_trang_thai21 == 1) {
                        // duyet tat ca dung while
                        
                        $c_all_21 = mysqli_query($conn," SELECT * FROM `duyet_nv` WHERE `of_job` = '$idnv1' AND `trang_thai` = 0  ");
                           while ($c_all52 = mysqli_fetch_array($c_all_21)) {
                                $id_ng_lam2 = $c_all52['of_us'];
                                $of_id_nv31 = $c_all52['id_nv'];
                                // lay id us va lay tien dang co, tien cho duyet -> cho vao db
                                $duyet1_440 = mysqli_query($conn,"SELECT * FROM `user` WHERE `uid` = '$id_ng_lam2' ");
                                $c_us_2341 = mysqli_fetch_array($duyet1_440);

                                $tien_cho_duyet12 =  $c_us_2341['re_money'];
                                $tienda_duyet21 = $c_us_2341['money'];
                                $tru6 = $tien_cho_duyet12 - $cong_bn3 ;
                                $cong6 = $tienda_duyet21 + $cong_bn3 ;

                                $sql_cong_tien1 =  mysqli_query( $conn, "UPDATE `user` SET `re_money` = '$tru6' WHERE `uid` = '$id_ng_lam2' " );
                                $sql_cong_tien2 =  mysqli_query($conn, "UPDATE `user` SET `money` = '$cong6' WHERE `uid` = '$id_ng_lam2' ") ;
                                $sql_cong_tien4 =  mysqli_query( $conn, "UPDATE `duyet_nv` SET `trang_thai` = 1 WHERE `id_nv` = '$of_id_nv31' " );

                                if($sql_cong_tien1 == TRUE and $sql_cong_tien2 == TRUE and $sql_cong_tien4 == TRUE){
                                    header("location: index.php?act=duyet_job&idnv=$idnv1 ");
                                }
                           }
                    }
                } else {
                    ?> <script> alert("Bạn không thể thay đổi quyết định !") </script> <?php
                }
            }

        } else { ?> 
        <div>
            <h4 style="text-align: center; color: red;"> Trống ! </h4>
        </div> <?php } ?>
    </div>
    
</div>

<?php  
        } else {
            header("location: index.php");
        }
    }
?>