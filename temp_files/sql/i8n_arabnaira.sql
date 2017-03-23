-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 10:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i8n_arabnaira`
--

-- --------------------------------------------------------

--
-- Table structure for table `backoffice_users`
--

CREATE TABLE `backoffice_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `login_count` int(11) DEFAULT '0',
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT 'http://www.beaconsinn.com/images/www.punjabigraphics.com/images/147/Mr.-Bean-Funny-Baby-Face-Picture',
  `mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `backoffice_users`
--

INSERT INTO `backoffice_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `login_count`, `active`, `first_name`, `last_name`, `profile_picture`, `mobile`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1490296122, 1490295399, 1, 'Admin', 'istrator', 'http://www.beaconsinn.com/images/www.punjabigraphics.com/images/147/Mr.-Bean-Funny-Baby-Face-Picture', '0'),
(2, '127.0.0.1', 'peterson_umoke', '$2y$10$fpfD8d.7sd7OboKKnt3aTOtH/nVD8oh0o011zgfUIdyu4TuhNI6nO', NULL, 'admin@yahoo.com', NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 'Peterson', 'Umoke', NULL, NULL),
(9, '::1', NULL, '$2y$10$cHMj/wYfY1Jgg59vUb2AYetIgKpgt7mf7ChuMMZ4JtS6pbJ3lJXju', NULL, 'web@web.com', NULL, NULL, NULL, NULL, 1489844141, NULL, 0, NULL, 'Jide', 'Kosoko', 'http://www.beaconsinn.com/images/www.punjabigraphics.com/images/147/Mr.-Bean-Funny-Baby-Face-Picture', '0');

-- --------------------------------------------------------

--
-- Table structure for table `central_accounts`
--

CREATE TABLE `central_accounts` (
  `id` int(50) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `mobile` text NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_number` text NOT NULL,
  `account_name` text NOT NULL,
  `count` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frontoffice_users`
--

CREATE TABLE `frontoffice_users` (
  `id` int(50) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `first_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(35) CHARACTER SET latin1 NOT NULL,
  `password` varchar(70) CHARACTER SET latin1 NOT NULL,
  `mobile` text CHARACTER SET latin1 NOT NULL,
  `bank_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `account_number` text CHARACTER SET latin1 NOT NULL,
  `account_name` text CHARACTER SET latin1 NOT NULL,
  `login_count` int(51) NOT NULL,
  `last_login` int(11) NOT NULL,
  `created_on` int(11) NOT NULL,
  `profile_picture` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `get_help`
--

CREATE TABLE `get_help` (
  `id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  `paired_id` int(50) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_help`
--

INSERT INTO `get_help` (`id`, `customer_id`, `category`, `status`, `paired_id`, `time`) VALUES
(47, 11, '10000', 3, 0, '1489150209'),
(48, 6, '20000', 1, 0, '1489150653');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paired`
--

CREATE TABLE `paired` (
  `id` int(15) NOT NULL,
  `get_help_id` int(15) NOT NULL,
  `provide_help_customer_id` int(15) NOT NULL,
  `get_help_customer_id` int(15) NOT NULL,
  `provide_help_confirm` int(15) NOT NULL,
  `get_help_confirm` int(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(15) NOT NULL,
  `time` text NOT NULL,
  `receiver` varchar(15) NOT NULL,
  `transaction` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paired`
--

INSERT INTO `paired` (`id`, `get_help_id`, `provide_help_customer_id`, `get_help_customer_id`, `provide_help_confirm`, `get_help_confirm`, `category`, `status`, `time`, `receiver`, `transaction`) VALUES
(87, 4, 11, 4, 1, 1, '5000', 2, '1489150029', 'ADMIN', 'GH');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'divert', 'NO'),
(2, 'percentage', '200'),
(3, 'delay', '120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backoffice_users`
--
ALTER TABLE `backoffice_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `central_accounts`
--
ALTER TABLE `central_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontoffice_users`
--
ALTER TABLE `frontoffice_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_help`
--
ALTER TABLE `get_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paired`
--
ALTER TABLE `paired`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backoffice_users`
--
ALTER TABLE `backoffice_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `central_accounts`
--
ALTER TABLE `central_accounts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frontoffice_users`
--
ALTER TABLE `frontoffice_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `get_help`
--
ALTER TABLE `get_help`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paired`
--
ALTER TABLE `paired`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
