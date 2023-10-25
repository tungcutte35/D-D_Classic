<?php

    $err = [];
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($query);
        $checkemail = mysqli_num_rows($query);
        if($checkemail == 1 ){

            $checkpass = password_verify($password,$data['password']);

            if($checkpass){
            $_SESSION['user'] = $data;
            header('location: users.php');
            }
            else {
                $err['password'] = 'Mật khẩu không chính xác !';
            }
        }
        else {
            $err['email'] = 'Email không tồn tại !';
        }
    }

    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    if (isset($user['name'])) {
      header('location: ?pages=users');
  } else { ?>
<div class="container-fluid">
    <hr>

<h2>Đăng nhập tài khoản</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="" placeholder="Nhập email vd:abc@xzy.qwr..." name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];
      else echo ''; ?>" >
      <p class="text-danger"> <?php echo (isset($err['email']))?$err['email']: '' ?> </p>
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu:</label>
      <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu..." name="password" >
      <p class="text-danger"> <?php echo (isset($err['password']))?$err['password']: '' ?> </p>
    </div>
    <button type="submit" class="btn btn-secondary">Đăng nhập</button>
  </form>
  <br>
<h6><a href="?pages=dangky">Đăng ký tài khoản tại đây.</a></h6>
<hr>

</div>
      <?php  } ?>
