/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : linhvyshop

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2015-06-30 00:22:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `administrators`
-- ----------------------------
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Admin',
  `name` varchar(255) DEFAULT NULL COMMENT 'Tên Admin',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu',
  `status` int(11) DEFAULT NULL COMMENT 'Trạng thái',
  `role` int(11) DEFAULT NULL COMMENT 'Quyền',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrators
-- ----------------------------
INSERT INTO `administrators` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '4', '2012-10-09 00:00:00', '2012-10-09 00:00:00');
INSERT INTO `administrators` VALUES ('2', 'abcd', '21232f297a57a5a743894a0e4a801fc3', '1', '4', '2012-10-09 00:00:00', '2012-10-09 00:00:00');

-- ----------------------------
-- Table structure for `advertisements`
-- ----------------------------
DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advertisements
-- ----------------------------

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for `galleries`
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of galleries
-- ----------------------------

-- ----------------------------
-- Table structure for `gallery_categories`
-- ----------------------------
DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE `gallery_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục bộ sưu tập',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `sort_order` int(11) DEFAULT '1' COMMENT 'sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `links`
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
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
  `sort_order` int(11) DEFAULT '1' COMMENT 'Thứ tự sắp xếp',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của tin tức: 1 - active: hiển thị, 0 - non active: ko hiển thị',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt view tin tức',
  `likes` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượt like tin tức',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('11', '1', '/admin/webroot/upload/image/files/huong-dan-mua-hang.jpg', '', 'Hướng dẫn mua hàng', '', 'huong-dan-mua-hang', 'Hướng dẫn mua h&agrave;ng tại Linh Vy Shop', '', '', '', '1', '1', '0', '1', '2', '1', '0', '0', '2015-06-29 16:53:54', '2015-06-29 16:54:18');

-- ----------------------------
-- Table structure for `news_categories`
-- ----------------------------
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục tin tức',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `sort_order` int(11) DEFAULT '1',
  `images` varchar(255) NOT NULL COMMENT 'ảnh đại diện',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_categories
-- ----------------------------
INSERT INTO `news_categories` VALUES ('1', '0', '1', '2', 'Tin tức chung', 'Tin tức chung', 'tin-tuc-chung', '1', '/admin/webroot/upload/image/images/thu_vien_anh.png', '1', '2014-05-28 18:28:46', '2014-05-29 16:38:37');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for `order_details`
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết',
  `order_id` int(11) NOT NULL COMMENT 'mã hóa đơn',
  `product_id` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `number_product` int(11) NOT NULL COMMENT 'số lượng sản phẩm',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('1', '2', '1', '2');
INSERT INTO `order_details` VALUES ('2', '2', '2', '3');
INSERT INTO `order_details` VALUES ('3', '3', '6', '1');
INSERT INTO `order_details` VALUES ('4', '4', '6', '1');
INSERT INTO `order_details` VALUES ('5', '5', '6', '1');

-- ----------------------------
-- Table structure for `partners`
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partners
-- ----------------------------

-- ----------------------------
-- Table structure for `phones`
-- ----------------------------
DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `phone_manufacture` int(11) NOT NULL COMMENT 'Mã hãng sản xuất',
  `images` varchar(255) NOT NULL COMMENT 'Ảnh sản phẩm',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng Việt',
  `alias` varchar(255) NOT NULL COMMENT 'Lưu đường dẫn ảo của sản phẩm thông qua tên sản phẩm',
  `sort_order` int(11) DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'Trạng thái của sản phẩm: 1 - active: hiển thị, 0 - non active: ko hiển thị',
  `created` datetime NOT NULL COMMENT 'Ngày tạo',
  `modified` datetime NOT NULL COMMENT 'Ngày chỉnh sửa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of phones
-- ----------------------------
INSERT INTO `phones` VALUES ('3', '1', '/admin/webroot/upload/image/files/S4.jpg', 'Samsung Galaxy S4', 'samsung-galaxy-s4', '21', '1', '2014-05-19 16:25:58', '2014-05-20 16:21:02');
INSERT INTO `phones` VALUES ('4', '1', '/admin/webroot/upload/image/files/S5.jpg', 'Samsung Galaxy S5', 'samsung-galaxy-s5', '22', '1', '2014-05-19 16:43:50', '2014-05-20 16:20:34');
INSERT INTO `phones` VALUES ('5', '1', '/admin/webroot/upload/image/files/S3.jpg', 'Samsung Galaxy S3', 'samsung-galaxy-s3', '20', '1', '2014-05-20 13:22:12', '2014-05-20 13:28:48');
INSERT INTO `phones` VALUES ('6', '1', '/admin/webroot/upload/image/files/TrendLite.jpg', 'Samsung Galaxy Trend Lite', 'samsung-galaxy-trend-lite', '1', '1', '2014-05-20 13:29:41', '2014-05-20 16:08:54');
INSERT INTO `phones` VALUES ('7', '1', '/admin/webroot/upload/image/files/Trend%20Plus.jpg', 'Samsung Galaxy Trend Plus', 'samsung-galaxy-trend-plus', '2', '1', '2014-05-20 13:34:00', '2014-05-21 15:08:34');
INSERT INTO `phones` VALUES ('8', '2', '/admin/webroot/upload/image/files/Iphone4.jpg', 'Iphone 4/4S', 'iphone-4-4s', '1', '1', '2014-05-20 13:38:34', '2014-05-20 16:07:21');
INSERT INTO `phones` VALUES ('9', '2', '/admin/webroot/upload/image/files/Iphone5S.jpg', 'Iphone 5/5S', 'iphone-5-5s', '2', '1', '2014-05-20 14:14:21', '2014-05-20 16:06:51');
INSERT INTO `phones` VALUES ('10', '1', '/admin/webroot/upload/image/files/SamsungCore.jpg', 'Samsung Galaxy Core', 'samsung-galaxy-core', '3', '1', '2014-05-20 14:25:16', '2014-05-20 16:06:39');
INSERT INTO `phones` VALUES ('11', '1', '/admin/webroot/upload/image/files/Samsung%20Win.jpg', 'Samsung Galaxy Win', 'samsung-galaxy-win', '4', '1', '2014-05-20 14:28:17', '2014-05-21 15:10:13');
INSERT INTO `phones` VALUES ('12', '1', '/admin/webroot/upload/image/files/SamsungGrand2.jpg', 'Samsung Galaxy Grand 2', 'samsung-galaxy-grand-2', '5', '1', '2014-05-20 14:32:48', '2014-05-20 16:06:09');
INSERT INTO `phones` VALUES ('13', '1', '/admin/webroot/upload/image/files/SamsungNote3Neo.jpg', 'Samsung Galaxy Note 3 Neo', 'samsung-galaxy-note-3-neo', '7', '1', '2014-05-20 14:40:31', '2014-05-20 16:05:10');
INSERT INTO `phones` VALUES ('14', '1', '/admin/webroot/upload/image/files/SamsungNote2.jpg', 'Samsung Galaxy Note 2', 'samsung-galaxy-note-2', '6', '1', '2014-05-20 14:43:01', '2014-05-20 16:04:53');
INSERT INTO `phones` VALUES ('15', '1', '/admin/webroot/upload/image/files/SamsungNote3.jpg', 'Samsung Galaxy Note 3', 'samsung-galaxy-note-3', '8', '1', '2014-05-20 14:59:03', '2014-05-20 16:04:37');
INSERT INTO `phones` VALUES ('16', '10', '/admin/webroot/upload/image/files/NokiaX.jpg', 'Nokia X/X+', 'nokia-x-x', '1', '1', '2014-05-20 15:06:47', '2014-05-20 16:04:26');
INSERT INTO `phones` VALUES ('17', '10', '/admin/webroot/upload/image/files/Nokia520.jpg', 'Nokia Lumia 520/525', 'nokia-lumia-520-525', '2', '1', '2014-05-20 15:12:37', '2014-05-20 16:04:15');
INSERT INTO `phones` VALUES ('18', '10', '/admin/webroot/upload/image/files/Nokia630.jpg', 'Nokia Lumia 630', 'nokia-lumia-630', '3', '1', '2014-05-20 15:15:46', '2014-05-20 16:04:04');
INSERT INTO `phones` VALUES ('19', '10', '/admin/webroot/upload/image/files/Nokia625.jpg', 'Nokia Lumia 625', 'nokia-lumia-625', '4', '1', '2014-05-20 15:19:51', '2014-05-20 16:03:50');
INSERT INTO `phones` VALUES ('20', '10', '/admin/webroot/upload/image/files/Nokia720.jpg', 'Nokia Lumia 720', 'nokia-lumia-720', '5', '1', '2014-05-20 15:22:53', '2014-05-20 16:03:37');
INSERT INTO `phones` VALUES ('21', '10', '/admin/webroot/upload/image/files/Nokia1320.jpg', 'Nokia Lumia 1320', 'nokia-lumia-1320', '6', '1', '2014-05-20 15:29:27', '2014-05-20 16:03:24');
INSERT INTO `phones` VALUES ('22', '10', '/admin/webroot/upload/image/files/Nokia925.jpg', 'Nokia Lumia 925', 'nokia-lumia-925', '7', '1', '2014-05-20 15:34:12', '2014-05-20 16:01:19');
INSERT INTO `phones` VALUES ('23', '10', '/admin/webroot/upload/image/files/Nokia1020.jpg', 'Nokia Lumia 1020', 'nokia-lumia-1020', '8', '1', '2014-05-20 15:42:35', '2014-05-20 16:01:08');
INSERT INTO `phones` VALUES ('24', '10', '/admin/webroot/upload/image/files/Nokia1520.jpg', 'Nokia Lumia 1520', 'nokia-lumia-1520', '9', '1', '2014-05-20 15:45:30', '2014-05-20 16:00:26');
INSERT INTO `phones` VALUES ('25', '5', '/admin/webroot/upload/image/files/Htc8S.jpg', 'Htc 8S', 'htc-8s', '1', '1', '2014-05-20 15:56:12', '2014-05-20 16:17:00');
INSERT INTO `phones` VALUES ('26', '5', '/admin/webroot/upload/image/files/Htc8X.jpg', 'Htc 8X', 'htc-8x', '2', '1', '2014-05-20 16:14:27', '2014-05-20 16:17:27');
INSERT INTO `phones` VALUES ('27', '5', '/admin/webroot/upload/image/files/HtcM7.jpg', 'Htc One M7', 'htc-one-m7', '3', '1', '2014-05-20 16:25:28', '2014-05-20 16:26:29');
INSERT INTO `phones` VALUES ('28', '5', '/admin/webroot/upload/image/files/HtcM8.jpg', 'Htc One M8', 'htc-one-m8', '4', '1', '2014-05-20 16:31:18', '2014-05-20 16:31:18');
INSERT INTO `phones` VALUES ('29', '4', '/admin/webroot/upload/image/files/BlakZ10.jpg', 'Blackberry Z10', 'blackberry-z10', '1', '1', '2014-05-20 16:39:28', '2014-05-20 16:39:28');
INSERT INTO `phones` VALUES ('30', '6', '/admin/webroot/upload/image/files/SonyC.jpg', 'Sony Xperia C', 'sony-xperia-c', '1', '1', '2014-05-21 11:25:08', '2014-05-21 11:32:34');
INSERT INTO `phones` VALUES ('31', '6', '/admin/webroot/upload/image/files/SonyZ.jpg', 'Sony Xperia Z', 'sony-xperia-z', '2', '1', '2014-05-21 11:30:29', '2014-05-21 11:30:29');
INSERT INTO `phones` VALUES ('32', '6', '/admin/webroot/upload/image/files/SonyZ1.jpg', 'Sony Xperia Z1', 'sony-xperia-z1', '3', '1', '2014-05-21 11:34:20', '2014-05-21 14:33:23');
INSERT INTO `phones` VALUES ('33', '6', '/admin/webroot/upload/image/files/SonyZ2.jpg', 'Sony Xperia Z2', 'sony-xperia-z2', '4', '1', '2014-05-21 11:39:51', '2014-05-21 11:41:22');
INSERT INTO `phones` VALUES ('34', '8', '/admin/webroot/upload/image/files/OPPOMuse.jpg', 'OPPO Find Muse', 'oppo-find-muse', '1', '1', '2014-05-21 14:36:53', '2014-05-21 14:36:53');
INSERT INTO `phones` VALUES ('35', '8', '/admin/webroot/upload/image/files/OPPOJoy.jpg', 'OPPO Joy', 'oppo-joy', '2', '1', '2014-05-21 14:39:29', '2014-05-21 14:43:39');
INSERT INTO `phones` VALUES ('36', '8', '/admin/webroot/upload/image/files/OPPONeo.jpg', 'OPPO Neo', 'oppo-neo', '3', '1', '2014-05-21 14:42:14', '2014-05-21 14:42:14');
INSERT INTO `phones` VALUES ('37', '8', '/admin/webroot/upload/image/files/OPPOFind5Mn.jpg', 'OPPO Find 5 Mini', 'oppo-find-5-mini', '4', '1', '2014-05-21 14:47:04', '2014-05-21 14:47:04');
INSERT INTO `phones` VALUES ('38', '8', '/admin/webroot/upload/image/files/OPPOFindWays.jpg', 'OPPO Find Way S', 'oppo-find-way-s', '5', '1', '2014-05-21 14:49:34', '2014-05-21 14:49:34');
INSERT INTO `phones` VALUES ('39', '8', '/admin/webroot/upload/image/files/OPPOR1.jpg', 'OPPO R1', 'oppo-r1', '6', '1', '2014-05-21 14:52:16', '2014-05-21 14:52:16');
INSERT INTO `phones` VALUES ('40', '8', '/admin/webroot/upload/image/files/OPPOFind7.jpg', 'OPPO Find 7/7a', 'oppo-find-7-7a', '7', '1', '2014-05-21 14:55:33', '2014-05-21 14:56:38');
INSERT INTO `phones` VALUES ('41', '9', '/admin/webroot/upload/image/files/LenovoP770.jpg', 'Lenovo P770', 'lenovo-p770', '1', '1', '2014-05-21 14:58:34', '2014-05-21 14:58:34');
INSERT INTO `phones` VALUES ('42', '9', '/admin/webroot/upload/image/files/LenovoP780.jpg', 'Lenovo P780', 'lenovo-p780', '2', '1', '2014-05-21 15:00:43', '2014-05-21 15:00:43');
INSERT INTO `phones` VALUES ('43', '9', '/admin/webroot/upload/image/files/LenovoK900.jpg', 'Lenovo K900', 'lenovo-k900', '3', '1', '2014-05-21 15:04:59', '2014-05-21 15:06:20');
INSERT INTO `phones` VALUES ('44', '3', '/admin/webroot/upload/image/files/SkyA860.jpg', 'Sky A860', 'sky-a860', '1', '1', '2014-05-21 15:12:55', '2014-05-21 15:12:55');
INSERT INTO `phones` VALUES ('45', '3', '/admin/webroot/upload/image/files/SkyA870.jpg', 'Sky A870', 'sky-a870', '2', '1', '2014-05-21 15:14:44', '2014-05-21 15:14:44');
INSERT INTO `phones` VALUES ('46', '3', '/admin/webroot/upload/image/files/SkyA880.jpg', 'Sky A880', 'sky-a880', '3', '1', '2014-05-21 15:16:42', '2014-05-21 15:16:42');

-- ----------------------------
-- Table structure for `phone_manufactures`
-- ----------------------------
DROP TABLE IF EXISTS `phone_manufactures`;
CREATE TABLE `phone_manufactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id nhà sản xuất',
  `name` varchar(255) NOT NULL COMMENT 'tên nhà sản xuất',
  `alias` varchar(255) NOT NULL COMMENT 'đường dẫn ảo',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `sort_order` int(11) DEFAULT '1' COMMENT 'sắp xếp',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày sửa đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of phone_manufactures
-- ----------------------------
INSERT INTO `phone_manufactures` VALUES ('1', 'Samsung', 'samsung', '1', '2', '0000-00-00 00:00:00', '2014-05-19 17:04:21');
INSERT INTO `phone_manufactures` VALUES ('2', 'Apple', 'apple', '1', '1', '2014-05-17 17:28:43', '2014-05-19 17:04:08');
INSERT INTO `phone_manufactures` VALUES ('3', 'Sky Hàn Quốc', 'sky-han-quoc', '1', '9', '2014-05-17 17:29:58', '2014-05-19 17:07:24');
INSERT INTO `phone_manufactures` VALUES ('4', 'Blackberry', 'blackberry', '1', '8', '2014-05-17 17:31:27', '2014-05-20 16:39:46');
INSERT INTO `phone_manufactures` VALUES ('5', 'Htc', 'htc', '1', '5', '2014-05-18 08:32:20', '2014-05-19 17:05:11');
INSERT INTO `phone_manufactures` VALUES ('6', 'Sony', 'sony', '1', '4', '2014-05-18 08:32:29', '2014-05-19 17:04:53');
INSERT INTO `phone_manufactures` VALUES ('8', 'OPPO', 'oppo', '1', '6', '2014-05-18 08:32:50', '2014-05-19 17:05:59');
INSERT INTO `phone_manufactures` VALUES ('9', 'Lenovo', 'lenovo', '1', '7', '2014-05-18 08:33:00', '2014-05-19 17:08:00');
INSERT INTO `phone_manufactures` VALUES ('10', 'Nokia', 'nokia', '1', '3', '2014-05-18 08:33:07', '2014-05-19 17:04:41');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', '/admin/webroot/upload/image/files/huong-dan-mua-hang.jpg', '', 'Giới thiệu Linh Vy Shop', 'Giới thiệu Linh Vy Shop', 'gioi-thieu-linh-vy-shop', 'Giới thiệu Linh Vy Shop chuy&ecirc;n cung cấp sỉ, lẻ c&aacute;c loại mỹ phẩm', '', 'Giới thiệu Linh Vy Shop chuy&ecirc;n cung cấp sỉ, lẻ c&aacute;c loại mỹ phẩm, c&aacute;c loại kem l&agrave;m trắng, dưỡng trắng , đặc trị n&aacute;m, t&agrave;n nhang, se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng, mụn th&acirc;m, mụn đầu đen, mụn mủ...Sản phẩm của H&agrave;n, Th&aacute;i, Ph&aacute;p.<br />\r\n<br />\r\n<div class=\"_42ef\">\r\n	<div class=\"_6a _5u5j _6b\">\r\n		<div class=\"_2n7q ellipsis _42ef _c24 _50f3\">\r\n			<a href=\"https://www.bing.com/maps/default.aspx?v=2&amp;pc=FACEBK&amp;mid=8100&amp;rtp=adr.%7Epos.21.0245_105.84117_Linh+Linh+Shop_S%E1%BB%91+10+Khu%E1%BA%A5t+Duy+Ti%E1%BA%BFn+%2Cthanh+xu%C3%A2n+H%C3%A0+N%E1%BB%99i.%2C+H%C3%A0+N%E1%BB%99i&amp;cp=21.0245%7E105.84117&amp;lvl=16&amp;sty=r&amp;rtop=0%7E0%7E0%7E&amp;mode=D&amp;FORM=FBKPL1&amp;mkt=en-US\" id=\"u_jsonp_25_8\" rel=\"nofollow\" target=\"_blank\"><span>Số 10 Khuất Duy Tiến ,thanh xu&acirc;n H&agrave; Nội.</span></a><br />\r\n			SĐT: 098 553 85 15</div>\r\n	</div>\r\n</div>\r\n', '', '1', '1', '0', '0', '2013-03-17 16:42:16', '2015-06-29 17:02:37');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `code` varchar(255) DEFAULT NULL COMMENT 'Mã sản phẩm',
  `product_category_id` int(11) NOT NULL COMMENT 'Mã loại sản phẩm',
  `price` int(11) NOT NULL COMMENT 'Giá sản phẩm',
  `images` varchar(255) NOT NULL COMMENT 'Ảnh sản phẩm',
  `multi_images` varchar(1000) NOT NULL COMMENT 'Nếu sản phẩm có nhiều ảnh, thì lưu các ảnh vào đây, các ảnh cách nhau bởi dấu " | " ',
  `color` varchar(255) DEFAULT NULL COMMENT 'color',
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
) ENGINE=InnoDB AUTO_INCREMENT=442 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for `product_categories`
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục sản phẩm',
  `parent_id` int(11) NOT NULL COMMENT 'Mã danh mục cha',
  `lft` varchar(255) NOT NULL COMMENT 'left tree list ',
  `rght` varchar(255) NOT NULL COMMENT 'right tree list',
  `name` varchar(255) NOT NULL COMMENT 'Tên tiếng việt',
  `name_en` varchar(255) NOT NULL COMMENT 'Tên tiếng Anh',
  `alias` varchar(255) DEFAULT NULL COMMENT 'đường dẫn ảo',
  `images` varchar(255) DEFAULT NULL COMMENT 'ảnh đại diện',
  `sort_order` int(11) DEFAULT '0' COMMENT 'Thứ tự sắp xếp',
  `status` int(11) DEFAULT '1' COMMENT 'trạng thái',
  `created` datetime NOT NULL COMMENT 'ngày tạo',
  `modified` datetime NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of questions
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm quyền',
  `role_name` varchar(255) NOT NULL COMMENT 'Tên nhóm quyền',
  `created` varchar(255) NOT NULL COMMENT 'ngày tạo',
  `modified` varchar(255) NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bảng chứa các nhóm quyền';

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for `role_pemissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_pemissions`;
CREATE TABLE `role_pemissions` (
  `id` int(11) NOT NULL COMMENT 'id',
  `role_id` int(11) NOT NULL COMMENT 'role id',
  `module` varchar(255) NOT NULL COMMENT 'có quyền trên module nào',
  `controller` varchar(255) NOT NULL COMMENT 'có quyền trên controller nào',
  `action` varchar(255) NOT NULL COMMENT 'có quyền trên action nào',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` varchar(255) NOT NULL COMMENT 'ngày tạo',
  `modified` varchar(255) NOT NULL COMMENT 'ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_pemissions
-- ----------------------------

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
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

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'Linh Vy Shop - chuyên cung cấp mỹ phẩm sỉ lẻ', 'Linh Vy Shop - chuyên cung cấp mỹ phẩm sỉ lẻ', '<div>\r\n	&nbsp;</div>\r\n<h1 style=\"position: absolute; top: -800px; overflow: auto;\">\r\n	<strong><a href=\"http://donghohoanganh.com/dong-ho-nu-duoi-1-trieu-1.html\" title=\"dong ho nu\">dong ho nu</a>, <a href=\"http://donghohoanganh.com\" title=\"đồng hồ nam\">đồng hồ nam</a>, <a href=\"http://chongthamdot.info/\" title=\"chong tham dot\">chong tham dot</a> , <a href=\"http://xemayhoauyen.com/\" title=\"ban xe may cu\">ban xe may cu</a>, <a href=\"http://truyendem.net\" title=\"truyen hay\">truyen hay</a> , <a href=\"http://woodsviet.com/mau-tu-thiet-ke/ke-tivi\" title=\"ke tivi\">ke tivi</a>, <a href=\"http://sanphamrem.com\" title=\"rèm vải\">r&egrave;m vải</a>, <a href=\"http://sanphamrem.com/rem-van-phong-sp.aspx\" title=\"rèm văn phòng\">r&egrave;m văn ph&ograve;ng</a>, <a href=\"http://cuacuonre.vn/\" title=\"cua cuon\">cua cuon</a>, <a href=\"http://dogonoithatthanhnam.com.vn/noi-that-phong-khach-28.html\" title=\"noi that phong khach\">noi that phong khach</a>, <a href=\"http://dogonoithatthanhnam.com.vn/noi-that-phong-ngu-25.html\" title=\"noi that phong ngu\">noi that phong ngu</a>, <a href=\"http://sanphaminox.vn/danh-sach-san-pham/138/san-pham-inox.html\" title=\"san pham inox\">san pham inox</a>, <a href=\"http://sanphaminox.vn/danh-sach-san-pham/149/bep-nuong-bbq.html\" title=\"bep nuong bbq\">bep nuong bbq</a>, <a href=\"http://www.nhakhoarangxinh.com/tay-trang-men-rang-l6.html\" title=\"men răng\">men răng</a> <a href=\"http://www.nhakhoarangxinh.com/lam-rang-su-tham-my-l34.html\" title=\"làm đẹp răng\">l&agrave;m đẹp răng</a>, <a href=\"http://www.nhakhoarangxinh.com/nan-chinh-rang-l43.html\" title=\"nắn chỉnh răng\">nắn chỉnh răng</a>, <a href=\"http://www.nhakhoarangxinh.com/rang-implant-c9.html\" title=\"răng implant\">răng implant</a>, <a href=\"http://www.nhakhoarangxinh.com/trong-rang-gia-l3.html\" title=\"trồng răng giả\">trồng răng giả</a>, <a href=\"http://namtruong.vn\" title=\"thang máy tải hàng\">thang m&aacute;y tải h&agrave;ng</a>, </strong></h1>\r\n', '<p align=\"center\" style=\"text-align: center; margin: 0in 0in 0pt\">\r\n	&nbsp;</p>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:931px;\" width=\"931\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:67px;\">\r\n				&nbsp;</td>\r\n			<td style=\"width:552px;\">\r\n				<span style=\"color:#ffd700;\"><span style=\"font-size: 16px;\"><strong>Linh Vy Shop - Chuy&ecirc;n cung cấp mỹ phẩm sỉ lẻ</strong></span></span><br />\r\n				&nbsp;</td>\r\n			<td style=\"width:312px;\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:67px;\">\r\n				&nbsp;</td>\r\n			<td style=\"width:552px;\">\r\n				<span style=\"color:#ffd700;\"><span style=\"font-size: 16px;\"><strong>Trụ sở ch&iacute;nh:</strong></span></span></td>\r\n			<td style=\"width:312px;\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:67px;\">\r\n				&nbsp;</td>\r\n			<td style=\"width:552px;\">\r\n				<strong><span style=\"font-size:14px;\"><span style=\"color:#ff0000;\">Số 10 - Khuất Duy Tiến, Thanh Xu&acirc;n, H&agrave; Nội&nbsp;<br />\r\n				Tel: <span data-reactid=\".y2.0.0\">098 553 85 15</span></span><br />\r\n				<span style=\"color:#ff0000;\"> Hotline: <span data-reactid=\".y2.0.0\">098 553 85 15</span> </span></span></strong></td>\r\n			<td style=\"width:312px;\">\r\n				<a href=\"http://www.baobinh.net\"><br />\r\n				<br />\r\n				<span style=\"color:#0000cd;\"><span style=\"background-color: rgb(255, 255, 255);\">baobinh.net</span></span></a> <a href=\"http://www.baobinh.net\"><span style=\"color:#0000cd;\"><span style=\"background-color: rgb(255, 255, 255);\">Thiết kế website</span></span></a> <a href=\"http://www.baobinh.net\"><span style=\"color:#0000cd;\"><span style=\"background-color: rgb(255, 255, 255);\">hosting khởi nghiệp</span></span></a><br />\r\n				<br />\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '098 553 85 15', '098 553 85 15', '', 'http://linhvyshop.com', 'In - Thêu  181 Hàng Bông 0912101965 - Số 40 Ngõ 250 Nguyễn Xiển  Thanh Xuân - HN ĐT: 35528188\r\n', 'Welcome to Cake 2', '2012-06-05 00:00:00', '2015-06-29 17:12:26', 'http://youtube.com', 'https://twitter.com/', 'https://myspace.com/', 'http://facebook.com');

-- ----------------------------
-- Table structure for `slideshows`
-- ----------------------------
DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE `slideshows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(250) DEFAULT NULL COMMENT 'Tên',
  `images` varchar(250) DEFAULT NULL COMMENT 'Ảnh Slide',
  `link` varchar(255) NOT NULL COMMENT 'Link',
  `sort_order` int(11) NOT NULL COMMENT 'thứ tự sắp xếp',
  `status` int(11) NOT NULL COMMENT 'trạng thái',
  `created` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  `modified` datetime DEFAULT NULL COMMENT 'Ngày thay đổi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slideshows
-- ----------------------------
INSERT INTO `slideshows` VALUES ('27', 'pk', '/admin/webroot/upload/image/files/xanh.png', '', '4', '1', '2014-05-24 11:49:39', '2014-05-24 11:49:39');
INSERT INTO `slideshows` VALUES ('24', 'phụ kiện sơn la', '/admin/webroot/upload/image/files/phuong%20ham.png', '', '3', '1', '2014-05-24 11:17:57', '2014-05-24 11:17:57');
INSERT INTO `slideshows` VALUES ('22', 'phụ kiện sơn la', '/admin/webroot/upload/image/files/2.png', '', '4', '1', '2014-05-22 10:38:38', '2014-05-22 10:38:38');
INSERT INTO `slideshows` VALUES ('21', 'phụ kiện sơn la', '/admin/webroot/upload/image/files/Untitled-1.png', '', '3', '1', '2014-05-22 10:23:41', '2014-05-22 10:28:00');
INSERT INTO `slideshows` VALUES ('29', 'pk5', '/admin/webroot/upload/image/files/tim.png', '', '5', '1', '2014-05-24 12:26:52', '2014-05-24 12:26:52');

-- ----------------------------
-- Table structure for `supports`
-- ----------------------------
DROP TABLE IF EXISTS `supports`;
CREATE TABLE `supports` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supports
-- ----------------------------
INSERT INTO `supports` VALUES ('7', 'Hoàng Phương', '098 553 85 15', 'hoang_phuong76', 'invescovn', '0', '1', '2012-12-15 00:00:00', '2015-06-29 17:13:11');

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=595 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', '1', '3', '2014-05-19 04:55:38', '2014-05-19 04:55:38');
INSERT INTO `tags` VALUES ('2', '2', '3', '2014-05-19 04:55:38', '2014-05-19 04:55:38');
INSERT INTO `tags` VALUES ('3', '1', '4', '2014-05-19 04:56:16', '2014-05-19 04:56:16');
INSERT INTO `tags` VALUES ('4', '2', '4', '2014-05-19 04:56:16', '2014-05-19 04:56:16');
INSERT INTO `tags` VALUES ('5', '1', '4', '2014-05-19 07:26:25', '2014-05-19 07:26:25');
INSERT INTO `tags` VALUES ('6', '2', '4', '2014-05-19 07:26:25', '2014-05-19 07:26:25');
INSERT INTO `tags` VALUES ('7', '1', '2', '2014-05-19 07:27:09', '2014-05-19 07:27:09');
INSERT INTO `tags` VALUES ('8', '2', '2', '2014-05-19 07:27:09', '2014-05-19 07:27:09');
INSERT INTO `tags` VALUES ('9', '1', '4', '2014-05-19 07:27:21', '2014-05-19 07:27:21');
INSERT INTO `tags` VALUES ('10', '2', '4', '2014-05-19 07:27:21', '2014-05-19 07:27:21');
INSERT INTO `tags` VALUES ('11', '3', '5', '2014-05-19 16:33:18', '2014-05-19 16:33:18');
INSERT INTO `tags` VALUES ('12', '3', '5', '2014-05-19 16:55:29', '2014-05-19 16:55:29');
INSERT INTO `tags` VALUES ('13', '3', '5', '2014-05-19 17:11:32', '2014-05-19 17:11:32');
INSERT INTO `tags` VALUES ('14', '3', '2', '2014-05-19 17:12:29', '2014-05-19 17:12:29');
INSERT INTO `tags` VALUES ('15', '3', '2', '2014-05-19 17:14:33', '2014-05-19 17:14:33');
INSERT INTO `tags` VALUES ('41', '29', '9', '2014-05-21 07:20:50', '2014-05-21 07:20:50');
INSERT INTO `tags` VALUES ('42', '29', '10', '2014-05-21 07:24:46', '2014-05-21 07:24:46');
INSERT INTO `tags` VALUES ('288', '9', '8', '2014-05-21 16:34:09', '2014-05-21 16:34:09');
INSERT INTO `tags` VALUES ('294', '15', '15', '2014-05-21 16:39:00', '2014-05-21 16:39:00');
INSERT INTO `tags` VALUES ('295', '37', '16', '2014-05-21 16:42:13', '2014-05-21 16:42:13');
INSERT INTO `tags` VALUES ('298', '16', '18', '2014-05-21 17:07:24', '2014-05-21 17:07:24');
INSERT INTO `tags` VALUES ('299', '8', '19', '2014-05-21 17:16:59', '2014-05-21 17:16:59');
INSERT INTO `tags` VALUES ('301', '18', '20', '2014-05-22 08:05:43', '2014-05-22 08:05:43');
INSERT INTO `tags` VALUES ('303', '19', '21', '2014-05-22 08:15:23', '2014-05-22 08:15:23');
INSERT INTO `tags` VALUES ('304', '5', '22', '2014-05-22 08:40:52', '2014-05-22 08:40:52');
INSERT INTO `tags` VALUES ('306', '12', '24', '2014-05-22 09:24:06', '2014-05-22 09:24:06');
INSERT INTO `tags` VALUES ('307', '4', '25', '2014-05-22 09:28:05', '2014-05-22 09:28:05');
INSERT INTO `tags` VALUES ('308', '26', '26', '2014-05-22 09:33:07', '2014-05-22 09:33:07');
INSERT INTO `tags` VALUES ('309', '37', '27', '2014-05-22 09:40:24', '2014-05-22 09:40:24');
INSERT INTO `tags` VALUES ('310', '38', '28', '2014-05-22 09:48:30', '2014-05-22 09:48:30');
INSERT INTO `tags` VALUES ('311', '7', '29', '2014-05-22 10:27:09', '2014-05-22 10:27:09');
INSERT INTO `tags` VALUES ('312', '10', '30', '2014-05-22 10:29:39', '2014-05-22 10:29:39');
INSERT INTO `tags` VALUES ('313', '14', '31', '2014-05-22 10:32:17', '2014-05-22 10:32:17');
INSERT INTO `tags` VALUES ('314', '3', '32', '2014-05-22 10:35:00', '2014-05-22 10:35:00');
INSERT INTO `tags` VALUES ('318', '23', '33', '2014-05-22 10:42:32', '2014-05-22 10:42:32');
INSERT INTO `tags` VALUES ('319', '3', '34', '2014-05-22 10:56:55', '2014-05-22 10:56:55');
INSERT INTO `tags` VALUES ('320', '8', '35', '2014-05-22 11:00:01', '2014-05-22 11:00:01');
INSERT INTO `tags` VALUES ('321', '41', '36', '2014-05-23 03:20:24', '2014-05-23 03:20:24');
INSERT INTO `tags` VALUES ('322', '42', '37', '2014-05-23 03:23:23', '2014-05-23 03:23:23');
INSERT INTO `tags` VALUES ('323', '25', '38', '2014-05-23 03:32:33', '2014-05-23 03:32:33');
INSERT INTO `tags` VALUES ('324', '27', '39', '2014-05-23 03:36:16', '2014-05-23 03:36:16');
INSERT INTO `tags` VALUES ('325', '16', '40', '2014-05-23 05:31:42', '2014-05-23 05:31:42');
INSERT INTO `tags` VALUES ('327', '4', '42', '2014-05-23 05:42:42', '2014-05-23 05:42:42');
INSERT INTO `tags` VALUES ('329', '9', '41', '2014-05-23 05:43:05', '2014-05-23 05:43:05');
INSERT INTO `tags` VALUES ('330', '17', '43', '2014-05-23 05:52:34', '2014-05-23 05:52:34');
INSERT INTO `tags` VALUES ('331', '32', '44', '2014-05-23 05:59:34', '2014-05-23 05:59:34');
INSERT INTO `tags` VALUES ('332', '31', '45', '2014-05-23 06:03:29', '2014-05-23 06:03:29');
INSERT INTO `tags` VALUES ('333', '45', '46', '2014-05-23 06:18:49', '2014-05-23 06:18:49');
INSERT INTO `tags` VALUES ('334', '44', '47', '2014-05-23 06:22:44', '2014-05-23 06:22:44');
INSERT INTO `tags` VALUES ('335', '46', '48', '2014-05-23 06:29:47', '2014-05-23 06:29:47');
INSERT INTO `tags` VALUES ('336', '36', '17', '2014-05-23 06:33:43', '2014-05-23 06:33:43');
INSERT INTO `tags` VALUES ('337', '34', '49', '2014-05-23 06:35:08', '2014-05-23 06:35:08');
INSERT INTO `tags` VALUES ('339', '9', '50', '2014-05-24 05:45:30', '2014-05-24 05:45:30');
INSERT INTO `tags` VALUES ('384', '3', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('385', '4', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('386', '5', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('387', '6', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('388', '7', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('389', '10', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('390', '11', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('391', '12', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('392', '13', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('393', '14', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('394', '15', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('395', '8', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('396', '9', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('397', '44', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('398', '45', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('399', '46', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('400', '29', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('401', '25', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('402', '26', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('403', '27', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('404', '28', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('405', '30', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('406', '31', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('407', '32', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('408', '33', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('409', '34', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('410', '35', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('411', '36', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('412', '37', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('413', '38', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('414', '39', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('415', '40', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('416', '41', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('417', '42', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('418', '43', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('419', '16', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('420', '17', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('421', '18', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('422', '19', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('423', '20', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('424', '21', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('425', '22', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('426', '23', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('427', '24', '51', '2014-05-24 05:51:33', '2014-05-24 05:51:33');
INSERT INTO `tags` VALUES ('428', '20', '52', '2014-05-24 05:58:31', '2014-05-24 05:58:31');
INSERT INTO `tags` VALUES ('429', '19', '53', '2014-05-24 05:59:20', '2014-05-24 05:59:20');
INSERT INTO `tags` VALUES ('430', '21', '54', '2014-05-24 06:02:28', '2014-05-24 06:02:28');
INSERT INTO `tags` VALUES ('431', '29', '6', '2014-05-24 08:49:32', '2014-05-24 08:49:32');
INSERT INTO `tags` VALUES ('432', '3', '55', '2014-05-24 14:56:17', '2014-05-24 14:56:17');
INSERT INTO `tags` VALUES ('438', '9', '60', '2014-05-24 15:57:22', '2014-05-24 15:57:22');
INSERT INTO `tags` VALUES ('446', '9', '14', '2014-05-24 16:14:23', '2014-05-24 16:14:23');
INSERT INTO `tags` VALUES ('452', '9', '64', '2014-05-24 16:35:03', '2014-05-24 16:35:03');
INSERT INTO `tags` VALUES ('455', '8', '63', '2014-05-24 16:41:52', '2014-05-24 16:41:52');
INSERT INTO `tags` VALUES ('456', '3', '61', '2014-05-24 16:42:13', '2014-05-24 16:42:13');
INSERT INTO `tags` VALUES ('458', '9', '66', '2014-05-24 16:47:22', '2014-05-24 16:47:22');
INSERT INTO `tags` VALUES ('459', '9', '65', '2014-05-24 16:48:06', '2014-05-24 16:48:06');
INSERT INTO `tags` VALUES ('460', '9', '62', '2014-05-24 16:48:22', '2014-05-24 16:48:22');
INSERT INTO `tags` VALUES ('461', '5', '59', '2014-05-24 16:48:44', '2014-05-24 16:48:44');
INSERT INTO `tags` VALUES ('462', '3', '57', '2014-05-24 16:48:57', '2014-05-24 16:48:57');
INSERT INTO `tags` VALUES ('463', '3', '56', '2014-05-24 16:49:09', '2014-05-24 16:49:09');
INSERT INTO `tags` VALUES ('464', '31', '12', '2014-05-24 16:51:32', '2014-05-24 16:51:32');
INSERT INTO `tags` VALUES ('468', '15', '68', '2014-05-25 13:28:30', '2014-05-25 13:28:30');
INSERT INTO `tags` VALUES ('471', '4', '69', '2014-05-25 13:37:32', '2014-05-25 13:37:32');
INSERT INTO `tags` VALUES ('472', '9', '70', '2014-05-25 13:39:09', '2014-05-25 13:39:09');
INSERT INTO `tags` VALUES ('473', '8', '71', '2014-05-25 14:06:42', '2014-05-25 14:06:42');
INSERT INTO `tags` VALUES ('475', '9', '7', '2014-05-25 14:19:14', '2014-05-25 14:19:14');
INSERT INTO `tags` VALUES ('476', '9', '73', '2014-05-25 14:22:20', '2014-05-25 14:22:20');
INSERT INTO `tags` VALUES ('532', '12', '23', '2014-05-25 14:53:36', '2014-05-25 14:53:36');
INSERT INTO `tags` VALUES ('533', '5', '72', '2014-05-25 15:56:01', '2014-05-25 15:56:01');
INSERT INTO `tags` VALUES ('534', '15', '76', '2014-05-25 16:31:59', '2014-05-25 16:31:59');
INSERT INTO `tags` VALUES ('536', '15', '67', '2014-05-26 16:10:43', '2014-05-26 16:10:43');
INSERT INTO `tags` VALUES ('537', '3', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('538', '4', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('539', '5', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('540', '6', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('541', '7', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('542', '10', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('543', '11', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('544', '12', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('545', '13', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('546', '14', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('547', '15', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('548', '8', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('549', '9', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('550', '44', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('551', '45', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('552', '46', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('553', '29', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('554', '25', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('555', '26', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('556', '27', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('557', '28', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('558', '30', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('559', '31', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('560', '32', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('561', '33', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('562', '34', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('563', '35', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('564', '36', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('565', '37', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('566', '38', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('567', '39', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('568', '40', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('569', '41', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('570', '42', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('571', '43', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('572', '16', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('573', '17', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('574', '18', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('575', '19', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('576', '20', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('577', '21', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('578', '22', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('579', '23', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('580', '24', '75', '2014-05-26 16:13:44', '2014-05-26 16:13:44');
INSERT INTO `tags` VALUES ('581', '29', '77', '2014-05-26 16:19:41', '2014-05-26 16:19:41');
INSERT INTO `tags` VALUES ('582', '3', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('583', '4', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('584', '5', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('585', '6', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('586', '7', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('587', '10', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('588', '11', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('589', '12', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('590', '13', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('591', '14', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('592', '15', '74', '2014-05-26 16:51:16', '2014-05-26 16:51:16');
INSERT INTO `tags` VALUES ('594', '3', '58', '2014-05-27 04:47:26', '2014-05-27 04:47:26');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('15', 'loilinh1990', '23c6e049d90d23fb5a44c34b98de5683', '', '', 'Nguyễn Tất Lợi', '0000-00-00', '0', null, '', '/admin/webroot/upload/image/files/1.jpg', '1', '1', '2013-03-12 08:56:13', '2014-06-04 02:54:08');

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('7', '2', '14/3 thì làm gì?', '14-3-thi-lam-gi', '<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/82NE0o8HFBI\" frameborder=\"0\" allowfullscreen></iframe>', '/admin/webroot/upload/image/images/2.jpg', '0', '1', '1', '1', '2', '2013-03-14 08:54:44', '2013-03-14 09:14:41');

-- ----------------------------
-- Table structure for `video_categories`
-- ----------------------------
DROP TABLE IF EXISTS `video_categories`;
CREATE TABLE `video_categories` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video_categories
-- ----------------------------
INSERT INTO `video_categories` VALUES ('2', '0', 'Video Chung', 'Video Chung', 'video-chung', '/admin/webroot/upload/image/images/tagtcoban.jpg', '1', '1', '4', '2013-03-14 03:59:11', '2014-06-04 02:46:51');
INSERT INTO `video_categories` VALUES ('3', '2', 'Video Giải Trí', 'Funny Video', 'video-giai-tri', '/admin/webroot/upload/image/images/6fae64635c86ab9b2537f6fc6ace6be4.jpg', '1', '2', '3', '2013-03-14 03:59:27', '2014-06-04 02:46:40');
