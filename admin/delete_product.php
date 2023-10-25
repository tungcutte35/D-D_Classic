<?php
    include '../config/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM product WHERE id_product = $id");

    if($query) {
        header('location: product.php');
    }
    else {
        ?>
    <script> alert("Xóa không thành công");</script>
        <?php
    }
    }

?>