
<?php
require_once 'config/connect.php';

if (isset($_GET['pages'])) {
    $pages = $_GET['pages'];
} else {
    $pages = '';
}

require_once 'layout/header.php';

switch ($pages) {
    case 'product': {
            require_once 'include/product.php';
            break;
        }
    case 'dangnhap': {
            require_once 'include/dangnhap.php';
            break;
        }
        case 'users': {
            require_once 'include/users.php';
            break;
        }
        case 'dangky': {
            require_once 'include/dangky.php';
            break;
        }
        case 'giohang': {
            require_once 'include/giohang.php';
            break;
        }
        case 'chitietsanpham': {
            require_once 'include/chitiet.php';
            break;
        }
        case 'thanhtoan': {
            require_once 'include/thanhtoan.php';
            break;
        }
        case 'muangay': {
            require_once 'include/mua_ngay.php';
            break;
        }
        case 'kiemtra_donhang': {
            require_once 'include/kiemtra_donhang.php';
            break;
        }
        case 'chitiet_donhang': {
            require_once 'include/chitiet_donhang.php';
            break;
        }
        case 'chitiet_donhangdat':{
            require_once 'include/chitiet_donhang_user.php';
            break;
        }
    default: {
            require_once 'include/home.php';
        }
}
require_once 'layout/footer.php';










