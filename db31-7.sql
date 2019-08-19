-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 186.3.133.147    Database: acf
-- ------------------------------------------------------
-- Server version	5.5.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `access` (
  `id_access` int(11) NOT NULL AUTO_INCREMENT,
  `a_perfil` int(11) DEFAULT NULL,
  `a_modulo` int(11) NOT NULL,
  `a_item` int(11) DEFAULT NULL,
  `cs` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `sav` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `edi` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `del` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `pri` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_permiso` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id_access`)
) ENGINE=InnoDB AUTO_INCREMENT=667 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` VALUES (298,2,1,51,'I','I','I','I','I',NULL,NULL),(299,2,1,50,'I','I','I','I','I',NULL,NULL),(300,2,1,49,'I','I','I','I','I',NULL,NULL),(301,2,1,48,'I','I','I','I','I',NULL,NULL),(302,2,1,47,'I','I','I','I','I',NULL,NULL),(303,2,1,46,'I','I','I','I','I',NULL,NULL),(304,2,1,45,'I','I','I','I','I',NULL,NULL),(305,2,1,44,'I','I','I','I','I',NULL,NULL),(306,2,1,43,'I','I','I','I','I',NULL,NULL),(307,2,1,42,'I','I','I','I','I',NULL,NULL),(308,2,1,41,'I','I','I','I','I',NULL,NULL),(309,2,1,40,'I','I','I','I','I',NULL,NULL),(310,2,1,39,'I','I','I','I','I',NULL,NULL),(311,2,1,38,'I','I','I','I','I',NULL,NULL),(312,2,1,37,'I','I','I','I','I',NULL,NULL),(313,2,1,36,'I','I','I','I','I',NULL,NULL),(314,2,1,35,'I','I','I','I','I',NULL,NULL),(315,2,1,34,'I','I','I','I','I',NULL,NULL),(316,2,1,33,'I','I','I','I','I',NULL,NULL),(317,2,1,32,'I','I','I','I','I',NULL,NULL),(318,2,1,31,'I','I','I','I','I',NULL,NULL),(319,2,1,30,'I','I','I','I','I',NULL,NULL),(320,2,1,29,'I','I','I','I','I',NULL,NULL),(321,2,1,28,'I','I','I','I','I',NULL,NULL),(322,2,1,27,'I','I','I','I','I',NULL,NULL),(323,2,1,26,'I','I','I','I','I',NULL,NULL),(324,2,1,25,'A','I','I','I','A',NULL,NULL),(325,2,2,54,'A','I','I','I','A',NULL,NULL),(326,2,2,55,'I','I','I','I','I',NULL,NULL),(327,2,2,56,'I','I','I','I','I',NULL,NULL),(328,2,2,57,'I','I','I','I','I',NULL,NULL),(329,2,2,58,'I','I','I','I','I',NULL,NULL),(330,2,2,59,'I','I','I','I','I',NULL,NULL),(331,2,2,60,'I','I','I','I','I',NULL,NULL),(332,2,2,61,'I','I','I','I','I',NULL,NULL),(333,2,2,62,'I','I','I','I','I',NULL,NULL),(334,2,2,63,'I','I','I','I','I',NULL,NULL),(335,2,2,64,'I','I','I','I','I',NULL,NULL),(336,2,2,65,'I','I','I','I','I',NULL,NULL),(337,2,2,66,'I','I','I','I','I',NULL,NULL),(338,2,2,67,'I','I','I','I','I',NULL,NULL),(339,2,2,68,'I','I','I','I','I',NULL,NULL),(340,2,2,69,'I','I','I','I','I',NULL,NULL),(341,2,2,70,'I','I','I','I','I',NULL,NULL),(342,2,2,71,'I','I','I','I','I',NULL,NULL),(343,2,2,72,'I','I','I','I','I',NULL,NULL),(344,2,2,73,'I','I','I','I','I',NULL,NULL),(345,2,2,74,'I','I','I','I','I',NULL,NULL),(346,2,2,75,'I','I','I','I','I',NULL,NULL),(347,2,2,76,'I','I','I','I','I',NULL,NULL),(348,2,2,77,'I','I','I','I','I',NULL,NULL),(349,2,3,78,'A','A','I','I','A',NULL,NULL),(350,2,3,79,'I','I','I','I','I',NULL,NULL),(351,2,3,80,'I','I','I','I','I',NULL,NULL),(352,2,3,81,'I','I','I','I','I',NULL,NULL),(353,2,3,82,'I','I','I','I','I',NULL,NULL),(354,2,3,83,'I','I','I','I','I',NULL,NULL),(355,2,3,84,'I','I','I','I','I',NULL,NULL),(356,2,3,85,'I','I','I','I','I',NULL,NULL),(357,2,3,86,'I','I','I','I','I',NULL,NULL),(358,2,3,87,'I','I','I','I','I',NULL,NULL),(359,2,3,88,'I','I','I','I','I',NULL,NULL),(360,2,3,89,'I','I','I','I','I',NULL,NULL),(361,2,3,90,'I','I','I','I','I',NULL,NULL),(362,2,3,91,'I','I','I','I','I',NULL,NULL),(363,2,3,92,'I','I','I','I','I',NULL,NULL),(364,2,3,93,'I','I','I','I','I',NULL,NULL),(365,2,3,94,'I','I','I','I','I',NULL,NULL),(366,2,3,95,'I','I','I','I','I',NULL,NULL),(367,2,3,96,'I','I','I','I','I',NULL,NULL),(368,2,3,97,'I','I','I','I','I',NULL,NULL),(369,2,3,98,'I','I','I','I','I',NULL,NULL),(370,2,3,99,'I','I','I','I','I',NULL,NULL),(371,2,3,100,'I','I','I','I','I',NULL,NULL),(372,2,3,101,'I','I','I','I','I',NULL,NULL),(373,2,3,102,'I','I','I','I','I',NULL,NULL),(374,2,3,103,'I','I','I','I','I',NULL,NULL),(375,2,3,104,'I','I','I','I','I',NULL,NULL),(376,2,3,105,'I','I','I','I','I',NULL,NULL),(377,2,3,106,'I','I','I','I','I',NULL,NULL),(378,2,3,107,'I','I','I','I','I',NULL,NULL),(379,2,3,108,'I','I','I','I','I',NULL,NULL),(380,2,3,109,'I','I','I','I','I',NULL,NULL),(381,2,3,110,'I','I','I','I','I',NULL,NULL),(382,2,3,111,'I','I','I','I','I',NULL,NULL),(383,2,3,112,'I','I','I','I','I',NULL,NULL),(384,2,3,113,'I','I','I','I','I',NULL,NULL),(385,2,3,114,'I','I','I','I','I',NULL,NULL),(386,2,3,115,'I','I','I','I','I',NULL,NULL),(387,2,3,116,'I','I','I','I','I',NULL,NULL),(388,2,3,117,'I','I','I','I','I',NULL,NULL),(389,2,3,118,'I','I','I','I','I',NULL,NULL),(390,2,3,119,'I','I','I','I','I',NULL,NULL),(391,2,3,120,'I','I','I','I','I',NULL,NULL),(392,2,3,121,'I','I','I','I','I',NULL,NULL),(393,2,3,122,'I','I','I','I','I',NULL,NULL),(394,2,3,123,'I','I','I','I','I',NULL,NULL),(395,2,3,124,'I','I','I','I','I',NULL,NULL),(396,2,3,125,'I','I','I','I','I',NULL,NULL),(397,2,3,126,'I','I','I','I','I',NULL,NULL),(398,2,3,127,'I','I','I','I','I',NULL,NULL),(399,2,3,128,'I','I','I','I','I',NULL,NULL),(400,2,4,129,'I','I','I','I','I',NULL,NULL),(401,2,4,130,'I','I','I','I','I',NULL,NULL),(402,2,4,131,'I','I','I','I','I',NULL,NULL),(403,2,4,132,'I','I','I','I','I',NULL,NULL),(404,2,4,133,'I','I','I','I','I',NULL,NULL),(405,2,4,134,'I','I','I','I','I',NULL,NULL),(406,2,4,135,'I','I','I','I','I',NULL,NULL),(407,2,4,136,'I','I','I','I','I',NULL,NULL),(408,2,4,137,'I','I','I','I','I',NULL,NULL),(409,2,4,138,'I','I','I','I','I',NULL,NULL),(410,2,4,139,'I','I','I','I','I',NULL,NULL),(411,2,4,140,'I','I','I','I','I',NULL,NULL),(412,2,4,141,'I','I','I','I','I',NULL,NULL),(413,2,4,142,'I','I','I','I','I',NULL,NULL),(414,2,4,143,'I','I','I','I','I',NULL,NULL),(415,2,4,144,'I','I','I','I','I',NULL,NULL),(416,2,4,145,'I','I','I','I','I',NULL,NULL),(417,2,4,146,'I','I','I','I','I',NULL,NULL),(418,2,4,147,'I','I','I','I','I',NULL,NULL),(419,2,6,148,'I','I','I','I','I',NULL,NULL),(420,2,6,149,'I','I','I','I','I',NULL,NULL),(421,1,1,51,'I','I','I','I','I',NULL,NULL),(422,1,1,50,'A','A','A','A','A',NULL,NULL),(423,1,1,49,'A','A','A','A','A',NULL,NULL),(424,1,1,48,'A','A','A','A','A',NULL,NULL),(425,1,1,47,'A','A','A','A','A',NULL,NULL),(426,1,1,46,'A','A','A','A','A',NULL,NULL),(427,1,1,45,'A','A','A','A','A',NULL,NULL),(428,1,1,44,'A','A','A','A','A',NULL,NULL),(429,1,1,43,'A','A','A','A','A',NULL,NULL),(430,1,1,42,'A','A','A','A','A',NULL,NULL),(431,1,1,41,'A','A','A','A','A',NULL,NULL),(432,1,1,40,'A','A','A','A','A',NULL,NULL),(433,1,1,39,'A','A','A','A','A',NULL,NULL),(434,1,1,38,'A','A','A','A','A',NULL,NULL),(435,1,1,37,'A','A','A','A','A',NULL,NULL),(436,1,1,36,'A','A','A','A','A',NULL,NULL),(437,1,1,35,'A','A','A','A','A',NULL,NULL),(438,1,1,34,'A','A','A','A','A',NULL,NULL),(439,1,1,33,'A','A','A','A','A',NULL,NULL),(440,1,1,32,'A','A','A','A','A',NULL,NULL),(441,1,1,31,'A','A','A','A','A',NULL,NULL),(442,1,1,30,'A','A','A','A','A',NULL,NULL),(443,1,1,29,'A','A','A','A','A',NULL,NULL),(444,1,1,28,'A','A','A','A','A',NULL,NULL),(445,1,1,27,'A','A','A','A','A',NULL,NULL),(446,1,1,26,'A','A','A','A','A',NULL,NULL),(447,1,1,25,'A','A','A','A','A',NULL,NULL),(448,1,2,54,'A','A','A','A','A',NULL,NULL),(449,1,2,55,'A','A','A','A','A',NULL,NULL),(450,1,2,56,'A','A','A','A','A',NULL,NULL),(451,1,2,57,'A','A','A','A','A',NULL,NULL),(452,1,2,58,'A','A','A','A','A',NULL,NULL),(453,1,2,59,'A','A','A','A','A',NULL,NULL),(454,1,2,60,'A','A','A','A','A',NULL,NULL),(455,1,2,61,'A','A','A','A','A',NULL,NULL),(456,1,2,62,'A','A','A','A','A',NULL,NULL),(457,1,2,63,'A','A','A','A','A',NULL,NULL),(458,1,2,64,'A','A','A','A','A',NULL,NULL),(459,1,2,65,'A','A','A','A','A',NULL,NULL),(460,1,2,66,'A','A','A','A','A',NULL,NULL),(461,1,2,67,'A','A','A','A','A',NULL,NULL),(462,1,2,68,'A','A','A','A','A',NULL,NULL),(463,1,2,69,'A','A','A','A','A',NULL,NULL),(464,1,2,70,'A','A','A','A','A',NULL,NULL),(465,1,2,71,'A','A','A','A','A',NULL,NULL),(466,1,2,72,'A','A','A','A','A',NULL,NULL),(467,1,2,73,'A','A','A','A','A',NULL,NULL),(468,1,2,74,'A','A','A','A','A',NULL,NULL),(469,1,2,75,'A','A','A','A','A',NULL,NULL),(470,1,2,76,'A','A','A','A','A',NULL,NULL),(471,1,2,77,'A','A','A','A','A',NULL,NULL),(472,1,3,78,'I','I','I','I','I',NULL,NULL),(473,1,3,79,'I','I','I','I','I',NULL,NULL),(474,1,3,80,'I','I','I','I','I',NULL,NULL),(475,1,3,81,'I','I','I','I','I',NULL,NULL),(476,1,3,82,'I','I','I','I','I',NULL,NULL),(477,1,3,83,'I','I','I','I','I',NULL,NULL),(478,1,3,84,'I','I','I','I','I',NULL,NULL),(479,1,3,85,'I','I','I','I','I',NULL,NULL),(480,1,3,86,'I','I','I','I','I',NULL,NULL),(481,1,3,87,'I','I','I','I','I',NULL,NULL),(482,1,3,88,'I','I','I','I','I',NULL,NULL),(483,1,3,89,'I','I','I','I','I',NULL,NULL),(484,1,3,90,'I','I','I','I','I',NULL,NULL),(485,1,3,91,'I','I','I','I','I',NULL,NULL),(486,1,3,92,'I','I','I','I','I',NULL,NULL),(487,1,3,93,'I','I','I','I','I',NULL,NULL),(488,1,3,94,'I','I','I','I','I',NULL,NULL),(489,1,3,95,'I','I','I','I','I',NULL,NULL),(490,1,3,96,'I','I','I','I','I',NULL,NULL),(491,1,3,97,'I','I','I','I','I',NULL,NULL),(492,1,3,98,'I','I','I','I','I',NULL,NULL),(493,1,3,99,'I','I','I','I','I',NULL,NULL),(494,1,3,100,'I','I','I','I','I',NULL,NULL),(495,1,3,101,'I','I','I','I','I',NULL,NULL),(496,1,3,102,'I','I','I','I','I',NULL,NULL),(497,1,3,103,'I','I','I','I','I',NULL,NULL),(498,1,3,104,'I','I','I','I','I',NULL,NULL),(499,1,3,105,'I','I','I','I','I',NULL,NULL),(500,1,3,106,'I','I','I','I','I',NULL,NULL),(501,1,3,107,'I','I','I','I','I',NULL,NULL),(502,1,3,108,'I','I','I','I','I',NULL,NULL),(503,1,3,109,'I','I','I','I','I',NULL,NULL),(504,1,3,110,'I','I','I','I','I',NULL,NULL),(505,1,3,111,'I','I','I','I','I',NULL,NULL),(506,1,3,112,'I','I','I','I','I',NULL,NULL),(507,1,3,113,'I','I','I','I','I',NULL,NULL),(508,1,3,114,'I','I','I','I','I',NULL,NULL),(509,1,3,115,'I','I','I','I','I',NULL,NULL),(510,1,3,116,'I','I','I','I','I',NULL,NULL),(511,1,3,117,'I','I','I','I','I',NULL,NULL),(512,1,3,118,'I','I','I','I','I',NULL,NULL),(513,1,3,119,'I','I','I','I','I',NULL,NULL),(514,1,3,120,'I','I','I','I','I',NULL,NULL),(515,1,3,121,'I','I','I','I','I',NULL,NULL),(516,1,3,122,'I','I','I','I','I',NULL,NULL),(517,1,3,123,'I','I','I','I','I',NULL,NULL),(518,1,3,124,'I','I','I','I','I',NULL,NULL),(519,1,3,125,'I','I','I','I','I',NULL,NULL),(520,1,3,126,'I','I','I','I','I',NULL,NULL),(521,1,3,127,'I','I','I','I','I',NULL,NULL),(522,1,3,128,'I','I','I','I','I',NULL,NULL),(523,1,4,129,'I','I','I','I','I',NULL,NULL),(524,1,4,130,'I','I','I','I','I',NULL,NULL),(525,1,4,131,'I','I','I','I','I',NULL,NULL),(526,1,4,132,'I','I','I','I','I',NULL,NULL),(527,1,4,133,'I','I','I','I','I',NULL,NULL),(528,1,4,134,'I','I','I','I','I',NULL,NULL),(529,1,4,135,'I','I','I','I','I',NULL,NULL),(530,1,4,136,'I','I','I','I','I',NULL,NULL),(531,1,4,137,'I','I','I','I','I',NULL,NULL),(532,1,4,138,'I','I','I','I','I',NULL,NULL),(533,1,4,139,'I','I','I','I','I',NULL,NULL),(534,1,4,140,'I','I','I','I','I',NULL,NULL),(535,1,4,141,'I','I','I','I','I',NULL,NULL),(536,1,4,142,'I','I','I','I','I',NULL,NULL),(537,1,4,143,'I','I','I','I','I',NULL,NULL),(538,1,4,144,'I','I','I','I','I',NULL,NULL),(539,1,4,145,'I','I','I','I','I',NULL,NULL),(540,1,4,146,'I','I','I','I','I',NULL,NULL),(541,1,4,147,'I','I','I','I','I',NULL,NULL),(542,1,6,148,'I','I','I','I','I',NULL,NULL),(543,1,6,149,'I','I','I','I','I',NULL,NULL),(544,3,1,51,'I','I','I','I','I',NULL,NULL),(545,3,1,50,'I','I','I','I','I',NULL,NULL),(546,3,1,49,'I','I','I','I','I',NULL,NULL),(547,3,1,48,'I','I','I','I','I',NULL,NULL),(548,3,1,47,'I','I','I','I','I',NULL,NULL),(549,3,1,46,'I','I','I','I','I',NULL,NULL),(550,3,1,45,'I','I','I','I','I',NULL,NULL),(551,3,1,44,'I','I','I','I','I',NULL,NULL),(552,3,1,43,'I','I','I','I','I',NULL,NULL),(553,3,1,42,'I','I','I','I','I',NULL,NULL),(554,3,1,41,'I','I','I','I','I',NULL,NULL),(555,3,1,40,'I','I','I','I','I',NULL,NULL),(556,3,1,39,'I','I','I','I','I',NULL,NULL),(557,3,1,38,'I','I','I','I','I',NULL,NULL),(558,3,1,37,'I','I','I','I','I',NULL,NULL),(559,3,1,36,'I','I','I','I','I',NULL,NULL),(560,3,1,35,'I','I','I','I','I',NULL,NULL),(561,3,1,34,'I','I','I','I','I',NULL,NULL),(562,3,1,33,'I','I','I','I','I',NULL,NULL),(563,3,1,32,'I','I','I','I','I',NULL,NULL),(564,3,1,31,'I','I','I','I','I',NULL,NULL),(565,3,1,30,'I','I','I','I','I',NULL,NULL),(566,3,1,29,'I','I','I','I','I',NULL,NULL),(567,3,1,28,'I','I','I','I','I',NULL,NULL),(568,3,1,27,'I','I','I','I','I',NULL,NULL),(569,3,1,26,'I','I','I','I','I',NULL,NULL),(570,3,1,25,'I','I','I','I','I',NULL,NULL),(571,3,2,54,'I','I','I','I','I',NULL,NULL),(572,3,2,55,'I','I','I','I','I',NULL,NULL),(573,3,2,56,'I','I','I','I','I',NULL,NULL),(574,3,2,57,'I','I','I','I','I',NULL,NULL),(575,3,2,58,'I','I','I','I','I',NULL,NULL),(576,3,2,59,'I','I','I','I','I',NULL,NULL),(577,3,2,60,'I','I','I','I','I',NULL,NULL),(578,3,2,61,'I','I','I','I','I',NULL,NULL),(579,3,2,62,'I','I','I','I','I',NULL,NULL),(580,3,2,63,'I','I','I','I','I',NULL,NULL),(581,3,2,64,'I','I','I','I','I',NULL,NULL),(582,3,2,65,'I','I','I','I','I',NULL,NULL),(583,3,2,66,'I','I','I','I','I',NULL,NULL),(584,3,2,67,'I','I','I','I','I',NULL,NULL),(585,3,2,68,'I','I','I','I','I',NULL,NULL),(586,3,2,69,'I','I','I','I','I',NULL,NULL),(587,3,2,70,'I','I','I','I','I',NULL,NULL),(588,3,2,71,'I','I','I','I','I',NULL,NULL),(589,3,2,72,'I','I','I','I','I',NULL,NULL),(590,3,2,73,'I','I','I','I','I',NULL,NULL),(591,3,2,74,'I','I','I','I','I',NULL,NULL),(592,3,2,75,'I','I','I','I','I',NULL,NULL),(593,3,2,76,'I','I','I','I','I',NULL,NULL),(594,3,2,77,'I','I','I','I','I',NULL,NULL),(595,3,3,78,'I','I','I','I','I',NULL,NULL),(596,3,3,79,'I','I','I','I','I',NULL,NULL),(597,3,3,80,'I','I','I','I','I',NULL,NULL),(598,3,3,81,'I','I','I','I','I',NULL,NULL),(599,3,3,82,'I','I','I','I','I',NULL,NULL),(600,3,3,83,'I','I','I','I','I',NULL,NULL),(601,3,3,84,'I','I','I','I','I',NULL,NULL),(602,3,3,85,'I','I','I','I','I',NULL,NULL),(603,3,3,86,'I','I','I','I','I',NULL,NULL),(604,3,3,87,'I','I','I','I','I',NULL,NULL),(605,3,3,88,'I','I','I','I','I',NULL,NULL),(606,3,3,89,'I','I','I','I','I',NULL,NULL),(607,3,3,90,'I','I','I','I','I',NULL,NULL),(608,3,3,91,'I','I','I','I','I',NULL,NULL),(609,3,3,92,'I','I','I','I','I',NULL,NULL),(610,3,3,93,'I','I','I','I','I',NULL,NULL),(611,3,3,94,'I','I','I','I','I',NULL,NULL),(612,3,3,95,'I','I','I','I','I',NULL,NULL),(613,3,3,96,'I','I','I','I','I',NULL,NULL),(614,3,3,97,'I','I','I','I','I',NULL,NULL),(615,3,3,98,'I','I','I','I','I',NULL,NULL),(616,3,3,99,'I','I','I','I','I',NULL,NULL),(617,3,3,100,'I','I','I','I','I',NULL,NULL),(618,3,3,101,'I','I','I','I','I',NULL,NULL),(619,3,3,102,'I','I','I','I','I',NULL,NULL),(620,3,3,103,'I','I','I','I','I',NULL,NULL),(621,3,3,104,'I','I','I','I','I',NULL,NULL),(622,3,3,105,'I','I','I','I','I',NULL,NULL),(623,3,3,106,'I','I','I','I','I',NULL,NULL),(624,3,3,107,'I','I','I','I','I',NULL,NULL),(625,3,3,108,'I','I','I','I','I',NULL,NULL),(626,3,3,109,'I','I','I','I','I',NULL,NULL),(627,3,3,110,'I','I','I','I','I',NULL,NULL),(628,3,3,111,'I','I','I','I','I',NULL,NULL),(629,3,3,112,'I','I','I','I','I',NULL,NULL),(630,3,3,113,'I','I','I','I','I',NULL,NULL),(631,3,3,114,'I','I','I','I','I',NULL,NULL),(632,3,3,115,'I','I','I','I','I',NULL,NULL),(633,3,3,116,'I','I','I','I','I',NULL,NULL),(634,3,3,117,'I','I','I','I','I',NULL,NULL),(635,3,3,118,'I','I','I','I','I',NULL,NULL),(636,3,3,119,'I','I','I','I','I',NULL,NULL),(637,3,3,120,'I','I','I','I','I',NULL,NULL),(638,3,3,121,'I','I','I','I','I',NULL,NULL),(639,3,3,122,'I','I','I','I','I',NULL,NULL),(640,3,3,123,'I','I','I','I','I',NULL,NULL),(641,3,3,124,'I','I','I','I','I',NULL,NULL),(642,3,3,125,'I','I','I','I','I',NULL,NULL),(643,3,3,126,'I','I','I','I','I',NULL,NULL),(644,3,3,127,'I','I','I','I','I',NULL,NULL),(645,3,3,128,'I','I','I','I','I',NULL,NULL),(646,3,4,129,'I','I','I','I','I',NULL,NULL),(647,3,4,130,'I','I','I','I','I',NULL,NULL),(648,3,4,131,'I','I','I','I','I',NULL,NULL),(649,3,4,132,'I','I','I','I','I',NULL,NULL),(650,3,4,133,'I','I','I','I','I',NULL,NULL),(651,3,4,134,'I','I','I','I','I',NULL,NULL),(652,3,4,135,'I','I','I','I','I',NULL,NULL),(653,3,4,136,'I','I','I','I','I',NULL,NULL),(654,3,4,137,'I','I','I','I','I',NULL,NULL),(655,3,4,138,'I','I','I','I','I',NULL,NULL),(656,3,4,139,'I','I','I','I','I',NULL,NULL),(657,3,4,140,'I','I','I','I','I',NULL,NULL),(658,3,4,141,'I','I','I','I','I',NULL,NULL),(659,3,4,142,'I','I','I','I','I',NULL,NULL),(660,3,4,143,'I','I','I','I','I',NULL,NULL),(661,3,4,144,'I','I','I','I','I',NULL,NULL),(662,3,4,145,'I','I','I','I','I',NULL,NULL),(663,3,4,146,'I','I','I','I','I',NULL,NULL),(664,3,4,147,'I','I','I','I','I',NULL,NULL),(665,3,6,148,'I','I','I','I','I',NULL,NULL),(666,3,6,149,'I','I','I','I','I',NULL,NULL);
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activities_directorio`
--

DROP TABLE IF EXISTS `activities_directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `activities_directorio` (
  `id_directorio` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `num_id` varchar(200) CHARACTER SET latin1 NOT NULL,
  `directorio_nombres` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado_directorio` varchar(1) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_directorio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities_directorio`
--

LOCK TABLES `activities_directorio` WRITE;
/*!40000 ALTER TABLE `activities_directorio` DISABLE KEYS */;
INSERT INTO `activities_directorio` VALUES (1,1,'00001','ATLANTIC MANUFACTURING','2019-06-25 14:53:49',NULL,NULL,'A'),(2,1,'00030','GE HEALTHCARE','2019-06-25 14:53:49',NULL,NULL,'A'),(3,1,'00066','AVERY DENISSON','2019-06-25 14:53:49',NULL,NULL,'A');
/*!40000 ALTER TABLE `activities_directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activities_tipos_asientos`
--

DROP TABLE IF EXISTS `activities_tipos_asientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `activities_tipos_asientos` (
  `id_tipo_a` int(11) NOT NULL AUTO_INCREMENT,
  `tp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nombre_asiento` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_tipo_a`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities_tipos_asientos`
--

LOCK TABLES `activities_tipos_asientos` WRITE;
/*!40000 ALTER TABLE `activities_tipos_asientos` DISABLE KEYS */;
INSERT INTO `activities_tipos_asientos` VALUES (1,'CC','COMPRAS'),(2,'D1','NC COMPRAS'),(3,'D2','ND COMPRAS'),(4,'DI','DIARIO'),(5,'DP','DEPOSITO BANCO'),(6,'EG','EGRESO'),(7,'IG','INGRESO'),(8,'LQ',''),(9,'NC','NOTA DE CREDITO BANCO'),(10,'ND','NOTA DEBITO BANCO'),(11,'PA','PROVISION ACCRUAL');
/*!40000 ALTER TABLE `activities_tipos_asientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_pass`
--

DROP TABLE IF EXISTS `bitacora_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bitacora_pass` (
  `id_bit` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pss` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_pass`
--

LOCK TABLES `bitacora_pass` WRITE;
/*!40000 ALTER TABLE `bitacora_pass` DISABLE KEYS */;
INSERT INTO `bitacora_pass` VALUES (1,1,1,'$cambio2015$','2019-06-10 10:15:15','2019-06-10 00:00:00','2019-06-10 00:00:00');
/*!40000 ALTER TABLE `bitacora_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_provincia` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_moodificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `observacion` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_provincia` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'GUAYAQUIL','1','2019-06-04 00:00:00',NULL,NULL,'A',NULL);
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_business_date`
--

DROP TABLE IF EXISTS `company_business_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `company_business_date` (
  `id_business` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `since` date DEFAULT NULL,
  `util` date DEFAULT NULL,
  PRIMARY KEY (`id_business`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_business_date`
--

LOCK TABLES `company_business_date` WRITE;
/*!40000 ALTER TABLE `company_business_date` DISABLE KEYS */;
INSERT INTO `company_business_date` VALUES (1,'Accounting','2019-04-02','2019-06-30'),(2,'Banks','2020-12-10','2019-06-30'),(3,'Operations','2019-02-14','2019-06-20');
/*!40000 ALTER TABLE `company_business_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `name_access` varchar(100) NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'Accounting'),(2,'Banks'),(3,'Operations'),(4,'Administrative Expenses'),(5,'Financial Planning'),(6,'Prospect');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dasbal`
--

DROP TABLE IF EXISTS `dasbal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dasbal` (
  `id_dasbal` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIVO` varchar(20) DEFAULT NULL,
  `PASIVO` varchar(20) DEFAULT NULL,
  `CAPITAL` varchar(20) DEFAULT NULL,
  `INGRESOS` varchar(20) DEFAULT NULL,
  `EGRESOS` varchar(20) DEFAULT NULL,
  `ORD_ACTIVO` varchar(20) DEFAULT NULL,
  `ORD_PASIVO` varchar(20) DEFAULT NULL,
  `RESULTADOD` varchar(20) DEFAULT NULL,
  `RESULTADOA` varchar(20) DEFAULT NULL,
  `ACUMULADOD` varchar(20) DEFAULT NULL,
  `ACUMULADOA` varchar(20) DEFAULT NULL,
  `INVENTARIO` varchar(20) DEFAULT NULL,
  `IVA_COMPRA` varchar(20) DEFAULT NULL,
  `IVA_C_SER` varchar(20) DEFAULT NULL,
  `DES_COMPRA` varchar(20) DEFAULT NULL,
  `CTO_VENTA` varchar(20) DEFAULT NULL,
  `VENTAS` varchar(20) DEFAULT NULL,
  `IVA_VENTA` varchar(20) DEFAULT NULL,
  `IVA_VENTA2` varchar(20) DEFAULT NULL,
  `DES_VENTA` varchar(20) DEFAULT NULL,
  `TRANSPOR` varchar(20) DEFAULT NULL,
  `TRANSPORVE` varchar(20) DEFAULT NULL,
  `INTER_POR` varchar(20) DEFAULT NULL,
  `CTAICE` varchar(20) DEFAULT NULL,
  `CXP` varchar(20) DEFAULT NULL,
  `CXC` varchar(20) DEFAULT NULL,
  `U_INVGEN` bit(1) DEFAULT NULL,
  `U_COSGEN` bit(1) DEFAULT NULL,
  `U_VENGEN` bit(1) DEFAULT NULL,
  `U_CXPGEN` bit(1) DEFAULT NULL,
  `U_CXCGEN` bit(1) DEFAULT NULL,
  `U_IVAGEN` bit(1) DEFAULT NULL,
  `CIERRECON` date DEFAULT NULL,
  `CIERRECON2` date DEFAULT NULL,
  `CIERREINV` date DEFAULT NULL,
  `CIERREINV2` date DEFAULT NULL,
  `CIERREBAN` date DEFAULT NULL,
  `CIERREBAN2` date DEFAULT NULL,
  `CIERRECAR` date DEFAULT NULL,
  `CIERRECAR2` date DEFAULT NULL,
  `CIERREPTO` date DEFAULT NULL,
  `CIERREPTO2` date DEFAULT NULL,
  `TIPOCOSTO` varchar(3) DEFAULT NULL,
  `MULTIBODEG` tinyint(1) DEFAULT NULL,
  `NO_RETE` int(11) DEFAULT NULL,
  `SERIE_INI` varchar(3) DEFAULT NULL,
  `SERIE_FIN` varchar(3) DEFAULT NULL,
  `NO_RETE_AU` int(11) DEFAULT NULL,
  `DESDE_RET` int(11) DEFAULT NULL,
  `HASTA_RET` int(11) DEFAULT NULL,
  `CONVENTAS` tinyint(1) DEFAULT NULL,
  `NO_AUT_FAC` int(11) DEFAULT NULL,
  `SER_FAC_I` varchar(3) DEFAULT NULL,
  `SER_FAC_F` varchar(3) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `NO_RETE_SE` int(11) DEFAULT NULL,
  `IVA_IMPORT` varchar(20) DEFAULT NULL,
  `PRODUCCION` varchar(20) DEFAULT NULL,
  `CONTROLCON` int(11) DEFAULT NULL,
  `ANTIPROVEE` varchar(20) DEFAULT NULL,
  `SUSTENTO` varchar(2) DEFAULT NULL,
  `ANTICLIE` varchar(20) DEFAULT NULL,
  `MANEJODB` varchar(20) DEFAULT NULL,
  `MANEJOCR` varchar(20) DEFAULT NULL,
  `MANEJOPOR` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_dasbal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dasbal`
--

LOCK TABLES `dasbal` WRITE;
/*!40000 ALTER TABLE `dasbal` DISABLE KEYS */;
INSERT INTO `dasbal` VALUES (1,'1.','2.','3.','4.','5.','','','3.8','3.8','3.8','3.8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1.01.02','1.01.02','1.01.02');
/*!40000 ALTER TABLE `dasbal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dp01a110`
--

DROP TABLE IF EXISTS `dp01a110`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dp01a110` (
  `CODIGO` varchar(20) NOT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `CODIGO_AUX` varchar(20) DEFAULT '',
  `CODIGO_MAY` varchar(20) DEFAULT '""',
  `PLANMARCA` bit(1) DEFAULT NULL,
  `CODTIPCTA` int(3) DEFAULT NULL,
  `CTADES` text,
  `CTAINACTIVA` bit(1) DEFAULT NULL,
  `TIENEMOV` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dp01a110`
--

LOCK TABLES `dp01a110` WRITE;
/*!40000 ALTER TABLE `dp01a110` DISABLE KEYS */;
INSERT INTO `dp01a110` VALUES ('1.','ASSETS','1','\"\"',_binary '\0',3,'',_binary '\0',NULL),('1.01.','AVAILABLE FUNDS','101','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.01','Pretty Cash','10101','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.','BANKS AND FINANCIAL INSTITUTIONS','10103','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.','LOCAL BANKS','1010350','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.0101','Bank Of America 1709','10103500101','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0102','Bank Of America 3874','10103500102','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0103','CashPro Bank of America','10103500103','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0104','Well Fargo Tcg Capital','10103500104','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0105','Citibank','10103500105','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0106','Morgan Stanley','10103500106','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0108','T D Bank','10103500108','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.','PNC BANK','10103500200','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.0200.01','Pnc Acf-t Solutions 6282','1010350020001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.02','Pnc Acf V 4756','1010350020002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.03','Pnc Tcg Capital 7471','1010350020003','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.04','Chase Bank - Trust','1010350020004','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.05','Pnc Acf IV 3277','1010350020005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.06','Pnc Acf V Money Market  5142','1010350020006','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0200.07','Pnc Acf-t Solutions 5468','1010350020007','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0300.','BANK UNITED','10103500300','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.0300.01','Acf Iv 7115','1010350030001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0300.02','Acf Iv 3927','1010350030002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0300.03','Acft 9261','1010350030003','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0400.','EASTERN NATIONAL BANK','10103500400','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.0400.01','Acft 3307','1010350040001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0500.','CITY NATIONAL BANK','10103500500','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.03.50.0500.01','Acft 4958','1010350050001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.03.50.0500.02','Acf Iv 5381','1010350050002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.04.','TRUST ACCOUNTS','10104','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.04.01','Tcg Sole Trust Mexico 1 Chase Bank Acc','1010401','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.04.02','Tcg Multi-trust 1','1010402','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.06.','INTERNAL ACCOUNT','10106','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.01.06.001','Internal Intransit Account','10106001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.01.06.005','Funds To Be Deposited','10106005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.','INVESTMENTS','103','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.03.01','Investment Madmarketing','10301','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.02','Investment Hernol','10302','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.03','Investment T C G Infrastructure','10303','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.04','Investment T C G Capital Panama','10304','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.05','Investment Superfoods','10305','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.06','Treasury Bills','10306','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.07','Bonds','10307','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.08','Promisory Note Adquisition','10308','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.09','Mortgage-backed Securities','10309','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.10','Stock Investment','10310','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.11','Investment Acf Iv','10311','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.15.','A / R INVESTMENT','10315','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.03.15.01','Acf V','1031501','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.03.15.02','Participation Agreement Certificate','1031502','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.','LOAN Portfolio','104','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.','CURRENT LOANS','10401','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.05.','FACTORING LINE OF CREDIT','1040105','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.05.0101','Factoring Receivable','10401050101','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.05.0105','A / R Financing','10401050105','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.05.0110','Reverse Factoring','10401050110','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.05.0115','P O Financing Receivable','10401050115','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.10.','PROMISSORY NOTE PURCHASED','1040110','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.10.01','Promissory Note','104011001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.55.','WORKING CAPITAL LOANS','1040155','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.55.02','Asset Base Lending','104015502','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.55.05','Working Capital Loans Receivable','104015505','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.60.','CONSUMER LOAN','1040160','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.60.05','Consumer Loan Receivable','104016005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.70.','LOAN AMORTIZATION','1040170','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.01.70.05','Loan Amortization Receivable','104017005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.90','Others Loans','1040190','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.01.91','Loan Management Receivables','1040191','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.','PAST DUE LOANS','10402','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.02.01.','PAST DUE LOANS','1040201','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.02.01.001','Factoring Receivable','1040201001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.01.003','A / R Financing','1040201003','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.01.005','Reverse Factoring','1040201005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.01.010','P O Financing Receivable','1040201010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.20.','WORKING CAPITAL LOAN','1040220','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.02.20.001','Working Capital Loan','1040220001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.20.002','Asset Base Lending','1040220002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.30.','CONSUMER LOAN','1040230','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.02.30.001','Consumer Loan Receivable','1040230001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.04.02.35.','LOAN AMORTIZATION','1040235','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.04.02.35.001','Loan Amort. Receivable','1040235001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.','OTHER ACCOUNTS RECEIVABLE','106','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.06.00','Acf-t Solutions Llc','10600','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.001','The Cannaregio Group Llc','106001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0010','Tcg Infrastructure, Llc','1060010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0011','Juan Carlos Zurita','1060011','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0012','Bsk Usa, Llc','1060012','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0013','Acf Iv','1060013','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0014','Acf Inter.','1060014','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0015','Ss Consulting Usa Llc','1060015','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0016','American Capital Group - Panama','1060016','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0018','Oyambaro Llc','1060018','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0019','First Factoring','1060019','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.002','Hernol S.a.','106002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.0020','Amex Por Cobrar Relacionadas','1060020','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.003','Nerium Capital Llc','106003','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.004','Key Plus Consulting','106004','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.005','Solu Capital','106005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.006','Tcg Capital','106006','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.007','Acf V Us Trade','106007','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.008','Anthony Jarrin','106008','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.009','Tcg Capital Global Opportunistic Llc','106009','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.01','A C F T','10601','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.010','Diler De Honduras S. De R.l','106010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.011','Real Construction Of Stamping','106011','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.012','Mercantil Exportadora Rochnos - Delta','106012','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.02','A C F Factoring','10602','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.020','Other Accounts Receivable','106020','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.03.','ADVANCE MANAGEMENT FEES','10603','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.06.03.01','Acf - T','1060301','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.03.02','Tcg Capital','1060302','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.04','Atlantic / R M P','10604','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.05','Employee Advances','10605','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.10','Post Dated Checks','10610','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.15','Non-sufficient Funds Check','10615','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.16','Interest Receivable','10616','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.17','Marketing Fees Receivable','10617','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.20','Other Accounts To Collect','10620','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.25','Income To Be Collected','10625','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.40.','ADVANCE LEGAL FEES','10640','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.06.40.01','Advance Legal Fees','1064001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.06.50.','ALLLOWANCE FOR DOUBTFUL ACCOUNTS','10650','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.06.50.001','Allowance For Uncollectible Accounts','10650001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.07.','REPOSSESSED ASSETS','107','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.07.03.','REPOSSESSED INVENTORY','10703','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.07.03.001','Goods','10703001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.07.03.005','Raw Materials','10703005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.07.03.010','Equipment','10703010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.07.05.','REPOSSESSED PROPERTY','10705','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.07.05.001','Land','10705001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.07.05.005','Building','10705005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.','PROPERTY, PLANT AND EQUIPMENT','108','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.08.05.','FURNITURES AND EQUIPMENT','10805','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.08.05.001','Computer Servers','10805001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.05.002','Equipment','10805002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.05.005','Laptops','10805005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.05.010','Furniture','10805010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.05.015','Computer Equipments','10805015','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.10.','INTANGIBLE ASSETS','10810','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.08.10.001','Goodwill','10810001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.10.005','Patents','10810005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.10.010','Copyrights','10810010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.10.015','Computer Programs / Software','10810015','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.40.','AMORTIZATION FOR INTANGIBLES','10840','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.08.40.001','Accumulated Amortization','10840001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.08.50.','DEPRECIATION','10850','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.08.50.001','Accumulated Depreciation','10850001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.','OTHER CURRENT ASSETS','109','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.09.001','Shareholder Loans','109001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.01.','PREPAIDS','10901','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.09.01.001','Insurance','10901001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.01.005','Credit Insurance','10901005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.01.010','Other Preaid Items','10901010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.01.011','Prepaid Dividens','10901011','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.01.012','Prepaid Interest','10901012','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.','PARTICIPATIONS IN SubSidiary','10902','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.09.02.001','American Capital Dev Fund','10902001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.005','American Capital Assets Management','10902005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.010','American Capital Dev Management','10902010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.015','A C  F Advisors L L C','10902015','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.020','A C F  Factoring L L C','10902020','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.023','A C F Factoring I I    L L C','10902023','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.025','S P V Cala Telecom','10902025','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.02.030','Americap Property Manag.','10902030','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.','ACCRUED INCOME TO BE COLLECTED','10904','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.09.04.001','Factoring Late Fees','10904001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.002','Promissory Note Late Fees','10904002','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.005','Purchase Order Interest','10904005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.010','Purchase Order Late Fees','10904010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.015','O A C Interest','10904015','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.020','O A C Late Fees','10904020','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.025','Loan Amortization','10904025','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.030','Working Capital Loan Income','10904030','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.031','Management Fees To Be Collect','10904031','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.035','A / R Financing Interest And Late Fees','10904035','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.040','Investment Other','10904040','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.045','Intransit','10904045','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.09.04.048','Net Adjustment','10904048','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.','OTHER ASSETS','110','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.10.001','Harding Florida Properties, Llc','110001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.005','A C F T','110005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.005.','SECURITY DEPOSITS','110005','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.10.005.001','Deposit','110005001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.005.005','Professional Fees Retainers','110005005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.005.008','Prepaid Expenses','110005008','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.010.','CREDIT TO EMPLOYEES','110010','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('1.10.010.001','Juan Carlos Zurita','110010001','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.010.005','Rodrigo Lopez','110010005','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.010.010','German Morales','110010010','\"\"',_binary '',NULL,NULL,NULL,NULL),('1.10.010.015','Karen Coletti','110010015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.','LIABILITIES','2','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.1.','CURRENT LIABILITIES','21','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.1.001.','ACCOUNTS PAYABLE','21001','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.1.001.000','Intransit To Be Debit','21001000','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.001','Salaries Payable','21001001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.002','1099','21001002','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.003','Employee Federal Withholding Tax','21001003','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.004','Employee Social Security','21001004','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.005','Payroll Taxes Payable','21001005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.006','Dividends','21001006','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.010','Bonus Payable','21001010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.015','Rent Payable','21001015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.016','American Express','21001016','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.020','Audit Fees Payable','21001020','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.021','Interest Payable','21001021','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.022','Acf V Us Trade Receivables,llc','21001022','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.024','Participation Loans','21001024','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.025','Loan Payable','21001025','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.030','Accounting Fees Payable','21001030','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.001.6','Employee Medicare','210016','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.','ACCOUNT','21005','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.1.005.001','A C F Factoring Interest','21005001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.002','A C F Group U S, Corp','21005002','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.005','A C F Factoring Mkt Fees','21005005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.010','A C F Factoring I I Interest','21005010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.015','A C F Factoring I I Mkt Fees','21005015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.016','Solucapital Llc','21005016','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.020','Other Payable','21005020','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.025','Marketing Fees Payable','21005025','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.1.005.030','Interest Payable','21005030','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.','OTHER CURRENT LIABILITIES','22','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.001.','OPERATIONS RESERVES','22001','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.001.001','Factoring Reserve','22001001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.001.025','Accounts Receivable Fin. Reserve','22001025','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.001.030','P O Fin. Reserve','22001030','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.001.035','A / R Fin. Reserve','22001035','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.001.040','Non-factored Invoices','22001040','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.001.045','Rmp Capital','22001045','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.002.','PAST DUE ACCOUNTS PAYABLE','22002','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.002.001','Obligations Due Immediately','22002001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.','INTEREST AND FEES PAYABLE','22005','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.005.001','Interest Loan Payable','22005001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.005','Interest Loan Amortization E U R','22005005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.008.','REVENUE FEES','22005008','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.005.008.01','Acf-t Solutions','2200500801','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.008.02','Tcg Capital','2200500802','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.009.','MANAGEMENT FEES PAYABLE','22005009','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.2.005.009.01','Acf Trading','2200500901','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.009.02','Acf Iv Llc','2200500902','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.010','Mkt Fees Payable U S D Loans','22005010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.2.005.015','Mkt Fees Payable E U R Loans','22005015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.','OTHER LIABILITIES','24','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.4.001','Unearned Revenue','24001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.002','A C F Factoring I I','24002','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.003','Acf Factoring Llc','24003','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.004','A C F I V','24004','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.005','Atlantic Manufacturing','24005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.006','American Capital Financial Trading','24006','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.007','Acf -t  Solutions','24007','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.008','Acf V','24008','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.009','Tcg Capital Llc','24009','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.010','Intransit Internal Retention','24010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.012','G E Healthcare','24012','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.013','Perfection Atlantic Manufacturing','24013','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.014','Atradius Payable','24014','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.015','Operations To Be Disbursed','24015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.016','R M P Capital','24016','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.017','Reserve To Be Return','24017','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.020','American C Dev. Fund','24020','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.021','Juan Carlos Zurita','24021','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.025','Income Taxes Payable','24025','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.4.028','Other Payable','24028','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.6.','OTHER FINANCIAL OBLIGATIONS','26','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.6.001','Corporate Taxes Payable','26001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.','LONG TERM LIABILITIES','27','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.7.001.','ARGYLE S P C','27001','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.7.001.001','Intransit','27001001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.001.005','Loan Payable Usd','27001005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.001.010','Loan Payable Eur','27001010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.001.013','Remeasurement Foreign Currency','27001013','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.001.015','Other Loan Payable','27001015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.001.016','Note Payable Allfactor','27001016','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.002.','ACF FACTORING II LLC','27002','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.7.002.001','Iintransit','27002001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.002.005','Loan Payable Usd','27002005','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.002.010','Loan Payable Eur','27002010','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.002.015','Remeasurement Foreign Currency','27002015','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.002.020','Gaylord Investments','27002020','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.005.','OTHER LONG TERM LIABILITIES','27005','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.7.005.001','Note Payable Allfactor','27005001','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.7.005.002','Loan Payable','27005002','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.9.05.','SUBSIDIARY BUSINESS','2905','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.9.05.01','SUBSIDIARY BUSINESSES Obligations','290501','\"\"',_binary '',NULL,NULL,NULL,NULL),('2.9.90.','OTHERS ACCOUNTS TO PAY','2990','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('2.9.90.001','Accts Payable Other','2990001','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.','SHAREHOLDER\'S EQUITY','3','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('3.1','Additional Capital','31','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.2','Dividends','32','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.3','Capital Stock','33','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.4','Capital Reserve','34','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.5','Paid-in-capital','35','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.6','Retained Earnings','36','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.7','Accumulated Distributions','37','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.8','Net Income','38','\"\"',_binary '',NULL,NULL,NULL,NULL),('3.9','Opening Balance Equity','39','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.','INCOME','4','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('4.01.','EARNED COMMISSIONS','401','\"\"',_binary '\0',9,'',_binary '\0',NULL),('4.01.001','Factoring Comm','401001','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.005','Factoring Comm. Other','401005','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.010','P O Commision','401010','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.015','P O Comm Other','401015','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.020','Arf Commission','401020','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.025','Arf Comm. Other','401025','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.026','Reverse Factoring Comm','401026','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.027','Reverse Fact. Others','401027','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.030','Working Capital Loan Commission','401030','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.035','B / L Comm. Other','401035','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.040','Loan Amort. Commission','401040','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.045','Loan Amort. Comm. Other','401045','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.050','Consumer Loan Commission','401050','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.055','Consumer Loan Comm. Other','401055','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.060','Promisory Note Adquisition Comm.','401060','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.01.061','Abl Commission','401061','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.','INTEREST INCOME','402','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('4.02.001','Factoring Late Fees','402001','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.002','Factoring Interest','402002','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.005','Factoring  Other Income','402005','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.010','P O Interest','402010','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.015','P O Late Fees','402015','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.020','O A C Interest','402020','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.025','O A C Late Fees','402025','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.027','Reverse Fact. Late Fees','402027','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.030','Reverse Factoring  Interest','402030','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.031','Abl Interest','402031','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.032','Working Capital Loan  Interest','402032','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.035','Working Capital Loan Late Fees','402035','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.036','Arf Interest','402036','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.040','Loan Amort. Interest','402040','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.045','Loan Amort. Other','402045','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.050','Consumer Loan Interest','402050','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.055','Consumer Loan Other','402055','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.060','A / R Financing Interest','402060','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.065','Late Fees Income','402065','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.066','Promissory Note Other Income','402066','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.067','Promissory Note Late Fees','402067','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.02.068','Participation Certificate Interest','402068','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.04.','SERVICES INCOME','404','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('4.04.001','Advisory Income','404001','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.04.005','Consulting Income','404005','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.04.006','Managements Fees','404006','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.04.010','Other Services Income','404010','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.06.','OTHER INCOME','406','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('4.06.001','Credit Insurance Income','406001','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.06.005','Wire Fees Income','406005','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.06.008','Facility Fees','406008','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.06.010','Due Diligence','406010','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.06.015','Net Adjustment','406015','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.7.','OTHER GAINS AND LOSSES','47','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('4.7.001','Dividend Income','47001','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.7.005','Gain / Loss On Investments','47005','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.7.010','Unrealized Gain / Loss Foreign Currency','47010','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.7.015','Unrealized Gain / Loss Purchase Commitme','47015','\"\"',_binary '',NULL,NULL,NULL,NULL),('4.7.020','Other Gain And Losses','47020','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.','EXPENSES','5','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.1.','INTEREST EXPENSE','51','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.1.02.','EXP. PAID TO OTHER FIN. INSTITUTION','5102','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.1.02.001','E U R Loan Interest Expense','5102001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.003','E U R Mkt Commission Expense','5102003','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.005','U S D Mkt Commission Expense','5102005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.010','U S D Loan Interest Expense','5102010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.015','Credit Insurance','5102015','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.020','Letter Of Credit','5102020','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.02.021','Commission And Fees Paid','5102021','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.10.','PRIVATE INVESTORS','5110','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.1.10.001','Loan Interest Expense','5110001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.10.002','Management Fees','5110002','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.10.003','Revenue Fees','5110003','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.10.004','Loan Late Fees Expense','5110004','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.1.10.005','Participant Interest Expense','5110005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.10.','COMMISSION PAID','510','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.10.01','Commission And Fees Paid','51001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.2.','BANK SERVICE CHARGES','52','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.2.001','Wire Fees','52001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.2.002','International Bank Fee','52002','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.2.005','Monthly Bank Service Charges','52005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.2.006','Monthly Bank Service Charges Other Analy','52006','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.3.','PERSONNEL EXPENSES','53','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.3.001','Salary Expense','53001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.3.005','Payroll Taxes','53005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.3.006','Payroll Fee','53006','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.3.010','Bonus Expense','53010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.','OPERATIONS EXPENSE','54','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.01.','OFFICE EXPENSE','5401','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.01.001','Rent Expense','5401001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.002','Security Deposit','5401002','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.005','Telephone','5401005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.006','Inrternet Expense','5401006','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.010','Alarm','5401010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.015','Credit Report','5401015','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.020','Office Supplies','5401020','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.025','Office Equipment','5401025','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.030','Computer Expense','5401030','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.035','Postage And Delivery','5401035','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.040','Health Insurance','5401040','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.041','Credit Insurance','5401041','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.045','Office Expense Other','5401045','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.05.','UTILITIES EXPENSE','540105','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.01.05.001','Water','540105001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.05.005','Power F P L','540105005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.01.05.010','Other Utilities','540105010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.02.','TAXES','5402','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.02.001','Corporate Taxes','5402001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.03.','MARKETING & ADVERSEMENT','5403','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.03.001','Newspaper','5403001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.03.0015','Brochures','54030015','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.03.005','Radio','5403005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.03.010','Other Advertisement','5403010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.03.020','Direct Mail','5403020','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.','PROFESSIONAL SERVICES','5404','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.04.01.','ACCOUNTING','540401','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.04.01.001','Audit Fees','540401001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.01.005','Tax Preparation','540401005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.01.006','Professional Fees - Other','540401006','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.03.','COMPUTERS','540403','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.04.03.001','Computer Systems Maintenance','540403001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.05.','LEGAL FEES','540405','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.4.04.05.0001','Consulting','5404050001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.05.0005','Legal Expense','5404050005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.05.0010','Licenses And Subscriptions','5404050010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.4.04.05.0015','Other Legal Fees','5404050015','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.','ALLOWANCES, DEPRECIATION AND AMORT.','55','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.01.','ALLOWANCES','5501','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.01.05.','INVESTMENT','550105','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.01.05.001','Allowances For Uncollectible Invest.','550105001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.01.10.','ACCOUNTS RECEIVABLE','550110','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.01.10.001','Bad Debt Expense','550110001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.01.10.005','Uncollectable Accounts','550110005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.02.','DEPRECIATION','5502','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.02.101','Deprec.- Building','5502101','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.02.20.','FURNITURE AND EQUIPMENT','550220','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.02.20.001','Depreciation Office Furniture','550220001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.02.20.005','Depreciation Computer Equipment','550220005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.02.20.010','Other Depreciable Asset','550220010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.03.','AMORTIZATION','5503','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.03.001','Amortization Computer Programs','5503001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.03.002','Amort. Goodwill','5503002','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.5.04.','INVESTMENT IN SUBSIDIARY','5504','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.5.04.001','Investment In Subsidiary','5504001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.','BUSINESS TRAVEL & VIATICOS','56','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.6.01.','BUSINESS TRIPS','5601','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.6.01.001','Hotels','5601001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.01.005','Airplane Tickets','5601005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.01.008','Meals And Entertainment','5601008','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.01.010','Transportation','5601010','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.02.','VIATICOS','5602','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.6.02.001','Viaticos Per Diem','5602001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.6.02.005','Other Viatico Expense','5602005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.7.','OTHER EXPENSES','57','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.7.001','R M P','57001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.7.005','Administration Expense','57005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.7.007','Other Expense','57007','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.7.008','Broker Commission','57008','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.8.','COURSES & TRAINING','58','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.8.001','Training & Certifications','58001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.8.005','Memberships And Subscriptions','58005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.','AUTOMOBILE EXPENSE','59','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('5.9.001','Sunpass','59001','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.002','Parking','59002','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.003','Transportation Service','59003','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.005','Gas','59005','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.006','Car Leasing','59006','\"\"',_binary '',NULL,NULL,NULL,NULL),('5.9.007','Car Insurance','59007','\"\"',_binary '',NULL,NULL,NULL,NULL),('6.','UNREALIZED GAIN / LOSS','6','\"\"',_binary '\0',NULL,NULL,NULL,NULL),('6.001','Remeasurement Long Term Liability','6001','\"\"',_binary '',NULL,NULL,NULL,NULL),('6.005','Fx Gain Or Loss','6005','\"\"',_binary '',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `dp01a110` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dp02a110`
--

DROP TABLE IF EXISTS `dp02a110`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dp02a110` (
  `CODIGOBCO` varchar(4) DEFAULT NULL,
  `CODMOV` varchar(20) DEFAULT NULL,
  `NOMBREBCO` varchar(50) DEFAULT NULL,
  `CUENTANO` varchar(20) DEFAULT NULL,
  `CHEQUE` bit(1) DEFAULT NULL,
  `NUMEROCH` int(10) DEFAULT NULL,
  `TIPO_MON` varchar(3) DEFAULT NULL,
  `TIPO_CTA` varchar(20) DEFAULT NULL,
  `FORMATOCH` varchar(20) DEFAULT NULL,
  `TIPOEGRESO` varchar(4) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dp02a110`
--

LOCK TABLES `dp02a110` WRITE;
/*!40000 ALTER TABLE `dp02a110` DISABLE KEYS */;
INSERT INTO `dp02a110` VALUES ('B01','1.01.03.50.0300.01','BU 7115',NULL,_binary '',273,'DOL',NULL,NULL,NULL,'I'),('BO2','1.01.03.50.0300.02','BU 3927',NULL,_binary '',1,'DOL',NULL,NULL,NULL,'I'),('C01','1.01.03.50.0500.01','Acft 4958','4958',_binary '',0,'DOL','CORRIENTE',NULL,NULL,'A'),('C02','1.01.03.50.0500.02','Acf Iv 5381','2538',_binary '',6,'DOL','CORRIENTE',NULL,NULL,'A'),('E01','1.01.03.50.0400.01','Acft 3307','3307',_binary '',0,'DOL','CORRIENTE',NULL,NULL,'A'),('IT1','2.1.001.000','INTRANSIT',NULL,_binary '\0',0,NULL,NULL,NULL,NULL,'A');
/*!40000 ALTER TABLE `dp02a110` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpcabtra`
--

DROP TABLE IF EXISTS `dpcabtra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dpcabtra` (
  `TIPO_ASI` varchar(4) DEFAULT NULL,
  `ASIENTO` varchar(8) DEFAULT NULL,
  `FECHA_ASI` date DEFAULT NULL,
  `DESC_ASI` varchar(200) DEFAULT NULL,
  `BENEFICIAR` varchar(50) DEFAULT NULL,
  `DEBITOS` decimal(18,2) DEFAULT NULL,
  `CREDITOS` decimal(18,2) DEFAULT NULL,
  `DEBITOS_E` decimal(18,2) DEFAULT NULL,
  `CREDITOS_E` decimal(18,2) DEFAULT NULL,
  `CEDRUC` varchar(13) DEFAULT NULL,
  `FACTOR` decimal(13,3) DEFAULT NULL,
  `TIPO_MON` varchar(3) DEFAULT NULL,
  `CHEQUENO` int(11) DEFAULT NULL,
  `VALOR_CH` decimal(16,2) DEFAULT NULL,
  `FECHA_CH` date DEFAULT NULL,
  `CODBAN` varchar(3) DEFAULT NULL,
  `RETE_NO` varchar(8) DEFAULT NULL,
  `NUMERO_COM` varchar(25) DEFAULT NULL,
  `TIPO_COM` varchar(25) DEFAULT NULL,
  `EJER_FIS` varchar(8) DEFAULT NULL,
  `USER_ID` varchar(2) DEFAULT NULL,
  `FECHASYS` date DEFAULT NULL,
  `HORASYS` varchar(8) DEFAULT NULL,
  `CERRADO` bit(1) DEFAULT b'0',
  `ANULADO` bit(1) DEFAULT b'0',
  `FECHAANU` date DEFAULT NULL,
  `HORAANU` varchar(10) DEFAULT NULL,
  `USUANU` varchar(2) DEFAULT NULL,
  `GES_APL` varchar(3) CHARACTER SET utf16 DEFAULT NULL,
  `DOCUCIE` bit(1) DEFAULT b'0',
  `IDCONT` int(11) NOT NULL DEFAULT '0',
  `account_aux` varchar(20) DEFAULT NULL,
  `account_n_aux` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDCONT`),
  KEY `keycab` (`TIPO_ASI`,`ASIENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpcabtra`
--

LOCK TABLES `dpcabtra` WRITE;
/*!40000 ALTER TABLE `dpcabtra` DISABLE KEYS */;
INSERT INTO `dpcabtra` VALUES (NULL,'1',NULL,NULL,NULL,110.00,0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,_binary '\0',_binary '\0',NULL,NULL,NULL,NULL,_binary '\0',1,'1','');
/*!40000 ALTER TABLE `dpcabtra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpmovimi`
--

DROP TABLE IF EXISTS `dpmovimi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dpmovimi` (
  `TIPO_ASI` varchar(4) DEFAULT NULL,
  `ASIENTO` varchar(8) DEFAULT NULL,
  `FECHA_ASI` date DEFAULT NULL,
  `CODMOV` varchar(20) DEFAULT NULL,
  `CODIGO` varchar(20) DEFAULT NULL,
  `CODID` varchar(13) DEFAULT NULL,
  `TIPO_OPE` varchar(3) DEFAULT NULL,
  `TIPO_BCO` varchar(3) DEFAULT NULL,
  `TIPO_REFE` varchar(25) DEFAULT NULL,
  `TIPO_FCH` date DEFAULT NULL,
  `TIPO_CHNO` varchar(13) DEFAULT NULL,
  `TIPO_RET` varchar(5) DEFAULT NULL,
  `VALBASE` double DEFAULT NULL,
  `NO_RETE` int(11) DEFAULT NULL,
  `PORRET` double DEFAULT NULL,
  `TIPO` varchar(2) DEFAULT NULL,
  `REFER` varchar(10) DEFAULT NULL,
  `CONCEPTO` varchar(200) DEFAULT NULL,
  `IMPORTE` double DEFAULT NULL,
  `IMPORTE_EX` double DEFAULT NULL,
  `CERRADO` bit(1) DEFAULT NULL,
  `GES_APL` varchar(3) DEFAULT NULL,
  `DB` double DEFAULT NULL,
  `CR` double DEFAULT NULL,
  `TIPOPAG` varchar(3) DEFAULT NULL,
  `ORDEN` varchar(1) DEFAULT NULL,
  `SECUENCIAL` int(11) DEFAULT NULL,
  `DOCUMENTO` varchar(20) DEFAULT NULL,
  `PAGONO` varchar(3) DEFAULT NULL,
  `DOCUCIE` bit(1) DEFAULT NULL,
  `GRUPOCON` varchar(2) DEFAULT NULL,
  `CONCILIADA` bit(1) DEFAULT NULL,
  `KEYCON` varchar(6) DEFAULT NULL,
  `CONTROLCON` int(11) DEFAULT NULL,
  `OPERACION` tinyint(1) DEFAULT NULL,
  `CODCIA` varchar(3) DEFAULT NULL,
  `IMPORTE_AN` double DEFAULT NULL,
  `INTEGRADA` bit(1) DEFAULT NULL,
  `FORMAPAGO` varchar(3) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpmovimi`
--

LOCK TABLES `dpmovimi` WRITE;
/*!40000 ALTER TABLE `dpmovimi` DISABLE KEYS */;
INSERT INTO `dpmovimi` VALUES ('PAS','1','2019-07-04','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MEMO PASIVO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I');
/*!40000 ALTER TABLE `dpmovimi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpnumero`
--

DROP TABLE IF EXISTS `dpnumero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dpnumero` (
  `TIPO_ASI` varchar(4) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `ASIENTO` int(8) NOT NULL,
  `IDASI` int(3) NOT NULL,
  `FORMATOCOM` varchar(25) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `ns` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpnumero`
--

LOCK TABLES `dpnumero` WRITE;
/*!40000 ALTER TABLE `dpnumero` DISABLE KEYS */;
INSERT INTO `dpnumero` VALUES ('CC','COMPRAS',3,2,'LAYOUT',NULL,1,'I'),('EGRE','EGRESO',281219,1,'DSJSS',NULL,2,'A'),('PAS','PASIVO',219219,1,'',NULL,3,'A');
/*!40000 ALTER TABLE `dpnumero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(200) DEFAULT NULL,
  `ruc_empresa` varchar(20) DEFAULT NULL,
  `nombre_empresa` varchar(200) NOT NULL,
  `presentacion` varchar(400) DEFAULT NULL,
  `direccion_empresa` varchar(200) DEFAULT NULL,
  `telefono_empresa` varchar(80) DEFAULT NULL,
  `celular` varchar(80) DEFAULT NULL,
  `fax_empresa` varchar(200) DEFAULT NULL,
  `correo_empresa` varchar(200) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `rentas_correo` varchar(200) DEFAULT NULL,
  `rentas_telefono` varchar(30) DEFAULT NULL,
  `rentas_rep_legal` varchar(250) DEFAULT NULL,
  `rentas_fax` varchar(100) DEFAULT NULL,
  `rentas_ruc` varchar(30) DEFAULT NULL,
  `rentas_contador` varchar(200) DEFAULT NULL,
  `rentas_ruc_contador` varchar(30) DEFAULT NULL,
  `rentas_aut_sri` varchar(150) DEFAULT NULL,
  `rentas_tipo_id` varchar(200) DEFAULT NULL,
  `rentas_id` varchar(300) DEFAULT NULL,
  `rentas_logo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Miami','0924826480001','American Capital Factoring LLC','Lema','EEUU','0425258980','09899874152','elfax-00010','tecnosoft@outlook.com',NULL,NULL,NULL,'A',NULL,'rentasorreo','re tel','re legal','re fax','re ruc','re contador','re ru contador','re aut sri','re tipo id','re id','audit2.png'),(2,'Miami','0365969669001','American Capital Financial Trading \r\n Corp',NULL,'EEUU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'audit2.png'),(3,'Miami','0365969664001','American Capital Factoring RT',NULL,'EEUU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Miami','0878245852001','American Capital Factoring LLC IV',NULL,'EEUU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Captura de pantalla (4).png'),(5,'Miami','09321101001112','American Capital Factoring  Trade Receivables LLC',NULL,'EEUU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Miami','0876685852001','American Capital Financial Group LLC',NULL,'EEUU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files_account`
--

DROP TABLE IF EXISTS `files_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `files_account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `cod_account` varchar(100) NOT NULL,
  `name_account` varchar(200) NOT NULL,
  `literal` varchar(200) DEFAULT NULL,
  `concepto` varchar(500) DEFAULT NULL,
  `superma` varchar(1) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modifiacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files_account`
--

LOCK TABLES `files_account` WRITE;
/*!40000 ALTER TABLE `files_account` DISABLE KEYS */;
INSERT INTO `files_account` VALUES (1,1,'1.','ASSETS','','','I','2019-06-25 12:08:36',NULL,NULL),(2,1,'1.01.','AVAILABLE FUNDS','','','A','2019-06-25 12:12:10',NULL,NULL);
/*!40000 ALTER TABLE `files_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files_banks`
--

DROP TABLE IF EXISTS `files_banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `files_banks` (
  `id_banks` int(11) NOT NULL AUTO_INCREMENT,
  `bank_code` varchar(200) CHARACTER SET latin1 NOT NULL,
  `accounting_code` varchar(200) CHARACTER SET latin1 NOT NULL,
  `check_to_date` date NOT NULL,
  `bank_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `account_number` varchar(200) CHARACTER SET latin1 NOT NULL,
  `account_type` varchar(200) CHARACTER SET latin1 NOT NULL,
  `generate_checks` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `last_check` varchar(100) CHARACTER SET latin1 NOT NULL,
  `currency` varchar(200) CHARACTER SET latin1 NOT NULL,
  `format` varchar(200) CHARACTER SET latin1 NOT NULL,
  `type_accounty_entry` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecja_eliminacion` datetime DEFAULT NULL,
  `estado_banks` varchar(1) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_banks`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files_banks`
--

LOCK TABLES `files_banks` WRITE;
/*!40000 ALTER TABLE `files_banks` DISABLE KEYS */;
INSERT INTO `files_banks` VALUES (1,'BAK-001','00019Es','2011-09-15','GUAYAQUILEDEfdsdfsffsd','DJ-REYESEDEsdfsdf','PRECISOEDsdfsfsd',NULL,'SINEDsdfsdf','CONEDsdfsdf','VAREDfdsdf','LASTEsdfsdfsd','2019-07-02 23:06:14',NULL,NULL,'I'),(2,'BANK-0002','00128S332','2016-09-02','AMERICAN BANK','02128192199800','PRESS',NULL,'1','ACTUAL','DAY','','2019-07-03 15:29:04',NULL,NULL,'A'),(3,'BANK-0003','01291-HJS-12S','2019-03-04','GUARANDA','129199','SINCE',NULL,'AYER','SIN CURRENCY','CON FORMATO','NOTHING','2019-07-09 16:40:00',NULL,NULL,'A'),(4,'BANK-0004','SASK7895-663','2010-05-02','SANTA LUCIA','SAS-66','sin tipo',NULL,'el ultimo check','con currency','','','2019-07-09 16:42:57',NULL,NULL,'A');
/*!40000 ALTER TABLE `files_banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files_voucher`
--

DROP TABLE IF EXISTS `files_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `files_voucher` (
  `code` varchar(200) NOT NULL,
  `entry_name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files_voucher`
--

LOCK TABLES `files_voucher` WRITE;
/*!40000 ALTER TABLE `files_voucher` DISABLE KEYS */;
INSERT INTO `files_voucher` VALUES ('DFGHJ-0201','LANDED','201291'),('DS4DSD-232','NAMES','1218');
/*!40000 ALTER TABLE `files_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fimoneda`
--

DROP TABLE IF EXISTS `fimoneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `fimoneda` (
  `IDMON` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_MON` varchar(3) DEFAULT NULL,
  `NOMBREMON` varchar(30) DEFAULT NULL,
  `FACTOR` decimal(22,6) DEFAULT NULL,
  `SIMBOLO` varchar(3) DEFAULT NULL,
  `ESTADOMON` bit(1) DEFAULT NULL,
  `DECIMA` int(4) DEFAULT NULL,
  PRIMARY KEY (`IDMON`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fimoneda`
--

LOCK TABLES `fimoneda` WRITE;
/*!40000 ALTER TABLE `fimoneda` DISABLE KEYS */;
INSERT INTO `fimoneda` VALUES (1,'DOL','AMERICAN DOLLAR',1.000000,'USD',_binary '',2),(2,'EUR','Euros',1.110000,'E/',_binary '',2),(4,'LIB','LIBRA',1.000000,'L/',_binary '',2),(5,'MXN','MEXICAN PESO',19.000000,'MXN',_binary '',6);
/*!40000 ALTER TABLE `fimoneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finacli`
--

DROP TABLE IF EXISTS `finacli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `finacli` (
  `NO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLASIFICA` int(4) DEFAULT NULL,
  `TC` varchar(1) DEFAULT NULL,
  `TID` varchar(3) DEFAULT NULL,
  `CEDRUC` varchar(13) DEFAULT NULL,
  `NOMEMP` varchar(100) DEFAULT NULL,
  `NAMECONTACT` varchar(100) DEFAULT NULL,
  `APELLIDOS` varchar(45) DEFAULT NULL,
  `NOMBRES` varchar(45) DEFAULT NULL,
  `APE_CONY` varchar(45) DEFAULT NULL,
  `NOM_CONY` varchar(45) DEFAULT NULL,
  `APE_CONY2` varchar(45) DEFAULT NULL,
  `CONTAC_T1` varchar(45) DEFAULT NULL,
  `CONTAC_T2` varchar(45) DEFAULT NULL,
  `CED_CONY` varchar(10) DEFAULT NULL,
  `CIUDAD` varchar(80) DEFAULT NULL,
  `STATE` varchar(80) DEFAULT NULL,
  `COUNTRY` varchar(80) DEFAULT NULL,
  `ZIPCODE` varchar(40) DEFAULT NULL,
  `DIRDOM` varchar(200) DEFAULT NULL,
  `DIRCOM` varchar(200) DEFAULT NULL,
  `DIROFI` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `TELEFONO2` varchar(45) DEFAULT NULL,
  `ACTIVIDAD` varchar(3) DEFAULT NULL,
  `PATRIMONIO` varchar(16) DEFAULT NULL,
  `OFICIAL` varchar(3) DEFAULT NULL,
  `REFER1` varchar(30) DEFAULT NULL,
  `REFER2` varchar(30) DEFAULT NULL,
  `REFER3` varchar(30) DEFAULT NULL,
  `TIPOCLI` varchar(3) DEFAULT NULL,
  `TIPOCRE` varchar(3) DEFAULT NULL,
  `FECHACT` date DEFAULT NULL,
  `EMAIL` varchar(55) DEFAULT NULL,
  `EMAIL2` varchar(55) DEFAULT NULL,
  `SSN` varchar(12) DEFAULT NULL,
  `NOLICENCIA` varchar(15) DEFAULT NULL,
  `ACTIVOCLI` varchar(1) DEFAULT NULL,
  `FALTACLI` date DEFAULT NULL,
  `WEBSITE` varchar(40) DEFAULT NULL,
  `TAXID` varchar(30) DEFAULT NULL,
  `CODID` varchar(13) DEFAULT NULL,
  `COUNTRYID` int(4) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`NO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=448 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finacli`
--

LOCK TABLES `finacli` WRITE;
/*!40000 ALTER TABLE `finacli` DISABLE KEYS */;
INSERT INTO `finacli` VALUES (1,1,'1',NULL,NULL,'ATLANTIC MANUFACTURING',NULL,'ATLANTIC MANUFACTURING',NULL,'Diaz','Juan','Fernandez','(809)543-6709','(809)710-7020',NULL,'PUERTO PLATA','Puerto Plata','REPUBLICA DOMINICANA',NULL,'Zona Franca Industrial',NULL,NULL,'(809)970-7062',NULL,'I-M',NULL,'001',NULL,NULL,NULL,'B&D',NULL,NULL,'jdiaz@atlantic.com','gj.atlantic@atlantic.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(2,1,'1',NULL,NULL,'GLOBOTEX /HB ATHLETIC',NULL,'GLOBOTEX /HB ATHLETIC',NULL,'HURVITZ','ROBER',NULL,'(914) 560-8422',NULL,NULL,'FAR ROCKAWAY','NY','UNITED STATES','11691','14-15 REDFERN AVENUE',NULL,NULL,'(914) 560-8422',NULL,'I-M',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(3,1,'1',NULL,'19042459','ELEVEN ELEVEN CORPORATION',NULL,'ELEVEN ELEVEN CORPORATION',NULL,'PORTILLA','ADRIANA',NULL,'787 641-1105',NULL,NULL,'GUAYNABO','PR','PUERTO RICO','00968-8006','CALLE DIANA #28 CENTRO DE DISTRIB. AMELIA',NULL,NULL,'(787) 641-1100',NULL,'I2R',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(4,1,'1',NULL,'208235710','BORICUA IMPORTS',NULL,'BORICUA IMPORTS',NULL,'LUGARO','CESAR','LUGARO','(321)695-7404','(321)695-8496',NULL,'ORLANDO','FLORIDA','UNITED STATES','32807','2205 FORSYTH RD',NULL,NULL,'(407)659-0007',NULL,'I-W',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'boricuaimports@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(5,1,'1',NULL,NULL,'WALGREENS',NULL,'WALGREENS',NULL,NULL,'CONNIE',NULL,'(217)554-8704',NULL,NULL,'DANSVILLE','ILLINOIS','UNITED STATES','61834','PO BOX 4038',NULL,NULL,'(217) 554-8704',NULL,'I2R',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'connie.m.krabbe@walgreens.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(6,1,'1',NULL,NULL,'CALANS COSTA RICA',NULL,'CALANS COSTA RICA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SAN JOSE','SAN JOSE MATA REDOND','COSTA RICA',NULL,'LA SABANA EDIFICIO 6 PISO 6 LOCAL22',NULL,NULL,NULL,NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(7,1,'1',NULL,NULL,'UNIGESTION HOLDING S.A.-HAITI',NULL,'UNIGESTION HOLDING S.A.-HAITI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PORT-AU-PRIN','PORT-AU-PRINCE','HAITI',NULL,'151 ANGLE AV JEAN PAUL II IMPASSE DUVERGER .',NULL,NULL,'509-37007812',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B-D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(8,1,'1',NULL,NULL,'TELECOMUNICACIONES DE GUATEMAL',NULL,'TELECOMUNICACIONES DE GUATEMAL',NULL,'ARAGON','JAIME',NULL,'502 24206501',NULL,NULL,'GUATEMALA','GUATEMALA','GUATEMALA',NULL,'7A AV 12.39 ZONA 1',NULL,NULL,'502-24206174',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'jaime.aragon@claro.com.gt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(9,1,'1',NULL,NULL,'ENTEL S.A',NULL,'ENTEL S.A',NULL,'MOLINA','LORENA',NULL,NULL,NULL,NULL,'LA PAZ','LA PAZ','BOLIVIA',NULL,'CALLE FEDERICO SUAZO NO. 1771 EDIFICIO TOWER',NULL,NULL,'591-2-2141010',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'lmolina@entel.bo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(10,1,'1',NULL,NULL,'LAS TORRES DCR S.A.',NULL,'LAS TORRES DCR S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ALAJUELA','COSTA RICA','COSTA RICA',NULL,'OFICENTRO SANTAMARIA OFICINA 1 B RIO SEGUNDO',NULL,NULL,'(506)2440-2044',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(11,1,'1',NULL,'680666951','CALA NETWORK SERVICES INC',NULL,'CALA NETWORK SERVICES INC',NULL,'BAQUERIZO','ROBERTO ALLAN','MAZZOTTI','(954)389-4836','(954)389-4836',NULL,'WESTON','FLORIDA','UNITED STATES','33331','2800 WESTON ROAD SUITE 101',NULL,NULL,'(954)389-4836',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'rbaquerizo@calans.com','amazzotti@calans.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(12,1,'1',NULL,'161132026','CALANS TELECOMUNICACIONES BOLI',NULL,'CALANS TELECOMUNICACIONES BOLI',NULL,'MAZZOTTI','ARMANDO',NULL,'(954)389-4836',NULL,NULL,'CALACOTO','LA PAZ','BOLIVIA',NULL,'CALLE LOS LIRIOS #8250',NULL,NULL,'591-2770771',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(13,1,'1',NULL,'66219554','CALANS GUATEMALA SA',NULL,'CALANS GUATEMALA SA',NULL,NULL,'MILDRED',NULL,'954-727-5332',NULL,NULL,'CIUDAD DE GU','GUATEMALA','GUATEMALA',NULL,'6A AV-6-63 ZONA 10 EDIFICIO SIXTINO 13 NIVEL',NULL,NULL,'502-22697706',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'DS',NULL,NULL,'mlopez@calans.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(14,1,'1',NULL,NULL,'CEMENTOS PROGRESO S.A',NULL,'CEMENTOS PROGRESO S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CIUDAD DE GU','GUATEMALA','GUATEMALA',NULL,'CENTRO GERENCIAL LAS MARGARITAS TORRE II NIVE',NULL,NULL,'502-2338-9100',NULL,'I-M',NULL,'010',NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(15,1,'1',NULL,NULL,'CONTABAN S.A',NULL,'CONTABAN S.A',NULL,'VALDEZ','MARIA FERNANDA','HERNANDEZ',NULL,NULL,NULL,'GUAYAQUIL','GUAYAQUIL','ECUADOR',NULL,'AV. JUAN TANCA MARENGO-SOL 1OF 29 Y C.C DICEN',NULL,NULL,'04-224-1419',NULL,'IAE',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'mvaldez@forzabananas.com','ghernandez@forzabananas.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(16,1,'1',NULL,NULL,'DOLE',NULL,'DOLE',NULL,'COLOMER','FRANCISCO',NULL,NULL,NULL,NULL,'003491507909',NULL,'ESPAÑA',NULL,'MERCA MADRID H 2-9',NULL,NULL,'0034915079097',NULL,'I-E',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'francisco.colomer@dole.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(17,1,'1',NULL,'22319700','ENERGICA SA',NULL,'ENERGICA SA',NULL,'VASQUEZ','ALVARO',NULL,'502-2440-8457',NULL,NULL,'GUATEMALA','GUATEMALA','GUATEMALA',NULL,'8VA AVENIDA 29-51 ZONA 8',NULL,NULL,'502-2440-8456',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(18,1,'1',NULL,'0992414804','FORZAFRUT S.A.',NULL,'FORZAFRUT S.A.',NULL,'HERNANDEZ','GEORGA','RIVADENEIRA',NULL,'593-4-224-1419',NULL,'Guayaquil','GUAYAQUIL','ECUADOR',NULL,'AV. J.T MARENGO KM 1.5 C.C DICENTRO PLANTA AL',NULL,NULL,'593-4-224-1419',NULL,'I-E',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'ghernandez@forzabananas.com','lrivadeneira@forzabananas.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(19,1,'1',NULL,'263233027','FORZAFRUT USA LLC',NULL,'FORZAFRUT USA LLC',NULL,'RIVADENEIRA','LUIS FERNANDO','HERNANDEZ',NULL,NULL,NULL,'WESTON','FLORIDA','UNITED STATES','33331','2812 WESTON RD SUITE 114',NULL,NULL,'(305)394-9460',NULL,'I2T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'lrivadeneira@forzabananas.com','ghernandez@forzabananas.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(20,1,'1',NULL,'650723786','JAGUAR AVIATION INDUSTRIES, CO',NULL,'JAGUAR AVIATION INDUSTRIES, CO',NULL,'LOPEZ','FAUSTO',NULL,NULL,NULL,NULL,'FORT LAUDERD','FLORIDA','UNIITED STATES','333009','4700 W PROSPECT SUITE 106',NULL,NULL,'(954)484-4224',NULL,'I3T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'flopez@jaguar-aviation.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(21,1,'1',NULL,NULL,'WALTER TELLINGER',NULL,'WALTER TELLINGER',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES','BUENOS AIRES','ARGENTINA','C1107 AMK','167TH ST CORPORATION AVENIDA ESPAÑA 3250',NULL,NULL,NULL,NULL,'I3T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(22,1,'1',NULL,NULL,'SERVICIOS HELICENTER S.A.',NULL,'SERVICIOS HELICENTER S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES','BUENOS AIRES','ARGENTINA','C1107 AMK','Helipuerto Baires Madero AVENIDA ESPAÑA 3250',NULL,NULL,'54-11 4300-7524',NULL,'I3T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'info@helicenter.com.ar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(23,1,'1',NULL,NULL,'HELICOPTEROS MARINOS SA',NULL,'HELICOPTEROS MARINOS SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES','BUENOS AIRES','ARGENTINA','B1611WAA','ROBERTO LAPLACE 3605',NULL,NULL,'5411-4741-6333',NULL,'I3T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'info@helicopterosmarinos.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(24,1,'1',NULL,'200148776','OPTELSA LLC',NULL,'OPTELSA LLC',NULL,'BAQUERIZO','ALLAN',NULL,NULL,NULL,NULL,'WESTON','FLORIDA','UNITED STATES','33331','2645 EXECUTIVE PARK DRIVE 163',NULL,NULL,NULL,NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'rbaquerizo@calans.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(25,1,'1',NULL,'650565768','PROVEX, INC.',NULL,'PROVEX, INC.',NULL,'ECHEVERRIA','MANUEL','NAVARRO',NULL,NULL,NULL,'MIAMI','FLORIDA','UNITED STATES','33178','7061 Nw 87th Ave',NULL,NULL,'305-436-0834',NULL,'I-L',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'controller@provex','accounting@provexinc.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(26,1,'1',NULL,NULL,'MINISTERIO DE DEFENSA NACIONAL',NULL,'MINISTERIO DE DEFENSA NACIONAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'QUITO','QUITO','ECUADOR',NULL,'CALLE DE LA EXPOSICION S4-71 y Benigno Vela',NULL,NULL,'593-2-298-3200',NULL,'I-L',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(27,1,'1',NULL,'431674348','RAWLINGS',NULL,'RAWLINGS',NULL,'Hilson','Ron','Reynolds','636-349-3500','636-221-3943',NULL,'St louis','Missouri','USA','63090','510 Maryville University Drive.Suite 110',NULL,NULL,'636-349-3500',NULL,'I-M',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'rhilson@rawlings.com','treynolds@rawlings.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(28,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC, CLASS T',NULL,'ARGYLE FUNDS SPC INC, CLASS T',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,'010',NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(30,1,'1',NULL,NULL,'GE HEALTHCARE',NULL,'GE HEALTHCARE',NULL,'TEJERO','ROSA',NULL,'561-756-2828',NULL,NULL,'MIRAMAR','FL','USA','33027','3550 SW 158TH STREET',NULL,NULL,'561-756-2820',NULL,'I-M',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'rosa.tejero@ge.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(31,1,'1',NULL,NULL,'HOSER INGENIERIA',NULL,'HOSER INGENIERIA',NULL,'Serrano','Ignacio',NULL,NULL,NULL,NULL,'Santiago','Santiago','CHILE',NULL,'Avdalas Condes #11400 OF 43 Torre San Damian',NULL,NULL,'2-237-18102',NULL,'I-H',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'iserrano@hosser.cl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(32,1,'1',NULL,NULL,'WALLIS',NULL,'WALLIS',NULL,'Nottola','Flavio',NULL,NULL,NULL,NULL,'CUBA','MISSOURI','USA','65453','106 E Washington',NULL,NULL,'573-885-2277',NULL,'I2R',NULL,'010',NULL,NULL,NULL,'B',NULL,NULL,'fn@barbarapalacios.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(34,2,'1','DL','','HB ATHLETIC, INC','','HB ATHLETIC, INC',NULL,'Hurvitz','Robert',NULL,'9145608422','',NULL,'New Rochelle','New York','USA','10801','56 Harrison St',NULL,NULL,'914-560-8422','','I2R',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,'','',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'A'),(35,1,'1',NULL,'0992544198','CONTABAN',NULL,'CONTABAN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GUAYAQUIL',NULL,'ECUADOR',NULL,'Miguel alcivar solar 42 & Allejandro Andrade',NULL,NULL,'04-224-1419',NULL,'IAE',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(37,1,'1',NULL,'878173194','URBAN APPAREL',NULL,'URBAN APPAREL',NULL,'Dulinski','David',NULL,'(305) 519-1495',NULL,NULL,'New york','New York','USA','10018','226 West 37th Street',NULL,NULL,'305-519-1495',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'dave.dulinski@urbanapparel.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(38,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC, CLASS Q',NULL,'ARGYLE FUNDS SPC INC, CLASS Q',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,'010',NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(39,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC, CLASS S',NULL,'ARGYLE FUNDS SPC INC, CLASS S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(40,1,'1',NULL,NULL,'ARDENT HARMONY FUND INC.',NULL,'ARDENT HARMONY FUND INC.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Christ Churc','Barbados','BARBADOS','BB14030','Dayrells Court Business Centre Ground Floor D',NULL,NULL,'246-427-7098',NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(41,1,'1',NULL,NULL,'SOLUMEDIC',NULL,'SOLUMEDIC',NULL,'Chamorro','Liz',NULL,'011595981280281',NULL,NULL,'ASUNCION',NULL,'PARAGUAY',NULL,NULL,NULL,NULL,'01159521208432',NULL,'I-H',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'lach@solumedic.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(42,1,'1',NULL,NULL,'RODRIGO  LOPEZ',NULL,'RODRIGO  LOPEZ',NULL,'Lopez','Rodrigo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(43,1,'1',NULL,NULL,'AMERICAN CAPITAL DVLPT MNGT',NULL,'AMERICAN CAPITAL DVLPT MNGT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'B-D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(44,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC, CLASS L',NULL,'ARGYLE FUNDS SPC INC, CLASS L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(45,1,'1',NULL,NULL,'FRUIT OF THE LOOM',NULL,'FRUIT OF THE LOOM',NULL,NULL,'Danny Morel',NULL,NULL,NULL,NULL,'BOWLING GREE','KENTUCKY','USA',NULL,'2622 Scottsville Rd',NULL,NULL,'270-796-4704',NULL,'I-M',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'DMorel @fruit.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(46,1,'1',NULL,'560528890','HERNOL S.A',NULL,'HERNOL S.A',NULL,'Cediel','Fermin',NULL,'(305) 435-1878',NULL,NULL,'Bogota','Bogota','COLOMBIA',NULL,'Calle 64 #113A-35 Engativa',NULL,NULL,'571-435-1878',NULL,'I-M',NULL,'010',NULL,NULL,NULL,'B-D',NULL,NULL,'fermin-cediel@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(47,1,'1',NULL,NULL,'TERMINALES AUTOMOTRICES S.A',NULL,'TERMINALES AUTOMOTRICES S.A',NULL,NULL,'Rosmery',NULL,'422-1500',NULL,NULL,'Bogota','DC','COLOMBIA',NULL,'Km 1.5 Via Funza, Parque Industrial San Diego',NULL,NULL,'57-1-422-1523',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(48,1,'1',NULL,NULL,'RYMEL INGENIERIA ELECTRICA S.A',NULL,'RYMEL INGENIERIA ELECTRICA S.A',NULL,'ECHEVERRY','DIEGO',NULL,'74-444-0430',NULL,NULL,'Copacabana',NULL,'COLOMBIA',NULL,'Paraje El Nogal Autopista Norte. Diagonal a L',NULL,NULL,'57-44440430',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(49,1,'1',NULL,NULL,'SIEMENS MANUFACTURING S.A',NULL,'SIEMENS MANUFACTURING S.A',NULL,'MONTEALEGRE','JAIRO',NULL,'425-3827',NULL,NULL,NULL,NULL,'COLOMBIA',NULL,NULL,NULL,NULL,'425-3827',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(50,1,'1',NULL,NULL,'ELECTROPORCELANA GAMMA S.A',NULL,'ELECTROPORCELANA GAMMA S.A',NULL,'VANEGAS','VICTOR DANIEL',NULL,'74-305-8000',NULL,NULL,'SABANETA',NULL,'COLOMBIA',NULL,NULL,NULL,NULL,'74-305-8000',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(51,1,'1',NULL,NULL,'MAGNETRON S.A',NULL,'MAGNETRON S.A',NULL,'DIOSA','JAIRO',NULL,'076-315-7100',NULL,NULL,'PEREIRA',NULL,'COLOMBIA',NULL,'Km 9 Via Pereira- Cartago',NULL,NULL,'076-315-7100',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(52,1,'1',NULL,NULL,'TRANSEQUIPOS LTDA',NULL,'TRANSEQUIPOS LTDA',NULL,NULL,'ROBINSON',NULL,'57-1-743-4001',NULL,NULL,'SANTO DOMING',NULL,'REPUBLICA DOMINICANA',NULL,NULL,NULL,NULL,'57-1-743-4001',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(53,1,'1',NULL,NULL,'REPRESENTACIONES LLANOS',NULL,'REPRESENTACIONES LLANOS',NULL,'LLANOS','LUIS ERNESTO',NULL,'072-441-4642',NULL,NULL,'Cali','Valle del Cauca','COLOMBIA',NULL,'Cl 33 #1-40',NULL,NULL,'57-2-441-4642',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(54,1,'1',NULL,NULL,'AMERICAN CAPITAL DVLPMT FUND',NULL,'AMERICAN CAPITAL DVLPMT FUND',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(55,1,'1',NULL,NULL,'SIMELCA S.A',NULL,'SIMELCA S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Medellin','Antioquia','COLOMBIA',NULL,'Calle 19 N 43 B 44. Barrio Colombia',NULL,NULL,'57 4 316 7300',NULL,'I-T',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'simelca@simelca.com.co',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(56,1,'1',NULL,NULL,'NOTIONS DOMINICANA',NULL,'NOTIONS DOMINICANA',NULL,'Honoret','Juan',NULL,'809-576-0020','CEL: 809-284-6985',NULL,'Santiago','Rep Dominicana','DOMINICAN REP',NULL,'Zona Franca industrial',NULL,NULL,'809-576-0020',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'jhonoret@notions.com.do',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(57,1,'1',NULL,NULL,'CARIBBEAN INDUSTRIAL',NULL,'CARIBBEAN INDUSTRIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Warrens',NULL,'BARBADOS',NULL,'Canewood Rd.',NULL,NULL,'1-246-425-4545',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,'smccollin@ciibarbados.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(58,1,'1',NULL,NULL,'FINOTEX',NULL,'FINOTEX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FLORIDA','USA','33166','6942 Nw 50th St',NULL,NULL,'305-470-2400',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(59,1,'1',NULL,NULL,'MEGA PLAX',NULL,'MEGA PLAX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SANTIAGO ROD',NULL,'REPUBLICA DOMINICANA',NULL,'Carretera San Jose, Los Tocones',NULL,NULL,'809-337-9071',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'info@megaplax.com.do',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(60,1,'1',NULL,NULL,'CARTONERA ALFREDO HUED SAS',NULL,'CARTONERA ALFREDO HUED SAS',NULL,'Pinto','Ricardo',NULL,NULL,NULL,NULL,'Santo Doming','DN','REPUBLICA DOMINICANA',NULL,'Autopista Duarte Km 15, Carretera La Isabel #',NULL,NULL,'809-560-6861',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'rpinto@cartonerahued.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(61,1,'1',NULL,'102338361','SML',NULL,'SML',NULL,'Taveras','Roberto','skype: taveras.roberto1213','Direct: +1-809- 329-0077','MOBILE: +1-809-980-4515',NULL,'santiago','dominican republic','DOMINICAN REPUBLIC',NULL,'caribbean industrial park',NULL,NULL,'809-980-4515',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'www.sml.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(63,1,'1',NULL,NULL,'PROMPTUS LLC',NULL,'PROMPTUS LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIRAMAR','Florida','USA','33025','3950 Executive Way',NULL,NULL,'305-687-1405',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(64,1,'1',NULL,NULL,'TEXTILES DEL SUR S.A',NULL,'TEXTILES DEL SUR S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES','Capital Federal','ARGENTINA',NULL,'J.F. Segu 3545',NULL,NULL,'54-11-5031-9931',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(65,1,'1',NULL,'130599582','ASTRO CARTON DOMINICANA',NULL,'ASTRO CARTON DOMINICANA',NULL,'Brito','Glenys',NULL,' 809-561-0011',NULL,NULL,'rep dominica','rep dominicana','DOMINICAN REP',NULL,'Autopista Duarte km 17 los alcarrizos',NULL,NULL,'809-561-0011',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'glenysb@astrocarton.com   ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(66,1,'1',NULL,NULL,'AVERY DENNISON',NULL,'AVERY DENNISON',NULL,'Rodríguez','Onésimo',NULL,'(809) 241-8566 Ext. 241',NULL,NULL,'Santiago',NULL,'DOMINICAN REPUBLIC',NULL,'Zona Franca Pisano, Nave N0 42',NULL,NULL,'8092418566',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,'onesimo.rodriguez@averydenni',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(67,1,'1',NULL,NULL,'ELASTOMER INC.',NULL,'ELASTOMER INC.',NULL,'Lunavat','Aamit',NULL,'305-436-8915',NULL,NULL,'Miami','FLorida','USA','33178','9594 NW 41st St. Suite 209',NULL,NULL,'305-436-8915',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'aamit@elastomerinc.net',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(68,1,'1',NULL,NULL,'HASKER TEXTIL',NULL,'HASKER TEXTIL',NULL,'Hasker','Rod',NULL,'(610) 588-7887',NULL,NULL,'Roseto','Pennsilvania','USA','18013','504 Roseto Ave',NULL,NULL,'610-588-7887',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'rod@haskertextiles.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(69,1,'1',NULL,NULL,'ROYAL BUSINESS',NULL,'ROYAL BUSINESS',NULL,'Rosales','Lucy',NULL,'305-254-0285 Ext. 219',NULL,NULL,'Miami','Florida','USA','33186','12201 sw 132nd court',NULL,NULL,'305-254-0285',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'lucy@royalbusinessinc.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(70,1,'1',NULL,NULL,'HERLAPING FREIGTH FORWARD',NULL,'HERLAPING FREIGTH FORWARD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(71,1,'1',NULL,NULL,'PT.SHINTA WOO SUNG',NULL,'PT.SHINTA WOO SUNG',NULL,NULL,'PT. Shinta Woo Sung',NULL,'Tel: (0254) 402080',NULL,NULL,'KOPO SERANG','BANTEN','INDONESIA',NULL,'JL RAYA KOPO-MAJA KMKM 1 DESA GABUS KEC',NULL,NULL,'0254-402080',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'mhkim@shintawoosung.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(72,1,'1',NULL,NULL,'DLM LOGISTICS INC',NULL,'DLM LOGISTICS INC',NULL,'Lawrence','Debbie M',NULL,'Tel: 305-640-9985','CELL: 786-258-3509',NULL,'Miami','Florida','USA','33126','1850 nw 84TH Avenue',NULL,NULL,'305-640-9985',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'debbielawrence@dlm-logistics.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(74,1,'1',NULL,NULL,'PROMPTUS LLC',NULL,'PROMPTUS LLC',NULL,'de Sangles','Julio',NULL,'1 (305) 687-1405',NULL,NULL,'Miami','florida','USA','33167','3345 NW 116 St.',NULL,NULL,'305-687-1405',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'jdesangles@promptus.us','Skype: promptus.llc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(75,1,'1',NULL,NULL,'CONTEMPORA FABRICS INC',NULL,'CONTEMPORA FABRICS INC',NULL,'Roach','Ron',NULL,'Tel: 910-738-7131',NULL,NULL,'LUMBERTON','NORTH CAROLINA','USA','28358','351 Contempora Dr',NULL,NULL,'910-738-7131',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'rroach@contemporafabrics.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(76,1,'1',NULL,NULL,'334 MADISON LLC',NULL,'334 MADISON LLC',NULL,'Lopez','Fausto',NULL,NULL,NULL,NULL,'Pembroke Pin','Florida','USA','33028','723 nw 135 avenue',NULL,NULL,NULL,NULL,'I-R',NULL,'010',NULL,NULL,NULL,'B-D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(78,1,'1',NULL,NULL,'ACE BINDING CO INC',NULL,'ACE BINDING CO INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BALTIMORE','MD','USA','21230','3031 James St',NULL,NULL,'410-525-0700',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,'customerservice@acebinding.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(79,1,'1',NULL,NULL,'CHAMPION THREAD CO',NULL,'CHAMPION THREAD CO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Gastonia','North Carolina','USA','28056','165 Blue Devil Dr',NULL,NULL,'704-867-6611',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(80,1,'1',NULL,NULL,'GALEY&LORD INDUSTRIES INC',NULL,'GALEY&LORD INDUSTRIES INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEW YORK','NEW YORK','USA','10018','980 Avenue of Americas',NULL,NULL,'212-465-3000',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(81,1,'1',NULL,NULL,'KING AMERICA TEXTILE GRP',NULL,'KING AMERICA TEXTILE GRP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHICAGO','ILLINOIS','USA','60632','2845 W 48th',NULL,NULL,'773-523-8361',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(82,1,'1',NULL,NULL,'QST INDUSTRIES INC',NULL,'QST INDUSTRIES INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Chicago','IL',NULL,'60661','550 West Adams St Suite 200',NULL,NULL,'312-930-9400',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(83,1,'1',NULL,NULL,'SCOVILL FASTENERS INC',NULL,'SCOVILL FASTENERS INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Clarkesville','GA','USA','30523','1802 Scovill Dr',NULL,NULL,'706-754-1000',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(85,1,'1',NULL,NULL,'VELCRO USA',NULL,'VELCRO USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MANCHESTER','NEW HAMSHIRE','USA','03103','95 Sundial Ave',NULL,NULL,'800-225-0180',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(88,1,'1',NULL,NULL,'CLARO - CONECEL SA',NULL,'CLARO - CONECEL SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Guayaquil','Guayas','ECUADOR',NULL,'Avenida Francisco de Orellana y Alberto Borge',NULL,NULL,'593-4-500-4040',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(89,1,'1',NULL,NULL,'MAINETTI S.P.A.',NULL,'MAINETTI S.P.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CASTELGOMBER','VI','ITALY','36070','Via Casarette 58',NULL,NULL,'39 0445 428511',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(90,1,'1',NULL,NULL,'GAME TIME FABRICS',NULL,'GAME TIME FABRICS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'TYNGSBOROUGH','MASSACHUSETTS','USA','01879','13 Westech Dr',NULL,NULL,'978-226-5192',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(91,1,'1',NULL,NULL,'HILOS A&E DOMINICANA',NULL,'HILOS A&E DOMINICANA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SANTIAGO',NULL,'REPUBLICA DOMINICANA','51000','Ave Longitudinal',NULL,NULL,'809-576-9404',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(94,1,'1',NULL,NULL,'TEXTISUR',NULL,'TEXTISUR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES',NULL,'AREGENTINA','B1888JRI','Av Calchaqui 5367. Florencio Varela',NULL,NULL,'54-11-4210-2399',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(95,1,'1',NULL,NULL,'21ST CENTURY LABELS',NULL,'21ST CENTURY LABELS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(96,1,'1',NULL,NULL,'THE STAR GROUP',NULL,'THE STAR GROUP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LODI','NJ','USA','07644','8oA Industrial Rd',NULL,NULL,'973-778-8600',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,'info@thestargrp.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(98,1,'1',NULL,NULL,'TRANSFORMADORES C.D.M',NULL,'TRANSFORMADORES C.D.M',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SANTANDER',NULL,'COLOMBIA',NULL,NULL,NULL,NULL,NULL,NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(99,1,'1',NULL,NULL,'INGENIERIA PARA LA AUTOMOCION',NULL,'INGENIERIA PARA LA AUTOMOCION',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(100,1,'1',NULL,NULL,'DARLINGTON FABRICS CORP',NULL,'DARLINGTON FABRICS CORP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'WESTERLY','RHODE ISLAND','USA','02891','36 Beach Street',NULL,NULL,'401-315-6304',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(101,1,'1',NULL,NULL,'CENTENNIAL TOWERS CR SA',NULL,'CENTENNIAL TOWERS CR SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Alajuela',NULL,'COSTA RICA',NULL,'Oficentro Santa Maria Oficina 1 B, Rio Segund',NULL,NULL,'506-2430-7079',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(102,1,'1',NULL,NULL,'OTECEL-TELEFONICA ECUADOR SA',NULL,'OTECEL-TELEFONICA ECUADOR SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'QUITO',NULL,'ECUADOR',NULL,NULL,NULL,NULL,NULL,NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(103,1,'1',NULL,NULL,'COMUNICACIONES CELULARES SA',NULL,'COMUNICACIONES CELULARES SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GUATEMALA CI',NULL,'GUATEMALA',NULL,'Km 9.5 carretera a El Salvador, Edificio Plaz',NULL,NULL,'502-242-81000',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(104,1,'1',NULL,NULL,'HUAWEI TELECOMUNICACIONES SA',NULL,'HUAWEI TELECOMUNICACIONES SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ATHENS',NULL,'GREECE',NULL,NULL,NULL,NULL,NULL,NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(105,1,'1',NULL,NULL,'ALCATEL LUCENT ECUADOR SA',NULL,'ALCATEL LUCENT ECUADOR SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'QUITO','Pichincha','ECUADOR',NULL,'La Pinta 236 y La Rabida. Edificio Alcatel Pi',NULL,NULL,'02-294-0700',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(106,1,'1',NULL,NULL,'GABRIEL DE COLOMBIA SA',NULL,'GABRIEL DE COLOMBIA SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BOGOTA',NULL,'COLOMBIA',NULL,NULL,NULL,NULL,NULL,NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(107,1,'1',NULL,NULL,'HICKORY BRANDS INC',NULL,'HICKORY BRANDS INC',NULL,'nelson','marcia',NULL,'828485-2026',NULL,NULL,'HICKORY','NORTH CAROLINA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(109,1,'1',NULL,NULL,'AMERICAN CAPITAL FINANCIAL TRD',NULL,'AMERICAN CAPITAL FINANCIAL TRD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Weston','Florida','USA','33326','2200 N commerce PKY suite 110',NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(110,1,'1',NULL,NULL,'GIANT KNITTING',NULL,'GIANT KNITTING',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'TAICHUNG',NULL,'TAIWAN',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(111,1,'1',NULL,NULL,'TAIWAN PAIHO',NULL,'TAIWAN PAIHO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(112,1,'1',NULL,NULL,'AMPLE STAR LIMITED',NULL,'AMPLE STAR LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(114,1,'1',NULL,NULL,'DISPROAC',NULL,'DISPROAC',NULL,'criollo','victor',NULL,NULL,NULL,NULL,'QUITO',NULL,'ECUADOR',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(115,1,'1',NULL,NULL,'FENIX EXPORT LLC',NULL,'FENIX EXPORT LLC',NULL,'Ospina','Maria fernanda',NULL,NULL,NULL,NULL,'Miami','Florida','USA','33156','9125 SW 72nd Ave #G7',NULL,NULL,'321-695 7404',NULL,'I-E',NULL,'010',NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(116,1,'1',NULL,NULL,'JJ RIVAS REPRESENTACIONES',NULL,'JJ RIVAS REPRESENTACIONES',NULL,'Bugarin','Mario',NULL,'310-469 2481',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(117,1,'1',NULL,NULL,'BATTAGLIO S.A',NULL,'BATTAGLIO S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Rosario','Santa Fe','ARGENTINA',NULL,'Urquiza 871 - S200Ana 2000',NULL,NULL,'54 3414477616',NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(118,1,'1',NULL,NULL,'JAEJ S.A',NULL,'JAEJ S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BUENOS AIRES',NULL,'ARGENTINA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(119,1,'1',NULL,NULL,'DYKEMA RUBBER BAND CO',NULL,'DYKEMA RUBBER BAND CO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Pittsburg','Pennsylvania','USA','15204','Bldg #5 y 6, 4075 Windgap Ave',NULL,NULL,'412-771-1955',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(120,1,'1',NULL,NULL,'INDELCA S.A',NULL,'INDELCA S.A',NULL,'Villamil','Mauricio',NULL,NULL,NULL,NULL,'Engativa','Bogota','COLOMBIA',NULL,'Calle 64 No.113A-35',NULL,NULL,NULL,NULL,'I-M',NULL,'010',NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(123,1,'1',NULL,NULL,'GP COAL',NULL,'GP COAL',NULL,'Ospina','Marino',NULL,'571 5203345',NULL,NULL,NULL,'VIRGINA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-E',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(124,1,'1',NULL,NULL,'PERCAL INDUSTRIAL',NULL,'PERCAL INDUSTRIAL',NULL,'Marmolejo','Ana','Rodriguez',NULL,NULL,NULL,'Dominican re','Dominican Republic','DOMINICAN REPUBLIC',NULL,'Free Trade Zone La Vega',NULL,NULL,'(809)242-6400',NULL,'I-M',NULL,'010',NULL,NULL,NULL,'B-I',NULL,NULL,'percalindustrial@hotmail.com','percalindustrial@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(125,1,'1',NULL,NULL,'JULIUS YOUNG INC',NULL,'JULIUS YOUNG INC',NULL,'Hirsh','Sol','Engelman','973-465-7722','973-465-7722',NULL,'Newark','New Jersey','USA','07105','38 Blanchard Street',NULL,NULL,NULL,NULL,'I-W',NULL,'010',NULL,NULL,NULL,'DS',NULL,NULL,'sol@juliusyoung.com','SAM.E@JULIUSYOUNG.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(126,1,'1',NULL,NULL,'AMANDA SANCHEZ CHAMORRO',NULL,'AMANDA SANCHEZ CHAMORRO',NULL,'SANCHEZ','AMANDA',NULL,NULL,NULL,NULL,'QUITO','Pichincha','ECUADOR',NULL,'AV 6 DICIEMBRE N48-29',NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(127,1,'1',NULL,NULL,'FELIZ EDUARDO PHILCO DEL SALTO',NULL,'FELIZ EDUARDO PHILCO DEL SALTO',NULL,'PHILCO','FELIZ',NULL,NULL,NULL,NULL,'QUITO','QUITO','ECUADOR',NULL,'JORGE ERAZO 256 Y HOMERO',NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(128,1,'1',NULL,NULL,'INDUSTRIA ANDINA DE TRANSF',NULL,'INDUSTRIA ANDINA DE TRANSF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GUAYAQUIL','GUAYAQUIL','ECUADOR',NULL,'KM 10 1/2 VIA DUABLE',NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(129,1,'1',NULL,NULL,'GALEY&LORD INDUSTRIES',NULL,'GALEY&LORD INDUSTRIES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEW YORK','NEW YORK','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,'010',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(131,1,'1',NULL,NULL,'AMERICAN CAPITAL ASSET MNGT',NULL,'AMERICAN CAPITAL ASSET MNGT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(132,1,'1',NULL,NULL,'DLB GROUP LLC',NULL,'DLB GROUP LLC',NULL,'hernandez','larry',NULL,'011-584 143229900',NULL,NULL,'Caracas',NULL,'VENEZUELA',NULL,NULL,NULL,NULL,'011-584-143229900',NULL,'I2R',NULL,'010',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(133,1,'1',NULL,NULL,'PERFECTION ATLANTIC MANUFACTUR',NULL,'PERFECTION ATLANTIC MANUFACTUR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI',NULL,'USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,'010',NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(134,1,'1',NULL,NULL,'GLOBAL TRIM',NULL,'GLOBAL TRIM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'YORBA LINDA','CALIFORNIA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(135,1,'1',NULL,NULL,'ZTE INTERNATIONAL S.A',NULL,'ZTE INTERNATIONAL S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA','PANAMA','PANAMA',NULL,'urbanizacion Dos Mares,Calle Circunvalacion,C',NULL,NULL,NULL,NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(136,1,'1',NULL,NULL,'EMPRESA NICARAGUENSE DE COMUNI',NULL,'EMPRESA NICARAGUENSE DE COMUNI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Nicaragua','Nicaragua','NICARAGUA',NULL,'Edificio Entel Villa Fontana Sem del Pedagogi',NULL,NULL,NULL,NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(137,1,'1',NULL,NULL,'BIOMEDICAL INTERNATIONAL CORP.',NULL,'BIOMEDICAL INTERNATIONAL CORP.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FLORIDA','USA','33155','4896 sw 74TH COURT MIAMI, FL 33155',NULL,NULL,'305669-1010',NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(138,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC. CLASS II',NULL,'ARGYLE FUNDS SPC INC. CLASS II',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(139,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC.CLASS III',NULL,'ARGYLE FUNDS SPC INC.CLASS III',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(140,1,'1',NULL,NULL,'ARGYLE FUNDS SPC INC.CLASS V',NULL,'ARGYLE FUNDS SPC INC.CLASS V',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(141,1,'1',NULL,NULL,'LSP CARGO INC',NULL,'LSP CARGO INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MEDLEY','FLORIDA','FLORIDA','33178','9103 NW 105TH WAY',NULL,NULL,NULL,NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(142,1,'1',NULL,NULL,'ANICAM ENTERPRISES INC',NULL,'ANICAM ENTERPRISES INC',NULL,'Casana','Cesar',NULL,'3054710428',NULL,NULL,'BOGOTA',NULL,'COLOMBIA',NULL,NULL,NULL,NULL,NULL,NULL,'IAE',NULL,'001',NULL,NULL,NULL,'B&D',NULL,NULL,'cesarcsov@anicamenterprices.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(143,1,'1',NULL,NULL,'SEMEX ALLIANCE',NULL,'SEMEX ALLIANCE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-C',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(144,1,'1',NULL,NULL,'LA BELLA VISTA LLC',NULL,'LA BELLA VISTA LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEW ORLEANS','LOUISANA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-R',NULL,NULL,NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(145,1,'1',NULL,NULL,'R.E CAPITAL INVESTMENT LLC',NULL,'R.E CAPITAL INVESTMENT LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(146,1,'1',NULL,NULL,'SUNTEX INDUSTRY CORP.',NULL,'SUNTEX INDUSTRY CORP.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Cheung Sha W','hong Kong','CHNA',NULL,'Unit D & E 31/F Ford Glory Plaza 37-39 WIng H',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(147,1,'1',NULL,'1345456161','CNS PANAMA S.A',NULL,'CNS PANAMA S.A',NULL,'Tobalina','Constantino',NULL,NULL,NULL,NULL,'PANAMA','PANAMA','PANAMA',NULL,'Ocean Business Plaza piso 11 Of#1108 Calle 47',NULL,NULL,NULL,NULL,'I-T',NULL,'010',NULL,NULL,NULL,'B-I',NULL,NULL,'ctobalina@calans.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(148,1,'1',NULL,'5360200232','ERICSSON DE PANAMA',NULL,'ERICSSON DE PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Panama City','Panama','PANAMA','082305332','P.H Torres de las Americas Torre C piso 21 Pu',NULL,NULL,'507 2206 5100',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(149,1,'1',NULL,NULL,'PAM',NULL,'PAM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(151,1,'1',NULL,NULL,'MARE LTDA',NULL,'MARE LTDA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Montevideo','Montevideo','URUGUAY',NULL,'guadalupe 2065 Bis',NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(152,1,'1',NULL,'04078043','MONTEIRO ANTUNES INSUMOS HOSPI',NULL,'MONTEIRO ANTUNES INSUMOS HOSPI',NULL,'Nogueira Dias','Ana Paula',NULL,'51-9279-6070',NULL,NULL,'ITAJAI','Santa Catarina','BRASIL','88303-350','Rua Willy Henning,622 Bairro Sao Judas',NULL,NULL,NULL,NULL,'I-H',NULL,'010',NULL,NULL,NULL,'D',NULL,NULL,'anapaula@mahospitalar.com.br',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(153,1,'1',NULL,NULL,'ANICAM',NULL,'ANICAM',NULL,'Casallas','Cesar',NULL,NULL,NULL,NULL,'Miami','FL','USA',NULL,NULL,NULL,NULL,'305 471 0428',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(154,1,'1',NULL,NULL,'SEMMEX',NULL,'SEMMEX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-C',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(155,1,'1',NULL,'8600756841','MOTOMART S.A',NULL,'MOTOMART S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BOGOTA',NULL,'COLOMBIA',NULL,NULL,NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(156,1,'1',NULL,NULL,'TFS INC',NULL,'TFS INC',NULL,'HEALEY','JOE',NULL,'7862880763',NULL,NULL,'AVENTURA','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-B',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(157,1,'1',NULL,NULL,'HERALPIN',NULL,'HERALPIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DORAL','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I3T',NULL,'001',NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(158,1,'1',NULL,NULL,'PALMETO MOTOR SPORT',NULL,'PALMETO MOTOR SPORT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'HIALEAH','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(159,1,'1',NULL,NULL,'PROMAQUINAS LLC',NULL,'PROMAQUINAS LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(160,1,'1',NULL,NULL,'PALMETO TRUCK CENTER',NULL,'PALMETO TRUCK CENTER',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI',NULL,'USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(161,1,'1',NULL,NULL,'CNH INTERNATIONAL',NULL,'CNH INTERNATIONAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LONDON',NULL,'ENGLAND',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(162,1,'1',NULL,NULL,'ROGERS MORRIS',NULL,'ROGERS MORRIS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(163,1,'1',NULL,NULL,'AEGIS TRADING AND SHIPPING COM',NULL,'AEGIS TRADING AND SHIPPING COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Oak Brook','illinois','USA','60523','2021 Midwest Road suite 200',NULL,NULL,NULL,NULL,'IAE',NULL,'001',NULL,NULL,NULL,'B-I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(164,1,'1',NULL,NULL,'AVIPRESA NUTRICION ANIMAL S.A',NULL,'AVIPRESA NUTRICION ANIMAL S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'El Salto','Jalisco','MEXICO','45694','Laton 142 entre Troquelada y Carbono',NULL,NULL,'52 33 36892350',NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(165,1,'1',NULL,NULL,'CAMIONES SIERRA NORTE S.A',NULL,'CAMIONES SIERRA NORTE S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GUADALUPE',NULL,'MEXICO',NULL,'AVE MIGUEL ALEMAN # 1000',NULL,NULL,NULL,NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(166,1,'1',NULL,NULL,'PALMETO TRUCK CENTER',NULL,'PALMETO TRUCK CENTER',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FLORIDA','USA','33166','7245 NW 36TH ST',NULL,NULL,'305-470-1334',NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(167,1,'1',NULL,NULL,'TOLEDO RESTAURANT EQUIPMENT',NULL,'TOLEDO RESTAURANT EQUIPMENT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'HIALEAH','FL',NULL,'33013','4901 E 4TH AVE',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(168,1,'1',NULL,NULL,'ALAMO GROUP USA',NULL,'ALAMO GROUP USA',NULL,NULL,'GRADALL INDUSTRIES',NULL,NULL,NULL,NULL,'NEW PHILADEL','OH','USA','44663','406 MILL AVE SE',NULL,NULL,'330-339-2211',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(169,1,'1',NULL,NULL,'SOLON IMPORT INC',NULL,'SOLON IMPORT INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DORAL','FL',NULL,'33166','7054 79TH AVE',NULL,NULL,'7864678770',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(170,1,'1',NULL,NULL,'GP LOGISTIC INC',NULL,'GP LOGISTIC INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FL',NULL,'33172','9910 NW 21 ST',NULL,NULL,'3055974441',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(171,1,'1',NULL,NULL,'MARQUIS ENERGY WISCONSIN, LLC',NULL,'MARQUIS ENERGY WISCONSIN, LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'HENNEPIN','IL',NULL,'61327','PO BOX 349',NULL,NULL,NULL,NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(172,1,'1',NULL,NULL,'GREEN PLAIN TRADE GROUP LLC',NULL,'GREEN PLAIN TRADE GROUP LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OMAHA','NE',NULL,NULL,'450 REGENCY PKWY  SUITE 400',NULL,NULL,NULL,NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(173,1,'1',NULL,NULL,'ACE INTERNATIONAL FZE',NULL,'ACE INTERNATIONAL FZE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AJMAN',NULL,'EMIRATOS ARABES',NULL,'PO BOX 21115 AJMAN FREE ZONE',NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(174,1,'1',NULL,NULL,'PROVEEDORA DE NUTRIENTES',NULL,'PROVEEDORA DE NUTRIENTES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NUMARAN','MICHOACAN','MEXICO',NULL,'KM 9.5 CARRETRA LA PIEDAD CARAPAN',NULL,NULL,'013 522 55 59',NULL,'NUT',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(175,1,'1',NULL,NULL,'MALTA TEXO DE MEXICO',NULL,'MALTA TEXO DE MEXICO',NULL,'Fonseca','Javier',NULL,'52 55 50 89 58 00',NULL,NULL,'MEXICO',NULL,'MEXICO',NULL,'Poniente 134 no 786 Colonia Industrial Vallej',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(176,1,'1',NULL,NULL,'SOUTH DAKOTA SOYBEAN PROCESS',NULL,'SOUTH DAKOTA SOYBEAN PROCESS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'VOLGA','SD','USA','57071','PO BOX 500',NULL,NULL,'605 627 9240',NULL,'NUT',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(177,1,'1',NULL,NULL,'CGB ENTERPRISES INC',NULL,'CGB ENTERPRISES INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEW ORLEANS','LA','USA','47690','201 ST CHARLES AVE',NULL,NULL,'812 838 6651',NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(178,1,'1',NULL,NULL,'AVIPRESA NUTRION ANIMAL',NULL,'AVIPRESA NUTRION ANIMAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EL SALTO','JALISCO','MEXICO','45694','LATION 142 COLONIA MINERALES EL SALTO',NULL,NULL,'(33)368-92350',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(179,1,'1',NULL,NULL,'GUS MACHADO FORD INC',NULL,'GUS MACHADO FORD INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'HIALEAH','FL','USA','33012','1200 WEST 49TH ST',NULL,NULL,'(305)820-2525',NULL,'CD',NULL,'001',NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(180,1,'1',NULL,NULL,'TURTLE TOP',NULL,'TURTLE TOP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NEW PARIS','IN','USA',NULL,'67819 SR 13',NULL,NULL,'(574)831-4340',NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(181,1,'1',NULL,NULL,'CHOCHELAND INC',NULL,'CHOCHELAND INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ATLANTA','GA','USA','30308','8670 PEACHTREE ST NE',NULL,NULL,NULL,NULL,'ME',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(182,1,'1',NULL,NULL,'FLASH MED SUPPLY LLC',NULL,'FLASH MED SUPPLY LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FL','USA','33126','780 NW 42 AVE SUITE 3',NULL,NULL,'305 476 8358',NULL,'ME',NULL,NULL,NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(183,1,'1',NULL,NULL,'KENDALL IMPORTS LLC',NULL,'KENDALL IMPORTS LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FL','USA','33156','10943 SOUTH DIXIE HWY',NULL,NULL,NULL,NULL,'I3T',NULL,'001',NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(184,1,'1',NULL,NULL,'LANSING TRADE GROUP LLC',NULL,'LANSING TRADE GROUP LLC',NULL,NULL,NULL,NULL,'(913)748-3000',NULL,NULL,'OVERLAND PAR','KS','USA',NULL,'10975 BENSON DRIVE SUITE 400',NULL,NULL,'(913)748-3000',NULL,'NUT',NULL,'001',NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(185,1,'1',NULL,'0992590254','FADAVILL S.A.',NULL,'FADAVILL S.A.',NULL,'ZAMBRANO','VICTOR',NULL,'(593)4-600655',NULL,NULL,'GUAYAQUIL','Guayas','ECUADOR',NULL,'Victor manuel Rendon 1006 y lorenzo de Garaic',NULL,NULL,'(593)4-600655',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'COMERCIAL@FADAVILL.EC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(186,1,'1',NULL,NULL,'INTERCONTINENTAL MARKET INC',NULL,'INTERCONTINENTAL MARKET INC',NULL,'MEDINA','GIOVANNY',NULL,'(305)984-5896',NULL,NULL,'MIAMI','FL','USA','33142','1227 NW 21st Bay',NULL,NULL,'(305)984-5896',NULL,'I2T',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,'JAIRO_LAZO@BELLSOUTH.NET',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(187,1,'1',NULL,NULL,'GALACTIC EMPIRE',NULL,'GALACTIC EMPIRE',NULL,'MONTALVO','JAVIER',NULL,'(718)872-5819',NULL,NULL,'BRONX','NY','USA','10474','534 Drake Street',NULL,NULL,'(718)872-5819',NULL,'I-W',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,'JMONTALVO1964@GMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(188,1,'1',NULL,NULL,'RG PRODUC DBA RONALD GOPAUL MA',NULL,'RG PRODUC DBA RONALD GOPAUL MA',NULL,NULL,NULL,NULL,'(866)652-6856',NULL,NULL,'SAN FERNANDO',NULL,'TRINIDAD TOBAGO',NULL,'12 MARRYAT',NULL,NULL,'(866)652-6856',NULL,'I-W',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(189,1,'1',NULL,NULL,'CONSOLIDATED GRAIN AND BARGE',NULL,'CONSOLIDATED GRAIN AND BARGE',NULL,NULL,NULL,NULL,'(955)867-3500',NULL,NULL,'OAKBROOK','IL','USA','60523','2021 MIDWEST GRAIN AND BARGE',NULL,NULL,'(985)867-3500',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(190,1,'1',NULL,'0992629398','ALMAPET SA',NULL,'ALMAPET SA',NULL,'ZUKELMAN','ROBERTO',NULL,'(593)4-210-7055',NULL,NULL,'GUAYAQUIL',NULL,'ECUADOR',NULL,'Ave Jose Joaquin Orrantea  Edificio Equilibri',NULL,NULL,'(593)4-210-7055',NULL,'SF',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,'CONTRALOR@ALMAPET.EC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(191,1,'1',NULL,'9926293980','GREEN PLANET SEAFOOD',NULL,'GREEN PLANET SEAFOOD',NULL,'CARVAJAL','GABRIEL',NULL,'(954)526-6373',NULL,NULL,'MIAMI LAKES','FL','USA','33014','5979 NW 151 St',NULL,NULL,'(954)526-6373',NULL,'SF',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,'GCARVAJAL63@YAHOO.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(192,1,'1',NULL,'455388598','ZUGGS LLC',NULL,'ZUGGS LLC',NULL,'ZUKELMAN','ROBERTO','ZUKELMAN','(813)477-9716',NULL,NULL,'ODESSA','FL','USA','33556','11430 Trotting Down Drive',NULL,NULL,'(813)477-9716',NULL,'SF',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,'ROBERTO@ZUGGSLL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(193,1,'1',NULL,NULL,'AGROINGENIERIA NACIONAL P. R.',NULL,'AGROINGENIERIA NACIONAL P. R.',NULL,NULL,NULL,NULL,'(33)383-93114',NULL,NULL,'ACATLAN DE J',NULL,'MEXICO','45700','Camino antiguo a la estacion No. 200 Acatlan',NULL,NULL,'(33)383-93114',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(194,1,'1',NULL,NULL,'RANCHO CHACXUL SA DE CV',NULL,'RANCHO CHACXUL SA DE CV',NULL,'BARTOLOME','RAMON',NULL,'(754)484-5981',NULL,NULL,'MERIDA',NULL,'MEXICO','97138','C 24 #183 X 23B SAN PEDRO CHOLUL',NULL,NULL,'(754)484-5981',NULL,'IAE',NULL,'002',NULL,NULL,NULL,'B&D',NULL,NULL,'RAMONBARTOLOME@MSN.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(195,1,'1',NULL,NULL,'TERRA PRODUCE CONNECTION CORP',NULL,'TERRA PRODUCE CONNECTION CORP',NULL,'VELEZ','VIRNALISI',NULL,'(305)519-7284',NULL,NULL,'MIAMI','FL','USA','33182','6745 SW 132 AVE UNIT #206',NULL,NULL,'(305)519-7284',NULL,'I-W',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,'VIRNALISIVELEZ@HOTMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(196,1,'1',NULL,NULL,'NOVACAPRE',NULL,'NOVACAPRE',NULL,'CASTELLANOS','LOURDES',NULL,'(0155) 5317-5650',NULL,NULL,'TULTEPEC',NULL,'MEXICO','54960','Calle Av. 2 de Marzo No. 100, Col San Juan',NULL,NULL,'(0155)5317-5650',NULL,'I3T',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'LOURDES.CASTELLANOS@NOVACAPRE.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(197,1,'1',NULL,NULL,'AUTOMOVILISTICA VERACRUZANA',NULL,'AUTOMOVILISTICA VERACRUZANA',NULL,'GAYTAN','JUAN',NULL,'(52)229-923-1900',NULL,NULL,'VERACRUZ',NULL,'MEXICO','91919','Ave. Jose Maria La Fragua 2100, FRAAC, Reform',NULL,NULL,'52-2299231900',NULL,'I3T',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'JGAYTAN@FORDVERACRUZ.COM.MEX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(198,1,'1',NULL,NULL,'GRADALL INDUSTRIES',NULL,'GRADALL INDUSTRIES',NULL,'NORMAN','MICHAEL',NULL,'(330)339-2211',NULL,NULL,'NEW PHILADEL','OHIO','USA','44663','406 MILL AVE SW',NULL,NULL,'(330)339-2211',NULL,'I3T',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(199,1,'1',NULL,NULL,'MEDIDORES IND. Y MED. \"MIYMSA\"',NULL,'MEDIDORES IND. Y MED. \"MIYMSA\"',NULL,'MARQUEZ PONCE','ROBERTO',NULL,'(0155)565-80766',NULL,NULL,'COYOACAN','MEXICO','MEXICO','04030','Americas 181 Barrio San Lucas',NULL,NULL,'(0155)565-80766',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'VENTAS@MEDIDORES.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(200,1,'1',NULL,NULL,'SODICOR S.A.',NULL,'SODICOR S.A.',NULL,'VERGARA','NELSON','GILBERT','(593)4 282-46556','(593)9 845-64242',NULL,'SAMBORONDON',NULL,'ECUADOR',NULL,'CIUDADELA ENTRERIOS MZ. C1 VILLA13',NULL,NULL,'593-4-28246556',NULL,'SF',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,'NELSONVERVAL@HOTMAIL.COM','ERIKAGILBERT78@HOTMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(201,1,'1',NULL,NULL,'HOSPITEC SA DE CV',NULL,'HOSPITEC SA DE CV',NULL,'MEJIA','HECTOR',NULL,'(504)9933-5173',NULL,NULL,'TEGUCIGALPA',NULL,'HONDURAS','00000','AVEIDA CORUñA #717',NULL,NULL,'(504)9933-5173',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'HECTOR.MEJIA@HOSPITECHN.ORG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(202,1,'1',NULL,NULL,'EASYBUY S.A',NULL,'EASYBUY S.A',NULL,'RESTREPO','CARLOS',NULL,'(593)99-2800663',NULL,NULL,'QUITO',NULL,'ECUADOR','00000','MARIANA DE JESUS 0E6 Y LA GRANJA CASA21B PB31',NULL,NULL,'(593)99-2800663',NULL,'IAE',NULL,'003',NULL,NULL,NULL,'B&D',NULL,NULL,'ECUADOR.ESABUY@GMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(203,1,'1',NULL,NULL,'ALCANCE OPERADOR LOGISTICO SAS',NULL,'ALCANCE OPERADOR LOGISTICO SAS',NULL,'GUZMAN AYALA','JOSE ANDRES',NULL,'(57)317-383-1213',NULL,NULL,'CALI',NULL,'COLOMBIA','00000','CALLE 13A #100-35 OFICINA 411',NULL,NULL,'(57)317-383-1213',NULL,'IAE',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,'JAGUZMAN@ALCANCECOMERCIAL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(204,1,'1',NULL,NULL,'JW EXPORTACIONES SAC',NULL,'JW EXPORTACIONES SAC',NULL,'MORENO GALVEZ','ROGER',NULL,'(675)4721 593-8137',NULL,NULL,'CORAL SPRING','FL','USA','33076','10336 NW 53RD COURT',NULL,NULL,'(675) 4721 593-8137',NULL,'IAE',NULL,'002',NULL,NULL,NULL,'B&D',NULL,NULL,'ADMINISTRACION@JWEXPOTACIONES.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(205,1,'1',NULL,NULL,'DISTRICT PRODUCE INC',NULL,'DISTRICT PRODUCE INC',NULL,'LOPEZ','FELIPE',NULL,'(954)214-9654',NULL,NULL,'FORT LAUDERD','FL','USA','33322','8361 NW 28TH STREET',NULL,NULL,'(954)214-9654',NULL,'I-W',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,'FELIPE@DISTRICPRODUCE.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(206,1,'1',NULL,NULL,'ONCOSALUD S.A.C.',NULL,'ONCOSALUD S.A.C.',NULL,'GOICOCHEA DE BENITO','FRANCISCO',NULL,'(614)6161-2053500',NULL,NULL,'LIMA',NULL,'PERU','00000','AVE. GUARDIA CIVIL 571',NULL,NULL,'(614)6161-2053500',NULL,'ME',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,'FGOICOCHEA@AUNA.PE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(207,1,'1',NULL,NULL,'SC PORTO CHILE',NULL,'SC PORTO CHILE',NULL,'SOBARZO','ASTRID',NULL,'(567)527-4613',NULL,NULL,'CURICO',NULL,'CHILE','3340000','Orlando Gonzales # 0922 Brisas Del Boldo',NULL,NULL,'(567)527-4613',NULL,'IAE',NULL,'002',NULL,NULL,NULL,'B&D',NULL,NULL,'astridsobarzo@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(208,1,'1',NULL,NULL,'SOLUCAPITAL',NULL,'SOLUCAPITAL',NULL,'GOMEZ','PATRICIA',NULL,'571-329-2079',NULL,NULL,'MIAMI','FL','USA','33131','1200 Brickell Ave Suite #1950',NULL,NULL,'305-777-3574',NULL,'FIN',NULL,'002',NULL,NULL,NULL,'I',NULL,NULL,'pgomez@solucapital.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(209,1,'1',NULL,NULL,'SOCIEDAD MARTINEZ Y LAGOS LIMI',NULL,'SOCIEDAD MARTINEZ Y LAGOS LIMI',NULL,'MARTINEZ LAGOS','JORGE',NULL,'(041)218-2500',NULL,NULL,'Coronel','Region del Biobio','CHILE',NULL,'CALLE CENTRAL LOTE 9-D PARQUE INDUSTRIAL ESCU',NULL,NULL,'(041)218-2500',NULL,'SF',NULL,'002',NULL,NULL,NULL,'B&D',NULL,NULL,'info@mardelagos.cl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(210,1,'1',NULL,NULL,'MORROCOY LLC',NULL,'MORROCOY LLC',NULL,'HERRERA','HUGO',NULL,'(305)861-8470',NULL,NULL,'BAY HARBOR I','FL','USA','33154','9800 W. BAY HARBOR DR #507',NULL,NULL,'(305)861-8470',NULL,'SF',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,'MAUICORP@AOL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(211,1,'1',NULL,NULL,'ANDINA DE ALMIDONES S.A.S.',NULL,'ANDINA DE ALMIDONES S.A.S.',NULL,'ESCOBAR','FRANCISCO',NULL,'313-789-4924',NULL,NULL,'CALI',NULL,'COLOMBIA',NULL,'AVE. 3FN # 55-120 SUITE 120',NULL,NULL,'(313)789-4924',NULL,'IAE',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(212,1,'1',NULL,'320414505','LOGISTIC ALLIANCE SERVICES LLC',NULL,'LOGISTIC ALLIANCE SERVICES LLC',NULL,'Borrero','Francisco','Reyes','3054681489','3054681489',NULL,'MEDLY','FL','USA','33166','8373 NW 74 St',NULL,NULL,'3054681489',NULL,'I-W',NULL,'003',NULL,NULL,NULL,'B&D',NULL,NULL,'fborrero@logisticalliance.com','mreyes@logisticalliance.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(213,1,'1',NULL,'299561916','INDUSTRIAL MINERA ORSOMARSO CA',NULL,'INDUSTRIAL MINERA ORSOMARSO CA',NULL,'GIANNOTTI','MARCOS',NULL,'58-0212-3732450',NULL,NULL,'ESTADO MIRAN',NULL,'VENEZUELA',NULL,'AV. VENEZUELA, TREBOL COUNTRY 1, SAN ANTONIO,',NULL,NULL,'58-414-3269666',NULL,'I-M',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,'MARCOSGIANNOTTI@GMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(215,1,'1',NULL,NULL,'DTEC.ORG SA DE CV',NULL,'DTEC.ORG SA DE CV',NULL,'SALGADO','JUAN',NULL,'(81)195-60946',NULL,NULL,'MEXICO',NULL,'MEXICO','89337','CALLE ROBERTO FIERRO 501 NUEVO AEROPUERTO, TA',NULL,NULL,'(81)195-605946',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(216,1,'1',NULL,'0992137924','AGRICOLA MONTEBELLO S.A.',NULL,'AGRICOLA MONTEBELLO S.A.',NULL,'Campos','Ricardo',NULL,'011 (593) 4211 0338',NULL,NULL,'Guayaquil',NULL,'ECUADOR',NULL,'Km 63 Via Manabi',NULL,NULL,'011 (593) 4211 0338',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'B&D',NULL,NULL,NULL,'RCAMPOS@SOITGAR.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(218,1,'1',NULL,NULL,'GEG MERCANTIL S.A.',NULL,'GEG MERCANTIL S.A.',NULL,'GONZALEZ','ANGELA',NULL,'(57)2-665-7589',NULL,NULL,'CALI',NULL,'COLOMBIA','00000','AVE. 8N #25 - 82 OFICINA 3017',NULL,NULL,'(57)2-665-7589',NULL,'IAE',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,'gerencia@gegmercantilsas.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(219,1,'1',NULL,NULL,'SMART CAPITAL FACTORING SOLUTI',NULL,'SMART CAPITAL FACTORING SOLUTI',NULL,'HIDALGO','ERNESTO','TORRES','(305) 801-3030',NULL,NULL,'FORT LAUDERD','FL','USA','33301','110 EAST BROWARD BLVD STE. 1700',NULL,NULL,'(305) 801-3030',NULL,'FIN',NULL,'004',NULL,NULL,NULL,'B&D',NULL,NULL,'EHIDALGO99@LIVE.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(220,1,'1',NULL,NULL,'VALLEY FOOD PRODUCE, INC',NULL,'VALLEY FOOD PRODUCE, INC',NULL,'PARTRIDGE','DAVID',NULL,NULL,NULL,NULL,'DORAL','FL','USA','33166','8325 N.W. 56TH STREET #4',NULL,NULL,'(786) 615-6899',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(221,1,'1',NULL,NULL,'EMPRESAS Y-NUINA, NC',NULL,'EMPRESAS Y-NUINA, NC',NULL,'MANGUAL','ENRIQUE',NULL,'(787) 256-1515',NULL,NULL,'CANOVANAS','PR','USA','00729','CARRERA #185 KM 0.8',NULL,NULL,'(787) 256-1515',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(222,1,'1',NULL,NULL,'BIOABAST SA DE CV',NULL,'BIOABAST SA DE CV',NULL,'Navarrete Paz','Eduardo',NULL,'01152554444476',NULL,NULL,'MEXICO',NULL,'MEXICO',NULL,'Camino Real a Xichitemec # 108 ColNoria Del X',NULL,NULL,'01152554444476',NULL,'ME',NULL,'001',NULL,NULL,NULL,'D',NULL,NULL,'Eduardo.navarrete@bioabast.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(223,1,'1',NULL,NULL,'KPI ULTRASONIDOS',NULL,'KPI ULTRASONIDOS',NULL,'RAMIREZ','DAGOBERTO',NULL,'52-33-36371104',NULL,NULL,'GUADALAJARA',NULL,'MEXICO','44130','DUQIE DE RIVAS 207 ARCOS VALLARTA',NULL,NULL,'52-33-36371104',NULL,'I-P',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'dramirez@kpiultrasonido.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(224,1,'1',NULL,NULL,'AMERICAN FOOD TRADING CORP',NULL,'AMERICAN FOOD TRADING CORP',NULL,'Wiideman','Eric',NULL,'(734) 418 2729',NULL,NULL,'Tecumseh','MI','USA','49286','PO Box 35',NULL,NULL,'(734) 418 2729',NULL,'I2T',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,'ew@americanftc.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(225,1,'1',NULL,NULL,'COMERCIAL MULTIMAS LIMITADA',NULL,'COMERCIAL MULTIMAS LIMITADA',NULL,'LEYAN','FRANCISCO',NULL,NULL,NULL,NULL,'TALAGANTE','RM','CHILE',NULL,'BALMACEDA 921 OF. 324',NULL,NULL,'(59)9-9224-7667',NULL,'I-W',NULL,'002',NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(226,1,'1',NULL,NULL,'WHITE TOQUE, INC',NULL,'WHITE TOQUE, INC',NULL,'PACHECO','MARIO',NULL,'(201) 863-2885',NULL,NULL,'Secaucus','NJ','USA','07094','11 Enterprise Ave. North',NULL,NULL,'(201) 863-2885',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(227,1,'1',NULL,NULL,'SOITGAR SA',NULL,'SOITGAR SA',NULL,'CAMPOS','RICARDO',NULL,'(593-4)21602536',NULL,NULL,'GUAYAQUIL','ECUADOR','ECUADOR',NULL,'KM 16 1/2 VIA DAULE',NULL,NULL,'(593-4)21602536',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(228,1,'1',NULL,NULL,'ANGEL A. TORRES',NULL,'ANGEL A. TORRES',NULL,'TORRES','ANGEL',NULL,'954-636-1673',NULL,NULL,'FORT LAUDERD','FL','USA','33301','110 E Broward Blvd. Suite 1700',NULL,NULL,'954-210-8619',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,'atorres@scfactoringsolution.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(229,1,'1',NULL,NULL,'DOOSAN CORPORATION INDUSTRIAL',NULL,'DOOSAN CORPORATION INDUSTRIAL',NULL,'Kwont','Elizabeth HJ','Han','82 2 3398 8617','82 2 3398 8546',NULL,'Incheon','Korea','KOREA','401-020','468 Injoong Ro, Dong-Gu,',NULL,NULL,'032 211 5000',NULL,'I-M',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(230,1,'1',NULL,'0991466436','FECORSA INDUSTRIAL Y COMERCIAL',NULL,'FECORSA INDUSTRIAL Y COMERCIAL',NULL,'Febres Cordero','Jaime','Frias','593999450555','59342813146 X 122',NULL,'Duran','Guayas','ECUADOR',NULL,'Km 3.5 Via Duran Boliche',NULL,NULL,'5934 2 813 146',NULL,'I-W','13M','003',NULL,NULL,NULL,'B&D',NULL,NULL,'jfcpresidencia@fercorsa.com','jfrias@fercorsa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(231,1,'1',NULL,NULL,'HIMOINSA S.L.',NULL,'HIMOINSA S.L.',NULL,'MERO','ROMINA',NULL,'54-11-4896-2717','54-11-4896-2717',NULL,'MURCIA','SPAIN',NULL,NULL,'30730 SAN JAVIER , MURCIA CTRA MURCIA, SDAN J',NULL,NULL,'54-11-4896-2717',NULL,'I3T',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,'rmero@himoinsa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(232,1,'1',NULL,NULL,'PROMED S.A.',NULL,'PROMED S.A.',NULL,'Sanchez','Esther',NULL,'(507)303-3185',NULL,NULL,'PANAMA','CIUDAD DE PANAMA','PANAMA','0816-01755','PARQUE INDUS. COSTA DEL ESTE, CALLE 2DA. EDIF',NULL,NULL,'(507)303-3185',NULL,'I-H',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'esanchez@promed.com.pa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(233,1,'1',NULL,NULL,'MARVEL INTERNATIONAL INC',NULL,'MARVEL INTERNATIONAL INC',NULL,'B.FERNNADEZ & HNOS, INC','B.FERNNADEZ & HNOS, INC',NULL,'787-288-7272','787-288-7272',NULL,'GUAYNABO','PR','PUERTO RICO','00968','AMELIA INDUSTRIAL PARK #7 BEATRIZ STREET',NULL,NULL,'787-288-7272',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(234,1,'1',NULL,NULL,'CAPE FLORIDA TRADING, CORP',NULL,'CAPE FLORIDA TRADING, CORP',NULL,'ORTIZ','TONY',NULL,'305-255-3231',NULL,NULL,'MIAMI','FL','USA','33186','1331 SW 131 STREET',NULL,NULL,'305-255-3231',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,'capeflorida@bellsouth.net',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(235,1,'1',NULL,NULL,'ACF IV',NULL,'ACF IV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(236,1,'1',NULL,'455416702','OCEAN KIMGDOM',NULL,'OCEAN KIMGDOM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'New Jersey','New Jersey','USA','08085','300 Fow Ave Swedesboro',NULL,NULL,'856 241 8882',NULL,'SF',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(237,1,'1',NULL,NULL,'JAT POWER LLC',NULL,'JAT POWER LLC',NULL,'HERNANDEZ','CAROLINA',NULL,'786 493 6857','786 493 6857',NULL,'Monroe','LA','USA','71201','3124 Kilpatrick Blvd',NULL,NULL,'786 493 6857',NULL,'I-L',NULL,'003',NULL,NULL,NULL,'DS',NULL,NULL,'chernandez@jatpower.com','chernandez@jatpower.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(238,1,'1',NULL,NULL,'ECOMED EQUIPOS Y CONSUMIBLES M',NULL,'ECOMED EQUIPOS Y CONSUMIBLES M',NULL,NULL,NULL,NULL,'(614) 423-4500','(614) 423-4500',NULL,'Chihuahua','CHIHUAHUA','MEXICO','31200','José Eligio Muñoz Núm. 1906',NULL,NULL,'(614) 423-4500',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'info@detecto.mx','info@medicalplus.com.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(239,1,'1',NULL,NULL,'PROMOTORA DE SERVICIOS Y MERCA',NULL,'PROMOTORA DE SERVICIOS Y MERCA',NULL,'RAMIREZ CARAVEO','NANCY',NULL,'614 290-4168','614-199-6938',NULL,'CHIHUAHUA','MEXICO',NULL,'31203','DEZA Y ULLOA 908 LOCAL 3               SAN FE',NULL,NULL,'614 290-4168',NULL,'I-H',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(240,1,'1',NULL,'0991509593','NATECUAS.A.',NULL,'NATECUAS.A.',NULL,'FREYRE','NANCY',NULL,'593.9.742319','593.9.99973126',NULL,'GUAYAQUIL',NULL,'ECUADOR',NULL,'NATECUAS.A.',NULL,NULL,'593.9.742319',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,'CONTACTO@NATECUA.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(241,1,'1',NULL,NULL,'ICAT FOOD S.P.A.',NULL,'ICAT FOOD S.P.A.',NULL,NULL,NULL,NULL,'010.8398.227','010.8398.227',NULL,'GENOVA',NULL,'ITALIA',NULL,'16122 GENOVA',NULL,NULL,'010.8398.227',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(242,1,'1',NULL,'990370248','FRUTERA DEL LITORAL USA LLC',NULL,'FRUTERA DEL LITORAL USA LLC',NULL,'DIAZ','HUGO',NULL,'305.593.8019','305.593.8019',NULL,'MIAMI','FL','USA','33122','3400 NW 74th Ave',NULL,NULL,'305.593.8019',NULL,'IAE',NULL,'002',NULL,NULL,NULL,'B&D',NULL,NULL,'hdiaz@grupo-rueda.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(243,1,'1',NULL,NULL,'TAJ FOODS LTD.',NULL,'TAJ FOODS LTD.',NULL,NULL,NULL,NULL,'208-518-2742','208-518-2742',NULL,'Barking','Essex','UNITED KINGDOM','IG11','Unit 4 Cromwell Business Center',NULL,NULL,'208-518-2742',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,'sales@tajfoods.com','sales@tajfoods.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(244,1,'1',NULL,NULL,'VIENNATONE Y CIA',NULL,'VIENNATONE Y CIA',NULL,NULL,NULL,NULL,'022252708','022252708',NULL,'QUITO',NULL,'ECUADOR',NULL,'AV. 6 N34-45 Y CHECOESLOVAQUIA',NULL,NULL,'022252708',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'viennatone@cav.com.ec','viennatone@cav.com.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(245,1,'1',NULL,NULL,'HOVA HEALTH SAPI DE CV',NULL,'HOVA HEALTH SAPI DE CV',NULL,'DIAZ','JUAN JOSE',NULL,'011.55.5004.4150','011.55.5004.4150',NULL,'SANTA FE ALV','DISTRITO FEDERAL','MEXICO','01210','GUILLERMO GONZALEZ CAMARENA N. 1450 PISO 3A,',NULL,NULL,'011.55.5004.4150',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'juan.diaz@hovahealth.com','juan.diaz@hovahealth.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(246,1,'1',NULL,NULL,'JOSE CUESTA VASCONEZ',NULL,'JOSE CUESTA VASCONEZ',NULL,'CUESTA VASCONEZ','JOSE',NULL,NULL,NULL,NULL,'Ambato',NULL,'ECUADOR',NULL,'reyna claudias #2 - 187',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,'jcuestav@plasticaucho.com',NULL,NULL,NULL,NULL,NULL,NULL,'A3112418',NULL,NULL,'A'),(247,1,'1',NULL,'11061888','ERILLAM, S.A DE C.V.',NULL,'ERILLAM, S.A DE C.V.',NULL,'ALBA JIMENEZ','JORGE ERNESTO',NULL,'7773250917','7773250917',NULL,'TEMIXCO','MORELOS','MEXICO','62580','PLUTARCO ELIAS CALLES 585 SECCION TROJE, CASA',NULL,NULL,'7773250917',NULL,'ME',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,'direccion@erillam.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(248,1,'1',NULL,NULL,'SERVICIOS DE SALUD DE CHIHUAHU',NULL,'SERVICIOS DE SALUD DE CHIHUAHU',NULL,'FLORES GONZALEZ','JUAN CARLOS',NULL,'614-439-9900, EXT 21503','614-439-9900, EXT. 21503',NULL,NULL,'MEXICO',NULL,NULL,NULL,NULL,NULL,'614-439-9900, EXT 21503',NULL,'I-H',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(250,1,'1',NULL,NULL,'JURISDICCION I. CHIHUAHUA',NULL,'JURISDICCION I. CHIHUAHUA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(251,1,'1',NULL,NULL,'HOSP. GRAL. DR. SALVADOR ZUBIRAN.  FARMACIA',NULL,'HOSP. GRAL. DR. SALVADOR ZUBIRAN.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(252,1,'1',NULL,NULL,'CENTRO ESTATAL DE ONCOLOGIA.  FARMACIA',NULL,'CENTRO ESTATAL DE ONCOLOGIA.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(253,1,'1',NULL,NULL,'CENTRO ESTATAL DE ONCOLOGIA.  GOBIERNO DE LA',NULL,'CENTRO ESTATAL DE ONCOLOGIA.  GOBIERNO DE LA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(254,1,'1',NULL,NULL,'HOSP. GRAL. DR. SALVADOR ZUBIRAN.  GOBIERNO D',NULL,'HOSP. GRAL. DR. SALVADOR ZUBIRAN.  GOBIERNO D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(255,1,'1',NULL,NULL,'HOSP. INTEGRAL N. CASAS GRANDES',NULL,'HOSP. INTEGRAL N. CASAS GRANDES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(256,1,'1',NULL,NULL,'HOSPITAL GENERAL PARRAL.  FARMACIA',NULL,'HOSPITAL GENERAL PARRAL.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(257,1,'1',NULL,NULL,'HOSPITAL GENERAL PARRAL.  GOBIERNO DE LA UNID',NULL,'HOSPITAL GENERAL PARRAL.  GOBIERNO DE LA UNID',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(258,1,'1',NULL,NULL,'HOSP. REGIONAL CAMARGO.  FARMACIA',NULL,'HOSP. REGIONAL CAMARGO.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(259,1,'1',NULL,NULL,'HOSP. REGIONAL CAMARGO.  GOBIERNO DE LA UNIDA',NULL,'HOSP. REGIONAL CAMARGO.  GOBIERNO DE LA UNIDA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(260,1,'1',NULL,NULL,'HOSPITAL INFANTIL DE JUAREZ.  FARMACIA',NULL,'HOSPITAL INFANTIL DE JUAREZ.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(261,1,'1',NULL,NULL,'JURISDICCION II. JUAREZ',NULL,'JURISDICCION II. JUAREZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(262,1,'1',NULL,NULL,'HOSP. INTEGRAL GOMEZ FARIAS.  GOBIERNO DE LA',NULL,'HOSP. INTEGRAL GOMEZ FARIAS.  GOBIERNO DE LA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(263,1,'1',NULL,NULL,'HOSP. GRAL. DR. JAVIER RAMIREZ TOPETE.  FARMA',NULL,'HOSP. GRAL. DR. JAVIER RAMIREZ TOPETE.  FARMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(264,1,'1',NULL,NULL,'HOSP. INTEGRAL GOMEZ FARIAS.  FARMACIA',NULL,'HOSP. INTEGRAL GOMEZ FARIAS.  FARMACIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(265,1,'1',NULL,NULL,'HOSP. GRAL. DR. JAVIER RAMIREZ TOPETE.  GOBIE',NULL,'HOSP. GRAL. DR. JAVIER RAMIREZ TOPETE.  GOBIE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(266,1,'1',NULL,NULL,'HOSPITAL INFANTIL CD. JUAREZ CHIH',NULL,'HOSPITAL INFANTIL CD. JUAREZ CHIH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(267,1,'1',NULL,NULL,'VINCENT B. ZANINOVICH AND SONS',NULL,'VINCENT B. ZANINOVICH AND SONS',NULL,'GONZALEZ','JUSTIN',NULL,'661-725-2497','661-725-2497',NULL,'RICHGROVE','CALIFORNIA','USA','93261','P.O. BOX 1000 - RICHGROVE, CA 93261-1000',NULL,NULL,'661-725-2497',NULL,'I-W',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(268,1,'1',NULL,NULL,'FIRST FRUIT MARKETING',NULL,'FIRST FRUIT MARKETING',NULL,'MUNGUIA','ARMANDO',NULL,NULL,NULL,NULL,NULL,'CALIFORNIA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-W',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(269,1,'1',NULL,NULL,'IM EX TRADING COMPANY',NULL,'IM EX TRADING COMPANY',NULL,'MAHONEY','JIM',NULL,NULL,NULL,NULL,'WASHINGTON',NULL,'USA','98908','117 NORTH 50TH AVE., YAKIMA, WASHINGTON 98908',NULL,NULL,NULL,NULL,'I-W',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(270,1,'1',NULL,NULL,'STEVCO',NULL,'STEVCO',NULL,'TORCZON','MIKE',NULL,NULL,NULL,NULL,NULL,NULL,'USA',NULL,NULL,NULL,NULL,NULL,NULL,'I-W',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(271,1,'1',NULL,NULL,'MONTEMAYOR PRODUCE',NULL,'MONTEMAYOR PRODUCE',NULL,'MONTEMAYOR','GUADALUPE',NULL,NULL,'PO BOX 312,',NULL,'THERMAL','CALIFORNIA','USA',NULL,'P O BOX 312',NULL,NULL,NULL,NULL,'I-W',NULL,'002',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(272,1,'1',NULL,NULL,'CORPORACION ALMOTEC S.A.',NULL,'CORPORACION ALMOTEC S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SAN JOSE','COSTA RICA','COSTA RICA',NULL,'ADENIL FELIPE BOGANTES, 250 METRO SUR Y 100 E',NULL,NULL,'50625285454',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(273,1,'1',NULL,'2140471300','MOTIDEL S.A.',NULL,'MOTIDEL S.A.',NULL,NULL,NULL,NULL,'598-2-514-00-37','598-2-514-00-37',NULL,'MONTEVIDEO','URUGUAY','URUGUAY',NULL,'OSWALDO CRUZ 4705',NULL,NULL,'598-2-514-00-37',NULL,'I-W',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(274,1,'1',NULL,'1792327512','DISTRIFRUIT',NULL,'DISTRIFRUIT',NULL,'Andrade','Santiago',NULL,'011.5939.88052478','011.5939.88052478',NULL,'Quito','Ecuador','ECUADOR',NULL,'Alemania 514 y Vancouver',NULL,NULL,'011.5939.88052478',NULL,'IAE',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(275,1,'1',NULL,'0991149406','EXPORTACIONES DURAEXPORTA S.A',NULL,'EXPORTACIONES DURAEXPORTA S.A',NULL,'Ramirez','Hugo',NULL,'011.5934.5012200','011.5934.5012200',NULL,'GUAYAQUIL',NULL,'ECUADOR',NULL,'KM. 14.5  VIA A DAULE',NULL,NULL,'011.5934.5012200',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,'hramirez@durexporta.com','hramirez_l@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(276,1,'1',NULL,NULL,'C. KENNETH IMPORTS, INC',NULL,'C. KENNETH IMPORTS, INC',NULL,'RAMIREZ','HUGO',NULL,'718-378-8400','718-378-8400',NULL,'BRONX','NY','USA',NULL,'250  COSTER STREET',NULL,NULL,'718-378-8400',NULL,'IAE',NULL,'004',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(277,1,'1',NULL,NULL,'RIVERMAID TRADING COMPANY',NULL,'RIVERMAID TRADING COMPANY',NULL,NULL,NULL,NULL,'209-369-3586','209-369-3586',NULL,'LODI','CALIFORNIA','USA','95241','PO BOX 350',NULL,NULL,'209-369-3586',NULL,'IAE',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(278,1,'1',NULL,NULL,'COLUMBIA MARKETING INTERNATION',NULL,'COLUMBIA MARKETING INTERNATION',NULL,NULL,NULL,NULL,'509-663-1955','509-663-1955',NULL,'WENATCHE','WA','USA','98801','2525 EUCLID AVE.',NULL,NULL,'509-663-1955',NULL,'I-W',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(279,1,'1',NULL,NULL,'TORPLAS S.A.',NULL,'TORPLAS S.A.',NULL,'DIAZ-GRANADOS','JUAN JAVIER',NULL,'593 4 2113141','593 4 2113141',NULL,'GUAYAQUIL','ECUADOR','ECUADOR',NULL,'Km 10,5 Via a Daule, Lotizacion Inmaconsa,',NULL,NULL,'593 4 2113141',NULL,'I-M',NULL,'001',NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(280,1,'1',NULL,NULL,'BORTON & SONS, INC.',NULL,'BORTON & SONS, INC.',NULL,NULL,NULL,NULL,'(509) 966-3905','(509) 966-3905',NULL,'YAKIMA','WASHINGTON','USA',NULL,'2550 BORTON RD.',NULL,NULL,'(509) 966-3905',NULL,'I-W',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(282,1,'1',NULL,NULL,'RULOP CORPORATION',NULL,'RULOP CORPORATION',NULL,'RUBIO SALGADO','GONZALO EDUARDO',NULL,'593-998322159',NULL,NULL,'ROAD TOWN','TORTOLA','BRITISH VIRGIN ISLAN',NULL,'TRIDENT CHAMBERS WICKHAMS CAY ROAD TOWN',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,'grubio@termalimex.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(283,1,'1',NULL,NULL,'PV EQUIP',NULL,'PV EQUIP',NULL,NULL,NULL,NULL,'01156223677801','$4,709.06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$4,709.06',NULL,'I-H',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(284,1,'1',NULL,NULL,'TCG SOLE TRUST MEXICO 1',NULL,'TCG SOLE TRUST MEXICO 1',NULL,'Palacios','Mr. Charney',NULL,NULL,NULL,NULL,'London','UK','UNITED KINGDOM',NULL,'18 Soho Square, W1D 3QL',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(285,1,'1',NULL,NULL,'ADRIAN MORALES ROCHA',NULL,'ADRIAN MORALES ROCHA',NULL,'Morales','Adrian',NULL,NULL,NULL,NULL,'Mc Allen','TX','USA','78501','1209 South 10th Suite A 471',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'np4tampico@prodigy.net.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(286,1,'1',NULL,NULL,'TCG CAPITAL, LLC',NULL,'TCG CAPITAL, LLC',NULL,'JARRIN','ANTHONY',NULL,'(305) 965-0928',NULL,NULL,'MIAMI','FLORIDA','USA','33131','801 Brickell ave. Suite 942',NULL,NULL,'(305) 965 - 0928',NULL,'FIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(287,1,'1',NULL,NULL,'ACF V US TRADE RECEIVABLES',NULL,'ACF V US TRADE RECEIVABLES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(288,1,'1',NULL,NULL,'SOCIEDAD EXP. TIERRA SUR SPA',NULL,'SOCIEDAD EXP. TIERRA SUR SPA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CURICO',NULL,'CHILE',NULL,'CURICO, CHILE',NULL,NULL,NULL,NULL,'IAE',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(289,1,'1',NULL,NULL,'J.R. ENTERPRISE OF PALM BEACH,',NULL,'J.R. ENTERPRISE OF PALM BEACH,',NULL,'Lora','Osiel',NULL,'561.294.1697',NULL,NULL,'Dania Beach','FL','USA','33312','2830 state Road 84, Unit 117-A',NULL,NULL,'561.294.1697',NULL,'I-M',NULL,'005',NULL,NULL,NULL,'B&D',NULL,NULL,'ttdsa@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(290,1,'1',NULL,NULL,'ENCHANTED HILL S.A.',NULL,'ENCHANTED HILL S.A.',NULL,'Bernardino','Ubaldino',NULL,'507-6236-9610',NULL,NULL,'Chiriqui',NULL,'PANAMA',NULL,'Calle la concepción, Calle principal, distrit',NULL,NULL,'507-6236-9610',NULL,'I-M',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,'ubaldinobernardino@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(291,1,'1',NULL,NULL,'INVERSIONES TRUJILLO FLORES',NULL,'INVERSIONES TRUJILLO FLORES',NULL,'Flores','Manuel',NULL,'505-7756-0075',NULL,NULL,NULL,NULL,'NICARAGUA',NULL,'Km 28.5 a Masaya, Granada',NULL,NULL,'505-7756-0075',NULL,'I-M',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,'gerencia@inversionestrujilloflores.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(292,1,'1',NULL,NULL,'INVERSIONES SANTA MARIA Y CIA.',NULL,'INVERSIONES SANTA MARIA Y CIA.',NULL,'Santamaria','Ivan',NULL,'505-8720-2600',NULL,NULL,'Masaya',NULL,'NICARAGUA',NULL,'Masaya, contiguo a gasolinera Petric',NULL,NULL,'505-8720-2600',NULL,'I-M',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,'ivansantamariabaca@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(293,1,'1',NULL,NULL,'MG INVESTMENT',NULL,'MG INVESTMENT',NULL,NULL,NULL,NULL,'305-466-8188','305-466-8188',NULL,'Coral Gables','Florida','USA','33134','201 Alhambra Circle, Suite 514',NULL,NULL,'305-466-8188',NULL,'I-R',NULL,NULL,NULL,NULL,NULL,'I_D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(294,1,'1',NULL,NULL,'THE CANNAREGIO GROUP LLC',NULL,'THE CANNAREGIO GROUP LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MIAMI','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(295,1,'1',NULL,NULL,'CENTRAL-LAW QUIROS ABOGADOS',NULL,'CENTRAL-LAW QUIROS ABOGADOS',NULL,'Sanchez','Guillermo',NULL,'506 2224 7800',NULL,NULL,'San Jose',NULL,'COSTA RICA',NULL,NULL,NULL,NULL,'506 2224 7800',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,'gsanchez@central-law.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(296,1,'1',NULL,NULL,'MONASH CAPITAL INVESTMENT LTD.',NULL,'MONASH CAPITAL INVESTMENT LTD.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(297,1,'1',NULL,NULL,'WAWONA MOONLIGHT GLOBAL LLC',NULL,'WAWONA MOONLIGHT GLOBAL LLC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CUTLER','CA','USA','93615','12133 Ave., 408,',NULL,NULL,'5596379915',NULL,'IAE',NULL,'005',NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(298,1,'1',NULL,NULL,'GRUPO COREBA S.A.',NULL,'GRUPO COREBA S.A.',NULL,'CONCEPCION','YESIKA','CONCEPCION',NULL,'011.507.774.1872',NULL,'DAVID','CHIRIQUI','PANAMA',NULL,'CALLE B NORTE Y AVE. DOMINGO DIAS',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(299,1,'1',NULL,NULL,'CV CREDIT INC.',NULL,'CV CREDIT INC.',NULL,'GAVIRIA','MARTIN',NULL,NULL,NULL,NULL,'MIAMI','FLORIDA','USA','33131','1101 Brickell Ave #704S',NULL,NULL,'305-792-2366',NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'BK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(300,1,'1',NULL,NULL,'RIVERTSA S.A.',NULL,'RIVERTSA S.A.',NULL,'ALVAREZ','MARCO',NULL,'011.593.4.2280.333',NULL,NULL,'GUAYAQUIL',NULL,'ECUADOR',NULL,'Kennedy Norte. Edif. Plaza Center, Piso #8 Of',NULL,NULL,'011.593.4.2280.333',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(301,1,'1',NULL,NULL,'CLUB SPORT EMELEC',NULL,'CLUB SPORT EMELEC',NULL,'NASSIB JOSE','NEME ANTON',NULL,'011.593.4.241.6000',NULL,NULL,'GUAYAQUIL','GUAYAS','ECUADOR',NULL,'Av. Quito y calles General Gómez, Pío Montufa',NULL,NULL,'+593-4-2416000',NULL,'I2E',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(302,1,'1',NULL,NULL,'OLYMPIA CAPITAL INVESTMENT LLC',NULL,'OLYMPIA CAPITAL INVESTMENT LLC',NULL,'Alvarez Lofruscio','Marco A.',NULL,'305.280.6180',NULL,NULL,'Miami','Florida','USA','33137','250 NE 25th Street Suite #1709',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'malvarez@rivertsa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(303,1,'1',NULL,NULL,'GLOBAL OPPORTUNITIES CAPITAL F',NULL,'GLOBAL OPPORTUNITIES CAPITAL F',NULL,'Lopez','Fausto Rodrigo',NULL,'9542570514',NULL,NULL,'Miami','Florida','USA','33130','40 SW 13th Street, Suite 102',NULL,NULL,'9542570514',NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'I_D',NULL,NULL,'rodlop@msn.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(304,1,'1',NULL,NULL,'VIPAL S.A.',NULL,'VIPAL S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ASUNCION',NULL,'PARAGUAY',NULL,'BRASIL #123 ESQUINA MASRICAL LOPEZ ASUNCION 1',NULL,NULL,'011595981406199',NULL,'ME',NULL,'001',NULL,NULL,NULL,'DS',NULL,NULL,'maria.pallares@med.ge.com','maria.pallares@med.ge.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(305,1,'1',NULL,NULL,'MARIA FABIOLA ORGANISTA CARDEN',NULL,'MARIA FABIOLA ORGANISTA CARDEN',NULL,'ORGANISTA CARDENAS','MARIA FABIOLA',NULL,NULL,NULL,NULL,'TAMPICO',NULL,'MEXICO',NULL,'Juan Casiano 103 PTE. Fracc. Vista Hermosa',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gaao@prodigy.net.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(306,1,'1',NULL,NULL,'TCG MULTI-TRUST 1',NULL,'TCG MULTI-TRUST 1',NULL,'ORGANISTA CARDENAS','MARIA FABIOLA',NULL,NULL,NULL,NULL,'TAMPICO',NULL,'MEXICO','89119','Juan Casiano 103 PTE. Fracc. Vista Hermosa Ta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(307,1,'1',NULL,NULL,'EMPRESA TEST',NULL,'EMPRESA TEST',NULL,NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'33414','test',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(308,1,'1',NULL,NULL,'CLAUDIA ALEJANDRA MENDIA',NULL,'CLAUDIA ALEJANDRA MENDIA',NULL,'MENDIA CABALLERO','CLAUDIA ALEJANDRA',NULL,NULL,NULL,NULL,'TAMPICO','TAM','MEXICO','89110','VILLA VERA 121-e PASEO LOMAS DE ROSALES ,  FR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CLAUMENDIA@HOTMAIL.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(309,1,'1',NULL,NULL,'SIEMENS HEALTHCARE DIAGNOSTICS',NULL,'SIEMENS HEALTHCARE DIAGNOSTICS',NULL,'VELAZQUEZ','LAURA MARCELA',NULL,NULL,NULL,NULL,NULL,'MEXICO DF','MEXICO','11560','EJERCITO NACIONAL NO. 350 PISO 3. COL.POLANCO',NULL,NULL,NULL,NULL,'I-H',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(310,1,'1',NULL,NULL,'INVERSIONES UBAKOY, S.A.',NULL,'INVERSIONES UBAKOY, S.A.',NULL,'GONSALEZ','ARISTIDES',NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,'CORREGIMIENTO DE LA CONCEPCION, DISTRITO DE B',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(311,1,'1',NULL,NULL,'JOSE DE HOWITT',NULL,'JOSE DE HOWITT',NULL,'De Howitt','Jose',NULL,'011593992535460',NULL,NULL,'Ambato','Tungurahua','ECUADOR',NULL,'Ave Indoamerica Km 3 1/2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jdehowitt@vehicentro.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(312,1,'1',NULL,NULL,'VANPOY S.A.',NULL,'VANPOY S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MONTEVIDEO',NULL,'URUGUAY',NULL,NULL,NULL,NULL,NULL,NULL,'SF',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(313,1,'1',NULL,NULL,'ADC GROUP LLC',NULL,'ADC GROUP LLC',NULL,'CARABALLO','JOSE',NULL,NULL,NULL,NULL,'MIAMI','FL','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(314,1,'1',NULL,'8479899','PRODUCTOS JUANJO',NULL,'PRODUCTOS JUANJO',NULL,'OSPINA FRIAS','ORIEL',NULL,'01150764557680','01150764557680',NULL,'PANAMA',NULL,'PANAMA',NULL,'Playa Leona, La Mitra, Calle Paso Arena, Casa',NULL,NULL,'01150764557680',NULL,'SF',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(315,1,'1',NULL,NULL,'GRUPO PANALANG UNION INC',NULL,'GRUPO PANALANG UNION INC',NULL,'DE SANCTIS','VALERIO',NULL,'0115072248443',NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,'CORREGIMIENTP DE RIO ABAJO, URBANIZACION RIO',NULL,NULL,'0115072248443',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(316,1,'1',NULL,NULL,'EMPRESAS BARAHONA Y CASTRO, S.A. ( EMBAYCA, S',NULL,'EMPRESAS BARAHONA Y CASTRO, S.A. ( EMBAYCA, S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Balboa',NULL,'PANAMA',NULL,'Las Palmeras, La Chorrera',NULL,NULL,'507-254-0892',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(317,1,'1',NULL,NULL,'EMMANUEL CORPORATION, S.A.',NULL,'EMMANUEL CORPORATION, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Panama',NULL,'PANAMA',NULL,'Via Circunvalacion, Nuevo Veranillo, Calle Pr',NULL,NULL,'507-274-0672',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(318,1,'1',NULL,NULL,'PRODEC',NULL,'PRODEC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(319,1,'1',NULL,NULL,'CONSTRUCTORA MECO, S.A.',NULL,'CONSTRUCTORA MECO, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LA URUCA',NULL,'COSTA RICA','10107','50 Metros al Norte al Hotel San Jose',NULL,NULL,'506 2519 7000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(320,1,'1',NULL,NULL,'INVERSIONES MURCIA S.A.',NULL,'INVERSIONES MURCIA S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(321,1,'1',NULL,NULL,'MINISTERIO DE OBRAS PUBLICAS',NULL,'MINISTERIO DE OBRAS PUBLICAS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(322,1,'1',NULL,NULL,'FENTON TRAVELS, S.A.',NULL,'FENTON TRAVELS, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,'CI 37 Bella VTA',NULL,NULL,'507-227-5215',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(323,1,'1',NULL,NULL,'UNIVERSIDAD DE PANAMA',NULL,'UNIVERSIDAD DE PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(324,1,'1',NULL,NULL,'MINISTERIO DE TRABAJO',NULL,'MINISTERIO DE TRABAJO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(325,1,'1',NULL,NULL,'D Y D MANTENIMIENTO S.A.',NULL,'D Y D MANTENIMIENTO S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Azcapotzalco','CDMX','MEXICO','02300','Calle Pte 140 618',NULL,NULL,'52 0155208148',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(326,1,'1',NULL,NULL,'MINISTERIO DE EDUCACION (FECE)',NULL,'MINISTERIO DE EDUCACION (FECE)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(327,1,'1',NULL,NULL,'INDUSTRIAS METALICAS CORONADO, S.A.',NULL,'INDUSTRIAS METALICAS CORONADO, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(328,1,'1',NULL,NULL,'HUGO MARTIN SEPULVEDA',NULL,'HUGO MARTIN SEPULVEDA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(329,1,'1',NULL,NULL,'PROYECTOS Y CONSTRUCCIONES DEL ESTE, S.A',NULL,'PROYECTOS Y CONSTRUCCIONES DEL ESTE, S.A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(330,1,'1',NULL,NULL,'PROGRAMA DE INVERSION LOCAL',NULL,'PROGRAMA DE INVERSION LOCAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(331,1,'1',NULL,NULL,'GRUPO HERMANOS VEGA',NULL,'GRUPO HERMANOS VEGA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(332,1,'1',NULL,NULL,'MULTIBANK',NULL,'MULTIBANK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(333,1,'1',NULL,NULL,'PROGRAMA DE AYUDA NACIONAL',NULL,'PROGRAMA DE AYUDA NACIONAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(334,1,'1',NULL,NULL,'FABRICA COMERCIALIZADORA Y SERVICIOS PANAMA,',NULL,'FABRICA COMERCIALIZADORA Y SERVICIOS PANAMA,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(335,1,'1',NULL,NULL,'ODEBRECHT',NULL,'ODEBRECHT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BRASIL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(336,1,'1',NULL,NULL,'GRUPO AVILA',NULL,'GRUPO AVILA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PARAGUAY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(337,1,'1',NULL,NULL,'FUNDACION CIUDAD DEL SABER',NULL,'FUNDACION CIUDAD DEL SABER',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(339,1,'1',NULL,NULL,'MINISTERIO DE DESARROLLO AGROPECUARIO',NULL,'MINISTERIO DE DESARROLLO AGROPECUARIO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(340,1,'1',NULL,NULL,'FAVIP, S.A.',NULL,'FAVIP, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,'Calle Roberto Ramires Las Minas #6',NULL,NULL,'507-974-9540',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(341,1,'1',NULL,NULL,'SENADIS',NULL,'SENADIS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(342,1,'1',NULL,NULL,'TECNOLOGIA INDUSTRIAL INTERNACIONAL, S.A.',NULL,'TECNOLOGIA INDUSTRIAL INTERNACIONAL, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Panama',NULL,'PANAMA',NULL,'San Felipe Edificio 3-64 Local 2',NULL,NULL,'507-253-6319',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(343,1,'1',NULL,NULL,'MINISTERIO DE SALUD',NULL,'MINISTERIO DE SALUD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(344,1,'1',NULL,NULL,'HOSPITAL DEL NINO',NULL,'HOSPITAL DEL NINO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(345,1,'1',NULL,NULL,'MINISTERIO DE SEGURIDAD PUBLICA',NULL,'MINISTERIO DE SEGURIDAD PUBLICA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(346,1,'1',NULL,NULL,'MINISTERIO DE ECONOMIA Y FINANZAS',NULL,'MINISTERIO DE ECONOMIA Y FINANZAS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(347,1,'1',NULL,NULL,'MECONTELSA, S.A.',NULL,'MECONTELSA, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(348,1,'1',NULL,NULL,'MATERIALES AGREGADOS Y EQUIPOS, S.A. (MAESA)',NULL,'MATERIALES AGREGADOS Y EQUIPOS, S.A. (MAESA)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MEXICO',NULL,'MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(349,1,'1',NULL,NULL,'ESAL GROUP CORP.',NULL,'ESAL GROUP CORP.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,'Urbanizacion Los Angeles, Edificio La Vigia P',NULL,NULL,'507-392-5032',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(350,1,'1',NULL,NULL,'ORGANO JUDICIAL',NULL,'ORGANO JUDICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(352,1,'1',NULL,NULL,'VODA SOLUTIONS, S.A.',NULL,'VODA SOLUTIONS, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(353,1,'1',NULL,NULL,'CIVIL WORK, S.A.',NULL,'CIVIL WORK, S.A.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Panama',NULL,'PANAMA',NULL,NULL,NULL,NULL,'507-380-2207',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(354,1,'1',NULL,NULL,'JOSE ROBERTO NARANJO',NULL,'JOSE ROBERTO NARANJO',NULL,'NARANJO','JOSE ROBERTO',NULL,NULL,NULL,NULL,'Ambato',NULL,'ECUADOR',NULL,'Av. Miraflores #11 440',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'guayaconaranjo@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(356,1,'1',NULL,NULL,'ACF GROUP',NULL,'ACF GROUP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(357,1,'1',NULL,NULL,'2 FACTORING PARTNERS LLC',NULL,'2 FACTORING PARTNERS LLC',NULL,'Hidalgo','Ernesto',NULL,'954-639-1673',NULL,NULL,'Fort Lauderd','Florida','USA','33304','2598 E Sunrise Boulevard Suite 210',NULL,NULL,'305-801-3030',NULL,'FIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ehidalgo@scfactoringsolution.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(358,1,'1',NULL,NULL,'GREAT MANAGEMENT TWO, LLC',NULL,'GREAT MANAGEMENT TWO, LLC',NULL,'Hidalgo','Ernesto',NULL,NULL,NULL,NULL,'FORT LAUDERD','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'ehidalgo@scfactoringsolution.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(359,1,'1',NULL,NULL,'PATRICIO CUESTA VASCONEZ',NULL,'PATRICIO CUESTA VASCONEZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Ambato',NULL,'ECUADOR',NULL,'Reina Claudia 01-153',NULL,NULL,'593 994808800',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pcuesta@timsa.com.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(360,1,'1',NULL,NULL,'JAIME FUSTER',NULL,'JAIME FUSTER',NULL,'FUSTER','JAIME',NULL,NULL,NULL,NULL,'MEXICO DF',NULL,'MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jaime@madmarketing.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(361,1,'1',NULL,NULL,'TARRANT COUNTY COMMUNITY DEVEL',NULL,'TARRANT COUNTY COMMUNITY DEVEL',NULL,NULL,'N/A',NULL,NULL,NULL,NULL,'FORT WORTH','TEXAS','UNITED STATES','76107','1509-B SOUTH UNIVERSITY DRIVE, SUITE 276',NULL,NULL,NULL,NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(362,1,'1',NULL,NULL,'BSK USA, LLC',NULL,'BSK USA, LLC',NULL,'CARABALLO','JOSE',NULL,NULL,NULL,NULL,'CORAL GABLES','FL','USA','33134','201 ALHAMBRA CIRCLE, SUITE 600',NULL,NULL,'786-328-5395',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,'JCARABALLO@BSK-USA.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(363,1,'1',NULL,NULL,'MAEJ LLC',NULL,'MAEJ LLC',NULL,'JARVIS','MAURICIO',NULL,'954.479.0009',NULL,NULL,'MIAMI','FLORIDA','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'001',NULL,NULL,NULL,'BK',NULL,NULL,'MJARVIS@ACFGROUPUS.COM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(364,1,'1',NULL,NULL,'PATRICIO BUENO MARTINEZ',NULL,'PATRICIO BUENO MARTINEZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'QUITO',NULL,'ECUADOR',NULL,'Alpallana 289 y Almagro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'buenoargud@puntonet.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(365,1,'1',NULL,NULL,'RULOP CORPORATION',NULL,'RULOP CORPORATION',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(366,1,'1',NULL,NULL,'LAURA MARIA PADILLA',NULL,'LAURA MARIA PADILLA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(367,1,'1',NULL,NULL,'NATALIE STRAETGER ANGUIZOLA',NULL,'NATALIE STRAETGER ANGUIZOLA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(368,1,'1',NULL,NULL,'RAFAEL OTERO',NULL,'RAFAEL OTERO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(369,1,'1',NULL,NULL,'VCN SERIE P',NULL,'VCN SERIE P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(370,1,'1',NULL,NULL,'VCN SERIE O',NULL,'VCN SERIE O',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(371,1,'1',NULL,NULL,'BRISAS DE LAS CUMBRES',NULL,'BRISAS DE LAS CUMBRES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Panama',NULL,'PANAMA',NULL,'Ave Ricardo J Alfaro, Centro Comercial Sun To',NULL,NULL,'507-393-6932',NULL,'I-R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(372,1,'1',NULL,NULL,'FIRST FACTORING INC',NULL,'FIRST FACTORING INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PANAMA',NULL,'PANAMA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(373,1,'1',NULL,NULL,'LEETECH ENERGY SERVICES, LLC',NULL,'LEETECH ENERGY SERVICES, LLC',NULL,'HENDERSON','BRYAN',NULL,NULL,NULL,NULL,'ALEDO','TX','US','76008','2399 WEST FM 5',NULL,NULL,NULL,NULL,'I-L',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(374,1,'1',NULL,NULL,'MONTECRISTI, SA DE CV',NULL,'MONTECRISTI, SA DE CV',NULL,'Cevallos Gomez','Alberto Alonso',NULL,NULL,NULL,NULL,'Queretero',NULL,'MEXICO',NULL,'Guanajuato 121 30 San Jose El Alto, Epigmenio',NULL,NULL,NULL,NULL,'SF',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'corunidas@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(375,1,'1',NULL,NULL,'MAD MARKETING LAB, SA DE CV',NULL,'MAD MARKETING LAB, SA DE CV',NULL,'FUSTER','JAIME',NULL,'55.2972.3538',NULL,NULL,'MEXICO',NULL,'MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'jaime@madmarketing.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(376,1,'1',NULL,NULL,'CITY OF LUCAS',NULL,'CITY OF LUCAS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'LUCAS','TEXAS','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(377,1,'1',NULL,NULL,'CITY OF KENNEDALE',NULL,'CITY OF KENNEDALE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Kennedale','Texas','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(378,1,'1',NULL,NULL,'FDI CAPITAL, LLC',NULL,'FDI CAPITAL, LLC',NULL,'SZAMOSFALVI','JOZSEF','BEARD',NULL,NULL,NULL,'ARLINGTON','VA','USA','22209','1600 WILSON BLVD, STE. 820',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(379,1,'1',NULL,NULL,'ALLFACTOR LLC',NULL,'ALLFACTOR LLC',NULL,'RIVADENEIRA','ALLAN',NULL,NULL,NULL,NULL,'Miami','Florida','USA',NULL,NULL,NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'I',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(380,1,'1',NULL,'021126882','SOPORTV, S.A. DE C.V',NULL,'SOPORTV, S.A. DE C.V',NULL,'BARRIOS','FRANCISCO','HERNANDEZ','55-53545330',NULL,NULL,'Azcapotzalco','CDMX','MEXICO','02980','Calle 4  No 40B, Colonia Arenal',NULL,NULL,'55-52024318',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,'FBARRIOSG@STV.CM.MX','fhp@stv.com.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(381,1,'1',NULL,NULL,'FORD MOTOR COMPANY',NULL,'FORD MOTOR COMPANY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Dearborn','MICHIGAN','USA','48126','1 American Rd',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(382,1,'1',NULL,NULL,'SCARPA WORLDWIDE LIMITED',NULL,'SCARPA WORLDWIDE LIMITED',NULL,'Salcedo Black','Johanna',NULL,'305-494-1997',NULL,NULL,'Melbourne','FL','USA','32935','1790 Kole Pl Unit 103',NULL,NULL,'3054941997',NULL,'SF',NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,'jsblack@scarpaworldwide.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(383,1,'1',NULL,NULL,'MARR S.P.A.',NULL,'MARR S.P.A.',NULL,NULL,'tbd',NULL,'tbd',NULL,NULL,'Rimini',NULL,'ITALY',NULL,NULL,NULL,NULL,NULL,NULL,'SF',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(384,1,'1',NULL,NULL,'HT CONSULTING PARTNERS, LLC',NULL,'HT CONSULTING PARTNERS, LLC',NULL,'Hidalgo','Ernesto A.',NULL,NULL,NULL,NULL,'Sunrise','FL','USA','33304','2598 EAST SUNRISE BLVD',NULL,NULL,NULL,NULL,'FIN',NULL,NULL,NULL,NULL,NULL,'B&D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(385,1,'1',NULL,'0807159','REAL CONSTRUCTION OF STAMPING',NULL,'REAL CONSTRUCTION OF STAMPING',NULL,'Cepeda Solis','Juan Alberto','Garcia Villarreal','442-4455833','+52 1 81 1077 3065',NULL,'Queretaro','Queretaro','MEXICO','76120','Acceso III No. 52 A Bodega 10 - Zona Insdustr',NULL,NULL,'442-6204481',NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'acepeda@r-stamping.com','horaciogarciavillarreal@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(386,1,'1',NULL,NULL,'VIESPI MINERALS S.A DE C.V',NULL,'VIESPI MINERALS S.A DE C.V',NULL,'Villa Carrandi','Gerardo','Sala Milego','52-55-3622-0561',NULL,NULL,'Mexico',NULL,'MEXICO','52930','Bosque de Lavanda Conjunto Cima Esmeralda 601',NULL,NULL,'52-55-3622-0561',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'gvilla66@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(387,1,'1',NULL,NULL,'SEISA',NULL,'SEISA',NULL,'Moncayo','Alejandro',NULL,'52 (622) 109-0476',NULL,NULL,'Topolobampo','Sinaloa','MEXICO','81370','Domicilio Conocido S/N Interior Recinto Portu',NULL,NULL,'52 668 862 0595',NULL,'I-L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'alejandro.moncayo@seisalogistics.mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(388,1,'1',NULL,'263895865','TRIORIENT, LLC',NULL,'TRIORIENT, LLC',NULL,'Jaime','Ines','Winslow','203-325-1001x206',NULL,NULL,'Darien','CT','USA','06820','76 Tokeneke Rd',NULL,NULL,'203-325-1001',NULL,'I-I',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'ijaime@triorient.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(389,1,'1',NULL,NULL,'MAGNA ASSEMBLY SYSTEMS DE MEXI',NULL,'MAGNA ASSEMBLY SYSTEMS DE MEXI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Cuatitlan-Iz','Mexico','MEXICO','54730','Calzada La Venta N 8 Colonia Parque Industria',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(390,1,'1',NULL,NULL,'INDUSTRIA DE ASIENTO SUPERIOR',NULL,'INDUSTRIA DE ASIENTO SUPERIOR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'San Francisc','Aguascalientes','MEXICO','20358','117 Circuito Aguascalientes Sur Num Parque In',NULL,NULL,'449-922-4600',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(391,1,'1',NULL,NULL,'NISSAN MEXICANA SA DE CV',NULL,'NISSAN MEXICANA SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Ciudad de Me',NULL,'MEXICO','01030','1958 Av Insurgentes Sur Colonia Florida',NULL,NULL,'55-5628-2727',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(392,1,'1',NULL,NULL,'TECHNOMAG INC',NULL,'TECHNOMAG INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Setauket','NY','USA','11733','12-5 Technology Dr',NULL,NULL,'631-246-6142',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(393,1,'1',NULL,NULL,'SAMSUNG ELECTRONICS DIGTAL APP',NULL,'SAMSUNG ELECTRONICS DIGTAL APP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Queretaro','Queretaro','MEXICO','76220','Ave Benito Juarez N 119 Km 28 5',NULL,NULL,'442-296-9031',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(394,1,'1',NULL,NULL,'VAPORES Y CALENTADORES DELTA',NULL,'VAPORES Y CALENTADORES DELTA',NULL,'Cepeda Solis','Juan Alberto',NULL,'52-55-7234-6763',NULL,NULL,'Iztapalapa','CDMX','MEXICO','09000','Los Reyes #61',NULL,NULL,'55-5804-3868',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'marketing@calenvapordelta.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(395,1,'1',NULL,NULL,'TUBYTEK S.A.',NULL,'TUBYTEK S.A.',NULL,'Jalil','Jorge',NULL,'593-99-948-9226',NULL,NULL,'Guayaquil','Guayas','ECUADOR','090605','Quisquella 6-7 y Ave Casuarina, Via a Daule K',NULL,NULL,'593-4-211-4040',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'jjalil@tubytek.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(396,1,'1',NULL,NULL,'EDESA S.A.',NULL,'EDESA S.A.',NULL,'Egas Velasquez','Enrique','Fernandez-Salvador Chauvet',NULL,NULL,NULL,'Quito','Pichincha','ECUADOR',NULL,'Avenida Moran Valverde OE3-191 y Tnte Hugo Or',NULL,NULL,'593-2-395-2900',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'eegas@edesa.com.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(397,1,'1',NULL,'510648242','AMERICA ENERGY INC',NULL,'AMERICA ENERGY INC',NULL,'Aure','Alberto',NULL,NULL,NULL,NULL,'Pembroke Pin','FL','USA','33029','20861 Johnson St #115',NULL,NULL,'954-762-7763',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'alberto-aure@america-energy.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(398,1,'1',NULL,'611405636','FIRST CHOICE SEAFOOD INC',NULL,'FIRST CHOICE SEAFOOD INC',NULL,'Lam','Richard','Zheng',NULL,NULL,NULL,'Indianapolis','indiana','USA','46241','1712 Stout Field Ter',NULL,NULL,'317-381-9060',NULL,'SF',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'yeyuan@fcsfood.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(399,1,'1',NULL,NULL,'CYBERTECH LIFE INC',NULL,'CYBERTECH LIFE INC',NULL,'Rodriguez','Rosendo','OConnor','305-588-8773',NULL,NULL,'DORAL','FL','USA','33178','3850 NW 1124 Av',NULL,NULL,'786-502-4150',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'dannie@ctlife.us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(400,1,'1',NULL,NULL,'PROCAORO CIA LTDA',NULL,'PROCAORO CIA LTDA',NULL,'Armijos Suarez','Hugo Mario','Aguilera',NULL,'593 9 84767247',NULL,'Machala','El Oro','ECUADOR',NULL,'Via La Ferroviaria y Primera Norte',NULL,NULL,'593 7 29150650',NULL,'SF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aaguilera@procaoro.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(401,1,'1',NULL,NULL,'COMERCIAL ALCA LIMITADA',NULL,'COMERCIAL ALCA LIMITADA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Santiago',NULL,'CHILE','7790247','Camino del Cerro 4868',NULL,NULL,NULL,NULL,'SF',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(402,1,'1',NULL,NULL,'RESINAS Y MATERIALES SA DE CV',NULL,'RESINAS Y MATERIALES SA DE CV',NULL,'Urzua Rivera','Jose Gilberto',NULL,NULL,NULL,NULL,'Tlalnepantla','Estado de Mexico','MEXICO','54055','Blvd Manuel Avila Camacho N#1994-1101, Col Sa',NULL,NULL,'55 1086 5970',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'contacto@resymat.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(403,1,'1',NULL,NULL,'TACTICA PUBLICITARIA S.A.',NULL,'TACTICA PUBLICITARIA S.A.',NULL,'Ramirez','Hugo',NULL,'593-4-600-8633',NULL,NULL,'Guayaquil','Guayas','ECUADOR',NULL,'Ave Fco de Orellana y Justino Cornejo',NULL,NULL,'593-4-600-8633',NULL,'I2M',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hugo_ramirez@mediagroup.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(404,1,'1',NULL,NULL,'ARTIC PUBLICIDAD S.A.',NULL,'ARTIC PUBLICIDAD S.A.',NULL,'Ramirez','Hugo',NULL,NULL,NULL,NULL,'Guayaquil','Guayas','ECUADOR',NULL,'Kennedy Norte:Avenida Francisco de Orellana S',NULL,NULL,'04-600-8633',NULL,'I2M',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hugo_ramirez@mediagroup.com.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(405,1,'1',NULL,NULL,'MERCANTIL EXPORTADORA ROCHNOS',NULL,'MERCANTIL EXPORTADORA ROCHNOS',NULL,'Cepeda Solis','Juan Alberto',NULL,'52 1 442 4455833',NULL,NULL,'Tampico',NULL,'MEXICO','88630','Calle Monterrey #340-A, Col. Rodriguez',NULL,NULL,'55 5804 3868',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,'marketing@calenvapordelta.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(406,1,'1',NULL,NULL,'EURO POOLS',NULL,'EURO POOLS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'San Pedro Ga','Nuevo Leon','MEXICO','66129','Calle Pedro Ramirez Vazquez # 200-13, Piso 5',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(407,1,'1',NULL,NULL,'JUANA LOZANO GUTIERREZ',NULL,'JUANA LOZANO GUTIERREZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Ecatepec de','Mexico','MEXICO',NULL,'Calle Girasol Mzna 29, Lote 8, Col. Jardines',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(409,1,'1',NULL,NULL,'FRANCISCO PENA MUNOZ',NULL,'FRANCISCO PENA MUNOZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Atlauta de V','Estado de Mexico','MEXICO','56970','Calle Av Constitucion #15, Col. San Juan Tepe',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(410,1,'1',NULL,NULL,'IMPOMART SA DE CV',NULL,'IMPOMART SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Cuauhtemoc','Ciudad de Mexico','MEXICO','06050','Calle Ayuntamiento #93, Col Centro',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(411,1,'1',NULL,NULL,'MERCANTIL PEDROSA',NULL,'MERCANTIL PEDROSA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Miguel Hidal','Ciudad de Mexico','MEXICO','11000','Calle Explanada #215, Col. Lomas de Chapultep',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(412,1,'1',NULL,NULL,'POBLANOS DEL SUR CA DE CV',NULL,'POBLANOS DEL SUR CA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Alfredo V Bo','Quintana Roo','MEXICO','77560','Carretera Cancun Aeropuerto KM9, Col. Central',NULL,NULL,NULL,NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(413,1,'1',NULL,NULL,'EURO POOLS',NULL,'EURO POOLS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Miguel Hidal','Ciudad de Mexico','MEXICO',NULL,'Lago Zurich #219, Piso 12, Col. Ampliacion Gr',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(414,1,'1',NULL,NULL,'DILER DE HONDURAS S. DE R.L',NULL,'DILER DE HONDURAS S. DE R.L',NULL,'Jamnette Gomez','Claudia','Chemiel','504-2552-5725','504-2552-2344',NULL,'San Pedro Su','Cortes','HONDURAS',NULL,'Barrio Paz Barahona 13 calle 5 S.O.',NULL,NULL,'504-2552-2344',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'claudia_gomez@dilerhonduras.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(415,1,'1',NULL,NULL,'SS CONSULTING USA LLC',NULL,'SS CONSULTING USA LLC',NULL,'Vera','Jaime A',NULL,'954-643-1456',NULL,NULL,'Royal Palm B','FL','USA','33411','2709 Pienza Circle',NULL,NULL,'561-618-8026',NULL,'I-T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'jvera@ssconsultingusa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(416,1,'1',NULL,NULL,'AGROENLACES COMERCIALES INTERN',NULL,'AGROENLACES COMERCIALES INTERN',NULL,'Razo Pedraza','Jose Luis',NULL,'52(443)3152727',NULL,NULL,'Morelia','Michoacan','MEXICO','58350','Av Paseo Altozano #1015 Colonia Desarrollo Mo',NULL,NULL,'52(443)3147911',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'contabilidad@agroenlaces.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(417,1,'1',NULL,NULL,'ASISBANE',NULL,'ASISBANE',NULL,'Jalil','Cecilio',NULL,'593-99-960-1508',NULL,NULL,'Guayaquil','Guayas','ECUADOR',NULL,'Ave 9 de Octubre 1911 y Los Rios',NULL,NULL,'593-4-228-0810',NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'ajalil@asisbane.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(418,1,'1',NULL,NULL,'CYBERTECH LIFE INC',NULL,'CYBERTECH LIFE INC',NULL,'Connor','Danny A',NULL,'305-588-8773',NULL,NULL,'Doral','FL','USA','33178','3850 Nw 114th Ave',NULL,NULL,'786-502-4150',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'dannie@actlife.us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(419,1,'1',NULL,NULL,'DECORAQ S.A DE C.V',NULL,'DECORAQ S.A DE C.V',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'San Pedro Ga','Nuevo Leon','MEXICO',NULL,'Pedro Ramirez Vazquez #200-13 Piso 5. Colonia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(420,1,'1',NULL,NULL,'GOBA INTERNACIONAL SA DE CV',NULL,'GOBA INTERNACIONAL SA DE CV',NULL,NULL,NULL,NULL,NULL,'AVENIDA',NULL,'Mexico DF',NULL,'MEXICO','03900','Avenida Insurgentes Sur 1647 Piso 12 Col. San',NULL,NULL,'(5255)58040494',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(421,1,'1',NULL,NULL,'ALL AMERICAN PAPER & SUPPLIES',NULL,'ALL AMERICAN PAPER & SUPPLIES',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Miami','Florida','USA','33166','7190 NW 52nd St',NULL,NULL,'305-477-3564',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(422,1,'1',NULL,NULL,'A.M.CAPEN\'S CO. INC',NULL,'A.M.CAPEN\'S CO. INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Hillside','NJ','USA','07205','1255 Liberty Avenue',NULL,NULL,'908-351-1520',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(423,1,'1',NULL,NULL,'SPECTRONIC CORPORATION',NULL,'SPECTRONIC CORPORATION',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Westbury','NY','USA','11590','956 Brush Hollow Rd',NULL,NULL,'1-800-274-8888',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(424,1,'1',NULL,NULL,'DATATECH INC',NULL,'DATATECH INC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Miami','FL','USA','33172','2980 NW 108th Ave.',NULL,NULL,'305-436-8201',NULL,'I-W',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(425,1,'1',NULL,NULL,'LEAR MEXICAN SEATING CORP',NULL,'LEAR MEXICAN SEATING CORP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'El Paso','Texas','USA','79936','950 Loma Verde Dr',NULL,NULL,'915-787-3610',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(426,1,'1',NULL,NULL,'JOHNAN DE MEXICO SA DE CV',NULL,'JOHNAN DE MEXICO SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Silao','Guanajuato','MEXICO','36270','Av Eucalipto No 240 Col. Parque Industrial y',NULL,NULL,'52 (472)7238400',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(427,1,'1',NULL,NULL,'G-ONE AUTO PARTES DE MEXICO',NULL,'G-ONE AUTO PARTES DE MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Queretaro','Guanajuato','MEXICO','38180','Avenida Amistad No 104 Autopista Queretaro Co',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(428,1,'1',NULL,NULL,'FEG DE QUERETARO, SA DE CV',NULL,'FEG DE QUERETARO, SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Queretaro','Queretaro','MEXICO','76220','Cerrada La Noria 106 Parque Industrial Queret',NULL,NULL,'52(442)2295100',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(429,1,'1',NULL,NULL,'F&P MFG DE MEXICO',NULL,'F&P MFG DE MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Irapuato','Guanajuato','MEXICO','36835','Calle Santiago 242 Centro Industrial de Guana',NULL,NULL,'52 462 166 1700',NULL,'I-I',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(430,1,'1',NULL,NULL,'E.G.O COMPONENTES ELECTRONICOS',NULL,'E.G.O COMPONENTES ELECTRONICOS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Queretaro','queretaro','MEXICO','76220','125 Benito Juarez Col Parque Industrial Quere',NULL,NULL,'52(442)1534400',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(431,1,'1',NULL,NULL,'DR ENC',NULL,'DR ENC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Santa Rosa J','Queretaro','MEXICO','76220','622 Manufacturas Col Parque Industrial Queret',NULL,NULL,'52(442)1935606',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(432,1,'1',NULL,NULL,'SAINT GOBAIN AMERICA',NULL,'SAINT GOBAIN AMERICA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Tlaxcala',NULL,'MEXCIO','90434','Prolongacion Zacatepec No Mzna 42I Col. Cd In',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(433,1,'1',NULL,NULL,'GRUPO CONDUMEX SA DE CV',NULL,'GRUPO CONDUMEX SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Miguel Hidal',NULL,'MEXICO','11529','Lago Zurich, Edificio Frsico, Plaza Carzo #24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(434,1,'1',NULL,NULL,'BEIFA ZONA LIBRE, SA',NULL,'BEIFA ZONA LIBRE, SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Colon',NULL,'PANAMA','0302-0386','Edificio #25, calle D entre calle 15 y 16, zo',NULL,NULL,'507-431-2052',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'beifa@tcarrier.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(435,1,'1',NULL,NULL,'FINE PACKAGING SA DE CV',NULL,'FINE PACKAGING SA DE CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Atlacomulco','Mexico','MEXICO','50450','Salvador Sanchez Colin Lote 4 y 5 Colonia Par',NULL,NULL,'52-712-122-7818',NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(436,1,'1',NULL,NULL,'BOCAR',NULL,'BOCAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Coyoacan',NULL,'MEXICO','04330','255 Profesora Aurora Reza Colonia Los Reyes',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(437,1,'1',NULL,NULL,'STV STAMPING AND TOOLS SA DE C',NULL,'STV STAMPING AND TOOLS SA DE C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Azcapotalco','CDM','MEXICO','02980','Calle 4 No 40 B Colonia del Gas',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(438,1,'1',NULL,NULL,'HITACHI AUTOMOTIVE SYSTEMS MEX',NULL,'HITACHI AUTOMOTIVE SYSTEMS MEX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Toluca',NULL,'MEXICO','52004','12 Avenida de la Industria Automotriz. Coloni',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(439,1,'1',NULL,NULL,'BON BINI CARGO CONSOLIDATORS I',NULL,'BON BINI CARGO CONSOLIDATORS I',NULL,'Gonzalez','Luis',NULL,'786-399-3361',NULL,NULL,'Medley','Florida','USA','33178','10301 NW 108th Ave Unit #2',NULL,NULL,'305-594-1111',NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'luis@bon-bini.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(440,1,'1',NULL,NULL,'BRUSO TROPICAL',NULL,'BRUSO TROPICAL',NULL,'Franco Luque','Carlos Roberto',NULL,'593991122131',NULL,NULL,'La Libertad','Sanata Elena','ECUADOR',NULL,'Puerto Lucia torre #200 Apt #302B',NULL,NULL,NULL,NULL,'IAE',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'brusoco60@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(441,1,'1',NULL,NULL,'CARIBBEAN SUN AIRLINES INC',NULL,'CARIBBEAN SUN AIRLINES INC',NULL,'Romero','Tomas',NULL,'305-219-6005',NULL,NULL,'Virginia Gar','Florida','USA','33166','6355 NW 36th St #101',NULL,NULL,'305-772-6100',NULL,'I3T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'tomas.romero@flycsa.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(442,1,'1',NULL,NULL,'EHS TORRES SA DE CV',NULL,'EHS TORRES SA DE CV',NULL,'Lopez Villarreal','Daniel','Orellana',NULL,'418-448-3072',NULL,'General Esco','Nuevo Leon','MEXICO','66052','Jose Maria Morelos y Pavon 1101',NULL,NULL,NULL,NULL,'I-M',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,'iorellana@r-stamping.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(443,1,'1',NULL,NULL,'KAIROS GLOBAL',NULL,'KAIROS GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Reynosa','Tamaulipas','MEXICO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(444,1,'1',NULL,NULL,'UNITED RAW MATERIAL PTE LTD',NULL,'UNITED RAW MATERIAL PTE LTD',NULL,'Agarwal','Sandeep',NULL,NULL,NULL,NULL,'Singapore','Singapore','SINGAPORE','408868','33 UBI Avenue 3 #05-32 Vertex',NULL,NULL,'+65 6323 1721',NULL,'I2T',NULL,NULL,NULL,NULL,NULL,'D',NULL,NULL,'sales@urmpl.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(445,1,'1',NULL,NULL,'PROINDEL DOMINICANA SA',NULL,'PROINDEL DOMINICANA SA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Santo Doming',NULL,'REPUBLICA DOMINICANA',NULL,'Ave Jose Belenciano de los Santoscon Jse Fran',NULL,NULL,'809-957-6021',NULL,'I2R',NULL,NULL,NULL,NULL,NULL,'DS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A'),(446,1,'1','DL','',NULL,'prueba',NULL,NULL,NULL,NULL,NULL,'59399999999','',NULL,'','','','','',NULL,NULL,'','','001',NULL,'B&D',NULL,NULL,NULL,'FIN',NULL,NULL,'','',NULL,NULL,NULL,'2019-07-31','',NULL,NULL,NULL,'I'),(447,1,'1','DL','0924826480001',NULL,'Fernando Reyes',NULL,NULL,NULL,NULL,NULL,'043282911','04328121887',NULL,'Guayaquil','Guayas','Ecuador','hsdsk1','Sur',NULL,NULL,'09281218181','09271821821','001',NULL,'B&D',NULL,NULL,NULL,'FIN',NULL,NULL,'fersland@outlook.es','fersland23@gmail.com',NULL,NULL,NULL,'2019-07-31','fersland@outlook.es',NULL,NULL,NULL,'I');
/*!40000 ALTER TABLE `finacli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fintabla`
--

DROP TABLE IF EXISTS `fintabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `fintabla` (
  `TIPO` varchar(3) CHARACTER SET utf8 NOT NULL,
  `CODIGO` varchar(3) CHARACTER SET utf8 NOT NULL,
  `NOMBRE` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  UNIQUE KEY `keycab` (`TIPO`,`CODIGO`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fintabla`
--

LOCK TABLES `fintabla` WRITE;
/*!40000 ALTER TABLE `fintabla` DISABLE KEYS */;
INSERT INTO `fintabla` VALUES ('ACT','FIN','Financials                    '),('ACT','I-H','Healthcare                    '),('ACT','I-I','Insurance                     '),('ACT','I-L','Logistics                     '),('ACT','I-M','Manufacturing                 '),('ACT','I-P','Pharmaceutical                '),('ACT','I-R','Real State                    '),('ACT','I-T','Telecom                       '),('ACT','I-U','Utilities                     '),('ACT','I-W','Domestic Wholesale            '),('ACT','I2E','Entertainment                 '),('ACT','I2M','Marketing                     '),('ACT','I2R','Retail                        '),('ACT','I2T','Trading                       '),('ACT','I3M','Media                         '),('ACT','I3T','Transportation                '),('ACT','IAE','Agro-export                   '),('ACT','ME ','Medical eqipment              '),('ACT','SF ','Seafood                       '),('CAL','1  ','Actual / 360                  '),('CAL','2  ','Actual / 365                  '),('CAL','3  ','30 / 360                      '),('CAL','4  ','30  / 365                     '),('CLA','01 ','Active Client                 '),('CLA','02 ','New Client                    '),('CLA','03 ','Inactive Client               '),('CLA','04 ','Prospect                      '),('CLI','B&D','Borowers & Debtors            '),('CLI','D  ','Debtor                        '),('CLI','DS ','Debtor-Supplier               '),('CLI','E  ','Employee                      '),('CLI','I  ','Investor                      '),('CLI','I_D','Investor & Debtor             '),('CLI','S  ','Suppliers                     '),('DES','B00','Activity Not Specified        '),('DES','B01','Consumer Credit               '),('DES','B02','Student Credit                '),('DES','B03','Crédito Educativo, superior y '),('DES','B10','Agricultura, caza, silvicultur'),('DES','B11','Agricultura y caza            '),('DES','B12','Silvicultura y Extracción de M'),('DES','B13','Pesca                         '),('DES','B20','Explotación de minas y cantera'),('DES','B30','Industrias Manufactureras     '),('DES','B31','Productos alimenticios, bebida'),('DES','B32','Textiles, prendas de vestir e '),('DES','B33','Ind. Madera y productos madera'),('DES','B34','Fab. de papel y productos de p'),('DES','B35','Fab. quimicos y derivados de p'),('DES','B36','Fabricación de productos miner'),('DES','B37','Industrias metálicas no básica'),('DES','B38','Fabricación de productos metal'),('DES','B39','Otras industrias manufacturera'),('DES','B40','Electricidad, gas y agua      '),('DES','B50','Construcción                  '),('DES','B60','Restaurant  and Hotel         '),('DES','B61','Comercio                      '),('DES','B62','Restauran y hoteles           '),('DES','B70','Transporte, almacenamiento y c'),('DES','B80','Establecimientos financieros, '),('DES','B90','Servicios comunales, sociales '),('IDE','DL ','Driver License                '),('IDE','P  ','Passport                      '),('IDE','R  ','Registro Unico Contribuyente  '),('IDE','TID','Tax ID                        '),('OFI','001','MAURICIO JARVIS               '),('OFI','002','JOSE LUIS HIDALGO             '),('OFI','003','CARLOS VALLEJO                '),('OFI','004','ERNESTO HIDALGO               '),('OFI','005','CESAR SILVA'),('PRO','ANT','Anticipo a Terceros           '),('PRO','API','Acreedores por Intermediación '),('PRO','C01','Credito No.1                  '),('PRO','C02','Credito No.2                  '),('PRO','CHP','Cheques Protestados           '),('PRO','DPI','Deudores por Intermediación   '),('PRO','PQP','Prestamos a Funcionarios/Empl.'),('PRO','PRR','Préstamos Recibidos           '),('PRO','VA ','Varios Acreedores             '),('PRO','VD ','Varios Deudores               '),('SIS','S01','(Sistema Contable)            '),('SIS','S03','(Sistema de Operaciones)      '),('Z  ','ACT','Actividades                   '),('Z  ','CLA','Clasificación de Clientes     '),('Z  ','CLI','Tipos de Clientes             '),('Z  ','DES','Destinos de Créditos          '),('Z  ','FIN','Financieras                   '),('Z  ','IDE','Tipo de Indentificación       '),('Z  ','OFI','Oficiales de Créditos         '),('Z','PIP','PIPELINES'),('Z  ','PRO','Productos                     '),('Z','STA','STATUS'),('Z','STG','STAGE'),('Z  ','TRA','Traders                       ');
/*!40000 ALTER TABLE `fintabla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(120) NOT NULL,
  `icons` varchar(120) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Company','fa fa-institution fa-fw','A',NULL),(2,'Administration','fa fa-gears fa-fw','A',NULL),(3,'Files','fa fa-book fa-fw','A',NULL),(4,'Activities','fa fa-location-arrow fa-fw','A',NULL),(5,'Report','fa fa-database fa-fw','A',NULL),(6,'Processes','fa fa-shield fa-fw','A',NULL),(7,'Security','fa fa-lock fa-fw','A',NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos_items`
--

DROP TABLE IF EXISTS `modulos_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modulos_items` (
  `id_modulo_item` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` int(11) DEFAULT NULL,
  `nombre_item` varchar(200) NOT NULL,
  `src_head` varchar(245) DEFAULT NULL,
  `src_head_u` varchar(245) DEFAULT NULL,
  `icons` varchar(100) DEFAULT NULL,
  `acceso` int(11) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_modulo_item`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos_items`
--

LOCK TABLES `modulos_items` WRITE;
/*!40000 ALTER TABLE `modulos_items` DISABLE KEYS */;
INSERT INTO `modulos_items` VALUES (4,2,'Accounting','?cid=administration/accounting_view',NULL,NULL,NULL,'A',NULL),(5,1,'Select Company','?cid=company/select','../in.php?cid=company/select',NULL,NULL,'I',NULL),(6,1,'Company Data','?cid=company/company_data','../in.php?cid=company/company_data',NULL,NULL,'A',''),(7,1,'Consolidated','?cid=company/consolidated','../in.php?cid=company/consolidated',NULL,NULL,'A',NULL),(8,1,'Adjustment Reports','?cid=company/adjustmanent','../in.php?cid=company/adjustmanent',NULL,NULL,'A',NULL),(9,1,'Support & Recovery of Data Information','?cid=company/support','../in.php?cid=company/support',NULL,NULL,'A',NULL),(10,1,'System Administration','?cid=company/system_admin_view','../in.php?cid=company/system_admin_view',NULL,NULL,'I',NULL),(11,1,'Print','?cid=company/print','../in.php?cid=company/print',NULL,NULL,'A',NULL),(12,1,'Users','?cid=company-users/users_list','../in.php?cid=company-users/users_list',NULL,NULL,'A',NULL),(13,1,'Password Reset','?cid=company/password_reset_view','../in.php?cid=company/password_reset_view',NULL,NULL,'A',NULL),(14,1,'Audit','?cid=company/audit','../in.php?cid=company/audit',NULL,NULL,'A',NULL),(15,1,'Date Change','?cid=company/datechange','../in.php?cid=company/datechange',NULL,NULL,'A',NULL),(16,1,'Business Date','?cid=company/business','../in.php?cid=company/business',NULL,NULL,'A',NULL),(17,1,'Files Organizer Software','?cid=company/files_org','../in.php?cid=company/files_org',NULL,NULL,'A',NULL),(18,1,'Files Revision Software','?cid=company/files_rev','../in.php?cid=company/files_rev',NULL,NULL,'A',NULL),(19,1,'Export Files','?cid=export','../in.php?cid=company/export',NULL,NULL,'A',NULL),(20,2,'Banks','?cid=admin/banks',NULL,NULL,NULL,'A',NULL),(21,2,'Operations','?cid=administration/operations_view',NULL,NULL,NULL,'A',NULL),(22,2,'Administrative Expenses','?cid=administration/expenses',NULL,NULL,NULL,'A',NULL),(23,2,'Financial Planning','?cid=administration/planning',NULL,NULL,NULL,'A',NULL),(24,2,'Prospect','?cid=administration/prospect','',NULL,NULL,'A',NULL),(25,3,'Chart of Accounts','?cid=files/chart_account','../in.php?cid=files/chart_account',NULL,1,'A',NULL),(26,3,'Company Banks','?cid=files/view_banks','../in.php?cid=files/view_banks',NULL,1,'A',NULL),(27,3,'Chart of accounts parameter','?cid=files/view_chart_parameter','../in.php?cid=files/view_chart_parameter',NULL,1,'A',NULL),(28,3,'Types of voucher','?cid=files/view_voucher','../in.php?cid=files/view_voucher',NULL,1,'A',NULL),(29,3,'Directory','?cid=files/view_directory','../in.php?cid=files/view_directory',NULL,1,'A',NULL),(30,4,'Journal Entries','activities/journal.php?cid=00000001','../activities/journal.php?cid=00000001',NULL,1,'A',NULL),(31,5,'Journal Entries Report','?cid=report/acc_journal_entries','../in.php?cid=report/acc_journal_entries',NULL,1,'A',NULL),(32,5,'Journal Entriy Summary','?cid=report/acc_journal_entries_summary','../in.php?cid=report/acc_journal_entries_summary',NULL,1,'A',NULL),(33,5,'General Ledger','?cid=report/acc_general_ledger','../in.php?cid=report/acc_general_ledger',NULL,1,'A',NULL),(34,5,'General Ledger Operations','?cid=report/acc_general_ledger_o','../in.php?cid=report/acc_general_ledger_o',NULL,1,'A',NULL),(35,5,'Ledger Account Report','?cid=report/acc_ledger_account_report','../in.php?cid=report/acc_ledger_account_report',NULL,1,'A',NULL),(36,5,'Balance Sheet','?cid=report/acc_balance_sheet','../in.php?cid=report/acc_balance_sheet',NULL,1,'A',NULL),(37,5,'Financial Report','?cid=report/financial_report','../in.php?cid=report/financial_report',NULL,1,'A',NULL),(38,5,'Financial Comparative Report','?cid=report/acc_financial_comparative','../in.php?cid=report/acc_financial_comparative',NULL,1,'A',NULL),(39,5,'Income Statement Monthly','?cid=report/acc_income_statement_monthly','../in.php?cid=report/acc_income_statement_monthly',NULL,1,'A',NULL),(40,5,'Income Statement Monthly Variations','?cid=report/acc_income_statement_monthly_v','../in.php?cid=report/acc_income_statement_monthly_v',NULL,1,'A',NULL),(41,5,'Income Statement Monthly Graph','?cid=report/acc_income_statement_monthly_g','../in.php?cid=report/acc_income_statement_monthly_g',NULL,1,'A',NULL),(42,5,'Account Revision','?cid=report/acc_account_revision','../in.php?cid=report/acc_account_revision',NULL,1,'A',NULL),(43,5,'Chart of Accounts','?cid=report/acc_chart_account','../in.php?cid=report/acc_chart_account',NULL,1,'A',NULL),(44,5,'Bank Balances','?cid=report/acc_bank_balances','../in.php?cid=report/acc_bank_balances',NULL,1,'A',NULL),(45,5,'Check Drawn by Beneficiaries','?cid=report/acc_check_beneficiaries','../in.php?cid=report/acc_check_beneficiaries',NULL,1,'A',NULL),(46,5,'Accounting Vouchers','?cid=report/acc_accounting_vouchers','../in.php?cid=report/acc_accounting_vouchers',NULL,1,'A',NULL),(47,5,'Bank Cash Flow of the Month by Weekly','?cid=report/acc_bank_cash','../in.php?cid=report/acc_bank_cash',NULL,1,'A',NULL),(48,6,'Balance Reconsolidation','?cid=process/balance_reconsolidation','../in.php?cid=process/balance_reconsolidation',NULL,1,'A',NULL),(49,6,'Month end Entries','?cid=process/month_entries','../in.php?cid=process/month_entries',NULL,1,'A',NULL),(50,6,'Year end Entries','?cid=process/year_entries','../in.php?cid=process/year_entries',NULL,1,'A',NULL),(51,6,'Add/Edit Ledger Accounts','?cid=process/add_edit','../in.php?cid=process/add_edit',NULL,1,'A',NULL),(52,7,'Profile','?cid=seguridad/nivel','../in.php?cid=seguridad/nivel',NULL,0,'A',NULL),(53,7,'Cambiar Clave','?cid=seguridad/cambiar','../in.php?cid=seguridad/cambiar',NULL,0,'I',NULL),(54,3,'Add/Edit Clients, Suppliers','?cid=files/add_edit_suppliers','../in.php?cid=files/add_edit_suppliers',NULL,2,'A',NULL),(55,3,'Company Edits','?cid=files/company_edit','../in.php?cid=files/company_edit',NULL,2,'A',NULL),(56,3,'Operation Activities','?cid=files/operation_activities','../in.php?cid=files/operation_activities',NULL,2,'A',NULL),(57,3,'Banking Transactions','?cid=files/banking_tran','../in.php?cid=files/banking_tran',NULL,2,'A',NULL),(58,4,'Debit Memo','?cid=activities/debit_memo','../in.php?cid=activities/debit_memo',NULL,2,'A',NULL),(59,4,'Credit Memo','?cid=activities/credit_memo','../in.php?cid=activities/credit_memo',NULL,2,'A',NULL),(60,4,'Deposits','?cid=activities/deposits','../in.php?cid=activities/deposits',NULL,2,'A',NULL),(61,4,'Write Check','?cid=activities/write_check','../in.php?cid=activities/write_check',NULL,2,'A',NULL),(62,4,'Payment to suppliers','?cid=activities/payment','../in.php?cid=activities/payment',NULL,2,'A',NULL),(63,4,'Void Checks','?cid=activities/void_checks','../in.php?cid=activities/void_checks',NULL,2,'A',NULL),(64,4,'Void DM/CM/DP','?cid=activities/void_dm','../in.php?cid=activities/void_dm',NULL,2,'A',NULL),(65,4,'Reverse Bank Reconsiliation','?cid=activities/reverse_bank','../in.php?cid=activities/reverse_bank',NULL,2,'A',NULL),(66,5,'Print Checks','?cid=report/print_checks','../in.php?cid=report/print_checks',NULL,2,'A',NULL),(67,5,'Print Proof of payment','?cid=report/print_payment','../in.php?cid=report/print_payment',NULL,2,'A',NULL),(68,5,'Voucher DM/CM/DP','?cid=report/voucher_dm','../in.php?cid=report/voucher_dm',NULL,2,'A',NULL),(69,5,'Bank Statements','?cid=report/bank_statements','../in.php?cid=report/bank_statements',NULL,2,'A',NULL),(70,5,'Deposits','?cid=report/deposits','../in.php?cid=report/deposits',NULL,2,'A',NULL),(71,5,'WithdraWals','?cid=report/withdrawals','../in.php?cid=report/withdrawals',NULL,2,'A',NULL),(72,5,'Debit Memo','?cid=report/debit_memo','../in.php?cid=report/debit_memo',NULL,2,'A',NULL),(73,5,'Credit Memo','?cid=report/credit_memo','../in.php?cid=report/credit_memo',NULL,2,'A',NULL),(74,5,'List of checks drawn','?cid=report/list_checks_drawn','../in.php?cid=report/list_checks_drawn',NULL,2,'A',NULL),(75,6,'Bank Balance Recovery','?cid=processes/bank_balance_rec','../in.php?cid=processes/bank_balance_rec',NULL,2,'A',NULL),(76,6,'Bank Reprocess','?cid=processes/bank_reprocess','../in.php?cid=processes/bank_reprocess',NULL,2,'A',NULL),(77,6,'Bank Closure','?cid=processes/bank_closure','../in.php?cid=processes/bank_closure',NULL,2,'A',NULL),(78,3,'System Charts','?cid=files/system_charts_list','../in.php?cid=files/system_charts_list',NULL,3,'A',NULL),(79,3,'Products Parameters','?cid=files/products_parameters','../in.php?cid=files/products_parameters',NULL,3,'A',NULL),(80,3,'Brokers','?cid=files/brokers','../in.php?cid=files/brokers',NULL,3,'A',NULL),(81,3,'Clients','?cid=files/clients','../in.php?cid=files/clients',NULL,3,'A',NULL),(82,3,'Parameter Control','?cid=files/parameter_control','../in.php?cid=files/parameter_control',NULL,3,'A',NULL),(83,3,'Currencies','?cid=files/currencies','../in.php?cid=files/currencies',NULL,3,'A',NULL),(84,3,'Accounting Integration','?cid=files/accounting_int','../in.php?cid=files/accounting_int',NULL,3,'A',NULL),(85,3,'Payment Types','?cid=files/payment_types','../in.php?cid=files/payment_types',NULL,3,'A',NULL),(86,3,'Exchange Rate','?cid=files/exchange_rate','../in.php?cid=files/exchange_rate',NULL,3,'A',NULL),(87,4,'Lending Portfolio','?cid=activities/lending','../in.php?cid=activities/lending',NULL,3,'A',NULL),(88,4,'Funding','?cid=activities/funding','../in.php?cid=activities/funding',NULL,3,'A',NULL),(89,4,'Print Documents','?cid=activities/print_documents','../in.php?cid=activities/print_documents',NULL,3,'A',NULL),(90,4,'Print Liquidation Reserved','?cid=activities/print_liquidation','../in.php?cid=activities/print_liquidation',NULL,3,'A',NULL),(91,4,'Reserved Liquidation','?cid=activities/reserved_liquidation','../in.php?cid=activities/reserved_liquidation',NULL,3,'A',NULL),(92,4,'Reserved Liquidation Bill','?cid=activities/reserved_liquidation_bill','../in.php?cid=activities/reserved_liquidation_bill',NULL,3,'A',NULL),(93,4,'Void Liquidation','?cid=activities/void_liquidation','../in.php?cid=activities/void_liquidation',NULL,3,'A',NULL),(94,4,'Open Line Credit','?cid=activities/open_line_credit','../in.php?cid=activities/open_line_credit',NULL,3,'A',NULL),(95,4,'Borrow Base cetificate (BBC)','?cid=activities/borrow_base','../in.php?cid=activities/borrow_base',NULL,3,'A',NULL),(96,5,'A/R Aging Report','?cid=report/aging_report','../in.php?cid=report/aging_report',NULL,3,'A',NULL),(97,5,'Client Statement Report','?cid=report/client_statement','../in.php?cid=report/client_statement',NULL,3,'A',NULL),(98,5,'Late Fee Statement Report','?cid=report/late_fee','../in.php?cid=report/late_fee',NULL,3,'A',NULL),(99,5,'Factoring Client Statement','?cid=report/factoring_client','../in.php?cid=report/factoring_client',NULL,3,'A',NULL),(100,5,'Funding Report','?cid=report/funding_report','../in.php?cid=report/funding_report',NULL,3,'A',NULL),(101,5,'Lending Portfolio Report','?cid=report/lending_portfolio','../in.php?cid=report/lending_portfolio',NULL,3,'A',NULL),(102,5,'Profit by Client Report','?cid=report/profit_client','../in.php?cid=report/profit_client',NULL,3,'A',NULL),(103,5,'Paid Trasaction Report','?cid=report/paid_transaction','../in.php?cid=report/paid_transaction',NULL,3,'A',NULL),(104,5,'Participation','?cid=report/participation','../in.php?cid=report/participation',NULL,3,'A',NULL),(105,5,'Loan Portafolio Distribucion','?cid=report/loan_portfolio','../in.php?cid=report/loan_portfolio',NULL,3,'A',NULL),(106,5,'Risk by Client Report ','?cid=report/risk_client','../in.php?cid=report/risk_client',NULL,3,'A',NULL),(107,5,'Client / Debtor Factoring Report','?cid=report/debtor_factoring','../in.php?cid=report/debtor_factoring',NULL,3,'A',NULL),(108,5,'Client Debtor','?cid=report/client_debtor','../in.php?cid=report/client_debtor',NULL,3,'A',NULL),(109,5,'Daily operations report ','?cid=report/daily_operations','../in.php?cid=report/daily_operations',NULL,3,'A',NULL),(110,5,'Funding Report','?cid=report/funding_report','../in.php?cid=report/funding_report',NULL,3,'A',NULL),(111,5,'Calculo de Interes por dia LP','?cid=report/calculo_interes_dia','../in.php?cid=report/calculo_interes_dia',NULL,3,'A',NULL),(112,5,'Lending Portfolio Report ','?cid=report/lending_portfolio','../in.php?cid=report/lending_portfolio',NULL,3,'A',NULL),(113,5,'Outstanding operation reserved','?cid=report/outstanding_operation','../in.php?cid=report/outstanding_operation',NULL,3,'A',NULL),(114,5,'Payment Collection Report','?cid=report/payment_collection','../in.php?cid=report/payment_collection',NULL,3,'A',NULL),(115,5,'Payments report for the month','?cid=report/payments_report_month','../in.php?cid=report/payments_report_month',NULL,3,'A',NULL),(116,5,'Closed operations report','?cid=report/closet_operations','../in.php?cid=report/closet_operations',NULL,3,'A',NULL),(117,5,'Broker Commission fee report ','?cid=report/broker_commission','../in.php?cid=report/broker_commission',NULL,3,'A',NULL),(118,5,'Accrual Reports','?cid=report/accrual_reports','../in.php?cid=report/accrual_reports',NULL,3,'A',NULL),(119,5,'A/R Aging Report','?cid=report/aging_report','../in.php?cid=report/aging_report',NULL,3,'A',NULL),(120,5,'Daily Accrual Lending','?cid=report/daily_accrual_l','../in.php?cid=report/daily_accrual_l',NULL,3,'A',NULL),(121,5,'Daily Accrual Funding','?cid=report/daily_accrual_f','../in.php?cid=report/daily_accrual_f',NULL,3,'A',NULL),(122,5,'Daily Accrual Management','?cid=report/daily_accrual_m','../in.php?cid=report/daily_accrual_m',NULL,3,'A',NULL),(123,5,'Daily Accrual Funding Marketing ','?cid=report/daily_accrual_fm','../in.php?cid=report/daily_accrual_fm',NULL,3,'A',NULL),(124,5,'Foreign Currency Position','?cid=report/foreign_currency','../in.php?cid=report/foreign_currency',NULL,3,'A',NULL),(125,5,'Investor Statement','?cid=report/investor_statement','../in.php?cid=report/investor_statement',NULL,3,'A',NULL),(126,6,'Transferencia contable operaciones','?cid=report/transferencia_op','../in.php?cid=report/transferencia_op',NULL,3,'A',NULL),(127,6,'Transferencia contable liquidaciones','?cid=report/transferencia_liq','../in.php?cid=report/transferencia_liq',NULL,3,'A',NULL),(128,6,'Generar Accual Operaciones','?cid=report/generar_accual','../in.php?cid=report/generar_aacual',NULL,3,'A',NULL),(129,3,'Directorio de clientes, Proveedores, otros','?cid=files/directorio_clientes_prov','../in.php?cid=files/directorio_clientes_prov',NULL,4,'A',NULL),(130,3,'Tipos de operaciones de cartera','?cid=files/tipos_cartera','../in.php?cid=files/tipos_cartera',NULL,4,'A',NULL),(131,3,'Formas de pago','?cid=files/forma_pago','../in.php?cid=files/forma_pago',NULL,4,'A',NULL),(132,4,'Facturas Compras','?cid=activities/facturas_compras','../in.php?cid=activities/facturas_compras',NULL,4,'A',NULL),(133,4,'Notas de Débito','?cid=activities/notas_debito','../in.php?cid=activities/notas_debito',NULL,4,'A',NULL),(134,4,'Notas de Crédito','?cid=activities/notas_credito','../in.php?cid=activities/notas_credito',NULL,4,'A',NULL),(135,4,'Anulación de cartera por pagar','?cid=activities/anulacion_cartera_x_pagar','../in.php?cid=activities/anulacion_cartera_x_pagar',NULL,4,'A',NULL),(136,5,'Reimpresión de Documentos','?cid=report/reimpresion_documentos','../in.php?cid=report/reimpresion_documentos',NULL,4,'A',NULL),(137,5,'Informe de cartera por pagar','?cid=report/informe_cartera_pagar','../in.php?cid=report/informe_cartera_pagar',NULL,4,'A',NULL),(138,5,'Estado de cuenta proveedores','?cid=report/estado_cuenta_prov','../in.php?cid=report/estado_cuenta_prov',NULL,4,'A',NULL),(139,5,'Diario de cartera por pagar','?cid=report/diario_cartera_pagar','../in.php?cid=report/diario_cartera_pagar',NULL,4,'A',NULL),(140,5,'Analisis de vencimientos x pagar','?cid=report/analisis_vencimientos','../in.php?cid=report/analisis_vencimientos',NULL,4,'A',NULL),(141,5,'Analisis Cartera x pagar x emision','?cid=analisis_cartera_pagar_emision','../in.php?cid=report/analisis_cartera_pagar_emision',NULL,4,'A',NULL),(142,5,'Analisis de vencimientos anual x pagar','?cid=report/analisis_vencimientos_anual_pagar','../in.php?cid=report/analisis_vencimientos_anual_pagar',NULL,4,'A',NULL),(143,6,'Recuperación estado de cuenta','?cid=processes/recuperacion_est_cuenta','../in.php?cid=processes/recuperacion_est_cuenta',NULL,4,'A',NULL),(144,6,'Recuperación de cancelaciones','?cid=processes/recuperacion_cancelaciones','../in.php?cid=processes/recuperacion_cancelaciones',NULL,4,'A',NULL),(145,6,'Generación de Contable CxP','?cid=processes/generacion_contable_cp','../in.php?cid=processes/generacion_contable_cp',NULL,4,'A',NULL),(146,6,'Generación de Contable CxP Otros','?cid=processes/generacion_contable_cp_otros','../in.php?cid=processes/generacion_contable_cp_otros',NULL,4,'A',NULL),(147,6,'Cierre de cartera','?cid=processes/cierre_cartera','../in.php?cid=processes/cierre_cartera',NULL,4,'A',NULL),(148,3,'Clients','?cid=files/clients','../in.php?cid=files//clients',NULL,6,'A',NULL),(149,5,'Client Report','?cid=files/client_report','../in.php?cid=files/client_report',NULL,6,'A',NULL),(150,3,'Currency','?cid=files/view_currency','../in.php?cid=files/view_currency',NULL,1,'A',NULL);
/*!40000 ALTER TABLE `modulos_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_moodificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'ECUADOR','2019-06-04 00:00:00',NULL,NULL,'A',NULL),(2,'ARGENTINA','2019-06-05 00:00:00',NULL,NULL,'A',NULL);
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_p` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `permisos_modulo` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,1,1,1,'2019-07-07 23:04:22',NULL,'ACTIVO'),(2,1,1,2,'2019-07-07 23:04:22',NULL,'ACTIVO'),(3,1,1,3,'2019-07-07 23:04:22',NULL,'ACTIVO'),(4,1,1,4,'2019-07-07 23:04:22',NULL,'ACTIVO'),(5,1,1,5,'2019-07-07 23:04:22',NULL,'ACTIVO'),(6,1,1,6,'2019-07-07 23:04:22',NULL,'ACTIVO'),(7,1,1,7,'2019-07-07 23:04:22',NULL,'ACTIVO'),(8,2,2,1,NULL,NULL,'ACTIVO'),(9,2,2,2,NULL,NULL,'ACTIVO'),(10,2,2,3,NULL,NULL,'ACTIVO'),(11,2,2,4,NULL,NULL,'ACTIVO'),(12,2,2,5,NULL,NULL,'ACTIVO'),(13,2,2,6,NULL,NULL,'ACTIVO'),(14,2,2,7,NULL,NULL,'ACTIVO'),(15,3,3,1,NULL,NULL,'ACTIVO'),(16,3,3,2,NULL,NULL,'ACTIVO'),(17,3,3,3,NULL,NULL,'ACTIVO'),(18,3,3,4,NULL,NULL,'ACTIVO'),(19,3,3,5,NULL,NULL,'ACTIVO'),(20,3,3,6,NULL,NULL,'ACTIVO'),(21,3,3,7,NULL,NULL,'ACTIVO');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_provincia` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_moodificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `observacion` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'GUAYAS',1,'2019-06-04 00:00:00',NULL,NULL,'A',NULL);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(200) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2019-07-07 23:04:22',NULL,NULL,'A',NULL),(2,'Developer',NULL,NULL,NULL,'A',''),(3,'RRHH',NULL,NULL,NULL,'A','');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s01tab110`
--

DROP TABLE IF EXISTS `s01tab110`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `s01tab110` (
  `codtipcta` int(3) NOT NULL AUTO_INCREMENT,
  `nomtipcta` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`codtipcta`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s01tab110`
--

LOCK TABLES `s01tab110` WRITE;
/*!40000 ALTER TABLE `s01tab110` DISABLE KEYS */;
INSERT INTO `s01tab110` VALUES (1,'Bank'),(2,'Accounts Receivable'),(3,'Other Current Asset'),(4,'Fixed Asset'),(5,'Accounts Payable'),(6,'Credit Card'),(7,'Other Current Liability'),(8,'Long Term Liability'),(9,'Equity'),(10,'Income'),(11,'Cost of Goods Sold'),(12,'Expense'),(13,'Other Income'),(14,'Non-Posting');
/*!40000 ALTER TABLE `s01tab110` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_rentas`
--

DROP TABLE IF EXISTS `servicio_rentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `servicio_rentas` (
  `id_sri` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `fax` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `ruc` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `representante_legal` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `tipo_identificacion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `identificacion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `contador` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `ruc_contador` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `auto_sri` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `observacion` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_sri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_rentas`
--

LOCK TABLES `servicio_rentas` WRITE;
/*!40000 ALTER TABLE `servicio_rentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio_rentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesion`
--

DROP TABLE IF EXISTS `sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sesion` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `modulo` int(11) DEFAULT NULL,
  `fecha_acceso` datetime DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesion`
--

LOCK TABLES `sesion` WRITE;
/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesion_init`
--

DROP TABLE IF EXISTS `sesion_init`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sesion_init` (
  `id_init` int(11) NOT NULL AUTO_INCREMENT,
  `num_sesion` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `modulo` int(11) DEFAULT NULL,
  `estado_init` varchar(2) DEFAULT NULL,
  `fecha_init` datetime DEFAULT NULL,
  PRIMARY KEY (`id_init`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesion_init`
--

LOCK TABLES `sesion_init` WRITE;
/*!40000 ALTER TABLE `sesion_init` DISABLE KEYS */;
INSERT INTO `sesion_init` VALUES (1,1,NULL,1,1,'I',NULL),(2,2,NULL,1,1,'I',NULL),(3,3,NULL,1,1,'I',NULL),(4,4,NULL,1,1,'I',NULL),(5,5,NULL,1,1,'I',NULL),(6,6,NULL,1,1,'I',NULL),(7,7,NULL,1,1,'I',NULL),(8,8,NULL,1,1,'I',NULL),(9,9,5,1,1,'I',NULL),(10,10,NULL,1,1,'I',NULL),(11,11,NULL,1,1,'I',NULL),(12,12,NULL,1,1,'I',NULL),(13,13,NULL,1,1,'I',NULL),(14,14,NULL,1,1,'I',NULL),(15,15,NULL,1,1,'I',NULL),(16,16,NULL,1,1,'I',NULL),(17,17,NULL,1,1,'I',NULL),(18,18,NULL,1,1,'I',NULL),(19,19,NULL,1,1,'I',NULL),(20,20,NULL,1,1,'I',NULL),(21,21,NULL,1,3,'I',NULL),(22,22,NULL,1,1,'I',NULL),(23,23,NULL,1,1,'I',NULL),(24,24,NULL,1,1,'I',NULL),(25,25,NULL,1,1,'I',NULL),(26,26,NULL,1,1,'I',NULL),(27,27,NULL,1,1,'I',NULL),(28,28,NULL,1,1,'I',NULL),(29,29,NULL,1,1,'I',NULL),(30,30,NULL,1,1,'I',NULL),(31,31,NULL,2,1,'I',NULL),(32,32,NULL,1,1,'I',NULL),(33,33,NULL,2,1,'I',NULL),(34,34,NULL,1,1,'I',NULL),(35,35,1,1,1,'I',NULL),(36,36,2,1,1,'I',NULL),(37,37,NULL,1,1,'I',NULL),(38,38,NULL,1,1,'I',NULL),(39,39,NULL,1,1,'I',NULL),(40,40,NULL,1,1,'I',NULL),(41,41,NULL,3,1,'I',NULL),(42,42,NULL,1,1,'I',NULL),(43,43,NULL,1,1,'I',NULL),(44,44,NULL,1,1,'I',NULL),(45,45,NULL,1,1,'I',NULL),(46,46,5,1,1,'I',NULL),(47,47,NULL,1,1,'I',NULL),(48,48,NULL,1,1,'I',NULL),(49,49,NULL,1,1,'I',NULL),(50,50,NULL,1,1,'I',NULL),(51,51,NULL,1,1,'I',NULL),(52,52,NULL,1,1,'I',NULL),(53,53,NULL,1,1,'I',NULL),(54,54,NULL,1,1,'I',NULL),(55,55,NULL,1,1,'I',NULL),(56,56,NULL,1,1,'I',NULL),(57,57,NULL,1,1,'I',NULL),(58,58,NULL,1,1,'I',NULL),(59,59,NULL,1,1,'I',NULL),(60,60,NULL,1,1,'I',NULL),(61,61,NULL,1,1,'I',NULL),(62,62,NULL,1,1,'I',NULL),(63,63,NULL,1,1,'I',NULL),(64,64,NULL,1,1,'I',NULL),(65,65,NULL,1,1,'I',NULL),(66,66,NULL,1,1,'I',NULL),(67,67,NULL,1,1,'I',NULL),(68,68,NULL,1,1,'I',NULL),(69,69,NULL,1,1,'I',NULL),(70,70,NULL,1,1,'I',NULL),(71,71,NULL,1,1,'I',NULL),(72,72,NULL,1,1,'I',NULL),(73,73,NULL,1,1,'I',NULL),(74,74,NULL,1,1,'I',NULL),(75,75,NULL,1,1,'I',NULL),(76,76,NULL,1,1,'I',NULL),(77,77,NULL,1,1,'I',NULL),(78,78,NULL,1,1,'I',NULL),(79,79,NULL,1,1,'I',NULL),(80,80,NULL,1,1,'I',NULL),(81,81,NULL,1,1,'I',NULL),(82,82,NULL,1,1,'I',NULL),(83,83,NULL,1,1,'I',NULL),(84,84,NULL,1,1,'I',NULL),(85,85,NULL,1,1,'I',NULL),(86,86,NULL,1,1,'I',NULL),(87,87,NULL,1,1,'I',NULL),(88,88,NULL,1,1,'I',NULL),(89,89,NULL,1,1,'I',NULL),(90,90,NULL,1,1,'I',NULL);
/*!40000 ALTER TABLE `sesion_init` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_act`
--

DROP TABLE IF EXISTS `tab_act`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_act` (
  `CODIGO` varchar(3) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_act`
--

LOCK TABLES `tab_act` WRITE;
/*!40000 ALTER TABLE `tab_act` DISABLE KEYS */;
INSERT INTO `tab_act` VALUES ('FIN','Financials'),('I-H','Healthcare'),('I-I','Insurance'),('I-L','Logistics'),('I-M','Manufacturing'),('I-P','Pharmaceutical'),('I-R','Real State'),('I-T','Telecom'),('I-U','Utilities'),('I-W','Domestic Wholesale'),('I2E','Entertainment'),('I2M','Marketing'),('I2R','Retail'),('I2T','Trading'),('I3M','Media'),('I3T','Transportation'),('IAE','Agro-export'),('ME','Medical eqipment'),('SF','Seafood');
/*!40000 ALTER TABLE `tab_act` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_asientos`
--

DROP TABLE IF EXISTS `tab_asientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_asientos` (
  `codasi` int(11) NOT NULL,
  `nomasi` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_asientos`
--

LOCK TABLES `tab_asientos` WRITE;
/*!40000 ALTER TABLE `tab_asientos` DISABLE KEYS */;
INSERT INTO `tab_asientos` VALUES (1,'DIARIO',NULL),(2,'INGRESO',NULL),(3,'EGRESO',NULL),(4,'VENTAS',NULL);
/*!40000 ALTER TABLE `tab_asientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_cal`
--

DROP TABLE IF EXISTS `tab_cal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_cal` (
  `CODIGO` varchar(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_cal`
--

LOCK TABLES `tab_cal` WRITE;
/*!40000 ALTER TABLE `tab_cal` DISABLE KEYS */;
INSERT INTO `tab_cal` VALUES ('1','Actual / 360'),('2','Actual / 365'),('3','30 / 360'),('4','30  / 365');
/*!40000 ALTER TABLE `tab_cal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_cli`
--

DROP TABLE IF EXISTS `tab_cli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_cli` (
  `CODIGO` varchar(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_cli`
--

LOCK TABLES `tab_cli` WRITE;
/*!40000 ALTER TABLE `tab_cli` DISABLE KEYS */;
INSERT INTO `tab_cli` VALUES ('B&D','Borowers & Debtors'),('D','Debtor'),('DS','Debtor-Supplier'),('E','Employee'),('I','Investor'),('I_D','Investor & Debtor'),('S','Suppliers');
/*!40000 ALTER TABLE `tab_cli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_email`
--

DROP TABLE IF EXISTS `tab_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_email` (
  `codemail` int(3) NOT NULL AUTO_INCREMENT,
  `nomemail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codemail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_email`
--

LOCK TABLES `tab_email` WRITE;
/*!40000 ALTER TABLE `tab_email` DISABLE KEYS */;
INSERT INTO `tab_email` VALUES (1,'Work Email'),(2,'Personal Email'),(3,'Other Email');
/*!40000 ALTER TABLE `tab_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_hor`
--

DROP TABLE IF EXISTS `tab_hor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_hor` (
  `horlog` varchar(5) DEFAULT NULL COMMENT 'nombre de nota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_hor`
--

LOCK TABLES `tab_hor` WRITE;
/*!40000 ALTER TABLE `tab_hor` DISABLE KEYS */;
INSERT INTO `tab_hor` VALUES ('07:00'),('07:30'),('08:00'),('08:30'),('09:00'),('09:30'),('10:00'),('10:30'),('11:00'),('11:30'),('12:00'),('12:30'),('13:00'),('13:30'),('14:00'),('14:30'),('15:00'),('15:30'),('16:00'),('16:30'),('17:00'),('17:30'),('18:00'),('18:30'),('19:00'),('19:30'),('20:00'),('20:30'),('21:00'),('21:30');
/*!40000 ALTER TABLE `tab_hor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_ide`
--

DROP TABLE IF EXISTS `tab_ide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_ide` (
  `CODIGO` varchar(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `_NullFlags` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_ide`
--

LOCK TABLES `tab_ide` WRITE;
/*!40000 ALTER TABLE `tab_ide` DISABLE KEYS */;
INSERT INTO `tab_ide` VALUES ('DL','Driver License',''),('P','Passport',''),('R','Registro Unico Contribuyente',''),('TID','Tax ID','');
/*!40000 ALTER TABLE `tab_ide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_log`
--

DROP TABLE IF EXISTS `tab_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_log` (
  `codnot` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de nota',
  `nomnot` varchar(45) DEFAULT NULL COMMENT 'nombre de nota',
  `bloqnot` bit(1) DEFAULT NULL COMMENT 'si esta bloqueada , solo en el codigo 9 de envio de correos',
  PRIMARY KEY (`codnot`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_log`
--

LOCK TABLES `tab_log` WRITE;
/*!40000 ALTER TABLE `tab_log` DISABLE KEYS */;
INSERT INTO `tab_log` VALUES (1,'Log Note',_binary '\0'),(2,'Log Phone Call',_binary '\0'),(3,'Log Meeting',_binary '\0'),(9,'Log Email',_binary '');
/*!40000 ALTER TABLE `tab_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_network`
--

DROP TABLE IF EXISTS `tab_network`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_network` (
  `codnetwork` int(3) NOT NULL AUTO_INCREMENT,
  `nomnetwork` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codnetwork`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_network`
--

LOCK TABLES `tab_network` WRITE;
/*!40000 ALTER TABLE `tab_network` DISABLE KEYS */;
INSERT INTO `tab_network` VALUES (1,'Linkedln'),(2,'Twitter'),(3,'Google +'),(4,'Facebook'),(5,'Youtube'),(6,'Foursquare');
/*!40000 ALTER TABLE `tab_network` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_ofi`
--

DROP TABLE IF EXISTS `tab_ofi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_ofi` (
  `CODIGO` varchar(3) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_ofi`
--

LOCK TABLES `tab_ofi` WRITE;
/*!40000 ALTER TABLE `tab_ofi` DISABLE KEYS */;
INSERT INTO `tab_ofi` VALUES ('001','MAURICIO JARVIS'),('002','JOSE LUIS HIDALGO'),('003','CARLOS VALLEJO'),('004','ERNESTO HIDALGO'),('005','CESAR SILVA');
/*!40000 ALTER TABLE `tab_ofi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_phone`
--

DROP TABLE IF EXISTS `tab_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_phone` (
  `codphone` int(3) NOT NULL AUTO_INCREMENT,
  `nomphone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codphone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_phone`
--

LOCK TABLES `tab_phone` WRITE;
/*!40000 ALTER TABLE `tab_phone` DISABLE KEYS */;
INSERT INTO `tab_phone` VALUES (1,'Work Phone'),(2,'Movile Phone'),(3,'Home Phone'),(4,'Other Phone');
/*!40000 ALTER TABLE `tab_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_tclient`
--

DROP TABLE IF EXISTS `tab_tclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_tclient` (
  `codtipo` int(3) NOT NULL AUTO_INCREMENT,
  `nomtipo` varchar(45) DEFAULT NULL,
  `checking` bit(1) DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_tclient`
--

LOCK TABLES `tab_tclient` WRITE;
/*!40000 ALTER TABLE `tab_tclient` DISABLE KEYS */;
INSERT INTO `tab_tclient` VALUES (1,'Potential Customer',_binary ''),(2,'Active',_binary ''),(3,'No Active',_binary ''),(4,'W.O.',_binary '');
/*!40000 ALTER TABLE `tab_tclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_tcontact`
--

DROP TABLE IF EXISTS `tab_tcontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_tcontact` (
  `codtipo` int(3) NOT NULL AUTO_INCREMENT,
  `nomtipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_tcontact`
--

LOCK TABLES `tab_tcontact` WRITE;
/*!40000 ALTER TABLE `tab_tcontact` DISABLE KEYS */;
INSERT INTO `tab_tcontact` VALUES (1,'CEO'),(2,'COO'),(3,'TREASURER'),(4,'W.O.');
/*!40000 ALTER TABLE `tab_tcontact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_web`
--

DROP TABLE IF EXISTS `tab_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tab_web` (
  `codweb` int(3) NOT NULL AUTO_INCREMENT,
  `nomweb` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codweb`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_web`
--

LOCK TABLES `tab_web` WRITE;
/*!40000 ALTER TABLE `tab_web` DISABLE KEYS */;
INSERT INTO `tab_web` VALUES (1,'Work Website'),(2,'Personal Website'),(3,'Other Website');
/*!40000 ALTER TABLE `tab_web` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `namesurname` varchar(200) DEFAULT NULL,
  `position` varchar(150) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `correo` varchar(200) NOT NULL,
  `passw` varchar(200) NOT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `initial_system` varchar(200) DEFAULT NULL,
  `can_cancel` varchar(200) DEFAULT NULL,
  `can_modify` varchar(200) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'tecnosoft','Tecnosoft Computers','1','Admin',NULL,'gerencia@tecnosoftcomputers.com','ef7f812bc1d1a40e9afc6065e7022046cf89f48a',NULL,'1',NULL,NULL,'2019-07-07 23:04:22',NULL,NULL,'A',NULL),(2,'Fernando','Fernando Reyes','2','Developer','042383929','fersland@outlook.es','1c44cac813d56a3e53c062bcf77d08972780ea5a',NULL,'1',NULL,NULL,NULL,NULL,NULL,'A',NULL),(3,'yen','Yen Cheng','3','RRHH','042565636','yen@outlook.es','1c44cac813d56a3e53c062bcf77d08972780ea5a',NULL,'1',NULL,NULL,NULL,NULL,NULL,'A',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_empresas`
--

DROP TABLE IF EXISTS `usuarios_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios_empresas` (
  `id_user_emp` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `empresas` int(11) NOT NULL,
  `estado` varchar(1) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_user_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_empresas`
--

LOCK TABLES `usuarios_empresas` WRITE;
/*!40000 ALTER TABLE `usuarios_empresas` DISABLE KEYS */;
INSERT INTO `usuarios_empresas` VALUES (1,1,1,'A'),(2,1,2,'A'),(3,1,3,'A'),(4,1,4,'A'),(5,1,5,'A'),(6,1,6,'A'),(7,2,1,'I'),(8,2,2,'I'),(9,2,3,'A'),(10,2,4,'I'),(11,2,5,'I'),(12,2,6,'I'),(13,3,1,'I'),(14,3,2,'I'),(15,3,3,'A'),(16,3,4,'I'),(17,3,5,'I'),(18,3,6,'I');
/*!40000 ALTER TABLE `usuarios_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_modulos`
--

DROP TABLE IF EXISTS `usuarios_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios_modulos` (
  `idusermod` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `modulos` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idusermod`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_modulos`
--

LOCK TABLES `usuarios_modulos` WRITE;
/*!40000 ALTER TABLE `usuarios_modulos` DISABLE KEYS */;
INSERT INTO `usuarios_modulos` VALUES (1,1,1,'A'),(2,1,2,'A'),(3,1,3,'A'),(4,1,4,'A'),(5,1,5,'A'),(6,1,6,'A'),(7,2,1,'A'),(8,2,2,'I'),(9,2,3,'I'),(10,2,4,'I'),(11,2,5,'I'),(12,2,6,'I'),(13,3,1,'A'),(14,3,2,'I'),(15,3,3,'I'),(16,3,4,'I'),(17,3,5,'I'),(18,3,6,'I');
/*!40000 ALTER TABLE `usuarios_modulos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31 16:54:50
