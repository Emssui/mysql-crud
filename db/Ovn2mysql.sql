-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 12:04 PM
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
-- Database: `crudkontakter`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `birthday`, `phone`, `email`) VALUES
(3, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(4, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(5, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(6, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(7, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(8, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(9, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(10, 'PETHA', 'PA', '2222-02-01', '+345 33 23453', 'petha.pa@gmail.com'),
(11, 'EMS', 'EMS', '3333-02-22', '23455', 'eeeee@gmail.com'),
(12, 'EMS', 'EMS', '3333-02-22', '23455', 'eeeee@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
