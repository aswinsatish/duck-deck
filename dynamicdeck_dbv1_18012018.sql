-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: dynamicdeck_dbv1
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `dk_attachments`
--

DROP TABLE IF EXISTS `dk_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pid` varchar(55) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_attachments`
--

LOCK TABLES `dk_attachments` WRITE;
/*!40000 ALTER TABLE `dk_attachments` DISABLE KEYS */;
INSERT INTO `dk_attachments` VALUES (1,2,'image/jpeg','T1IALgBXAv1RXrhCrK.jpg','5a55abff2cb92_T1IALgBXAv1RXrhCrK.jpg','120716','image/jpeg','Mi phone','Short description of the attachment goes here','p1','2018-01-10 11:31:10'),(2,4,'application/pdf','ie.pdf','5a55d2a602048_ie.pdf','29334764','application/pdf','EY Report','General guidance on the taxation of rental income, including Frequently Asked Questions','p1','2018-01-10 14:16:03'),(3,8,'','DD_v0-9.sketch','5a5dedc1e522f_DD_v0-9.sketch','1795983','','Web Summit 2016',' Web Summit Report','p2','2018-01-16 17:52:45');
/*!40000 ALTER TABLE `dk_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_deck_print`
--

DROP TABLE IF EXISTS `dk_deck_print`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_deck_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `print_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_deck_print`
--

LOCK TABLES `dk_deck_print` WRITE;
/*!40000 ALTER TABLE `dk_deck_print` DISABLE KEYS */;
INSERT INTO `dk_deck_print` VALUES (1,4,2,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','2018-01-10 14:09:29'),(2,4,2,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','2018-01-10 17:00:53'),(3,4,2,'Mozilla/5.0 (Linux; Android 7.1.1; SM-N950F Build/NMF26X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36','2018-01-16 03:59:33');
/*!40000 ALTER TABLE `dk_deck_print` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_deck_view`
--

DROP TABLE IF EXISTS `dk_deck_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_deck_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `view_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_deck_view`
--

LOCK TABLES `dk_deck_view` WRITE;
/*!40000 ALTER TABLE `dk_deck_view` DISABLE KEYS */;
INSERT INTO `dk_deck_view` VALUES (1,8,0,'2018-01-16 12:08:19'),(2,8,0,'2018-01-17 04:25:11'),(3,8,0,'2018-01-17 04:31:32');
/*!40000 ALTER TABLE `dk_deck_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_interested`
--

DROP TABLE IF EXISTS `dk_interested`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_interested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deck_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reg_ip` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_interested`
--

LOCK TABLES `dk_interested` WRITE;
/*!40000 ALTER TABLE `dk_interested` DISABLE KEYS */;
INSERT INTO `dk_interested` VALUES (1,2,2,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Interested');
/*!40000 ALTER TABLE `dk_interested` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_org_achieve`
--

DROP TABLE IF EXISTS `dk_org_achieve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_org_achieve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `achieve1` varchar(255) DEFAULT NULL,
  `achieve2` varchar(255) NOT NULL,
  `achieve3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_org_achieve`
--

LOCK TABLES `dk_org_achieve` WRITE;
/*!40000 ALTER TABLE `dk_org_achieve` DISABLE KEYS */;
INSERT INTO `dk_org_achieve` VALUES (1,1,'Nvidia is partnering with Uber, Volkswagen and Baidu on driverless cars','Nvidia teams up with Acer, Asus and HP to launch 65-inch gaming displays',' Nvidia Freestyle allows you to apply Snapchat-like filters to games'),(2,2,'With more than 61 million handsets sold in 2014',' Xiaomi is expanding its footprint across the world to become a global brand.','Products launched in Taiwan, Hong Kong, Singapore, Malaysia, Philippines, India, Indonesia and Brazil'),(3,3,'Highly classified US spy satellite appears to be a total loss after SpaceX launch','SpaceX says its rocket performed exactly as intended in Zuma launch','SpaceX successfully launches top-secret Zuma spacecraft'),(4,4,'Total Guests 200,000,000+','Cities 65,000+','Countries 191+'),(5,8,'Supply of Multi-function Ignition for HMCL','Developed Remote Based Immobilizer ','Business Finalized of Lockset  ');
/*!40000 ALTER TABLE `dk_org_achieve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_org_media`
--

DROP TABLE IF EXISTS `dk_org_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_org_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_type` enum('Video','Image','Video-Url') NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  `cdte` datetime NOT NULL DEFAULT '2017-10-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_org_media`
--

LOCK TABLES `dk_org_media` WRITE;
/*!40000 ALTER TABLE `dk_org_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `dk_org_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_org_media_download`
--

DROP TABLE IF EXISTS `dk_org_media_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_org_media_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deck_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `reg_ip` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `download_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_org_media_download`
--

LOCK TABLES `dk_org_media_download` WRITE;
/*!40000 ALTER TABLE `dk_org_media_download` DISABLE KEYS */;
INSERT INTO `dk_org_media_download` VALUES (1,4,2,'application/pdf','122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','2018-01-10 15:03:22');
/*!40000 ALTER TABLE `dk_org_media_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_org_phase`
--

DROP TABLE IF EXISTS `dk_org_phase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_org_phase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phase_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_org_phase`
--

LOCK TABLES `dk_org_phase` WRITE;
/*!40000 ALTER TABLE `dk_org_phase` DISABLE KEYS */;
INSERT INTO `dk_org_phase` VALUES (1,'Seed'),(2,'Start-Up'),(3,'Growth'),(4,'Established'),(5,'Expansion'),(6,'Mature'),(7,'Exit');
/*!40000 ALTER TABLE `dk_org_phase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_org_sector`
--

DROP TABLE IF EXISTS `dk_org_sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_org_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_org_sector`
--

LOCK TABLES `dk_org_sector` WRITE;
/*!40000 ALTER TABLE `dk_org_sector` DISABLE KEYS */;
INSERT INTO `dk_org_sector` VALUES (1,'Aeronautics and Defence'),(2,'Alternative Investment Instruments'),(3,'Automotive and Parts'),(4,'Banking'),(5,'Beverages'),(6,'Building and Materials'),(7,'Commercial Transportation'),(8,'Domestic Goods'),(9,'Electricity Generation and Distribution'),(10,'Electronic & Electrical Equipment'),(11,'Engineering Products'),(12,'Financials'),(13,'Food Products'),(14,'Forestry & Paper'),(15,'Fossil Fuels and Distribution'),(16,'Health Care and Related Services'),(17,'Household Utilities'),(18,'Industrial Chemicals'),(19,'Industrials'),(20,'Insurance'),(21,'Investment Companies'),(22,'IT Hardware'),(23,'IT Services'),(24,'Leisure Products'),(25,'Media'),(26,'Medicine and Biotech Research'),(27,'Metals'),(28,'Mining'),(29,'Personal Goods'),(30,'Property'),(31,'Retailers'),(32,'Support'),(33,'Telecommunications'),(34,'Tobacco'),(35,'Tourism and LeisureAeronautics and Defence');
/*!40000 ALTER TABLE `dk_org_sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_organisation`
--

DROP TABLE IF EXISTS `dk_organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `deck_name` varchar(255) NOT NULL,
  `deckurl` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_desc` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `org_phase` varchar(255) NOT NULL,
  `org_sector` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `cover_high_res` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `linkedin_page` varchar(255) NOT NULL,
  `twitter_page` varchar(255) NOT NULL,
  `link_organisation` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `fund_currency` varchar(255) NOT NULL,
  `pre_commited_type` varchar(255) NOT NULL,
  `investment_sought` varchar(255) NOT NULL,
  `equity` varchar(255) NOT NULL,
  `valuation` varchar(255) NOT NULL,
  `pre_commited_money` varchar(255) NOT NULL,
  `org_registered` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `org_generated_revenue` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `reg_num_country` varchar(255) NOT NULL,
  `org_reg_number` varchar(255) NOT NULL,
  `revenue_currency` varchar(255) NOT NULL,
  `estimated_sequence` varchar(255) NOT NULL,
  `previous_funding` varchar(255) NOT NULL,
  `what_we_do` varchar(255) NOT NULL,
  `competitors` text NOT NULL,
  `problem1` text NOT NULL,
  `problem2` text NOT NULL,
  `problem3` text NOT NULL,
  `business_model` varchar(255) NOT NULL,
  `advantage` varchar(255) NOT NULL,
  `shared` enum('Yes','No') NOT NULL DEFAULT 'No',
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `share_password` varchar(255) NOT NULL,
  `share_link` varchar(255) NOT NULL,
  `client_link` varchar(255) NOT NULL,
  `interest_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `download_count` int(11) NOT NULL,
  `print_count` int(11) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `modified_user` varchar(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_organisation`
--

LOCK TABLES `dk_organisation` WRITE;
/*!40000 ALTER TABLE `dk_organisation` DISABLE KEYS */;
INSERT INTO `dk_organisation` VALUES (1,2,'D-201801101044','Nvidia','','Nvidia Company','Nvidia manufactures integrated circuits for use in motherboard chip-sets.','Santa Clara, California, United States','','Hardware','5a55a5bf440d2_1024.jpg','','5a55a1455c281_jhowtgkdwv2aa1eodg2b.png',' www.nvidia.com','twitter.com/nvidia','www.linkedin.com/company/3608','www.facebook.com/NVIDIA','2017-05-17 00:00:00','50,000','600','120,000','30','280,000','200','Yes','Yes','','US: 4526356','40,000','550','','Nvidia specializes in the manufacture of graphics-processor technologies for workstations, desktop computers, and mobile devices','Siemens','Nvidia teams up with Acer, Asus and HP to launch 65-inch gaming displays','NVIDIA Releases 390.65 WHQL Game Ready Driver, Includes Mitigation Updates for Spectre','Maxim Collaborates with NVIDIA on Autonomous Driving and Safety Applications','The company, based in Santa Clara, California, is a major supplier of integrated circuits used for personal-computer motherboard chipsets, graphics processing units (GPUs), and game-consoles','Nvidia software platform will bring augmented reality to future autonomous cars','No','Yes','','','',0,0,0,0,'','2018-01-10 10:44:43','','2018-01-10 10:44:43'),(2,2,'D-201801101113','Mi','','Xiaomi','Xiaomi is a privately owned electronics and software company focused on mobile devices and technology.','Beijing, China','','Trade','5a55a925c6e80_mediac6.jpg','','5a55a925c6f44_svnanxkx25pojujc9jmg.png',' www.mi.com','/www.linkedin.com/company/xiaomi-technology','twitter.com/xiaomi','www.facebook.com/xiaomiglobal','2018-01-11 00:00:00','50,000','23','245,345','12','1,799,196','300','Yes','Yes','','CH: 56321523','65,000','560','','Xiaomi Inc. manufactures and distributes mobile phones and consumer electronics. The company also develops mobile applications.','Apple','Xiaomi targets the lower-middle market and has gained a loyal fan base by incorporating user feedback into the design of its latest sets and Android skins.',' Offers internet value-added products including TV boxes, backpacks, phone screen protectors, earphones, and more.','Xiaomi products include Redmi, an Android smartphone; MIUI ROM, a customizable ROM; MiTalk, a messaging application; Mi TV','Xiaomi is focused on being the most user-centric mobile internet company, and we aim to constantly exceed expectations through innovations ','\"Just for fans\" – that\'s our belief. Our hardcore Mi fans lead every step of the way.','Yes','Yes','4ad595b','http://dynamicdeck.labsls.com/Deck/listprofiledeck/Mg==/c2hhcmU=','',0,0,0,0,'','2018-01-10 11:13:51','','2018-01-10 11:13:51'),(3,2,'D-201801101154','SpaceX','','Space Exploration Technologies Corporation','SpaceX designs, manufactures, and launches advanced rockets and spacecraft.','Hawthorne, California, United States','','Trade','5a55b19f5c29f_SpaceX-1024.jpg','','5a55b19f5c364_ukeowsv1qr9u2rcrzugg.jpg',' www.spacex.com','www.linkedin.com/company/spacex','twitter.com/SpaceX','www.facebook.com/SpaceX','2018-01-06 00:00:00','56,200','32','22,000','23','73,652','250','Yes','Yes','','US: 3265852','96,520','2,500','','Space Exploration Technologies Corporation (SpaceX) is a space-transportation startup company founded by Elon Musk.','Spacecom',' The launch crew in the Marshall Islands has 25 people, 6 in mission control','August 4, SpaceX released further details; they had accepted a USD$20 million equity investment from the Founder\'s Fund.','In January 2005, SpaceX bought a 10% stake in Surrey Satellite Technology Ltd.','SpaceX recently accepted a significant investment','SpaceX will have more than sufficient funding on hand to continue launching Falcon 1 and develop Falcon 9 and Dragon','Yes','Yes','9a45302','http://dynamicdeck.labsls.com/Deck/listprofiledeck/Mw==/c2hhcmU=','',0,0,0,0,'','2018-01-10 11:54:30','','2018-01-10 11:54:30'),(4,2,'D-201801101212','Airbnb','Airbnb','AirBnB','\nAirbnb\nAirbnb is an online community marketplace for people to list, discover, and book accommodations around the world.','San Francisco, United States','','Hospitality','5a55b5d891a84_o-AIRBNB-facebook.jpg','','5a55b5d891b46_airbnb-logo.jpg','www.airbnb.com','instagram.com/airbnb','Twitter.com/airbnb','facebook.com/airbnb','2008-08-11 00:00:00','555,462,100','30','6,750,000,000','5','128,250,000,000','','Yes','Yes','','CIN 657302','7,000,000','','','Host an online marketplace and hospitality service, for people to lease or rent short-term lodging.','Flipkey, Guest Houser, Home Escape, Tripping.com, Home Away, VayStays','Airbnb can be accessed via either the Airbnb websites or mobile applications for iOS, Apple Watch, and Android.','Registration and account creation is free.','Users can search for lodging using a variety of filters including lodging type, dates, location, and price.','On each booking, the company charges guests a 6%-12% guest services fee and charges hosts a 3%-5% host service fee. ','Users can create a listing by selecting the \"Host\" menu after logging in. A listing will not go live until the host is ready to publish. ','Yes','Yes','7ffff49','','',0,0,0,0,'','2018-01-10 12:12:30','','2018-01-10 12:12:30'),(7,28,'D-201801101836','Lavaic LImited','','Lavaic Limited','The future of storytelling for the modern business','','','','','','5a577fca156d5_logo__1000x1000px.png','','','','',NULL,'','','','','','','Yes','Yes','','','','','','','','','','','','','Yes','Yes','','http://dynamicdeck.labsls.com/Deck/listprofiledeck/Nw==/c2hhcmU=','',0,0,0,0,'','2018-01-10 18:36:44','','2018-01-10 18:36:44'),(8,2,'D-201801161654','Dropbox','dropbox','DropData','Dropbox provides secure file sharing and storage solution.','San Francisco, California,US','','Technology','5a5deac04f67c_maxresdefault.jpg','','5a5de10b0e7e6_dropboxlogo.jpg','www.dropbox.com','www.linkedin.com/linkedin','www.linkedin.com/twitter','www.facebook.com/Dropbox','2017-01-10 00:00:00','35,000,000','','25,000,000','12','183,333,333','','Yes','Yes','','UK:21345678','59,000,000','','','Dropbox simplifies the way people work together. 500 million registered users around the world use Dropbox to work the way they want, on any device, wherever they go','We believe technology should get out of the way, so there’s no limit to what people can do together. We’re a thoughtful, tightly-knit team that’s committed to realizing ambitious ideas.','This seems obvious, but in a world where people are used to getting most things for free,','Just ask Twitter who is still trying to figure out how to make money. Google figured it out; Facebook is on its way; ','Dropbox gives away 2 GB of storage space. However, enough people are blowing through that storage amount and signing up for ','The reason that Dropbox has experienced such explosive growth is that it’s solved the problem of data being spread across multiple devices like phones, tablets and computers. And that problem happens to affect a lot of people.','Download the Dropbox app and store your files in it. Now you can access all of your files, no matter what device you are using. And if you make a change to a file in one location, that file is updated across all devices. You can even invite others to view','Yes','Yes','81d5ac8','http://dynamicdeck.labsls.com/Deck/index/Dropbox20180116','http://dynamicdeck.labsls.com/Deck/index/Dropbox20180116',0,0,0,0,'','2018-01-16 16:54:57','','2018-01-16 16:54:57');
/*!40000 ALTER TABLE `dk_organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_previous_fund`
--

DROP TABLE IF EXISTS `dk_previous_fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_previous_fund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `date1` datetime DEFAULT NULL,
  `currency_type` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `date2` datetime DEFAULT NULL,
  `currency_type1` varchar(255) NOT NULL,
  `currency1` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_previous_fund`
--

LOCK TABLES `dk_previous_fund` WRITE;
/*!40000 ALTER TABLE `dk_previous_fund` DISABLE KEYS */;
INSERT INTO `dk_previous_fund` VALUES (1,1,'2018-01-09 00:00:00','','200','1970-01-01 05:30:00','','60,000'),(2,2,'2018-01-01 00:00:00','','52,000','2018-01-05 00:00:00','','65,230'),(3,3,'2018-01-09 00:00:00','','2,500','2018-01-05 00:00:00','','15,200'),(4,4,'2016-02-04 00:00:00','','8,999,999','2017-09-06 00:00:00','','555,462,100'),(5,6,'1970-01-01 05:30:00','','2500','1970-01-01 05:30:00','','3600'),(7,8,'2018-01-01 00:00:00','','2,500,000','2017-11-06 00:00:00','','29,000,000');
/*!40000 ALTER TABLE `dk_previous_fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_section`
--

DROP TABLE IF EXISTS `dk_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `created_time` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_section`
--

LOCK TABLES `dk_section` WRITE;
/*!40000 ALTER TABLE `dk_section` DISABLE KEYS */;
/*!40000 ALTER TABLE `dk_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_share_deck`
--

DROP TABLE IF EXISTS `dk_share_deck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_share_deck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `shared_time` datetime NOT NULL,
  `shared_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_share_deck`
--

LOCK TABLES `dk_share_deck` WRITE;
/*!40000 ALTER TABLE `dk_share_deck` DISABLE KEYS */;
INSERT INTO `dk_share_deck` VALUES (1,'preethu@logicalsteps.net',12,'2017-12-28 11:53:09','2'),(2,'minu@logicalsteps.net',12,'2017-12-28 11:53:09','2'),(3,'preethu@logicalsteps.net',12,'2017-12-28 11:54:11','2'),(4,'minu@logicalsteps.net',12,'2017-12-28 11:54:11','2'),(5,'anju.s@logicalsteps.net',12,'2017-12-28 11:54:11','2'),(6,'minu@logicalsteps.net',18,'2017-12-28 16:12:28','2'),(7,'preethu@logicalsteps.net',31,'2018-01-01 14:49:09','2'),(8,'preethu@logic.com',31,'2018-01-01 15:18:00','2'),(9,'p@gmail.com',31,'2018-01-01 15:21:01','2'),(10,'preethu@logicalsteps.net',31,'2018-01-01 15:31:26','2'),(11,'preethu@logicalsteps.net',31,'2018-01-01 15:36:48','2'),(12,'preethu@logicalsteps.net',31,'2018-01-01 15:37:08','2'),(13,'preethu@logicalsteps.net',31,'2018-01-01 15:42:49','2'),(14,'preethu@logicalsteps.net',31,'2018-01-01 15:43:14','2'),(15,'preethu@logicalsteps.net',31,'2018-01-01 15:43:29','2'),(16,'preethu@logicalsteps.net',31,'2018-01-01 15:46:02','2'),(17,'preethu@logicalsteps.net',31,'2018-01-01 15:47:06','2'),(18,'preethu431@gmail.com',31,'2018-01-01 15:53:19','2'),(19,'preethu431@gmail.com',31,'2018-01-01 15:53:34','2'),(20,'preethu@logicalsteps.net',31,'2018-01-01 15:56:02','2'),(21,'preethu@logicalsteps.net',31,'2018-01-01 15:58:18','2'),(22,'preethu@logicalsteps.net',32,'2018-01-04 15:07:33','2'),(23,'preethu@logicalsteps.net',32,'2018-01-04 15:33:57','15'),(24,'preethu@logicalsteps.net',32,'2018-01-04 15:37:09','2'),(25,'preethu@logicalsteps.net',32,'2018-01-04 15:38:34','2');
/*!40000 ALTER TABLE `dk_share_deck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_team_members`
--

DROP TABLE IF EXISTS `dk_team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_team_members`
--

LOCK TABLES `dk_team_members` WRITE;
/*!40000 ALTER TABLE `dk_team_members` DISABLE KEYS */;
INSERT INTO `dk_team_members` VALUES (1,1,'David Wyatt','Distinguished Engineer','Engineer','5a55a5bf45021_TEAMsoftware eng.png','Team Member','t1'),(2,1,'Steve Allpress','Senior Vice President','','5a55a5bf451d3_TEAMproduct manager.jpg','Team Member','t2'),(3,1,'Brett Murray','GM','Data Center & AI Business Unit','5a55a5bf4550d_investor.jpg','Investor','I1'),(4,2,'Jiangji Wong','Co-founder','Vice President','5a55a925c7874_ynkotq41ov5g1fdjfbpl.png','Team Member','t1'),(5,2,'Dawei Gu','General Manager','Head of Monetization','5a55a925c7a21_f4hhw5l3bq20beuqzz5c.jpg','Team Member','t2'),(6,2,'Robin Chan','Board Member','Oct 2011','5a55a925c7d72_b3a3e8c152b5a3ede4a95b1b41f5767c.jpg','Investor','I1'),(7,3,'Elon Musk','Founder','Chief Executive Officer','5a55b19f5d0c3_alexteam2.jpg','Team Member','t1'),(8,3,'James Henderson','Vice President of Quality','','5a55b19f5d280_olafinvestor.jpg','Team Member','t2'),(9,3,'David S. Kidder','Board Member','','5a55b19f5d5f8_lotharteam1.jpg','Investor','I1'),(10,4,'Brian Chesky','Co-Founder & CEO','','5a55b5d892996_ims3v0evzgajfz3awvae.png.jpeg','Team Member','t1'),(11,4,'Nathan Blecharczyk','Co-Founder & CTO','','5a55b5d892b53_kjv2z4ssbieibigrf8um.png.jpeg','Team Member','t2'),(12,4,'Joe Gebbia','Co-Founder, Chief Product Officer','Chief Executive staff officer','5a55b5d892cb4_g8laazx2qpyeiel2k4c7.jpg','Team Member','t3'),(13,4,'General Atlantic','Investor','Advisor on Board','5a55b5d892e81_d5u4nbnnazj4hthmced5.png','Investor','I1'),(14,4,'JP Morgan','Investor','Advisor on Board','5a55b5d893044_igvboxtkh5fccr4u4tn7.png','Investor','I2'),(15,8,'Drew Houston','Co-Founder & CEO','Dropbox','5a5de31f1be63_drewhouston.jpg','Team Member','t1'),(16,8,'Jeff Bartelma','Director - Product','Dropbox','5a5de31f1bfcb_Jefnar.jpg','Team Member','t2'),(17,8,'Juan Rubio','Head EMEA Sales','Dropbox','5a5de31f1c126_Juanrubio.jpg','Team Member','t3'),(18,8,'John Lilly','Board Member','Sep 2011','5a5de31f1c231_johnlilly.jpg','Investor','I1'),(19,8,'Don Blair','Board Member','2017','5a5de31f1c39d_Donbliar.jpg','Investor','I2');
/*!40000 ALTER TABLE `dk_team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_updates`
--

DROP TABLE IF EXISTS `dk_updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deckid` int(11) NOT NULL,
  `msg` text NOT NULL,
  `update_date` datetime NOT NULL,
  `cusr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_updates`
--

LOCK TABLES `dk_updates` WRITE;
/*!40000 ALTER TABLE `dk_updates` DISABLE KEYS */;
INSERT INTO `dk_updates` VALUES (1,1,'A variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets','2018-01-10 05:40:06',2),(2,4,'We are announcing a new rental model for cottage owners.','2018-01-10 08:57:39',2),(3,4,'Proud to announce that we have a new India centric site. Please check https://www.airbnb.co.in','2018-01-10 08:58:30',2),(4,4,'A variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets','2018-01-10 09:03:26',2),(5,4,'Check out some of the Airbnbs where celebrities stayed this past year.https://press.atairbnb.com/live-like-a-celeb-in-these-airbnbs/','2018-01-10 09:04:36',2),(6,4,'Russian Sports Holiday with Airbnbhttps://press.atairbnb.com/celebrate-a-russian-sports-holiday-with-airbnb/','2018-01-10 09:09:30',2),(7,1,'test','2018-01-10 09:10:20',2),(8,4,'Association of Independent Hospitality Professionals, ThinkReservations, Airbnb Partner to Help B+Bs - New partnerships make it easier for hospitality providers to reach Airbnb community.','2018-01-10 09:11:02',2),(9,8,'Web Summit is a tech conference held annually.','2018-01-16 12:20:08',2),(10,8,'Conference, Expo, Meetup, Networking, Other','2018-01-16 12:20:18',2),(11,8,'Web Summit has grown to become the “largest technology conference in the world”.','2018-01-16 12:20:35',2);
/*!40000 ALTER TABLE `dk_updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_user_info`
--

DROP TABLE IF EXISTS `dk_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_type` enum('admin','investor','entrepreneur') DEFAULT 'entrepreneur',
  `email_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reg_ip` varchar(255) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `linkedin_user` varchar(255) NOT NULL DEFAULT 'No',
  `modified_date` datetime DEFAULT NULL,
  `age` int(11) NOT NULL,
  `education` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `founding_exp` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `funding_exp` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `brief_bio` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_user_info`
--

LOCK TABLES `dk_user_info` WRITE;
/*!40000 ALTER TABLE `dk_user_info` DISABLE KEYS */;
INSERT INTO `dk_user_info` VALUES (1,'D-201712231109','','','entrepreneur','demo@logicalsteps.net','','','','662324a3c0dc4d460b1e1aa7f535ccc4','demo@12345','2017-12-23 05:43:35','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(2,'D-201712231112','Demo','LS','entrepreneur','demo1@logicalsteps.net','','','','4f316067c82c1c4b1b6aa5c794797510','demo1@123','2018-01-10 10:13:48','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','I am a demo user. I am here to test the platform.',''),(3,'D-201712231113','','','investor','demo2@logicalsteps.net','','','','65661bb1cd4fa9ef879765d521953f75','demo2@123','2017-12-23 05:43:04','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(5,'D-201712231132','','','admin','admin@logicalsteps.net','','','','e6e061838856bf47e1de730719fb2609','admin@123','2017-12-23 06:50:35','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(8,'D-201712231200','','','entrepreneur','minu@logicalsteps.net','','','','82962d9665c7a6bd95d92817865144f7','minu123@123','2017-12-23 06:52:47','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(9,'D-201712231214','','','entrepreneur','preethu@logicalsteps.net','','','','f702c1502be8e55f4208d69419f50d0a','demo@123','2018-01-09 04:49:28','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(10,'D-201712231216','','','investor','anju.s@logicalsteps.net','','','','d6d322d913c6388984934f289175e6c6','anju@1234','2017-12-27 11:39:55','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(11,'D-201712231217','','','entrepreneur','dhanya@logicalsteps.net','','','','5aedeec0defb5f0f51cb9a4fb0e324cb','dhanya@123','2018-01-09 02:57:54','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(14,'D-201712231234','','','entrepreneur','test@gmail.com','','','','a3fe2c0b846d21cef58f06284c57f276','test@12345','2017-12-23 07:04:19','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(15,'D-201712231235','','','investor','demo3@logicalsteps.net','','','','68644267e157deff46a454d02a7de6f0','demo3@123','2017-12-23 07:05:05','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(16,'D-201712231243','','','entrepreneur','demo4@logicalsteps.net','','','','eefa6e43748ecfdbc887ba65ca8ad310','demo4@123','2017-12-23 07:13:04','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(17,'D-201712231246','','','entrepreneur','test1@logicalsteps.net','','','','06d09a188ecbd28dc62ca3f71b9f0cd8','test1@123','2017-12-23 07:16:58','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(18,'D-201712231249','','','entrepreneur','test2@gmail.com','','','','446e52e23d6cfa5eea145869a9086778','test2@123','2017-12-23 07:19:12','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(19,'D-201712261611','demo','d','entrepreneur','demod@logicalsteps.net','','','','cb3f76ce0033fb4c9a547a0af3952834','demod@123','2017-12-26 10:41:08','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(20,'D-201712271551','','','entrepreneur','anju@gmail.com','','','','d6d322d913c6388984934f289175e6c6','anju@1234','2017-12-27 10:21:27','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(21,'D-201712271634','','','entrepreneur','rinju@logicalsteps.net','','','','cd42898600ce8a668f71463d32d8c293','rinju@123','2017-12-27 11:04:10','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(22,'D-201712281140','','','entrepreneur','franklinsam00@gmail.com','','','','dfae78097142a3efa7b8fe7bbd98e6ac','franklin@123','2017-12-28 06:10:27','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(23,'D-201801041758','','','entrepreneur','vidya@logicalsteps.net','','','','8ec6c709fa5378bfe9f399a649001346','vidya@123','2018-01-04 12:28:27','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(24,'D-201801091158','','','investor','deck@logicalsteps.net','','','','8c81da3a5b814e6a3b34f629f2dd0bc8','deck@1234','2018-01-09 06:28:45','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(25,'D-201801091518','','','entrepreneur','preethu431@gmail.com','','','','a3fe2c0b846d21cef58f06284c57f276','test@12345','2018-01-09 09:48:52','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(26,'D-201801091629','','','entrepreneur','shahidha@logicalsteps.net','','','','140a4dd3639e820d248f1f0160eb20a4','shahi@123','2018-01-09 10:59:57','122.165.117.245','','No',NULL,0,'Yes','Yes','Yes','',''),(27,'D-201801091744','','','entrepreneur','test1@gmail.com','','','','06d09a188ecbd28dc62ca3f71b9f0cd8','test1@123','2018-01-09 12:14:27','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','',''),(28,'D-201801101836','','','entrepreneur','willneill@gmail.com','','','','a9f4ae476d66aa1349eb1ca888ef1162','neill123!','2018-01-10 13:06:04','159.89.100.188','','No',NULL,0,'Yes','Yes','Yes','',''),(29,'D-201801161757','','','investor','demo5@logicalsteps.net','','','','eefa6e43748ecfdbc887ba65ca8ad310','demo4@123','2018-01-16 12:27:57','116.68.96.197','','No',NULL,0,'Yes','Yes','Yes','','');
/*!40000 ALTER TABLE `dk_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_user_track_log`
--

DROP TABLE IF EXISTS `dk_user_track_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_user_track_log` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_intime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_outtime` datetime DEFAULT NULL,
  `reg_ip` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_user_track_log`
--

LOCK TABLES `dk_user_track_log` WRITE;
/*!40000 ALTER TABLE `dk_user_track_log` DISABLE KEYS */;
INSERT INTO `dk_user_track_log` VALUES (1,2,'2018-01-10 04:50:11',NULL,'202.83.54.3','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(2,2,'2018-01-10 05:10:57',NULL,'106.208.214.135','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(3,2,'2018-01-10 05:12:50',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(4,2,'2018-01-10 05:13:04',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(5,2,'2018-01-10 05:35:46',NULL,'122.165.117.245','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36','Login','No'),(6,2,'2018-01-10 06:19:16',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(7,2,'2018-01-10 06:40:59',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(8,2,'2018-01-10 07:27:22',NULL,'122.165.117.245','Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0','Login','No'),(9,2,'2018-01-10 08:37:20',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(10,2,'2018-01-10 08:38:39',NULL,'116.68.96.197','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11) AppleWebKit/601.1.56 (KHTML, like Gecko) Version/9.0 Safari/601.1.56','Login','No'),(11,2,'2018-01-10 08:55:45',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(12,2,'2018-01-10 09:05:55',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(13,2,'2018-01-10 09:09:38',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(14,2,'2018-01-10 09:10:01',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(15,2,'2018-01-10 09:12:19',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(16,2,'2018-01-10 09:15:32',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(17,2,'2018-01-10 09:24:35',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(18,2,'2018-01-10 09:59:37',NULL,'122.165.117.245','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36','Login','No'),(19,2,'2018-01-10 09:59:37',NULL,'122.165.117.245','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36','Login','No'),(20,2,'2018-01-10 09:59:37',NULL,'122.165.117.245','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36','Login','No'),(21,2,'2018-01-10 10:13:32',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(22,2,'2018-01-10 10:14:02',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(23,2,'2018-01-10 10:20:52',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(24,2,'2018-01-10 10:25:54',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(25,2,'2018-01-10 10:26:45',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(26,2,'2018-01-10 10:31:38',NULL,'106.51.20.75','Mozilla/5.0 (Linux; Android 7.0; SM-G930F Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36','Login','No'),(27,2,'2018-01-10 10:32:01',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(28,2,'2018-01-10 10:32:35',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(29,2,'2018-01-10 10:33:23',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(30,2,'2018-01-10 10:34:59',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(31,2,'2018-01-10 10:46:01',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(32,2,'2018-01-10 10:52:53',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(33,2,'2018-01-10 10:56:24',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(34,2,'2018-01-10 10:56:46',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0','Login','No'),(35,2,'2018-01-10 11:18:56',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(36,2,'2018-01-10 11:20:49',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(37,2,'2018-01-10 11:22:09',NULL,'122.165.117.245','Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0','Login','No'),(38,2,'2018-01-10 11:26:10',NULL,'106.51.20.75','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(39,2,'2018-01-10 11:55:09',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(40,2,'2018-01-10 12:57:28',NULL,'159.89.100.188','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(41,2,'2018-01-10 16:51:15',NULL,'73.181.122.197','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(42,2,'2018-01-10 17:17:02',NULL,'73.181.122.197','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(43,2,'2018-01-10 17:30:54',NULL,'73.181.122.197','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(44,2,'2018-01-11 03:43:47',NULL,'122.165.117.245','Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0','Login','No'),(45,2,'2018-01-11 05:06:41',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(46,2,'2018-01-11 05:23:25',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(47,2,'2018-01-11 06:22:01',NULL,'122.165.117.245','Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0','Login','No'),(48,28,'2018-01-11 15:06:27',NULL,'159.89.111.184','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36','Login','No'),(49,2,'2018-01-15 08:58:06',NULL,'122.165.117.245','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(50,2,'2018-01-15 22:23:29',NULL,'151.225.17.149','Mozilla/5.0 (Linux; Android 7.1.1; SM-N950F Build/NMF26X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36','Login','No'),(51,2,'2018-01-16 10:13:50',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0','Login','No'),(52,2,'2018-01-16 10:55:28',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0','Login','No'),(53,2,'2018-01-16 11:09:35',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(54,2,'2018-01-16 11:39:39',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(55,29,'2018-01-16 12:28:46',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0','Login','No'),(56,2,'2018-01-16 12:29:21',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0','Login','No'),(57,2,'2018-01-17 04:20:36',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No'),(58,2,'2018-01-17 05:06:56',NULL,'49.207.49.180','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7','Login','No'),(59,2,'2018-01-17 05:16:44',NULL,'116.68.96.197','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36','Login','No');
/*!40000 ALTER TABLE `dk_user_track_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dk_user_update`
--

DROP TABLE IF EXISTS `dk_user_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dk_user_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dk_user_update`
--

LOCK TABLES `dk_user_update` WRITE;
/*!40000 ALTER TABLE `dk_user_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `dk_user_update` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-18  9:15:25
