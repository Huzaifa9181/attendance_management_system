-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 10:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `email`, `qualification`, `Username`, `user_id`, `password`, `time`) VALUES
(1, 'huzaifa', 'huzaifa@gmail.com', 'intermediate', 'huzaifa11', 123, '123', '2022-08-30 08:19:46'),
(2, 'admin', 'admin@gmail.com', 'asdadasd', 'admin', 123, '123', '2022-08-30 08:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll_no` int(25) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `branch` text NOT NULL,
  `attendance` varchar(10) NOT NULL,
  `f_id` int(25) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll_no`, `course`, `semester`, `branch`, `attendance`, `f_id`, `time`) VALUES
(5, 'John', 12, '123', '131', 'sdasdsa', 'present', 2, '2022-09-01'),
(7, 'Huzaifa', 13, 'BS (Computer Sciences)', '4th Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'absent', 2, '2022-09-01'),
(8, 'Abdullah', 112, 'BS (Computer Sciences)', '6th Semester', 'Gulshan Campus - Abid Town, Block-2, Gulshan-e-Iqbal.', 'present', 2, '2022-09-01'),
(9, 'Hamza', 222, 'BE Software Engineering.', '8th Semester', 'Bahria Town Campus - Bahria town.', 'absent', 2, '2022-09-01'),
(10, 'Huzaifa', 13, 'BS (Computer Sciences)', '4th Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 2, '2022-09-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
