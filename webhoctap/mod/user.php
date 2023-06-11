<?php
       // co id roi thi lay ten, anh ,....
        if (isset($_GET['id_us']) and $_GET['id_us'] != "") {
            $tk332 = $_GET['id_us'];
            $row333 = mysqli_query($conn," SELECT * FROM user WHERE id_us = '$tk332' ");
            $cidus = mysqli_num_rows($row333);
            if ($cidus > 0 ) {
            $count044 = mysqli_fetch_array($row333);
            // lay gia tri
            $user_mail1 = $count044['email'];
            $tk012 = $count044['id_us'];
            $anhdg = $count044['img'];
            $ten_us = $count044['name'];
            $quyen = $count044['cad']; //cad = 2 la giao vien -> chuc nang them khoa hoc
            $fler = $count044['fler'];
            $flw = $count044['flw'];
            $gthieu_us = $count044['mota'];
?>
        <div class="user">

                                    <div id="qly_us2">
                                        <a class="close_nav" onclick="myFunction02()"> x </a>
                                        <div class="setting_us2">   
                                        <p style="margin: 0 0 10px 0; white-space: nowrap;"> Lý do bạn tố cáo : <em> <?php echo $ten_us; ?> </em> </p>
                                        <a style=" font-size:12px; font-weight: 500"> 
                                        <?php if(isset($_POST['tocao']) and $_GET['id_us'] != "" ){
                                            $tk_bi_rp = $_GET['id_us'];
                                            $nd_rp = htmlspecialchars($_POST['nd_tocao']);
                                            if (isset($_SESSION['user']) and $_SESSION['user'] != "" ) {
                                                $us_tocao = $_SESSION['user'];
                                                $rows23w0 = mysqli_query($conn," SELECT * FROM tocao WHERE  user = '$us_tocao' AND rp_us = '$tk_bi_rp' ");
                                                $sl1w3 = mysqli_num_rows($rows23w0);
                                                if ($sl1w3 > 2) {
                                                    echo "Bạn đã tố cáo tài khoản này trước đó rồi";
                                                } else {
                                                    if(strlen($nd_rp) > 10 ){
                                                        $sql3z09 = "INSERT INTO `tocao` (`user`,`rp_us`,`noi_dung` ) VALUES('$us_tocao', '$tk_bi_rp', '".$nd_rp."' )";
                                                        if($conn->query($sql3z09)===true) {
                                                        // su li don to cao
                                                        echo "Cảm ơn bạn đã gửi đơn tố cáo, chúng tôi sẽ sử lí xớm nhất có thể.";
                                                        }
                                                    } else {
                                                        echo "Vui lòng không spam thông tin";
                                                    }
                                                }
                                            } else {
                                                header("Location: index.php?act=log");
                                            }
                                        } ?> </a>
                                        <form method="post">
                                            <textarea maxlength="150" class="from_tocao" type="text" name="nd_tocao" placeholder="Nội dung + link vi phạm (150)" required></textarea> 
                                            <br>
                                            <input type="submit" name="tocao" value="Gửi">  
                                        </form>
                                        </div>
                                    </div>
                        <!-- hien thi nguoi dang fl id_us -->
                                    <div id="fler_us">
                                        <a class="close_nav" onclick="myFunction03()"> x </a>
                                        <div class="show_us_fl"> 
                                            <div id="danhsach_us" class="setting_us3">
                                                <?php 
                                                    $trvan0z1 = " SELECT * FROM `flw_us` WHERE fl_us = '$tk012' ORDER BY `flw_us`.`id_fl` DESC LIMIT 10 OFFSET 0 ";
                                                    $get_us0z1 = mysqli_query($conn, $trvan0z1);
                                                    while ($show_slz = mysqli_fetch_array($get_us0z1)) {
                                                        $id_us0z2 = $show_slz['user'];
                                                        $trvan0z3 = " SELECT * FROM `user` WHERE id_us = '$id_us0z2' ";
                                                        $get_us0z2 = mysqli_query($conn, $trvan0z3);
                                                        $show_02slz = mysqli_fetch_array($get_us0z2);
                                                        ?> 
                                                        <div class="cnt_img_fl">
                                                            <a href="index.php?act=user&id_us=<?php echo $show_02slz['id_us']; ?>"> <img src="img/usimg/<?php echo $show_02slz['img']; ?>" width="50px" height="50px"> </a>
                                                            <a href="index.php?act=user&id_us=<?php echo $show_02slz['id_us']; ?>"> <?php echo $show_02slz['name']; ?> </a>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div id="xem_them"> <a style="font-size: 16px; color: black; text-align: center;" href="javascript:void(0)"> <i class="fa-solid fa-angle-down"></i> </a> </div>
                                        </div>
                                    </div>
                        <!-- end hien thi nguoi dang ki id_us -->
                        <div id="fler_us2">
                            <a class="close_nav"  onclick="myFunction04()"> x </a>
                            <div class="show_us_fl"> 
                                <div id="danhsach_us2" class="setting_us3">
                                    <?php 
                                        $tr0z1 = " SELECT * FROM `flw_us` WHERE user = '$tk012' ORDER BY `flw_us`.`id_fl` DESC LIMIT 10 OFFSET 0 ";
                                        $get0z1 = mysqli_query($conn, $tr0z1);
                                        while ($showzw1 = mysqli_fetch_array($get0z1)) {
                                            $id0z2 = $showzw1['fl_us'];
                                            $trz03 = " SELECT * FROM `user` WHERE id_us = '$id0z2' ";
                                            $get0z2 = mysqli_query($conn, $trz03);
                                            $show02z = mysqli_fetch_array($get0z2);
                                        ?> 
                                            <div class="cnt_img_fl">
                                                <a href="index.php?act=user&id_us=<?php echo $show02z['id_us']; ?>"> <img src="img/usimg/<?php echo $show02z['img']; ?>" width="50px" height="50px"> </a>
                                                <a href="index.php?act=user&id_us=<?php echo $show02z['id_us']; ?>"> <?php echo $show02z['name']; ?> </a>
                                            </div>
                                        <?php
                                        }
                                    ?>  
                                    </div>
                                <div id="xem_them2"> <a style="font-size: 16px; color: black; text-align: center;" href="javascript:void(0)"> <i class="fa-solid fa-angle-down"></i> </a> </div>
                            </div>  
                        </div>
                        <!--  hien thi nguioi dung ma id_us dang folow  -->
                            
                <div class="bg_top"></div>
                <div class="user_top">
                    <div class="tt_us_top2">    
                        <div class="tt_us_top">    
                            <a href="#"><img src="img/usimg/<?php echo $anhdg; ?>" width="155px" height="155px"> </a>
                            <div class="fl_us_02">
                                <h2 class="ten_us"> <?php echo $ten_us; ?> </h2>
                                <div>
                                    <a href="#"> Follower: <?php echo $fler; ?> </a> <a style=" padding: 0 4px;"> • </a> <a href="#"> Following: <?php echo $flw; ?>  </a>
                                </div>
                            </div>
                        </div>

                        <div class="nd_tt_us">
                            <?php 
                            if (isset($_SESSION['user']) and $_SESSION['user'] == $user_mail1) {

                                ?>
                                <!-- sua anh dai dien  -->
                                <div id="qly_us">
                                        <a class="close_nav"  onclick="myFunction01()"> x </a>
                                        <div class="setting_us2">   
                                        <p style = "margin :0"> Đổi ảnh đại diện </p>
                                        <p style=" font-size:12px; font-weight: 500"><em>(max: 2mb /.jpeg/.jpg/.png)</em> <br> <?php include "cont/re_img.php"; ?> </p>
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="file" name="fileupload" required/>
                                            <br>
                                            <input type="submit" name="submit">
                                        </form>
                                        <br>
                                        <a href="index.php?act=re_pw"> Đổi mật khẩu </a>
                                        </div>
                                    </div>

                                    <!-- sua gioi thieu user -->

                                    <div id="qly_us4">
                                        <a class="close_nav"  onclick="myFunction05()"> x </a>
                                        <div class="setting_us2">   
                                            <p style="margin: 0 0 10px 0; white-space: nowrap; "> Sửa giới thiệu tài khoản: </p>
                                            <a style=" font-size:12px; font-weight: 500"> <em>
                                            <?php 
                                                if(isset($_POST['re_gt'])){
                                                    $nd_gt = htmlspecialchars($_POST['nd_gt']);
                                                    if ( strlen($nd_gt) > 2 ) {
                                                        $doitt_us = mysqli_query($conn, " UPDATE user SET mota = '$nd_gt' WHERE email = '$user_mail1' ");
                                                        echo "Đổi thông tin thành công";    
                                                    } else {
                                                        echo"vui lòng nhập đầy đủ thông tin";
                                                    }
                                                }
                                            ?>
                                            </em> </a>
                                            <form method="post" >
                                                <textarea maxlength="100" class="from_tocao" type="text" name="nd_gt" placeholder="Nội dung mới (100)" required ></textarea> 
                                                <br>
                                                <input type="submit" name="re_gt" value="Thay đổi">  
                                            </form>
                                        </div>
                                    </div>
 
                                    <!-- end sua gioi thieu user -->

                                    <button class="btn-fl" onclick="myFunction01()" > Quản lý tài khoản <i style="padding-left:8px;" class="fa-solid fa-gear"></i> </button>
                                <?php
                            } elseif(isset($_SESSION['user']) and $_SESSION['user'] != $user_mail1) {
                                $id_sesion = $_SESSION['user'];
                                $rows12 = mysqli_query($conn," SELECT * FROM user WHERE email = '$id_sesion' ");
                                $countz44 = mysqli_fetch_array($rows12);
                                $tkz12 = $countz44['id_us'];
                                // lay id cua sesion
                                 //check xem no fl chua? 
                                 $rows230 = mysqli_query($conn," SELECT * FROM flw_us WHERE  user = '$tkz12' AND fl_us = '$tk012' ");
                                 $sl13 = mysqli_num_rows($rows230);
                                 if($sl13 == 0){ ?>

                                    <form class="fl_user" method="post"> 
                                            <button type="submit" class="btn-fl" name="follow"> Theo dõi <i class="fa-solid fa-user-plus"></i></button> 
                                        </form>
                                        <button class="error_btn" onclick="myFunction02()"> Tố cáo <i class="fa-solid fa-circle-exclamation"></i></button>
                                    <?php
                                  }
                                 else {
                                    ?>
                                        <form class="fl_user" method="post"> 
                                            <button type="submit" class="btn-fl" name="un_follow"> Đang Theo dõi <i class="fa-solid fa-user-check"></i></button> 
                                        </form>
                                        <button class="error_btn" onclick="myFunction02()"> Tố cáo <i class="fa-solid fa-circle-exclamation"></i></button>
                                    <?php
                                 }
                            } else {
                                ?>
                                    <form class="fl_user" method="post"> 
                                            <button type="submit" class="btn-fl" name="follow"> Theo dõi <i class="fa-solid fa-user-plus"></i></button> 
                                    </form>
                                    <button class="error_btn" onclick="myFunction02()"> Tố cáo <i class="fa-solid fa-circle-exclamation"></i></button>
                                <?php
                            }
                                // dua vao db
                                if(isset($_POST['un_follow'])){
                                    //huy fl usid hien tai
                                    if (isset($_SESSION['user']) and $_SESSION['user'] != "" ) {
                                        $sql543 = "DELETE FROM flw_us WHERE user='$tkz12' AND fl_us = '$tk012' ";
                                        if($conn->query($sql543)===true){
                                            //dem so luong nguoi dang fl user do
                                        $rows20 = mysqli_query($conn," SELECT * FROM flw_us WHERE fl_us = '$tk012' ");
                                        $sl1 = mysqli_num_rows($rows20);
                                        $themfl1 = mysqli_query($conn, " UPDATE user SET fler = '$sl1' WHERE id_us = '$tk012' ");
                                        // dem so luong dang fl cua Session
                                        $rows220 = mysqli_query($conn," SELECT * FROM flw_us WHERE user = '$tkz12' ");
                                        $sl12 = mysqli_num_rows($rows220);
                                        $themfl2 = mysqli_query($conn, " UPDATE user SET flw = '$sl12' WHERE id_us = '$tkz12' ");
                
                                        header("Location: index.php?act=user&id_us=$tk012");
                                        //quay ve trang user m vao
                                        }
                                    } else {
                                        header("Location: index.php?act=log");
                                    }
                                } elseif (isset($_POST['follow'])) {
                                    if (isset($_SESSION['user']) and $_SESSION['user'] != "" ) {
                                         // them thg fl thg dang fl
                                        $sql309 = "INSERT INTO `flw_us` (`user`,`fl_us` ) VALUES('$tkz12', '$tk012' )";
                                        if($conn->query($sql309)===true) {
                                            //dem so luong nguoi dang fl user id hien tai
                                        $rows20 = mysqli_query($conn," SELECT * FROM flw_us WHERE fl_us = '$tk012' ");
                                        $sl1 = mysqli_num_rows($rows20);
                                        // dem so luong dang fl cua Session
                                        $rows220 = mysqli_query($conn," SELECT * FROM flw_us WHERE user = '$tkz12' ");
                                        $sl12 = mysqli_num_rows($rows220);
                                            if($sl1 >= 1000){
                                                header("Location: index.php?act=user&id_us=$tk012");
                                            } else {
                                                // them 1 nguoi fl vao idus hien tai
                                                $themfl2 = mysqli_query($conn, " UPDATE user SET fler = '$sl1' WHERE id_us = '$tk012' ");
                                            }
                                            if($sl12 >= 1000){
                                                header("Location: index.php?act=user&id_us=$tk012");
                                            } else {
                                                // them 1 dang follow vao session
                                                $themfl1 = mysqli_query($conn, " UPDATE user SET flw = '$sl12' WHERE id_us = '$tkz12' ");
                                            }
                                        header("Location: index.php?act=user&id_us=$tk012");
                                        //quay ve trang user m vao
                                        }
                                    } else {
                                        header("Location: index.php?act=log");
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                    <div class="tt_us3"> 
                        <a href="#baiviet"> Bài viết </a>
                        <a href="#gioithieu" > Giới thiệu </a>
                        <a href="#folower"> Người theo dõi </a>
                        <a href="#folowing"> Đang theo dõi </a>
                    </div>

                <div class="us_nd"> 
                    <div class="usnd2">

                        <div id="gioithieu"> 
                            <div class="gt002">
                            <h3> Giới thiệu  <i class="fa-solid fa-user-pen"></i> </h3>
                            <?php if(isset($_SESSION['user']) and $_SESSION['user'] == $user_mail1){
                                ?> <a href="javascript:void(0)" onclick="myFunction05()"> <em> sửa </em> </a> <?php
                            } ?>
                            </div>
                            <?php if ($gthieu_us == "") {
                                ?> <p style="color:black;"> Chưa có mô tả nào ! </p> <?php
                            } else { ?>
                            <p style="color:black;"> <?php echo $gthieu_us; ?> </p>
                            <?php } ?>
                        </div>

                        <div id="folower">
                            <div class="gt002">
                                <h3> Người theo dõi <i class="fa-solid fa-user-check"></i> </h3> 
                                <a href="javascript:void(0)" onclick="myFunction03()" > xem tất cả </a> 
                            </div>
                            
                                <?php 
                                // lay ra tat ca id_us dang fk us nay
                                    $row_spz1 = mysqli_query($conn,"SELECT * FROM `flw_us` WHERE fl_us = '$tk012' ORDER BY `flw_us`.`id_fl` DESC LIMIT 6 ");
                                    $sl12x = mysqli_num_rows($row_spz1);
                                    if($sl12x == 0){ 
                                        ?> <p style="color: black;"> Danh sách follower trống ! </p> <?php
                                    } else {
                                        ?>
                                            <div class="show_img_fl">
                                                <?php while($row_zsp2=mysqli_fetch_array($row_spz1)){ 
                                                    $id_us_fl01 = $row_zsp2['user'];
                                                    $row_spz3 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$id_us_fl01' ");
                                                    // lay ten va lay anh tu id
                                                    $row_zsp3=mysqli_fetch_array($row_spz3);
                                                ?>
                                                    <div class="show_img2">
                                                    <a href="index.php?act=user&id_us=<?php echo $row_zsp3['id_us'] ; ?>"> <img src="img/usimg/<?php echo $row_zsp3['img']; ?>" width="80px" height="80px" > </a>
                                                    <a href="index.php?act=user&id_us=<?php echo $row_zsp3['id_us'] ; ?>" style="font-size: 15px;"> <?php echo $row_zsp3['name']; ?> </a>
                                                    </div>
                                                <?php
                                                } ?>
                                            </div>
                                            <?php  } ?>
                        </div>

                        <div id="folowing">
                            <div class="gt002">
                                <h3> Đang theo dõi <i class="fa-solid fa-user-plus"></i></h3> 
                                <a href="javascript:void(0)" onclick="myFunction04()" > xem tất cả </a> 
                            </div>
                            
                                <?php 
                                // lay ra tat ca id_us dang fk us nay
                                    $row_spz1 = mysqli_query($conn,"SELECT * FROM `flw_us` WHERE user = '$tk012' ORDER BY `flw_us`.`id_fl` DESC LIMIT 6 ");
                                    $sl12x = mysqli_num_rows($row_spz1);
                                    if($sl12x == 0){ 
                                        ?> <p style="color: black;"> Danh sách following trống !</p> <?php
                                    } else {
                                        ?>
                                            <div class="show_img_fl">
                                                <?php while($row_zsp2=mysqli_fetch_array($row_spz1)){ 
                                                    $id_us_fl01 = $row_zsp2['fl_us'];
                                                    $row_spz3 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$id_us_fl01' ");
                                                    // lay ten va lay anh tu id
                                                    $row_zsp3=mysqli_fetch_array($row_spz3);
                                                ?>
                                                    <div class="show_img2">
                                                    <a href="index.php?act=user&id_us=<?php echo $row_zsp3['id_us'] ; ?>"> <img src="img/usimg/<?php echo $row_zsp3['img']; ?>" width="80px" height="80px" > </a>
                                                    <a href="index.php?act=user&id_us=<?php echo $row_zsp3['id_us'] ; ?>" style="font-size: 15px;"> <?php echo $row_zsp3['name']; ?> </a>
                                                    </div>
                                                <?php
                                                } ?>
                                            </div>
                                            <?php  } ?>
                        </div>
                    </div>
                    
                    <?php if(isset($_SESSION['user']) and $_SESSION['user'] == $user_mail1) { ?>
                    <div class="usnd3">
                        <div class="us_post">
                            <h4 class="post_top_us"> Tạo bài viết <i class="fa-solid fa-pen-to-square"></i> </h4>
                            <form method="post" style="font-size: 16px;" >
                                <input style="font-weight: 450;"  class="tde_post" type="text" maxlength="100" name="tieude1" placeholder="Tiêu đề câu hỏi <10 - 100>" required>
                                <textarea class="editor" data-editor="ClassicEditor" placeholder="Nôi dung câu hỏi <10 - 5000>" name="noi_dung_bai_dang"> </textarea>
                                <input class="btn_add_bv" type="submit" name="them_post_us" value="Gửi câu hỏi">    
                            </form>

                        </div>
                        <?php 
                        // them bai dang cua user vao db
                        // check xem 1 ngay toi da dang bao nhieu bai viet (10)
                        if (isset($_POST['them_post_us'])) {
                            $nd_cau_hoi = $_POST['noi_dung_bai_dang'];
                            $td_bv = htmlspecialchars($_POST['tieude1']);
                            $length_nd = strlen($nd_cau_hoi);
                            $length_td = strlen($td_bv);

                            $date_now = date('Y-m-d');
                            if ($length_nd >10 and $length_nd <5200 and $length_td > 10 )  {  
                                // them bai dang
                                $row_post1 = mysqli_query($conn,"SELECT * FROM `post_us` WHERE of_us = '$tk012' AND time_post = '$date_now' ");
                                $sl12ux = mysqli_num_rows($row_post1);
                                if($sl12ux < 8){
                                $sqlus11 = "INSERT INTO `post_us` (`noi_dung`, `time_post` , `of_us` , `tieu_de` ) VALUES ( '$nd_cau_hoi', '$date_now', '$tk012', ' ".$td_bv."' ) ";
                                $run_us1 = mysqli_query($conn, $sqlus11);
                                } else {
                                    ?>
                                    <script>
                                        alert("Bạn đang spam quá nhiều bài viết !");
                                    </script>
                                <?php
                                }
                            } else {
                                ?>
                                    <script>
                                        alert("Bài viết hoặc tiêu đề không đủ kí tự.");
                                    </script>
                                <?php
                            }
                        } 
                    }?>

                        <div id="baiviet">
                            <h3 class="show_baiviet">  Bài viết  <a class="line1"></a> </h3>
                            
                            <!-- bv cua usser -->
                            <?php $slbd = 4; // so luong bai dang moi trang
                            $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
                            $offset = ($page - 1) * $slbd;
                            $sp_030 = mysqli_query($conn,"SELECT * FROM `post_us` WHERE of_us = '$tk012' ");
                            $tongsp = mysqli_num_rows($sp_030);
                            $num_page = ceil($tongsp / $slbd);
                            // end phan trang
                            include "cont/go_back.php";
                            if($tongsp == 0){
                                ?> <p> Không có bài viết để hiển thị ! </p> <?php
                            } else {
                            $row_like30 = mysqli_query($conn,"SELECT * FROM `post_us` WHERE of_us = '$tk012' ORDER BY `post_us`.`id_post` DESC LIMIT $slbd OFFSET $offset ");
                            while ($showpost_30 = mysqli_fetch_array($row_like30)) { 
                                $us_of_like02 = $showpost_30['of_us'];
                                $row_us30 = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$us_of_like02' ");
                                $showus_30 = mysqli_fetch_array($row_us30);
                                ?>
                                <div class="post_us30">

                                    <a href="#"> <img src="img/usimg/<?php echo $showus_30['img']; ?>" width="52px" height="52px" style="border: 1px solid white;" > </a>

                                    <div class="nd_post_us30">

                                        <a href="#" style="color: black; font-size: 16px;"><em><?php echo $showus_30['name']; ?></em><a style="font-size: 12px; text-decoration: none; color: rgba(0, 0, 0, 0.559);"> <?php echo $showpost_30['time_post'] ?>  </a> </a>

                                        <div class="top_post_us30"> 
                                            <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="text-decoration: none; color: rgb(6, 7, 51);"> <h4 style="margin: 0;"> <?php echo $showpost_30['tieu_de']; ?> </h4> </a>
                                        </div>

                                        <div class="bottom_post_us30"> <?php
                                            if (isset($_SESSION['user']) and $_SESSION['user'] != "") { 
                                                ?>                          
                                            <iframe class="like_if" src="cont/like_post.php?id_post=<?php echo $showpost_30['id_post']; ?>&us_like=<?php echo $tk02; ?>" frameborder="0"></iframe>
                                            <?php } else {
                                            ?> <a href="index.php?act=log" style="text-decoration: none; color: black; margin-right: 12px;" > <i class="fa-regular fa-heart"></i> </a> <?php 
                                            } ?>
                                            <a style="margin-left: -20px; font-size: 16px;"><?php echo $showpost_30['vote']; ?></a>
                                            |
                                            <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&back=<?php echo $url; ?>" style="color: black; text-decoration: none; font-size: 15px;"> <i class="fa-regular fa-comment"></i> <?php echo $showpost_30['sl_cmt']; ?> Comments </a>
                                            <?php if(isset($_SESSION['user']) and $tk02 == $us_of_like02){
                                            ?> <a href="index.php?act=view_post&id_post=<?php echo $showpost_30['id_post']; ?>&add=soa&back=<?php echo $url; ?>" style="color: rgb(255, 0, 0); font-size: 14px;"> Xóa </a> <?php
                                            } ?>

                                        </div> 
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="pt">
                                    <?php
                                        if($page > 3){
                                            ?>
                                                <a class = "pt_a" href="?act=user&id_us=<?php echo $tk332; ?>&page=1">First</a>
                                            <?php
                                        }
                                        for ($i=1; $i <= $num_page ; $i++) {
                                            if ($i != $page) {
                                                if($i > $page - 3 && $i < $page + 3){
                                                    ?> <a class = "pt_a" href="?act=user&id_us=<?php echo $tk332; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                                                }
                                            } else {
                                                ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                                            }
                                        }
                                        if($page < $num_page - 3){
                                            $end = $num_page;
                                            ?>
                                                <a class = "pt_a" href="?act=user&id_us=<?php echo $tk332; ?>&page=<?php echo $end; ?>">Last</a>
                                            <?php
                                        }
                                    ?>
                                </div>

                            <?php } ?>
                            <!-- bv cua usser -->
                            
                        </div>
                    
                    </div>  

                </div>

        </div>
            <?php
        }
    } else {
        header ("Location: index.php?act=log");
    }
?>


<!--
        MAI PHAI LAM
    - sua loi khi like o post thi user khong hien la da like
 -->