<?php
    include '../config/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM `admin` WHERE id = $id");

    if($query) {
        header('location: member.php');
    }
    else {
        ?>
    <script> alert("Xóa không thành công");</script>
        <?php
    }
    }

?>