-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2012 at 01:23 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tclvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=257 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 192),
(9, 1, NULL, NULL, 'AclManagement', 2, 57),
(10, 9, NULL, NULL, 'Groups', 3, 18),
(21, 9, NULL, NULL, 'Users', 19, 46),
(22, 21, NULL, NULL, 'login', 20, 21),
(23, 21, NULL, NULL, 'logout', 22, 23),
(24, 21, NULL, NULL, 'index', 24, 25),
(25, 21, NULL, NULL, 'view', 26, 27),
(26, 21, NULL, NULL, 'add', 28, 29),
(27, 21, NULL, NULL, 'edit', 30, 31),
(28, 21, NULL, NULL, 'delete', 32, 33),
(40, 21, NULL, NULL, 'toggle', 34, 35),
(61, 9, NULL, NULL, 'UserPermissions', 47, 56),
(62, 61, NULL, NULL, 'index', 48, 49),
(63, 61, NULL, NULL, 'sync', 50, 51),
(64, 61, NULL, NULL, 'edit', 52, 53),
(65, 61, NULL, NULL, 'toggle', 54, 55),
(130, 21, NULL, NULL, 'facebook_connect', 36, 37),
(131, 21, NULL, NULL, 'twitter_connect', 38, 39),
(132, 21, NULL, NULL, 'twitter_login', 40, 41),
(133, 21, NULL, NULL, 'oauth_callback', 42, 43),
(136, 21, NULL, NULL, 'register', 44, 45),
(177, 1, NULL, NULL, 'Posts', 58, 73),
(178, 177, NULL, NULL, 'admin_index', 59, 60),
(179, 177, NULL, NULL, 'admin_view', 61, 62),
(180, 177, NULL, NULL, 'admin_add', 63, 64),
(181, 177, NULL, NULL, 'admin_edit', 65, 66),
(182, 177, NULL, NULL, 'admin_delete', 67, 68),
(183, 177, NULL, NULL, 'admin_toggle', 69, 70),
(184, 177, NULL, NULL, 'admin_ordered', 71, 72),
(185, 1, NULL, NULL, 'Categories', 74, 93),
(186, 185, NULL, NULL, 'admin_index', 75, 76),
(188, 185, NULL, NULL, 'admin_add', 77, 78),
(189, 185, NULL, NULL, 'admin_edit', 79, 80),
(190, 185, NULL, NULL, 'admin_delete', 81, 82),
(191, 185, NULL, NULL, 'admin_toggle', 83, 84),
(193, 1, NULL, NULL, 'Groups', 94, 109),
(194, 193, NULL, NULL, 'admin_index', 95, 96),
(195, 193, NULL, NULL, 'admin_view', 97, 98),
(196, 193, NULL, NULL, 'admin_add', 99, 100),
(197, 193, NULL, NULL, 'admin_edit', 101, 102),
(198, 193, NULL, NULL, 'admin_delete', 103, 104),
(199, 193, NULL, NULL, 'admin_toggle', 105, 106),
(200, 193, NULL, NULL, 'admin_ordered', 107, 108),
(201, 1, NULL, NULL, 'Pages', 110, 113),
(202, 201, NULL, NULL, 'display', 111, 112),
(203, 10, NULL, NULL, 'admin_index', 4, 5),
(204, 10, NULL, NULL, 'admin_view', 6, 7),
(205, 10, NULL, NULL, 'admin_add', 8, 9),
(206, 10, NULL, NULL, 'admin_edit', 10, 11),
(207, 10, NULL, NULL, 'admin_delete', 12, 13),
(208, 10, NULL, NULL, 'admin_toggle', 14, 15),
(209, 10, NULL, NULL, 'admin_ordered', 16, 17),
(210, 1, NULL, NULL, 'DebugKit', 114, 121),
(211, 210, NULL, NULL, 'ToolbarAccess', 115, 120),
(212, 211, NULL, NULL, 'history_state', 116, 117),
(213, 211, NULL, NULL, 'sql_explain', 118, 119),
(215, 1, NULL, NULL, 'StaticPages', 122, 137),
(216, 215, NULL, NULL, 'admin_index', 123, 124),
(217, 215, NULL, NULL, 'admin_view', 125, 126),
(218, 215, NULL, NULL, 'admin_add', 127, 128),
(219, 215, NULL, NULL, 'admin_edit', 129, 130),
(220, 215, NULL, NULL, 'admin_delete', 131, 132),
(221, 215, NULL, NULL, 'admin_toggle', 133, 134),
(222, 215, NULL, NULL, 'admin_ordered', 135, 136),
(223, 1, NULL, NULL, 'Properties', 138, 161),
(224, 223, NULL, NULL, 'admin_index', 139, 140),
(225, 223, NULL, NULL, 'admin_view', 141, 142),
(226, 223, NULL, NULL, 'admin_add', 143, 144),
(227, 223, NULL, NULL, 'admin_edit', 145, 146),
(228, 223, NULL, NULL, 'admin_delete', 147, 148),
(232, 185, NULL, NULL, 'admin_sort', 85, 86),
(233, 185, NULL, NULL, 'admin_getnodes', 87, 88),
(234, 185, NULL, NULL, 'admin_reorder', 89, 90),
(235, 185, NULL, NULL, 'admin_reparent', 91, 92),
(236, 223, NULL, NULL, 'admin_sort', 149, 150),
(237, 223, NULL, NULL, 'admin_getnodes', 151, 152),
(238, 223, NULL, NULL, 'admin_reorder', 153, 154),
(239, 223, NULL, NULL, 'admin_reparent', 155, 156),
(240, 223, NULL, NULL, 'getListPropertiesByCategory', 157, 158),
(241, 1, NULL, NULL, 'Products', 162, 187),
(242, 241, NULL, NULL, 'admin_index', 163, 164),
(243, 241, NULL, NULL, 'admin_view', 165, 166),
(244, 241, NULL, NULL, 'admin_add', 167, 168),
(245, 241, NULL, NULL, 'admin_edit', 169, 170),
(246, 241, NULL, NULL, 'admin_delete', 171, 172),
(247, 241, NULL, NULL, 'admin_toggle', 173, 174),
(248, 241, NULL, NULL, 'admin_ordered', 175, 176),
(249, 223, NULL, NULL, 'get_properties_by_category', 159, 160),
(250, 241, NULL, NULL, 'index', 177, 178),
(251, 241, NULL, NULL, 'admin_gallery_ordered', 179, 180),
(252, 1, NULL, NULL, 'Upload', 188, 189),
(253, 241, NULL, NULL, 'detail', 181, 182),
(254, 1, NULL, NULL, 'Filter', 190, 191),
(255, 241, NULL, NULL, 'view', 183, 184),
(256, 241, NULL, NULL, 'admin_delete_image', 185, 186);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, NULL, 'Group', 2, NULL, 5, 12),
(4, 1, 'User', 1, NULL, 2, 3),
(6, 2, 'User', 3, NULL, 6, 7),
(7, 2, 'User', 4, NULL, 8, 9),
(8, 2, 'User', 5, NULL, 10, 11),
(9, NULL, 'Group', 1, NULL, 13, 16),
(10, NULL, 'Group', 2, NULL, 17, 18),
(11, 9, 'User', 1, NULL, 14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT '0',
  `ordered` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `modelIdx` (`model`),
  KEY `foreignIdx` (`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `model`, `foreign_key`, `name`, `attachment`, `dir`, `type`, `size`, `ordered`, `active`) VALUES
(29, 'Product', 5, '', '2040128_13136.jpg', '29', 'image/jpeg', 211206, 0, 1),
(30, 'Product', 5, '', '16501910_6798.jpg', '30', 'image/jpeg', 39532, 2, 1),
(31, 'Product', 5, '', 'TCL-32DE200.jpg', '31', 'image/jpeg', 25377, 3, 1),
(32, 'Product', 5, '', 'TCL.jpg', '32', 'image/jpeg', 25166, 4, 1),
(33, 'Product', 5, '', 'TCL-L32E520-Ultra-Slim-LED-TV-PVR__43431_zoom.jpg', '33', 'image/jpeg', 81765, 1, 1),
(34, 'Product', 5, '', 'TCL-L46E10FZ-LCD-TV.jpg', '34', 'image/jpeg', 35029, 5, 1),
(35, 'Product', 5, '', 'TCL-LedTV.jpg', '35', 'image/jpeg', 235894, 6, 1),
(36, 'Product', 6, '', '2040128_13136.jpg', '36', 'image/jpeg', 211206, 3, 1),
(38, 'Product', 6, '', 'TCL-32DE200.jpg', '38', 'image/jpeg', 25377, 0, 1),
(42, 'Product', 6, '', 'TCL-LedTV.jpg', '42', 'image/jpeg', 235894, 2, 1),
(43, 'Product', 4, '', 'TCL.jpg', '43', 'image/jpeg', 25166, 0, 1),
(44, 'Product', 4, '', '2040128_13136.jpg', '44', 'image/jpeg', 211206, 0, 1),
(45, 'Product', 4, '', 'TCL-32DE200.jpg', '45', 'image/jpeg', 25377, 0, 1),
(46, 'Product', 3, '', 'TCL-LedTV.jpg', '46', 'image/jpeg', 235894, 0, 1),
(47, 'Product', 2, '', 'TCL-L46E10FZ-LCD-TV.jpg', '47', 'image/jpeg', 35029, 0, 1),
(48, 'Product', 2, '', '2040128_13136.jpg', '48', 'image/jpeg', 211206, 0, 1),
(49, 'Product', 1, '', 'TCL-32DE200.jpg', '49', 'image/jpeg', 25377, 0, 1),
(50, 'Product', 1, '', 'TCL-LedTV.jpg', '50', 'image/jpeg', 235894, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `slug` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `post_count` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `icon`, `post_count`, `published`, `created`, `modified`) VALUES
(5, 0, 11, 12, 'Máy điều hòa nhiệt độ', NULL, NULL, 0, 1, '2012-03-21 16:16:19', '2012-03-22 15:31:42'),
(6, 0, 13, 14, 'Tủ lạnh', NULL, NULL, 0, 1, '2012-03-21 16:16:36', '2012-03-22 15:31:55'),
(7, 0, 1, 10, 'Tivi', 'tivi', NULL, 0, 1, '2012-03-22 15:27:19', '2012-04-01 17:45:51'),
(8, 7, 2, 3, 'LCD', 'lcd', NULL, 0, 1, '2012-04-01 17:52:48', '2012-04-01 17:52:48'),
(10, 7, 6, 7, '3D', '3d', NULL, 0, 1, '2012-04-01 17:53:32', '2012-04-01 17:53:32'),
(11, 7, 8, 9, 'CRT', 'crt', NULL, 0, 1, '2012-04-01 17:53:42', '2012-04-01 17:53:45'),
(12, 7, 4, 5, 'Led', 'led', NULL, 0, 1, '2012-04-01 18:28:29', '2012-04-01 18:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2012-03-13 10:38:09', '2012-03-13 10:38:09'),
(2, 'Member', '2012-03-13 10:38:17', '2012-03-13 10:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `features_excerpt` text,
  `features` text,
  `article` text,
  `price` float NOT NULL,
  `discount` tinyint(3) DEFAULT NULL COMMENT 'tinh bang phan tram',
  `quantity` tinyint(5) DEFAULT NULL,
  `instock` tinyint(1) NOT NULL DEFAULT '1',
  `promotion_content` text,
  `is_promoted` tinyint(1) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordered` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cate` (`category_id`),
  FULLTEXT KEY `name_idx` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `excerpt`, `features_excerpt`, `features`, `article`, `price`, `discount`, `quantity`, `instock`, `promotion_content`, `is_promoted`, `published`, `ordered`, `created`) VALUES
(1, 8, 'TCL #1', 'tcl_1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 1, '2012-03-27 17:52:05'),
(2, 10, 'TCL #2', 'tcl_2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 2, '2012-03-27 17:52:23'),
(3, 12, 'TCL LED #3', 'tcl_led_3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 3, '2012-03-27 17:56:50'),
(4, 8, 'TCL #4', 'tcl_4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 4, '2012-03-27 17:57:04'),
(5, 12, 'TCL #5', 'tcl_5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 5, '2012-03-27 17:57:17'),
(6, 8, 'TCL #6', 'tcl_6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '<ul>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n	<li>\r\n		Sed ut perspiciatis unde omnis iste</li>\r\n</ul>\r\n', '<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n<table class="table table-condensed">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" style="background-color:#f5f5f5">\r\n				<h3>\r\n					Neque porro quisquam est</h3>\r\n			</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width:1%; font-weight: bold">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n		<tr>\r\n			<td nowrap="nowrap" style="width: 1%; font-weight: bold;">\r\n				Lorem ipsum dolor sit amet</td>\r\n			<td>\r\n				Lorem ipsum dolor sit amet</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n', '<h3 class="Title">\r\n	TV 3D thụ động gi&aacute; rẻ của TCL</h3>\r\n<p class="Lead">\r\n	<strong>TV mới của TCL c&oacute; gi&aacute; chưa tới 20 triệu đồng nhưng sở hữu t&iacute;nh năng 3D, m&agrave;n h&igrave;nh LED Full HD k&iacute;ch thước 46 inch v&agrave; qu&eacute;t h&igrave;nh 100Hz.</strong></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Với kích thước 46 inch, đây là một trong những mẫu TV 3D có giá bán tốt nhất tại VN hiện nay." border="1" height="336" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/TCL.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				Với k&iacute;ch thước 46 inch, đ&acirc;y l&agrave; một trong những mẫu TV 3D c&oacute; gi&aacute; b&aacute;n tốt nhất tại VN hiện nay.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Nếu so với c&aacute;c model thụ động Cinema 3D LW4500 hay LW5700 của LG, mức gi&aacute; 19,99 triệu đồng cho model 46 inch t&ecirc;n m&atilde; <font color="#000000">L46V6300F3DE của TCL tốt hơn nhiều. So với c&aacute;c model 3D m&agrave;n trập c&ugrave;ng k&iacute;ch thước của Sony hay Samsung đang c&oacute; tr&ecirc;n thị trường, mẫu 3D của TCL cũng thấp hơn đến cả chục triệu.</font></p>\r\n<p class="Normal">\r\n	<font color="#000000">Tương tự như d&ograve;ng LG Cinema 3D, TCL L46V6300F3DE cũng được trang bị m&agrave;n h&igrave;nh LED viền với độ ph&acirc;n giải Full HD v&agrave; hỗ trợ qu&eacute;t h&igrave;nh 100Hz. Model sử dụng c&ocirc;ng nghệ m&agrave;n h&igrave;nh 3D thụ động tương th&iacute;ch với k&iacute;nh ph&acirc;n cực gọn nhẹ, gi&aacute; rẻ v&agrave; kh&ocirc;ng d&ugrave;ng pin. </font></p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img align="middle" alt="Kính phân cực đi kèm với TV 3D." border="1" height="301" src="http://sohoa.vnexpress.net/Files/Subject/3B/9B/52/1D/L46V6300F3DE-1.jpg" width="500" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				K&iacute;nh ph&acirc;n cực đi k&egrave;m với TV 3D.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal">\r\n	Kh&ocirc;ng được trang bị kết nối Wi-Fi tuy nhi&ecirc;n model 3D thụ đ&ocirc;ng của TCL vẫn c&oacute; thể kết nối mạng nhờ v&agrave;o kết nối c&oacute; d&acirc;y. TV t&iacute;ch hợp tr&igrave;nh duyệt, kết nối DLNA v&agrave; c&aacute;c t&iacute;nh năng Smart TV do nh&agrave; sản xuất của Trung Quốc cung cấp.</p>\r\n', 2390000, NULL, NULL, 1, '', 1, 1, 0, '2012-03-27 17:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_properties`
--

DROP TABLE IF EXISTS `products_properties`;
CREATE TABLE IF NOT EXISTS `products_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_idx` (`property_id`),
  KEY `product_idx` (`product_id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `products_properties`
--

INSERT INTO `products_properties` (`id`, `product_id`, `property_id`) VALUES
(87, 1, 3),
(86, 1, 10),
(85, 1, 14),
(84, 2, 3),
(83, 2, 18),
(82, 2, 17),
(75, 3, 6),
(74, 3, 20),
(73, 3, 15),
(69, 4, 5),
(68, 4, 18),
(67, 4, 14),
(63, 5, 4),
(62, 5, 10),
(61, 5, 15),
(57, 6, 6),
(56, 6, 20),
(55, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `slug` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `product_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slugIdx` (`slug`),
  KEY `slugNormalIdx` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `category_id`, `product_count`) VALUES
(1, 0, 1, 12, 'Loại TV', 'loai_tv', 7, 0),
(2, 0, 27, 40, 'Tần số quét (Hz)', 'tan_so_quet_hz', 7, 0),
(3, 2, 28, 29, '50', '50', 7, 0),
(4, 2, 30, 31, '100', '100', 7, 0),
(5, 2, 32, 33, '200', '200', 7, 0),
(6, 2, 34, 35, '400', '400', 7, 0),
(7, 2, 36, 37, '600', '600', 7, 0),
(8, 2, 38, 39, '800', '800', 7, 0),
(9, 0, 13, 26, 'Cổng USB', 'cong_usb', 7, 0),
(10, 9, 14, 15, '1 cổng', '1_cong', 7, 0),
(11, 9, 16, 17, '2 cổng', '2_cong', 0, 0),
(12, 9, 18, 19, '3 cổng', '3_cong', 0, 0),
(13, 1, 4, 5, 'CRT', 'crt', 7, 0),
(14, 1, 8, 9, 'LCD', 'lcd', 7, 0),
(15, 1, 10, 11, 'LED', 'led', 7, 0),
(16, 1, 6, 7, 'Plasma', 'plasma', 7, 0),
(17, 1, 2, 3, '3D', '3d', 7, 0),
(18, 9, 22, 23, '5 Cổng', '5_cong', 7, 0),
(19, 9, 20, 21, '4 Cổng', '4_cong', 7, 0),
(20, 9, 24, 25, '6 Cổng', '6_cong', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL,
  `ordered` int(5) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `slug`, `description`, `published`, `ordered`, `created`, `modified`) VALUES
(1, 'Giới thiệu', 'gioi_thieu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 0, '2012-03-17 11:55:31', '2012-03-17 12:14:25'),
(2, 'Dịch vụ', 'dich_vu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 0, '2012-03-17 12:10:05', '2012-03-17 12:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` tinytext COLLATE utf8_unicode_ci COMMENT 'full url to avatar image file',
  `language` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `facebook_id` bigint(20) unsigned NOT NULL,
  `oauth_token` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'twitter login',
  `oauth_secret` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'twitter login',
  `oauth_provider` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'twitter login',
  `oauth_uid` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'twitter login',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `key`, `status`, `created`, `modified`, `last_login`, `facebook_id`, `oauth_token`, `oauth_secret`, `oauth_provider`, `oauth_uid`) VALUES
(1, 1, NULL, 'phapsu', '047e1e63f7f1b4b8dfc62333b7745ea1cf138c54', 'admin@gmail.com', NULL, NULL, NULL, '4f5f1596-85bc-4bfe-bfb6-08d089179cc6', 1, '2012-03-13 10:38:30', '2012-03-13 10:38:30', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);
