-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2023 pada 06.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--
CREATE DATABASE IF NOT EXISTS `kp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kp`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Create_at_Barang` datetime DEFAULT NULL,
  `Update_at_Barang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `Nama`, `Harga`, `Gambar`, `Create_at_Barang`, `Update_at_Barang`) VALUES
(3, 'Mesin Kasir Elektronik', 2500000, 'mesin-kasir-elektronik.jpg', '2023-03-27 13:32:45', '2023-05-01 15:35:09'),
(5, 'Mesin Kasir Manual', 200000, 'mesin-kasir-mekanikal-manual.jpg', '2023-05-02 13:12:03', '2023-05-02 13:12:03'),
(6, 'Tablet POS', 800000, 'tablet-pos-system-android.jpg', '2023-05-04 00:00:00', '2023-05-04 16:05:50'),
(11, 'PC Desktop Kasir', 2500000, 'pc-desktop-kasir.jpg', '2023-05-04 00:00:00', '2023-05-04 16:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtrans`
--

DROP TABLE IF EXISTS `dtrans`;
CREATE TABLE `dtrans` (
  `id` int(11) NOT NULL,
  `fk_htrans` varchar(200) NOT NULL,
  `Nama_item` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jum` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dtrans`
--

INSERT INTO `dtrans` (`id`, `fk_htrans`, `Nama_item`, `Harga`, `Jum`, `Total`) VALUES
(3, '202305140001', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(4, '202312020002', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(5, '202312020002', 'Mesin Kasir Manual', 200000, 2, 400000),
(6, '202312020002', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(7, '202312020003', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(8, '202312020003', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(9, '202312160004', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(10, '202312160004', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(11, '202312160005', 'Mesin Kasir Elektronik', 2500000, 1, 2500000),
(12, '202312160005', 'Mesin Kasir Elektronik', 2500000, 1, 2500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `htrans`
--

DROP TABLE IF EXISTS `htrans`;
CREATE TABLE `htrans` (
  `id` varchar(50) NOT NULL,
  `Grand_Total` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `Create_at_htrans` datetime NOT NULL,
  `Update_at_htrans` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `htrans`
--

INSERT INTO `htrans` (`id`, `Grand_Total`, `fk_user`, `status`, `Create_at_htrans`, `Update_at_htrans`) VALUES
('202305140001', 2500000, 2, 0, '2023-05-14 00:00:00', '2023-05-14 07:24:32'),
('202312020002', 5400000, 2, 0, '2023-12-02 00:00:00', '2023-12-02 04:40:37'),
('202312020003', 5000000, 0, 0, '2023-12-02 00:00:00', '2023-12-02 05:01:21'),
('202312160004', 5000000, 0, 0, '2023-12-16 00:00:00', '2023-12-16 11:37:42'),
('202312160005', 5000000, 0, 0, '2023-12-16 00:00:00', '2023-12-16 11:38:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `Deskripsi` varchar(200) NOT NULL,
  `Created_at_log` datetime NOT NULL,
  `Update_at_log` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `Deskripsi`, `Created_at_log`, `Update_at_log`) VALUES
(1, 'Menambah Barang BaruGoBizBerjumlah5', '2023-05-04 00:00:00', '2023-05-04 16:40:57'),
(2, 'Menambah Barang BaruPC Desktop KasirBerjumlah5', '2023-05-04 00:00:00', '2023-05-04 16:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` varchar(20) NOT NULL,
  `Kode_Barang` varchar(50) NOT NULL,
  `Tlp` varchar(200) NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `Deskripsi` varchar(200) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `Create_at_Service` datetime DEFAULT NULL,
  `Update_at_Service` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `Kode_Barang`, `Tlp`, `Nama_Pelanggan`, `Deskripsi`, `Alamat`, `Status`, `Create_at_Service`, `Update_at_Service`) VALUES
('1', '1001100110', '0852233223365', 'Dustin', 'Tidak Bisa Digunakan', 'JL jomblo 12', 1, '2023-05-11 00:00:00', '2023-05-25 06:34:39'),
('SB202305120001', '1001100110', '085236954125', 'Dustin', 'Tidak Bisa Digunakan', 'JL jomblo 12', 2, '2023-05-12 00:00:00', '2023-05-25 06:34:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `fk_barang` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `Create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id`, `fk_barang`, `kode`, `Create_at`, `update_at`, `deleted_at`) VALUES
(2, 3, 'weffwrtty454', NULL, NULL, '2023-12-16 10:25:02'),
(3, 5, 'ghafgaertag', NULL, NULL, NULL),
(4, 5, 'asdfatgasdfgat', NULL, NULL, NULL),
(5, 3, '10011001101', NULL, NULL, NULL),
(6, 3, '1001100110', NULL, NULL, NULL),
(7, 3, '1823070324', NULL, NULL, '2023-12-16 11:38:20'),
(8, 3, 'PQ70Z9D4HF', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` int(1) NOT NULL,
  `No_Telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `Nama`, `Username`, `Email`, `Password`, `Status`, `No_Telp`) VALUES
(1, 'asd', 'asd', 'asd@gmail.com', '12345678', 0, '0825636861263'),
(2, 'Budi', 'Budi', 'Budi@gmail.com', 'Budi1234', 1, '081568999725'),
(3, 'andi', 'andi', 'andi@gmail.com', 'andi1234', 1, '08263695784213');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtrans`
--
ALTER TABLE `dtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dtrans`
--
ALTER TABLE `dtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
