<?php

$keyword_don_hang = isset($_GET['keyword_don_hang']) ? $_GET['keyword_don_hang'] : '';
$don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
WHERE donhang.email LIKE '$keyword_don_hang' OR donhang.phone LIKE '$keyword_don_hang' ");


?>


<div class="container-fluid">
<br>
<h3>Tìm kiếm đơn hàng tại đây</h3>
    <form action="" method="GET">
        <input type="hidden" name="pages" value="kiemtra_donhang">
        <div class="input-group mb-3">
            <input require type="text" class="form-control" placeholder="Nhập email hoặc số điện thoại đặt hàng của bạn ..." name="keyword_don_hang">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit"><img src="images/icon/search.png" style="width: 20px;" alt=""></button>
            </div>
        </div>
    </form>
<br>
    <h2>Thông tin đơn hàng của bạn <span class="badge badge-secondary badge-pill"></span></h2>

  <?php  if($keyword_don_hang != '' ) {  ?>

    <?php foreach ($don_hang as $key => $value) { ?>
        <div class="row giohang ">

            <div class=" col-sm-1 col-md-1 col-lg-1">STT:
                <?= $key + 1 ?>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2"> Mã đơn:
                <?= $value['ma_donhang'] ?>
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3"> Ngày đặt:
                <?= $value['ngay_dat'] ?>
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
            <div class=" col-sm-3 col-md-3 col-lg-3"> Thông tin:
                <a href="?pages=chitiet_donhang&ma_donhang=<?= $value['ma_donhang'] ?>" class="btn btn-outline-secondary">Xem chi tiết</a>
            </div>
        </div>
    <?php } ?>

<?php } else { ?>

<?php } ?>


</div>