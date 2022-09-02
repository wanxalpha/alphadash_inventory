-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 67.23.254.53    Database: alphacor_alphadash-sales
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.23-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (1,'Macbook Book','2020-09-23','Amazon','Apple Inc.','2020',1,'Amazon','In good shape','12 Months',1900,'Mushe abdul-Hakim','This is the description of the laptop','2020-09-23 23:57:26');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_bank_name` varchar(50) NOT NULL DEFAULT '',
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (1,'Maybank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'CIMB Bank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'RHB Bank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Public Bank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Citibank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Hong Leong Bank Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Ambank Malaysia Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Alliance bank Malaysia Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Affin Bank','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'HSBC Bank (M) Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Bank Islam Malaysia Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'Agro Bank','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'UOB Bank','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'Bank Muamalat Malaysia Berhad','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'Standard Chartered Malaysia','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'OCBC Bank','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'Bank Rakyat','N','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_slip`
--

DROP TABLE IF EXISTS `bank_slip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_slip` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_slip`
--

LOCK TABLES `bank_slip` WRITE;
/*!40000 ALTER TABLE `bank_slip` DISABLE KEYS */;
INSERT INTO `bank_slip` VALUES (1,'PBB1001','1','Kepong','514141665347',4200.00,'5454165',378.00,'41564648908',21.00,'SG40026997102',NULL,'45614632',8.40,'2022-03-04 16:36:30','2022-04-13 10:23:23'),(2,'PBB1006','3','Setia Alam','661',3300.00,'2131',297.00,'213',16.50,'123',NULL,'123',6.60,'2022-04-07 13:19:26','2022-04-08 13:34:47'),(3,'PBB1002','15','Klang','789456123012',4200.00,'5454165',378.00,'4156464',21.00,'SG4000976899',NULL,'456465465',8.40,'2022-04-07 15:23:39','2022-04-08 13:35:20'),(4,'PBC1018','4','Kepong','6910358532',12213.00,'21805584',1099.17,'960101086500',61.07,'25403018010',NULL,'960101086500',24.43,'2022-04-08 13:57:48','2022-04-13 10:27:44'),(5,'PBC1001','5','Shah Alam','514141665347',50000.00,'5454165',4500.00,'4156464',250.00,'SG40026997100',NULL,'68468464',100.00,'2022-04-11 16:39:07','2022-04-13 10:29:13');
/*!40000 ALTER TABLE `bank_slip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_type`
--

DROP TABLE IF EXISTS `claim_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claim_type` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_claim_type` varchar(50) NOT NULL DEFAULT '0',
  `f_max_claim` varchar(50) NOT NULL DEFAULT '0',
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_type`
--

LOCK TABLES `claim_type` WRITE;
/*!40000 ALTER TABLE `claim_type` DISABLE KEYS */;
INSERT INTO `claim_type` VALUES (1,'Parking Fees','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Toll Fees','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Entertainment','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Public Transport','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Medical ','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Others','0','N','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `claim_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claims`
--

DROP TABLE IF EXISTS `claims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claims` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claims`
--

LOCK TABLES `claims` WRITE;
/*!40000 ALTER TABLE `claims` DISABLE KEYS */;
INSERT INTO `claims` VALUES (1,'PBB1002','3','testing2','March','Rejected',100.00,'2022-04-06','Rejected','PBB1001','2022-04-12 15:49:30','2022-04-12 17:18:42'),(2,'PBB1002','1','testing1','March','Rejected',100.00,'2022-04-06','Rejected','PBB1001','2022-04-12 15:49:31','2022-04-12 17:18:42');
/*!40000 ALTER TABLE `claims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Yahuza','Abdul-Hakim','Vendetta','musheabdulhakim@protonmail.ch','$2y$10$xU1zDRigag7ZMGs0Egcqoei0SrtZJRX/p425h4qOi5OMKFz32k0UC','233209229025','Microsoft Inc','Live from home',1,'d41d8cd98f00b204e9800998ecf8427e1601112041','2020-09-26 00:00:00'),(2,'Vendetta','Alkaline','alkaline','musheabdulhakim99@gmail.com','$2y$10$qUL2APr762X.vvJuNQvqludvabDa.Y3TRHOa.M/qq8WFoeoh7IaWG','233209229025','Falcon Systems','Live from home',1,'d41d8cd98f00b204e9800998ecf8427e1601112339','2020-09-26 00:00:00');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_name` varchar(500) DEFAULT NULL,
  `f_contact` varchar(500) DEFAULT NULL,
  `f_address` varchar(500) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  `f_logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Alphacore Technology',NULL,NULL,NULL,'2022-04-28 10:07:30','2022-04-28 10:07:30',NULL),(2,'Alphacoretech',NULL,NULL,'N','2022-04-28 10:19:39','2022-04-28 10:19:39',NULL),(3,'Alphacore Technology',NULL,NULL,'N','2022-04-29 10:48:42','2022-04-29 10:48:42',NULL),(4,'Alphacore Technology','0163017149','7, lorong batu nilam 33c','N','2022-05-09 15:36:56','2022-05-09 15:36:56','1646385930.jpg'),(5,'company1','0123456789','7, lorong batu nilam 33c','N','2022-05-17 15:26:37','2022-05-17 15:26:37',NULL),(6,'company2','0123456789','7, lorong batu nilam 33c','N','2022-05-17 16:25:48','2022-05-17 16:25:48',NULL),(7,'Company Demo','0123456789','7, lorong batu nilam 33c','N','2022-05-17 16:25:48','2022-05-17 16:25:48',NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_id` int(11) NOT NULL,
  `f_department` varchar(200) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL,
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`f_id`) USING BTREE,
  UNIQUE KEY `Department` (`f_department`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (37,0,'HR department','N','2022-04-29 11:16:15','2022-04-29 11:16:15','HR'),(38,0,'Project Department','N','2022-04-29 11:31:15','2022-04-29 11:31:15','PD'),(39,0,'Software Department','N','2022-04-29 11:35:02','2022-04-29 11:35:02',NULL),(40,0,'Sales and Marketing','Y','2022-05-06 11:16:32','2022-05-06 11:16:44','SM');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designations` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_id` int(11) NOT NULL DEFAULT 0,
  `f_position` varchar(255) NOT NULL,
  `f_department` int(11) NOT NULL DEFAULT 0,
  `f_user_level` varchar(50) NOT NULL,
  `f_post_code` varchar(50) NOT NULL,
  `f_delete` varchar(50) NOT NULL DEFAULT 'N',
  `f_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `f_modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`f_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (32,0,'Human Resource Manager',37,'','HR1','N','2022-04-29 11:16:44','2022-04-29 11:16:44'),(33,0,'Chief Of Project Department',38,'','PD','N','2022-04-29 11:31:45','2022-04-29 11:31:45'),(34,0,'Senior Software Developer',39,'','SD','N','2022-04-29 11:35:16','2022-04-29 11:35:16'),(35,0,'Software Developer (FullStack)',39,'','SDF','N','2022-04-29 11:35:44','2022-04-29 11:35:44');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_background`
--

DROP TABLE IF EXISTS `education_background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education_background` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_background`
--

LOCK TABLES `education_background` WRITE;
/*!40000 ALTER TABLE `education_background` DISABLE KEYS */;
INSERT INTO `education_background` VALUES (1,'PBB1001','The Nielsen Company Sdn Bhd','Data Processing Specialist','2',3200.00,'Rakuten Trade Sdn Bhd','Java Developer','0.3',4000.00,'Respontrade Sdn BhdTech Sdn. Bhd','Admin Cum Sales ExecutivesDeveloper','0.3',12231231.00,'3','Asia Pacific University','Bsc(Hons)IT Specialised in Business Information System','2018','3.0','3','Kolej Polytech Mara','Dip','2011','3A',NULL,NULL,NULL,NULL,NULL,'PHP Laravel','2','HTML CSS Javascript','2','SQL database','4',NULL,NULL,NULL,NULL,'N','2022-03-04 16:36:29','2022-04-11 14:31:02'),(2,'PBB1005','top glove','web developer','1',1300.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','2022-04-07 13:16:18','2022-04-07 13:16:18'),(3,'PBB1006','top glove','web developer','1',1300.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','UTM','Bioinformatics','2022','3.56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'php','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','2022-04-07 13:19:19','2022-04-07 13:19:24'),(4,'PBB1002','','','',0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Select Study Type','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','2022-04-07 15:23:31','2022-04-07 15:23:36'),(5,'PBC1018','','','',0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Select Study Type','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','2022-04-08 13:57:25','2022-04-08 13:57:26'),(6,'PBC1001','','','',0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Select Study Type','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','2022-04-11 16:38:58','2022-04-11 16:39:04');
/*!40000 ALTER TABLE `education_background` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` varchar(50) NOT NULL,
  `f_company_id` int(11) NOT NULL DEFAULT 0,
  `f_username` varchar(255) DEFAULT NULL,
  `f_full_name` varchar(255) DEFAULT NULL,
  `f_first_name` varchar(100) NOT NULL,
  `f_last_name` varchar(255) DEFAULT NULL,
  `f_contact` varchar(20) NOT NULL,
  `f_emp_status` varchar(20) NOT NULL,
  `f_home_tel` varchar(20) DEFAULT '0',
  `f_address` varchar(255) NOT NULL DEFAULT '0',
  `f_cor_address` varchar(255) NOT NULL DEFAULT '0',
  `f_email` varchar(100) NOT NULL DEFAULT '0',
  `f_birth_date` varchar(50) NOT NULL DEFAULT '',
  `f_gender` varchar(50) NOT NULL DEFAULT '',
  `f_country` varchar(20) NOT NULL DEFAULT '0',
  `f_identity` varchar(50) NOT NULL DEFAULT '0',
  `f_identity_img` varchar(50) NOT NULL DEFAULT '0',
  `f_race` varchar(50) NOT NULL DEFAULT '0',
  `f_religion` varchar(50) NOT NULL DEFAULT '0',
  `f_permit_from` varchar(50) NOT NULL DEFAULT '',
  `f_permit_to` varchar(50) NOT NULL DEFAULT 'current_timestamp()',
  `f_marital` int(11) NOT NULL DEFAULT 0,
  `f_spouse` varchar(50) NOT NULL DEFAULT '0',
  `f_children` int(11) NOT NULL DEFAULT 0,
  `f_ec1_name` varchar(255) NOT NULL DEFAULT '0',
  `f_ec1_relationship` varchar(50) NOT NULL DEFAULT '0',
  `f_ec1_contact` varchar(50) NOT NULL DEFAULT '0',
  `f_ec2_name` varchar(255) NOT NULL DEFAULT '0',
  `f_ec2_relationship` varchar(50) NOT NULL DEFAULT '0',
  `f_ec2_contact` varchar(50) NOT NULL DEFAULT '0',
  `f_picture` varchar(200) NOT NULL DEFAULT '0',
  `f_permit_picture` varchar(200) NOT NULL DEFAULT '0',
  `f_resume` varchar(200) NOT NULL DEFAULT '0',
  `f_com_email` varchar(100) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'PAA1001',4,NULL,NULL,'Ethan','Chang','','1','','0','0','','','','','0','','','','','current_timestamp()',0,'',0,'0','0','0','0','0','0','1649907012.jpg','','','ethan@alphacoretech.net',0.00,0.00,40,33,'ethan123','current_timestamp()','Master','N','2022-05-09 15:36:56','2022-05-09 15:36:56'),(10,'16q01',4,NULL,NULL,'Sara','Ooi','','','','0','0','','','','','0123123123','','','','','current_timestamp()',0,'',0,'0','0','0','0','0','0','','','','sarah@alphacoretech.net',0.00,0.00,40,0,'sarah123','current_timestamp()','Master','N','2022-05-11 03:30:19','2022-05-11 03:30:19'),(11,'SEC20011450',4,NULL,'testing','Zesha','Hafiz','0182522320','1','','0','0','','','','','','','','','','current_timestamp()',0,'',0,'0','0','0','0','0','0','','','','nurzieti@alphacoretech.net',0.00,0.00,40,0,'zesha123','current_timestamp()','Master','N','2022-05-17 15:26:37','2022-07-18 22:04:33'),(13,'PBB1005',4,NULL,NULL,'Izzati','Fung Zhi','','1','','0','0','','','','','0','','','','','current_timestamp()',0,'',0,'0','0','0','0','0','0','','','','izzati@alphacoretech.net',0.00,0.00,40,0,'izzati123','current_timestamp()','Master','N','2022-05-17 16:25:48','2022-05-17 16:25:48'),(25,'PBB10056',7,NULL,'','Demo','Account','','1','','0','0','','','','','0','','','','','current_timestamp()',0,'',0,'0','0','0','0','0','0','1649907012.jpg','','','demoaccount@gmail.com',0.00,0.00,40,35,'demo123','current_timestamp()','Master','N','2022-05-17 16:25:48','2022-05-17 16:25:48');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (1,'PBB1001','2022-03-10','09:00:00','13:00:00','1','testing1234','Y','2022-03-08 15:21:26','2022-03-10 11:29:54'),(2,'PBB1002','2022-03-11','16:30:00','17:31:00','1','testing','Y','2022-03-08 16:23:10','2022-04-11 15:10:09'),(3,'PBB1002','2022-03-11','16:30:00','17:30:00','1','testing','Y','2022-03-08 16:42:02','2022-04-11 14:44:33'),(4,'PBB1001','2022-03-15','12:00:00','14:00:00','1','testing','Y','2022-03-09 10:40:37','2022-03-10 11:30:10'),(5,'PBB1001','2022-03-11','09:00:00','13:00:00','1','testing','N','2022-03-10 18:13:25','2022-03-10 18:13:25'),(6,'PBB1001','2022-03-14','10:30:00','12:55:00','2','testing','N','2022-03-11 10:56:04','2022-03-11 10:56:04'),(7,'PBB1003','2022-03-15','12:00:00','13:30:00','1','testing','N','2022-03-14 13:24:11','2022-03-14 13:24:11'),(8,'PBB1004','2022-03-21','16:00:00','17:00:00','1','discuss','N','2022-03-14 16:49:45','2022-03-14 16:49:45'),(9,'PBB1001','2022-04-06','13:25:00','14:26:00','1','discuss','N','2022-04-05 11:23:47','2022-04-05 11:23:47'),(10,'PBB1020','2022-04-06','15:36:00','15:37:00','1','testing','N','2022-04-05 14:35:14','2022-04-05 14:35:14'),(11,'PBB1001','2022-04-07','17:50:00','17:50:00','1','meeting','N','2022-04-05 16:49:59','2022-04-05 16:49:59'),(12,'PBB1001','2022-05-01','17:30:00','18:00:00','2','loltest','N','2022-04-06 15:32:23','2022-04-06 15:32:23'),(13,'PBB1111','2022-04-08','09:29:00','13:00:00','2','Testing','N','2022-04-06 16:40:04','2022-04-06 16:40:04'),(14,'PBB1005','2022-04-13','11:04:00','12:04:00','2','testing','N','2022-04-07 11:04:20','2022-04-07 11:04:20'),(15,'PBC1018','2022-04-13','10:45:00','12:44:00','1','Meeting HRMS','N','2022-04-13 10:42:37','2022-04-13 10:42:37');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_room`
--

DROP TABLE IF EXISTS `facility_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_room` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_room` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_room`
--

LOCK TABLES `facility_room` WRITE;
/*!40000 ALTER TABLE `facility_room` DISABLE KEYS */;
INSERT INTO `facility_room` VALUES (1,'Board Room','N','2022-03-08 14:55:51','2022-03-08 14:55:52'),(2,'Test Room','N','2022-03-09 12:54:12','2022-03-09 12:54:12');
/*!40000 ALTER TABLE `facility_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goal_type`
--

DROP TABLE IF EXISTS `goal_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Status` int(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `Type` (`Type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goal_type`
--

LOCK TABLES `goal_type` WRITE;
/*!40000 ALTER TABLE `goal_type` DISABLE KEYS */;
INSERT INTO `goal_type` VALUES (1,'Invoice Goal','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti laudantium animi fuga hic nobis culpa, sapiente numquam quaerat quisquam eveniet dolorum soluta harum eligendi praesentium corporis error quo inventore suscipit?',1,'2020-09-24 00:00:00'),(3,'Another One','This is another test for the type section. Just testing it and seeing it work makes me smile with joy. Thats the power of programming for humans and especially to me .It makes me more happy to see my code run without troubles or bugs.',1,'2020-09-24 00:00:00');
/*!40000 ALTER TABLE `goal_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goals` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'Another One','Coding','Code till time infinity ','2020-09-25','2020-10-10','This is the thing i always want to do and am doing it for the rest of my life now friend.',1,'80','2020-09-25 00:13:34'),(2,'Another One','this is a test','Code till time infinity ','2020-09-25','2020-10-10','This is a test',1,'50','2020-09-25 00:39:34'),(3,'Invoice Goal','This is another test','Code till thy kingdom come.','2020-09-25','2048-09-10','this is another one of the wierdest thing that i have ever done. I having alot of the shit not working but i got this.',0,'0','2020-09-25 01:08:59');
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `handbook`
--

DROP TABLE IF EXISTS `handbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `handbook` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_title` varchar(50) DEFAULT NULL,
  `f_uploaded_file` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handbook`
--

LOCK TABLES `handbook` WRITE;
/*!40000 ALTER TABLE `handbook` DISABLE KEYS */;
INSERT INTO `handbook` VALUES (1,'handbook v3','Email Address List Date As 170322.pdf','Y','2022-04-08 11:51:58','2022-04-08 12:12:34'),(2,'testing','Announce Public Holiday 2022.pdf','N','2022-04-08 15:09:47','2022-04-08 15:09:47'),(3,'Employee Handbook April 2022','UNIVERSITI TEKNOLOGI MARA - EXAMINATION RESULT SEM','Y','2022-04-08 16:05:10','2022-04-13 10:35:06');
/*!40000 ALTER TABLE `handbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holidays` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_id` int(11) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_type` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_id` int(11) NOT NULL DEFAULT 0,
  `f_leave_name` varchar(50) DEFAULT NULL,
  `f_leave_max` varchar(50) DEFAULT NULL,
  `f_leave_gender` varchar(50) DEFAULT NULL,
  `f_delete` varchar(50) DEFAULT 'N',
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_type`
--

LOCK TABLES `leave_type` WRITE;
/*!40000 ALTER TABLE `leave_type` DISABLE KEYS */;
INSERT INTO `leave_type` VALUES (8,1,'Annual Leave','14','A','N','2022-05-09 14:55:36','2022-05-09 14:55:37'),(9,0,'Unpaid Leave','0','A','N','2022-05-09 14:56:04','2022-05-09 14:56:05'),(10,0,'Emergency Leave','14','A','N','2022-05-09 14:56:29','2022-05-09 14:56:30'),(11,0,'Maternity Leave','14','F','N','2022-05-09 14:56:50','2022-05-09 14:56:51'),(12,0,'Hospitalization Leave','60','A','N','2022-05-09 14:57:08','2022-05-09 14:57:09');
/*!40000 ALTER TABLE `leave_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaves` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_company_id` int(11) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaves`
--

LOCK TABLES `leaves` WRITE;
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_time`
--

DROP TABLE IF EXISTS `login_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_time` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emp_id` int(11) DEFAULT NULL,
  `f_clock_in` time DEFAULT NULL,
  `f_clock_out` datetime DEFAULT NULL,
  `f_created_date` datetime DEFAULT NULL,
  `f_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_time`
--

LOCK TABLES `login_time` WRITE;
/*!40000 ALTER TABLE `login_time` DISABLE KEYS */;
INSERT INTO `login_time` VALUES (1,1,'15:20:00',NULL,'2022-03-30 15:20:35','2022-03-30 15:20:35'),(2,51,'15:31:00',NULL,'2022-03-30 15:31:37','2022-03-30 15:31:37'),(3,1,'15:32:00',NULL,'2022-03-30 15:32:28','2022-03-30 15:32:28'),(4,1,'15:45:00',NULL,'2022-03-30 15:45:54','2022-03-30 15:45:54'),(5,51,'15:46:00',NULL,'2022-03-30 15:46:26','2022-03-30 15:46:26'),(6,1,'15:47:00',NULL,'2022-03-30 15:47:53','2022-03-30 15:47:53'),(7,1,'16:03:00',NULL,'2022-03-30 16:03:26','2022-03-30 16:03:26'),(8,50,'16:12:00',NULL,'2022-03-30 16:12:00','2022-03-30 16:12:00'),(9,52,'16:12:00',NULL,'2022-03-30 16:12:53','2022-03-30 16:12:53'),(10,51,'10:37:00',NULL,'2022-03-31 10:37:25','2022-03-31 10:37:25'),(11,51,'13:38:00',NULL,'2022-03-31 13:38:33','2022-03-31 13:38:33'),(12,1,'14:47:00',NULL,'2022-03-31 14:47:28','2022-03-31 14:47:28'),(13,51,'14:51:00',NULL,'2022-03-31 14:51:48','2022-03-31 14:51:48'),(14,1,'14:54:00',NULL,'2022-03-31 14:54:52','2022-03-31 14:54:52'),(15,52,'14:57:00',NULL,'2022-03-31 14:57:18','2022-03-31 14:57:18'),(16,52,'14:59:00',NULL,'2022-03-31 14:59:35','2022-03-31 14:59:35'),(17,1,'15:45:00',NULL,'2022-03-31 15:45:03','2022-03-31 15:45:03'),(18,1,'16:19:00',NULL,'2022-03-31 16:19:40','2022-03-31 16:19:40'),(19,1,'09:22:00',NULL,'2022-04-01 09:22:47','2022-04-01 09:22:47'),(20,1,'10:26:00',NULL,'2022-04-01 10:26:12','2022-04-01 10:26:12'),(21,52,'10:39:00',NULL,'2022-04-01 10:39:46','2022-04-01 10:39:46'),(22,52,'10:45:00',NULL,'2022-04-01 10:45:16','2022-04-01 10:45:16'),(23,51,'11:05:00',NULL,'2022-04-01 11:05:54','2022-04-01 11:05:54'),(24,51,'11:06:00',NULL,'2022-04-01 11:06:34','2022-04-01 11:06:34'),(25,51,'11:25:00',NULL,'2022-04-01 11:25:10','2022-04-01 11:25:10'),(26,51,'11:26:00',NULL,'2022-04-01 11:26:08','2022-04-01 11:26:08'),(27,1,'11:44:00',NULL,'2022-04-01 11:44:33','2022-04-01 11:44:33'),(28,51,'14:31:00',NULL,'2022-04-01 14:31:39','2022-04-01 14:31:39'),(29,51,'15:18:00',NULL,'2022-04-01 15:18:30','2022-04-01 15:18:30'),(30,51,'15:23:00',NULL,'2022-04-01 15:23:10','2022-04-01 15:23:10'),(31,1,'15:50:00',NULL,'2022-04-01 15:50:14','2022-04-01 15:50:14'),(32,52,'16:14:00',NULL,'2022-04-01 16:14:48','2022-04-01 16:14:48'),(33,52,'17:11:00',NULL,'2022-04-01 17:11:20','2022-04-01 17:11:20'),(34,1,'09:30:00',NULL,'2022-04-04 09:30:21','2022-04-04 09:30:21'),(35,1,'09:30:00',NULL,'2022-04-04 09:30:24','2022-04-04 09:30:24'),(36,52,'09:47:00',NULL,'2022-04-04 09:47:33','2022-04-04 09:47:33'),(37,1,'09:48:00',NULL,'2022-04-04 09:48:49','2022-04-04 09:48:49'),(38,1,'09:53:00',NULL,'2022-04-04 09:53:39','2022-04-04 09:53:39'),(39,1,'10:07:00',NULL,'2022-04-04 10:07:02','2022-04-04 10:07:02'),(40,51,'10:28:00',NULL,'2022-04-04 10:28:18','2022-04-04 10:28:18'),(41,1,'10:31:00',NULL,'2022-04-04 10:31:37','2022-04-04 10:31:37'),(42,1,'14:37:00',NULL,'2022-04-04 14:37:32','2022-04-04 14:37:32'),(43,51,'15:29:00',NULL,'2022-04-04 15:29:58','2022-04-04 15:29:58'),(44,51,'15:52:00',NULL,'2022-04-04 15:52:00','2022-04-04 15:52:00'),(45,1,'15:56:00',NULL,'2022-04-04 15:56:37','2022-04-04 15:56:37'),(46,1,'16:11:00',NULL,'2022-04-04 16:11:04','2022-04-04 16:11:04'),(47,1,'16:11:00',NULL,'2022-04-04 16:11:53','2022-04-04 16:11:53'),(48,1,'16:17:00',NULL,'2022-04-04 16:17:47','2022-04-04 16:17:47'),(49,51,'16:19:00',NULL,'2022-04-04 16:19:47','2022-04-04 16:19:47'),(50,51,'16:20:00',NULL,'2022-04-04 16:20:25','2022-04-04 16:20:25'),(51,51,'16:28:00',NULL,'2022-04-04 16:28:52','2022-04-04 16:28:52'),(52,51,'16:37:00',NULL,'2022-04-04 16:37:01','2022-04-04 16:37:01'),(53,1,'08:58:00',NULL,'2022-04-05 08:58:45','2022-04-05 08:58:45'),(54,1,'09:49:00',NULL,'2022-04-05 09:49:04','2022-04-05 09:49:04'),(55,52,'09:52:00',NULL,'2022-04-05 09:52:24','2022-04-05 09:52:24'),(56,51,'09:54:00',NULL,'2022-04-05 09:54:32','2022-04-05 09:54:32'),(57,1,'09:58:00',NULL,'2022-04-05 09:58:07','2022-04-05 09:58:07'),(58,1,'10:07:00',NULL,'2022-04-05 10:07:51','2022-04-05 10:07:51'),(59,1,'10:20:00',NULL,'2022-04-05 10:20:10','2022-04-05 10:20:10'),(60,1,'10:21:00',NULL,'2022-04-05 10:21:21','2022-04-05 10:21:21'),(61,51,'10:23:00',NULL,'2022-04-05 10:23:52','2022-04-05 10:23:52'),(62,1,'10:23:00',NULL,'2022-04-05 10:23:57','2022-04-05 10:23:57'),(63,1,'10:26:00',NULL,'2022-04-05 10:26:08','2022-04-05 10:26:08'),(64,1,'10:32:00',NULL,'2022-04-05 10:32:26','2022-04-05 10:32:26'),(65,51,'10:57:00',NULL,'2022-04-05 10:57:40','2022-04-05 10:57:40'),(66,1,'11:08:00',NULL,'2022-04-05 11:08:02','2022-04-05 11:08:02'),(67,1,'11:14:00',NULL,'2022-04-05 11:14:45','2022-04-05 11:14:45'),(68,53,'11:18:00',NULL,'2022-04-05 11:18:57','2022-04-05 11:18:57'),(69,53,'11:29:00',NULL,'2022-04-05 11:29:22','2022-04-05 11:29:22'),(70,52,'11:31:00',NULL,'2022-04-05 11:31:02','2022-04-05 11:31:02'),(71,1,'11:37:00',NULL,'2022-04-05 11:37:51','2022-04-05 11:37:51'),(72,52,'11:49:00',NULL,'2022-04-05 11:49:48','2022-04-05 11:49:48'),(73,1,'11:56:00',NULL,'2022-04-05 11:56:15','2022-04-05 11:56:15'),(74,1,'12:02:00',NULL,'2022-04-05 12:02:38','2022-04-05 12:02:38'),(75,1,'12:03:00',NULL,'2022-04-05 12:03:19','2022-04-05 12:03:19'),(76,53,'12:12:00',NULL,'2022-04-05 12:12:31','2022-04-05 12:12:31'),(77,53,'12:30:00',NULL,'2022-04-05 12:30:40','2022-04-05 12:30:40'),(78,53,'12:42:00',NULL,'2022-04-05 12:42:10','2022-04-05 12:42:10'),(79,53,'13:04:00',NULL,'2022-04-05 13:04:53','2022-04-05 13:04:53'),(80,1,'13:11:00',NULL,'2022-04-05 13:11:40','2022-04-05 13:11:40'),(81,1,'13:11:00',NULL,'2022-04-05 13:11:59','2022-04-05 13:11:59'),(82,1,'13:13:00',NULL,'2022-04-05 13:13:24','2022-04-05 13:13:24'),(83,53,'13:27:00',NULL,'2022-04-05 13:27:54','2022-04-05 13:27:54'),(84,53,'13:31:00',NULL,'2022-04-05 13:31:31','2022-04-05 13:31:31'),(85,53,'13:44:00',NULL,'2022-04-05 13:44:12','2022-04-05 13:44:12'),(86,53,'14:26:00',NULL,'2022-04-05 14:26:39','2022-04-05 14:26:39'),(87,53,'14:28:00',NULL,'2022-04-05 14:28:30','2022-04-05 14:28:30'),(88,1,'15:11:00',NULL,'2022-04-05 15:11:28','2022-04-05 15:11:28'),(89,53,'15:32:00',NULL,'2022-04-05 15:32:27','2022-04-05 15:32:27'),(90,1,'15:51:00',NULL,'2022-04-05 15:51:21','2022-04-05 15:51:21'),(91,1,'15:51:00',NULL,'2022-04-05 15:51:56','2022-04-05 15:51:56'),(92,1,'16:07:00',NULL,'2022-04-05 16:07:31','2022-04-05 16:07:31'),(93,1,'16:08:00',NULL,'2022-04-05 16:08:13','2022-04-05 16:08:13'),(94,1,'16:11:00',NULL,'2022-04-05 16:11:22','2022-04-05 16:11:22'),(95,1,'16:18:00',NULL,'2022-04-05 16:18:03','2022-04-05 16:18:03'),(96,61,'16:24:00',NULL,'2022-04-05 16:24:49','2022-04-05 16:24:49'),(97,1,'16:25:00',NULL,'2022-04-05 16:25:51','2022-04-05 16:25:51'),(98,51,'16:26:00',NULL,'2022-04-05 16:26:41','2022-04-05 16:26:41'),(99,61,'16:28:00',NULL,'2022-04-05 16:28:10','2022-04-05 16:28:10'),(100,61,'16:28:00',NULL,'2022-04-05 16:28:18','2022-04-05 16:28:18'),(101,61,'16:36:00',NULL,'2022-04-05 16:36:41','2022-04-05 16:36:41'),(102,1,'16:37:00',NULL,'2022-04-05 16:37:41','2022-04-05 16:37:41'),(103,1,'16:53:00',NULL,'2022-04-05 16:53:58','2022-04-05 16:53:58'),(104,1,'09:33:00',NULL,'2022-04-06 09:33:33','2022-04-06 09:33:33'),(105,1,'09:53:00',NULL,'2022-04-06 09:53:58','2022-04-06 09:53:58'),(106,51,'10:30:00',NULL,'2022-04-06 10:30:18','2022-04-06 10:30:18'),(107,52,'11:09:00',NULL,'2022-04-06 11:09:14','2022-04-06 11:09:14'),(108,52,'12:48:00',NULL,'2022-04-06 12:48:42','2022-04-06 12:48:42'),(109,1,'14:55:00',NULL,'2022-04-06 14:55:01','2022-04-06 14:55:01'),(110,1,'15:03:00',NULL,'2022-04-06 15:03:12','2022-04-06 15:03:12'),(111,52,'15:38:00',NULL,'2022-04-06 15:38:35','2022-04-06 15:38:35'),(112,52,'15:39:00',NULL,'2022-04-06 15:39:13','2022-04-06 15:39:13'),(113,51,'15:59:00',NULL,'2022-04-06 15:59:18','2022-04-06 15:59:18'),(114,51,'15:59:00',NULL,'2022-04-06 15:59:47','2022-04-06 15:59:47'),(115,51,'16:06:00',NULL,'2022-04-06 16:06:46','2022-04-06 16:06:46'),(116,53,'16:21:00',NULL,'2022-04-06 16:21:03','2022-04-06 16:21:03'),(117,1,'16:43:00',NULL,'2022-04-06 16:43:07','2022-04-06 16:43:07'),(118,1,'09:13:00',NULL,'2022-04-07 09:13:15','2022-04-07 09:13:15'),(119,52,'09:57:00',NULL,'2022-04-07 09:57:22','2022-04-07 09:57:22'),(120,51,'09:59:00',NULL,'2022-04-07 09:59:06','2022-04-07 09:59:06'),(121,1,'10:26:00',NULL,'2022-04-07 10:26:58','2022-04-07 10:26:58'),(122,1,'10:30:00',NULL,'2022-04-07 10:30:17','2022-04-07 10:30:17'),(123,1,'10:36:00',NULL,'2022-04-07 10:36:06','2022-04-07 10:36:06'),(124,51,'10:36:00',NULL,'2022-04-07 10:36:45','2022-04-07 10:36:45'),(125,51,'10:37:00',NULL,'2022-04-07 10:37:02','2022-04-07 10:37:02'),(126,51,'10:38:00',NULL,'2022-04-07 10:38:02','2022-04-07 10:38:02'),(127,1,'10:38:00',NULL,'2022-04-07 10:38:14','2022-04-07 10:38:14'),(128,52,'10:40:00',NULL,'2022-04-07 10:40:44','2022-04-07 10:40:44'),(129,1,'10:46:00',NULL,'2022-04-07 10:46:58','2022-04-07 10:46:58'),(130,1,'10:50:00',NULL,'2022-04-07 10:50:12','2022-04-07 10:50:12'),(131,51,'11:07:00',NULL,'2022-04-07 11:07:21','2022-04-07 11:07:21'),(132,1,'11:28:00',NULL,'2022-04-07 11:28:38','2022-04-07 11:28:38'),(133,1,'12:56:00',NULL,'2022-04-07 12:56:23','2022-04-07 12:56:23'),(134,1,'14:09:00',NULL,'2022-04-07 14:09:39','2022-04-07 14:09:39'),(135,1,'15:00:00',NULL,'2022-04-07 15:00:39','2022-04-07 15:00:39'),(136,1,'15:47:00',NULL,'2022-04-07 15:47:19','2022-04-07 15:47:19'),(137,1,'16:04:00',NULL,'2022-04-07 16:04:09','2022-04-07 16:04:09'),(138,1,'16:08:00',NULL,'2022-04-07 16:08:02','2022-04-07 16:08:02'),(139,1,'09:43:00',NULL,'2022-04-08 09:43:50','2022-04-08 09:43:50'),(140,1,'11:48:00',NULL,'2022-04-08 11:48:14','2022-04-08 11:48:14'),(141,1,'13:13:00',NULL,'2022-04-08 13:13:15','2022-04-08 13:13:15'),(142,1,'13:32:00',NULL,'2022-04-08 13:32:33','2022-04-08 13:32:33'),(143,1,'13:37:00',NULL,'2022-04-08 13:37:41','2022-04-08 13:37:41'),(144,1,'14:01:00',NULL,'2022-04-08 14:01:07','2022-04-08 14:01:07'),(145,1,'14:02:00',NULL,'2022-04-08 14:02:19','2022-04-08 14:02:19'),(146,1,'15:00:00',NULL,'2022-04-08 15:00:26','2022-04-08 15:00:26'),(147,1,'15:58:00',NULL,'2022-04-08 15:58:13','2022-04-08 15:58:13'),(148,4,'16:24:00',NULL,'2022-04-08 16:24:41','2022-04-08 16:24:41'),(149,1,'08:31:00',NULL,'2022-04-11 08:31:58','2022-04-11 08:31:58'),(150,1,'10:09:00',NULL,'2022-04-11 10:09:01','2022-04-11 10:09:01'),(151,4,'12:03:00',NULL,'2022-04-11 12:03:12','2022-04-11 12:03:12'),(152,1,'14:29:00',NULL,'2022-04-11 14:29:50','2022-04-11 14:29:50'),(153,1,'15:08:00',NULL,'2022-04-11 15:08:35','2022-04-11 15:08:35'),(154,5,'10:12:00',NULL,'2022-04-12 10:12:10','2022-04-12 10:12:10'),(155,5,'10:13:00',NULL,'2022-04-12 10:13:20','2022-04-12 10:13:20'),(156,1,'10:39:00',NULL,'2022-04-12 10:39:20','2022-04-12 10:39:20'),(157,1,'10:48:00',NULL,'2022-04-12 10:48:10','2022-04-12 10:48:10'),(158,1,'08:50:00',NULL,'2022-04-13 08:50:37','2022-04-13 08:50:37'),(159,2,'09:36:00',NULL,'2022-04-13 09:36:52','2022-04-13 09:36:52'),(160,1,'10:22:00',NULL,'2022-04-13 10:22:19','2022-04-13 10:22:19'),(161,1,'12:47:00',NULL,'2022-05-19 12:47:41','2022-05-19 12:47:41'),(162,10,'15:23:00',NULL,'2022-05-19 15:23:37','2022-05-19 15:23:37'),(163,10,'15:23:00',NULL,'2022-05-19 15:23:56','2022-05-19 15:23:56'),(164,1,'11:02:00',NULL,'2022-05-23 11:02:34','2022-05-23 11:02:34'),(165,1,'15:22:00',NULL,'2022-05-23 15:22:16','2022-05-23 15:22:16'),(166,6,'15:37:00',NULL,'2022-05-23 15:37:31','2022-05-23 15:37:31'),(167,1,'10:08:00',NULL,'2022-05-24 10:08:13','2022-05-24 10:08:13'),(168,6,'09:27:00',NULL,'2022-05-25 09:27:28','2022-05-25 09:27:28'),(169,1,'09:41:00',NULL,'2022-05-25 09:41:10','2022-05-25 09:41:10'),(170,1,'11:48:00',NULL,'2022-05-25 11:48:43','2022-05-25 11:48:43'),(171,15,'10:23:00',NULL,'2022-05-27 10:23:28','2022-05-27 10:23:28'),(172,1,'10:58:00',NULL,'2022-06-01 10:58:38','2022-06-01 10:58:38'),(173,1,'12:31:00',NULL,'2022-06-02 12:31:23','2022-06-02 12:31:23'),(174,10,'16:06:00',NULL,'2022-06-02 16:06:17','2022-06-02 16:06:17'),(175,1,'09:25:00',NULL,'2022-06-03 09:25:13','2022-06-03 09:25:13'),(176,1,'08:51:00',NULL,'2022-06-09 08:51:22','2022-06-09 08:51:22'),(177,1,'10:50:00',NULL,'2022-06-14 10:50:47','2022-06-14 10:50:47'),(178,1,'15:27:00',NULL,'2022-07-07 15:27:41','2022-07-07 15:27:41'),(179,1,'11:04:00',NULL,'2022-07-08 11:04:47','2022-07-08 11:04:47'),(180,1,'17:05:00',NULL,'2022-07-14 17:05:22','2022-07-14 17:05:22'),(181,1,'10:24:00',NULL,'2022-07-15 10:24:26','2022-07-15 10:24:26'),(182,10,'10:29:00',NULL,'2022-07-15 10:29:47','2022-07-15 10:29:47'),(183,1,'10:36:00',NULL,'2022-07-15 10:36:53','2022-07-15 10:36:53'),(184,1,'10:43:00',NULL,'2022-07-15 10:43:42','2022-07-15 10:43:42'),(185,13,'11:07:00',NULL,'2022-07-15 11:07:33','2022-07-15 11:07:33'),(186,10,'12:15:00',NULL,'2022-07-15 12:15:30','2022-07-15 12:15:30'),(187,1,'12:37:00',NULL,'2022-07-15 12:37:11','2022-07-15 12:37:11'),(188,1,'16:07:00',NULL,'2022-07-18 16:07:32','2022-07-18 16:07:32'),(189,1,'16:34:00',NULL,'2022-07-18 16:34:19','2022-07-18 16:34:19'),(190,13,'16:35:00',NULL,'2022-07-18 16:35:22','2022-07-18 16:35:22'),(191,1,'16:35:00',NULL,'2022-07-18 16:35:30','2022-07-18 16:35:30'),(192,11,'16:35:00',NULL,'2022-07-18 16:35:52','2022-07-18 16:35:52'),(193,13,'09:14:00',NULL,'2022-07-19 09:14:13','2022-07-19 09:14:13'),(194,11,'09:31:00',NULL,'2022-07-19 09:31:45','2022-07-19 09:31:45'),(195,11,'09:44:00',NULL,'2022-07-19 09:44:57','2022-07-19 09:44:57'),(196,1,'10:02:00',NULL,'2022-07-19 10:02:22','2022-07-19 10:02:22'),(197,1,'12:01:00',NULL,'2022-07-21 12:01:57','2022-07-21 12:01:57'),(198,25,'14:35:00',NULL,'2022-07-21 14:35:51','2022-07-21 14:35:51'),(199,25,'14:49:00',NULL,'2022-07-21 14:49:32','2022-07-21 14:49:32'),(200,13,'15:41:00',NULL,'2022-07-21 15:41:18','2022-07-21 15:41:18'),(201,13,'15:41:00',NULL,'2022-07-21 15:41:21','2022-07-21 15:41:21'),(202,25,'17:04:00',NULL,'2022-07-21 17:04:52','2022-07-21 17:04:52'),(203,1,'17:07:00',NULL,'2022-07-21 17:07:45','2022-07-21 17:07:45'),(204,1,'17:43:00',NULL,'2022-07-21 17:43:59','2022-07-21 17:43:59');
/*!40000 ALTER TABLE `login_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memo`
--

DROP TABLE IF EXISTS `memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memo` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memo`
--

LOCK TABLES `memo` WRITE;
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` VALUES (1,'PBB1001','Testing','This is for testing only','No','Y','2022-03-11 10:09:36','2022-04-13 10:33:40'),(2,'PBB1001','testing2','add memo testing','No','Y','2022-03-14 10:38:29','2022-04-13 10:33:50'),(3,'PBB1001','testing3','add memo with file','No','N','2022-03-14 10:39:29','2022-03-14 10:39:29'),(4,'PBB1001','add file','add memo with file','sample-file (10).pdf','N','2022-03-14 10:40:18','2022-03-14 11:50:28'),(5,'PBB1001','add file 2','add memo eith file 2','sample-file (8).pdf','N','2022-03-14 10:41:36','2022-03-14 11:50:47'),(6,'PBB1001','add file 3','add memo with file 3','sample-file (13).pdf','N','2022-03-14 10:49:21','2022-03-14 10:49:21'),(8,'PBB1001','add file 8','tesitng','passport_PBB1003_2022.pdf','Y','2022-03-14 13:25:17','2022-04-11 15:05:37'),(9,'PBB2002','','','No','Y','2022-03-22 12:10:44','2022-04-08 10:57:09'),(10,'PBB1001','Office Hours for Month of Ramadhan','Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf','INTERNAL MEMO- Fasting 2022.pdf','N','2022-03-25 10:45:17','2022-03-25 10:45:17'),(11,'PBB1001','Office Hours for Month of Ramadhan','Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf','INTERNAL MEMO- Fasting 2022.pdf','Y','2022-03-25 10:45:25','2022-04-13 10:34:08'),(12,'PBB1001','Office Hours for Month of Ramadhan','Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. the Management also take the opportunity to wish all Muslim staf','No','Y','2022-03-25 10:45:37','2022-04-08 15:07:36'),(13,'PBB1001','testing','testing','Email Address List Date As 170322.pdf','Y','2022-04-07 09:24:37','2022-04-08 14:44:53'),(14,'fbsbb','dsgdvf','dagdag','Tuah Resume 2022.pdf','Y','2022-04-07 15:04:19','2022-04-08 14:43:41'),(15,'fbsbb','dsgdvf','dagdag','Tuah Resume 2022.pdf','Y','2022-04-07 15:04:19','2022-04-08 14:43:34'),(16,'fbsbb','dsgdvf','dagdag','Tuah Resume 2022.pdf','Y','2022-04-07 15:04:19','2022-04-08 14:43:28'),(17,'fbsbb','dsgdvf','dagdag','Tuah Resume 2022.pdf','Y','2022-04-07 15:04:20','2022-04-08 14:43:19'),(18,'PBB1001','add file','testing','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:13:13','2022-04-08 14:43:09'),(19,'PBB1001','testingbla','testing','Backend Software Developer (003).pdf','Y','2022-04-08 10:14:07','2022-04-08 14:43:02'),(20,'PBB1001','testblabla','testing','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:20:12','2022-04-08 14:42:54'),(21,'PBB1001','testblablabla','testing2','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:22:50','2022-04-08 14:42:47'),(22,'PBB1001','testingload','testing','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:26:09','2022-04-08 14:42:37'),(23,'PBB1001','testingalal','testing','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:27:19','2022-04-08 14:42:29'),(24,'PBB1001','add file','testing','Announce Public Holiday 2022.pdf','Y','2022-04-08 10:27:38','2022-04-08 14:42:18'),(25,NULL,'handbook v1',NULL,'Announce Public Holiday 2022.pdf','Y','2022-04-08 11:50:35','2022-04-08 14:42:06'),(26,'PBC1018','title','description','Announce Public Holiday 2022.pdf','N','2022-04-08 15:09:11','2022-04-08 15:09:11'),(27,'PBB1001','Office Hours for Month of Ramadhan','Memo cannot Save','INTERNAL MEMO- Fasting 2022.pdf','N','2022-04-08 16:02:23','2022-04-08 16:02:23'),(28,'PBB1001','Office Hours for Month of Ramadhan','Dear all,\r\nPlease be informed that for the month of Ramadhan, all Muslim staff are entitled to choose either one of the following working hours during the fasting months: -\r\n1. Working hours from 8.30 am to 4.30 pm.\r\n2. Working hours from 9.00 am to 5.00 pm.\r\nKindly take note, if there is a staff who is 10 minutes late from the above working hours, the management will consider for the next session.\r\nWith effect from 3rd April 2022. The Management also take the opportunity to wish all Muslim staf','INTERNAL MEMO- Fasting 2022.pdf','Y','2022-04-08 16:03:18','2022-04-13 10:34:00');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `overtime`
--

DROP TABLE IF EXISTS `overtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee` varchar(200) NOT NULL,
  `OverTime_Date` date NOT NULL,
  `Hours` varchar(20) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overtime`
--

LOCK TABLES `overtime` WRITE;
/*!40000 ALTER TABLE `overtime` DISABLE KEYS */;
INSERT INTO `overtime` VALUES (1,'Mushe Abdul-Hakim','2020-09-29','5','	Normal ex.5','This extra minutes are spent on trying to improve my knowledge on programming everyday.','2020-09-29 00:38:26'),(2,'Goerge Merchason','2020-09-29','5','	Normal ex.5','This was just to help the ceo with his presentation prep for tomorrow\'s big event.','2020-09-29 09:20:37'),(3,'Yahuza Abdul-Hakim','2020-09-10','3','Normal ex.5','This is another test of the overtime of employees','2020-09-29 09:28:59');
/*!40000 ALTER TABLE `overtime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_category`
--

DROP TABLE IF EXISTS `project_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Details` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_category`
--

LOCK TABLES `project_category` WRITE;
/*!40000 ALTER TABLE `project_category` DISABLE KEYS */;
INSERT INTO `project_category` VALUES (29,4,'Privates','                       lola                    lola                                                 ',1,'2022-06-03 08:19:06','2022-06-03 08:19:59'),(30,4,'Channel','                       lola                    lola                                                 ',1,'2022-06-03 08:19:06','2022-06-03 08:19:59'),(31,4,'Goverment','                       lola                    lola                                                 ',1,'2022-06-03 08:19:06','2022-06-09 02:45:25');
/*!40000 ALTER TABLE `project_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_pillar`
--

DROP TABLE IF EXISTS `project_pillar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_pillar` (
  `BIL` int(11) NOT NULL AUTO_INCREMENT,
  `project_pillar` varchar(255) DEFAULT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `project_detail` varchar(255) DEFAULT NULL,
  `project_customer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `f_id_com` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BIL`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_pillar`
--

LOCK TABLES `project_pillar` WRITE;
/*!40000 ALTER TABLE `project_pillar` DISABLE KEYS */;
INSERT INTO `project_pillar` VALUES (10,'Project Hot FM','FM',NULL,NULL,'2022-05-06 04:54:06','2022-05-06 04:54:06',1,NULL),(11,'Alphadash','AD',NULL,NULL,'2022-05-06 09:05:52','2022-05-06 09:05:52',1,NULL),(12,'Alphadash','AD',NULL,NULL,'2022-05-06 09:05:58','2022-05-06 09:05:58',1,NULL),(13,'Web Builder','WB',NULL,NULL,'2022-05-06 09:08:10','2022-05-06 09:08:10',1,NULL),(14,'AlphaCore','AP',NULL,NULL,'2022-05-09 06:41:14','2022-05-09 06:41:14',1,NULL),(15,'test 1','t1','test jap',NULL,NULL,NULL,2,'100'),(16,'test 2','t2','test je',NULL,'2022-05-09 09:01:53',NULL,2,'100'),(17,'Project Hot FM','FM1E','project customer',NULL,'2022-05-11 09:59:49','2022-05-11 10:02:17',1,NULL),(18,'Project petronas','WB','DSADADASDADASDADASDADADADASDADASDA',NULL,'2022-05-11 10:03:46','2022-05-11 10:04:52',1,NULL),(19,'Project Hot FM','WB','                                    lola',NULL,'2022-05-23 07:34:15','2022-05-23 07:34:15',1,'4'),(20,'Alphadash','ALP','                                    PROJECT SERVICES',NULL,'2022-05-24 03:50:07','2022-05-24 03:50:07',1,'4'),(21,'Giant System','GS','                                    GOLANG',NULL,'2022-05-24 03:50:22','2022-05-24 03:50:22',1,'4'),(22,'Web Builder','FM1E','                                    Contoh je',NULL,'2022-05-24 03:59:15','2022-05-24 03:59:15',1,'4'),(23,'Value Addded Services','ads','                                    contoh je',NULL,'2022-05-25 04:32:40','2022-05-25 04:32:40',1,'4'),(24,'Honey Lipmatte','Lipmatte 320','10mL \r\nlong lasting\r\nwaterproof',NULL,'2022-06-15 04:01:28','2022-07-18 08:59:18',1,'4'),(25,'eyeshadow','EY2323','                                    Eyeshadow to make your eyelashes go wild',NULL,'2022-07-19 02:01:54','2022-07-19 02:01:54',1,'4');
/*!40000 ALTER TABLE `project_pillar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_sector`
--

DROP TABLE IF EXISTS `project_sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_sector` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Details` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_sector`
--

LOCK TABLES `project_sector` WRITE;
/*!40000 ALTER TABLE `project_sector` DISABLE KEYS */;
INSERT INTO `project_sector` VALUES (1,4,31,'Federal government','                                    nona',1,'2022-06-01 09:53:44','2022-06-01 09:53:44'),(2,4,31,'Head of government','                                    dasdadadad',1,'2022-06-01 09:55:52','2022-06-01 09:58:27'),(3,4,31,'State governments','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(4,4,31,'Local governments','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(5,4,31,'GLC','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(6,4,29,'Advertising / Design / Printing','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(7,4,29,'Agriculture','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(8,4,29,'Association','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(9,4,29,'Automotive','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(10,4,29,'Banking / Finance','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(11,4,29,'Beauty / Healthcare','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(12,4,29,'Education','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(13,4,29,'Beauty / Healthcare','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(14,4,29,'Fashion','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(15,4,29,'Event Management','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(16,4,29,'Food & Beverages','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(17,4,29,'Home Improvements','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(18,4,29,'IT / E-Commerce','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(19,4,29,'Logistics / Transportation','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(20,4,29,'Media','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(21,4,29,'Property Developer / Real Estate','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(22,4,29,'Retails Products','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(23,4,29,'Security','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(24,4,29,'Services','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(25,4,29,'Supermarket/ Hypermarket/ Shopping Malls','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(26,4,29,'Telecommunication','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(27,4,29,'Travel / Tourism / Hospitality','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(28,4,30,'Busniess Patner','                                    susu',1,'2022-06-01 09:59:13','2022-06-01 09:59:13'),(29,4,31,'Ministry of Communication and Multimedia','Open tender for multimedia project                       ',1,'2022-06-03 08:26:41','2022-07-19 01:59:01');
/*!40000 ALTER TABLE `project_sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'INT-0001','HRMS dashboad','internal HRMS detail for ALPHACORE',1,24,'2021-12-29 10:34:34','2021-12-29 10:34:36','1','3',2,'2021-12-29 10:34:37'),(2,'INT-0001','HRMS dashboad','internal HRMS detail for ALPHACORE',1,25,'2021-12-29 10:35:37','2021-12-29 10:35:38','1','3',2,'2021-12-29 10:35:39'),(3,'INT-0001','HRMS dashboad','internal HRMS detail for ALPHACORE',1,26,'2021-12-29 10:36:03','2021-12-29 10:36:04','1','3',2,'2021-12-29 10:36:05'),(4,'INT-0001','HRMS dashboad','internal HRMS detail for ALPHACORE',1,27,'2021-12-29 10:36:30','2021-12-29 10:36:32','1','3',2,'2021-12-29 10:36:32');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,'PBB1002','Name1','Lowyat','2022-04-07',1000.00,'Transfer','PBB1001',NULL,'checked','Y','2022-04-11 14:18:46','2022-04-12 16:38:40'),(2,'PBB1002','Name2','Lowyat','2022-04-07',200.00,'Transfer','PBB1001',NULL,'checked','Y','2022-04-11 14:18:47','2022-04-12 16:41:07');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotes` varchar(225) DEFAULT NULL,
  `proposal` varchar(225) DEFAULT NULL,
  `name` varchar(225) DEFAULT '',
  `date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1,'DFDV','Syaffa Resume 2022.pdf','Nur Atikah Amirah Binti Md Rosseli','2022-04-06'),(2,'Many of life’s failures are people who did not realize how close they were to success when they gave up.”– Thomas A. Edison','UNIVERSITI TEKNOLOGI MARA - EXAMINATION RESULT SEM 5.pdf','Human Resource & Admin Manager','2022-04-13');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_appointment`
--

DROP TABLE IF EXISTS `sales_appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_appointment` (
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_appointment`
--

LOCK TABLES `sales_appointment` WRITE;
/*!40000 ALTER TABLE `sales_appointment` DISABLE KEYS */;
INSERT INTO `sales_appointment` VALUES (21,'Taman Gembur Dan Rata','Ahmad Najmi bin Sidek','Software Developer','0136134022','najmiemon4223@gmail.com','                                    LOLA',9,'2022-05-19 12:21:00','2022-05-13 04:21:49','2022-05-13 04:21:49',0,0),(22,'Taman Gembur Dan Rata','Najmi','Software Developer','0136134022','najmiemon4223@gmail.com','                                    lola',10,'2022-06-25 12:22:00','2022-05-13 04:23:44','2022-05-13 04:22:45',0,0),(23,'Taman Gembur Dan Rata','Ahmad Najmi bin Sidek','Software Developer','0136134022','muhammad.fadzil3647@gmail.com','                                    dasda',7,'2022-05-31 12:26:00','2022-05-13 04:26:55','2022-05-13 04:26:55',0,0),(24,'InfoPro','latihan','Software Developer','0136134022','najmiemon4223@gmail.com','                 contoh je                   ',7,'2022-05-17 10:19:00','2022-05-17 02:20:00','2022-05-17 02:20:00',0,0),(25,'FusionNex','Alisa Nadia','Busniess Analysis','0136134022','najmiemon4223@gmail.com','                                    lola',6,'2022-05-17 10:34:00','2022-05-19 07:58:53','2022-05-17 07:34:19',0,0),(26,'Taman Gembur Dan Rata','Najmi','Software Developer','0136134022','muhammad.fadzil3647@gmail.com','                                    lola',6,'2022-05-27 19:42:00','2022-05-23 07:38:16','2022-05-23 07:38:16',0,0),(27,'FusionNex','Najmi','Software Developer','0136134022','muhammad.fadzil3647@gmail.com','             lola                       ',16,'2022-05-25 09:42:00','2022-05-25 01:42:17','2022-05-25 01:42:17',0,0),(28,'Taman Gembur Dan Rata','Alisa Nadia','Software Developer','0136134022','muhammad.fadzil3647@gmail.com','                                    lola',10,'2022-05-25 09:42:00','2022-05-25 01:42:43','2022-05-25 01:42:43',0,0),(29,'Taman Gembur Dan Rata','Najmi','Software Developer','0136134022','najmiemon4223@gmail.com','                 contoh                                                       ',11,'2022-07-19 16:46:00','2022-07-18 08:46:52','2022-07-18 08:46:52',0,0),(30,'Gotong royong','Rogayah','Chief Management','012345678','rogaya@gmail.com','                                    Membersihkan kawasan rumah',13,'2022-07-26 09:55:00','2022-07-19 01:56:13','2022-07-19 01:56:13',0,0);
/*!40000 ALTER TABLE `sales_appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_funnel`
--

DROP TABLE IF EXISTS `sales_funnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_funnel` (
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
  `project_pillar` varchar(50) DEFAULT '0' COMMENT 'ALPHADASH =A , WEB BUILDER = W, MOBILE APPS DEVELOPMENT = M, SOFTWARE CUSTOMIZATION = SC ,BIG DATA ANALYTICS = BD, \r\nARTIFICIAL INTELLEGENCE = AI ,DIGITAL MARKETING AND BRANDING = DM,\r\nTECHNICAL ENGINEERING OUTSOURCING = TE ,VALUE ADDED SERVICES = VAS',
  `status` varchar(50) DEFAULT '0' COMMENT 'POTENTIAL = 1, CLOSED = 2, KIV = 3 , LOSS =4',
  `actions` varchar(50) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `project_sta` varchar(50) DEFAULT NULL,
  `project_ip` varchar(50) DEFAULT NULL,
  `project_trouble` varchar(50) DEFAULT NULL,
  `project_uat` varchar(50) DEFAULT NULL,
  `project_com` varchar(50) DEFAULT NULL,
  `project_pending` varchar(50) DEFAULT NULL,
  `project_support` varchar(50) DEFAULT NULL,
  `f_id_com` varchar(255) DEFAULT NULL,
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
  `project_code` varchar(30) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `causing_issue` varchar(255) DEFAULT NULL,
  `improvement_step` varchar(250) DEFAULT NULL,
  `why_closed` varchar(250) DEFAULT NULL,
  `opportunity` varchar(250) DEFAULT NULL,
  `Category` int(10) unsigned DEFAULT NULL,
  `ProjectSectorId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_funnel`
--

LOCK TABLES `sales_funnel` WRITE;
/*!40000 ALTER TABLE `sales_funnel` DISABLE KEYS */;
INSERT INTO `sales_funnel` VALUES (106,'0','0',NULL,NULL,NULL,'ZUHAIR','ALPHACORE','BANGSAR SOUTH','134749123','zuhair@alphacoretech.net','FULL STACK','ALPHADASH','0',NULL,NULL,'0','0','0','400','0','0','[\"FM\"]','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'0','0',NULL,NULL,NULL,NULL,NULL,NULL,'WBAD-0063',NULL,NULL,NULL,NULL,NULL,2,6),(107,'0','0',NULL,NULL,NULL,'ZUHAIR','ALPHACORE','BANGSAR SOUTH','134749123','zuhair@alphacoretech.net','FULL STACK','ALPHADASH','0',NULL,NULL,'0','0','0','100','0','0','[\"FM\"]','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'0','0',NULL,NULL,NULL,NULL,NULL,NULL,'WBAD-0063',NULL,NULL,NULL,NULL,NULL,2,6),(113,'2022-05-31','2022-05-31','Batista','19/05/2022','27/05/2022','Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','testing 123','HIGH','Mei, Muhammad, ','0','0','0','179726','2022-06-01','20','[\"FM\"]','ON-GOING','meme','9',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','2022-04-11 09:30:21','2022-05-11 09:34:11','Yes',NULL,NULL,NULL,'FM-0062','208021',NULL,NULL,NULL,NULL,2,6),(114,'2022-05-13','2022-05-21',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','               testing lola        ',NULL,NULL,'0','0','0','20','2022-05-26','20','[\"WB\",\"AD\"]','1','meme','40',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2021-03-13 02:40:54','2022-05-13 02:40:54',NULL,NULL,NULL,NULL,'WBAD-0063','20',NULL,NULL,NULL,NULL,2,6),(115,'0','2022-05-31','David','0','2022-05-31','ZUHAIR','WATCH JAM','DAMANSARA','ZUHAIR','zuhair@alphacoretech.net','Senior Software Developer','WATCH','marco estore watch','HIGH','Ahmad,Muhammad,','Ahmad','0','0','0','0','0','[\"WB\",\"FM1E\"]','ON-GOING',NULL,NULL,'11','30','45','23','67','0','0','100',NULL,NULL,'David','0','2022-05-17 19:33:51',NULL,NULL,'20','147',NULL,'FM-0067',NULL,NULL,NULL,NULL,NULL,2,6),(116,'0','0','David','0','0','ZUHAIR','ALPHACORE','TOWER A,BANGSAR SOUTH','ZUHAIR','zuhair@alphacoretech.net','Senior Software Developer','ALPHADASH','0',NULL,'Ahmad,Mei,','Ahmad','0','0','0','0','0','[\"WB\",\"FM1E\"]','ON-GOING',NULL,NULL,'12','21','45','23','56','0','0','100',NULL,NULL,'0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,6),(117,'2022-05-21','2022-05-26',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','No 38, Jalan GDR 8/3','0136134022','muhammad.fadzil3647@gmail.com','Taman Gembur Dan Rata','Project Alphadash','                          loladsa          ',NULL,NULL,'0','0','0','1000','2022-05-06','20','[\"t2\"]','2','take a break','40',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-02-13 03:56:53','2022-05-13 03:56:53',NULL,NULL,NULL,NULL,'t2-0064','20',NULL,NULL,NULL,NULL,2,7),(118,'2022-07-16','2022-05-26',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                                                        no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                                                        ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                                                        lola                                    \"\r\n                                    \"\r\n                                    ',NULL,NULL,'0','0','0','500','2022-05-14','20','[\"GS\"]','2','meme','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-01-13 04:06:30','2022-05-24 04:06:33',NULL,NULL,NULL,NULL,'GS-0065','500',NULL,NULL,NULL,NULL,2,6),(122,'2022-05-07','2022-05-28',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','             lola                       ',NULL,NULL,'0','0','0','2080','2022-05-25','20','[\"WB\",\"FM1E\"]','1','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-04-17 04:30:12','2022-05-17 04:30:12',NULL,NULL,NULL,NULL,'WBFM1E-0066','20',NULL,NULL,NULL,NULL,2,6),(123,'2022-05-17 03:00:12','0','David','//','//','PHOON','MARCO','JALAN RAJA LAUT','123456','phoon@surpass.my','Assistant Manager Digital Marketing','MARCO ESTORE','0','HIGH','','0','0','0','10000','0','0','[\"WB\",\"FM1E\"]','ON-GOING',NULL,NULL,'0','0','0','0','0','0','0','100',NULL,NULL,'0','0',NULL,NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,10),(124,'2022-05-17','2022-05-18',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Project Fyp Student','                                          lola                              \"\r\n                                    ',NULL,NULL,'0','0','0','2080','2022-05-13','20','[\"ALP\",\"WB\"]','3','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-17 07:33:26','2022-05-24 03:51:34',NULL,NULL,NULL,NULL,'ALPWB-0067','2080',NULL,NULL,NULL,NULL,2,6),(125,'2022-05-12','2022-05-27',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                             dsadasad                           \"\r\n                                    ',NULL,NULL,'0','0','0','5000','2022-05-25','20','[\"WB\"]','1','meme','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-19 09:56:49','2022-05-24 03:51:23',NULL,NULL,NULL,NULL,'WB-0068','5000',NULL,NULL,NULL,NULL,2,11),(126,'2022-05-27','2022-05-04',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    No 38, Jalan GDR 8/3                                    ','123','muhammad.fadzil3647@gmail.com','Taman Gembur Dan Rata','Project Alphadash','                                               dasdas                         \"\r\n                                    ',NULL,NULL,'0','0','0','20','2022-05-27','20','[\"WB\"]','4','meme','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-19 09:57:25','2022-05-24 03:51:13',NULL,NULL,NULL,NULL,'WB-0069','20',NULL,NULL,NULL,NULL,2,6),(127,'2022-05-13','2022-05-20',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                                       lola                 \"\r\n                                    ',NULL,NULL,'0','0','0','150000','2022-05-12','20','[\"ALP\"]','1','meme','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-20 02:10:21','2022-05-24 03:51:02',NULL,NULL,NULL,NULL,'ALP-0070','150000',NULL,NULL,NULL,NULL,2,13),(128,'2022-05-27','2022-05-28',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                                        fsa                \"\r\n                                    ',NULL,NULL,'0','0','0','1000','2022-05-12','20','[\"GS\",\"WB\"]','1','meme','9',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-20 02:11:26','2022-05-24 03:50:51',NULL,NULL,NULL,NULL,'GSWB-0071','1000',NULL,NULL,NULL,NULL,2,6),(129,'2022-05-06','2022-05-12',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                                 LLOA                       \"\r\n                                    ',NULL,NULL,'0','0','0','2080','2022-05-18','20','[\"GS\",\"WB\"]','4','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-23 07:53:09','2022-05-24 03:50:37',NULL,NULL,NULL,NULL,'GSWB-0072','2080',NULL,NULL,NULL,NULL,2,6),(130,'2022-05-28','2022-06-09',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.02.0','            lola                        ',NULL,NULL,'0','0','0','20802','2022-05-20','20','[\"GS\"]','1','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-25 01:37:50','2022-05-25 01:37:50',NULL,NULL,NULL,NULL,'GS-0073','20',NULL,NULL,NULL,NULL,3,28),(131,'2022-05-27','2022-05-06',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                          lola          ',NULL,NULL,'0','0','0','20802','2022-05-18','20','[\"ads\"]','1','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-27 01:36:26','2022-05-27 01:36:26',NULL,NULL,NULL,NULL,'ads-0074','20','                                    ','                                    ','                                    ','                                    ',1,5),(132,'2022-05-13','2022-05-27',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.02.0','                       dada             ',NULL,NULL,'0','0','0','20802','2022-06-01','20','[\"ALP\"]','2','meme','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-27 01:36:54','2022-05-27 01:36:54',NULL,NULL,NULL,NULL,'ALP-0075','20','                                    ','                                    ','                                    ','                                    ',1,1),(133,'2022-05-28','2022-05-26',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.02.0','       lola                             ',NULL,NULL,'0','0','0','208021','2022-05-11','20','[\"ads\"]','2','meme','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-27 01:49:25','2022-05-27 01:49:25',NULL,NULL,NULL,NULL,'ads-0076','20','                                    ','                                    ','                                    lola','                     flola               ',1,2),(134,'2022-05-07','2022-05-27',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','             lola                       ',NULL,NULL,'0','0','0','2080','2022-05-18','20','[\"ads\"]','3','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-27 01:52:28','2022-05-27 01:52:28',NULL,NULL,NULL,NULL,'ads-0077','20','                                    lasdada','                sdadasdadsasda                    ','                                    ','                                    bolaaa',1,3),(135,'2022-05-11','2022-05-20',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                 lolasd                   ',NULL,NULL,'0','0','0','5000','2022-05-11','20','[\"FM1E\"]','4','meme','15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-05-27 02:24:02','2022-05-27 02:24:02',NULL,NULL,NULL,NULL,'FM1E-0078','20','                                    dasd','asdad                                    ','                                    ','asdad                                    ',1,4),(136,'2022-06-02','2022-05-31',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                                                                                            no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                                                                                        ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','                                                                                                                      lola                          \"\r\n                                    \"\r\n                                    \"\r\n                          ',NULL,NULL,'0','0','0','2080','2022-06-08','20','[\"GS\"]','4','meme','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-06-02 07:50:25','2022-06-02 08:00:28',NULL,NULL,NULL,NULL,'GS-0079','2080','                                                                                                                                                                                                                                                               ','                                                                                                                                                            \r\n                                    \r\n                                    \r\n                ','                                                                                                                                                            \r\n                                    \r\n                                    \r\n                ','                                                                                                                                                            \r\n                                    \r\n                                    \r\n                ',2,12),(137,'2022-06-03','2022-06-09',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','     lola                               ',NULL,NULL,'0','0','0','2080','2022-06-01','20','[\"FM1E\"]','2','meme','10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-06-02 08:06:57','2022-06-02 08:06:57',NULL,NULL,NULL,NULL,'FM1E-0080','20','                                    ','                                    ','                                    dasda','              dasd                      ',1,2),(138,'2022-06-03','2022-06-17',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','                                    no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor                                    ','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Project Alphadash','                                                lola                        \"\r\n                                    ',NULL,NULL,'0','0','0','20','2022-06-08','20','[\"WB\"]','1','meme','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-06-03 08:41:39','2022-06-03 08:43:51',NULL,NULL,NULL,NULL,'WB-0081','20','                                                                                                                ','                                                                            \r\n                                    ','                                                                            \r\n                                    ','                                                                            \r\n                                    ',30,28),(139,'2022-07-01','2022-07-15',NULL,NULL,NULL,'Taman Gembur Dan Rata','Taman Gembur Dan Rata','no 5 jalan usj 12/1j\r\nsubang jaya\r\nselangor','0136134022','najmiemon4223@gmail.com','Taman Gembur Dan Rata','Eclipse 2.0','      sdas                              ',NULL,NULL,'0','0','0','208021','2022-07-06','20','[\"AIU\",\"ads\"]','1','take a break','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,'0','0','2022-07-15 02:44:53','2022-07-15 02:44:53',NULL,NULL,NULL,NULL,'AIUads-0082','20','                                    ','                                    ','                                    ','                                    ',30,28);
/*!40000 ALTER TABLE `sales_funnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_funnel_document`
--

DROP TABLE IF EXISTS `sales_funnel_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_funnel_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_funnel_id` int(11) NOT NULL DEFAULT 0,
  `document_path` varchar(200) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `document_format` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_funnel_document`
--

LOCK TABLES `sales_funnel_document` WRITE;
/*!40000 ALTER TABLE `sales_funnel_document` DISABLE KEYS */;
INSERT INTO `sales_funnel_document` VALUES (32,104,'file/xxh9kSLBOQIr2ESu80ImF3XcKQXwwZ_20220422091746.pdf',0,0,'2022-04-22 13:17:46','2022-04-22 13:17:46','file 1','pdf'),(33,104,'file/Mjqq1fPiSmJBCZv0TlXO6RyRFOiWXe_20220422091746.pdf',0,0,'2022-04-22 13:17:46','2022-04-22 13:17:46','file 2','pdf'),(34,105,'file/1cFrqnr7h31iPDr8fNStjxn469cvCt_20220425015054.pdf',0,0,'2022-04-25 05:50:54','2022-04-25 05:50:54',NULL,NULL),(35,105,'file/fPaj782O0UBlbKJjbOmEvphJzLJxl1_20220425015054.pdf',0,0,'2022-04-25 05:50:54','2022-04-25 05:50:54',NULL,NULL),(36,105,'file/qSv4CKOMbFev6irheX6iEevGXP0heJ_20220425015054.pdf',0,0,'2022-04-25 05:50:54','2022-04-25 05:50:54',NULL,NULL),(37,0,'file/pDQ6yKpacfG5HgtaHLmtifb6QF4dvq_20220425025851.pdf',0,0,'2022-04-25 06:58:51','2022-04-25 06:58:51',NULL,NULL),(38,0,'file/wHy7Rw3lh3s1wLLNkg5iFuvIgye5UT_20220425025851.pdf',0,0,'2022-04-25 06:58:51','2022-04-25 06:58:51',NULL,NULL),(39,105,'file/bo9reb7XR6BgZqgkKv3GlAyhZ02GcM_20220425030101.pdf',0,0,'2022-04-25 07:01:01','2022-04-25 07:01:01',NULL,NULL),(40,105,'file/LQW8eB1DQMwP6NglZiHZJQk2UecCiv_20220425030101.pdf',0,0,'2022-04-25 07:01:01','2022-04-25 07:01:01',NULL,NULL),(41,109,'file/2jPiIiga2STHPjajrAqoM5RFmnn9xR_20220425035512.pdf',0,0,'2022-04-25 07:55:12','2022-04-25 07:55:12','file 3','pdf'),(42,109,'file/7MjynxINBrDFKFeLL3u1ro5qHaiyUy_20220425035512.pdf',0,0,'2022-04-25 07:55:12','2022-04-25 07:55:12',NULL,NULL),(43,110,'file/6vFhQiWS4oGhfcD6pvTW0PQKstvAvo_20220506091151.pdf',0,0,'2022-05-06 13:11:51','2022-05-06 13:11:51',NULL,NULL),(44,111,'file/uOLoR7C2ZSz9JCy2BOKDpmTeaPTICk_20220506091446.pdf',0,0,'2022-05-06 13:14:46','2022-05-06 13:14:46',NULL,NULL),(45,111,'file/DGxWFSH4Macu84luMkVUMxxjpkSrYl_20220506091841.pdf',0,0,'2022-05-06 13:18:41','2022-05-06 13:18:41',NULL,NULL),(46,112,'file/JRCPtFzMsDxXsmjVCVUIamCb4AzmUw_20220511092630.',0,0,'2022-05-11 13:26:30','2022-05-11 13:26:30',NULL,NULL),(47,113,'file/YvYwIAv3CpaiFn5AAcHM3GXm1z0V0z_20220511093024.pdf',0,0,'2022-05-11 13:30:24','2022-05-11 13:30:24',NULL,NULL),(48,119,'file/7RLaZu4YMHvUbPP5rT5U15ToQzTsoR_20220516221619.pdf',0,0,'2022-05-17 02:16:19','2022-05-17 02:16:19',NULL,NULL),(49,120,'file/2n3KzwmEX84Bd9tbD412EwDZz1ucqW_20220517002529.pdf',0,0,'2022-05-17 04:25:29','2022-05-17 04:25:29',NULL,NULL),(50,121,'file/PCy0RVbFHOyaiIMLIZZnjLySapASKG_20220517002752.pdf',0,0,'2022-05-17 04:27:52','2022-05-17 04:27:52',NULL,NULL),(51,122,'file/e0PLGmL56cWe1Sm8JjMTkfUFsBqGJ2_20220517003012.pdf',0,0,'2022-05-17 04:30:12','2022-05-17 04:30:12',NULL,NULL),(52,124,'file/AyqMB2pqTDt8tnSUA25OonUWSHlUfV_20220517033326.pdf',0,0,'2022-05-17 07:33:26','2022-05-17 07:33:26',NULL,NULL),(53,125,'file/HzwwLNGS5kF5ea06W69uFbubOOXo5K_20220519095649.pdf',0,0,'2022-05-19 01:56:49','2022-05-19 01:56:49',NULL,NULL),(54,130,'file/eXzaOKNt0eyQPTHjOzM9hNsZQen27y_20220525013750.pdf',0,0,'2022-05-24 17:37:50','2022-05-24 17:37:50',NULL,NULL),(55,136,'file/xD4KX394eAzJ61rm9pn7IXGzWc9sHw_20220602080205.jpeg',0,0,'2022-06-02 00:02:05','2022-06-02 00:02:05',NULL,NULL),(56,136,'file/bKGPKs3eW6PpEaW0ooWLY3AlG2j73H_20220602080212.pdf',0,0,'2022-06-02 00:02:12','2022-06-02 00:02:12',NULL,NULL),(57,139,'file/S7W9b6oASzpPZZwHgicClZRwKRJC3c_20220714224453.pdf',0,0,'2022-07-15 02:44:53','2022-07-15 02:44:53',NULL,NULL);
/*!40000 ALTER TABLE `sales_funnel_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_grouping`
--

DROP TABLE IF EXISTS `sales_grouping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_grouping` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Leader_id` int(11) DEFAULT NULL,
  `Details` varchar(100) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_grouping`
--

LOCK TABLES `sales_grouping` WRITE;
/*!40000 ALTER TABLE `sales_grouping` DISABLE KEYS */;
INSERT INTO `sales_grouping` VALUES (29,4,'Team A',6,'                                    nona',1,'2022-06-09 01:39:25','2022-06-09 01:39:25'),(32,4,'Team Insurance',9,'                                                                           DSADDDDDDDDDDDDDDDDDDDDDD',1,'2022-06-09 01:41:29','2022-06-09 02:00:39'),(33,4,'Alphadash Sales',10,'                                                                        utk alphadasah              ',1,'2022-06-09 03:46:34','2022-07-18 08:51:04');
/*!40000 ALTER TABLE `sales_grouping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_grouping_member`
--

DROP TABLE IF EXISTS `sales_grouping_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_grouping_member` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_grouping_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_grouping_member`
--

LOCK TABLES `sales_grouping_member` WRITE;
/*!40000 ALTER TABLE `sales_grouping_member` DISABLE KEYS */;
INSERT INTO `sales_grouping_member` VALUES (29,29,7,'2022-06-09 01:39:25','2022-06-09 01:39:25'),(30,29,8,'2022-06-09 01:39:25','2022-06-09 01:39:25'),(48,32,7,'2022-06-09 02:00:39','2022-06-09 02:00:39'),(52,33,11,'2022-07-18 08:51:04','2022-07-18 08:51:04'),(53,33,13,'2022-07-18 08:51:04','2022-07-18 08:51:04'),(54,33,1,'2022-07-18 08:51:04','2022-07-18 08:51:04');
/*!40000 ALTER TABLE `sales_grouping_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_value`
--

DROP TABLE IF EXISTS `sales_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_value` (
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_value`
--

LOCK TABLES `sales_value` WRITE;
/*!40000 ALTER TABLE `sales_value` DISABLE KEYS */;
INSERT INTO `sales_value` VALUES (4,28,2021,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,0,0,NULL,NULL),(6,27,2021,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,1500,0,0,NULL,NULL),(12,9,2021,333344,12002,10003,10004,1000,1000,1000,1000,1000,1000,1000,1000,150000,9000,1900,28000,200,800,1200,700,1900,400,800,800,0,0,NULL,NULL),(13,9,2023,10034,100,100,100,100,100,100,100,100,100,100,100,100,100,100,1001,100,1100,100,120,120,110,100,80,0,0,NULL,NULL),(14,24,2024,150,232324,170,180,190,200,210,220,230,240,250,260,150,2500,190,170,20,500,210,250,500,100,115,210,0,0,NULL,NULL),(16,6,2021,150,232324,170,180,190,200,210,220,230,240,250,260,15000,170,190,170,20,500,210,250,500,100,115,210,0,0,NULL,NULL),(19,2,2020,600,599,0,0,0,0,0,0,0,0,0,0,800,0,0,0,0,0,0,0,0,0,0,0,0,0,'2022-04-21 03:33:20','2022-04-21 03:34:22'),(21,9,2025,0,0,0,0,0,0,0,0,0,0,0,0,200,500,200,0,0,0,0,0,0,0,0,0,0,0,'2022-05-11 09:18:09','2022-05-11 09:18:09'),(23,6,2022,51,4000,10000,10000,0,0,1000,0,0,0,0,0,320,500000,9000,200,0,500000,10000,0,0,0,0,0,0,0,'2022-05-12 04:52:56','2022-06-24 07:19:14'),(24,7,2022,1230,1239,200,1500,0,0,0,0,0,0,0,0,1500,13012,2000,200,3000,0,0,0,0,0,0,0,0,0,'2022-05-13 02:07:24','2022-05-13 02:07:24'),(25,8,2021,200,800,2900,1230,1500,0,0,0,0,0,0,0,100,200,1230,3210,7000,0,0,0,0,0,0,0,0,0,'2022-05-13 02:09:44','2022-05-13 02:09:44'),(26,8,2022,0,0,0,0,0,0,0,0,0,0,0,0,500,200,1700,0,0,0,0,0,0,0,0,0,0,0,'2022-05-13 04:13:48','2022-05-13 04:13:48'),(27,10,2022,100,1000,0,0,0,0,0,0,0,0,0,0,1000,100,0,0,0,0,0,0,0,0,0,0,0,0,'2022-07-18 08:43:28','2022-07-18 08:44:22'),(28,11,2022,100,0,0,0,0,0,0,0,0,0,0,0,11000,0,0,0,0,0,0,0,0,0,0,0,0,0,'2022-07-18 08:44:09','2022-07-18 08:44:09');
/*!40000 ALTER TABLE `sales_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_member`
--

DROP TABLE IF EXISTS `team_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_member` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_grouping_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_member`
--

LOCK TABLES `team_member` WRITE;
/*!40000 ALTER TABLE `team_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'admin\r\n','2020-09-21 00:00:00'),(2,'employee','2020-09-21 00:00:00');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Barry','Cudo','Barry','barrycuda@example.com','$2y$10$zb2ibzzBKJHQaMeMoMZqTuRxERFAZl0LZUya8yJkxKa8JM6yzQEXy','9876543210','Los Angeles, California','avatar-19.jpg','2020-09-21 19:04:47'),(7,'Yahuza','Abdul-Hakim','Vendetta','musheabdulhakim@protonmail.ch','$2y$10$f3acNJ/slpOfQvZy.u6OfOM6GOLTTjz3IYUIbMMQuixXjmgeRQ0Ga','233209229025','San Francisco Bay Area','my-passport-photo.jpg','2020-09-21 19:05:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(225) DEFAULT '',
  `availibility` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy`
--

LOCK TABLES `vacancy` WRITE;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` VALUES (1,'Web Developer',2),(2,'ADMIN CUM SALES EXECUTIVES',1);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(225) DEFAULT NULL,
  `comp_name` varchar(225) DEFAULT NULL,
  `phone_no` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `purpose` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

LOCK TABLES `visitor` WRITE;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` VALUES (1,'najib','top glove','01133544230','najib@gmail.com','new project meeting','11/4/2022'),(2,'jibby','jibby.co','0164327495','jibby@gmail.com','company visit','12/4/2022'),(3,'Cheang','Respontrade','014-7450996','cheang@orespontrade.com','HRMS Meeting','2022-04-13');
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'alphacor_alphadash-sales'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21 18:13:29
