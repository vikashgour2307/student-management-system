-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 07:32 AM
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
-- Database: `dashboarddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `reg_no` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`reg_no`, `name`, `email`, `phone`, `password`, `role`, `photo`, `status`, `time`) VALUES
(5, 'Admin', 'admin@gmail.com', 9876545678, '0000', 'admin', 'uploads/image2.0.jpg', '1', '2024-01-18 18:41:44'),
(7, 'thakurbhanu', 'thakurbhanu5014@gmail.com', 9999999999, '9999', 'Employee', 'uploads/Screenshot 2024-01-15 211716.png', '1', '2024-01-23 12:15:52'),
(13, 'atul gour', 'atul@gmail.com', 1122334455, '00000', 'Student', 'uploads/IMG-20231229-WA0015.jpg', '1', '2024-01-27 23:56:40'),
(14, 'rohan', 'rohan@gmail.com', 8888888888, '1111', 'Employee', 'uploads/IMG-20231229-WA0011.jpg', '1', '2024-01-28 00:37:21'),
(21, 'Vikash ', 'vikashgour76299@gmail.com', 7047489645, '0000', 'Student', 'uploads/Screenshot 2023-10-18 164420.png', '1', '2024-01-29 22:32:32'),
(22, 'meetesh', 'meeteshyadav527@gmail.com', 6261685479, '123456789', 'Student', 'uploads/WhatsApp Image 2024-02-02 at 11.44.24_d1490515.jpg', '1', '2024-02-02 11:45:38'),
(23, 'sonam', 'sonam@gmail.com', 0, '$2y$10$SoNLT2xrYXsprsERjzZb2OnegS936A0kf.B9Td8FFEcLomSlIEM.O', 'Employee', 'uploads/img03.png', '1', '2024-02-09 11:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`reg_no`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
