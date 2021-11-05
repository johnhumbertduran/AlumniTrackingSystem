-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 03:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnitrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `employment_address` varchar(255) NOT NULL,
  `current_work` varchar(255) NOT NULL,
  `elementary_graduate` varchar(255) NOT NULL,
  `highschool_graduate` varchar(255) NOT NULL,
  `college_graduate` varchar(255) NOT NULL,
  `graduate_graduate` varchar(255) NOT NULL,
  `college_degree` varchar(255) NOT NULL,
  `graduate_degree` varchar(255) NOT NULL,
  `office_telephone` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `alumni_chapter_membership` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `id_no`, `last_name`, `first_name`, `middle_name`, `home_address`, `sex`, `civil_status`, `employment_address`, `current_work`, `elementary_graduate`, `highschool_graduate`, `college_graduate`, `graduate_graduate`, `college_degree`, `graduate_degree`, `office_telephone`, `mobile_number`, `alumni_chapter_membership`, `email_address`, `username`, `password`, `account_type`) VALUES
(1, '20210000', 'Doe', 'John', 'Murbrick', 'Kalibo Aklan', 'Male', 'single', '', '', '', '', '', '', '', '', '', '', '', 'doejohn@d.com', 'johndoe', 'password123', '1'),
(20210001, '20210001', 'Doe', 'John', 'Churcha', 'Kalibo Aklan', '', '', 'Melbourne Australia', 'Web Developer', '', '', '', '', '', '', '2653589', '09654231897', 'Numancia', 'doejohn@brean.com', 'doejohn123', 'password123', '2'),
(20210002, '20210002', 'Doe', 'Sarah', 'skabinskie', 'Numancia Aklan', 'Female', 'Married', 'Kalibo Aklan', 'Developer', '', '', '', '', '', '', '2356954', '09356459652', 'Kalibo', 'doesarah@saradoe.com', 'sarahdoe123', 'password123', '2'),
(20210003, '20210003', 'Doe', 'Mary', 'skabinskie', 'Numancia Aklan', 'Female', 'Married', 'Kalibo Aklan', 'Developer', '2009', '', '', '', '', '', '2356954', '09356459652', 'Kalibo', 'doesarah@saradoe.com', 'sarahdoe123', 'password123', '2'),
(20210004, '20210004', 'Conanan', 'Elton John', 'Meldie', 'Nabas', 'Male', 'Married', 'Boracay Aklan', 'IT Staff', '', '', '2022', '', 'BSIT', '', '2568548', '09456875231', 'Nabas', 'eltonjohn@el.com', 'eltonjohn123', 'password123', '2'),
(20210005, '20210005', 'Robredo', 'Leni', 'Rhasta', 'Makati ', 'Female', 'Married', 'Pasig ', 'Businesswoman', '', '', '2007', '2013', 'BSBIOT', 'BSBIOT', '1256485', '09653258741', 'Mandaluyong', 'letlenilead@robber.com', 'lenilead123', 'password123', '2'),
(20210006, '20210006', 'Dangdong', 'Rhasta Man', 'lokhta', 'Lezo Aklan', 'Male', 'Married', 'Malacañang', 'President', '2003', '2008', '', '', '', '', '2365897', '09123654897', 'Lezo', 'rhastaman@malaks.com', 'rhastaman123', 'password123', '2'),
(20210007, '20210007', 'Blake', 'Zia', 'Nuggets', 'Cebu City', 'Female', 'Single', 'Palawan', 'CSR', '', '', '2001', '', 'BSBA', '', '2365845', '91032568745', 'Madalag', 'blakezia@drag.com', 'ziablake123', 'password123', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210008;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
