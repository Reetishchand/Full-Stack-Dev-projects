-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www40`
--

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `UserId` varchar(100) NOT NULL,
  `Login_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Logout_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`UserId`, `Login_Time`, `Logout_Time`) VALUES
('admin1', '2020-04-26 03:37:53', '2020-04-26 03:43:08'),
('admin1', '2020-04-26 08:03:26', '2020-04-26 20:03:26'),
('admin1', '2020-04-26 09:02:46', '2020-04-26 21:02:46'),
('admin2', '2020-04-26 02:11:08', '2020-04-26 02:14:51'),
('admin2', '2020-04-26 02:24:04', '2020-04-26 03:15:53'),
('admin2', '2020-04-26 08:22:02', '2020-04-26 20:22:02'),
('admin2', '2020-04-26 08:24:08', '2020-04-26 20:24:08'),
('admin2', '2020-04-27 12:01:32', '2020-04-27 00:01:32'),
('admin3', '2020-04-26 03:25:26', '2020-04-26 03:34:57'),
('admin3', '2020-04-26 08:41:49', '2020-04-26 20:41:49'),
('admin3', '2020-04-26 08:57:41', '2020-04-26 20:57:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`UserId`,`Login_Time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
