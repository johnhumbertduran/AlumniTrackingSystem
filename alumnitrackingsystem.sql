-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 12:21 PM
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
  `small` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `large` varchar(255) NOT NULL,
  `extralarge` varchar(255) NOT NULL,
  `doublexl` varchar(255) NOT NULL,
  `souvenir_program` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`id`, `id_no`, `cash_official_receipt`, `cash_date_of_payment`, `bank_official_receipt`, `bank_date_of_payment`, `cheque_no`, `cheque_bank`, `cheque_official_receipt`, `cheque_date_of_payment`, `number_of_person`, `small`, `medium`, `large`, `extralarge`, `doublexl`, `souvenir_program`, `total_amount`) VALUES
(4, '20210002', '', '', '45545454', '10/20/21', '', '', '', '', '', '', '', '', '', '', '', '1000'),
(5, '20210001', '', '', '', '', '248545', 'BPI', '24554787', '10/25/21', '', '', '', '', '', '', '', '5000'),
(6, '20210003', '12563781982', '09/21/2021', '', '', '', '', '', '', '', '', '', '', '', '', '', '8000'),
(8, '20210005', '32542332', '12-25-2021', '', '', '', '', '', '', '', '', '', '', '', '', '', '4000'),
(16, '20210004', '', '', 'PzO15faq2AlwexbsmWI8GnUFgJi0ToN6RvXESBKyM9rpZQ7jcuk4LYtDVd3HhC', '01/25/2022', '', '', '', '', '5', '2', '1', '1', '1', '0', 'Flip Cover Page', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `post_tbl`
--

CREATE TABLE `post_tbl` (
  `id` int(11) NOT NULL,
  `post_no` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tbl`
--

INSERT INTO `post_tbl` (`id`, `post_no`, `post`, `date`, `time`, `img`) VALUES
(9, '20210000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '01/17/2022', '04:54', ''),
(10, '20210000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '01/17/2022', '04:54', ''),
(11, '20210000', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', '01/17/2022', '04:55', ''),
(12, '20210000', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '01/17/2022', '04:55', ''),
(13, '20210000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nisi quis eleifend quam adipiscing. Nulla facilisi nullam vehicula ipsum a. Nibh mauris cursus mattis molestie a iaculis ', '01/17/2022', '04:55', ''),
(14, '20210000', '\r\n\r\n\r\nQuis lectus nulla at volutpat diam ut venenatis tellus. Ornare lectus sit amet est placerat. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Dolor morbi non arcu risu', '01/17/2022', '04:56', ''),
(15, '20210000', '\r\n\r\nQuis lectus nulla at volutpat diam ut venenatis tellus. Ornare lectus sit amet est placerat. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Dolor morbi non arcu risus ', '01/17/2022', '04:56', ''),
(16, '20210000', '\r\n\r\nFeugiat in ante metus dictum at. A erat nam at lectus urna duis convallis. Venenatis tellus in metus vulputate eu scelerisque felis. Aliquam etiam erat velit scelerisque. Integer malesuada nunc vel risus commodo. Orci ac auctor augue mauris augue. Ali', '01/17/2022', '04:56', ''),
(17, '20210000', 'last', '01/24/2022', '09:49', ''),
(18, '20210000', 'Post Test 1', '01/26/2022', '11:19', 'bins/img/1099133.jpg');

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
  `account_type` varchar(11) NOT NULL,
  `secret_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `id_no`, `last_name`, `first_name`, `middle_name`, `home_address`, `sex`, `civil_status`, `employment_address`, `current_work`, `elementary_graduate`, `highschool_graduate`, `college_graduate`, `graduate_graduate`, `college_degree`, `graduate_degree`, `office_telephone`, `mobile_number`, `alumni_chapter_membership`, `email_address`, `username`, `password`, `img`, `account_type`, `secret_code`) VALUES
(1, '20210000', 'Doe', 'John', 'Doe', 'Kalibo Aklan', 'Male', 'single', '', '', '', '', '', '', '', '', '', '', '', 'doejohn@d.com', 'admin', 'admin', 'bins/img/HD Logo Circle.png', '1', ''),
(2, '20210001', 'Doe', 'May', 'Smith', 'Kalibo Aklan', 'Female', 'Single', 'Kalibo Aklan', 'Programmer', '', '2005', '2009', '', 'BSIT', '', '2684523', '09123456789', 'Kalibo', 'marydoe@doe.com', 'marydoe', 'password123', 'bins/img/8119_242089126_4289880024393364_3633632079697926507_n.jpg', '2', ''),
(20210014, '20210002', 'Doe', 'John ', 'doe', 'kalibo', 'Male', 'Single', 'Kalibo AKlan', 'programming', '', '', '2020', '', 'BSIT', '', '2685955', '09132564878', 'Kalibo', 'jdshdjhs@ksdjks.ldsd', 'johndoe1', 'password123', 'bins/img/241211663_909453456329494_8858259951868666619_n.jpg', '2', ''),
(20210015, '20210003', 'Dela cruz', 'Juan', 'john', 'fdsfsdh', 'Male', 'Single', 'fdsfsdh', 'fdsfsdh', '', '', '', '2006', '', 'fdsfsdh', '2222584', '44444448787', 'fdsfsdh', 'fdsfsdh@dsd.ghf', 'fdsfsdh', 'password', '', '2', ''),
(20210016, '20210004', 'Raz', 'Maria', 'Tolentino', 'Bubog Numancia Aklan', 'Female', 'Single', 'Kalibo Aklan', 'Manager', '', '2015', '2019', '', 'BSIT', '', '0912335', '09122344323', 'Numancia', 'maria@gmail.com', 'mariaraz', 'password123', '', '2', ''),
(20210017, '20210005', 'enguito', 'aljun', 'reverererer', 'cwakdkkffg', 'Male', 'Single', 'cwakdkkffg', 'sfsdfer', '2015', '', '', '', '', '', '', '09123365450', 'Numancia', 'dsaasasdas@gmail.com', 'Adasrggfgdgh', 'uyufuyffujfj', '', '2', ''),
(20210018, '20210006', 'juskooooo', 'nako', 'ed wow', 'cawayan', 'Male', 'Married', 'dsdardrr', 'mid lane', '', '2016', '', '', '', '', '', '09767765655', 'sdasdsa', 'ahshhshdd@gmail.com', 'juskoo', '123456', '', '2', ''),
(20210019, '20210007', 'jsdghfksdhjfgh', 'jsdghfksdhjfgh', 'jsdghfksdhjfgh', 'jsdghfksdhjfgh', 'Male', 'Married', 'jsdghfksdhjfgh', 'jsdghfksdhjfgh', '2013', '', '2016', '', 'jsdghfksdhjfgh', '', 'jsdghfk', 'jsdghfksdhj', 'jsdghfksdhjfgh', 'johnhumbertd@gmail.com', 'jsdghfksdhjfgh', 'password', '', '2', ''),
(20210020, '20210008', 'fgdfg', 'dgfdf', 'dfgdfg', 'dfgdfgd', 'Male', 'Single', 'dfsdfsd', 'dfsdfsd', '2011', '', '2016', '', 'dfsdfsd', '', '3434343', '34342323232', 'dfsdfsd', 'dfsdfsd@gmail.com', 'dfsdfsd', 'dfsdfsd', '', '2', ''),
(20210021, '20210009', 'Prosperidad', 'Juan', 'Dela', 'Kalibo', 'Male', 'Single', 'Kalibo', 'Programmer', '', '', '2013', '', 'BSIT', '', '0246844', '52454457454', 'Kalibo', 'juandela@gmail.com', 'juandela', 'password123', '', '2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tbl`
--
ALTER TABLE `post_tbl`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_tbl`
--
ALTER TABLE `post_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
