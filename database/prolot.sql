-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 05:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoy_pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `no_bb` varchar(11) NOT NULL,
  `nama_bb` varchar(30) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`no_bb`, `nama_bb`, `harga`, `stok`, `satuan`) VALUES
('BB_001', 'Pisang Kapas', '3000', 260, 'Kg'),
('BB_002', 'Bumbu Tabur', '30000', 100, 'Kg'),
('BB_003', 'Minyak Goreng', '15000', 0, 'Liter');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `no_coa` varchar(11) NOT NULL,
  `nama_coa` varchar(30) NOT NULL,
  `jenis_coa` varchar(30) NOT NULL,
  `saldo_awal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`no_coa`, `nama_coa`, `jenis_coa`, `saldo_awal`) VALUES
('111', 'Kas', 'Aktiva', 0),
('1111', 'Persediaan Bahan Baku', 'Aktiva', 0),
('112', 'Persediaan Pisang Kapas', 'Aktiva', 0),
('113', 'Persediaan Bumbu Tabur', 'Aktiva', 0),
('114', 'Persediaan Minyak Goreng', 'Aktiva', 0),
('115', 'BDP - Biaya Pisang Kapas', 'Aktiva', 0),
('116', 'BDP - Biaya Bumbu Tabur', 'Aktiva', 0),
('117', 'BDP - Biaya Minyak Goreng', 'Aktiva', 0),
('511', 'Biaya Angkut Pembelian', 'Aktiva', 0),
('512', 'Biaya Penyimpanan', 'Aktiva', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_diskon`
--

CREATE TABLE `detail_diskon` (
  `no_diskon` varchar(11) NOT NULL,
  `no_bb` varchar(11) NOT NULL,
  `no_supplier` varchar(11) NOT NULL,
  `presentase_diskon` int(11) NOT NULL,
  `pilihan_diskon` varchar(30) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_diskon`
--

INSERT INTO `detail_diskon` (`no_diskon`, `no_bb`, `no_supplier`, `presentase_diskon`, `pilihan_diskon`, `jumlah_barang`) VALUES
('DKN_001', 'BB_001', 'SUPP_001', 10, 'Jumlah Barang', 170),
('DKN_002', 'BB_001', 'SUPP_004', 15, 'Jumlah Barang', 230),
('DKN_003', 'BB_001', 'SUPP_005', 20, 'Jumlah Barang', 270),
('DKN_004', 'BB_002', 'SUPP_006', 5, 'Jumlah Barang', 80),
('DKN_005', 'BB_002', 'SUPP_007', 10, 'Jumlah Barang', 110),
('DKN_006', 'BB_002', 'SUPP_008', 15, 'Jumlah Barang', 140),
('DKN_007', 'BB_003', 'SUPP_009', 5, 'Jumlah Barang', 50),
('DKN_008', 'BB_003', 'SUPP_010', 10, 'Jumlah Barang', 105),
('DKN_009', 'BB_003', 'SUPP_011', 15, 'Jumlah Barang', 135),
('DKN_010', 'BB_001', 'SUPP_002', 0, 'Jumlah Barang', 0),
('DKN_011', 'BB_002', 'SUPP_003', 0, 'Jumlah Barang', 0),
('DKN_012', 'BB_003', 'SUPP_012', 0, 'Jumlah Barang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_lot`
--

CREATE TABLE `detail_lot` (
  `id_pemb` varchar(50) NOT NULL,
  `no_lot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_lot`
--

INSERT INTO `detail_lot` (`id_pemb`, `no_lot`) VALUES
('PMB_001', 'LFL_001'),
('PMB_002', 'LFL_001'),
('PMB_003', 'LFL_002'),
('PMB_004', 'LFL_003'),
('PMB_005', 'LFL_002');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_pemb` varchar(50) NOT NULL,
  `no_bb` varchar(50) NOT NULL,
  `no_supplier` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `diskon` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_pemb`, `no_bb`, `no_supplier`, `jumlah`, `diskon`, `subtotal`) VALUES
('PMB_001', 'BB_001', 'SUPP_004', '250', '112500', '750000'),
('PMB_002', 'BB_001', 'SUPP_001', '250', '75000', '750000'),
('PMB_003', 'BB_002', 'SUPP_006', '100', '150000', '3000000'),
('PMB_004', 'BB_003', 'SUPP_009', '63', '47250', '945000'),
('PMB_005', 'BB_002', 'SUPP_006', '100', '150000', '3000000');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `no_diskon` varchar(11) NOT NULL,
  `keterangan_diskon` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`no_diskon`, `keterangan_diskon`, `status`) VALUES
('DKN_001', 'Pembelian minimal 170 Kg diskon 10%', '1'),
('DKN_002', 'Pembelian minimal 230 Kg diskon 15%', '1'),
('DKN_003', 'Pembelian minimal 270 Kg diskon 20%', '1'),
('DKN_004', 'Pembelian minimal 80 Kg diskon 5%', '1'),
('DKN_005', 'Pembelian minimal 110 Kg diskon 10%', '1'),
('DKN_006', 'Pembelian minimal 140 Kg diskon 15%', '1'),
('DKN_007', 'Pembelian minimal 50 Kg diskon 5%', '1'),
('DKN_008', 'Pembelian minimal 105 Kg diskon 10%', '1'),
('DKN_009', 'Pembelian minimal 135 Kg diskon 15%', '1'),
('DKN_010', 'Pembelian minimal 0 Diskon 0%', '1'),
('DKN_011', 'Pembelian minimal 0 Kg diskon 0%', '1'),
('DKN_012', 'Pembelian minimal 0 Kg diskon 0%', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `no` int(11) NOT NULL,
  `id_jurnal` varchar(50) NOT NULL,
  `tgl_jurnal` varchar(50) NOT NULL,
  `no_coa` varchar(50) NOT NULL,
  `posisi_dr_cr` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`no`, `id_jurnal`, `tgl_jurnal`, `no_coa`, `posisi_dr_cr`, `nominal`) VALUES
(1, 'PMB_001', '2019-05-16', '112', 'd', '637500'),
(2, 'PMB_001', '2019-05-16', '111', 'k', '637500'),
(3, 'PMB_001', '2019-05-16', '511', 'd', '20000'),
(4, 'PMB_001', '2019-05-16', '111', 'k', '20000'),
(5, 'PMK_001', '2019-05-16', '115', 'd', '306000'),
(6, 'PMK_001', '2019-05-16', '112', 'k', '306000'),
(7, 'PMK_001', '2019-05-16', '512', 'd', '60000'),
(8, 'PMK_001', '2019-05-16', '111', 'k', '60000'),
(9, 'PMK_002', '2019-05-16', '115', 'd', '178500'),
(10, 'PMK_002', '2019-05-16', '112', 'k', '178500'),
(11, 'PMK_002', '2019-05-16', '512', 'd', '35000'),
(12, 'PMK_002', '2019-05-16', '111', 'k', '35000'),
(13, 'PMK_003', '2019-05-16', '115', 'd', '76500'),
(14, 'PMK_003', '2019-05-16', '112', 'k', '76500'),
(15, 'PMK_003', '2019-05-16', '512', 'd', '15000'),
(16, 'PMK_003', '2019-05-16', '111', 'k', '15000'),
(17, 'PMB_002', '2019-05-16', '112', 'd', '675000'),
(18, 'PMB_002', '2019-05-16', '111', 'k', '675000'),
(19, 'PMB_002', '2019-05-16', '511', 'd', '20000'),
(20, 'PMB_002', '2019-05-16', '111', 'k', '20000'),
(21, 'PMK_004', '2019-05-16', '115', 'd', '53678.571428571'),
(22, 'PMK_004', '2019-05-16', '112', 'k', '53678.571428571'),
(23, 'PMK_004', '2019-05-16', '512', 'd', '10000'),
(24, 'PMK_004', '2019-05-16', '111', 'k', '10000'),
(25, 'PMB_003', '2019-06-08', '113', 'd', '2850000'),
(26, 'PMB_003', '2019-06-08', '111', 'k', '2850000'),
(27, 'PMB_003', '2019-06-08', '511', 'd', '20000'),
(28, 'PMB_003', '2019-06-08', '111', 'k', '20000'),
(29, 'PMB_004', '2019-06-08', '114', 'd', '897750'),
(30, 'PMB_004', '2019-06-08', '111', 'k', '897750'),
(31, 'PMB_004', '2019-06-08', '511', 'd', '20000'),
(32, 'PMB_004', '2019-06-08', '111', 'k', '20000'),
(33, 'PMK_005', '2019-06-08', '116', 'd', '2850000'),
(34, 'PMK_005', '2019-06-08', '113', 'k', '2850000'),
(35, 'PMK_005', '2019-06-08', '512', 'd', '50000'),
(36, 'PMK_005', '2019-06-08', '111', 'k', '50000'),
(37, 'PMK_006', '2019-06-08', '117', 'd', '897750'),
(38, 'PMK_006', '2019-06-08', '114', 'k', '897750'),
(39, 'PMK_006', '2019-06-08', '512', 'd', '31500'),
(40, 'PMK_006', '2019-06-08', '111', 'k', '31500'),
(41, 'PMB_005', '2019-06-16', '113', 'd', '2850000'),
(42, 'PMB_005', '2019-06-16', '111', 'k', '2850000'),
(43, 'PMB_005', '2019-06-16', '511', 'd', '20000'),
(44, 'PMB_005', '2019-06-16', '111', 'k', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `kapasitas_gudang`
--

CREATE TABLE `kapasitas_gudang` (
  `no_kapasitas_gudang` varchar(11) NOT NULL,
  `no_bb` varchar(11) NOT NULL,
  `jumlah_kapasitas_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapasitas_gudang`
--

INSERT INTO `kapasitas_gudang` (`no_kapasitas_gudang`, `no_bb`, `jumlah_kapasitas_gudang`) VALUES
('KG_001', 'BB_001', 300),
('KG_002', 'BB_002', 150),
('KG_003', 'BB_003', 100);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_stok`
--

CREATE TABLE `kartu_stok` (
  `no` int(11) NOT NULL,
  `id_trans` varchar(50) NOT NULL,
  `tgl_trans` varchar(50) NOT NULL,
  `no_bb` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_stok`
--

INSERT INTO `kartu_stok` (`no`, `id_trans`, `tgl_trans`, `no_bb`, `unit`, `total`) VALUES
(1, 'PMB_001', '2019-05-16', 'BB_001', '250', '637500'),
(2, 'PMK_001', '2019-05-16', 'BB_001', '130', '331500'),
(3, 'PMK_002', '2019-05-16', 'BB_001', '60', '153000'),
(4, 'PMK_003', '2019-05-16', 'BB_001', '30', '76500'),
(5, 'PMB_002', '2019-05-16', 'BB_001', '280', '751500'),
(6, 'PMK_004', '2019-05-16', 'BB_001', '260', '697821.42857143'),
(7, 'PMB_003', '2019-06-08', 'BB_002', '100', '2850000'),
(8, 'PMB_004', '2019-06-08', 'BB_003', '63', '897750'),
(9, 'PMK_005', '2019-06-08', 'BB_002', '0', '0'),
(10, 'PMK_006', '2019-06-08', 'BB_003', '0', '0'),
(11, 'PMB_005', '2019-06-16', 'BB_002', '100', '2850000');

-- --------------------------------------------------------

--
-- Table structure for table `lot_for_lot`
--

CREATE TABLE `lot_for_lot` (
  `no_lot` varchar(11) NOT NULL,
  `no_target` varchar(11) NOT NULL,
  `jumlah_lot` int(11) NOT NULL,
  `hasil_lot` int(11) NOT NULL,
  `total_biaya` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot_for_lot`
--

INSERT INTO `lot_for_lot` (`no_lot`, `no_target`, `jumlah_lot`, `hasil_lot`, `total_biaya`) VALUES
('LFL_001', 'TP_001', 2, 250, 3142500),
('LFL_002', 'TP_002', 2, 100, 12105000),
('LFL_003', 'TP_003', 3, 63, 3845625);

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_bahan_baku`
--

CREATE TABLE `pemakaian_bahan_baku` (
  `no_pemakaian_bb` varchar(11) NOT NULL,
  `no_bb` varchar(11) NOT NULL,
  `tgl_pemakaian_bb` date NOT NULL,
  `jumlah_bahan_baku` int(11) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL,
  `subtotal_pmk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian_bahan_baku`
--

INSERT INTO `pemakaian_bahan_baku` (`no_pemakaian_bb`, `no_bb`, `tgl_pemakaian_bb`, `jumlah_bahan_baku`, `harga_satuan`, `subtotal_pmk`) VALUES
('PMK_001', 'BB_001', '2019-05-16', 120, '2550', '306000'),
('PMK_002', 'BB_001', '2019-05-16', 70, '2550', '178500'),
('PMK_003', 'BB_001', '2019-05-16', 30, '2550', '76500'),
('PMK_004', 'BB_001', '2019-05-16', 20, '2683.9285714286', '53678.571428571'),
('PMK_005', 'BB_002', '2019-06-08', 100, '28500', '2850000'),
('PMK_006', 'BB_003', '2019-06-08', 63, '14250', '897750');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pemb` varchar(50) NOT NULL,
  `tgl_pemb` varchar(50) NOT NULL,
  `total_pmb` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pemb`, `tgl_pemb`, `total_pmb`, `status`) VALUES
('PMB_001', '2019-05-16', 637500, 'Selesai'),
('PMB_002', '2019-05-16', 675000, 'Selesai'),
('PMB_003', '2019-06-08', 2850000, 'Selesai'),
('PMB_004', '2019-06-08', 897750, 'Selesai'),
('PMB_005', '2019-06-16', 2850000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `no_supplier` varchar(11) NOT NULL,
  `no_bb` varchar(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`no_supplier`, `no_bb`, `nama_supplier`, `no_hp`, `alamat`) VALUES
('SUPP_001', 'BB_001', 'Agus', 896123123, 'Jakarta Selatan'),
('SUPP_002', 'BB_001', 'Mawa', 0, 'N/A N/A N/A'),
('SUPP_003', 'BB_002', 'Miwi', 0, 'N/A N/A N/A'),
('SUPP_004', 'BB_001', 'Dimas', 2147483647, 'Testertester'),
('SUPP_005', 'BB_001', 'Koko', 2147483647, 'Testertester'),
('SUPP_006', 'BB_002', 'Keke', 2147483647, 'testertester'),
('SUPP_007', 'BB_002', 'Mamat', 2147483647, 'testerstersadasd'),
('SUPP_008', 'BB_002', 'Joko', 2147483647, '1231232131221'),
('SUPP_009', 'BB_003', 'Lala', 22113322, 'Ragunan'),
('SUPP_010', 'BB_003', 'Nana', 1122334455, 'Jakarta'),
('SUPP_011', 'BB_003', 'Moka', 2147483647, 'Jakarta'),
('SUPP_012', 'BB_003', 'Mowo', 0, 'NANANA');

-- --------------------------------------------------------

--
-- Table structure for table `target_proyeksi`
--

CREATE TABLE `target_proyeksi` (
  `no_target` varchar(11) NOT NULL,
  `no_bb` varchar(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `presentase` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target_proyeksi`
--

INSERT INTO `target_proyeksi` (`no_target`, `no_bb`, `bulan`, `tahun`, `jumlah`, `presentase`, `status`) VALUES
('TP_001', 'BB_001', 'Januari', 2019, 1000, 0, 'Selesai LFL'),
('TP_002', 'BB_002', 'Januari', 2019, 400, 0, 'Selesai LFL'),
('TP_003', 'BB_003', 'Januari', 2019, 250, 0, 'Selesai LFL'),
('TP_004', 'BB_001', 'Februari', 2019, 1000, 0, 'Belum'),
('TP_005', 'BB_002', 'Februari', 2019, 500, 0, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_trans` varchar(50) NOT NULL,
  `tgl_trans` varchar(50) NOT NULL,
  `total_trans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_trans`, `tgl_trans`, `total_trans`) VALUES
('PMB_001', '2019-05-16', '637500'),
('PMB_002', '2019-05-16', '675000'),
('PMB_003', '2019-06-08', '2850000'),
('PMB_004', '2019-06-08', '897750'),
('PMB_005', '2019-06-16', '2850000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_lengkap`, `username`, `password`, `level`) VALUES
('', 'superadmin', 'superadmin', 'Admin'),
('', 'keuangan', 'keuangan', 'Keuangan'),
('', 'gudang', 'gudang', 'Gudang'),
('tester', 'tester', 'tester', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`no_bb`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`no_coa`);

--
-- Indexes for table `detail_diskon`
--
ALTER TABLE `detail_diskon`
  ADD KEY `fk_no_diskon` (`no_diskon`),
  ADD KEY `fk_bbb` (`no_bb`),
  ADD KEY `fk_suppp` (`no_supplier`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`no_diskon`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kapasitas_gudang`
--
ALTER TABLE `kapasitas_gudang`
  ADD PRIMARY KEY (`no_kapasitas_gudang`),
  ADD KEY `fk_kapasitas_bb` (`no_bb`);

--
-- Indexes for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `lot_for_lot`
--
ALTER TABLE `lot_for_lot`
  ADD PRIMARY KEY (`no_lot`),
  ADD KEY `fk_proyeksi` (`no_target`);

--
-- Indexes for table `pemakaian_bahan_baku`
--
ALTER TABLE `pemakaian_bahan_baku`
  ADD PRIMARY KEY (`no_pemakaian_bb`),
  ADD KEY `fk_pemakaian_bb` (`no_bb`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`no_supplier`),
  ADD KEY `fk_bb` (`no_bb`);

--
-- Indexes for table `target_proyeksi`
--
ALTER TABLE `target_proyeksi`
  ADD PRIMARY KEY (`no_target`),
  ADD KEY `fk_target_pro` (`no_bb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_diskon`
--
ALTER TABLE `detail_diskon`
  ADD CONSTRAINT `fk_bbb` FOREIGN KEY (`no_bb`) REFERENCES `bahan_baku` (`no_bb`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no_diskon` FOREIGN KEY (`no_diskon`) REFERENCES `diskon` (`no_diskon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_suppp` FOREIGN KEY (`no_supplier`) REFERENCES `supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kapasitas_gudang`
--
ALTER TABLE `kapasitas_gudang`
  ADD CONSTRAINT `fk_kapasitas_bb` FOREIGN KEY (`no_bb`) REFERENCES `bahan_baku` (`no_bb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lot_for_lot`
--
ALTER TABLE `lot_for_lot`
  ADD CONSTRAINT `fk_proyeksi` FOREIGN KEY (`no_target`) REFERENCES `target_proyeksi` (`no_target`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemakaian_bahan_baku`
--
ALTER TABLE `pemakaian_bahan_baku`
  ADD CONSTRAINT `fk_pemakaian_bb` FOREIGN KEY (`no_bb`) REFERENCES `bahan_baku` (`no_bb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_bb` FOREIGN KEY (`no_bb`) REFERENCES `bahan_baku` (`no_bb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `target_proyeksi`
--
ALTER TABLE `target_proyeksi`
  ADD CONSTRAINT `fk_target_pro` FOREIGN KEY (`no_bb`) REFERENCES `bahan_baku` (`no_bb`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
