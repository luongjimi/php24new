<?php    
                    // kiem tra neu ten file khac voi user.png thi soa di !!!!!!!
                        if(isset($_POST["submit"])) {
                                    $target_dir = "./img/usimg/";
                                    $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);
                                    $allowUpload   = true;
                                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                    $maxfilesize   = 1200000;
                                    $allowtypes    = array('jpg', 'png', 'jpeg');
                                    $name_img = basename( $_FILES["fileupload"]["name"]);
                                    $ustk = $_SESSION['user'];
                                    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                                    if (!isset($_FILES["fileupload"])) {
                                        echo "Dữ liệu không đúng cấu trúc";
                                        $allowUpload = false;
                                        die;
                                    } elseif($_FILES["fileupload"]['error'] != 0){
                                        echo "Dữ liệu upload bị lỗi";
                                        $allowUpload = false;
                                        die;
                                        // phan nay kiem tra du lieu anh
                                } else{
                                    //phan nay kiem tra dinh dang anh
                                        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                                    if($check !== false) {
                                        $allowUpload = true;
                                        if(file_exists($target_file)){
                                            echo "Tên không hợp lệ, sửa lại tên.";
                                            $allowUpload = false;
                                        } elseif($_FILES["fileupload"]["size"] > $maxfilesize){
                                            echo "dung lượng quá lớn.";
                                            $allowUpload = false;
                                        } elseif (!in_array($imageFileType,$allowtypes) ){
                                            echo "Sai định dạnh hình ảnh.";
                                            $allowUpload = false;
                                        } else{
                                            if ($allowUpload) {
                                                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                                                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                                                    // soa file trong db di
                                                    if($anhdg == "user.png"){
                                                        $status = TRUE;
                                                    } else {
                                                    $status = unlink($target_dir.basename($anhdg));
                                                    } //khong soa file user.png
                                                    if ($status){
                                                        $doimk = mysqli_query($conn, " UPDATE user SET img = '$name_img' WHERE email = '$ustk' ");
                                                        echo "Đã upload thành công.";
                                                    } else {
                                                        echo "Lỗi !";
                                                    }
                                                }
                                                else {
                                                    echo "Lỗi !";
                                                }
                                            }
                                            else {
                                                echo "Lỗi !";
                                            }
                                        }
                                    }
                                    else {
                                        echo "Không phải file ảnh.";
                                        $allowUpload = false;
                                    }
                                }   
                            }
                        ?>