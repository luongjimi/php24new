
        <?php include  "cont/dieu_huong.php"; 
        // sua lai phan video, nhung video free=1 thi cho xem, free=0 thi ko cho xem
        ?>
<div class = "view_sp1">
    <div class="ds_video">
        <p> Danh mục video  <i class="fa-solid fa-caret-down"></i></p>
        <ol>
    <?php
    //kiem tra xem no mua chua
    if(isset($_GET['id_vid']) and $_GET['id_vid'] != "" ) {
        $id=$_GET['id_vid'];
        $sqll1 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp ='$id'"); 
        while($row2=mysqli_fetch_array($sqll1)){
            if (isset($_GET['view_vid']) and $_GET['view_vid'] == $row2['id']) {
                ?> <li style="background-color: rgba(26, 90, 70, 0.603); border-radius: 5px; padding-left: 6px; font-size:16px;"> <?php echo $row2['name']; ?>  </li>  <?php
            } else {
                ?> <li> <a href="index.php?act=view_vid&id_vid=<?php echo $id; ?>&view_vid=<?php echo $row2['id']; ?>" > <?php echo $row2['name']; ?> </a> </li> <?php
            }
        }
    ?> 
        </ol>
    </div> 
    <div class = "view_vd">
        <?php
                //check xem $session['user'] mua san pham hay chua ? roi moi cho hien thi video
                if (isset($_GET['view_vid']) and $_GET['view_vid'] != "") {
                    $vid=$_GET['view_vid'];
                    $sqll2 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp = '$id' AND id = '$vid' ");

                    if($row3=mysqli_fetch_array($sqll2)){
                        $vdfree = $row3['free'];

                        if(isset($_SESSION['user']) and $_SESSION['user'] != "") {
                            $sp_hien_tai01 = $_GET['id_vid'];
                            $user01 = $_SESSION['user'];
                            $row5s = mysqli_query($conn," SELECT * from mua_sp where email = '$user01' and of_sp = '$sp_hien_tai01' and duyet = 1 ");
                            $count5 = mysqli_num_rows($row5s);
                        
                        if ($count5 == 1) {
                            include "cont/check_ug.php";
                            // kiem tra nguoi dung IP va UGNT
                            ?> 
                            <div class="container"> 
                                <iframe class="responsive-iframe" src="<?php echo $row3['link']; ?>"></iframe>
                            </div>
                                <br>
                                    <h3 style="margin-top: 0px;"> <?php echo $row3['name']; ?> </h3>
                                    <p> Link video phụ và file đề: <a class="file_de" href="<?php echo $row3['file']; ?>"> Click 👆 </a> </p>
                                    
                            <?php
                        } elseif($vdfree == 1) {
                            // neu day la video free thi cho xem
                            ?> 
                            <div class="container"> 
                                <iframe class="responsive-iframe" src="<?php echo $row3['link']; ?>"></iframe>
                            </div>
                                <br>
                                    <h3 style="margin-top: 0px;"> <?php echo $row3['name']; ?> </h3>
                                    <p> Link video phụ và file đề: <a class="file_de" href="<?php echo $row3['file']; ?>"> Click 👆 </a> </p>
                            <?php
                        } else {
                                ?>
                                <div class="chan_xem">
                                    <p> Xin lỗi, bạn chưa Thanh Toán để xem khóa học này ! <p>
                                </div>
                                <?php
                            }
                            
                        } else {
                            ?>
                                <div class="chan_xem">
                                    <p>  Xin lỗi, bạn chưa Đăng Nhập để xem khóa học này ! </p>
                                </div>
                            <?php
                        } 

                            ?>
                                <div class="dm_video_rpsv">
                                    <p> Danh mục video  <i class="fa-solid fa-caret-down"></i></p>
                                    <ol>
                                <?php
                                //kiem tra xem no mua chua
                                if(isset($_GET['id_vid']) and $_GET['id_vid'] != "" ) {
                                    $id=$_GET['id_vid'];
                                    $sqll1 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp ='$id'"); 
                                    while($row2=mysqli_fetch_array($sqll1)){
                                        if (isset($_GET['view_vid']) and $_GET['view_vid'] == $row2['id']) {
                                            ?> <li style="background-color: rgba(26, 90, 70, 0.603); border-radius: 5px; padding-left: 6px; font-size:16px;"> <?php echo $row2['name']; ?> </em> </li>  <?php
                                        } else {
                                        ?>
                                        <li> <a href="index.php?act=view_vid&id_vid=<?php echo $id; ?>&view_vid=<?php echo $row2['id']; ?>" > <?php echo $row2['name']; ?> </a> </li> 
                                        <?php
                                        }
                                    }
                                }
                                ?> 
                            </ol>
                        </div>
                    <?php
                } 
        } else {
            // hien thi thong tin san pham
            if(isset($_GET['id_vid']) and $_GET['id_vid'] != "") {
                $id_sanpham = $_GET['id_vid'];
                $sqll1 = mysqli_query($conn,"SELECT * FROM `sp` WHERE id_sp ='$id_sanpham' "); 
                    while($row2=mysqli_fetch_array($sqll1)){
                        $id_ofgv = $row2['of_gv'];
                        $sqll4 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us ='$id_ofgv' "); 
                        $row4=mysqli_fetch_array($sqll4);
                ?>
                <div class="nd_kh">
                    <div class="nd_kh2">
                        <img class="img_view_kh" style="border-radius: 8px;" src="img/stimg/<?php echo $row2['img']; ?>" width="510px" height="auto">

                        <h3 class="ten_kh02"> <?php echo $row2['name']; ?></h3>

                        <div class="nd_kh3">
                            
                                <div class="nd_kh4"> 
                                    <!-- lam phan user xong se sua -->
                                    <a href="#"> <img class="img_gv" src="img/usimg/<?php echo $row4['img']; ?>" width="54px" height="54px"> </a>
                                    <a href="#"><?php echo $row4['name']; ?></a>
                                </div>
                                <div class="nd_kh5">
                                    <a><i class="fa-solid fa-money-check-dollar"></i>  Giá: <?php echo $row2['gia'];?>đ </a>
                                </div>
                                <div class="nd_kh5">
                                    <a><i class="fa-solid fa-tag"></i> Chuyên đề: <?php echo $row2['chuyen_de'] ;?> </a>
                                    <a> <i class="fa-solid fa-circle-play"></i> Bài giảng: <?php echo $row2['sl_vd'] ;?> </a>
                                   
                                </div>
                            
                            <?php
                        if(isset($_SESSION['user'])){
                            $day_mua = date('Y-m-d H:i:s');
                            $user = $_SESSION['user'];
                            $sp_hien_tai = $_GET['id_vid'];

                            //check trong db xem user nay mua sp hay dang duyet hay chua mua
                            // 1 la da thanh toan
                            // 0 la cho thanh toan

                            $row2s = mysqli_query($conn," SELECT * from mua_sp where email = '$user' and of_sp = '$sp_hien_tai' and duyet = 1 ");
                            $count3 = mysqli_num_rows($row2s);

                            $row7s = mysqli_query($conn," SELECT * from mua_sp where email = '$user' and of_sp = '$sp_hien_tai' and duyet = 0 ");
                            $count7 = mysqli_num_rows($row7s);

                            if ($count3 == 1) {
                                ?> <a href="index.php?act=view_vid&id_vid=1&view_vid=1" class="btn_log" style="width:100%; text-decoration: none;  padding: 0 5px; display: flex; align-items: center; justify-content: center; gap:8px; "> <i class="fa-solid fa-play"></i>  Vào học thôi nào ! </a> <?php
                            } elseif($count7 == 1) {
                                ?> <a href="index.php?act=gio_hang" class="btn_log" style="width:100%; text-decoration: none; display: flex; align-items: center; justify-content: center; padding: 0 5px; "> Đã được thêm vào giỏ hàng  <i class="fa-solid fa-cart-arrow-down" style="padding-left:8px;"></i>  </a> <?php
                            } else {
                                ?> <form method="post"> <button type="submit" name="mua_sp" class="btn_log" style="width:100%;"> Mua khóa học <i class="fa-solid fa-cart-plus" style="padding-left:8px;"></i></button> </form> <?php
                                if(isset($_POST['mua_sp'])){
                                    $sql3 = "INSERT INTO mua_sp (email, of_sp, ngay_mua) VALUES ( '$user', '$sp_hien_tai' , '$day_mua') ";
                                    if($conn->query($sql3) === TRUE){
                                        header ("Location: index.php?act=gio_hang");
                                    } else {
                                        echo "Lỗi không xác định";
                                    }
                                }
                            }
                        } else {    
                            ?> <a href="index.php?act=log" class="btn_log" style="width:100%; text-decoration: none; display: flex; align-items: center; justify-content: center; "> Mua khóa học <i class="fa-solid fa-cart-plus" style="padding-left:8px;" ></i> </a> <?php
                        } ?>
                        </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="ten_kh01"> <?php echo $row2['name']; ?> </h2>
                        <ul> <strong>Mô tả:</strong> <em>
                            <?php echo $row2['mota']; ?>
                        </em></ul>
                </div>

                <?php 
                    }
                }
                ?>

                <div class="dm_video_rpsv">
                        <p> Danh mục video  <i class="fa-solid fa-caret-down"></i></p>
                        <ol>
                    <?php
                    // kiẻm tra xem no mua chua
                    if(isset($_GET['id_vid']) and $_GET['id_vid'] != "" ) {
                        $id=$_GET['id_vid'];
                        $sqll1 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE of_sp ='$id'"); 
                        while($row2=mysqli_fetch_array($sqll1)){
                            if (isset($_GET['view_vid']) and $_GET['view_vid'] == $row2['id']) {
                                ?> <li style="background-color: rgba(26, 90, 70, 0.603); border-radius: 5px; padding-left: 6px; font-size:16px;"> <?php echo $row2['name']; ?> </li>  <?php
                            } else {
                            ?>
                               <li> <a href="index.php?act=view_vid&id_vid=<?php echo $id; ?>&view_vid=<?php echo $row2['id']; ?>" > <?php echo $row2['name']; ?> </a> </li> 
                            <?php
                            }
                        }
                    }
                    ?> 
                        </ol>
                </div> 

            <!-- cmt gg -->
                <div id="cmt-fb-bg"> 
                    <div class="fb-comments" data-href="http://a1training.rf.gd/act=view_vid&id_vid=<?php echo $id; ?>" data-width="100%" data-numposts="6"></div>
                </div>
                    
            <?php
        }
    }
    ?>
    </div>
</div>
