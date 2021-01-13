-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 09:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusatdialogebookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'U',
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `address`, `city`, `type`, `createdate`) VALUES
(44, 'Faiyaz Khan', '0222211112222', 'faiyazadmin@gmail.com', '$2y$12$vvdpGULeVIWXb36s33AHU.nhkMaaQwksQM1R8W0QsMwtEvCI4.Ady', 'Jalan pantai murni 1, Pantai Hillpark Phase 2, Pantai Hillpark', 'Kuala Lumpur', 'A', '2021-01-05 07:33:16'),
(45, 'Faiyaz Khan', '21449546873', 'faiyazkhanwif@gmail.com', '$2y$12$htGkXye9X1o3mJ5Ufs4ij.M1nOk9qk/GLRH9eNaCJNsRfw2T08NqK', 'Pantai Hillpark Phase 2, 59200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Kuala Lumpur', 'U', '2021-01-05 20:11:57'),
(52, 'Geralt of Rivia', '52535252141', 'geralt@velen.com', '$2y$12$QG4Q8jVgU5zP6Ib/onHakudrtf8s.OIOGJZ2HsUME95lVtuSzsAH6', 'dsgdg ef eg ege', 'Velen', 'U', '2021-01-05 22:27:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
