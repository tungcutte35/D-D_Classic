<?php


if (isset($_GET['sanpham'])) {
    $id_product = $_GET['sanpham'];

    $product = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '$id_product'");
    $sanpham = mysqli_fetch_assoc($product);
    // lấy ảnh mô tả 
    $img_pro = mysqli_query($conn, "SELECT * FROM img_product WHERE id_product = $id_product");
}






?>
<br>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left">
                    <img id="zoom" class="card-img-top" src="uploads/<?php echo $sanpham['anh_sanpham'] ?>" alt="">

                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body-ml-auto">
                    <h4 class="card-title"><?php echo $sanpham['ten_sanpham'] ?></h4>

                    <?php if ($sanpham['gia_khuyenmai'] > 0) { ?>
                        <p>
                            <span><del><?php echo number_format($sanpham['gia_sanpham']) ?> VND</del></span>&nbsp; Giảm:
                            <?php $khuyenmai = 100 - (($sanpham['gia_khuyenmai']) / ($sanpham['gia_sanpham']) * 100) ?>
                            <?php echo number_format($khuyenmai) ?>%
                        </p>
                        <p>
                            <span><?php echo number_format($sanpham['gia_khuyenmai']) ?> VND</span>
                        </p>
                    <?php } else { ?>
                        <p>
                            <span><?php echo number_format($sanpham['gia_sanpham']) ?> VND</span>

                        </p>
                        <p>
                            <span>&nbsp;</span>
                        </p>
                    <?php } ?>


                    <p class="card-text">Chi tiết :<span><?php echo $sanpham['chitiet'] ?></span></p>
                    <?php if (isset($user['name'])) { ?>
                    <form action="?pages=giohang" method="POST">

                        <input checked type="radio" id="sizex" value="X" name="size">
                        <label for="sizex" class="btn btn-outline-secondary ">X</label>
                        <input type="radio" id="sizes" value="S" name="size">
                        <label for="sizes" class="btn btn-outline-secondary ">S</label>
                        <input type="radio" id="sizem" value="M" name="size">
                        <label for="sizem" class="btn btn-outline-secondary ">M</label>
                        <input type="radio" id="sizel" value="L" name="size">
                        <label for="sizel" class="btn btn-outline-secondary ">L</label>


                        <?php foreach ($product as $key => $value); ?>
                        &nbsp;&nbsp;Số lượng: <input class="quantity" type="number" value="1" name="quantity" min="1" max="<?php echo $sanpham['soluong'] ?>">

                        <input type="hidden" name="id_product" value="<?php echo $sanpham['id_product'] ?>" />
                        <?php if (isset($user['id'])) { ?>
                            <input type="hidden" name="id_user" value="<?php echo $user['id'] ?>" />
                        <?php   } else { ?>

                        <?php } ?>
                        <input type="hidden" name="ten_sanpham" value="<?php echo $sanpham['ten_sanpham'] ?>" />
                        <input type="hidden" name="anh_sanpham" value="<?php echo $sanpham['anh_sanpham'] ?>" />
                        <input type="hidden" name="gia_sanpham" value="<?php if ($sanpham['gia_khuyenmai'] > 0) {
                                                                            echo $gia_sanpham = $sanpham['gia_khuyenmai'];
                                                                        } else {
                                                                            echo  $gia_sanpham = $sanpham['gia_sanpham'];
                                                                        }; ?>" />

                        <br><br>

                        <?php if ($value['soluong'] > 0) { ?>

                        <?php } else { ?>
                            <a class="btn btn-secondary disabled" href="">Hết hàng !</a>
                        <?php }  ?>
                        <?php if (isset($user['name']) && ($value['soluong'] > 0)) { ?>

                            <input value="Mua ngay" class="btn btn-secondary" name="muangay" type="submit">


                            <input value="thêm vào giỏ hàng" class="btn btn-secondary" name="themgiohang" type="submit" onclick="return alert('Thêm sản phẩm <?php echo $value['ten_sanpham'] ?> vào giỏ');">
                    </form> <!-- <img src="../images/icon/cart.png" width="20px" alt=""> Thêm vào giỏ --> 
                        <?php } else { ?>
                            <!-- <a class="btn btn-secondary disabled" href="">Thêm vào giỏ hàng !</a> -->
                        <?php } ?>

                </div>
            </div>
        </div>

    </div>

    <!--  -->
<?php } else { ?>


    <!--  -->

                    <form action="?pages=muangay" method="POST">

                        <input checked type="radio" id="sizex" value="X" name="size">
                        <label onclick=" click_size()" id="1" for="sizex" class="btn btn-outline-secondary 1 ">X</label>
                        <input  type="radio" id="sizes" value="S" name="size">
                        <label onclick=" click_size()" for="sizes" class="btn btn-outline-secondary 1 ">S</label>
                        <input type="radio" id="sizem" value="M" name="size">
                        <label onclick=" click_size()" for="sizem" class="btn btn-outline-secondary 1 ">M</label>
                        <input type="radio" id="sizel" value="L" name="size">
                        <label onclick=" click_size()" for="sizel" class="btn btn-outline-secondary 1 ">L</label>


                        <?php foreach ($product as $key => $value); ?>
                        &nbsp;&nbsp;Số lượng: <input class="quantity" type="number" value="1" name="quantity" min="1" max="<?php echo $sanpham['soluong'] ?>">

                        <input type="hidden" name="id_product" value="<?php echo $sanpham['id_product'] ?>" />
                        <?php if (isset($user['id'])) { ?>
                            <input type="hidden" name="id_user" value="<?php echo $user['id'] ?>" />
                        <?php   } else { ?>

                        <?php } ?>
                        <input type="hidden" name="ten_sanpham" value="<?php echo $sanpham['ten_sanpham'] ?>" />
                
                        <input type="hidden" name="gia_sanpham" value="<?php if ($sanpham['gia_khuyenmai'] > 0) {
                                                                            echo $gia_sanpham = $sanpham['gia_khuyenmai'];
                                                                        } else {
                                                                            echo  $gia_sanpham = $sanpham['gia_sanpham'];
                                                                        }; ?>" />

                        <br><br>

                        <?php if ($value['soluong'] > 0) { ?>
                            <input value="Mua ngay" class="btn btn-secondary" name="mua_ngay" type="submit">
                        <?php } else { ?>
                            <a class="btn btn-secondary disabled" href="">Hết hàng !</a>
                        <?php }  ?>
    
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <br>
        <h3>Ảnh mô tả</h3>
        <div class="row ne">
            <?php foreach ($img_pro as $key => $value) {   ?>
                <div class="col-sm-4">
                    <img src="uploads/<?php echo $value['anh_mota'] ?>" width="220px" alt="">
                </div>
            <?php } ?>

        </div>

    </div>





<script>
    // function click_size() {
    // var d = document.getElementsByClassName("btn btn-outline-secondary 1");
    // d[0].style.backgroundColor = "black";
    // if(!d) {

    // d[0].classList.remove('active');
    // }

//     document.getElementsByClassName("btn btn-outline-secondary 1").classList.add('active');
 
//  document.getElementsByClassName("btn btn-outline-secondary 1").classList.remove('active');
  
//  if ( document.getElementsByClassName("btn btn-outline-secondary 1").classList.contains('active') )
  
//  document.getElementsByClassName("btn btn-outline-secondary 1").classList.toggle('active');
    // }

</script>

<script async='async' src="../js/jquery.elevatezoom.min.js"></script>
<script>
    //<![CDATA[

    window.addEventListener('load', function() {

        $("#zoom").elevateZoom({

            scrollZoom: true

        });

    })

    //]]>
</script>
