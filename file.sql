-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ecoit-db
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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220407150917','2022-04-07 17:09:27',45),('DoctrineMigrations\\Version20220407183717','2022-04-07 20:37:29',47),('DoctrineMigrations\\Version20220407220200','2022-04-08 00:02:04',34),('DoctrineMigrations\\Version20220408180342','2022-04-08 20:03:58',42),('DoctrineMigrations\\Version20220412090629','2022-04-12 11:06:45',48),('DoctrineMigrations\\Version20220412090843','2022-04-12 11:08:47',28),('DoctrineMigrations\\Version20220413202551','2022-04-13 22:26:13',40),('DoctrineMigrations\\Version20220414183214','2022-04-14 20:32:19',108);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_validate` tinyint(1) DEFAULT NULL,
  `published_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `study_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_404021BFE7B003E9` (`study_id`),
  KEY `IDX_404021BFB03A8386` (`created_by_id`),
  CONSTRAINT `FK_404021BFB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_404021BFE7B003E9` FOREIGN KEY (`study_id`) REFERENCES `study` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` VALUES (1,35,'Empreinte numérique \r\n','','Une empreinte numérique, aussi appelée ombre numérique ou empreinte électronique, désigne les données que vous laissez derrière vous quand vous utilisez Internet. Ces données comprennent les sites Web visités, les emails que vous envoyez et les informatio',1,'2022-04-13 16:13:14',NULL);
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study`
--

DROP TABLE IF EXISTS `study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `study` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formation_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E67F97495200282E` (`formation_id`),
  CONSTRAINT `FK_E67F97495200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study`
--

LOCK TABLES `study` WRITE;
/*!40000 ALTER TABLE `study` DISABLE KEYS */;
/*!40000 ALTER TABLE `study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validate` tinyint(1) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (34,'Ecoit.ecfuser@gmail.com','[\"ROLE_USER\"]','$2y$13$8pXXmKQ23hg71qqxg/SKyOOkC4g.wX/YE5AH73k.Bn.K2MZFthBbC','Jean','Charles','Pasquiet',NULL,NULL,NULL,1),(35,'Ecoit.ecfteatcher@gmail.com','[\"ROLE_TEATCHER\"]','$2y$13$0JaBtqdcIPXP3gocJM//vub5079OPgVrBfExIw1C0wdCdiLilDPI2','Arthur','Alexandre','Astier','Enseignant Eco-it','C:\\Users\\dessa\\OneDrive\\Bureau\\ECOIT\\Ecoit-Ecf/public/uploads/brochures/droitacces-62587b75e0403 (2).png',1,1),(36,'Ecf.ecoitadm@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$3ewcHqG6QWLjjGHDCQtw0Oeb3Y7tQBGzdS.PtfhQPYNZ3T/nVXAhK','Jean','Pierre','Pernault','Administrateur du site',NULL,1,1),(42,'Ecf-test@test.com','[\"ROLE_TEATCHER\"]','$2y$13$azjiniWr0Z94TqirV2FPyOxDony/lpg.s.bolNxyU2pi7VBMMtoQi','Usernametest1','Lastnametest1','Nametest1','Je postule pour devenir formateur.','C:\\xampp\\tmp\\phpC251.tmp',1,1),(43,'Ecf-test2@test.com','[\"ROLE_TEATCHER\"]','$2y$13$n3ep6E5tEP4NH7nyaRBUo.g8eauBLeW8NvjDdk15IhwtKsbMtdzTm','Usernametest2','Lastnametest','Nametest2','Je postule pour devenir formateur.','C:\\xampp\\tmp\\phpD760.tmp',1,1),(46,'Ecf-test5@test.com','[\"ROLE_TEATCHER\"]','$2y$13$Q4NTpNyMium2sw8V/.3.yurgSYwZjieaxTV0bR8lOHF8Vtf6ONmY2','Usernametest5','Lastnametest5','Nametest5','Je postule pour devenir formateur.','C:\\xampp\\tmp\\phpDE4A.tmp',0,1),(47,'Ecf-test6@test.com','[\"ROLE_TEATCHER\"]','$2y$13$imBjDJGmAUOwhyCbJPiS5eZUTHjoUA.3Zsge1izK0huqyEJ9D8aJi','Usernametest6','Lastnametest6','Nametest6','Je postule pour devenir formateur.','C:\\xampp\\tmp\\php62BD.tmp',1,1),(48,'Ecf-test8@test.com','[\"ROLE_TEATCHER\"]','$2y$13$z5d6nqpOmaPlYBanntJNj.LXRpZmPo9Z0v3rpjEGD0jXuW/U6A.GS','Usernametest8','Lastnametest8','Nametest8','Je postule pour devenir formateur.','C:\\xampp\\tmp\\php5B7C.tmp',0,0),(49,'Ecf-test11@test.com','[\"ROLE_TEATCHER\"]','$2y$13$JpfwGz1Rq3JhNZ1DkLJjv.GxlCGIkhZt0xTK.BfuMi9PwB0EPuWtK','Usernametest11','Lastnametest11','Nametest11','Je postule pour devenir formateur.','C:\\Users\\dessa\\OneDrive\\Bureau\\ECOIT\\Ecoit-Ecf/public/uploads/brochures/droitacces-62587b75e0403.png',1,0),(50,'Ecf-test12@test.com','[\"ROLE_TEATCHER\"]','$2y$13$eYCpKSCCa5i3Qt5dcI65EeC.tahp9/z70sq30vTkpFtLFx/L1W6n.','Usernametest12','Lastnametest12','Nametest12','Je postule pour devenir formateur.','C:\\xampp\\tmp\\php718C.tmp',0,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-18 17:21:25
