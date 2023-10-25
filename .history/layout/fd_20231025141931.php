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
