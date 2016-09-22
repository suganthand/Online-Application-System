-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2016 at 02:35 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

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
-- Table structure for table `document_uploads`
--

CREATE TABLE `document_uploads` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `x_file` varchar(100) NOT NULL,
  `x_type` varchar(10) NOT NULL,
  `x_size` int(11) NOT NULL,
  `x_status` tinyint(1) NOT NULL,
  `xii_file` varchar(100) NOT NULL,
  `xii_type` varchar(10) NOT NULL,
  `xii_size` int(11) NOT NULL,
  `xii_status` tinyint(1) NOT NULL,
  `ug_file` varchar(100) NOT NULL,
  `ug_type` varchar(10) NOT NULL,
  `ug_size` int(11) NOT NULL,
  `ug_status` tinyint(1) NOT NULL,
  `pg_file` varchar(100) NOT NULL,
  `pg_type` varchar(10) NOT NULL,
  `pg_size` int(11) NOT NULL,
  `pg_status` tinyint(1) NOT NULL,
  `gre_file` varchar(100) NOT NULL,
  `gre_type` varchar(10) NOT NULL,
  `gre_size` int(11) NOT NULL,
  `gre_status` tinyint(1) NOT NULL,
  `toefl_file` varchar(100) NOT NULL,
  `toefl_type` varchar(10) NOT NULL,
  `toefl_size` int(11) NOT NULL,
  `toefl_status` tinyint(1) NOT NULL,
  `resume_file` varchar(100) NOT NULL,
  `resume_type` varchar(10) NOT NULL,
  `resume_size` int(11) NOT NULL,
  `resume_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document_uploads`
--
ALTER TABLE `document_uploads`
  ADD PRIMARY KEY (`applicant_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
