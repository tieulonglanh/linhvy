-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2013 at 07:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `code_standard`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Admin',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên Admin',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu',
  `status` int(11) DEFAULT NULL COMMENT 'Trạng thái',
  `role` int(11) DEFAULT NULL COMMENT 'Quyền',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `password`, `status`, `role`, `created`, `modified`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 4, '2012-10-09 00:00:00', '2012-10-09 00:00:00'),
(2, 'abcd', '21232f297a57a5a743894a0e4a801fc3', 1, 4, '2012-10-09 00:00:00', '2012-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã quảng cáo',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên Quảng cáo',
  `name_en` varchar(255) NOT NULL COMMENT 'tên tiếng Anh',
  `link` varchar(255) CHARACTER SET ucs2 DEFAULT NULL COMMENT 'Đường dẫn',
  `images` varchar(255) DEFAULT NULL COMMENT 'Hình ảnh',
  `position` int(11) NOT NULL COMMENT 'vị trí của quảng cáo: 1 - bên trái, 2 - bên phải, 3 - center, 4 - top .... or tùy chọn :D',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái của quảng cáo: 1 - hiện, 0 - ẩn',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `name`, `name_en`, `link`, `images`, `position`, `sort_order`, `status`, `created`, `modified`) VALUES
(74, 'Quảng cáo bên trái', 'Quảng cáo bên trái', 'http://google.com', '/admin/webroot/upload/image/images/quangcao.png', 3, 0, 1, '2013-03-04 00:00:00', '2013-03-13 10:04:04'),
(75, 'Quảng cáo bên phải', '', 'http://dantri.com.vn', '/admin/webroot/upload/image/images/quangcao.png', 4, 0, 1, '2013-03-10 00:00:00', '2013-03-13 09:49:21'),
(77, 'Quảng cáo trái', 'Left Advertisement', 'http://dantri.com.vn', '/admin/webroot/upload/image/images/logo.png', 4, 1, 1, '2013-03-12 15:38:38', '2013-03-13 10:01:01'),
(78, 'Quảng cáo trái', 'Left Advertisement', 'http://dantri.com.vn', '/admin/webroot/upload/image/images/logo.png', 4, 1, 1, '2013-03-13 10:01:07', '2013-03-13 10:05:42'),
(79, 'Quảng cáo phải', 'Quảng cáo phải', 'http://google.com', '/admin/webroot/upload/image/loilinh1990/images/quangcao.png', 2, 1, 1, '2013-04-15 13:29:29', '2013-04-15 13:29:29'),
(80, 'Quảng cáo phải 2', 'Quảng cáo phải 2', 'http://google.com', '/admin/webroot/upload/image/loilinh1990/images/quangcao.png', 2, 2, 1, '2013-04-15 13:29:48', '2013-04-15 13:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên hệ',
  `name` varchar(50) NOT NULL COMMENT 'Tên khách hàng',
  `email` varchar(50) NOT NULL COMMENT 'Email khách hàng',
  `mobile` varchar(20) NOT NULL COMMENT 'Số ĐT Khách hàng',
  `fax` varchar(20) DEFAULT NULL COMMENT 'Số Fax',
  `company` varchar(200) DEFAULT NULL COMMENT 'Tên Cty',
  `title` varchar(200) NOT NULL COMMENT 'Tiêu đề gửi',
  `content` text NOT NULL COMMENT 'Nội dung',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của liên hệ',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `fax`, `company`, `title`, `content`, `status`, `created`, `modified`) VALUES
(4, 'Nguyễn Văn Công', 'cong-nguyen@vtmgroup.com.vn', '01688504263', '09487547584', 'Công ty abc', 'Chúc may mắn', 'dang test mail', 1, '2011-07-04 00:00:00', '2013-03-12 16:05:31'),
(5, 'Nguyễn Văn Công', 'cong-nguyen@vtmgroup.com.vn', '09487547584', '09487547584', 'Công ty abc', 'Chúc may mắn', 'Cái này là cái gì :))', 1, '2013-03-12 16:03:01', '2013-03-12 16:05:32'),
(7, '123', '123', '123', NULL, NULL, '', '123', 0, '2013-07-31 08:23:37', '2013-07-31 08:23:37'),
(8, '', '', '', NULL, NULL, '', '', 0, '2013-08-17 07:06:49', '2013-08-17 07:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã bộ sưu tập',
  `gallery_category_id` int(11) NOT NULL COMMENT 'Mã danh mục bộ sưu tập ảnh',
  `name` varchar(50) DEFAULT NULL COMMENT 'Tên bộ sưu tập',
  `name_en` varchar(255) NOT NULL COMMENT 'tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo của bộ sưu tập',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `multi_images` varchar(1000) NOT NULL COMMENT 'Nếu có nhiều ảnh thì up vào đây, mỗi ảnh cách nhau bởi dấu " | "',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự sắp xếp',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `status` int(11) NOT NULL COMMENT 'Trạng thái',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_category_id`, `name`, `name_en`, `alias`, `images`, `multi_images`, `sort_order`, `lft`, `rght`, `status`, `created`, `modified`) VALUES
(1, 0, 'Mùa Thu Hà Nội', '', '', '/admin/webroot/upload/image/images/product_image.png', '', 0, '', '', 1, '2011-05-10 00:00:00', '2013-03-11 00:00:00'),
(56, 0, 'Hà Nội', '', '', '/admin/webroot/upload/image/images/logo.png', '', 0, '', '', 1, '2012-12-22 00:00:00', '2013-03-11 00:00:00'),
(57, 5, 'Tên Gallery', 'Tên tiếng anh', 'ten-gallery', '/admin/webroot/upload/image/images/1322794237861980681_574_574.jpg', '/admin/webroot/upload/image/images/2.jpg|/admin/webroot/upload/image/images/9613870-stack-of-books-on-a-red-background-pattern-on-the-theme-of-reading-and-education.jpg|/admin/webroot/upload/image/images/logo.png|/admin/webroot/upload/image/images/product_image.png', 1, '1', '2', 1, '2013-03-13 03:33:31', '2013-03-13 03:33:31'),
(58, 5, 'Tên Gallery', 'Tên tiếng anh', 'ten-gallery', '/admin/webroot/upload/image/images/9613870-stack-of-books-on-a-red-background-pattern-on-the-theme-of-reading-and-education.jpg', '/admin/webroot/upload/image/images/logo.png|/admin/webroot/upload/image/images/product_image.png|/admin/webroot/upload/image/images/sp33.png', 2, '3', '4', 1, '2013-03-13 03:42:26', '2013-03-13 04:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục bộ sưu tập',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `name_en`, `alias`, `images`, `status`, `created`, `modified`) VALUES
(5, 0, '1', '6', 'Ảnh dã ngoại', 'Ảnh dã ngoại', 'anh-da-ngoai', '/admin/webroot/upload/image/images/sp33.png', 1, '2013-03-12 16:54:52', '2013-03-12 16:54:52'),
(6, 5, '2', '5', 'Ảnh cưới', 'Ảnh cưới', 'anh-cuoi', '/admin/webroot/upload/image/images/sp11.png', 1, '2013-03-12 16:55:14', '2013-03-12 16:55:14'),
(7, 6, '3', '4', 'Ảnh thiếu nhi', 'Ảnh thiếu nhi', 'anh-thieu-nhi', '/admin/webroot/upload/image/images/sp22.png', 1, '2013-03-12 16:55:28', '2013-03-12 16:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên kết',
  `name` varchar(255) DEFAULT NULL COMMENT 'tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'tên tiếng anh',
  `link` varchar(255) DEFAULT NULL COMMENT 'link',
  `images` varchar(255) DEFAULT NULL COMMENT 'ảnh',
  `position` int(1) DEFAULT NULL COMMENT 'vị trí link',
  `sort_order` int(11) NOT NULL COMMENT 'thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái của link',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `name_en`, `link`, `images`, `position`, `sort_order`, `status`, `created`, `modified`) VALUES
(30, 'Google', 'Google', 'http://google.com', '/admin/webroot/upload/image/images/link/google.jpg', 1, 1, 1, '2013-03-13 10:40:44', '2013-03-18 05:54:39'),
(31, 'Facebook', 'Facebook', 'http://facebook.com', '/admin/webroot/upload/image/images/link/face.jpg', 1, 2, 1, '2013-03-18 05:55:42', '2013-03-18 05:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã tin tức',
  `news_category_id` int(11) NOT NULL COMMENT 'Mã loại tin tức',
  `images` varchar(255) NOT NULL COMMENT 'Ảnh tin tức',
  `multi_images` varchar(1000) NOT NULL COMMENT 'Nếu tin tức có nhiều ảnh, thì lưu các ảnh vào đây, các ảnh cách nhau bởi dấu " | " ',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng Việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'Lưu đường dẫn ảo của tin tức thông qua tên tin tức',
  `description` text NOT NULL COMMENT 'Mô tả tiếng Việt',
  `description_en` text NOT NULL COMMENT 'Mô tả tiếng Anh',
  `detail` text NOT NULL COMMENT 'Chi tiết tiếng Việt',
  `detail_en` text NOT NULL COMMENT 'Chi tiết tiếng Anh',
  `home_news` int(11) NOT NULL COMMENT 'tin tức trang chủ',
  `hot_news` int(11) NOT NULL COMMENT 'tin tức hot',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự sắp xếp',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của tin tức: 1 - active: hiển thị, 0 - non active: ko hiển thị',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt view tin tức',
  `likes` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt like tin tức',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_category_id`, `images`, `multi_images`, `name`, `name_en`, `alias`, `description`, `description_en`, `detail`, `detail_en`, `home_news`, `hot_news`, `sort_order`, `lft`, `rght`, `status`, `views`, `likes`, `created`, `modified`) VALUES
(1, 8, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '1', '2', 1, 0, 0, '2013-03-13 08:23:25', '2013-07-31 03:07:05'),
(2, 8, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '3', '4', 1, 0, 0, '2013-07-31 03:08:47', '2013-07-31 03:08:47'),
(3, 8, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '5', '6', 1, 0, 0, '2013-07-31 03:08:51', '2013-07-31 03:08:51'),
(4, 8, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '7', '8', 1, 0, 0, '2013-07-31 03:10:46', '2013-07-31 03:10:46'),
(5, 8, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 03:10:50', '2013-07-31 03:10:50'),
(6, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 03:11:03', '2013-07-31 07:53:19'),
(7, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 07:53:24', '2013-07-31 07:53:24'),
(8, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 07:53:27', '2013-07-31 07:53:27');
INSERT INTO `news` (`id`, `news_category_id`, `images`, `multi_images`, `name`, `name_en`, `alias`, `description`, `description_en`, `detail`, `detail_en`, `home_news`, `hot_news`, `sort_order`, `lft`, `rght`, `status`, `views`, `likes`, `created`, `modified`) VALUES
(9, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 07:53:29', '2013-07-31 07:53:29'),
(10, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 07:53:32', '2013-07-31 07:53:32'),
(11, 15, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'Hầu hết người đi xe đạp điện đều “quên” mũ bảo hiểm', 'hau-het-nguoi-di-xe-dap-dien-deu-“quen”-mu-bao-hiem', '(D&acirc;n tr&iacute;) - Trong hai ng&agrave;y ra qu&acirc;n, Cảnh s&aacute;t giao th&ocirc;ng (CSGT) H&agrave; Nội xử l&yacute; gần 200 trường hợp điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm, tạm giữ h&agrave;ng chục xe. Tr&ecirc;n c&aacute;c tuyến phố vẫn c&oacute; kh&ocirc;ng &iacute;t người điều khiển xe đạp điện &ldquo;qu&ecirc;n&rdquo; mũ bảo hiểm.', '', '<h2>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Ph&ograve;ng CSGT H&agrave; Nội cho biết, trong hai ng&agrave;y ra qu&acirc;n, lực lượng c&ocirc;ng an đ&atilde; xử l&yacute; gần 200 trường hợp đi xe đạp điện kh&ocirc;ng đội mũ bảo hiểm. Trong đ&oacute;, lực lượng cảnh s&aacute;t tạm giữ 21 phương tiện, phạt cảnh c&aacute;o gần 60 trường hợp, phạt tiền hơn 130 trường hợp. Hầu hết đối tượng bị xử l&yacute; l&agrave; học sinh, sinh vi&ecirc;n. Những trường hợp bị tạm giữ xe 10 ng&agrave;y, phụ huynh đến giải quyết đều dưới 16 tuổi.</span></span></h2>\r\n<div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;"><img alt="Người đi xe đạp điện&nbsp;thường quên mũ bảo hiểm khi tham gia giao thông" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2013/03/anh-2e938.jpg" /></span></span><br />\r\n		&nbsp;</div>\r\n	<div style="text-align: center;">\r\n		<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Người đi xe đạp điện&nbsp;thường &quot;qu&ecirc;n&quot; mũ bảo hiểm khi tham gia giao th&ocirc;ng</span></span><br />\r\n		&nbsp;</div>\r\n</div>\r\n<div>\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Mặc d&ugrave; lực lượng CSGT ra qu&acirc;n xử l&yacute; nghi&ecirc;m nhưng theo quan s&aacute;t của ph&oacute;ng vi&ecirc;n, gần 100% người điều khiển xe đạp điện kh&ocirc;ng đội mũ bảo hiểm khi tham gia giao th&ocirc;ng. Điều đ&aacute;ng n&oacute;i, phần lớn trong số n&agrave;y l&agrave; học sinh, sinh vi&ecirc;n v&agrave; người gi&agrave;.<br />\r\n	Chiều 12/3, tại ng&atilde; tư Xu&acirc;n Thủy - Phạm H&ugrave;ng, nhiều người vẫn đầu trần điều khiểm xe đạp điện. Tr&ecirc;n chiếc xe đạp điện ngắn cũn, nhiều &ldquo;&aacute;o trắng&rdquo; c&ograve;n kẹp ba ph&oacute;ng v&ugrave; v&ugrave; tr&ecirc;n đường. Thậm ch&iacute; một số em học sinh c&ograve;n tận dụng động cơ của xe đạp điện k&eacute;o xe đạp thường, g&acirc;y nguy hiểm cho người tham gia giao th&ocirc;ng.<br />\r\n	&ldquo;N&oacute;i l&agrave; xe đạp điện nhưng t&ocirc;i thấy nhiều người điều khiển c&ograve;n ph&oacute;ng nhanh hơn xe m&aacute;y. Nhiều trường hợp t&ocirc;i thấy học sinh c&ograve;n kẹp ba vừa đi vừa đ&aacute;ng v&otilde;ng tr&ecirc;n đường rất nguy hiểm. Để bảo đảm an to&agrave;n giao th&ocirc;ng theo t&ocirc;i quy định v&agrave; xử l&yacute; nghi&ecirc;m với người đi xe đạp điện l&agrave; cần thiết&rdquo;, chị B&igrave;nh nh&agrave; ở Cầu Giấy cho biết.<br />\r\n	Chỉ đứng khoảng 1 tiếng ở một chốt giao th&ocirc;ng tr&ecirc;n trục đường Nguyễn Tr&atilde;i, lực lượng CSGT đ&atilde; xử l&yacute; h&agrave;ng chục trường hợp kh&ocirc;ng đội mũ bảo hiểm khi l&aacute;i xe đạp điện. Những trường hợp vi phạm cũng được CSGT chia theo độ tuổi để căn cứ mức xử l&yacute; kh&aacute;c nhau.<br />\r\n	Đại diện ph&ograve;ng CSGT H&agrave; Nội cho biết, sau hai ng&agrave;y ra qu&acirc;n, c&aacute;c đơn vị ph&ograve;ng ban sẽ ngồi lại với nhau để tổng kết t&igrave;nh h&igrave;nh, từ đ&oacute; sẽ đưa ra c&aacute;c hướng xử l&yacute; tiếp theo đối với người đi xe đạp điện nhưng kh&ocirc;ng đội mũ bảo hiểm.<br />\r\n	Trước đ&oacute;, lực lượng Cảnh s&aacute;t giao th&ocirc;ng đ&atilde; ra qu&acirc;n tập trung xử l&yacute; c&aacute;c h&agrave;nh vi vi phạm tr&ecirc;n địa b&agrave;n đối với những trường hợp điều khiển xe đạp, xe m&aacute;y đi h&agrave;ng ba trở l&ecirc;n; Người điều khiển, người ngồi tr&ecirc;n xe đạp điện, chở người ngồi tr&ecirc;n xe đạp điện kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng.</span></span><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Nghị định 34/2010/NĐ-CP quy định r&otilde;, phạt tiền từ 100 - 200 ngh&igrave;n đồng đối với người điều khiển, người ngồi tr&ecirc;n xe m&ocirc; t&ocirc;, xe gắn m&aacute;y (kể cả xe đạp điện) kh&ocirc;ng đội mũ bảo hiểm hoặc đội mũ bảo hiểm kh&ocirc;ng c&agrave;i quai đ&uacute;ng quy c&aacute;ch khi tham gia giao th&ocirc;ng tr&ecirc;n đường bộ.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div>\r\n	&nbsp;</div>\r\n<br />\r\n<div style="text-align: right;">\r\n	<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:12px;">Quang Phong</span></span></div>\r\n', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 07:53:34', '2013-07-31 07:53:34'),
(12, 13, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Giá cả hợp lý', 'Giá cả hợp lý', 'gia-ca-hop-ly', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Gi&aacute; cả hợp l&yacute;</a>', '', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Gi&aacute; cả hợp l&yacute;</a>', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 08:18:19', '2013-07-31 08:18:19'),
(13, 13, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Chất lượng hoàn hảo', 'Chất lượng hoàn hảo', 'chat-luong-hoan-hao', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Chất lượng ho&agrave;n hảo</a>', '', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Chất lượng ho&agrave;n hảo</a>', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 08:18:39', '2013-07-31 08:18:39'),
(14, 13, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'Dịch vụ tốt nhất', 'Dịch vụ tốt nhất', 'dich-vu-tot-nhat', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Dịch vụ tốt nhất</a>', '', '<a href="http://code_gd.dev/lien-he" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 97, 194); font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 60px;">Dịch vụ tốt nhất</a>', '', 1, 1, 1, '9', '10', 1, 0, 0, '2013-07-31 08:18:56', '2013-07-31 08:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục tin tức',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `name_en`, `alias`, `images`, `status`, `created`, `modified`) VALUES
(7, 0, '1', '10', 'Danh mục chung', 'Danh mục chung', 'danh-muc-chung', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:13:36', '2013-07-31 02:13:36'),
(8, 7, '2', '3', 'Kết cấu thép và cơ khí', 'Kết cấu thép và cơ khí', 'ket-cau-thep-va-co-khi', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:13:53', '2013-07-31 02:13:53'),
(9, 7, '4', '5', 'Thi công lắp đặt', 'Thi công lắp đặt', 'thi-cong-lap-dat', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:14:06', '2013-07-31 02:14:06'),
(10, 7, '6', '7', 'Gia công và chế tạo', 'Gia công và chế tạo', 'gia-cong-va-che-tao', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:14:21', '2013-07-31 02:14:21'),
(11, 7, '8', '9', 'Tư vấn xây dựng', 'Tư vấn xây dựng', 'tu-van-xay-dung', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:14:32', '2013-07-31 02:14:32'),
(12, 7, '10', '9', 'Gia công chế tạo kết cấu thép', 'Gia công chế tạo kết cấu thép', 'gia-cong-che-tao-ket-cau-thep', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:14:51', '2013-07-31 02:14:51'),
(13, 0, '10', '9', 'Vì sao chọn Hanoi-nocas', 'Vì sao chọn Hanoi-nocas', 'vi-sao-chon-hanoi-nocas', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:18:11', '2013-07-31 02:18:11'),
(14, 0, '10', '9', 'Tin tức', 'Tin tức', 'tin-tuc', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:19:17', '2013-07-31 02:19:17'),
(15, 0, '10', '9', 'Dự án', 'Dự án', 'du-an', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 02:20:10', '2013-07-31 02:20:56'),
(16, 0, '10', '11', 'Dịch vụ', 'Dịch vụ', 'dich-vu', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 08:01:59', '2013-07-31 08:01:59'),
(17, 0, '10', '11', 'Năng lực', 'Năng lực', 'nang-luc', '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', 1, '2013-07-31 08:05:51', '2013-07-31 08:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn',
  `username` varchar(255) NOT NULL COMMENT 'tên khách hàng',
  `address` varchar(255) NOT NULL COMMENT 'địa chỉ',
  `phone` varchar(255) NOT NULL COMMENT 'Số ĐT Khách hàng',
  `number_product` int(11) NOT NULL COMMENT 'số sản phẩm',
  `total_amount` int(11) NOT NULL COMMENT 'tổng tiền',
  `status` int(11) NOT NULL COMMENT 'trạng thái hóa đơn (thanh toán, chưa thanh toán)',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `address`, `phone`, `number_product`, `total_amount`, `status`, `created`, `modified`) VALUES
(2, 'Nguyễn Tất Lợi', 'Hà Đông - Hà Nội', '01676 696 055', 5, 1590000, 1, '2013-03-16 10:20:37', '2013-03-16 04:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết',
  `order_id` int(11) NOT NULL COMMENT 'mã hóa đơn',
  `product_id` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `number_product` int(11) NOT NULL COMMENT 'số lượng sản phẩm',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `number_product`) VALUES
(1, 2, 1, 2),
(2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đối tác',
  `name` varchar(255) NOT NULL COMMENT 'tên đối tác tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'tên đối tác tiếng anh',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `address` varchar(255) NOT NULL COMMENT 'địa chỉ',
  `phone` varchar(255) NOT NULL COMMENT 'số điện thoại',
  `description` text NOT NULL COMMENT 'mô tả về đối tác',
  `description_en` text NOT NULL COMMENT 'mô tả về đối tác tiếng anh',
  `detail` text NOT NULL COMMENT 'chi tiết đối tác',
  `detail_en` text NOT NULL COMMENT 'chi tiết đối tác tiếng anh',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `create` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `name_en`, `images`, `address`, `phone`, `description`, `description_en`, `detail`, `detail_en`, `status`, `create`, `modified`) VALUES
(1, '123', '123', '/admin/webroot/upload/image/images/logo.png', '123', '123', '123', '', '123', '', 1, '0000-00-00 00:00:00', '2013-03-17 16:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Post',
  `images` varchar(255) NOT NULL COMMENT 'Ảnh Post',
  `multi_images` varchar(1000) NOT NULL COMMENT 'Nếu Post có nhiều ảnh, thì lưu các ảnh vào đây, các ảnh cách nhau bởi dấu " | " ',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng Việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'Lưu đường dẫn ảo của Post thông qua tên Post',
  `description` varchar(255) NOT NULL COMMENT 'Mô tả tiếng Việt',
  `description_en` varchar(255) NOT NULL COMMENT 'Mô tả tiếng Anh',
  `detail` text NOT NULL COMMENT 'Chi tiết tiếng Việt',
  `detail_en` text NOT NULL COMMENT 'Chi tiết tiếng Anh',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của Post: 1 - active: hiển thị, 0 - non active: ko hiển thị',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt view Post',
  `likes` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt like Post',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `images`, `multi_images`, `name`, `name_en`, `alias`, `description`, `description_en`, `detail`, `detail_en`, `sort_order`, `status`, `views`, `likes`, `created`, `modified`) VALUES
(1, '/admin/webroot/upload/image/loilinh1990/images/Loi_game_vong_quay.PNG', '', 'GIỚI THIỆU CÔNG TY', 'GIỚI THIỆU CÔNG TY', 'gioi-thieu-cong-ty', '<span style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">Quảng c&aacute;o trực tuyến ng&agrave;y nay đ&atilde; khẳng định vị thế l&agrave; một k&ecirc;nh quảng c&aacute;o ưu trội trong c&a', '', '<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><strong style="margin: 0px; padding: 0px;"><span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);">www.dangcapthuonghieu.org</span></strong>&nbsp;l&agrave; một k&ecirc;nh th&ocirc;ng tin đầy đủ v&agrave; to&agrave;n diện nhất về ng&agrave;nh quảng c&aacute;o trực tuyến của Việt Nam v&agrave; Thế Giới cung cấp cho nh&agrave; quảng c&aacute;o một c&aacute;i nh&igrave;n to&agrave;n cảnh v&agrave; to&agrave;n diện nhất tr&ecirc;n cơ sở l&yacute; thuyết v&agrave; thực tiễn. Ch&uacute;ng t&ocirc;i l&agrave; cầu nối giữa c&aacute;c đơn vị quảng c&aacute;o với một mạng lưới h&agrave;ng ngh&igrave;n kh&aacute;ch h&agrave;ng th&agrave;nh vi&ecirc;n nhằm hỗ trợ v&agrave; n&acirc;ng cao hiệu quả chiến dịch quảng c&aacute;o của c&aacute;c bạn, đồng thời bảo vệ quyền lợi : Sản Phẩm Chất Lượng - Thương Hiệu Uy T&iacute;n cho c&aacute;c đơn vị th&agrave;nh vi&ecirc;n.</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C&aacute;c đơn vị đ&atilde; đăng k&yacute; l&agrave; th&agrave;nh vi&ecirc;n của<strong style="margin: 0px; padding: 0px;"><span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);">www.dangcapthuonghieu.org</span></strong>. C&aacute;c bạn c&oacute; thể tham gia v&agrave;o danh bạ website để quảng b&aacute; t&ecirc;n tuổi của m&igrave;nh. C&aacute;c bạn cũng c&oacute; thể tham gia v&agrave;o mạng lưới trao đổi logo giữa c&aacute;c website th&agrave;nh vi&ecirc;n. V&agrave; cao hơn nữa, h&atilde;y gởi cho ch&uacute;ng t&ocirc;i c&aacute;c th&ocirc;ng tin, h&igrave;nh ảnh chi tiết về đơn vị của bạn, ch&uacute;ng t&ocirc;i sẽ l&agrave; cầu nối để đưa c&aacute;c kh&aacute;ch h&agrave;ng đến gần với bạn hơn. V&igrave; Một Việt Nam &quot; Hội Nhập &amp; Ph&aacute;t Triển &quot;. Đ&oacute; l&agrave; mục ti&ecirc;u, sứ mệnh của<span style="margin: 0px; padding: 0px; font-weight: bold;">&nbsp;</span><span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);"><span style="margin: 0px; padding: 0px; font-weight: bold;">www.dangcapthuonghieu.org</span></span></p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nhằm tăng cường hỗ trợ c&aacute;c kh&aacute;ch h&agrave;ng trong việc ứng dụng c&ocirc;ng nghệ th&ocirc;ng tin v&agrave;o kinh doanh sản xuất x&acirc;y dựng thương hiệu. Tất cả th&agrave;nh vi&ecirc;n khi tham gia quảng c&aacute;o tr&ecirc;n&nbsp;<span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);"><strong style="margin: 0px; padding: 0px;">www.dangcapthuonghieu.org</strong></span>&nbsp;sẽ được hỗ trợ th&agrave;nh lập website miễn ph&iacute;.</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Website c&oacute; đầy đủ t&iacute;nh năng cao cấp nhất ph&ugrave; hợp với c&aacute;c loại h&igrave;nh doanh nghiệp, miễn ph&iacute; thiết kế, miễn ph&iacute; t&ecirc;n miền, miễn ph&iacute; hướng dẫn điều h&agrave;nh,...</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; V&igrave; vậy với những ti&ecirc;u ch&iacute; n&ecirc;u tr&ecirc;n. Kh&aacute;ch h&agrave;ng đừng ngần ngại li&ecirc;n hệ với&nbsp;<span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);"><strong style="margin: 0px; padding: 0px;">www.dangcapthuonghieu.org</strong></span>&nbsp;hoặc hotline:&nbsp;<strong style="margin: 0px; padding: 0px;"><span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);">0903.904.007 - 0982.904.007</span></strong></p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ch&uacute;ng t&ocirc;i rất mong nhận được sự ủng hộ nhiệt t&igrave;nh của tất cả c&aacute;c kh&aacute;ch h&agrave;ng.</p>\r\n<p style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px; text-align: justify;">\r\n	&nbsp;</p>\r\n<p class="rteright" style="margin: 0px; padding: 0px; text-align: right; color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: 16px; line-height: 18px;">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);"><strong style="margin: 0px; padding: 0px;">Ch&agrave;o Tr&acirc;n Trọng &amp; Hợp T&aacute;c</strong></span></p>\r\n', '', 1, 1, 0, 0, '2013-03-17 16:42:16', '2013-07-31 02:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `product_category_id` int(11) NOT NULL COMMENT 'Mã loại sản phẩm',
  `price` int(11) NOT NULL COMMENT 'Giá sản phẩm',
  `images` varchar(255) NOT NULL COMMENT 'Ảnh sản phẩm',
  `multi_images` varchar(1000) NOT NULL COMMENT 'Nếu sản phẩm có nhiều ảnh, thì lưu các ảnh vào đây, các ảnh cách nhau bởi dấu " | " ',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng Việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'Lưu đường dẫn ảo của sản phẩm thông qua tên sản phẩm',
  `description` text NOT NULL COMMENT 'Mô tả tiếng Việt',
  `description_en` text NOT NULL COMMENT 'Mô tả tiếng Anh',
  `detail` text NOT NULL COMMENT 'Chi tiết tiếng Việt',
  `detail_en` text NOT NULL COMMENT 'Chi tiết tiếng Anh',
  `home_product` int(11) NOT NULL COMMENT 'Sản phẩm trang chủ',
  `hot_product` int(11) NOT NULL COMMENT 'Sản phẩm hot',
  `product_saleoff` int(11) DEFAULT NULL COMMENT 'Sản phẩm giảm giá',
  `sort_order` int(11) DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  `lft` varchar(11) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(11) NOT NULL COMMENT 'right tree list',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của sản phẩm: 1 - active: hiển thị, 0 - non active: ko hiển thị',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt view sản phẩm',
  `likes` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt like sản phẩm',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục sản phẩm',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã câu hỏi',
  `name` varchar(256) NOT NULL COMMENT 'tên người hỏi',
  `email` varchar(100) NOT NULL COMMENT 'email',
  `phone` varchar(256) NOT NULL COMMENT 'số đt',
  `address` varchar(225) NOT NULL COMMENT 'địa chỉ',
  `title` varchar(225) NOT NULL COMMENT 'tiêu đề câu hỏi',
  `description` text NOT NULL COMMENT 'mô tả câu hỏi',
  `detail` text NOT NULL COMMENT 'chi tiết câu hỏi',
  `answer` text NOT NULL COMMENT 'câu trả lời',
  `status` int(2) NOT NULL COMMENT 'trạng thái câu hỏi',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`, `email`, `phone`, `address`, `title`, `description`, `detail`, `answer`, `status`, `created`, `modified`) VALUES
(1, '123', '', '', '', '', '123', '123', '123', 0, '2013-03-17 16:13:12', '2013-03-17 16:13:12'),
(2, '123123123', '12312312312', '123', '123', '123', '123', '123', '12312312321312', 1, '2013-03-17 16:13:20', '2013-03-17 16:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` text,
  `contactinfo` text,
  `telephone` varchar(255) DEFAULT NULL,
  `hotline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_key` text,
  `meta_des` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `myspace` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `title`, `address`, `contactinfo`, `telephone`, `hotline`, `email`, `url`, `meta_key`, `meta_des`, `created`, `modified`, `youtube`, `twitter`, `myspace`, `facebook`) VALUES
(1, 'Làm đẹp 24h', 'Làm đẹp 24h', '<strong>Địa chỉ</strong>: Xa La - H&agrave; Đ&ocirc;ng - H&agrave; Nội<br />\r\n<strong>Điện thoại</strong>: 098.346.1603 |<strong>&nbsp;Email</strong>: suckhoevang@gmail.com ', '<span style="color:4e7611;"><strong>Địa chỉ</strong>: Xa La - H&agrave; Đ&ocirc;ng - H&agrave; Nội<br />\r\n<strong>Điện thoại</strong>: 098.346.1603 |<strong> Email</strong>: suckhoevang@gmail.com</span>', '0912101965', '(04) 39285450', 'thuy-phung@vtmgroup.com.vn', 'http://muabanso.vn', 'In - Thêu  181 Hàng Bông 0912101965 - Số 40 Ngõ 250 Nguyễn Xiển  Thanh Xuân - HN ĐT: 35528188\r\n', 'Welcome to Cake 2', '2012-06-05 00:00:00', '2013-03-16 02:56:49', 'http://youtube.com', 'https://twitter.com/', 'https://myspace.com/', 'http://facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(250) DEFAULT NULL COMMENT 'Tên',
  `images` varchar(250) DEFAULT NULL COMMENT 'Ảnh Slide',
  `link` varchar(255) NOT NULL COMMENT 'Link',
  `sort_order` int(11) NOT NULL COMMENT 'thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `name`, `images`, `link`, `sort_order`, `status`, `created`, `modified`) VALUES
(14, 'slide1', '/admin/webroot/upload/image/images/slide.png', '', 0, 1, '2013-03-05 14:24:39', '2013-03-14 10:31:30'),
(15, '123', '/admin/webroot/upload/image/images/slide(1).png', '', 0, 1, '2013-03-10 19:21:18', '2013-03-14 10:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE IF NOT EXISTS `supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên',
  `telephone` varchar(255) DEFAULT NULL COMMENT 'điện thoại',
  `yahoo` varchar(255) DEFAULT NULL COMMENT 'yahoo',
  `skype` varchar(255) DEFAULT '1' COMMENT 'skype',
  `sort_order` int(11) DEFAULT NULL COMMENT 'thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `name`, `telephone`, `yahoo`, `skype`, `sort_order`, `status`, `created`, `modified`) VALUES
(5, 'Ho tro kinh doanh', '123', 'abc', '23', 4, 1, '2012-10-15 00:00:00', '2013-03-17 16:03:26'),
(7, 'thuythuy', '01676 696 055', 'chuyen_tinh_bien_hoa_co_may_88', 'chuyen_tinh_bien_hoa_co_may_88', 0, 1, '2012-12-15 00:00:00', '2013-03-17 16:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã user',
  `username` varchar(255) NOT NULL COMMENT 'User Name',
  `password` varchar(255) NOT NULL COMMENT 'Mật Khẩu',
  `active_key` varchar(255) NOT NULL COMMENT 'Mã băm của mỗi user, sử dụng để đổi pass và những thứ cần bảo mật',
  `email` varchar(255) NOT NULL COMMENT 'Email ',
  `fullname` varchar(255) NOT NULL COMMENT 'Tên đầy đủ',
  `birthdate` date NOT NULL COMMENT 'ngày sinh',
  `gender` tinyint(2) NOT NULL COMMENT 'giới tính',
  `address` varchar(500) DEFAULT NULL COMMENT 'địa chỉ',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Số điện thoại',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT 'Dạng tài khoản: cá nhân (1) / Doanh nghiệp (2)',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của user',
  `created` datetime DEFAULT NULL COMMENT 'ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active_key`, `email`, `fullname`, `birthdate`, `gender`, `address`, `phone`, `avatar`, `type`, `status`, `created`, `modified`) VALUES
(15, 'loilinh1990', '23c6e049d90d23fb5a44c34b98de5683', '', '', 'Nguyễn Tất Lợi', '0000-00-00', 0, NULL, '', '/admin/webroot/upload/image/images/sp33.png', 1, 1, '2013-03-12 08:56:13', '2013-03-12 15:49:07'),
(19, 'ngocmai', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Nguyễn Ngọc Mai', '0000-00-00', 0, NULL, '', '/admin/webroot/upload/image/images/sp11.png', 1, 1, '2013-03-12 09:24:11', '2013-03-12 09:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_category_id` int(11) NOT NULL COMMENT 'Mã danh mục video',
  `name` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL COMMENT 'tên tiếng Anh',
  `link` text NOT NULL COMMENT 'LInk video',
  `images` varchar(500) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'kiểu: 1 - video youtube, 0 - video link từ server',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_category_id`, `name`, `name_en`, `link`, `images`, `type`, `sort_order`, `status`, `lft`, `rght`, `created`, `modified`) VALUES
(7, 2, '14/3 thì làm gì?', '14-3-thi-lam-gi', '<iframe width="420" height="315" src="http://www.youtube.com/embed/82NE0o8HFBI" frameborder="0" allowfullscreen></iframe>', '/admin/webroot/upload/image/images/2.jpg', 0, 1, 1, '1', '2', '2013-03-14 08:54:44', '2013-03-14 09:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE IF NOT EXISTS `video_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục video',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `parent_id`, `name`, `name_en`, `alias`, `images`, `status`, `lft`, `rght`, `created`, `modified`) VALUES
(2, 0, 'Video Chung', 'Video Chung', 'video-chung', '/admin/webroot/upload/image/images/418684_262312610554149_383627594_n.jpg', 1, '1', '4', '2013-03-14 03:59:11', '2013-03-14 09:31:25'),
(3, 2, 'Video Giải Trí', 'Funny Video', 'video-giai-tri', '/admin/webroot/upload/image/images/9613870-stack-of-books-on-a-red-background-pattern-on-the-theme-of-reading-and-education.jpg', 1, '2', '3', '2013-03-14 03:59:27', '2013-03-14 09:31:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
