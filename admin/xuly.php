<?php
include 'header.php';



// $user = $_SESSION['user'];
// $id_user = $user['id'];

if (isset($_GET['ma_donhang'])) {
    $ma_donhang = $_GET['ma_donhang'];


    $sl_donhang = mysqli_query($conn,"SELECT * FROM donhang WHERE ma_donhang = '$ma_donhang' ");


    $cac_don_hang1 = mysqli_query($conn, "SELECT *  FROM diachi_donhang WHERE ma_donhang = '$ma_donhang' ORDER BY trang_thai ASC ");
    $cac_don_hang = mysqli_fetch_assoc($cac_don_hang1);


    $don_hang = mysqli_query($conn, "SELECT donhang.*,product.ten_sanpham AS 'ten_sanpham' FROM donhang INNER JOIN product ON donhang.id_product = product.id_product
WHERE ma_donhang ='$ma_donhang' ");
}

if(isset($_POST['xacnhandon'])) {
    $thanhtoan = $_POST['xacnhandon'];

    $xulydonhang = mysqli_query($conn,"UPDATE donhang SET trang_thai ='$thanhtoan' WHERE ma_donhang = '$ma_donhang'");
    $xulydiachi_donhang = mysqli_query($conn,"UPDATE diachi_donhang SET trang_thai ='$thanhtoan' WHERE ma_donhang = '$ma_donhang'");
    for ($i = 0; $i < count($_POST['id_product']); $i++) {
        $id_product = $_POST['id_product'][$i];
        $soluong = $_POST['soluong'][$i];
    $update_soluong = mysqli_query($conn,"UPDATE product SET soluong = (soluong - '$soluong') WHERE id_product = '$id_product' ");
    }

    if($update_soluong) {
        header('location: donhang.php');

}
}

if(isset($_POST['hoanthanh'])) {

    $thanhtoan = $_POST['hoanthanh'];

    $xuly_donhang = mysqli_query($conn,"UPDATE donhang SET trang_thai ='$thanhtoan' WHERE ma_donhang = '$ma_donhang'");
    $xuly_diachi_donhang = mysqli_query($conn,"UPDATE diachi_donhang SET trang_thai ='$thanhtoan' WHERE ma_donhang = '$ma_donhang'");

    if($xuly_diachi_donhang) {
        header('location: donhang.php');

}

}


?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Trang chính</a>
    </li>
    </li>  <li class="nav-item">
    <a class="nav-link " href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
    <li class="nav-item">
        <a class="nav-link " href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
  </li>
</ul>
<br>

<h5>Thông tin khách hàng <span class="badge badge-secondary badge-pill"></span></h5>


<table class="table table-striped">
    <tbody>
        <tr>
            <td>Mã đơn hàng </td>
            <td><?php echo $cac_don_hang['ma_donhang'] ?></td>
        </tr>
            <tr>
                <td>Họ và tên khách</td>
                <td><?php echo $cac_don_hang['name'] ?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo $cac_don_hang['phone'] ?></td>
            </tr>
            <tr>
                <td>Địa chỉ đơn hàng</td>
                <td><?php echo $cac_don_hang['diachi'] ?></td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td><?php echo $cac_don_hang['ghichu'] ?></td>
            </tr>
            <tr>
                <td>Cách thức thanh toán</td>
                <td><?php if ($cac_don_hang['thanhtoan'] == 0) {
                    echo ' Nhận tiền tại nhà ';
                } else {
                    echo ' Chuyển khoản qua Ngân Hàng';
                }
                ?></td>

        </tr>
           <tr>
               <td>Ngày đặt</td>
               <td><?php echo $cac_don_hang['ngay_dat'] ?></td>
           </tr>
           <tr>
               <td>Trạng thái đơn hàng</td>
               <td>           <?php if ($cac_don_hang['trang_thai'] == 0) { ?>
                        <p>Chưa xác nhận</p>
                    <?php  } elseif ($cac_don_hang['trang_thai'] == 1) { ?>
                        <p>Đang giao hàng</p>
                    <?php  } else { ?>
                        <p>Đã hoàn thành</p>
                    <?php  }  ?></td>
           </tr>
    </tbody>
</table>
<h5>Thông tin các sản phẩm đơn hàng</h5>
<table class="table table-striped">
    <thead>

        <tr>
            <th>STT</th>
            <th>id sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>size</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>

        </tr>
    </thead>
    <tbody>
        <?php $total = 0;
          $giasanpham = 0;
         foreach ($don_hang as $i => $giatri) { ?>
            <tr>
                <td><?php echo $i + 1 ?></td>
                <td><?php echo $giatri['id_product'] ?></td>
                <td><?php echo $giatri['ten_sanpham'] ?></td>
                <td><?php echo $giatri['size'] ?></td>
                <td><?php echo $giatri['soluong'] ?></td>
                <td><?php echo number_format($giasanpham = $giatri['gia_sanpham'] * $giatri['soluong']) ?> VND</td>
            <?php $total += $giasanpham; } ?>
            </tr>
            <tr>
                <td>Tổng tiền đơn hàng</td>
                <td colspan="5"><?php echo number_format($total)?> VND</td>
            </tr>
    </tbody>
</table>

<?php
?>



<?php if($cac_don_hang['trang_thai'] == 2) { ?>

    <a href="donhang.php" class="btn btn-outline-success">Đơn đã hoàn thành</a>
    <br>

    <?php  } elseif($cac_don_hang['trang_thai'] == 0) { ?>
<div class="container-fluid">
    <div class="row">

        <form action="" method="POST">


            <div class="custom-control custom-radio">
                <input id="credit" name="xacnhandon" value="1" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Xác nhận đơn (Giao hàng) </label>
            </div>
            <div class="custom-control custom-radio">
                <input id="debit" name="xacnhandon" value="2" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Đã hoàn thành </label>


            </div>
            <?php foreach($sl_donhang as $i => $value) { ?>
            <input type="hidden" name="soluong[]"  value="<?php echo $value['soluong']  ?>" >
            <input type="hidden" name="id_product[]" value="<?php echo $value['id_product']  ?>">
            <?php } ?>
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-outline-info">
    </div>
</div>
<?php } else { ?>

    <div class="container-fluid">
    <div class="row">

        <form action="" method="POST">

            <div class="custom-control custom-radio">
                <input id="debit" name="hoanthanh" value="2" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Đã hoàn thành </label>
            </div>
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-outline-info">
    </div>
</div>

    <?php  } ?>
<?php
include 'footer.php';
?>