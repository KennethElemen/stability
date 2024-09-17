-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `lot_no` int(100) NOT NULL,
  `mfg_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `storage_temp` varchar(50) DEFAULT NULL,
  `rh` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `disintegration_time` varchar(50) DEFAULT NULL,
  `moisture_content` varchar(200) DEFAULT NULL,
  `dosage_unit` varchar(50) DEFAULT NULL,
  `bacterial_count` int(11) DEFAULT NULL,
  `molds_yeast_count` int(11) DEFAULT NULL,
  `salmonella` tinyint(1) DEFAULT NULL,
  `escherichia_coli` tinyint(1) DEFAULT NULL,
  `staphylococcus_aureus` tinyint(1) DEFAULT NULL,
  `sodium_ascorbate` varchar(200) NOT NULL,
  `zinc_sulfate` varchar(200) NOT NULL,
  `initial_test` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `brand_name`, `lot_no`, `mfg_date`, `expiry_date`, `packing`, `storage_temp`, `rh`, `description`, `identification`, `weight`, `disintegration_time`, `moisture_content`, `dosage_unit`, `bacterial_count`, `molds_yeast_count`, `salmonella`, `escherichia_coli`, `staphylococcus_aureus`, `sodium_ascorbate`, `zinc_sulfate`, `initial_test`) VALUES
(39, 'sodium', 'dsdsds', 2343434, '2024-10-01', '2024-09-24', 'hbhdfbdhfd', 'bfdfdhfd', 'fdjfdjfd', 'dsfdfdfd', 'sdsds', 0.00, '0', '4343', '0', 134343, 44545, 1, 0, 1, 'fddfdfd', 'dfdfdgd', '2024-09-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
