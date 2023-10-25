<?php
include 'header.php';





// $user = $_SESSION['user'];
// $id_user = $user['id'];

// $don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
// WHERE ");
// $donhang = mysqli_fetch_assoc($don_hang);

$cac_don_hang = mysqli_query($conn, "SELECT *  FROM diachi_donhang ORDER BY trang_thai ASC");


?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Trang chính</a>
  </li>
  </li>  <li class="nav-item">
    <a class="nav-link " href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
  </li>

  <li class="nav-item">
    <a class="nav-link " href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
  </li>
</ul>
<br>
<h6>Bộ lọc tìm kiếm</h6>
<input class="form-control" id="myInput" type="text" placeholder="Search..">

<br>

<h5>Thông tin các đơn hàng <span class="badge badge-secondary badge-pill"><?php echo mysqli_num_rows($cac_don_hang) ?></span></h5>


<table class="table table-striped">
  <thead>
    <tr>
      <th>STT</th>
      <th>Mã đơn hàng</th>
      <th>Tên khách hàng</th>
      <th>Ngày đặt</th>
      <th>Trạng thái</th>
      <th>Quản lý đơn</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php foreach ($cac_don_hang as $key => $value) { ?>
      <tr>
        <td><?php echo $key + 1 ?></td>
        <td><?php echo $value['ma_donhang'] ?></td>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo $value['ngay_dat'] ?></td>
        <td>
          <?php if($value['trang_thai'] == 0) { ?>
                <p class="btn btn-outline-warning">Chưa xác nhận</p>
            <?php  } elseif($value['trang_thai'] == 1) { ?>
                  <p class="btn btn-outline-info">Đang giao hàng</p>
              <?php  } else { ?>
                    <p class="btn btn-outline-success">Đã hoàn thành</p>
                <?php  }  ?>
                <?php if($value['trang_thai'] > 1) { ?>
                  <td><a href="xuly.php?ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-success">Xem chi tiết</a></td>
                  <td><a onclick="return confirm('Xóa đơn hàng này ?')" href="xoa_donhang.php?ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-danger">Xóa</a></td>
                  <?php  } else { ?>
                <td><a href="xuly.php?ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-dark">Xử lý đơn</a></td>
                <td><a onclick="return confirm('Xóa đơn hàng này ?')" href="xoa_donhang.php?ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-danger">Xóa</a></td>
                <?php  }  ?>
      </tr>
    <?php  } ?>
  </tbody>
</table>
<?php 

// $cac_don_hang_khong_dangnhap = mysqli_query($conn, "SELECT * FROM diachi_donhang WHERE id_user = '0' ORDER BY trang_thai ASC ");

?>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



<?php
include 'footer.php';
?>