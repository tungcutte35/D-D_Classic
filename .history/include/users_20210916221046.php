<?php
$user = $_SESSION['user'];

// kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('location: include/dangnhap.php');
}
$id_user = $user['id'];

// $don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
// WHERE id_user ='$id_user'");
// $donhang = mysqli_fetch_assoc($don_hang);

$cac_don_hang = mysqli_query($conn, "SELECT diachi_donhang.*,users.name AS 'ten_khachhang'  FROM diachi_donhang
INNER JOIN users ON diachi_donhang.id_user = users.id WHERE id_user = '$id_user'");




// if($donhang  == 0) {
//     header('location: giohang.php');
// } 
?>


<div class="container-fluid">
    <h2>Thông tin đơn hàng của bạn <span class="badge badge-secondary badge-pill"></span></h2>

    <?php foreach ($cac_don_hang as $key => $value) { ?>
    <div class="row giohang ">

<div class=" col-sm-1 col-md-1 col-lg-1">STT:
<?php echo $key + 1 ?>
</div>
<div class=" col-sm-2 col-md-2 col-lg-2"> Mã đơn:
<?php echo $value['ma_donhang'] ?>
</div>
<div class=" col-sm-3 col-md-3 col-lg-3"> Ngày đặt:
<?php echo $value['ngay_dat'] ?>
</div>
<div class=" col-sm-3 col-md-3 col-lg-3"> Trạng thái:
<?php if($value['trang_thai'] == 0) { ?>
                <i class="text-secondary">Chưa xác nhận</i>
            <?php  } elseif($value['trang_thai'] == 1) { ?>
                  <i class="text-info">Đang giao hàng</i>
              <?php  } else { ?>
                    <i class="text-success">Đã hoàn thành</i>
                <?php  }  ?>

</div>
<div class=" col-sm-3 col-md-3 col-lg-3"> Thông tin:
<a href="?pages=chitiet_donhangdat&ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-secondary">Xem chi tiết</a>
</div>
    </div>
    <?php } ?>




</div>
