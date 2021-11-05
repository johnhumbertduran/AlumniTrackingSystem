-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 03:50 AM
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
-- Table structure for table `payments_tbl`
--

CREATE TABLE `payments_tbl` (
  `id` int(11) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `cash_official_receipt` varchar(255) NOT NULL,
  `cash_date_of_payment` varchar(255) NOT NULL,
  `bank_official_receipt` varchar(255) NOT NULL,
  `bank_date_of_payment` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_bank` varchar(255) NOT NULL,
  `cheque_official_receipt` varchar(255) NOT NULL,
  `cheque_date_of_payment` varchar(255) NOT NULL,
  `number_of_person` varchar(255) NOT NULL,
  `tshirt_size` varchar(255) NOT NULL,
  `souvenir_program` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`id`, `id_no`, `cash_official_receipt`, `cash_date_of_payment`, `bank_official_receipt`, `bank_date_of_payment`, `cheque_no`, `cheque_bank`, `cheque_official_receipt`, `cheque_date_of_payment`, `number_of_person`, `tshirt_size`, `souvenir_program`, `total_amount`) VALUES
(4, '20210002', '', '', '45545454', '10/20/21', '', '', '', '', '', '', '', ''),
(5, '20210001', '', '', '', '', '248545', 'BPI', '24554787', '10/25/21', '', '', '', '');

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
  `img` varchar(255) NOT NULL,
  `account_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `id_no`, `last_name`, `first_name`, `middle_name`, `home_address`, `sex`, `civil_status`, `employment_address`, `current_work`, `elementary_graduate`, `highschool_graduate`, `college_graduate`, `graduate_graduate`, `college_degree`, `graduate_degree`, `office_telephone`, `mobile_number`, `alumni_chapter_membership`, `email_address`, `username`, `password`, `img`, `account_type`) VALUES
(1, '20210000', 'Doe', 'John', 'Doe', 'Kalibo Aklan', 'Male', 'single', '', '', '', '', '', '', '', '', '', '', '', 'doejohn@d.com', 'johndoe', 'password123', '', '1'),
(2, '20210001', 'Doe', 'May', 'Smith', 'Kalibo Aklan', 'Female', 'Single', 'Kalibo Aklan', 'Programmer', '', '2005', '2009', '', 'BSIT', '', '2684523', '09123456789', 'Kalibo', 'marydoe@doe.com', 'marydoe', 'password123', '', '2'),
(20210014, '20210002', 'Doe', 'John ', 'doe', 'kalibo', 'Male', 'Single', 'Kalibo AKlan', 'programming', '', '', '2020', '', 'BSIT', '', '2685955', '09132564878', 'Kalibo', 'jdshdjhs@ksdjks.ldsd', 'johndoe1', 'password123', 'bins/img/241211663_909453456329494_8858259951868666619_n.jpg', '2'),
(20210015, '20210003', 'Dela cruz', 'Juan', 'john', 'fdsfsdh', 'Male', 'Single', 'fdsfsdh', 'fdsfsdh', '', '', '', '2006', '', 'fdsfsdh', '2222584', '44444448787', 'fdsfsdh', 'fdsfsdh@dsd.ghf', 'fdsfsdh', 'password', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210016;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
