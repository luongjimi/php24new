<?php
   session_start();
   ob_start();
   include "db.php";
   
   if(isset($_SESSION['acc_run']) and $_SESSION['acc_run'] != ""){
      $sdt1 = $_SESSION['acc_run'];
      $sdt211 = mysqli_query($conn,"SELECT * FROM `tai_khoan` WHERE id_tk = '$sdt1' ");
      $shsdt121 = mysqli_fetch_array($sdt211);
      $sdt4 = $shsdt121['tt_tk'];
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Diblock.top - Trang làm việc online !</title>
   <link rel="icon" href="img/logo1.png" type="image/x-icon" />
   <link rel="stylesheet" href="view/st.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
   <div class="main">

      <div class="bar">
         <div class="bar_top">
            <div class="bar_top_left">
               <img src="img/logo2.png" height="54px" width="auto">
            </div>
            <div class="bar_top_right">
               <?php if (isset($_SESSION['user']) and $_SESSION['user'] != "" ) {
                   $tk = $_SESSION['user'];
                   $rowid = mysqli_query($conn," SELECT * FROM user WHERE email = '$tk' ");
                   $countid = mysqli_fetch_array($rowid);
                   $tk2 = $countid['uid'];
                   //check ban
                   if($countid['cad'] == 2) { header("location: index.php?act=out"); }
                     //auto dyet nv

                     $c_all_22 = mysqli_query($conn," SELECT * FROM `duyet_nv` WHERE `of_us` = '$tk2' AND `trang_thai` = 0 AND `het_han` < '$now'  ");
                           while ($c_all53 = mysqli_fetch_array($c_all_22)) {
                              $loai_nvd1211 = $c_all53['loai'];
                              $of_id_nv31 = $c_all53['id_nv'];

                               if($loai_nvd1211 == 1 or $loai_nvd1211 == 2){
                                 $cong_bn7  = 450;
                             } elseif($loai_nvd1211 == 3){
                                 $cong_bn7 = 650;
                             } elseif ($loai_nvd1211 == 4) {
                                 $cong_bn7 == 1600;
                             } elseif ($loai_nvd1211 == 5) {
                                 $cong_bn7 == 12000 ;
                             }
                                $tien_cho_212 =  $countid['re_money'];
                                $tienda_221 = $countid['money'];
                                $tru7 = $tien_cho_212 - $cong_bn7 ;
                                $cong7 = $tienda_221 + $cong_bn7 ;

                                $sql_cong_tien5 =  mysqli_query( $conn, "UPDATE `user` SET `re_money` = '$tru7' WHERE `uid` = '$tk2' " );
                                $sql_cong_tien6 =  mysqli_query($conn, "UPDATE `user` SET `money` = '$cong7' WHERE `uid` = '$tk2' ") ;
                                $sql_cong_tien7 =  mysqli_query( $conn, "UPDATE `duyet_nv` SET `trang_thai` = 1 WHERE `id_nv` = '$of_id_nv31' " );
                           }

                     
                     // auto duyet nv
                     ?> <a href="#"> <i style="font-size: 20px;" class="fa-regular fa-circle-user"></i> User<?php echo $tk2; ?> </a> <?php
                  } else { ?>
               <a href="index.php?act=log">Login</a>
               <a href="index.php?act=reg" class="hide_2">Sign up</a>  
               <?php } ?>
            </div>
         </div>
         
         <div class="side_bar">
            <a href="#" class="nd_bar" style="margin-left: 3px;"> <i class="fa-solid fa-bars" ></i> </a>
            <a href="index.php?act=home"> <div class="nd_icon"> <i class="fa-solid fa-house"></i>  <a class="nd_bar" href="index.php?act=home">Trang chủ</a> </div> </a>
            <a href="index.php?act=job"> <div class="nd_icon" style="margin-left: 3px;"> <i class="fa-solid fa-clipboard-list"> </i>  <a class="nd_bar" href="index.php?act=job">Nhiệm vụ</a> </div> </a>
            <a href="index.php?act=add_job&ch=1"> <div class="nd_icon">  <i class="fa-solid fa-circle-plus"></i>  <a class="nd_bar" href="index.php?act=add_job&ch=1">Tạo nhiệm vụ</a> </div> </a>
            <a href="index.php?act=wallet"> <div class="nd_icon">  <i class="fa-solid fa-wallet"></i>  <a class="nd_bar" href="index.php?act=wallet">Ví tiền</a> </div> </a>
            <a href="index.php?act=tk"><div class="nd_icon" style="margin-left: 2px;"> <i class="fa-solid fa-user"></i> <a class="nd_bar" href="index.php?act=tk">Tài khoản</a> </div> </a>
         </div>
      </div>

      <div class="content">
         <?php

            if (isset($_GET['act']) and $_GET['act'] != "" ) {
               switch ($_GET['act']) { 
                  case 'home':
                     include "mod/home.php";
                     break;

                  case 'log':
                     include "mod/log.php";
                     break;

                  case 'reg':
                     include "mod/reg.php";
                     break;

                  case 'tk':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                     include "mod/user.php"; } else {
                        header("Location: index.php");
                     } 
                     break;
                     
                  case 'view_job':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                           include "mod/view_job.php";
                      } else {
                        header("Location: index.php");
                     }
                     break;

                  case 'out':
                     unset($_SESSION['user']);
                     unset($_SESSION['acc_run']);
                     header("Location: index.php");
                     break;

                  case 'wallet':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                     include "mod/wallet.php"; } else {
                        header("Location: index.php");
                     }
                     break;
                     
                  case 're_pw':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                     include "mod/re_pw.php"; } else {
                        header("Location: index.php");
                     }
                     break;
         
                  case 'job':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                           include "mod/job.php";
                     } else {
                        header("Location: index.php");
                     }
                     break;

                  case 'add_job':
                     if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                     include "mod/add_nv.php"; } else {
                        header("Location: index.php");
                     }
                     break;

                     case 'duyet_job':
                        if (isset($_SESSION['user']) and $_SESSION['user'] != " " ) {
                        include "mod/duyet_nv.php"; } else {
                           header("Location: index.php");
                        }
                        break;


                     case 'admin':
                        if (isset($_SESSION['user']) and $_SESSION['user'] != " "  ) {
                           if($countid['cad'] == 1){
                              include "mod/admin.php"; 
                           }
                        } else {
                           header("Location: index.php");
                        }
                     break;
                  
               }

            } else {
               include "mod/home.php";
            }
         ?>
         
      </div>
      
   </div>

   <script src="view/ft.js"></script>
   <script>
     var addtrang = 1;
      $(document).ready(function(){
      $("#xemthem_lsu").click(function() {
            addtrang =   addtrang + 1;
            $.get("cont/ajax_wl.php", {trang_bn:addtrang, id_us:<?php echo $tk2; ?> }, function(data){
            $("#show_lsu123").append(data);
            });
         });
      });
   </script>
</body>
</html>
