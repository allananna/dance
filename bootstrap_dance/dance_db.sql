-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2015 at 08:02 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register1`
--

CREATE TABLE IF NOT EXISTS `register1` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `int_dance` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `mob_no` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `prof_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dancetype1`
--

CREATE TABLE IF NOT EXISTS `tb_dancetype1` (
  `id` int(11) NOT NULL,
  `dance_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dancetype1`
--

INSERT INTO `tb_dancetype1` (`id`, `dance_name`, `description`) VALUES
(6, 'salsa', '          sl sls sls sls sls										'),
(7, 'Ballet', 'bl lbl blb lbl lbl blb          										');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video1`
--

CREATE TABLE IF NOT EXISTS `tb_video1` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dance_type` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_video1`
--

INSERT INTO `tb_video1` (`id`, `title`, `dance_type`, `description`, `video`) VALUES
(1, '', '', '', ''),
(2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(199) NOT NULL,
  `email` varchar(199) NOT NULL,
  `password` varchar(199) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'allan', 'allanshah40@yahoo.in', '123'),
(2, 'rahul', 'rahul@gmail.com', 'abc123'),
(3, 'jatin', 'jatin@tops-int.cin', 'xyz'),
(4, 'yash', 'yash@gmail.com', '1234'),
(5, 'Admin', 'admin@gmail.com', 'danceacademy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register1`
--
ALTER TABLE `register1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dancetype1`
--
ALTER TABLE `tb_dancetype1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_video1`
--
ALTER TABLE `tb_video1`
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
-- AUTO_INCREMENT for table `register1`
--
ALTER TABLE `register1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_dancetype1`
--
ALTER TABLE `tb_dancetype1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_video1`
--
ALTER TABLE `tb_video1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
