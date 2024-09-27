-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 02:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intent_amplify`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `req_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `company` text NOT NULL,
  `details` text NOT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`req_id`, `name`, `email`, `mob`, `company`, `details`, `read_status`, `created_on`, `updated_on`) VALUES
(1, 'Sanket tewt', 'sanket@df.com', '9657203245', 'DF systeme', 'test the api', 1, '2024-09-27 06:09:32', '2024-09-27 06:09:32'),
(2, 'sadnfb', 'skdfgj@gmaul.com', '1234567890', 'kjsdjfsnjn', 'jdndsndkjndksjnkjdns\nndndj', 1, '2024-09-27 08:58:50', '2024-09-27 08:58:50'),
(3, 'sadnfb', 'skdfgj@gmaul.com', '1234567890', 'kjsdjfsnjn', 'jdndsndkjndksjnkjdns\nndndj', 1, '2024-09-27 08:59:58', '2024-09-27 08:59:58'),
(4, 'sadnfb', 'skdfgj@gmaul.com', '1234567890', 'kjsdjfsnjn', 'jdndsndkjndksjnkjdns\nndndj', 1, '2024-09-27 09:00:09', '2024-09-27 09:00:09'),
(5, 'kamslm', 'purohitsanket08@gmail.com', '1234567890', 'wedfgh', 'dfghjhfdg', 1, '2024-09-27 09:00:29', '2024-09-27 09:00:29'),
(6, 'masdsa', 'skdfgj@gmaul.com', '1234567890', 'wedfgh', 'asdadjnd\nasnndasn', 1, '2024-09-27 09:01:39', '2024-09-27 09:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `payment_voucher`
--

CREATE TABLE `payment_voucher` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_voucher`
--

INSERT INTO `payment_voucher` (`id`, `user_id`, `order_id`, `payment_id`, `product_id`, `status`, `amount`, `created_on`, `updated_on`) VALUES
(1, 2, 'jdhjahjhhadh', 'pay_P2BMmeyJA7i4lC', 0, 'captured', '999', '2024-09-27 11:58:12', '2024-09-27 11:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `mobile`, `password`, `status`, `created_on`, `updated_on`) VALUES
(1, 'user@example.com', 'John', 'Doe', '1234567890', '$2y$10$BmgE/DYz3JqsnG29akn6aOMrAPFvu4/RhtRfzvyDrTriVlaCDKxG2', 1, '2024-09-27 05:13:54', '2024-09-27 05:13:54'),
(2, 'sanket@df.com', 'Sanket', 'Purohit', '9657203245', '$2y$10$RVsE7eK68JMftr2HJjAiK.yAJUOPYTATrxum3/LKe8jg681DRjLJW', 1, '2024-09-27 05:16:42', '2024-09-27 05:16:42'),
(3, 'sankeet@df.com', 'test', 'test Last name', '1234567890', '$2y$10$usfvwZSpZV5xC9gSmp9xT.Pjwuwkck8DfzeFrnI0JVorRcx0QzQDW', 1, '2024-09-27 09:52:10', '2024-09-27 09:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
