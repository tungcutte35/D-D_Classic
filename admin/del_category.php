<?php
    include '../config/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM danhmuc WHERE id_danhmuc = $id");

    if($query) {
        header('location: category.php');
    }
    else {
        ?>
    <script> alert("Xóa không thành công");</script>
        <?php
    }
    }

?>