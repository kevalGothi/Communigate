-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 10:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `communigate`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucement`
--

CREATE TABLE `annoucement` (
  `id` int(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(8000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `lastdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annoucement`
--

INSERT INTO `annoucement` (`id`, `title`, `content`, `date`, `lastdate`) VALUES
(28, 'meeting today', 'We have urgent meting tonight', '2023-08-29', '2023-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `cfvisitor`
--

CREATE TABLE `cfvisitor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `pstm` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `isallowed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cfvisitor`
--

INSERT INTO `cfvisitor` (`id`, `name`, `mno`, `pstm`, `date`, `isallowed`) VALUES
(31, 'sundar', '9320920302', 'Dr. Hathi', '2023-08-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_bill`
--

CREATE TABLE `maintenance_bill` (
  `bill_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `billing_period` date DEFAULT current_timestamp(),
  `due_date` date DEFAULT NULL,
  `wb` int(255) NOT NULL,
  `eb` int(255) NOT NULL,
  `mf` int(255) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('paid','unpaid','overdue') DEFAULT 'unpaid',
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT 'cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_bill`
--

INSERT INTO `maintenance_bill` (`bill_id`, `name`, `billing_period`, `due_date`, `wb`, `eb`, `mf`, `total_amount`, `status`, `payment_date`, `payment_method`) VALUES
(1, 'popatlal', '2023-09-12', '2023-10-12', 400, 200, 100, 700.00, 'unpaid', NULL, 'cash'),
(5, 'Jethalal', '2023-09-13', '2023-10-13', 400, 200, 100, 700.00, 'paid', '2023-09-13', 'cash'),
(6, 'Dr. Hathi', '2023-09-13', '2023-10-13', 400, 200, 100, 700.00, 'paid', '2023-09-13', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `hno` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_source` varchar(400) NOT NULL DEFAULT './images/defualt.png',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `mno` varchar(15) NOT NULL,
  `total` int(25) NOT NULL,
  `isrented` varchar(10) NOT NULL DEFAULT 'owner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`hno`, `name`, `img_source`, `email`, `password`, `user_type`, `mno`, `total`, `isrented`) VALUES
(3, 'Atmaram Bhide', '../images/bhide.jpeg', 'atbhide@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', '9676553410', 3, 'owner'),
(6, 'Dr. Hathi', '../images/hathi.png', 'hathi@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '97654424', 3, 'owner'),
(7, 'popatlal', '../images/popatlal.jpeg', 'popat@tufanexp.com', '202cb962ac59075b964b07152d234b70', 'user', '99929833422', 1, 'owner'),
(9, 'Jethalal', '../images/jethalal.png', 'jetha@gada.com', '8474889d7639ab9261d0969c0beb274f', 'user', '9320920302', 4, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `hno` int(255) NOT NULL,
  `tenant` varchar(255) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `ownermno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(255) NOT NULL,
  `img_source` varchar(400) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mno` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(8000) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `img_source`, `name`, `mno`, `email`, `password`, `address`, `Profession`, `user_type`) VALUES
(14, 'images/abdul.png', 'Abdul', '9320920302', 'abdul@gokuldham.com', '202cb962ac59075b964b07152d234b70', 'halvad', 'shopkeper', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `pstm` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `mno`, `pstm`, `date`, `status`) VALUES
(1, 'pinku', '113434', 'tapu', '2023-08-27', 0),
(5, 'Jayesh', '9864489644', 'visitor', '2023-08-28', 0),
(6, 'ladkivale', '9320920302', 'popatlal', '2023-09-12', 1),
(7, 'test', '9320920302', 'popatlal', '2023-09-12', 1),
(8, 'sundarlal', '9864489644', 'Jethalal', '2023-09-14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annoucement`
--
ALTER TABLE `annoucement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cfvisitor`
--
ALTER TABLE `cfvisitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_bill`
--
ALTER TABLE `maintenance_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`hno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucement`
--
ALTER TABLE `annoucement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cfvisitor`
--
ALTER TABLE `cfvisitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `maintenance_bill`
--
ALTER TABLE `maintenance_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `hno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
