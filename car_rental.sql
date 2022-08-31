-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 03:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_bookings`
--

CREATE TABLE `car_bookings` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `car_model` varchar(100) NOT NULL,
  `car_number` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_enddate` date NOT NULL,
  `booking_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_bookings`
--

INSERT INTO `car_bookings` (`id`, `owner_id`, `car_id`, `car_model`, `car_number`, `customer_id`, `booking_date`, `booking_enddate`, `booking_days`) VALUES
(9, 1, 4, 'Swift Dzire', 'PB 26D 4355', 2, '2022-08-10', '2022-08-12', 2),
(10, 1, 5, 'Swift Dzire', 'PB 26D 2213', 2, '2022-08-25', '2022-08-27', 2),
(11, 1, 3, 'Swift Dzire', 'PB 26D 4359', 2, '2022-09-09', '2022-09-25', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('customer','agency') NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `address`, `mobile_number`) VALUES
(1, 'Chetan', 'chetan.devgan@aptean.com', 'qwert', 'agency', 'H No 43', 1237577800),
(2, 'Chetan', 'devganchetan6@gmail.com', 'qwerty', 'customer', 'H No 43', 1237577755),
(16, 'Darpan Juneja', 'abbb@gmail.com', 'qn kn', 'customer', 'H No 43', 345789465),
(17, 'ghvjb', 'vhbjn@gmail.com', 'vhb', 'customer', 'yvhjbnk', 0),
(18, 'Darpan Juneja', 'bhg@asdf.com', 'qwert', 'agency', 'vhbjn', 345678),
(19, 'jatin', 'Jatin@gmail.com', 'qwerty', 'agency', 'Khanna', 1237577878);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_info`
--

CREATE TABLE `vehicles_info` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `rent` decimal(10,0) NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles_info`
--

INSERT INTO `vehicles_info` (`id`, `model`, `number`, `capacity`, `rent`, `booked`, `owner_id`) VALUES
(3, 'Swift Dzire', 'PB 26D 4359', 5, '100', 1, 1),
(4, 'Swift Dzire', 'PB 26D 4355', 5, '250', 1, 1),
(5, 'Swift Dzire', 'PB 26D 2213', 5, '300', 1, 1),
(6, 'Innova', 'CH 01 0111', 7, '2000', 0, 1),
(7, 'Swift Dzire', 'PB 26D 4355', 6, '1000', 0, 19),
(8, 'Swift Dzireee', 'PB 26D 4122', 5, '1000', 0, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_bookings`
--
ALTER TABLE `car_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles_info`
--
ALTER TABLE `vehicles_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_info_fk` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_bookings`
--
ALTER TABLE `car_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vehicles_info`
--
ALTER TABLE `vehicles_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicles_info`
--
ALTER TABLE `vehicles_info`
  ADD CONSTRAINT `vehicles_info_fk` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
