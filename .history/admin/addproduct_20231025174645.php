<?php
include 'header.php';

$danhmuc = mysqli_query($conn, "SELECT * FROM danhmuc");
if (isset($_POST['id_danh_muc'])) {
    $id_danh_muc = $_POST['id_danh_muc'];
    $ten_sanpham = $_POST['ten_sanpham'];

    if (isset($_FILES['anh_sanpham'])) {
        $file = $_FILES['anh_sanpham'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'],'../uploads/'.$file_name);
    }

    if(isset($_FILES['anh_mota'])){
        $files = $_FILES['anh_mota'];
        $files_name = $files['name'];
        foreach($files_name as $key => $value){
            move_uploaded_file($files['tmp_name'][$key],'../uploads/'.$value);
        }
    }

    $soluong = $_POST['soluong'];
    $gia_sanpham = $_POST['gia_sanpham'];
    $gia_khuyenmai = $_POST['gia_khuyenmai'];
    $chitiet = $_POST['chitiet'];

    $sql = "INSERT INTO product(id_danh_muc,ten_sanpham,anh_sanpham,soluong,gia_sanpham,gia_khuyenmai,chitiet) VALUES
    ('$id_danh_muc','$ten_sanpham','$file_name','$soluong','$gia_sanpham','$gia_khuyenmai','$chitiet')";

    $query = mysqli_query($conn, $sql);
    $id_pro = mysqli_insert_id($conn);

    foreach($files_name as $key => $value) {
        mysqli_query($conn,"INSERT INTO img_product(id_product,anh_mota) VALUES ('$id_pro','$value')");
    };

    if ($query) {
        header('location: product.php');
    } else {  ?>
         <script>
        alert("Thêm mới thất bại !");
         </script>
<?php
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
    <a class="nav-link active" href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="member.php"><i class="fas fa-address-card"></i> Thành viên</a>
  </li>
</ul>
<br>

<h5>Thêm mới sản phẩm</h5>
<br>

<form action="" method="POST" enctype="multipart/form-data" role="form">
    <div class="form-group">
        <label for="">Danh mục sản phẩm:</label>
        <select class="form-control" name="id_danh_muc" required="required">
            <option value="">----- Danh mục -----</option>
            <?php foreach ($danhmuc as $key => $value) {  ?>
                <option value="<?php echo $value['id_danhmuc'] ?>"><?php echo $value['ten_danhmuc']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tên sản phẩm:</label>
        <input type="text" class="form-control" placeholder="" id="" name="ten_sanpham" required="required" >
    </div>
    <div class="form-group">
        <label for="">Ảnh sản phẩm:</label>
        <input type="file" class="form-control-file border" name="anh_sanpham" required="required" >
    </div>
    <div class="form-group">
        <label for="">Ảnh mô tả:</label>
        <input type="file" class="form-control-file border" name="anh_mota[]" multiple >
    </div>
    <div class="form-group">
        <label for="">Số lượng:</label>
        <input type="text" class="form-control" placeholder="" id="" name="soluong" required="required" >
    </div>
    <div class="form-group">
        <label for="">Giá sản phẩm:</label>
        <input type="text" class="form-control" placeholder="" id="" name="gia_sanpham" required="required" >
    </div>
    <div class="form-group">
        <label for="">Giá khuyễn mãi:</label>
        <input type="text" class="form-control" placeholder="" id="" name="gia_khuyenmai" >
    </div>
    <div class="form-group">
        <label for="">Chi tiết sản phẩm:</label>
        <textarea class="form-control" rows="5" id="chitiet" name="chitiet" required="required" ></textarea>
    </div>

    <button name="submit" class="btn btn-outline-primary">Thêm mới</button>
</form>



<?php
include 'footer.php';
?>