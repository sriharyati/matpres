-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Des 2019 pada 04.58
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matpres`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `NIP` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konversi`
--

CREATE TABLE `konversi` (
  `ID_KV` int(11) NOT NULL,
  `NIM` int(10) NOT NULL,
  `ip` double NOT NULL,
  `kt` int(11) NOT NULL,
  `prestasi` int(11) NOT NULL,
  `pb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konversi`
--

INSERT INTO `konversi` (`ID_KV`, `NIM`, `ip`, `kt`, `prestasi`, `pb`) VALUES
(13, 461701052, 5, 1, 1, 2),
(14, 2147483647, 4, 1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `Id` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`Id`, `Deskripsi`, `Bobot`) VALUES
(1, 'Indeks Prestasi', 0.2),
(2, 'Karya Tulis Ilmiah', 0.3),
(3, 'Prestasi / Capaian Mahasiswa', 0.3),
(4, 'Penguasaan Bahasa Asing', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(10) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `ip` double NOT NULL,
  `kt` int(11) NOT NULL,
  `prestasi` int(11) NOT NULL,
  `pb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `ip`, `kt`, `prestasi`, `pb`) VALUES
(461701052, 'Miranti Eka', 3.8, 1, 1, 1),
(2147483647, 'Sri Haryati', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `Id` int(11) NOT NULL,
  `Nilai` int(11) NOT NULL,
  `NIM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seleksi`
--

CREATE TABLE `seleksi` (
  `ID_Seleksi` int(11) NOT NULL,
  `NIM` int(10) NOT NULL,
  `Rank` int(11) NOT NULL,
  `NIP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`ID_KV`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD KEY `Id` (`Id`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`ID_Seleksi`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `NIP` (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `ID_KV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `kriteria` (`Id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `seleksi`
--
ALTER TABLE `seleksi`
  ADD CONSTRAINT `seleksi_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `seleksi_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `admin` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
