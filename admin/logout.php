<?php
    include '../config/connect.php';
    unset($_SESSION['admin']);
    header('location: login.php');
?>