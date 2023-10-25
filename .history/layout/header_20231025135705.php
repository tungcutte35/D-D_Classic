<?php

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc as 'ten_danhmuc'  FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc WHERE product.ten_sanpham LIKE '%$keyword%' ");

$danhmuc = mysqli_query($conn, "SELECT * FROM danhmuc ");



// if($product) {
//     header('location: product.php');
// }else {

// }
if (isset($user['id'])) {
    $id_user = $user['id'];

    $giohang = mysqli_query($conn, "SELECT * FROM giohang WHERE id_user = '$id_user'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DQ store</title>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style-index.css">

</head>

<body>
    <!-- <div class="container-fluid"> -->
    <div class="jumbotron text-center" style="margin-bottom:0">
        <div class="row">
            <div class="col-sm-6">
                <a href="?pages=home" data-toggle="tooltip" style=" width: 320px; height: 50px;" title="về trang chủ!"> <img src="images/icon/logostore.png" alt=""></a>
            </div>
            <div class="col-sm-8">
                <form action="" method="GET">
                    <input type="hidden" name="pages" value="product">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit"><img src="images/icon/search.png" style="width: 20px;" alt=""></button>
                        </div>
                    </div>

            </div>


        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <!--  -->

        <a data-toggle="tooltip" title="Tham quan các sản phẩm của chúng tôi!" class="navbar-brand" href="?pages=product">
            <img src="images/icon/logostore.png" style="width: 230px; height: 60px;"  width="30" height="30" alt="">
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav">
                    <?php if (isset($user['name'])) { ?>
                        <a href="?pages=users">
                            <li class="nav-item"><?= $user['name']; ?>&nbsp;&nbsp;&nbsp; </li>
                        </a>
                        <a href="?pages=giohang"> Giỏ hàng<i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-secondary badge-pill"><?php echo mysqli_num_rows($giohang); ?></span>&nbsp;&nbsp;&nbsp;</a>
                        <a href="include/logout.php"> Đăng xuất&nbsp;<i class="fas fa-sign-out-alt"></i></a>

        </div>
    <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="?pages=dangnhap">Đăng nhập</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pages=dangky">Đăng ký</a>
        </li>
        </div>
    <?php } ?>
    </ul>
    </ul>
    </div>
    </nav>
    </form>
    <div class="overflow">