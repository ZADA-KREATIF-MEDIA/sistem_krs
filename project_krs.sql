-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2020 pada 19.27
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akademik`
--

CREATE TABLE `akademik` (
  `id` bigint(20) NOT NULL,
  `nia` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akademik`
--

INSERT INTO `akademik` (`id`, `nia`, `password`) VALUES
(1, 123, '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
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
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `password`, `tgl_masuk`, `nomor_telephone`, `agama`, `jabatan`, `email`) VALUES
(1, 1234567890, 'cuk', 'laki-laki', 'Wonosari St No.KM.8,5, Gandu, Sendangtirto, Berbah, Sleman Regency, Special Region of Yogyakarta 55573', '1968-08-11', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC', '2020-08-06', '0000', 'islam', 'dosen', 'asdf@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs_perwalian`
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
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `nomor_telephone`, `agama`, `email`, `id_dosen`) VALUES
(1, 1111, 'asdf', '$2y$10$smU6bWr.wsRdAzKLRrqQxu7EA6F/a64HdjCxCmt53qGQ4vRoB7iLC', 'laki-laki', 'asdf', '2020-08-05', '12345', 'islam', 'testuser@mail.com', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(20) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` enum('akti','tidak') NOT NULL,
  `jam` time NOT NULL,
  `kelas` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `tipe` enum('teori','praktik','praktikum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio_akademik`
--

CREATE TABLE `portofolio_akademik` (
  `id` bigint(20) NOT NULL,
  `id_matakuliah` bigint(20) NOT NULL,
  `id_dosen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkip_nilai`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krs_perwalian`
--
ALTER TABLE `krs_perwalian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portofolio_akademik`
--
ALTER TABLE `portofolio_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `krs_perwalian`
--
ALTER TABLE `krs_perwalian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `portofolio_akademik`
--
ALTER TABLE `portofolio_akademik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
