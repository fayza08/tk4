-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tk4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `NamaBarang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Satuan` varchar(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `NamaBarang`, `stok`, `Keterangan`, `Satuan`, `iduser`, `status`) VALUES
(1, 'Sambal Bawang', 23, 'Bu Rudy', '20', 1, 'ACTIVE'),
(2, 'Kacang Mente', 23, 'Ngacang', 'kilo', 1, 'ACTIVE'),
(3, 'Bakpia', 32, 'Pathok', '16', 1, 'ACTIVE'),
(4, 'Lapis Kukus', 23, 'Legit', '20', 1, 'ACTIVE'),
(5, 'Kue Kacang', 23, 'Ngacang', '10', 1, 'ACTIVE'),
(6, 'Sambal Teri', 23, 'Bu Rudy', '30', 1, 'ACTIVE'),
(7, 'Ikan Asap', 23, 'Bandeng', '11', 1, 'ACTIVE'),
(8, 'Kerupuk Ikan', 23, 'Krenyes', '8', 1, 'INACTIVE'),
(9, 'Abon Sapi ', 23, 'Lvl 1', '18', 1, 'ACTIVE'),
(10, 'Abon Ayam', 23, 'Lvl 1', '21', 1, 'ACTIVE'),
(11, 'Kerupuk Bawang', 23, 'ori', 'pcs', 1, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` int(11) NOT NULL,
  `namaPelanggan` varchar(255) NOT NULL,
  `telpPelanggan` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `namaPelanggan`, `telpPelanggan`, `alamat`, `status`) VALUES
(1, 'Hajra', '81235412234', 'Surabaya', 'ACTIVE'),
(2, 'Tofan', '81341325712', 'Surabaya', 'ACTIVE'),
(3, 'Gilang', '81251355121', 'Surabaya', 'ACTIVE'),
(4, 'Kiki', '81351245124', 'Surabaya', 'ACTIVE'),
(5, 'Welang', '85671234182', 'Surabaya', 'ACTIVE'),
(6, 'Petrus', '851351623', 'Surabaya', 'ACTIVE'),
(7, 'Nova', '85135124124', 'Jakarta Barat', 'ACTIVE'),
(8, 'Ariel', '85135123512', 'Jakarta Barat', 'ACTIVE'),
(9, 'Andiek', '86721475126', 'Jakarta Barat', 'ACTIVE'),
(10, 'Ornae', '81251625126', 'Jakarta Barat', 'ACTIVE'),
(11, 'Brian', '85162528651', 'Jakarta Barat', 'ACTIVE'),
(12, 'Niki', '85125651273', 'Jakarta Barat', 'ACTIVE'),
(13, 'Farhan', '81256568125', 'Jakarta Barat', 'ACTIVE'),
(14, 'Surya', '85126556812', 'Tangerang', 'ACTIVE'),
(15, 'Bams', '83571247512', 'Tangerang', 'ACTIVE'),
(16, 'Cahyo', '85172618275', 'Tangerang', 'ACTIVE'),
(17, 'Lantip', '85172756812', 'Tangerang', 'ACTIVE'),
(18, 'Kelvin', '85617274125', 'Tangerang', 'ACTIVE'),
(19, 'Lumen', '85617275612', 'Tangerang', 'ACTIVE'),
(20, 'Sarah', '81525124125', 'Tangerang', 'ACTIVE'),
(21, 'Oasis', '098299873', 'Sesame Street II', 'ACTIVE'),
(22, 'Sandra', '0989899798', 'Sesame Street II', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int(11) NOT NULL,
  `JumlahPembelian` int(11) DEFAULT NULL,
  `HargaBeli` int(11) DEFAULT NULL,
  `IdSupplier` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdSupplier`, `IdBarang`) VALUES
(1, 5, 50, 5, 1),
(2, 4, 20, 6, 2),
(3, 2, 20, 2, 3),
(4, 5, 35, 3, 4),
(5, 2, 80, 11, 5),
(6, 2, 10, 7, 6),
(7, 1, 10, 15, 7),
(8, 2, 40, 17, 8),
(9, 2, 15, 18, 9),
(10, 2, 80, 11, 1),
(11, 3, 15, 19, 3),
(12, 3, 15, 18, 2),
(13, 1, 40, 11, 4),
(14, 3, 60, 15, 5),
(15, 3, 15, 2, 6),
(16, 100, 45000, 16, 4),
(17, 10, 45000, 16, 3),
(18, 10, 45000, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) NOT NULL,
  `JumlahPenjualan` int(11) DEFAULT NULL,
  `HargaJual` int(11) DEFAULT NULL,
  `IdPelanggan` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdPelanggan`, `IdBarang`) VALUES
(1, 4, 60, 10, 1),
(2, 3, 24, 7, 2),
(3, 2, 30, 4, 5),
(4, 1, 10, 2, 6),
(5, 1, 50, 1, 7),
(6, 2, 90, 4, 3),
(7, 1, 8, 6, 5),
(8, 1, 25, 8, 6),
(9, 1, 25, 9, 4),
(10, 1, 50, 6, 5),
(11, 2, 18, 5, 6),
(12, 1, 8, 1, 7),
(13, 1, 50, 9, 6),
(14, 1, 25, 2, 7),
(15, 3, 24, 3, 8),
(16, 11, 46000, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int(11) NOT NULL,
  `namaSupplier` varchar(255) NOT NULL,
  `noHPSupplier` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `namaSupplier`, `noHPSupplier`, `alamat`, `status`) VALUES
(1, 'Bahari', '83232485912', 'Jakarta Timur', 'ACTIVE'),
(2, 'Bahana', '8238492123', 'Bandung', 'ACTIVE'),
(3, 'Intan Makmur', '82412312312', 'Surabaya', 'ACTIVE'),
(4, 'Cahaya Abadi', '85212312512', 'Surabaya', 'ACTIVE'),
(5, 'Farhan', '86771236512', 'Surabaya', 'ACTIVE'),
(6, 'Samluai', '8412465123', 'Surabaya', 'ACTIVE'),
(7, 'Waren', '8658861235', 'Surabaya', 'ACTIVE'),
(8, 'Pobris Untung', '85655127451', 'Surabaya', 'ACTIVE'),
(9, 'Kilang Minyak', '8656521765', 'Surabaya', 'ACTIVE'),
(10, 'Weruh Olang', '86658892676', 'Surabaya', 'ACTIVE'),
(11, 'Hutong ', '85612658124', 'Surabaya', 'ACTIVE'),
(12, 'Nikmat Jaya', '85651572657', 'Surabaya', 'ACTIVE'),
(13, 'Perubahan', '85615245415', 'Surabaya', 'ACTIVE'),
(14, 'Raharja', '86657124651', 'Surabaya', 'ACTIVE'),
(15, 'Pulih Makmur', '85625475125', 'Surabaya', 'ACTIVE'),
(16, 'Harmonis', '86571265125', 'Tangerang', 'ACTIVE'),
(17, 'Amin ', '85612551251', 'Tangerang', 'ACTIVE'),
(18, 'Dionisius', '8512351235', 'Tangerang', 'ACTIVE'),
(19, 'Perdana Jaya', '85125123512', 'Tangerang', 'ACTIVE'),
(20, 'PT Unilever', '021293484039', 'Tangerang Selatan', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sandra', 'ACTIVE'),
(2, 'oscar', '9d87d0e415b28ccc638a396e58e705d3', 'Oscar', 'INACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `iduser` (`iduser`);

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
  ADD KEY `IdSupplier` (`IdSupplier`),
  ADD KEY `IdBarang` (`IdBarang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdPelanggan` (`IdPelanggan`),
  ADD KEY `IdBarang` (`IdBarang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_pengguna` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_barang` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_supplier` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_barang` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`idbarang`),
  ADD CONSTRAINT `penjualan_pelanggan` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`);
COMMIT;
