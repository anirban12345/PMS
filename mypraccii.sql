-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 11:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypraccii`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sid` int(10) NOT NULL,
  `Bengali` int(10) NOT NULL,
  `English` int(10) NOT NULL,
  `Hindi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Send_date` date NOT NULL DEFAULT '0000-00-00',
  `Req_From` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Recieve_date` date NOT NULL DEFAULT '0000-00-00',
  `Memo_no` varchar(255) NOT NULL,
  `Req_Sendto` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Ocputup_Date` date NOT NULL DEFAULT '0000-00-00',
  `Status` varchar(255) NOT NULL,
  `Entry_Date` date NOT NULL DEFAULT '0000-00-00',
  `Entry_Time` time NOT NULL DEFAULT '00:00:00',
  `Entry_Flag` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `Type`, `Send_date`, `Req_From`, `Subject`, `Recieve_date`, `Memo_no`, `Req_Sendto`, `Remarks`, `Ocputup_Date`, `Status`, `Entry_Date`, `Entry_Time`, `Entry_Flag`, `User_Id`) VALUES
(1, 'File', '2018-08-07', 'Test', 'Test Sub', '2018-08-07', 'Test memo', 'Test Send To', 'Test Remarks', '2018-08-07', 'Processed', '2018-08-07', '16:10:04', 1, 1),
(2, 'Zimbra Mail', '2018-08-07', 'asdf', 'asdf', '2018-08-07', 'asdf', 'sadf', 'asdf', '2018-08-07', 'Processing', '2018-08-31', '16:07:34', 1, 1),
(3, 'Folder', '2018-08-08', 'sdfsadf', 'asdfasdf', '2018-08-08', 'asdf', 'asdf', 'asdfsdf', '2018-08-08', 'Active', '2018-08-08', '16:34:58', 1, 1),
(4, 'Folder', '2018-08-08', 'asdf', 'asdf', '2018-08-08', 'asdf', 'asdf', 'asdf', '2018-08-08', 'Active', '2018-08-08', '16:53:08', 1, 1),
(5, 'File', '2018-08-09', 'asdfsafd', 'asdfasdf', '2018-08-09', 'asdfsafd', 'sdfsadf', 'sfasdf', '2018-08-09', 'Active', '2018-08-09', '18:28:28', 1, 1),
(6, 'Zimbra Mail', '2018-08-31', 'BEHALA THANA', 'Request For Photography & Foot print', '2018-08-31', 'abc/123', 'Pornorsree', 'Hello', '2018-08-31', 'Processed', '2018-08-31', '16:02:45', 1, 1),
(7, 'Zimbra Mail', '2018-08-03', 'BEHALA THANA', 'Request For Photography & Foot print', '2018-08-15', '123', 'Pornorsree', 'Hello', '2018-08-15', 'Processed', '2018-08-31', '17:39:31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `process_image`
--

CREATE TABLE `process_image` (
  `id` int(11) NOT NULL,
  `Process_Id` int(11) NOT NULL,
  `Image_Name` varchar(255) NOT NULL,
  `Pdate` date NOT NULL DEFAULT '0000-00-00',
  `Ptime` time NOT NULL DEFAULT '00:00:00',
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_image`
--

INSERT INTO `process_image` (`id`, `Process_Id`, `Image_Name`, `Pdate`, `Ptime`, `User_Id`) VALUES
(1, 1, '1533636289.jpg', '2018-08-07', '15:35:06', 1),
(2, 2, '1533636568.jpg', '2018-08-07', '15:39:34', 1),
(3, 6, '1535711470.jpg', '2018-08-31', '16:01:42', 1),
(4, 7, '1535717223.jpg', '2018-08-31', '17:37:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `process_status`
--

CREATE TABLE `process_status` (
  `id` int(11) NOT NULL,
  `Process_Id` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Status_Date` date NOT NULL DEFAULT '0000-00-00',
  `Status_Time` time NOT NULL DEFAULT '00:00:00',
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_status`
--

INSERT INTO `process_status` (`id`, `Process_Id`, `Status`, `Status_Date`, `Status_Time`, `User_Id`) VALUES
(1, 1, 'Active', '2018-08-07', '15:34:48', 1),
(2, 2, 'Active', '2018-08-07', '15:39:28', 1),
(3, 1, 'Processing', '2018-08-07', '15:43:30', 1),
(4, 1, 'Processed', '2018-08-07', '16:10:04', 1),
(5, 3, 'Active', '2018-08-08', '16:34:58', 1),
(6, 4, 'Active', '2018-08-08', '16:53:08', 1),
(7, 5, 'Active', '2018-08-09', '18:28:28', 1),
(8, 6, 'Active', '2018-08-31', '16:01:10', 1),
(9, 6, 'Processing', '2018-08-31', '16:02:28', 1),
(10, 6, 'Processed', '2018-08-31', '16:02:45', 1),
(11, 2, 'Processing', '2018-08-31', '16:07:34', 3),
(12, 7, 'Active', '2018-08-31', '17:37:02', 1),
(13, 7, 'Processing', '2018-08-31', '17:39:01', 1),
(14, 7, 'Processed', '2018-08-31', '17:39:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `saddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Levelid` int(11) NOT NULL,
  `Udate` date NOT NULL DEFAULT '0000-00-00',
  `Utime` time NOT NULL DEFAULT '00:00:00',
  `Uflag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Firstname`, `Lastname`, `Address`, `Phone`, `Email`, `Password`, `Image`, `Levelid`, `Udate`, `Utime`, `Uflag`) VALUES
(1, 'user1', 'user1', 'dd', '9963688525', 'user1@pms.com', 'e10adc3949ba59abbe56e057f20f883e', '1533629096.jpg', 2, '2018-08-07', '11:05:31', 1),
(2, 'Admin', 'Admin', 'dd', '9963688525', 'admin@pms.com', 'e10adc3949ba59abbe56e057f20f883e', '1533629096.jpg', 1, '2018-08-07', '11:05:31', 1),
(3, 'user2', 'user2', 'swdd', '9963688526', 'user2@pms.com', 'e10adc3949ba59abbe56e057f20f883e', '1533629805.jpg', 2, '2018-08-07', '13:44:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Log_Date` date NOT NULL DEFAULT '0000-00-00',
  `Log_Time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`id`, `User_Id`, `Log_Date`, `Log_Time`) VALUES
(1, 2, '2018-08-08', '17:14:39'),
(2, 1, '2018-08-08', '17:15:08'),
(3, 3, '2018-08-08', '17:15:35'),
(4, 1, '2018-08-09', '18:28:06'),
(5, 2, '2018-08-09', '18:28:51'),
(6, 1, '2018-08-10', '15:19:13'),
(7, 1, '2018-08-10', '15:20:25'),
(8, 2, '2018-08-31', '12:54:50'),
(9, 1, '2018-08-31', '12:55:09'),
(10, 1, '2018-08-31', '15:56:58'),
(11, 2, '2018-08-31', '16:03:50'),
(12, 1, '2018-08-31', '16:05:33'),
(13, 2, '2018-08-31', '16:05:55'),
(14, 3, '2018-08-31', '16:07:09'),
(15, 2, '2018-08-31', '16:07:51'),
(16, 1, '2018-08-31', '17:35:26'),
(17, 2, '2018-08-31', '17:40:13'),
(18, 1, '2018-09-03', '08:28:31'),
(19, 1, '2018-09-12', '11:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `Id` int(11) NOT NULL,
  `Title` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`Id`, `Title`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_image`
--
ALTER TABLE `process_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_status`
--
ALTER TABLE `process_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `process_image`
--
ALTER TABLE `process_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `process_status`
--
ALTER TABLE `process_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
