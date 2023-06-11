<div class="main2"> 
    <div style="max-width: 720px; margin: 12px auto; padding: 0 10px;">

        <?php if( (isset($_GET['idmua']) and $_GET['idmua'] != "" ) ){ 
            $id_mua = $_GET['idmua'];
            if(is_numeric($id_mua)){
                $trban = mysqli_query($conn,"SELECT * FROM `mua_sp` WHERE id_mua = '$id_mua' ");
                $row_kh2 = mysqli_fetch_array($trban);
                $of_sp1 = $row_kh2['of_sp'];
                $trban3 = mysqli_query($conn,"SELECT * FROM `sp` WHERE id_sp = '$of_sp1' ");
                $row_kh3 = mysqli_fetch_array($trban3);
        ?> 
        <div class="">
            <div>
                    
                <div>
                    <h5> thah toan qua internet banking : </h5>
                    <div>
                        card thanh toan bang ngan hang
                    </div>
                </div>

                    <!-- thanh toan bang api cua momo -->
                <div class="btn_ttmomo">
                    <h5 style="margin:0; color:white;"> Thanh toán qua QR_code MOMO: </h5>
                    <img src= "https://momosv3.apimienphi.com/api/QRCode?phone=0395223837&amount=<?php echo $row_kh3['gia']; ?>&note=<?php  echo md5($id_mua) ; ?> " width="240px" >
                </div>
                    <!-- end thanh toan bang api cua momo -->

                <div>
                    hien thi tim kiem ma giao dich va  (mb bank va momo)
                </div>
            </div>
            <div>
                <h4> ID Thanh Toán : <?php echo $_GET['idmua']; ?> </h4>
                <div>
                    hien thi anh, ten , gia 
                </div>
            </div>
        </div>
        <!-- hien thi qr code momo (hoac thanh toan ngay bang momo ) -->
                
        <?php }
        } else {
            header("Location: index.php");
        }?>

    </div>
    <br>
</div>