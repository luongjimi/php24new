<?php    
    $tk2 = $_SESSION['user'];
    $row0013 = mysqli_query($conn," SELECT * FROM user WHERE email = '$tk2' ");
    $count04 = mysqli_fetch_array($row0013);
    $tk02 = $count04['id_us'];
    
?>