<?php 
    session_start();
    ob_start();
    //include "db.php";
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main">
        <div class="flx_nav">
            <nav class="sidebar" id="side">
                <div class="top_img_nav11">
                    <div class="img_nav" style="margin-bottom: 15px;">
                        <img src="img/logo2.png" alt="diblock.top">
                        <box-icon name='x' style="height: 28px; width: 28px;" id="close_bar"
                            onclick="closenav()"></box-icon>
                    </div>
                    <div
                        style="display: flex; align-items: center; justify-content: center; margin-top: -15px; padding-bottom: 6px;">
                        <box-icon name='chevron-down' style="width: 30px; height: 30px;"></box-icon>
                    </div>
                </div>
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
                                    <span> Dark Mode </span>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </a>
                            </li>
                        </ul>
                        <h6 style="text-align: center;"> @diblock.top -
                            <?php echo date('Y'); ?>
                        </h6>

                    </div>
                </div>
            </nav>
            <nav class="nav_top">
                <div class="top_flx" style="justify-content: space-between;">

                    <div class="icon31" onclick="opennav()">
                        <box-icon name='menu'></box-icon>
                    </div>

                    <div class="top_flx">
                        <div class="dropdown">
                            <div class="icon31" onclick="drFunction()" class="dropbtn">
                                <box-icon name='bell'></box-icon>
                            </div>
                            <div id="myDropdown" class="dropdown-content">
                                <h3
                                    style="margin: 5px 5px 5px 20px; display: flex; align-items: center;justify-content: space-between; gap: 6px; white-space: nowrap;">
                                    <p style="margin: 0;"> Thông báo </p>
                                    <box-icon name='x' onclick="drFunction()"
                                        style="width: 30px; height: 30px; cursor: pointer; "></box-icon>
                                </h3>
                                <hr>
                                <?php for ($i=0; $i < 10 ; $i++) { 
                                    ?> <a>
                                    <p style="margin: 0; font-size: 12px;"> 05/04/2023 </p>
                                    Bạn đã rút thành công 5$
                                </a>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <div class=" top_flx img_us_top" style="gap: 12px;">
                            <img src="img/anhus.jpg" alt="img_user" width="46px" height="46px"
                                style="border-radius: 50%;">
                            <span style="white-space: nowrap;">Trần Đức Lương</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="ndung_main">
                    asd
                </div>
            </nav>
        </div>
    </div>

    <script>

        function opennav() {
            document.getElementById("side").style.display = "block";
        };
        function closenav() {
            document.getElementById("side").style.display = "none";
        };
        function drFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        };

        const body = document.body;
        const switch_mode = document.querySelector('.slider');
        // Load mode 
        let mode = localStorage.getItem('darkmode');
        if (mode == 'true') {
            body.classList.add('dark-mode');

        }
        switch_mode.addEventListener('click', () => {
            let mode = body.classList.toggle('dark-mode');
            // save mode 
            localStorage.setItem('darkmode', mode);
        });

    </script>

</body>

</html>