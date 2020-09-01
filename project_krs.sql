-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project_krs
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `akademik`
--

DROP TABLE IF EXISTS `akademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akademik` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nia` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akademik`
--

LOCK TABLES `akademik` WRITE;
/*!40000 ALTER TABLE `akademik` DISABLE KEYS */;
INSERT INTO `akademik` VALUES (1,123,'intan','$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');
/*!40000 ALTER TABLE `akademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nip` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nomor_telephone` varchar(14) NOT NULL,
  `agama` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `jabatan` enum('dosen','sekjur','kajur') NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (2,108881,'Cuk Subiantoro','laki-laki','janti1','1998-08-14','$2y$10$yIuxiJiV0xVoqgs26pPvJucmm./8O7qRzhOHLdtqSABXlLJBLLXl.','2020-08-11','08911','katholik','kajur','testuser1@mail.com'),(3,18976,'Koh Afuk S.Pd','perempuan','test','1978-08-26','$2y$10$6tNH5A3iX1v3iRMGLue8u.pyzqZE0QlhrbEWwB1VQmqdX86n/UDJy','2020-08-07','087111','hindu','sekjur','koh@mail.com');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `penerima` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `isi` text,
  `tanggal_kirim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'tegar.marcelino@gmail.com','admin','test','2020-08-31 00:00:00'),(2,'setiaendra18@gmail.com','admin','email di kirim dari sistem','2020-08-31 17:33:00'),(3,'setiaendra18@gmail.com','akademik','yang ngirim email ini bagian pengajaran melalui form kirim email','2020-08-31 17:37:58');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `krs_perwalian`
--

DROP TABLE IF EXISTS `krs_perwalian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `krs_perwalian` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` bigint NOT NULL,
  `id_dosen` bigint NOT NULL,
  `tgl_perwalian` date NOT NULL,
  `tahun_ajaran` int NOT NULL,
  `semester` int NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `krs_perwalian`
--

LOCK TABLES `krs_perwalian` WRITE;
/*!40000 ALTER TABLE `krs_perwalian` DISABLE KEYS */;
INSERT INTO `krs_perwalian` VALUES (1,3,2,'2020-08-17',0,0,'test','0');
/*!40000 ALTER TABLE `krs_perwalian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` enum('aktif','tidak') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nim` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nomor_telephone` varchar(14) NOT NULL,
  `agama` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_dosen` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (2,155410021,'Pulung Nugroho Adi','$2y$10$Ht1Q.mvBVAh4TDYqYJr8Zu/pUB1uGCiUFhSmkt/8jHO8OElaEocgW','laki-laki','jahanam','2020-08-13','081900800700','islam','pulung@jancuk.com',3),(3,155410008,'Syaifudin Dwi K','$2y$10$5cDLXam95lCSL5nT5Zl15e5HyGXAk3E7LHxjqOe2H5rRv4QCeMB8C','laki-laki','godean','2020-08-13','087888999000','hindu','dwi@gmail.com',2),(6,155410035,'Devi Ariana Putri','$2y$10$P31L/MaPOrcuqWXSggnN3.nvX0guK2Oggtb2T8Pv1vnkW5P5o3KfO','perempuan','watumalang','2020-08-13','078','islam','devi@mail.com',2),(7,155410018,'Frangky Novan','$2y$10$pOzDkeBI3D44MGJxWdqsjOcmSsgac9aanJEsbPR5NRYB2qC9WvXTu','laki-laki','asdf','2020-08-13','007','kristen','frangky@mail.com',3);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matakuliah`
--

DROP TABLE IF EXISTS `matakuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matakuliah` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `jam_mulai` varchar(20) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL,
  `kelas` int NOT NULL,
  `sks` int NOT NULL,
  `tipe` enum('teori','praktik','praktikum') NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah`
--

LOCK TABLES `matakuliah` WRITE;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` VALUES (1,'TI0011','Kecerdasan Buatans','tidak','07:31','10:01',2,2,'teori','genap'),(2,'TI002','Kecerdasan Hekel','aktif','09:00','12:00',4,2,'praktik','genap'),(5,'TI003','Jancuk Ancuk','aktif','08:99','14:00',1,2,'praktik','ganjil'),(6,'TI004','Test','aktif','11:11','11:11',2,3,'praktik','ganjil'),(7,'TI005','Sistem Pakar','aktif','14:00','15:00',3,1,'teori','genap');
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matakuliah_diambil`
--

DROP TABLE IF EXISTS `matakuliah_diambil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matakuliah_diambil` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_matakuliah` bigint NOT NULL,
  `id_mahasiswa` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah_diambil`
--

LOCK TABLES `matakuliah_diambil` WRITE;
/*!40000 ALTER TABLE `matakuliah_diambil` DISABLE KEYS */;
INSERT INTO `matakuliah_diambil` VALUES (4,1,3),(7,6,3);
/*!40000 ALTER TABLE `matakuliah_diambil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transkip_nilai`
--

DROP TABLE IF EXISTS `transkip_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transkip_nilai` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` bigint NOT NULL,
  `id_matkul` bigint NOT NULL,
  `nilai` enum('A','B','C','D','E') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transkip_nilai`
--

LOCK TABLES `transkip_nilai` WRITE;
/*!40000 ALTER TABLE `transkip_nilai` DISABLE KEYS */;
INSERT INTO `transkip_nilai` VALUES (1,3,1,'A');
/*!40000 ALTER TABLE `transkip_nilai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-31 22:41:55
