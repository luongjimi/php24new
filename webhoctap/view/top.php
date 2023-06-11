<!DOCTYPE html>
<html lang="vi">
<head>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://a1training.rf.gd/" />
    <meta property="og:title" content="Trang web học trực tuyến !" />
    <meta property="og:description" content=" Tham gia cộng đồng học tập nào..." />
    <meta property="og:locale" content="vi_VN" />
    <meta property="fb:app_id" content="1161533287858178" /> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1-Training</title>
    <link rel="icon" property="og:image"  href="img/stimg/logo.png">
    <link rel="stylesheet" href="view/stt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>    
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>   
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script async src="https://cse.google.com/cse.js?cx=24fed6390e1fb48c8"></script>
    
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1161533287858178',
      xfbml      : true,
      version    : 'v16.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=1161533287858178&autoLogAppEvents=1" nonce="sfBKNYc6"></script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63dddd704742512879116982/1godai1bu';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- ajax phan trang  -->
<script>
    var addtrang = 1;
    $(document).ready(function(){
          $("#xem_them").click(function() {
                addtrang =   addtrang + 1;
              $.get("cont/ajax_show_fler.php", {trang_fler:addtrang, id_us:<?php echo $_GET['id_us']; ?> }, function(data){
                  $("#danhsach_us").append(data);
              });
          });
      });

    $(document).ready(function(){
          $("#xem_them2").click(function() {
                addtrang =   addtrang + 1;
              $.get("cont/ajax_show_flw.php", {trang_fler:addtrang, id_us:<?php echo $_GET['id_us']; ?> }, function(data){
                  $("#danhsach_us2").append(data);
              });
          });
      });

</script>

    <div class = "top">
        <i id="nav_open" class="fa-solid fa-bars" onclick="opennav()"></i>      
        <div class="dm_top1">
            <a href="index.php?act=home"><img src="img\stimg\logo1.png" width="112px" height="78px" /></a>
            <ul class="dm_top2">
                <?php if (isset($_GET['act']) and $_GET['act'] == "sub"){
                    ?> <li><a class = "a_visit">Khóa học</a></li> <?php
                } else { ?>
                    <li><a href="index.php?act=sub">Khóa học</a></li>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "post"){   
                    ?> <li><a class = "a_visit">Cộng đồng</a></li> <?php
                } else { ?>
                <li><a href="index.php?act=post">Cộng đồng</a></li>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "gv") { ?>
                    <li><a class = "a_visit">Giáo viên</a></li>
                <?php } else { ?>
                <li><a href="index.php?act=gv&col=1">Giáo viên</a></li>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "dk") { ?>
                <li><a class = "a_visit">Điều khoản</a></li>
                <?php } else { 
                    ?> <li><a href="index.php?act=dk">Điều khoản</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="dm_top3">
            <a href="#" onclick="openForm3()"><i class="fa-solid fa-magnifying-glass"></i></a>
            <div class="dm_top4">
                <a href="#" > <i class="fa-solid fa-user"></i> </a>
                <a class="nut_drop" onclick="userDown()">Tài khoản</a>
                    <div class="nd_us_top">
                        <?php 
                        if (isset($_SESSION['user']) and $_SESSION['user'] != "") {
                            //check xem co phai gv ko
                            $check_cad_gv = $_SESSION['user'];
                            $rows1z0 = mysqli_query($conn," SELECT * FROM user WHERE email = '$check_cad_gv' AND (cad = 2 OR cad = 1)");
                            $sl1z = mysqli_num_rows($rows1z0);
                            include "cont/lay_id_us.php";
                            ?>
                                <a href="index.php?act=user&id_us=<?php echo $tk02; ?>">Hồ sơ</a>
                                <a href="index.php?act=cart">Giỏ hàng</a>
                                <?php if($sl1z == 1 ){ ?>
                                <a href="index.php?act=post_kh"> Khóa học </a>
                                <?php } ?>
                                <a href="index.php?act=out">Đăng xuất</a>
                            <?php
                        } else { 
                            ?> 
                                <a href="index.php?act=log">Đăng nhập</a>
                                <a href="index.php?act=reg">Đăng kí</a>
                            <?php 
                        } 
                        ?>
                    </div>
            </div>
        </div>
    </div>
    <div id="side" class="side-nav">
        <p class="close_nav" onclick="closenav()">x</p>
        <img src="img\stimg\logo1.png" width="112px" height="78px" style="margin: 15px auto;" />
        <?php
                if (isset($_GET['act']) and $_GET['act'] == "home"){
                    ?> <a class = "a_nav">Trang chủ</a> <?php
                } else {
                    ?> <a class="side-a" href="index.php?act=home">Trang chủ</a> <?php
                } if (isset($_GET['act']) and $_GET['act'] == "sub"){
                    ?> <a class = "a_nav">Khóa học</a> <?php
                } else { ?>
                    <a class="side-a" href="index.php?act=sub">Khóa học</a>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "post"){
                    ?> <a class = "a_nav">Cộng đồng</a> <?php
                } else { ?>
                    <a class="side-a" href="index.php?act=post">Cộng đồng</a>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "gv") { ?>
                    <a class = "a_nav">Giáo viên</a>
                <?php } else { ?>
                    <a class="side-a" href="index.php?act=gv&col=1">Giáo viên</a>
                <?php } if (isset($_GET['act']) and $_GET['act'] == "dk") { ?>
                    <a class = "a_nav">Điều khoản</a>
                <?php } else { 
                    ?> <a class="side-a" href="index.php?act=dk">Điều khoản</a>
                <?php } 
        ?>
    </div>

    <div id="myForm2">
        <a class="close_nav" onclick="closeForm3()"> x </a>
        <div style="max-width: 720px; margin: 20px auto; height: 90%; overflow: scroll;"> <div class="gcse-search"></div> </div>
    </div>