-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2013 at 06:21 PM
-- Server version: 5.5.32-0ubuntu0.13.04.1-log
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `magento1`
--

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
(643, 79, 'admin/reports/', NULL, 0, 'G', 'allow'),
(644, 79, 'admin/reports/customer.php', NULL, 0, 'G', 'allow'),
(645, 79, 'admin/reports/orderreviews.php', NULL, 0, 'G', 'allow'),
(646, 79, 'admin/system/', NULL, 0, 'G', 'allow'),
(647, 79, 'admin/system/permissions.php', NULL, 0, 'G', 'allow'),
(648, 79, 'admin/system/users.php', NULL, 0, 'G', 'allow'),
(649, 79, 'admin/sales/order.php', NULL, 0, 'G', 'allow'),
(650, 79, 'admin/reports/deneme.php', NULL, 0, 'G', 'allow'),
(651, 79, 'admin/system/ayarlar.php', NULL, 0, 'G', 'allow'),
(652, 79, 'admin/records', NULL, 0, 'G', 'allow'),
(653, 79, 'admin/records/123.php', NULL, 0, 'G', 'allow'),
(654, 79, 'admin/records.456.php', NULL, 0, 'G', 'allow');

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
