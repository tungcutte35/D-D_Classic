<?php

// $don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
// WHERE id_user ='$id_user'");
// $donhang = mysqli_fetch_assoc($don_hang);
if (isset($_GET['ma_donhang'])) {
    $ma_donhang = $_GET['ma_donhang'];
    $cac_don_hang = mysqli_query($conn, "SELECT *  FROM diachi_donhang WHERE ma_donhang ='$ma_donhang'");

    $don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
  WHERE ma_donhang ='$ma_donhang' ");
}

// if($donhang  == 0) {
//     header('location: giohang.php');
// } 
?>


<div class="container-fluid">
    <h2>Thông tin đơn hàng của bạn <span class="badge badge-secondary badge-pill"></span></h2>

    <?php foreach ($cac_don_hang as $key => $value) { ?>
        <div class="row giohang ">


            <div class=" col-sm-3 col-md-3 col-lg-3"> Mã đơn:
                <?php echo $value['ma_donhang'] ?>
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3"> Ngày đặt:
                <?php echo $value['ngay_dat'] ?>
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3"> Trạng thái:
                <?php if ($value['trang_thai'] == 0) { ?>
                    <i class="text-secondary">Chưa xác nhận</i>
                <?php  } elseif ($value['trang_thai'] == 1) { ?>
                    <i class="text-info">Đang giao hàng</i>
                <?php  } else { ?>
                    <i class="text-success">Đã hoàn thành</i>
                <?php  }  ?>

            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3">
                <?php if ($value['trang_thai'] == 0) { ?>
                    <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng <?php echo $value['ma_donhang'] ?> không ?')" href="include/huy_donhang.php?ma_donhang=<?php echo $value['ma_donhang'] ?>" class="btn btn-outline-danger">Hủy đơn</a>
                <?php  } else { ?>

                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <h2>Danh sách các sản phẩm</h2>
    <?php $total = 0;
    $giasanpham = 0;
    foreach ($don_hang as $i => $giatri) { ?>
        <div class="row giohang ">

            <div class=" col-sm-1 col-md-1 col-lg-1">STT:
                <?= $i + 1 ?>
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3"> Tên SP:
                <?= $giatri['ten_sanpham'] ?>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2"> cỡ:
                <?= $giatri['size'] ?>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2"> sl:
                <?= $giatri['soluong'] ?>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2"> Giá:
                <?= number_format($giasanpham = $giatri['gia_sanpham'] * $giatri['soluong']) ?> VND
            </div>


            <div class=" col-sm-2 col-md-2 col-lg-2">
                <a href="?pages=chitietsanpham&sanpham=<?= $giatri['id_product'] ?>" class="btn btn-outline-secondary">Chi tiết SP</a>
            </div>
        </div>
    <?php $total += $giasanpham;
    } ?>
    <div class="row giohang ">
        <div class=" col-sm-10 col-md-10 col-lg-10">Địa chỉ:
            <?php echo $value['diachi'] ?>
        </div>
        <div class=" col-sm-10 col-md-10 col-lg-10">SDT: <?= $value['phone'] ?> </div>
        <div class=" col-sm-10 col-md-10 col-lg-10">Ghi chú của bạn:
            <?php echo $value['ghichu'] ?>
        </div>
        <div class=" col-sm-10 col-md-10 col-lg-10">Hình thức thanh toán:
            <?php if ($value['thanhtoan'] == 0) {
                echo '<p> Nhận tiền tại nhà </P>';
            } else {
                echo '<p> Chuyển khoản qua thẻ (Chưa có =[[)</P>';
            } ?>
        </div>

        <div class=" col-sm-10 col-md-10 col-lg-10">
           Tổng: <?php echo number_format($total) ?> VND
        </div>
    </div>

</div>