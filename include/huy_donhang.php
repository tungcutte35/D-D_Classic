<?php
include '../config/connect.php';

if(isset($_GET['ma_donhang'])) {
    $ma_donhang = $_GET['ma_donhang'];

    $huydon = mysqli_query($conn,"DELETE FROM donhang WHERE ma_donhang = '$ma_donhang' ");

    $huy_dia_chi_donhang = mysqli_query($conn,"DELETE FROM diachi_donhang WHERE ma_donhang = '$ma_donhang'");

    if($huy_dia_chi_donhang) {
        header("location: ../?pages=kiemtra_donhang");
    }
}



?>