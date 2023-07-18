-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `nomor_meja`, `status`) VALUES
(1, 1, 'Kosong'),
(2, 2, 'Kosong'),
(3, 3, 'kosong'),
(4, 4, 'Kosong'),
(5, 5, 'Kosong'),
(6, 6, 'Kosong'),
(7, 7, 'Kosong'),
(8, 8, 'Kosong'),
(9, 9, 'Kosong'),
(10, 10, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `table_number` int(11) NOT NULL,
  `validated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `menu_name`, `quantity`, `total_price`, `customer_name`, `table_number`, `validated`) VALUES
(70, 'Mie Goreng Telur', 1, 10000, 'Kevin Sanjaya', 2, '1'),
(71, 'Mie Goreng Telur', 2, 20000, 'Rebecca', 2, '1'),
(72, 'Sate Ayam', 2, 30000, 'Adrian', 4, '1'),
(73, 'Milk Tea', 2, 24000, 'Adrian', 4, '1'),
(74, 'Milk Tea', 3, 36000, 'Erika ', 5, '1'),
(75, 'Tahu Bakso', 3, 45000, 'Erika ', 5, '1'),
(76, 'Sate Ayam', 1, 15000, 'Jesika Evelin', 4, '1'),
(77, 'Mie Goreng Telur', 1, 10000, 'Ridho', 4, '1'),
(78, 'Jus Jeruk', 2, 20000, 'Alvarez', 10, '1'),
(79, 'Pisang Keju', 1, 15000, 'Agus', 4, '1'),
(80, 'Kopi Susu', 1, 5000, 'Bima', 7, '1'),
(81, 'Jus Buah Naga', 1, 10000, 'Kiki', 8, '1'),
(82, 'Kentang Goreng', 1, 15000, 'Kiki', 8, '1'),
(83, 'Sate Ayam', 1, 15000, 'tesa', 4, '1'),
(84, 'Sate Ayam', 2, 30000, 'Atha', 5, '1'),
(85, 'Sate Ayam', 1, 15000, 'Jesika Evelin', 1, '1'),
(86, 'Sate Ayam', 1, 15000, 'Dimas', 2, '1'),
(87, 'Kentang Goreng', 2, 30000, 'Alpa', 4, '1'),
(88, 'Jus Jeruk', 1, 10000, 'Alpa', 4, '1'),
(89, 'Sate Ayam', 3, 45000, 'Diego', 2, '1'),
(90, 'Kopi Susu', 2, 10000, 'Diego', 2, '1'),
(91, 'Sate Ayam', 1, 15000, 'Abimanyu', 6, '1'),
(92, 'Banana Roll', 1, 15000, 'Hamdi', 8, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `picture`, `price`) VALUES
(2, 'Sate Ayam', 'sateayam.jpg', '15000'),
(3, 'Mie Goreng Telur', 'miegorengtelur.jpg', '10000'),
(4, 'Pisang Keju', 'pisangkeju.jpg', '15000'),
(5, 'Kentang Goreng', 'kentanggoreng.jpg', '15000'),
(6, 'Tahu Bakso', 'tahubakso.jpg', '15000'),
(7, 'Jus Jeruk', 'jusjeruk.jpg', '10000'),
(8, 'Jus Sirsak', 'jussirsak.jpg', '10000'),
(9, 'Kopi Susu', 'kopisusu.jpg', '5000'),
(10, 'Martabak Ayam', 'martabakayam.jpg', '15000'),
(17, 'Banana Roll', 'bananaroll.jpg', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `income` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
