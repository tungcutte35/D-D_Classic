<?php
    include '../config/connect.php';

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        $query = mysqli_query($conn,"UPDATE giohang SET size ='$size', soluong = '$quantity' WHERE id = '$id' ");

        if($query) {
            header('location: giohang.php');
        }
    }


?>