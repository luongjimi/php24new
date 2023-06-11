<div class="home_gt">
    <div class="dm_scroll_sub">
        <?php if(isset($_GET['ch']) and $_GET['ch'] == 1 ){
            ?> <a href="index.php?act=add_job&ch=1" class="sub_dm_visit" > <i class="fa-solid fa-plus" style="font-size: 18px; margin-right: 8px;"></i> Thêm Nhiệm Vụ </a> <?php
        } else {
            ?> <a href="index.php?act=add_job&ch=1"> <i class="fa-solid fa-plus" style="font-size: 18px; margin-right: 8px;"></i> Thêm Nhiệm Vụ </a> <?php
        } 
        if (isset($_GET['ch']) and $_GET['ch'] == 2) {
            ?>  <a href="index.php?act=add_job&ch=2" class="sub_dm_visit" > <i class="fa-solid fa-chart-simple" style="font-size: 18px; margin-right: 8px;"></i>  Quản Lý Nhiệm Vụ </a> <?php
        } else {
            ?>  <a href="index.php?act=add_job&ch=2"  > <i class="fa-solid fa-chart-simple" style="font-size: 18px; margin-right: 8px;"></i>  Quản Lý Nhiệm Vụ </a> <?php
        } ?>
    </div>
</div>

<br>

<?php 
    if(isset($_GET['ch']) and is_numeric($_GET['ch']) and $_GET['ch'] != "" ){
        switch ($_GET['ch']) {
            case '1':
                ?>                   
                    <div class="home_gt">
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <h3 style="margin: 5px 0 -8px 0 ; text-align: center;"> Thông tin chiến dịch  <i class="fa-solid fa-angle-down"></i> </h3>
                            <ul class="ul_add_nv3" style="padding: 0 5px 0 25px;">
                                <li class="nv02122" > <a style="margin: 5px; font-size: 16px;"> • Chọn loại nhiệm vụ: </a> 
                                    <select name="loai_nv" id="name2" style="padding: 5px;" required>
                                        <option value="2" > Nhóm zalo </option>
                                        <option value="1" > SEO </option>
                                        <option value="3"  > SEO có code </option>
                                        <option value="4" > Tải app + đăng kí </option>
                                        <option value="5" > Buff Shopee </option>
                                    </select>
                                </li>
                                <li class="nv02122" > <a style="margin: 5px; font-size: 16px;"> • Số lượng: </a> 
                                    <select name="sl_nv" id="gia1" style="padding: 5px;" required>
                                        <option value="50"> 50 </option>
                                        <option value="100"> 100 </option>
                                        <option value="500"> 500 </option>
                                        <option value="1000">1000 </option>
                                    </select>
                                </li>

                                <li class="nv02122" > <a style="margin: 5px; font-size: 16px;"> • Tự động duyệt sau: </a> 
                                    <select name="time_cnv" style="padding: 5px;" required>
                                        <option value="1"> 1 ngày </option>
                                        <option value="5"> 5 ngày </option>
                                        <option value="20"> 20 ngày </option>
                                        <!-- cai nay su li o back-end neu $sl_nv = 21 or = 14 and loai_nv != 5 -> ko cho dang ki -->
                                    </select>
                                </li>

                                <li>
                                    <a style="margin: 5px; font-size: 16px;"> Link hướng dẫn nhiệm vụ </a> <i class="fa-solid fa-caret-down" style="padding: 0 5px;"></i>
                                    <textarea type="text"  name="link_nv" style="height: 74px; width: 98%; margin-top: 8px; font-weight: 450; font-size: 16px; padding: 5px;" maxlength="150" placeholder="Ví dụ bên thứ 3: note1s, google docs,..." required></textarea>  
                                </li>

                                <li class="code_nv1" id="3">
                                    <a style="margin: 5px; font-size: 16px;"> Link trang web </a> <i class="fa-solid fa-caret-down" style="padding: 0 5px;"></i>
                                    <input type="text" name="code_nv" style=" width: 98%; margin-top: 8px; padding:5px;font-weight: 450; font-size: 16px;" maxlength="50" placeholder="example.com" >  
                                </li>
                                
                            </ul>
                            <hr>        
                            <h4 style="color: red; font-weight: 750; margin: 0; text-align:center;"> TỔNG PHẢI THANH TOÁN : <em id="gia2"> 37500 </em></h4>
                            <br>
                            <input type="submit" class="btn_log" style="font-size: 16px; padding: 5px 15px; width: 100%;" name="add_nv" value="Tạo Chiến Dịch" >
                        </form>

                        <?php 
                            $tien_now =  $countid['money'];
                            if (isset($_POST['add_nv'])) {

                                $loai_nv = $_POST['loai_nv'];
                                $sl_nv = $_POST['sl_nv'];
                                $time_cnv = $_POST['time_cnv'];
                                $link1 = htmlspecialchars($_POST['link_nv']);
                                $code1 = htmlspecialchars($_POST['code_nv']);
                                // su dung regex de cho phep 1 vai ki tu dac biet

                                if ( ($time_cnv == 20 ) and $loai_nv != 5 ) {
                                    ?> <script> alert("Thời gian duyệt quá dài") </script> <?php
                                } else {
                                    if( ($loai_nv == 1) or ($loai_nv == 2) ){
                                        $gia_nv = 650;
            
                                    } elseif ($loai_nv == 3) {
                                        $gia_nv = 800;
                                        
                                    } elseif ($loai_nv == 4) {
                                        $gia_nv = 1750;
                                        
                                    } elseif ($loai_nv == 5) {
                                        $gia_nv = 14500;
                                        
                                    }
        
                                    $tong_tien = $gia_nv * $sl_nv ;
                                    if($tong_tien > $tien_now ){
                                        ?> <script> alert("Bạn không đủ tiền") </script> <?php
                                    } else {
                                        // tru tien nguoi dung
                                        $tru = $tien_now - $tong_tien;
                                        $tru_tien = "UPDATE `user` SET `money` = '$tru' WHERE `uid` = 4 ";
                                        if ($conn->query($tru_tien) === TRUE) {
                                            $sqlnv_1 =  "INSERT INTO `job` ( `time_end`, `loai`, `sl`, `link`, `of_us`, `code`) VALUES ( '$time_cnv', '$loai_nv', '$sl_nv', '$link1', '$tk2', '$code1') "; 
                                            if ($conn->query($sqlnv_1) === TRUE) {
                                                ?> <script> alert("Đăng nhiệm vụ thành công") </script> <?php
                                            }
                                        }
                                    }
                                    
                                }
                            }

                        ?>
                    </div>
                    <br>
                    <br>
                <?php
                break;
            
            case '2':
                ?>
                <div class="home_gt">
                
                    <div style="margin-top: 10px;" class="hthi_nv">
                        <?php
                            // phan trang
                            $slbd = 6; // so luong bai dang moi trang
                            $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                            $offset = ($page - 1) * $slbd;
                            $sp_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE of_us = '$tk2' ");
                            $tongsp = mysqli_num_rows($sp_030);
                            $num_page = ceil($tongsp / $slbd);
                            // end phan trang

                            $row_nv30 = mysqli_query($conn,"SELECT * FROM `job` WHERE of_us = '$tk2'  ORDER BY `job`.`id` DESC LIMIT $slbd OFFSET $offset ");
                            if(mysqli_num_rows($row_nv30) > 0) {
                            while ($shownv_30 = mysqli_fetch_array($row_nv30)) { 
                                $id_nv23 = $shownv_30['id'];
                                $ctt_nv31 = $shownv_30['trang_thai'];
                            ?> 
                                <div class="col_nv">
                                    <div class="nv_top1">
                                        <a class="nv_a_top1" href="index.php?act=duyet_job&idnv=<?php echo $shownv_30['id']; ?>"> <i class="fa-solid fa-fire" style="color: red;"></i> <?php 
                                            if($shownv_30['loai'] == 1) {
                                                echo " SEO [".$shownv_30['id']."] + Promote Content + InPage 3x + ADS 3x ";
                                            }  elseif ($shownv_30['loai'] == 2) {
                                                echo  " [".$shownv_30['id']."] BUFF thành viên nhóm Zalo ";
                                            }  elseif ($shownv_30['loai'] == 3) {
                                                echo  " SEO [".$shownv_30['id']."] + Pro Content + InPage 3x + ADS 3x (CODE) ";
                                            }  elseif ($shownv_30['loai'] == 4) {
                                                echo  " [".$shownv_30['id']."] BUFF APP Android/IOS + Đăng kí ";
                                            }  elseif ($shownv_30['loai'] == 5) {
                                                echo  "[".$shownv_30['id']."] BUFF đơn Shopee + Follow shop + Đánh giá 5*  ";
                                            }
                                        ?> </a>
                                    </div>
                                    <hr>
                                    <div class="nv_body1">
                                        <a> <i class="fa-regular fa-clock"></i> <?php echo $shownv_30['time_end']; ?> ngày </a>
                                        |
                                        <a> <i class="fa-solid fa-box-archive"></i> <?php $jobid = $shownv_30['id'];
                                        $row_doone30 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$jobid' AND ( `trang_thai` = 1 OR `trang_thai` = 0 )"); 
                                        $num_nvdone = mysqli_num_rows($row_doone30);
                                        echo $num_nvdone; ?>/<?php echo $shownv_30['sl']; 

                                        if( ($num_nvdone <= $shownv_30['sl']) and $ctt_nv31 == 1 ){
                                            // set trang thai = 1
                                            $sq2l1 = mysqli_query($conn,"UPDATE job SET trang_thai = 0 WHERE `id` = '$id_nv23' ") ;
                                        
                                        } 

                                        ?> </a>
                                    </div>
                                    <a class="btn_02 flx_txt" href="index.php?act=duyet_job&idnv=<?php echo $shownv_30['id']; ?>"><i class="fa-solid fa-screwdriver-wrench"></i>  Quản Lý Chiến Dịch </a>
                                </div>
                            <?php }  ?>
                    </div>
                    <hr>
                    <div class="pt">
                        <?php
                            if($page > 3){
                                ?>
                                    <a href="?act=add_job&ch=2">First</a>
                                <?php
                            }
                            for ($i=1; $i <= $num_page ; $i++) {
                                if ($i != $page) {
                                    if($i > $page - 3 && $i < $page + 3){
                                        ?> <a href="?act=add_job&ch=2&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                    }
                                } else {
                                    ?> <a class="visited_pt"> <?php echo $i; ?></a> <?php
                                }
                            }
                            if($page < $num_page - 3){
                                $end = $num_page;
                                ?>
                                    <a href="?act=add_job&ch=2&page=<?php echo $end; ?>">Last</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                
            
                <?php  } else { ?> 
                    <h4 style="color:red; text-align: center; margin: 0;"> Chưa có nhiệm vụ nào ! </h4> <?php } 
                break;
        }
    } else { header("index.php?act=add_job&ch=1"); }
?>