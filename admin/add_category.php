<?php
include 'header.php';

if(isset($_POST['submit'])){
    $ten_danhmuc = $_POST['ten_danhmuc'];

    $query = mysqli_query($conn,"INSERT INTO danhmuc (ten_danhmuc) VALUES ('$ten_danhmuc') ");
    if($query) {
        header("location: category.php");
    }
}
?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chính</a>
  </li>  <li class="nav-item">
    <a class="nav-link active" href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
  </li>
</ul>
<br>
<h5>Thêm mới danh mục </h5>
<br>

<form action="" method="POST" role="form">
<div class="form-group">
        <label for="">Tên danh mục:</label>
        <input type="text" class="form-control" placeholder="" id="" name="ten_danhmuc" required="required" >
    </div>
    <button name="submit" class="btn btn-outline-primary">Thêm mới</button>
</form>

<?php
include 'footer.php';
?>