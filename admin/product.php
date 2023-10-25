<?php
include 'header.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc WHERE product.ten_sanpham LIKE '%$keyword%' ");

$limit = 8;
$total_page = ceil(mysqli_num_rows($product) / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
$star = ($cr_page - 1) * $limit;
// $product = mysqli_query($conn, "SELECT * FROM product LIMIT $star,$limit");
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc ORDER BY id_product DESC  LIMIT $star,$limit ");

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $sql = "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc = danhmuc.id_danhmuc
    WHERE product.ten_sanpham LIKE '%$keyword%' LIMIT $star,$limit ";
  $product = mysqli_query($conn, $sql);
}

$san_pham = mysqli_query($conn,"SELECT * FROM product");
?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Trang chính</a>
  </li>
  </li>  <li class="nav-item">
    <a class="nav-link " href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
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





<h5>Thông tin: Sản phẩm <span class="badge badge-secondary badge-pill"><?=  mysqli_num_rows($san_pham) ?></span></h5>
<ul class="list-group list-group-horizontal">
  <li class="list-group-item"><a href="addproduct.php">Thêm sản phẩm</a></li>
</ul>
<br>
<form action="" method="GET" role="form">
  <div class="input-group mb-3 mt50">
    <input type="text" class="form-control" placeholder="Tìm kiếm ... " name="keyword">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit"><img src="../images/icon/search.png" style="width: 20px;" alt=""></button>
    </div>
  </div>
</form>
<br>

<table class="table table-striped">
  <thead>
    <tr>
      <th>STT</th>
      <th>Danh mục</th>
      <th>Tên SP</th>
      <th>Hình ảnh</th>
      <th>SL</th>
      <th>Giá SP</th>
      <th>Giá KM</th>
      <!-- <th>Chi tiết SP</th> -->
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($product as $key => $value) { ?>
      <tr>
        <td><?= ++$star ?></td>
        <td><?= $value['ten_danhmuc'] ?></td>
        <td><?= $value['ten_sanpham'] ?></td>
        <td><img src="../uploads/<?= $value['anh_sanpham'] ?>" alt="" width="100px"></td>
        <td><?= $value['soluong'] ?></td>
        <td><?= number_format($value['gia_sanpham']) ?> VND</td>
        <td><?php if ($value['gia_khuyenmai'] > 0) {
              echo number_format($value['gia_khuyenmai']); ?> VND   <?php
            } else {
              echo 'Không sale';
            } ?></td>
        <!-- <td class="max"><?= $value['chitiet'] ?></td> -->
        <td><a class="btn btn-outline-info" href="repair_product.php?id=<?= $value['id_product'] ?>">Sửa</a>
        </td>
        <td>
          <a onclick="return confirm('Bạn có có chắc chắn muốn xóa: <?= $value['ten_sanpham'] ?> không');" class="btn btn-outline-danger" href="delete_product.php?id=<?= $value['id_product'] ?>">Xóa</a>
        </td>
      </tr>
    <?php }

    ?>
  </tbody>
</table>
<ul class="pagination justify-content-center">
  <?php if ($cr_page > 1) { ?>
    <li class="page-item "><a class="page-link" href="product.php?page=<?= $cr_page - 1 ?>">Trước</a></li>
  <?php } ?>
  <?php
  for ($i = 1; $i <= $total_page; $i++) { ?>
    <li class="page-item <?= (($cr_page == $i) ? 'active' : '') ?> ">
      <a class="page-link" href="product.php?page=<?= $i ?><?= ($keyword != '') ? "&keyword=$keyword" : '' ?>">
        <?= $i ?></a>
    </li>
  <?php } ?>
  <?php if ($cr_page < $total_page) { ?>
    <li class="page-item"><a class="page-link" href="product.php?page=<?= $cr_page + 1 ?>">Sau</a></li>
  <?php } ?>
</ul>


<?php

include 'footer.php';
?>