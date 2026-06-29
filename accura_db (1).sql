-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 25, 2026 at 11:15 AM
-- Server version: 8.0.46
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accuragold`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'smruti', 'test@gmail.com', 'test test', 'test message', 1, '2026-06-25 10:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `password`, `status`, `created_at`, `update_at`) VALUES
(1, 'ADMIN', 'Admin', '$2y$10$g/1FjSYY.j2tMev8G4iYu.53lItyVT6PuFUc7Sw37KJMmTd4qYnAa', 1, '2026-06-23 10:32:28', '2026-06-23 10:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `report_date` date NOT NULL,
  `description` text,
  `uploaded_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `report_no` varchar(10) NOT NULL,
  `is_deleted` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `report_date`, `description`, `uploaded_file`, `created_at`, `report_no`, `is_deleted`) VALUES
(1, 'test', '2026-06-24', 'test description', '1782278147_motp_certificate (15).pdf', '2026-06-24 05:15:47', '2056142415', 0),
(2, 'Test 2', '2026-06-25', 'test desc', '1782279585_ITMS (1).xlsx', '2026-06-24 05:39:45', '7660318763', 0),
(4, 'test3', '2026-06-25', 'test', '1782279808_motp_certificate (12).pdf', '2026-06-24 05:43:28', '1978735721', 0),
(5, 'tes6', '2026-06-17', 'test 67', '1782279870_motp_certificate (12).pdf', '2026-06-24 05:44:30', '8437894624', 0),
(6, 'test7', '2026-06-29', 'test890', '1782279967_motp_certificate (12).pdf', '2026-06-24 05:46:07', '4795606500', 0),
(7, 'test', '2026-06-22', 'ftyhtb  rtet', '1782280044_motp_certificate (12).pdf', '2026-06-24 05:47:24', '1651477362', 0),
(8, 'test 7', '2026-06-05', 'testy testing', '1782363651_1782282283_ITMS11.xlsx', '2026-06-24 05:49:25', '2643789334', 0),
(9, 'test 56342', '2026-06-25', 'test rre', '1782280534_motp_certificate (13).pdf', '2026-06-24 05:55:34', '5007210896', 0),
(10, 'test 5', '2026-06-25', 'test description', '', '2026-06-24 05:57:21', '1277882875', 0),
(11, 'test5', '2026-06-16', 'update tes', '', '2026-06-24 06:08:57', '3752925937', 0),
(12, 'test 891', '2026-06-27', 'test update 3', '1782362679_1782282283_ITMS11.xlsx', '2026-06-24 06:24:43', '9137358960', 0),
(13, 'test report', '2026-06-24', 'test sedcription 45', '1782364634_1782282283_ITMS (1) (1).xlsx', '2026-06-25 05:17:14', 'ZL90RVS7UR', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_no` (`report_no`),
  ADD UNIQUE KEY `uq_report_no` (`report_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
