<div class="baner">
    <!-- paralax -->
    <img class="layer1" src="img/stimg/bg.png">
    <img class="layer2" src="img/stimg/meteor.png">
    <div class="layer3">
        <h2>Trang Học Trực Tuyến A1-Training</h2>
        <p>Luyện thi THPT cấp tốc cho khối A00-A01</p>
        <a href="#welcome"> Bắt Đầu <i style="margin-left: 6px;" class="fa-solid fa-caret-down"></i> </a>
    </div>
    <img class="layer4" src="img/stimg/4.png">
    <img class="layer5" src="img/stimg/5.png">
    <img class="layer6" src="img/stimg/6.png">

</div>
<script>
    let layer1 = document.querySelector('.layer1');
    let layer2 = document.querySelector('.layer2');
    let layer3 = document.querySelector('.layer3');
    let layer4 = document.querySelector('.layer4');
    let layer5 = document.querySelector('.layer5');

    window.onscroll = function(){
    let Y = window.scrollY;
    layer1.style.transform = 'translateY('+ Y/1.5 +'px)';
    layer2.style.transform = 'translateY('+ Y/1.5 +'px)';
    layer3.style.transform = 'translateY('+ Y/2.5 +'px)';
    layer4.style.transform = 'translateY('+ Y/1.2 +'px)';
    layer5.style.transform = 'translateY('+ Y/1.5 +'px)';

    };
</script>

<div id="welcome">
    <div class="main">

        <div class="gthieu01" data-aos="zoom-in" >
            <div class="gthieu002">
                <a href="#" style="color: red;"> <i class="fa-brands fa-youtube"></i> </a>
                <a href="#" style="color: rgb(1,102,255); text-decoration: none;"> <i class="fa-brands fa-discord"></i> </a>
                <a href="#" style="color: rgb(14, 14, 14);" > <i class="fa-brands fa-tiktok"></i></a>
                <a href="#" style="color: rgb(72,101,161);"> <i class="fa-brands fa-facebook-f"></i> </a>
                <a href="#" style="color: rgb(90, 153, 255); text-decoration: none;"> <h3 style="margin: -6px 0;"> z </h3></a>

            </div>
        
            <div style="align-items: center; width: 100%; margin: auto 10px; justify-content: center;">
                <form class="lhe_form" method="post">
                    <h3 style="color: black; margin: 0; padding-top: 5px ; text-align: center; ">  Tư vấn miễn phí <i class="fa-solid fa-angle-down"></i> </h3>
                    <input type="text" name="ten" placeholder="Tên Của Bạn" maxlength="40" required/>
                    <input type="text" name="ttlhe" maxlength="150"  placeholder="Thông tin liên hệ (Zalo,fb,...)" required/>
                    <select name="cachtv" style="height: 32px;" required>
                        <option> Chọn nền tảng </option>
                        <option value="zalo"> Zalo </option>
                        <option value="fb"> Facebook </option>
                        <option value="email"> Email </option>
                        <option value="sdt"> Phone </option>
                    </select>
                    <button type="submit" class="btn_log" style="width:100%; height: 38px; font-size: 18px;" name="guitt" > Gửi thông tin liên hệ </button> 
                    <p style="font-size: 12px ; color: black; margin: 0;"> Chúng tôi sẽ cố gắng liên hệ với bạn sớm nhất có thể ! </p>
                </form>    
                <?php 
                    if (isset($_POST['guitt'])) {
                        include "cont/check_ug.php";

                        $day2 = date('Y-m-d');
                        $nentang = $_POST['cachtv'];
                        $tenus = $_POST['ten'];
                        $thongtin = $_POST['ttlhe'];
                        $tt1 = mysqli_real_escape_string($conn, $tenus); 
                        $us1 = mysqli_real_escape_string($conn, $thongtin);

                        // kiem tra xem co nguoi dung nay chua (ugnt + 2/day)
                        $sql4 = mysqli_query($conn, " SELECT * FROM tu_van WHERE ugnt = '" . $check2 . "' AND tgian = '" . $day2 . "' " );
                        $sl21 = mysqli_num_rows($sql4);
                        if($sl21 >= 2){
                            ?> <script type="text/javascript"> alert("Cảm ơn bạn đã gửi thông tin !"); </script> <?php
                        } else {
                            $run4 = mysqli_query($conn, "INSERT INTO tu_van (name, tttv, loai, ugnt, tgian) VALUES ('$tt1', '$us1', '$nentang' , '$check2', '$day2') " );
                            ?> <script type="text/javascript" > alert("Cảm ơn bạn đã gửi thông tin !"); </script> <?php
                        }
                        
                    }
                ?>
            </div>
            <img src="img/stimg/gt01.png" title="https://vn.lovepik.com/" height="auto" width="75%" >   
        </div>

        <h3 style="text-align: center; margin: 25px 0 20px 0 ;"> Hoặc để lại comment ở đây  <i class="fa-solid fa-caret-down"></i>  </h3>

        <!-- cmt gg -->
        <div id="cmt-fb-bg">
            <div class="fb-comments" data-href="http://a1training.rf.gd/" data-width="100%" data-numposts="6"></div>
        </div>

        <h3 style="text-align: center; margin: 25px 0 25px 0 ;"> Về Chúng Tôi <i class="fa-solid fa-caret-down"></i>  </h3>

        <div data-aos="fade-up" data-aos-duration= "1000" class="cardd" >
            <div class="card1">  
                <i class="fa-solid fa-users-viewfinder"></i>
                <a> Tham Gia Cộng Đồng Học Tập </a> 
                <a class="carda1" href="index.php?act=post"> Join ! </a>
            </div>

            <div class="card2"> 
                <i class="fa-solid fa-chalkboard-user"></i>
                <a> Các Giáo Viên Hoạt Động Tại A1-Training </a> 
                <a class="carda1" href="index.php?act=gv"> View ! </a>
            </div>
        </div>

        <div style = " display: flex; align-items: center; justify-content: center; margin: 35px 10px 15px 10px ; gap: 20px; flex-wrap: wrap;">
            <h3> Certificate Website <i class="fa-solid fa-certificate"></i> </h3>
            <div style="display: flex;  align-items: center; justify-content: center; gap: 20px;">
                <a href="#"> <img src="img/stimg/bct123.png" width="140px" height="auto" > </a>
                <!-- tin nhiem mang ?? -->
                <a href="//www.dmca.com/Protection/Status.aspx?id=7c9eb982-1adb-41cb-8f64-79f5f4e4bc04" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca-badge-w100-2x1-02.png?ID=//www.dmca.com/Protection/Status.aspx?id=7c9eb982-1adb-41cb-8f64-79f5f4e4bc04" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
            </div>
        </div>

    </div>
</div>

