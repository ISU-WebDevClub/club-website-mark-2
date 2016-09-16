-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 66.147.244.88    Database: stonesu0_WDC
-- ------------------------------------------------------
-- Server version	5.5.51-38.1-log

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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `image` varchar(45) DEFAULT 'WDC-logo.png',
  `date` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `active` varchar(45) DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Founding','The club was officially recognized on August 24, 2015. At that time, there were only eight members.The first semester of the club\'s existence started out with a bang! Our numbers grew rapidly, and everyone was eager to get started. As expected, there was a massive amount of interest in the club even before we began to promote ourselves. People of all skill levels joined and brought a wide range of skills to the table.','WDC-logo.png','2015-08-24','2016-09-12 14:51:18','yes'),(2,'First Club Meeting','The first meeting was held September 2nd, 2015 in Coover Hall. The weather was nice, so we moved out to the courtyard to celebrate the club\'s founding with some soda and cookies. There were nine members in attendance, and we all had high hopes of doing great things with the club.','first_meeting.jpg','2015-09-02','2016-09-12 14:53:06','yes'),(3,'Going Public','The club made its first public appearance at the Fall 2015 ClubFest. We had sixty-eight people sign up for the mailing list. Membership more than doubled. In addition, we networked with other clubs and found out there was a huge interest in web development services around campus and around town. We would soon have our hands full!','ClubFest_table_Fall_2015_(small).JPG','2015-09-09','2016-09-12 14:54:10','yes'),(4,'HackISU','On September 19, 2015 we made excellent progress on the club website at HackISU, Iowa State\'s annual hackathon. Sleep was lost, caffeine was consumed, and Nicolas Cage image placeholders were used in abundance.','cage-superman.jpg','2015-09-19','2016-09-12 14:54:53','yes');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  `start_time` varchar(5) NOT NULL,
  `end_time` varchar(5) NOT NULL,
  `room` varchar(45) NOT NULL,
  `building` varchar(45) NOT NULL,
  `year` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Fall','no'),(2,'Tuesdays','18:00','20:00','1016','Coover Hall','2016','Fall','no'),(3,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Fall','no'),(4,'Tuesday','18:00','19:00','1016','Coover Hall','2016','Fall','no'),(5,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Fall','no'),(6,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Fall','no'),(7,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Spring','no'),(8,'Tuesdays','18:00','19:00','1016','Coover Hall','2016','Fall','yes');
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

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
  `short_desc` varchar(60) DEFAULT NULL,
  `long_desc` text,
  `image` varchar(45) DEFAULT 'WDC-logo.png',
  `url` varchar(150) DEFAULT '#',
  `position` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Gregory','Steenhagen','Senior','Software Engineering','WDC President. Web Developer. The Last Avatar.','','Steenhagen-Charlie-md.jpg','http://www.stonestreetsoftware.com','President','yes','2016-09-09 20:19:16'),(2,'Nathan','Karasch','Senior','Software Engineering','WDC Treasurer. Retired rockstar. US Marine. Cookie Monster',NULL,'Karasch-Nathan-md.jpg','#','Treasurer','yes','2016-09-09 20:19:16'),(3,'Leelabari','Fulbel',NULL,NULL,'WDC Vice President.',NULL,'Fulbel-Leelabari-md.jpg','#','Vice President','yes','2016-09-09 20:19:16'),(4,'Christine','Hicaro',NULL,NULL,'WDC Outreach Coordinator',NULL,'Hicaro-Christine-md.jpg','#','Outreach','yes','2016-09-09 20:19:16');
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
  `short_desc` varchar(100) DEFAULT NULL,
  `long_desc` text,
  `image` varchar(45) DEFAULT 'WDC-logo.png',
  `url` varchar(100) DEFAULT NULL,
  `active` varchar(45) DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Jewell Family Dentistry','Dan and Meryl Scarrow\'s website for their new dentist office located in Jewell, Iowa.','Dan and Meryl Scarrow first approached us in the spring of 2016 to develop the website for their new dental office in Jewell. They were renovating an historic brick building on the main street in Jewell, and wanted the website to reflect that. The site is fully responsive and shrinks with the browser. It also features an admin page to allow Dan and Meryl to upload photos, change the content, and activate and deactivate photos. It was built with PHP, CSS, HTML and Javascript.','WDC-logo.png','http://www.jewellfamilydentistry.com','yes','2016-09-09 20:26:40');
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
  `active` varchar(45) DEFAULT 'yes',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,'ISU Student Organization Database','The club\'s official student organization page for Iowa State University. TEST\r\n','https://www.stuorg.iastate.edu/site/web-dev-club','social','yes','2016-09-09 20:37:33'),(2,'Facebook',NULL,'https://www.facebook.com/ISUWebDevelopment','social','yes','2016-09-09 20:37:33'),(3,'Twitter',NULL,'https://twitter.com/ISU_Web_Dev','social','yes','2016-09-09 20:37:33'),(4,'Slack','A chat client for discussing projects, development, or random YouTube videos.','https://isuwdc.slack.com','social','yes','2016-09-09 20:37:33'),(5,'Operations Manual','','https://github.com/ISU-WebDevClub/club-documents/blob/master/operations-manual.md','documents','yes','2016-09-09 20:37:33'),(6,'Constitution','','https://github.com/ISU-WebDevClub/club-documents/blob/master/constitution.md','documents','yes','2016-09-09 20:37:33'),(7,'Github','The repository for all the club\'s code.','https://github.com/ISU-webdevclub','documents','yes','2016-09-09 20:37:33'),(8,'Google Drive','Primarily documents, meeting minutes, etc.','https://drive.google.com/a/iastate.edu/folderview?id=0B4rWlTKPygEyfkw1YVdEZUtBUVZ2cjFSeUZIVEFKMkZjRlJoWldDcWhJckNuMkkzUm1DZlE&usp=sharing#','documents','yes','2016-09-09 20:37:33'),(9,'W3School','A fine source of knowledge about HTML, XML, CSS, Bootstrap, JavaScript, JQuery, SQL, and PHP.','http://www.w3schools.com/','development','yes','2016-09-09 20:37:33'),(10,'Bootstrap','One of the most exhaustive sources of Bootstrap info.','http://getbootstrap.com/','development','yes','2016-09-09 20:37:33'),(11,'Github For Windows','A tutorial created by one of our own covering the basics of Git and GitHub in a Windows environment.',NULL,'development','yes','2016-09-09 20:37:33'),(12,'Stack Overflow','Got a question? Odds are, the answer\'s in here...','http://stackoverflow.com/','development','yes','2016-09-09 20:37:33'),(13,'Lynda','Learn technology, software development, creative skills, and business savvy from the professionals in these quality video courses. Free access for ISU students.','http://www.lynda.com/','development','yes','2016-09-09 20:37:33'),(14,'TheNewBoston','Watch thousands of free educational video tutorials.','https://www.thenewboston.com/','development','yes','2016-09-09 20:37:33'),(15,'Bento','Everything you need to be a self-taught expert developer.','https://www.bento.io/','development','yes','2016-09-09 20:37:33');
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

-- Dump completed on 2016-09-14  1:41:50
