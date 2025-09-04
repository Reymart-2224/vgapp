-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 04:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oesystem_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `vg_id` int(255) NOT NULL,
  `attendees` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `referrals` longtext NOT NULL,
  `leader` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `vg_id`, `attendees`, `date`, `time`, `referrals`, `leader`) VALUES
(77, 15, '[\"15\",\"16\",\"17\",\"18\",\"19\"]', '2023-10-17', '08:17:42 am', '[]', 12);

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `id` int(255) NOT NULL,
  `name` longtext NOT NULL,
  `address` longtext NOT NULL,
  `date` longtext NOT NULL,
  `time` longtext NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`id`, `name`, `address`, `date`, `time`, `status`) VALUES
(4, 'Victory Mabalacat', 'Xevera', '2022-08-31', '09:46:47 am', 1),
(5, 'Victory Angeles', 'SM Telebastagan', '2022-08-31', '09:47:57 am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `church` int(255) NOT NULL,
  `leader` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1,
  `contact` longtext NOT NULL,
  `attendance_status` int(255) NOT NULL DEFAULT 3,
  `indicator` int(255) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `church`, `leader`, `date`, `status`, `contact`, `attendance_status`, `indicator`) VALUES
(15, 'Joshua', 'Ansiboy', 4, 12, '2023-10-16', 1, '', 3, 1),
(16, 'Jeremiah', 'Banania', 4, 12, '2023-10-16', 1, '', 3, 1),
(17, 'Lester', 'Manaloto', 4, 12, '2023-10-16', 1, '', 3, 1),
(18, 'Cj', 'Magtoles', 4, 12, '2023-10-16', 1, '', 3, 1),
(19, 'Zoe', 'Andong', 4, 12, '2023-10-16', 1, '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(255) NOT NULL,
  `member` int(255) NOT NULL,
  `leader` int(255) NOT NULL,
  `from_leader` int(255) NOT NULL,
  `notes` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `type` int(255) NOT NULL,
  `indicator` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `type` int(255) NOT NULL DEFAULT 1,
  `church` longtext DEFAULT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `type`, `church`, `status`, `date`, `code`) VALUES
(1, 'developer', '$2y$10$tm/DC0UNyTEth8mENNKb..BknR2ubYqzCangyOn0igyHLtvKzz2/.', 'Reymart', 'Dungca', 1, NULL, 1, '2022-08-30', '2224'),
(9, 'peter@gmail.com', '$2y$10$tm/DC0UNyTEth8mENNKb..BknR2ubYqzCangyOn0igyHLtvKzz2/.', 'Peter', 'Aquino', 2, '[\"4\",\"5\"]', 1, '2022-08-31', 'VK7M'),
(11, 'eugene@gmail.com', '$2y$10$cFujg/hFPIH4Fg8FhGDTyOffu2a80AQII74QGpVzBXeUe4eVOU6Ey', 'Eugene', 'Lapitan', 3, '4', 1, '2022-09-01', 'hNNC'),
(12, 'dungcamart24@gmail.com', '$2y$10$tm/DC0UNyTEth8mENNKb..BknR2ubYqzCangyOn0igyHLtvKzz2/.', 'Reymart', 'Dungca', 3, '4', 1, '2022-09-02', 'PPuJ'),
(13, 'martin@gmail.com', '$2y$10$eiXB5iSA58n/sKr6NW2yduQqjOdRVywzbcBrUvLxm36GZiABjG6V2', 'Martin', 'Yabut', 2, '[\"5\"]', 1, '2022-09-03', '3kOE');

-- --------------------------------------------------------

--
-- Table structure for table `victory_group`
--

CREATE TABLE `victory_group` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `church` int(255) NOT NULL,
  `leader` int(255) NOT NULL,
  `members` longtext NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_start` varchar(255) NOT NULL,
  `time_end` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `victory_group`
--

INSERT INTO `victory_group` (`id`, `name`, `church`, `leader`, `members`, `day`, `time_start`, `time_end`, `created`, `status`) VALUES
(15, 'Boga Boys', 4, 12, '[\"15\",\"16\",\"17\",\"18\",\"19\"]', 'monday', '15:00', '16:00', '2023-10-16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `victory_group`
--
ALTER TABLE `victory_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `victory_group`
--
ALTER TABLE `victory_group`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
