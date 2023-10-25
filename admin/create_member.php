<?php
include 'header.php';


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];

    if ($pass == $re_pass) {
        $password = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `admin`(name,email,pass) VALUE ('$name','$email','$password')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header('location: member.php');
        } else {
            echo "<script>alert('Email đã tồn tại')</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu nhập lại không đúng')</script>";
    }
}
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chính</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
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
        <a class="nav-link active" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
    </li>
</ul>
<br>

<h5>Thêm mới thành viên </h5>
<br>
<form action="" method="POST" role="form">
    <div class="form-group">
        <label for="">Tên:</label>
        <input type="text" class="form-control" placeholder="" id="" name="name" required="required" value="">
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="text" class="form-control" placeholder="" id="" name="email" required="required" value="">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu:</label>
        <input type="password" class="form-control" placeholder="" id="" name="pass" required="required">
    </div>
    <div class="form-group">
        <label for="">Nhập lại mật khẩu:</label>
        <input type="password" class="form-control" placeholder="" id="" name="re_pass" required="required">
    </div>
    <button name="submit" class="btn btn-outline-primary">Thêm mới</button>
</form>
<?php
include 'footer.php';
?>