-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: perpustakaan
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id_anggota` bigint(20) NOT NULL AUTO_INCREMENT,
  `nrp` bigint(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` bigint(12) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (9,3120510901,'Ahmad Rivaiy','2021-04-15','Jalan Babakan Sriwijaya No. 02 Rt 07',8123212341),(12,312065908,'Anggota Baru','2021-04-15','Jalan Jalan',1232555);
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `kode_buku` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `rak` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (2,'Kesataria Yang Hilang','Udin','Semarak Selalu','A012'),(5,'Tambahan','Mark','Justin','A012'),(16,'Si Kancil','Unknown','Justin','A013'),(17,'Sudah Jadi','Unknown','Loka','B012');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (38,'Ahmad Rivaiy','3120510901');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pinjam`
--

DROP TABLE IF EXISTS `pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjam` (
  `id_pinjam` bigint(20) NOT NULL AUTO_INCREMENT,
  `nrp` bigint(20) DEFAULT NULL,
  `kode_buku` bigint(20) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` double DEFAULT NULL,
  `id_anggota` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pinjam`
--

LOCK TABLES `pinjam` WRITE;
/*!40000 ALTER TABLE `pinjam` DISABLE KEYS */;
INSERT INTO `pinjam` VALUES (5,3120510901,5,'2021-07-04','2021-07-04',0,9),(6,1234,2,'2021-08-26','2021-10-16',240000,12),(9,NULL,13,'2021-10-16','2021-10-16',0,9),(12,NULL,2,'2021-10-16','2021-10-16',0,23),(13,NULL,5,'2021-10-16','2021-10-16',0,20),(17,NULL,16,'2021-10-18','2021-10-18',0,24),(18,NULL,16,'2021-10-18','2021-10-18',0,25);
/*!40000 ALTER TABLE `pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_peminjaman`
--

DROP TABLE IF EXISTS `v_peminjaman`;
/*!50001 DROP VIEW IF EXISTS `v_peminjaman`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_peminjaman` (
  `id_pinjam` tinyint NOT NULL,
  `id_anggota` tinyint NOT NULL,
  `nrp` tinyint NOT NULL,
  `kode_buku` tinyint NOT NULL,
  `tanggal_pinjam` tinyint NOT NULL,
  `tanggal_kembali` tinyint NOT NULL,
  `denda` tinyint NOT NULL,
  `nama` tinyint NOT NULL,
  `judul` tinyint NOT NULL,
  `pengarang` tinyint NOT NULL,
  `penerbit` tinyint NOT NULL,
  `rak` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'perpustakaan'
--
