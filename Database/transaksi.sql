-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 01:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int(11) NOT NULL,
  `NamaBarang` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Satuan` varchar(255) NOT NULL,
  `IdSupplier` int(11) DEFAULT NULL,
  `IdPengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdSupplier`, `IdPengguna`) VALUES
(1, 'Gulaku', 'Gula pasir', 'Gram', 1, 1),
(2, 'Roma Malkist', 'Biskuit', 'Gram', 1, 1),
(3, 'Taro', 'ciki', 'Gram', 1, 1),
(4, 'Nutella Hazelnut', 'Cokelat krim', 'Gram', 2, 1),
(5, 'Permen Fox', 'Permen', 'Gram', 1, 1),
(6, 'Tango', 'Wafer', 'Gram', 1, 1),
(7, 'Kusuka', 'Keripik kentang', 'Gram', 1, 1),
(8, 'Oreo', 'Biskuit', 'Gram', 1, 1),
(9, 'Hatari', 'Biskuit', 'Gram', 1, 1),
(10, 'Lays Potato', 'Keripik kentang', 'Gram', 1, 1),
(11, 'Jhonson Baby Powder', 'Bedak Bayi', 'Gram', 1, 1),
(14, 'Sabun Lifebouy', 'Sabun Mandi', 'Gram', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `IdAkses` int(11) NOT NULL,
  `NamaAkses` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Admin', 'Semua akses'),
(2, 'Pemilik Toko', 'Semua akses'),
(3, 'Kepala Toko', 'Semua akses'),
(4, 'Developer', 'Semua akses'),
(5, 'Analyst', 'Dashboard pembelian dan view pelanggan'),
(6, 'Karyawan Gudang', 'Kelola data barang, supplier dan transaksi pembelian barang'),
(7, 'Karyawan Kasir', 'Kelola data pelanggan dan akses transaksi penjualan'),
(8, 'Karyawan Akuntan', 'Akses transaksi penjualan dan pembelian'),
(9, 'Investor', 'Akses dashboard pembelian dan penjualan'),
(10, 'Karyawan Pengiriman', 'Akses ke transaksi pembelian dan transaksi penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `NoHp` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `NoHp`, `Email`, `Alamat`) VALUES
(2, 'Syamsul', '081211112222', 'syamsul.r@gmail.com', 'Tambun, Bekasi'),
(3, 'Doni', '085622233314', 'doni@gmail.com', 'Sunter, Jakarta Utara'),
(4, 'Putri', '081277552233', 'putri21@gmail.com', 'Bekasi Timur'),
(5, 'Windah', '087866443322', 'windah28@gmail.com', 'Rawamangun, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int(11) NOT NULL,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `IdBarang` int(11) NOT NULL,
  `IdPengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdBarang`, `IdPengguna`) VALUES
(1, 100, 10000, 1, 6),
(2, 60, 5000, 2, 6),
(3, 100, 7000, 3, 6),
(4, 80, 20000, 4, 6),
(5, 90, 6000, 5, 6),
(6, 50, 4000, 6, 6),
(7, 60, 7000, 7, 6),
(8, 100, 6000, 8, 6),
(9, 45, 8000, 9, 6),
(10, 50, 7000, 10, 6),
(11, 100, 10000, 1, 6),
(12, 60, 5000, 2, 6),
(13, 100, 7000, 3, 6),
(14, 80, 20000, 4, 6),
(15, 90, 6000, 5, 6),
(16, 50, 4000, 6, 6),
(17, 60, 7000, 7, 6),
(18, 100, 6000, 8, 6),
(19, 45, 8000, 9, 6),
(20, 50, 7000, 10, 6),
(22, 10, 100000, 11, 6),
(23, 4, 15000, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` int(11) NOT NULL,
  `NamaPengguna` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaDepan` varchar(255) NOT NULL,
  `NamaBelakang` varchar(255) NOT NULL,
  `NoHp` varchar(16) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `IdAkses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`, `IdAkses`) VALUES
(1, 'ik.puspita', 'Ikpuspita123', 'Ika', 'Puspita', '0812111222333', 'Tambun, Bekasi', 1),
(2, 'iwankw', 'Iwankw991', 'Iwan', 'Kurniawan', '0838111222331', 'Sunter, Jakarta', 3),
(3, 'rzrmdhn', 'Rzrmdhn001', 'Reza', 'Ramadhan', '081255544211', 'Tambun, Bekasi', 4),
(4, 'tbghafiz', 'Tbghafiz', 'Tubagus', 'Hafiz', '085711122215', 'Cibinong, Bogor', 10),
(5, 'ardyra', 'Ardyra11', 'Ardy', 'Ramdan', '085766112233', 'Cikarang, Bekasi', 6),
(6, 'syamsulr', 'Syamsulr007', 'Syamsul', 'Ramadhoni', '081299912112', 'Tambun, Bekasi', 8),
(7, 'mulyayu', 'Mulya8812', 'Mulya', 'Yus', '081277124421', 'Tambun, Bekasi', 7),
(8, 'fitriarfh', 'Fitri9912', 'Fitri ', 'arifah', '08784412321', 'Sunter, Jakarta', 2),
(9, 'Arish14', 'Arish99123', 'Aris', 'Hanggoro', '083821231231', 'Sunter, Jakarta', 5),
(10, 'hasoki', 'Hasok99123', 'Hasianto', 'Oki', '086521231231', 'Tambun, Bekasi', 9),
(12, 'ihsan123', 'Ihsan123', 'Ihsan', 'Ahmad', '089677221133', 'Tambun, Bekasi', 7);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL,
  `IdBarang` int(11) NOT NULL,
  `IdPengguna` int(11) NOT NULL,
  `IdPelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdBarang`, `IdPengguna`, `IdPelanggan`) VALUES
(1, 50, 12000, 1, 7, 3),
(2, 30, 7000, 2, 7, 3),
(3, 40, 8000, 3, 7, 3),
(4, 20, 23000, 4, 7, 3),
(5, 20, 7000, 5, 7, 3),
(6, 40, 5000, 6, 7, 3),
(7, 30, 8000, 7, 7, 3),
(8, 20, 8000, 8, 7, 3),
(9, 15, 9000, 9, 7, 3),
(10, 20, 9000, 10, 7, 3),
(11, 50, 12000, 1, 7, 3),
(12, 30, 7000, 2, 7, 3),
(13, 40, 8000, 3, 7, 3),
(14, 20, 23000, 4, 7, 3),
(15, 20, 7000, 5, 7, 3),
(16, 40, 5000, 6, 7, 3),
(17, 30, 8000, 7, 7, 3),
(18, 20, 8000, 8, 7, 3),
(19, 15, 9000, 9, 7, 3),
(20, 20, 9000, 10, 7, 3),
(24, 12, 24000, 1, 7, 4),
(25, 20, 60000, 9, 1, 5),
(26, 20, 40000, 9, 7, 2),
(27, 10, 10000, 7, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(255) NOT NULL,
  `NoHp` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `NamaSupplier`, `NoHp`, `Email`, `Alamat`) VALUES
(1, 'PT Mayora', '08123123912', 'mayora@gmail.com', 'Bekasi, Jawa Barat'),
(2, 'PT UNILEVER', '08128832221', 'unilever@gmail.com', 'Pulogadung, Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `supplier_fk` (`IdSupplier`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `pengguna_fk` (`IdPengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `fk_pengguna` (`IdPengguna`),
  ADD KEY `fk_pelanggan` (`IdPelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `IdBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `IdAkses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IdPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  ADD CONSTRAINT `pengguna_fk` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `hakakses` (`IdAkses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`),
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
