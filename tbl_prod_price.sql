-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2019 at 03:00 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_custom_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_price`
--

CREATE TABLE `tbl_prod_price` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `products_id` mediumint(9) NOT NULL,
  `price_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_price`
--

INSERT INTO `tbl_prod_price` (`id`, `products_id`, `price_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 2),
(10, 10, 3),
(11, 11, 2),
(12, 12, 3),
(13, 13, 3),
(14, 14, 2),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 2),
(19, 19, 2),
(20, 20, 3),
(21, 21, 1),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 1),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 1),
(35, 35, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_prod_price`
--
ALTER TABLE `tbl_prod_price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_prod_price`
--
ALTER TABLE `tbl_prod_price`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
