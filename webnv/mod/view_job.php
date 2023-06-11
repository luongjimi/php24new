<?php 
    // check xem nguoi dung lam co nhieu nhiem vu ko, nhieu thi thong bao la nhieu
        $nv_us19 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE  `of_us` = '$tk2' AND `time_vao` = '$date10' ");
        $rown_1v91 = mysqli_num_rows($nv_us19);
        if($rown_1v91 > 50 ){
            ?> <script> alert("Bạn đã làm quá 50 nhiệm vụ / ngày") </script> <?php
        } else {
    // check xem idnv thuoc loai nv nao
    if(isset($_GET['idnv']) and $_GET['idnv'] != " " ){
        $idnv1 = $_GET['idnv'];
        if(!is_numeric($idnv1)){
            header("location: index.php");
        }

    $nd_030 = mysqli_query($conn,"SELECT * FROM `job` WHERE id = '$idnv1' ");
    $shw_nvv1 = mysqli_fetch_array($nd_030);
    $loai_ndd1 = $shw_nvv1['loai'] ;
    $trang_thai_nv = $shw_nvv1['trang_thai']; 

    if(isset($sdt1) and $loai_ndd1 == 2){
        $nv_us11 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$idnv1' AND of_tk = '$sdt1' ");
        $rown_1v1 = mysqli_num_rows($nv_us11);
    } else {
        $nv_us11 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$idnv1' AND of_us = '$tk2' ");
        $rown_1v1 = mysqli_num_rows($nv_us11);
    }   
    
    if( ( ($trang_thai_nv == 0) and ($rown_1v1 == 0) ) or ($loai_ndd1 == 5) ){

?>

<div class="home_gt">
    <a href="index.php?act=job"><i style="font-size: 26px; margin-left: 8px; color: black;" class="fa-solid fa-arrow-left-long"></i> </a>
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
    <ul style="margin: 5px 0 0 0 ; padding: 0;">
        <div class="grid_sp2"> 
        <li style="font-size: 16px;"> <i style="font-size: 24px; margin-right: 6px;" class="fa-solid fa-user-tie"></i> Người đăng : User<?php echo $shw_nvv1['of_us']; ?> </li>
        <li style="font-size: 16px;"> <i style="font-size: 24px; margin-right: 6px;" class="fa-solid fa-coins"> </i>  Giá tiền : 
            <?php if( ($loai_ndd1 == 1) or ($loai_ndd1 == 2) ){
                $gia1nv2 = 450 ;
                echo " 450 đ ";
            } elseif ($loai_ndd1 == 3) {
                echo " 650 đ ";
                $gia1nv2 = 650 ;
            } elseif ($loai_ndd1 == 4) {
                echo " 1500 đ ";
                $gia1nv2 = 1500 ;
            } elseif ($loai_ndd1 == 5) {
                echo " 13000 đ ";
                $gia1nv2 = 13000 ;
            } ?>
        </li>
        <li style="font-size: 16px;"> <i style="font-size: 24px; margin-right: 6px;" class="fa-solid fa-box-archive"></i> Số lượng : 
        <?php 
        $row_doone30 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_job = '$idnv1' AND ( `trang_thai` = 1 OR `trang_thai` = 0 ) "); 
        $num_nvdone = mysqli_num_rows($row_doone30);
        echo $num_nvdone; 
        ?>/<?php echo $shw_nvv1['sl']; ?> </li>
        <li style="font-size: 16px;">  <i style="font-size: 24px; margin-right: 6px;" class="fa-solid fa-spinner"></i> Thời gian duyệt : <?php echo $shw_nvv1['time_end']; ?> ngày </li>
        </div>
     </ul>
</div>
<br>
<div class="home_gt">
    <ol class="mta_01">
        <h3 style="margin: -8px 0 5px 0;"> Mô Tả <i class="fa-solid fa-caret-down" style="margin-left: 8px; font-size: 24px;"></i></h3>
        <li> Truy cập vào link này: <a href="<?php echo $shw_nvv1['link']; ?>"> <?php  echo $shw_nvv1['link']; ?> </a> </li>
        <?php if ($loai_ndd1 == 5) {
            echo " <li> Áp dụng với đơn hàng dưới 10k hoặc những bạn có: mã Freeship cho đơn từ 0Đ / Gói siêu voucher. </li>";
        } elseif ( ($loai_ndd1 == 1) or ($loai_ndd1 == 3) ) {
            echo " <li> Dùng chế độ ẩn danh, chúng tôi sẽ kiểm tra id ads và ip của bạn. </li>";
        } elseif ( $loai_ndd1 == 2) {
            echo " <li> Tài khoản zalo để làm việc phải tìm kiếm được bằng số điện thoại. </li>";
        } ?>
        <li> Làm đúng theo mô tả nhiệm vụ để được duyệt tiền ! </li>
    </ol>
</div>
<br>
        <?php
        $sl_goc = $shw_nvv1['sl'];
        if($num_nvdone >= $sl_goc){
            // set trang thai = 1
            $sq2l1 = "UPDATE job SET trang_thai = 1 WHERE `id` = '$idnv1' ";
                if (mysqli_query($conn, $sq2l1)) { 
                    ?> <script> alert("Nhiệm vụ đã đủ só lượng") </script> <?php
                }

        } 
        ?>
<div class="home_gt">
    <h3 style="text-align: center; margin: -2px 0 10px 0;"> Nộp Nhiệm Vụ <i class="fa-solid fa-caret-down" style="margin-left: 8px; font-size: 24px;"></i> </h3>
    <form method="post" enctype="multipart/form-data">
        <ol style="padding: 0 5px 0 20px;">
            <?php if( ($loai_ndd1 == 1) or ($loai_ndd1 == 3) ) {?>
            <!-- Nhiệm vụ SEO có code và không code -->
            <li>
                <p> Link bạn truy cập website lần đầu và bài viết thứ 7 : </p>
                <textarea maxlength="850" class="text_nv1" name="link1" placeholder="Link đầu tiên + link post thứ 7 " required></textarea>
            </li>
            <li>
                <p> Link quảng cáo bạn ấn vào từ website của chúng tôi : </p>
                <textarea maxlength="850" class="text_nv1" name="link10" placeholder="Link quảng cáo (gclick/...) " required></textarea>
            </li>
            <li>
                <p> 1 link trong quảng cáo : </p>
                <textarea maxlength="500" class="text_nv1" name="ads1" placeholder="Trang truy cập trong ADS" required></textarea>
            </li>
            <?php if( $loai_ndd1 ==3 ){ ?>
            <li>
                <p> Code mà bạn lấy được: </p>
                <input type="text" maxlength="50" style="height: 20px;width: 98%; padding: 5px;" class="text_nv1" name="code" placeholder="CODE" required>
            </li>
            <?php } ?>
            <!-- Nhiệm vụ SEO có code và không code -->
            <?php } elseif ($loai_ndd1 == 2) {
                ?> 
                    <li>
                        <p> Số điện thoại vào nhóm : </p>
                        <input type="text" maxlength="50" style="height: 20px;width: 98%; padding: 5px;" class="text_nv1" value="<?php echo $sdt4; ?>" readonly>
                    </li>
                <?php
            } elseif ($loai_ndd1 == 5) {
                $nv_us12 = mysqli_query($conn,"SELECT * FROM `tai_khoan` WHERE of_us = '$tk2' AND loai = 2 ");
                if(mysqli_num_rows($nv_us12) > 0 ){
                    $rown_2v1 = mysqli_fetch_array($nv_us12);
                    $usmt4 = $rown_2v1['tt_tk'];
                    $usmt5 = $rown_2v1['id_tk'];
                

                $nv_us14 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_tk = '$usmt5' AND of_job = '$idnv1' ");
                $rown_4v1 = mysqli_fetch_array($nv_us14);

                $nv_us15 = mysqli_query($conn,"SELECT * FROM `duyet_nv` WHERE of_tk = '$usmt5' AND of_job = '$idnv1' AND trang_thai = 1 ");
                $rown_4v5 = mysqli_fetch_array($nv_us15);
                ?> 
                    <li>
                        <p> Username Shoppe : </p>
                        <input type="text" maxlength="50" style="height: 20px;width: 98%; padding: 5px;" class="text_nv1" value="<?php echo $usmt4; ?>" readonly>
                    </li>

                    <?php 
                        if ($rown_4v1 == 0){
                            ?> 
                            <li>
                                <p> Mã đơn hàng : </p>
                                <input type="text" maxlength="50" style="height: 20px;width: 98%; padding: 5px; font-weight: 450;" class="text_nv1" name="ma_don_hang" placeholder="Mã đơn hàng sau khi đặt hàng" required>
                            </li>

                            <li>
                                <p> Ảnh chụp đã folow shop : </p>
                                <input type="file" name="fileupload" required/>
                            </li>

                            <li>
                                <p> Mã vận đơn : </p>
                                <input  style="height: 20px;width: 98%; padding: 5px;" class="text_nv1" placeholder=" Nộp sau khi 'Đã nhận được hàng. " disabled>
                            </li>
                            <?php
                        } elseif($rown_4v5 > 0) {
                            header("location: index.php");
                        } else {
                            // su li neu nhiem vu da gui roi va chua duoc duyet (chi duoc gui 1 lan)
                            ?> 
                            <li>
                                <p> Mã vận đơn : </p>
                                <input  style="height: 20px;width: 98%; padding: 5px;" class="text_nv1" maxlength="50" name="mavandon" placeholder=" Nộp sau khi 'Đã nhận được hàng. " required>
                            </li>
                            <?php
                        }
                  } else {
                    header("location: index.php?act=tk");
                }
                    
            } elseif ($loai_ndd1 == 4) {
                ?> 
                    <li>
                        <p> Username ( + mật khẩu ) mà bạn đã đăng kí : </p>
                        <textarea type="text" maxlength="250" style="width: 98%; padding: 5px; font-weight: 450;" class="text_nv1" name="us_dk" placeholder="Tài khoản / mật khẩu / username" required></textarea>
                    </li>

                    <li>
                        <p> Ảnh chụp đã đăng kí thành công / đánh giá 5* : </p>
                        <input type="file" name="fileupload" required/>
                    </li>
                <?php
            } ?>
        </ol>
        <br>
        <button type="submit" class="btn_log" style="font-size: 16px; padding: 5px 15px; width: 100%;" name="gui_nv12" > Gửi Nhiệm Vụ </button>
    </form>
    
</div>

<?php 
    // su li form
        if(isset($_POST['gui_nv12'])){
            // $num_nvdone < $slnv -> ok cho vao
            
            if($num_nvdone >= $sl_goc){
                // set trang thai = 1
                $sq2l1 = "UPDATE job SET trang_thai = 1 WHERE `id` = '$idnv1' ";
                    if (mysqli_query($conn, $sq2l1)) { 
                        ?> <script> alert("Nhiệm vụ đã đủ só lượng") </script> <?php
                    }

            } else {

            $row12s = mysqli_query($conn," SELECT * FROM `user` WHERE `uid` = '$tk2' ");
            $cou12nt = mysqli_fetch_array($row12s);
            $tien_pd_us1 = $cou12nt['re_money'];

            if( $shw_nvv1['time_end'] == 1){
                $newdate21 = strtotime ( '+1 day' , strtotime ( $date ) ) ;
            } elseif ( $shw_nvv1['time_end'] == 5) {
                $newdate21 = strtotime ( '+5 day' , strtotime ( $date ) ) ;
            } elseif ( $shw_nvv1['time_end'] == 20) {
                $newdate21 = strtotime ( '+20 day' , strtotime ( $date ) ) ;
            }

            if( ($loai_ndd1 == 1) or ($loai_ndd1 == 3) ){
                $link1 = htmlspecialchars($_POST['link1']) ;
                $link10 = htmlspecialchars($_POST['link10']) ;
                $asd1 = htmlspecialchars($_POST['ads1']) ; 
                $code11 = !empty($_POST['code'])?$_POST['code']:0;  
                $code11 = htmlspecialchars($_POST['code']);
            
                $sq2l1 = "INSERT INTO `seo` ( `link1`, `ads1`, `last10` ,`code`) VALUES ( '$link1', '$asd1', '$link10' , '$code11')";
                    if (mysqli_query($conn, $sq2l1)) { 
                        $last_id = mysqli_insert_id($conn);
                        $ssqls1 = "INSERT INTO `duyet_nv` ( `of_us`, `of_job`, `of_nv`, `het_han`, `loai` ) VALUES ( '$tk2', '$idnv1', '$last_id', '$newdate21', '$loai_ndd1') ";
                        if (mysqli_query($conn, $ssqls1)) { 
                            $cong_tien = $gia1nv2 + $tien_pd_us1 ;// cong tien duyet trong db
                            $sq2l1 = "UPDATE user SET re_money = '$cong_tien' WHERE `uid` = '$tk2' ";
                            if (mysqli_query($conn, $sq2l1)) { 
                                header("location: index.php?act=job");
                            }
                        }  
                    } 
            } elseif ($loai_ndd1 == 2) {
                $ssqls1 = "INSERT INTO `duyet_nv` ( `of_us`, `of_job`, `het_han`, `of_tk`) VALUES ( '$tk2', '$idnv1', '$newdate21', '$sdt1') ";
                    if (mysqli_query($conn, $ssqls1)) { 
                        $cong_tien = $gia1nv2 + $tien_pd_us1 ;// cong tien duyet trong db
                            $sq2l1 = "UPDATE user SET re_money = '$cong_tien' WHERE `uid` = '$tk2' ";
                            if (mysqli_query($conn, $sq2l1)) { 
                                header("location: index.php?act=job");
                            }
                    }  
            } elseif($loai_ndd1 == 4){
            
                    $target_dir = "img/nv_img/";
                    $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);
                    $allowUpload   = true;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $maxfilesize   = 1000000;
                    $allowtypes    = array('jpg', 'png', 'jpeg');
                    $name_img = basename( $_FILES["fileupload"]["name"]);

                    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                    if (!isset($_FILES["fileupload"])) {
                        ?> <script> alert("Lỗi !") </script> <?php
                        $allowUpload = false;
                        die;
                    } elseif($_FILES["fileupload"]['error'] != 0){
                        ?> <script> alert("Lỗi !") </script> <?php
                        $allowUpload = false;
                        die;
                        // phan nay kiem tra du lieu anh
                } else{
                    //phan nay kiem tra dinh dang anh
                        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                    if($check !== false) {
                        $allowUpload = true;
                        if(file_exists($target_file)){
                            ?> <script> alert("Sửa lại tên ảnh") </script> <?php
                            $allowUpload = false;
                        } elseif($_FILES["fileupload"]["size"] > $maxfilesize){
                            ?> <script> alert("File ảnh quá 1mb") </script> <?php
                            $allowUpload = false;
                        } elseif (!in_array($imageFileType,$allowtypes) ){
                            ?> <script> alert("Cho phép : png / jpg / jepg") </script> <?php
                            $allowUpload = false;
                        } else{
                            if ($allowUpload) {
                                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                    
                                        $us_name12 = htmlspecialchars($_POST['us_dk']);
                                        $sq2l1 = "INSERT INTO `app` (`anh1`, `us_name`) VALUES ( '$name_img' ,'$us_name12')";
                                        if (mysqli_query($conn, $sq2l1)) { 
                                            $last_id = mysqli_insert_id($conn);
                                            $ssqls1 = "INSERT INTO `duyet_nv` ( `of_us`, `of_job`, `of_nv`, `het_han`, `loai` ) VALUES ( '$tk2', '$idnv1', '$last_id', '$newdate21', '$loai_ndd1') ";
                                            if (mysqli_query($conn, $ssqls1)) { 
                                                $cong_tien = $gia1nv2 + $tien_pd_us1 ;// cong tien duyet trong db
                                                $sq2l1 = "UPDATE user SET re_money = '$cong_tien' WHERE `uid` = '$tk2' ";
                                                if (mysqli_query($conn, $sq2l1)) { 
                                                    header("location: index.php?act=job");
                                                }
                                            }  
                                        }
                                    }  else {
                                        ?> <script> alert("Lỗi !") </script> <?php
                                    }
                                } 
                            }

                        } else {
                            ?> <script> alert("Lỗi !") </script> <?php
                            $allowUpload = false;
                        }
                    }   
                 
            } elseif($loai_ndd1 == 5){

                if(isset($_POST['mavandon'])){
                    $mavandon = htmlspecialchars($_POST['mavandon']);
                    $id_nv041 = $rown_4v1['of_nv'];

                    $sq2l121 = mysqli_query($conn , "SELECT * FROM `shop` WHERE id_nv = '$id_nv041' AND ma_van_don = 'PENDING' ") ;
                    $ktra1 = mysqli_num_rows($sq2l121);
                    if($ktra1 == 1){
                        $sq2l1 = "UPDATE shop SET ma_van_don = '$mavandon' WHERE id_nv = '$id_nv041' ";
                        if (mysqli_query($conn, $sq2l1)) { 
                                header("location: index.php?act=job");
                        }
                    } else {
                        header("location: index.php?act=job");
                    }
                    
                } else {

                $target_dir = "img/nv_img/";
                $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);
                $allowUpload   = true;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $maxfilesize   = 1000000;
                $allowtypes    = array('jpg', 'png', 'jpeg');
                $name_img = basename( $_FILES["fileupload"]["name"]);

                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                if (!isset($_FILES["fileupload"])) {
                    ?> <script> alert("Lỗi !") </script> <?php
                    $allowUpload = false;
                    die;
                } elseif($_FILES["fileupload"]['error'] != 0){
                    ?> <script> alert("Lỗi !") </script> <?php
                    $allowUpload = false;
                    die;
                    // phan nay kiem tra du lieu anh
            } else{
                //phan nay kiem tra dinh dang anh
                    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                if($check !== false) {
                    $allowUpload = true;
                    if(file_exists($target_file)){
                        ?> <script> alert("Sửa lại tên ảnh") </script> <?php
                        $allowUpload = false;
                    } elseif($_FILES["fileupload"]["size"] > $maxfilesize){
                        ?> <script> alert("File ảnh quá 1mb") </script> <?php
                        $allowUpload = false;
                    } elseif (!in_array($imageFileType,$allowtypes) ){
                        ?> <script> alert("Cho phép : png / jpg / jepg") </script> <?php
                        $allowUpload = false;
                    } else{
                        if ($allowUpload) {
                            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {

                                    //$usmt5
                                    $ma_don_hang = htmlspecialchars($_POST['ma_don_hang']) ;
                                        $mavandon = "PENDING" ;
                                        $sq2l1 = "INSERT INTO `shop` (`ma_don_hang` , `ma_van_don` , `anh1`) VALUES ( '$ma_don_hang', '$mavandon' ,'$name_img')";
                                        if (mysqli_query($conn, $sq2l1)) { 
                                            $last_id = mysqli_insert_id($conn);
                                            $ssqls1 = "INSERT INTO `duyet_nv` ( `of_us`, `of_job`, `of_nv`, `het_han`, `of_tk` , `loai` ) VALUES ( '$tk2', '$idnv1', '$last_id', '$newdate21', '$usmt5' , '$loai_ndd1') ";
                                            if (mysqli_query($conn, $ssqls1)) { 
                                                $cong_tien = $gia1nv2 + $tien_pd_us1 ;// cong tien duyet trong db
                                                $sq2l1 = "UPDATE user SET re_money = '$cong_tien' WHERE `uid` = '$tk2' ";
                                                if (mysqli_query($conn, $sq2l1)) { 
                                                    header("location: index.php?act=job");
                                                }
                                            }  
                                        }
                                    
                                }  else {
                                    ?> <script> alert("Lỗi !") </script> <?php
                                }
                            } 
                        }

                    } else {
                        ?> <script> alert("Lỗi !") </script> <?php
                        $allowUpload = false;
                    }
                }   

                }
                
            }
        
        }
           
    }
} else {
        header("location: index.php");
        } 
    }
}
?>
