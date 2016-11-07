-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: WebStoreDB
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Current Database: `WebStoreDB`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `WebStoreDB` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `WebStoreDB`;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `UserID` int(11) DEFAULT NULL,
  `AddressLine1` varchar(20) DEFAULT NULL,
  `AddressLine2` varchar(20) DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'320 East Maxwell','321 East Maxwell',40508,'KY','Lexington'),(2,'250 Lexington Ave.','251 Lexington Ave.',40508,'KY','Lexington'),(3,'575 Savannah Dr.','570 Savannah Dr.',40508,'KY','Lexington'),(4,'123 Ludt Lane','124 Ludt Lane',73301,'TX','Austin');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderContainProduct`
--

DROP TABLE IF EXISTS `orderContainProduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderContainProduct` (
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderContainProduct`
--

LOCK TABLES `orderContainProduct` WRITE;
/*!40000 ALTER TABLE `orderContainProduct` DISABLE KEYS */;
INSERT INTO `orderContainProduct` VALUES (1,2,1),(1,1,2),(2,1,1),(3,3,1);
/*!40000 ALTER TABLE `orderContainProduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `OrderID` int(11) DEFAULT NULL,
  `OrderStatus` varchar(20) DEFAULT NULL,
  `InvoiceTotal` float DEFAULT NULL,
  `OrderTotal` float DEFAULT NULL,
  `ShipDate` date DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Pending',2,3,NULL,'2016-11-06'),(2,'UnCheckout',NULL,NULL,NULL,NULL),(3,'UnCheckout',NULL,NULL,NULL,NULL),(4,'UnCheckout',NULL,NULL,NULL,NULL),(5,'UnCheckout',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `ProductID` int(11) DEFAULT NULL,
  `ProductName` varchar(20) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `InvoicePrice` float DEFAULT NULL,
  `SalesPrice` float DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `ProdDescripiton` varchar(50) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'WOW',29.99,10.05,0,'Game','MMORPG',19),(2,'Eragon',12.99,7.05,9.98,'Book','Eragon is a dragon',0),(3,'Kingdom Hearts',24.99,15,0,'Game','It will steal your heart',5),(4,'Final Fantasy 15',59.99,40,0,'Game','Came out this November',50),(5,'Sorcerors Stone',12.99,7.05,0,'Book','Pretty amazing book',50);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','admin','admin@gmail.com','Manager','admin','admin',1),('testFirst','testLast','a@gmail.com','Customer','test','testuser',3),('test2First','test2Last','test@gmail.com','Staff','123','Testuser2',2),('admin2first','admin2last','admin2@gmail.com','Manager','admin2','admin2',4);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userOrder`
--

DROP TABLE IF EXISTS `userOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userOrder` (
  `UserID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userOrder`
--

LOCK TABLES `userOrder` WRITE;
/*!40000 ALTER TABLE `userOrder` DISABLE KEYS */;
INSERT INTO `userOrder` VALUES (1,1),(3,2),(1,3);
/*!40000 ALTER TABLE `userOrder` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-07 13:11:08
