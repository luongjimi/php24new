
<?php
    if ( !isset($_GET['mon']) or $_GET['mon'] == "" ) {
        header ("Location: index.php?act=sub&mon=1&loc=new");
    }
    $id = $_GET['mon'];
    // phan trang
    $slbd = 5; // so luong bai dang moi trang
    $page = !empty($_GET['page'])?$_GET['page']:1; //trang thu may ?
    settype($page, "int");
    $offset = ($page - 1) * $slbd;
    $sp2 = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ");
    $tongsp = mysqli_num_rows($sp2);
    $num_page = ceil($tongsp / $slbd);
    // end phan trang
?>

<div class="main2">

        <div class="dm_scroll_sub">
            <?php
                $row_dm4 = mysqli_query($conn,"SELECT * FROM `dm_sp` ");
                while($row_dm5=mysqli_fetch_array($row_dm4)){
                    $row_dm6 = $row_dm5['id_dm'];
                if(isset($_GET['mon']) and $_GET['mon'] == $row_dm6 ){
                ?> <a href="#" class="sub_dm_visit" style="color: black;"> <?php echo $row_dm5['ten']; ?> </a> <?php } 
                else {
                    ?> <a href="index.php?act=sub&mon=<?php echo $row_dm6 ?>" class = "sub_dm_a"> <?php echo $row_dm5['ten']; ?> </a> <?php
                }
                }
            ?> 
        </div>

    <div class="sub">
    
    <div class="sub_dm">
        <h3> Danh Mục </h3>
        <?php 
            $row_dm = mysqli_query($conn,"SELECT * FROM `dm_sp` ");
            while($row_dm2=mysqli_fetch_array($row_dm)){
                $row_dm3 = $row_dm2['id_dm'];
                if(isset($_GET['mon']) and $_GET['mon'] == $row_dm3 ){
                ?> <a href="#" class="sub_dm_visit"> <?php echo $row_dm2['ten']; ?> </a> <?php } 
                else {
                    ?> <a href="index.php?act=sub&mon=<?php echo $row_dm3 ?>" class = "sub_dm_a"> <?php echo $row_dm2['ten']; ?> </a> <?php
                }
            }
        ?> 
    </div>

    <div class="sub_sp">

        <div class = "loc_sp"> 
            <h3> Khóa Học Nổi Bật ! </h3>
            <div class="loc_sp3">
                <a class="loc_sp3_a">Lọc theo <i class="fa-solid fa-caret-down"></i></a>
                <div class="loc_sp2">
                <?php if(isset($_GET['loc']) and $_GET['loc'] == "new" ){
                        ?> <a class="loc_sp2_a_visit"> Mới nhất </a> <?php 
                    } else {
                        ?> <a href="index.php?act=sub&mon=<?php echo $_GET['mon']; ?>&loc=new"> Mới nhất </a> <?php
                    } if(isset($_GET['loc']) and $_GET['loc'] == "old" ){
                        ?> <a class="loc_sp2_a_visit"> Cũ nhất </a> <?php 
                    } else {
                        ?> <a href="index.php?act=sub&mon=<?php echo $_GET['mon']; ?>&loc=old"> Cũ nhất </a> <?php
                    } if(isset($_GET['loc']) and $_GET['loc'] == "low" ){
                        ?> <a class="loc_sp2_a_visit">  Giá thấp -> cao </a> <?php 
                    } else {
                        ?> <a href="index.php?act=sub&mon=<?php echo $_GET['mon']; ?>&loc=low"> Giá thấp -> cao </a>  <?php
                    } if(isset($_GET['loc']) and $_GET['loc'] == "hight" ){
                        ?> <a class="loc_sp2_a_visit"> Giá cao -> thấp </a> <?php 
                    } else {
                        ?> <a href="index.php?act=sub&mon=<?php echo $_GET['mon']; ?>&loc=hight"> Giá cao -> thấp </a>  <?php
                    }
                ?>
                </div>
            </div>
        </div>     
            <!-- PHAN HIEN THI NOI BAT VA DANH SACH KHOA HOC -->
        <div class="flex_sp">
            <?php if(isset($_GET['loc']) and $_GET['loc'] != "") { 
                        switch ($_GET['loc']) {
                            case 'old':
                                $row_sp = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ORDER BY `sp`.`id_sp` ASC LIMIT $slbd OFFSET $offset ");
                                break;
                            
                            case 'new':
                                $row_sp = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ORDER BY `sp`.`id_sp` DESC LIMIT $slbd OFFSET $offset ");
                                break;

                            case 'low':
                                $row_sp = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ORDER BY `sp`.`gia` ASC LIMIT $slbd OFFSET $offset ");
                                break;
                            
                            case 'hight':
                                $row_sp = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ORDER BY `sp`.`gia` DESC LIMIT $slbd OFFSET $offset ");
                                break;
                        }
                    } else {
                        $row_sp = mysqli_query($conn,"SELECT * FROM `sp` WHERE of_dm = '$id' ORDER BY `sp`.`id_sp` DESC LIMIT $slbd OFFSET $offset ");
                    }
            while($row_sp2=mysqli_fetch_array($row_sp)){
                ?>
                    <div class="col" >
                    
                        <img class="col_img" src="img/stimg/<?php echo $row_sp2['img']; ?>" />
                        <div class="col2">
                            <a class="col_a1" href="index.php?act=view_vid&id_vid=<?php echo $row_sp2['id_sp'] ?>"> <?php echo $row_sp2['name']; ?> </a>
                            <a style="font-size: 16px; padding-left: 8px;"><i class="fa-solid fa-user"></i> Giáo viên: <em> <?php
                                $row_name = $row_sp2['of_gv'];
                                $row_gv = mysqli_query($conn,"SELECT * FROM `user` WHERE id_us = '$row_name' ");
                                $row_gv2=mysqli_fetch_array($row_gv);
                                echo $row_gv2['name'];
                            ?></em></a>
                            <div class="col_a2">
                                <a><i class="fa-solid fa-tag"></i> Chuyên đề: <?php echo $row_sp2['chuyen_de']; ?> </a>
                                <a><i class="fa-solid fa-circle-play"></i> Bài giảng: <?php echo $row_sp2['sl_vd']; ?> </a>
                            </div>
                            <div class = "col_a3"> 
                                
                                <a><i class="fa-solid fa-money-check-dollar"></i>  Giá: <?php echo $row_sp2['gia']; ?>đ</a>
                            </div>
                            <a href="index.php?act=view_vid&id_vid=<?php echo $row_sp2['id_sp'] ?>" class="col_a4"> Xem Chi Tiết </a>
                        </div>
                    </div>
                
                <?php
            }
            ?>
        </div>

        <div class="pt" style="margin-top: 22px;">
            <?php
                if($page > 3){
                    ?>
                        <a class = "pt_a" href="?act=sub&mon=<?php echo $id;?>&page=1">First</a>
                    <?php
                }
                for ($i=1; $i <= $num_page ; $i++) {
                    if ($i != $page) {
                        if($i > $page - 3 && $i < $page + 3){
                            ?> <a class = "pt_a" href="?act=sub&mon=<?php echo $id;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                        }
                    } else {
                        ?> <a class = "pt_visit"> <?php echo $i; ?></a> <?php
                    }
                }
                if($page < $num_page - 3){
                    $end = $num_page;
                    ?>
                        <a class = "pt_a" href="?act=sub&mon=<?php echo $id;?>&page=<?php echo $end; ?>">Last</a>
                    <?php
                }
            ?>
        </div>
    </div>

    </div>
</div>