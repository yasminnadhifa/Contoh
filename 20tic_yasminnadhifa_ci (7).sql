-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 01:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20tic_yasminnadhifa_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_penjualan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sembako` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`no_penjualan`, `id_user`, `id_sembako`, `jumlah`, `total`) VALUES
('PJ1654078101', 4, 12, 2, 100000),
('PJ1655266769', 7, 12, 2, 100000),
('PJ1655274539', 4, 13, 1, 50000),
('PJ1655299828', 7, 12, 100, 5000000),
('PJ1655299828', 7, 13, 100, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `singkatan` varchar(20) NOT NULL,
  `kajur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `singkatan`, `kajur`) VALUES
(1, 'Jurusan Teknologi Informasi', 'JTI', 'Dr. Yohana Dewi Lulu W, S.Si., M.T');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sembako` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi` int(11) DEFAULT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jenis_kelamin`, `email`, `prodi`, `asal_sekolah`, `no_hp`, `alamat`) VALUES
(13, 'c35t', 3, 'Laki-laki', 'yaya@gmail.com', 10, 'geg', 222, 'Pekanbaru');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Belum dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_penjualan`, `id_user`, `total_bayar`, `tanggal`, `alamat`, `pembayaran`, `gambar`, `keterangan`, `status`) VALUES
(6, 'PJ1654078101', 4, 100000, '01/06/2022', 'Umban sari', 'BRI', '', 'Udah lunas', 'Dikirm'),
(7, 'PJ1655266769', 7, 100000, '15/06/2022', 'Umban sari', 'MANDIRI', 'DATABASE.jpg', 'Udah lunas', 'Belum dikirim'),
(8, 'PJ1655274539', 4, 50000, '15/06/2022', 'Umban sari', 'MANDIRI', 'download1.jpg', 'lunas', 'Pengemasan'),
(9, 'PJ1655299828', 7, 10000000, '15/06/2022', 'Umban sari', 'BRI', 'download2.jpg', 'lunas', 'Dikirm');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `akreditasi` varchar(15) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL,
  `tahun_berdiri` int(10) NOT NULL,
  `output_lulusan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `ruangan`, `jurusan`, `akreditasi`, `nama_kaprodi`, `tahun_berdiri`, `output_lulusan`, `gambar`) VALUES
(10, 'Teknik Informatika', '32', 'JTI', 'A', 'Kartina Diah Kesuma Wardhani, S.T,M.T.', 2003, 'Multimedia', 'prodi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sembako`
--

CREATE TABLE `sembako` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sembako`
--

INSERT INTO `sembako` (`id`, `nama`, `stok`, `harga`, `gambar`) VALUES
(12, 'Telur', 100, 50000, 'telur.jpg'),
(13, 'Mie goreng', 200, 50000, 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `gambar`, `role`, `date_created`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$A/QEyebfoGZD8gvaUf3qpOb84ybi339sj0acf2rUsrLVATWjSCEHC', 'default.jpg', 'Admin', 1650464609),
(2, 'Fajar Andicha Pratama', 'fajar20ti@mahasiswa.pcr.ac.id', '$2y$10$zemagViPN9ayNdQj/5.OPOhbi9EkzYeRdJj2rv6i5H2Vzyqmo5n/i', 'default.jpg', 'User', 1650464640),
(4, 'Yasmin', 'yasmin@gmail.com', '$2y$10$mHuZH9GVes29UY/mEds.ze5cUCoNjYBB1fHX2sf289c6oYvlKfABi', 'default.jpg', 'User', 1653460899),
(5, 'Fitria Ayu', 'fitria@gmail.com', '$2y$10$1DVewLRteh90FSq.x3w09.2uzadx/3rGwK6IgEPe0tqEeN1N7kgCa', 'default.jpg', 'User', 1653721870),
(6, 'Ayi', 'fitriaayu@gmail.com', '$2y$10$6FQt6/mUaWhQgklWx2ifuuBa9sGWPSONMg4EU1VN/a8n4XClLalAm', 'default.jpg', 'User', 1653721924),
(7, 'yaya', 'yaya@gmail.com', '$2y$10$bwqAg1kXjsoLWvyPCWr0a..oqUhGwyqOMMZzQOlCtY2KbGJrp78yy', 'default.jpg', 'User', 1655266747);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `user_detail` (`id_user`),
  ADD KEY `sembako_detail` (`id_sembako`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sembako` (`id_sembako`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi` (`prodi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sembako`
--
ALTER TABLE `sembako`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sembako`
--
ALTER TABLE `sembako`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `sembako_detail` FOREIGN KEY (`id_sembako`) REFERENCES `sembako` (`id`),
  ADD CONSTRAINT `user_detail` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `id_sembako` FOREIGN KEY (`id_sembako`) REFERENCES `sembako` (`id`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
