<?php if (isset($_SESSION['user']) and $_SESSION['user'] != "" ) {
    // check cad $tk02
    $sp3 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$tk02' AND  ( cad = 1 OR cad = 2 ) ");
    $tongsp1 = mysqli_num_rows($sp3);
    if ($tongsp1 === 1) {
        

 ?>
<div class="main2">
    <div class="addkh12">
        <br>
        <?php 
            if (isset($_GET['sua']) and $_GET['sua'] != "" ) {
                $uidkh = $_GET['sua'];
                // check xem co phai la so ko
                if (is_numeric($uidkh)) { 
                    // kiem tra xem idsp co phai cua gv do ko
                    $cvd3 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_gv = '$tk02' AND id_sp = '$uidkh' ");
                    $cgv11 = mysqli_num_rows($cvd3);
                    if ($cgv11 === 1) { 
                        $ttkh0129 = mysqli_fetch_array($cvd3);
                        ?>
                            <div class="view_khgv2">
                                <a style=" padding: 5px;">  <i class="fa-solid fa-gears"></i> Chỉnh sửa chung :  </a>
                                <form class="view_khgv2" method="post" enctype="multipart/form-data" >
                                    <div>
                                        <a style="margin: 0; font-size: 14px;"> Ảnh bìa (16:9) : </a>
                                        <input type="file" name="fileupload" required/>
                                        Chọn môn:
                                        <select name="suamon" required style="height: 32px;">
                                            <option value="1"> Toán </option>
                                            <option value="2"> Lý </option>
                                            <option value="3"> Anh </option>
                                            <option value="4"> Hóa </option>
                                            <option value="5"> CNTT </option>
                                        </select>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Tên: <textarea name="rename" type="text" maxlength="150"><?php echo $ttkh0129['name']; ?></textarea> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Giá: <textarea name="reprice" type="text" maxlength="10"><?php echo $ttkh0129['gia']; ?></textarea> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Chuyên đề: <textarea name="recde" type="text" maxlength="2"><?php echo $ttkh0129['chuyen_de']; ?></textarea> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Số lượng: <textarea name="reslg" type="text" maxlength="3"><?php echo $ttkh0129['sl_vd']; ?></textarea> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Mô tả: <textarea name="remota" type="text" maxlength="500"><?php echo $ttkh0129['mota']; ?></textarea> </div>
                                    <input type="submit" value="Thay đổi" name="change" >
                                </form>
                                <?php
                                    // thay doi thong tin khoa hoc
                                        if (isset($_POST['change'])) {
                                            $anhkhcu = $ttkh0129['img'];
                                            $idkh04 = $_GET['sua'];
                                            $remon = $_POST['suamon'];
                                            $reten1 = $_POST['rename'];
                                            $reslg = $_POST['reslg'];
                                            $recde = $_POST['recde'];
                                            $regia = $_POST['reprice'];
                                            $remota = $_POST['remota'];
                                            
                                    $target_dir = "img/stimg/";
                                    $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);
                                    $allowUpload   = true;
                                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                    $maxfilesize   = 1200000;
                                    $allowtypes    = array('jpg', 'png', 'jpeg');
                                    $name_img = basename( $_FILES["fileupload"]["name"]);
                                    $ustk = $_SESSION['user'];
                                    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                                    if (!isset($_FILES["fileupload"])) {
                                        echo "Dữ liệu không đúng cấu trúc";
                                        $allowUpload = false;
                                        die;
                                    } elseif($_FILES["fileupload"]['error'] != 0){
                                        echo "Dữ liệu upload bị lỗi";
                                        $allowUpload = false;
                                        die;
                                        // phan nay kiem tra du lieu anh
                                } else{
                                    //phan nay kiem tra dinh dang anh
                                        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                                    if($check !== false) {
                                        $allowUpload = true;
                                        if(file_exists($target_file)){
                                            echo "Tên không hợp lệ, sửa lại tên.";
                                            $allowUpload = false;
                                        } elseif($_FILES["fileupload"]["size"] > $maxfilesize){
                                            echo "dung lượng quá lớn.";
                                            $allowUpload = false;
                                        } elseif (!in_array($imageFileType,$allowtypes) ){
                                            echo "Sai định dạnh hình ảnh.";
                                            $allowUpload = false;
                                        } else{
                                            if ($allowUpload) {
                                                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                                                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                                                    // soa file trong db di
                                                    $status = unlink($target_dir.basename($anhkhcu));
                                                    if ($status){
                                                        // kiem tra anh vao insert anh vao
                                                        $sqlz21 = "UPDATE `sp` SET name='$reten1', img ='$name_img', of_dm ='$remon' , mota = '$remota', chuyen_de = '$recde' , sl_vd = '$reslg' , gia = '$regia'  WHERE id_sp = '$idkh04' ";
                                                        if ($conn->query($sqlz21) === TRUE) {
                                                            header("Location: index.php?act=post_kh&sua=$idkh04");
                                                        } else {
                                                            echo "Error updating";
                                                        }
                                                    } else {
                                                        echo "Lỗi !";
                                                    }
                                                }
                                                else {
                                                    echo "Lỗi !";
                                                }
                                            }
                                            else {
                                                echo "Lỗi !";
                                            }
                                        }
                                    }
                                    else {
                                        echo "Không phải file ảnh.";
                                        $allowUpload = false;
                                    }
                                }   
                                        }
                                    // end thay doi thong tin khoa hoc
                                ?>
                            </div>

                            <div class="view_khgv2" >
                                <a style=" padding: 5px;" >  <i class="fa-solid fa-plus"></i> Thêm video khóa học : </a>
                                <form class="view_khgv2" method="post" >
                                    <div style="display: flex; align-items: center; gap: 10px;"> Tên video: <input name="namevid" type="text" maxlength="500" placeholder="VD: [Loại] + chuyên đề + tên bài giảng" style="height: 28px; width: 480px; "> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Link video: <input name="linkvid" type="text" maxlength="500" placeholder="ưu tiên link được nhúng" style="height: 28px; width: 480px; "> </div>
                                    <div style="display: flex; align-items: center; gap: 10px;"> Link phụ/file đề: <input name="linkvd4" type="text" maxlengh="500" placeholder="nên chọn file pdf hoặc link nhóm kín" style="height: 28px; width: 480px;"> </div>
                                    <div>
                                    Phân loại:
                                        <select name="free0" required style="height: 32px;">
                                            <option value="0"> Trả phí </option>
                                            <option value="1"> Miễn phí </option>
                                        </select>
                                        <input style="margin-left:20px;" type="submit" value="Thêm video" name="addvdgv" >
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['addvdgv'])) {
                                        $namevd = $_POST['namevid'];
                                        $linkvid = $_POST['linkvid'];
                                        $vdlink2 = $_POST['linkvd4'];
                                        $isfree = $_POST['free0'];
                                        $offkh1 = $_GET['sua'];

                                        $sqlakh1 = " INSERT INTO `view_sp` (`name`, `link`, `of_sp`, `file`, `free`) VALUES ('$namevd','$linkvid','$offkh1','$vdlink2','$isfree') ";
                                        if ($conn->query($sqlakh1) === TRUE) {
                                            header("Location: index.php?act=post_kh&sua=$offkh1");
                                        } else {
                                            echo "Error";
                                        }
                                    }
                                ?>
                            </div>

                        <ol class="view_khgv2">
                            <h4 style="margin: 0;"> Danh sách video - mới nhất </h4>
                            <?php
                                // phan trang
                                $slbd = 5; // so luong bai dang moi trang
                                $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                                settype($page, "int");
                                $offset = ($page - 1) * $slbd;
                                $sp2 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp = '$uidkh' ");
                                $tongsp = mysqli_num_rows($sp2);
                                $num_page = ceil($tongsp / $slbd);
                                // end phan trang
                                $row_sp = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp = '$uidkh' ORDER BY `view_sp`.`id` DESC LIMIT $slbd OFFSET $offset ");
                                while($row_sp2=mysqli_fetch_array($row_sp)){
                                    $isfree3 = $row_sp2['free'];
                                ?> <li style="margin-left: 20px;">
                                    <form method="post" class="formaddvd1" > 
                                        <div> 
                                            <textarea type="text" maxlength="500" name="tenvid" ><?php echo $row_sp2['name']; ?></textarea> 
                                            <textarea type="text" maxlength="500" name="linkv1" ><?php echo $row_sp2['link']; ?></textarea> 
                                            <textarea type="text" maxlength="500" name="linkv2" ><?php echo $row_sp2['file']; ?></textarea>  
                                        </div> 
                                        <div style="display: flex; flex-direction: column; gap: 10px; align-items: center; justify-content: center; padding-right: 30px;" > 
                                        
                                            <select name="free03" required style="height: 32px;">
                                                <!-- nếu là trả phí thì hiện tra phi - miễn phí, ko thi hiện là miễn phí - tra phi -->
                                                <?php if ($isfree3 == 1) {
                                                    ?> <option value="1"> Free </option>
                                                    <option value="0"> Trả phí  </option> <?php
                                                } else { ?>
                                                <option value="0"> Trả phí </option>
                                                <option value="1"> Free </option>
                                                <?php } ?>
                                            </select>
                                        
                                            <button style="white-space: nowrap;" type="submit" value="<?php echo $row_sp2['id'];  ?>" name="suavid2"> Sửa video </button> 
                                            <a href="index.php?act=post_kh&sua=<?php echo $uidkh; ?>&soavd=<?php echo $row_sp2['id']; ?>" style="color:rgb(189, 16, 16);"> xóa </a> 
                                        </div>
                                    </form>  
                                </li>  

                                <?php } 
                                    if (isset($_POST['suavid2'])) {
                                        //sua vid
                                        $idvid2 = $_POST['suavid2'];
                                        $newname = $_POST['tenvid'];
                                        $newlink = $_POST['linkv1'];
                                        $newfile = $_POST['linkv2'];
                                        $new_loai = $_POST['free03'];

                                        $sqlz23 = "UPDATE `view_sp` SET name='$newname', of_sp ='$uidkh' , link = '$newlink', file = '$newfile' , free = '$new_loai'  WHERE id = '$idvid2' ";
                                            if ($conn->query($sqlz23) === TRUE) {
                                                header("Location: index.php?act=post_kh&sua=$uidkh&page=$page");
                                            } else {
                                                echo "Error";
                                            }
                                    }
                                    if(isset($_GET['soavd']) and $_GET['soavd'] != "" ){
                                        $idvd4 = $_GET['soavd']; 
                                        $sql301 = "DELETE FROM view_sp WHERE id='$idvd4'";
                                        if ($conn->query($sql301) === TRUE) {
                                            header("Location: index.php?act=post_kh&sua=$uidkh&page=$page");
                                        } else {
                                            echo "Error";
                                        }
                                    }
                                ?>

                                <div class="pt" style="margin-top: 22px;">
                                    <?php
                                        if($page > 3){
                                            ?>
                                                <a class = "pt_a" href="?act=post_kh&sua=<?php echo $uidkh;?>&page=1">First</a>
                                            <?php
                                        }
                                        for ($i=1; $i <= $num_page ; $i++) {
                                            if ($i != $page) {
                                                if($i > $page - 3 && $i < $page + 3){
                                                    ?> <a class = "pt_a" href="?act=post_kh&sua=<?php echo $uidkh;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                                }
                                            } else {
                                                ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                                            }
                                        }
                                        if($page < $num_page - 3){
                                            $end = $num_page;
                                            ?>
                                                <a class = "pt_a" href="?act=post_kh&sua=<?php echo $uidkh;?>&page=<?php echo $end; ?>">Last</a>
                                            <?php
                                        }
                                    ?>
                                </div>
                        </ol>

                    <?php
                    }
                }
            } else {
        ?>
            <div id="myForm">
                <a class="close_nav" onclick="closeForm()"> x </a>
                <form class="pop1231" method="post" enctype="multipart/form-data">  
                    <h4 style="margin: 0;"> Thêm thông tin cho khóa học </h4>
                    <a style="margin: 0; font-size: 14px;"> Chọn môn : </a>
                    <select name="mon" required style="height: 32px;">
                        <option value="1"> Toán </option>
                        <option value="2"> Lý </option>
                        <option value="3"> Anh </option>
                        <option value="4"> Hóa </option>
                        <option value="5"> CNTT </option>
                    </select>
                    <div>
                        <a style="margin: 0; font-size: 14px;"> Ảnh bìa (16:9) : </a>
                        <input type="file" name="fileupload" required/>
                    </div>
                    <a style="margin: 0; font-size: 14px;"> Tên khóa học : </a>
                    <input style="height: 32px;" type="text" maxlength="150" placeholder="[TỆP] - Tên khóa học" name="namekh" required>
                    <a style="margin: 0; font-size: 14px;"> Chuyên đề : </a>
                    <input style="height: 32px;" type="number" maxlength="150" placeholder="Chuyên đề(1-99)" name="cm" required>
                    <a style="margin: 0; font-size: 14px;"> Số lượng vid : </a>
                    <input style="height: 32px;" type="number" maxlength="150" placeholder="Số lượng video(1-999)" name="slvid" required>
                    <a style="margin: 0; font-size: 14px;"> Giá tiền : </a>
                    <input style="height: 32px;" type="number" maxlength="150" placeholder="Giá tiền(1k-9,9tr)" name="gia" required>
                    <a style="margin: 0; font-size: 14px;"> Mô tả : </a>
                    <textarea style="height: 82px;" maxlength="500" placeholder="<li> Mô tả </li>" name="mota" required></textarea>
                    <input style="height: 32px;"  type="submit" value="ĐĂNG" name="pskh1">
                </form>
            </div>

        <div style="display: flex; flex-direction: column; align-items: center;">
            <div class="adkhbtn132">
                <a href="#" style="color: white;"  onclick="openForm()" > <i class="fa-solid fa-plus"></i> Thêm Khóa Học </a>
                <!-- popup len -->
            </div>
            <br>
                <?php 
                    $slbd = 5; // so luong bai dang moi trang
                    $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                    $offset = ($page - 1) * $slbd;
                    $sp_030 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_gv = '$tk02'");
                    $tongsp = mysqli_num_rows($sp_030);
                    $num_page = ceil($tongsp / $slbd);
                    if($tongsp > 0) {
                        $row_post30 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_gv = '$tk02'  ORDER BY `sp`.`id_sp` DESC LIMIT $slbd OFFSET $offset ");
                        while ($showpost_30 = mysqli_fetch_array($row_post30)) { 
                ?>

            <div class="sp_pding1" style="background-color: rgb(225, 225, 225); width: fit-content;">
                <img src="img/stimg/<?php echo $showpost_30['img']; ?>" style=" width: 188px ; height: auto;">
                <div class="main_sp_pding">
                    <a class="sp_tde3"  style="text-decoration: none; color: black;" href="index.php?act=view_vid&id_vid=<?php echo $showpost_30['id_sp']; ?>"> <?php echo $showpost_30['name']; ?> </a>
                        <div class="col_a2" style="padding-bottom: 5px; white-space: nowrap; padding: 0 5px 1px 0; ">
                            <a><i class="fa-solid fa-tag"></i> Chuyên đề: <?php echo $showpost_30['chuyen_de']; ?> </a>
                            <a><i class="fa-solid fa-circle-play"></i> Bài giảng: <?php echo $showpost_30['sl_vd']; ?> </a>
                            <h6 class="price_sp1" style="margin: 0; text-decoration: underline;">  Giá: <em> <?php echo $showpost_30['gia']; ?> </em> </h6>
                        </div>
                        <div class="btn_adsp" style="white-space: nowrap;">
                            <a href="index.php?act=post_kh&sua=<?php echo $showpost_30['id_sp']; ?>" style="padding: 0px 10px; border: 1px solid rgba(0, 0, 0, 0.623);"> <i class="fa-solid fa-gears"></i> Chỉnh sửa chung  </a>
                            <a href="index.php?act=post_kh&xoa=<?php echo $showpost_30['id_sp']; ?>"> Xóa <i class="fa-solid fa-trash"></i> </a>
                        </div>
                </div>
            </div>
            <!-- end hien thi quan li khoa hoc cho giao vien -->
            <?php 
                }
            } else {
                ?> <h3> Bạn chưa có khóa học nào ! </h3> <?php
            } ?>

            <div class="pt">
                <?php
                    if($page > 3){
                        ?>
                            <a class = "pt_a" href="?act=post_kh&page=1">First</a>
                        <?php
                    }
                    for ($i=1; $i <= $num_page ; $i++) {
                        if ($i != $page) {
                            if($i > $page - 3 && $i < $page + 3){
                                ?> <a class = "pt_a" href="?act=post_kh&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                            }
                        } else {
                            ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                        }
                    }
                    if($page < $num_page - 3){
                        $end = $num_page;
                        ?>
                            <a class = "pt_a" href="?act=post_kh&page=<?php echo $end; ?>">Last</a>
                        <?php
                    }
                ?>
            </div>
            
        </div>
            <?php } ?>    <!-- nd1 -->
    </div>

    <br>

</div>


<?php
// them khoa hoc
        if(isset($_POST['pskh1'])){
            // lay du lieu chu
            $mon1 = $_POST['mon'];
            $tenkh = $_POST['namekh'];
            $chde = $_POST['cm'];
            $slvid = $_POST['slvid'];
            $gia1 = $_POST['gia'];
            $mota1 = $_POST['mota'];
            // add anh vao db
                                    $target_dir = "img/stimg/";
                                    $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);
                                    $allowUpload   = true;
                                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                    $maxfilesize   = 5200000;
                                    $allowtypes    = array('jpg', 'png', 'jpeg');
                                    $name_img = basename( $_FILES["fileupload"]["name"]);
                                    $ustk = $_SESSION['user'];
                                    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                                    if (!isset($_FILES["fileupload"])) {
                                        echo "Dữ liệu không đúng cấu trúc";
                                        $allowUpload = false;
                                        die;
                                    } elseif($_FILES["fileupload"]['error'] != 0){
                                        echo "Dữ liệu upload bị lỗi";
                                        $allowUpload = false;
                                        die;
                                        // phan nay kiem tra du lieu anh
                                } else{
                                    //phan nay kiem tra dinh dang anh
                                        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                                    if($check !== false) {
                                        $allowUpload = true;
                                        if(file_exists($target_file)){
                                            echo "Tên không hợp lệ, sửa lại tên.";
                                            $allowUpload = false;
                                        } elseif($_FILES["fileupload"]["size"] > $maxfilesize){
                                            echo "dung lượng quá lớn.";
                                            $allowUpload = false;
                                        } elseif (!in_array($imageFileType,$allowtypes) ){
                                            echo "Sai định dạnh hình ảnh.";
                                            $allowUpload = false;
                                        } else{
                                            if ($allowUpload) {
                                                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                                                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                                                        // add vao db ten anh, noi dung kh
                                                        $run4 = mysqli_query($conn, "INSERT INTO sp (name, img, of_dm, of_gv, mota, chuyen_de, sl_vd, gia) VALUES ('$tenkh','$name_img','$mon1','$tk02','$mota1','$chde','$slvid','$gia1')  ");
                                                        header("Location: index.php?act=post_kh");
                                                }
                                                else {
                                                    echo "Lỗi !";
                                                }
                                            }
                                            else {
                                                echo "Lỗi !";
                                            }
                                        }
                                    }
                                    else {
                                        echo "Không phải file ảnh.";
                                        $allowUpload = false;
                                    }
                                }   
            // insert vao db 

        }

        // end them khoa hoc

        // begin soa bai viet
        if (isset($_GET['xoa']) and $_GET['xoa'] != "" ) {
            $idsoa = $_GET['xoa'];
            $sp5 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_gv = '$tk02' AND id_sp = '$idsoa' ");
            $soa5 = mysqli_num_rows($sp5);
            $showanh1 = mysqli_fetch_array($sp5);
            $anhcuaid = $showanh1['img'];
            $target_dir2 = "img/stimg/";
            $status3 = unlink($target_dir2.basename($anhcuaid));
            if ($soa5 == 1) {
                $soasp12 = " DELETE FROM `view_sp` WHERE of_sp = '$idsoa' ";
                $soamua1 = " DELETE FROM `mua_sp` WHERE of_sp = '$idsoa' ";
                if( ($conn->query($soasp12)===true) and ($conn->query($soamua1)===true) ) {
                    $soa14 = mysqli_query($conn, " DELETE FROM sp  WHERE of_gv = '$tk02' AND id_sp = '$idsoa' ");
                    header("Location: index.php?act=post_kh&page=$page");
                }
                // soa trong view sp truoc da trong view sp xem slvd la bao nhieu
            } 
        }
        // end soa bai viet

        
    } else {
            header("Location: index.php?act=log");
        }
    } else {
        header("Location: index.php?act=log");
    }
?>
