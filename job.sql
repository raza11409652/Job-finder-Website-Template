-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2019 at 05:25 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_entry`
--

CREATE TABLE `job_entry` (
  `job_entry_id` int(11) NOT NULL,
  `job_entry_profile` varchar(256) NOT NULL,
  `job_entry_com_name` varchar(256) NOT NULL,
  `job_entry_location` varchar(256) NOT NULL,
  `job_entry_total_vac` int(10) NOT NULL,
  `job_entry_desc` text NOT NULL,
  `job_entry_elig` text NOT NULL,
  `job_entry_posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `job_entry_posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_entry`
--

INSERT INTO `job_entry` (`job_entry_id`, `job_entry_profile`, `job_entry_com_name`, `job_entry_location`, `job_entry_total_vac`, `job_entry_desc`, `job_entry_elig`, `job_entry_posted_on`, `job_entry_posted_by`) VALUES
(6, 'Feeter', 'TATA', 'TATA STEEL Jamshedpur Jharkhand', 199, 'khalid', 'khakd', '2018-12-02 04:59:47', 1),
(7, 'Feeter', 'TATA', 'TATA STEEL Jamshedpur Jharkhand', 100, 'kkak', 'kd', '2018-12-02 05:00:20', 1),
(8, 'Feeter', 'TATA', 'TATA STEEL Jamshedpur Jharkhand', 100, 'kkk', 'kkk', '2018-12-02 05:01:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(11) NOT NULL,
  `otp_value` text NOT NULL,
  `otp_ref` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp_id`, `otp_value`, `otp_ref`) VALUES
(7, '$2y$11$fgL/BvPQqZno1tojEaxSL.D.4vsH9rifpSotDNZ0qE1iKPikVYW9y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `panel_id` int(11) NOT NULL,
  `panel_f_name` varchar(256) NOT NULL,
  `panel_email` varchar(256) NOT NULL,
  `panel_mobile` varchar(12) NOT NULL,
  `panel_password` text NOT NULL,
  `panel_l_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`panel_id`, `panel_f_name`, `panel_email`, `panel_mobile`, `panel_password`, `panel_l_name`) VALUES
(1, 'khalid', 'raza.11409652@lpu.in', '6204304229', 'b58bca26ea42759f499479322f17f978d4a64a07fbcb484b5a4c2fe1c6abe1c7fcdead07ab3770990341ceb501fdcef8caa8e335faf16514c7f372688fad7687', 'Raza Khan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_entry`
--
ALTER TABLE `job_entry`
  ADD PRIMARY KEY (`job_entry_id`),
  ADD KEY `job_entry_posted_by` (`job_entry_posted_by`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`),
  ADD KEY `otp_ref` (`otp_ref`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`panel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_entry`
--
ALTER TABLE `job_entry`
  MODIFY `job_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_entry`
--
ALTER TABLE `job_entry`
  ADD CONSTRAINT `job_entry_ibfk_1` FOREIGN KEY (`job_entry_posted_by`) REFERENCES `panel` (`panel_id`);

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`otp_ref`) REFERENCES `panel` (`panel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
