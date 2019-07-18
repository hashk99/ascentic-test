-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ascentic_hashan
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name_UNIQUE` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'abc'),(3,'brand name 3'),(2,'xyz');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(45) NOT NULL,
  PRIMARY KEY (`color_id`),
  UNIQUE KEY `color_name_UNIQUE` (`color_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'color 1 red'),(2,'color 2 blue'),(3,'color 3 black');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) NOT NULL,
  `country_code` char(3) DEFAULT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_name_UNIQUE` (`country_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Sri Lanka','SL'),(2,'Sweden','SW'),(3,'Australia','AU'),(4,'New Zealand','NZ');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `agent` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `success` int(11) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (1,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(2,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(3,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(4,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(5,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(6,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(7,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(8,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(9,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(10,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(11,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(12,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(13,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(14,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(15,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(16,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(17,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(18,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(19,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(20,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(21,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(22,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(23,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error username',0,'::1'),(24,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(25,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(26,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(27,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error username',0,'::1'),(28,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(29,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(30,'1','2019-07-18 00:00:00','Chrome 75.0.3770.142','Success Login',1,'::1'),(31,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(32,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(33,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','login blocked',0,'::1'),(34,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(35,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(36,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(37,'1','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error password',0,'::1'),(38,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(39,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(40,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(41,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(42,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(43,'1','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error password',0,'::1'),(44,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(45,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(46,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(47,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(48,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1'),(49,'0','2019-07-18 00:00:00','Chrome 75.0.3770.142','Error logindata session',0,'::1');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_clothes`
--

DROP TABLE IF EXISTS `product_clothes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_clothes` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  KEY `products_colod_fk_idx` (`color_id`),
  KEY `products_size_fk_idx` (`size_id`),
  CONSTRAINT `products_color_fk` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_size_fk` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_clothes`
--

LOCK TABLES `product_clothes` WRITE;
/*!40000 ALTER TABLE `product_clothes` DISABLE KEYS */;
INSERT INTO `product_clothes` VALUES (2,1,1),(3,2,1);
/*!40000 ALTER TABLE `product_clothes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `product_clothes_view`
--

DROP TABLE IF EXISTS `product_clothes_view`;
/*!50001 DROP VIEW IF EXISTS `product_clothes_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_clothes_view` AS SELECT 
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `product_code`,
 1 AS `product_short_description`,
 1 AS `product_cost`,
 1 AS `product_selling_price`,
 1 AS `product_brand_id`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `deleted_at`,
 1 AS `color_id`,
 1 AS `size_id`,
 1 AS `color_name`,
 1 AS `brand_name`,
 1 AS `size_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product_giftcards`
--

DROP TABLE IF EXISTS `product_giftcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_giftcards` (
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_giftcards`
--

LOCK TABLES `product_giftcards` WRITE;
/*!40000 ALTER TABLE `product_giftcards` DISABLE KEYS */;
INSERT INTO `product_giftcards` VALUES (6,234,'0000-00-00'),(7,234,'0000-00-00'),(8,32,'0000-00-00');
/*!40000 ALTER TABLE `product_giftcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `product_giftcards_view`
--

DROP TABLE IF EXISTS `product_giftcards_view`;
/*!50001 DROP VIEW IF EXISTS `product_giftcards_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_giftcards_view` AS SELECT 
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `product_code`,
 1 AS `product_short_description`,
 1 AS `product_cost`,
 1 AS `product_selling_price`,
 1 AS `product_brand_id`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `deleted_at`,
 1 AS `amount`,
 1 AS `expire_date`,
 1 AS `brand_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product_perfumes`
--

DROP TABLE IF EXISTS `product_perfumes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_perfumes` (
  `product_id` int(11) NOT NULL,
  `origin_country_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  KEY `countries_fk_idx` (`origin_country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_perfumes`
--

LOCK TABLES `product_perfumes` WRITE;
/*!40000 ALTER TABLE `product_perfumes` DISABLE KEYS */;
INSERT INTO `product_perfumes` VALUES (9,1),(10,1),(11,2);
/*!40000 ALTER TABLE `product_perfumes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `product_perfumes_view`
--

DROP TABLE IF EXISTS `product_perfumes_view`;
/*!50001 DROP VIEW IF EXISTS `product_perfumes_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_perfumes_view` AS SELECT 
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `product_code`,
 1 AS `product_short_description`,
 1 AS `product_cost`,
 1 AS `product_selling_price`,
 1 AS `product_brand_id`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `deleted_at`,
 1 AS `origin_country_id`,
 1 AS `brand_name`,
 1 AS `country_name`,
 1 AS `country_code`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `product_code` varchar(45) NOT NULL,
  `product_short_description` text,
  `product_cost` int(11) DEFAULT NULL,
  `product_selling_price` int(11) NOT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `product_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 - clothes\n2 - giftcards \n3 - perfumes',
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code_UNIQUE` (`product_code`),
  KEY `products_brand_id_fk_idx` (`product_brand_id`),
  CONSTRAINT `products_brand_id_fk` FOREIGN KEY (`product_brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'dsadasda','dsadasda','sadas',321312,369509,1,'2019-07-18 05:25:26',NULL,NULL,1),(2,'dsadadssaddsad','dsadsad','dsa',3432423,3947286,1,'2019-07-18 05:29:33',NULL,NULL,1),(3,'my new product 3','prod3','dsadsa dasd',200,330,2,'2019-07-18 05:53:57',NULL,NULL,1),(5,'fdsfsdfsd','fdsfdsfsd','dsa',42423,42423,1,'2019-07-18 06:06:03',NULL,NULL,2),(6,'dsadas','ddsad','dfs',432,432,1,'2019-07-18 06:16:15',NULL,NULL,2),(7,'dsadas','ddsadsad','dfs',432,432,1,'2019-07-18 06:16:44',NULL,NULL,2),(8,'dsda','dsada','dsda',332,332,1,'2019-07-18 06:21:36',NULL,NULL,2),(9,'dsad','432432','fds',432,1432,1,'2019-07-18 06:37:47',NULL,NULL,2),(10,'gfdgdfgfgfg','gfdgdf','gfdg',4535,5535,1,'2019-07-18 06:42:19',NULL,NULL,3),(11,'my perfume 2','myeperfume2','dsa',1000,2000,1,'2019-07-18 06:42:50',NULL,NULL,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(45) NOT NULL,
  PRIMARY KEY (`size_id`),
  UNIQUE KEY `size_name_UNIQUE` (`size_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (2,'large'),(1,'medium'),(3,'small');
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `primary_email` varchar(45) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `active` enum('1','0') DEFAULT '1',
  `gender` int(11) DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `primary_email_UNIQUE` (`primary_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@test.com','5f4dcc3b5aa765d61d8327deb882cf99',NULL,'1',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ascentic_hashan'
--

--
-- Dumping routines for database 'ascentic_hashan'
--

--
-- Final view structure for view `product_clothes_view`
--

/*!50001 DROP VIEW IF EXISTS `product_clothes_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_clothes_view` AS (select `p`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_code` AS `product_code`,`p`.`product_short_description` AS `product_short_description`,`p`.`product_cost` AS `product_cost`,`p`.`product_selling_price` AS `product_selling_price`,`p`.`product_brand_id` AS `product_brand_id`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`p`.`deleted_at` AS `deleted_at`,`pc`.`color_id` AS `color_id`,`pc`.`size_id` AS `size_id`,`c`.`color_name` AS `color_name`,`b`.`brand_name` AS `brand_name`,`s`.`size_name` AS `size_name` from ((((`products` `p` left join `product_clothes` `pc` on((`pc`.`product_id` = `p`.`product_id`))) left join `colors` `c` on((`c`.`color_id` = `pc`.`color_id`))) left join `brands` `b` on((`b`.`brand_id` = `p`.`product_brand_id`))) left join `sizes` `s` on((`s`.`size_id` = `pc`.`size_id`))) where (`p`.`product_type` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `product_giftcards_view`
--

/*!50001 DROP VIEW IF EXISTS `product_giftcards_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_giftcards_view` AS (select `p`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_code` AS `product_code`,`p`.`product_short_description` AS `product_short_description`,`p`.`product_cost` AS `product_cost`,`p`.`product_selling_price` AS `product_selling_price`,`p`.`product_brand_id` AS `product_brand_id`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`p`.`deleted_at` AS `deleted_at`,`pg`.`amount` AS `amount`,`pg`.`expire_date` AS `expire_date`,`b`.`brand_name` AS `brand_name` from ((`products` `p` left join `product_giftcards` `pg` on((`pg`.`product_id` = `p`.`product_id`))) left join `brands` `b` on((`b`.`brand_id` = `p`.`product_brand_id`))) where (`p`.`product_type` = 2)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `product_perfumes_view`
--

/*!50001 DROP VIEW IF EXISTS `product_perfumes_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_perfumes_view` AS (select `p`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_code` AS `product_code`,`p`.`product_short_description` AS `product_short_description`,`p`.`product_cost` AS `product_cost`,`p`.`product_selling_price` AS `product_selling_price`,`p`.`product_brand_id` AS `product_brand_id`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`p`.`deleted_at` AS `deleted_at`,`pp`.`origin_country_id` AS `origin_country_id`,`b`.`brand_name` AS `brand_name`,`c`.`country_name` AS `country_name`,`c`.`country_code` AS `country_code` from (((`products` `p` left join `product_perfumes` `pp` on((`pp`.`product_id` = `p`.`product_id`))) left join `brands` `b` on((`b`.`brand_id` = `p`.`product_brand_id`))) left join `countries` `c` on((`c`.`country_id` = `pp`.`origin_country_id`))) where (`p`.`product_type` = 3)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-18 12:50:07
