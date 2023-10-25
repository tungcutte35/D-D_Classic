<?php
    include '../config/connect.php';
    unset($_SESSION['user']);
    header('location: ../index.php');
?>