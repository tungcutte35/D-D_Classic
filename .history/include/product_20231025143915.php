<?php


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc WHERE product.ten_sanpham LIKE '%$keyword%' ");

$limit = 9;
$total_page = ceil(mysqli_num_rows($product) / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
$star = ($cr_page - 1) * $limit;
// $product = mysqli_query($conn, "SELECT * FROM product LIMIT $star,$limit");
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc ORDER BY id_product DESC  LIMIT $star,$limit ");

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $sql = "SELECT product.*,danhmuc.ten_danhmuc AS 'ten_danhmuc' FROM product JOIN danhmuc ON product.id_danh_muc = danhmuc.id_danhmuc
    WHERE product.ten_sanpham LIKE '%$keyword%' LIMIT $star,$limit ";
  $product = mysqli_query($conn, $sql);
}
if (isset($_GET['id_danhmuc'])) {
  $id_danhmuc = $_GET['id_danhmuc'];

  $product = mysqli_query($conn, "SELECT * FROM product WHERE id_danh_muc ='$id_danhmuc' ");


  $limit = 12;
  $total_page = ceil(mysqli_num_rows($product) / $limit);
  $cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
  $star = ($cr_page - 1) * $limit;
  // $product = mysqli_query($conn, "SELECT * FROM product LIMIT $star,$limit");
  $product = mysqli_query($conn, "SELECT * FROM product WHERE id_danh_muc ='$id_danhmuc'  LIMIT $star,$limit ");

  $danh_muc = mysqli_query($conn, "SELECT * FROM danhmuc WHERE id_danhmuc ='$id_danhmuc'");

  $danh_mu_c = mysqli_fetch_assoc($danh_muc);
}
?>

<div class="container-fluid">
  <br>
  <div class="row padding">
    <div class="col-lg-3">
      <ul class="list-group">
        <h2 class="text-center">
        Danh mục sản phẩm
      </h2>
       <a href="?pages=product"><li class="list-group-item d-flex justify-content-between align-items-center">
          Tất cả sản phẩm
        </li></a>
      <?php foreach($danhmuc as $danhm): ?>
       <a href="?pages=product&id_danhmuc=<?=$danhm['id_danhmuc']?>"> <li class="list-group-item d-flex justify-content-between align-items-center">
          <?=$danhm['ten_danhmuc']?>
        </li></a>
       <?php endforeach ?>
      </ul>
    </div>
    <div class="col-lg-9">
      <?php if (isset($_GET['keyword'])) { ?>
        <h2 class="text-center"  >Kết quả tìm kiếm cho: <?php echo $keyword ?></h2>
      <?php } elseif (isset($_GET['danhmuc'])) { ?>
        <h2>Thời trang <?php echo $danh_mu_c['ten_danhmuc'] ?></h2>
      <?php } else { ?>
        <h2 class="text-center" >Danh sách các sản phẩm</h2>
      <?php } ?><br>
      <div class="row">
        <?php foreach ($product as $key => $value) { ?>
          <a data-toggle="tooltip" title="Chi tiết sản phẩm !" href="?pages=chitietsanpham&sanpham=<?php echo $value['id_product'] ?>">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-left">
                <img class="img_product" src="uploads/<?php echo $value['anh_sanpham'] ?>" alt="">
                <div class="card-body text-center">
                  <h4 class="card-title"><?php echo $value['ten_sanpham'] ?></h4>
                  <?php if ($value['gia_khuyenmai'] > 0) { ?>
                    <p>
                      <span><del><?php echo number_format($value['gia_sanpham']) ?> VND</del></span>&nbsp; Giảm:
                      <?php $khuyenmai = 100 - (($value['gia_khuyenmai']) / ($value['gia_sanpham']) * 100) ?>
                      <?php echo number_format($khuyenmai) ?>%
                    </p>
                    <p>
                      <span><?php echo number_format($value['gia_khuyenmai']) ?> VND</span>
                    </p>
                  <?php } else { ?>
                    <p>
                      <span><?php echo number_format($value['gia_sanpham']) ?> VND</span>

                    </p>
                    <p>
                      <span>&nbsp;</span>
                    </p>
                  <?php } ?>

                  <a class="" href=""></a>
                  </p>

                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
  <br>
  <ul class="pagination justify-content-center">
    <?php if ($cr_page > 1) { ?>
      <li class="page-item"><a class="page-link" href="?pages=product&page=<?php echo $cr_page - 1 ?><?php echo ($keyword != '') ? "&keyword=$keyword" : '' ?>">Trước</a></li>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
      <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>"><a class="page-link" href="?pages=product&page=<?php echo $i ?><?php echo ($keyword != '') ? "&keyword=$keyword" : '' ?>"><?php echo $i ?></a></li>
    <?php } ?>
    <?php if ($cr_page < $total_page) { ?>
      <li class="page-item"><a class="page-link" href="?pages=product&page=<?php echo $cr_page + 1 ?><?php echo ($keyword != '') ? "&keyword=$keyword" : '' ?>">Sau</a></li>
    <?php } ?>
  </ul>

  <hr class="my-4">