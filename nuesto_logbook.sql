-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2012 at 10:39 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nuesto_logbook`
--
USE logbook;
-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-03 20:49:06', 0),
(2, 1, 'Created Module: UserGroup : 127.0.0.1', 'modulebuilder', '2012-01-03 20:51:38', 0),
(3, 1, 'Created Module: MarketingActivity : 127.0.0.1', 'modulebuilder', '2012-01-03 20:52:24', 0),
(4, 1, 'Created Module: ActivityType : 127.0.0.1', 'modulebuilder', '2012-01-03 20:53:39', 0),
(5, 1, 'Deleted Module: ActivityType : 127.0.0.1', 'modulebuilder', '2012-01-03 20:54:17', 0),
(6, 1, 'Deleted Module: MarketingActivityType : 127.0.0.1', 'modulebuilder', '2012-01-03 20:54:57', 0),
(7, 1, 'Created Module: ActivityType : 127.0.0.1', 'modulebuilder', '2012-01-03 20:55:43', 0),
(8, 1, 'Created Module: Justification : 127.0.0.1', 'modulebuilder', '2012-01-03 21:02:39', 0),
(9, 1, 'Created Module: PurchaseRequisition : 127.0.0.1', 'modulebuilder', '2012-01-03 21:14:49', 0),
(10, 1, 'Created Module: PurchaseOrder : 127.0.0.1', 'modulebuilder', '2012-01-03 21:22:46', 0),
(11, 1, 'Created Module: Invoice : 127.0.0.1', 'modulebuilder', '2012-01-03 21:31:21', 0),
(12, 1, 'Migrate Type: justification_ Uninstalled Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:53:14', 0),
(13, 1, 'Migrate Type: justification_ Uninstalled Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:53:46', 0),
(14, 1, 'Migrate Type: justification_ Uninstalled Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:54:51', 0),
(15, 1, 'Migrate Type: justification_ Uninstalled Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:55:47', 0),
(16, 1, 'Migrate Type: justification_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:56:59', 0),
(17, 1, 'Migrate Type: justification_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-01-03 21:57:19', 0),
(18, 1, 'Migrate Type: justification_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 21:57:32', 0),
(19, 1, 'Migrate Type: purchaserequisition_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 22:02:09', 0),
(20, 1, 'Migrate Type: purchaseorder_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 22:10:47', 0),
(21, 1, 'Migrate Type: invoice_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-03 22:13:18', 0),
(22, 1, 'Created record with ID: 1 : 127.0.0.1', 'usergroup', '2012-01-03 22:34:47', 0),
(23, 1, 'Created record with ID: 1 : 127.0.0.1', 'marketingactivity', '2012-01-03 22:54:43', 0),
(24, 1, 'Created record with ID: 1 : 127.0.0.1', 'activitytype', '2012-01-03 22:54:57', 0),
(25, 1, 'Created record with ID: 2 : 127.0.0.1', 'activitytype', '2012-01-03 22:55:04', 0),
(26, 1, 'Created record with ID: 1 : 127.0.0.1', 'justification', '2012-01-03 23:04:42', 0),
(27, 1, 'Updated record with ID: 1 : 127.0.0.1', 'justification', '2012-01-03 23:33:31', 0),
(28, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-04 01:00:20', 0),
(29, 1, 'Created record with ID: 1 : 127.0.0.1', 'purchaserequisition', '2012-01-04 11:24:41', 0),
(30, 1, 'Created record with ID: 2 : 127.0.0.1', 'justification', '2012-01-04 23:32:31', 0),
(31, 1, 'Created record with ID: 2 : 127.0.0.1', 'purchaserequisition', '2012-01-04 23:34:22', 0),
(32, 1, 'Created record with ID: 1 : 127.0.0.1', 'purchaseorder', '2012-01-04 23:36:00', 0),
(33, 1, 'Created record with ID: 2 : 127.0.0.1', 'invoice', '2012-01-05 08:34:21', 0),
(34, 1, 'Deleted record with ID: 1 : 127.0.0.1', 'invoice', '2012-01-05 08:40:42', 0),
(35, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-01-05 08:41:16', 0),
(36, 1, 'Created Module: MarketingLogbook : 127.0.0.1', 'modulebuilder', '2012-01-05 10:15:21', 0),
(37, 1, 'Created record with ID: 3 : 127.0.0.1', 'invoice', '2012-01-05 12:33:15', 0),
(38, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-01-05 22:27:46', 0),
(39, 1, 'created a new Administrator:  ', 'users', '2012-01-05 22:34:13', 0),
(40, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-05 22:34:38', 0),
(41, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-05 22:37:16', 0),
(42, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 04:51:04', 0),
(43, 1, 'created a new Editor:  ', 'users', '2012-01-06 05:28:50', 0),
(44, 1, 'created a new User:  ', 'users', '2012-01-06 05:29:17', 0),
(45, 1, 'modified user: Super User', 'users', '2012-01-06 05:29:36', 0),
(46, 3, 'logged in from: 127.0.0.1', 'users', '2012-01-06 05:31:14', 0),
(47, 4, 'logged in from: 127.0.0.1', 'users', '2012-01-06 05:43:41', 0),
(48, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 05:52:34', 0),
(49, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 06:00:31', 0),
(50, 3, 'logged in from: 127.0.0.1', 'users', '2012-01-06 06:04:07', 0),
(51, 4, 'logged in from: 127.0.0.1', 'users', '2012-01-06 06:04:39', 0),
(52, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 06:17:00', 0),
(53, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 10:27:30', 0),
(54, 2, 'Created record with ID: 2 : 127.0.0.1', 'usergroup', '2012-01-06 10:28:32', 0),
(55, 2, 'Created record with ID: 2 : 127.0.0.1', 'marketingactivity', '2012-01-06 10:28:52', 0),
(56, 2, 'Updated record with ID: 1 : 127.0.0.1', 'activitytype', '2012-01-06 10:29:31', 0),
(57, 2, 'Created record with ID: 3 : 127.0.0.1', 'usergroup', '2012-01-06 10:35:47', 0),
(58, 2, 'Created record with ID: 3 : 127.0.0.1', 'marketingactivity', '2012-01-06 10:36:28', 0),
(59, 2, 'Created record with ID: 3 : 127.0.0.1', 'activitytype', '2012-01-06 10:38:15', 0),
(60, 2, 'Created record with ID: 3 : 127.0.0.1', 'justification', '2012-01-06 10:39:56', 0),
(61, 2, 'Created record with ID: 3 : 127.0.0.1', 'purchaserequisition', '2012-01-06 10:44:08', 0),
(62, 2, 'Created record with ID: 2 : 127.0.0.1', 'purchaseorder', '2012-01-06 10:45:28', 0),
(63, 2, 'Created record with ID: 4 : 127.0.0.1', 'invoice', '2012-01-06 10:48:24', 0),
(64, 3, 'logged in from: 127.0.0.1', 'users', '2012-01-06 11:03:45', 0),
(65, 4, 'logged in from: 127.0.0.1', 'users', '2012-01-06 11:04:34', 0),
(66, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 19:25:52', 0),
(67, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-06 19:27:52', 0),
(68, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-06 21:04:27', 0),
(69, 1, 'Migrate Type: purchaserequisition_ to Version: 4 from: 127.0.0.1', 'migrations', '2012-01-06 21:04:46', 0),
(70, 1, 'Updated record with ID: 3 : 127.0.0.1', 'purchaserequisition', '2012-01-06 21:05:12', 0),
(71, 1, 'Updated record with ID: 3 : 127.0.0.1', 'justification', '2012-01-06 21:20:00', 0),
(72, 1, 'Migrate Type: justification_ to Version: 4 from: 127.0.0.1', 'migrations', '2012-01-06 21:31:43', 0),
(73, 1, 'Migrate Type: justification_ to Version: 3 from: 127.0.0.1', 'migrations', '2012-01-06 21:32:19', 0),
(74, 1, 'Migrate Type: navigation_ to Version: 1 from: 127.0.0.1', 'migrations', '2012-01-06 21:42:00', 0),
(75, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-07 06:06:59', 0),
(76, 1, 'Migrate Type: navigation_ Uninstalled Version: 0 from: 127.0.0.1', 'migrations', '2012-01-07 08:56:09', 0),
(77, 4, 'logged in from: 127.0.0.1', 'users', '2012-01-07 09:22:01', 0),
(78, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 09:52:15', 0),
(79, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 10:12:57', 0),
(80, 3, 'logged in from: 127.0.0.1', 'users', '2012-01-07 10:16:45', 0),
(81, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 16:02:44', 0),
(82, 2, 'App settings saved from: 127.0.0.1', 'core', '2012-01-07 16:04:47', 0),
(83, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-07 16:17:00', 0),
(84, 1, 'Deleted record with ID: 3 : 127.0.0.1', 'justification', '2012-01-07 17:17:43', 0),
(85, 1, 'Deleted record with ID: 2 : 127.0.0.1', 'justification', '2012-01-07 17:20:01', 0),
(86, 1, 'Deleted record with ID: 3 : 127.0.0.1', 'purchaserequisition', '2012-01-07 17:32:15', 0),
(87, 1, 'Updated record with ID: 3 : 127.0.0.1', 'justification', '2012-01-07 18:03:21', 0),
(88, 1, 'Deleted record with ID: 3 : 127.0.0.1', 'activitytype', '2012-01-07 18:03:31', 0),
(89, 1, 'Created record with ID: 4 : 127.0.0.1', 'activitytype', '2012-01-07 18:03:55', 0),
(90, 1, 'Deleted record with ID: 1 : 127.0.0.1', 'purchaseorder', '2012-01-07 18:07:31', 0),
(91, 1, 'Deleted record with ID: 1 : 127.0.0.1', 'purchaseorder', '2012-01-07 18:08:23', 0),
(92, 1, 'Updated record with ID: 4 : 127.0.0.1', 'invoice', '2012-01-07 18:08:34', 0),
(93, 1, 'Deleted record with ID: 4 : 127.0.0.1', 'invoice', '2012-01-07 18:08:38', 0),
(94, 1, 'Deleted record with ID: 4 : 127.0.0.1', 'invoice', '2012-01-07 18:09:23', 0),
(95, 1, 'Deleted record with ID: 3 : 127.0.0.1', 'purchaserequisition', '2012-01-07 18:09:54', 0),
(96, 1, 'Deleted record with ID: 1 : 127.0.0.1', 'justification', '2012-01-07 18:10:05', 0),
(97, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 20:21:33', 0),
(98, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-07 20:22:11', 0),
(99, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 20:23:01', 0),
(100, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-07 21:25:32', 0),
(101, 2, 'modified user: Site Administrator', 'users', '2012-01-07 21:36:52', 0),
(102, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-07 22:08:11', 0),
(103, 1, 'logged in from: 127.0.0.1', 'users', '2012-01-08 05:52:09', 0),
(104, 1, 'development : Database settings were successfully saved', 'database', '2012-01-08 05:53:54', 0),
(105, 2, 'logged in from: 127.0.0.1', 'users', '2012-01-10 10:09:01', 0),
(106, 2, 'Created record with ID: 4 : 127.0.0.1', 'justification', '2012-01-10 10:14:47', 0),
(107, 2, 'Created record with ID: 4 : 127.0.0.1', 'purchaserequisition', '2012-01-10 10:16:19', 0),
(108, 2, 'Created record with ID: 3 : 127.0.0.1', 'purchaseorder', '2012-01-10 10:17:38', 0),
(109, 2, 'Created record with ID: 5 : 127.0.0.1', 'invoice', '2012-01-10 10:19:11', 0),
(110, 2, 'App settings saved from: 127.0.0.1', 'core', '2012-01-10 10:27:11', 0),
(111, 2, 'created a new Administrator: Site Administrator', 'users', '2012-01-10 10:33:14', 0),
(112, 5, 'logged in from: 127.0.0.1', 'users', '2012-01-10 10:33:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activitytype`
--

CREATE TABLE IF NOT EXISTS `activitytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activitytype_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `activitytype`
--

INSERT INTO `activitytype` (`id`, `activitytype_name`) VALUES
(1, 'Digital'),
(2, 'Media Cetak'),
(4, 'New Media');

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `email_queue`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_bast_date` date NOT NULL,
  `invoice_received_oracle_date` date NOT NULL,
  `invoice_received_amount` bigint(11) NOT NULL,
  `invoice_remark_po` enum('Open','Close') NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_received_date` date NOT NULL,
  `invoice_amount` bigint(11) NOT NULL,
  `invoice_sign_manager_date` date NOT NULL,
  `invoice_complete_1_date` date NOT NULL,
  `invoice_sign_vp_date` date NOT NULL,
  `invoice_complete_2_date` date NOT NULL,
  `invoice_submit_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_bast_date`, `invoice_received_oracle_date`, `invoice_received_amount`, `invoice_remark_po`, `invoice_number`, `invoice_received_date`, `invoice_amount`, `invoice_sign_manager_date`, `invoice_complete_1_date`, `invoice_sign_vp_date`, `invoice_complete_2_date`, `invoice_submit_date`) VALUES
(3, '2011-02-24', '2011-02-25', 341630000, 'Open', 'MC1100309/1', '2011-02-24', 325000000, '2011-02-28', '2011-02-28', '2011-02-28', '2011-02-02', '2011-02-02'),
(2, '2011-02-21', '2011-02-21', 341630000, 'Open', 'MC1100282/1', '2011-02-21', 341630000, '2011-02-21', '2011-02-21', '2011-02-21', '2011-02-23', '2011-02-23'),
(4, '2012-02-02', '2012-02-04', 78000000, 'Close', 'FP.TSL.000201', '2012-02-02', 780000000, '2012-02-03', '2012-02-03', '2012-02-03', '2012-02-03', '2012-02-06'),
(5, '2012-01-31', '2012-01-31', 550000000, 'Close', 'FM.TSL.1100000', '2012-01-31', 550000000, '2012-01-31', '2012-01-31', '2012-01-31', '2012-01-31', '2012-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `justification`
--

CREATE TABLE IF NOT EXISTS `justification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `justification_approval_date` date NOT NULL,
  `justification_description` text NOT NULL,
  `justification_amount` bigint(11) NOT NULL,
  `justification_number` varchar(255) NOT NULL,
  `justification_creation_date` date NOT NULL,
  `usergroup_id` int(11) NOT NULL,
  `marketingactivity_id` int(11) NOT NULL,
  `activitytype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `justification`
--

INSERT INTO `justification` (`id`, `justification_approval_date`, `justification_description`, `justification_amount`, `justification_number`, `justification_creation_date`, `usergroup_id`, `marketingactivity_id`, `activitytype_id`) VALUES
(1, '2011-01-20', 'Palcement Sponsorship Program Glee Global TV Periode Desember 2010 - Januari 2011', 550000000, '037/MK.01/SMP/XII/10', '2011-01-20', 1, 1, 2),
(2, '2011-01-20', 'Placement Paket Sponsorship Total Film simPATIzone Friday Movie Mania 2011 Periode Januari 2011', 256000000, '002/MK.01/SMP/I/11 ', '2011-01-20', 1, 1, 1),
(3, '2012-01-25', 'Spnsorship Andra Asmasoebrata Periode Februari 2011', 800000000, '9056', '2012-01-10', 3, 3, 0),
(4, '2012-01-10', 'Pemasangan iklan simpati di koran kompas periode Jan 2012', 550000000, '131425', '2012-01-10', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `marketingactivity`
--

CREATE TABLE IF NOT EXISTS `marketingactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketingactivity_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `marketingactivity`
--

INSERT INTO `marketingactivity` (`id`, `marketingactivity_name`) VALUES
(1, 'Placement'),
(2, 'Production'),
(3, 'sponsorship');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(1, 'Site.Signin.Allow', 'Allow users to login to the site', 'active'),
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Permissions.Settings.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Permissions.Settings.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Root.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(23, 'Permissions.Banned.Manage', 'To manage the access control permissions for the Banned role.', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(26, 'Bonfire.Activities.Manage', 'Allow users to access the Activities Reports', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'UserGroup.Settings.View', '', 'active'),
(36, 'UserGroup.Settings.Create', '', 'active'),
(37, 'UserGroup.Settings.Edit', '', 'active'),
(38, 'UserGroup.Settings.Delete', '', 'active'),
(39, 'MarketingActivity.Settings.View', '', 'active'),
(40, 'MarketingActivity.Settings.Create', '', 'active'),
(41, 'MarketingActivity.Settings.Edit', '', 'active'),
(42, 'MarketingActivity.Settings.Delete', '', 'active'),
(55, 'Justification.Content.View', '', 'active'),
(54, 'ActivityType.Settings.Delete', '', 'active'),
(53, 'ActivityType.Settings.Edit', '', 'active'),
(51, 'ActivityType.Settings.View', '', 'active'),
(52, 'ActivityType.Settings.Create', '', 'active'),
(57, 'Justification.Content.Edit', '', 'active'),
(56, 'Justification.Content.Create', '', 'active'),
(58, 'Justification.Content.Delete', '', 'active'),
(59, 'PurchaseRequisition.Content.View', '', 'active'),
(60, 'PurchaseRequisition.Content.Create', '', 'active'),
(61, 'PurchaseRequisition.Content.Edit', '', 'active'),
(62, 'PurchaseRequisition.Content.Delete', '', 'active'),
(63, 'PurchaseOrder.Content.View', '', 'active'),
(64, 'PurchaseOrder.Content.Create', '', 'active'),
(65, 'PurchaseOrder.Content.Edit', '', 'active'),
(66, 'PurchaseOrder.Content.Delete', '', 'active'),
(67, 'Invoice.Content.View', '', 'active'),
(68, 'Invoice.Content.Create', '', 'active'),
(69, 'Invoice.Content.Edit', '', 'active'),
(70, 'Invoice.Content.Delete', '', 'active'),
(71, 'MarketingLogbook.Reports.View', '', 'active'),
(72, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(73, 'Settings.Settings.Manage', 'Allow user to manage site settings', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseorder_number` varchar(255) NOT NULL,
  `purchaseorder_received_date` date NOT NULL,
  `purchaseorder_promised_date` date NOT NULL,
  `purchaseorder_amount` bigint(11) NOT NULL,
  `purchaseorder_submit_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`id`, `purchaseorder_number`, `purchaseorder_received_date`, `purchaseorder_promised_date`, `purchaseorder_amount`, `purchaseorder_submit_date`) VALUES
(1, 'HOP110046', '2011-02-16', '2011-03-01', 650000000, '2011-02-16'),
(2, 'HOP111781', '2012-01-31', '2012-01-31', 780000000, '2012-01-31'),
(3, 'HOP11425', '2012-01-22', '2012-01-22', 550000000, '2012-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder_invoice`
--

CREATE TABLE IF NOT EXISTS `purchaseorder_invoice` (
  `purchaseorder_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  PRIMARY KEY (`purchaseorder_id`,`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaseorder_invoice`
--

INSERT INTO `purchaseorder_invoice` (`purchaseorder_id`, `invoice_id`) VALUES
(1, 2),
(1, 3),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchaserequisition`
--

CREATE TABLE IF NOT EXISTS `purchaserequisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaserequisition_number` varchar(255) NOT NULL,
  `purchaserequisition_vendor` varchar(255) NOT NULL,
  `purchaserequisition_job_number` varchar(255) NOT NULL,
  `purchaserequisition_creation_date` date NOT NULL,
  `purchaserequisition_start_circulation_date` date NOT NULL,
  `purchaserequisition_approve_manager_date` date NOT NULL,
  `purchaserequisition_approve_vp_date` date NOT NULL,
  `purchaserequisition_complete_circulation_date` date NOT NULL,
  `purchaserequisition_submit_proc_date` date NOT NULL,
  `justification_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `purchaserequisition`
--

INSERT INTO `purchaserequisition` (`id`, `purchaserequisition_number`, `purchaserequisition_vendor`, `purchaserequisition_job_number`, `purchaserequisition_creation_date`, `purchaserequisition_start_circulation_date`, `purchaserequisition_approve_manager_date`, `purchaserequisition_approve_vp_date`, `purchaserequisition_complete_circulation_date`, `purchaserequisition_submit_proc_date`, `justification_id`) VALUES
(1, '111331', 'PT Wira Pamungkas Pariwara (Mediaedge;cia)', '2010120578', '2011-01-21', '2011-01-21', '2011-01-21', '2011-01-21', '2011-01-24', '2011-01-24', 1),
(2, '111333', 'PT Wira Pamungkas Pariwara (Mediaedge;cia)', '2011010211', '2011-01-21', '2011-01-21', '2011-01-21', '2011-01-21', '2011-01-26', '2011-01-26', 2),
(3, '115719', 'PT hakuhodo Indonesia', 'TSL-1100000', '2012-01-25', '2012-01-26', '2012-01-26', '2012-01-26', '2012-01-26', '2012-01-26', 3),
(4, '142525', 'PT Advisindo', 'FM.TSL.11111000', '2012-01-10', '2012-01-10', '2012-01-10', '2012-01-11', '2012-01-12', '2012-01-12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `purchaserequisition_purchaseorder`
--

CREATE TABLE IF NOT EXISTS `purchaserequisition_purchaseorder` (
  `purchaserequisition_id` int(11) NOT NULL,
  `purchaseorder_id` int(11) NOT NULL,
  PRIMARY KEY (`purchaserequisition_id`,`purchaseorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaserequisition_purchaseorder`
--

INSERT INTO `purchaserequisition_purchaseorder` (`purchaserequisition_id`, `purchaseorder_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`) VALUES
(1, 'Root', 'Has full control over every aspect of the site.', 0, 0, '', 0),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0),
(3, 'Banned', 'Banned users are not allowed to sign into your site.', 0, 0, '', 0),
(4, 'User', 'This is the default user with access to login.', 0, 0, '', 0),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0),
(7, 'Administrator', 'Has full control of the application', 1, 1, 'admin/reports', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE IF NOT EXISTS `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(2, 1),
(2, 2),
(2, 3),
(2, 55),
(2, 56),
(2, 57),
(2, 59),
(2, 60),
(2, 61),
(2, 63),
(2, 64),
(2, 65),
(2, 67),
(2, 68),
(2, 69),
(2, 71),
(4, 1),
(4, 3),
(4, 71),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 7),
(7, 8),
(7, 9),
(7, 22),
(7, 24),
(7, 35),
(7, 36),
(7, 37),
(7, 39),
(7, 40),
(7, 41),
(7, 51),
(7, 52),
(7, 53),
(7, 55),
(7, 56),
(7, 57),
(7, 59),
(7, 60),
(7, 61),
(7, 63),
(7, 64),
(7, 65),
(7, 67),
(7, 68),
(7, 69),
(7, 71),
(7, 72),
(7, 73);

-- --------------------------------------------------------

--
-- Table structure for table `schema_version`
--

CREATE TABLE IF NOT EXISTS `schema_version` (
  `type` varchar(20) NOT NULL,
  `version` int(4) DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schema_version`
--

INSERT INTO `schema_version` (`type`, `version`) VALUES
('core', 14),
('app_', 14),
('usergroup_', 2),
('marketingactivity_', 2),
('activitytype_', 2),
('justification_', 3),
('purchaserequisition_', 4),
('purchaseorder_', 3),
('invoice_', 3),
('marketinglogbook_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schema_version_old`
--

CREATE TABLE IF NOT EXISTS `schema_version_old` (
  `version` int(4) DEFAULT '0',
  `app_version` int(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schema_version_old`
--

INSERT INTO `schema_version_old` (`version`, `app_version`) VALUES
(11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `unique - name` (`name`),
  KEY `index - name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `module`, `value`) VALUES
('site.title', 'core', 'Marketing Administration Tool'),
('site.system_email', 'core', 'root@site.name'),
('site.status', 'core', '1'),
('site.list_limit', 'core', '25'),
('site.show_profiler', 'core', '0'),
('site.show_front_profiler', 'core', '0'),
('updates.do_check', 'core', '0'),
('updates.bleeding_edge', 'core', '0'),
('auth.allow_register', 'core', '0'),
('auth.login_type', 'core', 'username'),
('auth.use_usernames', 'core', '1'),
('auth.allow_remember', 'core', '1'),
('auth.use_own_names', 'core', '1'),
('auth.remember_length', 'core', '1209600'),
('auth.do_login_redirect', 'core', '1'),
('auth.use_extended_profile', 'core', '0'),
('sender_email', 'email', ''),
('protocol', 'email', 'mail'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('smtp_host', 'email', ''),
('smtp_user', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', '');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `usergroup_name`) VALUES
(1, 'SimPATI'),
(2, 'Kartu As'),
(3, 'VAS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` varchar(40) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `salt` varchar(7) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `street_1` varchar(255) DEFAULT NULL,
  `street_2` varchar(255) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `reset_by` int(10) DEFAULT NULL,
  `country_iso` char(2) DEFAULT 'US',
  `state_code` char(4) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `username`, `password_hash`, `reset_hash`, `salt`, `last_login`, `last_ip`, `created_on`, `street_1`, `street_2`, `city`, `zipcode`, `deleted`, `reset_by`, `country_iso`, `state_code`) VALUES
(1, 1, 'Super', 'User', 'root@site.name', 'root', 'b2748ce50caabaa88318b3aa91403484ca7048d7', NULL, 'lVCCWKY', '2012-01-08 05:52:09', '127.0.0.1', '0000-00-00 00:00:00', '', '', '', '', 0, NULL, 'US', 'MO'),
(2, 7, 'Site', 'Administrator', 'admin@site.name', 'admin', 'aa4169cec2d1b64b372605781711bfe319821ce9', NULL, 'gr03GtW', '2012-01-10 10:09:01', '127.0.0.1', '2012-01-05 22:34:13', '', '', '', '', 0, NULL, 'US', 'MO'),
(3, 2, 'Site', 'Editor', 'editor@site.name', 'editor', '961200705e6baaa4d23726274ffa7e2a7311b4cf', NULL, 'WMkDsHf', '2012-01-07 10:16:45', '127.0.0.1', '2012-01-06 05:28:50', '', '', '', NULL, 0, NULL, 'US', 'MO'),
(4, 4, 'Site', 'User', 'user@site.name', 'user', '4b10207f2d3dc192c9e654e8384768591ce3cad3', NULL, 'hJ6WFQw', '2012-01-07 09:22:01', '127.0.0.1', '2012-01-06 05:29:17', '', '', '', NULL, 0, NULL, 'US', 'MO'),
(5, 7, 'hanny', 'fa', 'hannyfa@gmail.com', 'hanny', 'f0ee12d2bd646b971f4f079debd81e1d0ae164f8', NULL, 'maPcTJj', '2012-01-10 10:33:33', '127.0.0.1', '2012-01-10 10:33:14', '', '', '', NULL, 0, NULL, 'US', 'MO');

-- --------------------------------------------------------

--
-- Table structure for table `user_cookies`
--

CREATE TABLE IF NOT EXISTS `user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cookies`
--

INSERT INTO `user_cookies` (`user_id`, `token`, `created_on`) VALUES
(1, 'Crlxabbg7uCyVdVJ87DlXaetixzwAeQTEw7SvCpWGbkgoYKzMhKIM3oijoq0V1SQEh81Dx5mXuHy4hgEixLCkueq39l1JXn4tKnnbyKBfkgLZ6u0fZpwnmmENTiDE84f', '2012-01-05 22:34:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
