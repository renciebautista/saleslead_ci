-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 12:24 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saleslead`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4cbcaee50334473f123d2071d1ec2abf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; rv:31.0) Gecko/20100101 Firefox/31.0', 1408360326, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:25:"rencie.bautista@yahoo.com";s:7:"user_id";s:1:"3";s:5:"admin";b:0;s:5:"group";a:1:{i:2;s:3:"BDO";}s:10:"privileges";a:0:{}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"93ec0bf8aa00074c4c7c428724debe76cdb4381d";}}'),
('54bfb3370169c8af44a1a66b7919d337', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; rv:31.0) Gecko/20100101 Firefox/31.0', 1408102255, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:25:"rencie.bautista@yahoo.com";s:7:"user_id";s:1:"3";s:5:"admin";b:0;s:5:"group";a:1:{i:2;s:3:"BDO";}s:10:"privileges";a:0:{}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"5663b340c80759419f69fbd1578c2e880d053ea6";}}');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(2, 'SYSTEM1'),
(3, 'SAMPLE'),
(7, 'MARKETING'),
(9, 'ASDAS'),
(10, 'SALES');

-- --------------------------------------------------------

--
-- Table structure for table `grouptypes`
--

CREATE TABLE IF NOT EXISTS `grouptypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grouptype_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `grouptypes`
--

INSERT INTO `grouptypes` (`id`, `grouptype_desc`) VALUES
(1, 'DEVELOPER'),
(2, 'GENERAL CONTRACTOR'),
(3, 'PROJECT MANAGER'),
(4, 'PROJECT DESIGNER'),
(5, 'ARCHITECT'),
(6, 'APPLICATOR'),
(7, 'DEALER'),
(8, 'SUPPLIER');

-- --------------------------------------------------------

--
-- Table structure for table `prjcategories`
--

CREATE TABLE IF NOT EXISTS `prjcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjcategory_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `prjcategories`
--

INSERT INTO `prjcategories` (`id`, `prjcategory_desc`) VALUES
(1, 'HIGH-RISE BUILDING (11 FLOOR ABOVE)'),
(2, 'MEDIUM-RISE BUILDING (4-10 FLOORS)'),
(3, 'COMMERCIAL BUILDING'),
(4, 'RESIDENTIAL (SINGLE DETACHED-BUNGALOW TO 3 FLOORS)'),
(5, 'TOWN HOUSE'),
(6, 'HOUSING (MASS HOUSING)'),
(7, 'INSTITUTIONAL'),
(8, 'INDUSTRIAL / WAREHOUSE'),
(9, 'GOVERNMENT'),
(10, 'FACILITIES');

-- --------------------------------------------------------

--
-- Table structure for table `prjclassifications`
--

CREATE TABLE IF NOT EXISTS `prjclassifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjclassification_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prjclassifications`
--

INSERT INTO `prjclassifications` (`id`, `prjclassification_desc`) VALUES
(1, 'NEW CONTRUCTION'),
(2, 'REPAINTING');

-- --------------------------------------------------------

--
-- Table structure for table `prjstages`
--

CREATE TABLE IF NOT EXISTS `prjstages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjstage_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prjstages`
--

INSERT INTO `prjstages` (`id`, `prjstage_desc`) VALUES
(1, 'DESIGN & DOCUMENTATION'),
(2, 'BIDDING'),
(3, 'CONSTRUCTION');

-- --------------------------------------------------------

--
-- Table structure for table `prjstatuses`
--

CREATE TABLE IF NOT EXISTS `prjstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjstatus_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prjstatuses`
--

INSERT INTO `prjstatuses` (`id`, `prjstatus_desc`) VALUES
(1, 'AWARDED'),
(2, 'PAINTING STARTED'),
(3, 'LOST');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(2, 3, 'daldea@yahoo.com', 'donato', '$2a$08$tdBqVZceRX9Wi2y933H/nurJ2UyObGkdoaxD7NPurdc54VtbHkP1a', '127.0.0.1', '2VXTyfdbH8', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-08-14 11:53:16', '2014-08-14 11:49:07'),
(3, 2, 'rencie.bautista@yahoo.com', 'rencie', '$2a$08$ar.tq59G9wkEUOLSJzeG8OKo4VUvh5w9M/dJYDFpfI9G94MsHfDnS', '127.0.0.1', 'tPWtHYH7Bk', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-08-18 13:12:28', '2014-08-14 11:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uacc_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `uacc_id`, `first_name`, `middle_name`, `last_name`, `emp_id`, `department_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Donato', 'Javid', 'Aldea', '4545645', 7, 1, '2014-08-14 11:49:07', '2014-08-14 11:49:07'),
(2, 3, 'rencie', 'agbin', 'bautista', '4107m', 7, 1, '2014-08-14 11:53:47', '2014-08-14 11:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'ADMIN', '', 0),
(2, 'BDO', '', 0),
(3, 'SUPERVISOR', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_sessions`
--

CREATE TABLE IF NOT EXISTS `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_sessions`
--

INSERT INTO `user_login_sessions` (`usess_uacc_fk`, `usess_series`, `usess_token`, `usess_login_date`) VALUES
(3, '', '5663b340c80759419f69fbd1578c2e880d053ea6', '2014-08-15 13:33:48'),
(3, '', '93ec0bf8aa00074c4c7c428724debe76cdb4381d', '2014-08-18 13:15:10'),
(1, '', 'bb13793060631ede862b9c8be95ff74be746262a', '2014-08-14 11:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_groups`
--

CREATE TABLE IF NOT EXISTS `user_privilege_groups` (
  `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_users`
--

CREATE TABLE IF NOT EXISTS `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
