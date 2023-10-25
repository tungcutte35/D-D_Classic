<?php
    include '../config/connect.php';

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = mysqli_query($conn,"SELECT * FROM admin WHERE email ='$email'");
        $data = mysqli_fetch_assoc($check);
        if(mysqli_num_rows($check) == 1) {

            $checkpass = password_verify($password,$data['pass']);

            if($checkpass){
              $_SESSION['admin'] = $data;
              header('location: index.php');
              }
              else { ?>
                <script> alert("Toang rồi ông giáo ạ. ");</script>
                <?php
              }
        }
        else {
            ?>
            <script>alert("Toang rồi ông giáo ạ.");</script>
            <?php
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css-login-admin.css">
</head>
<body>
    
<div class="container">
  <h2><img src="../images/icon/logostore.png"  alt=""></h2>
  <form action="" class="was-validated" method="POST">
    <div class="form-group">
      <label for="">Email admin:</label>
      <input type="email" class="form-control" id="" placeholder="Tên tài khoản..." name="email" required>
      <div class="valid-feedback">Đã điền.</div>
      <div class="invalid-feedback">Vui lòng điền trường này.</div>
    </div>
    <div class="form-group">
      <label for="">Mật khẩu:</label>
      <input type="password" class="form-control" id="" placeholder="Mật khẩu..." name="password" required>
      <div class="valid-feedback">Đã điền.</div>
      <div class="invalid-feedback">Vui lòng điền trường này.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="robot" required> Tôi không phải là robot.
        <div class="valid-feedback">Bạn là robot !</div>
        <div class="invalid-feedback">Bạn có phải robot ?</div>
      </label>
    </div>
    <button type="submit" class="btn btn-dark">Đăng nhập</button>
  </form>
</div>


<!-- jQuery library -->
<script src="../js/jquery.min.js"></script>

<!-- Popper JS -->
<script src="../js/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>