-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 12:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `math_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(4) NOT NULL,
  `score` int(2) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `test_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `score`, `user_id`, `date`, `test_type`) VALUES
(1, 0, 1, '2020-11-24', 1),
(2, 0, 1, '2020-12-08', 1),
(3, 0, 1, '2020-12-08', 1),
(4, 0, 1, '2020-12-08', 2),
(5, 0, 1, '2020-12-08', 2),
(6, 3, 1, '2020-12-08', 1),
(7, 3, 1, '2020-12-08', 1),
(8, 0, 1, '2021-03-25', 1),
(9, 3, 1, '2021-03-25', 1),
(10, 0, 1, '2021-03-25', 1),
(11, 0, 1, '2021-03-25', 1),
(12, 0, 1, '2021-03-25', 1),
(13, 0, 1, '2021-03-25', 4),
(14, 1, 1, '2021-03-25', 1),
(15, 2, 1, '2021-03-25', 1),
(16, 1, 1, '2021-03-25', 1),
(17, 4, 1, '2021-03-25', 1),
(18, 1, 2, '2021-04-28', 1),
(19, 1, 2, '2021-04-28', 1),
(20, 0, 2, '2021-04-28', 1),
(21, 1, 2, '2021-04-28', 1),
(22, 1, 2, '2021-04-28', 1),
(23, 1, 2, '2021-04-28', 1),
(24, 2, 2, '2021-04-28', 1),
(25, 1, 1, '2021-04-28', 2),
(26, 3, 2, '2021-04-29', 2),
(27, 1, 2, '2021-04-29', 5),
(28, 2, 2, '2021-04-29', 5),
(29, 4, 2, '2021-04-29', 4),
(30, 5, 2, '2021-04-29', 3),
(31, 1, 2, '2021-04-30', 5),
(32, 5, 2, '2021-04-30', 5),
(33, 5, 2, '2021-04-30', 5),
(34, 5, 2, '2021-04-30', 5),
(35, 1, 2, '2021-04-30', 5),
(36, 5, 2, '2021-04-30', 5),
(37, 5, 2, '2021-04-30', 5),
(38, 0, 2, '2021-04-30', 5),
(39, 0, 2, '2021-04-30', 1),
(40, 0, 2, '2021-04-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `user_type`, `first_name`, `last_name`, `user_level`) VALUES
(1, 'admin@mathtest.com', 'admin', 1, 'admin', 'admin', 1),
(2, 'nm@mathtest.com', '123456', 2, 'Fr', 'Nm', 3),
(3, 'userl@mathtest.com', '123456', 2, 'User', 'Level', 1),
(4, 'her@mathtest.com', '123456', 2, 'Javier', 'Hernandez', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
