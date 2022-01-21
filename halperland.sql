-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 01:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(200) NOT NULL,
  `city_postal_code` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactmessage`
--

CREATE TABLE `contactmessage` (
  `msg_id` int(200) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message_type` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` text NOT NULL,
  `generated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(200) NOT NULL,
  `question` varchar(225) NOT NULL,
  `answer` varchar(225) NOT NULL,
  `question_for` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(200) NOT NULL,
  `service_id` int(200) NOT NULL,
  `notification` varchar(50) NOT NULL,
  `arrived_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `providerrating`
--

CREATE TABLE `providerrating` (
  `service_rating_id` int(200) NOT NULL,
  `service_id` int(200) NOT NULL,
  `on_time_arrival` int(1) NOT NULL,
  `friendly` int(1) NOT NULL,
  `quality_of_service` int(1) NOT NULL,
  `feedback` varchar(225) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL,
  `cleaning_time` varchar(10) NOT NULL,
  `cleaning_date` date NOT NULL,
  `extra_cabinet` int(10) NOT NULL,
  `extra_fridge` int(10) NOT NULL,
  `extra_oven` int(10) NOT NULL,
  `extra_laundry` int(10) NOT NULL,
  `extra_window` int(10) NOT NULL,
  `working_hour` varchar(10) NOT NULL,
  `total_payment` int(10) NOT NULL,
  `comments` varchar(225) NOT NULL,
  `pet_at_home` tinyint(1) NOT NULL,
  `address_id` int(200) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `service_status` varchar(10) NOT NULL,
  `service_accept_by_id` int(200) NOT NULL,
  `service_distance` int(20) NOT NULL,
  `time_of_completion` varchar(25) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `provider_id` int(200) NOT NULL,
  `working_with_pet` tinyint(1) NOT NULL,
  `set_radius` int(5) NOT NULL,
  `avtar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(16) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `verification_status` tinyint(1) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `preferred_language` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `date_of_registration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usersaddress`
--

CREATE TABLE `usersaddress` (
  `address_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `house_number` varchar(25) NOT NULL,
  `city_id` int(200) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `selected_Address` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usersfavorites`
--

CREATE TABLE `usersfavorites` (
  `favorite_id` int(200) NOT NULL,
  `favorite_for` int(20) NOT NULL,
  `favorite_user` int(20) NOT NULL,
  `is_favorite` tinyint(1) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `providerrating`
--
ALTER TABLE `providerrating`
  ADD PRIMARY KEY (`service_rating_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usersaddress`
--
ALTER TABLE `usersaddress`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `usersfavorites`
--
ALTER TABLE `usersfavorites`
  ADD PRIMARY KEY (`favorite_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `msg_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providerrating`
--
ALTER TABLE `providerrating`
  MODIFY `service_rating_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersaddress`
--
ALTER TABLE `usersaddress`
  MODIFY `address_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersfavorites`
--
ALTER TABLE `usersfavorites`
  MODIFY `favorite_id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
