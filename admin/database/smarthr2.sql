-- --------------------------------------------------------
-- Host:                         67.23.254.53
-- Server version:               10.3.23-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table alphacor_smarthr2.assets
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assetName` varchar(200) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `PurchaseFrom` varchar(200) NOT NULL,
  `Manufacturer` varchar(200) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Status` int(10) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `AssetCondition` varchar(255) NOT NULL,
  `Warranty` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `AssetUser` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.assets: ~0 rows (approximately)
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` (`id`, `assetName`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `AssetUser`, `Description`, `DateTime`) VALUES
	(1, 'Macbook Book', '2020-09-23', 'Amazon', 'Apple Inc.', '2020', 1, 'Amazon', 'In good shape', '12 Months', 1900, 'Mushe abdul-Hakim', 'This is the description of the laptop', '2020-09-23 23:57:26');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_bank_name` varchar(50) NOT NULL DEFAULT '',
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.bank: ~17 rows (approximately)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` (`f_id`, `f_bank_name`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Maybank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'CIMB Bank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'RHB Bank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Public Bank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Citibank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Hong Leong Bank Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'Ambank Malaysia Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'Alliance bank Malaysia Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'Affin Bank', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'HSBC Bank (M) Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'Bank Islam Malaysia Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'Agro Bank', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'UOB Bank', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'Bank Muamalat Malaysia Berhad', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'Standard Chartered Malaysia', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'OCBC Bank', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'Bank Rakyat', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.bank_slip
CREATE TABLE IF NOT EXISTS `bank_slip` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) NOT NULL DEFAULT '0',
  `f_bank` varchar(50) NOT NULL,
  `f_bank_branch` varchar(50) NOT NULL,
  `f_bank_acc` varchar(50) NOT NULL,
  `f_salary` decimal(20,2) NOT NULL DEFAULT 0.00,
  `f_epf` varchar(50) DEFAULT NULL,
  `f_epf_num` decimal(20,2) DEFAULT NULL,
  `f_socso` varchar(50) DEFAULT NULL,
  `f_socso_num` decimal(20,2) DEFAULT NULL,
  `f_tax` varchar(50) DEFAULT NULL,
  `f_tax_num` decimal(20,2) DEFAULT NULL,
  `f_eis` varchar(50) DEFAULT NULL,
  `f_eis_num` decimal(20,2) DEFAULT NULL,
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.bank_slip: ~7 rows (approximately)
/*!40000 ALTER TABLE `bank_slip` DISABLE KEYS */;
INSERT INTO `bank_slip` (`f_id`, `f_emp_id`, `f_bank`, `f_bank_branch`, `f_bank_acc`, `f_salary`, `f_epf`, `f_epf_num`, `f_socso`, `f_socso_num`, `f_tax`, `f_tax_num`, `f_eis`, `f_eis_num`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1001', '1', 'Kepong', '514141665347', 4200.00, '5454165', 378.00, '41564648908', 21.00, 'SG40026997102', NULL, '45614632', 8.40, '2022-03-04 16:36:30', '2022-04-13 18:31:00'),
	(2, 'PBB1006', '3', 'Setia Alam', '661', 3300.00, '2131', 297.00, '213', 16.50, '123', NULL, '123', 6.60, '2022-04-07 13:19:26', '2022-04-14 11:23:01'),
	(3, 'PBB1002', '15', 'Klang', '789456123012', 4200.00, '5454165', 378.00, '4156464', 21.00, 'SG4000976899', NULL, '456465465', 8.40, '2022-04-07 15:23:39', '2022-04-13 18:07:38'),
	(4, 'PBC1018', '4', 'Kepong', '6910358532', 12213.00, '21805584', 1099.17, '960101086500', 61.07, '25403018010', NULL, '960101086500', 24.43, '2022-04-08 13:57:48', '2022-04-14 11:28:50'),
	(5, 'PBC1001', '5', 'Shah Alam', '514141665347', 50000.00, '5454165', 4500.00, '4156464', 250.00, 'SG40026997100', NULL, '68468464', 100.00, '2022-04-11 16:39:07', '2022-04-14 11:37:57'),
	(6, 'PBC1020', '2', '8465468468', '68465468486', 10000.00, '940806141235', 900.00, '8811967', 50.00, 'SG14042022', NULL, '86464864', 20.00, '2022-04-14 10:03:46', '2022-04-14 11:30:12'),
	(7, 'PBD1001', '2', '8465468468', '68465468486', 4000.00, '780987', 360.00, '8979087', 20.00, '6846848646', NULL, '8709879', 8.00, '2022-04-14 12:03:40', '2022-04-14 12:06:16');
/*!40000 ALTER TABLE `bank_slip` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.claims
CREATE TABLE IF NOT EXISTS `claims` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) DEFAULT NULL,
  `f_claim_type` varchar(50) DEFAULT NULL,
  `f_claim_info` varchar(50) DEFAULT NULL,
  `f_claim_month` varchar(50) DEFAULT NULL,
  `f_status` varchar(50) DEFAULT NULL,
  `f_claim_amt` decimal(20,2) DEFAULT NULL,
  `f_claim_date` varchar(50) DEFAULT NULL,
  `f_remarks` varchar(50) DEFAULT NULL,
  `f_review1` varchar(50) DEFAULT NULL,
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.claims: ~7 rows (approximately)
/*!40000 ALTER TABLE `claims` DISABLE KEYS */;
INSERT INTO `claims` (`f_id`, `f_emp_id`, `f_claim_type`, `f_claim_info`, `f_claim_month`, `f_status`, `f_claim_amt`, `f_claim_date`, `f_remarks`, `f_review1`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1002', '3', 'testing2', 'March', 'checked', 100.00, '2022-04-06', 'Rejected', 'PBB1001', '2022-04-12 15:49:30', '2022-04-13 18:45:54'),
	(2, 'PBB1002', '1', 'testing1', 'March', 'Rejected', 100.00, '2022-04-06', 'Rejected', 'PBB1001', '2022-04-12 15:49:31', '2022-04-12 17:18:42'),
	(3, 'Nur Syaffa Husna Binti Zainal Hatiff', '2', 'fff', 'March', 'Pending', 50.00, '2022-12-06', NULL, NULL, '2022-04-13 14:38:08', '2022-04-13 14:38:08'),
	(4, 'Ethan', '6', 'Facebook Advertisement', 'March', 'Pending', 110.00, '2022-03-14', NULL, NULL, '2022-04-14 10:21:42', '2022-04-14 10:21:42'),
	(5, 'Ethan', '3', 'Proptech Membership Fee', 'March', 'Pending', 200.00, '2022-04-18', NULL, NULL, '2022-04-14 10:21:42', '2022-04-14 10:21:42'),
	(6, 'Foo Fung Zhi', '2', 'testing1', 'March', 'Pending', 10.00, '2022-04-07', NULL, NULL, '2022-04-14 10:48:20', '2022-04-14 10:48:20'),
	(7, 'Foo Fung Zhi', '4', 'testing1', 'March', 'Pending', 10.00, '2022-04-08', NULL, NULL, '2022-04-14 10:49:58', '2022-04-14 10:49:58'),
	(8, 'PBB1002', '2', 'testing1', 'March', 'checked', 10.00, '2022-04-01', NULL, 'PBB1001', '2022-04-14 10:55:10', '2022-04-14 12:51:38'),
	(9, 'PBB1006', '1', 'parking', 'March', 'Rejected', 10.00, '2022-04-13', 'Rejected', 'PBB1001', '2022-04-14 13:49:51', '2022-04-14 13:54:53');
/*!40000 ALTER TABLE `claims` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.claim_type
CREATE TABLE IF NOT EXISTS `claim_type` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_claim_type` varchar(50) NOT NULL DEFAULT '0',
  `f_max_claim` varchar(50) NOT NULL DEFAULT '0',
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.claim_type: ~6 rows (approximately)
/*!40000 ALTER TABLE `claim_type` DISABLE KEYS */;
INSERT INTO `claim_type` (`f_id`, `f_claim_type`, `f_max_claim`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Parking Fees', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Toll Fees', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Entertainment', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Public Transport', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Medical ', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Others', '0', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `claim_type` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Picture` varchar(225) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Phone`, `Company`, `Address`, `Status`, `Picture`, `date`) VALUES
	(1, 'Yahuza', 'Abdul-Hakim', 'Vendetta', 'musheabdulhakim@protonmail.ch', '$2y$10$xU1zDRigag7ZMGs0Egcqoei0SrtZJRX/p425h4qOi5OMKFz32k0UC', '233209229025', 'Microsoft Inc', 'Live from home', 1, 'd41d8cd98f00b204e9800998ecf8427e1601112041', '2020-09-26'),
	(2, 'Vendetta', 'Alkaline', 'alkaline', 'musheabdulhakim99@gmail.com', '$2y$10$qUL2APr762X.vvJuNQvqludvabDa.Y3TRHOa.M/qq8WFoeoh7IaWG', '233209229025', 'Falcon Systems', 'Live from home', 1, 'd41d8cd98f00b204e9800998ecf8427e1601112339', '2020-09-26');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_department` varchar(200) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE,
  UNIQUE KEY `Department` (`f_department`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.departments: ~17 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`f_id`, `f_department`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Management ', 'N', '0000-00-00 00:00:00', '2020-09-26 00:00:00'),
	(2, 'Software / IT Department', 'N', '0000-00-00 00:00:00', '2020-09-26 00:00:00'),
	(3, 'Project Department ', 'Y', '0000-00-00 00:00:00', '2022-04-13 10:32:18'),
	(4, 'Business Development & Marketing Department', 'N', '0000-00-00 00:00:00', '2021-12-29 11:47:21'),
	(5, 'Human Resource & Finance Department', 'N', '0000-00-00 00:00:00', '2021-12-29 11:47:48'),
	(6, 'Testing Department', 'Y', '0000-00-00 00:00:00', '2022-04-08 14:33:44'),
	(8, 'Testing2 Department', 'Y', '0000-00-00 00:00:00', '2022-04-08 14:33:54'),
	(9, 'cleaning', 'Y', '0000-00-00 00:00:00', '2022-04-08 14:36:28'),
	(10, 'testttt', 'Y', '0000-00-00 00:00:00', '2022-04-08 14:36:20'),
	(23, 'Testing Department 3', 'Y', '0000-00-00 00:00:00', '2022-04-08 14:36:34'),
	(24, 'delete', 'Y', '0000-00-00 00:00:00', '2022-04-08 13:07:05'),
	(25, 'testind dep', 'Y', '2022-04-08 12:49:09', '2022-04-08 13:07:54'),
	(26, '', 'Y', '2022-04-08 14:32:42', '2022-04-08 15:02:12'),
	(29, 'Marketing Department 2', 'Y', '2022-04-08 15:04:15', '2022-04-08 15:05:47'),
	(30, 'Cleaning Derpartment', 'Y', '2022-04-08 15:59:03', '2022-04-08 15:59:24'),
	(31, 'Cleaning Department', 'N', '2022-04-08 16:01:14', '2022-04-08 16:01:14'),
	(36, 'Bla Bla Department', 'Y', '2022-04-13 10:32:03', '2022-04-13 10:32:26');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.designations
CREATE TABLE IF NOT EXISTS `designations` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_position` varchar(255) NOT NULL,
  `f_department` int(11) NOT NULL DEFAULT 0,
  `f_user_level` varchar(50) NOT NULL,
  `f_post_code` varchar(50) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.designations: ~28 rows (approximately)
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` (`f_id`, `f_position`, `f_department`, `f_user_level`, `f_post_code`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Chief Executive Officer \n', 1, 'Admin', 'E', 'N', '2020-09-27 00:00:00', '2022-04-07 05:53:32'),
	(2, 'Chief of Project Management & Operations', 2, 'User', 'D1', 'N', '2020-09-27 00:00:00', '2022-04-07 05:53:32'),
	(3, 'Chief of Business Development & Marketing ', 3, 'User', 'D1', 'N', '2021-12-29 11:48:44', '2022-04-07 05:53:32'),
	(4, 'Senior Software Developer', 2, 'User', 'B2', 'N', '2021-12-29 11:50:05', '2022-04-07 05:53:32'),
	(5, 'Software Developer (Fullstack)', 2, 'User', 'B1', 'N', '2021-12-29 11:52:20', '2022-04-07 05:53:32'),
	(6, 'Senior UI/UX & Creative Designer', 2, 'User', 'B1', 'N', '2021-12-29 11:52:28', '2022-04-07 05:53:32'),
	(7, 'Software & UI/UX Developer', 2, 'User', 'B1', 'N', '2021-12-29 11:53:05', '2022-04-07 05:53:32'),
	(8, 'Mobile Application Developer Cum System Engineer', 2, 'User', 'B1', 'N', '2021-12-29 11:53:36', '2022-04-07 05:53:32'),
	(9, 'Product & Marketing Manager', 3, 'User', 'C1', 'N', '2021-12-29 11:54:02', '2022-04-07 05:53:32'),
	(10, 'Project Management (Government)', 3, 'User', 'B1', 'N', '2022-01-04 12:57:46', '2022-04-07 05:53:32'),
	(11, 'Project Management Executive', 3, 'User', 'B1', 'N', '2022-01-04 12:58:17', '2022-04-07 05:53:32'),
	(12, 'Senior Digital Marketing & Social Media Executive', 4, 'User', 'B1', 'N', '2022-01-04 12:58:30', '2022-04-07 05:53:32'),
	(13, 'Digital Marketing & Social Media Executive', 4, 'User', 'B1', 'N', '2022-01-04 12:58:42', '2022-04-07 05:53:32'),
	(14, 'Digital Marketing Assistant ', 4, 'User', 'B1', 'N', '2022-01-04 12:59:09', '2022-04-07 05:53:32'),
	(15, 'Human Resource & Admin Manager', 5, 'Admin', 'C1', 'N', '2022-01-04 12:59:23', '2022-04-07 05:53:32'),
	(16, 'Finance & Account Manager', 5, 'User', 'C1', 'N', '2022-01-04 12:59:41', '2022-04-07 05:53:32'),
	(17, 'Human Resource Assistant ', 5, 'User', 'B1', 'N', '2022-01-10 09:50:25', '2022-04-07 05:53:32'),
	(18, 'Finance Clerk', 5, 'User', 'A', 'N', '2022-01-10 09:50:44', '2022-04-07 05:53:32'),
	(19, 'Admin Clerk', 5, 'User', 'A', 'N', '2022-01-10 09:50:51', '2022-04-07 05:53:32'),
	(20, 'HR test', 5, 'User', 'C3', 'N', '2022-01-26 15:36:27', '2022-04-07 05:53:32'),
	(21, 'HR new', 5, 'User', 'BB', 'Y', '2022-03-04 17:26:06', '2022-04-08 14:39:42'),
	(22, 'sdaf', 3, '', 'asfaf', 'N', '2022-04-07 14:59:49', '2022-04-07 05:53:32'),
	(23, 'sdaf', 3, '', 'asfaf', 'N', '2022-04-07 14:59:52', '2022-04-07 05:53:32'),
	(24, 'delete soon', 10, '', 'delele', 'Y', '2022-04-07 14:59:56', '2022-04-08 10:09:59'),
	(25, 'blablabla', 9, '', 'banana', 'Y', '2022-04-07 14:59:59', '2022-04-08 14:38:53'),
	(26, 'sdaf', 3, '', 'asfaf', 'N', '2022-04-07 15:00:03', '2022-04-07 05:53:32'),
	(27, 'sdaf', 3, '', 'asfaf', 'N', '2022-04-07 15:00:06', '2022-04-07 05:53:32'),
	(28, 'testing4', 2, '', 'TD4', 'N', '2022-04-07 17:04:44', '2022-04-07 05:53:32'),
	(29, 'kanwnoiawnr', 5, '', 'www', 'N', '2022-04-08 12:02:10', '2022-04-08 12:02:10'),
	(30, 'Cleaner', 9, '', 'c1', 'Y', '2022-04-08 14:39:27', '2022-04-13 10:32:44'),
	(31, 'Director', 1, '', 'BM244', 'N', '2022-04-13 10:33:13', '2022-04-13 10:33:13');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.education_background
CREATE TABLE IF NOT EXISTS `education_background` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) DEFAULT NULL,
  `f_company1` varchar(50) DEFAULT NULL,
  `f_position1` varchar(50) DEFAULT NULL,
  `f_year_exp1` varchar(50) DEFAULT NULL,
  `f_salary1` decimal(20,2) DEFAULT NULL,
  `f_company2` varchar(50) DEFAULT NULL,
  `f_position2` varchar(50) DEFAULT NULL,
  `f_year_exp2` varchar(50) DEFAULT NULL,
  `f_salary2` decimal(20,2) DEFAULT NULL,
  `f_company3` varchar(50) DEFAULT NULL,
  `f_position3` varchar(50) DEFAULT NULL,
  `f_year_exp3` varchar(50) DEFAULT NULL,
  `f_salary3` decimal(20,2) DEFAULT NULL,
  `f_study_type1` varchar(50) DEFAULT NULL,
  `f_school_name1` varchar(255) DEFAULT NULL,
  `f_course1` varchar(255) DEFAULT NULL,
  `f_grad_year1` varchar(50) DEFAULT NULL,
  `f_result1` varchar(50) DEFAULT NULL,
  `f_study_type2` varchar(50) DEFAULT NULL,
  `f_school_name2` varchar(255) DEFAULT NULL,
  `f_course2` varchar(255) DEFAULT NULL,
  `f_grad_year2` varchar(50) DEFAULT NULL,
  `f_result2` varchar(50) DEFAULT NULL,
  `f_study_type3` varchar(50) DEFAULT NULL,
  `f_school_name3` varchar(255) DEFAULT NULL,
  `f_course3` varchar(255) DEFAULT NULL,
  `f_grad_year3` varchar(50) DEFAULT NULL,
  `f_result3` varchar(50) DEFAULT NULL,
  `f_skill1` varchar(50) DEFAULT NULL,
  `f_skill_exp1` varchar(50) DEFAULT NULL,
  `f_skill2` varchar(50) DEFAULT NULL,
  `f_skill_exp2` varchar(50) DEFAULT NULL,
  `f_skill3` varchar(50) DEFAULT NULL,
  `f_skill_exp3` varchar(50) DEFAULT NULL,
  `f_skill4` varchar(50) DEFAULT NULL,
  `f_skill_exp4` varchar(50) DEFAULT NULL,
  `f_skill5` varchar(50) DEFAULT NULL,
  `f_skill_exp5` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.education_background: ~8 rows (approximately)
/*!40000 ALTER TABLE `education_background` DISABLE KEYS */;
INSERT INTO `education_background` (`f_id`, `f_emp_id`, `f_company1`, `f_position1`, `f_year_exp1`, `f_salary1`, `f_company2`, `f_position2`, `f_year_exp2`, `f_salary2`, `f_company3`, `f_position3`, `f_year_exp3`, `f_salary3`, `f_study_type1`, `f_school_name1`, `f_course1`, `f_grad_year1`, `f_result1`, `f_study_type2`, `f_school_name2`, `f_course2`, `f_grad_year2`, `f_result2`, `f_study_type3`, `f_school_name3`, `f_course3`, `f_grad_year3`, `f_result3`, `f_skill1`, `f_skill_exp1`, `f_skill2`, `f_skill_exp2`, `f_skill3`, `f_skill_exp3`, `f_skill4`, `f_skill_exp4`, `f_skill5`, `f_skill_exp5`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1001', 'The Nielsen Company Sdn Bhd', 'Data Processing Specialist', '2', 3200.00, 'Trade Sdn Bhd', 'Java Developer', '0.3', 4000.00, 'name', 'post', '1', 10000.00, '3', 'Asia Pacific University', 'Bsc(Hons)IT Specialised in Business Information System', '2018', '3.0', '3', 'Kolej Polytech Mara', 'Dip', '2011', '3A', NULL, NULL, NULL, NULL, NULL, 'PHP Laravel', '2', 'HTML CSS Javascript', '2', 'SQL database', '4', NULL, NULL, NULL, NULL, 'N', '2022-03-04 16:36:29', '2022-04-14 13:26:31'),
	(2, 'PBB1005', 'top glove', 'web developer', '1', 1300.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-07 13:16:18', '2022-04-07 13:16:18'),
	(3, 'PBB1006', 'top glove', 'web developer', '1', 1300.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'UTM', 'Bioinformatics', '2022', '3.56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'php', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-07 13:19:19', '2022-04-07 13:19:24'),
	(4, 'PBB1002', '', '', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select Study Type', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-07 15:23:31', '2022-04-07 15:23:36'),
	(5, 'PBC1018', '', '', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select Study Type', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-08 13:57:25', '2022-04-08 13:57:26'),
	(6, 'PBC1001', '', '', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select Study Type', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-11 16:38:58', '2022-04-11 16:39:04'),
	(7, 'PBC1020', 'Maxis Berhad', 'Chief of Branding', '15', 1.00, 'Celcom Axiata', 'Chief of Marketing', '5', 2.00, NULL, NULL, NULL, NULL, '1', 'SMK Yaacob Latiff', 'STPM', '2000', 'Gred 1', '2', 'Informatics College', 'Computer Studies', '2017', 'CGPA 4.0', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-14 10:03:36', '2022-04-14 10:11:58'),
	(8, 'PBD1001', '', '', '', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select Study Type', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '2022-04-14 12:02:54', '2022-04-14 12:02:55');
/*!40000 ALTER TABLE `education_background` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) NOT NULL,
  `f_username` varchar(255) DEFAULT NULL,
  `f_full_name` varchar(100) NOT NULL,
  `f_contact` varchar(20) NOT NULL,
  `f_emp_status` varchar(20) NOT NULL,
  `f_home_tel` varchar(20) NOT NULL,
  `f_address` varchar(255) NOT NULL DEFAULT '0',
  `f_cor_address` varchar(255) NOT NULL DEFAULT '0',
  `f_email` varchar(100) NOT NULL,
  `f_birth_date` varchar(50) NOT NULL DEFAULT '',
  `f_gender` varchar(50) NOT NULL DEFAULT '',
  `f_country` varchar(20) NOT NULL,
  `f_identity` varchar(50) NOT NULL DEFAULT '0',
  `f_identity_img` varchar(50) NOT NULL,
  `f_race` varchar(50) NOT NULL,
  `f_religion` varchar(50) NOT NULL,
  `f_permit_from` varchar(50) NOT NULL DEFAULT '',
  `f_permit_to` varchar(50) NOT NULL DEFAULT 'current_timestamp()',
  `f_marital` int(11) NOT NULL DEFAULT 0,
  `f_spouse` varchar(50) NOT NULL,
  `f_children` int(11) NOT NULL DEFAULT 0,
  `f_ec1_name` varchar(255) NOT NULL DEFAULT '0',
  `f_ec1_relationship` varchar(50) NOT NULL DEFAULT '0',
  `f_ec1_contact` varchar(50) NOT NULL DEFAULT '0',
  `f_ec2_name` varchar(255) NOT NULL DEFAULT '0',
  `f_ec2_relationship` varchar(50) NOT NULL DEFAULT '0',
  `f_ec2_contact` varchar(50) NOT NULL DEFAULT '0',
  `f_picture` varchar(200) NOT NULL,
  `f_permit_picture` varchar(200) NOT NULL,
  `f_resume` varchar(200) NOT NULL,
  `f_com_email` varchar(100) NOT NULL,
  `f_mobile_all` decimal(20,2) NOT NULL DEFAULT 0.00,
  `f_park_all` decimal(20,2) NOT NULL DEFAULT 0.00,
  `f_department` int(11) NOT NULL DEFAULT 0,
  `f_designation` int(11) NOT NULL DEFAULT 0,
  `f_password` varchar(255) NOT NULL,
  `f_join_date` varchar(50) NOT NULL DEFAULT 'current_timestamp()',
  `f_user_level` varchar(50) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE,
  UNIQUE KEY `Employee_Id` (`f_emp_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.employees: ~8 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`f_id`, `f_emp_id`, `f_username`, `f_full_name`, `f_contact`, `f_emp_status`, `f_home_tel`, `f_address`, `f_cor_address`, `f_email`, `f_birth_date`, `f_gender`, `f_country`, `f_identity`, `f_identity_img`, `f_race`, `f_religion`, `f_permit_from`, `f_permit_to`, `f_marital`, `f_spouse`, `f_children`, `f_ec1_name`, `f_ec1_relationship`, `f_ec1_contact`, `f_ec2_name`, `f_ec2_relationship`, `f_ec2_contact`, `f_picture`, `f_permit_picture`, `f_resume`, `f_com_email`, `f_mobile_all`, `f_park_all`, `f_department`, `f_designation`, `f_password`, `f_join_date`, `f_user_level`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1001', NULL, 'Human Resource &amp; Admin Manager', '147450996', '1', '2948203948', 'No. 28, Jalan Pengkalan Baru, 34900 Pantai Remis, Perak', 'No. 28, Jalan Pengkalan Baru, 34900 Pantai Remis, Perak', 'tiekahmiera6996@gmail.com', '1996-01-01', 'Female', 'Malaysia', '960101086500', 'passport_PBB1001.pdf', 'Malay', 'Islam', '', '', 1, 'none', 0, 'Rosseli', 'Father', '0175178700', 'Mariam', 'Mother', '0125492750', '1649844402.jpg', 'none', '', 'hr@alphacoretech.net', 80.00, 100.00, 5, 15, '1234567', '2021-10-11', 'Admin', 'N', '2022-03-04 16:36:30', '2022-04-14 13:25:08'),
	(2, 'PBB1006', 'SYAFFA', 'Nur Syaffa Husna Binti Zainal Hatiff', '0164327495', '1', '332256445', 'Setia Alam, shah alam', 'Setia Alam, shah alam', 'nrsyaana98@gmail.com', '1998-06-15', 'Female', 'Malaysia', '980615106220', 'PBB1006-personal.pdf', 'Malay', 'Muslim', '0', '0', 1, 'no', 0, 'mother', 'mother', '0126697791', 'father', 'father', '01165464545', '1649906581.jpg', 'none', 'PBB1006-resume.pdf', 'syaffa@alphacoretech.net', 60.00, 160.00, 2, 5, '123456', '2022-03-01', 'User', 'N', '2022-04-07 13:19:26', '2022-04-14 11:23:01'),
	(3, 'PBB1002', 'FOO', 'Foo Fung Zhi', '0163017149', '1', '01234567890', '7, lorong batu nilam 33d', '7, lorong batu nilam 33d', 'expert99team@gmail.com', '1994-10-03', 'Male', 'Malaysia', '941003106543', 'PBB1002-personal.pdf', 'Chinese', 'Buddhist', '0', '0', 1, 'no', 0, 'Fathers', 'Father', '0163017149', 'mothers', 'Mother', '0163017149', '1649844458.jpg', 'none', 'PBB1002-resume.pdf', 'derrickfoo@alphacoretech.net', 80.00, 150.00, 1, 11, 'testing123', '2022-04-01', 'User', 'Y', '2022-04-07 15:23:39', '2022-04-14 11:21:07'),
	(4, 'PBC1018', NULL, 'Nur Atikah Amirah ', '147450996', '1', '13', 'Perak', 'Perak', 'tiekahmiera6996@gmail.com', '1996-01-01', 'Female', 'Malaysia', '960101086500', 'PBC1018-personal.pdf', 'Malay', 'Muslim', '0', '0', 1, 'no', 0, 'Md Rosseli', 'Father', '0175178700', 'Mariam', 'Mother', '0125492750', '1649906930.jpg', 'none', 'PBC1018-resume.pdf', 'atikah@alphacoretech.net', 80.00, 150.00, 5, 15, 'atikah1234', '2022-03-03', 'Admin', 'N', '2022-04-08 13:57:48', '2022-04-14 11:28:50'),
	(5, 'PBC1001', 'CEO', 'CEO', '98854648', '1', '6846543545', '7, lorong batu nilam 33c', '7, lorong batu nilam 33c', 'expert99team@gmail.com', '1996-01-11', 'Male', 'Malaysia', '468465465468', 'PBC1001-personal.pdf', 'Chinese', 'Buddhist', '0', '0', 2, 'CEO Wife', 2, 'Father', 'Father', '415651465165', 'mother', 'Mother', '5165156165165', '1649907477.jpg', 'none', 'PBC1001-resume.pdf', 'acewong@alphacoretech.net', 2000.00, 2000.00, 1, 1, 'ceo12345', '2022-04-01', 'Master', 'N', '2022-04-11 16:39:07', '2022-04-14 11:37:57'),
	(6, '', 'ZUHAIR', 'AHMAD ZUHAIR \'UMARAH BIN SAMSER', '0134749123', '1', '', '0', '0', 'zuhairzero@gmail.com', '1988-07-20', 'Male', 'Malaysia', '0', '', '', '', '', 'current_timestamp()', 0, '', 0, '0', '0', '0', '0', '0', '0', '', '', '', '', 0.00, 0.00, 2, 0, '123', 'current_timestamp()', 'User', 'Y', '2022-04-13 04:01:23', '2022-04-13 04:01:23'),
	(7, 'PBC1020', 'ETHAN', 'Ethan', '0123000369', '1', '0322424091', 'Puchong, Taman Kinrara', 'Puchong, Taman Kinrara', 'ethanchang@idontgoto.com', '1994-06-08', 'Select Gender', 'Malaysia', '940806141235', 'PBC1020-personal.pdf', 'Chinese', 'Select Religion', '0', '0', 2, 'Lady Gaga', 2, 'Donald Trump', 'Godfather', '6011-23456789', 'Mother Theresa', 'Godmother', '60322424090', '1649907012.jpg', 'none', 'PBC1020-resume.pdf', 'ethanchang@alphacoretech.net', 200.00, 200.00, 1, 11, 'ethan4321', '2022-04-01', 'User', 'N', '2022-04-14 10:03:46', '2022-04-14 13:35:55'),
	(8, 'PBD1001', 'FOO', 'Foo Fung Zhi', '0163017149', '1', '0333192255', 'bukit tinggi', 'bukit tinggi', 'test@adv-fusionex.com', '1994-10-03', 'Male', 'Malaysia', '', 'PBD1001-personal.pdf', 'Chinese', 'Buddhist', '0', '0', 1, 'no', 0, 'Foo Toon Hock', 'Father', '0122380149', 'Soh Yuen Fan', 'Mother', '0122360149', '1649909156.jpg', 'none', 'PBD1001-resume.pdf', 'derrickfoo@alphacoretech.net', 80.00, 150.00, 2, 5, 'derrick12345', '2021-10-11', 'User', 'N', '2022-04-14 12:03:40', '2022-04-14 12:06:16');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.facility
CREATE TABLE IF NOT EXISTS `facility` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) DEFAULT NULL,
  `f_date` varchar(50) DEFAULT NULL,
  `f_from_time` time DEFAULT NULL,
  `f_to_time` time DEFAULT NULL,
  `f_room` varchar(50) DEFAULT NULL,
  `f_description` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.facility: ~12 rows (approximately)
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` (`f_id`, `f_emp_id`, `f_date`, `f_from_time`, `f_to_time`, `f_room`, `f_description`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1001', '2022-03-10', '09:00:00', '13:00:00', '1', 'testing1234', 'Y', '2022-03-08 15:21:26', '2022-03-10 11:29:54'),
	(2, 'PBB1002', '2022-03-11', '16:30:00', '17:31:00', '1', 'testing', 'Y', '2022-03-08 16:23:10', '2022-04-11 15:10:09'),
	(3, 'PBB1002', '2022-03-11', '16:30:00', '17:30:00', '1', 'testing', 'Y', '2022-03-08 16:42:02', '2022-04-11 14:44:33'),
	(4, 'PBB1001', '2022-03-15', '12:00:00', '14:00:00', '1', 'testing', 'Y', '2022-03-09 10:40:37', '2022-03-10 11:30:10'),
	(5, 'PBB1001', '2022-03-11', '09:00:00', '13:00:00', '1', 'testing', 'N', '2022-03-10 18:13:25', '2022-03-10 18:13:25'),
	(6, 'PBB1001', '2022-03-14', '10:30:00', '12:55:00', '2', 'testing', 'N', '2022-03-11 10:56:04', '2022-03-11 10:56:04'),
	(7, 'PBB1003', '2022-03-15', '12:00:00', '13:30:00', '1', 'testing', 'N', '2022-03-14 13:24:11', '2022-03-14 13:24:11'),
	(8, 'PBB1004', '2022-03-21', '16:00:00', '17:00:00', '1', 'discuss', 'N', '2022-03-14 16:49:45', '2022-03-14 16:49:45'),
	(9, 'PBB1001', '2022-04-06', '13:25:00', '14:26:00', '1', 'discuss', 'N', '2022-04-05 11:23:47', '2022-04-05 11:23:47'),
	(10, 'PBB1020', '2022-04-06', '15:36:00', '15:37:00', '1', 'testing', 'N', '2022-04-05 14:35:14', '2022-04-05 14:35:14'),
	(11, 'PBB1001', '2022-04-07', '17:50:00', '17:50:00', '1', 'meeting', 'N', '2022-04-05 16:49:59', '2022-04-05 16:49:59'),
	(12, 'PBB1001', '2022-05-01', '17:30:00', '18:00:00', '2', 'loltest', 'N', '2022-04-06 15:32:23', '2022-04-06 15:32:23'),
	(13, 'PBB1111', '2022-04-08', '09:29:00', '13:00:00', '2', 'Testing', 'N', '2022-04-06 16:40:04', '2022-04-06 16:40:04'),
	(14, 'PBB1005', '2022-04-13', '11:04:00', '12:04:00', '2', 'testing', 'N', '2022-04-07 11:04:20', '2022-04-07 11:04:20'),
	(15, 'PBC1018', '2022-04-13', '10:45:00', '12:44:00', '1', 'Meeting HRMS', 'N', '2022-04-13 10:42:37', '2022-04-13 10:42:37'),
	(16, '', '2022-04-14', '09:08:00', '09:50:00', '1', 'Meeting', 'N', '2022-04-13 18:47:27', '2022-04-13 18:47:27'),
	(17, 'PBB1002', '2022-04-15', '11:01:00', '12:01:00', '1', 'testing', 'N', '2022-04-14 11:01:53', '2022-04-14 11:01:53');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.facility_room
CREATE TABLE IF NOT EXISTS `facility_room` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_room` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.facility_room: ~2 rows (approximately)
/*!40000 ALTER TABLE `facility_room` DISABLE KEYS */;
INSERT INTO `facility_room` (`f_id`, `f_room`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Board Room', 'N', '2022-03-08 14:55:51', '2022-03-08 14:55:52'),
	(2, 'Test Room', 'N', '2022-03-09 12:54:12', '2022-03-09 12:54:12');
/*!40000 ALTER TABLE `facility_room` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.goals
CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(200) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Target` text NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Description` text NOT NULL,
  `Status` int(11) NOT NULL,
  `Progress` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.goals: ~3 rows (approximately)
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` (`id`, `Type`, `Subject`, `Target`, `StartDate`, `EndDate`, `Description`, `Status`, `Progress`, `dateTime`) VALUES
	(1, 'Another One', 'Coding', 'Code till time infinity ', '2020-09-25', '2020-10-10', 'This is the thing i always want to do and am doing it for the rest of my life now friend.', 1, '80', '2020-09-25 00:13:34'),
	(2, 'Another One', 'this is a test', 'Code till time infinity ', '2020-09-25', '2020-10-10', 'This is a test', 1, '50', '2020-09-25 00:39:34'),
	(3, 'Invoice Goal', 'This is another test', 'Code till thy kingdom come.', '2020-09-25', '2048-09-10', 'this is another one of the wierdest thing that i have ever done. I having alot of the shit not working but i got this.', 0, '0', '2020-09-25 01:08:59');
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.goal_type
CREATE TABLE IF NOT EXISTS `goal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Status` int(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `Type` (`Type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.goal_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `goal_type` DISABLE KEYS */;
INSERT INTO `goal_type` (`id`, `Type`, `Description`, `Status`, `Date`) VALUES
	(1, 'Invoice Goal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti laudantium animi fuga hic nobis culpa, sapiente numquam quaerat quisquam eveniet dolorum soluta harum eligendi praesentium corporis error quo inventore suscipit?', 1, '2020-09-24'),
	(3, 'Another One', 'This is another test for the type section. Just testing it and seeing it work makes me smile with joy. Thats the power of programming for humans and especially to me .It makes me more happy to see my code run without troubles or bugs.', 1, '2020-09-24');
/*!40000 ALTER TABLE `goal_type` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.handbook
CREATE TABLE IF NOT EXISTS `handbook` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_title` varchar(50) DEFAULT NULL,
  `f_uploaded_file` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.handbook: ~0 rows (approximately)
/*!40000 ALTER TABLE `handbook` DISABLE KEYS */;
INSERT INTO `handbook` (`f_id`, `f_title`, `f_uploaded_file`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'handbook v3', 'Email Address List Date As 170322.pdf', 'Y', '2022-04-08 11:51:58', '2022-04-08 12:12:34'),
	(2, 'testing', 'Announce Public Holiday 2022.pdf', 'N', '2022-04-08 15:09:47', '2022-04-08 15:09:47'),
	(3, 'Employee Handbook April 2022', 'UNIVERSITI TEKNOLOGI MARA - EXAMINATION RESULT SEM', 'Y', '2022-04-08 16:05:10', '2022-04-13 10:35:06');
/*!40000 ALTER TABLE `handbook` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.holidays
CREATE TABLE IF NOT EXISTS `holidays` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_holiday_name` varchar(200) NOT NULL,
  `f_start_date` varchar(50) NOT NULL DEFAULT '',
  `f_start_day` varchar(50) NOT NULL,
  `f_end_date` varchar(50) NOT NULL DEFAULT '',
  `f_end_day` varchar(50) NOT NULL,
  `f_restart_date` varchar(50) NOT NULL DEFAULT '',
  `f_restart_day` varchar(50) NOT NULL DEFAULT '',
  `f_reend_date` varchar(50) NOT NULL DEFAULT '',
  `f_reend_day` varchar(50) NOT NULL DEFAULT '',
  `f_total_holiday` varchar(50) NOT NULL DEFAULT '',
  `f_duplicate` varchar(50) NOT NULL DEFAULT '',
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.holidays: ~9 rows (approximately)
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` (`f_id`, `f_holiday_name`, `f_start_date`, `f_start_day`, `f_end_date`, `f_end_day`, `f_restart_date`, `f_restart_day`, `f_reend_date`, `f_reend_day`, `f_total_holiday`, `f_duplicate`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Chinese New Year', '2022-02-01', 'Tuesday', '2022-02-02', 'Wednesday', 'none', 'none', 'none', 'none', '2', 'N', 'N', '2022-01-26 12:49:31', '2022-01-26 12:49:31'),
	(2, 'Kuala Lumper Federation Holiday', '2022-02-01', 'Tuesday', '2022-02-01', 'Tuesday', '2022-02-03', 'Thursday', 'none', 'none', '1', 'Y', 'N', '2022-01-26 13:09:37', '2022-01-26 13:09:37'),
	(3, 'testing holiday', '2022-02-03', 'Thursday', '2022-02-03', 'Thursday', '2022-02-04', 'Friday', 'none', 'none', '1', 'Y', 'N', '2022-01-26 15:22:29', '2022-01-26 15:22:29'),
	(4, 'Labour Day', '2022-05-01', 'Sunday', '2022-05-01', 'Sunday', '2022-05-02', 'Monday', 'none', 'none', '1', 'N', 'N', '2022-02-14 12:22:07', '2022-02-14 12:22:07'),
	(5, 'hari raya', '2022-05-03', 'Tuesday', '2022-05-03', 'Tuesday', 'none', 'none', 'none', 'none', '1', 'N', 'N', '2022-02-16 11:11:00', '2022-02-16 11:11:00'),
	(6, 'test2', '2022-04-17', 'Sunday', '2022-04-18', 'Monday', '2022-04-18', 'Monday', '2022-04-19', 'Tuesday', '2', 'N', 'N', '2022-04-06 14:42:22', '2022-04-06 14:42:22'),
	(7, 'test3', '2022-04-24', 'Sunday', '2022-04-25', 'Monday', '2022-04-25', 'Monday', '2022-04-26', 'Tuesday', '2', 'N', 'N', '2022-04-06 14:43:44', '2022-04-06 14:43:44'),
	(8, 'test4', '2022-05-29', 'Sunday', '2022-05-30', 'Monday', '2022-05-30', 'Monday', '2022-05-31', 'Tuesday', '2', 'N', 'N', '2022-04-06 14:44:58', '2022-04-06 14:44:58'),
	(9, 'test5', '2022-06-02', 'Thursday', '2022-06-03', 'Friday', 'none', 'none', 'none', 'none', '2', 'N', 'N', '2022-04-11 10:18:43', '2022-04-11 10:18:43');
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.job_task
CREATE TABLE IF NOT EXISTS `job_task` (
  `BIL` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_NAME` varchar(255) DEFAULT NULL,
  `PROJECT_NAME` varchar(255) DEFAULT NULL,
  `JOB_TASK` varchar(255) DEFAULT NULL,
  `DATE_START` varchar(255) DEFAULT NULL,
  `DUE_DATE` varchar(255) DEFAULT NULL,
  `CO_LANG` varchar(255) DEFAULT NULL,
  `MOD_PAG` varchar(255) DEFAULT NULL,
  `PROJECT_STATUS` varchar(255) DEFAULT NULL,
  `PROBLEM_DATE` varchar(255) DEFAULT NULL,
  `SOLUTIONS` varchar(255) DEFAULT NULL,
  `DATE_COMPLETE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BIL`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.job_task: ~5 rows (approximately)
/*!40000 ALTER TABLE `job_task` DISABLE KEYS */;
INSERT INTO `job_task` (`BIL`, `MEMBER_NAME`, `PROJECT_NAME`, `JOB_TASK`, `DATE_START`, `DUE_DATE`, `CO_LANG`, `MOD_PAG`, `PROJECT_STATUS`, `PROBLEM_DATE`, `SOLUTIONS`, `DATE_COMPLETE`) VALUES
	(8, 'ZUHAIR', 'project management', 'test 1', '05/04/2022', '20/04/2022', 'php ', '', '', NULL, NULL, NULL),
	(9, 'ZUHAIR', 'project management', 'test 2', '22/04/2022', '12/04/2022', 'java', '', '', NULL, NULL, NULL),
	(10, 'ZUHAIR', 'project management', 'test 3', '14/04/2022', '13/04/2022', 'html 7', '', '', NULL, NULL, NULL),
	(11, 'ZUHAIR', 'ALPHA DASH', 'php', '14/04/2022', '15/04/2022', NULL, 'test', NULL, NULL, NULL, NULL),
	(12, 'ZUHAIR', 'ALPHA DASH', 'html', '12/04/2022', '14/04/2022', NULL, 'test', NULL, NULL, NULL, NULL),
	(13, 'ZUHAIR', 'project management', 'trst4', '06/04/2022', '15/04/2022', NULL, 'test', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `job_task` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.leaves
CREATE TABLE IF NOT EXISTS `leaves` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(200) NOT NULL,
  `f_leave_type` varchar(200) NOT NULL,
  `f_start_date` date NOT NULL,
  `f_end_date` date NOT NULL,
  `f_start_time` time NOT NULL,
  `f_end_time` time NOT NULL,
  `f_total` varchar(50) NOT NULL DEFAULT '0',
  `f_reason` varchar(255) NOT NULL DEFAULT '',
  `f_image` varchar(255) NOT NULL DEFAULT '',
  `f_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `f_remarks` varchar(50) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.leaves: ~9 rows (approximately)
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
INSERT INTO `leaves` (`f_id`, `f_emp_id`, `f_leave_type`, `f_start_date`, `f_end_date`, `f_start_time`, `f_end_time`, `f_total`, `f_reason`, `f_image`, `f_status`, `f_remarks`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1002', '2', '2022-04-29', '2022-04-29', '00:00:00', '23:59:59', '1', 'testing', 'leave_1649755289.jpg', 'Approved', 'Approved', 'Y', '2022-04-12 17:21:29', '2022-04-13 10:38:50'),
	(2, 'PBB1006', '1', '2022-04-29', '2022-04-29', '00:00:00', '23:59:59', '1', 'Clear leave', 'leave_1649819455.jpg', 'Rejected', 'Sorry cannot', 'N', '2022-04-13 11:10:55', '2022-04-13 12:15:36'),
	(3, 'PBB1006', '4', '2022-04-28', '2022-04-28', '00:00:00', '23:59:59', '1', 'sick', 'leave_1649819529.jpg', 'Pending', '', 'Y', '2022-04-13 11:12:09', '2022-04-13 18:43:54'),
	(4, 'PBB1006', '4', '2022-04-26', '2022-04-26', '00:00:00', '23:59:59', '1', 'sick', 'leave_1649822006.jpg', 'Pending', '', 'N', '2022-04-13 11:53:26', '2022-04-13 11:53:26'),
	(5, 'PBB1006', '4', '2022-04-26', '2022-04-26', '00:00:00', '23:59:59', '1', 'sick', 'leave_1649822990', 'Approved', 'Approved', 'N', '2022-04-13 12:09:50', '2022-04-14 12:32:53'),
	(6, 'PBB1006', '4', '2022-04-27', '2022-04-27', '00:00:00', '23:59:59', '1', 'sick', '', 'Rejected', 'Please come and see me', 'N', '2022-04-13 12:13:06', '2022-04-14 12:31:56'),
	(7, 'PBB1002', '4', '2022-04-26', '2022-04-26', '00:00:00', '23:59:59', '1', 'sickness heavy', 'Minute of Meeting 010- Updated.pdf', 'Approved', 'Approved', 'N', '2022-04-13 12:16:48', '2022-04-13 18:42:52'),
	(8, 'PBC1020', '', '2022-05-05', '2022-05-06', '00:00:00', '23:59:59', '2', 'Hari Raya Celebration', 'leave_1649902390.jpg', 'Pending', '', 'N', '2022-04-14 10:13:10', '2022-04-14 10:13:10'),
	(9, 'PBB1006', '1', '2022-05-24', '2022-05-24', '13:05:00', '14:44:00', '0.5', 'testing', 'leave_1649915096.jpg', 'Rejected', 'Sorry, cannot', 'N', '2022-04-14 13:44:56', '2022-04-14 13:48:23');
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.leave_type
CREATE TABLE IF NOT EXISTS `leave_type` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_leave_name` varchar(50) DEFAULT NULL,
  `f_leave_max` varchar(50) DEFAULT NULL,
  `f_leave_gender` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.leave_type: ~7 rows (approximately)
/*!40000 ALTER TABLE `leave_type` DISABLE KEYS */;
INSERT INTO `leave_type` (`f_id`, `f_leave_name`, `f_leave_max`, `f_leave_gender`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'Annual Leave', '14', 'B', 'N', '2022-02-09 09:58:01', '2022-02-09 09:58:02'),
	(2, 'Unpaid Leave', '0', 'B', 'N', '2022-02-09 09:58:31', '2022-02-09 09:58:32'),
	(3, 'Emergency Leave', '0', 'B', 'Y', '2022-02-09 09:58:49', '2022-02-09 09:58:50'),
	(4, 'Medical Leave', '14', 'B', 'N', '2022-02-09 09:59:08', '2022-02-09 09:59:09'),
	(5, 'Maternity Leave', '60', 'F', 'N', '2022-02-09 09:59:25', '2022-02-09 09:59:26'),
	(6, 'Time Off', '0', 'B', 'N', '2022-02-09 09:59:39', '2022-02-09 09:59:40'),
	(7, 'Hospitalization Leave', '60', 'B', 'N', '2022-02-09 15:47:25', '2022-02-09 15:47:26');
/*!40000 ALTER TABLE `leave_type` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.login_time
CREATE TABLE IF NOT EXISTS `login_time` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` int(11) DEFAULT NULL,
  `f_clock_in` time DEFAULT NULL,
  `f_clock_out` datetime DEFAULT NULL,
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.login_time: ~188 rows (approximately)
/*!40000 ALTER TABLE `login_time` DISABLE KEYS */;
INSERT INTO `login_time` (`f_id`, `f_emp_id`, `f_clock_in`, `f_clock_out`, `f_created_date`, `f_modified_date`) VALUES
	(1, 1, '15:20:00', NULL, '2022-03-30 15:20:35', '2022-03-30 15:20:35'),
	(2, 51, '15:31:00', NULL, '2022-03-30 15:31:37', '2022-03-30 15:31:37'),
	(3, 1, '15:32:00', NULL, '2022-03-30 15:32:28', '2022-03-30 15:32:28'),
	(4, 1, '15:45:00', NULL, '2022-03-30 15:45:54', '2022-03-30 15:45:54'),
	(5, 51, '15:46:00', NULL, '2022-03-30 15:46:26', '2022-03-30 15:46:26'),
	(6, 1, '15:47:00', NULL, '2022-03-30 15:47:53', '2022-03-30 15:47:53'),
	(7, 1, '16:03:00', NULL, '2022-03-30 16:03:26', '2022-03-30 16:03:26'),
	(8, 50, '16:12:00', NULL, '2022-03-30 16:12:00', '2022-03-30 16:12:00'),
	(9, 52, '16:12:00', NULL, '2022-03-30 16:12:53', '2022-03-30 16:12:53'),
	(10, 51, '10:37:00', NULL, '2022-03-31 10:37:25', '2022-03-31 10:37:25'),
	(11, 51, '13:38:00', NULL, '2022-03-31 13:38:33', '2022-03-31 13:38:33'),
	(12, 1, '14:47:00', NULL, '2022-03-31 14:47:28', '2022-03-31 14:47:28'),
	(13, 51, '14:51:00', NULL, '2022-03-31 14:51:48', '2022-03-31 14:51:48'),
	(14, 1, '14:54:00', NULL, '2022-03-31 14:54:52', '2022-03-31 14:54:52'),
	(15, 52, '14:57:00', NULL, '2022-03-31 14:57:18', '2022-03-31 14:57:18'),
	(16, 52, '14:59:00', NULL, '2022-03-31 14:59:35', '2022-03-31 14:59:35'),
	(17, 1, '15:45:00', NULL, '2022-03-31 15:45:03', '2022-03-31 15:45:03'),
	(18, 1, '16:19:00', NULL, '2022-03-31 16:19:40', '2022-03-31 16:19:40'),
	(19, 1, '09:22:00', NULL, '2022-04-01 09:22:47', '2022-04-01 09:22:47'),
	(20, 1, '10:26:00', NULL, '2022-04-01 10:26:12', '2022-04-01 10:26:12'),
	(21, 52, '10:39:00', NULL, '2022-04-01 10:39:46', '2022-04-01 10:39:46'),
	(22, 52, '10:45:00', NULL, '2022-04-01 10:45:16', '2022-04-01 10:45:16'),
	(23, 51, '11:05:00', NULL, '2022-04-01 11:05:54', '2022-04-01 11:05:54'),
	(24, 51, '11:06:00', NULL, '2022-04-01 11:06:34', '2022-04-01 11:06:34'),
	(25, 51, '11:25:00', NULL, '2022-04-01 11:25:10', '2022-04-01 11:25:10'),
	(26, 51, '11:26:00', NULL, '2022-04-01 11:26:08', '2022-04-01 11:26:08'),
	(27, 1, '11:44:00', NULL, '2022-04-01 11:44:33', '2022-04-01 11:44:33'),
	(28, 51, '14:31:00', NULL, '2022-04-01 14:31:39', '2022-04-01 14:31:39'),
	(29, 51, '15:18:00', NULL, '2022-04-01 15:18:30', '2022-04-01 15:18:30'),
	(30, 51, '15:23:00', NULL, '2022-04-01 15:23:10', '2022-04-01 15:23:10'),
	(31, 1, '15:50:00', NULL, '2022-04-01 15:50:14', '2022-04-01 15:50:14'),
	(32, 52, '16:14:00', NULL, '2022-04-01 16:14:48', '2022-04-01 16:14:48'),
	(33, 52, '17:11:00', NULL, '2022-04-01 17:11:20', '2022-04-01 17:11:20'),
	(34, 1, '09:30:00', NULL, '2022-04-04 09:30:21', '2022-04-04 09:30:21'),
	(35, 1, '09:30:00', NULL, '2022-04-04 09:30:24', '2022-04-04 09:30:24'),
	(36, 52, '09:47:00', NULL, '2022-04-04 09:47:33', '2022-04-04 09:47:33'),
	(37, 1, '09:48:00', NULL, '2022-04-04 09:48:49', '2022-04-04 09:48:49'),
	(38, 1, '09:53:00', NULL, '2022-04-04 09:53:39', '2022-04-04 09:53:39'),
	(39, 1, '10:07:00', NULL, '2022-04-04 10:07:02', '2022-04-04 10:07:02'),
	(40, 51, '10:28:00', NULL, '2022-04-04 10:28:18', '2022-04-04 10:28:18'),
	(41, 1, '10:31:00', NULL, '2022-04-04 10:31:37', '2022-04-04 10:31:37'),
	(42, 1, '14:37:00', NULL, '2022-04-04 14:37:32', '2022-04-04 14:37:32'),
	(43, 51, '15:29:00', NULL, '2022-04-04 15:29:58', '2022-04-04 15:29:58'),
	(44, 51, '15:52:00', NULL, '2022-04-04 15:52:00', '2022-04-04 15:52:00'),
	(45, 1, '15:56:00', NULL, '2022-04-04 15:56:37', '2022-04-04 15:56:37'),
	(46, 1, '16:11:00', NULL, '2022-04-04 16:11:04', '2022-04-04 16:11:04'),
	(47, 1, '16:11:00', NULL, '2022-04-04 16:11:53', '2022-04-04 16:11:53'),
	(48, 1, '16:17:00', NULL, '2022-04-04 16:17:47', '2022-04-04 16:17:47'),
	(49, 51, '16:19:00', NULL, '2022-04-04 16:19:47', '2022-04-04 16:19:47'),
	(50, 51, '16:20:00', NULL, '2022-04-04 16:20:25', '2022-04-04 16:20:25'),
	(51, 51, '16:28:00', NULL, '2022-04-04 16:28:52', '2022-04-04 16:28:52'),
	(52, 51, '16:37:00', NULL, '2022-04-04 16:37:01', '2022-04-04 16:37:01'),
	(53, 1, '08:58:00', NULL, '2022-04-05 08:58:45', '2022-04-05 08:58:45'),
	(54, 1, '09:49:00', NULL, '2022-04-05 09:49:04', '2022-04-05 09:49:04'),
	(55, 52, '09:52:00', NULL, '2022-04-05 09:52:24', '2022-04-05 09:52:24'),
	(56, 51, '09:54:00', NULL, '2022-04-05 09:54:32', '2022-04-05 09:54:32'),
	(57, 1, '09:58:00', NULL, '2022-04-05 09:58:07', '2022-04-05 09:58:07'),
	(58, 1, '10:07:00', NULL, '2022-04-05 10:07:51', '2022-04-05 10:07:51'),
	(59, 1, '10:20:00', NULL, '2022-04-05 10:20:10', '2022-04-05 10:20:10'),
	(60, 1, '10:21:00', NULL, '2022-04-05 10:21:21', '2022-04-05 10:21:21'),
	(61, 51, '10:23:00', NULL, '2022-04-05 10:23:52', '2022-04-05 10:23:52'),
	(62, 1, '10:23:00', NULL, '2022-04-05 10:23:57', '2022-04-05 10:23:57'),
	(63, 1, '10:26:00', NULL, '2022-04-05 10:26:08', '2022-04-05 10:26:08'),
	(64, 1, '10:32:00', NULL, '2022-04-05 10:32:26', '2022-04-05 10:32:26'),
	(65, 51, '10:57:00', NULL, '2022-04-05 10:57:40', '2022-04-05 10:57:40'),
	(66, 1, '11:08:00', NULL, '2022-04-05 11:08:02', '2022-04-05 11:08:02'),
	(67, 1, '11:14:00', NULL, '2022-04-05 11:14:45', '2022-04-05 11:14:45'),
	(68, 53, '11:18:00', NULL, '2022-04-05 11:18:57', '2022-04-05 11:18:57'),
	(69, 53, '11:29:00', NULL, '2022-04-05 11:29:22', '2022-04-05 11:29:22'),
	(70, 52, '11:31:00', NULL, '2022-04-05 11:31:02', '2022-04-05 11:31:02'),
	(71, 1, '11:37:00', NULL, '2022-04-05 11:37:51', '2022-04-05 11:37:51'),
	(72, 52, '11:49:00', NULL, '2022-04-05 11:49:48', '2022-04-05 11:49:48'),
	(73, 1, '11:56:00', NULL, '2022-04-05 11:56:15', '2022-04-05 11:56:15'),
	(74, 1, '12:02:00', NULL, '2022-04-05 12:02:38', '2022-04-05 12:02:38'),
	(75, 1, '12:03:00', NULL, '2022-04-05 12:03:19', '2022-04-05 12:03:19'),
	(76, 53, '12:12:00', NULL, '2022-04-05 12:12:31', '2022-04-05 12:12:31'),
	(77, 53, '12:30:00', NULL, '2022-04-05 12:30:40', '2022-04-05 12:30:40'),
	(78, 53, '12:42:00', NULL, '2022-04-05 12:42:10', '2022-04-05 12:42:10'),
	(79, 53, '13:04:00', NULL, '2022-04-05 13:04:53', '2022-04-05 13:04:53'),
	(80, 1, '13:11:00', NULL, '2022-04-05 13:11:40', '2022-04-05 13:11:40'),
	(81, 1, '13:11:00', NULL, '2022-04-05 13:11:59', '2022-04-05 13:11:59'),
	(82, 1, '13:13:00', NULL, '2022-04-05 13:13:24', '2022-04-05 13:13:24'),
	(83, 53, '13:27:00', NULL, '2022-04-05 13:27:54', '2022-04-05 13:27:54'),
	(84, 53, '13:31:00', NULL, '2022-04-05 13:31:31', '2022-04-05 13:31:31'),
	(85, 53, '13:44:00', NULL, '2022-04-05 13:44:12', '2022-04-05 13:44:12'),
	(86, 53, '14:26:00', NULL, '2022-04-05 14:26:39', '2022-04-05 14:26:39'),
	(87, 53, '14:28:00', NULL, '2022-04-05 14:28:30', '2022-04-05 14:28:30'),
	(88, 1, '15:11:00', NULL, '2022-04-05 15:11:28', '2022-04-05 15:11:28'),
	(89, 53, '15:32:00', NULL, '2022-04-05 15:32:27', '2022-04-05 15:32:27'),
	(90, 1, '15:51:00', NULL, '2022-04-05 15:51:21', '2022-04-05 15:51:21'),
	(91, 1, '15:51:00', NULL, '2022-04-05 15:51:56', '2022-04-05 15:51:56'),
	(92, 1, '16:07:00', NULL, '2022-04-05 16:07:31', '2022-04-05 16:07:31'),
	(93, 1, '16:08:00', NULL, '2022-04-05 16:08:13', '2022-04-05 16:08:13'),
	(94, 1, '16:11:00', NULL, '2022-04-05 16:11:22', '2022-04-05 16:11:22'),
	(95, 1, '16:18:00', NULL, '2022-04-05 16:18:03', '2022-04-05 16:18:03'),
	(96, 61, '16:24:00', NULL, '2022-04-05 16:24:49', '2022-04-05 16:24:49'),
	(97, 1, '16:25:00', NULL, '2022-04-05 16:25:51', '2022-04-05 16:25:51'),
	(98, 51, '16:26:00', NULL, '2022-04-05 16:26:41', '2022-04-05 16:26:41'),
	(99, 61, '16:28:00', NULL, '2022-04-05 16:28:10', '2022-04-05 16:28:10'),
	(100, 61, '16:28:00', NULL, '2022-04-05 16:28:18', '2022-04-05 16:28:18'),
	(101, 61, '16:36:00', NULL, '2022-04-05 16:36:41', '2022-04-05 16:36:41'),
	(102, 1, '16:37:00', NULL, '2022-04-05 16:37:41', '2022-04-05 16:37:41'),
	(103, 1, '16:53:00', NULL, '2022-04-05 16:53:58', '2022-04-05 16:53:58'),
	(104, 1, '09:33:00', NULL, '2022-04-06 09:33:33', '2022-04-06 09:33:33'),
	(105, 1, '09:53:00', NULL, '2022-04-06 09:53:58', '2022-04-06 09:53:58'),
	(106, 51, '10:30:00', NULL, '2022-04-06 10:30:18', '2022-04-06 10:30:18'),
	(107, 52, '11:09:00', NULL, '2022-04-06 11:09:14', '2022-04-06 11:09:14'),
	(108, 52, '12:48:00', NULL, '2022-04-06 12:48:42', '2022-04-06 12:48:42'),
	(109, 1, '14:55:00', NULL, '2022-04-06 14:55:01', '2022-04-06 14:55:01'),
	(110, 1, '15:03:00', NULL, '2022-04-06 15:03:12', '2022-04-06 15:03:12'),
	(111, 52, '15:38:00', NULL, '2022-04-06 15:38:35', '2022-04-06 15:38:35'),
	(112, 52, '15:39:00', NULL, '2022-04-06 15:39:13', '2022-04-06 15:39:13'),
	(113, 51, '15:59:00', NULL, '2022-04-06 15:59:18', '2022-04-06 15:59:18'),
	(114, 51, '15:59:00', NULL, '2022-04-06 15:59:47', '2022-04-06 15:59:47'),
	(115, 51, '16:06:00', NULL, '2022-04-06 16:06:46', '2022-04-06 16:06:46'),
	(116, 53, '16:21:00', NULL, '2022-04-06 16:21:03', '2022-04-06 16:21:03'),
	(117, 1, '16:43:00', NULL, '2022-04-06 16:43:07', '2022-04-06 16:43:07'),
	(118, 1, '09:13:00', NULL, '2022-04-07 09:13:15', '2022-04-07 09:13:15'),
	(119, 52, '09:57:00', NULL, '2022-04-07 09:57:22', '2022-04-07 09:57:22'),
	(120, 51, '09:59:00', NULL, '2022-04-07 09:59:06', '2022-04-07 09:59:06'),
	(121, 1, '10:26:00', NULL, '2022-04-07 10:26:58', '2022-04-07 10:26:58'),
	(122, 1, '10:30:00', NULL, '2022-04-07 10:30:17', '2022-04-07 10:30:17'),
	(123, 1, '10:36:00', NULL, '2022-04-07 10:36:06', '2022-04-07 10:36:06'),
	(124, 51, '10:36:00', NULL, '2022-04-07 10:36:45', '2022-04-07 10:36:45'),
	(125, 51, '10:37:00', NULL, '2022-04-07 10:37:02', '2022-04-07 10:37:02'),
	(126, 51, '10:38:00', NULL, '2022-04-07 10:38:02', '2022-04-07 10:38:02'),
	(127, 1, '10:38:00', NULL, '2022-04-07 10:38:14', '2022-04-07 10:38:14'),
	(128, 52, '10:40:00', NULL, '2022-04-07 10:40:44', '2022-04-07 10:40:44'),
	(129, 1, '10:46:00', NULL, '2022-04-07 10:46:58', '2022-04-07 10:46:58'),
	(130, 1, '10:50:00', NULL, '2022-04-07 10:50:12', '2022-04-07 10:50:12'),
	(131, 51, '11:07:00', NULL, '2022-04-07 11:07:21', '2022-04-07 11:07:21'),
	(132, 1, '11:28:00', NULL, '2022-04-07 11:28:38', '2022-04-07 11:28:38'),
	(133, 1, '12:56:00', NULL, '2022-04-07 12:56:23', '2022-04-07 12:56:23'),
	(134, 1, '14:09:00', NULL, '2022-04-07 14:09:39', '2022-04-07 14:09:39'),
	(135, 1, '15:00:00', NULL, '2022-04-07 15:00:39', '2022-04-07 15:00:39'),
	(136, 1, '15:47:00', NULL, '2022-04-07 15:47:19', '2022-04-07 15:47:19'),
	(137, 1, '16:04:00', NULL, '2022-04-07 16:04:09', '2022-04-07 16:04:09'),
	(138, 1, '16:08:00', NULL, '2022-04-07 16:08:02', '2022-04-07 16:08:02'),
	(139, 1, '09:43:00', NULL, '2022-04-08 09:43:50', '2022-04-08 09:43:50'),
	(140, 1, '11:48:00', NULL, '2022-04-08 11:48:14', '2022-04-08 11:48:14'),
	(141, 1, '13:13:00', NULL, '2022-04-08 13:13:15', '2022-04-08 13:13:15'),
	(142, 1, '13:32:00', NULL, '2022-04-08 13:32:33', '2022-04-08 13:32:33'),
	(143, 1, '13:37:00', NULL, '2022-04-08 13:37:41', '2022-04-08 13:37:41'),
	(144, 1, '14:01:00', NULL, '2022-04-08 14:01:07', '2022-04-08 14:01:07'),
	(145, 1, '14:02:00', NULL, '2022-04-08 14:02:19', '2022-04-08 14:02:19'),
	(146, 1, '15:00:00', NULL, '2022-04-08 15:00:26', '2022-04-08 15:00:26'),
	(147, 1, '15:58:00', NULL, '2022-04-08 15:58:13', '2022-04-08 15:58:13'),
	(148, 4, '16:24:00', NULL, '2022-04-08 16:24:41', '2022-04-08 16:24:41'),
	(149, 1, '08:31:00', NULL, '2022-04-11 08:31:58', '2022-04-11 08:31:58'),
	(150, 1, '10:09:00', NULL, '2022-04-11 10:09:01', '2022-04-11 10:09:01'),
	(151, 4, '12:03:00', NULL, '2022-04-11 12:03:12', '2022-04-11 12:03:12'),
	(152, 1, '14:29:00', NULL, '2022-04-11 14:29:50', '2022-04-11 14:29:50'),
	(153, 1, '15:08:00', NULL, '2022-04-11 15:08:35', '2022-04-11 15:08:35'),
	(154, 5, '10:12:00', NULL, '2022-04-12 10:12:10', '2022-04-12 10:12:10'),
	(155, 5, '10:13:00', NULL, '2022-04-12 10:13:20', '2022-04-12 10:13:20'),
	(156, 1, '10:39:00', NULL, '2022-04-12 10:39:20', '2022-04-12 10:39:20'),
	(157, 1, '10:48:00', NULL, '2022-04-12 10:48:10', '2022-04-12 10:48:10'),
	(158, 1, '08:50:00', NULL, '2022-04-13 08:50:37', '2022-04-13 08:50:37'),
	(159, 2, '09:36:00', NULL, '2022-04-13 09:36:52', '2022-04-13 09:36:52'),
	(160, 1, '10:22:00', NULL, '2022-04-13 10:22:19', '2022-04-13 10:22:19'),
	(161, 3, '11:40:00', NULL, '2022-04-13 11:40:18', '2022-04-13 11:40:18'),
	(162, 1, '12:39:00', NULL, '2022-04-13 12:39:12', '2022-04-13 12:39:12'),
	(163, 2, '14:34:00', NULL, '2022-04-13 14:34:15', '2022-04-13 14:34:15'),
	(164, 4, '14:45:00', NULL, '2022-04-13 14:45:25', '2022-04-13 14:45:25'),
	(165, 3, '15:33:00', NULL, '2022-04-13 15:33:54', '2022-04-13 15:33:54'),
	(166, 4, '15:40:00', NULL, '2022-04-13 15:40:36', '2022-04-13 15:40:36'),
	(167, 1, '16:19:00', NULL, '2022-04-13 16:19:46', '2022-04-13 16:19:46'),
	(168, 1, '18:00:00', NULL, '2022-04-13 18:00:13', '2022-04-13 18:00:13'),
	(169, 4, '09:18:00', NULL, '2022-04-14 09:18:42', '2022-04-14 09:18:42'),
	(170, 2, '09:33:00', NULL, '2022-04-14 09:33:10', '2022-04-14 09:33:10'),
	(171, 2, '09:41:00', NULL, '2022-04-14 09:41:48', '2022-04-14 09:41:48'),
	(172, 1, '09:49:00', NULL, '2022-04-14 09:49:35', '2022-04-14 09:49:35'),
	(173, 1, '09:52:00', NULL, '2022-04-14 09:52:53', '2022-04-14 09:52:53'),
	(174, 7, '10:05:00', NULL, '2022-04-14 10:05:23', '2022-04-14 10:05:23'),
	(175, 3, '10:40:00', NULL, '2022-04-14 10:40:35', '2022-04-14 10:40:35'),
	(176, 2, '11:24:00', NULL, '2022-04-14 11:24:24', '2022-04-14 11:24:24'),
	(177, 1, '11:36:00', NULL, '2022-04-14 11:36:24', '2022-04-14 11:36:24'),
	(178, 7, '11:36:00', NULL, '2022-04-14 11:36:25', '2022-04-14 11:36:25'),
	(179, 1, '11:46:00', NULL, '2022-04-14 11:46:48', '2022-04-14 11:46:48'),
	(180, 1, '11:56:00', NULL, '2022-04-14 11:56:37', '2022-04-14 11:56:37'),
	(181, 4, '12:05:00', NULL, '2022-04-14 12:05:11', '2022-04-14 12:05:11'),
	(182, 7, '12:08:00', NULL, '2022-04-14 12:08:03', '2022-04-14 12:08:03'),
	(183, 7, '12:41:00', NULL, '2022-04-14 12:41:17', '2022-04-14 12:41:17'),
	(184, 8, '13:29:00', NULL, '2022-04-14 13:29:28', '2022-04-14 13:29:28'),
	(185, 7, '13:30:00', NULL, '2022-04-14 13:30:36', '2022-04-14 13:30:36'),
	(186, 7, '13:36:00', NULL, '2022-04-14 13:36:23', '2022-04-14 13:36:23'),
	(187, 8, '13:42:00', NULL, '2022-04-14 13:42:49', '2022-04-14 13:42:49'),
	(188, 2, '13:43:00', NULL, '2022-04-14 13:43:22', '2022-04-14 13:43:22'),
	(189, 1, '13:45:00', NULL, '2022-04-14 13:45:32', '2022-04-14 13:45:32'),
	(190, 5, '13:52:00', NULL, '2022-04-14 13:52:08', '2022-04-14 13:52:08'),
	(191, 7, '15:45:00', NULL, '2022-04-14 15:45:27', '2022-04-14 15:45:27'),
	(192, 1, '09:49:00', NULL, '2022-04-15 09:49:24', '2022-04-15 09:49:24'),
	(193, 1, '09:32:00', NULL, '2022-04-18 09:32:12', '2022-04-18 09:32:12'),
	(194, 1, '09:33:00', NULL, '2022-04-18 09:33:47', '2022-04-18 09:33:47'),
	(195, 2, '10:45:00', NULL, '2022-04-18 10:45:11', '2022-04-18 10:45:11'),
	(196, 2, '10:46:00', NULL, '2022-04-18 10:46:16', '2022-04-18 10:46:16'),
	(197, 7, '11:07:00', NULL, '2022-04-18 11:07:52', '2022-04-18 11:07:52'),
	(198, 7, '14:30:00', NULL, '2022-04-18 14:30:10', '2022-04-18 14:30:10'),
	(199, 2, '15:38:00', NULL, '2022-04-18 15:38:36', '2022-04-18 15:38:36'),
	(200, 2, '15:38:00', NULL, '2022-04-18 15:38:37', '2022-04-18 15:38:37'),
	(201, 1, '15:50:00', NULL, '2022-04-18 15:50:47', '2022-04-18 15:50:47'),
	(202, 1, '09:07:00', NULL, '2022-04-20 09:07:02', '2022-04-20 09:07:02'),
	(203, 1, '10:11:00', NULL, '2022-04-20 10:11:46', '2022-04-20 10:11:46'),
	(204, 2, '10:12:00', NULL, '2022-04-20 10:12:00', '2022-04-20 10:12:00'),
	(205, 8, '10:21:00', NULL, '2022-04-20 10:21:25', '2022-04-20 10:21:25'),
	(206, 8, '10:22:00', NULL, '2022-04-20 10:22:08', '2022-04-20 10:22:08'),
	(207, 7, '10:22:00', NULL, '2022-04-20 10:22:52', '2022-04-20 10:22:52'),
	(208, 8, '10:26:00', NULL, '2022-04-20 10:26:38', '2022-04-20 10:26:38'),
	(209, 8, '10:30:00', NULL, '2022-04-20 10:30:10', '2022-04-20 10:30:10'),
	(210, 8, '10:30:00', NULL, '2022-04-20 10:30:33', '2022-04-20 10:30:33'),
	(211, 8, '10:31:00', NULL, '2022-04-20 10:31:09', '2022-04-20 10:31:09'),
	(212, 8, '10:31:00', NULL, '2022-04-20 10:31:18', '2022-04-20 10:31:18'),
	(213, 8, '10:31:00', NULL, '2022-04-20 10:31:44', '2022-04-20 10:31:44'),
	(214, 8, '10:32:00', NULL, '2022-04-20 10:32:44', '2022-04-20 10:32:44'),
	(215, 1, '10:33:00', NULL, '2022-04-20 10:33:15', '2022-04-20 10:33:15');
/*!40000 ALTER TABLE `login_time` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.memo
CREATE TABLE IF NOT EXISTS `memo` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) DEFAULT NULL,
  `f_title` varchar(50) DEFAULT NULL,
  `f_description` varchar(500) DEFAULT NULL,
  `f_uploaded_file` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.memo: ~23 rows (approximately)
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` (`f_id`, `f_emp_id`, `f_title`, `f_description`, `f_uploaded_file`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1001', 'Testing', 'This is for testing only', 'No', 'Y', '2022-03-11 10:09:36', '2022-04-13 10:33:40'),
	(2, 'PBB1001', 'testing2', 'add memo testing', 'No', 'Y', '2022-03-14 10:38:29', '2022-04-13 10:33:50'),
	(3, 'PBB1001', 'testing3', 'add memo with file', 'No', 'N', '2022-03-14 10:39:29', '2022-03-14 10:39:29'),
	(4, 'PBB1001', 'add file', 'add memo with file', 'sample-file (10).pdf', 'N', '2022-03-14 10:40:18', '2022-03-14 11:50:28'),
	(5, 'PBB1001', 'add file 2', 'add memo eith file 2', 'sample-file (8).pdf', 'N', '2022-03-14 10:41:36', '2022-03-14 11:50:47'),
	(6, 'PBB1001', 'add file 3', 'add memo with file 3', 'sample-file (13).pdf', 'N', '2022-03-14 10:49:21', '2022-03-14 10:49:21'),
	(8, 'PBB1001', 'add file 8', 'tesitng', 'passport_PBB1003_2022.pdf', 'Y', '2022-03-14 13:25:17', '2022-04-11 15:05:37'),
	(9, 'PBB2002', '', '', 'No', 'Y', '2022-03-22 12:10:44', '2022-04-08 10:57:09'),
	(10, 'PBB1001', 'Office Hours for Month of Ramadhan', 'Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf', 'INTERNAL MEMO- Fasting 2022.pdf', 'N', '2022-03-25 10:45:17', '2022-03-25 10:45:17'),
	(11, 'PBB1001', 'Office Hours for Month of Ramadhan', 'Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf', 'INTERNAL MEMO- Fasting 2022.pdf', 'Y', '2022-03-25 10:45:25', '2022-04-13 10:34:08'),
	(12, 'PBB1001', 'Office Hours for Month of Ramadhan', 'Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf', 'No', 'Y', '2022-03-25 10:45:37', '2022-04-08 15:07:36'),
	(13, 'PBB1001', 'testing', 'testing', 'Email Address List Date As 170322.pdf', 'Y', '2022-04-07 09:24:37', '2022-04-08 14:44:53'),
	(14, 'fbsbb', 'dsgdvf', 'dagdag', 'Tuah Resume 2022.pdf', 'Y', '2022-04-07 15:04:19', '2022-04-08 14:43:41'),
	(15, 'fbsbb', 'dsgdvf', 'dagdag', 'Tuah Resume 2022.pdf', 'Y', '2022-04-07 15:04:19', '2022-04-08 14:43:34'),
	(16, 'fbsbb', 'dsgdvf', 'dagdag', 'Tuah Resume 2022.pdf', 'Y', '2022-04-07 15:04:19', '2022-04-08 14:43:28'),
	(17, 'fbsbb', 'dsgdvf', 'dagdag', 'Tuah Resume 2022.pdf', 'Y', '2022-04-07 15:04:20', '2022-04-08 14:43:19'),
	(18, 'PBB1001', 'add file', 'testing', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:13:13', '2022-04-08 14:43:09'),
	(19, 'PBB1001', 'testingbla', 'testing', 'Backend Software Developer (003).pdf', 'Y', '2022-04-08 10:14:07', '2022-04-08 14:43:02'),
	(20, 'PBB1001', 'testblabla', 'testing', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:20:12', '2022-04-08 14:42:54'),
	(21, 'PBB1001', 'testblablabla', 'testing2', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:22:50', '2022-04-08 14:42:47'),
	(22, 'PBB1001', 'testingload', 'testing', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:26:09', '2022-04-08 14:42:37'),
	(23, 'PBB1001', 'testingalal', 'testing', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:27:19', '2022-04-08 14:42:29'),
	(24, 'PBB1001', 'add file', 'testing', 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 10:27:38', '2022-04-08 14:42:18'),
	(25, NULL, 'handbook v1', NULL, 'Announce Public Holiday 2022.pdf', 'Y', '2022-04-08 11:50:35', '2022-04-08 14:42:06'),
	(26, 'PBC1018', 'title', 'description', 'Announce Public Holiday 2022.pdf', 'N', '2022-04-08 15:09:11', '2022-04-08 15:09:11'),
	(27, 'PBB1001', 'Office Hours for Month of Ramadhan', 'Memo cannot Save', 'INTERNAL MEMO- Fasting 2022.pdf', 'N', '2022-04-08 16:02:23', '2022-04-08 16:02:23'),
	(28, 'PBB1001', 'Office Hours for Month of Ramadhan', 'Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. The Management also take the opportunity to wish all Muslim staf', 'INTERNAL MEMO- Fasting 2022.pdf', 'Y', '2022-04-08 16:03:18', '2022-04-13 10:34:00');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.overtime
CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee` varchar(200) NOT NULL,
  `OverTime_Date` date NOT NULL,
  `Hours` varchar(20) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.overtime: ~3 rows (approximately)
/*!40000 ALTER TABLE `overtime` DISABLE KEYS */;
INSERT INTO `overtime` (`id`, `Employee`, `OverTime_Date`, `Hours`, `Type`, `Description`, `dateTime`) VALUES
	(1, 'Mushe Abdul-Hakim', '2020-09-29', '5', '	Normal ex.5', 'This extra minutes are spent on trying to improve my knowledge on programming everyday.', '2020-09-29 00:38:26'),
	(2, 'Goerge Merchason', '2020-09-29', '5', '	Normal ex.5', 'This was just to help the ceo with his presentation prep for tomorrow\'s big event.', '2020-09-29 09:20:37'),
	(3, 'Yahuza Abdul-Hakim', '2020-09-10', '3', 'Normal ex.5', 'This is another test of the overtime of employees', '2020-09-29 09:28:59');
/*!40000 ALTER TABLE `overtime` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_project_id` varchar(50) DEFAULT NULL,
  `f_project_name` varchar(255) DEFAULT NULL,
  `f_project_detail` varchar(500) DEFAULT NULL,
  `f_project_lead` int(11) DEFAULT NULL,
  `f_project_member` int(11) DEFAULT NULL,
  `f_start_date` datetime DEFAULT NULL,
  `f_end_date` datetime DEFAULT NULL,
  `f_priority` varchar(50) DEFAULT NULL,
  `f_status` varchar(50) DEFAULT NULL,
  `f_created_by` int(11) DEFAULT NULL,
  `f_log` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.projects: ~4 rows (approximately)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`f_id`, `f_project_id`, `f_project_name`, `f_project_detail`, `f_project_lead`, `f_project_member`, `f_start_date`, `f_end_date`, `f_priority`, `f_status`, `f_created_by`, `f_log`) VALUES
	(1, 'INT-0001', 'HRMS dashboad', 'internal HRMS detail for ALPHACORE', 1, 24, '2021-12-29 10:34:34', '2021-12-29 10:34:36', '1', '3', 2, '2021-12-29 10:34:37'),
	(2, 'INT-0001', 'HRMS dashboad', 'internal HRMS detail for ALPHACORE', 1, 25, '2021-12-29 10:35:37', '2021-12-29 10:35:38', '1', '3', 2, '2021-12-29 10:35:39'),
	(3, 'INT-0001', 'HRMS dashboad', 'internal HRMS detail for ALPHACORE', 1, 26, '2021-12-29 10:36:03', '2021-12-29 10:36:04', '1', '3', 2, '2021-12-29 10:36:05'),
	(4, 'INT-0001', 'HRMS dashboad', 'internal HRMS detail for ALPHACORE', 1, 27, '2021-12-29 10:36:30', '2021-12-29 10:36:32', '1', '3', 2, '2021-12-29 10:36:32');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.project_assign
CREATE TABLE IF NOT EXISTS `project_assign` (
  `BIL` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) DEFAULT NULL,
  `project_manager` varchar(255) DEFAULT NULL,
  `project_assign` varchar(255) DEFAULT NULL,
  `project_detail` varchar(255) DEFAULT NULL,
  `project_scope` varchar(255) DEFAULT NULL,
  `project_progress` varchar(255) DEFAULT NULL,
  `project_start` varchar(255) DEFAULT NULL,
  `project_duration` varchar(255) DEFAULT NULL,
  `project_pillar` varchar(255) DEFAULT NULL,
  `project_priority` varchar(255) DEFAULT NULL,
  `project_status` varchar(255) DEFAULT NULL,
  `project_role` varchar(255) DEFAULT NULL,
  `project_handover` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BIL`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.project_assign: ~5 rows (approximately)
/*!40000 ALTER TABLE `project_assign` DISABLE KEYS */;
INSERT INTO `project_assign` (`BIL`, `project_name`, `project_manager`, `project_assign`, `project_detail`, `project_scope`, `project_progress`, `project_start`, `project_duration`, `project_pillar`, `project_priority`, `project_status`, `project_role`, `project_handover`) VALUES
	(1, 'project management', 'ethan', 'ZUHAIR', 'one of three module in alphadash', NULL, '2', '14/3/2022', '3 MONTH', 'SOFTWARE CUSTOM', 'Primary', 'Running', NULL, NULL),
	(9, 'ALPHA DASH', 'ETHAN', 'ARIFF', 'Project Management is for monitor, status, and progress the project.', 'ghg', '0', NULL, NULL, 'SOFTWARE CUSTOM', 'HIGH', 'Running', NULL, NULL),
	(11, 'ALPHA DASH', 'ETHAN', 'WAN', 'Project Management is for monitor, status, and progress the project.', 'test', '0', NULL, NULL, 'SOFTWARE CUSTOM', 'HIGH', 'Running', NULL, NULL),
	(12, 'ALPHA DASH', 'ETHAN', 'FOO', 'Project Management is for monitor, status, and progress the project.', 'test', '0', NULL, NULL, 'SOFTWARE CUSTOM', 'HIGH', 'Running', NULL, NULL),
	(13, 'ALPHA DASH', 'ETHAN', 'ZUHAIR', 'Project Management is for monitor, status, and progress the project.', 'test', '0', NULL, NULL, 'SOFTWARE CUSTOM', 'HIGH', 'Running', NULL, NULL);
/*!40000 ALTER TABLE `project_assign` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.project_lists
CREATE TABLE IF NOT EXISTS `project_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_funnel_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=open,',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.project_lists: ~4 rows (approximately)
/*!40000 ALTER TABLE `project_lists` DISABLE KEYS */;
INSERT INTO `project_lists` (`id`, `sales_funnel_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, '2022-03-15 08:18:27', NULL),
	(2, 11, 1, '2022-03-22 22:37:59', NULL),
	(3, 8, 1, '2022-03-24 23:56:36', NULL),
	(4, 48, 1, '2022-04-13 02:46:26', NULL),
	(5, 49, 1, '2022-04-18 02:43:48', NULL);
/*!40000 ALTER TABLE `project_lists` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.project_pillar
CREATE TABLE IF NOT EXISTS `project_pillar` (
  `BIL` int(11) NOT NULL AUTO_INCREMENT,
  `project_pillar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BIL`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.project_pillar: ~8 rows (approximately)
/*!40000 ALTER TABLE `project_pillar` DISABLE KEYS */;
INSERT INTO `project_pillar` (`BIL`, `project_pillar`) VALUES
	(1, 'WEB DEVELOPMENT'),
	(2, 'MOBILE APP DEV'),
	(3, 'ARTIFICIAL INTELIGENCE'),
	(4, 'BIG DATA ANALYTICS'),
	(5, 'SOFTWARE CUSTOM'),
	(6, 'TECHNICAL OUTSOURCING'),
	(7, 'VALUE ADD SERVICES'),
	(8, 'DIGITAL MARKETING');
/*!40000 ALTER TABLE `project_pillar` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.project_value
CREATE TABLE IF NOT EXISTS `project_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_costing` varchar(255) DEFAULT NULL,
  `project_definition` varchar(255) DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `project_quality` varchar(255) DEFAULT NULL,
  `project_rate` varchar(255) DEFAULT NULL,
  `project_total_man` varchar(255) DEFAULT NULL,
  `project_total` varchar(255) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `project_total_cost` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.project_value: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_value` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.purchase
CREATE TABLE IF NOT EXISTS `purchase` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) DEFAULT NULL,
  `f_purchase_name` varchar(50) DEFAULT NULL,
  `f_purchase_from` varchar(50) DEFAULT NULL,
  `f_purchase_date` varchar(50) DEFAULT NULL,
  `f_purchase_amt` decimal(20,2) DEFAULT NULL,
  `f_paid_by` varchar(50) DEFAULT NULL,
  `f_review1` varchar(50) DEFAULT NULL,
  `f_review2` varchar(50) DEFAULT NULL,
  `f_status` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.purchase: ~4 rows (approximately)
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` (`f_id`, `f_emp_id`, `f_purchase_name`, `f_purchase_from`, `f_purchase_date`, `f_purchase_amt`, `f_paid_by`, `f_review1`, `f_review2`, `f_status`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'PBB1002', 'Name1', 'Lowyat', '2022-04-07', 1000.00, 'Transfer', 'PBB1001', NULL, 'checked', 'Y', '2022-04-11 14:18:46', '2022-04-13 16:55:45'),
	(2, 'PBB1002', 'Name2', 'Lowyat', '2022-04-07', 200.00, 'Transfer', 'PBB1001', NULL, 'rejected', 'N', '2022-04-11 14:18:47', '2022-04-13 18:46:23'),
	(3, '3', 'Name1', 'Lowyat', '2022-04-01', 1000.00, 'Transfer', NULL, NULL, 'Pending', 'N', '2022-04-14 10:56:49', '2022-04-14 10:56:49'),
	(4, '7', 'Photocopier Machine', 'Blue Solutions Sdn Bhd', '2022-04-26', 0.00, 'Online Banking', NULL, NULL, 'Pending', 'N', '2022-04-14 11:41:16', '2022-04-14 11:41:16'),
	(5, '8', 'item1', 'lowyat', '2022-04-08', 1000.00, 'transfer', NULL, NULL, 'Pending', 'N', '2022-04-14 13:06:01', '2022-04-14 13:06:01');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.quotes
CREATE TABLE IF NOT EXISTS `quotes` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) NOT NULL,
  `f_quotes` varchar(225) DEFAULT NULL,
  `f_proposal` varchar(225) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.quotes: ~5 rows (approximately)
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` (`f_id`, `f_emp_id`, `f_quotes`, `f_proposal`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, '', 'testing22', 'Announce Public Holiday 2022.pdf', '2022-04-06', NULL, '2022-04-14 10:27:10'),
	(2, '', 'Many of life’s failures are people who did not realize how close they were to success when they gave up.”– Thomas A. Edison', 'UNIVERSITI TEKNOLOGI MARA - EXAMINATION RESULT SEM 5.pdf', '2022-04-13', NULL, NULL),
	(3, '', '“Money and success don’t change people; they merely amplify what is already there.” — Will Smith', 'UNIVERSITI TEKNOLOGI MARA - EXAMINATION RESULT SEM 5.pdf', '2022-04-13', NULL, NULL),
	(4, 'PBB1001', 'testing22', 'Announce Public Holiday 2022.pdf', 'N', '2022-04-14 10:08:48', '2022-04-14 10:31:30'),
	(5, 'PBB1001', 'testing33', 'Email Address List Date As 170322.pdf', 'Y', '2022-04-14 10:34:45', '2022-04-14 10:35:21');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.sales_appointment
CREATE TABLE IF NOT EXISTS `sales_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `pic_name` text NOT NULL,
  `pic_position` text NOT NULL,
  `pic_mobile` text NOT NULL,
  `pic_email` text NOT NULL,
  `remark` text NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `appointment_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.sales_appointment: ~9 rows (approximately)
/*!40000 ALTER TABLE `sales_appointment` DISABLE KEYS */;
INSERT INTO `sales_appointment` (`id`, `company_name`, `pic_name`, `pic_position`, `pic_mobile`, `pic_email`, `remark`, `employee_id`, `appointment_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'tester1', 'wer', 'werw', 'wertewrt', 'wertet', 'wertwert', 9, '2022-01-25 01:37:00', '2022-03-25 00:07:46', NULL, 0, 0),
	(2, 'test2', '', '', '', '', '', 21, '2022-02-03 10:00:00', '2022-01-26 01:49:32', NULL, 0, 0),
	(3, 'demo1w3e', '', '', '', '', '', 22, '2022-01-28 08:26:00', '2022-01-26 03:25:48', NULL, 0, 0),
	(4, 'popwer', 'weuirie', 'knqwebr', 'qerfq3r', 'enrjer.cdxicdm.com', 'testinge', 21, '2022-02-04 12:17:00', '2022-02-03 22:30:35', NULL, 0, 0),
	(5, 'kokok', 'okokok', 'okoko', 'okoko', 'okoko', 'test', 25, '2022-02-17 13:25:00', '2022-02-03 21:22:41', NULL, 0, 0),
	(9, 'Taman Gembur Dan Rata', 'Najmi', 'Software Developer', '0136134022', 'najmiemon4223@gmail.com', '                         lola           ', 0, '2022-04-21 00:00:00', '2022-04-15 00:13:49', '2022-04-15 00:13:49', 0, 0),
	(10, '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '2022-04-15 01:08:05', '2022-04-15 01:08:05', 0, 0),
	(11, 'Taman Gembur Dan Rata', 'Najmi', 'Software Developer', '0136134022', 'najmiemon4223@gmail.com', '                                    lola', 0, '2022-04-06 18:49:00', '2022-04-15 02:45:12', '2022-04-15 02:45:12', 0, 0),
	(12, 'Heitech Padu Berhad', 'Ahmad Najmi bin Sidek', 'Senior Software Developer', '014444444', 'lola@gmail.com', 'istifgar', 8, '1998-12-30 14:00:00', '2022-04-15 03:28:52', '2022-04-15 03:28:52', 0, 0);
/*!40000 ALTER TABLE `sales_appointment` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.sales_funnel
CREATE TABLE IF NOT EXISTS `sales_funnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_receive_date` varchar(50) DEFAULT '0',
  `project_dateline` varchar(50) DEFAULT '0',
  `project_manager` varchar(255) DEFAULT NULL,
  `project_start` varchar(255) DEFAULT NULL,
  `project_due_date` varchar(255) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT '0',
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `customer_contact` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_position` varchar(255) DEFAULT NULL,
  `project_name` varchar(50) DEFAULT '0',
  `project_detail` varchar(255) DEFAULT '0',
  `project_priority` varchar(255) DEFAULT NULL,
  `project_team` varchar(255) DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT '0',
  `pic_mobile` varchar(50) DEFAULT '0',
  `pic_email` varchar(50) DEFAULT '0',
  `value` varchar(50) DEFAULT '0',
  `project_po_date` varchar(50) DEFAULT '0',
  `chance` varchar(50) DEFAULT '0',
  `project_pillar` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT '0',
  `actions` varchar(50) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `pillar_1` varchar(50) DEFAULT NULL,
  `pillar_2` varchar(50) DEFAULT NULL,
  `pillar_3` varchar(50) DEFAULT NULL,
  `pillar_4` varchar(50) DEFAULT NULL,
  `pillar_5` varchar(50) DEFAULT NULL,
  `pillar_6` varchar(50) DEFAULT NULL,
  `pillar_7` varchar(50) DEFAULT NULL,
  `pillar_8` varchar(50) DEFAULT NULL,
  `pillar_9` varchar(50) DEFAULT NULL,
  `pillar_others` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT '0',
  `updated_by` varchar(50) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assign_task` varchar(255) DEFAULT NULL,
  `project_progress` varchar(255) DEFAULT NULL,
  `total_hours` varchar(255) DEFAULT NULL,
  `project_duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.sales_funnel: ~43 rows (approximately)
/*!40000 ALTER TABLE `sales_funnel` DISABLE KEYS */;
INSERT INTO `sales_funnel` (`id`, `project_receive_date`, `project_dateline`, `project_manager`, `project_start`, `project_due_date`, `customer_name`, `company_name`, `company_address`, `customer_contact`, `customer_email`, `customer_position`, `project_name`, `project_detail`, `project_priority`, `project_team`, `pic_name`, `pic_mobile`, `pic_email`, `value`, `project_po_date`, `chance`, `project_pillar`, `status`, `actions`, `employee_id`, `pillar_1`, `pillar_2`, `pillar_3`, `pillar_4`, `pillar_5`, `pillar_6`, `pillar_7`, `pillar_8`, `pillar_9`, `pillar_others`, `created_by`, `updated_by`, `created_at`, `updated_at`, `assign_task`, `project_progress`, `total_hours`, `project_duration`) VALUES
	(5, '2021-12-28', '2022-01-07', 'ETHAN', '19/04/2022', '29/04/2022', 'wan', NULL, NULL, NULL, NULL, NULL, 'hrms', 'hrms dashboard  									', 'HIGH', NULL, 'foo', '0', 'foo@gd.co', '123', '2021-12-30', '50', '0', '3', 'test', '21', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, '', '0', '0', '2021-12-28 04:20:43', NULL, 'Yes', NULL, NULL, NULL),
	(6, '2021-12-29', '2022-01-08', NULL, NULL, NULL, 'wanwqe', NULL, NULL, NULL, NULL, NULL, 'test', 'testign  									', NULL, NULL, 'amsyar', '0', 'amsjn@.dn.com', '2000', '2022-01-07', '50', '0', '3', 'test', '21', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, '', '0', '0', '2021-12-28 23:26:58', NULL, NULL, NULL, NULL, NULL),
	(8, '2022-01-09', '2022-01-11', NULL, NULL, NULL, 'cust1', NULL, NULL, NULL, NULL, NULL, 'test project', 'this is project details				', NULL, NULL, 'james', '01939339393', 'james@mken.com', '50000', '2022-01-10', '50', '0', '3', 'meeting', '25', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'web and mobile only', '0', '0', '2022-01-09 06:40:52', NULL, NULL, NULL, NULL, NULL),
	(9, '2022-01-12', '22 Jan 2022', NULL, NULL, NULL, 'demo ahad34', NULL, NULL, NULL, NULL, NULL, 'demo 1 selasa34234', 'ahad234234', NULL, NULL, 'arif ahad234234', '019838448 ahad234234', 'arif@ngkd.com ahadavav', '39000 ahad234234', '2022-01-21', '59 ahad234234', '0', '3', ' ahad23434', '9', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'other pillarfdr ahad', '0', '0', '2022-01-11 23:05:44', NULL, NULL, NULL, NULL, NULL),
	(10, '2022-01-19', '2022-01-20', NULL, NULL, NULL, 'testing', NULL, NULL, NULL, NULL, NULL, 'test', '				testing					', NULL, NULL, 'koo', '01933939', 'ki@ggd.com', '5000', '2022-01-20', '80', '0', '5', '222', '9', 'on', '', '', '', 'on', '', '', '', NULL, 'test', '0', '0', '2022-01-19 01:53:07', NULL, NULL, NULL, NULL, NULL),
	(11, '2022-01-20', '2022-01-20', NULL, NULL, NULL, 'popo', NULL, NULL, NULL, NULL, NULL, 'iieie', '						ffeer			', NULL, NULL, 'jenje', '013393399', 'dfjdf@hmgg.com', '400', '2022-01-29', '49', '0', '3', 'test', '21', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'dfvds', '0', '0', '2022-01-19 01:53:57', NULL, NULL, NULL, NULL, NULL),
	(12, '2022-01-20', '2022-01-22', NULL, NULL, NULL, 'rhrb', NULL, NULL, NULL, NULL, NULL, 'ybryrb', '				test					', NULL, NULL, 'yvryrb', 'yvrywv', 'wsds@fs.com', '3000', '2022-01-21', '23', '0', '1', '222', '9', 'on', '', '', '', '', '', '', '', NULL, '', '0', '0', '2022-01-20 02:10:55', NULL, NULL, NULL, NULL, NULL),
	(13, '2022-01-21', '2022-01-22', NULL, NULL, NULL, 'fri test', NULL, NULL, NULL, NULL, NULL, 'testererere', '		test							', NULL, NULL, 'test', '019393939', 'eef@fre.com', '4000', '2022-01-22', '50', '0', '1', 'meeting', '24', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'testing', '0', '0', '2022-01-20 23:27:51', NULL, NULL, NULL, NULL, NULL),
	(14, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 04:57:57', NULL, NULL, NULL, NULL, NULL),
	(15, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 04:58:31', NULL, NULL, NULL, NULL, NULL),
	(16, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:06:08', NULL, NULL, NULL, NULL, NULL),
	(17, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:08:02', NULL, NULL, NULL, NULL, NULL),
	(18, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:08:14', NULL, NULL, NULL, NULL, NULL),
	(19, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:08:53', NULL, NULL, NULL, NULL, NULL),
	(20, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:10:24', NULL, NULL, NULL, NULL, NULL),
	(21, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:10:56', NULL, NULL, NULL, NULL, NULL),
	(22, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:11:58', NULL, NULL, NULL, NULL, NULL),
	(23, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:12:44', NULL, NULL, NULL, NULL, NULL),
	(24, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:13:07', NULL, NULL, NULL, NULL, NULL),
	(25, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:13:39', NULL, NULL, NULL, NULL, NULL),
	(26, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:13:48', NULL, NULL, NULL, NULL, NULL),
	(27, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:13:54', NULL, NULL, NULL, NULL, NULL),
	(28, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:13:59', NULL, NULL, NULL, NULL, NULL),
	(29, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:14:10', NULL, NULL, NULL, NULL, NULL),
	(30, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:14:36', NULL, NULL, NULL, NULL, NULL),
	(31, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:14:54', NULL, NULL, NULL, NULL, NULL),
	(32, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:15:20', NULL, NULL, NULL, NULL, NULL),
	(33, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:15:29', NULL, NULL, NULL, NULL, NULL),
	(34, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:15:43', NULL, NULL, NULL, NULL, NULL),
	(35, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:17:34', NULL, NULL, NULL, NULL, NULL),
	(36, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:18:27', NULL, NULL, NULL, NULL, NULL),
	(37, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:19:22', NULL, NULL, NULL, NULL, NULL),
	(38, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:19:50', NULL, NULL, NULL, NULL, NULL),
	(39, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:21:21', NULL, NULL, NULL, NULL, NULL),
	(40, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:21:54', NULL, NULL, NULL, NULL, NULL),
	(41, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:22:07', NULL, NULL, NULL, NULL, NULL),
	(42, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:22:16', NULL, NULL, NULL, NULL, NULL),
	(43, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:31:35', NULL, NULL, NULL, NULL, NULL),
	(44, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:31:51', NULL, NULL, NULL, NULL, NULL),
	(45, '2022-04-08', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		DSADA							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-07', '20', '0', '1', 'meme', '21', '', '', '', '', '', '', '', '', 'on', '', '0', '0', '2022-04-12 05:32:08', NULL, NULL, NULL, NULL, NULL),
	(46, '2022-04-06', '2022-04-29', NULL, NULL, NULL, 'Taman Gembur Dan Ratasss', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.02.0', '		DSADA							', NULL, NULL, 'Najmiee', '013613402244', 'najmiemon4223@gmail.comee', '208021', '2022-04-07', '202', '0', '1', 'memes', '21', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'sada', '0', '0', '2022-04-12 05:32:45', NULL, NULL, NULL, NULL, NULL),
	(47, '2022-04-14', '2022-04-14', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		nona							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-14', '20', '0', '1', 'meme', '21', '', '', '', 'on', '', '', '', '', 'on', 'migration file', '0', '0', '2022-04-13 00:13:27', NULL, NULL, NULL, NULL, NULL),
	(48, '2022-04-07', '2022-04-28', NULL, NULL, NULL, 'Taman Gembur Dan Rata', NULL, NULL, NULL, NULL, NULL, 'Eclipse 2.0', '		resting							', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-06', '20', '0', '3', 'meme', '21', 'null', 'null', 'null', 'on', 'null', 'null', 'null', 'null', 'on', '', '0', '0', '2022-04-13 02:45:01', NULL, NULL, NULL, NULL, NULL),
	(49, '2022-04-19', '2022-04-19', NULL, NULL, NULL, 'Heitech Padu Berhad', NULL, NULL, NULL, NULL, NULL, 'alphadash', '				details					', NULL, NULL, 'Najmi', '0136134022', 'najmiemon4223@gmail.com', '2080', '2022-04-18', '20', '0', '3', 'meme', '8', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'on', '', '0', '0', '2022-04-18 02:43:18', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `sales_funnel` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.sales_funnel_document
CREATE TABLE IF NOT EXISTS `sales_funnel_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_funnel_id` int(11) NOT NULL DEFAULT 0,
  `document_path` varchar(200) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.sales_funnel_document: ~7 rows (approximately)
/*!40000 ALTER TABLE `sales_funnel_document` DISABLE KEYS */;
INSERT INTO `sales_funnel_document` (`id`, `sales_funnel_id`, `document_path`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 46, 'file/sales_document/gEn8Lrr0ZMco8YaV5RXKi231o3T5B0_20220412173245.pdf', 0, 0, '2022-04-12 05:32:45', NULL),
	(2, 46, 'file/sales_document/tDDgll8FnO6KeVArpnYLA7ZSNVXV7n_20220413030658.xlsx', 0, 0, '2022-04-12 15:06:58', NULL),
	(3, 46, 'file/sales_document/FXjwXvONNtzKCvxbbPLF7v9ErHmwPZ_20220413030720.pdf', 0, 0, '2022-04-12 15:07:20', NULL),
	(4, 47, 'file/sales_document/ir1uFiJ2PtbssVvcHkXbDnvM2cDrjZ_20220413121327.pdf', 0, 0, '2022-04-13 00:13:27', NULL),
	(5, 48, 'file/sales_document/YUdizwkwfZp53sFzDuOgNLROcqHYtU_20220413144501.pdf', 0, 0, '2022-04-13 02:45:01', NULL),
	(6, 48, 'file/sales_document/AZGw4xVRkyzsjUEXtsDbH3xYJQ8KU6_20220413064535.pdf', 0, 0, '2022-04-12 18:45:35', NULL),
	(7, 48, 'file/sales_document/MbThgQNV0rpANjry3turJGVWmFQ7QQ_20220413064626.', 0, 0, '2022-04-12 18:46:26', NULL),
	(8, 49, 'file/sales_document/0kGD7ifHJr4dTgCj7w6uwKjTE95woq_20220418144318.pdf', 0, 0, '2022-04-18 14:43:18', NULL);
/*!40000 ALTER TABLE `sales_funnel_document` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.sales_value
CREATE TABLE IF NOT EXISTS `sales_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `year` int(11) NOT NULL DEFAULT 0,
  `kpi_jan` int(11) DEFAULT 0,
  `kpi_feb` int(11) DEFAULT 0,
  `kpi_mar` int(11) DEFAULT 0,
  `kpi_apr` int(11) DEFAULT 0,
  `kpi_may` int(11) DEFAULT 0,
  `kpi_jun` int(11) DEFAULT 0,
  `kpi_jul` int(11) DEFAULT 0,
  `kpi_aug` int(11) DEFAULT 0,
  `kpi_sep` int(11) DEFAULT 0,
  `kpi_oct` int(11) DEFAULT 0,
  `kpi_nov` int(11) DEFAULT 0,
  `kpi_dec` int(11) DEFAULT 0,
  `act_jan` int(11) DEFAULT 0,
  `act_feb` int(11) DEFAULT 0,
  `act_mar` int(11) DEFAULT 0,
  `act_apr` int(11) DEFAULT 0,
  `act_may` int(11) DEFAULT 0,
  `act_jun` int(11) DEFAULT 0,
  `act_jul` int(11) DEFAULT 0,
  `act_aug` int(11) DEFAULT 0,
  `act_sep` int(11) DEFAULT 0,
  `act_oct` int(11) DEFAULT 0,
  `act_nov` int(11) DEFAULT 0,
  `act_dec` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.sales_value: ~10 rows (approximately)
/*!40000 ALTER TABLE `sales_value` DISABLE KEYS */;
INSERT INTO `sales_value` (`id`, `employee_id`, `year`, `kpi_jan`, `kpi_feb`, `kpi_mar`, `kpi_apr`, `kpi_may`, `kpi_jun`, `kpi_jul`, `kpi_aug`, `kpi_sep`, `kpi_oct`, `kpi_nov`, `kpi_dec`, `act_jan`, `act_feb`, `act_mar`, `act_apr`, `act_may`, `act_jun`, `act_jul`, `act_aug`, `act_sep`, `act_oct`, `act_nov`, `act_dec`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(4, 28, 2021, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 0, 0, NULL, NULL),
	(6, 27, 2021, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500, 0, 0, NULL, NULL),
	(8, 24, 2022, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 800, 700, 1200, 1500, 1000, 900, 1200, 500, 600, 700, 2000, 1900, 0, 0, NULL, NULL),
	(9, 21, 2022, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(10, 9, 2022, 150000, 232323, 10003, 10004, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 150000, 9000, 1900, 28000, 200, 800, 1200, 700, 1900, 400, 800, 800, 0, 0, NULL, NULL),
	(11, 26, 2022, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1500, 1500, 1500, 1500, 1000, 500, 300, 1000, 1000, 500, 700, 890, 0, 0, NULL, NULL),
	(12, 9, 2021, 333344, 12002, 10003, 10004, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 150000, 9000, 1900, 28000, 200, 800, 1200, 700, 1900, 400, 800, 800, 0, 0, NULL, NULL),
	(13, 9, 2023, 10034, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 1001, 100, 1100, 100, 120, 120, 110, 100, 80, 0, 0, NULL, NULL),
	(14, 24, 2024, 150, 232324, 170, 180, 190, 200, 210, 220, 230, 240, 250, 260, 150, 2500, 190, 170, 20, 500, 210, 250, 500, 100, 115, 210, 0, 0, NULL, NULL),
	(15, 28, 2022, 150, 232324, 170, 180, 190, 200, 210, 220, 230, 240, 250, 260, 150, 2500, 190, 170, 20, 500, 210, 250, 500, 100, 115, 210, 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `sales_value` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Phone`, `Address`, `Picture`, `dateTime`) VALUES
	(6, 'Barry', 'Cudo', 'Barry', 'barrycuda@example.com', '$2y$10$zb2ibzzBKJHQaMeMoMZqTuRxERFAZl0LZUya8yJkxKa8JM6yzQEXy', '9876543210', 'Los Angeles, California', 'avatar-19.jpg', '2020-09-21 19:04:47'),
	(7, 'Yahuza', 'Abdul-Hakim', 'Vendetta', 'musheabdulhakim@protonmail.ch', '$2y$10$f3acNJ/slpOfQvZy.u6OfOM6GOLTTjz3IYUIbMMQuixXjmgeRQ0Ga', '233209229025', 'San Francisco Bay Area', 'my-passport-photo.jpg', '2020-09-21 19:05:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table alphacor_smarthr2.user_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`, `date`) VALUES
	(1, 'admin\r\n', '2020-09-21'),
	(2, 'employee', '2020-09-21');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.vacancy
CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(225) DEFAULT '',
  `availibility` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.vacancy: ~0 rows (approximately)
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`id`, `position`, `availibility`) VALUES
	(1, 'Web Developer', 2),
	(2, 'ADMIN CUM SALES EXECUTIVES', 1),
	(3, 'Software Developer', 4);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;

-- Dumping structure for table alphacor_smarthr2.visitor
CREATE TABLE IF NOT EXISTS `visitor` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_visitor_name` varchar(225) DEFAULT NULL,
  `f_comp_name` varchar(225) DEFAULT NULL,
  `f_phone_no` varchar(225) DEFAULT NULL,
  `f_email` varchar(225) DEFAULT NULL,
  `f_purpose` varchar(225) DEFAULT NULL,
  `f_date` varchar(225) DEFAULT NULL,
  `f_delete` varchar(225) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table alphacor_smarthr2.visitor: ~6 rows (approximately)
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` (`f_id`, `f_visitor_name`, `f_comp_name`, `f_phone_no`, `f_email`, `f_purpose`, `f_date`, `f_delete`, `f_created_date`, `f_modified_date`) VALUES
	(1, 'najib', 'top glove', '01133544230', 'najib@gmail.com', 'new project meeting', '11/4/2022', 'N', '2022-04-13 14:45:14', '2022-04-13 14:45:20'),
	(2, 'jibby', 'jibby.co', '0164327495', 'jibby@gmail.com', 'company visit', '12/4/2022', 'N', '2022-04-13 14:45:16', '2022-04-13 14:45:24'),
	(3, 'Cheang', 'Respontrade', '014-7450996', 'cheang@orespontrade.com', 'HRMS Meeting', '2022-04-13', 'N', '2022-04-13 14:45:18', '2022-04-13 14:45:29'),
	(4, 'testing', 'testing.co', '4643524168', 'testing@gmail.com', 'testing2', '', 'Y', '2022-04-13 15:06:40', '2022-04-13 15:32:49'),
	(5, 'testung', 'testing.co', '012234567890', 'testing@gmail.com', 'testing', '2022-04-27', 'N', '2022-04-14 13:15:06', '2022-04-14 13:15:06'),
	(6, 'abc123', 'testing.co', '012234567890', 'testing@gmail.com', 'testing', '2022-04-21', 'N', '2022-04-14 13:19:27', '2022-04-14 13:19:27');
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
