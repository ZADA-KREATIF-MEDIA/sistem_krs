-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 07:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id` bigint(20) NOT NULL,
  `nia` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id`, `nia`, `nama`, `password`) VALUES
(1, 123, 'intan', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nomor_telephone` varchar(14) NOT NULL,
  `agama` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `jabatan` enum('dosen','sekjur','kajur') NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `password`, `tgl_masuk`, `nomor_telephone`, `agama`, `jabatan`, `email`) VALUES
(2, 108881, 'Cuk Subiantoro1', 'laki-laki', 'janti1', '1998-08-14', '$2y$10$yIuxiJiV0xVoqgs26pPvJucmm./8O7qRzhOHLdtqSABXlLJBLLXl.', '2020-08-07', '08911', 'katholik', 'kajur', 'testuser1@mail.com'),
(3, 18976, 'Koh Afuk S.Pd', 'perempuan', 'test', '1978-08-26', '$2y$10$6tNH5A3iX1v3iRMGLue8u.pyzqZE0QlhrbEWwB1VQmqdX86n/UDJy', '2020-08-07', '087111', 'hindu', 'sekjur', 'koh@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `krs_perwalian`
--

CREATE TABLE `krs_perwalian` (
  `id` bigint(20) NOT NULL,
  `id_mahasiswa` bigint(20) NOT NULL,
  `tgl_perwalian` date NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nomor_telephone` varchar(14) NOT NULL,
  `agama` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_dosen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `nomor_telephone`, `agama`, `email`, `id_dosen`) VALUES
(2, 155410021, 'Pulung Nugroho Adi', '$2y$10$Ht1Q.mvBVAh4TDYqYJr8Zu/pUB1uGCiUFhSmkt/8jHO8OElaEocgW', 'laki-laki', 'jahanam', '2020-08-06', '081900800700', 'islam', 'pulung@jancuk.com', 0),
(3, 155410008, 'Syaifudin Dwi K', '$2y$10$5cDLXam95lCSL5nT5Zl15e5HyGXAk3E7LHxjqOe2H5rRv4QCeMB8C', 'laki-laki', 'godean', '2020-08-07', '087888999000', 'hindu', 'dwi@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(20) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `jam_mulai` varchar(20) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL,
  `kelas` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `tipe` enum('teori','praktik','praktikum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matkul`, `nama`, `status`, `jam_mulai`, `jam_selesai`, `kelas`, `sks`, `tipe`) VALUES
(1, 'TI0011', 'Kecerdasan Buatans', 'tidak', '07:31', '10:01', 2, 2, 'teori'),
(2, 'TI002', 'Kecerdasan Hekel', 'aktif', '09:00', '12:00', 4, 2, 'praktik');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_akademik`
--

CREATE TABLE `portofolio_akademik` (
  `id` bigint(20) NOT NULL,
  `id_matakuliah` bigint(20) NOT NULL,
  `id_dosen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transkip_nilai`
--

CREATE TABLE `transkip_nilai` (
  `id` bigint(20) NOT NULL,
  `id_matakuliah` bigint(20) NOT NULL,
  `nilai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs_perwalian`
--
ALTER TABLE `krs_perwalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio_akademik`
--
ALTER TABLE `portofolio_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krs_perwalian`
--
ALTER TABLE `krs_perwalian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portofolio_akademik`
--
ALTER TABLE `portofolio_akademik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
