<?php
include 'header.php';


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$danhmuc = mysqli_query($conn, "SELECT * FROM danhmuc WHERE ten_danhmuc LIKE '%$keyword%' ");



$danh_muc = mysqli_query($conn,"SELECT * FROM danhmuc");
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
<h5>Danh mục sản phẩm <span class="badge badge-secondary badge-pill"><?= mysqli_num_rows($danh_muc) ?></span></h5>
<ul class="list-group list-group-horizontal">
  <li class="list-group-item"><a href="add_category.php">Thêm danh mục</a></li>
</ul>
<br>
<form action="" method="GET" role="form">
  <div class="input-group mb-3 mt3">
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
      <th>Tên danh mục</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($danhmuc as $key => $value) { ?>
      <tr>
        <td><?= ++$key ?></td>
        <td><?= $value['ten_danhmuc'] ?></td>
        <!-- <td class="max"><?= $value['chitiet'] ?></td> -->
        <td><a class="btn btn-outline-info" href="edit_category.php?id=<?= $value['id_danhmuc'] ?>">Sửa</a>
        </td>
        <td>
          <a onclick="return confirm('Bạn có có chắc chắn muốn xóa: <?= $value['ten_danhmuc'] ?> không');" class="btn btn-outline-danger" href="del_category.php?id=<?= $value['id_danhmuc'] ?>">Xóa</a>
        </td>
      </tr>
    <?php }

    ?>
  </tbody>
</table>
<?php
include 'footer.php';
?>