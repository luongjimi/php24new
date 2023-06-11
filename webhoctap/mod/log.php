
    <div class = "login">
        <form method="post" >
            <p>Đăng Nhập</p>
            <div class="check_log">
                <?php
                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                    $secret = '6Ld8k3ckAAAAAEqnHxrbWjjF0zYTD0Q_QbzvAg5u'; //Thay thế bằng mã Secret Key của bạn
                    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                    $response_data = json_decode($verify_response);
                    if($response_data->success) {
                        if (isset($_POST['gui'])) {
                            $tk = $_POST['email'];
                            $mk = md5($_POST["pw"]);
                            $rows = mysqli_query($conn," SELECT * from user where email = '$tk' and pw = '$mk' ");
                            $count = mysqli_num_rows($rows);

                            if ($count == 1) {
                                //admin cad = 1
                                //nguoi dung moi cad = 0
                                $row2 = mysqli_query($conn," SELECT * FROM user WHERE email = '$tk' and cad = 0 ");
                                $newus = mysqli_num_rows($row2);
                                //nguoi dung bi baned cad = 3
                                $row3 = mysqli_query($conn," SELECT * FROM user WHERE email = '$tk' and cad = 3 ");
                                $banus = mysqli_num_rows($row3);
                            //nguoi dung da ok -> cad = 4 va tu dong dang nhap
                            // cad = 2 la giao vien (hien thi dang bai)
                                if ($banus == 1) {
                                        echo "Tài khoản của bạn đã bị ban";
                                } elseif($newus == 1){
                                    $_SESSION['new_us'] = $tk;
                                    header ("Location: index.php?act=ver_us");
                                } else {
                                    // kiem tra nguoi dung
                                    $_SESSION['user_check'] = $tk;
                                    include "cont/check_ug.php";
                                    include "cont/lay_id_us.php";
                                    header ("Location: index.php?act=user&id_us=$tk02");
                                }
                            } else {
                                echo "Sai tài khoản hoặc mật khẩu";
                            }
                        }
                    } else {
                        echo "Vui lòng sác minh Captcha";
                    }
                }
                ?>
            </div>
                Email:
            <input name="email" type="email" placeholder="Email" required >
                Mật khẩu:
            <input name="pw" type="password" placeholder="********" required >
            <div style="margin-bottom: 10px;" class="g-recaptcha" data-sitekey="6Ld8k3ckAAAAAKzNFcWymo8tLux_sEUVRFPcI4th"></div>
            <label>
                <input type="checkbox" checked="checked" style="width: 15px;height: 15px;"> Duy trì đăng nhập?
            </label>
            <button class="btn_log" name="gui" type="submit" > Đăng nhập </button>
            <a href="index.php?act=reg">Hoặc đăng kí !</a>
            <div class="check_log"> <a href="index.php?act=re_pw"> Quên mật khẩu ?  </a> </div>
            <p style="font-size: 14px; margin-top: -8px"> *Chỉ đăng nhập được ở máy khác sau 12h kể từ lần đăng nhập cuối cùng </p>
        </form>
    </div>

    <!-- them lop bao mat capcha -->

    <?php
        if(isset($_SESSION['user']) and $_SESSION['user'] != ""){
            include "cont/lay_id_us.php";header ("Location: index.php?act=user&id_us=$tk02");
        }
    ?>