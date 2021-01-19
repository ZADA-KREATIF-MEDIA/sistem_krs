/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80021
Source Host           : localhost:3306
Source Database       : project_krs

Target Server Type    : MYSQL
Target Server Version : 80021
File Encoding         : 65001

Date: 2021-01-15 08:01:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');

-- ----------------------------
-- Table structure for `akademik`
-- ----------------------------
DROP TABLE IF EXISTS `akademik`;
CREATE TABLE `akademik` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nia` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of akademik
-- ----------------------------
INSERT INTO `akademik` VALUES ('1', '11001', 'Yukihira', '$2y$10$4WoA5dzafRBjsL3xYhWQCegiCQlScIzK8PL4T6C8t7lbrDt5xhwkW');

-- ----------------------------
-- Table structure for `dosen`
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
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

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('1', '1001', 'Gambira Kusumo M.Kom', 'laki-laki', 'Psr. Ters. Jakarta No. 761, Pekanbaru 41366, Aceh', '1974-10-25', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', '2010-09-13', '0896494660204', 'islam', 'dosen', 'gambirumo@gmail.com');
INSERT INTO `dosen` VALUES ('2', '1002', 'Zelda Silvia Hastuti S.Psi', 'perempuan', 'Gg. Ciumbuleuit No. 350, Subulussalam 21967, JaTim', '1980-04-04', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', '2010-10-10', '081343316931', 'hindu', 'sekjur', 'zeldassi@gmail.com');
INSERT INTO `dosen` VALUES ('3', '1003', 'Martana Dirja Widodo M.Kom', 'laki-laki', 'Ki. Bawal No. 78, Langsa 94485, SulSel', '1985-05-05', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', '2011-01-04', '0833876987505', 'kristen', 'kajur', 'martodo@gmail.com');

-- ----------------------------
-- Table structure for `email`
-- ----------------------------
DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `penerima` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `isi` text,
  `tanggal_kirim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of email
-- ----------------------------
INSERT INTO `email` VALUES ('1', 'setiaendra18@gmail.com', 'akademik', 'Pengumuman KRS', '2020-10-30 04:25:01');
INSERT INTO `email` VALUES ('2', 'tegar.marcelino@gmail.com', 'akademik', 'Lorem', '2020-11-29 11:14:29');
INSERT INTO `email` VALUES ('3', 'tegar.marcelino@gmail.com', 'admin', 'test lagi', '2021-01-08 14:23:35');
INSERT INTO `email` VALUES ('4', 'tegar.marcelino@gmail.com', 'admin', 'hallo ini admin', '2021-01-08 14:28:31');
INSERT INTO `email` VALUES ('5', 'setiaendra18@gmail.com', 'admin', 'test', '2021-01-08 21:23:31');

-- ----------------------------
-- Table structure for `krs_perwalian`
-- ----------------------------
DROP TABLE IF EXISTS `krs_perwalian`;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of krs_perwalian
-- ----------------------------
INSERT INTO `krs_perwalian` VALUES ('1', '3', '1', '2020-12-16', '2020/2021', 'genap', 'asdf', '1');
INSERT INTO `krs_perwalian` VALUES ('2', '1', '2', '2020-10-28', '2020/2021', 'genap', 'acc', '1');
INSERT INTO `krs_perwalian` VALUES ('3', '2', '2', '2020-10-28', '2020/2021', 'genap', 'acc', '1');
INSERT INTO `krs_perwalian` VALUES ('4', '4', '1', '2020-10-28', '2020/2021', 'genap', 'acc', '1');
INSERT INTO `krs_perwalian` VALUES ('5', '5', '1', '2020-10-28', '2020/2021', 'genap', 'acc', '1');
INSERT INTO `krs_perwalian` VALUES ('6', '6', '2', '2020-10-28', '2020/2021', 'genap', 'acc', '1');
INSERT INTO `krs_perwalian` VALUES ('7', '7', '1', '0000-00-00', '2020/2021', 'genap', 'masih bisa ambil matakuliah', '0');
INSERT INTO `krs_perwalian` VALUES ('8', '8', '2', '0000-00-00', '2020/2021', 'genap', '', '0');
INSERT INTO `krs_perwalian` VALUES ('9', '9', '2', '0000-00-00', '2020/2021', 'genap', '', '0');
INSERT INTO `krs_perwalian` VALUES ('10', '10', '1', '0000-00-00', '2020/2021', 'genap', 'masih bisa ambil matakuliah', '0');
INSERT INTO `krs_perwalian` VALUES ('11', '11', '1', '0000-00-00', '2020/2021', 'genap', '', '0');
INSERT INTO `krs_perwalian` VALUES ('12', '2', '2', '0000-00-00', '2020/2021', 'genap', '', '0');

-- ----------------------------
-- Table structure for `laporan`
-- ----------------------------
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` enum('aktif','tidak') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of laporan
-- ----------------------------

-- ----------------------------
-- Table structure for `mahasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
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

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('1', '195410001', 'Christa Haley', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'perempuan', 'Jl Satria Raya 166 A,Jelambar, Grogol Petamburan, Jakarta', '2020-10-26', '7921687958', 'katholik', 'cassie70@amazonshopsite.com', '2');
INSERT INTO `mahasiswa` VALUES ('2', '195410002', 'Hartanti Tri Tan', '$2y$10$ELnyILyeGWNYjIFgrQHxae/VKISOorgLOZPWF.ZQq0FnQGWGIlBw2', 'perempuan', 'Jl Letjen South Parman Kav 76 Wisma Calindra Lt 3, Jakarta', '2020-10-26', '0215359817', 'islam', 'hartanti@mail.com', '2');
INSERT INTO `mahasiswa` VALUES ('3', '195410003', 'Harta Benny Budiaman', '$2y$10$65VUFSCR9SwMAOxlbMz.E.lu7r4Bv1fhrzr5a6Fu1V0LZyW3MfqSW', 'laki-laki', 'Bungas, Bantul, Yogyakarta', '2020-10-26', '02746534411', 'kristen', 'harta@mail.com', '1');
INSERT INTO `mahasiswa` VALUES ('4', '195410004', 'Lestari Vera Cahyadi', '$2y$10$k2pgBoAB9GMrRA.TZA7CNOE1GjP/GR9Mw7ZopAXdOKHlSfx0u34sq', 'perempuan', 'Kp Muhara, Citeureup', '2020-10-26', '0218752673', 'budha', 'lestari@mail.com', '1');
INSERT INTO `mahasiswa` VALUES ('5', '195410005', 'Vera Nurdiyanti', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'perempuan', 'Jln. Wahid Hasyim No. 658, Batu 12144, Bengkulu ', '2020-10-26', '02735007994', 'islam', 'veranti@gmail.com', '1');
INSERT INTO `mahasiswa` VALUES ('6', '195410006', 'Gina Mandasari', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'perempuan', 'Psr. Bakin No. 626, Administrasi Jakarta Selatan 78969, Maluku', '2020-10-26', '0257126732', 'budha', 'ginamaari@gmail.com', '2');
INSERT INTO `mahasiswa` VALUES ('7', '195410007', 'Vinsen Empluk Siregar', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'laki-laki', 'Jr. Yap Tjwan Bing No. 624, Mataram 56670, SumSel', '2020-10-26', '02991191229', 'katholik', 'vinsearm@gmail.com', '1');
INSERT INTO `mahasiswa` VALUES ('8', '195410008', 'Zelda Pia Yuniar', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'perempuan', 'Ds. Jayawijaya No. 50, Ternate 16222, JaTeng', '2020-10-26', '072927214723', 'konghucu', 'zeldapmak@gmail.com', '2');
INSERT INTO `mahasiswa` VALUES ('9', '195410009', 'Lukman Kardi Ramadan', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'laki-laki', 'Gg. Astana Anyar No. 135, Bandung 65093, NTB ', '2020-10-26', '0852490832803', 'islam', 'lukmsip@gmail.com', '2');
INSERT INTO `mahasiswa` VALUES ('10', '195410010', 'Irsad Sitorus', '$2y$10$ZS1OdhrAj.iyMJnyzGjReuA6RD9Ohv6Hd/pBVsYLVKxdgl/8lawo2', 'laki-laki', 'Jln. Cikapayang No. 457, Pekanbaru 24343, KalTim', '2020-10-26', '0835050815', 'konghucu', 'irsadsrus@gmail.com', '1');
INSERT INTO `mahasiswa` VALUES ('11', '195410011', 'Bayu Setiwan', '$2y$10$1H4dAjEoIxw5j3mODGe3huK2AqJ/gB68WRd9wNTviPPnQzWs/35Me', 'laki-laki', 'Sleman', '2020-10-28', '084657987111', 'konghucu', 'bayu11@mail.com', '1');

-- ----------------------------
-- Table structure for `matakuliah`
-- ----------------------------
DROP TABLE IF EXISTS `matakuliah`;
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
  `id_refrensi_akademik` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of matakuliah
-- ----------------------------
INSERT INTO `matakuliah` VALUES ('1', 'TI101UP', 'PRAKTIKUM ALGORITMA DAN PEMROGRAMAN 1', 'aktif', '07:30', '09:30', '1', '2', 'praktikum', 'ganjil', '1', '1');
INSERT INTO `matakuliah` VALUES ('2', 'TI108UT', 'SISTEM DIGITAL', 'aktif', '10:00', '12:00', '2', '2', 'teori', 'genap', '2', '2');
INSERT INTO `matakuliah` VALUES ('3', 'TI107UT', 'STATISTIKA', 'aktif', '07:00', '10:00', '2', '3', 'teori', 'ganjil', '2', '1');
INSERT INTO `matakuliah` VALUES ('4', 'TI107UP', 'PRAKTIKUM STATISTIKA', 'aktif', '10:00', '11:00', '2', '1', 'praktikum', 'genap', '2', '2');
INSERT INTO `matakuliah` VALUES ('5', 'TI106UT', 'SISTEM INFORMASI MANAJEMEN DAN BISNIS', 'aktif', '13:00', '14:00', '1', '2', 'teori', 'ganjil', '3', '1');
INSERT INTO `matakuliah` VALUES ('6', 'TI105UT', 'LOGIKA INFORMATIKA', 'aktif', '08:00', '11:00', '1', '3', 'teori', 'genap', '3', '2');
INSERT INTO `matakuliah` VALUES ('7', 'TI104UT', 'MATEMATIKA DASAR', 'aktif', '15:30', '17:00', '1', '3', 'teori', 'ganjil', '3', '1');
INSERT INTO `matakuliah` VALUES ('8', 'TI103LT', 'BAHASA INGGRIS 1', 'aktif', '17:00', '18:00', '2', '2', 'teori', 'genap', '1', '2');
INSERT INTO `matakuliah` VALUES ('9', 'TI102UT', 'PENGENALAN TEKNOLOGI INFORMASI', 'aktif', '19:00', '20:00', '2', '2', 'teori', 'ganjil', '2', '1');
INSERT INTO `matakuliah` VALUES ('10', 'TI101UT', 'ALGORITMA DAN PEMROGRAMAN 1', 'aktif', '07:00', '10:00', '1', '3', 'teori', 'genap', '1', '2');

-- ----------------------------
-- Table structure for `matakuliah_diambil`
-- ----------------------------
DROP TABLE IF EXISTS `matakuliah_diambil`;
CREATE TABLE `matakuliah_diambil` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_matakuliah` bigint NOT NULL,
  `id_mahasiswa` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of matakuliah_diambil
-- ----------------------------
INSERT INTO `matakuliah_diambil` VALUES ('1', '2', '1');
INSERT INTO `matakuliah_diambil` VALUES ('2', '4', '1');
INSERT INTO `matakuliah_diambil` VALUES ('3', '8', '2');
INSERT INTO `matakuliah_diambil` VALUES ('4', '10', '2');
INSERT INTO `matakuliah_diambil` VALUES ('5', '2', '3');
INSERT INTO `matakuliah_diambil` VALUES ('6', '4', '3');
INSERT INTO `matakuliah_diambil` VALUES ('7', '6', '3');
INSERT INTO `matakuliah_diambil` VALUES ('8', '6', '4');
INSERT INTO `matakuliah_diambil` VALUES ('9', '10', '4');
INSERT INTO `matakuliah_diambil` VALUES ('10', '2', '5');
INSERT INTO `matakuliah_diambil` VALUES ('11', '4', '5');
INSERT INTO `matakuliah_diambil` VALUES ('12', '6', '5');
INSERT INTO `matakuliah_diambil` VALUES ('13', '2', '6');
INSERT INTO `matakuliah_diambil` VALUES ('14', '8', '6');
INSERT INTO `matakuliah_diambil` VALUES ('15', '10', '6');
INSERT INTO `matakuliah_diambil` VALUES ('16', '4', '7');
INSERT INTO `matakuliah_diambil` VALUES ('17', '6', '7');
INSERT INTO `matakuliah_diambil` VALUES ('18', '4', '8');
INSERT INTO `matakuliah_diambil` VALUES ('19', '6', '8');
INSERT INTO `matakuliah_diambil` VALUES ('20', '2', '9');
INSERT INTO `matakuliah_diambil` VALUES ('21', '4', '9');
INSERT INTO `matakuliah_diambil` VALUES ('22', '8', '9');
INSERT INTO `matakuliah_diambil` VALUES ('23', '2', '10');
INSERT INTO `matakuliah_diambil` VALUES ('24', '10', '10');
INSERT INTO `matakuliah_diambil` VALUES ('27', '10', '11');
INSERT INTO `matakuliah_diambil` VALUES ('28', '6', '1');
INSERT INTO `matakuliah_diambil` VALUES ('29', '8', '3');
INSERT INTO `matakuliah_diambil` VALUES ('30', '10', '3');

-- ----------------------------
-- Table structure for `refrensi_tahun_ajaran`
-- ----------------------------
DROP TABLE IF EXISTS `refrensi_tahun_ajaran`;
CREATE TABLE `refrensi_tahun_ajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of refrensi_tahun_ajaran
-- ----------------------------
INSERT INTO `refrensi_tahun_ajaran` VALUES ('1', 'genap', '2020/2021');

-- ----------------------------
-- Table structure for `transkip_nilai`
-- ----------------------------
DROP TABLE IF EXISTS `transkip_nilai`;
CREATE TABLE `transkip_nilai` (
  `id_matkul_diambil` bigint NOT NULL,
  `id_mahasiswa` bigint NOT NULL,
  `id_matkul` bigint NOT NULL,
  `nilai` enum('A','B','C','D','E') DEFAULT NULL,
  PRIMARY KEY (`id_matkul_diambil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of transkip_nilai
-- ----------------------------
INSERT INTO `transkip_nilai` VALUES ('1', '1', '2', 'B');
INSERT INTO `transkip_nilai` VALUES ('2', '1', '4', 'A');
INSERT INTO `transkip_nilai` VALUES ('3', '2', '8', 'C');
INSERT INTO `transkip_nilai` VALUES ('4', '2', '10', 'D');
INSERT INTO `transkip_nilai` VALUES ('5', '3', '2', 'A');
INSERT INTO `transkip_nilai` VALUES ('6', '3', '4', 'B');
INSERT INTO `transkip_nilai` VALUES ('7', '3', '6', 'C');
INSERT INTO `transkip_nilai` VALUES ('8', '4', '6', 'C');
INSERT INTO `transkip_nilai` VALUES ('9', '4', '10', 'A');
INSERT INTO `transkip_nilai` VALUES ('10', '5', '2', 'A');
INSERT INTO `transkip_nilai` VALUES ('11', '5', '4', 'A');
INSERT INTO `transkip_nilai` VALUES ('12', '5', '6', 'A');
INSERT INTO `transkip_nilai` VALUES ('13', '6', '2', 'B');
INSERT INTO `transkip_nilai` VALUES ('14', '6', '8', 'B');
INSERT INTO `transkip_nilai` VALUES ('15', '6', '10', 'B');
INSERT INTO `transkip_nilai` VALUES ('16', '7', '4', 'D');
INSERT INTO `transkip_nilai` VALUES ('17', '7', '6', 'A');
INSERT INTO `transkip_nilai` VALUES ('18', '8', '4', 'E');
INSERT INTO `transkip_nilai` VALUES ('19', '8', '6', 'A');
INSERT INTO `transkip_nilai` VALUES ('20', '9', '2', 'A');
INSERT INTO `transkip_nilai` VALUES ('21', '9', '4', 'C');
INSERT INTO `transkip_nilai` VALUES ('22', '9', '8', 'C');
INSERT INTO `transkip_nilai` VALUES ('23', '10', '2', 'A');
INSERT INTO `transkip_nilai` VALUES ('24', '10', '10', 'C');
INSERT INTO `transkip_nilai` VALUES ('27', '11', '0', null);
INSERT INTO `transkip_nilai` VALUES ('28', '1', '0', null);
INSERT INTO `transkip_nilai` VALUES ('29', '3', '0', null);
INSERT INTO `transkip_nilai` VALUES ('30', '3', '0', null);
