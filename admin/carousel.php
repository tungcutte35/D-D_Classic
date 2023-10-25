<?php 
    include 'header.php';

    $query = mysqli_query($conn,"SELECT * FROM carousel");
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
        <h5>Ảnh carousel:</h5>

        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>STT hiện thị</th>
                    <th>Ảnh </th>
                    <th>Sửa</th>
  
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $key => $value) { ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><img src="../uploads/<?php echo $value['img'] ?>" alt="" width="500px"></td>
                    <td><a class="btn btn-outline-info" href="repair_carousel.php?id=<?php echo $value['id'] ?>">Sửa</a></td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- <br>
        <h2>Ảnh banner:</h2>
        <table border="1" class="tabledanhsach">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh thời trang nữ</th>
                    <th>Ảnh thời trang nam</th>
                    <th>Sửa</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td><a class="btn btn-warning" href="repair_carousel.php?id=<?php echo $value['id_product'] ?>">Sửa</a></td>
                </tr>
            </tbody>
        </table> -->



<?php 
     include 'footer.php';
?>