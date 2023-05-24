-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 08:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll_no`, `name`, `email`, `address`, `class_name`, `gender`, `created_date`) VALUES
(1, 'R0001', 'James', 'james@codersmag.com', 'Preston St, Carnforth, LA5 9BY', 'Nursery ', 'Male', '2020-02-09 14:44:10'),
(2, 'R0002', 'David', 'david@codersmag.com', 'Po Box 1253, Enfield, EN1 9US', '3rd', 'Female', '2020-02-09 21:01:58'),
(3, 'R0003', 'William', 'william@codersmag.com', 'Longham Hall, Dereham, NR19 2RJ', 'LKG', 'Male', '2020-02-09 21:01:58'),
(4, 'R0004', 'Jacob', 'jacob@codersmag.com', 'Sunnyside, Wells Rd, Cheddar, BS27 3SU', '1st', 'Female', '2020-02-09 21:01:58'),
(5, 'R0005', 'Sonia', 'sonia@codersmag.com', '3 The Medlars, Maidstone, ME14 5RZ', '5th', 'Male', '2020-02-09 21:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
