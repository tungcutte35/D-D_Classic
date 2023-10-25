<?php

// $query_user = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_user'");
// $khachhang = mysqli_fetch_assoc($query_user);


$trangthai = 0;

if (isset($_POST['submit'])) {
  $phone = $_POST['phone'];
  $diachi = $_POST['diachi'];
  $name = $_POST['name'];
  $ghichu = $_POST['ghichu'];
  $thanhtoan = $_POST['thanhtoan'];
  $id_user = $_POST['id_user'];
  $rd_mahang = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $ma_donhang = '01' . substr(str_shuffle($rd_mahang), 0, 10);


  $diachi_donhang = mysqli_query($conn, "INSERT INTO diachi_donhang(ma_donhang,id_user,phone,diachi,ghichu,thanhtoan,trang_thai,name)
  VALUES ('$ma_donhang','$id_user','$phone','$diachi','$ghichu','$thanhtoan','$trangthai','$name')");

  if ($diachi) {

    for ($i = 0; $i < count($_POST['id_product']); $i++) {
      $id_product = $_POST['id_product'][$i];
      $size = $_POST['size'][$i];
      $soluong = $_POST['quantity'][$i];
      $gia_sanpham = $_POST['gia_sanpham'][$i];

      $dat_hang = mysqli_query($conn, "INSERT INTO donhang(ma_donhang,id_product,id_user,size,soluong,gia_sanpham,trang_thai) VALUES
      ('$ma_donhang','$id_product','$id_user','$size','$soluong','$gia_sanpham','$trangthai')");

      if ($dat_hang) {
        $xoa_giohang = mysqli_query($conn, "DELETE FROM giohang WHERE id_user = '$id_user'");
        if ($xoa_giohang) {
          header('location: ?pages=users');
        }
      }
    }
  }
}





?>



<body class="bg-light">

  <div class="container">
    <div class="py-5 text-center">



      <h2><img src="../images/icon/pair-of-bills.png" width="40px" alt=""> Thanh toán cho đơn hàng của bạn</h2>

    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted"><img src="../images/icon/cart.png" width="40px" alt=""> Giỏ hàng của bạn</span>
          <span class="badge badge-secondary badge-pill"><?php echo mysqli_num_rows($giohang) ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php $total = 0;
          $giasanpham = 0;
          foreach ($giohang as $key => $value) {  ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>

                <h6 class="my-0"><span class="badge badge-secondary badge-pill"><?php echo $key + 1 ?></span> <?php echo $value['ten_sanpham'] ?></h6>

                <small class="text-muted"><?php echo $value['soluong'] ?> Cái, &nbsp; Cỡ <?php echo $value['size'] ?> </small>
              </div>
              <span class="text-muted"><?php echo number_format($giasanpham = $value['gia_sanpham'] * $value['soluong']) ?> VND</span>
            </li>
          <?php $total += $giasanpham;
          }  ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng cộng (VND)</span>
            <strong><?php echo number_format($total) ?> VND</strong>
          </li>
        </ul>
      </div>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Địa chỉ thanh toán</h4>

        <form class="needs-validation" novalidate="" method="POST" action="">


          <div class="mb-3">
            <label for="Name">Tên</label>
            <input type="text" class="form-control" id="Name" placeholder="Tên người dùng" value="<?php echo $user['name']; ?>" required="" name="name">
            <div class="invalid-feedback">
              Không được bỏ trống trường này.
            </div>
          </div>


          <div class="mb-3">
            <label for="email">Email <span class="text-muted" _istranslated="1">(Tùy chọn)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $user['email']; ?>" name="email">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="sdt">Số điện thoại</label>
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
              <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="thanhtoan" value="1" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="debit">Bank tiền thẻ (cái này thì chưa có nghe)</label>
            </div>

          </div>

          <hr class="mb-4">



          <button onclick="return confirm('Thanh toán đơn hàng này !');" class="btn btn-secondary btn-lg btn-block" name="submit" type="submit">Đặt hàng</button>
          <br>

          <div class="row">
            <input type="text" hidden name="id_user" value="<?php echo $user['id'] ?>">
            <input type="text" hidden name="name" value="<?php echo $user['name'] ?>">
            <?php foreach ($giohang as $key => $value) { ?>

              <input type="text" hidden name="size[]" value="<?php echo $value['size'] ?>">
              <input type="text" hidden name="quantity[]" value="<?php echo $value['soluong'] ?>">
              <input type="text" hidden name="gia_sanpham[]" value="<?php echo $value['gia_sanpham'] ?>">
              <input type="text" hidden name="id_product[]" value="<?php echo $value['id_product'] ?>">
            <?php } ?>
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
