-- MySQL dump 10.13  Distrib 5.7.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cleaning_service_provider
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

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
-- Table structure for table `blocked_users`
--

DROP TABLE IF EXISTS `blocked_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocked_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blocker_id` bigint(20) unsigned NOT NULL,
  `blocked_id` bigint(20) unsigned NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocked_users`
--

LOCK TABLES `blocked_users` WRITE;
/*!40000 ALTER TABLE `blocked_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocked_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cleaner_reviews`
--

DROP TABLE IF EXISTS `cleaner_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cleaner_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cleaner_reviews`
--

LOCK TABLES `cleaner_reviews` WRITE;
/*!40000 ALTER TABLE `cleaner_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `cleaner_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cleaner_schedules`
--

DROP TABLE IF EXISTS `cleaner_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cleaner_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `day_id` int(10) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `availability` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cleaner_schedules`
--

LOCK TABLES `cleaner_schedules` WRITE;
/*!40000 ALTER TABLE `cleaner_schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `cleaner_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cleaner_service`
--

DROP TABLE IF EXISTS `cleaner_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cleaner_service` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cleaner_service`
--

LOCK TABLES `cleaner_service` WRITE;
/*!40000 ALTER TABLE `cleaner_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `cleaner_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cleaner_service_provider`
--

DROP TABLE IF EXISTS `cleaner_service_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cleaner_service_provider` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `service_provider_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cleaner_service_provider`
--

LOCK TABLES `cleaner_service_provider` WRITE;
/*!40000 ALTER TABLE `cleaner_service_provider` DISABLE KEYS */;
INSERT INTO `cleaner_service_provider` VALUES (1,7,1,'2020-01-21 08:25:04','2020-01-21 08:25:04'),(2,8,1,'2020-01-21 08:25:52','2020-01-21 08:25:52'),(3,9,1,'2020-01-21 08:26:18','2020-01-21 08:26:18'),(4,10,1,'2020-01-28 05:24:45','2020-01-28 05:24:45'),(5,11,1,'2020-01-28 05:25:47','2020-01-28 05:25:47'),(6,12,2,'2020-01-28 05:41:26','2020-01-28 05:41:26'),(7,13,1,'2020-01-31 08:17:28','2020-01-31 08:17:28');
/*!40000 ALTER TABLE `cleaner_service_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_schedules`
--

DROP TABLE IF EXISTS `client_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `landmark_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_client` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_schedules`
--

LOCK TABLES `client_schedules` WRITE;
/*!40000 ALTER TABLE `client_schedules` DISABLE KEYS */;
INSERT INTO `client_schedules` VALUES (1,4,1,5,'asa',NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-07 00:05:24','2020-02-07 00:05:32'),(2,15,1,1,'weqweq',NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-10 22:55:52','2020-02-10 22:55:52');
/*!40000 ALTER TABLE `client_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_cleaners`
--

DROP TABLE IF EXISTS `company_cleaners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_cleaners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_cleaners`
--

LOCK TABLES `company_cleaners` WRITE;
/*!40000 ALTER TABLE `company_cleaners` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_cleaners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_service`
--

DROP TABLE IF EXISTS `company_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_service` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_service`
--

LOCK TABLES `company_service` WRITE;
/*!40000 ALTER TABLE `company_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,'sunday','M','2020-01-21 06:55:38','2020-01-21 06:55:38'),(2,'monday','M','2020-01-21 06:55:38','2020-01-21 06:55:38'),(3,'tuesday','T','2020-01-21 06:55:38','2020-01-21 06:55:38'),(4,'wednesday','W','2020-01-21 06:55:38','2020-01-21 06:55:38'),(5,'thursday','TH','2020-01-21 06:55:38','2020-01-21 06:55:38'),(6,'friday','F','2020-01-21 06:55:38','2020-01-21 06:55:38'),(7,'saturdays','F','2020-01-21 06:55:39','2020-01-21 06:55:39');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `text_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,2,'hello',0,'2020-01-28 05:49:23','2020-01-28 05:49:23'),(6,1,1,'weweqwmn we',0,'2020-01-28 12:20:20','2020-01-28 12:20:20'),(23,2,1,'hi',1,'2020-01-28 05:50:49','2020-02-23 21:53:25'),(25,1,2,'test',0,'2020-02-08 20:32:10','2020-02-08 20:32:10'),(26,1,2,'eqweqwewq',0,'2020-02-08 20:37:03','2020-02-08 20:37:03'),(27,1,2,'ok',0,'2020-02-09 08:14:29','2020-02-09 08:14:29'),(28,1,2,'ter',0,'2020-02-10 22:47:20','2020-02-10 22:47:20'),(29,1,2,'weqwewq',0,'2020-02-10 22:48:31','2020-02-10 22:48:31'),(30,1,2,'weqweqw',0,'2020-02-10 22:48:45','2020-02-10 22:48:45');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_31_081353_create_service_providers_table',1),(5,'2019_12_31_094402_create_cleaner_schedules_table',1),(6,'2019_12_31_094824_create_services_table',1),(7,'2020_01_01_031356_create_cleaner_service_table',1),(8,'2020_01_01_033954_create_user_profiles_table',1),(9,'2020_01_01_040503_create_roles_table',1),(10,'2020_01_01_082352_create_cleaner_reviews_table',1),(11,'2020_01_01_082729_create_companies_table',1),(12,'2020_01_01_083044_create_company_cleaners_table',1),(13,'2020_01_01_083342_create_company_service_table',1),(14,'2020_01_11_124239_create_notifications_table',1),(15,'2020_01_12_023922_create_days_table',1),(16,'2020_01_12_050048_create_messages_table',1),(17,'2020_01_17_103127_create_schedules_table',1),(18,'2020_01_17_125951_create_client_schedules_table',1),(19,'2020_01_18_050234_create_cleaner_service_provider_table',1),(20,'2020_01_20_080911_create_blocked_users_table',1),(21,'2020_02_08_083949_add_foreign_key_to_users_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'request for General Cleaning',4,5,0,'2020-02-07 00:05:25','2020-02-07 00:05:25'),(2,'Schedule Cancel',4,5,0,'2020-02-07 00:05:32','2020-02-07 00:05:32'),(3,'Schedule Cancel',4,1,1,'2020-02-07 00:05:32','2020-02-08 03:19:44'),(4,'request for General Cleaning',15,5,0,'2020-02-10 22:55:52','2020-02-10 22:55:52'),(5,'Request Business Permit',15,1,1,'2020-02-12 21:16:17','2020-02-12 22:12:17'),(6,'Request Business Permit',15,1,1,'2020-02-12 21:17:47','2020-02-12 22:12:17'),(7,'Request Business Permit',15,1,1,'2020-02-12 21:19:00','2020-02-12 22:12:17'),(8,'Request Business Permit',15,1,1,'2020-02-12 21:21:24','2020-02-12 22:12:17'),(9,'Request Business Permit',15,1,1,'2020-02-12 21:22:24','2020-02-12 22:12:17'),(10,'Request Business Permit',15,1,1,'2020-02-12 21:23:25','2020-02-12 22:12:17'),(11,'Request Business Permit',15,1,1,'2020-02-12 21:24:24','2020-02-12 22:12:17'),(12,'Request Business Permit',15,1,1,'2020-02-12 21:25:09','2020-02-12 22:12:17'),(13,'Request Business Permit',15,1,1,'2020-02-12 21:26:26','2020-02-12 22:12:17'),(14,'Request Business Permit',15,1,1,'2020-02-12 21:27:43','2020-02-12 22:12:17'),(15,'Request Business Permit',15,1,1,'2020-02-12 21:31:25','2020-02-12 22:12:17'),(16,'Request Business Permit',15,1,1,'2020-02-12 21:32:48','2020-02-12 22:12:17'),(17,'Request Business Permit',15,1,1,'2020-02-12 21:33:32','2020-02-12 22:12:17'),(18,'Request Business Permit',15,1,1,'2020-02-12 21:48:43','2020-02-12 22:12:17'),(19,'Request Business Permit',15,1,1,'2020-02-12 21:49:14','2020-02-12 22:12:17'),(20,'Request Business Permit',15,1,1,'2020-02-12 21:57:26','2020-02-12 22:12:17'),(21,'Request Business Permit',15,1,1,'2020-02-12 22:04:35','2020-02-12 22:12:17'),(22,'Request Business Permit',15,1,1,'2020-02-12 22:11:29','2020-02-12 22:12:17'),(23,'request for General Cleaning',16,5,0,'2020-02-24 01:29:42','2020-02-24 01:29:42'),(24,'Schedule Cancel',16,5,0,'2020-02-24 01:35:27','2020-02-24 01:35:27');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator',NULL,NULL),(2,'Service Provider',NULL,NULL),(3,'Cleaner',NULL,NULL),(4,'Client',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cleaner_id` bigint(20) unsigned NOT NULL,
  `day_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,5,1,1,'07:00:00','08:00:00',0,'2020-01-26 00:14:55','2020-02-24 01:38:43'),(2,5,1,1,'07:00:00','09:00:00',0,'2020-01-26 00:15:17','2020-01-26 00:15:17'),(3,5,1,1,'09:00:00','09:00:00',0,'2020-01-26 00:16:02','2020-01-26 00:16:02'),(4,3,1,1,'09:00:00','11:00:00',0,'2020-01-28 05:03:34','2020-01-28 05:03:34'),(5,3,2,1,'09:00:00','11:00:00',0,'2020-01-28 05:03:34','2020-01-28 05:03:34'),(6,3,3,1,'09:00:00','11:00:00',0,'2020-01-28 05:03:34','2020-01-28 05:03:34'),(7,3,4,1,'09:00:00','11:00:00',0,'2020-01-28 05:04:05','2020-01-28 05:04:05'),(8,3,5,1,'09:00:00','11:00:00',0,'2020-01-28 05:04:06','2020-01-28 05:04:06'),(9,3,6,1,'09:00:00','11:00:00',0,'2020-01-28 05:04:06','2020-01-28 05:04:06'),(10,3,7,1,'09:00:00','11:00:00',0,'2020-01-28 05:04:06','2020-01-28 05:04:06'),(11,3,4,1,'09:00:00','10:00:00',0,'2020-01-28 05:04:28','2020-01-28 05:04:28'),(12,3,5,1,'09:00:00','10:00:00',0,'2020-01-28 05:04:28','2020-01-28 05:04:28'),(13,3,6,1,'09:00:00','10:00:00',0,'2020-01-28 05:04:29','2020-01-28 05:04:29'),(14,3,7,1,'09:00:00','10:00:00',0,'2020-01-28 05:04:29','2020-01-28 05:04:29'),(15,3,2,1,'09:00:00','10:00:00',0,'2020-01-28 05:05:06','2020-01-28 05:05:06'),(16,3,1,1,'09:00:00','10:00:00',0,'2020-01-28 05:05:06','2020-01-28 05:05:06'),(17,3,3,1,'09:00:00','10:00:00',0,'2020-01-28 05:05:06','2020-01-28 05:05:06'),(18,3,2,1,'09:00:00','00:00:00',0,'2020-01-28 05:05:25','2020-01-28 05:05:25'),(19,3,2,1,'13:06:00','15:06:00',0,'2020-01-28 05:06:13','2020-01-28 05:06:13'),(20,3,3,1,'13:06:00','15:06:00',0,'2020-01-28 05:06:20','2020-01-28 05:06:20'),(21,3,1,1,'13:06:00','15:06:00',0,'2020-01-28 05:07:08','2020-01-28 05:07:08'),(22,3,4,1,'13:06:00','15:06:00',0,'2020-01-28 05:07:14','2020-01-28 05:07:14'),(23,3,5,1,'13:06:00','15:06:00',0,'2020-01-28 05:07:19','2020-01-28 05:07:19'),(24,3,6,1,'13:06:00','15:06:00',0,'2020-01-28 05:07:25','2020-01-28 05:07:25'),(25,3,6,1,'13:06:00','16:06:00',0,'2020-01-28 05:08:57','2020-01-28 05:08:57'),(26,3,6,1,'15:06:00','16:06:00',0,'2020-01-28 05:11:40','2020-01-28 05:11:40'),(27,3,2,1,'15:06:00','20:06:00',0,'2020-01-28 05:12:42','2020-01-28 05:12:42'),(28,3,2,1,'22:13:00','15:13:00',0,'2020-01-28 05:13:26','2020-01-28 05:13:26'),(29,3,6,1,'15:15:00','23:15:00',0,'2020-01-28 05:15:26','2020-01-28 05:15:26'),(30,10,1,1,'08:30:00','10:30:00',0,'2020-01-28 05:29:51','2020-01-28 05:29:51'),(31,10,2,1,'08:30:00','10:30:00',0,'2020-01-28 05:29:51','2020-01-28 05:29:51'),(32,10,1,1,'08:05:00','00:30:00',0,'2020-01-28 05:30:35','2020-01-28 05:30:35'),(33,10,2,1,'08:05:00','00:30:00',0,'2020-01-28 05:30:35','2020-01-28 05:30:35'),(34,12,1,3,'01:42:00','02:40:00',0,'2020-01-28 05:42:59','2020-01-28 05:42:59'),(35,12,1,3,'03:42:00','04:40:00',0,'2020-01-28 05:43:16','2020-01-28 05:43:16'),(36,3,1,3,'06:46:00','07:39:00',0,'2020-01-28 05:46:55','2020-01-28 05:46:55'),(37,3,1,4,'06:46:00','07:40:00',0,'2020-01-28 05:47:19','2020-01-28 05:47:19');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_providers`
--

DROP TABLE IF EXISTS `service_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_providers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_permit_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_providers`
--

LOCK TABLES `service_providers` WRITE;
/*!40000 ALTER TABLE `service_providers` DISABLE KEYS */;
INSERT INTO `service_providers` VALUES (1,6,'CleanMeister','CleanMeister.jpg','Irisan Heights Baguio City','09472765053','09248237272','8747363463','8747363463.jpg',1,'2020-01-21 08:01:47','2020-01-21 08:11:18'),(2,2,'Gardening','Gardening.jpg','ffdf','98765432134','fdsfdfdfdf','6566565656565','6566565656565.jpg',0,'2020-01-28 05:19:29','2020-02-08 03:35:08'),(4,16,'weqwe','weqwe.jpg','weqwewq','weqwew','weqw','eqwewq','eqwewq.jpg',1,'2020-02-10 23:11:50','2020-02-12 22:11:56'),(19,15,'654645','654645.jpg','fdfd','34543543','54353454','543543','1581574289_download (1).jpg',0,'2020-02-12 22:11:29','2020-02-12 22:11:29');
/*!40000 ALTER TABLE `service_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `rate` smallint(6) NOT NULL,
  `service_provider_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'General Cleaning','general cleaning',450.00,1,0,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(2,'General Cleaning','dsdsds',400.00,1,1,'2020-01-28 05:23:06','2020-01-31 08:22:12'),(3,'Car wash','dsdsds',300.00,1,1,'2020-01-28 05:23:20','2020-01-28 05:23:20'),(4,'Carwash','cfsd',300.00,2,2,'2020-01-28 05:40:33','2020-01-28 05:40:33');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,'john','doe','doe','admin number','admin address',NULL,NULL,'2020-01-21 06:55:37','2020-01-21 06:55:37'),(2,2,'grace','wong','w','owner number','owner address',NULL,NULL,'2020-01-21 06:55:37','2020-01-21 06:55:37'),(3,3,'anggun','permata','c','cleaner number','cleaner address',NULL,NULL,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(4,4,'marie','jane','d','clients number','clients address',NULL,NULL,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(5,5,'justin ','perez','g','09472765053','baguio',NULL,NULL,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(6,6,'justin','perez','g','09472765053','baguio','1995-03-27',NULL,'2020-01-21 07:54:29','2020-01-21 07:54:29'),(7,7,'cleaner','cleaner','g','09472765053','baguio','1996-03-27',NULL,'2020-01-21 08:25:04','2020-01-21 08:25:04'),(8,8,'cleaner2','cleaner2','g','09472765053','baguio','1996-03-27',NULL,'2020-01-21 08:25:52','2020-01-21 08:25:52'),(9,9,'cleaner3','cleaner3','g','09472765053','baguio','1996-03-27',NULL,'2020-01-21 08:26:18','2020-01-21 08:26:18'),(10,10,'Lovely Kate','Florendo','Likigan','09487888939','Irisan','1996-07-26',NULL,'2020-01-28 05:24:45','2020-01-28 05:24:45'),(11,11,'Kate','Kate','Kate','09487888939','Irisan','2020-01-28',NULL,'2020-01-28 05:25:47','2020-01-28 05:25:47'),(12,12,'aaaaaaaaaaa','aaaaaaaaa','aaaaaaaaaa','09487888939','sasdsds','2020-01-28',NULL,'2020-01-28 05:41:26','2020-01-28 05:41:26'),(13,13,'sdsds','sdsds','sdsd','09487888939','sdsdsd','2020-01-31',NULL,'2020-01-31 08:17:28','2020-01-31 08:17:28'),(14,14,'Joshua','De Guzman','M.','09667631776','Makati','1996-08-07',NULL,'2020-02-08 02:51:39','2020-02-08 02:51:39'),(15,15,'Joshua','De Guzman','M','09667631776','232','2020-01-01',NULL,'2020-02-10 22:55:17','2020-02-10 22:55:17'),(16,16,'joshua','deguzman','mejia','09667631776','weqwqw','2020-01-01',NULL,'2020-02-10 23:09:54','2020-02-10 23:09:54');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `role_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@email.com',NULL,'$2a$10$lB1ldYWpR2J5PvEFngsr9.uutI49Yj0.csFT1yBo1r8j.lSoDh63i',0,1,NULL,1,'2020-01-21 06:55:37','2020-02-07 02:02:01'),(2,'owner','owner@email.com',NULL,'$2a$10$lB1ldYWpR2J5PvEFngsr9.uutI49Yj0.csFT1yBo1r8j.lSoDh63i',1,2,NULL,0,'2020-01-21 06:55:37','2020-02-08 03:35:08'),(3,'cleaner','cleaner@email.com',NULL,'$2y$10$7cMPwaMVg3YBoFqeQSdAc.nfQ7Cs/0xiQLkSwxCkdim.D8gPUd9Qu',0,3,NULL,1,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(4,'clients','clients@email.com',NULL,'$2y$10$..6WJCaCBtTapj55hYp5/ewqI6QgS.dtGKIzaeY1aew4f029Kgxju',0,4,NULL,1,'2020-01-21 06:55:38','2020-01-21 06:55:38'),(5,'justin','justin@email.com',NULL,'$2y$10$fsCcHvNegPDzmr.4cQPQNOEV1MK.4jM8GCktER/7zJcnj2XkLW3qy',0,3,NULL,0,'2020-01-21 06:55:38','2020-02-07 01:38:40'),(6,'serviceprovider','serviceprovider@gmail.com',NULL,'$2y$10$PiABKtpfCXF3E5MJay3WVOhK2oQyyJroupubWDjNafZTrOWkJ8V1C',1,2,NULL,0,'2020-01-21 07:54:29','2020-02-24 01:28:39'),(7,'cleaner1','cleane1@gmail.com',NULL,'$2y$10$4az9R7IT0KKPFtP3DGJVM.9zAGzSX/I0e5TABpAkmtAY3v7mL7F2O',0,3,NULL,1,'2020-01-21 08:25:04','2020-01-21 08:25:04'),(8,'cleaner2','cleane2@gmail.com',NULL,'$2y$10$NVAQlHiT1c2BdttxtgZMkOJG4Do7cyKdqMJOywQlmMlKxQhsahpd2',0,3,NULL,1,'2020-01-21 08:25:52','2020-01-21 08:25:52'),(9,'cleaner3','cleane3@gmail.com',NULL,'$2y$10$NtncMGhjCSqa0QxXGWWcnue4dT9m0F2WUg3viz98ZMw6OI2XB6pDO',0,3,NULL,1,'2020-01-21 08:26:18','2020-01-21 08:26:18'),(10,'Kate','kate@gmail.com',NULL,'$2y$10$r45TxxHPv4GqrAAJ70MC4elduUCd/TeI8DnNprm0WA4sX0boDR1LW',0,3,NULL,0,'2020-01-28 05:24:45','2020-01-28 05:24:45'),(11,'Kate','kate@app.com',NULL,'$2y$10$xI.5XI4n/wbecqnfZ90.4.QOe/dL/rrRpOZQMFyEdtlpgfG737iUi',0,3,NULL,1,'2020-01-28 05:25:47','2020-01-28 05:25:47'),(12,'katee','asasasas@app.com',NULL,'$2y$10$AZFwwe4gLqBqthnSpOsQo.mshm4lVdZ4VCZ04ovpPirRbrL0RFvyu',0,3,NULL,1,'2020-01-28 05:41:26','2020-01-28 05:41:26'),(13,'sdsd','asasas@gmail.com',NULL,'$2y$10$Q3rtMYOYi7WXWOjjsr35/.gkVZPn.6wZZO8Bp/3E7M863qnF0VyGq',0,3,NULL,1,'2020-01-31 08:17:28','2020-01-31 08:17:28'),(14,'ninjacoder','deguzman.joshua96@gmail.com',NULL,'$2y$10$0sKOCZTfSRhaXpSuIh7VFOMautk1Q.eAMwEeFSrXcxV2yZdi61vNS',0,1,NULL,1,'2020-02-08 02:51:39','2020-02-08 02:51:39'),(15,'joshua','deguzman.joshua966@gmail.com',NULL,'$2y$10$MvGdVRPUB4a5qv3uad5r.eTGHigtlECJtADkl6O5uDZBxcJQkEvXS',0,2,NULL,1,'2020-02-10 22:55:17','2020-02-10 23:07:28'),(16,'joshua1','deguzman.joshua9666@gmail.com',NULL,'$2y$10$ECwwHbB26gyOnReekqpnN.GNyi91T8PKeUokklGLDP.7SUQ8yv2HC',1,4,NULL,1,'2020-02-10 23:09:54','2020-02-12 22:14:37');
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

-- Dump completed on 2020-02-26 10:04:12
