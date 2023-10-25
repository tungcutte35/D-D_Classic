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
     <!-- <div class="container-fluid">
    <div class="jumbotron text-center" style="margin-bottom:0">



        </div>
    </div> -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top ">
        <!--  -->
        <div class="row">

        </div>

    <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link " href="?pages=dangnhap">Đăng nhập</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pages=dangky">Đăng ký</a>
        </li>
        </div>
    <?php } ?>
            </div>
        <!-- <a data-toggle="tooltip" title="Tham quan các sản phẩm của chúng tôi!" class="navbar-brand" href="?pages=product">
            <img src="images/icon/logostore.png" style="width: 250px; height: 60px;"  width="30" height="30" alt="">
        </a> -->


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


    </ul>
    </ul>
    </div>
    </nav>
    </form>
    <div class="overflow">