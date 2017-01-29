-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2014 at 09:47 AM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vedant_vedantgp`
--

-- --------------------------------------------------------

--
-- Table structure for table `axi_agencies`
--

CREATE TABLE IF NOT EXISTS `axi_agencies` (
  `id` char(36) NOT NULL,
  `agency_category_id` char(36) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_phone` varchar(15) DEFAULT NULL,
  `pan_number` varchar(100) NOT NULL,
  `address` varchar(600) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `total` decimal(50,2) NOT NULL DEFAULT '0.00',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `agency_category_id` (`agency_category_id`,`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_agencies`
--

INSERT INTO `axi_agencies` (`id`, `agency_category_id`, `company_name`, `company_phone`, `pan_number`, `address`, `city`, `state`, `country`, `remark`, `total`, `updated_by`, `updated_at`) VALUES
('52f11750-ead4-47b7-877f-48fcc7dffd9b', '52f1139c-ea10-4334-affb-48fcc7dffd9b', 'DILIP LAKHMANI', '9825874731', 'A', 'SAMA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:37:36'),
('52f11798-e138-4464-ba37-48fcc7dffd9b', '52f1139c-ea10-4334-affb-48fcc7dffd9b', 'PRAKASH VELANI', '9825527255', 'A', 'VICENZA MAGNOLIA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:38:48'),
('52f117dc-15d4-4a56-b354-48fcc7dffd9b', '52f1139c-ea10-4334-affb-48fcc7dffd9b', 'KHUMANSINH RATHVA', '9825295891', 'A', 'GOTRI', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:39:56'),
('52f1180b-f8d0-4f44-b3d2-48fcc7dffd9b', '52f113b3-d2e0-496d-a16d-48fcc7dffd9b', 'BHARATBHAI', '9', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:40:43'),
('52f11831-5198-4035-8f45-48fcc7dffd9b', '52f113b3-d2e0-496d-a16d-48fcc7dffd9b', 'VINODBHAI', '9', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:41:21'),
('52f11878-c2c4-48aa-bf28-48fcc7dffd9b', '52f113c9-9d98-491a-974c-48fcc7dffd9b', 'HEMESHBHAI SHAH', '9825741071', 'A', 'MANJALPUR', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:42:32'),
('52f118bc-79c4-48e0-82da-48fcc7dffd9b', '52f113e3-8528-430b-b031-48fcc7dffd9b', 'HIRENBHAI', '9227105655', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:43:40'),
('52f118ff-7184-4931-ac85-48fcc7dffd9b', '52f113e3-8528-430b-b031-48fcc7dffd9b', 'SANJAYBHAI FOR S.S', '9', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:44:47'),
('52f11942-6fd4-4d75-89bc-48fcc7dffd9b', '52f116ac-233c-498f-8a77-48fcc7dffd9b', 'KIRANBHAI (ROSHANI ELECTRIC)', '9427074426', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:45:54'),
('52f11980-1fcc-4135-85f2-48fcc7dffd9b', '52f116c2-78c8-4374-9d89-48fcc7dffd9b', 'HIMANSHUBHAI SHASHTRI', '9925230821', 'A', 'SUBHANPURA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:46:56'),
('52f119b1-5ecc-49e0-85ca-48fcc7dffd9b', '52f116ec-fee4-4b8e-a715-48fcc7dffd9b', 'BABUKHAN01', '9825058901', 'A', 'VADODARA', 'Surat', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:47:45'),
('52f119ce-6f54-4f16-a6cd-48fcc7dffd9b', '52f116ec-fee4-4b8e-a715-48fcc7dffd9b', 'VESTABHAI', '9', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:48:14'),
('52f11a52-88d8-4708-85d9-48fcc7dffd9b', '52f119ea-27a0-4b00-8a8d-48fcc7dffd9b', 'TULSI JANGAD', '9', 'A', 'MANJALPUR', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:50:26'),
('52f11a7d-7c98-4e31-9dd6-48fcc7dffd9b', '52f119ea-27a0-4b00-8a8d-48fcc7dffd9b', 'BABULAL', '9898061845', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:51:09'),
('52f11aad-2510-4ab5-ac4c-48fcc7dffd9b', '52f11a12-d464-4c8a-b4d0-48fcc7dffd9b', 'GAURANG MISTRY', '9725099902', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-04 16:51:57'),
('52f9ba1f-9050-48db-bcbc-3be7c7dffd9b', '52f116ec-fee4-4b8e-a715-48fcc7dffd9b', 'BABA KHAN', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-11 05:50:23'),
('52f9ba73-0690-45b3-af83-3be7c7dffd9b', '52f113c9-9d98-491a-974c-48fcc7dffd9b', 'HAMESH BHAI', '9825741071', 'A', 'CITY', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-11 05:51:47'),
('52f9c90d-82ac-4085-befc-3be7c7dffd9b', '52f113b3-d2e0-496d-a16d-48fcc7dffd9b', 'SURESH BHAI', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '0.00', '', '2014-02-11 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `axi_agency_categories`
--

CREATE TABLE IF NOT EXISTS `axi_agency_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_agency_categories`
--

INSERT INTO `axi_agency_categories` (`id`, `name`, `updated_by`, `updated_at`) VALUES
('52f1139c-ea10-4334-affb-48fcc7dffd9b', 'CIVIL WORK', '', '2014-02-04 16:21:48'),
('52f113b3-d2e0-496d-a16d-48fcc7dffd9b', 'SALAT WORK', '', '2014-02-04 16:22:11'),
('52f113c9-9d98-491a-974c-48fcc7dffd9b', 'PLUMBING WORK', '', '2014-02-04 16:22:33'),
('52f113e3-8528-430b-b031-48fcc7dffd9b', 'FABRICATION WORK', '', '2014-02-04 16:22:59'),
('52f116ac-233c-498f-8a77-48fcc7dffd9b', 'ELECTRIFICATION WORK', '', '2014-02-04 16:34:52'),
('52f116c2-78c8-4374-9d89-48fcc7dffd9b', 'COLOUR WORK', '', '2014-02-04 16:35:14'),
('52f116ec-fee4-4b8e-a715-48fcc7dffd9b', 'WATERPROOFING WORK', '', '2014-02-04 16:35:56'),
('52f119ea-27a0-4b00-8a8d-48fcc7dffd9b', 'CARPANTER WORK', '', '2014-02-04 16:48:42'),
('52f11a12-d464-4c8a-b4d0-48fcc7dffd9b', 'ALUMINIUM WORK', '', '2014-02-04 16:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `axi_agency_invoices`
--

CREATE TABLE IF NOT EXISTS `axi_agency_invoices` (
  `id` char(36) NOT NULL,
  `agency_id` char(36) NOT NULL,
  `material_category_id` char(36) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_value` varchar(250) NOT NULL,
  `item_quantity` int(10) NOT NULL,
  `item_unit_rate` decimal(50,2) NOT NULL,
  `item_total` decimal(50,2) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  KEY `updated_by` (`updated_by`),
  KEY `material_category_id` (`material_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_companies`
--

CREATE TABLE IF NOT EXISTS `axi_companies` (
  `id` char(36) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(600) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'working',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_companies`
--

INSERT INTO `axi_companies` (`id`, `name`, `address`, `city`, `state`, `country`, `remark`, `status`, `updated_by`, `updated_at`) VALUES
('52f090c8-7e74-4398-bed8-6819c7dffd9b', 'SOMNATH ASSOCIATES', 'S.F.,203, GOLDCROFT, JETALPUR ROAD,', 'Vadodara', 'Gujarat', 'India', '', 'working', '', '2014-02-04 07:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `axi_company_contracts`
--

CREATE TABLE IF NOT EXISTS `axi_company_contracts` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `agency_id` char(36) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `path_dir` varchar(255) DEFAULT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`agency_id`,`updated_by`),
  KEY `agency_id` (`agency_id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_company_contracts`
--

INSERT INTO `axi_company_contracts` (`id`, `company_id`, `agency_id`, `remark`, `path`, `path_dir`, `updated_by`, `updated_at`) VALUES
('52f69398-9488-4e42-8f20-18f2c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52f11750-ead4-47b7-877f-48fcc7dffd9b', 'by Actonate', '1619368_524299097667842_1215713953_a.jpg', '52f69398-9488-4e42-8f20-18f2c7dffd9b', '', '2014-02-08 20:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `axi_company_stocks`
--

CREATE TABLE IF NOT EXISTS `axi_company_stocks` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `material_id` char(36) NOT NULL,
  `quantity` decimal(50,2) NOT NULL DEFAULT '0.00',
  `unit_rate` decimal(50,2) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`material_id`,`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_company_users`
--

CREATE TABLE IF NOT EXISTS `axi_company_users` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`updated_by`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_company_users`
--

INSERT INTO `axi_company_users` (`id`, `company_id`, `user_id`, `remark`, `updated_by`, `updated_at`) VALUES
('52f093ac-ad3c-488f-850a-6819c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52f09333-4430-4e90-9025-6819c7dffd9b', '', '', '2014-02-04 07:15:56'),
('52f093b7-fc04-4ca0-bf63-6819c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52ecc7c6-1e78-42ce-82ff-4b86c7dffd9b', '', '', '2014-02-04 07:16:07'),
('52f09608-36a4-4e80-80ce-6819c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52f094e5-0f94-44eb-8d6f-6819c7dffd9b', '', '', '2014-02-04 07:26:00'),
('52f0960f-45e8-4b38-857a-6819c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52f09595-43a0-4e98-95cb-6819c7dffd9b', '', '', '2014-02-04 07:26:07'),
('52f0961a-5b74-4538-97a7-6819c7dffd9b', '52f090c8-7e74-4398-bed8-6819c7dffd9b', '52f095e6-bfe0-4392-bb49-6819c7dffd9b', '', '', '2014-02-04 07:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `axi_contact_people`
--

CREATE TABLE IF NOT EXISTS `axi_contact_people` (
  `id` char(36) NOT NULL,
  `supplier_agency_id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `supplier_agency_id` (`supplier_agency_id`,`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_contact_people`
--

INSERT INTO `axi_contact_people` (`id`, `supplier_agency_id`, `name`, `mobile`, `email`, `type`, `remark`, `updated_by`, `updated_at`) VALUES
('52f11b9b-9fb0-4813-80ec-48fcc7dffd9b', '52f0de4b-e490-4009-95ea-1eabc7dffd9b', 'CHANDRKANTBHAI', '9979234291', 'A@GMAIL.COM', 'supplier', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `axi_homes`
--

CREATE TABLE IF NOT EXISTS `axi_homes` (
  `id` char(36) NOT NULL,
  `invoice_id` char(36) NOT NULL,
  `user1` char(36) DEFAULT NULL,
  `user2` char(36) DEFAULT NULL,
  `user3` char(36) DEFAULT NULL,
  `user4` char(36) DEFAULT NULL,
  `user5` char(36) DEFAULT NULL,
  `is_cleared` varchar(200) DEFAULT NULL,
  `is_completed` int(1) DEFAULT '0',
  `is_invoiced` int(1) DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`,`user1`,`user2`,`user3`,`user4`,`user5`,`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_invoices`
--

CREATE TABLE IF NOT EXISTS `axi_invoices` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `supplier_id` char(36) NOT NULL,
  `invoice_number` int(50) NOT NULL,
  `invoice_date` varchar(50) NOT NULL,
  `net_total` decimal(50,4) NOT NULL,
  `discount` int(2) DEFAULT '0',
  `is_invoiced` int(1) NOT NULL DEFAULT '0',
  `is_payment` int(1) NOT NULL DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`supplier_id`,`updated_by`),
  KEY `supplier_id` (`supplier_id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_invoice_items`
--

CREATE TABLE IF NOT EXISTS `axi_invoice_items` (
  `id` char(36) NOT NULL,
  `invoice_id` char(36) NOT NULL,
  `order_head_id` char(36) NOT NULL,
  `sub_total` decimal(50,4) NOT NULL,
  `net_total` decimal(50,4) NOT NULL,
  `is_invoiced` int(1) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`,`order_head_id`,`updated_by`),
  KEY `order_head_id` (`order_head_id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_materials`
--

CREATE TABLE IF NOT EXISTS `axi_materials` (
  `id` char(36) NOT NULL,
  `material_category_id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `material_category_id` (`material_category_id`,`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_material_categories`
--

CREATE TABLE IF NOT EXISTS `axi_material_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_orders`
--

CREATE TABLE IF NOT EXISTS `axi_orders` (
  `id` char(36) NOT NULL,
  `order_head_id` char(36) NOT NULL,
  `material_id` char(36) NOT NULL,
  `quantity` decimal(50,4) NOT NULL,
  `credit_period` int(5) DEFAULT NULL,
  `rate` decimal(50,4) NOT NULL,
  `carting` decimal(50,2) DEFAULT '0.00',
  `tax` int(25) DEFAULT NULL,
  `subtotal` decimal(50,4) NOT NULL,
  `total` decimal(50,4) NOT NULL,
  `order_type` int(1) NOT NULL DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_head_id` (`order_head_id`,`material_id`,`updated_by`),
  KEY `material_id` (`material_id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_order_heads`
--

CREATE TABLE IF NOT EXISTS `axi_order_heads` (
  `id` char(36) NOT NULL,
  `company_id` char(36) NOT NULL,
  `supplier_id` char(36) NOT NULL,
  `order_number` int(50) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_invoice_number` varchar(100) DEFAULT NULL,
  `total` decimal(50,4) NOT NULL,
  `remark` varchar(600) DEFAULT NULL,
  `order_type` int(1) NOT NULL,
  `is_invoiced` int(1) NOT NULL DEFAULT '0',
  `is_payment` int(1) NOT NULL DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`supplier_id`),
  KEY `updated_by` (`updated_by`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_prices`
--

CREATE TABLE IF NOT EXISTS `axi_prices` (
  `id` char(36) NOT NULL,
  `supplier_id` char(36) NOT NULL,
  `material_id` char(36) NOT NULL,
  `quantity_id` char(36) NOT NULL,
  `quantity` decimal(50,4) NOT NULL,
  `unit_rate` decimal(50,4) NOT NULL,
  `tax` int(2) DEFAULT '0',
  `total_rate` decimal(50,4) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`,`material_id`,`quantity_id`,`updated_by`),
  KEY `material_id` (`material_id`),
  KEY `measure_id` (`quantity_id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_quantities`
--

CREATE TABLE IF NOT EXISTS `axi_quantities` (
  `id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_quantities`
--

INSERT INTO `axi_quantities` (`id`, `name`, `updated_by`, `updated_at`) VALUES
('52f11dcc-0c34-4282-a15c-4fa1c7dffd9b', 'KG.', '', '2014-02-04 17:05:16'),
('52f11de3-bf14-46af-ba8e-4fa1c7dffd9b', 'TONNE', '', '2014-02-04 17:05:39'),
('52f11df5-64c4-4ddf-85aa-4fa1c7dffd9b', 'NO.', '', '2014-02-04 17:05:57'),
('52f11e0a-0428-4d57-83a7-4fa1c7dffd9b', 'SQ. FT.', '', '2014-02-04 17:06:18'),
('52f11e23-7594-4eb2-be6c-4fa1c7dffd9b', 'RN. FT.', '', '2014-02-04 17:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `axi_stocks`
--

CREATE TABLE IF NOT EXISTS `axi_stocks` (
  `id` char(36) NOT NULL,
  `material_id` char(36) NOT NULL,
  `quantity` int(25) NOT NULL DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `axi_suppliers`
--

CREATE TABLE IF NOT EXISTS `axi_suppliers` (
  `id` char(36) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_phone` varchar(200) DEFAULT NULL,
  `pan_number` varchar(200) NOT NULL,
  `address` varchar(600) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_suppliers`
--

INSERT INTO `axi_suppliers` (`id`, `company_name`, `company_phone`, `pan_number`, `address`, `city`, `state`, `country`, `remark`, `updated_by`, `updated_at`) VALUES
('52f0d652-9674-4e5a-9be1-1b12c7dffd9b', 'AKSHAR TRADERS ( DEVESH BHAI)', 'A', 'A', 'SHERKHI', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:00:18'),
('52f0d713-a84c-4dc5-bf22-1b12c7dffd9b', 'DECENT ENGINEER''S ( MILIND BHAI )', 'A', 'A', 'SEVASI', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:03:31'),
('52f0d7d7-be74-45a8-8d69-1b12c7dffd9b', 'DEVYAMI AUTOMATIC PUMPS & CONTROLS PVT.LTD', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:06:47'),
('52f0d93b-a00c-452d-ba32-1eabc7dffd9b', 'GUJRAT OIL MILL STORE SUPPLAYING CO. ( KUNTAL BHAI )', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:12:43'),
('52f0d9ad-9d74-4981-9525-1eabc7dffd9b', 'JAY AMBE COUNSTRITON ( HITENDRA SIGN PARMAR )', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:14:37'),
('52f0da21-8358-4c27-9f43-1eabc7dffd9b', 'NAYAN EARTH MOVERS', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:16:33'),
('52f0da86-c50c-4a32-ba3c-1eabc7dffd9b', 'SHREE MAHALAXMI PEST CONTROL ( GIRISH BHAI)', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:18:14'),
('52f0dadf-f468-4bf0-8b6c-1eabc7dffd9b', 'TRUE VALUE HARDWARE ', 'A', 'A', 'NAWA BAZAR', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:19:43'),
('52f0db28-9fac-47c7-abe8-1eabc7dffd9b', 'VIKRAM R VANZARA ', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:20:56'),
('52f0dbfd-d6ac-4963-82eb-1eabc7dffd9b', 'TECHNO INDUSTRIES LTD', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:24:29'),
('52f0de4b-e490-4009-95ea-1eabc7dffd9b', 'BARODA TUBE CORPORATION ( CHANDRA KANT BHAI )', 'A', 'A', 'A', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 12:34:19'),
('52f11bfa-b570-4874-8b46-48fcc7dffd9b', 'BINANI CEMENT LTD', '9824017870', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 16:57:30'),
('52f11c73-e0e4-42be-b373-48fcc7dffd9b', 'VYOMESH TRADING CO.', '9824054168', 'A', 'VADODARA', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-04 16:59:31'),
('52f9b413-39e4-4d35-8417-3be7c7dffd9b', 'AKASH ENTERPRISES ( MINESH BHAI )', '9879576408', 'A', 'CORPORATE OFFICE NARSHIJI NI POLE', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-11 05:24:35'),
('52f9b493-5e9c-46ff-9566-3be7c7dffd9b', 'VIKRAM ENTERPRISES ( MINESH BHAI )', '9879576408', 'A', 'CORPORATE OFFICE IN CITY', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-11 05:26:43'),
('52f9b98a-7d48-4d57-8150-3be7c7dffd9b', 'RASHMI TRASPORT', '02652481188', 'A', '28, KUWARESHVAR SOC, OPP SANGAM SOC,HARNI RD.', 'Vadodara', 'Gujarat', 'India', '', '', '2014-02-11 05:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `axi_users`
--

CREATE TABLE IF NOT EXISTS `axi_users` (
  `id` char(36) NOT NULL,
  `user_category_id` char(36) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `date_of_birth` varchar(15) DEFAULT NULL,
  `address` varchar(600) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `is_enabled` int(1) NOT NULL DEFAULT '0',
  `updated_by` char(36) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_category_id` (`user_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_users`
--

INSERT INTO `axi_users` (`id`, `user_category_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `date_of_birth`, `address`, `city`, `state`, `country`, `remark`, `is_enabled`, `updated_by`, `updated_at`) VALUES
('52ecc7c6-1e78-42ce-82ff-4b86c7dffd9b', '52deb592-3bac-45db-ad28-0f0cc08111f6', 'SAMALBECHAR', 'DHAVACH1', 'DHAVAL', 'T', 'SAMALBECHAR', '9909016380', '', '', 'KAMALKUNJ', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-01 10:09:10'),
('52f09333-4430-4e90-9025-6819c7dffd9b', '52e23c97-fc2c-4198-b898-1d78c08111f6', 'DARSHIT099', '15042f18066081ba2c1a4cd3fee26d3755b6ef71', 'DARSHIT', 'D', 'SHAH', '9722224809', 'bunty099@gmail.com', '14/05/1985', 'sandalwood', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-04 07:13:55'),
('52f094e5-0f94-44eb-8d6f-6819c7dffd9b', '52dec29c-fc0c-41b9-bc8d-0f0cc08111f6', 'JAIMIN', '12345', 'JAIMIN', 'A', 'JOSHI', '98255580467', 'JJ@GMAIL.COM', '19/01/1967', 'PUSHTI VATIKA', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-04 07:21:09'),
('52f09595-43a0-4e98-95cb-6819c7dffd9b', '52e23c80-f4a8-453e-ac34-1d78c08111f6', 'NARVATSINH', '12345', 'NARVATSINH', 'S', 'PATEL', '9825882285', 'NARVAT@GMAIL.COM', '01/07/1965', 'LAXMIPURA', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-04 07:24:05'),
('52f095e6-bfe0-4392-bb49-6819c7dffd9b', '52e23ca2-94b8-4bf9-9d54-1d78c08111f6', 'MANISH', '12345', 'MANISH', 'I', 'SHAH', '9284174976', 'MANISH@GMAIL.COM', '01/07/1965', 'SEVASI', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-04 07:25:26'),
('52fa03a1-61e0-45eb-af0b-0462c7dffd9b', '52deb592-3bac-45db-ad28-0f0cc08111f6', 'dts@vedantgroup.co', '15042f18066081ba2c1a4cd3fee26d3755b6ef71', 'Dhaval', 't', 's', '9722224809', 'dts@vedantgroup.co', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-11 11:04:01'),
('52fa0639-16a0-4efb-829a-0754c7dffd9b', '52e23c97-fc2c-4198-b898-1d78c08111f6', 'pretik', 'f645a3a7bfdf106ea915f6f854280ee55bb3d6b1', 'pretik', 'p', 'desai', '9722224809', 'dts@vedantgroup.co', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-11 11:15:05'),
('52fa06cd-6f84-45a2-905c-0754c7dffd9b', '52e23c97-fc2c-4198-b898-1d78c08111f6', 'DARSHIT999', '3174e914bebd3acebb5924fa3470ac0629d8c6c4', 'DARSHIT', 'd', 'SHAH', '9722224809', 'bunty099@gmail.com', NULL, 'manjalpur', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-11 11:17:33'),
('52fc79a1-f938-44cd-a7b2-3692c7dffd9b', '52dec29c-fc0c-41b9-bc8d-0f0cc08111f6', 'project', '2c3889e5fa45c8314a8e3f0068f96422f2881829', 'Project Engineer', 'T', 'actonate', '8866662425', 'alpesh_nakrani5@yahoo.com', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-13 07:52:01'),
('52fc79e3-7cb0-476a-8fa5-3692c7dffd9b', '52e23c80-f4a8-453e-ac34-1d78c08111f6', 'store', 'efe89b526f9d9586f9c1eb499237f0e7d095de4f', 'Store Keeper', 'T', 'actonate', '8866662425', 'alpesh_nakrani5@yahoo.com', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-13 07:53:07'),
('52fc7a0c-d878-41c4-af5e-3692c7dffd9b', '52e23c97-fc2c-4198-b898-1d78c08111f6', 'auth', 'f07bd5a6719c3b3f7d4ce51edd446abb98affb07', 'Authorized Sign', 'T', 'actonate', '8866662425', 'alpesh_nakrani5@yahoo.com', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-13 07:53:48'),
('52fc7a2c-7170-4233-a2f3-3692c7dffd9b', '52e23ca2-94b8-4bf9-9d54-1d78c08111f6', 'accountant', '9ffe4097be4b2deaf98f43fbdb46158e981025ac', 'Accountant', 'T', 'actonate', '8866662425', 'alpesh_nakrani5@yahoo.com', NULL, 'baroda', 'Vadodara', 'Gujarat', 'India', '', 0, '', '2014-02-13 07:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `axi_user_categories`
--

CREATE TABLE IF NOT EXISTS `axi_user_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_by` char(36) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axi_user_categories`
--

INSERT INTO `axi_user_categories` (`id`, `name`, `updated_by`, `updated_at`) VALUES
('52deb592-3bac-45db-ad28-0f0cc08111f6', 'Partner', NULL, '2014-01-21 17:59:46'),
('52dec29c-fc0c-41b9-bc8d-0f0cc08111f6', 'Project Engineer', NULL, '2014-01-21 18:55:24'),
('52e23c80-f4a8-453e-ac34-1d78c08111f6', 'Store Keeper', NULL, '2014-01-24 10:12:16'),
('52e23c97-fc2c-4198-b898-1d78c08111f6', 'Authorized Signatory', NULL, '2014-01-24 10:12:39'),
('52e23ca2-94b8-4bf9-9d54-1d78c08111f6', 'Accountant', NULL, '2014-01-24 10:12:50');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `axi_agencies`
--
ALTER TABLE `axi_agencies`
  ADD CONSTRAINT `axi_agencies_ibfk_1` FOREIGN KEY (`agency_category_id`) REFERENCES `axi_agency_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_agency_invoices`
--
ALTER TABLE `axi_agency_invoices`
  ADD CONSTRAINT `axi_agency_invoices_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `axi_agencies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_agency_invoices_ibfk_2` FOREIGN KEY (`material_category_id`) REFERENCES `axi_material_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_agency_invoices_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `axi_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_company_contracts`
--
ALTER TABLE `axi_company_contracts`
  ADD CONSTRAINT `axi_company_contracts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `axi_companies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_company_contracts_ibfk_2` FOREIGN KEY (`agency_id`) REFERENCES `axi_agencies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_company_users`
--
ALTER TABLE `axi_company_users`
  ADD CONSTRAINT `axi_company_users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `axi_companies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_company_users_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `axi_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `axi_invoices`
--
ALTER TABLE `axi_invoices`
  ADD CONSTRAINT `axi_invoices_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `axi_companies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_invoices_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `axi_suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_invoice_items`
--
ALTER TABLE `axi_invoice_items`
  ADD CONSTRAINT `axi_invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `axi_invoices` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_materials`
--
ALTER TABLE `axi_materials`
  ADD CONSTRAINT `axi_materials_ibfk_1` FOREIGN KEY (`material_category_id`) REFERENCES `axi_material_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_orders`
--
ALTER TABLE `axi_orders`
  ADD CONSTRAINT `axi_orders_ibfk_1` FOREIGN KEY (`order_head_id`) REFERENCES `axi_order_heads` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_orders_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `axi_materials` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_order_heads`
--
ALTER TABLE `axi_order_heads`
  ADD CONSTRAINT `axi_order_heads_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `axi_suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_order_heads_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `axi_companies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_prices`
--
ALTER TABLE `axi_prices`
  ADD CONSTRAINT `axi_prices_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `axi_suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_prices_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `axi_materials` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `axi_prices_ibfk_3` FOREIGN KEY (`quantity_id`) REFERENCES `axi_quantities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_stocks`
--
ALTER TABLE `axi_stocks`
  ADD CONSTRAINT `axi_stocks_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `axi_materials` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `axi_users`
--
ALTER TABLE `axi_users`
  ADD CONSTRAINT `axi_users_ibfk_1` FOREIGN KEY (`user_category_id`) REFERENCES `axi_user_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
