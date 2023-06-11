<?php
session_start();
ob_start();
include "db.php";

//ngay het han cua tat ca san pham trong cua hang

include "view/top.php";


if (isset($_GET['act']) and $_GET['act'] != "" ) {
    switch ($_GET['act']) {

        case 'cart':
            include "mod/gio_hang.php";
            break;

        case 'home':
            include "mod/home.php";
            break;
            
        case 'sub':
            include "mod/sub.php";
            break;

        case 'post':
            include "mod/post.php";
            break;

        case 'gv':
            include "mod/gv.php";
            break;

        case 'lien_he':
            include "mod/lien_he.php";
            break;
        
        case 'log':
            include "mod/log.php";
            break;

        case 'reg':
            include "mod/reg.php";
            break;

        case 'user':
            include "mod/user.php";
            break;

        case 'out':    
            unset($_SESSION['user']);
            header("Location: index.php");
            break;
        
        case 're_pw':
            include "mod/re_pw.php";
            break;

        case 'ver_us':
            include "mod/ver_us.php";
            break;

        case 'view_vid':
            ?> <div class="main2"> <?php
            include "mod/view_sub.php";
            ?> </div> <?php
            break;

        case 'gio_hang':
            include "mod/gio_hang.php";
            break;

        case 'view_post':
            include "mod/view_post.php";
            break;

        case 'post_kh':
            include "mod/addkh.php";
            break;
            
        case 'dk':
            include "mod/dk.php";
            break;  

        case 'api':
            include "thanhtoan/thanhtoan.php";
            break;  
            
    }
} else {
    include "mod/home.php";
}

include "view/bot.php";


?>


