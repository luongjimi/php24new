<div id="od122" class="home_gt">
    <ul> <h3 style="margin: 0 0 8px 0;"> Phân Loại <i style="margin-left: 10px; font-size: 18px;" class="fa-solid fa-filter"></i> </h3>
        <li> <a href="index.php?act=job&loai=1"> SEO </a> </li>
        <li> <a href="index.php?act=job&loai=2"> Nhóm Zalo </a> </li>
        <li> <a href="index.php?act=job&loai=4"> Đăng Kí App </a> </li>
        <li> <a href="index.php?act=job&loai=5"> Buff Shopee </a> </li>
    </ul>

</div>
<div class="top_job home_gt">
    <h4 style="margin: 0;"> <?php 
        $loai_job = !empty($_GET['loai'])?$_GET['loai']:1;
        if($loai_job == 1){
            echo " # SEO website ";
        } elseif($loai_job == 2) {
            echo " # Buff mem Zalo ";
        } elseif($loai_job == 4) {
            echo " # Tải app + Đăng kí";
        } elseif($loai_job == 5) {
            echo " # Buff đơn ảo Shopee ";
        }

    ?> </h4>
    <div class="topnav" id="myTopnav">
        <div class="dropdown">
            <button class="dropbtn">Phân Loại <i class="fa-solid fa-filter" style="margin-left: 10px; font-size: 18px;"></i> </button>
            <div class="dropdown-content">
            <a href="index.php?act=job&loai=1">SEO</a>
            <a href="index.php?act=job&loai=2">Nhóm Zalo</a>
            <a href="index.php?act=job&loai=4">Đăng Kí App</a>
            <a href="index.php?act=job&loai=5">Buff Shopee</a>
            </div>
        </div>
    </div>
      <i id="od121" class="fa-solid fa-bars-staggered"></i>

</div>

<br>

<div class="home_gt">
   
        <div style="margin-top: 10px;" class="hthi_nv">
                        <?php 
                            // phan trang
                            $slbd = 10; // so luong bai dang moi trang
                            $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                            if( !is_numeric($loai_job) or !is_numeric($page) ){
                                header("location: index.php");
                            }
                            $offset = ($page - 1) * $slbd;
                            if($loai_job == 1){
                                $sp_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_us = '$tk2' ) AND trang_thai = 0 AND ( loai = 1 OR loai = 3 ) ");
                            } elseif ($loai_job == 2 and isset($sdt1) ) {
                                $sp_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_tk = '$sdt1' ) AND trang_thai = 0 AND loai = '$loai_job' ");
                            } else {
                                $sp_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_us = '$tk2' ) AND  trang_thai = 0 AND loai = '$loai_job' "); 
                            }
                            $tongsp = mysqli_num_rows($sp_030);
                            $num_page = ceil($tongsp / $slbd);
                            // end phan trang

                            if($loai_job == 1){
                                $row_nv30 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_us = '$tk2' ) AND trang_thai = 0 AND ( loai = 1 OR loai = 3 ) ORDER BY `job`.`sl` DESC LIMIT $slbd OFFSET $offset ");
                            } elseif ($loai_job == 2 and isset($sdt1) ) {
                                $row_nv30 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_tk = '$sdt1' ) AND trang_thai = 0 AND loai = '$loai_job' ORDER BY `job`.`sl` DESC LIMIT $slbd OFFSET $offset ");
                            } else {
                                $row_nv30 = mysqli_query($conn,"SELECT * FROM `job` WHERE id NOT IN ( SELECT of_job FROM duyet_nv WHERE of_us = '$tk2' ) AND  trang_thai = 0 AND loai = '$loai_job' ORDER BY `job`.`sl` DESC LIMIT $slbd OFFSET $offset  "); 
                            }
                            
                            if(mysqli_num_rows($row_nv30) > 0) {
                                if( ($loai_job == 2) and (!isset($_SESSION['acc_run'])) ){
                                    ?> 
                                    <div class="flx_txt">
                                        <h4 style="color: red; margin:0;"> Vui lòng vào <em><a style="font-size: 16px;" href="index.php?act=tk"> Tài khoản</a></em> và chọn tài khoản zalo để chạy </h4>
                                    </div>
                                    <?php
                                } else {

                            while ($shownv_30 = mysqli_fetch_array($row_nv30)) { 
                                $idnv21 = $shownv_30['id'];
                                $sl_goc = $shownv_30['sl'];
                            ?> 
                                <div class="col_nv">
                                    <div class="nv_top1">
                                        <a class="nv_a_top1" href="index.php?act=view_job&idnv=<?php echo $shownv_30['id']; ?>"> <i class="fa-solid fa-fire" style="color: red;"></i> <?php
                                            if($shownv_30['loai'] == 1) {
                                                echo " SEO [".$shownv_30['id']."] + Promote Content + InPage 3x + ADS 3x ";
                                            }  elseif ($shownv_30['loai'] == 2) {
                                                echo  " [".$shownv_30['id']."] BUFF thành viên nhóm Zalo ";
                                            }  elseif ($shownv_30['loai'] == 3) {
                                                echo  " SEO [".$shownv_30['id']."] + Pro Content + InPage 3x + ADS 3x (CODE) ";
                                            }  elseif ($shownv_30['loai'] == 4) {
                                                echo  " [".$shownv_30['id']."] BUFF APP Android/IOS + Đăng kí ";
                                            }  elseif ($shownv_30['loai'] == 5) {
                                                echo  " [".$shownv_30['id']."] BUFF đơn Shopee + Follow shop + Đánh giá 5* ";
                                            }

                                        ?> </a>
                                    </div>
                                    <hr>
                                    <div class="nv_body1">
                                        <a> <i class="fa-regular fa-clock"></i> <?php echo $shownv_30['time_end']; ?> ngày </a>
                                        |
                                        <a> <i class="fa-solid fa-box-archive"></i> <?php  
                                        $jobid = $shownv_30['id'];
                                        $row_doone30 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$jobid' AND ( `trang_thai` = 1 OR `trang_thai` = 0 ) "); 
                                        $num_nvdone = mysqli_num_rows($row_doone30);
                                        echo $num_nvdone;
                                        
                                        if($num_nvdone >= $sl_goc){
                                            // set trang thai = 1
                                            $sq2l1 = mysqli_query($conn,"UPDATE job SET trang_thai = 1 WHERE `id` = '$idnv21' ") ;
        
                                        } 
                                        ?>/<?php echo $shownv_30['sl']; ?> </a>
                                    </div>
                                    <a class="btn_02 flx_txt" href="index.php?act=view_job&idnv=<?php echo $shownv_30['id']; ?>"> <i class="fa-solid fa-play"></i> Vào Làm + <?php 
                                        if( ($shownv_30['loai'] == 1) or ($shownv_30['loai'] == 2) ){
                                            echo " 450 đ ";
                                        } elseif ($shownv_30['loai'] == 3) {
                                            echo " 650 đ ";
                                        } elseif ($shownv_30['loai'] == 4) {
                                            echo " 1500 đ ";
                                        } elseif ($shownv_30['loai'] == 5) {
                                            echo " 13000 đ ";
                                        }
                                    ?> </a>
                                </div>
                            <?php 
                            } ?>

            </div>

            <hr>

            <div class="pt">
    
                        <?php
                            if($page > 3){
                                ?>
                                    <a href="?act=job&loai=<?php echo $loai_job ?>&page=1">First</a>
                                <?php
                            }
                            for ($i=1; $i <= $num_page ; $i++) {
                                if ($i != $page) {
                                    if($i > $page - 3 && $i < $page + 3){
                                        ?> <a href="?act=job&loai=<?php echo $loai_job ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                    }
                                } else {
                                    ?> <a class="visited_pt"> <?php echo $i; ?></a> <?php
                                }
                            }
                            if($page < $num_page - 3){
                                $end = $num_page;
                                ?>
                                    <a href="?act=job&loai=<?php echo $loai_job ?>&page=<?php echo $end; ?>">Last</a>
                                <?php
                            }
                        ?>
                        
            </div>   

    <?php }

    } else { ?> <h4 style="color:red; text-align: center; margin: 0;"> Chưa có nhiệm vụ nào ! </h4> <?php }  ?>

</div>
