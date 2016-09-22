-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 10:26 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sase_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `essays`
--

CREATE TABLE `essays` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `essay_file` varchar(100) NOT NULL,
  `essay_type` varchar(10) NOT NULL,
  `essay_size` int(11) NOT NULL,
  `essay_status` tinyint(1) NOT NULL,
  `exp_file` varchar(100) NOT NULL,
  `exp_type` varchar(10) NOT NULL,
  `exp_size` int(11) NOT NULL,
  `exp_status` tinyint(1) NOT NULL,
  `cri_file` varchar(100) NOT NULL,
  `cri_type` varchar(10) NOT NULL,
  `cri_size` int(11) NOT NULL,
  `cri_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `essays`
--
ALTER TABLE `essays`
  ADD PRIMARY KEY (`applicant_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
