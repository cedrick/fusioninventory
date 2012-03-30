CREATE DATABASE  IF NOT EXISTS `tutorial` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tutorial`;
-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: tutorial
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `fusion_inv`
--

DROP TABLE IF EXISTS `fusion_inv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fusion_inv` (
  `id` int(11) NOT NULL auto_increment,
  `item` varchar(100) default NULL,
  `category` varchar(100) default NULL,
  `status` varchar(100) default NULL,
  `comment` varchar(200) default NULL,
  `fdate` datetime default NULL,
  `all` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fusion_inv`
--

LOCK TABLES `fusion_inv` WRITE;
/*!40000 ALTER TABLE `fusion_inv` DISABLE KEYS */;
INSERT INTO `fusion_inv` VALUES (44,'guitar amplifier','amplifier','IN',NULL,'2011-04-26 22:23:18',1),(45,'promac bass amplifier','amplifier','IN',NULL,'2011-04-26 22:23:30',1),(46,'stereo mixer','mixer','IN',NULL,'2011-04-26 22:23:48',1),(47,'mic mixer','mixer','IN',NULL,'2011-04-26 22:23:52',1),(48,'crossover','mixer','IN',NULL,'2011-04-26 22:23:57',1),(49,'2-main speaker','main_speaker','IN',NULL,'2011-04-26 22:33:04',1),(50,'3-back up microphones','microphones','IN',NULL,'2011-04-26 22:33:41',1),(51,'shure wireless microphone','microphones','IN',NULL,'2011-04-26 22:33:59',1),(52,'mic stand','stand','IN',NULL,'2011-04-26 22:34:14',1),(53,'snare stand','stand','IN',NULL,'2011-04-26 22:34:23',1),(54,'ride stand','stand','IN',NULL,'2011-04-26 22:34:26',1),(55,'crash stand','stand','IN',NULL,'2011-04-26 22:34:32',1),(56,'hi-hat stand','stand','IN',NULL,'2011-04-26 22:34:39',1),(57,'drummer chair','stand','IN',NULL,'2011-04-26 22:34:57',1),(58,'left tom','drums','IN',NULL,'2011-04-26 22:35:19',1),(59,'bass drum','drums','IN',NULL,'2011-04-26 22:35:25',1),(60,'floor tom','drums','IN',NULL,'2011-04-26 22:35:31',1),(61,'snare drums','drums','IN',NULL,'2011-04-26 22:35:39',1),(70,'crash','cymbals','IN',NULL,'2011-04-26 22:40:26',1),(71,'ride','cymbals','IN',NULL,'2011-04-26 22:40:33',1),(72,'hi-hat','cymbals','IN',NULL,'2011-04-26 22:40:41',1),(73,'2-extension wires','extension_wire','IN',NULL,'2011-04-26 22:41:46',1),(74,'5-power cable','cable','IN',NULL,'2011-04-26 22:41:56',1);
/*!40000 ALTER TABLE `fusion_inv` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-05-05 23:16:28
