-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 11:43 AM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `adminname` char(20) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `adminname`, `adminpassword`) VALUES
(1, 'admin', '$2y$10$jrhEKYkI6p06HlIH73vDDuMP6ASrbcYGGMdVolLjwTgNhQFLKGbOO');

-- --------------------------------------------------------

--
-- Table structure for table `co1`
--

CREATE TABLE `co1` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co1`
--

INSERT INTO `co1` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
('math2', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co2`
--

CREATE TABLE `co2` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co2`
--

INSERT INTO `co2` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 4, 3, 2, 4, 4, 2, 2, 2, 2, 2, 2, 2),
('math2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co3`
--

CREATE TABLE `co3` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co3`
--

INSERT INTO `co3` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 0, 3, 2, 5, 5, 3, 3, 3, 3, 3, 3, 3),
('math2', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co4`
--

CREATE TABLE `co4` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co4`
--

INSERT INTO `co4` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 0, 3, 2, 6, 6, 4, 4, 4, 4, 4, 4, 4),
('math2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co5`
--

CREATE TABLE `co5` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co5`
--

INSERT INTO `co5` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 4, 3, 2, 7, 7, 5, 5, 5, 5, 5, 5, 5),
('math2', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co6`
--

CREATE TABLE `co6` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co6`
--

INSERT INTO `co6` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 4, 3, 2, 8, 1, 6, 6, 6, 6, 6, 6, 6),
('math2', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `co7`
--

CREATE TABLE `co7` (
  `subject` varchar(20) NOT NULL,
  `po1` int(3) NOT NULL,
  `po2` int(3) NOT NULL,
  `po3` int(3) NOT NULL,
  `po4` int(3) NOT NULL,
  `po5` int(3) NOT NULL,
  `po6` int(3) NOT NULL,
  `po7` int(3) NOT NULL,
  `po8` int(3) NOT NULL,
  `po9` int(3) NOT NULL,
  `po10` int(3) NOT NULL,
  `po11` int(3) NOT NULL,
  `po12` int(3) NOT NULL,
  `pso1` int(3) NOT NULL,
  `pso2` int(3) NOT NULL,
  `pso3` int(3) NOT NULL,
  `pso4` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co7`
--

INSERT INTO `co7` (`subject`, `po1`, `po2`, `po3`, `po4`, `po5`, `po6`, `po7`, `po8`, `po9`, `po10`, `po11`, `po12`, `pso1`, `pso2`, `pso3`, `pso4`) VALUES
('math1', 2, 3, 4, 4, 4, 3, 2, 2, 2, 7, 7, 7, 7, 7, 7, 7),
('math2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `internals`
--

CREATE TABLE `internals` (
  `subject` varchar(20) NOT NULL,
  `IA1_1A` varchar(500) NOT NULL,
  `IA1_1A_CO` varchar(3) NOT NULL,
  `IA1_1A_LV` varchar(20) NOT NULL,
  `IA1_1B` varchar(500) NOT NULL,
  `IA1_1B_CO` varchar(3) NOT NULL,
  `IA1_1B_LV` varchar(20) NOT NULL,
  `IA1_2A` varchar(500) NOT NULL,
  `IA1_2A_CO` varchar(3) NOT NULL,
  `IA1_2A_LV` varchar(20) NOT NULL,
  `IA1_2B` varchar(500) NOT NULL,
  `IA1_2B_CO` varchar(3) NOT NULL,
  `IA1_2B_LV` varchar(20) NOT NULL,
  `IA2_1A` varchar(500) NOT NULL,
  `IA2_1A_CO` varchar(3) NOT NULL,
  `IA2_1A_LV` varchar(20) NOT NULL,
  `IA2_1B` varchar(500) NOT NULL,
  `IA2_1B_CO` varchar(3) NOT NULL,
  `IA2_1B_LV` varchar(20) NOT NULL,
  `IA2_2A` varchar(500) NOT NULL,
  `IA2_2A_CO` varchar(3) NOT NULL,
  `IA2_2A_LV` varchar(20) NOT NULL,
  `IA2_2B` varchar(500) NOT NULL,
  `IA2_2B_CO` varchar(3) NOT NULL,
  `IA2_2B_LV` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internals`
--

INSERT INTO `internals` (`subject`, `IA1_1A`, `IA1_1A_CO`, `IA1_1A_LV`, `IA1_1B`, `IA1_1B_CO`, `IA1_1B_LV`, `IA1_2A`, `IA1_2A_CO`, `IA1_2A_LV`, `IA1_2B`, `IA1_2B_CO`, `IA1_2B_LV`, `IA2_1A`, `IA2_1A_CO`, `IA2_1A_LV`, `IA2_1B`, `IA2_1B_CO`, `IA2_1B_LV`, `IA2_2A`, `IA2_2A_CO`, `IA2_2A_LV`, `IA2_2B`, `IA2_2B_CO`, `IA2_2B_LV`) VALUES
('math1', 'this is IA1_1A ', '2', '1', 'this is IA1_1A', '3', '1', 'this is IA1_1A ', '3', '2', 'this is IA1_1A ', '4', '3', 'this is IA1_1A ', '5', '2', 'this is IA1_1A ', '6', '3', 'this is IA1_1A ', '6', '2', 'this is IA1_1A ', '2', '2'),
('math2', 'this is IA1_1A ', '2', '3', 'this is IA1_1A', '2', '2', 'this is IA1_1A ', '2', '2', 'this is IA1_1A ', '2', '2', 'this is IA1_1A ', '2', '2', 'this is IA1_1A ', '2', '2', 'this is IA1_1A ', '2', '2', 'this is IA1_1A ', '2', '2'),
('math3', 'hash', '0', '0', 'this is IA1_1A', '0', '0', 'this is IA1_1A ', '0', '0', 'this is IA1_1A ', '0', '0', 'this is IA1_1A ', '0', '0', 'this is IA1_1A ', '0', '0', 'this is IA1_1A ', '0', '0', 'this is IA1_1A ', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'math1', '$2y$10$Y1QIZO42UrQF7qkfeO.D8.yVe0okqq6AZyMwnK05SRwWAcmIPBhF.'),
(42, 'math2', '$2y$10$2EN4Hjez6XyB6TJqYyL5K.nLrGCjlibTw6uuNRpWr8MNgT6YhiSyS'),
(45, 'math3', '$2y$10$hOgnsw3MzfKti6jql./60eLC/nBIhcNIE1eXT.5JwA./T5wCDdzi2'),
(51, 'math4', '$2y$10$2K5vl5ID6XQvKGLAnvU4e.4YE2iC3YwhOM4kpH7MFcdHkwgu0Iijq');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `subject` varchar(20) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `name` char(20) NOT NULL,
  `acadamic_year` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `IA1_1A_M` int(3) NOT NULL,
  `IA1_1B_M` int(3) NOT NULL,
  `IA1_2A_M` int(3) NOT NULL,
  `IA1_2B_M` int(3) NOT NULL,
  `IA2_1A_M` int(3) NOT NULL,
  `IA2_1B_M` int(3) NOT NULL,
  `IA2_2A_M` int(3) NOT NULL,
  `IA2_2B_M` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`subject`, `usn`, `name`, `acadamic_year`, `sem`, `IA1_1A_M`, `IA1_1B_M`, `IA1_2A_M`, `IA1_2B_M`, `IA2_1A_M`, `IA2_1B_M`, `IA2_2A_M`, `IA2_2B_M`) VALUES
('math1', '1aj21cs001', 'aadhithan', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math1', '1aj21cs114', 'chandana', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math1', '1aj21cs039', 'kalyan', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math1', '1aj21cs089', 'sampada', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math2', '1aj21cs001', 'aadhithan', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math2', '1aj21cs039', 'kalyan', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math2', '1aj21cs089', 'sampada', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math2', '1aj21cs114', 'chandana', 2021, 6, 20, 20, 20, 20, 20, 20, 20, 20),
('math3', '1aj21cs001', 'aadhithan', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', '1aj21cs039', 'kalyan', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', '1aj21cs089', 'sampada', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math3', '1aj21cs114', 'chandana', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math4', '1aj21cs001', 'aadhithan', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math4', '1aj21cs039', 'kalyan', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math4', '1aj21cs089', 'sampada', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0),
('math4', '1aj21cs114', 'chandana', 2021, 6, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `num_co`
--

CREATE TABLE `num_co` (
  `subject` varchar(20) NOT NULL,
  `number_co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `num_co`
--

INSERT INTO `num_co` (`subject`, `number_co`) VALUES
('math1', 7),
('math2', 7),
('math3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `usn` varchar(20) NOT NULL,
  `name` char(20) NOT NULL,
  `acadamic_year` year(4) NOT NULL,
  `sem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`usn`, `name`, `acadamic_year`, `sem`) VALUES
('1aj21cs001', 'aadhithan', '2021', 6),
('1aj21cs039', 'kalyan', '2021', 6),
('1aj21cs089', 'sampada', '2021', 6),
('1aj21cs114', 'chandana', '2021', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Indexes for table `internals`
--
ALTER TABLE `internals`
  ADD PRIMARY KEY (`subject`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `internals`
--
ALTER TABLE `internals`
  ADD CONSTRAINT `internals_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `login` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
