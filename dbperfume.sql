-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th7 07, 2023 lúc 02:05 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbperfume`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_phone` varchar(20) NOT NULL,
  `account_type` int(11) NOT NULL,
  `account_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `account_password`, `account_email`, `account_phone`, `account_type`, `account_status`) VALUES
(1, 'Thịnh Đặng', '7d0febc02cda5682327991a3f6ade711', 'thinh191204033@gmail.com', '0878398141', 2, 0),
(2, 'Nguyễn phúc an', '7d0febc02cda5682327991a3f6ade711', 'annp123@gmail.com', '', 1, 0),
(6, 'Thinhdz', '7d0febc02cda5682327991a3f6ade711', 'thinhdg01@gmail.com', '0878398141', 0, 0),
(7, 'Đặng Hữu Thịnh', '7d0febc02cda5682327991a3f6ade711', 'dhthinh.cntt@gmail.com', '0878398141', 0, 0),
(8, 'Thịnh Đặng', '7d0febc02cda5682327991a3f6ade711', 'thinhnb09@gmail.com', '0979359018', 0, 0),
(13, 'Nguyễn Văn khánh', '7d0febc02cda5682327991a3f6ade711', 'ankhanh184@gmail.com', '09648383113', 0, 0),
(14, 'Diệu Anh', '7d0febc02cda5682327991a3f6ade711', 'dieuanh@gmail.com', '0979359018', 0, 0),
(15, 'Hà Văn Thắng', '7d0febc02cda5682327991a3f6ade711', 'thangthattha@gmail.com', '', 0, 0),
(16, 'Phạm Văn Thuận', '7d0febc02cda5682327991a3f6ade711', 'thuanpv@gmail.com', '', 0, 0),
(17, 'Tú Lê', '5eb689875e154c871b961e061d523103', 'lethanhtu@gmail.com', '', 0, 0),
(18, 'Diệu Nhi', 'e0efceebe9f32e39ff3e56f3eb75e5ff', 'annp260808@gmail.com', '', 0, 0),
(19, 'shsrhre', 'e0efceebe9f32e39ff3e56f3eb75e5ff', 'yherthtth@gmail.hhhh', '', 0, 0),
(20, 'Nguyễn Trác Hậu', '7d0febc02cda5682327991a3f6ade711', 'haunguyen@gmail.com', '', 0, 0),
(21, 'Hà Thắng', '7d0febc02cda5682327991a3f6ade711', 'hathang@gmail.com', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_author` varchar(100) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_summary` text NOT NULL,
  `article_content` text NOT NULL,
  `article_image` varchar(100) NOT NULL,
  `article_date` date NOT NULL,
  `article_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`article_id`, `article_author`, `article_title`, `article_summary`, `article_content`, `article_image`, `article_date`, `article_status`) VALUES
(5, 'Thinhdh', '5 mùi hương nước hoa dùng được cho cả nam và nữ bạn không nên bỏ qua', '<p><em>Bạn c&oacute; biết? M&ugrave;i hương ch&iacute;nh l&agrave; điểm cuốn h&uacute;t v&agrave; ghi đậm dấu ấn với mọi người. Thế nhưng, c&oacute; qu&aacute; nhiều điều khiến bạn kh&oacute; khăn khi lựa chọn một m&ugrave;i hương ph&ugrave; hợp với bản th&acirc;n. V&agrave; bạn mong muốn sở hữu một m&ugrave;i hương đặc biệt m&agrave; mọi giới t&iacute;nh đều sử dụng được? Đừng lo, b&agrave;i viết sau đ&acirc;y sẽ gi&uacute;p &iacute;ch cho bạn. H&atilde;y c&ugrave;ng Parfumerie t&igrave;m hiểu về 5 m&ugrave;i hương Unisex nổi bật v&agrave; được y&ecirc;u th&iacute;ch nhất mọi thời đại dưới đ&acirc;y nh&eacute;:</em></p>\r\n', '<p><strong>C&aacute;c nh&oacute;m hương nước hoa phổ biến hiện nay</strong></p>\r\n\r\n<p>Nước hoa d&agrave;nh cho cả nam v&agrave; nữ hay c&ograve;n được gọi c&aacute;ch kh&aacute;c l&agrave; d&ograve;ng nước hoa unisex. C&aacute;c nh&agrave; s&aacute;ng tạo m&ugrave;i hương lu&ocirc;n đặt y&ecirc;u cầu v&agrave; ti&ecirc;u chuẩn kh&aacute;ch h&agrave;ng l&ecirc;n h&agrave;ng đầu để tạo sản phẩm chất lượng. Nước hoa unisex l&agrave; một trong lựa chọn tuyệt vời d&agrave;nh cho c&aacute;c cặp đ&ocirc;i muốn trải nghiệm m&ugrave;i hương c&ugrave;ng nhau.&nbsp;</p>\r\n', '1684336151_loginbanner.jpg', '2023-05-25', 1),
(7, 'Edric', 'Hương thơm da thịt - Xu hướng mùi hương đang rất được yêu thích', '<p>Nếu bạn kh&ocirc;ng th&iacute;ch thơm như hoa, ngọt như kẹo, mịn như phấn, trầm ấm như gỗ... m&agrave; chỉ th&iacute;ch thơm như ch&iacute;nh m&igrave;nh, đơn giản nhưng kh&aacute;c biệt, quyến rũ v&agrave; g&acirc;y t&ograve; m&ograve; bởi sự tự nhi&ecirc;n th&igrave; những m&ugrave;i hương da thịt - xu hướng m&ugrave;i hương đang rất được y&ecirc;u th&iacute;ch hiện nay l&agrave; d&agrave;nh cho bạn. &nbsp;</p>\r\n', '<p><strong>V&igrave; sao m&ugrave;i hương da thịt lại dần trở th&agrave;nh xu hướng m&ugrave;i hướng được y&ecirc;u th&iacute;ch?&nbsp;</strong></p>\r\n\r\n<p>Sở dĩ c&oacute; t&ecirc;n gọi l&agrave; m&ugrave;i hương da thịt v&igrave; hương thơm của những chai nước hoa n&agrave;y v&ocirc; c&ugrave;ng nhẹ nh&agrave;ng, khi d&ugrave;ng sẽ ho&agrave; với m&ugrave;i cơ thể tạo ra một hương thơm tự nhi&ecirc;n, nhẹ t&ecirc;nh, dễ chịu. V&agrave; đương nhi&ecirc;n l&agrave; chống chỉ định đối với những ai y&ecirc;u th&iacute;ch sự nồng n&agrave;n, m&ugrave;i hương bay xa, tỏa mạnh. Những hương thơm da thịt n&agrave;y th&iacute;ch hợp với người y&ecirc;u phong c&aacute;ch nhẹ nh&agrave;ng, tinh tế, đ&ocirc;i khi hương thơm nhẹ đến nỗi chỉ thoang thoảng tr&ecirc;n da, những ai kề cận s&aacute;t b&ecirc;n mới c&oacute; thể cảm nhận được. Nhưng v&igrave; thế lại tạo ra được nhiều điều th&uacute; vị v&agrave; l&atilde;ng mạn.</p>\r\n', '1684338205_problem-perfumes-natural-alternatives.jpg', '2023-06-09', 1),
(8, 'Edric', 'Những mùi hương nước hoa mang đến may mắn đầu năm mới', '<p>Tết đến xu&acirc;n về, mọi người đều hồ hởi bắt đầu một năm mới sung t&uacute;c. H&atilde;y để Parfumerie c&ugrave;ng bạn t&ocirc; điểm th&ecirc;m sắc &quot;đỏ&quot; cho dịp xu&acirc;n n&agrave;y c&ugrave;ng những m&ugrave;i hương nước hoa mang đến may mắn đầu năm mới nh&eacute;!</p>\r\n', '<p>Tiết trời thoải m&aacute;i dễ chịu khiến cho con người ta th&ecirc;m phần y&ecirc;u th&iacute;ch những m&ugrave;i hương ngọt dịu, quyến rũ v&agrave;&nbsp;<a href=\"https://parfumerie.vn/maison-francis-kurkdjian-baccarat-rouge-540-extrait-de-parfum\"><strong>nước hoa&nbsp;Baccarat 540 Extrait</strong></a>&nbsp;sẽ l&agrave; sự lựa chọn số một trong những ng&agrave;y đầu xu&acirc;n se lạnh. Mang nốt hương của hạnh nh&acirc;n đắng, hoa nh&agrave;i Ai Cập kết hợp c&ugrave;ng long di&ecirc;n hương đắt đỏ, m&ugrave;i hương Baccarat 540 ph&ugrave; hợp cho cả nam v&agrave; nữ, mang đến cho bạn sự&nbsp;sang trọng, thu h&uacute;t với độ b&aacute;m toả cực kỳ cao, khiến bạn trở th&agrave;nh t&acirc;m điểm trong mọi cuộc hội họp dịp xu&acirc;n n&agrave;y, mang đến cho bạn một dấu ấn ri&ecirc;ng biệt kh&oacute; qu&ecirc;n.</p>\r\n', '1684338690_slider_3.webp', '2023-06-09', 1),
(9, 'Tú Lê ', 'Thành phần cấu tạo của nước hoa', '<p>Một số th&agrave;nh phần cấu tạo của nước hoa, chọn nước hoa theo th&agrave;nh phần. Sản phẩm ph&ugrave; hợp với l&agrave;n da.</p>\r\n', '<h2><em><strong>Th&agrave;nh phần cấu tạo&nbsp;của nước hoa</strong></em></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nước hoa được tạo ra từ c&aacute;c th&agrave;nh phần cơ bản như tinh dầu v&agrave; hương liệu, được pha lo&atilde;ng với cồn hoặc nước để tạo ra một dung dịch c&oacute; m&ugrave;i hương thơm. Th&agrave;nh phần cấu tạo của nước hoa bao gồm:</p>\r\n\r\n<p><strong>Tinh dầu:&nbsp;</strong>Đ&acirc;y l&agrave; th&agrave;nh phần quan trọng nhất của nước hoa. Tinh dầu được chiết xuất từ c&aacute;c loại thực vật kh&aacute;c nhau, chẳng hạn như hoa, l&aacute;, gỗ v&agrave; rễ c&acirc;y. Mỗi loại tinh dầu c&oacute; m&ugrave;i hương độc đ&aacute;o v&agrave; được sử dụng để tạo ra c&aacute;c loại nước hoa kh&aacute;c nhau.</p>\r\n\r\n<p><strong>Hương liệu:&nbsp;</strong>Hương liệu được sử dụng để tạo ra m&ugrave;i hương đặc trưng cho nước hoa. C&aacute;c hương liệu bao gồm c&aacute;c loại tinh dầu tổng hợp được sản xuất bởi c&aacute;c nh&agrave; sản xuất h&oacute;a chất.</p>\r\n\r\n<p><strong>Cồn hoặc nước:</strong>&nbsp;Cồn hoặc nước được sử dụng để pha lo&atilde;ng tinh dầu v&agrave; hương liệu, gi&uacute;p tạo ra một dung dịch c&oacute; độ d&agrave;y v&agrave; độ nhẹ vừa phải.</p>\r\n\r\n<p><strong>Chất định hương:&nbsp;</strong>Chất định hương được sử dụng để giữ cho c&aacute;c th&agrave;nh phần của nước hoa h&ograve;a tan trong nhau v&agrave; gi&uacute;p tăng độ bền của nước hoa.</p>\r\n\r\n<p><strong>Chất phụ gia:</strong>&nbsp;Chất phụ gia được sử dụng để tạo ra c&aacute;c t&iacute;nh năng kh&aacute;c cho nước hoa như tăng khả năng b&aacute;m d&iacute;nh, chống oxy h&oacute;a v&agrave; bảo vệ m&agrave;u sắc.</p>\r\n\r\n<p><strong>Nước tinh khiết:</strong>&nbsp;Nước tinh khiết được sử dụng để pha lo&atilde;ng cồn hoặc tạo ra một dung dịch nước hoa kh&ocirc;ng chứa cồn.</p>\r\n\r\n<p>Tất cả c&aacute;c th&agrave;nh phần tr&ecirc;n được pha trộn với nhau để tạo ra một sản phẩm nước hoa c&oacute; m&ugrave;i hương độc đ&aacute;o v&agrave; hấp dẫn.</p>\r\n', '1687100315_tải xuống (1).jfif', '2023-06-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Chanel'),
(2, 'Gucci'),
(3, 'Louis Vuitton'),
(4, 'Dior');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capacity`
--

CREATE TABLE `capacity` (
  `capacity_id` int(11) NOT NULL,
  `capacity_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `capacity`
--

INSERT INTO `capacity` (`capacity_id`, `capacity_name`) VALUES
(3, '10ml'),
(4, '20ml'),
(5, '30ml'),
(6, '40ml'),
(7, '50ml'),
(8, '60ml'),
(9, '70ml'),
(10, '80ml'),
(11, '90ml'),
(12, '100ml');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(1, 'Nước hoa unisex', 'Tất cả các sản phẩm nước hoa', '1684378853_pexels-anis-salmani-11711835.jpg'),
(2, 'Nước hoa nam', 'Sản phẩm nước hoa phù hợp cho nam', '1684378880_qebq3g-16571737703471658983260.webp'),
(3, 'Nước hoa nữ', 'Sản phẩm nước hoa dành cho nữ', '1684378870_nuoc-hoa-duoc-yeu-thich-nhat.jpg'),
(4, 'Nước hoa chiết', 'Người hoa với dung tích nhỏ, khách hàng có thể mua về để dùng thử', '1684994125_nuochoachiet.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(100) NOT NULL,
  `collection_keyword` varchar(100) NOT NULL,
  `collection_image` varchar(100) NOT NULL,
  `collection_description` varchar(255) NOT NULL,
  `collection_order` int(11) NOT NULL,
  `collection_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `collection_keyword`, `collection_image`, `collection_description`, `collection_order`, `collection_type`) VALUES
(1, 'Chanel', 'chanel', '1684376498_nuoc-hoa-chanel-nam-11.jpg', 'Nước hoa chanel', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment_name` varchar(50) NOT NULL,
  `comment_email` varchar(50) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `article_id`, `comment_name`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES
(9, 8, 'Thịnh', 'thinh191204033@gmail.com', 'Hay quá admin ơi', '2023-05-30', 1),
(10, 7, 'Thịnh', 'thinh191204033@gmail.com', 'aaaaa', '2023-06-07', 0),
(14, 8, 'Thắng', 'thangthattha@gmail.com', 'Rất hữu ích ạ', '2023-06-13', 1),
(15, 8, 'tú', 'fddf@gmail.com', 'đắt', '2023-06-18', 0),
(16, 8, 'tú', 'fddf@gmail.com', 'đắt', '2023-06-18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_gender` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `account_id`, `customer_name`, `customer_gender`, `customer_email`, `customer_phone`, `customer_address`) VALUES
(1, 2, 'Nguyễn phúc an', 0, 'annp@gmail.com', '0979359018', 'Hà Nội'),
(2, 7, 'Đặng Hữu Thịnh', 1, 'dhthinh.cntt@gmail.com', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội'),
(3, 2, 'Phúc An', 1, 'annp@gmail.com', '0887398147', 'Quốc Oai, Hà Nội'),
(5, 13, 'Nguyễn Văn Khánh', 1, 'ankhanh184@gmail.com', '09648383113', 'Long Phú, Quốc Oai, Hà Nội'),
(6, 1, 'Thịnh Đặng', 1, 'thinh191204033@gmail.com', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội'),
(8, 14, 'Diệu Anh', 2, 'dieuanh@gmail.com', '0964838311', 'Long Phú, Quốc Oai, Hà Nội'),
(9, 15, 'Hà Văn Thắng', 1, 'thangthattha@gmail.com', '039415515', 'Quan Hoa, Cầu Giấy, Hà Nội'),
(10, 16, 'Phạm Văn Thuận', 1, 'thuanpv@gmail.com', '0971113114', 'Hoàng Mai, Hà Nội'),
(11, 0, 'thịnh', 0, 'thimh174658@gmail.comm', '0979359018', 'cầu giấy'),
(15, 18, 'Diệu Nhi', 2, 'annp260808@gmail.com', '0971113114', 'Cầu Giấy'),
(17, 20, 'Nguyễn Trác Hậu', 1, 'haunguyen@gmail.com', '0878398141', 'Ba Vì, Hà Nội'),
(18, 21, 'Hà Thắng', 1, 'hathang@gmail.com', '0979359018', 'Quan Hoa, Cầu Giấy, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `delivery_name` varchar(100) NOT NULL,
  `delivery_phone` varchar(20) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `account_id`, `delivery_name`, `delivery_phone`, `delivery_address`, `delivery_note`) VALUES
(18, 13, 'Nguyễn Văn Khánh', '9648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(109, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(151, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', 'Cẩn hận giú mình nhé'),
(182, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(250, 7, '', '878398141', '', ''),
(386, 1, 'Nguyễn thị diệu anh', '979359018', 'Hà Nội', ''),
(404, 7, '', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(602, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(716, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(732, 1, 'Thịnh đang test', '979359018', 'Hà Nội', ''),
(928, 20, 'Nguyễn Trác Hậu', '0878398141', 'Ba Vì, Hà Nội', 'Cẩn hận giúp mình nhé'),
(1034, 18, 'Diệu Nhi', '0971113114', 'Cầu Giấy', ''),
(1100, 1, 'Nguyễn phúc an', '979359018', 'Hà Nội', ''),
(1162, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1197, 1, 'Nguyễn thị diệu anh', '368683854', 'Hà Nội', ''),
(1263, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1278, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1381, 1, 'Nguyễn phúc an', '979359018', 'Hà Nội', ''),
(1454, 1, 'Nguyễn Văn Thủy', '0343434523', 'Long Phú, Quốc Oai, Hà Nội', ''),
(1462, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1553, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(1615, 6, 'Thinhdz', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(1623, 2, 'Nguyễn phúc an', '9383434323', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(1658, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(1703, 1, 'Hà Văn Thắng', '0979359018', 'Hà Nội', ''),
(1713, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(1714, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(1858, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1874, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(1884, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(1922, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2267, 13, 'Nguyễn Văn Khánh', '9648383113', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(2294, 7, 'Đặng Hữu Thịnh', '878398141', 'Hà Nội', 'Giao hàng nhanh giúp mình nhé'),
(2342, 6, 'Thinhdz', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(2344, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(2484, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(2522, 7, '', '878398141', '', ''),
(2531, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2548, 6, 'Thinhdz', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(2573, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2629, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2639, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2766, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(2912, 1, 'Nguyễn phúc an', '0979359018', 'Hà Nội', 'Đơn hàng mua trực tiếp'),
(3044, 7, '', '878398141', '', ''),
(3105, 7, 'Đặng Hữu Thịnh', '878398141', 'Hà Nội', 'Giao hàng nhanh giúp mình nhé'),
(3246, 1, 'Nguyễn phúc an', '0368683854', 'Hà Nội', 'Đơn hàng mua trực tiếp'),
(3258, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(3269, 17, 'Tú Lê', '0976475025', 'Cầu Giấy', ''),
(3308, 1, 'Nguyễn phúc an', '0979359018', 'Hà Nội', 'Đơn hàng mua trực tiếp'),
(3321, 7, 'Nguyễn phúc an', '979359018', 'Long Phú, Quốc Oai, Hà Nội', ''),
(3492, 17, 'Tú Lê', '0976475025', 'Cầu Giấy', 'Cẩn hận giú mình nhé'),
(3623, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Cẩn hận giúp mình nhé'),
(3663, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(3731, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(3874, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(3896, 7, '', '878398141', '', ''),
(3946, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(3985, 1, 'Thịnh đang test', '979359018', 'Hà Nội', ''),
(4025, 7, 'Thịnh Đặng', '0878398141', 'Quan Hoa, Hà Nội', 'Giao nhanh không boom hàng đấy'),
(4083, 1, 'Nguyễn thị diệu anh', '979359018', 'Hà Nội', ''),
(4155, 1, 'Phạm Tuấn Thanh', '0368683854', 'Hà Nội', 'Đơn hàng mua trực tiếp'),
(4312, 2, 'Nguyễn phúc an', '9383434323', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(4566, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(4589, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(4643, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(4693, 1, 'Nguyễn phúc an', '979359018', 'Hà Nội', ''),
(4701, 7, 'Đặng Hữu Thịnh', '878398141', '', ''),
(4725, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(4759, 13, 'Nguyễn Văn Khánh', '9648383113', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(4886, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(4970, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(4981, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(5319, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(5320, 6, 'Thinhdz', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(5379, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(5509, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(5605, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(5611, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(5672, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(5741, 1, 'Nguyễn phúc an', '0368683854', 'Long Phú, Quốc Oai, Hà Nội', ''),
(5749, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(5986, 13, 'Nguyễn Văn Khánh', '9648383113', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(6245, 6, 'Thinhdz', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(6275, 2, 'Nguyễn phúc an', '9383434323', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(6378, 1, 'Nguyễn Việt Hưng', '0979359018', 'Hà Nội', ''),
(6415, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(6426, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(6560, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(6743, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(6903, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(6965, 1, 'Nguyễn phúc an', '368683854', 'Hà Nội', ''),
(7013, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(7017, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(7044, 6, 'Thinhdz', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(7103, 1, 'thinhdh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Cẩn hận giúp mình nhé'),
(7149, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(7164, 7, '', '878398141', '', ''),
(7167, 7, '', '878398141', '', 'hgjhghjjhgjhjjk'),
(7224, 1, 'Nguyễn thị diệu anh', '979359018', 'Hà Nội', ''),
(7277, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(7433, 1, 'Thịnh đang test', '979359018', 'Hà Nội', ''),
(7652, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(7829, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(8186, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(8207, 7, 'Đặng Hữu Thịnh', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(8299, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(8388, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(8564, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(8609, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(8855, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(9057, 6, 'Thinhdz', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(9059, 6, 'Thinhdz', '878398141', 'Long Phú, Quốc Oai, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(9288, 13, 'Nguyễn Văn Khánh', '09648383113', 'Long Phú, Quốc Oai, Hà Nội', ''),
(9305, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(9495, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Cẩn hận giúp mình nhé'),
(9537, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(9707, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(9721, 14, 'Diệu Anh', '0964838311', 'Long Phú, Quốc Oai, Hà Nội', ''),
(9743, 1, 'Phạm Tuấn Thanh', '0343434523', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(9910, 7, 'Đặng Hữu Thịnh', '878398141', '225 Quan hoa, Cầu giấy, Hà Nội', 'Giao hàng nhanh không là boom đấy'),
(9955, 7, 'Đặng Hữu Thịnh', '878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', ''),
(9965, 7, 'Đặng Hữu Thịnh', '0878398141', 'Quan Hoa, Cầu Giấy, Hà Nội', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluate`
--

CREATE TABLE `evaluate` (
  `evaluate_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `evaluate_rate` int(11) NOT NULL,
  `evaluate_content` text NOT NULL,
  `evaluate_date` varchar(50) NOT NULL,
  `evaluate_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `evaluate`
--

INSERT INTO `evaluate` (`evaluate_id`, `account_id`, `product_id`, `account_name`, `evaluate_rate`, `evaluate_content`, `evaluate_date`, `evaluate_status`) VALUES
(10, 7, 15, 'Đặng Hữu Thịnh', 5, 'Ưng lắm ạ, dùng nước hoa này có một tuần mà có người yêu luôn', '2023-06-13 09:46:32', 1),
(13, 13, 20, 'Nguyễn Văn khánh', 5, 'Tuyệt luôn !!!', '2023-06-13 10:04:05', 1),
(14, 13, 19, 'Nguyễn Văn khánh', 4, 'Sản phẩm ổn trong tầm giá', '2023-06-13 10:07:48', 1),
(16, 14, 18, 'Diệu Anh', 5, 'Nước hoa thơm, ship giao hàng nhanh', '2023-06-14 08:59:17', 1),
(18, 14, 22, 'Diệu Anh', 5, 'Tuyệt, đi làm chị em trong công ty ai cũng khen', '2023-06-14 09:49:54', 1),
(19, 7, 10, 'Đặng Hữu Thịnh', 4, 'sản phẩm tuyệt lắm ạ', '2023-06-19 12:40:20', 1),
(20, 13, 10, 'Nguyễn Văn khánh', 5, 'tuyệt!!!', '2023-06-19 12:41:22', 1),
(21, 13, 11, 'Nguyễn Văn khánh', 3, 'Nước tạm ổn trong tầm giá, mỗi tội giao hàng hơi lâu\r\n', '2023-06-19 12:42:31', 1),
(22, 21, 21, 'Hà Thắng', 5, 'Xịt cái có người yêu luôn', '2023-06-19 22:02:18', 1),
(23, 7, 14, 'Đặng Hữu Thịnh', 4, 'ccc', '2023-07-07 18:05:41', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `staf_name` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `inventory_note` varchar(100) NOT NULL,
  `inventory_code` varchar(50) NOT NULL,
  `inventory_date` date NOT NULL,
  `total_amount` float NOT NULL,
  `inventory_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `account_id`, `staf_name`, `supplier_name`, `supplier_phone`, `inventory_note`, `inventory_code`, `inventory_date`, `total_amount`, `inventory_status`) VALUES
(1, 0, 'Thịnh Đặng', 'Guha Store', '', 'thêm hàng', '9124', '2023-05-22', 29500000, 0),
(2, 0, 'Thịnh Đặng', 'Guha Store', '', 'thêm hàng', '4615', '2023-05-22', 30000000, 0),
(3, 1, 'Thịnh', 'MISA JSC', '', 'Bổ sung hàng', '7331', '2023-05-24', 9000000, 0),
(4, 0, 'Thịnh Đặng', 'Brave Bits', '', 'Nhập lô sản phẩm mới', '9288', '2023-06-06', 114660000, 0),
(5, 7, 'Thịnh', 'Guha Store', '', 'thêm hàng', '8549', '2023-06-06', 7000000, 0),
(8, 20, 'Thịnh Đặng', 'MISA JSC', '', 'Bổ sung hàng', '3997', '2023-06-18', 63500000, 0),
(9, 20, 'Thịnh Đặng', 'Brave Bits', '', 'Bổ sung hàng', '4658', '2023-06-18', 15000000, 0),
(13, 20, 'Thịnh Đặng', 'Guha Store', '0985789465', 'thêm hàng', '3044', '2023-06-18', 27500000, 0),
(14, 0, 'Thịnh Đặng', 'Guha Store', '0985789465', 'Bổ sung hàng', '3450', '2023-06-19', 42500000, 0),
(15, 0, 'AnKhanh', 'Guha Store', '0985789465', 'thêm hàng', '9540', '2023-06-19', 27500000, 0),
(16, 0, 'Tú Lê', 'Brave Bits', '0985789465', 'Bổ sung hàng', '5574', '2023-06-19', 6000000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_detail`
--

CREATE TABLE `inventory_detail` (
  `inventory_detail_id` int(11) NOT NULL,
  `inventory_code` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price_import` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `inventory_detail`
--

INSERT INTO `inventory_detail` (`inventory_detail_id`, `inventory_code`, `product_id`, `product_quantity`, `product_price_import`) VALUES
(1, '9124', 21, 3, 2500000),
(2, '9124', 18, 11, 2000000),
(3, '4615', 21, 12, 2500000),
(4, '7331', 19, 3, 3000000),
(5, '9288', 15, 12, 9555000),
(6, '8549', 21, 2, 2500000),
(7, '8549', 22, 1, 2000000),
(8, '9453', 38, 12, 10),
(9, '4330', 101, 4, 1),
(10, '3997', 17, 11, 2500000),
(11, '3997', 22, 12, 3000000),
(12, '4658', 22, 5, 3000000),
(13, '4890', 16, 11, 2500000),
(14, '7089', 16, 11, 2500000),
(15, '1989', 16, 11, 2500000),
(16, '3044', 16, 11, 2500000),
(17, '3450', 15, 5, 8500000),
(18, '9540', 20, 11, 2500000),
(19, '5574', 21, 2, 3000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metrics`
--

CREATE TABLE `metrics` (
  `metric_id` int(11) NOT NULL,
  `metric_date` date NOT NULL,
  `metric_order` int(11) NOT NULL,
  `metric_sales` varchar(100) NOT NULL,
  `metric_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `metrics`
--

INSERT INTO `metrics` (`metric_id`, `metric_date`, `metric_order`, `metric_sales`, `metric_quantity`) VALUES
(1, '2023-05-14', 19, '20000000', 34),
(2, '2023-05-15', 24, '20000000', 38),
(3, '2023-05-16', 21, '25000000', 30),
(4, '2023-05-17', 24, '19000000', 38),
(5, '2023-05-18', 28, '35000000', 50),
(6, '2023-05-19', 29, '40000000', 48),
(7, '2023-05-13', 21, '19500000', 28),
(8, '2023-04-19', 29, '40000000', 48),
(9, '2023-03-20', 28, '35000000', 50),
(10, '2023-04-30', 23, '54000000', 100),
(11, '2023-05-06', 23, '44000000', 50),
(12, '2023-05-04', 3, '4000000', 5),
(13, '2023-05-20', 2, '37060000', 8),
(14, '2023-05-23', 3, '9900000', 3),
(15, '2023-05-24', 1, '7200000', 2),
(16, '2023-05-28', 9, '38760000', 29),
(19, '2023-05-29', 1, '3680000', 1),
(20, '2023-06-02', 3, '33770000', 4),
(21, '2023-06-03', 13, '49350000', 8),
(22, '2023-06-04', 6, '21210000', 1),
(23, '2023-06-05', 1, '16200000', 0),
(24, '2023-06-06', 9, '64860000', 11),
(25, '2023-06-07', 11, '60755000', 19),
(26, '2023-06-08', 1, '6300000', 2),
(27, '2023-06-11', 1, '12600000', 2),
(28, '2023-06-14', 1, '2700000', 1),
(29, '2023-06-15', 2, '11400000', 3),
(30, '2023-06-16', 2, '12800000', 2),
(31, '2023-06-18', 8, '108911003.52', 21),
(32, '2023-06-19', 3, '18375000', 4),
(33, '2023-06-20', 2, '92410000', 11),
(34, '2023-07-07', 4, '152049200', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `momo_id` int(11) NOT NULL,
  `partner_code` varchar(50) NOT NULL,
  `order_code` int(11) NOT NULL,
  `momo_amount` varchar(50) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `momo`
--

INSERT INTO `momo` (`momo_id`, `partner_code`, `order_code`, `momo_amount`, `order_info`, `order_type`, `trans_id`, `payment_date`, `pay_type`, `payment_status`) VALUES
(2, 'MOMOBKUN20180529', 6434, '9000000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, '2023-06-15 13:05:51', 'napas', 0),
(3, 'MOMOBKUN20180529', 3619, '7200000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, '2023-06-10 13:05:51', 'napas', 0),
(4, 'MOMOBKUN20180529', 9864, '7360000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, '2023-06-19 13:05:51', 'napas', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_type` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `order_date`, `account_id`, `delivery_id`, `total_amount`, `order_type`, `order_status`) VALUES
(98, 4650, '2023-06-02 00:17:49', 1, 6965, 14720000, 4, 3),
(99, 9669, '2023-06-02 00:23:55', 1, 7224, 6900000, 4, 3),
(100, 1201, '2023-06-02 01:01:57', 7, 4725, 12150000, 3, 3),
(101, 4279, '2023-06-03 16:01:15', 13, 4759, 5400000, 3, 3),
(102, 7047, '2023-06-03 16:01:19', 13, 2267, 0, 3, -1),
(103, 6476, '2023-06-03 16:01:42', 13, 5986, 3680000, 3, 3),
(104, 110, '2023-06-03 20:49:37', 7, 6560, 3500000, 3, 3),
(105, 3000, '2023-06-03 20:57:25', 7, 1278, 3680000, 3, 3),
(106, 5237, '2023-06-03 21:00:16', 7, 5611, 3150000, 3, 3),
(107, 4705, '2023-06-03 21:24:47', 7, 7829, 3680000, 0, -1),
(108, 2591, '2023-06-03 21:51:18', 7, 4886, 2700000, 0, -1),
(109, 999, '2023-06-03 21:52:45', 7, 9955, 3680000, 0, -1),
(110, 4220, '2023-06-03 22:27:12', 7, 2629, 3680000, 2, 3),
(111, 3319, '2023-06-03 22:45:01', 7, 602, 3600000, 0, -1),
(112, 5850, '2023-06-03 22:49:34', 7, 4589, 3600000, 0, -1),
(113, 14, '2023-06-03 22:56:30', 7, 1462, 9000000, 3, 3),
(114, 6647, '2023-06-04 09:32:51', 13, 18, 3150000, 0, -1),
(115, 7237, '2023-06-04 09:41:10', 7, 5259, 3600000, 2, 3),
(116, 8374, '2023-06-04 09:46:06', 7, 9017, 3600000, 2, 3),
(117, 9439, '2023-06-04 09:50:58', 7, 3874, 3600000, 3, 3),
(118, 6636, '2023-06-04 17:40:19', 7, 9537, 3680000, 1, 3),
(119, 2548, '2023-06-04 17:57:01', 7, 3321, 3680000, 5, 3),
(120, 2844, '2023-06-04 22:41:22', 7, 2573, 3600000, 1, -1),
(121, 2579, '2023-06-04 22:43:07', 7, 9965, 3500000, 1, 3),
(122, 8819, '2023-06-05 23:00:00', 7, 5319, 16200000, 1, 3),
(123, 2367, '2023-06-06 15:48:51', 1, 1197, 9450000, 5, 3),
(124, 2417, '2023-06-06 21:06:06', 7, 9707, 3150000, 4, 3),
(125, 6434, '2023-06-06 21:29:46', 7, 109, 9000000, 3, 3),
(126, 3619, '2023-06-06 21:34:56', 7, 5605, 7200000, 3, 3),
(127, 7681, '2023-06-06 22:52:40', 1, 1703, 3680000, 5, 3),
(128, 9913, '2023-06-06 23:08:57', 7, 5749, 9000000, 1, 3),
(129, 8916, '2023-06-07 08:58:42', 1, 5741, 3680000, 5, 3),
(130, 1166, '2023-06-07 09:42:34', 1, 1454, 3680000, 5, 3),
(131, 5156, '2023-06-07 09:49:39', 1, 6378, 3680000, 5, 3),
(132, 9385, '2023-06-07 09:50:21', 13, 3946, 9000000, 1, 2),
(133, 5157, '2023-06-07 09:54:21', 13, 2344, 3680000, 1, 3),
(134, 239, '2023-06-07 13:55:08', 7, 1263, 9000000, 1, 3),
(135, 9787, '2023-06-07 13:58:02', 7, 2639, 2700000, 4, 3),
(136, 9952, '2023-06-07 14:14:14', 7, 2766, 7335000, 4, 3),
(137, 1404, '2023-06-07 17:51:00', 7, 1922, 6300000, 1, -1),
(138, 382, '2023-06-07 17:51:59', 7, 1162, 6300000, 1, -1),
(139, 1441, '2023-06-07 17:55:58', 13, 7652, 6300000, 1, 3),
(140, 3206, '2023-06-07 18:12:28', 13, 5509, 0, 1, 3),
(141, 8807, '2023-06-08 17:49:02', 7, 7149, 9000000, 1, -1),
(142, 7278, '2023-06-11 08:41:19', 7, 5379, 3800000, 1, -1),
(143, 4731, '2023-06-11 08:50:13', 7, 1874, 12600000, 4, 3),
(144, 9897, '2023-06-13 10:48:58', 14, 8564, 3800000, 1, -1),
(145, 9229, '2023-06-13 10:50:44', 14, 1553, 3800000, 1, -1),
(146, 1572, '2023-06-13 11:01:54', 14, 9721, 3800000, 1, -1),
(147, 2155, '2023-06-13 11:17:52', 14, 1714, 3800000, 1, -1),
(148, 4272, '2023-06-13 11:20:04', 14, 7017, 3800000, 1, -1),
(149, 3114, '2023-06-13 11:20:36', 14, 7277, 3800000, 1, -1),
(150, 3704, '2023-06-14 10:58:25', 14, 151, 2700000, 4, 3),
(151, 4629, '2023-06-15 16:08:36', 1, 9743, 7600000, 5, 3),
(152, 4370, '2023-06-15 17:08:57', 13, 1658, 3800000, 1, 3),
(153, 2038, '2023-06-16 09:14:05', 7, 8855, 9000000, 1, 3),
(154, 2166, '2023-06-16 09:18:44', 7, 9305, 3800000, 4, 3),
(155, 7853, '2023-06-16 09:21:49', 7, 8299, 2700000, 1, 5),
(156, 4461, '2023-06-18 16:27:48', 1, 4155, 9531000, 5, 3),
(157, 5099, '2023-06-18 17:01:51', 7, 1858, 9000000, 4, 5),
(158, 9644, '2023-06-18 18:18:24', 17, 3492, 14670000, 4, 2),
(159, 6770, '2023-06-18 18:46:53', 17, 3269, 46710000, 1, 2),
(160, 2731, '2023-06-18 18:49:49', 1, 3246, 13000000, 5, 3),
(161, 3177, '2023-06-18 19:03:59', 18, 1034, 4, 1, 3),
(162, 9063, '2023-06-18 23:06:44', 20, 928, 13300000, 4, 1),
(163, 9864, '2023-06-19 13:05:51', 13, 9288, 7360000, 3, 1),
(164, 771, '2023-06-19 19:37:26', 7, 1884, 7335000, 4, 3),
(165, 3407, '2023-06-19 23:45:47', 7, 6903, 3680000, 4, -1),
(166, 6492, '2023-06-20 07:26:34', 7, 6743, 85050000, 4, 3),
(167, 6872, '2023-06-20 08:17:07', 7, 8388, 7360000, 4, 3),
(168, 5262, '2023-07-07 17:51:36', 7, 2531, 9000000, 1, 3),
(169, 4243, '2023-07-07 17:55:15', 1, 3308, 3325000, 5, 3),
(170, 4287, '2023-07-07 18:07:58', 7, 182, 136399200, 4, 3),
(171, 5519, '2023-07-07 18:10:18', 1, 2912, 3325000, 5, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_code`, `product_id`, `product_quantity`, `product_price`, `product_sale`) VALUES
(55, 3188, 20, 2, 4000000, 8),
(56, 8537, 17, 2, 3500000, 10),
(57, 8537, 15, 2, 10000000, 10),
(64, 2622, 20, 1, 4000000, 8),
(65, 3696, 16, 1, 4000000, 10),
(66, 7555, 15, 5, 10000000, 0),
(67, 7555, 21, 1, 4000000, 0),
(68, 1227, 15, 5, 10000000, 0),
(69, 1227, 21, 1, 4000000, 0),
(70, 3597, 21, 1, 4000000, 0),
(71, 8298, 19, 1, 3000000, 10),
(72, 8298, 16, 1, 4000000, 10),
(73, 2441, 21, 1, 4000000, 10),
(74, 2441, 16, 1, 4000000, 10),
(75, 4573, 16, 1, 4000000, 10),
(76, 905, 18, 3, 3000000, 10),
(77, 2740, 21, 1, 4000000, 8),
(78, 7501, 22, 1, 3500000, 0),
(79, 9356, 19, 1, 2000000, 10),
(80, 7706, 21, 1, 4000000, 8),
(81, 2764, 21, 1, 4000000, 8),
(82, 3236, 21, 1, 4000000, 8),
(83, 107, 21, 1, 4000000, 8),
(84, 5297, 17, 2, 3500000, 10),
(85, 992, 17, 1, 3500000, 0),
(95, 2246, 19, 1, 4000000, 10),
(96, 4650, 21, 2, 4000000, 8),
(97, 4650, 19, 2, 4000000, 8),
(98, 9669, 22, 1, 3500000, 8),
(99, 9669, 21, 1, 4000000, 8),
(100, 1201, 17, 1, 3500000, 10),
(101, 1201, 16, 1, 4000000, 10),
(102, 1201, 18, 2, 3000000, 10),
(103, 4279, 18, 2, 3000000, 10),
(104, 6476, 21, 1, 4000000, 8),
(105, 110, 22, 1, 3500000, 0),
(106, 3000, 20, 1, 4000000, 8),
(107, 5237, 17, 1, 3500000, 10),
(108, 4705, 21, 1, 4000000, 8),
(109, 2591, 18, 1, 3000000, 10),
(110, 999, 21, 1, 4000000, 8),
(111, 4220, 21, 1, 4000000, 8),
(112, 3319, 19, 1, 4000000, 10),
(113, 5850, 16, 1, 4000000, 10),
(114, 14, 15, 1, 10000000, 10),
(115, 6647, 17, 1, 3500000, 10),
(116, 0, 16, 1, 4000000, 10),
(117, 0, 16, 1, 4000000, 10),
(118, 9439, 16, 1, 4000000, 10),
(119, 6636, 21, 1, 4000000, 8),
(120, 2548, 21, 1, 4000000, 8),
(121, 2844, 16, 1, 4000000, 10),
(122, 2579, 22, 1, 3500000, 0),
(123, 8819, 20, 3, 4000000, 10),
(124, 8819, 18, 2, 3000000, 10),
(125, 2367, 13, 1, 10500000, 10),
(126, 2417, 17, 1, 3500000, 10),
(127, 6434, 15, 1, 10000000, 10),
(128, 3619, 16, 2, 4000000, 10),
(129, 7681, 21, 1, 4000000, 8),
(130, 9913, 15, 1, 10000000, 10),
(131, 8916, 20, 1, 4000000, 8),
(132, 1166, 20, 1, 4000000, 8),
(133, 5156, 21, 1, 4000000, 8),
(134, 9385, 15, 1, 10000000, 10),
(135, 5157, 20, 1, 4000000, 8),
(136, 239, 15, 1, 10000000, 10),
(137, 9787, 18, 1, 3000000, 10),
(138, 9952, 10, 1, 8150000, 10),
(139, 1404, 17, 2, 3500000, 10),
(140, 382, 17, 2, 3500000, 10),
(141, 1441, 17, 2, 3500000, 10),
(142, 3206, 38, 9, 0, 0),
(143, 8807, 15, 1, 10000000, 10),
(144, 7278, 19, 1, 4000000, 5),
(145, 4731, 15, 1, 10000000, 10),
(146, 4731, 16, 1, 4000000, 10),
(147, 9897, 19, 1, 4000000, 5),
(148, 9229, 19, 1, 4000000, 5),
(149, 1572, 19, 1, 4000000, 5),
(150, 2155, 19, 1, 4000000, 5),
(151, 4272, 19, 1, 4000000, 5),
(152, 3114, 19, 1, 4000000, 5),
(153, 3704, 18, 1, 3000000, 10),
(154, 4629, 19, 2, 4000000, 5),
(155, 4370, 19, 1, 4000000, 5),
(156, 2038, 15, 1, 10000000, 10),
(157, 2166, 20, 1, 4000000, 5),
(158, 7853, 18, 1, 3000000, 10),
(159, 4461, 14, 1, 10590000, 10),
(160, 5099, 15, 1, 10000000, 10),
(161, 9644, 10, 2, 8150000, 10),
(162, 6770, 12, 6, 8650000, 10),
(163, 2731, 20, 2, 4000000, 5),
(164, 2731, 18, 2, 3000000, 10),
(165, 3177, 101, 4, 1, 12),
(166, 9063, 15, 1, 10000000, 5),
(167, 9063, 19, 1, 4000000, 5),
(168, 9864, 21, 1, 4000000, 8),
(169, 9864, 16, 1, 4000000, 8),
(170, 771, 10, 1, 8150000, 10),
(171, 3407, 21, 1, 4000000, 8),
(172, 6492, 13, 9, 10500000, 10),
(173, 6872, 21, 2, 4000000, 8),
(174, 5262, 15, 1, 10000000, 10),
(175, 4243, 22, 1, 3500000, 5),
(176, 4287, 14, 14, 10590000, 8),
(177, 5519, 22, 1, 3500000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `capacity_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `quantity_sales` int(11) NOT NULL,
  `product_price_import` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_brand`, `capacity_id`, `product_quantity`, `quantity_sales`, `product_price_import`, `product_price`, `product_sale`, `product_description`, `product_image`, `product_status`) VALUES
(10, 'Nước Hoa Louis Vuitton Sur La Route 100ml', 1, 3, 12, 11, 3, 9500000, 8150000, 10, 'Cam kết chỉ bán hàng chính hãng, chất lượng đảm bảo tuyệt đối.\r\n\r\nGiá cả tốt nhất thị trường, chất lượng sản phẩm tương xứng với số tiền bỏ ra.\r\nGiao hàng toàn quốc đồng giá 45k, miễn phí ship với đơn hàng trên 5 triệu khi đã chuyển khoản 100%\r\nTuyệt đối không bán hàng kém chất lượng.\r\nĐảm bảo mỗi sản phẩm luôn trong tình trạng nguyên bản.\r\nCam kết mang đến những dòng sản phẩm cao cấp mang đến đẳng cấp phù hợp với từng quý khách hàng.\r\nCung cấp, giới thiệu đầy đủ thông tin của sản phẩm trên website: tungshop.com để quý khách có thể tìm hiểu.\r\nLuôn sẵn sàng hỗ trợ 24/24 qua Hotline về mọi vấn đề liên quan đến chất lượng sản phẩm, dịch vụ.', '1683365833_nuoc-hoa-louisvuitton-6.jpg', 1),
(11, 'Nước Hoa Louis Vuitton Spell On You 100ml ', 1, 3, 12, 15, 0, 9555000, 8250000, 10, 'Thương hiệu: Louis Vuitton.\r\n\r\nXuất xứ: Pháp.\r\n\r\nDung tích: 100ml.\r\n\r\nNồng độ: EDP.\r\n\r\nNhóm hương: Floral-Hương hoa cỏ.\r\n\r\nĐộ lưu hương: 3-6 giờ.\r\n\r\nĐộ tỏa hương: Gần-trong khoảng 1 cánh tay.\r\n\r\nThời điểm khuyên dùng: Ngày, xuân, hạ, thu', '1683365920_nuoc-hoa-louisvuitton-5.jpg', 1),
(12, 'Nước Hoa Louis Vuitton Coeur Battant 100ml', 1, 3, 12, 9, 6, 9555000, 8650000, 10, 'Thương hiệu: Louis Vuitton\r\n\r\nXuất xứ: Pháp\r\n\r\nDung tích: 100ml\r\n\r\nNồng độ: Eau de parfum (EDP)\r\n\r\nNhóm hương: hương hoa cỏ phương Đông – Oriental Floral\r\n\r\nĐộ lưu hương: Lâu, từ 7 đến 12 giờ\r\n\r\nĐộ tỏa hương: Gần- trong vòng 1 cánh tay\r\n\r\nThời điểm khuyên dùng: Ngày, đêm, Xuân, Thu', '1683365994_nuoc-hoa-louisvuitton-4.jpg', 1),
(13, 'Nước Hoa Louis Vuitton City Of Stars 100ml', 1, 3, 12, 2, 9, 9000000, 10500000, 10, 'Tên sản phẩm	Nước Hoa Louis Vuitton City Of Stars 100ml\r\nXuất sứ	Pháp\r\nNhóm hương 	Hương hoa cỏ trái cây\r\nPhong cách 	Tươi mát trẻ trung hiện đại\r\nHương đầu 	Qủa cam đỏ , Quýt hồng , Chanh vàng , Chanh xanh , Cam bergamot\r\nHương giữa 	Hoa tiare\r\nHương cuối 	Xạ hương , Hương phấn , Gỗ đàn hương\r\nĐộ lưu hương	7 – 12 giờ\r\nThời điểm khuyên dùng	Ngày, đêm , xuân , hạ , thu\r\nDung tích	100ml', '1683366133_nuoc-hoa-louisvuitton-3.jpg', 1),
(14, 'Nước Hoa Louis Vuitton Meteore 100ml', 1, 3, 12, 0, 15, 9555000, 10590000, 8, 'Tên sản phẩm	Nước Hoa Louis Vuitton Meteore 100ml\r\nXuất sứ	Pháp\r\nNhóm hương 	 Citrus Aromatic – Hương cam chanh thơm ngát\r\nPhong cách 	Phóng khoáng, Nam tính, Lịch thiệp\r\nHương đầu 	 Cam Mandarin, Cam Sicilian, Cam Bergamot\r\nHương giữa 	Bạch đậu khấu, Hoa cam Neroli, Tiêu hồng, Hạnh nhân, Tiêu đen\r\nHương cuối 	 Cỏ hương bài\r\nĐộ lưu hương	Trung bình, từ 3 đến 6 tiếng\r\nThời điểm khuyên dùng	 Mùa xuân – Mùa hạ, Ban ngày\r\nDung tích	100ml', '1683366239_nuoc-hoa-louisvuitton-2.jpg', 1),
(15, 'Nước Hoa Louis Vuitton Imagination 100ml', 1, 3, 12, 8, 4, 8500000, 10000000, 10, 'Tên sản phẩm	Nước Hoa Louis Vuitton Imagination 100ml\r\nXuất sứ	Pháp\r\nNhóm hương 	 Citrus Aromatic – Hương cam chanh thơm ngát\r\nPhong cách 	Sang trọng, Nam tính, Hiện đại\r\nHương đầu 	Cam Bergamot, Trái thanh yên, Cam Sicilian\r\nHương giữa 	Gừng, Quế, Hoa cam Neroli\r\nHương cuối 	 Gỗ Guaiac, Trà đen, Hương Ambroxan, Hương trầm\r\nĐộ lưu hương	7 – 12 giờ\r\nThời điểm khuyên dùng	 Mùa xuân – Mùa hạ – Mùa thu, Ban ngay\r\nDung tích	100ml', '1683366331_nuoc-hoa-louisvuitton-1.jpg', 1),
(16, 'Nước hoa Gucci Intense OUD Eau De Parfum nữ 90ml', 3, 2, 11, 44, 1, 2500000, 4000000, 8, 'Cam kết chỉ bán hàng chính hãng, chất lượng đảm bảo tuyệt đối.\r\n\r\nGiá cả tốt nhất thị trường, chất lượng sản phẩm tương xứng với số tiền bỏ ra.\r\nGiao hàng toàn quốc đồng giá 45k, miễn phí ship với đơn hàng trên 5 triệu khi đã chuyển khoản 100%\r\nTuyệt đối không bán hàng kém chất lượng.\r\nĐảm bảo mỗi sản phẩm luôn trong tình trạng nguyên bản.\r\nCam kết mang đến những dòng sản phẩm cao cấp mang đến đẳng cấp phù hợp với từng quý khách hàng.\r\nCung cấp, giới thiệu đầy đủ thông tin của sản phẩm trên website: tungshop.com để quý khách có thể tìm hiểu.\r\nLuôn sẵn sàng hỗ trợ 24/24 qua Hotline về mọi vấn đề liên quan đến chất lượng sản phẩm, dịch vụ.', '1683366491_nuoc-hoa-gucci-nu-1.jpg', 1),
(17, 'Nước hoa Gucci Guilty Pour Homme Eau de Parfum 90ml', 1, 2, 11, 11, 0, 2500000, 3500000, 10, 'Cam kết chỉ bán hàng chính hãng, chất lượng đảm bảo tuyệt đối.\r\n\r\nGiá cả tốt nhất thị trường, chất lượng sản phẩm tương xứng với số tiền bỏ ra.\r\nGiao hàng toàn quốc đồng giá 45k, miễn phí ship với đơn hàng trên 5 triệu khi đã chuyển khoản 100%\r\nTuyệt đối không bán hàng kém chất lượng.\r\nĐảm bảo mỗi sản phẩm luôn trong tình trạng nguyên bản.\r\nCam kết mang đến những dòng sản phẩm cao cấp mang đến đẳng cấp phù hợp với từng quý khách hàng.\r\nCung cấp, giới thiệu đầy đủ thông tin của sản phẩm trên website: tungshop.com để quý khách có thể tìm hiểu.\r\nLuôn sẵn sàng hỗ trợ 24/24 qua Hotline về mọi vấn đề liên quan đến chất lượng sản phẩm, dịch vụ.', '1683366558_nuoc-hoa-gucci-2.jpg', 1),
(18, 'Nước Hoa Chanel Chance Eau Fraiche EDT 50ml nữ', 3, 1, 7, 8, 4, 2000000, 3000000, 8, '<table border=\"1\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thương hiệu</strong></td>\r\n			<td style=\"width:50%\"><strong>CHANEL</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"width:50%\">Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Dung t&iacute;ch</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/105-ml\">Chai 50ml</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nồng độ</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/eau-de-parfum\">Eau de Parfum</a> (EDP)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nh&oacute;m hương</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/floral-fruity-huong-hoa-co-trai-cay\">Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ lưu hương</strong></td>\r\n			<td style=\"width:50%\">Rất l&acirc;u - Tr&ecirc;n 12 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ tỏa hương</strong></td>\r\n			<td style=\"width:50%\">Xa - Toả hương trong v&ograve;ng b&aacute;n k&iacute;nh 2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thời điểm th&iacute;ch hợp</strong></td>\r\n			<td style=\"width:50%\">Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ, Thu, Đ&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Th&ocirc;ng tin chung</h3>\r\n\r\n<ul>\r\n	<li>Năm ph&aacute;t h&agrave;nh :2015</li>\r\n	<li>Giới t&iacute;nh : Nữ</li>\r\n	<li>Phong c&aacute;ch :Sang trọng, quyến rũ, ngọt ng&agrave;o</li>\r\n	<li>Xuất xứ :Ả Rập</li>\r\n	<li>Promotion :M&atilde; giảm gi&aacute;</li>\r\n</ul>\r\n\r\n<h3>Chi tiết</h3>\r\n\r\n<ul>\r\n	<li>Nồng độ :Eau de Parfum</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lưu hương :Tr&ecirc;n 12h</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&oacute;m hương :Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch :100ml</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Độ tỏa hương :Tr&ecirc;n 2m</li>\r\n</ul>\r\n', '1683367751_nuoc-hoa-chanel-1.jpg', 1),
(19, 'Nước Hoa Chanel Chance Eau Tendre EDT 50ml nữ', 3, 1, 7, 3, 5, 3000000, 4000000, 5, '<table border=\"1\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thương hiệu</strong></td>\r\n			<td style=\"width:50%\"><strong>CHANEL</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"width:50%\">Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Dung t&iacute;ch</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/105-ml\">Chai 50ml</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nồng độ</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/eau-de-parfum\">Eau de Parfum</a> (EDP)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nh&oacute;m hương</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/floral-fruity-huong-hoa-co-trai-cay\">Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ lưu hương</strong></td>\r\n			<td style=\"width:50%\">Rất l&acirc;u - Tr&ecirc;n 12 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ tỏa hương</strong></td>\r\n			<td style=\"width:50%\">Xa - Toả hương trong v&ograve;ng b&aacute;n k&iacute;nh 2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thời điểm th&iacute;ch hợp</strong></td>\r\n			<td style=\"width:50%\">Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ, Thu, Đ&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Th&ocirc;ng tin chung</h3>\r\n\r\n<ul>\r\n	<li>Năm ph&aacute;t h&agrave;nh :2015</li>\r\n	<li>Giới t&iacute;nh : Nữ</li>\r\n	<li>Phong c&aacute;ch :Sang trọng, quyến rũ, ngọt ng&agrave;o</li>\r\n	<li>Xuất xứ :Ả Rập</li>\r\n	<li>Promotion :M&atilde; giảm gi&aacute;</li>\r\n</ul>\r\n\r\n<h3>Chi tiết</h3>\r\n\r\n<ul>\r\n	<li>Nồng độ :Eau de Parfum</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lưu hương :Tr&ecirc;n 12h</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&oacute;m hương :Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch :100ml</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Độ tỏa hương :Tr&ecirc;n 2m</li>\r\n</ul>\r\n', '1683367818_nuoc-hoa-chanel-2.jpg', 1),
(20, 'Nước Hoa Dior Sauvage Elixir 60ml', 1, 4, 8, 13, 3, 2500000, 4000000, 8, '<table border=\"1\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thương hiệu</strong></td>\r\n			<td style=\"width:50%\"><strong>DIOR</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"width:50%\">Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Dung t&iacute;ch</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/105-ml\">Chai 60ml</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nồng độ</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/eau-de-parfum\">Eau de Parfum</a> (EDP)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nh&oacute;m hương</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/floral-fruity-huong-hoa-co-trai-cay\">Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ lưu hương</strong></td>\r\n			<td style=\"width:50%\">Rất l&acirc;u - Tr&ecirc;n 12 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ tỏa hương</strong></td>\r\n			<td style=\"width:50%\">Xa - Toả hương trong v&ograve;ng b&aacute;n k&iacute;nh 2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thời điểm th&iacute;ch hợp</strong></td>\r\n			<td style=\"width:50%\">Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ, Thu, Đ&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Th&ocirc;ng tin chung</h3>\r\n\r\n<ul>\r\n	<li>Năm ph&aacute;t h&agrave;nh :2015</li>\r\n	<li>Giới t&iacute;nh : Unisex</li>\r\n	<li>Phong c&aacute;ch :Sang trọng, quyến rũ, ngọt ng&agrave;o</li>\r\n	<li>Xuất xứ :Ả Rập</li>\r\n	<li>Promotion :M&atilde; giảm gi&aacute;</li>\r\n</ul>\r\n\r\n<h3>Chi tiết</h3>\r\n\r\n<ul>\r\n	<li>Nồng độ :Eau de Parfum</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lưu hương :Tr&ecirc;n 12h</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&oacute;m hương :Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch :100ml</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Độ tỏa hương :Tr&ecirc;n 2m</li>\r\n</ul>\r\n', '1683367983_nuoc-hoa-dior-1.jpg', 1),
(21, 'Nước Hoa Dior Miss Dior Le Parfum 100ml nữ', 3, 4, 12, 0, 3, 3000000, 4000000, 8, '<table border=\"1\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thương hiệu</strong></td>\r\n			<td style=\"width:50%\">DIOR</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"width:50%\">Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Dung t&iacute;ch</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/105-ml\">Chai 100ml</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nồng độ</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/eau-de-parfum\">Eau de Parfum</a> (EDP)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nh&oacute;m hương</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/floral-fruity-huong-hoa-co-trai-cay\">Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ lưu hương</strong></td>\r\n			<td style=\"width:50%\">Rất l&acirc;u - Tr&ecirc;n 12 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ tỏa hương</strong></td>\r\n			<td style=\"width:50%\">Xa - Toả hương trong v&ograve;ng b&aacute;n k&iacute;nh 2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thời điểm th&iacute;ch hợp</strong></td>\r\n			<td style=\"width:50%\">Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ, Thu, Đ&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Th&ocirc;ng tin chung</h3>\r\n\r\n<ul>\r\n	<li>Năm ph&aacute;t h&agrave;nh :2015</li>\r\n	<li>Giới t&iacute;nh : Nữ</li>\r\n	<li>Phong c&aacute;ch :Sang trọng, quyến rũ, ngọt ng&agrave;o</li>\r\n	<li>Xuất xứ :Ả Rập</li>\r\n	<li>Promotion :M&atilde; giảm gi&aacute;</li>\r\n</ul>\r\n\r\n<h3>Chi tiết</h3>\r\n\r\n<ul>\r\n	<li>Nồng độ :Eau de Parfum</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lưu hương :Tr&ecirc;n 12h</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&oacute;m hương :Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch :100ml</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Độ tỏa hương :Tr&ecirc;n 2m</li>\r\n</ul>\r\n', '1683368078_nuoc-hoa-dior-nu-2.jpg', 1),
(22, 'Nước hoa Gucci Flora Gorgeous Jasmine EDP 100ml', 0, 2, 12, 23, 2, 3000000, 3500000, 5, '<table border=\"1\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thương hiệu</strong></td>\r\n			<td style=\"width:50%\"><strong>GUCCI</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Xuất xứ</strong></td>\r\n			<td style=\"width:50%\">Ph&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Dung t&iacute;ch</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/105-ml\">Chai 100ml</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nồng độ</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/eau-de-parfum\">Eau de Parfum</a> (EDP)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Nh&oacute;m hương</strong></td>\r\n			<td style=\"width:50%\"><a href=\"https://vuahanghieu.com/nuoc-hoa/floral-fruity-huong-hoa-co-trai-cay\">Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ lưu hương</strong></td>\r\n			<td style=\"width:50%\">Rất l&acirc;u - Tr&ecirc;n 12 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Độ tỏa hương</strong></td>\r\n			<td style=\"width:50%\">Xa - Toả hương trong v&ograve;ng b&aacute;n k&iacute;nh 2 m&eacute;t</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:50%\"><strong>Thời điểm th&iacute;ch hợp</strong></td>\r\n			<td style=\"width:50%\">Ng&agrave;y, Đ&ecirc;m, Xu&acirc;n, Hạ, Thu, Đ&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Th&ocirc;ng tin chung</h3>\r\n\r\n<ul>\r\n	<li>Năm ph&aacute;t h&agrave;nh :2015</li>\r\n	<li>Giới t&iacute;nh : Unisex</li>\r\n	<li>Phong c&aacute;ch :Sang trọng, quyến rũ, ngọt ng&agrave;o</li>\r\n	<li>Xuất xứ :Ả Rập</li>\r\n	<li>Promotion :M&atilde; giảm gi&aacute;</li>\r\n</ul>\r\n\r\n<h3>Chi tiết</h3>\r\n\r\n<ul>\r\n	<li>Nồng độ :Eau de Parfum</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Lưu hương :Tr&ecirc;n 12h</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&oacute;m hương :Floral Fruity - hương hoa cỏ tr&aacute;i c&acirc;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch :100ml</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Độ tỏa hương :Tr&ecirc;n 2m</li>\r\n</ul>\r\n', '1683368197_nuoc-hoa-gucci-3.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `vnp_id` int(11) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankcode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `order_code` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vnpay`
--

INSERT INTO `vnpay` (`vnp_id`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `order_code`, `payment_status`) VALUES
(1, '500000000', 'NCB', 'VNP14020653', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230524170955', 'MCG9RE1Q', '14020653', 4573, 0),
(2, '500000000', 'NCB', 'VNP14020653', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230524170955', 'MCG9RE1Q', '14020653', 4573, 0),
(3, '810000000', 'NCB', 'VNP14020679', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230524172011', 'MCG9RE1Q', '14020679', 905, 0),
(10, '630000000', 'NCB', 'VNP14023814', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528122353', 'MCG9RE1Q', '14023814', 0, 0),
(11, '630000000', 'NCB', 'VNP14023814', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528122353', 'MCG9RE1Q', '14023814', 0, 0),
(12, '630000000', 'NCB', 'VNP14023814', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528122353', 'MCG9RE1Q', '14023814', 0, 0),
(13, '630000000', 'NCB', 'VNP14023814', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528122353', 'MCG9RE1Q', '14023814', 0, 0),
(14, '350000000', 'NCB', 'VNP14023815', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528123948', 'MCG9RE1Q', '14023815', 992, 0),
(15, '1440000000', 'NCB', 'VNP14023816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528125013', 'MCG9RE1Q', '14023816', 7556, 0),
(16, '360000000', 'NCB', 'VNP14023817', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528125540', 'MCG9RE1Q', '14023817', 3618, 0),
(17, '270000000', 'NCB', 'VNP14023819', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528125748', 'MCG9RE1Q', '14023819', 3323, 0),
(18, '1800000000', 'NCB', 'VNP14023820', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528130003', 'MCG9RE1Q', '14023820', 1154, 0),
(19, '360000000', 'NCB', 'VNP14023929', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230528155852', 'MCG9RE1Q', '14023929', 0, 0),
(20, '368000000', 'VNPAY', '', 'QRCODE', 'Thanh toán đơn hàng Guha Perfume', '20230529113726', 'MCG9RE1Q', '0', 9667, 0),
(21, '368000000', 'NCB', 'VNP14029730', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603160224', 'MCG9RE1Q', '14029730', 6476, 0),
(22, '350000000', 'VNPAY', '', 'QRCODE', 'Thanh toán đơn hàng Guha Perfume', '20230603204956', 'MCG9RE1Q', '0', 0, 0),
(23, '368000000', 'NCB', 'VNP14029794', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603205748', 'MCG9RE1Q', '14029794', 3000, 0),
(24, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(25, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(26, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(27, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(28, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(29, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(30, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(31, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(32, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(33, '368000000', 'NCB', 'VNP14029816', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603221222', 'MCG9RE1Q', '14029816', 4941, 0),
(34, '368000000', 'NCB', 'VNP14029819', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603222317', 'MCG9RE1Q', '14029819', 9050, 0),
(35, '368000000', 'NCB', 'VNP14029819', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603222317', 'MCG9RE1Q', '14029819', 9050, 0),
(36, '368000000', 'NCB', 'VNP14029821', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603222548', 'MCG9RE1Q', '14029821', 3320, 0),
(37, '368000000', 'NCB', 'VNP14029822', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603222706', 'MCG9RE1Q', '14029822', 4220, 0),
(38, '900000000', 'NCB', 'VNP14029833', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230603225623', 'MCG9RE1Q', '14029833', 14, 0),
(39, '360000000', 'NCB', 'VNP14029949', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230604095052', 'MCG9RE1Q', '14029949', 9439, 0),
(40, '315000000', 'NCB', 'VNP14032419', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230606210601', 'MCG9RE1Q', '14032419', 2417, 0),
(41, '270000000', 'NCB', 'VNP14032946', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230607135755', 'MCG9RE1Q', '14032946', 9787, 0),
(42, '733500000', 'NCB', 'VNP14032963', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230607141409', 'MCG9RE1Q', '14032963', 9952, 0),
(43, '1260000000', 'NCB', 'VNP14035526', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230611085006', 'MCG9RE1Q', '14035526', 4731, 0),
(44, '270000000', 'NCB', 'VNP14038464', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230614105820', 'MCG9RE1Q', '14038464', 3704, 0),
(45, '380000000', 'NCB', 'VNP14040288', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230616091839', 'MCG9RE1Q', '14040288', 2166, 0),
(46, '900000000', 'NCB', 'VNP14041820', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230618170147', 'MCG9RE1Q', '14041820', 5099, 0),
(47, '1467000000', 'NCB', 'VNP14041844', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230618181811', 'MCG9RE1Q', '14041844', 9644, 0),
(48, '1330000000', 'NCB', 'VNP14041965', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230618230640', 'MCG9RE1Q', '14041965', 9063, 0),
(49, '733500000', 'NCB', 'VNP14042736', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230619193722', 'MCG9RE1Q', '14042736', 771, 0),
(50, '368000000', 'NCB', 'VNP14042837', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230619234540', 'MCG9RE1Q', '14042837', 3407, 0),
(51, '8505000000', 'NCB', 'VNP14042912', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230620072627', 'MCG9RE1Q', '14042912', 6492, 0),
(52, '736000000', 'NCB', 'VNP14042923', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230620081701', 'MCG9RE1Q', '14042923', 6872, 0),
(53, '13639920000', 'NCB', 'VNP14060802', 'ATM', 'Thanh toán đơn hàng Guha Perfume', '20230707180752', 'MCG9RE1Q', '14060802', 4287, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`capacity_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Chỉ mục cho bảng `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`evaluate_id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Chỉ mục cho bảng `inventory_detail`
--
ALTER TABLE `inventory_detail`
  ADD PRIMARY KEY (`inventory_detail_id`);

--
-- Chỉ mục cho bảng `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`metric_id`);

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`momo_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`vnp_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `capacity`
--
ALTER TABLE `capacity`
  MODIFY `capacity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `evaluate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `inventory_detail`
--
ALTER TABLE `inventory_detail`
  MODIFY `inventory_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `metrics`
--
ALTER TABLE `metrics`
  MODIFY `metric_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE `momo`
  MODIFY `momo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `vnp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
