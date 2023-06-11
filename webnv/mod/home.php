<div class="home_gt">
   <div class="flex_top">
      <br>
      <img src="img/logo1.png" style="border-radius: 20%;" width="76px" height="76px">
      <br>
      <h3 style="text-align: center; margin: 0;"> Hệ Thống Hỗ Trợ Marketing Di_Block </h3>

   </div>

   <br>
   <br>

   <div class="gird_sp">
      <div class="col">
         <h4> <i style="font-size: 26px; margin-right: 12px;" class="fa-regular fa-user"></i> Tổng Thành Viên </h4>
         <a>
            <?php $row_tkus01 = mysqli_query($conn,"SELECT * FROM user ");
          $row_tk03 = mysqli_num_rows($row_tkus01); echo $row_tk03; ?> Người dùng
         </a>
      </div>
      <div class="col">
         <h4> <i style="font-size: 26px; margin-right: 12px;" class="fa-solid fa-person-running"></i> Nhiệm Vụ Đang Chờ
         </h4>
         <a>
            <?php $row_nv1 = mysqli_query($conn,"SELECT * FROM job WHERE trang_thai = 0 ");
          $row_nv2 = mysqli_num_rows($row_nv1); echo $row_nv2; ?> <em> Nhiệm vụ </em>
         </a>
         <!-- nhiem vu chua hoan thanh -->
      </div>
      <div class="col">
         <img src="img/zalo21.png" style="border-radius: 20%; margin-bottom: 15px;" width="52px" height="52px">
         <br>
         <a href="#">Tham Gia Group</a>
      </div>
   </div>

   <br>

</div>
<br>
<div class="home_gt2">
   <ul style="padding-left: 25px;">
      <h3 style="text-align: center; margin-top: -4px;"> Điều khoản website <i style="margin-left: 6px;"
            class="fa-solid fa-table-list"></i> </h3>
      <li> Chỉ được đăng kí duy nhât 1 acc / 1 máy.</li>
      <li> Mọi khoản thêm vào phải tìm kiếm được. </li>
      <li> Tố cáo cho chúng tôi những nhiệm vụ scam, lừa đảo. </li>
      <li> Nếu tài khoản nào spam, nhiệm vụ bị hủy quá nhiều sẽ bị sóa. </li>
      <li> Chúng tôi là trung gian để đảm bảo quyền lợi giữa người làm và người thuê. </li>
   </ul>
   <h6 style="text-align: center; margin: 0; text-decoration: underline;">diblock.top - <?php echo date('Y'); ?> </h6>
</div>