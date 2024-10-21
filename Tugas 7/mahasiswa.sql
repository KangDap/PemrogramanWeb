-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2024 at 11:55 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `npm` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`npm`, `nama`, `alamat`, `jk`, `tgl_lhr`, `email`) VALUES
('140810230014', 'Muhammad Zahran Muntazar', 'Bandung', 'L', '2005-04-18', 'zahranmuntazar@gmail.com'),
('140810230017', 'Clarisya Adeline', 'Jakarta', 'P', '2005-04-17', 'clarisyaadeline@gmail.com'),
('140810230022', 'Dafa Ghani Abdul Rabbani', 'Bandung', 'L', '2005-02-04', 'dafaghani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `npm`, `level`) VALUES
('clarisyaadeline', SHA1('clarisyalucubanget'), '140810230017', '1'),
('dafaghani', SHA1('emangtaugitu'), '140810230022', '2'),
('zahranmuntazar', SHA1('buahbatu'), '140810230014', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `npm_identitas_foreign` (`npm`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `npm_identitas_foreign` FOREIGN KEY (`npm`) REFERENCES `identitas` (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
