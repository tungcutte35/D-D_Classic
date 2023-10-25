<?php

    $err = [];
    if(isset($_POST['name'])){
        $name = $_POST['name']  ;
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];

        if(empty($name)){
            $err['name']='Vui lòng nhập trường này !';
        };
        if(empty($email)){
            $err['email']='Vui lòng nhập trường này !';
        };
        if(empty($sdt)){
          $err['sdt']='Vui lòng nhập trường này !';
      };
        if(empty($password)){
            $err['password']='Vui lòng nhập trường này !';
        };
        if($password != $rpassword) {
            $err['rpassword'] = 'Mật khẩu nhập lại không đúng !';
        };

        if(empty($err)){
            $pass = password_hash($password,PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(name,email,sdt,password) VALUE ('$name','$email','$sdt','$pass')";
            $query = mysqli_query($conn,$sql);
            if($query) {
?>
                <script> confirm("Đăng ký thành công !"); </script>
                
<?php   
      // header('location: dangnhap.php');
            } else { ?>
              <script> confirm("Email đã tồn tại !"); </script>
            <?php

            }
        }

        // var_dump($err);
        // die();

    };

    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    if (isset($user['name'])) {
      header('location: users.php');
  } else {
?>
<div class="container-fluid">
<hr>

<h2>Đăng ký tài khoản</h2>
  <form action="" method="POST">
  <div class="form-group">
      <label for="name">Tên tài khoản:</label>
      <input type="text" class="form-control" id="" placeholder="Nhập tên tài khoản..." name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'];
      else echo ''; ?>">
      <p class="text-danger"> <?php echo (isset($err['name']))?$err['name']: '' ?> </p>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="" placeholder="Nhập email vd:abc@xzy.qwr..." name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];
      else echo ''; ?>" >
      <p class="text-danger"> <?php echo (isset($err['email']))?$err['email']: '' ?> </p>
    </div>
    <div class="form-group">
      <label for="sdt">Số điện thoại:</label>
      <input type="number" class="form-control" id="sdt" placeholder="Nhập số điện thoại..." name="sdt" value="<?php if (isset($_POST['sdt'])) echo $_POST['sdt'];
      else echo ''; ?>" >
      <p class="text-danger"> <?php echo (isset($err['email']))?$err['email']: '' ?> </p>
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu:</label>
      <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu..." name="password" >
      <p class="text-danger"> <?php echo (isset($err['password']))?$err['password']: '' ?> </p>
    </div>
    <div class="form-group">
      <label for="rpassword">Xác nhận mật khẩu:</label>
      <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu..." name="rpassword">
      <p class="text-danger"> <?php echo (isset($err['rpassword']))?$err['rpassword']: '' ?> </p>
    </div>
    <button type="submit" class="btn btn-secondary">Tạo tài khoản</button>
  </form>
  <br>
  <h6><a href="?pages=dangnhap">Quay lại trang đăng nhập.</a></h6>
<hr>

</div>
<?php } ?>
