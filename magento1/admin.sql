-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2013 at 07:15 PM
-- Server version: 5.5.32-0ubuntu0.13.04.1-log
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE IF NOT EXISTS `admin_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Role ID',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Parent Role ID',
  `tree_level` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Role Tree Level',
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Role Sort Order',
  `role_type` varchar(1) NOT NULL DEFAULT '0' COMMENT 'Role Type',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'User ID',
  `role_name` varchar(50) DEFAULT NULL COMMENT 'Role Name',
  PRIMARY KEY (`role_id`),
  KEY `IDX_ADMIN_ROLE_PARENT_ID_SORT_ORDER` (`parent_id`,`sort_order`),
  KEY `IDX_ADMIN_ROLE_TREE_LEVEL` (`tree_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Admin Role Table' AUTO_INCREMENT=91 ;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`role_id`, `parent_id`, `tree_level`, `sort_order`, `role_type`, `user_id`, `role_name`) VALUES
(77, 1, 2, 0, 'U', 57, 'niyazi'),
(78, 1, 2, 0, 'U', 56, 'obulloteam'),
(79, 0, 1, 0, 'G', 0, 'roleoffati'),
(80, 79, 2, 0, 'U', 59, 'cloud'),
(81, 79, 2, 0, 'U', 56, 'obulloteam'),
(82, 0, 1, 0, 'G', 0, 'roleofobullo'),
(83, 82, 2, 0, 'U', 57, 'niyazi'),
(84, 82, 2, 0, 'U', 60, 'burki'),
(85, 0, 1, 0, 'G', 0, 'rolemol'),
(86, 85, 2, 0, 'U', 60, 'burki'),
(87, 79, 2, 0, 'U', 1, 'fatih'),
(88, 0, 1, 0, 'G', 0, 'editors'),
(89, 88, 2, 0, 'U', 57, 'niyazi'),
(90, 82, 2, 0, 'U', 59, 'cloud');

-- --------------------------------------------------------

--
-- Table structure for table `admin_rule`
--

CREATE TABLE IF NOT EXISTS `admin_rule` (
  `rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Rule ID',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Role ID',
  `resource_id` varchar(255) DEFAULT NULL COMMENT 'Resource ID',
  `privileges` varchar(20) DEFAULT NULL COMMENT 'Privileges',
  `assert_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Assert ID',
  `role_type` varchar(1) DEFAULT NULL COMMENT 'Role Type',
  `permission` varchar(10) DEFAULT NULL COMMENT 'Permission',
  PRIMARY KEY (`rule_id`),
  KEY `IDX_ADMIN_RULE_RESOURCE_ID_ROLE_ID` (`resource_id`,`role_id`),
  KEY `IDX_ADMIN_RULE_ROLE_ID_RESOURCE_ID` (`role_id`,`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Admin Rule Table' AUTO_INCREMENT=655 ;

--
-- Dumping data for table `admin_rule`
--

INSERT INTO `admin_rule` (`rule_id`, `role_id`, `resource_id`, `privileges`, `assert_id`, `role_type`, `permission`) VALUES
(639, 79, 'admin', NULL, 0, 'G', 'allow'),
(640, 79, 'admin/sales/', NULL, 0, 'G', 'allow'),
(641, 79, 'admin/sales/products.php', NULL, 0, 'G', 'allow'),
(642, 79, 'admin/sales/discounts.php', NULL, 0, 'G', 'allow'),
(643, 79, 'admin/sales/order.php', NULL, 0, 'G', 'allow'),
(644, 79, 'admin/reports/', NULL, 0, 'G', 'allow'),
(645, 79, 'admin/reports/orderreviews.php', NULL, 0, 'G', 'allow'),
(646, 79, 'admin/reports/sailing.php', NULL, 0, 'G', 'allow'),
(647, 79, 'admin/reports/staff.php', NULL, 0, 'G', 'allow'),
(648, 79, 'admin/system/', NULL, 0, 'G', 'allow'),
(649, 79, 'admin/system/permissions.php', NULL, 0, 'G', 'allow'),
(650, 79, 'admin/system/users.php', NULL, 0, 'G', 'allow'),
(651, 79, 'admin/system/ayarlar.php', NULL, 0, 'G', 'allow'),
(652, 79, 'admin/records/', NULL, 0, 'G', 'deny'),
(653, 79, 'admin/records/123.php', NULL, 0, 'G', 'deny'),
(654, 79, 'admin/records/456.php', NULL, 0, 'G', 'deny');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `firstname` varchar(32) DEFAULT NULL COMMENT 'User First Name',
  `lastname` varchar(32) DEFAULT NULL COMMENT 'User Last Name',
  `email` varchar(128) DEFAULT NULL COMMENT 'User Email',
  `username` varchar(40) DEFAULT NULL COMMENT 'User Login',
  `password` varchar(40) DEFAULT NULL COMMENT 'User Password',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'User Created Time',
  `modified` timestamp NULL DEFAULT NULL COMMENT 'User Modified Time',
  `logdate` timestamp NULL DEFAULT NULL COMMENT 'User Last Login Time',
  `lognum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'User Login Number',
  `reload_acl_flag` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Reload ACL',
  `is_active` smallint(6) NOT NULL DEFAULT '1' COMMENT 'User Is Active',
  `extra` text COMMENT 'User Extra Data',
  `rp_token` text COMMENT 'Reset Password Link Token',
  `rp_token_created_at` timestamp NULL DEFAULT NULL COMMENT 'Reset Password Link Token Creation Date',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNQ_ADMIN_USER_USERNAME` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Admin User Table' AUTO_INCREMENT=61 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `created`, `modified`, `logdate`, `lognum`, `reload_acl_flag`, `is_active`, `extra`, `rp_token`, `rp_token_created_at`) VALUES
(1, 'fatih', 'bulut', 'fatihbulut1991@gmail.com', 'fatih', 'aa5a4e7ebf89cf919ad96d565190231e', '2013-09-11 11:54:04', '2013-09-10 07:08:26', '2013-09-10 09:06:08', 5, 0, 1, 'a:1:{s:11:"configState";a:4:{s:15:"general_country";s:1:"1";s:14:"general_region";s:1:"1";s:14:"general_locale";s:1:"1";s:25:"general_store_information";s:1:"0";}}', NULL, NULL),
(56, 'ersin', 'burak', 'aaaa', 'obulloteam', '202cb962ac59075b964b07152d234b70', '2013-09-17 21:00:00', '2013-09-17 21:00:00', '2013-09-17 21:00:00', 1, 0, 1, NULL, NULL, NULL),
(57, 'aaa', 'bbb', 'aaa', 'niyazi', '698d51a19d8a121ce581499d7b701668', '2013-09-17 21:00:00', '2013-09-17 21:00:00', '2013-09-17 21:00:00', 1, 0, 1, NULL, NULL, NULL),
(59, 'bulut', 'fati', 'aaa@bb.com', 'cloud', '698d51a19d8a121ce581499d7b701668', '2013-09-18 21:00:00', '2013-09-18 21:00:00', '2013-09-18 21:00:00', 1, 0, 1, NULL, NULL, NULL),
(60, 'naber', 'olm', 'sanane@amk.com', 'burki', '202cb962ac59075b964b07152d234b70', '2013-09-18 21:00:00', '2013-09-18 21:00:00', '2013-09-18 21:00:00', 1, 0, 1, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_rule`
--
ALTER TABLE `admin_rule`
  ADD CONSTRAINT `FK_ADMIN_RULE_ROLE_ID_ADMIN_ROLE_ROLE_ID` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
