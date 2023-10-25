<?php


// mua hàng
$trangthai = 0;

if (isset($_POST['submit'])) {
  $phone = $_POST['phone'];
  $diachi = $_POST['diachi'];
  $ghichu = $_POST['ghichu'];
  $thanhtoan = $_POST['thanhtoan'];
  $email = $_POST['email'];
  $id_user = $_POST['id_user'];
  $rd_mahang = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $ma_donhang = '01' . substr(str_shuffle($rd_mahang), 0, 10);
  $id_product = $_POST['id_product'];
  $size = $_POST['size'];
  $soluong = $_POST['quantity'];
  $gia_sanpham = $_POST['gia_sanpham'];
  $name = $_POST['name'];


  $diachi_donhang = mysqli_query($conn,"INSERT INTO diachi_donhang(ma_donhang,id_user,phone,diachi,ghichu,thanhtoan,trang_thai,name,email)
  VALUES ('$ma_donhang','$id_user','$phone','$diachi','$ghichu','$thanhtoan','$trangthai','$name','$email')");

  if ($diachi) {

      $dat_hang = mysqli_query($conn, "INSERT INTO donhang(ma_donhang,id_product,id_user,size,soluong,gia_sanpham,trang_thai,email,phone) VALUES
      ('$ma_donhang','$id_product','$id_user','$size','$soluong','$gia_sanpham','$trangthai','$email','$phone')");

if($dat_hang) {
    header('location: ?pages=users');
}

  }
}
//


if (isset($_POST['themgiohang'])) {
  $id_product = $_POST['id_product'];
  $id_user = $_POST['id_user'];
  $ten_sanpham = $_POST['ten_sanpham'];
  $anh_sanpham = $_POST['anh_sanpham'];
  $size = $_POST['size'];
  $quantity = $_POST['quantity'];
  $gia_sanpham = $_POST['gia_sanpham'];

  $select_giohang = mysqli_query($conn, "SELECT * FROM giohang WHERE id_product = '$id_product' AND id_user ='$id_user'");
  $sanpham_id = mysqli_fetch_assoc($select_giohang);
  if ($sanpham_id['id_product'] > 0) {

?>
    <script>
      alert("Sản phẩm đã có trong giỏ hàng !");
    </script>

    <?php

  } else {
    $themvaogio = mysqli_query($conn, "INSERT INTO giohang(id_product,id_user,ten_sanpham,anh_sanpham,size,soluong,gia_sanpham)
    VALUES('$id_product','$id_user','$ten_sanpham','$anh_sanpham','$size','$quantity','$gia_sanpham' ) ");
    if ($themvaogio) {
      header("location: ?pages=giohang");
    } else {
    ?>
      <script>
        alert("Thêm thất bại");
      </script>
    <?php
    }
  }
}
// $sql_selectgiohang = mysqli_query($conn, "SELECT * FROM giohang WHERE sanpham_id ='$sanpham_id'");
// $count = mysqli_num_rows($sql_selectgiohang);
// header("location:javascript://history.go(-1)");



if (isset($_POST['capnhat'])) {

  for ($i = 0; $i < count($_POST['id_product']); $i++) {

    $id_product = $_POST['id_product'][$i];
    $size = $_POST['size'][$i];
    $quantity = $_POST['quantity'][$i];


    $capnhat = mysqli_query($conn, "UPDATE giohang SET size ='$size', soluong ='$quantity' WHERE id_product ='$id_product' AND id_user = '$id_user'");

    header('location:?pages=giohang');
  }
}

$sl_tronggio = mysqli_num_rows($giohang);

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
if (!isset($user['name'])) {
  header('location: ?pages=users');


} else {

  if (isset($_POST['muangay'])) {
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $size = $_POST['size'];
    $soluong = $_POST['quantity'];
    $gia_sanpham = $_POST['gia_sanpham'];
    $san_pham_mua_1 = mysqli_query($conn, "SELECT ten_sanpham FROM product WHERE id_product ='$id_product' ");
    $san_pham = mysqli_fetch_assoc($san_pham_mua_1);



    // mua hang


    //

    ?>

    <div class="container">
      <div class="py-5 text-center">



        <h2><img src="images/icon/pair-of-bills.png" width="40px" alt=""> Thanh toán cho đơn hàng của bạn</h2>

      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><img src="images/icon/cart.png" width="40px" alt=""> Sản phẩm của bạn</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>

                <h6 class="my-0"><?php echo $san_pham['ten_sanpham']  ?></h6>
                <small class="text-muted"><?php echo $soluong ?> Cái, &nbsp; Cỡ <?php echo $size ?> </small>
              </div>
              <span class="text-muted"><?php echo number_format($giasanpham = $soluong * $gia_sanpham) ?> VND</span>
            </li>


          </ul>
        </div>

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Địa chỉ thanh toán</h4>

          <form class="needs-validation" novalidate="" method="POST" action="">


            <div class="mb-3">
              <label for="Name">Tên</label>
              <input type="text" class="form-control" id="Name" placeholder="Tên người của bạn" value="<?php echo $user['name']; ?>" required="" name="name">
              <div class="invalid-feedback">
                Không được bỏ trống trường này.
              </div>
            </div>


            <div class="mb-3">
              <label for="email">Email <span class="text-muted" _istranslated="1">(Lưu ý ghi nhớ email của bạn để kiểm tra đơn hàng)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $user['email']; ?>" name="email">
              <div class="invalid-feedback">
                Không được bỏ trống trường này.
              </div>
            </div>

            <div class="mb-3">
              <label for="sdt">Số điện thoại <span class="text-muted" _istranslated="1">(Lưu ý ghi nhớ số điện thoại của bạn để kiểm tra đơn hàng)</span></label>
              <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại người dùng" value="" required="" name="phone">
              <div class="invalid-feedback">
                Không được bỏ trống trường này.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">địa chỉ nhận hàng</label>
              <input type="text" class="form-control" id="address" placeholder="Vd: số 5 ngõ 32 đ.nguyễn viết xuân p.hưng dũng tp.vinh t.nghệ an" required="" name="diachi">
              <div class="invalid-feedback">
                Không được bỏ trống trường này.
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Ghi chú</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="text" class="form-control" id="username" required="" name="ghichu">
                <div class="invalid-feedback" style="width: 100%;">
                  Không được bỏ trống trường này.
                </div>
              </div>
            </div>

            <h4 class="mb-3">Thanh toán</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="thanhtoan" value="0" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Thanh toán khi giao hàng (COD)</label>
              </div>
              <div class="custom-control custom-radio ">
                <input id="debit" name="thanhtoan" value="1" type="radio" class="custom-control-input custom-control-input1" required="">
                <label class="custom-control-label" for="debit">
                Chuyển khoản qua ngân hàng
                </label>
                <br>
                <div class="active-ck1">
                  <p>MB - 12345678900-0</p>
                  <p>Chủ TK: Thanh Tung</p>
                  <p>Nội dung CK: "Tên_Sanpham_Sdt</p>

                </div>
              </div>

            </div>

            <hr class="mb-4">



            <button onclick="return confirm('Thanh toán đơn hàng này !');" class="btn btn-secondary btn-lg btn-block" name="submit" type="submit">Đặt hàng</button>
            <br>

            <div class="row">

              <input type="text" hidden name="id_user" value="<?php echo $user['id'] ?>">

              <input type="text" hidden name="size" value="<?php echo $size ?>">
              <input type="text" hidden name="quantity" value="<?php echo $soluong ?>">
              <input type="text" hidden name="gia_sanpham" value="<?php echo $gia_sanpham ?>">
              <input type="text" hidden name="id_product" value="<?php echo $id_product ?>">


            </div>

          </form>
        </div>

      </div>

    </div>
    <br>

    <script>
      (function() {
        'use strict';

        window.addEventListener('load', function() {

          var forms = document.getElementsByClassName('needs-validation');


          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();




    </script>









  <?php
  } else {
  ?>

    <br>
    <div class="container-fluid">
      <div class="text-center">
      <h2>Giỏ hàng của bạn</h2>
      </div>
      <br>
      <form method="POST" action="?pages=giohang">

        <?php $total = 0;
        $giasanpham = 0;
        foreach ($giohang as $key => $value) {
        ?>

          <div class="row giohang ">

            <div class=" col-sm-3 col-md-3 col-lg-3">
              <span class="badge badge-secondary badge-pill"><?php echo $key + 1 ?></span>
              Sản phẩm: <?php echo $value['ten_sanpham'] ?>

            </div>
            <div class=" col-sm-1 col-md-1 col-lg-1">
              <img class="img_giohang" src="uploads/<?php echo $value['anh_sanpham']  ?>" alt="" width="60px">

            </div>
            <div class="col-4 col-sm-1 col-md-1 col-lg-1">Cỡ:
              <select class=" size " name="size[]">
                <option class="" value="<?php echo $value['size'] ?>">-<?php echo $value['size'] ?> </option>
                <option class="" value="X"> X </option>
                <option class="" value="S"> S </option>
                <option class="" value="M"> M </option>
                <option class="" value="L"> L </option>
              </select>

            </div>
            <div class="col-4 col-sm-1 col-md-1 col-lg-1">
              <?php $idsanpham = $value['id_product'];
              $product = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '$idsanpham'");
              $sanpham = mysqli_fetch_assoc($product); ?>
              SL: <input class=" quantity" type="number" value="<?php echo $value['soluong'] ?>" name="quantity[]" min="1" max="<?php echo $sanpham['soluong'] ?>">

            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2">
              Giá: <?php echo number_format($value['gia_sanpham']) ?>

            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2">
              Tổng giá: <?php echo number_format($giasanpham = $value['gia_sanpham'] * $value['soluong']) ?>

            </div>
            <div class="col-4 col-sm-1 col-md-1 col-lg-1">
              <a class="btn btn-outline-secondary" href="?pages=chitietsanpham&sanpham=<?php echo $value['id_product'] ?>">Chi tiết</a>
            </div>
            <div class="col-4 col-sm-1 col-md-1 col-lg-1">
              <a class="btn btn-outline-secondary" onclick="return confirm('Xóa sản phẩm: <?php echo $value['ten_sanpham'] ?> không ?');" href="include/xoasanpham.php?id=<?php echo $value['id'] ?>">Xóa</a>
            </div>
            <input type="hidden" name="id_product[]" value="<?php echo $value['id_product']  ?>">
          </div>
          <br>
        <?php $total += $giasanpham;
        } ?>
        <div class="row">
          <?php if ($sl_tronggio > 0) { ?>
            <div class=" col-sm-4 col-md-3 col-lg-3 ">

              <input class="btn btn-outline-dark" type="submit" name="capnhat" value="Cập nhật giỏ hàng ">
            </div>
            <div class=" col-sm-4 col-md-3 col-lg-3 ml-auto">
              <p class="btn btn-dark">Tổng tiền tất cả sản phẩm: <?php echo number_format($total) ?> VND</p>
            </div>
          <?php } else { ?>
            <div class=" col-sm-4 col-md-3 col-lg-3 ">
              <p class="btn btn-dark">Giỏ hàng của bạn đang trống !</p>

            </div>
          <?php } ?>

        </div>
        <hr>

        <div class="row">

        </div>


        <div class="row">
          <?php
          if ($sl_tronggio > 0) { ?>
            <div class=" col-sm-4 col-md-3 col-lg-3">

              <a class="btn btn-outline-dark" href="?pages=thanhtoan&giohang=<?php echo $value['id_user'] ?>">
                Thanh toán giỏ hàng</a>
            </div>
          <?php } ?>

        </div>
        </form>
        <hr class="my-4">

    <?php }
} ?>

    </div>