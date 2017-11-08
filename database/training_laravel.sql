-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 06:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'PM'),
(3, 'BA'),
(4, 'Leader'),
(5, 'Comtor'),
(6, 'Member'),
(7, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbs_members`
--

CREATE TABLE `tbs_members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbs_members`
--

INSERT INTO `tbs_members` (`id`, `fullname`, `email`, `birthday`, `gender`, `role`, `updated_at`, `created_at`) VALUES
(1, 'Duong Hoai Khanh', 'duonghoaikhanh@gmail.com', '2016-06-01 00:00:00', 1, 3, '2017-11-07 16:24:37', NULL),
(2, 'Duong Hoai Khanh 1', 'duonghoaikhanh1@gmail.com', '2016-06-01 00:00:00', 0, 2, NULL, NULL),
(3, 'Duong Hoai Khanh 2', 'duonghoaikhanh2@gmail.com', '2016-06-01 00:00:00', 1, 3, NULL, NULL),
(4, 'Duong Hoai Khanh 3', 'duonghoaikhanh3@gmail.com', '2016-06-01 00:00:00', 1, 3, NULL, NULL),
(5, 'Duong Hoai Khanh 4', 'duonghoaikhanh4@gmail.com', '2016-06-01 00:00:00', 1, 6, '2017-11-08 16:41:18', NULL),
(6, 'Duong Hoai Khanh 5', 'duonghoaikhanh5@gmail.com', '2016-06-01 00:00:00', 1, 3, NULL, NULL),
(7, 'khanh 1', 'khanh1@gmail.com', '2016-06-01 00:00:00', 1, 1, '2017-11-06 16:44:36', '2017-11-06 16:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbs_teams`
--

CREATE TABLE `tbs_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `total_member` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbs_teams`
--

INSERT INTO `tbs_teams` (`id`, `name`, `description`, `total_member`, `created_at`, `updated_at`) VALUES
(1, 'Team 1', 'This is team 1', 2, '2017-11-08 16:33:03', '2017-11-08 16:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbs_team_member`
--

CREATE TABLE `tbs_team_member` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbs_team_member`
--

INSERT INTO `tbs_team_member` (`id`, `team_id`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-08 23:33:03', '2017-11-08 23:33:03'),
(2, 1, 2, '2017-11-08 23:33:03', '2017-11-08 23:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbs_users`
--

CREATE TABLE `tbs_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_members`
--
ALTER TABLE `tbs_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_teams`
--
ALTER TABLE `tbs_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_team_member`
--
ALTER TABLE `tbs_team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbs_users`
--
ALTER TABLE `tbs_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbs_members`
--
ALTER TABLE `tbs_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbs_teams`
--
ALTER TABLE `tbs_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbs_team_member`
--
ALTER TABLE `tbs_team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbs_users`
--
ALTER TABLE `tbs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
