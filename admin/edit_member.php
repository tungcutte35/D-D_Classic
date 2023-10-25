<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $admin = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$id' ");
    $admin = mysqli_fetch_assoc($admin);
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = mysqli_query($conn, "UPDATE `admin` SET email = '$email', `name` = '$name' WHERE id = '$id'");
    if ($query) {
        header("location: member.php");
    }
}
if (isset($_POST['change_pass'])) {
    $pass = $_POST['pass'];
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];

    $check = mysqli_query($conn,"SELECT * FROM `admin` WHERE id ='$id'");
    $data = mysqli_fetch_assoc($check);
    if(mysqli_num_rows($check) == 1) {

        $checkpass = password_verify($pass,$data['pass']);

        if($checkpass){
              if($new_pass == $re_pass){
                $password =  password_hash($new_pass,PASSWORD_DEFAULT);
                $query = mysqli_query($conn, "UPDATE `admin` SET pass = '$password' WHERE id = '$id'");
                if($query){
                    header('location: member.php');
                }
              }else{
                echo "<script>alert('Mật khẩu nhập lại không đúng')</script>";
              }
          }
          else {
            echo "<script>alert('Mật khẩu cũ không khớp')</script>";
          }
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

<h5>Cập nhật thành viên </h5>
<br>
<h6>Thông tin</h6>
<form action="" method="POST" role="form">
    <div class="form-group">
        <label for="">Tên:</label>
        <input type="text" class="form-control" placeholder="" id="" name="name" required="required" value="<?= $admin['name'] ?>">
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="text" class="form-control" placeholder="" id="" name="email" required="required" value="<?= $admin['email'] ?>">
    </div>
    <button name="submit" class="btn btn-outline-primary">Cập nhật</button>
</form>
<br><br>
<h6>Mật khẩu</h6>
<form action="" method="POST" role="form">
    <div class="form-group">
        <label for="">Mật khẩu cũ:</label>
        <input type="password" class="form-control" placeholder="" id="" name="pass" required="required" >
    </div>
    <div class="form-group">
        <label for="">Mật khẩu mới:</label>
        <input type="password" class="form-control" placeholder="" id="" name="new_pass" required="required" >
    </div>
    <div class="form-group">
        <label for="">Nhập lại mật khẩu:</label>
        <input type="password" class="form-control" placeholder="" id="" name="re_pass" required="required" >
    </div>
    <button name="change_pass" class="btn btn-outline-primary">Đổi mật khẩu</button>
</form>
<?php
include 'footer.php';
?>