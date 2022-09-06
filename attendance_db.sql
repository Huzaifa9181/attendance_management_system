-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 12:19 AM
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
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `title`, `description`, `faculty`, `time`) VALUES
(1, 'Chapter 1 math test on tuesday', 'all student come with your test copy and learn this chapter carefully', '4', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

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
(14, 'Huzaifa', 1, 'BS (Computer Sciences)', '1st Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-01'),
(15, 'Huzaifa', 1, 'BS (Computer Sciences)', '1st Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-02'),
(16, 'Huzaifa', 1, 'BS (Computer Sciences)', '1st Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-03'),
(17, 'Huzaifa', 1, 'BS (Computer Sciences)', '1st Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'absent', 4, '2022-09-04'),
(18, 'Abdullah', 2, 'BE Software Engineering.', '3rd Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-04'),
(22, 'Abdullah', 2, 'BE Software Engineering.', '3rd Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'absent', 4, '2022-09-04'),
(24, 'Huzaifa', 1, 'BS (Computer Sciences)', '1st Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-05'),
(25, 'Abdullah', 2, 'BE Software Engineering.', '3rd Semester', 'Main Campus - Defence view, Shaheed-e-Millat Road.', 'present', 4, '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `submit_homework`
--

CREATE TABLE `submit_homework` (
  `id` int(11) NOT NULL,
  `file_path` varchar(90) NOT NULL,
  `f_id` int(11) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submit_homework`
--

INSERT INTO `submit_homework` (`id`, `file_path`, `f_id`, `std_name`, `time`) VALUES
(1, 'js.jfif', 4, 'Abdullah', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `qualification`, `Username`, `password`, `role`, `time`) VALUES
(4, 'Sami', 'sami@gmail.com', 'bachelors', 'sami12', '123', '2', '2022-09-04 15:17:32'),
(5, 'Huzaifa', 'huzaifa@gmail.com', 'bachelors', 'Huzaifa', '123', '3', '2022-09-04 16:11:12'),
(6, 'Abdullah', 'abdullah@gmail.com', 'intermediate', 'Abdullah11', '123', '3', '2022-09-04 18:20:40'),
(7, 'Hamza', 'hamza@gmail.com', 'bachelors', 'Hamza', '123', '2', '2022-09-05 03:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_homework`
--
ALTER TABLE `submit_homework`
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
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `submit_homework`
--
ALTER TABLE `submit_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
