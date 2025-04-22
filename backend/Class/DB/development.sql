-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 10:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `development`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USER` varchar(120) NOT NULL,
  `PWD` varbinary(255) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `COFFEE` int(11) DEFAULT NULL,
  `USERTOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USER`, `PWD`, `EMAIL`, `COFFEE`, `USERTOKEN`) VALUES
(25, 'TEEEESTE', 0x313233343536, 'teste@teste.com.yr', 3, 'bGV0aWNpYWJ6QHlhaG9vLmNvbS5ickxldGljaWE='),
(27, 'John Smith', 0x70617373776f726431, 'john.smith@example.com', 0, NULL),
(28, 'Maria Johnson', 0x70617373776f726432, 'maria.johnson@example.com', 0, NULL),
(29, 'Robert Williams', 0x70617373776f726433, 'robert.williams@example.com', 0, NULL),
(30, 'Emily', 0x6e6f76613435373839, 'teste@novo.com.br', 6, NULL),
(31, 'Michael Jones', 0x70617373776f726435, 'michael.jones@example.com', 0, NULL),
(32, 'Emma Davis', 0x70617373776f726436, 'emma.davis@example.com', 0, NULL),
(33, 'David Miller', 0x70617373776f726437, 'david.miller@example.com', 0, NULL),
(34, 'Olivia Wilson', 0x70617373776f726438, 'olivia.wilson@example.com', 0, NULL),
(35, 'Daniel Taylor', 0x70617373776f726439, 'daniel.taylor@example.com', 2, NULL),
(36, 'Sophia Clark', 0x70617373776f72643130, 'sophia.clark@example.com', 0, NULL),
(37, 'Matthew Lewis', 0x70617373776f72643131, 'matthew.lewis@example.com', 0, NULL),
(39, 'James Anderson', 0x70617373776f72643133, 'james.anderson@example.com', 0, NULL),
(40, 'Isabella Thomas', 0x70617373776f72643134, 'isabella.thomas@example.com', 0, NULL),
(41, 'Joseph Hall', 0x70617373776f72643135, 'joseph.hall@example.com', 0, NULL),
(42, 'Charlotte Young', 0x70617373776f72643136, 'charlotte.young@example.com', 0, NULL),
(43, 'David Rodriguez', 0x70617373776f72643137, 'david.rodriguez@example.com', 0, NULL),
(44, 'Emily Hernandez', 0x70617373776f72643138, 'emily.hernandez@example.com', 0, NULL),
(45, 'Michael Lopez', 0x70617373776f72643139, 'michael.lopez@example.com', 0, NULL),
(46, 'Emma Adams', 0x70617373776f72643230, 'emma.adams@example.com', 0, NULL),
(47, 'Joseph Lee', 0x70617373776f72643231, 'joseph.lee@example.com', 0, NULL),
(50, 'Mia Scott', 0x70617373776f72643234, 'mia.scott@example.com', 4, NULL),
(52, 'Ella Phillips', 0x70617373776f72643236, 'ella.phillips@example.com', 0, NULL),
(53, 'Daniel Baker', 0x70617373776f72643237, 'daniel.baker@example.com', 2, NULL),
(54, 'Sofia Hill', 0x70617373776f72643238, 'sofia.hill@example.com', 0, NULL),
(55, 'Matthew Carter', 0x70617373776f72643239, 'matthew.carter@example.com', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
