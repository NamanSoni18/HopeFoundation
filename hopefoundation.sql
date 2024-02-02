-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 10:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopefoundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `c_no` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `query` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `c_no`, `email`, `query`, `message`, `time`) VALUES
('Naman Soni', 2147483647, 'sknaman763@gmail.com', 'Join a campaign', 'fsfd', '14:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `invoice_num` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `donate_date` date NOT NULL,
  `time` time NOT NULL,
  `address` varchar(200) NOT NULL,
  `pan` varchar(30) NOT NULL,
  `aadhaar` int(15) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `focus` varchar(50) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`invoice_num`, `name`, `username`, `email`, `phone_no`, `donate_date`, `time`, `address`, `pan`, `aadhaar`, `postalcode`, `city`, `state`, `country`, `nationality`, `focus`, `payment`, `amount`) VALUES
('INV202402021019131736', 'Naman Soni', 'NamanSoni1', 'sknaman763@gmail.com', 2147483647, '2024-02-02', '14:49:13', 'Housing Board Colony\r\nL.I.G. 295, Ward No. -14', 'ds24414', 242342, 490042, 'Durg', 'Chhattisgarh', 'Indian', 'Indian', 'Unprivileged Elders', 'One-Time Payment', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `created_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`image`, `title`, `paragraph`, `created_at`) VALUES
('photo_2023-10-02_00-02-07_edited.jpg', 'fsdf', 'sfsdfdsffddfd', '14:53:21'),
('photo_2023-10-02_00-02-19_edited.jpg', 'dsfsfd', 'MNaamfnda\r\n\r\n', '14:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `role` enum('admin','staff','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `email`, `dob`, `role`) VALUES
('NamanSoni1', 'Fake1234', 'Naman Soni', 'sknaman763@gmail.com', '2003-12-25', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD KEY `user_username_fk` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
