<?php
    include '../config/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM giohang WHERE id = $id");

    if($query) {
        header('location: ../?pages=giohang');
    }
    else {
        ?>
    <script> alert("Xóa không thành công");</script>
        <?php
    }
    }


?>