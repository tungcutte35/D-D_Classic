<?php  
    include '../config/connect.php';

    if(isset($_GET['id_khach_hang'])) {
        $id_khach_hang = $_GET['id_khach_hang'];

        $xoa_khach_hang = mysqli_query($conn,"DELETE FROM users WHERE id = '$id_khach_hang' ");

        if($xoa_khach_hang) {
            header('location: users.php');
        }


    }


?>