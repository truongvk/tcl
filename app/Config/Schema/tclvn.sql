-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2012 at 06:13 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=360 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 330),
(9, 1, NULL, NULL, 'AclManagement', 2, 63),
(10, 9, NULL, NULL, 'Groups', 3, 14),
(21, 9, NULL, NULL, 'Users', 15, 52),
(22, 21, NULL, NULL, 'login', 16, 17),
(23, 21, NULL, NULL, 'logout', 18, 19),
(24, 21, NULL, NULL, 'index', 20, 21),
(25, 21, NULL, NULL, 'view', 22, 23),
(26, 21, NULL, NULL, 'add', 24, 25),
(27, 21, NULL, NULL, 'edit', 26, 27),
(28, 21, NULL, NULL, 'delete', 28, 29),
(40, 21, NULL, NULL, 'toggle', 30, 31),
(61, 9, NULL, NULL, 'UserPermissions', 53, 62),
(62, 61, NULL, NULL, 'index', 54, 55),
(63, 61, NULL, NULL, 'sync', 56, 57),
(64, 61, NULL, NULL, 'edit', 58, 59),
(65, 61, NULL, NULL, 'toggle', 60, 61),
(130, 21, NULL, NULL, 'facebook_connect', 32, 33),
(131, 21, NULL, NULL, 'twitter_connect', 34, 35),
(132, 21, NULL, NULL, 'twitter_login', 36, 37),
(133, 21, NULL, NULL, 'oauth_callback', 38, 39),
(136, 21, NULL, NULL, 'register', 40, 41),
(295, 292, NULL, NULL, 'admin_add', 231, 232),
(294, 292, NULL, NULL, 'admin_view', 229, 230),
(293, 292, NULL, NULL, 'admin_index', 227, 228),
(292, 1, NULL, NULL, 'Sliders', 226, 243),
(291, 288, NULL, NULL, 'index', 223, 224),
(290, 288, NULL, NULL, 'admin_view', 221, 222),
(289, 288, NULL, NULL, 'admin_index', 219, 220),
(288, 1, NULL, NULL, 'Contacts', 218, 225),
(185, 1, NULL, NULL, 'Categories', 64, 85),
(186, 185, NULL, NULL, 'admin_index', 65, 66),
(188, 185, NULL, NULL, 'admin_add', 67, 68),
(189, 185, NULL, NULL, 'admin_edit', 69, 70),
(190, 185, NULL, NULL, 'admin_delete', 71, 72),
(191, 185, NULL, NULL, 'admin_toggle', 73, 74),
(276, 271, NULL, NULL, 'admin_delete', 203, 204),
(275, 271, NULL, NULL, 'admin_edit', 201, 202),
(274, 271, NULL, NULL, 'admin_add', 199, 200),
(266, 10, NULL, NULL, 'delete', 12, 13),
(265, 10, NULL, NULL, 'edit', 10, 11),
(264, 10, NULL, NULL, 'add', 8, 9),
(263, 10, NULL, NULL, 'view', 6, 7),
(262, 10, NULL, NULL, 'index', 4, 5),
(201, 1, NULL, NULL, 'Pages', 86, 89),
(202, 201, NULL, NULL, 'display', 87, 88),
(273, 271, NULL, NULL, 'admin_view', 197, 198),
(272, 271, NULL, NULL, 'admin_index', 195, 196),
(271, 1, NULL, NULL, 'Orders', 194, 211),
(270, 257, NULL, NULL, 'thankyou', 191, 192),
(269, 257, NULL, NULL, 'checkout', 189, 190),
(268, 257, NULL, NULL, 'delete', 187, 188),
(267, 257, NULL, NULL, 'edit', 185, 186),
(210, 1, NULL, NULL, 'DebugKit', 90, 97),
(211, 210, NULL, NULL, 'ToolbarAccess', 91, 96),
(212, 211, NULL, NULL, 'history_state', 92, 93),
(213, 211, NULL, NULL, 'sql_explain', 94, 95),
(215, 1, NULL, NULL, 'StaticPages', 98, 119),
(216, 215, NULL, NULL, 'admin_index', 99, 100),
(217, 215, NULL, NULL, 'admin_view', 101, 102),
(218, 215, NULL, NULL, 'admin_add', 103, 104),
(219, 215, NULL, NULL, 'admin_edit', 105, 106),
(220, 215, NULL, NULL, 'admin_delete', 107, 108),
(221, 215, NULL, NULL, 'admin_toggle', 109, 110),
(222, 215, NULL, NULL, 'admin_ordered', 111, 112),
(223, 1, NULL, NULL, 'Properties', 120, 143),
(224, 223, NULL, NULL, 'admin_index', 121, 122),
(225, 223, NULL, NULL, 'admin_view', 123, 124),
(226, 223, NULL, NULL, 'admin_add', 125, 126),
(227, 223, NULL, NULL, 'admin_edit', 127, 128),
(228, 223, NULL, NULL, 'admin_delete', 129, 130),
(232, 185, NULL, NULL, 'admin_sort', 75, 76),
(233, 185, NULL, NULL, 'admin_getnodes', 77, 78),
(234, 185, NULL, NULL, 'admin_reorder', 79, 80),
(235, 185, NULL, NULL, 'admin_reparent', 81, 82),
(236, 223, NULL, NULL, 'admin_sort', 131, 132),
(237, 223, NULL, NULL, 'admin_getnodes', 133, 134),
(238, 223, NULL, NULL, 'admin_reorder', 135, 136),
(239, 223, NULL, NULL, 'admin_reparent', 137, 138),
(240, 223, NULL, NULL, 'getListPropertiesByCategory', 139, 140),
(241, 1, NULL, NULL, 'Products', 144, 171),
(242, 241, NULL, NULL, 'admin_index', 145, 146),
(243, 241, NULL, NULL, 'admin_view', 147, 148),
(244, 241, NULL, NULL, 'admin_add', 149, 150),
(245, 241, NULL, NULL, 'admin_edit', 151, 152),
(246, 241, NULL, NULL, 'admin_delete', 153, 154),
(247, 241, NULL, NULL, 'admin_toggle', 155, 156),
(248, 241, NULL, NULL, 'admin_ordered', 157, 158),
(249, 223, NULL, NULL, 'get_properties_by_category', 141, 142),
(250, 241, NULL, NULL, 'index', 159, 160),
(251, 241, NULL, NULL, 'admin_gallery_ordered', 161, 162),
(252, 1, NULL, NULL, 'Upload', 172, 173),
(253, 241, NULL, NULL, 'detail', 163, 164),
(254, 1, NULL, NULL, 'Filter', 174, 175),
(255, 241, NULL, NULL, 'view', 165, 166),
(256, 241, NULL, NULL, 'admin_delete_image', 167, 168),
(257, 1, NULL, NULL, 'Cart', 176, 193),
(258, 257, NULL, NULL, 'index', 177, 178),
(259, 257, NULL, NULL, 'view', 179, 180),
(260, 257, NULL, NULL, 'add2cart', 181, 182),
(261, 257, NULL, NULL, 'mini_cart', 183, 184),
(277, 271, NULL, NULL, 'admin_toggle', 205, 206),
(278, 271, NULL, NULL, 'admin_ordered', 207, 208),
(279, 215, NULL, NULL, 'get_pages', 113, 114),
(280, 215, NULL, NULL, 'display', 115, 116),
(281, 215, NULL, NULL, 'admin_delete_file', 117, 118),
(282, 185, NULL, NULL, 'get_menu_categories', 83, 84),
(283, 271, NULL, NULL, 'history', 209, 210),
(284, 1, NULL, NULL, 'GlobalConfig', 212, 217),
(286, 284, NULL, NULL, 'admin_index', 213, 214),
(287, 284, NULL, NULL, 'setting2array', 215, 216),
(296, 292, NULL, NULL, 'admin_edit', 233, 234),
(297, 292, NULL, NULL, 'admin_delete', 235, 236),
(298, 292, NULL, NULL, 'admin_toggle', 237, 238),
(299, 292, NULL, NULL, 'admin_ordered', 239, 240),
(300, 292, NULL, NULL, 'get_sliders', 241, 242),
(301, 21, NULL, NULL, 'edit_profile', 42, 43),
(305, 241, NULL, NULL, 'getRandomProducts', 169, 170),
(303, 21, NULL, NULL, 'activate_password', 44, 45),
(304, 21, NULL, NULL, 'forgot_password', 46, 47),
(306, 1, NULL, NULL, 'Subscribers', 244, 255),
(307, 306, NULL, NULL, 'admin_index', 245, 246),
(310, 306, NULL, NULL, 'admin_edit', 247, 248),
(311, 306, NULL, NULL, 'admin_delete', 249, 250),
(312, 306, NULL, NULL, 'admin_toggle', 251, 252),
(314, 306, NULL, NULL, 'add', 253, 254),
(315, 1, NULL, NULL, 'CustomerTypes', 256, 267),
(316, 315, NULL, NULL, 'admin_index', 257, 258),
(324, 323, NULL, NULL, 'admin_index', 269, 270),
(318, 315, NULL, NULL, 'admin_add', 259, 260),
(319, 315, NULL, NULL, 'admin_edit', 261, 262),
(320, 315, NULL, NULL, 'admin_delete', 263, 264),
(323, 1, NULL, NULL, 'Customers', 268, 277),
(322, 315, NULL, NULL, 'admin_ordered', 265, 266),
(325, 323, NULL, NULL, 'admin_view', 271, 272),
(331, 21, NULL, NULL, 'admin_newcustomer', 48, 49),
(335, 334, NULL, NULL, 'admin_index', 279, 280),
(328, 323, NULL, NULL, 'admin_delete', 273, 274),
(334, 1, NULL, NULL, 'EmailMarketings', 278, 293),
(332, 21, NULL, NULL, 'admin_editcustomer', 50, 51),
(333, 323, NULL, NULL, 'admin_email_marketing', 275, 276),
(336, 334, NULL, NULL, 'admin_view', 281, 282),
(337, 334, NULL, NULL, 'admin_add', 283, 284),
(338, 334, NULL, NULL, 'admin_edit', 285, 286),
(339, 334, NULL, NULL, 'admin_delete', 287, 288),
(340, 334, NULL, NULL, 'admin_toggle', 289, 290),
(341, 334, NULL, NULL, 'admin_ordered', 291, 292),
(342, 1, NULL, NULL, 'Dashboards', 294, 311),
(343, 342, NULL, NULL, 'admin_index', 295, 296),
(344, 342, NULL, NULL, 'admin_toggle', 297, 298),
(345, 342, NULL, NULL, 'history', 299, 300),
(346, 342, NULL, NULL, 'admin_view', 301, 302),
(347, 342, NULL, NULL, 'admin_add', 303, 304),
(348, 342, NULL, NULL, 'admin_edit', 305, 306),
(349, 342, NULL, NULL, 'admin_delete', 307, 308),
(350, 342, NULL, NULL, 'admin_ordered', 309, 310),
(351, 1, NULL, NULL, 'Rightbanners', 312, 329),
(352, 351, NULL, NULL, 'get_rightbanner', 313, 314),
(353, 351, NULL, NULL, 'admin_index', 315, 316),
(354, 351, NULL, NULL, 'admin_view', 317, 318),
(355, 351, NULL, NULL, 'admin_add', 319, 320),
(356, 351, NULL, NULL, 'admin_edit', 321, 322),
(357, 351, NULL, NULL, 'admin_delete', 323, 324),
(358, 351, NULL, NULL, 'admin_toggle', 325, 326),
(359, 351, NULL, NULL, 'admin_ordered', 327, 328);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
(10, NULL, 'Group', 2, NULL, 17, 24),
(11, 9, 'User', 1, NULL, 14, 15),
(12, 10, 'User', 2, NULL, 18, 19),
(13, 10, 'User', 11, NULL, 20, 21),
(14, 10, 'User', 12, NULL, 22, 23);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 283, '1', '1', '1', '1'),
(3, 2, 301, '0', '0', '0', '0'),
(5, 2, 304, '1', '1', '1', '1'),
(6, 2, 303, '1', '1', '1', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `model`, `foreign_key`, `name`, `attachment`, `dir`, `type`, `size`, `ordered`, `active`) VALUES
(67, 'Product', 1, '', '21F9C.jpg', '67', 'image/jpeg', 88271, 0, 1),
(68, 'Product', 2, '', 'tv_21F11C.jpg', '68', 'image/jpeg', 102212, 0, 1),
(70, 'Product', 3, '', 'tv21F3EUS.jpg', '70', 'image/jpeg', 334200, 0, 1),
(72, 'Product', 4, '', 'tv21F8EUS.jpg', '72', 'image/jpeg', 102711, 0, 1),
(73, 'Product', 5, '', 'tv21H91EUS.jpg', '73', 'image/jpeg', 140775, 0, 1),
(74, 'Product', 6, '', 'tvD10.jpg', '74', 'image/jpeg', 77126, 0, 1),
(75, 'Product', 9, '', 'tvD10.jpg', '75', 'image/jpeg', 77126, 0, 1),
(76, 'Product', 7, '', 'tvD10.jpg', '76', 'image/jpeg', 77126, 0, 1),
(77, 'Product', 8, '', 'tvD10.jpg', '77', 'image/jpeg', 77126, 0, 1),
(78, 'Product', 10, '', '23F4300 1.jpg', '78', 'image/jpeg', 508188, 0, 1),
(79, 'Product', 10, '', '23F4300 2.jpg', '79', 'image/jpeg', 1015985, 0, 1),
(80, 'Product', 11, '', '24P21F 1.jpg', '80', 'image/jpeg', 97866, 0, 1),
(83, 'Product', 11, '', '24P21F 4.jpg', '83', 'image/jpeg', 100237, 0, 1),
(84, 'Product', 11, '', 'tv24P21F-2.jpg', '84', 'image/jpeg', 30838, 0, 1),
(85, 'Product', 11, '', 'tv24P21F 3.jpg', '85', 'image/jpeg', 19781, 0, 1),
(86, 'Product', 12, '', 'tv32D3200.jpg', '86', 'image/jpeg', 67701, 0, 1),
(87, 'Product', 13, '', 'tv32F3380-1.jpg', '87', 'image/jpeg', 210604, 0, 1),
(89, 'Product', 13, '', 'tv32F3380-2.jpg', '89', 'image/jpeg', 279567, 0, 1),
(90, 'Product', 14, '', 'tv32E5300-1.jpg', '90', 'image/jpeg', 29055, 0, 1),
(92, 'Product', 14, '', 'tv32E5300 3.jpg', '92', 'image/jpeg', 18979, 2, 1),
(93, 'Product', 14, '', 'tv32E5300-4.jpg', '93', 'image/jpeg', 75781, 3, 1),
(94, 'Product', 14, '', 'tv32E5300-2.jpg', '94', 'image/jpeg', 30591, 1, 1),
(95, 'Product', 15, '', 'tv32E5300-1.jpg', '95', 'image/jpeg', 29055, 0, 1),
(96, 'Product', 15, '', 'tv32E5300-2.jpg', '96', 'image/jpeg', 30591, 0, 1),
(97, 'Product', 15, '', 'tv32E5300 3.jpg', '97', 'image/jpeg', 18979, 0, 1),
(98, 'Product', 15, '', 'tv32E5300-4.jpg', '98', 'image/jpeg', 75781, 0, 1),
(99, 'Product', 16, '', '39E5000-1.jpg', '99', 'image/jpeg', 29690, 0, 1),
(100, 'Product', 16, '', '39E5000-2.jpg', '100', 'image/jpeg', 31842, 0, 1),
(101, 'Product', 16, '', '39E5000-3.jpg', '101', 'image/jpeg', 17081, 0, 1),
(102, 'Product', 16, '', '39E5000-9.jpg', '102', 'image/jpeg', 81360, 0, 1),
(103, 'Product', 17, '', 'V7300-1.jpg', '103', 'image/jpeg', 29464, 0, 1),
(104, 'Product', 17, '', 'V7300-2.jpg', '104', 'image/jpeg', 29971, 0, 1),
(105, 'Product', 17, '', 'V7300-3.jpg', '105', 'image/jpeg', 17039, 0, 1),
(106, 'Product', 17, '', 'V7300-4.jpg', '106', 'image/jpeg', 58484, 0, 1),
(109, 'Product', 18, '', 'Standing-C.jpg', '109', 'image/jpeg', 29918, 0, 1),
(110, 'Product', 19, '', 'Split-BQ.jpg', '110', 'image/jpeg', 30368, 0, 1),
(111, 'Product', 19, '', 'Split-BQ-design.jpg', '111', 'image/jpeg', 32603, 0, 1),
(112, 'Product', 20, '', 'Split-BQ.jpg', '112', 'image/jpeg', 30368, 0, 1),
(113, 'Product', 20, '', 'Split-BQ-design.jpg', '113', 'image/jpeg', 32603, 0, 1),
(114, 'Product', 21, '', 'Split-BK.jpg', '114', 'image/jpeg', 36255, 0, 1),
(115, 'Product', 22, '', 'Split-BK.jpg', '115', 'image/jpeg', 36255, 0, 1);

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
  `product_count` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `parentId_idx` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `slug`, `icon`, `product_count`, `published`, `created`, `modified`) VALUES
(5, 0, 13, 18, 'Điều hòa không khí', 'dieu_hoa_khong_khi', NULL, 0, 1, '2012-03-21 16:16:19', '2012-05-02 05:57:35'),
(15, 5, 14, 15, 'Điều hòa treo tường', 'dieu_hoa_treo_tuong', NULL, 4, 1, '2012-05-02 12:26:31', '2012-05-02 12:26:31'),
(7, 0, 1, 12, 'Tivi', 'tivi', NULL, 0, 1, '2012-03-22 15:27:19', '2012-04-01 17:45:51'),
(8, 7, 4, 5, 'LCD', 'lcd', NULL, 4, 1, '2012-04-01 17:52:48', '2012-04-01 17:52:48'),
(10, 7, 10, 11, '3D', '3d', NULL, 1, 0, '2012-04-01 17:53:32', '2012-05-02 05:57:50'),
(11, 7, 2, 3, 'CRT', 'crt', NULL, 5, 1, '2012-04-01 17:53:42', '2012-04-01 17:53:45'),
(12, 7, 6, 7, 'Led', 'led', NULL, 7, 1, '2012-04-01 18:28:29', '2012-04-01 18:28:29'),
(13, 7, 8, 9, 'Smart TV', 'smart_tv', NULL, 1, 1, '2012-05-02 05:57:10', '2012-05-02 05:57:17'),
(16, 5, 16, 17, 'Điều hòa tủ đứng', 'dieu_hoa_tu_dung', NULL, 1, 1, '2012-05-02 12:26:50', '2012-05-02 12:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

DROP TABLE IF EXISTS `checkout_address`;
CREATE TABLE IF NOT EXISTS `checkout_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ward` varchar(100) NOT NULL COMMENT 'phuong/xa',
  `district` varchar(100) NOT NULL COMMENT 'quan / huyen',
  `city` varchar(50) NOT NULL,
  `is_delivery_address` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'dung chung dia chi giao hang',
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `ward`, `district`, `city`, `is_delivery_address`) VALUES
(1, 12, 'Phap', 'Su', '988988988', '582/3 Hoang Dieu', 'Hoa Thuan Dong', 'Hai Chau', '52', 1),
(2, 12, 'Phap', 'Su', '988988988', '582/3 Hoang Dieu', 'Hoa Thuan Dong', 'Hai Chau', '52', 1),
(3, 12, 'Phap', 'Su', '988988988', '582/3 Hoang Dieu', 'Hoa Thuan Dong', 'Hai Chau', '52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `title`, `content`, `created`) VALUES
(1, 'Vu Khanh Truong', 'vukhanhtruong@gmail.com', 'Really cool site', 'undefined', '0000-00-00 00:00:00'),
(2, 'sfsafas', 'xxx@xx.com', 'ddfsdf', 'sdfsfd', '0000-00-00 00:00:00'),
(3, 'ddd', 'dddd@gmail.com', 'ddd', 'ddd', '0000-00-00 00:00:00'),
(4, 'sss', 'ssss@dddd.ddd', 'ss', 'sss', '0000-00-00 00:00:00'),
(5, 'sss', 'sss@dd.com', 'sfs', 'fasfasfasf', '0000-00-00 00:00:00'),
(6, 'sss', 'sss@dd.com', 'sfs', 'fasfasfasf', '0000-00-00 00:00:00'),
(7, 'sdfs', 'asfa@ddd.com', 'ttete', 'teatatertr', '2012-05-02 17:53:09'),
(8, 'sdfs', 'asfa@ddd.com', 'ttete', 'teatatertr', '2012-05-02 22:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Dua vao loai khach hang chun chung',
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `company_address` varchar(100) DEFAULT NULL,
  `tax_no` int(10) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_type_id`, `user_id`, `first_name`, `last_name`, `company`, `company_address`, `tax_no`, `website`, `fax`, `phone`) VALUES
(1, 2, 12, 'Tammuz', 'Vu', '', '', NULL, '', '', '988988988');

-- --------------------------------------------------------

--
-- Table structure for table `customer_types`
--

DROP TABLE IF EXISTS `customer_types`;
CREATE TABLE IF NOT EXISTS `customer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `ordered` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_types`
--

INSERT INTO `customer_types` (`id`, `name`, `created`, `ordered`) VALUES
(1, 'Guest', '2012-04-18 10:18:44', 0),
(2, 'Đại lý', '2012-04-18 10:19:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE IF NOT EXISTS `delivery_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `ward` varchar(100) NOT NULL COMMENT 'phuong/xa',
  `district` varchar(100) NOT NULL COMMENT 'quan / huyen',
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `delivery_address`
--


-- --------------------------------------------------------

--
-- Table structure for table `email_marketings`
--

DROP TABLE IF EXISTS `email_marketings`;
CREATE TABLE IF NOT EXISTS `email_marketings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type_id` int(11) NOT NULL DEFAULT '0' COMMENT '0: send all, -1: subscriber, >0 customer type',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `email_marketings`
--


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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'if 0: la nhung nguoi mua hang ko dang ky',
  `personal_information` text NOT NULL,
  `cart_information` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'mark as resolve?',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `personal_information`, `cart_information`, `created`, `modified`, `published`) VALUES
(1, 12, 'a:3:{s:8:"Customer";a:8:{s:10:"first_name";s:6:"Truong";s:9:"last_name";s:8:"Vu Khanh";s:7:"company";s:0:"";s:15:"company_address";s:0:"";s:6:"tax_no";s:0:"";s:7:"website";s:0:"";s:3:"fax";s:0:"";s:5:"phone";s:9:"988988988";}s:15:"CheckoutAddress";a:8:{s:10:"first_name";s:6:"Truong";s:9:"last_name";s:8:"Vu Khanh";s:5:"phone";s:9:"988988988";s:7:"address";s:16:"582/3 Hoang Dieu";s:4:"ward";s:14:"Hoa Thuan Dong";s:8:"district";s:8:"Hai Chau";s:4:"city";s:2:"52";s:19:"is_delivery_address";s:1:"1";}s:5:"Order";a:1:{s:7:"user_id";s:1:"2";}}', 'a:2:{i:0;a:6:{s:2:"id";s:1:"6";s:3:"qty";s:1:"1";s:5:"price";s:7:"2000000";s:4:"info";s:6:"TCL #1";s:5:"extra";a:2:{s:4:"slug";s:5:"tcl-6";s:5:"image";a:2:{s:4:"name";s:15:"TCL-32DE200.jpg";s:3:"dir";s:2:"51";}}s:8:"subtotal";i:2000000;}s:5:"total";i:2000000;}', '2012-04-12 11:24:09', '2012-04-12 17:15:11', 1),
(2, 0, 'a:3:{s:8:"Customer";a:8:{s:10:"first_name";s:6:"Tammuz";s:9:"last_name";s:8:"Vu Khanh";s:7:"company";s:0:"";s:15:"company_address";s:0:"";s:6:"tax_no";s:0:"";s:7:"website";s:0:"";s:3:"fax";s:0:"";s:5:"phone";s:9:"988988988";}s:15:"CheckoutAddress";a:8:{s:10:"first_name";s:6:"Truong";s:9:"last_name";s:8:"Vu Khanh";s:5:"phone";s:9:"988988988";s:7:"address";s:16:"582/3 Hoang Dieu";s:4:"ward";s:14:"Hoa Thuan Dong";s:8:"district";s:8:"Hai Chau";s:4:"city";s:2:"52";s:19:"is_delivery_address";s:1:"1";}s:5:"Order";a:1:{s:7:"user_id";i:0;}}', 'a:2:{i:0;a:6:{s:2:"id";s:1:"6";s:3:"qty";s:1:"1";s:5:"price";s:7:"2000000";s:4:"info";s:6:"TCL #6";s:5:"extra";a:2:{s:4:"slug";s:5:"tcl-6";s:5:"image";a:2:{s:4:"name";s:15:"TCL-32DE200.jpg";s:3:"dir";s:2:"51";}}s:8:"subtotal";i:2000000;}s:5:"total";i:2000000;}', '2012-04-12 12:17:02', '2012-04-12 12:17:02', 0);

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
  `price` float DEFAULT NULL,
  `promotion_price` float DEFAULT '0',
  `discount` tinyint(3) DEFAULT NULL COMMENT 'tinh bang phan tram',
  `quantity` tinyint(5) DEFAULT NULL,
  `instock` tinyint(1) NOT NULL DEFAULT '1',
  `promotion_content` text,
  `is_promoted` tinyint(1) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordered` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `cate` (`category_id`),
  FULLTEXT KEY `name_idx` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `excerpt`, `features_excerpt`, `features`, `article`, `price`, `promotion_price`, `discount`, `quantity`, `instock`, `promotion_content`, `is_promoted`, `published`, `ordered`, `created`) VALUES
(1, 11, '21F9C', '21f9c', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 592 x 510 x 455 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): &nbsp;657 x 564 x 532 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 1500000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 06:05:50'),
(2, 11, '21F11C', '21f11c', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.&nbsp;</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.&nbsp;</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.&nbsp;</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.&nbsp;</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 592 x 510 x 455 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): &nbsp;657 x 564 x 532 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 1600000, NULL, NULL, NULL, 1, '', 0, 1, 1, '2012-05-02 06:49:03'),
(3, 11, '21F3EUS', '21f3eus', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 592 x 373 x 455 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 662 x 417 x 532 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 1800000, NULL, NULL, NULL, 1, '', 0, 1, 2, '2012-05-02 06:59:13'),
(4, 11, '21F8EUS', '21f8eus', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 592 x 373 x 455 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 662 x 417 x 532 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 1850000, NULL, NULL, NULL, 1, '', 0, 1, 3, '2012-05-02 07:03:46'),
(5, 11, '21H91EUS', '21h91eus', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch .</li>\r\n	<li>\r\n		Ch&acirc;n đ&ecirc;́ xoay đ&ocirc;̣c đ&aacute;o, thi&ecirc;́t k&ecirc;́ theo phong c&aacute;ch LCD.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh : 21 Inch .</li>\r\n	<li>\r\n		Ch&acirc;n đ&ecirc;́ xoay đ&ocirc;̣c đ&aacute;o, thi&ecirc;́t k&ecirc;́ theo phong c&aacute;ch LCD.</li>\r\n	<li>\r\n		Sơn piano đen b&oacute;ng, ch&ocirc;́ng tr&acirc;̀y vĩnh cửu.</li>\r\n	<li>\r\n		Đ&egrave;n h&igrave;nh : CRT Ultraslim, mỏng hơn 40% với TV CRT thường.</li>\r\n	<li>\r\n		Kh&aacute;ng tia bức xạ ph&aacute;t ra từ m&agrave;n h&igrave;nh.</li>\r\n	<li>\r\n		Cảnh b&aacute;o th&ocirc;ng minh : giờ xem, hi&ecirc;̣u đi&ecirc;̣n th&ecirc;́, t&iacute;n hi&ecirc;̣u s&oacute;ng.</li>\r\n	<li>\r\n		Hẹn giờ tắt mở m&aacute;y.</li>\r\n	<li>\r\n		Kh&oacute;a trẻ em.</li>\r\n	<li>\r\n		Remote h&ocirc;̀ng ngoại.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i : TV , AV in x 2 ; AV out x 1 , YpbPr.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng : 100V ~ 240V.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t loa 5W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 75W.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 662 x 371 x 585 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 959 x 509 x 738 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 1900000, NULL, NULL, NULL, 1, '', 1, 1, 4, '2012-05-02 09:28:14'),
(6, 8, 'L24D10F', 'l24d10f', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 24 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 24 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 5W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 45W.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 605mm x 465mm x 34mm</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 662mm x 465mm x 155mm</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 2500000, NULL, NULL, NULL, 1, '', 0, 1, 5, '2012-05-02 09:35:44'),
(7, 8, 'L39D10PF', 'l39d10pf', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 120W.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 952mm x 660mm x 45mm</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 1100mm x 720mm x 200mm</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 2800000, 0, NULL, NULL, 1, '', 0, 1, 7, '0000-00-00 00:00:00'),
(8, 8, 'L39D10PFA', 'l39d10pfa', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với to&agrave;n b&ocirc;̣ c&aacute;c định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, H.264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 120W.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với to&agrave;n b&ocirc;̣ c&aacute;c định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, H.264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 120W.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 952mm x 660mm x 45mm</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 1100mm x 720mm x 200mm</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 3000000, 0, NULL, NULL, 1, '', 0, 1, 8, '0000-00-00 00:00:00'),
(9, 8, 'L32D10P', 'l32d10p', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 90W.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Vi&ecirc;̀n trang tr&iacute; với phong c&aacute;ch thạch anh sang trọng.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: C&ocirc;̉ng TV, AV-in x 2, AV-out x 1, DVD (YPbPr), VGA, HDMI, USB, headphone.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 90W.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 800mm x 582mm x 45mm</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 883mm x 617mm x 170mm</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 2600000, 0, NULL, NULL, 1, '', 0, 1, 6, '0000-00-00 00:00:00'),
(10, 12, '23F4300', '23f4300', NULL, '<ul>\r\n	<li>\r\n		Kích thước màn hình: 23 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		&nbsp;</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		Kích thước màn hình: 23 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng:&nbsp;</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh vòm ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ:</li>\r\n	<li>\r\n		Dãy đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		Kích thước sản ph&acirc;̉m (Dài x Cao x Dày):&nbsp;</li>\r\n	<li>\r\n		Kích thước bao bì (Dài x Cao x Dày):&nbsp;</li>\r\n	<li>\r\n		Bảo hành 2 năm tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 3200000, NULL, NULL, NULL, 1, '', 1, 1, 0, '2012-05-02 09:52:18'),
(11, 12, '24P21F', '24p21f', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 24 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Đường viền thạch anh trong suốt, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV-IN*2, AV-OUT*1, 1*DVD, 1*VGA, 1*PC OUT, 1*USB.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 24 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD 1080P.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u b&oacute;ng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đo&agrave;n h&oacute;a d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Đường viền thạch anh trong suốt, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV-IN*2, AV-OUT*1, 1*DVD, 1*VGA, 1*PC OUT, 1*USB.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 35w.</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V.</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 602 x 21 x 459 mm.</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 690 x 107 x 494 mm.</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 3400000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 10:01:03'),
(12, 12, 'L32D3200P', 'l32d3200p', NULL, '<ul>\r\n	<li>\r\n		Kích thước màn hình: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u bóng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đoàn hóa d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n</ul>\r\n', '\r\n<ul>\r\n	<li>\r\n		Kích thước màn hình: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Vỏ nhựa si&ecirc;u bóng với ch&acirc;́t li&ecirc;̣u nhựa si&ecirc;u b&ecirc;̀n của t&acirc;̣p đoàn hóa d&acirc;̀u Total cung c&acirc;́p.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với toàn b&ocirc;̣ các định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, H.264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV-IN x 2, AV-OUT x 1, 1 x DVD, 1 x VGA, 2 x USB Headphone</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh vòm ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 70W.</li>\r\n	<li>\r\n		Dãy đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		Kích thước sản ph&acirc;̉m (Dài x Cao x Dày): 810 x 28 x 556 mm</li>\r\n	<li>\r\n		Kích thước bao bì (Dài x Cao x Dày): 870 x 179 x 726 mm</li>\r\n	<li>\r\n		Bảo hành 2 năm tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '', 3500000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 11:25:40'),
(13, 12, '32F3380', '32f3380', NULL, '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '<ul>\r\n	<li>\r\n		K&iacute;ch thước m&agrave;n h&igrave;nh: 32 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với to&agrave;n b&ocirc;̣ c&aacute;c định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, .264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng:&nbsp;</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ:</li>\r\n	<li>\r\n		D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y):&nbsp;</li>\r\n	<li>\r\n		K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y):&nbsp;</li>\r\n	<li>\r\n		Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '', 3800000, NULL, NULL, NULL, 1, '', 1, 1, 0, '2012-05-02 11:31:25'),
(14, 12, '32E5300', '32e5300', NULL, '<div>\r\n	T&iacute;nh năng sản ph&acirc;̉m:</div>\r\n<div>\r\n	K&iacute;ch thước m&agrave;n h&igrave;nh: 32 &nbsp;Inch.</div>\r\n<div>\r\n	Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</div>\r\n<div>\r\n	T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</div>\r\n<div>\r\n	Đường viền si&ecirc;u mỏng chỉ 0.9cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</div>\r\n<div>\r\n	Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</div>\r\n<div>\r\n	Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</div>\r\n<div>\r\n	H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</div>\r\n<div>\r\n	H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</div>\r\n<div>\r\n	&nbsp;</div>\r\n', '<div>\r\n	T&iacute;nh năng sản ph&acirc;̉m:</div>\r\n<div>\r\n	K&iacute;ch thước m&agrave;n h&igrave;nh: 32 &nbsp;Inch.</div>\r\n<div>\r\n	Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</div>\r\n<div>\r\n	T&iacute;nh năng 2 trong 1 : Tivi + M&agrave;n h&igrave;nh vi t&iacute;nh.</div>\r\n<div>\r\n	Đường viền si&ecirc;u mỏng chỉ 0.9cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</div>\r\n<div>\r\n	Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</div>\r\n<div>\r\n	Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</div>\r\n<div>\r\n	H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với to&agrave;n b&ocirc;̣ c&aacute;c định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, .264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</div>\r\n<div>\r\n	H&ocirc;̃ trợ xem h&igrave;nh ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</div>\r\n<div>\r\n	H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</div>\r\n<div>\r\n	C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV-IN x 2, AV-OUT x 1, 1 x DVD, 1 x VGA, 1 x PC OUT, 1 x USB Headphone, SPDIF.</div>\r\n<div>\r\n	C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh v&ograve;m ảo với c&ocirc;ng su&acirc;́t 10W x 2.</div>\r\n<div>\r\n	C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 70w.</div>\r\n<div>\r\n	D&atilde;y đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V.</div>\r\n<div>\r\n	K&iacute;ch thước sản ph&acirc;̉m (D&agrave;i x Cao x D&agrave;y): 732 x 15 x 485 mm.</div>\r\n<div>\r\n	K&iacute;ch thước bao b&igrave; (D&agrave;i x Cao x D&agrave;y): 878 x 184 x 566 mm.</div>\r\n<div>\r\n	Bảo h&agrave;nh 2 năm tr&ecirc;n to&agrave;n qu&ocirc;́c.</div>\r\n', '', 4000000, NULL, NULL, NULL, 1, '', 1, 1, 0, '2012-05-02 11:41:44'),
(15, 12, '32E5300D', '32e5300d', NULL, '<ul>\r\n	<li>\r\n		Kích thước màn hình: 32 &nbsp;Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng chỉ 0.9cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		Hỗ trợ t&iacute;nh năng Digital thu được c&aacute;c k&ecirc;nh kĩ thuật số của VTC m&agrave; kh&ocirc;ng cần mua bộ giải m&atilde;.</li>\r\n	<li>\r\n		Hỗ trợ t&iacute;nh năng ghi lại chương tr&igrave;nh ưa th&iacute;ch v&agrave; ph&aacute;t lại v&agrave;o bất cứ khi n&agrave;o.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		Kích thước màn hình: 32 &nbsp;Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải HD Ready 1366 x 768.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng chỉ 0.9cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		Hỗ trợ t&iacute;nh năng Digital thu được c&aacute;c k&ecirc;nh kĩ thuật số của VTC m&agrave; kh&ocirc;ng cần mua bộ giải m&atilde;.</li>\r\n	<li>\r\n		Hỗ trợ t&iacute;nh năng ghi lại chương tr&igrave;nh ưa th&iacute;ch v&agrave; ph&aacute;t lại v&agrave;o bất cứ khi n&agrave;o.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với toàn b&ocirc;̣ các định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, .264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV-IN x 2, AV-OUT x 1, 1 x DVD, 1 x VGA, 1 x PC OUT, 1 x USB Headphone, SPDIF.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh vòm ảo với c&ocirc;ng su&acirc;́t 10W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 70w.</li>\r\n	<li>\r\n		Dãy đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V.</li>\r\n	<li>\r\n		Kích thước sản ph&acirc;̉m (Dài x Cao x Dày): 732 x 15 x 485 mm.</li>\r\n	<li>\r\n		Kích thước bao bì (Dài x Cao x Dày): 878 x 184 x 566 mm.</li>\r\n	<li>\r\n		Bảo hành 2 năm tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 4200000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 11:45:07'),
(16, 12, 'L39E5000', 'l39e5000', NULL, '<ul>\r\n	<li>\r\n		Kích thước màn hình: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		C&ocirc;ng nghệ 3D gi&uacute;p xem được c&aacute;c bộ phim c&oacute; hiệu ứng 3D một c&aacute;ch ch&acirc;n thật.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '<ul>\r\n	<li>\r\n		Kích thước màn hình: 39 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường viền si&ecirc;u mỏng, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền, chống trầy xước cao.</li>\r\n	<li>\r\n		Ch&acirc;n đế được l&agrave;m bằng k&iacute;nh chịu lực.</li>\r\n	<li>\r\n		C&ocirc;ng nghệ 3D gi&uacute;p xem được c&aacute;c bộ phim c&oacute; hiệu ứng 3D một c&aacute;ch ch&acirc;n thật.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với toàn b&ocirc;̣ các định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, .264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng: AV in x2, AV out x1, VGA x 1, Component x1, HMDI x 3, USB x 1, Headphone x1, &nbsp;SPDIF x 1.</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh vòm ảo với c&ocirc;ng su&acirc;́t 10W x 2.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ: 70W.</li>\r\n	<li>\r\n		Dãy đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V.</li>\r\n	<li>\r\n		Kích thước sản ph&acirc;̉m (Dài x Cao x Dày): 890 x 30 x 580 mm.</li>\r\n	<li>\r\n		Kích thước bao bì (Dài x Cao x Dày):&nbsp;</li>\r\n	<li>\r\n		Bảo hành 2 năm tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '', 5000000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 11:51:48'),
(17, 13, '46V7300', '46v7300', NULL, '<ul>\r\n	<li>\r\n		Kích thước màn hình: &nbsp;46 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Smart TV với n&ecirc;̀n tảng Android+, cho phép cài đặt, c&acirc;̣p nh&acirc;̣t, tháo gỡ các ứng dụng phong phú từ kho ứng dụng Android.</li>\r\n	<li>\r\n		Các ứng dụng hay tích hợp sẵn trong máy: Youtube, Skype, Web Browser, các loại game cảm bi&ecirc;́n, trí tu&ecirc;̣...</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường vi&ecirc;n si&ecirc;u mỏng 0.9 cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền m&agrave;u trắng, chống trầy xước cao, mang đến sự sang trọng cho chủ nh&acirc;n.</li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		Kích thước màn hình: &nbsp;46 Inch.</li>\r\n	<li>\r\n		Đ&ocirc;̣ ph&acirc;n giải Full HD1080P.</li>\r\n	<li>\r\n		Smart TV với n&ecirc;̀n tảng Android+, cho phép cài đặt, c&acirc;̣p nh&acirc;̣t, tháo gỡ các ứng dụng phong phú từ kho ứng dụng Android.</li>\r\n	<li>\r\n		Các ứng dụng hay tích hợp sẵn trong máy: Youtube, Skype, Web Browser, các loại game cảm bi&ecirc;́n, trí tu&ecirc;̣...</li>\r\n	<li>\r\n		Tính năng 2 trong 1 : Tivi + Màn hình vi tính.</li>\r\n	<li>\r\n		Đường vi&ecirc;n si&ecirc;u mỏng 0.9 cm, một thiết kế mang phong c&aacute;ch Ch&acirc;u &Acirc;u.</li>\r\n	<li>\r\n		Vỏ bằng sợi hợp kim si&ecirc;u bền m&agrave;u trắng, chống trầy xước cao, mang đến sự sang trọng cho chủ nh&acirc;n.</li>\r\n	<li>\r\n		C&ocirc;ng nghệ 3D gi&uacute;p xem được c&aacute;c bộ phim c&oacute; hiệu ứng 3D 1 c&aacute;ch ch&acirc;n thật.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem phim HD trực ti&ecirc;́p qua c&ocirc;̉ng USB với toàn b&ocirc;̣ các định dạng file ph&ocirc;̉ bi&ecirc;́n nh&acirc;́t hi&ecirc;̣n nay: .MKV, .264, .TS, .TP, .MOV, .MP4, .AVI, .MPG, .RM, .RMVB, .WMV&hellip; H&ocirc;̃ trợ định dạng file phụ đ&ecirc;̀ .SRT.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ xem hình ảnh định dạng JPEG trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		H&ocirc;̃ trợ nghe nhạc định dạng WMA, MP3 trực ti&ecirc;́p qua c&ocirc;̉ng USB.</li>\r\n	<li>\r\n		C&ocirc;̉ng k&ecirc;́t n&ocirc;́i đa dạng:&nbsp;</li>\r\n	<li>\r\n		C&ocirc;ng ngh&ecirc;̣ &acirc;m thanh vòm ảo với c&ocirc;ng su&acirc;́t 10W x 2</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t ti&ecirc;u thụ:</li>\r\n	<li>\r\n		Dãy đi&ecirc;̣n th&ecirc;́ r&ocirc;̣ng: 110V ~ 240V</li>\r\n	<li>\r\n		Kích thước sản ph&acirc;̉m (Dài x Cao x Dày):&nbsp;</li>\r\n	<li>\r\n		Kích thước bao bì (Dài x Cao x Dày):&nbsp;</li>\r\n	<li>\r\n		Bảo hành 2 năm tr&ecirc;n toàn qu&ocirc;́c.</li>\r\n</ul>\r\n', '', 6000000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 12:06:04'),
(18, 16, 'TAC 18CF/C', 'tac-18cfc', NULL, '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 2HP.</li>\r\n	<li>\r\n		Sử dụng ngu&ocirc;̀n đi&ecirc;̣n 1 pha th&ocirc;ng thường, ti&ecirc;̣n cho vi&ecirc;̣c lắp đặt.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n quạt lớn, ph&ugrave; hợp với những ph&ograve;ng r&ocirc;̣ng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 2HP.</li>\r\n	<li>\r\n		Sử dụng ngu&ocirc;̀n đi&ecirc;̣n 1 pha th&ocirc;ng thường, ti&ecirc;̣n cho vi&ecirc;̣c lắp đặt.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n quạt lớn, ph&ugrave; hợp với những ph&ograve;ng r&ocirc;̣ng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng</li>\r\n	<li>\r\n		D&agrave;n n&oacute;ng được mạ hợp kim cao c&acirc;́p TiO2 gi&uacute;p ch&ocirc;́ng b&aacute;m bụi v&agrave; ăn m&ograve;n trong su&ocirc;́t qu&aacute; tr&igrave;nh sử dụng</li>\r\n	<li>\r\n		Đường k&iacute;nh ống đồng trao đổi nhiệt của d&agrave;n n&oacute;ng si&ecirc;u lớn 9.52mm, gi&uacute;p qu&aacute; tr&igrave;nh l&agrave;m lạnh di&ecirc;̃n ra nhanh ch&oacute;ng</li>\r\n	<li>\r\n		Lưới lọc 6 trong 1 lọc bỏ những bụi b&acirc;̉n, vi khu&acirc;̉n trong kh&ocirc;ng kh&iacute;.</li>\r\n	<li>\r\n		Đi&ecirc;̀u khi&ecirc;̉n từ xa ti&ecirc;̣n dụng.</li>\r\n</ul>\r\n', '', 7000000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 12:28:22'),
(19, 15, 'TAC 09CS/BQ', 'tac-09csbq', NULL, '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 1HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 1HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n	<li>\r\n		D&agrave;n n&oacute;ng được mạ hợp kim cao c&acirc;́p TiO2 gi&uacute;p ch&ocirc;́ng b&aacute;m bụi v&agrave; ăn m&ograve;n trong su&ocirc;́t qu&aacute; tr&igrave;nh sử dụng.</li>\r\n	<li>\r\n		Đường k&iacute;nh ống đồng trao đổi nhiệt của d&agrave;n n&oacute;ng si&ecirc;u lớn 9.52mm, gi&uacute;p qu&aacute; tr&igrave;nh l&agrave;m lạnh di&ecirc;̃n ra nhanh ch&oacute;ng.</li>\r\n	<li>\r\n		Lưới lọc 6 trong 1 lọc bỏ những bụi b&acirc;̉n, vi khu&acirc;̉n trong kh&ocirc;ng kh&iacute;.</li>\r\n	<li>\r\n		Đặc bi&ecirc;̣t lớp lước lọc tinh ch&acirc;́t tr&agrave; xanh v&agrave; Vitamin C gi&uacute;p khử m&ugrave;i nhanh ch&oacute;ng, bảo v&ecirc;̣ sức khỏe đặc bi&ecirc;̣t l&agrave; l&agrave;n da của người sử dụng.</li>\r\n	<li>\r\n		Đi&ecirc;̀u khi&ecirc;̉n từ xa ti&ecirc;̣n dụng.</li>\r\n</ul>\r\n', '', 7000000, NULL, NULL, NULL, 1, '', 1, 1, 0, '2012-05-02 12:34:59');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `excerpt`, `features_excerpt`, `features`, `article`, `price`, `promotion_price`, `discount`, `quantity`, `instock`, `promotion_content`, `is_promoted`, `published`, `ordered`, `created`) VALUES
(20, 15, 'TAC 12CS/BQ', 'tac-12csbq', NULL, '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t làm lạnh 1.5HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với máy nén hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		Làm lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		Màn hình LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		Dàn lạnh và dàn nóng v&acirc;̣n hành &ecirc;m ái.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t làm lạnh 1.5HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với máy nén hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		Làm lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		Màn hình LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		Dàn lạnh và dàn nóng v&acirc;̣n hành &ecirc;m ái.</li>\r\n	<li>\r\n		Dàn nóng được mạ hợp kim cao c&acirc;́p TiO2 giúp ch&ocirc;́ng bám bụi và ăn mòn trong su&ocirc;́t quá trình sử dụng.</li>\r\n	<li>\r\n		Đường k&iacute;nh ống đồng trao đổi nhiệt của d&agrave;n n&oacute;ng si&ecirc;u lớn 9.52mm, giúp quá trình làm lạnh di&ecirc;̃n ra nhanh chóng.</li>\r\n	<li>\r\n		Lưới lọc 6 trong 1 lọc bỏ những bụi b&acirc;̉n, vi khu&acirc;̉n trong kh&ocirc;ng khí.</li>\r\n	<li>\r\n		Đặc bi&ecirc;̣t lớp lước lọc tinh ch&acirc;́t trà xanh và Vitamin C giúp khử mùi nhanh chóng, bảo v&ecirc;̣ sức khỏe đặc bi&ecirc;̣t là làn da của người sử dụng.</li>\r\n	<li>\r\n		Đi&ecirc;̀u khi&ecirc;̉n từ xa ti&ecirc;̣n dụng.</li>\r\n</ul>\r\n', '', 7500000, NULL, NULL, NULL, 1, '', 1, 1, 0, '2012-05-02 12:41:19'),
(21, 15, 'TAC 09CS/BK', 'tac-09csbk', NULL, '<ul>\r\n	<li>\r\n		Phong cách thi&ecirc;́t k&ecirc;́ ch&acirc;u &Acirc;u với những họa ti&ecirc;́t lạ mắt và ngh&ecirc;̣ thu&acirc;̣t.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t làm lạnh 1HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với máy nén hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		Làm lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		Màn hình LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		Dàn lạnh và dàn nóng v&acirc;̣n hành &ecirc;m ái.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		Phong cách thi&ecirc;́t k&ecirc;́ ch&acirc;u &Acirc;u với những họa ti&ecirc;́t lạ mắt và ngh&ecirc;̣ thu&acirc;̣t.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t làm lạnh 1HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với máy nén hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		Làm lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		Màn hình LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		Dàn lạnh và dàn nóng v&acirc;̣n hành &ecirc;m ái.</li>\r\n	<li>\r\n		Dàn lạnh và dàn nóng được mạ hợp kim cao c&acirc;́p TiO2 giúp ch&ocirc;́ng bám bụi và ăn mòn trong su&ocirc;́t quá trình sử dụng.</li>\r\n	<li>\r\n		Đường k&iacute;nh ống đồng trao đổi nhiệt của d&agrave;n n&oacute;ng si&ecirc;u lớn 9.52mm, giúp quá trình làm lạnh di&ecirc;̃n ra nhanh chóng.</li>\r\n	<li>\r\n		Sử dụng c&ocirc;ng ngh&ecirc;̣ ion &acirc;m di&ecirc;̣t khu&acirc;̉n, bảo v&ecirc;̣ sức khỏe người sử dụng.</li>\r\n	<li>\r\n		Lưới lọc 8 trong 1 lọc bỏ những bụi b&acirc;̉n, vi khu&acirc;̉n trong kh&ocirc;ng khí.</li>\r\n	<li>\r\n		Đặc bi&ecirc;̣t lớp lước lọc tinh ch&acirc;́t trà xanh và Vitamin C giúp khử mùi nhanh chóng, bảo v&ecirc;̣ sức khỏe đặc bi&ecirc;̣t là làn da của người sử dụng.</li>\r\n	<li>\r\n		Đi&ecirc;̀u khi&ecirc;̉n từ xa ti&ecirc;̣n dụng.</li>\r\n</ul>\r\n', '', 9000000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 12:44:12'),
(22, 15, 'TAC 12CS/BK', 'tac-12csbk', NULL, '<ul>\r\n	<li>\r\n		Phong c&aacute;ch thi&ecirc;́t k&ecirc;́ ch&acirc;u &Acirc;u với những họa ti&ecirc;́t lạ mắt v&agrave; ngh&ecirc;̣ thu&acirc;̣t.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 1.5HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>\r\n		Phong c&aacute;ch thi&ecirc;́t k&ecirc;́ ch&acirc;u &Acirc;u với những họa ti&ecirc;́t lạ mắt v&agrave; ngh&ecirc;̣ thu&acirc;̣t.</li>\r\n	<li>\r\n		C&ocirc;ng su&acirc;́t l&agrave;m lạnh 1.5HP.</li>\r\n	<li>\r\n		Tiết kiệm điện đ&ecirc;́n 40% với m&aacute;y n&eacute;n hi&ecirc;̣u su&acirc;́t cao đi&ecirc;̣n năng ti&ecirc;u thụ th&acirc;́p.</li>\r\n	<li>\r\n		L&agrave;m lạnh nhanh hơn với d&agrave;n lạnh lớn 770mm.</li>\r\n	<li>\r\n		M&agrave;n h&igrave;nh LED hi&ecirc;̉n thị th&ocirc;ng s&ocirc;́ nhi&ecirc;̣t đ&ocirc;̣ lớn, d&ecirc;̃ sử dụng.</li>\r\n	<li>\r\n		Tự bảo v&ecirc;̣ ch&ocirc;́ng s&ocirc;́c đi&ecirc;̣n, n&acirc;ng cao tu&ocirc;̉i thọ sử dụng.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng v&acirc;̣n h&agrave;nh &ecirc;m &aacute;i.</li>\r\n	<li>\r\n		D&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng được mạ hợp kim cao c&acirc;́p TiO2 gi&uacute;p ch&ocirc;́ng b&aacute;m bụi v&agrave; ăn m&ograve;n trong su&ocirc;́t qu&aacute; tr&igrave;nh sử dụng.</li>\r\n	<li>\r\n		Đường k&iacute;nh ống đồng trao đổi nhiệt của d&agrave;n n&oacute;ng si&ecirc;u lớn 9.52mm, gi&uacute;p qu&aacute; tr&igrave;nh l&agrave;m lạnh di&ecirc;̃n ra nhanh ch&oacute;ng.</li>\r\n	<li>\r\n		Sử dụng c&ocirc;ng ngh&ecirc;̣ ion &acirc;m di&ecirc;̣t khu&acirc;̉n, bảo v&ecirc;̣ sức khỏe người sử dụng.</li>\r\n	<li>\r\n		Lưới lọc 8 trong 1 lọc bỏ những bụi b&acirc;̉n, vi khu&acirc;̉n trong kh&ocirc;ng kh&iacute;.</li>\r\n	<li>\r\n		Đặc bi&ecirc;̣t lớp lước lọc tinh ch&acirc;́t tr&agrave; xanh v&agrave; Vitamin C gi&uacute;p khử m&ugrave;i nhanh ch&oacute;ng, bảo v&ecirc;̣ sức khỏe đặc bi&ecirc;̣t l&agrave; l&agrave;n da của người sử dụng.</li>\r\n	<li>\r\n		Đi&ecirc;̀u khi&ecirc;̉n từ xa ti&ecirc;̣n dụng.</li>\r\n</ul>\r\n<div>\r\n	&nbsp;</div>\r\n', '', 9500000, NULL, NULL, NULL, 1, '', 0, 1, 0, '2012-05-02 12:46:41');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products_properties`
--


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
  KEY `parentId_idx` (`parent_id`),
  KEY `categoryId_idx` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `properties`
--


-- --------------------------------------------------------

--
-- Table structure for table `rightbanners`
--

DROP TABLE IF EXISTS `rightbanners`;
CREATE TABLE IF NOT EXISTS `rightbanners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'Untitle',
  `url` varchar(255) DEFAULT '#',
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordered` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rightbanners`
--

INSERT INTO `rightbanners` (`id`, `name`, `url`, `photo`, `photo_dir`, `published`, `ordered`, `created`) VALUES
(2, 'ADS #1', '', '220x600.jpg', '2', 1, 0, '2012-04-27 11:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordered` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `url`, `photo`, `photo_dir`, `published`, `ordered`) VALUES
(1, 'First Thumbnail label', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'http://localhost/tclvn/products/detail/tcl-6', '960x340_1.jpg', '1', 1, 1),
(2, 'Second Thumbnail label', 'Media Plugin is too complicated, and it was a PITA to merge the latest updates into MeioUpload, so here I am, building yet another upload plugin. I''ll build another in a month and call it "YAUP".', NULL, '960x340_2.jpg', '2', 1, 0);

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
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `ordered` int(5) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `slug`, `description`, `photo`, `photo_dir`, `published`, `ordered`, `created`, `modified`) VALUES
(1, 'Giới thiệu', 'gioi_thieu', '<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', NULL, NULL, 1, 0, '2012-03-17 11:55:31', '2012-04-19 18:14:15'),
(2, 'Dịch vụ', 'dich_vu', '<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', NULL, NULL, 1, 0, '2012-03-17 12:10:05', '2012-04-12 18:09:50'),
(3, 'Tuyển dụng', 'tuyen_dung', '<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<h3>\r\n	Lorem ipsum</h3>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'tclvn.sql', '3', 1, 0, '2012-04-12 17:21:12', '2012-04-12 18:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `published`) VALUES
(1, 'vukhanhtruong@gmail.com', 1),
(2, 'khanhtruong111@gmail.com', 1),
(3, 'tammuz.vk@gmail.com', 1);

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
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailIDX` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `key`, `status`, `created`, `modified`, `last_login`, `facebook_id`, `oauth_token`, `oauth_secret`, `oauth_provider`, `oauth_uid`) VALUES
(1, 1, NULL, 'phapsu', '047e1e63f7f1b4b8dfc62333b7745ea1cf138c54', 'admin@gmail.com', NULL, NULL, NULL, '4f8c2eec-6008-4c1d-8f06-07bc89179cc6', 1, '2012-03-13 10:38:30', '2012-03-13 10:38:30', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL),
(12, 2, NULL, NULL, '047e1e63f7f1b4b8dfc62333b7745ea1cf138c54', 'admin@phapsu.com', NULL, NULL, NULL, '4f8eeba0-2b08-46b3-8b4f-0b8089179cc6', 0, '2012-04-18 11:41:30', '2012-04-18 18:28:16', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);
