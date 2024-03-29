-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ppshare
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_vietnamese_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'placeholder.jpg',
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `question` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `lang` varchar(7) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'en-US',
  `created` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `lastactive` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'nhk2712','0ebe2eca800cf7bd9d9d9f9f4aafbc0c77ae155f43bbbeca69cb256a24c7f9bb','1.jpg',NULL,NULL,NULL,NULL,'en-US','','20220418024032'),(2,'abc123','3608bca1e44ea6c4d268eb6db02260269892c0b42b86bbf1e77a6fa16c3c9282','2.jpg',NULL,NULL,NULL,NULL,'en-US','',''),(3,'prouser','24e5e1c2bbef565360c392851175f46821fc21d6725503a600353625b4c9209c','placeholder.jpg','pro@mail.com','','mother-first-name','A','en-US','20220417194007','20220418050101'),(4,'newuser','98fa4d59c08e5e3b611da495c95fcd6473e3ab4d10314bdf3b084cf194dd41c3','placeholder.jpg','new@mail.com','0193913831','mother-first-name','B','vi','20220417194152','20220417194152');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,17,1,'20220416165255','nice'),(2,17,1,'20220416165344','hay qu├í'),(3,17,1,'20220416165417','perfect'),(4,17,1,'20220416165752','test submit'),(5,17,1,'20220416165759','test submit'),(6,17,1,'20220416165830','test submit 2'),(7,17,1,'20220416165848','test submit 3'),(9,17,1,'20220416170057','test submit 4'),(10,17,1,'20220416170107','test submit 5'),(11,17,2,'20220416172434','unbelievable'),(12,17,2,'20220416172610','????????????'),(13,17,2,'20220416172830','?\\'),(14,17,2,'20220416172946','≡ƒÿü'),(15,17,2,'20220416173147','≡ƒæÅ≡ƒæÅ≡ƒæÅ');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` VALUES (1,18,1,'20220416181003'),(2,18,0,'20220416181018'),(3,17,0,'20220417190644');
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,1,'Rß║Ñt hay',5,'','20220417054611'),(2,1,'Rß║Ñt tß╗ç',5,'','20220417054721'),(3,1,'Rß║Ñt tß╗ç',0,'','20220417054755'),(4,1,'Kh├┤ng qu├í tß╗ç',2,'D├╣ng ─æ╞░ß╗úc','20220417054901'),(5,1,'H╞íi tß╗ç',2,'','20220417054918');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liker`
--

DROP TABLE IF EXISTS `liker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liker`
--

LOCK TABLES `liker` WRITE;
/*!40000 ALTER TABLE `liker` DISABLE KEYS */;
INSERT INTO `liker` VALUES (5,18,1,'20220417045650'),(6,18,2,'20220417060535');
/*!40000 ALTER TABLE `liker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `owner` smallint(6) NOT NULL,
  `path` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'placeholder.jpg',
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (2,'Template 1','',1,'20220403170001.pptx','placeholder.jpg','20220403170001','technology'),(3,'Template 2','',1,'20220403170057.pptx','placeholder.jpg','20220403170057','technology'),(4,'Template 3','Hoho',1,'20220403170845.pptx','placeholder.jpg','20220403170845','technology'),(5,'Template 4','',1,'20220403171143.pptx','placeholder.jpg','20220403171143','technology'),(6,'Template special','My first template',2,'20220403172849.pptx','placeholder.jpg','20220403172849','technology'),(7,'My second template','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec massa ipsum, auctor ut neque vitae, sollicitudin facilisis magna. Fusce nec leo scelerisque turpis aliquet facilisis non quis nisl. Pellentesque euismod lobortis ex et commodo. Suspendisse viverra mi ut feugiat suscipit. Nunc viverra nunc et maximus auctor. Vestibulum lacinia porta tincidunt. Vestibulum et ipsum laoreet ante consectetur malesuada. Quisque tempus accumsan mi, aliquam interdum massa fringilla ac. Nulla facilisi. Sed nisl nunc, convallis eget ipsum vulputate, sollicitudin vehicula turpis. Maecenas lorem elit, luctus interdum hendrerit vel, ultrices eget justo.',2,'20220405153108.pptx','placeholder.jpg','20220405153108','technology'),(8,'Lorem ipsum dolor sit amet, consectetur adipiscing','',2,'20220405153604.pptx','placeholder.jpg','20220405153604','technology'),(9,'No name','',1,'20220413040507.pptx','placeholder.jpg','20220413040507','technology'),(10,'No name pro','',1,'20220413051134.pptx','20220413051134.jpeg','20220413051134','technology'),(11,'Preview test','',1,'20220414110132.pptx','20220414110132.jpeg','20220414110132','technology'),(12,'Preview test 2','',1,'20220414110250.pptx','placeholder.jpg','20220414110250','technology'),(13,'Preview test 3','',1,'20220414110506.pptx','placeholder.jpg','20220414110506','technology'),(14,'Template Tiß║┐ng Viß╗çt ─æß║ºu ti├¬n cß╗ºa t├┤i','',1,'20220415190011.pptx','placeholder.jpg','20220415190011','business'),(15,'Test select','',1,'20220416045101.pptx','placeholder.jpg','',''),(16,'Test category','',1,'20220416045849.pptx','placeholder.jpg','20220416045849','technology'),(17,'Test upload Tiß║┐ng Viß╗çt','',1,'20220416064240.pptx','placeholder.jpg','20220416064240','technology'),(18,'test upload emoji ≡ƒÿü','',1,'20220416174724.pptx','placeholder.jpg','20220416174724','technology');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `view`
--

LOCK TABLES `view` WRITE;
/*!40000 ALTER TABLE `view` DISABLE KEYS */;
INSERT INTO `view` VALUES (1,17,1,'20220416174649'),(2,17,0,'20220416174659'),(3,17,1,'20220416174707'),(4,18,1,'20220416174735'),(5,18,1,'20220416174948'),(6,18,0,'20220416174950'),(7,18,1,'20220416174953'),(8,18,1,'20220416175029'),(9,18,0,'20220416175030'),(10,18,1,'20220416175041'),(11,18,1,'20220416175127'),(12,18,0,'20220416175129'),(13,18,1,'20220416175132'),(14,18,1,'20220416175424'),(15,18,1,'20220416175621'),(16,18,1,'20220416175833'),(17,18,1,'20220416180457'),(18,18,1,'20220416180459'),(19,18,1,'20220416180505'),(20,18,0,'20220416181016'),(21,18,0,'20220416181148'),(22,18,1,'20220416181153'),(23,18,1,'20220416181154'),(24,18,0,'20220416181157'),(25,18,0,'20220416181210'),(26,18,0,'20220416181231'),(27,18,0,'20220416181300'),(28,18,0,'20220416182343'),(29,10,0,'20220417035807'),(30,18,1,'20220417043423'),(31,18,0,'20220417043930'),(32,18,0,'20220417044013'),(33,18,0,'20220417044206'),(34,18,0,'20220417044254'),(35,18,0,'20220417044324'),(36,18,0,'20220417044444'),(37,18,0,'20220417044559'),(38,18,0,'20220417044648'),(39,18,0,'20220417044816'),(40,18,0,'20220417044918'),(41,18,0,'20220417044947'),(42,18,0,'20220417045128'),(43,18,0,'20220417045146'),(44,18,1,'20220417045543'),(45,18,1,'20220417045613'),(46,18,1,'20220417045623'),(47,18,1,'20220417045638'),(48,18,1,'20220417045639'),(49,18,1,'20220417045641'),(50,18,1,'20220417045642'),(51,18,1,'20220417045647'),(52,18,1,'20220417045650'),(53,17,1,'20220417045700'),(54,18,0,'20220417050009'),(55,18,0,'20220417050040'),(56,18,0,'20220417050040'),(57,18,0,'20220417050041'),(58,18,0,'20220417050054'),(59,18,0,'20220417050218'),(60,18,0,'20220417050227'),(61,18,0,'20220417050311'),(62,18,2,'20220417060532'),(63,18,2,'20220417060535'),(64,17,0,'20220417190521'),(65,17,0,'20220417190652');
/*!40000 ALTER TABLE `view` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-18 20:12:33
