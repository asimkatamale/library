-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2019 at 03:11 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-12+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `quantity`, `created_at`, `modified_at`) VALUES
(26, 'Wings of fire', 1, '2019-11-06 15:02:32', '2019-11-06 15:07:44'),
(27, 'Rich Dad Poor Dad', 4, '2019-11-06 15:02:32', '2019-11-06 15:02:32'),
(28, 'How to impress people Dale carnegie', 5, '2019-11-06 15:03:09', '2019-11-06 15:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `books_issued`
--

CREATE TABLE `books_issued` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `is_returned` tinyint(4) NOT NULL,
  `actual_return_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_issued`
--

INSERT INTO `books_issued` (`id`, `user_id`, `book_id`, `issue_date`, `return_date`, `is_returned`, `actual_return_date`, `created_at`, `modified_at`) VALUES
(13, 1, 26, '2019-11-06', '2019-11-14', 0, '0000-00-00', '2019-11-06 15:07:44', '2019-11-06 15:07:44'),
(14, 3, 28, '2019-11-06', '2019-11-21', 1, '2019-11-06', '2019-11-06 15:07:54', '2019-11-06 15:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_id`, `contact_no`, `created_at`, `modified_at`) VALUES
(1, 'Asim Katamale', 'asimkatamale@gmail.com', 9158254386, '2019-11-05 20:05:47', '2019-11-06 15:04:40'),
(3, 'Prakash', 'prakash@prakash.com', 9999999999, '2019-11-06 15:05:28', '2019-11-06 15:05:28'),
(4, 'Sanjay', 'sanjay@sanjay.com', 9999999999, '2019-11-06 15:05:28', '2019-11-06 15:05:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_issued`
--
ALTER TABLE `books_issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `books_issued`
--
ALTER TABLE `books_issued`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
