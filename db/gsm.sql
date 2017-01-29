-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 07:06 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `add_title` varchar(300) NOT NULL,
  `category` int(5) NOT NULL,
  `subcategory` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `position` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `aid` (`aid`,`add_title`,`category`,`subcategory`,`type`,`position`,`size`,`start_date`,`end_date`,`status`,`created_date`,`modify_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title3` varchar(100) CHARACTER SET utf8 NOT NULL,
  `catid` int(250) NOT NULL,
  `sub_catid` int(250) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8_unicode_ci,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1-Active',
  `created_date` datetime NOT NULL,
  `created_by` int(250) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(250) NOT NULL,
  `rating` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `readcount` mediumint(10) NOT NULL DEFAULT '0',
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reporter_id` int(10) DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` bigint(50) NOT NULL DEFAULT '0',
  `top_story` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gs_top_story` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `news_prio` bigint(50) NOT NULL,
  `magegin_news_prio` bigint(50) NOT NULL,
  `schedule_time` datetime NOT NULL,
  `fb_flag` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= Not Posted, 1 = Posted',
  `sp_pg_flag` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= Not Added, 1 = Added',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`catid`,`sub_catid`),
  KEY `active` (`active`,`created_date`,`created_by`,`modified_date`,`modified_by`),
  KEY `title` (`title`,`title2`,`title3`),
  KEY `priority` (`priority`,`top_story`,`news_prio`,`schedule_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Main Articles Managment Table' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crm_admin_type`
--

CREATE TABLE IF NOT EXISTS `crm_admin_type` (
  `pkTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(15) NOT NULL,
  PRIMARY KEY (`pkTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crm_admin_users`
--

CREATE TABLE IF NOT EXISTS `crm_admin_users` (
  `pkUserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id and primary key ',
  `fkTypeId` int(11) NOT NULL,
  `pkContactId` varchar(50) NOT NULL,
  `UserName` varchar(100) DEFAULT '',
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `islogin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- notlogin, 1-login',
  `CompanyName` varchar(50) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `UserOfficeName` varchar(100) NOT NULL,
  `fkCountryId` varchar(100) NOT NULL,
  `fkStateId` varchar(100) NOT NULL,
  `fkCityId` varchar(100) NOT NULL,
  `MlsID` varchar(100) NOT NULL,
  `MlsBoard` varchar(100) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `ReferenceBy` varchar(20) DEFAULT NULL,
  `Allowed` int(11) NOT NULL COMMENT 'Number of agents allowed to be added by team or broker',
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `Last_Update` int(11) NOT NULL,
  `Status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `Ip` varchar(255) NOT NULL,
  `ActivationKey` text,
  `IdxDbName` varchar(100) NOT NULL,
  `IdxDbPassword` varchar(100) NOT NULL,
  `Deleted` enum('n','y') NOT NULL,
  PRIMARY KEY (`pkUserId`),
  UNIQUE KEY `usr_name` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users table of the sites' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crm_general_config`
--

CREATE TABLE IF NOT EXISTS `crm_general_config` (
  `cfg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cfg_name` varchar(255) NOT NULL,
  `cfg_value` varchar(255) NOT NULL,
  PRIMARY KEY (`cfg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='General config' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `display_banner`
--

CREATE TABLE IF NOT EXISTS `display_banner` (
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diversity_contents`
--

CREATE TABLE IF NOT EXISTS `diversity_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `readcount` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `schedule_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Vishesh Page' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ip_res`
--

CREATE TABLE IF NOT EXISTS `ip_res` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_add` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE IF NOT EXISTS `main_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `internalname` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `content` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_userid` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_userid` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `active` enum('Active','Inactive') CHARACTER SET latin1 DEFAULT 'Active',
  `top_menu` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `url` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tab_seq` int(11) NOT NULL DEFAULT '8',
  `top_seq` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`active`,`top_menu`,`url`,`tab_seq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_keywords` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `readcount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_tracker`
--

CREATE TABLE IF NOT EXISTS `page_tracker` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `page_type` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `count` int(50) NOT NULL DEFAULT '0',
  `article_id` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`page_type`,`url`,`ip_address`,`count`,`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_article`
--

CREATE TABLE IF NOT EXISTS `photo_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1-Active',
  `created_date` datetime NOT NULL,
  `created_by` int(250) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(250) NOT NULL,
  `rating` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `readcount` mediumint(10) NOT NULL DEFAULT '0',
  `source` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule_time` datetime DEFAULT NULL,
  `fb_flag` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= Not Posted, 1 = Posted',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `active` (`active`,`created_date`,`created_by`,`modified_date`,`modified_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Main Articles Managment Table' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_article_media`
--

CREATE TABLE IF NOT EXISTS `photo_article_media` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `fkphoto_article_id` bigint(50) DEFAULT NULL,
  `fkarticle_id` bigint(100) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(100) NOT NULL DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active',
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `special_links`
--

CREATE TABLE IF NOT EXISTS `special_links` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `add_title` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `position` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`aid`),
  KEY `aid` (`aid`,`add_title`,`position`,`size`,`status`,`modify_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0-Inactive, 1-Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(250) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 - Active, 0 - Inactive',
  `content` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_userid` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_userid` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `top_menu` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gal_id` int(11) NOT NULL AUTO_INCREMENT,
  `gal_name` varchar(100) NOT NULL,
  `gal_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `category` int(11) NOT NULL,
  PRIMARY KEY (`gal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `photoname` text NOT NULL,
  `incname` text NOT NULL,
  `created_date` date NOT NULL,
  `created_timestamp` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`gallery_id`,`created_date`,`created_timestamp`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photo_of_the_day`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_photo_of_the_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `photoname` text NOT NULL,
  `incname` text NOT NULL,
  `created_date` date NOT NULL,
  `created_timestamp` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_video_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `videopath` text NOT NULL,
  `thumb_image` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_timestamp` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zip`
--

CREATE TABLE IF NOT EXISTS `tbl_zip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_cat_id` int(11) NOT NULL,
  `zip_sub_catid` int(11) NOT NULL,
  `date` date NOT NULL,
  `zip_name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trending_news`
--

CREATE TABLE IF NOT EXISTS `trending_news` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `page_type` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `count` int(50) NOT NULL DEFAULT '0',
  `article_id` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`page_type`,`url`,`ip_address`,`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pkUserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id and primary key ',
  `UserName` varchar(100) DEFAULT '',
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `islogin` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- notlogin, 1-login',
  `script_flag` tinyint(1) NOT NULL DEFAULT '1',
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`pkUserId`),
  UNIQUE KEY `usr_name` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users table of the sites' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE IF NOT EXISTS `video_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
