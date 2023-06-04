<?php 
    session_start();
    ob_start();
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo1.png" type="image/x-icon" />
    <title>Diblock.top</title>
    <link rel="stylesheet" href="st.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
        integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="main">
        <div class="flx_nav">
            <nav class="sidebar">
                <div class="img_nav" style="margin-bottom: 15px;">
                    <img src="img/logo2.png" alt="diblock.top">
                </div>

                <hr>
                <div class="menu">
                    <div class="menu_item">
                        <ul class="ul_menu">

                            <li class="item">
                                <a href="#" class="link_item">
                                    <box-icon name='home-alt' class="icon21"></box-icon>
                                    <span> Trang Chủ </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='book-add' class="icon21"></box-icon>
                                    <span> Tạo Nhiệm Vụ </span>
                                </a>
                            </li>
                            <li class="item">
                                <a href="#" class="link_item">
                                    <box-icon name='run' class="icon21"></box-icon>
                                    <span> Làm Việc </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='wallet' class="icon21"></box-icon>
                                    <span> Ví Tiền </span>
                                </a>
                            </li>

                            <li class="item">
                                <a href="#" class="link_item">
                                    <box-icon name='user-circle' class="icon21"></box-icon>
                                    <span> Tài Khoản </span>
                                </a>
                            </li>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='history' class="icon21"></box-icon>
                                    <span> Lịch Sử </span>
                                </a>
                            </li>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='cog' class="icon21"></box-icon>
                                    <span> Cài Đặt </span>
                                </a>
                            </li>

                            <hr>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='log-out' class="icon21"></box-icon>
                                    <span> Đăng Xuất </span>
                                </a>
                            </li>

                            <li class="item" style="margin-top: 22px;">
                                <a href="#" class="link_item">
                                    <box-icon name='moon' class="icon21"></box-icon>
                                    <span> Dark On </span>
                                </a>
                            </li>
                        </ul>
                        <h6 style="text-align: center; margin-bottom: 0;"> @diblock.top -
                            <?php echo date('Y'); ?>
                        </h6>

                    </div>
                </div>
            </nav>
            <nav class="nav_top">
                <div class="top_flx" style="justify-content: space-between;">
                    <div class="icon31">
                        <box-icon name='menu'></box-icon>
                    </div>
                    <div class="top_flx">

                        <div class="icon31">
                            <box-icon name='bell'></box-icon>
                        </div>
                        <div class="top_flx img_us_top" style="gap: 12px;">
                            <img src="img/anhus.jpg" alt="img_user" width="46px" height="46px"
                                style="border-radius: 50%;">
                            <span>Trần Đức Lương</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="ndung_main">
                    <?php for ($i=0; $i <30 ; $i++) { 
                        echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate impedit tempora debitis rem quas libero molestias cum commodi a laboriosam eveniet nostrum magni expedita rerum nisi, ratione quasi doloribus aspernatur. <br>";
                    } ?>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>