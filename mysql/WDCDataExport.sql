-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: WDC
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image` varchar(45) DEFAULT 'WDC-logo.png',
  `url` varchar(150) DEFAULT '#',
  `position` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT 'yes',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Gregory','Steenhagen','Senior','Software Engineering','WDC President. Drop dead handsome. Airbender.','Steenhagen-Gregory-md.jpg','http://www.stonestreetsoftware.com','President','yes','2016-09-09 20:19:16'),(2,'Nathan','Karasch','Senior','Software Engineering','WDC Treasurer. Retired rockstar. US Marine. Cookie Monster','Karasch-Nathan-md.jpg','#','Treasurer','yes','2016-09-09 20:19:16'),(3,'Leelabari','Fulbel',NULL,NULL,'WDC Vice President.','Fulbel-Leelabari-md.jpg','#','Vice President','yes','2016-09-09 20:19:16'),(4,'Christine','Hicaro',NULL,NULL,'WDC Outreach Coordinator','Hicaro-Christine-md.jpg','#','Outreach','yes','2016-09-09 20:19:16');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `active` varchar(45) DEFAULT 'yes',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Jewell Family Dentistry','Dan and Meryl Scarrow asked us to make this website for their new dental office located in Jewell, Iowa. This website serves as a point of contact for potential patients. ','WDC-logo.png','http://www.jewellfamilydentistry.com','yes','2016-09-09 20:26:40');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,'ISU Student Organization Database','The club\'s official student organization page for Iowa State University.\n','https://www.stuorg.iastate.edu/site/web-dev-club','social','2016-09-09 20:37:33'),(2,'Facebook',NULL,'https://www.facebook.com/ISUWebDevelopment','social','2016-09-09 20:37:33'),(3,'Twitter',NULL,'https://twitter.com/ISU_Web_Dev','social','2016-09-09 20:37:33'),(4,'Slack','A chat client for discussing projects, development, or random YouTube videos.','https://isuwdc.slack.com','social','2016-09-09 20:37:33'),(5,'Operations Manual','','https://github.com/ISU-WebDevClub/club-documents/blob/master/operations-manual.md','documents','2016-09-09 20:37:33'),(6,'Constitution','','https://github.com/ISU-WebDevClub/club-documents/blob/master/constitution.md','documents','2016-09-09 20:37:33'),(7,'Github','The repository for all the club\'s code.','https://github.com/ISU-webdevclub','documents','2016-09-09 20:37:33'),(8,'Google Drive','Primarily documents, meeting minutes, etc.','https://drive.google.com/a/iastate.edu/folderview?id=0B4rWlTKPygEyfkw1YVdEZUtBUVZ2cjFSeUZIVEFKMkZjRlJoWldDcWhJckNuMkkzUm1DZlE&usp=sharing#','documents','2016-09-09 20:37:33'),(9,'W3School','A fine source of knowledge about HTML, XML, CSS, Bootstrap, JavaScript, JQuery, SQL, and PHP.','http://www.w3schools.com/','development','2016-09-09 20:37:33'),(10,'Bootstrap','One of the most exhaustive sources of Bootstrap info.','http://getbootstrap.com/','development','2016-09-09 20:37:33'),(11,'Github For Windows','A tutorial created by one of our own covering the basics of Git and GitHub in a Windows environment.',NULL,'development','2016-09-09 20:37:33'),(12,'Stack Overflow','Got a question? Odds are, the answer\'s in here...','http://stackoverflow.com/','development','2016-09-09 20:37:33'),(13,'Lynda','Learn technology, software development, creative skills, and business savvy from the professionals in these quality video courses. Free access for ISU students.','http://www.lynda.com/','development','2016-09-09 20:37:33'),(14,'TheNewBoston','Watch thousands of free educational video tutorials.','https://www.thenewboston.com/','development','2016-09-09 20:37:33'),(15,'Bento','Everything you need to be a self-taught expert developer.','https://www.bento.io/','development','2016-09-09 20:37:33');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-09 20:38:34
