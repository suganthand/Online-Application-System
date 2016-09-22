-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 02:52 PM
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
-- Table structure for table `academic_uploads`
--

CREATE TABLE `academic_uploads` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_uploads`
--

INSERT INTO `academic_uploads` (`applicant_id`, `email`, `file`, `type`, `size`, `status`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'MSIT2016008-acads.doc', 'doc', 28672, 1),
('MSIT2016013', 'chetank@sase.ssn.edu.in', 'MSIT2016013-acads.doc', 'doc', 28672, 1),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `critical_essay`
--

CREATE TABLE `critical_essay` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `critical_essay`
--

INSERT INTO `critical_essay` (`applicant_id`, `email`, `file`, `type`, `size`, `status`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'MSIT2016008-SOP.doc', 'doc', 33280, 1),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', '', '', 0, 0);

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
-- Dumping data for table `document_uploads`
--

INSERT INTO `document_uploads` (`applicant_id`, `email`, `x_file`, `x_type`, `x_size`, `x_status`, `xii_file`, `xii_type`, `xii_size`, `xii_status`, `ug_file`, `ug_type`, `ug_size`, `ug_status`, `pg_file`, `pg_type`, `pg_size`, `pg_status`, `gre_file`, `gre_type`, `gre_size`, `gre_status`, `toefl_file`, `toefl_type`, `toefl_size`, `toefl_status`, `resume_file`, `resume_type`, `resume_size`, `resume_status`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'MSIT2016008-X_marksheet.pdf', 'pdf', 300161, 1, 'MSIT2016008-XII_marksheet.pdf', 'pdf', 233269, 1, 'MSIT2016008-UG_marksheet.pdf', 'pdf', 185283, 1, 'MSIT2016008-PG_marksheet.pdf', 'pdf', 120041, 1, 'MSIT2016008-GRE.pdf', 'pdf', 363702, 1, 'MSIT2016008-TOEFL.pdf', 'pdf', 83906, 1, 'MSIT2016008-resume.pdf', 'pdf', 98553, 1),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', 'MSIT2016014-X_marksheet.pdf', 'pdf', 300161, 1, 'MSIT2016014-XII_marksheet.pdf', 'pdf', 233269, 1, 'MSIT2016014-UG_marksheet.pdf', 'pdf', 185283, 1, 'MSIT2016014-PG_marksheet.pdf', 'pdf', 120041, 1, 'MSIT2016014-GRE.pdf', 'pdf', 380526, 1, 'MSIT2016014-TOEFL.pdf', 'pdf', 83906, 1, 'MSIT2016014-resume.pdf', 'pdf', 98553, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE `education_details` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `x_board` varchar(15) NOT NULL,
  `x_inst` varchar(50) NOT NULL,
  `x_city` varchar(30) NOT NULL,
  `x_state` varchar(30) NOT NULL,
  `x_major` varchar(100) NOT NULL,
  `x_marks` int(2) NOT NULL,
  `x_year` int(4) NOT NULL,
  `xii_board` varchar(15) NOT NULL,
  `xii_inst` varchar(50) NOT NULL,
  `xii_city` varchar(30) NOT NULL,
  `xii_state` varchar(30) NOT NULL,
  `xii_major` varchar(100) NOT NULL,
  `xii_marks` int(2) NOT NULL,
  `xii_year` int(4) NOT NULL,
  `ug_degree` varchar(30) NOT NULL,
  `ug_major` varchar(50) NOT NULL,
  `ug_major_other` varchar(50) DEFAULT NULL,
  `ug_marks` decimal(3,1) NOT NULL,
  `ug_inst` varchar(50) NOT NULL,
  `ug_univ` varchar(50) NOT NULL,
  `ug_city` varchar(50) NOT NULL,
  `ug_state` varchar(50) NOT NULL,
  `ug_year_from` int(4) NOT NULL,
  `ug_year_to` int(4) NOT NULL,
  `pg_degree` varchar(30) NOT NULL,
  `pg_major` varchar(50) NOT NULL,
  `pg_marks` decimal(3,1) NOT NULL,
  `pg_inst` varchar(50) NOT NULL,
  `pg_univ` varchar(50) NOT NULL,
  `pg_year_from` int(4) NOT NULL,
  `pg_year_to` int(4) NOT NULL,
  `gre_awa` decimal(2,1) NOT NULL,
  `gre_verbal` int(3) NOT NULL,
  `gre_quant` int(3) NOT NULL,
  `gre_total` int(3) NOT NULL,
  `toefl_reading` int(2) NOT NULL,
  `toefl_writing` int(2) NOT NULL,
  `toefl_listening` int(2) NOT NULL,
  `toefl_speaking` int(2) NOT NULL,
  `toefl_total` int(3) NOT NULL,
  `toefl_date` date NOT NULL,
  `gre_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_details`
--

INSERT INTO `education_details` (`applicant_id`, `email`, `x_board`, `x_inst`, `x_city`, `x_state`, `x_major`, `x_marks`, `x_year`, `xii_board`, `xii_inst`, `xii_city`, `xii_state`, `xii_major`, `xii_marks`, `xii_year`, `ug_degree`, `ug_major`, `ug_major_other`, `ug_marks`, `ug_inst`, `ug_univ`, `ug_city`, `ug_state`, `ug_year_from`, `ug_year_to`, `pg_degree`, `pg_major`, `pg_marks`, `pg_inst`, `pg_univ`, `pg_year_from`, `pg_year_to`, `gre_awa`, `gre_verbal`, `gre_quant`, `gre_total`, `toefl_reading`, `toefl_writing`, `toefl_listening`, `toefl_speaking`, `toefl_total`, `toefl_date`, `gre_date`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'cbse', 'PSBB', 'Chennai', 'Tamil Nadu', 'English, Tamil, Mathematics, Science, Social Science', 92, 2007, 'stateboard', 'SBOA', 'Chennai', 'Tamil Nadu', 'English, Mathematics, Physics, Chemistry, Computer Science', 90, 2009, 'B.Tech.', 'Information Technology', 'N/A', '91.5', 'SSN College of Engineering', 'Anna University', 'Chennai', 'Tamil Nadu', 2009, 2013, 'M.Sc.', 'Information Technology', '90.6', 'SSN College of Engineering', 'CMU', 2015, 2016, '4.0', 158, 164, 0, 26, 26, 26, 28, 0, '0000-00-00', '0000-00-00'),
('MSIT2016013', 'chetank@sase.ssn.edu.in', '', '', '', '', '', 0, 0, '', '', '', '', '', 0, 0, '', '', '', '0.0', '', '', '', '', 0, 0, '', '', '0.0', '', '', 0, 0, '0.0', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0000-00-00'),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', 'cbse', 'Modern Senior', 'Chennai', 'Tamil Nadu', 'Science Maths', 90, 2004, 'cbse', 'Modern Senior', 'Chennai', 'Tamil Nadu', 'PCM', 89, 2006, 'B.Tech.', 'Other', 'Bioinformatics', '90.0', 'SASTRA University', 'SASTRA University', 'Thanjavur', 'Tamil Nadu', 2006, 2010, '', '', '0.0', '', '', 0, 0, '5.0', 160, 160, 0, 30, 29, 29, 28, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `essays`
--

CREATE TABLE `essays` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `acads_file` varchar(100) NOT NULL,
  `acads_type` varchar(10) NOT NULL,
  `acads_size` int(11) NOT NULL,
  `acads_status` tinyint(1) NOT NULL,
  `exp_file` varchar(100) NOT NULL,
  `exp_type` varchar(10) NOT NULL,
  `exp_size` int(11) NOT NULL,
  `exp_status` tinyint(1) NOT NULL,
  `cri_file` varchar(100) NOT NULL,
  `cri_type` varchar(10) NOT NULL,
  `cri_size` int(11) NOT NULL,
  `cri_status` tinyint(1) NOT NULL,
  `photo_file` varchar(100) NOT NULL,
  `photo_type` varchar(10) NOT NULL,
  `photo_size` int(11) NOT NULL,
  `photo_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `essays`
--

INSERT INTO `essays` (`applicant_id`, `email`, `acads_file`, `acads_type`, `acads_size`, `acads_status`, `exp_file`, `exp_type`, `exp_size`, `exp_status`, `cri_file`, `cri_type`, `cri_size`, `cri_status`, `photo_file`, `photo_type`, `photo_size`, `photo_status`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'MSIT2016008-acads.pdf', 'pdf', 86402, 1, 'MSIT2016008-exp.pdf', 'pdf', 86186, 1, 'MSIT2016008-SOP.pdf', 'pdf', 189370, 1, 'MSIT2016008-photo.jpg', 'jpg', 7879, 1),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', 'MSIT2016014-acads.pdf', 'pdf', 86402, 1, 'MSIT2016014-exp.pdf', 'pdf', 86186, 1, 'MSIT2016014-SOP.pdf', 'pdf', 189370, 1, 'MSIT2016014-photo.jpg', 'jpg', 7879, 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience_uploads`
--

CREATE TABLE `experience_uploads` (
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience_uploads`
--

INSERT INTO `experience_uploads` (`applicant_id`, `email`, `file`, `type`, `size`, `status`) VALUES
('MSIT2016008', 'lakshmis@sase.ssn.edu.in', 'MSIT2016008-exp.doc', 'doc', 30720, 1),
('MSIT2016013', 'chetank@sase.ssn.edu.in', '', '', 0, 0),
('MSIT2016014', 'shrinathb@sase.ssn.edu.in', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `date_of_birth` date NOT NULL,
  `applicant_id` varchar(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `p_address_line1` varchar(50) NOT NULL,
  `p_address_line2` varchar(50) DEFAULT NULL,
  `p_address_city` varchar(25) NOT NULL,
  `p_address_state` varchar(32) NOT NULL,
  `p_address_pincode` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `m_address_line1` varchar(50) NOT NULL,
  `m_address_line2` varchar(50) NOT NULL,
  `m_address_city` varchar(25) NOT NULL,
  `m_address_pincode` int(6) NOT NULL,
  `m_address_state` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`date_of_birth`, `applicant_id`, `gender`, `p_address_line1`, `p_address_line2`, `p_address_city`, `p_address_state`, `p_address_pincode`, `email`, `m_address_line1`, `m_address_line2`, `m_address_city`, `m_address_pincode`, `m_address_state`) VALUES
('1991-12-20', 'MSIT2016008', 'f', '11 Spring Street', 'Flower Bazaar', 'Jaipur', 'Rajasthan', 320001, 'lakshmis@sase.ssn.edu.in', '', '', '', 0, ''),
('1988-11-14', 'MSIT2016014', 'm', '11 Bharathiyar II Street (South)', 'Palavanthangal', 'Chennai', 'Tamil Nadu', 600114, 'shrinathb@sase.ssn.edu.in', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(11) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `app_status` int(1) NOT NULL,
  `validation_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `applicant_id`, `email`, `password`, `salt`, `first_name`, `middle_name`, `last_name`, `phone`, `app_status`, `validation_status`) VALUES
(13, 'MSIT2016013', 'chetank@sase.ssn.edu.in', '1de03f2c20c805614bf45db69d715a4d6e571914311702e43a0ca86ca1eda4d9ecfe25c41a1bfa36236c2921b7b33aa5a0cf1410ab1672f022f27d32ac57cc30', '&fW&tW31*Tvix*Ev#CVhH2NUld6VUqsGfNZMYOB@S*Xg$2TPIZ?ldvVaGKXhGg4s', 'Chetan', 'Yuvaraj', 'Reddy', '9876543210', 1, 0),
(8, 'MSIT2016008', 'lakshmis@sase.ssn.edu.in', '34b11ca78584f2d72f7ad47538d21780234d74eb3cabb176cf4d10716ef9073ce43eefdd80b13a7142e42b1aa8cb660e5b0cb5245ce266ac0c7d6d5743868700', 'pWiGE1a3*HXC8an716CgFY*bfW3LeK@q%?ixoEFm*fFCs#Zy0P7e7XDUkh0B3MjR', 'Lakshmi', '', 'Subramanian', '9876543210', 1, 1),
(14, 'MSIT2016014', 'shrinathb@sase.ssn.edu.in', '180a667dc8795f2743fd74c2a042a9076ca965e6a57c075380110d1010c73e3fe7258d7d1c83bd33121b664cdfc2a3d421908f9b9fcc1c8eb3fd7cf68300a2d1', 'MU1N8b9TXRX4kWHTSjG%Paa5wi$tBiW@uO59t4czfu2wcsOZYpdRpTy5PlnqjhaK', 'Shrinath', '', 'Badrinarayanan', '9952007118', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_uploads`
--
ALTER TABLE `academic_uploads`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `critical_essay`
--
ALTER TABLE `critical_essay`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `document_uploads`
--
ALTER TABLE `document_uploads`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `education_details`
--
ALTER TABLE `education_details`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `essays`
--
ALTER TABLE `essays`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `experience_uploads`
--
ALTER TABLE `experience_uploads`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
