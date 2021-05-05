-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: online_store
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Current Database: `online_store`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `online_store` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `online_store`;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,1,'Finibus','active'),(2,1,'Lorem','active'),(3,1,'Ipsum','active'),(4,8,'Dolor','active'),(5,8,'Amet','active'),(6,6,'Tuborg','active'),(7,6,'Maximus','active'),(8,10,'Venenatis','active'),(9,10,'Ligula','active'),(10,3,'Vitae','active'),(11,3,'Auctor','active'),(12,5,'Luctus','active'),(13,5,'Justo','active'),(14,2,'Phasellus','active'),(15,2,'Viverra','active'),(16,4,'Elementum','active'),(17,4,'Odio','active'),(18,7,'Real','active'),(19,7,'CG','active'),(20,9,'Commodo','active'),(21,9,'Nullam','active'),(22,11,'Quisques','active'),(24,11,'Horlicks','active'),(25,1,'Druk','inactive'),(27,0,'Ikea','active');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `category_status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (9,'Watch','active'),(10,'Food','active'),(11,'Home items','active'),(16,'Electronics','active'),(18,'Laptop','active');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_data`
--

DROP TABLE IF EXISTS `company_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_data` (
  `company_id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_contact_no` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_sales_target` bigint(20) DEFAULT '1000',
  `company_revenue_target` bigint(20) NOT NULL DEFAULT '1000',
  `company_timezone` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_logo` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_data`
--

LOCK TABLES `company_data` WRITE;
/*!40000 ALTER TABLE `company_data` DISABLE KEYS */;
INSERT INTO `company_data` VALUES (1,'Hamro Foods','Maadi-chitwan','9841363237','info@hamrofoods.com','NPR','Rs.',50,75011,'Europe/Berlin',NULL);
/*!40000 ALTER TABLE `company_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL DEFAULT 'currency',
  `discount_amount` float NOT NULL DEFAULT '0',
  `status` varchar(25) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (1,'12345','currency',100,'active');
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT '0',
  `brand_id` int(11) NOT NULL DEFAULT '0',
  `product_name` varchar(300) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) NOT NULL DEFAULT 'new',
  `product_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `product_quantity` bigint(25) NOT NULL DEFAULT '0',
  `product_unit` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Nos',
  `product_base_price` double(10,2) NOT NULL DEFAULT '0.00',
  `product_discount` int(11) NOT NULL DEFAULT '0',
  `product_special_discount` decimal(4,2) NOT NULL DEFAULT '0.00',
  `product_tax` decimal(4,2) NOT NULL DEFAULT '0.00',
  `product_enter_by` int(11) NOT NULL DEFAULT '0',
  `product_status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  `product_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,1,'4W Watch','d77ea4d8fe1b872133e9f00c397f1b1f.jpg','new','',0,'Nos',141.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(2,1,3,'17W B22','gender_girl.png','new','',0,'Nos',350.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(3,8,5,'himalayan iodine','civue.png','new','white salt, finely grounded',0,'Nos',800.00,0,0.00,5.00,1,'inactive','2017-11-07 23:00:00'),(4,8,4,'Round  ','no_image.png','new','',0,'Nos',550.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(5,6,6,'Tshirt','tshirt.jpg','new','',240,'Nos',240.00,0,0.00,15.00,1,'active','2017-11-07 23:00:00'),(6,6,7,'9w Concea','gender_boy.png','new','',100,'Nos',250.00,0,0.00,15.00,1,'active','2017-11-07 23:00:00'),(7,10,9,'24W Street Driver','civue.png','new','',0,'Packs',210.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(8,10,8,'BP1601 ICs','gender_girl.png','new','',0,'Nos',15.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(9,3,11,'Bag','1e678f4040a8909ecba7cf3c11cb90fb.jpg','new','',45,'Nos',400.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(10,3,10,'10W Square Down','no_image.png','new','',0,'Nos',150.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(11,5,13,'9w Deluxe ','no_image.png','new','',0,'Nos',85.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(12,5,12,'5w ','no_image.png','new','',0,'Nos',60.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(13,2,14,'15W Big Bay ','gender_boy.png','new','',0,'Nos',200.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(14,2,15,'15W Small Bay','no_image.png','new','',0,'Bottles',250.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(15,4,16,'12W','no_image.png','new','',0,'Nos',85.00,0,0.00,5.00,1,'active','2017-11-07 23:00:00'),(16,4,17,'brown salt','gender_boy.png','new','',0,'Kg',175.00,0,0.00,5.00,1,'active','2017-11-07 23:00:00'),(17,7,19,'Mango squash','civue.png','new','',0,'Liters',60.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(18,7,18,'Square Spot','civue.png','new','',0,'Liters',90.00,0,0.00,12.00,1,'active','2017-11-07 23:00:00'),(19,9,20,'pineapple bisuit','civue.png','new','creamy, two sided pineapple flavour, zero sugar',0,'Packet',120.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(20,9,21,'10W Ready  ','gender_boy.png','new','',0,'Packet',100.00,0,0.00,18.00,1,'active','2017-11-07 23:00:00'),(21,11,22,'90W Flood s','civue.png','new','',0,'Bags',500.00,0,0.00,18.00,1,'active','2017-11-08 23:00:00'),(23,1,3,'Mix fruit Jam','gender_boy.png','new','',0,'Bottles',130.00,0,0.00,12.00,1,'active','2017-11-20 23:00:00'),(24,6,6,'Tuborg Real Ice','gender_girl.png','new','',0,'Box',33.00,0,0.00,15.00,11,'active','2021-03-01 23:00:00'),(25,0,0,'ancient text book','civue.png','new','more than 5000 years old',20,'Nos',300.00,0,0.00,12.00,0,'active','2021-03-29 10:15:19'),(26,0,0,'Mango squash',NULL,'new','',20,'Nos',300.00,0,0.00,12.00,0,'active','2021-03-30 17:03:25'),(27,0,0,'tshirt',NULL,'new','',100,'Nos',300.00,0,0.00,12.00,0,'active','2021-04-02 04:49:08'),(28,0,0,'sofa','sofa7.jpg','new','',100,'Nos',300.00,0,0.00,12.00,0,'active','2021-04-02 15:16:01'),(29,0,0,'headphone','headphone2.jpg','new','',200,'Nos',700.00,0,0.00,18.00,0,'active','2021-04-02 15:16:59');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_sub_total` double(10,2) NOT NULL DEFAULT '0.00',
  `sales_tax` double(10,2) NOT NULL DEFAULT '0.00',
  `sales_discount` double(10,2) NOT NULL DEFAULT '0.00',
  `sales_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sales_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_status` enum('cash','credit') NOT NULL,
  `sales_status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  `sales_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_product`
--

DROP TABLE IF EXISTS `sales_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_product` (
  `sales_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL,
  PRIMARY KEY (`sales_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_product`
--

LOCK TABLES `sales_product` WRITE;
/*!40000 ALTER TABLE `sales_product` DISABLE KEYS */;
INSERT INTO `sales_product` VALUES (3,1,1,10,141.00,12.00),(4,1,3,4,800.00,5.00),(5,2,2,3,350.00,12.00),(6,2,17,2,60.00,12.00),(7,3,15,1,125.00,5.00),(8,3,17,2,60.00,12.00),(12,4,18,4,90.00,12.00),(13,4,20,3,100.00,18.00),(14,4,1,5,141.00,12.00),(15,5,4,2,550.00,12.00),(16,5,10,1,150.00,18.00),(17,6,8,5,15.00,18.00),(18,6,7,2,210.00,12.00),(19,7,16,7,175.00,5.00),(23,8,19,5,120.00,18.00),(24,8,11,5,85.00,12.00),(25,8,12,5,60.00,12.00),(26,9,13,3,200.00,18.00),(27,9,9,2,400.00,12.00),(28,10,9,3,400.00,12.00),(29,10,11,4,85.00,12.00),(30,11,6,6,250.00,15.00),(31,11,12,2,60.00,12.00),(32,12,2,4,350.00,12.00),(33,12,7,2,210.00,12.00),(34,13,18,3,90.00,12.00),(35,13,7,1,210.00,12.00),(36,13,8,2,15.00,18.00),(37,14,6,2,250.00,15.00),(38,14,13,1,200.00,18.00),(39,14,16,1,175.00,5.00),(40,14,17,3,60.00,12.00),(41,15,2,5,350.00,12.00),(42,16,4,4,550.00,12.00),(43,16,13,1,200.00,18.00),(49,0,23,5,30.00,12.00),(50,0,12,5,60.00,12.00),(51,0,16,5,175.00,5.00),(52,0,6,5,250.00,15.00),(53,0,16,5,175.00,5.00),(54,0,7,5,210.00,12.00),(55,0,7,5,210.00,12.00),(56,0,7,5,210.00,12.00),(57,25,14,5,250.00,18.00),(58,25,11,5,85.00,12.00),(90,17,11,4,85.00,12.00),(91,17,23,5,30.00,12.00),(92,17,11,1,85.00,12.00),(96,27,4,1,550.00,12.00),(97,28,21,1,500.00,18.00),(98,29,21,1,500.00,18.00),(99,30,12,1,60.00,12.00),(100,31,12,1,60.00,12.00),(101,32,6,1,250.00,15.00),(103,33,1,1,141.00,12.00),(104,34,12,1,60.00,12.00),(105,34,4,1,550.00,12.00);
/*!40000 ALTER TABLE `sales_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `store_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `store_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `store_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_status` enum('Active','Inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`store_id`),
  UNIQUE KEY `user_name` (`store_name`),
  UNIQUE KEY `user_email` (`store_email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,'John Smith','john_smith@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(2,'Dona L. Huber','donahuber@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(3,'Roy Hise','roy_hise@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(4,'Peter Goad','peter_goad@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(5,'Sarah Thomas','sarah_thomas@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(6,'Edna William','edna_william@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(8,'John Park','john_parks@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(10,'Mark Parker','peter_parker@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(11,'puskar','prakhar.deutschland@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(12,'Prakhar','prakhar.b.gyawali@gmail.com',NULL,'2021-02-22 15:46:05','Active'),(13,'philieep','philip.evolution@hotmail.com',NULL,'2021-02-22 15:46:05','Active'),(14,'ncell','info@ncell.com.np','','2021-02-28 00:09:08','Active');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `picture` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_type` enum('admin','editor','user','store') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'user',
  `gender` varchar(15) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'marckevinflores@gmail.com',NULL,'Marc Kevin','Flores',NULL,'user','boy','1998-08-06','09092884082','Princetown Bagumbong Caloocan City'),(2,NULL,'kimpaolo@gmail.com',NULL,'Kim Paolo','Flores',NULL,'user','girl','2001-06-06','543534','Bagumbong Caloocan City'),(3,'johndoe','shinzankie04@gmail.com','$2y$12$PzewJg6Uu283YljOUc7yFukHHe08h837e.e726/E1dGrN6cIn/CF6','John','Doe','','user','boy','null','09485157','null'),(4,'marckevin','marckevinflores@gmail.com','$2y$12$Ky9ArWgMyTrP9v2/rLzdeOS4ZkdcoHLyzjuCo8rkUS6ZXfDVK53Qe','Marc Kevin','Flores','https://lh4.googleusercontent.com/-0q6BjGfVxHo/AAAAAAAAAAI/AAAAAAAAEwY/OF-1kpIKIK8/s96-c/photo.jpg','user','boy','null','null','null'),(5,'puskar','prakhar.b.gyawali@gmail.com','$2y$12$4YYkxZk1LeAvIhP38ETpYu6hfXQdFnsz3LuSGY..ufHc2siVRWexa','Prakhar','Gyawali',NULL,'editor','boy','2021-03-12','9841363237','Hahnenstraße\n7b'),(6,'prakhar','prakhar.deutschland@gmail.com','$2y$12$4YYkxZk1LeAvIhP38ETpYu6hfXQdFnsz3LuSGY..ufHc2siVRWexa','Puskar','Gyawali',NULL,'admin','boy','2021-03-06','9547568132','Hahnenstraße\n7b');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (1,2,1,'2021-04-19 16:47:09'),(1,6,1,'2021-04-19 16:54:57');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-06  1:38:25
