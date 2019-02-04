-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 01:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'lol', 'yolo'),
(3, 'AryanG123', 'w'),
(4, 'a', 'a'),
(5, 's', 's'),
(6, 'a', 'a'),
(7, 'lastname', ''),
(8, 'lastname', 'pass'),
(9, 'lastname', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `claimedProj` text NOT NULL,
  `github` tinytext NOT NULL,
  `bio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `email`, `username`, `claimedProj`, `github`, `bio`) VALUES
(1, 'ME', 'lol@lol.com', 'goble', '', '', ''),
(4, 'Aryan Gajelli', 'aryangajelli@yahoo.com', 'AryanG123', '', '', ''),
(5, 'a', 'a@a.com', 'a', 'Hello,', '', ''),
(15, 'azfar', 'azfarchoudhry@gmail.com', 'azfar', '', '', ''),
(18, 'firstname', 'email@email.com', 'lastname', 'Hello,download test,sadmfnaskdjfnsdajlfnasdfa,testsetsetseg,', 'github.com/myusername', 'bio bio bio v v bio vbiobiobiobiobiobio');

-- --------------------------------------------------------

--
-- Table structure for table `user_project_info`
--

CREATE TABLE `user_project_info` (
  `id` int(11) NOT NULL,
  `host` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `comments` mediumtext NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `claimers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_project_info`
--

INSERT INTO `user_project_info` (`id`, `host`, `client`, `project_name`, `comments`, `creation`, `claimers`) VALUES
(1, 'lol', 'Aryan', 'Hello', 'testing', '2019-02-03 22:33:34', 'a,lastname,'),
(2, 'a', 'reeeeeeeeeee', 'reee', 'askldasdljsadlksjdreeeeeeeeeeeee', '2019-01-16 00:05:14', ''),
(66, 'a', '', 'adasd', 'asdsad', '2019-02-02 04:21:34', 'a,a,a,a,a,'),
(67, 'a', '', 'download test', 'test the download test the download test the download test the download v test the download', '2019-02-03 22:33:39', 'lastname,'),
(68, 'a', '', 'multiple file download', 'multiple file downloadmultiple file downloadmultiple file downloadmultiple file downloadmultiple file downloadmultiple file downloadmultiple file download', '2019-02-02 17:11:44', ''),
(69, 'a', '', 'sadmfnaskdjfnsdajlfnasdfa', 'adfasdfafjadkfsdkafjl', '2019-02-03 22:33:50', 'lastname,lastname,'),
(70, 'a', '', 'testsetsetseg', 'asdfafdaf', '2019-02-03 22:33:55', 'lastname,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_project_info`
--
ALTER TABLE `user_project_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_project_info`
--
ALTER TABLE `user_project_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
