
    <div class = "login">
        <form method="post" >
            <p>Đăng Kí</p>
            <div class="check_log">
                    <?php
                        $ptname = "/^[^ ][a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ(a-zA-Z )]{2,28}$/";
                        $ptemail = "/^[a-z][a-z0-9_\.]{3,32}@[a-z0-9]{2,8}(\.[a-z0-9]{2,4}){1,2}$/";
                        $ptmk = "/^([\w_\.!@#$%^&*()]+){6,32}$/";

                        include "cont/check_ug.php";
                        //lay $check2

                        if(isset($_POST['reg'])){

                            $ten = $_POST['ten'];
                            $email = $_POST['email'];
                            $pw1 = $_POST['pw1'];
                            $pw2 = $_POST['pw2'];
                            //ugnt + ip + md5
                            
                            if($pw1 != $pw2){
                                echo "Mật khẩu không giống nhau";
                            } elseif (!preg_match($ptemail, $email)) {
                                echo "Email không đúng định dạng";
                            } elseif (!preg_match($ptname, $ten)) {
                                echo "Vui lòng nhập lại tên";
                            } elseif (!preg_match($ptmk, $pw1)) {
                                echo "Sai định dạng mật khẩu";
                            } else {
                                $c_email = "SELECT * FROM user WHERE email = '$email' ";
                                $run1 = mysqli_query($conn, $c_email);
                                $count5 = mysqli_num_rows($run1);

                                // kiem tra $check2 xem qua 5 lan khong
                                $c_ugnt = "SELECT * FROM user WHERE ugnt = '$check2' ";
                                $run2 = mysqli_query($conn, $c_ugnt); 
                                $rows_ug = mysqli_num_rows($run2);

                                if ($rows_ug > 3) {
                                    echo "Lỗi, vui lòng liên hệ admin";
                                }
                                elseif($count5 > 0){
                                        echo "Email đã được sử dụng";
                                } else {
                                    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                                        $secret = '6Ld8k3ckAAAAAEqnHxrbWjjF0zYTD0Q_QbzvAg5u'; //Thay thế bằng mã Secret Key của bạn
                                        $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                                        $response_data = json_decode($verify_response);
                                        if($response_data->success)
                                        {
                                            $sql1 = "INSERT INTO user (name, email, pw, ugnt) VALUES ('$ten', '$email', md5('$pw1'), '$check2') ";
                                            $run4 = mysqli_query($conn, $sql1);
                                            echo "Đăng kí thành công";
                                        } else {
                                            echo "Vui lòng sác minh Captcha";
                                        }
                                    } else {
                                        echo "Vui lòng sác minh Captcha";
                                    }
                                }
                            }
                        }
                    ?>
            </div>
                Tên tài khoản:
            <input name="ten" type="text" maxlength="25" placeholder="Name" required/>
                Email:
            <input name="email" type="email" placeholder="Email" maxlength="50" required >
                Mật khẩu:
            <input name="pw1" type="password" placeholder="********" maxlength="35" required >
                Nhập lại mật khẩu:
            <input name="pw2" type="password" placeholder="********" maxlength="35" required >
            <div style="margin-bottom: 10px;" class="g-recaptcha" data-sitekey="6Ld8k3ckAAAAAKzNFcWymo8tLux_sEUVRFPcI4th"></div>
            <button class="btn_log" name="reg" type="submit" > Đăng kí </button>
            <a href="index.php?act=log">Hoặc đăng nhập !</a>
            <p style="font-size: 14px; margin-top: -15px"> *Khi bấm vào đăng kí là bạn đã đồng ý với <a href="#">điều khoản</a> của chúng tôi </p>
        </form>
    </div>
