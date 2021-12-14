-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: bigsdev
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albums` (
  `album_id` int unsigned NOT NULL AUTO_INCREMENT,
  `album_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int unsigned NOT NULL,
  `album_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`album_id`),
  KEY `albums_userid_foreign` (`userid`),
  CONSTRAINT `albums_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (40,'First',20,0,'2021-01-22 06:40:56','2021-01-22 06:40:56'),(41,'test',20,1,'2021-01-27 12:32:53','2021-02-24 11:44:35'),(42,'sample',20,1,'2021-01-30 15:50:01','2021-02-24 11:30:02'),(43,'tut',129,0,'2021-02-05 08:42:25','2021-02-05 08:42:25'),(44,'fudgxg',129,0,'2021-02-05 08:44:22','2021-02-05 08:44:22'),(45,'tuu',129,0,'2021-02-05 08:45:56','2021-02-05 08:45:56'),(46,'ty',129,0,'2021-02-05 08:49:41','2021-02-05 08:49:41'),(47,'sample',130,0,'2021-02-05 10:00:00','2021-02-05 10:00:00'),(48,'ttt',130,0,'2021-02-05 10:07:15','2021-02-05 10:07:15'),(49,'sanj',20,1,'2021-02-05 10:40:18','2021-02-24 11:31:44'),(50,'Nag',66,0,'2021-02-07 02:39:30','2021-02-07 02:39:30'),(51,'nage',66,0,'2021-02-08 04:21:34','2021-02-08 04:21:34'),(52,'nn',66,0,'2021-02-08 04:22:28','2021-02-08 04:22:28'),(53,'Nag',66,0,'2021-02-08 10:22:36','2021-02-08 10:22:36'),(54,'new Album',1,0,'2021-02-08 10:39:52','2021-02-08 10:39:52'),(55,'nns',66,0,'2021-02-11 07:07:28','2021-02-11 07:07:28'),(56,'gg',66,0,'2021-02-11 07:09:23','2021-02-11 07:09:23'),(57,'Sanjeev',20,0,'2021-02-24 11:49:04','2021-02-24 11:49:04'),(58,'my photo',20,1,'2021-02-24 11:51:59','2021-02-24 14:01:42'),(59,'NewsAlbum',20,1,'2021-02-24 11:57:44','2021-02-24 14:02:55'),(60,'NewsAlbum',20,1,'2021-02-24 11:58:54','2021-02-24 14:07:18'),(61,'News album',20,0,'2021-02-24 12:00:09','2021-02-24 12:00:09'),(62,'News album',20,1,'2021-02-24 12:00:48','2021-02-24 14:00:33'),(63,'NewsAlbum',20,1,'2021-02-24 12:02:46','2021-02-24 14:03:54'),(64,'hdjd',20,1,'2021-02-24 12:04:43','2021-02-24 14:06:15'),(65,'Tour album',20,0,'2021-02-24 12:21:10','2021-02-24 12:21:10'),(66,'jfjcfj',20,1,'2021-02-24 12:25:01','2021-02-24 13:49:51'),(67,'yuyu',20,1,'2021-02-24 12:28:27','2021-02-24 13:51:40'),(68,'cncjjf',20,1,'2021-02-24 13:36:25','2021-02-24 14:07:03'),(69,'jfjchx',20,1,'2021-02-24 13:37:46','2021-02-24 13:43:18'),(70,'gxbxhx',20,1,'2021-02-24 13:38:43','2021-02-24 13:43:03'),(71,'gzbxnxjcj',20,1,'2021-02-24 13:39:53','2021-02-24 13:40:36'),(72,'new Album',181,0,'2021-02-25 18:06:39','2021-02-25 18:06:39'),(73,'new Album',182,0,'2021-02-26 07:41:43','2021-02-26 07:41:43'),(74,'new Album',181,0,'2021-02-26 08:24:41','2021-02-26 08:24:41'),(75,'rrttewdb',20,1,'2021-03-02 06:53:28','2021-03-02 10:51:12'),(76,'MYVisit',66,0,'2021-03-02 08:13:51','2021-03-02 08:13:51'),(77,'London',66,0,'2021-03-02 08:15:25','2021-03-02 08:15:25'),(78,'Paris',66,0,'2021-03-02 08:15:45','2021-03-02 08:15:45'),(79,'new Album',192,0,'2021-03-02 08:40:47','2021-03-02 08:40:47'),(80,'NO One',66,0,'2021-03-02 10:59:38','2021-03-02 10:59:38'),(81,'newOne',66,0,'2021-03-02 11:25:18','2021-03-02 11:25:18'),(82,'New',20,0,'2021-03-03 05:53:54','2021-03-03 05:53:54'),(83,'new Album',143,0,'2021-03-08 08:32:41','2021-03-08 08:32:41'),(84,'test',104,0,'2021-03-11 07:13:53','2021-03-11 07:13:53'),(85,'new Album',216,0,'2021-03-31 10:48:44','2021-03-31 10:48:44'),(86,'test',217,0,'2021-04-02 09:57:02','2021-04-02 09:57:02'),(87,'Oneplus',74,0,'2021-04-05 06:32:26','2021-04-05 06:32:26'),(88,'hhcjc',223,0,'2021-04-05 13:29:42','2021-04-05 13:29:42');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chapters` (
  `chapter_id` int unsigned NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapters`
--

LOCK TABLES `chapters` WRITE;
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` VALUES (1,'chapter1','2020-12-10 11:39:27','2020-12-10 11:39:27'),(2,'chapter2','2020-12-10 11:39:27','2020-12-10 11:39:27'),(3,'chapter3','2020-12-10 11:39:27','2020-12-10 11:39:27'),(4,'chapter4','2020-12-10 11:39:27','2020-12-10 11:39:27'),(5,'chapter5','2020-12-10 11:39:27','2020-12-10 11:39:27');
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connections`
--

DROP TABLE IF EXISTS `connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `connections` (
  `connection_id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int unsigned NOT NULL,
  `reciever_id` int NOT NULL,
  `accept_status` int NOT NULL DEFAULT '0',
  `reject_status` int NOT NULL DEFAULT '0',
  `block_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`connection_id`),
  KEY `connections_sender_id_foreign` (`sender_id`),
  CONSTRAINT `connections_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connections`
--

LOCK TABLES `connections` WRITE;
/*!40000 ALTER TABLE `connections` DISABLE KEYS */;
INSERT INTO `connections` VALUES (1,2,4,0,1,0,'2021-02-09 14:49:04','2021-02-09 14:53:36'),(2,2,6,0,1,1,'2021-02-09 14:51:31','2021-03-29 07:19:42'),(3,2,8,1,0,0,'2021-02-16 09:26:01','2021-02-16 09:26:11'),(25,104,2,0,1,0,'2021-02-24 06:48:14','2021-03-12 11:10:23'),(34,66,2,0,1,0,'2021-02-26 10:46:32','2021-03-18 12:05:05'),(35,66,4,0,1,0,'2021-02-26 10:46:33','2021-03-18 12:05:05'),(36,66,4,0,1,0,'2021-03-02 04:38:55','2021-03-18 12:05:05'),(37,66,7,0,1,0,'2021-03-02 04:39:03','2021-03-18 12:05:05'),(38,66,9,0,1,0,'2021-03-02 04:39:10','2021-03-18 12:05:05'),(40,20,104,1,1,0,'2021-03-02 11:06:58','2021-03-12 11:10:23'),(41,66,20,1,1,0,'2021-03-02 11:34:40','2021-03-12 11:10:23'),(42,66,20,1,1,0,'2021-03-02 11:37:07','2021-04-01 07:33:06'),(43,66,29,0,1,0,'2021-03-02 11:37:17','2021-03-18 12:05:05'),(44,66,4,0,1,0,'2021-03-02 11:57:57','2021-03-18 12:05:05'),(45,20,4,0,1,0,'2021-03-03 05:55:51','2021-03-24 10:56:19'),(46,66,4,0,1,0,'2021-03-17 07:07:55','2021-03-18 12:05:05'),(47,66,4,0,1,0,'2021-03-22 05:03:09','2021-03-22 09:42:52'),(48,66,4,0,1,0,'2021-03-22 05:03:11','2021-03-22 09:42:52'),(49,66,22,0,1,0,'2021-03-22 05:03:28','2021-03-22 09:42:52'),(50,66,14,0,1,0,'2021-03-22 10:51:42','2021-04-01 07:44:49'),(51,66,2,0,1,0,'2021-03-22 10:52:26','2021-04-01 07:44:49'),(52,66,4,0,1,0,'2021-03-22 10:53:00','2021-04-01 07:44:49'),(53,66,4,0,1,0,'2021-03-24 05:52:10','2021-04-01 07:44:49'),(54,66,2,0,1,0,'2021-03-24 11:00:10','2021-04-01 07:44:49'),(55,66,4,0,1,0,'2021-03-24 11:42:38','2021-04-01 07:44:49'),(56,20,104,1,1,0,'2021-03-25 05:39:29','2021-04-01 07:33:06'),(57,20,10,0,1,0,'2021-03-25 05:40:36','2021-04-01 07:33:06'),(58,104,4,0,1,0,'2021-03-25 06:52:26','2021-04-01 07:44:38'),(59,66,66,1,1,0,'2021-03-25 07:11:05','2021-04-01 07:33:06'),(60,66,12,0,1,0,'2021-03-25 10:40:34','2021-04-01 07:44:49'),(61,19,13,0,0,0,'2021-03-25 10:42:52','2021-03-25 10:42:52'),(62,19,12,0,0,0,'2021-03-25 10:42:54','2021-03-25 10:42:54'),(63,19,66,1,1,0,'2021-03-25 10:43:04','2021-04-01 07:33:06'),(64,66,4,0,1,0,'2021-03-25 10:46:35','2021-04-01 07:44:49'),(65,66,20,1,1,0,'2021-03-25 10:46:51','2021-04-01 07:33:06'),(66,104,66,1,1,0,'2021-03-25 11:13:10','2021-04-01 07:33:06'),(67,66,8,1,0,0,'2021-03-25 11:38:58','2021-04-01 11:41:22'),(68,66,2,0,1,0,'2021-03-28 13:34:37','2021-04-01 07:44:49'),(69,66,2,0,1,0,'2021-03-29 06:15:38','2021-04-01 07:44:49'),(70,66,2,0,1,0,'2021-03-29 06:16:38','2021-04-01 07:44:49'),(71,66,4,0,1,0,'2021-03-29 06:16:57','2021-04-01 07:44:49'),(72,66,4,0,1,0,'2021-03-29 06:28:25','2021-04-01 07:44:49'),(73,66,2,0,1,0,'2021-03-29 06:29:34','2021-04-01 07:44:49'),(74,66,2,0,1,0,'2021-03-29 06:29:43','2021-04-01 07:44:49'),(75,66,2,0,1,0,'2021-03-29 06:29:57','2021-04-01 07:44:49'),(76,66,2,0,1,0,'2021-03-29 06:32:15','2021-04-01 07:44:49'),(77,66,2,0,1,0,'2021-03-29 06:33:39','2021-04-01 07:44:49'),(78,66,4,0,1,0,'2021-03-29 06:34:24','2021-04-01 07:44:49'),(79,66,4,0,1,0,'2021-03-29 06:34:54','2021-04-01 07:44:49'),(80,66,2,0,1,0,'2021-03-29 07:31:52','2021-04-01 07:44:49'),(81,66,2,0,1,0,'2021-03-29 07:38:10','2021-04-01 07:44:49'),(82,66,2,0,1,0,'2021-03-29 07:56:17','2021-04-01 07:44:49'),(83,66,2,0,1,0,'2021-03-29 07:56:21','2021-04-01 07:44:49'),(84,66,2,0,1,0,'2021-03-29 07:56:24','2021-04-01 07:44:49'),(85,20,4,0,1,0,'2021-03-29 14:08:52','2021-04-01 07:33:06'),(86,66,4,0,1,0,'2021-04-01 07:36:30','2021-04-01 07:44:49'),(87,66,4,0,1,0,'2021-04-01 07:36:38','2021-04-01 07:44:49'),(88,66,5,0,1,0,'2021-04-01 07:36:44','2021-04-01 07:44:49'),(89,66,4,0,0,0,'2021-04-01 08:16:05','2021-04-01 08:16:05'),(90,66,20,1,1,0,'2021-04-01 08:16:14','2021-04-05 06:13:48'),(91,66,74,1,1,0,'2021-04-01 08:16:20','2021-04-02 13:04:59'),(92,66,75,1,0,0,'2021-04-01 08:16:23','2021-04-01 08:19:17'),(93,20,66,1,0,0,'2021-04-01 08:17:32','2021-04-05 06:14:10'),(94,74,66,1,1,0,'2021-04-01 08:18:33','2021-04-02 13:04:59'),(95,75,66,0,1,0,'2021-04-01 08:19:33','2021-04-02 13:04:59'),(96,75,19,1,0,0,'2021-04-01 08:19:39','2021-04-01 08:20:36'),(97,19,66,1,1,0,'2021-04-01 08:20:49','2021-04-05 06:13:48'),(98,126,8,0,0,0,'2021-04-06 08:48:14','2021-04-06 08:48:14');
/*!40000 ALTER TABLE `connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_documents`
--

DROP TABLE IF EXISTS `discount_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discount_documents` (
  `discountdocument_id` int unsigned NOT NULL AUTO_INCREMENT,
  `discountid` int unsigned NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`discountdocument_id`),
  KEY `discount_documents_discountid_foreign` (`discountid`),
  CONSTRAINT `discount_documents_discountid_foreign` FOREIGN KEY (`discountid`) REFERENCES `discounts` (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_documents`
--

LOCK TABLES `discount_documents` WRITE;
/*!40000 ALTER TABLE `discount_documents` DISABLE KEYS */;
INSERT INTO `discount_documents` VALUES (3,2,'SAI RESUME-1609940406.pdf',0,'2021-01-06 13:40:06','2021-01-06 13:40:06'),(4,2,'Screenshot (50)-1609940406.png',0,'2021-01-06 13:40:06','2021-01-06 13:40:06'),(5,3,'SAI RESUME-1609940764.pdf',0,'2021-01-06 13:46:04','2021-01-06 13:46:04'),(6,3,'Screenshot (50)-1609940764.png',0,'2021-01-06 13:46:04','2021-01-06 13:46:04'),(7,4,'http://54.187.114.170/discount_documents/SAI RESUME-1610360860.pdf',0,'2021-01-11 10:27:41','2021-01-11 10:27:41'),(8,4,'http://54.187.114.170/discount_documents/Screenshot (50)-1610360861.png',0,'2021-01-11 10:27:41','2021-01-11 10:27:41'),(9,8,'http://54.187.114.170:81/discount_documents/747424_a3cb52587d554cb9b78d49a18474bc71_mv2-1613024294.png',0,'2021-02-11 06:18:14','2021-02-11 06:18:14'),(10,11,'http://54.187.114.170:81/discount_documents/0266554465-1614321164.jpeg',0,'2021-02-26 06:32:44','2021-02-26 06:32:44'),(11,11,'http://54.187.114.170:81/discount_documents/download-1614321164.jpg',0,'2021-02-26 06:32:44','2021-02-26 06:32:44'),(12,17,'http://54.187.114.170:81/discount_documents/M-1614322627.png',0,'2021-02-26 06:57:07','2021-02-26 06:57:07'),(13,26,'http://54.187.114.170:81/discount_documents/download-1614324378.jpg',0,'2021-02-26 07:26:18','2021-02-26 07:26:18'),(14,31,'http://54.187.114.170:81/discount_documents/download-1614325465.jpg',0,'2021-02-26 07:44:25','2021-02-26 07:44:25'),(15,32,'http://54.187.114.170:81/discount_documents/0266554465-1614325506.jpeg',0,'2021-02-26 07:45:06','2021-02-26 07:45:06'),(16,33,'http://54.187.114.170:81/discount_documents/0266554465-1614325611.jpeg',0,'2021-02-26 07:46:51','2021-02-26 07:46:51'),(17,34,'http://54.187.114.170:81/discount_documents/download-1614325720.jpg',0,'2021-02-26 07:48:40','2021-02-26 07:48:40'),(18,35,'http://54.187.114.170:81/discount_documents/0266554465-1614325812.jpeg',0,'2021-02-26 07:50:12','2021-02-26 07:50:12'),(19,36,'http://54.187.114.170:81/discount_documents/0266554465-1614325881.jpeg',0,'2021-02-26 07:51:21','2021-02-26 07:51:21'),(20,36,'http://54.187.114.170:81/discount_documents/download-1614325881.jpg',0,'2021-02-26 07:51:21','2021-02-26 07:51:21'),(21,37,'http://54.187.114.170:81/discount_documents/Screenshot (1)-1614685879.png',0,'2021-03-02 11:51:19','2021-03-02 11:51:19'),(22,37,'http://54.187.114.170:81/discount_documents/Screenshot (2)-1614685879.png',0,'2021-03-02 11:51:19','2021-03-02 11:51:19'),(23,38,'http://54.187.114.170:81/discount_documents/Screenshot (1)-1614685887.png',0,'2021-03-02 11:51:27','2021-03-02 11:51:27'),(24,38,'http://54.187.114.170:81/discount_documents/Screenshot (2)-1614685887.png',0,'2021-03-02 11:51:27','2021-03-02 11:51:27'),(25,39,'http://54.187.114.170:81/discount_documents/Screenshot (1)-1614685890.png',0,'2021-03-02 11:51:30','2021-03-02 11:51:30'),(26,39,'http://54.187.114.170:81/discount_documents/Screenshot (2)-1614685890.png',0,'2021-03-02 11:51:30','2021-03-02 11:51:30');
/*!40000 ALTER TABLE `discount_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts` (
  `discount_id` int unsigned NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int unsigned NOT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`discount_id`),
  KEY `discounts_created_by_foreign` (`created_by`),
  CONSTRAINT `discounts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (1,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2020-12-14 08:11:08','2020-12-14 08:11:08'),(2,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,1,'2021-01-06 13:40:06','2021-04-02 07:35:05'),(3,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-01-06 13:46:04','2021-01-06 13:46:04'),(4,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-01-11 10:27:40','2021-01-11 10:27:40'),(5,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-05 11:50:46','2021-02-05 11:50:46'),(6,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-05 11:52:14','2021-02-05 11:52:14'),(7,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-08 10:10:49','2021-02-08 10:10:49'),(8,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-11 06:18:14','2021-02-11 06:18:14'),(9,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-11 11:53:35','2021-02-11 11:53:35'),(10,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,1,'2021-02-11 11:53:54','2021-03-09 06:57:41'),(11,'ggfgdfg','rteretv','fddsfsdfgdrty','2020-11-30','2020-11-30',181,1,'2021-02-26 06:32:44','2021-03-09 06:57:03'),(12,'sdgsdgsg','sdfsdfsdf','sgsdgsdg','2021-02-26','2021-02-27',181,1,'2021-02-26 06:50:06','2021-03-09 06:56:10'),(13,'sdgsg','sdgfsgsg','sgsdgsdg','2021-02-25','2021-02-27',181,1,'2021-02-26 06:53:14','2021-03-09 06:57:13'),(14,'sggsg','sgsdgdsgds','sfdfsdf','2021-02-26','2021-02-27',181,0,'2021-02-26 06:56:12','2021-02-26 06:56:12'),(15,'sggsg','sgsdgdsgds','sfdfsdf','2021-02-26','2021-02-27',181,0,'2021-02-26 06:56:12','2021-02-26 06:56:12'),(16,'sggsg','sgsdgdsgds','sfdfsdf','2021-02-26','2021-02-27',181,0,'2021-02-26 06:57:05','2021-02-26 06:57:05'),(17,'New discount','new partner','xnbfakKASMd<Sxc , KSDAJKFASKFJn','2020-11-01','2020-11-30',1,0,'2021-02-26 06:57:07','2021-02-26 06:57:07'),(18,'dhdh','dfhdfh','dhdh','2021-02-25','2021-02-27',181,0,'2021-02-26 06:59:19','2021-02-26 06:59:19'),(19,'sfsfsdf','sfsdfsfs','fsdfsdfs','2021-02-25','2021-02-27',181,0,'2021-02-26 07:01:04','2021-02-26 07:01:04'),(20,'yeryery','etertet','etetet','2021-02-25','2021-02-27',181,0,'2021-02-26 07:03:51','2021-02-26 07:03:51'),(21,'tertert','ertertert','tertert','2021-02-25','2021-02-27',181,0,'2021-02-26 07:14:13','2021-02-26 07:14:13'),(22,'dhdfh','dfhdfhdh','hdfhdh','2021-02-25','2021-02-27',181,0,'2021-02-26 07:15:57','2021-02-26 07:15:57'),(23,'ghfh','dfhdhdh','hdfhdfh','2021-02-25','2021-02-27',181,0,'2021-02-26 07:17:08','2021-02-26 07:17:08'),(24,'gfhfgh','fhfgh','fhgh','2021-02-25','2021-02-28',181,0,'2021-02-26 07:19:30','2021-02-26 07:19:30'),(25,'hdhg','hfghfgh','fghgfh','2021-02-25','2021-02-28',181,0,'2021-02-26 07:23:28','2021-02-26 07:23:28'),(26,'utyuytu','tyutyut','tyutyutyu','2021-02-25','2021-02-27',181,0,'2021-02-26 07:26:18','2021-02-26 07:26:18'),(27,'fsdfsd','fsdfsdf','dfsfs','2021-02-25','2021-02-27',181,0,'2021-02-26 07:30:24','2021-02-26 07:30:24'),(28,'gdfgd','ggdfg','gdfdfg','2021-02-25','2021-02-27',181,0,'2021-02-26 07:34:25','2021-02-26 07:34:25'),(29,'dgdfg','gdgdfgdg','gdfgdg','2021-02-26','2021-02-27',181,0,'2021-02-26 07:41:30','2021-02-26 07:41:30'),(30,'gdgdf','dgdfgdfg','dgdfg','2021-02-25','2021-02-24',181,0,'2021-02-26 07:43:17','2021-02-26 07:43:17'),(31,'fsdfsd','fsdfds','fsdfdf','2021-02-25','2021-02-28',181,0,'2021-02-26 07:44:25','2021-02-26 07:44:25'),(32,'fsdfsd','fsdfds','fsdfdf','2021-02-25','2021-02-28',181,0,'2021-02-26 07:45:06','2021-02-26 07:45:06'),(33,'fsdfsdf','fsdfsdf','fdsdfsdf','2021-02-25','2021-02-28',181,0,'2021-02-26 07:46:51','2021-02-26 07:46:51'),(34,'fsdfds','fsdfsdf','sdfdfsf','2021-02-25','2021-02-27',181,0,'2021-02-26 07:48:40','2021-02-26 07:48:40'),(35,'fsfsdf','sfsdf','fsfdsf','2021-02-25','2021-02-27',181,0,'2021-02-26 07:50:12','2021-02-26 07:50:12'),(36,'sfdfsdf','sfsdf','sfsdfsf','2021-02-27','2021-02-28',181,0,'2021-02-26 07:51:21','2021-02-26 07:51:21'),(37,'new discount','partner','description','2021-03-04','2021-03-27',192,0,'2021-03-02 11:51:19','2021-03-02 11:51:19'),(38,'new discount','partner','description','2021-03-04','2021-03-27',192,0,'2021-03-02 11:51:27','2021-03-02 11:51:27'),(39,'new discount','partner','description','2021-03-04','2021-03-27',192,0,'2021-03-02 11:51:30','2021-03-02 11:51:30'),(40,'undefined','undefined','undefined','0000-00-00','0000-00-00',218,0,'2021-04-05 07:20:36','2021-04-05 07:20:36');
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_dates`
--

DROP TABLE IF EXISTS `event_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_dates` (
  `eventdate_id` int unsigned NOT NULL AUTO_INCREMENT,
  `eventid` int unsigned NOT NULL,
  `event_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventdate_id`),
  KEY `event_dates_eventid_foreign` (`eventid`),
  CONSTRAINT `event_dates_eventid_foreign` FOREIGN KEY (`eventid`) REFERENCES `event_master` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_dates`
--

LOCK TABLES `event_dates` WRITE;
/*!40000 ALTER TABLE `event_dates` DISABLE KEYS */;
INSERT INTO `event_dates` VALUES (1,1,'2021-03-31','01:00:00',NULL,'04:00:00','2021-03-17 07:53:10','2021-03-17 08:58:15'),(2,2,NULL,NULL,NULL,NULL,'2021-03-17 07:55:34','2021-03-17 07:55:34'),(3,3,'2021-03-31','01:00:00',NULL,'04:00:00','2021-03-17 08:50:09','2021-03-17 08:50:09'),(4,4,NULL,NULL,NULL,NULL,'2021-03-19 06:50:21','2021-03-19 06:50:21'),(5,5,NULL,NULL,NULL,NULL,'2021-03-19 07:04:13','2021-03-19 07:04:13'),(6,6,NULL,NULL,NULL,NULL,'2021-03-19 08:17:58','2021-03-19 08:17:58'),(7,7,NULL,NULL,NULL,NULL,'2021-03-19 08:18:21','2021-03-19 08:18:21'),(8,8,NULL,NULL,NULL,NULL,'2021-03-19 08:36:01','2021-03-19 08:36:01'),(9,9,NULL,NULL,NULL,NULL,'2021-03-19 08:39:48','2021-03-19 08:39:48'),(10,10,NULL,NULL,NULL,NULL,'2021-03-19 11:36:21','2021-03-19 11:36:21'),(11,11,NULL,NULL,NULL,NULL,'2021-03-19 11:39:37','2021-03-19 11:39:37'),(12,12,NULL,NULL,NULL,NULL,'2021-03-19 11:43:14','2021-03-19 11:43:14'),(13,13,NULL,NULL,NULL,NULL,'2021-03-19 11:57:01','2021-03-19 11:57:01'),(14,14,NULL,NULL,NULL,NULL,'2021-03-19 11:58:21','2021-03-19 11:58:21'),(15,15,NULL,NULL,NULL,NULL,'2021-03-22 05:57:26','2021-03-22 05:57:26'),(16,16,NULL,NULL,NULL,NULL,'2021-03-22 07:36:52','2021-03-22 07:36:52'),(17,17,NULL,NULL,NULL,NULL,'2021-03-23 12:20:28','2021-03-23 12:20:28'),(18,18,NULL,NULL,NULL,NULL,'2021-03-24 07:01:24','2021-03-24 07:01:24'),(19,19,NULL,NULL,NULL,NULL,'2021-03-25 06:16:50','2021-03-25 06:16:50'),(20,20,NULL,NULL,NULL,NULL,'2021-03-25 06:24:56','2021-03-25 06:24:56'),(21,21,NULL,NULL,NULL,NULL,'2021-03-25 06:25:11','2021-03-25 06:25:11'),(22,22,NULL,NULL,NULL,NULL,'2021-03-25 06:25:16','2021-03-25 06:25:16'),(23,23,NULL,NULL,NULL,NULL,'2021-03-25 06:27:19','2021-03-25 06:27:19'),(24,24,NULL,NULL,NULL,NULL,'2021-03-25 06:27:24','2021-03-25 06:27:24'),(25,25,NULL,NULL,NULL,NULL,'2021-03-25 06:38:33','2021-03-25 06:38:33'),(26,26,NULL,NULL,NULL,NULL,'2021-03-25 06:38:43','2021-03-25 06:38:43'),(27,27,NULL,NULL,NULL,NULL,'2021-03-25 06:44:43','2021-03-25 06:44:43'),(28,28,NULL,NULL,NULL,NULL,'2021-03-25 06:51:20','2021-03-25 06:51:20'),(29,29,NULL,NULL,NULL,NULL,'2021-03-25 06:51:31','2021-03-25 06:51:31'),(30,30,NULL,NULL,NULL,NULL,'2021-03-25 06:54:58','2021-03-25 06:54:58'),(31,31,NULL,NULL,NULL,NULL,'2021-03-25 06:59:12','2021-03-25 06:59:12'),(32,32,NULL,NULL,NULL,NULL,'2021-03-25 06:59:12','2021-03-25 06:59:12'),(33,33,NULL,NULL,NULL,NULL,'2021-03-25 07:01:34','2021-03-25 07:01:34'),(34,34,NULL,NULL,NULL,NULL,'2021-03-25 07:03:58','2021-03-25 07:03:58'),(35,35,NULL,NULL,NULL,NULL,'2021-03-25 07:23:45','2021-03-25 07:23:45'),(36,36,NULL,NULL,NULL,NULL,'2021-03-25 07:26:37','2021-03-25 07:26:37'),(37,37,NULL,NULL,NULL,NULL,'2021-03-25 10:20:53','2021-03-25 10:20:53'),(38,38,NULL,NULL,NULL,NULL,'2021-03-25 10:26:47','2021-03-25 10:26:47'),(39,39,NULL,NULL,NULL,NULL,'2021-03-25 10:29:42','2021-03-25 10:29:42'),(40,40,NULL,NULL,NULL,NULL,'2021-03-25 10:29:51','2021-03-25 10:29:51'),(41,41,NULL,NULL,NULL,NULL,'2021-03-25 10:30:34','2021-03-25 10:30:34'),(42,42,NULL,NULL,NULL,NULL,'2021-03-25 10:31:25','2021-03-25 10:31:25'),(43,43,NULL,NULL,NULL,NULL,'2021-03-25 10:33:04','2021-03-25 10:33:04'),(44,44,NULL,NULL,NULL,NULL,'2021-03-25 10:40:09','2021-03-25 10:40:09'),(45,45,NULL,NULL,NULL,NULL,'2021-03-25 11:05:40','2021-03-25 11:05:40'),(46,46,NULL,NULL,NULL,NULL,'2021-03-25 11:32:14','2021-03-25 11:32:14'),(47,47,NULL,NULL,NULL,NULL,'2021-03-25 11:46:56','2021-03-25 11:46:56'),(48,48,NULL,NULL,NULL,NULL,'2021-03-25 11:54:08','2021-03-25 11:54:08'),(49,49,NULL,NULL,NULL,NULL,'2021-03-25 11:57:07','2021-03-25 11:57:07'),(50,50,NULL,NULL,NULL,NULL,'2021-03-25 12:03:06','2021-03-25 12:03:06'),(51,51,NULL,NULL,NULL,NULL,'2021-03-25 12:07:57','2021-03-25 12:07:57'),(52,52,NULL,NULL,NULL,NULL,'2021-03-25 12:08:24','2021-03-25 12:08:24'),(53,53,NULL,NULL,NULL,NULL,'2021-03-25 12:08:32','2021-03-25 12:08:32'),(54,54,NULL,NULL,NULL,NULL,'2021-03-25 12:13:53','2021-03-25 12:13:53'),(55,55,NULL,NULL,NULL,NULL,'2021-03-25 12:23:59','2021-03-25 12:23:59'),(56,56,NULL,NULL,NULL,NULL,'2021-03-25 12:24:14','2021-03-25 12:24:14'),(57,57,NULL,NULL,NULL,NULL,'2021-03-25 12:24:16','2021-03-25 12:24:16'),(58,58,NULL,NULL,NULL,NULL,'2021-03-25 12:43:03','2021-03-25 12:43:03'),(59,59,NULL,NULL,NULL,NULL,'2021-03-25 12:47:47','2021-03-25 12:47:47'),(60,60,NULL,NULL,NULL,NULL,'2021-03-25 12:47:56','2021-03-25 12:47:56'),(61,61,NULL,NULL,NULL,NULL,'2021-03-25 12:48:01','2021-03-25 12:48:01'),(62,62,NULL,NULL,NULL,NULL,'2021-03-25 12:48:05','2021-03-25 12:48:05'),(63,63,NULL,NULL,NULL,NULL,'2021-03-26 05:41:51','2021-03-26 05:41:51'),(64,64,NULL,NULL,NULL,NULL,'2021-03-26 05:45:47','2021-03-26 05:45:47'),(65,65,'2021-03-31','02:00:00',NULL,'05:00:00','2021-04-01 07:47:00','2021-04-01 07:47:00');
/*!40000 ALTER TABLE `event_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_master`
--

DROP TABLE IF EXISTS `event_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_master` (
  `event_id` int unsigned NOT NULL AUTO_INCREMENT,
  `eventtypeid` int unsigned NOT NULL,
  `chapterid` int unsigned DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `prerequisites` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `disclaimer` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_userid` int unsigned NOT NULL,
  `self_register` int NOT NULL DEFAULT '0',
  `noof_seats` int DEFAULT NULL,
  `available_seats` int DEFAULT NULL,
  `paid_event` int NOT NULL DEFAULT '1',
  `send_notifications` int NOT NULL DEFAULT '0',
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`),
  KEY `event_master_eventtypeid_foreign` (`eventtypeid`),
  KEY `event_master_created_userid_foreign` (`created_userid`),
  CONSTRAINT `event_master_created_userid_foreign` FOREIGN KEY (`created_userid`) REFERENCES `users` (`user_id`),
  CONSTRAINT `event_master_eventtypeid_foreign` FOREIGN KEY (`eventtypeid`) REFERENCES `event_types` (`eventtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_master`
--

LOCK TABLES `event_master` WRITE;
/*!40000 ALTER TABLE `event_master` DISABLE KEYS */;
INSERT INTO `event_master` VALUES (1,1,1,'First Edit Event','First event description','prerequisites','notes','disclaimer','2021-03-31','2021-04-03',8,0,30,30,1,0,1,'2021-03-17 07:53:10','2021-03-31 05:27:57'),(2,1,1,'First Event','Fisrat event description','xfzdfdsgdsgfxd','notes','fgsdrawerewtsrg','2021-03-31','2021-04-03',8,0,30,30,1,0,1,'2021-03-17 07:55:34','2021-03-17 07:56:25'),(3,1,1,'First Edit Event','First event description','prerequisites','notes','disclaimer','2021-03-31','2021-04-03',8,0,30,30,1,0,0,'2021-03-17 08:50:09','2021-03-17 08:50:09'),(4,1,1,'a','a','a','a','a','2021-03-20','2021-03-21',143,0,1,1,1,0,1,'2021-03-19 06:50:21','2021-03-22 10:29:55'),(5,1,1,'q','a','a','q','a','2021-03-20','2021-03-21',143,0,1,1,0,0,1,'2021-03-19 07:04:13','2021-03-22 10:29:56'),(6,1,1,'fh','hgfs','hg','ghgf','ghgf','2021-03-11','2021-03-18',143,1,1,1,0,0,1,'2021-03-19 08:17:58','2021-03-31 05:28:04'),(7,1,1,'fh','hgfs','hg','ghgf','ghgf','2021-03-11','2021-03-18',143,1,1,1,0,0,1,'2021-03-19 08:18:21','2021-03-22 10:29:40'),(8,1,1,'w','w','w','s','w','2021-03-20','2021-03-21',143,0,1,1,0,0,1,'2021-03-19 08:36:01','2021-03-22 10:29:37'),(9,1,1,'w','w','w','k','w','2021-03-20','2021-03-21',143,0,1,1,0,0,1,'2021-03-19 08:39:48','2021-03-22 10:29:35'),(10,1,1,'q','q','q','a','q','2021-03-20','2021-03-20',143,0,1,2,0,0,1,'2021-03-19 11:36:21','2021-03-22 10:29:34'),(11,1,3,'w','e','e','d','e','2021-03-20','2021-03-20',143,0,1,1,0,0,0,'2021-03-19 11:39:37','2021-03-19 11:39:37'),(12,1,1,'y','q','q','s','q','2021-03-20','2021-03-21',143,0,1,1,0,0,1,'2021-03-19 11:43:14','2021-03-22 10:31:40'),(13,1,2,'f','a','a','s','a','2021-03-20','2021-03-28',143,0,1,1,0,0,1,'2021-03-19 11:57:01','2021-03-22 10:29:47'),(14,1,2,'f','a','a','s','a','2021-03-20','2021-03-28',143,0,1,1,0,0,1,'2021-03-19 11:58:21','2021-03-22 10:29:48'),(15,1,1,'ddd','q','q','q','q','2021-03-23','2021-03-24',143,0,1,1,0,0,1,'2021-03-22 05:57:26','2021-03-22 10:29:50'),(16,1,1,'q','a','a','s','a','2021-03-24','2021-03-25',143,0,1,1,0,0,1,'2021-03-22 07:36:52','2021-03-22 10:29:51'),(17,1,1,'q','s','s','hh','s','2021-03-24','2021-03-24',143,0,1,1,0,0,0,'2021-03-23 12:20:28','2021-03-23 12:20:28'),(18,1,1,'j','ll','jj','hu','jbjhb','2021-03-25','2021-03-26',143,0,1,1,0,0,0,'2021-03-24 07:01:24','2021-03-24 07:01:24'),(19,1,1,'d','fd','dfd','gf','fd','2021-03-26','2021-04-03',143,0,1,1,0,0,0,'2021-03-25 06:16:50','2021-03-25 06:16:50'),(20,1,1,'q','s','s','xs','s','2021-03-26','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 06:24:56','2021-03-25 06:24:56'),(21,1,1,'q','s','s','xs','s','2021-03-26','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 06:25:11','2021-03-25 06:25:11'),(22,1,1,'q','s','s','xs','s','2021-03-26','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 06:25:16','2021-03-25 06:25:16'),(23,1,1,'d','dd','dd','d','dd','2021-04-02','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:27:19','2021-03-25 06:27:19'),(24,1,1,'d','dd','dd','d','dd','2021-04-02','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:27:24','2021-03-25 06:27:24'),(25,1,1,'ss','s','s','ss','s','2021-03-26','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:38:33','2021-03-25 06:38:33'),(26,1,1,'ss','s','s','ss','s','2021-03-26','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:38:43','2021-03-25 06:38:43'),(27,1,1,'h','ff','fff','dd','f','2021-03-26','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 06:44:43','2021-03-25 06:44:43'),(28,3,1,'ruyuruy','saff','fd','dsw','f','2021-03-26','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:51:20','2021-03-25 06:51:20'),(29,3,1,'ruyuruy','saff','fd','dsw','f','2021-03-26','2021-03-28',143,0,1,1,0,0,0,'2021-03-25 06:51:31','2021-03-25 06:51:31'),(30,1,1,'d','d','d','s','d','2021-03-26','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 06:54:58','2021-03-25 06:54:58'),(31,1,1,'d','d','d','s','d','2021-03-26','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 06:59:12','2021-03-25 06:59:12'),(32,1,1,'d','d','d','s','d','2021-03-26','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 06:59:12','2021-03-25 06:59:12'),(33,1,1,'d','g','g','ss','g','2021-03-07','2021-04-01',143,0,1,1,0,0,0,'2021-03-25 07:01:34','2021-03-25 07:01:34'),(34,1,1,'e','a','a','ss','a','2021-03-14','2021-03-31',143,0,1,1,0,0,0,'2021-03-25 07:03:58','2021-03-25 07:03:58'),(35,1,1,'q','s','s','s','s','2021-03-11','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 07:23:45','2021-03-25 07:23:45'),(36,1,1,'q','q','q','q','q','2021-03-20','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 07:26:37','2021-03-25 07:26:37'),(37,1,1,'s','s','s','gh','s','2021-03-27','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 10:20:53','2021-03-25 10:20:53'),(38,1,1,'q','w','w','ss','w','2021-03-06','2021-03-19',143,0,1,1,0,0,0,'2021-03-25 10:26:47','2021-03-25 10:26:47'),(39,1,1,'h','f','f','11','f','2021-03-27','2021-03-30',143,0,1,1,0,0,0,'2021-03-25 10:29:42','2021-03-25 10:29:42'),(40,1,1,'h','f','f','11','f','2021-03-27','2021-03-30',143,0,1,1,0,0,0,'2021-03-25 10:29:51','2021-03-25 10:29:51'),(41,1,1,'h','f','f','11','f','2021-03-27','2021-03-30',143,0,1,1,0,0,0,'2021-03-25 10:30:34','2021-03-25 10:30:34'),(42,1,1,'s','a','a','ss','a','2021-03-27','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 10:31:25','2021-03-25 10:31:25'),(43,1,1,'q','w','w','ss','w','2021-03-20','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 10:33:04','2021-03-25 10:33:04'),(44,1,1,'q','q','q','a','q','2021-03-27','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 10:40:09','2021-03-25 10:40:09'),(45,1,1,'q','w','w','w','w','2021-03-27','2021-04-02',143,0,1,1,0,0,0,'2021-03-25 11:05:40','2021-03-25 11:05:40'),(46,1,1,'w','s','s','w','s','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 11:32:14','2021-03-25 11:32:14'),(47,1,1,'r','d','d','ww','d','2021-03-06','2021-03-25',143,0,1,1,0,0,0,'2021-03-25 11:46:56','2021-03-25 11:46:56'),(48,1,1,'q','a','a','ss','a','2021-03-17','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 11:54:08','2021-03-25 11:54:08'),(49,1,1,'w','s','s','dd','sw','2021-03-26','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 11:57:07','2021-03-25 11:57:07'),(50,1,1,'f','s','s','ss','s','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:03:06','2021-03-25 12:03:06'),(51,1,1,'f','s','s','ss','s','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:07:57','2021-03-25 12:07:57'),(52,1,1,'f','s','s','ss','s','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:08:24','2021-03-25 12:08:24'),(53,1,1,'f','s','s','ss','s','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:08:32','2021-03-25 12:08:32'),(54,1,1,'f','s','s','ss','fff','2021-03-21','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:13:53','2021-03-25 12:13:53'),(55,1,1,'s','s','s','ss','s','2021-03-20','2021-04-04',143,0,1,1,0,0,0,'2021-03-25 12:23:59','2021-03-25 12:23:59'),(56,1,1,'s','s','s','ss','s','2021-03-20','2021-04-04',143,0,1,1,0,0,0,'2021-03-25 12:24:14','2021-03-25 12:24:14'),(57,1,1,'s','s','s','ss','s','2021-03-20','2021-04-04',143,0,1,1,0,0,0,'2021-03-25 12:24:16','2021-03-25 12:24:16'),(58,1,1,'q','s','s','s','s','2021-03-19','2021-03-26',143,0,1,1,0,0,0,'2021-03-25 12:43:03','2021-03-25 12:43:03'),(59,1,1,'vc','g','g','ff','g','2021-03-28','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 12:47:47','2021-03-25 12:47:47'),(60,1,1,'vc','g','g','ff','g','2021-03-28','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 12:47:56','2021-03-25 12:47:56'),(61,1,1,'vc','g','g','ff','g','2021-03-28','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 12:48:01','2021-03-25 12:48:01'),(62,1,1,'vc','g','g','ff','g','2021-03-28','2021-03-27',143,0,1,1,0,0,0,'2021-03-25 12:48:05','2021-03-25 12:48:05'),(63,1,1,'jhjh','h','h','d','h','2021-03-27','2021-03-28',143,0,1,1,0,0,0,'2021-03-26 05:41:51','2021-03-26 05:41:51'),(64,1,1,'q','s','s','d','s','2021-03-27','2021-03-28',143,0,1,1,0,0,0,'2021-03-26 05:45:47','2021-03-26 05:45:47'),(65,1,1,'First add Event','First event description','prerequisites','notes','disclaimer','2021-03-31','2021-04-03',8,0,30,30,1,0,0,'2021-04-01 07:47:00','2021-04-01 07:47:00');
/*!40000 ALTER TABLE `event_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_registration`
--

DROP TABLE IF EXISTS `event_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_registration` (
  `register_id` int unsigned NOT NULL AUTO_INCREMENT,
  `eventdateid` int unsigned NOT NULL,
  `userid` int NOT NULL,
  `accept_notifications` int NOT NULL DEFAULT '0',
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`register_id`),
  KEY `event_registration_eventdateid_foreign` (`eventdateid`),
  CONSTRAINT `event_registration_eventdateid_foreign` FOREIGN KEY (`eventdateid`) REFERENCES `event_dates` (`eventdate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_registration`
--

LOCK TABLES `event_registration` WRITE;
/*!40000 ALTER TABLE `event_registration` DISABLE KEYS */;
INSERT INTO `event_registration` VALUES (1,1,8,0,0,'2021-03-17 08:50:58','2021-03-17 08:50:58'),(2,2,8,0,0,'2021-03-17 08:51:59','2021-03-17 08:51:59'),(3,2,104,0,0,'2021-03-19 05:45:04','2021-03-19 05:45:04'),(4,2,20,0,0,'2021-03-19 05:45:14','2021-03-19 05:45:14'),(5,3,20,0,0,'2021-03-19 05:45:18','2021-03-19 05:45:18'),(6,3,104,0,0,'2021-03-19 05:45:27','2021-03-19 05:45:27'),(7,3,66,0,0,'2021-04-01 07:40:03','2021-04-01 07:40:03'),(8,4,66,0,0,'2021-04-01 07:40:13','2021-04-01 07:40:13'),(9,65,66,0,0,'2021-04-01 08:30:04','2021-04-01 08:30:04');
/*!40000 ALTER TABLE `event_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_types`
--

DROP TABLE IF EXISTS `event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_types` (
  `eventtype_id` int unsigned NOT NULL AUTO_INCREMENT,
  `eventtype_shortdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventtype_fulldesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_types`
--

LOCK TABLES `event_types` WRITE;
/*!40000 ALTER TABLE `event_types` DISABLE KEYS */;
INSERT INTO `event_types` VALUES (1,'OTE','One Time Event','2021-03-16 10:53:12','2021-03-16 10:53:12'),(2,'RE','Recurring Event','2021-03-16 10:53:12','2021-03-16 10:53:12'),(3,'MDE','Multi-Day Event','2021-03-16 10:53:12','2021-03-16 10:53:12');
/*!40000 ALTER TABLE `event_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_screens`
--

DROP TABLE IF EXISTS `home_screens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_screens` (
  `screen_id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_screens`
--

LOCK TABLES `home_screens` WRITE;
/*!40000 ALTER TABLE `home_screens` DISABLE KEYS */;
INSERT INTO `home_screens` VALUES (1,'Match Activities','http://54.187.114.170:81/home/matchactivities.png',1,NULL,NULL),(2,'BIGS Connect Community','http://54.187.114.170:81/home/bigsconnectcommunity.png',2,NULL,NULL),(3,'Events','http://54.187.114.170:81/home/events.png',3,NULL,NULL),(4,'BIGS Resources','http://54.187.114.170:81/home/bigsresources.png',4,NULL,NULL),(5,'Photo Gallery','http://54.187.114.170:81/home/photogallery.png',5,NULL,NULL),(6,'Discount Programs','http://54.187.114.170:81/home/discountprograms.png',6,NULL,NULL);
/*!40000 ALTER TABLE `home_screens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `join_outings`
--

DROP TABLE IF EXISTS `join_outings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `join_outings` (
  `join_id` int unsigned NOT NULL AUTO_INCREMENT,
  `outingid` int unsigned NOT NULL,
  `organized_by` int NOT NULL,
  `joined_userid` int NOT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `join_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`join_id`),
  KEY `join_outings_outingid_foreign` (`outingid`),
  CONSTRAINT `join_outings_outingid_foreign` FOREIGN KEY (`outingid`) REFERENCES `outings` (`outing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `join_outings`
--

LOCK TABLES `join_outings` WRITE;
/*!40000 ALTER TABLE `join_outings` DISABLE KEYS */;
INSERT INTO `join_outings` VALUES (1,1,4,1,0,0,'2021-03-09 15:18:46','2021-03-09 15:18:46'),(2,2,4,6,0,1,'2021-03-09 15:50:47','2021-03-09 15:50:47'),(3,10,104,20,1,1,'2021-03-10 05:56:29','2021-03-22 10:37:40'),(4,12,104,20,1,1,'2021-03-10 06:56:35','2021-03-22 10:58:38'),(5,11,104,20,0,1,'2021-03-10 06:59:36','2021-03-11 13:05:32'),(6,10,104,20,1,1,'2021-03-10 10:52:51','2021-03-22 10:37:40'),(7,10,104,20,1,1,'2021-03-10 10:52:59','2021-03-22 10:37:40'),(8,10,104,20,1,1,'2021-03-10 11:00:56','2021-03-22 10:37:40'),(9,10,20,20,1,1,'2021-03-11 13:04:11','2021-03-22 10:37:40'),(10,43,20,20,0,0,'2021-03-11 13:06:03','2021-03-11 13:06:03'),(11,10,20,20,1,1,'2021-03-17 11:08:55','2021-03-22 10:37:40'),(12,12,66,20,0,1,'2021-03-22 10:58:50','2021-03-22 10:58:59'),(13,11,66,20,0,1,'2021-03-24 14:41:19','2021-03-24 14:41:23'),(14,10,66,20,0,1,'2021-03-25 05:34:58','2021-03-29 14:07:04'),(15,10,20,20,0,0,'2021-03-30 08:38:30','2021-03-30 08:38:30'),(16,13,66,20,0,0,'2021-04-05 04:15:49','2021-04-05 04:15:49');
/*!40000 ALTER TABLE `join_outings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_attachments`
--

DROP TABLE IF EXISTS `mail_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_attachments` (
  `attachment_id` int unsigned NOT NULL AUTO_INCREMENT,
  `messageid` int unsigned DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`attachment_id`),
  KEY `mail_attachments_messageid_foreign` (`messageid`),
  CONSTRAINT `mail_attachments_messageid_foreign` FOREIGN KEY (`messageid`) REFERENCES `messages` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_attachments`
--

LOCK TABLES `mail_attachments` WRITE;
/*!40000 ALTER TABLE `mail_attachments` DISABLE KEYS */;
INSERT INTO `mail_attachments` VALUES (1,8,'http://54.187.114.170/mail_attachments/Screenshot (50)-1610097239.png',0,'2021-01-08 09:13:59','2021-01-08 09:13:59');
/*!40000 ALTER TABLE `mail_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `message_id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_status` int NOT NULL DEFAULT '0',
  `delivery_status` int NOT NULL DEFAULT '0',
  `active_status` int DEFAULT '0',
  `delete_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 08:51:40','2021-01-08 08:51:40'),(2,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 08:59:18','2021-01-08 08:59:18'),(3,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 09:01:52','2021-01-08 09:01:52'),(4,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 09:05:09','2021-01-08 09:05:09'),(5,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 09:07:29','2021-01-08 09:07:29'),(6,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 09:09:26','2021-01-08 09:09:26'),(7,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-01-08 09:12:58','2021-01-08 09:12:58'),(8,4,32,'admin@appstekcorp.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-01-08 09:13:59','2021-03-24 06:49:41'),(9,143,143,'merugu@appstekcorp.com','test message',NULL,0,0,0,0,'2021-03-26 09:54:13','2021-03-26 09:54:13'),(10,143,143,'merugu@appstekcorp.com','test',NULL,0,0,0,0,'2021-03-26 10:55:28','2021-03-26 10:55:28'),(11,143,143,'merugu@appstekcorp.com','ttt',NULL,0,0,0,0,'2021-03-26 10:57:33','2021-03-26 10:57:33'),(12,4,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:09:06','2021-04-02 06:00:23'),(13,4,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:09:09','2021-04-02 06:03:36'),(14,4,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:09:11','2021-04-02 06:01:19'),(15,4,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:09:12','2021-03-31 12:09:12'),(16,4,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:09:13','2021-04-02 06:06:55'),(17,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:17','2021-04-01 07:05:15'),(18,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:18','2021-04-01 07:05:09'),(19,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:19','2021-03-31 12:10:19'),(20,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:21','2021-04-02 13:02:25'),(21,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:22','2021-04-02 13:02:28'),(22,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:23','2021-03-31 12:10:23'),(23,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:24','2021-03-31 12:10:24'),(24,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:25','2021-03-31 12:10:25'),(25,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:26','2021-03-31 12:10:26'),(26,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:27','2021-03-31 12:10:27'),(27,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:28','2021-03-31 12:10:28'),(28,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:29','2021-03-31 12:10:29'),(29,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:30','2021-03-31 12:10:30'),(30,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:31','2021-03-31 12:10:31'),(31,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:32','2021-03-31 12:10:32'),(32,66,192,'mdasarii@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:32','2021-03-31 12:10:32'),(33,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:49','2021-04-02 06:04:24'),(34,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:50','2021-03-31 12:10:50'),(35,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:51','2021-03-31 12:10:51'),(36,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:52','2021-03-31 12:10:52'),(37,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:53','2021-03-31 12:10:53'),(38,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:54','2021-03-31 12:10:54'),(39,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:55','2021-03-31 12:10:55'),(40,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:56','2021-03-31 12:10:56'),(41,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:57','2021-03-31 12:10:57'),(42,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:10:58','2021-03-31 12:10:58'),(43,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-03-31 12:10:59','2021-04-02 06:07:33'),(44,8,66,'Nag123@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-03-31 12:11:00','2021-03-31 12:11:00'),(45,143,143,'merugu@appstekcorp.com','test body',NULL,0,0,0,0,'2021-04-01 09:35:16','2021-04-01 09:35:16'),(46,143,143,'merugu@appstekcorp.com','Testing mail',NULL,0,0,0,0,'2021-04-01 09:37:50','2021-04-01 09:37:50'),(47,143,143,'merugu@appstekcorp.com','mail test',NULL,0,0,0,0,'2021-04-01 09:39:03','2021-04-01 09:39:03'),(48,143,143,'merugu@appstekcorp.com','jaac',NULL,0,0,0,0,'2021-04-01 09:39:43','2021-04-01 09:39:43'),(49,143,143,'merugu@appstekcorp.com','to usa','fdgf',0,0,0,0,'2021-04-01 09:48:37','2021-04-01 09:48:37'),(50,143,143,'merugu@appstekcorp.com','to usa','fdgf',0,0,0,0,'2021-04-01 09:55:26','2021-04-01 09:55:26'),(51,143,143,'merugu@appstekcorp.com','dfdnd',NULL,0,0,0,0,'2021-04-01 09:57:06','2021-04-01 09:57:06'),(52,143,143,'merugu@appstekcorp.com','dgdg','<p>gfgf</p>',0,0,0,0,'2021-04-01 10:18:14','2021-04-01 10:18:14'),(53,143,143,'merugu@appstekcorp.com','kkaefd','<p>fdsfdsfadsf</p>',0,0,0,0,'2021-04-01 10:31:45','2021-04-01 10:31:45'),(54,66,74,'Nag1234@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,1,0,'2021-04-02 06:17:27','2021-04-02 07:19:20'),(55,66,74,'Nag1234@gmail.com','message','email ndshg  jygwddb dkhgwqehvdbwe',0,0,0,0,'2021-04-02 06:27:01','2021-04-02 06:27:01'),(56,66,8,'Nage@gmail.com','Resdddd','Gggggg',0,0,0,0,'2021-04-02 06:42:41','2021-04-02 06:42:41'),(57,66,8,'Nage@gmail.com','Resdd','Fgggg',0,0,1,0,'2021-04-02 06:44:40','2021-04-02 13:02:57'),(58,66,74,'Nag1234@gmail.com','Wish','Hi Nagendra\nHow are you',0,0,0,0,'2021-04-02 07:09:48','2021-04-02 07:09:48'),(59,66,74,'Nag1234@gmail.com','Test55','Test6666',0,0,0,0,'2021-04-02 07:12:40','2021-04-02 07:12:40'),(60,74,66,'Nag123@gmail.com','Test','Hello\nHow are you',0,0,1,0,'2021-04-02 07:18:55','2021-04-02 12:40:50'),(61,74,66,'Nag123@gmail.com','Greetings','All The Best!',0,0,0,0,'2021-04-02 12:39:33','2021-04-02 12:39:33'),(62,66,19,'Nag66@gmail.com',NULL,NULL,0,0,0,0,'2021-04-05 04:16:52','2021-04-05 04:16:52'),(63,66,20,'skbuduru@appstekcorp.com','Wish','Good Morning',0,0,0,0,'2021-04-06 04:50:26','2021-04-06 04:50:26'),(64,20,75,'Nag12345@gmail.com','Hello','Testttttt',0,0,1,0,'2021-04-06 04:52:43','2021-04-06 04:53:43'),(65,20,66,'Nag123@gmail.com','New One','Testtttt66666',0,0,0,0,'2021-04-06 04:53:08','2021-04-06 04:53:08'),(66,20,66,'Nag123@gmail.com','Hey','How are you!✌️👍👍👍',0,0,0,0,'2021-04-06 04:57:23','2021-04-06 04:57:23'),(67,66,20,'skbuduru@appstekcorp.com','Bigs','Hiii',0,0,0,0,'2021-04-06 07:02:18','2021-04-06 07:02:18');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_10_27_075427_create_discounts_table',1),(6,'2020_11_12_124603_create_permissions_table',1),(7,'2020_11_16_135538_create_discount_documents_table',1),(8,'2020_11_17_112514_create_albums_table',1),(9,'2020_11_18_134313_create_photos_table',1),(10,'2020_11_30_091753_create_user_permissions_table',1),(11,'2020_12_09_062421_create_chapters_table',1),(12,'2020_12_09_130044_create_user_type_table',1),(13,'2020_12_09_134154_create_mylittle_table',1),(14,'2016_06_01_000001_create_oauth_auth_codes_table',2),(15,'2016_06_01_000002_create_oauth_access_tokens_table',2),(16,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(17,'2016_06_01_000004_create_oauth_clients_table',2),(18,'2016_06_01_000005_create_oauth_personal_access_clients_table',2),(19,'2020_12_31_084017_create_messages_table',3),(20,'2020_12_31_090652_create_mail_attachments_table',3),(21,'2020_11_04_055816_create_notifications_table',4),(22,'2021_01_08_112214_create_outings_table',4),(23,'2021_01_29_100116_create_home_screens_table',5),(24,'2021_02_02_141142_create_outings_share_table',6),(25,'2021_02_09_091918_create_resources_table',7),(26,'2021_02_09_121100_create_connections_table',8),(27,'2021_03_09_133658_create_join_outings_table',9),(28,'2021_03_16_053331_create_event_types_table',10),(29,'2021_03_16_072046_create_event_master_table',11),(30,'2021_03_16_070629_create_event_dates_table',12),(31,'2021_03_16_070503_create_event_registration_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mylittle`
--

DROP TABLE IF EXISTS `mylittle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mylittle` (
  `mylittle_id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_start` date NOT NULL,
  `dateof_birth` date DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mylittle_id`),
  KEY `mylittle_userid_foreign` (`userid`),
  CONSTRAINT `mylittle_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mylittle`
--

LOCK TABLES `mylittle` WRITE;
/*!40000 ALTER TABLE `mylittle` DISABLE KEYS */;
INSERT INTO `mylittle` VALUES (1,'Mounika','Myneni','9848032919','cell','2021-01-01','1994-08-30','sri','3256456760','AK','3256456760','http://54.187.114.170:81/mylittle_pic/YaEOx-1613651649.png',1,'2021-01-05 11:19:28','2021-02-18 12:34:09'),(2,'Mounika','Myneni','9848032919','cell','2021-01-01','1994-08-30','sri','3256456760','AK','3256456760','http://54.187.114.170:81/mylittle_pic/IMG-20210321-WA0002-1617692617.jpg',20,'2021-02-18 12:51:50','2021-04-06 07:03:37'),(3,'dsd','sdffsdf','3425656',NULL,'2021-02-27',NULL,NULL,NULL,NULL,NULL,NULL,185,'2021-02-27 15:41:33','2021-02-27 15:41:33'),(4,'first','last','3242346457',NULL,'2021-02-27',NULL,NULL,NULL,NULL,NULL,NULL,185,'2021-02-27 15:42:34','2021-02-27 15:42:34'),(5,'first','last','3242346457',NULL,'2021-02-27',NULL,NULL,NULL,NULL,NULL,NULL,185,'2021-02-27 15:42:45','2021-02-27 15:42:45'),(6,'first','last','3242346457',NULL,'2021-02-27',NULL,NULL,NULL,NULL,NULL,NULL,185,'2021-02-27 15:42:50','2021-02-27 15:42:50'),(7,'mylittle','little',NULL,NULL,'2021-03-03','2021-03-05',NULL,NULL,NULL,NULL,NULL,192,'2021-03-02 11:48:20','2021-03-02 11:48:20'),(8,'asdawds','dsdasd',NULL,NULL,'2021-04-02',NULL,NULL,NULL,NULL,NULL,NULL,2,'2021-04-02 13:58:54','2021-04-02 13:58:54');
/*!40000 ALTER TABLE `mylittle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `notify_id` int unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_date` date DEFAULT NULL,
  `scheduled_time` time DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `message_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_status` int NOT NULL DEFAULT '0',
  `viewed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notify_id`),
  KEY `notifications_created_by_foreign` (`created_by`),
  CONSTRAINT `notifications_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'trip','2002-02-21','02:22:00','EST',NULL,'sendnow',1,'0',1,'2021-01-19 11:28:33','2021-03-09 06:32:22'),(2,'wewe','2021-01-01','05:18:00','EST',NULL,'sendnow',1,'0',32,'2021-01-22 11:48:18','2021-03-08 15:14:16'),(3,'New',NULL,'12:00:00',NULL,NULL,'sendnow',1,'0',192,'2021-03-02 11:49:08','2021-03-09 06:32:32'),(4,'test','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:56:57','2021-03-09 06:57:42'),(5,'test1','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:57:11','2021-03-09 06:57:43'),(6,'test3','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:57:32','2021-03-09 06:57:44'),(7,'test','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:58:01','2021-03-09 07:13:40'),(8,'test2','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:58:07','2021-03-11 06:27:02'),(9,'test3','2021-03-09','12:26:00',NULL,NULL,'sendnow',1,'0',143,'2021-03-09 06:58:09','2021-03-11 06:28:12'),(10,'tesr',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 06:28:40','2021-03-11 06:28:55'),(11,'tesrw',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 06:28:44','2021-03-11 06:49:10'),(12,'tesrww',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 06:28:46','2021-03-11 07:04:23'),(13,'tesrwww',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 06:28:47','2021-03-11 06:33:43'),(14,'tytry',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:05:54','2021-03-11 07:18:50'),(15,'tytryewe',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:05:57','2021-03-11 07:34:58'),(16,'e543',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:06:00','2021-03-11 07:37:53'),(17,'wtre',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:06:02','2021-03-11 07:38:11'),(18,'test1',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:39:31','2021-03-11 07:39:43'),(19,'test2',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:39:34','2021-03-11 07:40:01'),(20,'test3',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:39:38','2021-03-11 07:40:57'),(21,'test1',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:43:06','2021-03-11 07:43:18'),(22,'test2',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:43:09','2021-03-11 07:44:05'),(23,'test3',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:43:12','2021-03-11 07:54:55'),(24,'test4',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-11 07:53:26','2021-03-11 07:58:04'),(25,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 14:55:59','2021-03-25 14:56:29'),(26,'h',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 14:56:16','2021-03-25 14:59:48'),(27,'w',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 14:56:19','2021-03-25 15:00:14'),(28,'d',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:01:02','2021-03-25 15:01:15'),(29,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:01:08','2021-03-25 15:08:32'),(30,'u',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:01:10','2021-03-25 15:12:13'),(31,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:14:01','2021-03-25 15:17:43'),(32,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:14:03','2021-03-25 15:18:55'),(33,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:14:05','2021-03-25 15:21:34'),(34,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:20:22','2021-03-25 15:24:09'),(35,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:20:23','2021-03-25 15:39:26'),(36,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:20:26','2021-03-25 15:25:27'),(37,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:42','2021-03-25 15:37:48'),(38,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:42','2021-03-25 15:37:16'),(39,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:43','2021-03-25 15:33:35'),(40,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:43','2021-03-25 15:32:11'),(41,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:44','2021-03-25 15:31:26'),(42,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:27:44','2021-03-25 15:29:25'),(43,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:39:54','2021-04-05 14:14:36'),(44,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:39:56','2021-03-25 15:44:46'),(45,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:39:57','2021-03-25 15:40:42'),(46,'a',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-25 15:39:58','2021-03-25 15:40:07'),(47,'1',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-29 08:17:13','2021-04-05 14:14:38'),(48,'t',NULL,'12:00:00',NULL,NULL,NULL,1,'0',143,'2021-03-29 08:31:57','2021-04-05 14:14:39'),(49,'new note',NULL,'12:00:00',NULL,NULL,'sendnow',1,'0',192,'2021-04-03 10:55:52','2021-04-05 14:14:40'),(50,'new note1',NULL,'12:00:00',NULL,NULL,'sendnow',1,'0',192,'2021-04-05 14:08:22','2021-04-05 14:14:42'),(51,'New notification sent',NULL,NULL,NULL,'2021-04-05','sent',1,'0',192,'2021-04-05 14:15:18','2021-04-06 09:34:14'),(52,'New notification sent',NULL,NULL,NULL,'2021-04-05','sent',0,'0',192,'2021-04-05 14:16:15','2021-04-05 14:16:15'),(53,'Scheduled notification','2021-04-07','08:47:00','UTC',NULL,'scheduled',0,'0',192,'2021-04-05 14:16:40','2021-04-05 14:16:40');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `client_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `client_id` int unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','ZHhwksZHf3Dc3qkPjHOoHbja7By6JGl4GlZnuDmW','http://localhost',1,0,0,'2020-12-18 06:50:43','2020-12-18 06:50:43'),(2,NULL,'Laravel Password Grant Client','b4xIw0AdAyXMsMO8BYsiiBz0bGOdaZOXK1dLhblx','http://localhost',0,1,0,'2020-12-18 06:50:43','2020-12-18 06:50:43');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2020-12-18 06:50:43','2020-12-18 06:50:43');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outings`
--

DROP TABLE IF EXISTS `outings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outings` (
  `outing_id` int unsigned NOT NULL AUTO_INCREMENT,
  `outing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(8,2) DEFAULT NULL,
  `longitude` decimal(8,2) DEFAULT NULL,
  `created_by` int unsigned NOT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`outing_id`),
  KEY `outings_created_by_foreign` (`created_by`),
  CONSTRAINT `outings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outings`
--

LOCK TABLES `outings` WRITE;
/*!40000 ALTER TABLE `outings` DISABLE KEYS */;
INSERT INTO `outings` VALUES (1,'update outing','Mulpur','Guntur','AP','Good place.Must Visit!','2020-02-29','2:00PM',16.16,80.68,4,0,'2021-02-02 10:59:18','2021-02-02 11:15:04'),(2,'My outing','Thulluru','guntur','AP','Good place.','2020-01-20','2:00PM',16.64,80.13,4,0,'2021-02-02 12:56:56','2021-02-02 12:56:56'),(3,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 12:41:17','2021-02-04 12:41:17'),(4,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 12:56:47','2021-02-04 12:56:47'),(5,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 14:33:19','2021-02-04 14:33:19'),(6,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 14:39:12','2021-02-04 14:39:12'),(7,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 14:57:45','2021-02-04 14:57:45'),(8,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-04 15:00:48','2021-02-04 15:00:48'),(9,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,4,0,'2021-02-10 07:37:57','2021-02-10 07:37:57'),(10,'Outing africa and Usa','Usa','Hyderabad','Telangana','Charminar Golkonda','2020-02-10','2:00PM',17.32,78.55,20,1,'2021-02-10 07:49:40','2021-03-12 11:10:06'),(11,'Outing India','India','Hyderabad','Telangana','Charminar Golkonda','2021-03-30','05:20 AM',17.32,78.55,20,1,'2021-02-10 07:52:57','2021-03-22 10:23:29'),(12,'Outing Australia','India','Hyderabad','Telangana','Charminar Golkonda','2020-02-10','2:00PM',NULL,NULL,20,1,'2021-02-10 07:53:09','2021-03-30 08:38:20'),(13,'Outing Japan','Japanese','Abc','Def','XYZ','2020-02-10','2:00PM',17.32,78.55,20,0,'2021-02-10 07:53:10','2021-02-25 10:43:31'),(14,'Outing India','India','Hyderabad','Telangana','Charminar Golkonda','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 07:53:10','2021-02-10 07:53:10'),(15,'Outing America','Detroit','Detroit','Machigan','sea port and machine','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 09:46:21','2021-02-10 09:46:21'),(16,'vxbzbZ','vzvxbx','VzvHd','Vxbxvx',',v,vzvxb.xgx','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 10:28:09','2021-02-10 10:28:09'),(17,'vxbzbZ','vzvxbx','VzvHd','Vxbxvx',',v,vzvxb.xgx','2020-02-10','2:00PM',17.32,78.55,20,0,'2021-02-10 10:28:31','2021-02-25 11:10:09'),(18,'hfhdbs','gdgsgs','Hdgsgs','Fsgdgs','hi dhdgxgx','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 10:45:20','2021-02-10 10:45:20'),(19,'hdhdgd','bxbxvd','Fhdhd','Gdvscz','gdhdhdgx','2020-02-10','2:00PM',17.32,78.51,20,1,'2021-02-10 10:47:50','2021-03-17 07:07:16'),(20,'dhgdgd','gdhdhd','Hdgsgs','Hdgdbd','bcbxvzvd','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 10:48:51','2021-02-10 10:48:51'),(21,'xhxhx','ulryd','Ydgs','Hdgz','hfhdbzvz','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 10:53:33','2021-02-10 10:53:33'),(22,'hdhxh','BB xvzvz','Bxvxvz','Gmxbxbs','gxbxvz','2020-02-10','2:00PM',17.32,78.51,20,0,'2021-02-10 10:54:43','2021-02-10 10:54:43'),(23,'Zimbabwe','Zimbabwe','Zimbabwe','Zimbabwe','BB bxjxjxjz','2020-02-10','2:00PM',17.32,78.55,20,0,'2021-02-11 08:27:24','2021-02-25 11:11:10'),(24,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',16.16,80.68,20,0,'2021-02-17 08:08:17','2021-02-17 08:08:17'),(25,'jfhxhx','xgxhxhx','Czhxhx','Hxhzjxux','gzhxjxjzix','2020-01-20','2:00PM',17.32,78.51,20,0,'2021-02-19 08:17:06','2021-02-19 08:17:06'),(26,'iooiooyurur','dhdjfncmc','Bxhxjxhz','Nchzjxjd','bxbzhxjz','2021-02-26','2:00PM',17.32,78.51,20,0,'2021-02-19 08:21:52','2021-02-19 08:21:52'),(27,'Home of pink city','swerzland','Pairs','Paris','idol  towers','2021-02-25','2:00PM',17.32,78.55,20,0,'2021-02-19 08:25:26','2021-02-25 11:20:45'),(28,'ISLAND TRIP','Sandiego','California','Sandiego','Beaches and places in sandiego','2021-02-19','2:00PM',17.32,78.55,20,0,'2021-02-19 08:31:50','2021-02-25 11:17:36'),(29,'Planning for island','Sandiego','California','Sandiego','visiting the best placed in meeting','2021-02-19','2:00PM',17.32,78.55,20,0,'2021-02-19 10:36:07','2021-03-02 10:40:29'),(30,'sandeep','ddeed','dsds','sd','sds','2021-02-25','2:00PM',17.32,78.51,20,0,'2021-02-25 11:25:28','2021-02-25 11:25:28'),(31,'Test','test','Test','Test','test','2021-02-26','2:00PM',17.32,78.55,20,0,'2021-02-26 07:00:46','2021-02-26 07:00:46'),(32,'def','abc','jhsdf','dsfs','dsfdsf','2021-02-26','2:00PM',37.42,-122.08,20,0,'2021-02-26 07:07:08','2021-02-26 07:07:57'),(33,'sandeep reddy vanga','hyderbad','hyderbad','telangana','casual trip','2021-02-26','2:00PM',37.42,-122.08,20,0,'2021-02-26 08:02:01','2021-03-02 06:46:13'),(34,'Hyd','Golkonda','Tn','TN','dfdff','2021-02-27','2:00PM',NULL,NULL,20,0,'2021-02-26 10:18:07','2021-02-26 10:18:07'),(35,'BestWay','London','London','UK','Relax','2021-03-26','2:00PM',NULL,NULL,66,1,'2021-02-26 10:48:07','2021-04-05 05:13:19'),(36,'Live','UK','London','London','Tour','2021-03-26','2:00PM',NULL,NULL,66,0,'2021-02-26 10:53:52','2021-02-26 10:53:52'),(37,'Hyd','Hyderabad','Cite','Tn','Hyd Lo','2021-04-01','2:00PM',NULL,NULL,66,0,'2021-03-01 05:19:13','2021-03-01 05:19:13'),(38,'outing london','paris','paris','venuzula','for shopping','2021-03-02','2:00PM',37.42,-122.08,104,0,'2021-03-02 06:48:30','2021-03-02 06:48:30'),(39,'FunZone','Kerala','Kerala','K','Fun','2021-04-02','2:00PM',NULL,NULL,66,0,'2021-03-02 10:32:50','2021-03-02 10:32:50'),(40,'MYVisit','London','London','UK','Visiting','2021-05-02','2:00PM',NULL,NULL,66,0,'2021-03-02 10:36:30','2021-03-02 10:36:30'),(41,'hdhxhz','hi cVz','V,v','Hfjchd','nchdkcgfvShJz','2021-03-02','2:00PM',17.32,78.55,20,0,'2021-03-02 10:49:53','2021-03-02 10:49:53'),(42,NULL,NULL,NULL,NULL,NULL,'2021-03-02','2:00PM',NULL,NULL,66,0,'2021-03-02 11:58:48','2021-03-02 11:58:48'),(43,'Enjoy the Nature','Africa','Africa','Africa','Going to nature with friends','2021-03-30','05:30 AM',17.32,78.55,20,0,'2021-03-08 06:04:33','2021-03-08 06:04:33'),(44,'gzhs','ydhdhd','Gxhxjx','Jfjxjx','hdhxjcjc','2021-03-30','05:25 AM',17.32,78.55,20,1,'2021-03-15 11:33:36','2021-04-05 05:32:33'),(45,NULL,'xhduxhd','Hdhdhd','Kcjcjc','hdhxhxjc','2021-03-30','05:25 AM',17.32,78.55,20,1,'2021-03-15 11:33:56','2021-03-24 14:40:25'),(46,'gzgzbz','bxhzhs','Jfjdhd','Jfhdhd','gzhxhzh','2021-03-15','17:05 PM',17.32,78.55,20,0,'2021-03-15 11:35:36','2021-03-15 11:35:36'),(47,'nxbxx','bxbzhd','Vzhxjd','Bxbxhx','hxhzjxb','2021-03-15','17:14 PM',17.32,78.55,20,0,'2021-03-15 11:44:00','2021-03-15 11:44:00'),(48,'Hyd Loc','Hyd','Kukatpally','TS','Loc..','2021-04-22','11:30 AM',NULL,NULL,66,0,'2021-03-22 05:01:16','2021-03-22 05:01:16'),(49,'Hyd Loc','Hyd','Kukatpally','TS','Loc..','2021-04-22','11:30 AM',NULL,NULL,66,0,'2021-03-22 05:01:16','2021-03-22 05:01:16'),(50,NULL,NULL,NULL,NULL,NULL,'2021-03-23','10:56 AM',NULL,NULL,66,0,'2021-03-23 05:30:02','2021-03-23 05:30:02'),(51,NULL,NULL,NULL,NULL,NULL,'2021-03-24','10:55 AM',NULL,NULL,66,0,'2021-03-24 05:27:12','2021-03-24 05:27:12'),(52,NULL,NULL,NULL,NULL,NULL,'2021-03-24','11:00 AM',NULL,NULL,66,0,'2021-03-24 05:30:30','2021-03-24 05:30:30'),(53,NULL,NULL,NULL,NULL,NULL,'2021-03-24','11:02 AM',NULL,NULL,66,0,'2021-03-24 05:32:40','2021-03-24 05:32:40'),(54,NULL,NULL,NULL,NULL,NULL,'2021-03-24','11:03 AM',NULL,NULL,66,0,'2021-03-24 05:33:10','2021-03-24 05:33:10'),(55,NULL,NULL,NULL,NULL,NULL,'2021-03-24','11:03 AM',NULL,NULL,66,0,'2021-03-24 05:33:49','2021-03-24 05:33:49'),(56,'NewOne','Hyd','Hyd','TS','New OutingNB','2021-04-24','06:54 PM',NULL,NULL,66,0,'2021-03-24 12:25:19','2021-03-24 12:25:19'),(57,'Nag','Hyd','Hyd','TS','Place to visit','2021-04-25','06:13 PM',NULL,NULL,66,0,'2021-03-25 11:44:27','2021-03-25 11:44:27'),(58,'first outing','Mulpur','guntur','AP','Good place.','2020-01-20','2:00PM',17.16,84.68,66,0,'2021-04-01 11:35:27','2021-04-01 11:35:27'),(59,'Nagendra','Guntur','Gun','AP','Joll','2021-05-01','06:04 PM',NULL,NULL,66,0,'2021-04-01 11:35:36','2021-04-01 11:35:36'),(60,'Destination Tour','Paris','Paris','UK','Tour.....','2022-06-05','12:41 PM',NULL,NULL,66,0,'2021-04-05 06:12:59','2021-04-05 06:12:59');
/*!40000 ALTER TABLE `outings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outings_share`
--

DROP TABLE IF EXISTS `outings_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outings_share` (
  `share_id` int unsigned NOT NULL AUTO_INCREMENT,
  `outingid` int unsigned NOT NULL,
  `shared_by` int NOT NULL,
  `shared_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `join_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`share_id`),
  KEY `outings_share_outingid_foreign` (`outingid`),
  CONSTRAINT `outings_share_outingid_foreign` FOREIGN KEY (`outingid`) REFERENCES `outings` (`outing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outings_share`
--

LOCK TABLES `outings_share` WRITE;
/*!40000 ALTER TABLE `outings_share` DISABLE KEYS */;
INSERT INTO `outings_share` VALUES (1,1,4,'mdasari@appstekcorp.com',4,0,0,'2021-02-03 08:29:47','2021-02-03 08:29:47'),(2,1,4,'mdasari@gmail.com',1,0,0,'2021-02-03 08:29:47','2021-02-03 08:33:49');
/*!40000 ALTER TABLE `outings_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `permission_id` int unsigned NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Administrator',NULL,NULL),(2,'User Management',NULL,NULL),(3,'Resources',NULL,NULL),(4,'Messaging & Notifications',NULL,NULL),(5,'Activities',NULL,NULL),(6,'Discount Programs',NULL,NULL),(7,'Events',NULL,NULL),(8,'Bigs App Access',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `photo_id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumid` int unsigned NOT NULL,
  `photo_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`photo_id`),
  KEY `photos_albumid_foreign` (`albumid`),
  CONSTRAINT `photos_albumid_foreign` FOREIGN KEY (`albumid`) REFERENCES `albums` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (96,'http://54.187.114.170:81/images/filename0-1611297670.jpg',40,0,'2021-01-22 06:41:10','2021-01-22 06:41:10'),(97,'http://54.187.114.170:81/images/filename0-1611750789.jpg',41,1,'2021-01-27 12:33:09','2021-02-24 11:44:35'),(98,'http://54.187.114.170:81/images/filename0-1611751654.jpg',41,1,'2021-01-27 12:47:34','2021-02-24 11:44:35'),(99,'http://54.187.114.170:81/images/filename0-1611751696.jpg',41,1,'2021-01-27 12:48:16','2021-02-24 11:44:35'),(100,'http://54.187.114.170:81/images/filename0-1611751770.jpg',41,1,'2021-01-27 12:49:30','2021-02-24 11:44:35'),(101,'http://54.187.114.170:81/images/filename0-1612021640.jpg',41,1,'2021-01-30 15:47:20','2021-02-24 11:44:35'),(102,'http://54.187.114.170:81/images/filename0-1612021688.jpg',40,0,'2021-01-30 15:48:08','2021-01-30 15:48:08'),(103,'http://54.187.114.170:81/images/filename0-1612180471.jpg',42,1,'2021-02-01 11:54:31','2021-02-24 11:30:02'),(104,'http://54.187.114.170:81/images/filename0-1612180689.jpg',42,1,'2021-02-01 11:58:09','2021-02-24 11:30:02'),(105,'http://54.187.114.170:81/images/filename0-1612181682.jpg',42,1,'2021-02-01 12:14:42','2021-02-24 11:30:02'),(106,'http://54.187.114.170:81/images/filename0-1612182922.jpg',42,1,'2021-02-01 12:35:22','2021-02-24 11:30:02'),(107,'http://54.187.114.170:81/images/filename0-1612184115.jpg',42,1,'2021-02-01 12:55:15','2021-02-24 11:30:02'),(108,'http://54.187.114.170:81/images/filename0-1612184323.jpg',42,1,'2021-02-01 12:58:43','2021-02-24 11:30:02'),(109,'http://54.187.114.170:81/images/filename0-1612184363.jpg',42,1,'2021-02-01 12:59:23','2021-02-24 11:30:02'),(110,'http://54.187.114.170:81/images/filename0-1612188751.jpg',42,1,'2021-02-01 14:12:31','2021-02-24 11:30:02'),(111,'http://54.187.114.170:81/images/filename0-1612247950.jpg',42,1,'2021-02-02 06:39:10','2021-02-24 11:30:02'),(112,'http://54.187.114.170:81/images/filename0-1612354951.jpg',41,1,'2021-02-03 12:22:31','2021-02-24 11:44:35'),(113,'http://54.187.114.170:81/images/filename0-1612508073.jpg',42,1,'2021-02-05 06:54:33','2021-02-24 11:30:02'),(114,'http://54.187.114.170:81/images/filename0-1612514552.jpg',43,0,'2021-02-05 08:42:32','2021-02-05 08:42:32'),(115,'http://54.187.114.170:81/images/filename0-1612514673.jpg',44,0,'2021-02-05 08:44:33','2021-02-05 08:44:33'),(116,'http://54.187.114.170:81/images/filename0-1612514991.jpg',45,0,'2021-02-05 08:49:51','2021-02-05 08:49:51'),(117,'http://54.187.114.170:81/images/filename0-1612519650.jpg',48,0,'2021-02-05 10:07:30','2021-02-05 10:07:30'),(118,'http://54.187.114.170:81/images/filename0-1612519891.jpg',47,0,'2021-02-05 10:11:31','2021-02-05 10:11:31'),(119,'http://54.187.114.170:81/images/filename0-1612519920.jpg',47,0,'2021-02-05 10:12:00','2021-02-05 10:12:00'),(120,'http://54.187.114.170:81/images/filename0-1612521629.jpg',49,1,'2021-02-05 10:40:29','2021-02-24 11:31:44'),(121,'http://54.187.114.170:81/images/IMG_0009-1612665602.JPEG',50,0,'2021-02-07 02:40:02','2021-02-07 02:40:02'),(122,'http://54.187.114.170:81/images/IMG_0008-1612758183.JPEG',51,0,'2021-02-08 04:23:03','2021-02-08 04:23:03'),(123,'http://54.187.114.170:81/images/IMG_0015-1612758266.PNG',52,0,'2021-02-08 04:24:26','2021-02-08 04:24:26'),(124,'http://54.187.114.170:81/images/IMG_0008-1612780797.JPEG',49,1,'2021-02-08 10:39:57','2021-02-24 11:31:44'),(125,'http://54.187.114.170:81/images/IMG_0009-1612780797.JPEG',49,1,'2021-02-08 10:39:57','2021-02-24 11:31:44'),(126,'http://54.187.114.170:81/images/IMG_0008-1613027394.JPEG',50,1,'2021-02-11 07:09:54','2021-03-22 10:48:30'),(127,'http://54.187.114.170:81/images/IMG_0014-1613027443.PNG',50,0,'2021-02-11 07:10:43','2021-02-11 07:10:43'),(128,'http://54.187.114.170:81/images/filename0-1613117170.jpg',40,1,'2021-02-12 08:06:10','2021-03-22 09:45:02'),(129,'http://54.187.114.170:81/images/filename0-1614167385.jpg',57,1,'2021-02-24 11:49:45','2021-03-11 13:06:42'),(130,'http://54.187.114.170:81/images/IMG_0008-1614237339.JPEG',53,0,'2021-02-25 07:15:39','2021-02-25 07:15:39'),(131,'http://54.187.114.170:81/images/Screenshot (1)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(132,'http://54.187.114.170:81/images/Screenshot (2)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(133,'http://54.187.114.170:81/images/Screenshot (3)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(134,'http://54.187.114.170:81/images/Screenshot (4)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(135,'http://54.187.114.170:81/images/Screenshot (5)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(136,'http://54.187.114.170:81/images/Screenshot (6)-1614325361.png',73,0,'2021-02-26 07:42:41','2021-02-26 07:42:41'),(137,'http://54.187.114.170:81/images/Screenshot (1)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(138,'http://54.187.114.170:81/images/Screenshot (2)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(139,'http://54.187.114.170:81/images/Screenshot (3)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(140,'http://54.187.114.170:81/images/Screenshot (4)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(141,'http://54.187.114.170:81/images/Screenshot (5)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(142,'http://54.187.114.170:81/images/Screenshot (6)-1614327892.png',74,0,'2021-02-26 08:24:52','2021-02-26 08:24:52'),(143,'http://54.187.114.170:81/images/IMG_0009-1614673004.JPEG',56,0,'2021-03-02 08:16:44','2021-03-02 08:16:44'),(144,'http://54.187.114.170:81/images/IMG_0028-1614674356.JPEG',55,0,'2021-03-02 08:39:16','2021-03-02 08:39:16'),(145,'http://54.187.114.170:81/images/IMG_0029-1614674367.JPEG',76,0,'2021-03-02 08:39:27','2021-03-02 08:39:27'),(146,'http://54.187.114.170:81/images/IMG_0009-1614674402.JPEG',55,1,'2021-03-02 08:40:02','2021-03-17 07:05:49'),(147,'http://54.187.114.170:81/images/Screenshot (1)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(148,'http://54.187.114.170:81/images/Screenshot (2)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(149,'http://54.187.114.170:81/images/Screenshot (3)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(150,'http://54.187.114.170:81/images/Screenshot (4)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(151,'http://54.187.114.170:81/images/Screenshot (5)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(152,'http://54.187.114.170:81/images/Screenshot (6)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(153,'http://54.187.114.170:81/images/Screenshot (7)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(154,'http://54.187.114.170:81/images/Screenshot (8)-1614674512.png',79,0,'2021-03-02 08:41:52','2021-03-02 08:41:52'),(155,'http://54.187.114.170:81/images/IMG_0031-1614674548.JPEG',77,0,'2021-03-02 08:42:28','2021-03-02 08:42:28'),(156,'http://54.187.114.170:81/images/IMG_0034-1614674574.JPEG',78,0,'2021-03-02 08:42:54','2021-03-02 08:42:54'),(157,'http://54.187.114.170:81/images/IMG_0028-1614682725.JPEG',53,0,'2021-03-02 10:58:45','2021-03-02 10:58:45'),(158,'http://54.187.114.170:81/images/IMG_0032-1614682725.JPEG',53,0,'2021-03-02 10:58:45','2021-03-02 10:58:45'),(159,'http://54.187.114.170:81/images/IMG_0031-1614682725.JPEG',53,0,'2021-03-02 10:58:45','2021-03-02 10:58:45'),(160,'http://54.187.114.170:81/images/IMG_0008-1614684336.JPEG',80,0,'2021-03-02 11:25:36','2021-03-02 11:25:36'),(161,'http://54.187.114.170:81/images/IMG_0031-1614750804.JPEG',40,1,'2021-03-03 05:53:24','2021-03-10 11:32:10'),(162,'http://54.187.114.170:81/images/IMG_0029-1614856492.JPEG',50,1,'2021-03-04 11:14:52','2021-03-23 05:12:29'),(163,'http://54.187.114.170:81/images/IMG_0030-1614856492.JPEG',50,0,'2021-03-04 11:14:52','2021-03-04 11:14:52'),(164,'http://54.187.114.170:81/images/IMG_0032-1614856545.JPEG',55,0,'2021-03-04 11:15:45','2021-03-04 11:15:45'),(165,'http://54.187.114.170:81/images/IMG_0030-1614856545.JPEG',55,0,'2021-03-04 11:15:45','2021-03-04 11:15:45'),(166,'http://54.187.114.170:81/images/IMG_0029-1614856545.JPEG',55,0,'2021-03-04 11:15:45','2021-03-04 11:15:45'),(167,'http://54.187.114.170:81/images/IMG_0033-1614856545.JPEG',55,0,'2021-03-04 11:15:45','2021-03-04 11:15:45'),(168,'http://54.187.114.170:81/images/IMG_0028-1614856545.JPEG',55,0,'2021-03-04 11:15:45','2021-03-04 11:15:45'),(169,'http://54.187.114.170:81/images/IMG_0032-1614859742.JPEG',50,0,'2021-03-04 12:09:02','2021-03-04 12:09:02'),(170,'http://54.187.114.170:81/images/IMG_0034-1614859742.JPEG',50,0,'2021-03-04 12:09:02','2021-03-04 12:09:02'),(171,'http://54.187.114.170:81/images/IMG_0030-1614870331.JPEG',50,0,'2021-03-04 15:05:31','2021-03-04 15:05:31'),(172,'http://54.187.114.170:81/images/IMG_0034-1614871033.JPEG',51,0,'2021-03-04 15:17:13','2021-03-04 15:17:13'),(173,'http://54.187.114.170:81/images/IMG_0028-1614871033.JPEG',51,0,'2021-03-04 15:17:13','2021-03-04 15:17:13'),(174,'http://54.187.114.170:81/images/IMG_0032-1614871033.JPEG',51,0,'2021-03-04 15:17:13','2021-03-04 15:17:13'),(175,'http://54.187.114.170:81/images/IMG_0029-1614934066.JPEG',50,0,'2021-03-05 08:47:46','2021-03-05 08:47:46'),(176,'http://54.187.114.170:81/images/IMG_0033-1614934066.JPEG',50,0,'2021-03-05 08:47:46','2021-03-05 08:47:46'),(177,'http://54.187.114.170:81/images/IMG_0031-1614934066.JPEG',50,0,'2021-03-05 08:47:46','2021-03-05 08:47:46'),(178,'http://54.187.114.170:81/images/IMG_0032-1614934066.JPEG',50,0,'2021-03-05 08:47:46','2021-03-05 08:47:46'),(179,'http://54.187.114.170:81/images/IMG_0033-1614934335.JPEG',50,0,'2021-03-05 08:52:15','2021-03-05 08:52:15'),(180,'http://54.187.114.170:81/images/IMG_0029-1614934335.JPEG',50,0,'2021-03-05 08:52:15','2021-03-05 08:52:15'),(181,'http://54.187.114.170:81/images/IMG_0028-1614934335.JPEG',50,0,'2021-03-05 08:52:15','2021-03-05 08:52:15'),(182,'http://54.187.114.170:81/images/IMG_0034-1614934335.JPEG',50,0,'2021-03-05 08:52:15','2021-03-05 08:52:15'),(183,'http://54.187.114.170:81/images/IMG_0032-1614934335.JPEG',50,0,'2021-03-05 08:52:15','2021-03-05 08:52:15'),(184,'http://54.187.114.170:81/images/IMG_0001-1614949254.PNG',50,0,'2021-03-05 13:00:54','2021-03-05 13:00:54'),(185,'http://54.187.114.170:81/images/IMG_0003-1614949254.PNG',50,1,'2021-03-05 13:00:54','2021-03-22 05:04:11'),(186,'http://54.187.114.170:81/images/filename0-1615206052.jpg',40,1,'2021-03-08 12:20:52','2021-03-10 11:16:33'),(187,'http://54.187.114.170:81/images/filename1-1615206052.jpg',40,1,'2021-03-08 12:20:52','2021-03-11 04:48:10'),(188,'http://54.187.114.170:81/images/filename2-1615206052.jpg',40,1,'2021-03-08 12:20:52','2021-03-10 11:16:47'),(189,'http://54.187.114.170:81/images/filename3-1615206052.jpg',40,1,'2021-03-08 12:20:52','2021-03-10 11:04:21'),(190,'http://54.187.114.170:81/images/Screenshot (1)-1615209693.png',83,1,'2021-03-08 13:21:33','2021-03-10 11:03:43'),(191,'http://54.187.114.170:81/images/Screenshot (2)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(192,'http://54.187.114.170:81/images/Screenshot (3)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(193,'http://54.187.114.170:81/images/Screenshot (4)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(194,'http://54.187.114.170:81/images/Screenshot (5)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(195,'http://54.187.114.170:81/images/Screenshot (6)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(196,'http://54.187.114.170:81/images/Screenshot (7)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(197,'http://54.187.114.170:81/images/Screenshot (8)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(198,'http://54.187.114.170:81/images/Screenshot (9)-1615209693.png',83,0,'2021-03-08 13:21:33','2021-03-08 13:21:33'),(199,'http://54.187.114.170:81/images/filename0-1615375306.jpg',40,1,'2021-03-10 11:21:46','2021-03-10 11:21:55'),(200,'http://54.187.114.170:81/images/filename0-1615375780.jpg',40,1,'2021-03-10 11:29:40','2021-03-10 11:29:49'),(201,'http://54.187.114.170:81/images/filename0-1615375830.jpg',40,1,'2021-03-10 11:30:30','2021-03-10 11:30:43'),(202,'http://54.187.114.170:81/images/filename0-1615438043.jpg',40,1,'2021-03-11 04:47:23','2021-03-11 04:47:39'),(203,'http://54.187.114.170:81/images/filename0-1615438098.jpg',40,1,'2021-03-11 04:48:18','2021-03-11 04:54:55'),(204,'http://54.187.114.170:81/images/filename0-1615438119.jpg',40,1,'2021-03-11 04:48:39','2021-03-11 08:38:39'),(205,'http://54.187.114.170:81/images/filename1-1615438119.jpg',40,1,'2021-03-11 04:48:39','2021-03-11 05:53:22'),(206,'http://54.187.114.170:81/images/filename2-1615438119.jpg',40,1,'2021-03-11 04:48:39','2021-03-11 04:49:10'),(207,'http://54.187.114.170:81/images/filename0-1615446871.jpg',84,1,'2021-03-11 07:14:31','2021-03-11 07:16:38'),(208,'http://54.187.114.170:81/images/filename0-1615446890.jpg',84,1,'2021-03-11 07:14:50','2021-03-17 06:58:29'),(209,'http://54.187.114.170:81/images/filename0-1615461472.jpg',40,1,'2021-03-11 11:17:52','2021-03-11 11:20:00'),(210,'http://54.187.114.170:81/images/filename0-1615461607.jpg',40,1,'2021-03-11 11:20:07','2021-03-11 11:20:23'),(211,'http://54.187.114.170:81/images/filename0-1615533620.jpg',40,1,'2021-03-12 07:20:20','2021-03-22 10:40:36'),(212,'http://54.187.114.170:81/images/filename0-1615533626.jpg',40,1,'2021-03-12 07:20:26','2021-03-15 11:15:36'),(213,'http://54.187.114.170:81/images/filename1-1615533626.jpg',40,0,'2021-03-12 07:20:26','2021-03-12 07:20:26'),(214,'http://54.187.114.170:81/images/filename2-1615533626.jpg',40,1,'2021-03-12 07:20:26','2021-03-12 07:22:15'),(215,'/images/filename0-1615806706.jpg',40,1,'2021-03-15 11:11:46','2021-03-17 12:55:06'),(216,'/images/filename0-1615806948.jpg',61,1,'2021-03-15 11:15:48','2021-03-22 07:04:17'),(217,'/images/filename0-1615806993.jpg',82,0,'2021-03-15 11:16:33','2021-03-15 11:16:33'),(218,'http://54.187.114.170:81/images/filename0-1615985689.jpg',40,0,'2021-03-17 12:54:49','2021-03-17 12:54:49'),(219,'http://54.187.114.170:81/images/filename0-1616049276.jpg',84,0,'2021-03-18 06:34:36','2021-03-18 06:34:36'),(220,'http://54.187.114.170:81/images/filename1-1616049276.jpg',84,0,'2021-03-18 06:34:36','2021-03-18 06:34:36'),(221,'http://54.187.114.170:81/images/filename2-1616049276.jpg',84,1,'2021-03-18 06:34:36','2021-03-19 07:49:25'),(222,'http://54.187.114.170:81/images/filename3-1616049276.jpg',84,1,'2021-03-18 06:34:36','2021-03-19 07:43:37'),(223,'http://54.187.114.170:81/images/filename0-1616139836.jpg',84,1,'2021-03-19 07:43:56','2021-03-19 07:44:39'),(224,'http://54.187.114.170:81/images/filename0-1616140208.jpg',84,1,'2021-03-19 07:50:08','2021-03-19 07:55:01'),(225,'http://54.187.114.170:81/images/filename1-1616140208.jpg',84,1,'2021-03-19 07:50:08','2021-03-19 07:54:01'),(226,'http://54.187.114.170:81/images/filename2-1616140208.jpg',84,1,'2021-03-19 07:50:08','2021-03-19 07:50:57'),(227,'http://54.187.114.170:81/images/filename3-1616140208.jpg',84,1,'2021-03-19 07:50:08','2021-03-19 07:50:20'),(228,'http://54.187.114.170:81/images/filename0-1616140517.jpg',84,0,'2021-03-19 07:55:17','2021-03-19 07:55:17'),(229,'http://54.187.114.170:81/images/filename1-1616140517.jpg',84,0,'2021-03-19 07:55:17','2021-03-19 07:55:17'),(230,'http://54.187.114.170:81/images/filename2-1616140517.jpg',84,1,'2021-03-19 07:55:17','2021-03-22 04:45:01'),(231,'http://54.187.114.170:81/images/filename3-1616140517.jpg',84,1,'2021-03-19 07:55:17','2021-03-19 08:02:04'),(232,'http://54.187.114.170:81/images/filename0-1616396258.jpg',40,0,'2021-03-22 06:57:38','2021-03-22 06:57:38'),(233,'http://54.187.114.170:81/images/filename0-1616396397.jpg',57,0,'2021-03-22 06:59:57','2021-03-22 06:59:57'),(234,'http://54.187.114.170:81/images/filename0-1616396623.jpg',61,0,'2021-03-22 07:03:43','2021-03-22 07:03:43'),(235,'http://54.187.114.170:81/images/filename0-1616409591.jpg',40,0,'2021-03-22 10:39:51','2021-03-22 10:39:51'),(236,'http://54.187.114.170:81/images/IMG_0033-1616410078.JPEG',50,0,'2021-03-22 10:47:58','2021-03-22 10:47:58'),(237,'http://54.187.114.170:81/images/IMG_0030-1616476319.JPEG',50,0,'2021-03-23 05:11:59','2021-03-23 05:11:59'),(238,'http://54.187.114.170:81/images/IMG_0029-1616476319.JPEG',50,0,'2021-03-23 05:11:59','2021-03-23 05:11:59'),(239,'http://54.187.114.170:81/images/IMG_0033-1616476370.JPEG',81,0,'2021-03-23 05:12:50','2021-03-23 05:12:50'),(240,'http://54.187.114.170:81/images/IMG_0032-1616476370.JPEG',81,0,'2021-03-23 05:12:50','2021-03-23 05:12:50'),(241,'http://54.187.114.170:81/images/IMG_0032-1616669137.JPEG',55,0,'2021-03-25 10:45:37','2021-03-25 10:45:37'),(242,'http://54.187.114.170:81/images/IMG_0033-1616669137.JPEG',55,0,'2021-03-25 10:45:37','2021-03-25 10:45:37'),(243,'http://54.187.114.170:81/images/Screenshot (1)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(244,'http://54.187.114.170:81/images/Screenshot (2)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(245,'http://54.187.114.170:81/images/Screenshot (3)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(246,'http://54.187.114.170:81/images/Screenshot (4)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(247,'http://54.187.114.170:81/images/Screenshot (5)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(248,'http://54.187.114.170:81/images/Screenshot (6)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(249,'http://54.187.114.170:81/images/Screenshot (7)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(250,'http://54.187.114.170:81/images/Screenshot (8)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(251,'http://54.187.114.170:81/images/Screenshot (9)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(252,'http://54.187.114.170:81/images/Screenshot (10)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(253,'http://54.187.114.170:81/images/Screenshot (11)-1617187783.png',85,0,'2021-03-31 10:49:43','2021-03-31 10:49:43'),(254,'http://54.187.114.170:81/images/filename0-1617357431.jpg',86,0,'2021-04-02 09:57:11','2021-04-02 09:57:11'),(255,'http://54.187.114.170:81/images/IMG_0029-1617604374.JPEG',87,0,'2021-04-05 06:32:54','2021-04-05 06:32:54'),(256,'http://54.187.114.170:81/images/IMG_0028-1617604374.JPEG',87,0,'2021-04-05 06:32:54','2021-04-05 06:32:54'),(257,'http://54.187.114.170:81/images/IMG_0032-1617604374.JPEG',87,0,'2021-04-05 06:32:54','2021-04-05 06:32:54'),(258,'http://54.187.114.170:81/images/IMG_0033-1617604374.JPEG',87,0,'2021-04-05 06:32:54','2021-04-05 06:32:54'),(259,'http://54.187.114.170:81/images/IMG_0031-1617604374.JPEG',87,0,'2021-04-05 06:32:54','2021-04-05 06:32:54'),(260,'http://54.187.114.170:81/images/filename0-1617629391.jpg',88,0,'2021-04-05 13:29:51','2021-04-05 13:29:51'),(261,'http://54.187.114.170:81/images/filename0-1617692356.jpg',61,0,'2021-04-06 06:59:16','2021-04-06 06:59:16');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resources` (
  `resource_id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,'DIVERSITY, EQUITY, AND INCLUSION','Big Brothers Big Sisters of Central Indiana actively engages diversity, inclusion and cultural competencies throughout our organization. BBBSCI serves an incredibly diverse constituency of adult volunteers, youth and families of the youth, donors, and partners.  It is paramount to achieving our mission to value diversity and practice inclusion amongst all of our stakeholders served by the organization.  In doing so, we recognize the strengths and challenges of diversity include but are not limited to –race, religion, national origin, color, economic status, gender identity or expression, sexual orientation, marital status, disability education, expertise, and socio-economic status.  The organization’s staff and board strive to be representative of the constituencies we serve.','http://54.187.114.170:81/resources/diversity.jpg',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(2,'HOW TO KEEP YOUR LITTLE ENGAGED DURING COVID-19','In the past week we hosted two Virtual Big Get Togethers. These events allowed Bigs to come together and share their best successes in connecting with their Littles during this time of social distancing, as well as their biggest struggles. This resource summarizes some of the best tips & tricks that we learned from Bigs that you can take and try with your own Little if you have been struggling to connect. If you have more ideas that you think would be helpful for your fellow Bigs','http://54.187.114.170:81/resources/parentkid.png',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(3,'Global operation sees a rise in fake medical products related to COVID-19','The outbreak of the coronavirus disease has offered an opportunity for fast cash, as criminals take advantage of the high market demand for personal protection and hygiene products.Law enforcement agencies taking part in Operation Pangea found 2,000 online links advertising items related to COVID-19. Of these, counterfeit surgical masks were the medical device most commonly sold online, accounting for around 600 cases during the week of action.The seizure of more than 34,000 counterfeit and substandard masks, “corona spray”, “coronavirus packages” or “coronavirus medicine” reveals only the tip of the iceberg regarding this new trend in counterfeiting.','http://54.187.114.170:81/resources/resources.png',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(4,'WATCH, DO, READ, & LISTEN!','In honor of celebrating and recognizing Black History Month, BBBSCI has put together a list of various ways for you to engage in personal racial equity & justice work. We believe that this racial equity and social justice work is more important than ever as our country finds itself in a divisive and contentious position. Throughout Black History Month, we will continue posting community events, as well as our own events focusing on social justice & BHM. Please reach out to activities@bbbsci.org if you have information or resources to share regarding Black History Month!','http://54.187.114.170:81/resources/resources.png',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(5,'WHO and public health experts conclude COVID-19 mission to Islamic Republic of Iran','12 March 2020 - A team of experts from the World Health Organization(WHO), GOARN partners, Robert Koch Institute in Berlin and the Chinese Center for Disease Control concluded a technical support mission on COVID-19 to Islamic Republic of Iran on 10 March 2020.','http://54.187.114.170:81/resources/video.png',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(6,'The Play at Home Playbook','At Playworks, we believe every child should experience safe and healthy play everyday. Playworks’ evidence-based programs have been proven to get kids moving, while teaching them social-emotional skills like cooperation and conflict resolution. Now more than ever, these skills are essential to helping kids across the country combat stress and anxiety and successfully navigate the uncertainty and change associated with the COVID-19 crisis.\n        	The games in this guide can be played anywhere, but we have assembled them for kids who may be playing at home due to school closures. In these settings, the challenge is not just to introduce games kids will love, but also to ensure that children can play in the space safely and in accordance with all CDC guidelines to help prevent the spread of coronavirus. \n        	Making playtime run smoothly often starts with game rules, while still keeping it fun. In\n			the following pages, you will find the rules of games that require little to no quipment,can be played with one child or siblings, and can be led by families, teachers, caring adults, and peers.\n			For more than 24 years, Playworks has helped schools and youth organizations through\n			on-site staffing, consultative support, staff training, and most recently, online learning.\n			We are a mission-driven nonprofit committed to the power of play.','http://54.187.114.170:81/resources/playathome.png',0,'2021-02-09 11:26:46','2021-02-09 11:26:46'),(7,'New Resource','New resource data','',0,'2021-03-05 08:08:39','2021-03-05 08:08:39'),(8,'Bigs Resource','Resource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource ResourceResource Resource','http://54.187.114.170:81/resources/1615182291905-1615183150.mp4',0,'2021-03-08 05:59:10','2021-03-08 05:59:10'),(9,'New Resource title','New Resource Description','http://54.187.114.170:81/resources/Screenshot (1)-1615195647.png',0,'2021-03-08 09:27:27','2021-03-08 09:27:27'),(10,'sfsdsdsd','dsdaasdsds','',0,'2021-04-02 15:56:23','2021-04-02 15:56:23'),(11,'sdaSDasd','sdaSdxZx','',0,'2021-04-02 15:56:41','2021-04-02 15:56:41'),(12,'sdaSDasd','sdaSdxZx','',0,'2021-04-02 15:57:17','2021-04-02 15:57:17'),(13,'sdasdsad','fdsdfsdfsf','',0,'2021-04-02 15:58:37','2021-04-02 15:58:37'),(14,'asdasdad','asdfsdfsgsx','',0,'2021-04-02 15:59:54','2021-04-02 15:59:54'),(15,'xcvzsdfdf','sdfsdffdfs','',0,'2021-04-02 16:02:27','2021-04-02 16:02:27');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permissions` (
  `userpermit_id` int unsigned NOT NULL AUTO_INCREMENT,
  `userid` int unsigned NOT NULL,
  `permissionid` int unsigned NOT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userpermit_id`),
  KEY `user_permissions_userid_foreign` (`userid`),
  KEY `user_permissions_permissionid_foreign` (`permissionid`),
  CONSTRAINT `user_permissions_permissionid_foreign` FOREIGN KEY (`permissionid`) REFERENCES `permissions` (`permission_id`),
  CONSTRAINT `user_permissions_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
INSERT INTO `user_permissions` VALUES (1,1,1,0,'2020-12-14 09:05:23','2020-12-14 09:05:23'),(2,1,2,0,'2020-12-14 09:05:23','2020-12-14 09:05:23'),(3,1,3,0,'2020-12-14 09:05:23','2020-12-14 09:05:23'),(4,1,5,0,'2020-12-14 09:05:41','2020-12-14 09:05:41'),(5,1,6,0,'2020-12-14 09:05:41','2020-12-14 09:05:41'),(6,3,1,0,'2021-02-18 07:56:42','2021-02-18 07:56:42'),(7,3,2,0,'2021-02-18 07:56:42','2021-02-18 07:56:42'),(8,3,3,0,'2021-02-18 07:56:42','2021-02-18 07:56:42'),(9,3,4,0,'2021-02-18 07:56:42','2021-02-18 07:56:42'),(10,181,1,0,'2021-02-26 08:38:01','2021-02-26 08:38:01'),(11,181,2,0,'2021-02-26 08:38:01','2021-02-26 08:38:01'),(12,181,3,0,'2021-02-26 08:38:01','2021-02-26 08:38:01'),(13,181,4,0,'2021-02-26 08:41:06','2021-02-26 08:41:06'),(14,185,2,0,'2021-02-27 15:40:00','2021-02-27 15:40:00'),(15,185,3,0,'2021-02-27 15:40:00','2021-02-27 15:40:00'),(16,185,1,0,'2021-02-27 15:43:34','2021-02-27 15:43:34'),(17,185,4,0,'2021-02-27 15:43:34','2021-02-27 15:43:34');
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type` (
  `usertype_id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Agency User',0,'2020-12-10 11:38:34','2020-12-10 11:38:34'),(2,'BigS User',0,'2020-12-10 11:38:34','2020-12-10 11:38:34'),(3,'End User',0,'2020-12-10 11:38:34','2020-12-10 11:38:34');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertypeid` int unsigned NOT NULL,
  `otp` int NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` int DEFAULT NULL,
  `dateof_birth` date DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'http://54.187.114.170:81/profile_pic/default.png',
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logged_in_time` timestamp NULL DEFAULT NULL,
  `logged_out` timestamp NULL DEFAULT NULL,
  `active_status` int NOT NULL DEFAULT '0',
  `is_deleted` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mounika','Myneni',NULL,'$2y$10$xHXBqKGAtj/WsRUlFZ.4n.BGzU88tLvAL3bQDQtQ4hW/RmU1wXUjW','mdasari@gmail.com','9010655587',1,123456,'guntur','ap',522231,'1994-08-30','http://54.187.114.170:81/profile_pic/default.png','13579',NULL,NULL,1,0,'1','2020-12-10 11:40:41','2021-03-22 11:02:20'),(2,'first','last',NULL,'$2y$10$pueLMW06IB5PnGvaHvtxTeDG6nT7tM6tMQ5POJvl/vLwA0Dw81UJe','mdasarii@appstekcorp.com','1234567890',3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,NULL,NULL,1,1,'0','2020-12-10 11:42:21','2021-04-06 05:11:49'),(3,'sri','kanth',NULL,NULL,'srikntc@gmail.com','9010655587',1,123456,NULL,NULL,NULL,NULL,'lifecycle_reactjs-1607936704.jpg',NULL,NULL,NULL,0,0,'0','2020-12-14 09:05:04','2021-02-18 07:56:42'),(4,'name','asdasd',NULL,'$2y$10$9WuSXrnIUAY98Dea.hKKkutyQkWZTAVprd/lpAKnQa4ccVN/ybEvq','mdasari@appstekcorp.com','12323435455',3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (9)-1612427248.png',NULL,'2021-01-08 00:00:00',NULL,0,0,'0','2020-12-14 09:10:02','2021-04-02 12:04:33'),(5,NULL,NULL,NULL,'$2y$10$8UCafxQbgnGrM4B4RveFtewQqq3z1bjsrq9GIfTVt.NZGzqnJdO.K','abc@appstekcorp.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (9)-1612446839.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 10:09:20','2021-02-04 13:53:59'),(6,NULL,NULL,NULL,'$2y$10$tjVxj4duYbQ1mTym1KOe/.fidMCaOp6dtRm5W0zjBwKq6xESZVHsS','abc1@appstekcorp.com',NULL,1,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (9)-1612446912.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 10:09:35','2021-02-04 13:55:12'),(7,NULL,NULL,NULL,'$2y$10$YIoXdCyz7rNx6BTEJSlfcOa343uyJUIMR/M6tJd48BSqpgAOO54b6','sandp@appstekcorp.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/images-1612447932.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 10:44:45','2021-02-04 14:12:12'),(8,NULL,NULL,NULL,'$2y$10$0bprIRgov.JvkXT9RxzLnOTAbQK4pRo01FGPBwmTmxrvaM3AwPMua','Nage@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 16:33:50','2021-02-04 14:31:43'),(9,NULL,NULL,NULL,'$2y$10$iCO3/4xzsPzbEJgH9N/es.xM3MYCmc3Wjxe7mscH8xvbg37EG8Fiy','Nagendra@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 16:43:45','2021-02-04 14:31:43'),(10,NULL,NULL,NULL,'$2y$10$M2/I23BvS38VBf0UwDtO1uKUpfpBttiEnJupHH1sdSOyPJ60Qif2O','Nagendrababu@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-16 00:00:00',NULL,0,0,'0','2020-12-16 16:46:39','2021-02-04 14:31:43'),(11,NULL,NULL,NULL,'$2y$10$Jht5MMEcrxTCTi2EQxfADuticnJ4jaTW97b1iI0Qj2GGbUlOlidgG','Nag@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-26 00:00:00',NULL,0,0,'0','2020-12-16 16:51:28','2021-02-26 03:02:24'),(12,NULL,NULL,NULL,'$2y$10$yFazqFNLBroV5qyfAyR5h.krpBsZGvm2Zq9756irgz.WLQCM/p/l.','Nage66@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-17 00:00:00',NULL,0,0,'0','2020-12-17 06:06:48','2021-02-04 14:31:43'),(13,NULL,NULL,NULL,'$2y$10$KYSevqBD1449.ZdCKPuelOj/6VDTXuTS7UbG7KmU.iDAWg1j7Dye.','Nag666@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-17 00:00:00',NULL,0,0,'0','2020-12-17 06:09:20','2021-02-04 14:31:43'),(14,NULL,NULL,NULL,'$2y$10$N0HmYGX/Ige7MU6GGTuMQezx6U8mIIkYt9ilBKIFf9U.DTSDTMc1C','Nagendra666@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-17 00:00:00',NULL,0,0,'0','2020-12-17 14:54:16','2021-02-04 14:31:43'),(15,NULL,NULL,NULL,'$2y$10$Fwo2I5jcD2Xvlid1Y.WogOZPIypku1ykf3smBcwySqd6GC5ZFDNfq','Nag66@',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-18 00:00:00',NULL,0,0,'0','2020-12-18 07:05:15','2021-02-04 14:31:43'),(19,NULL,NULL,NULL,'$2y$10$6wq5SVl61571ijeet5jfvub.s/P6elbM/rIxG3MeeXl4MbG9zX0vm','Nag66@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-01 00:00:00',NULL,0,0,'0','2020-12-18 07:06:21','2021-04-01 08:20:25'),(20,NULL,NULL,NULL,'$2y$10$h1CgG2X36.1OfGRsbISFg.Uy9k/8BnQ8mHXF182PuhxIBLyRrtM8a','skbuduru@appstekcorp.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/image_d8f168d3-d1f8-423b-85e5-60134011019120200419_083501-1613724105.jpg','8','2021-04-06 00:00:00',NULL,0,0,'0','2020-12-21 08:03:16','2021-04-06 04:51:47'),(22,NULL,NULL,NULL,'$2y$10$Z7EQ1jNMyrDnFGNb9Ik/bO2gQJi8AbhjM.EhEs1ZpYZckoYDANhMG','sanjeev',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-23 00:00:00',NULL,0,0,'0','2020-12-23 09:07:14','2021-02-04 14:31:43'),(29,NULL,NULL,NULL,'$2y$10$vYnKZlZU8YKnziruwVwzWemQlssWng8Ne3DCUEfmkdhOcIGuhcSlq','sanjeev1',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-23 00:00:00',NULL,0,0,'0','2020-12-23 09:09:22','2021-02-04 14:31:43'),(31,NULL,NULL,NULL,'$2y$10$kEB8krjMI6Z3yTmuoNh1P.Yrj4alzb5tS.Mp0NZLvv/qAJTm8Fmvi','abc3@appstekcorp.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-28 00:00:00',NULL,0,0,'0','2020-12-28 09:29:58','2021-02-04 11:07:41'),(32,'kk','kk',NULL,'$2y$10$83golM4RNmrNyBR0t1/u3ufGvIaNwRDCT3az.DWewXRJTsk/6m0X2','kk@gmail.com','123467890',3,123456,'dae','evd',500037,'2021-01-13','http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-11 00:00:00',NULL,0,0,'0','2020-12-29 08:34:58','2021-02-11 07:14:06'),(34,NULL,NULL,NULL,'$2y$10$KtTObA3KKiqy.VkvGos8EO7Sg/t508ueyTirKQXdBFUp./c/VMR8m','karthik',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-08 00:00:00',NULL,0,0,'0','2020-12-29 12:58:54','2021-02-04 14:31:43'),(65,NULL,NULL,NULL,'$2y$10$t.z4ALkxyAswDyqId2qy/O8p1EzIcpodmIC0VTXPNrkQSDoUm/DKK','Love@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 11:33:43','2021-02-04 14:31:43'),(66,NULL,NULL,NULL,'$2y$10$BZz4f1F8NbV6wGhvH8qcYuPcDhKB9E4B3oWWTZVK3qzq/pZHg9ck6','Nag123@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2020-12-30 11:34:58','2021-04-06 04:49:12'),(74,NULL,NULL,NULL,'$2y$10$TcoQ05TH/StjahpOUB19l.h7vkhlaRwQzDNw3UF7p03l5Nfbq/CM6','Nag1234@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-05 00:00:00',NULL,0,0,'0','2020-12-30 12:08:09','2021-04-05 06:29:09'),(75,NULL,NULL,NULL,'$2y$10$yDtYaCOjawTkiGdorD1bi.5kIVUrbFrDr3cmYRBPHc3YNK6C3BJvO','Nag12345@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-01 00:00:00',NULL,0,0,'0','2020-12-30 12:19:45','2021-04-01 08:19:07'),(76,NULL,NULL,NULL,'$2y$10$5gjgfG9N48FNaVE8OiCjsOShNOk1zUHL26ECOKz3jHgCVDibYetGG','Nage123@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-01 00:00:00',NULL,0,0,'0','2020-12-30 16:29:08','2021-03-01 04:56:56'),(77,NULL,NULL,NULL,'$2y$10$h4M8/N4KLYhd/Qt1XEkOaeu588Bq2eJyeg.2gUfgOhoimnlc4qb6i','nage123456@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:47:00','2021-02-04 14:31:43'),(78,NULL,NULL,NULL,'$2y$10$.Vu5ETQ/IAfEuG1GpKXzbOjUUv.JIoZcLoTbrqO1XeBT6T054a2x6','nage12345@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:51:23','2021-02-04 14:31:43'),(79,NULL,NULL,NULL,'$2y$10$QpMNi8r3HfR3D7cRfHsFxeMB2Pe/pLuXYwsmovER.PCX.h79OrNti','A@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:53:07','2021-02-04 14:31:43'),(80,NULL,NULL,NULL,'$2y$10$Cy2oJdV6xevMPriXso51cuBHuSkSHyXa7NcRwza0w3UNF8Vj0ufFm','Aa@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:54:13','2021-02-04 14:31:43'),(81,NULL,NULL,NULL,'$2y$10$CFlmiZKCar5sz0KQ6FoPieoBdje2XiWELaZyb9nE2/xsjXhYk1bL6','Aaa@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:54:55','2021-02-04 14:31:43'),(82,NULL,NULL,NULL,'$2y$10$4wVT34cSZx/bQERKpDS44u31V.TNiHgE1SYLFf.MkF277dvF.WH.y','Aaab@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:56:28','2021-02-04 14:31:43'),(83,NULL,NULL,NULL,'$2y$10$y/tJ1g/l06qhIsGwgEt75eArmClJSkesWZMRO02fZKel04nHvivTu','Abc@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 16:57:47','2021-02-04 14:31:43'),(84,NULL,NULL,NULL,'$2y$10$sFNpkKaVZjwyrGK0D.axxO/HX.OLNnIH99iyohtwNQIi7LQMbvPmW','Abca@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:03:24','2021-02-04 14:31:43'),(85,NULL,NULL,NULL,'$2y$10$1n6ArvRuHTaLFucN3Bf7xumDkWAi32uqxGbzHZTT7cti5xvpkfcYe','Abcd@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:08:56','2021-02-04 14:31:43'),(86,NULL,NULL,NULL,'$2y$10$wGcPnCnM/yMIsWFZQeoyKOUVm2G9IorxaTqrqyT1H8u8/8Cnf1ZyO','Abb@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:11:31','2021-02-04 14:31:43'),(87,NULL,NULL,NULL,'$2y$10$Yb5xj7VpQZSf09BRE31r1eV9GvRa03a/wuSH0.wwsUggHUSfwt1mS','Abbb@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:12:52','2021-02-04 14:31:43'),(88,NULL,NULL,NULL,'$2y$10$luSZm2yRedKzdp9O1vJiD.7hvkoj9wX9oA4ri5On69hdRWMD2.i8K','Abbbc@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:15:33','2021-02-04 14:31:43'),(89,NULL,NULL,NULL,'$2y$10$RLlc9OuBP7WYL200annqfuZ3Yk9A66e.3f8HMMzlfDZ5WbHKOAJem','Abbbcgf@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:16:25','2021-02-04 14:31:43'),(90,NULL,NULL,NULL,'$2y$10$x3v22ackUPc7ltwIJeZe4.bx6ZWEZlNXk1PwzRSgk9wN7aCHOiQlu','Addd@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-30 00:00:00',NULL,0,0,'0','2020-12-30 17:21:37','2021-02-04 14:31:43'),(91,NULL,NULL,NULL,'$2y$10$Wswv4GKLbIKWlkhnXYukxOrqbJZ0HZ8YDWHGuQpHLBmZ837agc/Au','Nagll@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-31 00:00:00',NULL,0,0,'0','2020-12-31 03:01:41','2021-02-04 14:31:43'),(92,NULL,NULL,NULL,'$2y$10$GUDXetY3n1pwZ9QSDu0z4.zMaANL6bnp4cVvXmL4VG06x6kWh.8Pi','Nagendra123@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-31 00:00:00',NULL,0,0,'0','2020-12-31 03:11:19','2021-02-04 14:31:43'),(93,NULL,NULL,NULL,'$2y$10$XMMyPEl10UcPOi.mvwdeAetB9RJJbUWCdnoqChC/TMrkcj6T1i0yW','Nagendra11@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-31 00:00:00',NULL,0,0,'0','2020-12-31 03:12:32','2021-02-04 14:31:43'),(94,NULL,NULL,NULL,'$2y$10$y6OmNX6ESbgZddqOmQ84ZuHKFyBTr/6icAYVijs/VMxTzh1kuq8x.','Nn@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2020-12-31 00:00:00',NULL,0,0,'0','2020-12-31 03:13:44','2021-02-04 14:31:43'),(95,NULL,NULL,NULL,'$2y$10$tB/7SEYk2iFZwOi3hfulQOKsEggaDtGmHMaUnvgQuI9eyqFyy4JeK','sandeep',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-05 00:00:00',NULL,0,0,'0','2021-01-05 05:35:48','2021-02-04 14:31:43'),(96,NULL,NULL,NULL,'$2y$10$YCHv/Dry3jpN4D62S/S6FeiJ19bieXI18Tymdhl1QAaczE3udwLXy','User1@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-06 00:00:00',NULL,0,0,'0','2021-01-06 05:59:55','2021-02-04 14:31:43'),(97,NULL,NULL,NULL,'$2y$10$q.BYczpirMBF3m4FDyEBxO8pinPofmmc9roj/iwmH9IRxv0jzx5CW','User6@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-06 00:00:00',NULL,0,0,'0','2021-01-06 06:03:03','2021-02-04 14:31:43'),(98,NULL,NULL,NULL,'$2y$10$6ynOc8zkC3jpgSH3GYJD3.wqcnA31ij.aJknUWRYtGzQAfugxt4km','User66@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-06 00:00:00',NULL,0,0,'0','2021-01-06 06:08:22','2021-02-04 14:31:43'),(99,'Mounika','Myneni',NULL,NULL,'srikdntc@gmail.com','9010655587',2,123456,'guntur','ap',522231,'1994-08-30','lifecycle_reactjs-1609936386.jpg',NULL,NULL,NULL,0,0,'0','2021-01-06 12:33:06','2021-01-28 12:06:15'),(100,NULL,NULL,NULL,'$2y$10$TpXylkokoti0QigwB2aCduk6VqGIby1AJfZ3.psIbIkhwRCAFhoQq','text',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-14 00:00:00',NULL,0,0,'0','2021-01-14 07:13:09','2021-02-04 14:31:43'),(101,NULL,NULL,NULL,'$2y$10$S4JNfdyYjN1DaxC9RIF.a.yu0oCWvYcHD9.zLU5h8.zdxR4iEomJq','psscsandeep',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-01-15 00:00:00',NULL,0,0,'0','2021-01-15 10:45:05','2021-02-04 14:31:43'),(102,'mounika','kanth',NULL,NULL,'mkc@gmail.com','9010655586',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170/profile_pic/lifecycle_reactjs-1610712892.jpg',NULL,NULL,NULL,0,0,'0','2021-01-15 12:14:52','2021-01-28 12:06:15'),(103,'mounika','kanth',NULL,NULL,'mkc@gmail.comdfg','9010655586',2,123456,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,0,0,'0','2021-01-19 07:28:31','2021-01-28 12:06:15'),(104,NULL,NULL,NULL,'$2y$10$kEMzd/BS3IHMuzD0vJM35.ESQxjOGlUPv1BGpmm.V4syvhkKE/C7K','psscdeepu@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/images-1616133520.jpeg',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-01-21 08:01:45','2021-04-06 06:59:49'),(105,NULL,NULL,NULL,'$2y$10$Pm.JBOsRINe.88Vdnb175OoJdnARrYkx3.L45DxO5ewbxcWbbqvQW','Budurusanjeev',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 07:35:27','2021-02-04 14:31:43'),(106,NULL,NULL,NULL,'$2y$10$wmHXOUhbeII54/barCirFe4saoNm4NCHnxB0R41l8fphv7tqfjeP2','Sanju',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 07:37:45','2021-02-04 14:31:43'),(107,NULL,NULL,NULL,'$2y$10$.kJT31SlUeCz8non7ZB25u.kozcjO55SiuEtVrNhcgHMQiPA6.BBa','Abc',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 07:40:56','2021-02-04 14:31:43'),(108,NULL,NULL,NULL,'$2y$10$u/Iy3OmtchavqTXGWP37RejqxmRjGCOfUilBGWrsKKxIGPCYMOcC.','Abcd',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 07:44:53','2021-02-04 14:31:43'),(109,NULL,NULL,NULL,'$2y$10$KhWLSCEMDQvCvZoLHsLuIeDLaP57E4XwP4L6sqNdIbgPGOJfIvSUW','Efg',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 07:54:42','2021-02-04 14:31:43'),(110,NULL,NULL,NULL,'$2y$10$hXXQ0C5wHMdm8wZqjyCIZevAv6qYCjqrwBj.1aUlplp/MTUzq6j9a','Lithi',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 08:02:35','2021-02-04 14:31:43'),(111,NULL,NULL,NULL,'$2y$10$phF7C7nfAFyorN45sNvVNuMfTEAummBRu3qcDd9IeQsYkB6/Cz7F6','Sweety',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 08:20:00','2021-02-04 14:31:43'),(112,NULL,NULL,NULL,'$2y$10$0J2fBBfrYwxA7fHwgB4aKuY5Nul7VbaJ1FHlJcecwB2gdMxKZeIDi','Sanj',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:26:40','2021-02-04 14:31:43'),(113,NULL,NULL,NULL,'$2y$10$gTyaVjjaIL.fbZc7ROGUaeOz9AHJEyRbf9o4GaGAAv2yBNHLPhpUK','Lalli',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:38:54','2021-02-04 14:31:43'),(114,NULL,NULL,NULL,'$2y$10$kVkWEVtonkmVLfovrAZZu.dwasAHPvcv7BUORA03TcRbeBjsITtL6','The',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:43:36','2021-02-04 14:31:43'),(115,NULL,NULL,NULL,'$2y$10$XmZ6z1cVlUoRyMAJsuLq1eCtt9Thoj5LgH.gEs5PqhtSpH6m/3exC','Thr',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:45:15','2021-02-04 14:31:43'),(116,NULL,NULL,NULL,'$2y$10$PCf5c0rTKEBWrxWYdwChceLNMzzQdXBbjYVdjy26/XEUEvFSrZhUy','Uuu',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:47:53','2021-02-04 14:31:43'),(117,NULL,NULL,NULL,'$2y$10$i3lXp7ec4PZelxz57XsE6OmQeEUhn43T/8oe8sDjZ3V/UP2iJoVUe','Ioio',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:54:11','2021-02-04 14:31:43'),(118,NULL,NULL,NULL,'$2y$10$3wmALjgSmegCaJEoANYjqu7A3cPC2CTzr2/f0Eyb/xhPMwuTtvxe2','Uiui',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 09:54:41','2021-02-04 14:31:43'),(119,NULL,NULL,NULL,'$2y$10$PNbROimC8SBxRwSPqbu7l.3bsVwgNIu8iT/po0jEI.TAG93Y8UIYe','Yty',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-03 00:00:00',NULL,0,0,NULL,'2021-02-03 10:07:11','2021-02-04 14:31:43'),(120,NULL,NULL,NULL,'$2y$10$gfyiObv0srkuuwKNCGUHIeJE8uzGYDkmc.DrgY5Jz4vQRrTPY3KwK','skbuduru1@appstekcorp.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png','13579','2021-02-04 00:00:00',NULL,0,0,'0','2021-02-04 09:53:54','2021-02-04 11:07:41'),(121,NULL,NULL,NULL,'$2y$10$LlPdTqSWI5brn6d0Px.gseR6Q6g5TMD5iDxKiUZbp2fc.i8XRJ28a','Ytyt',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-04 00:00:00',NULL,0,0,NULL,'2021-02-04 10:09:42','2021-02-04 14:31:43'),(122,NULL,NULL,NULL,'$2y$10$CpVttfXT/C8R3djWZjg4uOOE7oHGuVsJiy1uGEF3yucXA0NeGch.C','Tutu',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-04 00:00:00',NULL,0,0,NULL,'2021-02-04 10:10:48','2021-02-04 14:31:43'),(123,NULL,NULL,NULL,'$2y$10$Uj/yUMkpFmiNtVp5ywrO/.YZ3h3J.FLX.IALWpADD6opc11ZmOFXm','Bnb',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 07:19:32','2021-02-05 07:19:32'),(124,NULL,NULL,NULL,'$2y$10$OP7nHvkETf6bzwd6XqPhnu2v6nC5g1GqjZBzsU4x1KHriRwz32nMO','Rtr',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 07:23:33','2021-02-05 07:23:33'),(125,NULL,NULL,NULL,'$2y$10$OiIkvxBzlK.1vDfLmW1XqOrCJVQjhvB/jkWBy1VGMvppCyNOoj8UG','Wow',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 08:07:50','2021-02-05 08:07:50'),(126,NULL,NULL,NULL,'$2y$10$HDa9m7Ectn24nDBkCzLqRux/9rF6Wu5oQH7Trj62xVyKKTuIoRn5e','Nmnm',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 08:11:57','2021-02-05 08:11:57'),(127,NULL,NULL,NULL,'$2y$10$DLDaRFWpEExoLB7W2Eacg.LLy6m3hUhpxNhju1vqpUG9xerHy7J9a','Utu',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Title (2)-1612513526.jpg',NULL,'2021-02-05 00:00:00',NULL,0,0,'0','2021-02-05 08:24:41','2021-02-05 08:25:26'),(128,NULL,NULL,NULL,'$2y$10$TSqvUc0okNnm9qeAnr8dmubUXRrwlVF3opAk3Um.a.fvdUkVRrc3S','Oop',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 08:33:36','2021-02-05 08:33:36'),(129,NULL,NULL,NULL,'$2y$10$U2/kAFJfYCK3qIYaDrQbo.yihNc8J2D2B.SVY54yn0EecY2ZvepZK','Ujn',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,'0','2021-02-05 08:34:39','2021-02-05 08:35:41'),(130,NULL,NULL,NULL,'$2y$10$NzbIeXHYAaGQNVTZcQ63T.WxbIJGQj94HKGu7aqKH0nJ6s/q2r6D.','Rty@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/image_d8f168d3-d1f8-423b-85e5-60134011019120200419_083501-1612520031.jpg',NULL,'2021-02-05 00:00:00',NULL,0,0,'0','2021-02-05 09:57:27','2021-02-05 10:13:51'),(131,NULL,NULL,NULL,'$2y$10$pmFR4pvfGMx4w1KpxZIReuE2UdRmWc6/TKOPwrbDVkedynPfEUfKK','Vcv',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 10:21:35','2021-02-05 10:21:35'),(132,NULL,NULL,NULL,'$2y$10$R8XW.x6m7UXAtaq.MCuGGeCg6TxZVfH21dIKyJiTe2P0LibWjpvbW','Cvb',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 10:25:19','2021-02-05 10:25:19'),(133,NULL,NULL,NULL,'$2y$10$0scVooR34WNUoabPf28vOuvWyu6uiDVCemBv6ricZljEo1r0u.Pza','Qaz',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,'0','2021-02-05 10:26:13','2021-02-05 10:29:30'),(134,NULL,NULL,NULL,'$2y$10$GLiIDh.CyDgC74n8DYIjX.2Gx2oSjCNZWcGroAXcJLoTGOTd7N6cG','Resu@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-05 00:00:00',NULL,0,0,NULL,'2021-02-05 10:37:38','2021-02-05 10:37:38'),(135,NULL,NULL,NULL,'$2y$10$f1wJ3hMA92L.L.yM9JCpqOp9C68Q35xJRBy4XMsoKCECI44OxEwii','Nag33@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-07 00:00:00',NULL,0,0,NULL,'2021-02-07 02:45:42','2021-02-07 02:45:42'),(136,NULL,NULL,NULL,'$2y$10$JipIqjLsX/h6yYDlAho5cONsVSdRrSCplbiZKeiC/fPUcHdBaGPIu','Nage1212@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-07 00:00:00',NULL,0,0,NULL,'2021-02-07 03:17:37','2021-02-07 03:17:37'),(137,NULL,NULL,NULL,'$2y$10$RtSqhv6VeYVUpYo7N7xaSe6F1neXn0SDKRgae.iL6YQyU4q/a.iG2','Naga@gmail.co,m',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-08 00:00:00',NULL,0,0,NULL,'2021-02-08 08:25:09','2021-02-08 08:25:09'),(138,NULL,NULL,NULL,'$2y$10$uorj8xY759MmXw1UOfVY.uc5Y.gYL/QtLicRpybB4.ncPrbelvH5.','Nagendra1234@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-08 00:00:00',NULL,0,0,NULL,'2021-02-08 10:36:02','2021-02-08 10:36:02'),(139,'karthik','merugu',NULL,NULL,'kmerugu@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/YaEOx-1613031017.png',NULL,NULL,NULL,0,0,NULL,'2021-02-11 08:10:17','2021-02-11 08:10:17'),(140,'rt','tret',NULL,'$2y$10$39D7UlC.mzXKwhNPE4aeyOc0FZzDrdvF0HpgOg9VvXxEnfzd.HZei','ok@gmail.com','1234567890',3,123456,'Balanagar','Telangana',500037,'2021-02-02','http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-11 00:00:00',NULL,0,0,'0','2021-02-11 08:27:20','2021-02-11 08:36:57'),(142,'karthik','merugu',NULL,NULL,'merugu@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/YaEOx-1613036738.png',NULL,NULL,NULL,0,0,NULL,'2021-02-11 09:45:38','2021-02-11 09:45:38'),(143,'karthik','k',NULL,'$2y$10$kG1YgiQq/xDwFp4Lt.hXFuyWAxg0SCq9D5j/t.f1nLFbG/UFeEPoW','merugu@appstekcorp.com','1234567892',3,123456,'Balanagar','Telangana',500037,'2021-02-01','http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-02-11 09:53:50','2021-04-06 08:39:17'),(146,'karthik','merugu',NULL,NULL,'kmerugu@gmail.comk','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/YaEOx-1613040349.png',NULL,NULL,NULL,0,0,NULL,'2021-02-11 10:45:49','2021-02-11 10:45:49'),(147,NULL,NULL,NULL,'$2y$10$FuWkdYWnfR1NztO7FS53DOHnvujvaNmpHZMFD9RyPnXsoe4GtpIwu','dasari@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-11 00:00:00',NULL,0,0,'0','2021-02-11 15:08:14','2021-02-11 15:08:27'),(148,'karthik','merugu',NULL,NULL,'kmerugku@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/YaEOx-1613114553.png',NULL,NULL,NULL,0,0,NULL,'2021-02-12 07:22:33','2021-02-12 07:22:33'),(149,'dsasasd','dasd',NULL,NULL,'dadasd','23141',1,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-12 08:50:35','2021-02-12 08:50:35'),(154,'karthik','merugu',NULL,NULL,'kmerugkqu@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/YaEOx-1613627285.png',NULL,NULL,NULL,0,0,NULL,'2021-02-18 05:48:05','2021-02-18 05:48:05'),(156,'yy','yy',NULL,NULL,'meruguk@appstekcorp.com','1234567890',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/download (3)-1613627612.jpg',NULL,NULL,NULL,0,0,NULL,'2021-02-18 05:53:32','2021-02-18 05:53:32'),(160,NULL,NULL,NULL,'$2y$10$2qCfnAP85t.BYt8wkZ6L4eHQlUs6k9rqB1033T1lDlRyGQU/diXja','Nss@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-19 00:00:00',NULL,0,0,NULL,'2021-02-19 06:35:41','2021-02-19 06:35:41'),(161,NULL,NULL,NULL,'$2y$10$gIkLXEzWm9L06cO8w3fOZO.48Yo5nh4YQ5YZw9TF11sElRpEc1tbW','GFgfg@fgfgg.gg',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-22 00:00:00',NULL,0,0,NULL,'2021-02-22 05:39:51','2021-02-22 05:39:51'),(162,'karthik','merugu',NULL,NULL,'kmerugkkqu@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-23 13:36:30','2021-02-23 13:36:30'),(163,'karthik','merugu',NULL,NULL,'kmerugkkqqu@gmail.com','9848032919',2,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-23 14:02:31','2021-02-23 14:02:31'),(165,'karthik','merugu',NULL,NULL,'kmerugkkqqu@gmail.coms','9848032919',2,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-23 14:03:04','2021-02-23 14:03:04'),(166,'karthik','merugu',NULL,NULL,'krugkkqqu@gmail.coms','9848032919',2,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-23 14:34:08','2021-02-23 14:34:08'),(168,'karthik','merugu',NULL,NULL,'krugkkqqsu@gmail.coms','9848032919',2,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-23 14:50:06','2021-02-23 14:50:06'),(170,NULL,NULL,NULL,'$2y$10$/70PQSpWHnEPW0Hdk1OsB.jLA.WBPRNqgkE8t/ZgBL0A/qiXrkFxa','My@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 05:55:23','2021-02-24 05:55:23'),(171,NULL,NULL,NULL,'$2y$10$IoIQHIb/R9Bvq4JejZ0TsOIJHCjQfXwkP0B0exF9UGVjcBmNTojeS','Nag6666@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 11:41:33','2021-02-24 11:41:33'),(172,NULL,NULL,NULL,'$2y$10$h8D5zN8nHIIXbTbmvhCCFuu/fFutOCojlUMLw2AbT.dBjQYL/nonG','Nage454@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 11:47:26','2021-02-24 11:47:26'),(173,NULL,NULL,NULL,'$2y$10$EHjz1E8w08mJNHPKFWBrveASivszU1VyhvyEAeT3Kq5/mATO1JOdm','Ddd@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 11:49:52','2021-02-24 11:49:52'),(174,NULL,NULL,NULL,'$2y$10$e6jbBgrB/hTl.7oRrfn7pecAbwxfk7mU69LvGcVnH0T1ccPCSPBmm','Err@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 11:51:47','2021-02-24 11:51:47'),(175,NULL,NULL,NULL,'$2y$10$0Qs5Xp7Bt7SC0c5iUI0QxuYYNpRnnhjBGzl8YAaCHhoZwMP7R/2fm','Nag4565',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 12:44:54','2021-02-24 12:44:54'),(176,NULL,NULL,NULL,'$2y$10$WlfUdUVAnzy/BQlFVUFA1exG4otoTMcr8/c/m8Wp1GoAxjFQi9ZOa','Nag4565s',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 12:45:16','2021-02-24 12:45:16'),(178,NULL,NULL,NULL,'$2y$10$1319SCavXMhfkyxqoS5VYO1WpmovhmrH3lp9tCCWnD/8yfRPr6URq','LOve66@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-24 00:00:00',NULL,0,0,NULL,'2021-02-24 15:37:13','2021-02-24 15:37:13'),(179,NULL,NULL,NULL,'$2y$10$CLpxZu42zGn7rjUuqsyqRuEarWb0IElDdXawmOSnWSYwCP01UzN4G','ABCD123@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-25 00:00:00',NULL,0,0,NULL,'2021-02-25 03:23:59','2021-02-25 03:23:59'),(180,NULL,NULL,NULL,'$2y$10$6ExgWlcLqLv7w9AsRLFzEuTJjxjWtcJPVSIgZ2ll/ezh7hGuJEYuG','12354@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-25 00:00:00',NULL,0,0,NULL,'2021-02-25 04:48:54','2021-02-25 04:48:54'),(181,NULL,NULL,NULL,'$2y$10$dUVT.N/4Y/s6H9FWmzhx1efyrVybIBGYZBnPMifPiBvbUfDG64PRK','bakshu@gmail.com',NULL,2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-01 00:00:00',NULL,0,0,'0','2021-02-25 18:05:45','2021-03-01 05:23:06'),(182,NULL,NULL,NULL,'$2y$10$i18aiX7xwBw6IhZkDD1CGO2GQhWW77mv5xV2fCjAyE4TDIMozCOTa','ammanna@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-26 00:00:00',NULL,0,0,'0','2021-02-26 07:41:00','2021-02-26 08:16:10'),(183,NULL,NULL,NULL,'$2y$10$uegANH.WXGHaUeempj7iUuKn2zpUGsJ16I3SWyuGC2KDyJGOlZD36','Babu66@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-26 00:00:00',NULL,0,0,'0','2021-02-26 09:25:03','2021-02-26 09:26:25'),(184,NULL,NULL,NULL,'$2y$10$LMv1xbpwnUFWT3CXFK40ie6R9DJzK4NkOX1Afbh5xjzVIlO2oMXfy','Nage588@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-26 00:00:00',NULL,0,0,NULL,'2021-02-26 10:40:27','2021-02-26 10:40:27'),(185,'cxzzxc','fdfddf',NULL,'$2y$10$A7trsbMY0OpapyXq28Ovy.x1lF0FzGgEmKcpYml9PI8/aMzdglOaa','43dfscz','32423',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-02-27 00:00:00',NULL,0,0,'0','2021-02-27 05:42:06','2021-02-27 16:00:55'),(187,'karthik','merugu',NULL,NULL,'krugkkqsu@gmail.coms','9848032919',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-02-28 06:37:49','2021-02-28 06:37:49'),(188,'sdd','fggf',NULL,NULL,'fgdgd@gmail.com','243425345',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/download-1614534158.jpg',NULL,NULL,NULL,0,0,NULL,'2021-02-28 17:42:38','2021-02-28 17:42:38'),(189,'ZxASxSdd','sdsdasddd',NULL,NULL,'asdsad','312323423',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (40)-1614576747.png',NULL,NULL,NULL,0,0,NULL,'2021-03-01 05:32:27','2021-03-01 05:32:27'),(190,'sdsd','dsds',NULL,NULL,'sdsd','232323',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (10)-1614577064.png',NULL,NULL,NULL,0,0,NULL,'2021-03-01 05:37:44','2021-03-01 05:37:44'),(191,'asdasd','dasdasdd',NULL,NULL,'dasdasd','323423443',1,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-03-01 08:28:27','2021-03-01 08:28:27'),(192,'first','last',NULL,'$2y$10$XH5Tx33azjvndiP/BC8FV.dxxaYKioczwKltN1sgflVXAmTY19Jh.','mdasarii@gmail.com','1234567890',2,123456,'TNL','AP',522313,'2021-03-03','http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-03-01 08:40:39','2021-04-06 08:43:52'),(194,'undefined','undefined',NULL,NULL,'undefined','undefined',1,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,NULL,NULL,0,0,NULL,'2021-03-02 09:31:44','2021-03-02 09:31:44'),(195,NULL,NULL,NULL,'$2y$10$QD/QmGj/leCX94bhcgH5POg/FYXtR748Uvc7ZztID87huh.RrfX2q','Myself@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-02 00:00:00',NULL,0,0,NULL,'2021-03-02 10:18:57','2021-03-02 10:18:57'),(196,'edfsf','fgsdfs',NULL,NULL,'edfsdfsdf','56456546776',2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Screenshot (1)-1614681165.png',NULL,NULL,NULL,0,0,NULL,'2021-03-02 10:32:45','2021-03-02 10:32:45'),(199,NULL,NULL,NULL,'$2y$10$jnv19U/2E89wXJtCdQX3V.Vy9XYV7J8xpE8eHdwwp8EpxqKnq4.Um','Abcdef@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-02 00:00:00',NULL,0,0,NULL,'2021-03-02 11:20:52','2021-03-02 11:20:52'),(206,NULL,NULL,NULL,'$2y$10$WFnax1TCPi.X7Ky3u0jj8uE/scaZHjXb5IU.Err1JLTUBgqAPWesG','Myname@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-08 00:00:00',NULL,0,0,NULL,'2021-03-08 06:50:37','2021-03-08 06:50:37'),(207,NULL,NULL,NULL,'$2y$10$V7o6e6u5s7VJdtWW5eKRrO7hE4e7yxWqI4gbymO1dkN2Y24zWGXR.','Test555@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-08 00:00:00',NULL,0,0,NULL,'2021-03-08 10:53:46','2021-03-08 10:53:46'),(210,NULL,NULL,NULL,'$2y$10$tpc2McKIEEHUVSr5Oy8ge.XHk0RPQtxZ4nl8dSfS0R90L9FG3sHrq','Babu655@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,'2021-03-15 00:00:00',NULL,0,0,NULL,'2021-03-15 09:18:13','2021-03-15 09:18:13'),(211,NULL,NULL,NULL,'$2y$10$eMuV41wWPv.WtaE4Dwsf.ei41dz/3MpdZmI7aNRPypv56eWAi2biS','Sanjeev85@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,'2021-03-15 00:00:00',NULL,0,0,NULL,'2021-03-15 10:53:30','2021-03-15 10:53:30'),(212,NULL,NULL,NULL,'$2y$10$Km9LL8PhGs6Mgua6nLx3V.5vfbsAEW48OgDjl716WLqZOiVstnDim','Ffg@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'/profile_pic/default.png',NULL,'2021-03-15 00:00:00',NULL,0,0,NULL,'2021-03-15 11:15:33','2021-03-15 11:15:33'),(213,NULL,NULL,NULL,'$2y$10$1Bb.4UWxi9jVfoPi0ikyqeNLJC8.z8Qjel9inL3YnEz/DVVMzRpHC','Bab66@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-17 00:00:00',NULL,0,0,NULL,'2021-03-17 07:51:38','2021-03-17 07:51:38'),(214,NULL,NULL,NULL,'$2y$10$9TMGr6ySgjbpL.wdZFaZ9erQhEj1w1mgdEUFzPqlG17pYMaN0UXZa','Nag4566@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-22 00:00:00',NULL,0,0,NULL,'2021-03-22 10:27:48','2021-03-22 10:27:48'),(215,NULL,NULL,NULL,'$2y$10$1IY30AjUgZ5PpZPDRYdEF.oLy4hn7/ryxUAz89RCDWfYhRdvujU8a','Nag1212@gmail.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-03-22 00:00:00',NULL,0,0,NULL,'2021-03-22 10:32:28','2021-03-22 10:32:28'),(216,NULL,NULL,NULL,'$2y$10$L9PARlHZCoUK6UNbTfVhVOdIvhHcgGXHvGIE6.2pdS4NnSf/E6vFa','blanke@gmail.com',NULL,2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-03-26 08:07:43','2021-04-06 04:53:03'),(217,NULL,NULL,NULL,'$2y$10$/aLyiGaZkfhVxK0U3y1nNuuABlEY2a29O5Sx/7geXK/cjlZ2h0MTS','Sanjeev@appstekcorp.com',NULL,4,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-02 00:00:00',NULL,0,0,'0','2021-04-02 06:25:06','2021-04-02 09:17:03'),(218,NULL,NULL,NULL,'$2y$10$.Ig1ev2gsVl6xf8Ov7bur.v/QqqlAe/M/QXAYVQd2eFX.8oYbnXmK','sriya@gmail.com',NULL,2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-04-02 07:32:11','2021-04-06 07:25:59'),(219,NULL,NULL,NULL,'$2y$10$EmLjI.jlMwYBbFqMt2VOz.unB3Y5GdtyFJSSUCJ49KZapgm6LitWy','Shshs@gej.xjn',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-02 00:00:00',NULL,0,0,NULL,'2021-04-02 09:18:31','2021-04-02 09:18:31'),(220,NULL,NULL,NULL,'$2y$10$YhZh9C4VxQb1xsq..XtiEeyYG7Jrh2rJud4YBmGeJ7P11u8u1nXxS','Abc@g.nbc',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-02 00:00:00',NULL,0,0,NULL,'2021-04-02 09:21:08','2021-04-02 09:21:08'),(221,NULL,NULL,NULL,'$2y$10$eEzekrcntQqRhCU28D0V2uXahFDzH1se30IbDf.1RFEZvqiARjBiW','Sanj@appstek.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-05 00:00:00',NULL,0,0,NULL,'2021-04-05 10:11:58','2021-04-05 10:11:58'),(222,NULL,NULL,NULL,'$2y$10$dpjkvMAa8RhJDr2VEGNQfum.PUXvt2KT1KpnFFU0CWkhYi5vBbWsa','Bb@bb.bb',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-05 00:00:00',NULL,0,0,NULL,'2021-04-05 10:36:30','2021-04-05 10:36:30'),(223,NULL,NULL,NULL,'$2y$10$.m1poUX1/krCzeayCnY1F.x260FA40voojQlbtVOG8bpNxHV/xYy6','Ee@ee.ee',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Title (4)-1617620735.jpg','14789','2021-04-05 00:00:00',NULL,0,0,NULL,'2021-04-05 10:44:31','2021-04-05 11:05:35'),(224,NULL,NULL,NULL,'$2y$10$4lnDX0yBqW5li/We98wFMOsVTHysfmYV72i/FgEJdUQclZHUz1LTy','Ss@ss.ss',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/Title (5)-1617630013.jpg','14789','2021-04-05 00:00:00',NULL,0,0,NULL,'2021-04-05 13:38:21','2021-04-05 13:40:13'),(225,NULL,NULL,NULL,'$2y$10$ixhatPxjf7aBB7vAsGpiv.PBGrdxSZJpm2SmYtFXcZr1/XWcK/nNe','test@appstekcorp.com',NULL,2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-04-05 15:35:17','2021-04-06 16:56:55'),(226,NULL,NULL,NULL,'$2y$10$eSuN0mMiSJyOvA4bHlnvCO3yPZB.O1Fy7acTIQtaTBxCEBeKSzQbC','testadmin@appstekcorp.com',NULL,2,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png',NULL,'2021-04-06 00:00:00',NULL,0,0,'0','2021-04-05 15:49:24','2021-04-06 16:51:33'),(227,NULL,NULL,NULL,'$2y$10$upi6751qHUcWGnyX3Mwtve/vYMUedj4g4FRdKFrrfnBVGhZ9wSG7y','Naaa@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png','25','2021-04-06 00:00:00',NULL,0,0,NULL,'2021-04-06 04:47:32','2021-04-06 04:48:32'),(228,NULL,NULL,NULL,'$2y$10$WdbUuIYjht28FvjlQZvAYezgtdqndLcQYB99/R3xVm8flWAwoEkRW','Hey@gmail.com',NULL,3,123456,NULL,NULL,NULL,NULL,'http://54.187.114.170:81/profile_pic/default.png','1478','2021-04-06 00:00:00',NULL,0,0,NULL,'2021-04-06 06:37:43','2021-04-06 06:38:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-07  6:08:43
