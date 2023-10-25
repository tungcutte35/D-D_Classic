-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 05:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database111`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`) VALUES
(1, 'danggquang01@gmail.com', 'Đăng Quang', '$2y$10$Uarsazb2Aju5gTP6JBfeAOFeuLHILyu0KJsCaFNo9vw97y5X5/zoO'),
(3, 'admin@admin.com', 'Admin', '$2y$10$cJVKfF1lpoiefwF0SPcUlumOf949mSpzIGHpNqp4CyhORH5KpdxAS');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `img`) VALUES
(1, 'slide2.jpg'),
(2, 'slide3.jpg'),
(3, 'slide4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'Thời trang nam'),
(2, 'Thời trang nữ'),
(5, 'Đồng hồ');

-- --------------------------------------------------------

--
-- Table structure for table `diachi_donhang`
--

CREATE TABLE `diachi_donhang` (
  `id` int(11) NOT NULL,
  `ma_donhang` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thanhtoan` int(11) NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ma_donhang` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ten_sanpham` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh_sanpham` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_product`
--

CREATE TABLE `img_product` (
  `id_img_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `anh_mota` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `img_product`
--

INSERT INTO `img_product` (`id_img_product`, `id_product`, `anh_mota`) VALUES
(49, 17, 'quan_joker1.jpg'),
(50, 17, 'quan_joker2.jpg'),
(51, 17, 'quan_joker3.jpg'),
(52, 18, 'ao-thun-unisex2.jpg'),
(53, 18, 'ao-thun-unisex3.jpg'),
(54, 18, 'ao-thun-unisex4.jpg'),
(55, 19, 'quan-thun2.jpg'),
(56, 19, 'quan-thun3.jpg'),
(57, 19, 'quan-thun4.jpg'),
(58, 20, '162646550_507478250245550_7016940340386480577_n.jpg'),
(59, 21, 'quan-jeans-baggy2.jpg'),
(60, 21, 'quan-jeans-baggy3.jpg'),
(61, 21, 'quan-jeans-baggy4.jpg'),
(65, 23, 'quan-thun2.jpg'),
(66, 23, 'quan-thun3.jpg'),
(67, 23, 'quan-thun4.jpg'),
(68, 24, 'quan-ripjeans-den2.jpg'),
(69, 24, 'quan-ripjeans-den3.jpg'),
(70, 24, 'quan-ripjeans-den4.jpg'),
(79, 22, 'ao-phong-graphictees2.jpg'),
(80, 22, 'ao-phong-graphictees3.jpg'),
(81, 22, 'ao-phong-graphictees4.jpg'),
(82, 26, 'ao-so-mi-flannel2.jpg'),
(83, 26, 'ao-so-mi-flannel4.jpg'),
(84, 25, 'bikini_den2.jpg'),
(85, 25, 'bikini_den3.jpg'),
(86, 27, 'bikini_goi_cam2.jpg'),
(87, 27, 'bikini_goi_cam3.jpg'),
(90, 28, 'ao-so-mi-flannel1.jpg'),
(91, 28, 'ao-so-mi-flannel2.jpg'),
(92, 28, 'ao-so-mi-flannel4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `ten_sanpham` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh_sanpham` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL,
  `gia_khuyenmai` float DEFAULT NULL,
  `chitiet` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_danh_muc`, `ten_sanpham`, `anh_sanpham`, `soluong`, `gia_sanpham`, `gia_khuyenmai`, `chitiet`) VALUES
(13, 2, 'Áo phông ', 'ao-phong-trang-nu.jpg', 0, 320000, 280000, '<p>✅ &Aacute;o thun nữ cổ tim trơn m&agrave;u 20AGAIN, chất cotton co gi&atilde;n mềm mịn, tho&aacute;ng m&aacute;tATA1942</p>\r\n\r\n<p>✅ Chất liệu: Thun cotton co gi&atilde;n 4 chiều. Chất liệu mềm, mịn, tho&aacute;ng m&aacute;t, thấm h&uacute;t mồ h&ocirc;i.</p>\r\n\r\n<p>✅ Thiết kế/ mix &amp; match + Sản phẩm top 2 &aacute;o thun nữ cổ tim b&aacute;n chạy nhất th&aacute;ng 6 + &Aacute;o ph&ocirc;ng nữ cổ tim, ngắn tay, trơn m&agrave;u ph&ugrave; hợp với mọi v&oacute;c d&aacute;ng + Thiết kế trẻ trung, tiện dụng cho mọi ho&agrave;n cảnh c&ocirc;ng sở, đi chơi, dạo phố + 4 m&agrave;u basic, đủ size, ph&ugrave; hợp mix với mọi loại trang phục quần jeans, quần short, ch&acirc;n v&aacute;y, quần d&agrave;i,...</p>\r\n\r\n<p>✅ M&agrave;u sắc: Trắng/ Đen</p>\r\n\r\n<p>✅ Size: S/M/L. Th&ocirc;ng số size: rộng vai - v&ograve;ng ngực - v&ograve;ng eo - bắp tay + Size S: 36 - 86 - 65 - 31 + Size M: 37 - 90 - 69 - 33.5 + Size L: 38 - 94 - 73 - 36</p>\r\n\r\n<p>✅ Hướng dẫn bảo quản: Để sản phẩm bền đẹp, shop khuyến kh&iacute;ch qu&yacute; kh&aacute;ch: + Giặt tay v&agrave; giặt ri&ecirc;ng với quần &aacute;o m&agrave;u, giặt bằng x&agrave; ph&ograve;ng trung t&iacute;nh, kh&ocirc;ng chất tẩy mạnh. + Phơi sản phẩm ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, kh&ocirc;ng n&ecirc;n phơi trực tiếp dưới &aacute;nh nắng mặt trời gay gắt. + L&agrave; qua sản phẩm trước khi mặc để sản phẩm l&ecirc;n form d&aacute;ng đẹp nhất.</p>\r\n'),
(14, 1, 'Quần jean ', 'quan-jean-xam2.jpg', 0, 400000, 0, '<p>Quần jeans chất liệu cotton USA c&oacute; co gi&atilde;n<br />\r\nD&aacute;ng &ocirc;m, cạp thường, c&agrave;i c&uacute;c, kho&aacute; kim loại, r&aacute;ch gối.</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/226896/s/quan-jeans-nu-6bj21s001/category/781/#product-detail-tab-content-2\">CHẤT LIỆU</a></p>\r\n\r\n<p>85% cotton 13% polyester 2% spandex</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/226896/s/quan-jeans-nu-6bj21s001/category/781/#product-detail-tab-content-3\">HƯỚNG DẪN SỬ DỤNG</a></p>\r\n\r\n<p>Giặt m&aacute;y ở nhiệt độ thường.<br />\r\nKh&ocirc;ng sử dụng chất tẩy.<br />\r\nPhơi trong b&oacute;ng m&aacute;t.<br />\r\nSấy kh&ocirc; ở nhiệt độ thấp.<br />\r\nL&agrave; ở nhiệt độ thấp 110 độ c.<br />\r\nGiặt với sản phẩm c&ugrave;ng m&agrave;u.<br />\r\nKh&ocirc;ng l&agrave; l&ecirc;n chi tiết trang tr&iacute;.</p>\r\n'),
(15, 1, 'Áo sơ mi sọc caro', 'ao-so-mi-soc-ca-ro-do.jpg', 19, 350000, 300000, '<p><span style=\"color:#e74c3c\">D&Agrave;NH CHO NHỮNG BẠN TRẺ MẶC V&Agrave;O M&Ugrave;A H&Egrave; &quot;D&Agrave;I &Aacute;O ; M =71 CM ; L = 72 CM ; XL = 74 CM ; 2XL =75CM ; 3XL = 76 CM RỘNG VAI ; M= 42CM ; L= 43 CM. XL = 44 ; 2XL = 45CM ; 3XL = 46CMNGỰC ; M = 97CM ; L =101 CM ; XL=105 CM ; 2XL = 109CM ; 3XL =113M GẤU ; M=94CM ; L =98C M ; XL= 102CM ; 2XL = 106 CM ; 3XL = 110 CMD&Agrave;I TAY ; M = 20 CM ; L = 20.5CM ; XL = 21CM ; 2XL = 21.5 CM ; 3XL =22CM BẮP TAY ; M = 36.5CM ; L = 37.5 CM ; XL = 39 CM ; 2XL = 40.5 CM ; 3XL = 42CM &quot;</span></p>\r\n\r\n<p><span style=\"color:#e74c3c\">SƠ MI CỔ ĐỨC D&Aacute;NG SLIM, HỌỌA TIẾT KẺ KARO ĐAN XEN VỚI NHAU, THIẾT KẾ BASIC , PH&Ugrave; HỢP VỪA ĐI CHƠI VỪA MẶC ĐẾN NƠI C&Ocirc;NG SỞ . M&Agrave; VẪN TRẺ TRUNG, KHỎE KHẮN. PH&Ugrave; HỢP GI&Agrave;NH CHO NHỮNG KH&Aacute;CH H&Agrave;NG ĐỘ TUỔI TỪ 22 ĐẾN 32 &quot;2955- 65% Polyeste:+35% Cotton &quot; &quot;- Họa tiết burberry tạo phong c&aacute;ch lịch sự, ch&iacute;n chắn hơn cho người mặc- Kết hợp 2 th&agrave;nh phần sợi cotton+ polyester tạo chjo người mặc cảm gi&aacute;c tho&aacute;ng m&aacute;t, mềm, thấm h&uacute;t mồ h&ocirc;i tốt- giữ phom&quot; &quot;- Giặt với sp c&ugrave;ng m&agrave;u ở nhiệt đọ dưới 30 độ C- L&agrave; ở nhiệt độ dưới 110 độ C- Kh&ocirc;ng sấy- Kh&ocirc;ng tẩy- Phơi sp trong b&oacute;ng m&aacute;t- &quot;</span></p>\r\n'),
(17, 1, 'Quần joker ', 'quan_joker4.jpg', 20, 350000, 280000, '<ul>\r\n	<li>\r\n	<p>Được kết tinh từ chất liệu Denim cho n&ecirc;n quần Jeans của the Big Size c&oacute; độ tho&aacute;ng m&aacute;t, co gi&atilde;n r&otilde; rệt khi mặc v&agrave;o, chưa kể quần Jeans the Big size tạo cho kh&aacute;ch h&agrave;ng cảm gi&aacute;c dễ chịu khi đi l&agrave;m lẫn đi tiệc, đi đ&acirc;u cũng được tất cả đ&atilde; c&oacute; quần jeans của Old Sailor.</p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Kh&ocirc;ng chỉ đơn giản l&agrave; quần jeans, n&oacute; c&ograve;n l&agrave; cả một nghệ thuật.</p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Chất liệu của quần jeans:&nbsp; Denim.</p>\r\n\r\n	<p>Size 29 - 42.</p>\r\n\r\n	<p>M&agrave;u: X&aacute;m.</p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Sản phẩm của ch&uacute;ng t&ocirc;i c&oacute; đủ size từ 29 - 42, lu&ocirc;n lu&ocirc;n đầy đủ size cho tất cả mọi người v&igrave; Big size c&oacute; nghĩa l&agrave; size n&agrave;o cũng c&oacute;, bạn c&oacute; quyền lựa chọn v&agrave; bạn c&oacute; quyền được thoải m&aacute;i khi đến với Old Sailor &ndash; The Bigsize ch&uacute;ng t&ocirc;i.</p>\r\n\r\n	<p><strong>Hướng dẫn sử dụng v&agrave; bảo quản&nbsp;</strong><strong>quần jeans của the Big size.</strong></p>\r\n\r\n	<p><br />\r\n	+ Quần jeans&nbsp;kh&ocirc;ng n&ecirc;n giặt nhiều, bạn thậm ch&iacute; n&ecirc;n mặc 2-4 lần so với đồ kh&aacute;c trước khi giặt.</p>\r\n\r\n	<p>+&nbsp;&nbsp;Khi giặt, v&ograve;&nbsp;<strong>quần</strong>&nbsp;th&igrave; ch&uacute;ng ta n&ecirc;n cho v&agrave;o nước ấm để ng&acirc;m v&agrave;i giờ với một ch&uacute;t dấm để chất bẩn được giặt sạch một c&aacute;ch dễ d&agrave;ng hơn.</p>\r\n\r\n	<p>+&nbsp;Sau khi giặt xong h&atilde;y nh&uacute;ng&nbsp;<strong>quần</strong>&nbsp;v&agrave;o nước lạnh th&igrave; m&agrave;u&nbsp;<strong>quần</strong>&nbsp;sẽ giữ được tươi hơn.</p>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Quần jeans, quần jeans nam, quần jeans kiểu c&aacute;ch, quần jeans đi tiệc, quần jeans đi l&agrave;m, quần jeans đi chơi, quần jeans gi&aacute; rẻ, quần jeans r&aacute;ch gối, quần jeans the big size, quần jeans nam the big size, quần jeans kiểu c&aacute;ch the big size, quần jeans đi tiệc the big size, quần jeans đi l&agrave;m the big size, quần jeans đi bơi the big size, quần jeans gi&aacute; rẻ the big size, quần jeans r&aacute;ch gối the big size.</p>\r\n	</li>\r\n</ul>\r\n'),
(18, 2, 'Áo thun unisex ', 'ao-thun-unisex1.jpg', 111, 350000, 300000, '<p>&Aacute;o ph&ocirc;ng chất liệu cotton USA<br />\r\nD&aacute;ng unisex, cổ tr&ograve;n, tay cộc<br />\r\nSố lượng giới hạn<br />\r\n<br />\r\nH&Igrave;NH IN BẢN QUYỀN DISNEY GỒM 2 PHI&Ecirc;N BẢN<br />\r\nPhi&ecirc;n bản lấy cảm hứng từ bức tranh Đ&ocirc;ng Hồ nổi tiếng &ldquo;Mục đồng thổi s&aacute;o&rdquo; mang &yacute; nghĩa ca ngợi người n&ocirc;ng d&acirc;n vừa si&ecirc;ng năng lao động vừa biết s&aacute;ng tạo nghệ thuật, Canifa v&agrave; Mickey go Vietnam mang một diện mạo mới, th&acirc;n thuộc hơn. Bức tranh thể hiện tinh thần vui tươi lạc quan, gần gũi với thi&ecirc;n nhi&ecirc;n, văn h&oacute;a v&agrave; con người Việt Nam.<br />\r\n<br />\r\nPhi&ecirc;n bản ấy cảm hứng từ bức tranh Đ&ocirc;ng Hồ nổi tiếng &ldquo;Hứng dừa&rdquo; đề cao sự cảm th&ocirc;ng, chia sẻ v&agrave; gắn b&oacute; của vợ chồng, cha con để x&acirc;y dựng hạnh ph&uacute;c gia đ&igrave;nh, Mickey go Vietnam mang một &yacute; nghĩa mới về t&igrave;nh bạn th&acirc;n thiết giữa Mickey v&agrave; Minnie, Donald, Daisy khi trải nghiệm văn h&oacute;a Việt Nam.</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/227924/s/ao-phong-unisex-nguoi-lon-5TS21S003/category/104/?80=2547&amp;129=112#product-detail-tab-content-2\">CHẤT LIỆU</a></p>\r\n\r\n<p>100% cotton</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/227924/s/ao-phong-unisex-nguoi-lon-5TS21S003/category/104/?80=2547&amp;129=112#product-detail-tab-content-3\">HƯỚNG DẪN SỬ DỤNG</a></p>\r\n\r\n<p>Giặt m&aacute;y ở chế độ nhẹ, nhiệt độ thường.<br />\r\nKh&ocirc;ng sử dụng h&oacute;a chất tẩy c&oacute; chứa clo.<br />\r\nPhơi trong b&oacute;ng m&aacute;t.<br />\r\nSấy th&ugrave;ng, chế độ nhẹ nh&agrave;ng.<br />\r\nL&agrave; ở nhiệt độ trung b&igrave;nh 150 độ C<br />\r\nGiặt với sản phẩm c&ugrave;ng m&agrave;u.<br />\r\nKh&ocirc;ng l&agrave; l&ecirc;n chi tiết trang tr&iacute;.</p>\r\n'),
(19, 1, 'Quần thun FAKE', 'quan-thun1.jpg', 20, 500000, 400000, '<p><u><strong>Chất liệu</strong></u>: 100% sợi polyester</p>\r\n\r\n<p><strong><u>Độ co gi&atilde;n</u></strong>: Kh&ocirc;ng</p>\r\n\r\n<p><u><strong>Lớp l&oacute;t trong</strong></u>: Kh&ocirc;ng</p>\r\n\r\n<p><br />\r\n※ Xin vui l&ograve;ng tham khảo chất liệu cũng như m&agrave;u sắc tr&ecirc;n ảnh đơn của sản phẩm. Tuy nhi&ecirc;n cần ch&uacute; &yacute; m&agrave;u sắc khi xem qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh / điện thoại c&oacute; thể sẽ hơi kh&aacute;c so với m&agrave;u sản phẩm thực tế. M&agrave;u của sản phẩm thực tế l&agrave; m&agrave;u chuẩn.<br />\r\n※ Những sản phẩm s&aacute;ng/đậm m&agrave;u được khuy&ecirc;n giặt ri&ecirc;ng.<br />\r\n※ Tất cả sản phẩm chất liệu len v&agrave; vải mỏng cần được bỏ v&agrave;o t&uacute;i khi giặt.</p>\r\n'),
(21, 1, 'Quần jeans baggy', 'quan-jeans-baggy1.jpg', 19, 400000, 280000, '<p>Quần jeans chất liệu cotton USA c&oacute; co gi&atilde;n<br />\r\nD&aacute;ng &ocirc;m, cạp thường, c&agrave;i c&uacute;c, kho&aacute; kim loại, r&aacute;ch gối.</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/226896/s/quan-jeans-nu-6bj21s001/category/781/#product-detail-tab-content-2\">CHẤT LIỆU</a></p>\r\n\r\n<p>85% cotton 13% polyester 2% spandex</p>\r\n\r\n<p><a href=\"https://canifa.com/catalog/product/view/id/226896/s/quan-jeans-nu-6bj21s001/category/781/#product-detail-tab-content-3\">HƯỚNG DẪN SỬ DỤNG</a></p>\r\n\r\n<p>Giặt m&aacute;y ở nhiệt độ thường.<br />\r\nKh&ocirc;ng sử dụng chất tẩy.<br />\r\nPhơi trong b&oacute;ng m&aacute;t.<br />\r\nSấy kh&ocirc; ở nhiệt độ thấp.<br />\r\nL&agrave; ở nhiệt độ thấp 110 độ c.<br />\r\nGiặt với sản phẩm c&ugrave;ng m&agrave;u.<br />\r\nKh&ocirc;ng l&agrave; l&ecirc;n chi tiết trang tr&iacute;.</p>\r\n'),
(22, 1, 'Áo phông graphictees', 'ao-phong-graphictees1.jpg', 13, 350000, 300000, '<p><u><strong>Chất liệu</strong></u>: 97% sợi polyester v&agrave; 3% sợi elastane</p>\r\n\r\n<p><strong><u>Độ co gi&atilde;n</u></strong>: Kh&ocirc;ng</p>\r\n\r\n<p><u><strong>Lớp l&oacute;t trong</strong></u>: Kh&ocirc;ng</p>\r\n\r\n<p><br />\r\n※ Xin vui l&ograve;ng tham khảo chất liệu cũng như m&agrave;u sắc tr&ecirc;n ảnh đơn của sản phẩm. Tuy nhi&ecirc;n cần ch&uacute; &yacute; m&agrave;u sắc khi xem qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh / điện thoại c&oacute; thể sẽ hơi kh&aacute;c so với m&agrave;u sản phẩm thực tế. M&agrave;u của sản phẩm thực tế l&agrave; m&agrave;u chuẩn.<br />\r\n※ Những sản phẩm s&aacute;ng/đậm m&agrave;u được khuy&ecirc;n giặt ri&ecirc;ng.<br />\r\n※ Tất cả sản phẩm chất liệu len v&agrave; vải mỏng cần được bỏ v&agrave;o t&uacute;i khi giặt.</p>\r\n'),
(24, 1, 'Quần ripjeans', 'quan-ripjeans-den1.jpg', 11, 400000, 0, '<p><strong>Chất liệu</strong>: 100% Polyester</p>\r\n\r\n<p><strong>Độ co gi&atilde;n</strong>: C&oacute;</p>\r\n\r\n<p><strong>Lớp l&oacute;t trong</strong>: Kh&ocirc;ng</p>\r\n\r\n<p><strong>Đặc điểm</strong>: Co d&atilde;n si&ecirc;u tốt v&agrave; t&ocirc;n d&aacute;ng, c&oacute; kh&oacute;a k&eacute;o v&agrave; t&uacute;i quần</p>\r\n\r\n<p><br />\r\n※ Xin vui l&ograve;ng tham khảo chất liệu cũng như m&agrave;u sắc tr&ecirc;n ảnh đơn của sản phẩm. Tuy nhi&ecirc;n cần ch&uacute; &yacute; m&agrave;u sắc khi xem qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh / điện thoại c&oacute; thể sẽ hơi kh&aacute;c so với m&agrave;u sản phẩm thực tế. M&agrave;u của sản phẩm thực tế l&agrave; m&agrave;u chuẩn.<br />\r\n※ Những sản phẩm s&aacute;ng/đậm m&agrave;u được khuy&ecirc;n giặt ri&ecirc;ng.<br />\r\n※ Tất cả sản phẩm chất liệu len v&agrave; vải mỏng cần được bỏ v&agrave;o t&uacute;i khi giặt.</p>\r\n'),
(26, 1, 'Áo sơ mi flannel', 'ao-so-mi-flannel1.jpg', 19, 320000, 0, '<p><u><strong>Chất liệu</strong></u>: 80% cotton 20% sợi Polyester</p>\r\n\r\n<p><strong><u>Độ co gi&atilde;n</u></strong>: Kh&ocirc;ng</p>\r\n\r\n<p><u><strong>Lớp l&oacute;t trong</strong></u>: Kh&ocirc;ng</p>\r\n\r\n<p><br />\r\n※ Xin vui l&ograve;ng tham khảo chất liệu cũng như m&agrave;u sắc tr&ecirc;n ảnh đơn của sản phẩm. Tuy nhi&ecirc;n cần ch&uacute; &yacute; m&agrave;u sắc khi xem qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh / điện thoại c&oacute; thể sẽ hơi kh&aacute;c so với m&agrave;u sản phẩm thực tế. M&agrave;u của sản phẩm thực tế l&agrave; m&agrave;u chuẩn.<br />\r\n※ Những sản phẩm s&aacute;ng/đậm m&agrave;u được khuy&ecirc;n giặt ri&ecirc;ng.<br />\r\n※ Tất cả sản phẩm chất liệu len v&agrave; vải mỏng cần được bỏ v&agrave;o t&uacute;i khi giặt.</p>\r\n'),
(28, 1, 'Áo sơ mi sọc ca rô', 'ao-phong-graphictees1.jpg', 20, 320, 300000, '<p>ngon&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `diachi_donhang`
--
ALTER TABLE `diachi_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id_img_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_id_danhmuc` (`id_danh_muc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diachi_donhang`
--
ALTER TABLE `diachi_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id_img_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_id_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
