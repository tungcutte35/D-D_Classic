<?php
 include '../config/connect.php';
 if(isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];

}
else {
    header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/style-admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>



        <div class="top">
            <a href="index.php"><h3>TRANG QUẢN TRỊ ADMIN</h3></a>
            <div class="menutaikhoan">
                <a href="admin.php"><img src="../images/icon/user.png" alt=""> <?php echo $admin['name'] ?></a>
                <a href="logout.php"><img src="../images/icon/logout.png" alt=""> Đăng xuất</a>

            </div>

        </div>
        <br>
        <div class="container-fluid">