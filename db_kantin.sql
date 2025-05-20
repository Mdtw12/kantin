-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 09:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(5) NOT NULL,
  `id_order` int(5) DEFAULT NULL,
  `id_makanan` int(5) DEFAULT NULL,
  `keterangan` text,
  `status_detail_order` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(5) NOT NULL,
  `nama_level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'pelanggan'),
(2, 'admin'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(5) NOT NULL,
  `nama_makanan` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status_makanan` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga`, `status_makanan`, `kategori`, `gambar`) VALUES
(1, 'Bakso', 8000, 'Tersedia', 'Makanan', 'bakso.jpg'),
(2, 'Telur Gulung', 10000, 'Tersedia', 'Makanan', 'telur_gulung.jpeg'),
(3, 'Sosis Bakar', 5000, 'Tersedia', 'Makanan', 'sosis.jpg'),
(4, 'Batagor', 5000, 'Tersedia', 'Makanan', 'batagor.jpg'),
(5, 'Cilok', 5000, 'Tersedia', 'Makanan', 'cilok.jpg'),
(6, 'Indomie Goreng', 8000, 'Tersedia', 'Makanan', 'indomie-kpop-6.jpg'),
(7, 'teh gelas', 5000, 'Tersedia', 'Minuman', 'teh_gelas.jpg'),
(9, 'sate ayam', 16000, 'Tersedia', 'Makanan', 'sateayam.jpg'),
(10, 'aqua', 5000, 'Tersedia', 'Minuman', 'aqua.jpg'),
(11, 'esteh', 3000, 'Tersedia', 'Minuman', 'esteh.jpg'),
(12, 'es matcha', 5000, 'Tersedia', 'Minuman', 'matcha.jpg'),
(13, 'le mineral', 5000, 'Tersedia', 'Minuman', 'leminerale.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(5) NOT NULL,
  `no_meja` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL,
  `keterangan` text,
  `total_harga` int(11) NOT NULL,
  `status_order` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `total_harga`, `status_order`) VALUES
(1, 0, '2025-04-30', 9, 'saya butuh jam 1', 16000, 'Selesai'),
(2, 2, '2025-04-30', 9, 'mau jam 1', 8000, 'Selesai'),
(3, 0, '2025-05-01', 9, '', 8000, 'Proses'),
(4, 0, '2025-05-02', 9, '', 5000, 'Proses'),
(5, 0, '2025-05-04', 9, '', 8000, 'Proses'),
(6, 9, '2025-05-05', 9, 'iqvqvqiufvqvcqdqavjqidq', 13000, 'Proses'),
(7, 0, '2025-05-06', 9, 'saya agil memesan bavdavfvaufvu', 10000, 'Selesai'),
(8, 0, '2025-05-19', 9, '', 8000, 'Selesai'),
(9, 0, '2025-05-19', 9, '', 5000, 'Proses'),
(10, 2, '2025-05-19', 10, 'saya mau jam 1 siang', 13000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `id_order` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_harga`) VALUES
(1, 9, 1, '2025-04-30', 16000),
(2, 9, 2, '2025-05-04', 8000),
(3, 9, 1, '2025-05-05', 16000),
(4, 9, 1, '2025-05-05', 16000),
(5, 9, 7, '2025-05-06', 10000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_selesai` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
UPDATE orders SET
status_order = "Selesai"
WHERE id_order = NEW.id_order;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `id_level` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(6, 'admin', '123', 'admin', 2),
(7, 'kasir', '123', 'kasir', 3),
(9, 'pelanggan', '123', 'pelanggan', 1),
(10, 'agil', '123', 'agil kuriawan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_makanan` (`id_makanan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
