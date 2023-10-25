<?php
    include 'header.php';
    $id_ad = $admin['id'];

    // $admin_query = mysqli_query($conn,"SELECT * FROM admin WHERE id = '$id_ad' ");

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];
        if($pass != $repass) {
            echo "<script>alert('Mật khẩu nhập lại không đúng')</script>";
        } else {
            $password = password_hash($pass,PASSWORD_DEFAULT);
        $doi_pass_ad = mysqli_query($conn,"UPDATE admin SET name ='$name' , pass ='$password' WHERE id ='$id_ad' ");
        if($doi_pass_ad) {
          echo "<script>alert('Thành công !')</script>";
        }
    }
    }
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
    <a class="nav-link " href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
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

<div class="row">
   <div class="col-4">



<div class="card" style="width:400px">
    <img class="card-img-top" src="../images/icon/logo-footer-1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $admin['name'] ?></h4>
      <!-- <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a> -->
    </div>
  </div>
  </div>
  <div class="col-8">
  <form action="" method="post" class="was-validated">
    <div class="form-group">
      <label for="uname">Tên:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $admin['name'] ?>" placeholder="Tên..." name="name" required>
      <div class="valid-feedback">Oke con dê.</div>
      <div class="invalid-feedback">Không được bỏ trống trường này.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu mới:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu..." name="pass" required>
      <div class="valid-feedback">Oke con dê.</div>
      <div class="invalid-feedback">Không được bỏ trống trường này.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Nhập lại mật khẩu:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Nhập lại mật khẩu..." name="repass" required>
      <div class="valid-feedback">Oke con dê.</div>
      <div class="invalid-feedback">Không được bỏ trống trường này.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> Vâng tôi đồng ý
        <div class="valid-feedback">Oke con dê.</div>
        <div class="invalid-feedback">Không được bỏ trống trường này.</div>
      </label>
    </div>
    <button type="submit" name="submit" class="btn btn-dark">Đồng ý thay đổi</button>
  </form>
  </div>
</div>

<?php 

    include 'footer.php';
?>