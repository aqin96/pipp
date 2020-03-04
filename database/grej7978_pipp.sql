-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2020 at 11:59 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grej7978_pipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `featuredimage` text NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `featuredimage`, `isi`, `waktu`) VALUES
(1, 'Berita 1', 'http://gascoding.id/pipp/assets/img/berita/xpMhL7O17h20011202J31q46.jpg', 'Isi berita 1', '2020-01-12 01:44:53'),
(2, 'Berita 2', 'http://gascoding.id/pipp/assets/img/berita/rMnZS7z4Us20011202J31q38.jpg', 'Isi berita 2', '2020-01-12 01:44:53'),
(7, 'Berita 3', 'http://gascoding.id/pipp/assets/img/berita/kzVWSdDLEB20011202J29q55.jpg', 'Isi berita 3', '2020-01-12 02:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `idikan` int(11) NOT NULL,
  `nmikan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`idikan`, `nmikan`, `harga`) VALUES
(6, 'Tongkol Sirara-Gigi Anjing(Dogtooth Tuna)', 25000),
(7, 'Tongkol Pisang-Cerutu [BLT](Bullet Thuna)', 30000),
(8, 'Teri(Commerson\'s Anchovy; Anchovies)', 20000),
(9, 'Selar Kuning(Yellow-Strips Trevally; Smooth-Tailed', 15000),
(10, 'Kembung Lelaki(Striped Mackerel)', 25000),
(11, 'Bandeng(Milk Fish)', 20000),
(12, 'Layang Benggol(Slander Scad; Russels Scad)', 19000),
(13, 'Kepiting(Mud Crab; Mangrove Crab)', 60000),
(14, 'Udang Lurik(Striped Prawn)', 50000),
(15, 'Cumi-Cumi(Squid; Common Squid)', 50000),
(16, 'Bawal Hitam(Black Pomfret)', 15000),
(17, 'Tongkol Pisang-Balaki [FRI] (Frigate tuna; Mackere', 15000),
(18, 'Tongkol Pisang-Cerutu [BLT](Bullet Thuna)', 16500),
(19, 'Tongkol Pisang-Balaki [FRI](Frigate tuna; Mackerel', 17000),
(20, 'Ikan Layaran [SFA](Indo-Pacific Sailfish; Bayonet)', 18000),
(21, 'Kerong-Kerong(Jarbua Terapon)', 15000),
(22, 'Kwee(Bigeye Trevally)', 35000),
(23, 'Teri(Commerson\'s Anchovy; Anchovies)', 15000),
(24, 'Lemuru(Indonesian Oil Sardine)', 10000),
(25, 'Selar Kuning(Yellow-Strips Trevally; Smooth-Tailed', 15000),
(26, 'Kembung Lelaki(Striped Mackerel)', 25000),
(27, 'Bandeng(Milk Fish)', 15000),
(28, 'Tetengkek(Hardtail Scad [Trevally]; Torpedo Scad [', 13000),
(29, 'Layang Benggol(Slander Scad; Russels Scad)', 15000),
(30, 'Layang Anggur(Redtail Scad)', 15500),
(31, 'Selar Bentong(Bigeye Scad; Purse-Eyed Scad)', 17000),
(32, 'Bawal Hitam(Black Pomfret)', 15000),
(33, 'Belanak(Blue Spot [Tail] Mullet)', 20000),
(34, 'Layang [Lajeng](Round Scad)', 18000),
(35, 'Galeberan(Scaly Hairfin Anchovy)', 15000),
(36, 'Alu-Alu (Dark Finned; Sea-Pike; Barracuda)', 15000),
(37, 'Kwee Macan/simba(Golden Toothless Trevally)', 30000),
(38, 'Layang Pectoralf Pendek(Layang Scad [One Finled Sc', 20000),
(39, 'Rajungan(Swimming Crab)', 45000),
(40, 'Kepiting(Mud Crab; Mangrove Crab)', 50000),
(41, 'Udang Lurik(Striped Prawn)', 60000),
(42, 'Cumi-Cumi(Squid; Common Squid)', 50000),
(43, 'Salem(Rainbow Runner; Rainbow Yellowtail; Spanish ', 17500),
(44, 'Bandeng(Rusty Job Fish)', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `item_tangkap`
--

CREATE TABLE `item_tangkap` (
  `iditem` int(11) NOT NULL,
  `idtangkapan` int(11) NOT NULL,
  `idikan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_tangkap`
--

INSERT INTO `item_tangkap` (`iditem`, `idtangkapan`, `idikan`, `qty`, `harga`) VALUES
(1, 1, 1, 50, 45000),
(2, 2, 2, 20, 50000),
(3, 1, 3, 500, 23000),
(6, 2, 4, 10, 80000),
(7, 2, 1, 140, 25000),
(8, 5, 4, 11, 80000),
(9, 5, 3, 1, 50000),
(10, 6, 15, 30, 50000),
(11, 6, 12, 40, 19000),
(12, 7, 16, 45, 15000),
(13, 7, 6, 50, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perbekalan`
--

CREATE TABLE `jenis_perbekalan` (
  `idjenis` int(11) NOT NULL,
  `nmjenis` varchar(25) NOT NULL,
  `idsatuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perbekalan`
--

INSERT INTO `jenis_perbekalan` (`idjenis`, `nmjenis`, `idsatuan`, `harga`) VALUES
(1, 'Solar', 1, 5150),
(2, 'Es', 2, 5000),
(3, 'Air', 1, 100),
(4, 'Garam', 2, 1000),
(6, 'Gas Elpigi 3Kg', 2, 8000),
(7, 'Minyak Goreng', 1, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `idkapal` int(11) NOT NULL,
  `nmkapal` varchar(50) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`idkapal`, `nmkapal`, `status`) VALUES
(9, 'KM. PUTRA AGUNG', 'Aktif'),
(10, 'KM. SRI RUJUK II', 'Aktif'),
(11, 'KM. TIMBUL JAYA', 'Aktif'),
(12, 'KM. SUMBER REJEKI', 'Aktif'),
(13, 'KM. CAHAYA BERLIAN', 'Aktif'),
(14, 'KM. TERUS JAYA 3', 'Aktif'),
(15, 'KM. LAMPAR', 'Aktif'),
(16, 'KM. SRI ANA', 'Aktif'),
(17, 'PATROL', 'Aktif'),
(18, 'KM. SINGA LAUT', 'Aktif'),
(19, 'KM. SETIA JAYA 2', 'Aktif'),
(20, 'KM. ANGGADA JAYA', 'Aktif'),
(21, 'KM. TERUS JAYA 4', 'Aktif'),
(22, 'KM. ANUGRAH ABADI', 'Aktif'),
(23, 'KM. SRI DELLA', 'Aktif'),
(24, 'KM. PADA ELO 2', 'Aktif'),
(25, 'MINA BAHARI 2', 'Aktif'),
(26, 'OMEGA JAYA 15', 'Aktif'),
(27, 'KM. DEWA NADA', 'Aktif'),
(28, 'KM. DANDI JAYA', 'Aktif'),
(29, 'KM. SRI ANA', 'Aktif'),
(30, 'KM. SRI RUJUK II', 'Aktif'),
(31, 'KM. OMEGA JAYA 13', 'Aktif'),
(32, 'KM. DEWA NADA', 'Aktif'),
(33, 'KM. DANDI JAYA', 'Aktif'),
(34, 'KM. SRI RUJUK II', 'Aktif'),
(35, 'KM. OMEGA JAYA 13', 'Aktif'),
(36, 'KM. BERDIKARI 7', 'Aktif'),
(37, 'KM. BERDIKARI 8', 'Aktif'),
(38, 'KM. BERDIKARI 9', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelabuhan`
--

CREATE TABLE `pelabuhan` (
  `idpelabuhan` int(11) NOT NULL,
  `nmpelabuhan` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelabuhan`
--

INSERT INTO `pelabuhan` (`idpelabuhan`, `nmpelabuhan`, `alamat`) VALUES
(1, 'PP Lempasing', 'Lempasing, Lampung'),
(5, 'PP Labuhan Maringgai', 'Labuhan Maringgai, Lampung'),
(6, 'PP Taladas', 'Taladas, Lampung'),
(7, 'PP Kotaagung', 'Kotaagung, Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `perbekalan`
--

CREATE TABLE `perbekalan` (
  `idperbekalan` int(11) NOT NULL,
  `idsupplier` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbekalan`
--

INSERT INTO `perbekalan` (`idperbekalan`, `idsupplier`, `idjenis`, `volume`, `harga`) VALUES
(1, 1, 1, 10, 1000),
(2, 2, 2, 12, 20000),
(3, 2, 4, 100, 15000),
(6, 9, 4, 5000, 1000),
(7, 9, 3, 1000, 100),
(8, 9, 2, 3000, 5000),
(9, 10, 1, 1000, 5150);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `idsatuan` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`idsatuan`, `satuan`) VALUES
(1, 'Liter'),
(2, 'Kg'),
(3, 'Kotak');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `nmsupplier` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `nmsupplier`, `notelp`) VALUES
(5, 'CV. Bumi Waras', '81234567890'),
(6, 'Hi. Jen', '81234343433'),
(7, 'CV. Mekar Sari', '81234534534'),
(8, 'CV. Essindo', '81243211234'),
(9, 'CV. Sukamaju', '81298766523'),
(10, 'SPDN', '81212121212');

-- --------------------------------------------------------

--
-- Table structure for table `tangkapan`
--

CREATE TABLE `tangkapan` (
  `idtangkapan` int(11) NOT NULL,
  `idkapal` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idpelabuhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tangkapan`
--

INSERT INTO `tangkapan` (`idtangkapan`, `idkapal`, `waktu`, `idpelabuhan`) VALUES
(1, 1, '2020-01-11 20:11:37', 1),
(2, 2, '2020-01-11 20:11:37', 1),
(5, 1, '2020-01-13 00:00:00', 1),
(6, 13, '2020-02-01 00:00:00', 1),
(7, 12, '2020-02-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nmuser` varchar(50) NOT NULL,
  `level` enum('Admin','Superadmin','Tamu') NOT NULL DEFAULT 'Admin',
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `publish` enum('T','F') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nmuser`, `level`, `username`, `password`, `publish`) VALUES
(1, 'Super Admin', 'Superadmin', 'super', '21232f297a57a5a743894a0e4a801fc3', 'T'),
(2, 'Admin', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'T'),
(5, 'Aqin', 'Admin', 'aqin', 'e9b0ad54ccaaf1122b1063af96835ec0', 'T'),
(8, 'Sumanto', 'Admin', 'sumanto', '21232f297a57a5a743894a0e4a801fc3', 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`idikan`);

--
-- Indexes for table `item_tangkap`
--
ALTER TABLE `item_tangkap`
  ADD PRIMARY KEY (`iditem`);

--
-- Indexes for table `jenis_perbekalan`
--
ALTER TABLE `jenis_perbekalan`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`idkapal`);

--
-- Indexes for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  ADD PRIMARY KEY (`idpelabuhan`);

--
-- Indexes for table `perbekalan`
--
ALTER TABLE `perbekalan`
  ADD PRIMARY KEY (`idperbekalan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`idsatuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `tangkapan`
--
ALTER TABLE `tangkapan`
  ADD PRIMARY KEY (`idtangkapan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `idikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `item_tangkap`
--
ALTER TABLE `item_tangkap`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_perbekalan`
--
ALTER TABLE `jenis_perbekalan`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `idkapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  MODIFY `idpelabuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perbekalan`
--
ALTER TABLE `perbekalan`
  MODIFY `idperbekalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `idsatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tangkapan`
--
ALTER TABLE `tangkapan`
  MODIFY `idtangkapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
