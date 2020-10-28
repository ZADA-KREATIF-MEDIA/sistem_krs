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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akademik`
--

LOCK TABLES `akademik` WRITE;
/*!40000 ALTER TABLE `akademik` DISABLE KEYS */;
INSERT INTO `akademik` VALUES (1,11001,'Yukihira','$2y$10$4WoA5dzafRBjsL3xYhWQCegiCQlScIzK8PL4T6C8t7lbrDt5xhwkW');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,1001,'Gambira Kusumo M.Kom','laki-laki','Psr. Ters. Jakarta No. 761, Pekanbaru 41366, Aceh','1974-10-25','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','2010-09-13','0896494660204','islam','dosen','gambirumo@gmail.com'),(2,1002,'Zelda Silvia Hastuti S.Psi','perempuan','Gg. Ciumbuleuit No. 350, Subulussalam 21967, JaTim','1980-04-04','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','2010-10-10','036080037935','hindu','sekjur','zeldassi@gmail.com'),(3,1003,'Martana Dirja Widodo M.Kom','laki-laki','Ki. Bawal No. 78, Langsa 94485, SulSel','1985-05-05','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','2011-01-04','0833876987505','kristen','kajur','martodo@gmail.com');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
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
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `catatan` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `krs_perwalian`
--

LOCK TABLES `krs_perwalian` WRITE;
/*!40000 ALTER TABLE `krs_perwalian` DISABLE KEYS */;
INSERT INTO `krs_perwalian` VALUES (1,3,1,'2020-10-28','2020/2021','genap','acc','1'),(2,1,2,'2020-10-28','2020/2021','genap','acc','1'),(3,2,2,'2020-10-28','2020/2021','genap','acc','1'),(4,4,1,'2020-10-28','2020/2021','genap','acc','1'),(5,5,1,'2020-10-28','2020/2021','genap','acc','1'),(6,6,2,'2020-10-28','2020/2021','genap','acc','1'),(7,7,1,'0000-00-00','2020/2021','genap','masih bisa ambil matakuliah','0'),(8,8,2,'0000-00-00','2020/2021','genap','','0'),(9,9,2,'0000-00-00','2020/2021','genap','','0'),(10,10,1,'0000-00-00','2020/2021','genap','masih bisa ambil matakuliah','0'),(11,11,1,'0000-00-00','2020/2021','genap','','0');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (1,195410001,'Christa Haley','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','perempuan','Jl Satria Raya 166 A,Jelambar, Grogol Petamburan, Jakarta','2020-10-26','7921687958','katholik','cassie70@amazonshopsite.com',2),(2,195410002,'Hartanti Tri Tan','$2y$10$ELnyILyeGWNYjIFgrQHxae/VKISOorgLOZPWF.ZQq0FnQGWGIlBw2','perempuan','Jl Letjen South Parman Kav 76 Wisma Calindra Lt 3, Jakarta','2020-10-26','0215359817','islam','hartanti@mail.com',2),(3,195410003,'Harta Benny Budiaman','$2y$10$65VUFSCR9SwMAOxlbMz.E.lu7r4Bv1fhrzr5a6Fu1V0LZyW3MfqSW','laki-laki','Bungas, Bantul, Yogyakarta','2020-10-26','02746534411','kristen','harta@mail.com',1),(4,195410004,'Lestari Vera Cahyadi','$2y$10$k2pgBoAB9GMrRA.TZA7CNOE1GjP/GR9Mw7ZopAXdOKHlSfx0u34sq','perempuan','Kp Muhara, Citeureup','2020-10-26','0218752673','budha','lestari@mail.com',1),(5,195410005,'Vera Nurdiyanti','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','perempuan','Jln. Wahid Hasyim No. 658, Batu 12144, Bengkulu ','2020-10-26','02735007994','islam','veranti@gmail.com',1),(6,195410006,'Gina Mandasari','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','perempuan','Psr. Bakin No. 626, Administrasi Jakarta Selatan 78969, Maluku','2020-10-26','0257126732','budha','ginamaari@gmail.com',2),(7,195410007,'Vinsen Empluk Siregar','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','laki-laki','Jr. Yap Tjwan Bing No. 624, Mataram 56670, SumSel','2020-10-26','02991191229','katholik','vinsearm@gmail.com',1),(8,195410008,'Zelda Pia Yuniar','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','perempuan','Ds. Jayawijaya No. 50, Ternate 16222, JaTeng','2020-10-26','072927214723','konghucu','zeldapmak@gmail.com',2),(9,195410009,'Lukman Kardi Ramadan','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','laki-laki','Gg. Astana Anyar No. 135, Bandung 65093, NTB ','2020-10-26','0852490832803','islam','lukmsip@gmail.com',2),(10,195410010,'Irsad Sitorus','$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2','laki-laki','Jln. Cikapayang No. 457, Pekanbaru 24343, KalTim','2020-10-26','0835050815','konghucu','irsadsrus@gmail.com',1),(11,195410011,'Bayu Setiwan','$2y$10$1H4dAjEoIxw5j3mODGe3huK2AqJ/gB68WRd9wNTviPPnQzWs/35Me','laki-laki','Sleman','2020-10-28','084657987111','konghucu','bayu11@mail.com',1);
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
  `id_dosen` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah`
--

LOCK TABLES `matakuliah` WRITE;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` VALUES (1,'TI101UP','PRAKTIKUM ALGORITMA DAN PEMROGRAMAN 1','aktif','07:30','09:30',1,2,'praktikum','ganjil',1),(2,'TI108UT','SISTEM DIGITAL','aktif','10:00','12:00',2,2,'teori','genap',2),(3,'TI107UT','STATISTIKA','aktif','07:00','10:00',2,3,'teori','ganjil',2),(4,'TI107UP','PRAKTIKUM STATISTIKA','aktif','10:00','11:00',2,1,'praktikum','genap',2),(5,'TI106UT','SISTEM INFORMASI MANAJEMEN DAN BISNIS','aktif','13:00','14:00',1,2,'teori','ganjil',3),(6,'TI105UT','LOGIKA INFORMATIKA','aktif','08:00','11:00',1,3,'teori','genap',3),(7,'TI104UT','MATEMATIKA DASAR','aktif','15:30','17:00',1,3,'teori','ganjil',3),(8,'TI103LT','BAHASA INGGRIS 1','aktif','17:00','18:00',2,2,'teori','genap',1),(9,'TI102UT','PENGENALAN TEKNOLOGI INFORMASI','aktif','19:00','20:00',2,2,'teori','ganjil',2),(10,'TI101UT','ALGORITMA DAN PEMROGRAMAN 1','aktif','07:00','10:00',1,3,'teori','genap',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah_diambil`
--

LOCK TABLES `matakuliah_diambil` WRITE;
/*!40000 ALTER TABLE `matakuliah_diambil` DISABLE KEYS */;
INSERT INTO `matakuliah_diambil` VALUES (1,2,1),(2,4,1),(3,8,2),(4,10,2),(5,2,3),(6,4,3),(7,6,3),(8,6,4),(9,10,4),(10,2,5),(11,4,5),(12,6,5),(13,2,6),(14,8,6),(15,10,6),(16,4,7),(17,6,7),(18,4,8),(19,6,8),(20,2,9),(21,4,9),(22,8,9),(23,2,10),(24,10,10),(27,10,11);
/*!40000 ALTER TABLE `matakuliah_diambil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refrensi_tahun_ajaran`
--

DROP TABLE IF EXISTS `refrensi_tahun_ajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refrensi_tahun_ajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refrensi_tahun_ajaran`
--

LOCK TABLES `refrensi_tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `refrensi_tahun_ajaran` DISABLE KEYS */;
INSERT INTO `refrensi_tahun_ajaran` VALUES (1,'genap','2020/2021');
/*!40000 ALTER TABLE `refrensi_tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transkip_nilai`
--

DROP TABLE IF EXISTS `transkip_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transkip_nilai` (
  `id_matkul_diambil` bigint NOT NULL,
  `id_mahasiswa` bigint NOT NULL,
  `id_matkul` bigint NOT NULL,
  `nilai` enum('A','B','C','D','E') DEFAULT NULL,
  PRIMARY KEY (`id_matkul_diambil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transkip_nilai`
--

LOCK TABLES `transkip_nilai` WRITE;
/*!40000 ALTER TABLE `transkip_nilai` DISABLE KEYS */;
INSERT INTO `transkip_nilai` VALUES (1,1,2,'B'),(2,1,4,'A'),(3,2,8,'C'),(4,2,10,'D'),(5,3,2,'A'),(6,3,4,'B'),(7,3,6,'C'),(8,4,6,'C'),(9,4,10,'A'),(10,5,2,'A'),(11,5,4,'A'),(12,5,6,'A'),(13,6,2,'B'),(14,6,8,'B'),(15,6,10,'B'),(16,7,4,'D'),(17,7,6,'A'),(18,8,4,'E'),(19,8,6,'A'),(20,9,2,'A'),(21,9,4,'C'),(22,9,8,'C'),(23,10,2,'A'),(24,10,10,'C'),(27,11,0,NULL);
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

-- Dump completed on 2020-10-28 20:11:14
