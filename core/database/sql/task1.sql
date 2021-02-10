-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2020 at 02:47 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `report_subject` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `company` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `position` varchar(254) DEFAULT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `photo` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthdate`, `report_subject`, `email`, `country`, `phone`, `company`, `position`, `about`, `photo`) VALUES
(1, 'd', 'd', '2020-11-03', 'd', 'd@.com', 'Afghanistan', '+1 (111) 111-1111', 'dd', 'd', 'dddd', '2020-11-26_12-38_index.jpeg'),
(2, 'f', 'f', '2020-11-05', 'f', 'f@.com', 'Afghanistan', '+1 (111) 111-1111', 'f', 'f', 'f', '2020-11-26_12-42_index.jpeg'),
(3, 'a', 'a', '2020-11-24', 'a', 'a@.com', 'Afghanistan', '+1 (111) 111-1111', NULL, NULL, NULL, NULL),
(4, 'b', 'b', '2020-11-09', 'b', 'b@.com', 'Benin', '+1 (111) 111-1111', 'b', 'b', 'b', '2020-11-26_12-54_index.jpeg'),
(5, 'e', 'e', '1900-03-14', 'd', 'e@.', 'Argentina', '+2 (222) 222-2222', 'e', 'e', 'e', '2020-11-26_14-32_index.jpeg'),
(6, 's', 's', '1995-02-22', 's', 's@.', 'France', '+1 (111) 111-1111', 's', 's', 's', '2020-11-26_14-37_index.jpeg'),
(7, 'g', 'g', '2004-06-08', 'g', 'g@.', 'Germany', '+3 (333) 333-3333', 'g', 'g', 'g', '2020-11-26_14-39_index.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
