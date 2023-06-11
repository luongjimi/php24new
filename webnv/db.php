<?php 
   date_default_timezone_set('Asia/Ho_Chi_Minh');
   $date = date('Y-m-d H:i:s');
   $now = strtotime($date);
   $date10 = date('Y-m-d');

   // connect database
   $conn = mysqli_connect("localhost","root","","webnv");
   mysqli_set_charset($conn, 'UTF8');
   // end connect database

?>