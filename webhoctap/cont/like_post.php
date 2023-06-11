<?php
session_start();
ob_start();
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body  style="margin: 0; padding: 0;">
  <?php 
    if(isset($_GET['id_post']) and $_GET['id_post'] != ""){
      if(isset($_GET['us_like']) and $_GET['us_like'] != ""){
        $id_post = $_GET['id_post'];
        $us_tym = $_GET['us_like'];
          $row_tym = mysqli_query($conn,"SELECT * FROM `tym_post` WHERE us_tym = '$us_tym' AND of_post = '$id_post' ");
          $show_tym1 = mysqli_num_rows($row_tym); 
          if($show_tym1 > 0){
            ?> 
              <form method="post" style="margin:0; padding:0"> 
                <button style="cursor: pointer; border:none; background-color: #eeeeee ; font-size: 18px;" type="submit" name="un_tym" >❤️</button> 
              </form>
            <?php
            if(isset($_POST['un_tym'])){
              $del_tym = "DELETE FROM tym_post WHERE us_tym = '$us_tym' AND of_post = '$id_post' ";
              if($conn->query($del_tym)===true){
                // dem so luong tym cua bai viet
                $rows_tym = mysqli_query($conn," SELECT * FROM tym_post WHERE of_post = '$id_post' ");
                $sl_tym = mysqli_num_rows($rows_tym);
                $them_tym = mysqli_query($conn, " UPDATE post_us SET vote = '$sl_tym' WHERE id_post = '$id_post' ");
                header("Refresh:0");
              }
            }
          } else { ?>
            <form method="post"> 
                <button style="cursor: pointer;margin:4px 0 0 3px; border: none; background-color: #eeeeee; font-size: 18px;" type="submit" name="tym" ><i class="fa-regular fa-heart"></i></button> 
            </form> <?php
            if(isset($_POST['tym'])){
              $add_tym = "INSERT INTO `tym_post` (`us_tym`,`of_post` ) VALUES('$us_tym', '$id_post' )";
              if($conn->query($add_tym)===true){
                // dem so luong tym cua bai viet
                $rows_tym = mysqli_query($conn," SELECT * FROM tym_post WHERE of_post = '$id_post' ");
                $sl_tym = mysqli_num_rows($rows_tym);
                $them_tym = mysqli_query($conn, " UPDATE post_us SET vote = '$sl_tym' WHERE id_post = '$id_post' ");
                header("Refresh:0");
              }
            }
          }
      }
    }
  ?>
</body>
</html>
 
