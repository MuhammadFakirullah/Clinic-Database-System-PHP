-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2023 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `doc_username` varchar(255) NOT NULL,
  `doc_password` varchar(255) NOT NULL,
  `doc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `doc_username`, `doc_password`, `doc_name`) VALUES
(1, 'Rahmat@gmail.com', 'rahmat123', 'Rahmat');

-- --------------------------------------------------------

--
-- Table structure for table `front`
--

CREATE TABLE `front` (
  `front_id` int(11) NOT NULL,
  `front_username` varchar(255) NOT NULL,
  `front_password` varchar(255) NOT NULL,
  `front_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `front`
--

INSERT INTO `front` (`front_id`, `front_username`, `front_password`, `front_name`) VALUES
(3, 'PC1@gmail.com', 'best123', 'PC1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icno` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `diagnose_status` varchar(255) NOT NULL,
  `appointment_status` varchar(255) NOT NULL,
  `appointmentDateTime` varchar(255) NOT NULL,
  `medicinePrescription` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `icno`, `phone_no`, `timestamp`, `address`, `gender`, `diagnose_status`, `appointment_status`, `appointmentDateTime`, `medicinePrescription`, `total_price`, `payment_status`) VALUES
(2, 'Muhammad', '43653242421', '23123213421', '2023-09-05T18:57', 'Malaysia', 'Male', 'Gatal', 'Yes', '2023-09-21T10:00', 'Ubat gatal ', '80', 'Paid'),
(3, 'Azman', '245235235235', '23123213421', '2023-09-06T19:09', 'Kelantan', 'Male', 'Sakit lutut', 'No', '2023-09-07T18:05', 'Ubat sakit lutut', '130', 'Paid'),
(4, 'test1', '235235423', '4652352315', '2023-09-06T19:34', 'Terengganu', 'Female', 'Fever', 'Yes', '2023-09-07T17:54', 'Paracetamol', '200', 'Paid'),
(5, 'test2', '54512435432', '2345214235', '2023-09-07T19:18', 'Jalan chow kit', 'Female', 'Kaki luka', 'Yes', '2023-09-20T10:23', 'Ubat sapu', '200', 'Paid'),
(6, 'Roy', '634325464523643', '21321435325235', '2023-09-07T22:11', 'Pengkalan Chepa', 'Male', 'Migraine', 'No', '2023-09-07T22:30', 'Paracetamol', '40', 'Paid'),
(7, 'Zee', '32532523523', '354623523432', '2023-09-07T22:12', 'Pengkalan Chepa', 'Female', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmacy_id` int(11) NOT NULL,
  `pharmacy_username` varchar(255) NOT NULL,
  `pharmacy_password` varchar(255) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`pharmacy_id`, `pharmacy_username`, `pharmacy_password`, `pharmacy_name`) VALUES
(1, 'Ehsan@gmail.com', 'ehsan123', 'Ehsan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `front`
--
ALTER TABLE `front`
  ADD PRIMARY KEY (`front_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front`
--
ALTER TABLE `front`
  MODIFY `front_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
