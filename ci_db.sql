-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 01:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Inactive:0, Active:1',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `title`, `description`, `image`, `status`, `timestamp`) VALUES
(1, 'iphoneX', 'test description', 'download.jpg', 1, '2022-07-21 11:46:14'),
(2, 'IphoneXs', 'lorem ipsum', 'iphn.jpg', 1, '2022-07-21 11:46:14'),
(3, 'iphone11', 'testing', 'download.jpg', 1, '2022-07-21 11:46:28'),
(4, 'Iphone12', 'test description1', 'iphn.jpg', 0, '2022-07-21 11:46:28'),
(5, 'Iphone13', 'test description1', 'iphn.jpg', 0, '2022-07-21 11:46:28'),
(6, 'Iphone11 pro', 'test description1', 'iphn.jpg', 1, '2022-07-21 11:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'active:1,inactive:2',
  `is_verified` int(11) NOT NULL DEFAULT 1 COMMENT 'unVerified:0, Verified: 1',
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `Email`, `Password`, `status`, `is_verified`, `PostingDate`) VALUES
(1, 'test', 'user', 'test@gmail.com', '123456', 1, 1, '2022-07-21 10:13:54'),
(2, 'user1', 'imp', 'user1@gmail.com', '123456', 1, 1, '2022-07-21 11:51:19'),
(3, 'user2', 'imp', 'user2@gmail.com', '123456', 2, 1, '2022-07-21 11:51:19'),
(4, 'user', 'imp', 'user3@gmail.com', '123456', 2, 1, '2022-07-21 11:51:19'),
(5, 'user4', 'imp', 'user4@gmail.com', '123456', 1, 1, '2022-07-21 11:51:19'),
(6, 'user5', 'imp', 'user5@gmail.com', '123456', 1, 1, '2022-07-21 11:51:19'),
(7, 'user6', 'imp', 'user6@gmail.com', '123456', 1, 0, '2022-07-21 11:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_products`
--

CREATE TABLE `tbluser_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL COMMENT 'In dollars($)',
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser_products`
--

INSERT INTO `tbluser_products` (`id`, `user_id`, `product_id`, `price`, `quantity`, `timestamp`) VALUES
(1, 1, 2, '1000', 5, '2022-07-21 11:48:43'),
(2, 2, 1, '1000', 3, '2022-07-21 11:48:43'),
(3, 2, 2, '500', 5, '2022-07-21 11:48:43'),
(4, 3, 4, '1500', 2, '2022-07-21 11:48:43'),
(5, 1, 5, '1000', 2, '2022-07-21 11:48:43'),
(6, 1, 3, '1000', 3, '2022-07-21 11:48:43'),
(7, 7, 3, '1000', 4, '2022-07-21 11:48:43'),
(8, 7, 6, '1000', 2, '2022-07-21 11:48:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser_products`
--
ALTER TABLE `tbluser_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser_products`
--
ALTER TABLE `tbluser_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
