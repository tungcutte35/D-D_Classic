<?php
    include 'header.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($conn,"SELECT * FROM carousel WHERE id = $id");
        $img = mysqli_fetch_assoc($query);
    }
    
    if(isset($_POST['submit'])) {

        if (isset($_FILES['img'])) {
            $file = $_FILES['img'];
            $file_name = $file['name'];
    
            if (empty($file_name)) {
                $file_name = $img['img'];
            } else {
                move_uploaded_file($file['tmp_name'], '../uploads/' .$file_name);
            }
        }

    
    $sql = "UPDATE carousel SET img = '$file_name' WHERE id = $id";

    $truyvan = mysqli_query($conn, $sql);

    if ($truyvan) {
        header('location: carousel.php');
    } else {  ?>

        <script>
            alert("Sửa mới thất bại !");
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
    <a class="nav-link " href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
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

<br>
<h5>Sửa ảnh carousel</h5>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <input type="file" class="form-control-file border" name="img">
      <br>
      <img src="../uploads/<?php echo $img['img'] ?>" alt="" width="500px">
    </div>
    <button type="submit" name="submit" class="btn btn-outline-primary">Sửa</button>
  </form>

<?php 

    include 'footer.php';
?>