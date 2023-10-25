<?php
// $query = mysqli_query($conn,"SELECT * FROM carousel WHERE id = $id");
// $img = mysqli_fetch_assoc($query);

$new_product = mysqli_query($conn,"SELECT * FROM product ORDER BY id_product DESC LIMIT 8");



?>
<!-- Carousel băng chuyền ảnh -->
<div id="carousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 1");
                                    $img = mysqli_fetch_assoc($query);
                                    echo $img['img']   ?>" alt="Thời Trang Nam">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 2");
                                    $img = mysqli_fetch_assoc($query);
                                    echo $img['img'] ?>" alt="Thời Trang Nữ">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 3");
                                    $img = mysqli_fetch_assoc($query);
                                    echo $img['img'] ?>" alt="Thời Trang Gay">
        </div>

    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>

<!-- banner -->
<div class="row">
    <div class="col-sm-4">
        <!-- <h2>Sản Phẩm</h2> -->
        <a data-toggle="tooltip" title="Thời trang nữ!" href="?pages=product"> <img src="images/banner.jpg" alt=""></a>
        <hr>
        <a href="#"> <img src="images/slide3.jpg" alt=""></a>
    </div>
    <div class="col-sm-8">
        <a data-toggle="tooltip" title="Thời trang nam!" href="?pages=product"> <img src="images/banner_top_img.png" alt=""></a>
    </div>
</div>
<div class="container-fluid">
<h2 class="text-center">Sản phẩm mới</h2>
<br>

    <div class="row padding">
        <?php foreach($new_product as $key => $value) { ?>
            <a data-toggle="tooltip" title="Chi tiết sản phẩm !" href="?pages=chitietsanpham&sanpham=<?php echo$value['id_product'] ?>">
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card text-left">
                <img height="460px" width="100%" class="img_product" src="uploads/<?php echo $value['anh_sanpham'] ?>" alt="">
                <div class="card-body text-center">
                    <h4 class="card-title"><?php echo $value['ten_sanpham'] ?></h4>
                    <?php if($value['gia_khuyenmai'] > 0) { ?>
                    <p>
                        <span><del><?php echo number_format($value['gia_sanpham']) ?> VND</del></span>&nbsp; Giảm:
                        <?php $khuyenmai = 100 - (($value['gia_khuyenmai'])/($value['gia_sanpham']) * 100) ?>
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
        <?php  } ?>
    </div>
</div>
<div class="text-center"><a data-toggle="tooltip" class="btn btn-outline-dark" title="Tham quan các sản phẩm của chúng tôi!"
 href="?pages=product"><h2>Xem thêm sản phẩm tại đây</h2></a></div>



<hr class="my-4">