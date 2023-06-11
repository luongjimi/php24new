
<?php if (isset($_SESSION['new_us']) and $_SESSION['new_us'] != ""){ ?>
    <div class="login">
        <form style = "padding-top: 10px;" method="post" >
            <p> Xác minh tài khoản </p>
            <a style="color: black;"> Bấm vào "Gửi mã", chúng tôi sẽ gửi mã xác minh tới địa chỉ email: <em style="color: red; font-size: 16px; text-decoration:underline;"> <?php echo $_SESSION['new_us']; ?> </em> </a>
            <div class="check_log" style="padding-bottom: 15px; margin-top: -8px;">
                <?php
                //lay trong db du lieu
                    $email1 = $_SESSION['new_us'];
                    $date = date('Y-m-d H:i:s');
                    $now = strtotime($date);

                    if (isset($_POST['gui_ma'])){
                        $sql5 = mysqli_query($conn,"SELECT * FROM `user` WHERE email ='$email1'");
                        $count = mysqli_num_rows($sql5); 
                        $row5=mysqli_fetch_array($sql5);
                        // kiem tra thoi gian
                            $time_code = $row5['re_mal'];
                            $d2 = strtotime("$time_code");
                            $time_con2 = $now - $d2;

                        if( $time_con2 > 0){
                        //them code vao db neu sau 3 phut chua gui di dc
                            $code_ran =  rand(100000,999999);
                        //them day moi vao db
                            $newdate = strtotime ( '+15 minute' , strtotime ( $date ) );
                            $newdate2 = date ( 'Y-m-d H:i:s' , $newdate );

                            $time_recode = strtotime ( '+3 minute' , strtotime ( $date ) );
                            $newdate3 = date ( 'Y-m-d H:i:s' , $time_recode );

                            $sql11 = "UPDATE `user` SET token = '$code_ran' WHERE email = '$email1' ";
                            $sql12 = "UPDATE `user` SET time_mail = '$newdate2' WHERE email = '$email1'";
                            $sql13 = "UPDATE `user` SET re_mal = '$newdate3' WHERE email = '$email1'";

                            if (($conn->query($sql11) === TRUE) and ($conn->query($sql12) === TRUE) and ($conn->query($sql13) === TRUE) ) {

                            require("mail_php/src/PHPMailer.php");
                            require("mail_php/src/SMTP.php");
                            require("mail_php/src/Exception.php");
                        
                              $mail = new PHPMailer\PHPMailer\PHPMailer();
                              $mail->IsSMTP(); // enable SMTP
                          
                              $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
                              $mail->SMTPAuth = true; // authentication enabled
                              $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                              $mail->Host = "smtp.gmail.com";   
                              $mail->Port = 465; //465
                              $mail->IsHTML(true);
                              $mail->Username = "a1training.edu@gmail.com";
                              $mail->Password = "vslbngxhwngolxdk";
                              $mail->SetFrom("a1training.edu@gmail.com");
                              $mail->Subject = "A1-training Verification";
                              $mail->Body = " <h3> Day la ma xac minh cua ban, ma co hieu luc trong vong 15 phut, vui long khong chia se cho bat cu ai. Chi duoc gui lai yeu cau khi ma nay het han:  </h3> <br> <h1> <strong>".$code_ran."</strong> </h1>";
                              $mail->AddAddress($email1);
                          
                               if(!$mail->Send()) {
                                  echo "Lỗi không xác định";
                               } else {
                                    echo "Gửi mail thành công";
                               }
                            } else {
                                echo "Lỗi không xác định";
                            }
                        } else {
                            echo "Chỉ được gửi 1 lần sau mỗi 3 phút";
                        }
                    }

                    if (isset($_POST['gui'])){
                        $sql5 = mysqli_query($conn,"SELECT * FROM `user` WHERE email ='$email1'"); 
                        $count = mysqli_num_rows($sql5);
                        $row5=mysqli_fetch_array($sql5);
                        
                        $codedb = $row5['token'];
                        $time_mail2 = $row5['time_mail'];
                        $d = strtotime("$time_mail2");
                        $time_con2 = $now - $d;
                            // kiem tra thoi gian neu chua het han code
                        if(($time_con2 < 0) and !empty($_POST['code']) ){
                            $code_user = $_POST['code'];
                            if ($code_user == $codedb) {
                                $code_user = $_POST['code'];
                            //kiem tra xem code co dung khong
                                    $sql11 = "UPDATE `user` SET token = 0 WHERE email = '$email1' ";
                                    if ($conn->query($sql11) === TRUE) {
                                        $sql = "UPDATE `user` SET cad = 4 WHERE email = '$email1'";
                                        if ($conn->query($sql) === TRUE) {
                                        unset($_SESSION['new_us']);
                                        header("Location: index.php?act=log");
                                        }
                                    }
                            } else {
                                echo "Code sai hoặc hết hạn";
                            }
                        } else {
                            echo "Code sai hoặc hết hạn";
                        }
                    }
                ?>
            </div>
            <input type = "number" name="code" placeholder="Nhập mã xác minh" />
            <div>
            <button style="width: 58%;" class="btn_log" name="gui" type="submit" > Xác minh </button>
            <button style="width: 40%;" class="btn_log" name="gui_ma" type="submit" > Gửi mã </button>
            </div>
            <a style="font-size: 14px;">*Mã sẽ hết hạn sau 15 phút </a>
        </form>
    </div>

    <?php } else { header("Location: index.php?act=log"); }  ?>
