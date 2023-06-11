<div class="dieuhg_trang">
    <em> 
        <a href="index.php"> <i class="fa-solid fa-house"></i> Trang chủ </a>
        <?php 
        // dieu huong trang cho phan khoa hoc

        if (isset($_GET['act']) and $_GET['act'] == "view_vid") {
            ?> / <a href="index.php?act=sub&mon=1&loc=new"> <i class="fa-solid fa-tag"></i> Khóa học </a> <?php
            // phan trang cho khoa hoc
            if (isset($_GET['id_vid']) and $_GET['id_vid'] != "" ) {
                $name_kh = $_GET['id_vid'];
                $sql5 = mysqli_query($conn,"SELECT * FROM `sp` WHERE id_sp ='$name_kh'"); 
                $count = mysqli_num_rows($sql5);
                if ($count == 1) {
                    $row5=mysqli_fetch_array($sql5);
                    $name_kh2 = $row5['name']; 
                    ?> / <a href="index.php?act=view_vid&id_vid=<?php echo $name_kh; ?>"> <i class="fa-solid fa-book"></i> <?php echo $name_kh2; ?> </a> <?php
                }

                if (isset($_GET['view_vid']) and $_GET['view_vid'] != "" ) {
                    $name_vid = $_GET['view_vid'];
                    $sql2 = mysqli_query($conn,"SELECT * FROM `view_sp` WHERE id ='$name_vid' "); 
                    $count2 = mysqli_num_rows($sql2);
                    if ($count2 == 1) {
                        $row2=mysqli_fetch_array($sql2);
                        $name_vid2 = $row2['name']; 
                        ?> / <a href="index.php?act=view_vid&id_vid=<?php echo $name_kh; ?>&view_vid=<?php echo $name_vid; ?>"> <i class="fa-solid fa-play"></i> <?php echo $name_vid2; ?> </a>  <?php
                    }
                }
            }
        }
        // end phan dieu huong cho khoa hoc

        ?>
    </em>
</div>